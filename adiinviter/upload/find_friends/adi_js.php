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

header("Content-type: text/javascript;");
header("charset: UTF-8");
header("Cache-Control: must-revalidate");



include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'adi_platform_init.php');
global $adiinviter;
$path = dirname(__FILE__);
include_once($path . DIRECTORY_SEPARATOR . 'adiinviter'. DIRECTORY_SEPARATOR .'init.php');

$do = GET_var('adi_do', ADI_STRING_VARS, 'a-z_');
$do = empty($do) ? POST_var('adi_do', ADI_STRING_VARS, 'a-z_') : $do;
$contents = '';

if($adiinviter->adiinviter_installed !== true)
{
	echo '/* AdiInviter Pro is not installed yet. */';
	exit;
}
else
{
	$adi_current_model = 'popup';

	switch($do)
	{
		case 'get_phrases':
			$extended_options = array(
				'phrases'  => array(),
				'services' => array(),
				'ncols'    => $adiinviter->settings['adiinviter_services_num_of_cols'],
				'aurl'     => $adiinviter->adi_root_url_rel,
			);
			// Phrases
			$phraseArr = array('adi_ab_service_field_default_txt','manualinv_textarea_default_txt','invalid_server_response','adi_ab_service_field_default_txt','adi_msg_no_contacts_selected','adi_msg_invalid_contact_file_format','adi_msg_no_service_selected','adi_msg_invalid_service','adi_msg_empty_email_address','adi_msg_empty_password','adi_msg_contact_file_not_selected','adi_msg_contact_file_size_limit_exceeded','adi_error_contact_list_length_limit_exceeded','adi_msg_empty_contacts_list','adi_default_message_for_all_popups','adi_acknowledgement_message_before_delete_inv','adi_ab_submit_form_btn_text','adi_oauth_service_submit_btn_label','adi_pp_close_text','adi_ip_sinfo_top_message','adi_search_contacts_default_text',);
			foreach($phraseArr as $varname)
			{
				$extended_options['phrases'][$varname] = $adiinviter->phrases[$varname];
			}
			// Services
			$adiinviter->load_services();
			$services_params = $adiinviter->services_params;
			$on_services = getAdiInviterServices();
			foreach($on_services as $service_key => $on_off)
			{
				if($services_params[$service_key][1][0] != '*')
					$services_params[$service_key][1] = array('-');
				if(intval($on_off) === 1) {
					$extended_options['services'][$service_key] = $services_params[$service_key];
				}
			}
			if($adiinviter->check_for_topic_redirect())
			{
				$extended_options['rurl'] = 1;
			}
			// Page Max Width
			$max_page_width = ($adiinviter->max_page_width == null ? null : $adiinviter->max_page_width);
			$extended_options['mw'] = $max_page_width;

			$extended_options['anl'] = $adiinviter->settings['attach_note_length_limit'];
			$extended_options['zs'] = $adiinviter->base_zindex;

			// Redirect Url
			echo 'jQuery.extend(adi,'.json_encode($extended_options).');';
		break;

		case 'contact_file':
			$contents .= eval(adi_get_template('contact_file'));
		break;

		case 'download_sample':
			include(ADI_CORE_PATH . 'download_samples.php');
		break;

		case 'supported_formats':
			$contents .= eval(adi_get_template('supported_formats'));
		break;

		case 'attach_note':
			$contents .= eval(adi_get_template('popup_attach_note'));
		break;

		case 'topic_redirect':
			$content_url = '';
			$content_title = '';

			$adi_invitation_id = $adiinviter->session->get('adi_show_redirect');
			if(!empty($adi_invitation_id))
			{
				$query = "SELECT * FROM adiinviter WHERE invitation_id = '".$adi_invitation_id."' AND share_type != '' AND topic_redirect = 1";
				$adiinviter->session->remove('adi_show_redirect');
			}
			else {
				$query = "SELECT * FROM adiinviter WHERE receiver_userid = '".$adiinviter->userid."' AND share_type != '' AND topic_redirect = 1";
			}
			if($rr = adi_query_first_row($query))
			{
				$share_type = $rr['share_type'];
				$content_id = $rr['content_id'];
				$inviter_info = $adiinviter->phrases['defualt_inviter_username'];
				if(isset($adiinviter->settings['adiinviter_content_share_types'][$share_type]))
				{
					$content_settings = $adiinviter->settings['adiinviter_content_share_types'][$share_type];
				}

				$userid = $rr['inviter_id'];
				if($userid != 0)
				{
					$adi_user = $adiinviter->get_userinfo($userid);
					$inviter_info = '<font style="font-weight:bold;">'.$adi_user['username'].'</font>';
					$profile_page_url = $adi_user['proflie_url'];
				}
				else
				{
					$query = "SELECT * FROM adiinviter_guest WHERE invitation_id = '".$rr['invitation_id']."'";
					if($row = adi_query_first_row($query))
					{
						$inviter_info = $row['name'];
					}
				}

				$content_url = $adiinviter->get_content_url($share_type, $content_id);
				$content_title = $adiinviter->get_content_title($share_type, $content_id);

				$cs_redirect_top_message = str_replace('[inviter_info]', $inviter_info, $adiinviter->phrases['cs_redirect_top_message']);
				$contents .= eval(adi_get_template('popup_topic_redirect'));

				if(!empty($adi_invitation_id))
				{
					$query = "UPDATE adiinviter SET `topic_redirect` = 0 WHERE invitation_id = '".$adi_invitation_id."'";
					adi_query_write($query);
				}
				else
				{
					$query = "UPDATE adiinviter SET `topic_redirect` = 0 WHERE receiver_userid = '".$adiinviter->userid."'";
					adi_query_write($query);
				}
			}
		break;

		case 'invite_preview':

			$adiinviter_services = array();

			$service_key = POST_var('service'   , ADI_STRING_VARS, ADI_SERVICE_CHARLIST);
			$share_type  = POST_var('share_type', ADI_STRING_VARS, ADI_SHARETYPE_CHARLIST);
			$content_id  = POST_var('content_id', ADI_STRING_VARS, ADI_CONTENTID_CHARLIST);

			$attach_note = POST_var('attach_note', ADI_PLAIN_TEXT_VARS);
			$attach_note = empty($attach_note) ? $adiinviter->phrases['default_attach_note_in_preview'] : $attach_note;

			$allow_share = $adiinviter->is_sharing_allowed($share_type, $content_id);
			if(!$allow_share)
			{
				$share_type = ''; $content_id = 0;
			}

			$config = array();
			if(!empty($service_key))
			{
				$adiinviter->load_services();
				if(isset($adiinviter->services_config[$service_key]))
				{
					$config = $adiinviter->services_config[$service_key];
					$config['service_key'] = $service_key;
				}
			}
			$invitation_body = '';
			if(count($config) > 0)
			{
				$handler_file = ADI_CORE_PATH.'invitation_handler.php';
				require_once($handler_file);
				if($share_type == '')
				{
					$inv_handler = get_resource('Adi_Invitations');
				}
				else
				{
					$inv_handler = get_resource('Adi_Content_Share');
				}

				$inv_handler->set_invitation_type($share_type, $content_id);

				// Assign attach note
				$inv_handler->set_attached_note($attach_note);

				// Set Sender
				if($adiinviter->userid == 0 && !empty($adi_sender_email) && !empty($adi_sender_name))
				{
					$inv_handler->set_sender($adi_sender_email, $adi_sender_name);
				}
				// Initialize
				$contacts = array(
					'receiver_email@domain.com' => array('name' => 'Your Friend'),
				);
				$inv_handler->init($config, $contacts);
				$invitation_body = $inv_handler->body;
			}

			$invitation_body = str_replace("'", '&#39;', $invitation_body);
			$invitation_body = str_replace("'", "\\'", adi_parse_to_js_string($invitation_body));
			$contents .= eval(adi_get_template('popup_invite_preview'));
		break;


		case 'type_search' :
			$query = trim(POST_var('query', ADI_STRING_VARS, '0-9a-z_.'));
			$result = array();
			if(strlen($query) > 3 && strpos($query, '.') !== false) 
			{
				$adiinviter->load_services();
				$on_services = getAdiInviterServices();

				foreach($on_services as $service_key => $on_off)
				{
					if($on_off && $adiinviter->services_params[$service_key][1][0] != '*') 
					{
						foreach($adiinviter->services_params[$service_key][1] as $domain)
						{
							if(strpos($domain, $query) === 0)
							{
								$result[$service_key][] = $domain;
							}
						}
					}
				}
			}
			echo json_encode($result);
		break;

		case 'login_form' :
			$share_type = '';
			$content_id = '';

			if($adiinviter->show_recaptcha == '1' && $do != 'security_check')
			{
				$real_scc_key = $adiinviter->get_scc_key();
				$scc_key = GET_var('adi_scc', ADI_STRING_VARS, 'a-z0-9');
				if($scc_key != $real_scc_key && !is_POST('recaptcha_challenge_field') && !is_POST('recaptcha_response_field'))
				{
					// exit;
				}
			}
			// $adiinviter->get_popular_services();
			$contents .= eval(adi_get_template('login_form'));
		break;

		case 'add_as_friend':
		case 'submit_friend_adder':
			$reg_ids = POST_var('adi_reg_ids', ADI_ARRAY_VARS);
			if(is_array($reg_ids) && count($reg_ids) > 0)
			{
				if(count($reg_ids) > 0)
				{
					$result = $adiinviter->send_friend_request($adiinviter->userid, $reg_ids);
				}
				else
				{
					$adiinviter->error->report_error($adiinviter->phrases['adi_msg_no_contacts_selected']);
					echo $adiinviter->error->generate_error_for_js();
				}
			}
			
			$popup_message_text = str_replace('[count]',count($reg_ids),$adiinviter->phrases['friends_added_message']).'<input type="hidden" class="adi_fr_added_ids" value="'.implode(',', $reg_ids).'">';
			$contents .= eval(adi_get_template('popup_final_message'));
		break;

		case 'oauth_login':
			$service_key = GET_var('adi_service' , ADI_STRING_VARS, ADI_SERVICE_CHARLIST );
			$username    = GET_var('adi_username', ADI_STRING_VARS );
			$step        = GET_var('adi_s',        ADI_STRING_VARS, 'a-z0-9_' );

			$config = array();
			if(!empty($service_key))
			{
				$adiinviter->load_services();
				if(isset($adiinviter->services_config[$service_key]))
				{
					$config = $adiinviter->services_config[$service_key];
					$config['service_key'] = $service_key;
				}
			}
			include_once(ADI_CORE_PATH . 'importer.php');
			if(count($config) > 0)
			{
				$importer = new Adi_OAuth_Importer();
				if($importer->init($service_key))
				{
					if($step == 'start')
					{
						$importer->get_request_token();
					}
					else
					{
						$response = (string)$importer->get_access_token();
						if(!headers_sent()) {
							header("Content-type: text/html;");
						}
						$contents = '<!DOCTYPE html>
<html><head><script type="text/javascript">
function load_occurred() {
	window.opener.adi_oauth_resp.respond("'.$response.'"); window.close();
}
</script></head><body onload="load_occurred()"></body></html>';
					}
				}
			}
		break;

		case 'get_contacts':		
			$service       = POST_var('adi_service_key_val', ADI_STRING_VARS, ADI_SERVICE_CHARLIST );
			$user_email    = POST_var('adi_user_email'    , ADI_STRING_VARS );
			$user_password = POST_var('adi_user_password' , ADI_STRING_VARS );
			$importer_type = POST_var('importer_type'     , ADI_STRING_VARS, 'a-z_' );
			$share_type    = POST_var('share_type'        , ADI_STRING_VARS,ADI_SHARETYPE_CHARLIST );
			$content_id    = POST_var('content_id'        , ADI_STRING_VARS,ADI_CONTENTID_CHARLIST );

			$allow_share = $adiinviter->is_sharing_allowed($share_type, $content_id);
			if(!$allow_share)
			{
				$share_type = ''; $content_id = 0;
			}

			if($importer_type == 'contact_file')
			{
				$service = 'csv_inviter';
				header("Content-type: text/html;");

				$contents .= '<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/></head><body><div id="adi_contents"><!--';
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

			// Get contacts according to importer_type
			$file_path = ADI_CORE_PATH.'get_contacts.php';
			include($file_path);

			if($adiinviter->error->get_error_count() == 0)
			{
				// Get contacts according to importer_type
				$file_path = ADI_CORE_PATH.'get_contacts_phrases.php';
				include($file_path);
			}
			else
			{
				$contents .= $adiinviter->error->generate_error_for_js();
			}

			if($importer_type == 'contact_file')
			{
				$contents .= "\n".'--></div><script language="javascript" type="text/javascript">window.top.window.adipps.lg.parse_cf_resp(document.getElementById("adi_contents").innerHTML.replace(/^<!--|-->/g,""));</script></body></html>';
			}
		break;

		case 'send_invites':
		case 'submit_invite_sender':
			$contacts = POST_var('adi_conts', ADI_ARRAY_VARS);
			$service_key = POST_var('adi_service_key_val', ADI_STRING_VARS, 'a-z0-9_');

			$adiinviter->load_services();
			/*
			$adi_services = adi_allocate_pack('Adi_Services');
			$adiinviter_services = $adi_services->get_service_details($service_key, 'info');
			$config = $adiinviter_services[$service_key]['info'];
			*/
			$config = array();
			if(isset($adiinviter->services_config[$service_key]))
			{
				$config = $adiinviter->services_config[$service_key];
				$config['service_key'] = $service_key;
			}
			
			$share_type = POST_var('share_type', ADI_STRING_VARS, 'a-z0-9_');
			$content_id = POST_var('content_id', ADI_INT_VARS);
			$allow_share = $adiinviter->is_sharing_allowed($share_type, $content_id);
			if(!$allow_share)
			{
				$share_type = ''; $content_id = 0;
			}
			
			$config['share_type'] = $share_type;
			$config['content_id'] = $content_id;

			if(!is_array($config) || count($config) == 0)
			{
				$popup_message_text = $adiinviter->phrases['adi_msg_no_contacts_selected'];
				$contents .= eval(adi_get_template('popup_final_message'));
			}
			else if(!is_array($config) || count($config) == 0)
			{
				$popup_message_text = $adiinviter->phrases['adi_msg_no_contacts_selected'];
				$contents .= eval(adi_get_template('popup_final_message'));
			}
			else
			{
				$adi_sender_name = ''; $adi_sender_email = '';
				$attach_note = POST_var('adi_attach_note_txt_input', ADI_PLAIN_TEXT_VARS);

				$adi_sender_name  = POST_var('adi_sender_name', ADI_STRING_VARS);
				$adi_sender_email = POST_var('adi_sender_email', ADI_STRING_VARS);

				$handler_file = ADI_CORE_PATH.'invitation_handler.php';
				require_once($handler_file);
				if($config['share_type'] == '')
				{
					$inv_handler = get_resource('Adi_Invitations');
				}
				else
				{
					$inv_handler = get_resource('Adi_Content_Share');
				}

				$inv_handler->set_invitation_type($share_type, $content_id);

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
					$popup_message_text = adi_replace_vars($adiinviter->phrases['adi_ip_invitation_sent_message_txt'], array(
						'invitation_count' => $success_count,
					));
					$contents .= eval(adi_get_template('popup_final_message'));
				}
				else
				{
					echo $adiinviter->error->generate_error_for_js();
				}
			}
		break;

		case 'final_message':
			$popup_message_text = $adiinviter->phrases['adi_ip_block_default_message'];
			$contents .= eval(adi_get_template('popup_final_message'));
		break;

		case 'get_sender_info':
			$attach_note = POST_var('adi_attach_note_txt_input', ADI_PLAIN_TEXT_VARS);
			$contents .= eval(adi_get_template('sender_information_html'));
		break;


		case 'security_check' :
			if(is_POST('recaptcha_challenge_field') || is_POST('recaptcha_response_field'))
			{
				$adi_challenge = POST_var('recaptcha_challenge_field', ADI_STRING_VARS);
				$adi_answer    = POST_var('recaptcha_response_field',  ADI_STRING_VARS);
				$contents      = "adipps.rc.show_err(); Recaptcha.reload();";

				if(!empty($adi_challenge) && !empty($adi_answer))
				{
					require_once(ADI_CORE_PATH . 'recaptchalib.php');
					$publickey  = $adiinviter->settings['captcha_public_key'];
					$privatekey = $adiinviter->settings['captcha_private_key'];

					$resp = recaptcha_check_answer($privatekey, $_SERVER['REMOTE_ADDR'], $adi_challenge, $adi_answer);
					if(!$resp->is_valid)
					{
						$contents = "adipps.rc.show_err();Recaptcha.reload();";
					}
					else {
						$contents = "adipps.rc.set_key('".$adiinviter->get_scc_key()."');";
					}
				}
			}
			else
			{
				$contents .= eval(adi_get_template('popup_show_captcha'));
			}
		break;


		// Special Content share check implemented for Wordpress package 3.5.1.
		case 'check_content_share':
			$content_settings = adi_getSetting('content_share_post_share');

			$pids = POST_var('post_ids', ADI_ARRAY_VARS);
			$response_arr = array();

			if(count($pids) > 0 && $adiinviter->settings['adiinviter_onoff'] == 1 && $content_settings['content_share_on_off'] == 1)
			{
				$restricted_ids = array();
				if(!empty($content_settings['restricted_ids']))
				{
					$restricted_ids = explode(',', $content_settings['restricted_ids']);
				}
				$restricted_category_ids = array();
				if(!empty($content_settings['restricted_category_ids']))
				{
					$restricted_category_ids = explode(',', $content_settings['restricted_category_ids']);
				}

				foreach($pids as $postid)
				{
					$response_arr[$postid] = 1;
					if(is_numeric($postid) && $postid > 0)
					{
						if(in_array($postid, $restricted_ids))
						{
							unset($response_arr[$postid]);
						}

						$categories = get_the_category($postid);
						if(count($categories) > 0 && count($restricted_category_ids) > 0)
						{
							foreach($categories as $categ)
							{
								if(in_array($categ->term_id, $restricted_category_ids))
								{
									unset($response_arr[$postid]);
								}
							}
						}
					}
				}
			}
			$contents = json_encode($response_arr);
		break;

		default:
			break;
	}
}

echo $contents;




?>
