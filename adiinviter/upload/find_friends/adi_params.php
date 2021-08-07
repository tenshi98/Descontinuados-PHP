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
header("Content-type: text/javascript");
header("charset: UTF-8");

include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'adi_platform_init.php');
global $adiinviter;
$path = dirname(__FILE__);
include_once($path . DIRECTORY_SEPARATOR . 'adiinviter'. DIRECTORY_SEPARATOR .'init.php');

if(!headers_sent())
{
	header("Content-type: text/javascript");
	header("charset: UTF-8");
}


if($adiinviter->adiinviter_installed !== true)
{
	echo "/* AdiInviter Pro is not installed yet. */"; exit;
}

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

	$extended_options['no_avatar_img'] = $adiinviter->default_avatar;
	$extended_options['scc'] = ($adiinviter->show_recaptcha ? 0 : 1);

	$adiinviter_register_link = $adiinviter->settings['adiinviter_register_link'];
	$adiinviter_register_link = str_replace(array('[inviter_id]','[invitation_id]'), array('',''), $adiinviter_register_link);
	$extended_options['regurl'] = $adiinviter_register_link;
	$extended_options['ihurl'] = $adiinviter->invite_history_url_rel;

	$extended_options['cflt'] = $adiinviter->contact_file_size_limit * 1024;
	$extended_options['cllt'] = $adiinviter->contacts_list_length_limit;

	// Redirect Url
	echo 'jQuery.extend(adi,'.json_encode($extended_options).');'."\n\n";

	// Get Popups HTML Code
	$template_file_path = ADI_TEMPLATE_PATH . 'popup_html.php';
	include($template_file_path);
	echo "
adi.pphtml = '" . adi_parse_to_js_string($popup_with_back_panel)."';
adi.wbphtml = '"    . adi_parse_to_js_string($popup_without_back_panel)."';
";


	// Get Contacts HTML Codes
	$template_file_path = ADI_TEMPLATE_PATH . 'contacts_html.php';
	include($template_file_path);
	echo "
adi.member_html =  '".     adi_parse_to_js_string($member_without_mutual_friends)."';
adi.member_with_mf_html='".adi_parse_to_js_string($member_with_mutual_friends)."';
adi.mf_html = '".          adi_parse_to_js_string($mutual_friends_list_without_profile_page)."';
adi.mf_with_pp_html = '".  adi_parse_to_js_string($mutual_friends_list_with_profile_page)."';
adi.social_html = '".       adi_parse_to_js_string($social_contact_without_avatar)."';
adi.social_avatar_html = '".adi_parse_to_js_string($social_contact_with_avatar   )."';
adi.email_html = '".        adi_parse_to_js_string($email_contact_without_avatar )."';
adi.email_avatar_html = '". adi_parse_to_js_string($email_contact_with_avatar    )."';
	";



if($adiinviter->adiinviter_installed == true && $adiinviter->userid != 0)
{
	$query = "SELECT * FROM adiinviter WHERE receiver_userid = '".$adiinviter->userid."' AND share_type != '' AND topic_redirect = 1";
	if($row = adi_query_first_row($query))
	{
		echo "\n".'jQuery(document).ready(function(){
			setTimeout(function(){
				adipps.tr.show();	
			},2000);
		});';
	}
	
}






?>