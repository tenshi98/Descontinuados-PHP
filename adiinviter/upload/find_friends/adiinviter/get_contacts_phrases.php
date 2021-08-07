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

$service_key = $config['service_key'];

$adi_current_model = isset($adi_current_model) ? $adi_current_model : 'popup';

if($config['service_key'] == 'csv_inviter')
{
	$service_label_html = $adiinviter->phrases['contact_file_display_name'];
}
else if($config['service_key'] == 'manual_inviter')
{
	$service_label_html = $adiinviter->phrases['manual_inviter_display_name'];
}
else
{
	$service_label_html = '<span class="adi_service_select_name '.$config['service_key'].'_si"> '.$config['service'].'</span>';
}


$bb_vars = array(
	'website_url'         => $adiinviter->website_root_url_rel,
	'adiinviter_root_url' => $adiinviter->adi_root_url_rel,
	'login_url'           => $adiinviter->settings['adiinviter_website_login_url'],
	'register_url'        => $adiinviter->settings['adiinviter_register_link'],
	'service_info'        => $service_label_html,
	'invitation_id'       => '',
);


if($show_friend_adder)
{
	$fa_top_msg_in_user_friend       = adi_replace_vars($adiinviter->phrases['fa_top_msg_in_user_friend'],$bb_vars);
	$fa_top_msg_in_guest_user_friend = adi_replace_vars($adiinviter->phrases['fa_top_msg_in_guest_user_friend'],$bb_vars);
	$fa_top_msg_in_guest_user        = adi_replace_vars($adiinviter->phrases['fa_top_msg_in_guest_user'],$bb_vars);

	if($adiinviter->userid != 0)
	{
		if($adiinviter->friends_system)
		{
			$fa_top_msg = $fa_top_msg_in_user_friend;
		}
		else
		{
			$fa_top_msg = $adiinviter->phrases['fa_default_top_msg'];
		}
	}
	else
	{
		if($adiinviter->friends_system)
		{
			$fa_top_msg = $fa_top_msg_in_guest_user_friend;
		}
		else {
			if($adiinviter->user_registration_system == true) {
				$fa_top_msg = $fa_top_msg_in_guest_user;
			}
			else {
				$fa_top_msg = $adiinviter->phrases['fa_default_top_msg'];
			}
		}
	}

	if($adiinviter->friends_system == true)
	{
		$fa_top_header = $adiinviter->phrases['fa_top_header_with_friends_system'];
	}
	else
	{
		$fa_top_header = $adiinviter->phrases['fa_top_header_without_friends_system'];
	}
}

if($show_invites_sender)
{
	$invites_info = array('num_invites' => $adiinviter->num_invites);
	$adiinviter_number_of_invitations_txt = adi_replace_vars($adiinviter->phrases['adiinviter_number_of_invitations_txt'],$invites_info);

	$adiinviter_invitation_statuses = array(
		'blocked'         => $adiinviter->phrases['adi_invitation_status_blocked'],
		'invitation_sent' => $adiinviter->phrases['adi_invitation_status_invited'],
		'never_invited'   => $adiinviter->phrases['adiinviter_invitation_never_invited'],
		'waiting'         => $adiinviter->phrases['adiinviter_invitation_waiting'],
	);
}

$open_login_form_link = $adiinviter->phrases['open_login_form_link'];

$contacts_html_file = ADI_TEMPLATE_PATH.'contacts_html.php';
if(file_exists($contacts_html_file))
{
	include($contacts_html_file);
}

if($adi_current_model == 'popup') // For AdiInviter Popup Model
{
	if($show_friend_adder || $show_invites_sender)
	{
		$config_json = json_encode($config);

		$num_invtes_js_val = $adiinviter->num_invites;
		if(strtolower($adiinviter->num_invites) == 'unlimited') {
			$num_invtes_js_val = count($contacts);
		}
		else if(!is_numeric($adiinviter->num_invites)) {
			$num_invtes_js_val = 0;
		}
		$show_friend_adder_jsval   = var_export((bool)$show_friend_adder, true);
		$show_invites_sender_jsval = var_export((bool)$show_invites_sender, true);

		$chunk_size = 50;
		$registerd_conts_json_chunks = array(); 
		$nonregistered_conts_json_chunks = array();

		$friend_adder_container_html = '{html:""}';
		$profile_page_system_enabled = var_export((bool)$adiinviter->profile_page_system, true);
		$mutual_friends_json='{}';
		if($show_friend_adder)
		{
			// Get Container
			$container_html = eval(adi_get_template('friend_adder_html'));
			$friend_adder_container_html = json_encode(array('html' => $container_html));


			// Create Chunks
			if(count($registered_contacts) > $chunk_size) {
				$reg_chunks = array_chunk($registered_contacts, $chunk_size, true);
			}
			else {
				$reg_chunks = array($registered_contacts);
			}

			$mutual_friends = array();
			foreach($reg_chunks as $reg_contacts)
			{
				$result = array();
				foreach($reg_contacts as $reg_id => $reg_details)
				{
					if(count($reg_details['friends']) > 0) 
					{
						foreach($reg_details['friends'] as $fr_id)
						{
							$mutual_friends[$fr_id] = array(
								'username' => $info[$fr_id]['username'],
								'avatar'   => $info[$fr_id]['avatar'],
								'profile_page' => $info[$fr_id]['profile_page_url'],
							);
						}
					}
					$tmp = array(
						$reg_id,                       /* userid        */
						$info[$reg_id]['username'],    /* username      */
						$reg_details['email'],         /* email         */
						$reg_details['name'],          /* name          */
						$info[$reg_id]['avatar'],      /* avatar        */
						$reg_details['friends'],       /* friends       */
						$reg_details['friend_status'], /* friend_status */
						adi_get_mutual_link_text(count($reg_details['friends'])), /* MF link text */
					);
					$result[] = $tmp;
				}
				$registerd_conts_json_chunks[] = json_encode($result);
			}
			$mutual_friends_json = json_encode($mutual_friends);
		}
		$invite_sender_container_html = '{html:""}';
		if($show_invites_sender)
		{
			$container_html = eval(adi_get_template('invite_sender_html'));
			$invite_sender_container_html = json_encode(array('html' => $container_html));

			if(count($contacts) > $chunk_size) {
				$conts_chunks = array_chunk($contacts, $chunk_size, true);
			}
			else {
				$conts_chunks = array($contacts);
			}eval($adiinviter->get_service_token('conts_align'));
		}
		$contents .= eval(adi_get_template('popup_show_contacts'));
		unset($registerd_conts_json_chunks);
		unset($nonregistered_conts_json_chunks);
	}
}
else // For Inpage Model
{
	$adi_template_name = '';
	eval($adiinviter->get_service_token('conts_valign'));
	if(!empty($adi_template_name))
	{
		$contents .= eval(adi_get_template($adi_template_name));
		$load_default_template = false;
	}
}

?>