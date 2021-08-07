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

header("charset: UTF-8");

include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'adi_platform_init.php');
global $adiinviter;
$adi_current_model = 'inpage';
$path = dirname(__FILE__);
include_once($path . DIRECTORY_SEPARATOR . 'adiinviter'. DIRECTORY_SEPARATOR .'init.php');

$adi_do = POST_var('adi_do', ADI_STRING_VARS, 'a-z0-9_');
$load_default_template = true;
$contents = '';

$contents = '';
$adi_global_redirect_url = '';

if($adiinviter->adiinviter_installed !== true)
{
	echo '<h3 style="font-family:Verdana,Tahoma;color:#282828;margin:35px 0px;" align="center">AdiInviter Pro is not installed yet.</h3>';
	exit;
}
else
{
	switch($adi_do)
	{
		case 'get_contacts':
			$service       = POST_var('adi_service_key_val' , ADI_STRING_VARS);
			$user_email    = POST_var('adi_user_email'      , ADI_STRING_VARS);
			$user_password = POST_var('adi_user_password'   , ADI_STRING_VARS);
			$importer_type = POST_var('importer_type'       , ADI_STRING_VARS);

			$share_type = POST_var('share_type', ADI_PLAIN_TEXT_VARS);
			$content_id = POST_var('content_id', ADI_INT_VARS);

			$allow_share = $adiinviter->is_sharing_allowed($share_type, $content_id);
			if(!$allow_share)
			{
				$share_type = ''; $content_id = 0;
			}

			if($importer_type == 'contact_file')
			{
				$service = 'csv_inviter';
				$file_name = $_FILES['adi_contact_file']['tmp_name'];
				if(file_exists($file_name))
				{
					$real_name = $_FILES['adi_contact_file']['name'];
					$real_name = explode('.', $real_name);
					$csv_file_format = $real_name[1];
					$csv_file_contents = file_get_contents($file_name);
				}
				else
				{
					$adiinviter->error->report_error($adiinviter->phrases['contact_file_not_found']);
				}
			}

			if($importer_type == 'manual_inviter')
			{
				$service = 'manual_inviter';
			}

			$contacts_list = POST_var('adi_contacts_list', ADI_CONTACTLIST_VARS);

			$file_path = ADI_CORE_PATH . 'get_contacts.php';
			include($file_path);
			if($adiinviter->error->get_error_count() == 0)
			{
				$file_path = ADI_CORE_PATH . 'get_contacts_phrases.php';
				include($file_path);
			}
		break;

		case 'submit_friend_adder':
			$show_invite_sender = false;
			
			$contacts = POST_var('adi_conts',  ADI_ARRAY_VARS);
			$config   = POST_var('adi_config', ADI_ARRAY_VARS);

			$share_type = (isset($config['share_type']) && !empty($config['share_type']) ? $config['share_type'] : "");
			$content_id = (isset($config['content_id']) && !empty($config['content_id']) ? $config['content_id'] : "");

			if(!empty($contacts) && !empty($config))
			{
				$show_invite_sender = true;
			}

			$friends_count = 0;
			$reg_ids = POST_var('adi_reg_ids', ADI_ARRAY_VARS);
			if(is_array($reg_ids) && count($reg_ids) > 0) {
				$reg_ids = array_map('intval', $reg_ids);
			}
			if(is_POST('adi_add_friend_button') &&  is_POST('adi_reg_ids') && count($reg_ids) > 0)
			{
				$result = $adiinviter->send_friend_request($adiinviter->userid, $reg_ids);
				$friends_count = count($result);
				$add_as_friend_response_txt = adi_replace_vars($adiinviter->phrases['adi_ip_add_friends_success_msg'], array(
					'friends_count' => $friends_count
				));
			}

			if($show_invite_sender === true)
			{
				if(count($contacts) > 0)
				{
					$show_invites_sender = true;
					$show_friend_adder   = false;

					$file_path = ADI_CORE_PATH.'get_contacts_phrases.php';
					include($file_path);
				}
			}
			else
			{
				if(is_POST('adi_skip_button'))
				{
					$block_header_text  = $adiinviter->phrases['adi_invite_block_header'];
					$block_message_text = $adiinviter->phrases['adi_ip_block_default_message'];
				}
				else
				{
					$block_header_text  = $adiinviter->phrases['adi_add_friends_response_block_header'];
					$block_message_text = adi_replace_vars($adiinviter->phrases['adi_ip_add_friends_success_msg'], array(
						'friends_count' => count($result)
					));
				}

				$contents .= eval(adi_get_template('inpage_final_message'));
				$load_default_template = false;
			}
		break;

		case 'adi_redirect' :
			if(is_POST('adi_invite_history'))
			{
				$adi_global_redirect_url = $adiinviter->invite_history_url;
			}
			else if(is_POST('adi_website_register'))
			{
				$adi_global_redirect_url = $adiinviter->settings['adiinviter_register_link'];
			}
		break;

		case 'submit_invite_sender':
			$contacts    = POST_var('adi_conts',  ADI_ARRAY_VARS);
			$config      = POST_var('adi_config', ADI_ARRAY_VARS);
			$attach_note = POST_var('adi_attach_note_txt_input', ADI_PLAIN_TEXT_VARS);

			if(is_POST('adi_ip_sinfo_cancel') || is_POST('adi_invite_more'))
			{
				$load_default_template = true;
			}
			else if(is_POST('adi_invite_history'))
			{
				$adi_global_redirect_url = $adiinviter->invite_history_url;
			}
			else if(is_POST('adi_website_register'))
			{
				$adi_global_redirect_url = $adiinviter->settings['adiinviter_register_link'];
			}
			else
			{
				if(is_array($contacts) && count($contacts) > 0 && is_array($config) && count($config) > 0)
				{
					$loading_guest_form = false;
					$adi_sender_name  = POST_var('adi_sender_name' , ADI_STRING_VARS); 
					$adi_sender_email = POST_var('adi_sender_email', ADI_STRING_VARS);

					if($adiinviter->settings['adiinviter_store_guest_user_info'] == 1 && !is_POST('adi_sender_email') && !is_POST('adi_sender_name') && $adiinviter->userid == 0)
					{
						$contents .= eval(adi_get_template('sender_information_html'));
						$load_default_template = false;
						$loading_guest_form = true;
					}
					else if($adiinviter->settings['adiinviter_store_guest_user_info'] == 1 && 
						(empty($adi_sender_email) || empty($adi_sender_name)) && $adiinviter->userid == 0)
					{
						if(is_POST('adi_sender_email') && is_POST('adi_sender_name'))
						{
							$adiinviter->error->report_error($adiinviter->phrases['all_fields_are_not_filled']);
						}
						$contents .= eval(adi_get_template('sender_information_html'));
						$load_default_template = false;
						$loading_guest_form = true;
					}

					if($loading_guest_form == false)
					{
						// $cs_types = adi_getSetting('content_share', 'content_share_types');
						$handler_file = ADI_CORE_PATH.'invitation_handler.php';
						require_once($handler_file);
						if(isset($cs_types[$config['share_type']]) && !empty($config['share_type']))
						{
							$inv_handler = get_resource('Adi_Invitations');
						}
						else
						{
							$inv_handler = get_resource('Adi_Content_Share');
						}

						$inv_handler->set_invitation_type($config['share_type'], $config['content_id']);

						// Assign attach note
						$inv_handler->set_attached_note($attach_note);

						// Set Sender
						if($adiinviter->userid == 0 && !empty($adi_sender_email) && !empty($adi_sender_name))
						{
							$inv_handler->set_sender($adi_sender_email, $adi_sender_name);
						}

						// Initialize
						$inv_handler->init($config, $contacts);
						$success_count = $inv_handler->send_invitations();

						if($adiinviter->error->get_error_count() == 0)
						{
							$block_header_text  = $adiinviter->phrases['adi_ip_invitation_sent_block_header'];
							$invitation_sent_response = $adiinviter->phrases['adi_ip_invitation_sent_message_txt'];
							$block_message_text = adi_replace_vars($invitation_sent_response, array(
								'invitation_count' => $success_count,
							));

							$contents .= eval(adi_get_template('inpage_final_message'));
							$load_default_template = false;
						}
					}
				}
				else
				{
					$block_header_text  = $adiinviter->phrases['adi_ip_invitation_sent_block_header'];
					$block_message_text = $adiinviter->phrases['adi_msg_no_contacts_selected'];
					
					$contents .= eval(adi_get_template('inpage_final_message'));
					$load_default_template = false;
				}
			}
		break;

		default: $load_default_template = true; break;
	}


	if(isset($adi_global_redirect_url) && !empty($adi_global_redirect_url))
	{
		if( !adi_page_redirect($adi_global_redirect_url) )
		{
			$contents .= eval(adi_get_template('inpage_redirect_page'));
		}
		$load_default_template = false;
	}


	// Load Template
	if($load_default_template === true)
	{
		if($adiinviter->settings['adiinviter_onoff'] == 0)
		{
			$adi_display_message = 'AdiInviter Pro is turned Off by your administrator.';
			$contents .= eval(adi_get_template('inpage_no_permissions'));
			$load_default_template = false;
		}
		else if($adiinviter->can_use_adiinviter == false)
		{
			$adi_display_message = $adiinviter->phrases['adi_ip_no_permissions_message'];
			$contents .= eval(adi_get_template('inpage_no_permissions'));
			$load_default_template = false;
		}
		else if($adiinviter->show_recaptcha == true)
		{
			$show_captcha = true;
			$adi_show_error_message = false;
			$adi_challenge  = POST_var('recaptcha_challenge_field' , ADI_STRING_VARS );
			$adi_answer     = POST_var('recaptcha_response_field'  , ADI_STRING_VARS );
			$adi_no_captcha = POST_var('adi_no_captcha_display'    , ADI_INT_VARS    );
			if($adi_no_captcha !== 1)
			{
				if(!empty($adi_challenge) && !empty($adi_answer))
				{
					require_once(ADI_CORE_PATH . 'recaptchalib.php');
					$publickey  = $adiinviter->settings['captcha_public_key'];
					$privatekey = $adiinviter->settings['captcha_private_key'];

					$resp = recaptcha_check_answer($privatekey, $_SERVER['REMOTE_ADDR'], $adi_challenge, $adi_answer);
					if(! $resp->is_valid)
					{
						$adi_show_error_message = true;
					}
					else {
						$show_captcha = false;
					}
				}
			}
			else 
			{
				$show_captcha = false;
				$load_default_template = true;
			}

			if($show_captcha == true)
			{
				$contents .= eval(adi_get_template('inpage_show_captcha'));
				$load_default_template = false;
			}
		}

		$importer_type = POST_var('importer_type', ADI_STRING_VARS);
		$importer_type = (!empty($importer_type) ? $importer_type : 'addressbook');

		if($load_default_template == true)
		{
			$share_type = (is_GET('adi_share_type')) ? GET_var('adi_share_type', ADI_PLAIN_TEXT_VARS) : '';
			$content_id = (is_GET('adi_content_id')) ? GET_var('adi_content_id', ADI_INT_VARS) : '';
			// $adiinviter->get_popular_services();
			$contents .= eval(adi_get_template('inpage_login_page'));
		}
	} // ($load_default_template === true)
} // adiinviter_installed check

?>