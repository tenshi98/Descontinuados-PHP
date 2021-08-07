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

$base_path = dirname(__FILE__);
include($base_path.DIRECTORY_SEPARATOR.'init.php');

/*$code_name = 'language_phrases';
$default_lang_code = $_GET['getPhrases'];
include($base_path.DIRECTORY_SEPARATOR.'adiinviter_common_codes.php');*/

$path = ADI_CORE_PATH.'lang'.ADI_DS;

include($path.DIRECTORY_SEPARATOR.'en-us-adiinviter.php');
$default_phrases = $phrases;

$getPhrases = GET_var('getPhrases', ADI_STRING_VARS);
if(file_exists($path.$getPhrases.'.php'))
{
    include($path.$getPhrases.'.php');
}


/*$phrasegroups = array(
  'inpage_model' => array(
    'adiinviter_email_username' => '',
    'adiinviter_mass_friend_adder' => '',
    'adiinviter_mass_invite_sender' => '',
    'adiinviter_contacts_importer' => '',
    'adiinviter_attachment_header' => '',
  ),
  'overlay_model_show_contacts' => array(
    'adiinviter_contact_to_add_friend' => '',
    'adiinviter_select_all' => '',
    'adiinviter_choose_different_service' => '',
    'adiinviter_selected' => '',
    'adiinviter_all' => '',
    'adiinviter_find_friends_label' => '',
    'adiinviter_mutual_friends' => '',
    'adiinviter_skip' => '',
    'adiinviter_add_as_friend' => '',
    'adiinviter_number_of_invitations' => '',
    'adiinviter_contact_to_send_invite' => '',
    'adiinviter_preview_header' => '',
    'adiinviter_attachment_note' => '',
    'adiinviter_send_invites' => '',
    'adiinviter_atatch_note_header' => '',
    'adiinviter_characters_limit_text' => '',
    'adiinviter_ok' => '',
    'adiinviter_cancel' => '',
    'adiinviter_invite_more' => '',
    'adiinviter_friend_request_not_alllowed' => '',
    'adiinviter_friend_requests_sent' => '',
    'adiinviter_invitations_sent' => '',
    'adiinviter_choose_contact_file' => '',
    'adiinviter_contacts_array_empty' => '',
    'adiinviter_email_field_not_detected' => '',
    'adiinviter_email_list_blank' => '',
  ),
  'overlay_model' => array(
    'adiinviter_popup_header' => '',
    'adiinviter_addressbook' => '',
    'adiinviter_contact_file_only' => '',
    'adiinviter_manual_inviter_only' => '',
    'adiinviter_not_store_password_message' => '',
    'adiinviter_allowed_domains_list' => '',
    'adiinviter_supported_services_list' => '',
    'adiinviter_service' => '',
    'adiinviter_email' => '',
    'adiinviter_member_name' => '',
    'adiinviter_screen_name' => '',
    'adiinviter_username' => '',
    'adiinviter_password' => '',
    'adiinviter_start_typing_here' => '',
    'adiinviter_not_required' => '',
    'adiinviter_import_contacts' => '',
    'adiinviter_login_to' => '',
    'adiinviter_contact_file_message1' => '',
    'adiinviter_we_will_not_send_emails' => '',
    'adiinviter_upload_contact_file' => '',
    'adiinviter_supported_file_formats' => '',
    'adiinviter_how_create_contact_file' => '',
    'adiinviter_contact_file' => '',
    'adiinviter_enter_your_contacts_message' => '',
    'adiinviter_supported_formats_list' => '',
    'adiinviter_enter_your_contacts_here' => '',
    'adiinviter_fill_all_fields' => '',
    'adiinviter_please_enter_password' => '',
    'adiinviter_email_field_blank' => '',
    'adiinviter_name' => '',
    'adiinviter_supported_formats_message' => '',
  ),
  'content_share' => array(
    'adiinviter_topic_share_table_header' => '',
    'adiinviter_topic_expire_after_days' => '',
    'adiinviter_topic_title_header' => '',
  ),
  'invites_history' => array(
    'adiinviter_invites_history' => '',
    'adiinviter_expire_after_days' => '',
    'adiinviter_reminder_after_days' => '',
    'adiinviter_total' => '',
    'adiinviter_sr_no' => '',
    'adiinviter_imported_from' => '',
    'adiinviter_sent_to' => '',
    'adiinviter_status' => '',
    'adiinviter_issued' => '',
    'adiinviter_accepted_by' => '',
    'adiinviter_first' => '',
    'adiinviter_last' => '',
    'adiinviter_reset' => '',
    'adiinviter_save_changes' => '',
    'adiinviter_resend_invitation' => '',
    'adiinviter_record_delete_button' => '',
    'adiinviter_download_adiinviter_csv' => '',
    'adiinviter_changes_made_successfully' => '',
    'adiinviter_invhist_noinvites' => '',
    'adiinviter_click_here_to_invite' => '',
    'adiinviter_resent' => '',
  ),
  'invitation' => array(
    'adiinviter_want_to_share_thread' => '',
  ),
  'verify_invitation' => array(
    'adiinviter_adiinviter_invitation' => '',
    'adiinviter_invitation_blocked' => '',
    'adiinviter_invitation_expired' => '',
    'adiinviter_invalid_link' => '',
  ),
  'adv_verify_invitation' => array(
    'adiinviter_verify_invitation' => '',
    'adiinviter_no_service_specified' => '',
    'adiinviter_adv_security_message' => '',
    'adiinviter_adv_message' => '',
  ),
  'invitation_status' => array(
    'adiinviter_accepted' => '',
    'adiinviter_expired' => '',
    'adiinviter_blocked' => '',
    'adiinviter_pending' => '',
    'adiinviter_waiting_mail_queue' => '',
  ),
  'claim_invitation' => array(
    'adiinviter_claim_your_invitations_header' => '',
    'adiinviter_enter_invitations_key' => '',
    'adiinviter_claim_now' => '',
    'adiinviter_add_more' => '',
    'adiinviter_claim_now_header' => '',
    'adiinviter_block_invitation' => '',
    'adiinviter_accept_invitation' => '',
  ),
  'plugins' => array(
    'adiinviter_plus_more' => '',
  ),
  'recaptcha' => array(
    'adiinviter_security_check_header' => '',
    'adiinviter_security_check_image_header' => '',
    'adiinviter_security_check_image_text' => '',
    'adiinviter_security_check_audio_header' => '',
    'adiinviter_security_check_audio_text' => '',
    'adiinviter_security_check_wrong_words' => '',
    'adiinviter_security_check_text_label' => '',
    'adiinviter_security_check_failed' => '',
    'adiinviter_security_play_again' => '',
    'adiinviter_security_audio_download' => '',
  ),
  'guest_mode' => array(
    'adiinviter_your_name' => '',
    'adiinviter_your_email' => '',
    'adiinviter_guest_form_header' => '',
    'adiinviter_guest_form_security_message' => '',
    'adiinviter_name_email_guest_message' => '',
    'adiinviter_guest_mode_off_message' => '',
    'adiinviter_continue' => '',
  ),
  'system_errors' => array(
  	 'adiinviter_you_got_an_error' => '',
    'adiinviter_check_adiinviter_admincp' => '',
    'adiinviter_enter_full_email_address' => '',
    'adiinviter_enter_the_username' => '',
    'adiinviter_invalid_format' => '',
    'adiinviter_invalid_response_server' => '',
    'adiinviter_loading_please_wait' => '',
    'adiinviter_login_failed' => '',
    'adiinviter_message_sending_failed' => '',
    'adiinviter_name_field_not_detected' => '',
    'adiinviter_no_contacts_in_addressbook' => '',
    'adiinviter_no_contacts_in_contact_file' => '',
    'adiinviter_no_friends' => '',
    'adiinviter_not_valid_domain' => '',
    'adiinviter_please_wait' => '',
    'adiinviter_request_server_failed' => '',
    'adiinviter_unable_to_get_conts' => '',
    'adiinviter_unknown_name' => '',
    'adiinviter_service_not_available' => '',
    'adiinviter_select_atleast_one' => '',
    'adiinviter_unknown_error' => '',
    'adiinviter_wrong_service' => '',
    'adiinviter_invalid' => '',
    'adiinviter_delete_record_no_perm' => '',
    'adiinviter_file_format_unsupported' => '',
    'adiinviter_all_contacts_pending' => '',
    'adiinviter_all_contacts_friends' => '',
    'adiinviter_all_contacts_pending_or_friends' => '',
    'adiinviter_invitation_already_claimed' => '',
    'adiinviter_invalid_email_address' => '',
    'adiinviter_no_contacts_parsed' => '',
    'adiinviter_no_permissions_message' => '',
    'adiinviter_invite_only_message' => '',
    'adiinviter_sending_invites_message' => '',
    'adiinviter_restricted_topic' => '',
    'adiinviter_waiting_for_server_response' => '',
    'adiinviter_select_atleast_one_short' => '',
  ),
  'register_page' => array(
    'adiinviter_register_claim_keys_header' => '',
    'adiinviter_register_claim_keys_description' => '',
  ),
  'topic_redirect' => array(
    'adiinviter_topic_redirect_header' => '',
    'adiinviter_veiw_topic' => '',
    'adiinviter_redirect_message' => '',
    'adiinviter_redirect_message1' => '',
  ),
  'other' => array(
    'adiinviter_your_manualy_entered_list' => '',
    'adiinviter_your_friends_on_bbtitle' => '',
    'adiinviter_invitation_claimed_count' => '',
    'adiinviter_record_deleted' => '',
    'adiinviter_wrong_email_address' => '',
  ),
);




$phrasegroup_details = array(
	'invitation_status' => 'AdiInviter Invitation Status',
	'overlay_model' => 'AdiInviter Overlay model',
	'overlay_model_show_contacts' => 'AdiInviter contacts table ',
	'inpage_model' => 'AdiInviter In-page model',
	'content_share' => 'AdiInviter Content share',
	'invites_history' => 'Invites History',
	'invitation' => 'Invitation',
	'verify_invitation' => 'Verify AdiInviter Invitation',
	'adv_verify_invitation' => 'Verify AdiInviter Invitation for the services which requries external authontication',
	'claim_invitation' => 'Claim AdiInviter invitation(s)',
	'plugins' => 'AdiInviter plugins',
	'recaptcha' => 'AdiInviter Recaptcha system',
	'guest_mode' => 'Guest Mode',
	'system_errors' => 'Random AdiInviter system errors',
	'register_page' => 'Claim keys field in register form',
	'topic_redirect' => 'Topic redirect Popup',
	'other' => 'Other phrases',
);*/

	include($path.$getPhrases.'.php');
	$second_lang_name = $lang_name;

    $page_no = GET_var('page_no', ADI_INT_VARS);
    $page_no = max(1,$page_no);
    $page_size = 25;


    $total_phrases = count($phrases);
    if($total_phrases > 0)
    {
        $total_pages = ceil($total_phrases/$page_size);
        $page_no = min($page_no, $total_pages);

        $offset = ($page_no - 1) * $page_size;
		echo '
		<div class="fieldset">
        <center>
		<table class="adiinviter_table phrases_table" style="margin-bottom:20px;">
		';
        $odd_row = false;
        $off_cnt = 0;
		foreach($phrases as $varname => $phrase_text)
		{
            if($off_cnt >= $offset && $off_cnt<($offset+$page_size))
            {
			// $phrase_text = $phrases[$phrase];
			$rows = min(5,max(2, ceil(strlen($phrase_text)/60)));
			$encoded_text = htmlentities($phrase_text);
            $odd_row = !$odd_row;
			echo '<tr class="'.($odd_row?'odd':'').'">
				<td>'.$varname.'
                <div style="display:none;" class="edit_phrase_forms" id="edit_phrase_form_'.$off_cnt.'">
                    <br>
                    <form action="" method="post" onsubmit="return save_edit_phrase_form(this,\'edit_phrase_form_'.$off_cnt.'\');">
                    <table cellpadding="0" cellspacing="0" width="100%" class="edit_phrase_tb" style="max-width:820px;">
                    <tr>
                        <td style="width:50%;">
                            <span style="color:#787878;">Default Text:</span><br>
                            <textarea disabled cols="62" rows="'.$rows.'">'.(isset($default_phrases[$varname]) ? $default_phrases[$varname] : '').'</textarea>
                        </td>
                        <td>
                            <span style="color:#787878;">'.$second_lang_name.' Translation:</span><br>
                            <textarea cols="62" rows="'.$rows.'" name="phrases['.$varname.']">'.$phrases[$varname].'</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:right;padding-top:8px;">
                            <span style="display:none;color:#080;font-weight:bold;" class="done_msg">Saved </span>
                            <input class="button" type="submit" value="Save">
                            <input class="button" type="button" value="Cancel" onclick="return show_phrase_form(\'edit_phrase_form_'.$off_cnt.'\');">
                        </td>
                    </tr>
                    </table>
                    <input type="hidden" name="lang_code" value="'.$getPhrases.'">
                    </form>
                </div>
                </td>
                <td width="40"><a href="" onclick="return show_phrase_form(\'edit_phrase_form_'.$off_cnt.'\');">Edit</a></td>
			</tr>';
			/*<tr><td colspan="2" style="height:10px;"></td></tr>
			<tr>
				<td>English (US) Translation:<br><textarea disabled cols="62" rows="'.$rows.'">'.(isset($default_phrases[$varname]) ? $default_phrases[$varname] : '').'</textarea></td>
				<td>'.$second_lang_name.' Translation:<br><textarea cols="62" rows="'.$rows.'" name="phrases['.$getPhrases.']['.$varname.']">'.$phrases[$varname].'</textarea></td>
			</tr>
            <tr><td colspan="2"><hr/></td></tr>';*/
            }
            $off_cnt++;
		}
		echo '</table>';
        if($total_pages > 1)
        {
            echo '<div style="margin: 15px 0px;"><ul class="phrase_paginage">';
            if($page_no < $total_pages)
            {
                echo '<li style="width:40px;"><a href="" onclick="return getPhrases(\''.$getPhrases.'\','.$total_pages.');">Last</a></li>';
                echo '<li style="width:40px;"><a href="" onclick="return getPhrases(\''.$getPhrases.'\','.($page_no+1).');">Next</a></li>';
            }
            $start_page = max(1, $page_no-3);
            $end_page = min($page_no+3, $total_pages);
            for($i=$end_page; $i >= $start_page ; $i--)
            { 
                if($i == $page_no)
                {
                    echo '<li class="current">'.$i.'</li>';
                }
                else
                {
                    echo '<li><a href="" onclick="return getPhrases(\''.$getPhrases.'\','.$i.');">'.$i.'</a></li>';
                }
            }
            if($page_no > 1)
            {
                echo '<li style="width:40px;"><a href="" onclick="return getPhrases(\''.$getPhrases.'\','.($page_no-1).');">Prev</a></li>';
                echo '<li style="width:40px;"><a href="" onclick="return getPhrases(\''.$getPhrases.'\',1);">First</a></li>';
            }
            echo '</ul><div style="clear:both;"></div></div>';
        }
        echo '</center>
			<div class="clearboth"></div>
		</div>
		';
	}

?>