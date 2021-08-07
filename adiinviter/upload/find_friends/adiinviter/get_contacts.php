<?php
/*******************************************************************************************
 * AdiInviter Pro 1.1 Stable Release by AdiInviter, Inc.                                   *
 *-----------------------------------------------------------------------------------------*
 *                                                                                         *
 * https://www.adiinviter.com                                                              *
 *                                                                                         *
 * Copyright © 2008-2014, AdiInviter, Inc. All rights reserved.                            *
 * You may not redistribute this file or its derivatives without written permission.       *
 *                                                                                         *
 * Support Email: support@adiinviter.com                                                   *
 * Sales Email: sales@adiinviter.com                                                       *
 *                                                                                         *
 *-------------------------------------LICENSE AGREEMENT-----------------------------------*
 * 1. You are allowed to use AdiInviter Pro software and its code only on domain(s) for    *
 *    which you have purchased a valid and legal license from www.adiinviter.com.          *
 * 2. You ARE NOT allowed to REMOVE or MODIFY the copyright text within the .php files     *
 *    themselves.                                                                          *
 * 3. You ARE NOT allowed to DISTRIBUTE the contents of any of the included files.         *
 * 4. You ARE NOT allowed to COPY ANY PARTS of the code and/or use it for distribution.    *
 ******************************************************************************************/

	$share_type = (isset($share_type) && !empty($share_type)) ? $share_type : "";
	$content_id = (isset($content_id)) ? $content_id : "";

	$contacts = array(); $config = array();
	$registered_contacts = array(); $info = array();

	$adiinviter->load_services();
	if(isset($adiinviter->services_config[$service]))
	{
		$config = $adiinviter->services_config[$service];
		$config['service_key'] = $service;
	}

	if(count($config) == 0)
	{
		adi_report_error('invalid_importer_service');
	}

	if($importer_type == 'addressbook')
	{
		$config['is_oauth'] = false;
		if(isset($adiinviter->services_params[$config['service_key']]))
		{
			$config['is_oauth'] = $adiinviter->services_params[$config['service_key']][0][2] == 1;
		}

		if($config['is_oauth'] == true)
		{
			include_once(ADI_CORE_PATH . 'importer.php');
			$importer = new Adi_OAuth_Importer();
			if($importer->init($service))
			{
				$contacts = $importer->fetchContacts();
				$contacts_called = true;
			}
		}
		else
		{
			if(empty($user_email))
			{
				adi_report_error('adi_msg_empty_email_address');
			}
			else if(empty($user_password))
			{
				adi_report_error('adi_msg_empty_password');
			}
			if($adiinviter->error->get_error_count() == 0)
			{
				include_once(ADI_CORE_PATH . 'importer.php');
				$adiinviter->importer = new Adi_Importer($config);
				$contacts    = $adiinviter->importer->fetch_contacts($user_email, $user_password);
				$session_id  = $adiinviter->importer->getSessionID();

				if(count($contacts) <= 0 || $contacts == false)
				{
					if($config['email'] == 1)
					{
						adi_report_error('adiinviter_no_contacts_in_addressbook');
					}
					else
					{
						adi_report_error('adiinviter_no_friends');
					}
				}
			}
		}
		
	}
	else if($importer_type == 'contact_file')
	{
		$config['service_key'] = 'csv_inviter';
		include_once(ADI_CORE_PATH.'csv_processor.php');
		$format = explode('.',$_FILES['adi_contact_file']['name']);
		if(is_array($format))
		{
			$format = strtoupper($format[count($format) - 1]);
		}
		$filename = $_FILES['adi_contact_file']['tmp_name'];
		$csv_contents = ''; $csv_lines=array();
		$csv_result = array();
		if($format == 'VCF')
		{
			$csv_lines = file($filename);
			$adiParser  = new Adi_VCFParser($csv_lines);
			$csv_result = $adiParser->parse_vcards();
		}
		else
		{
			if(is_uploaded_file($filename) || $format != '')
			{
				if(file_exists($filename))
				{
					$csv_contents = file_get_contents($filename);
					$adiParser  = new Adi_CSVParser($csv_contents);
					if(!$adiParser->checkError())
					{
						$csvParser = 'extractContactsFrom'.$format;
						if(method_exists($adiParser, $csvParser))
							$csv_result = $adiParser->$csvParser();
						else
							return sprintf($adiinviter->phrases['adiinviter_invalid_format']);
					}
					else
					{
						return $adiParser->getErrorMessage();
					}
				}
			}
		}

		if($csv_result == false || !is_array($csv_result) || count($csv_result) == 0)
		{
			adi_report_error('zero_contacts_found_in_contact_file');
		}
		else
		{
			$contacts = $csv_result;
		}
	}
	else if($importer_type == 'manual_inviter')
	{
		if(empty($contacts_list))
		{
			adi_report_error('adi_msg_empty_contacts_list');
		}
		else
		{
			$parse_output = parseContacts($contacts_list);
			if($parse_output == false || !is_array($parse_output) || count($parse_output) == 0)
			{
				adi_report_error('zero_contacts_found_in_contacts_list');
			}
			else
			{
				$contacts = $parse_output;
			}
		}
	}

	if(!is_array($contacts)) { $contacts = array(); }

	$contacts_count = count($contacts);

	if($config['email'] == 1 && isset($contacts[$adiinviter->email]))
	{
		unset($contacts[$adiinviter->email]);
		$contacts_count = count($contacts);
	}

	if($contacts_count > $adiinviter->max_contacts_count)
	{
		$contacts = array_slice($contacts, 0, 3);
		$contacts_count = $adiinviter->max_contacts_count;
	}

	$show_friend_adder = false;
	$show_invites_sender = false;
	if($contacts_count > 0)
	{
		$config['share_type'] = $share_type;
		$config['content_id'] = $content_id;
		$config['all_non_registered_count'] = count($contacts);

		$config['blocked_count'] = 0;
		$config['waiting_count'] = 0;
		$config['sent_count'] = 0;

		$config['registered_count'] = 0;
		$config['pending_requests_count'] = 0;
		$config['my_friends_count'] = 0;

		if($adiinviter->user_system === true)
		{
			$adiinviter->mark_registered_contacts($contacts, $registered_contacts, $info, $config);
			$contacts_count = count($contacts);
			if($adiinviter->settings['adiinviter_show_already_registered'] == 1)
			{
				$show_friend_adder = (count($registered_contacts) > 0 ? true : false);
			}
		}
		$config['non_registered_count'] = count($contacts);

		if($contacts_count > 0)
		{
			$adiinviter->mark_invited_contacts($contacts, $config);
			$contacts_count = count($contacts);
			$show_invites_sender = (count($contacts) > 0 ? true : false);
		}

		// Error Checking.
		$non_registered_cnt = (int)$config['all_non_registered_count'];
		if((int)$config['registered_count'] > 0 && (int)$config['non_registered_count'] == 0)
		{
			if((int)$config['registered_count'] == (int)$config['my_friends_count'])
			{
				adi_report_error('adi_err_all_contacts_are_friends');
			}
			else if((int)$config['registered_count'] == (int)$config['pending_requests_count'])
			{
				adi_report_error('adi_err_all_contacts_has_pending_friend_reqs');
			}
			else if($adiinviter->settings['adiinviter_show_already_registered'] == 0)
			{
				adi_report_error('adi_err_all_contacts_are_already_registered');
			}
		}
		else if((int)$non_registered_cnt > 0 && (int)$config['non_registered_count'] == 0)
		{
			if($non_registered_cnt == (int)$config['sent_count'])
			{
				adi_report_error('adi_err_all_contacts_invited_already');
			}
			else if($non_registered_cnt == (int)$config['blocked_count'])
			{
				adi_report_error('adi_err_all_contacts_blocked_already');
			}
			else if($non_registered_cnt == (int)$config['waiting_count'])
			{
				adi_report_error('adi_err_all_contacts_in_mail_queue');
			}
			else if($non_registered_cnt == ((int)$config['waiting_count']+(int)$config['blocked_count']+(int)$config['sent_count']))
			{
				adi_report_error('adi_err_no_contacts_to_send_invitation');
			}
		}
	}

?>