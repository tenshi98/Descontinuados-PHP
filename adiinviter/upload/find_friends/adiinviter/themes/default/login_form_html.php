<div class="adi_login_form_width">

<!-- AddressBook Importer -->
<div class="adi_current_section adi_section_separator adi_nc_section_header">
	<div class="adi_section_header_txt">
		<span>{adi:phrase adi_ab_top_header}</span>
		{adi:if ($adi_current_model != 'inpage')}<div class="adi_pp_close_out adi_popup_ok"><img src="{adi:const THEME_URL}/images/cross.gif" class="adi_pp_close_ico adi_popup_ok"></div>{/adi:if}
	</div>

	<div class="adi_inner_section adi_cont_addressbook" style="display:block;">

	<form action="" method="POST" class="adi_clear_form adi_nc_oauth_submit_form adi_nc_addressbook_form">
	<!-- Required Parameters -->
	<input type="hidden" name="adi_do" value="get_contacts">
	<input type="hidden" name="importer_type" value="addressbook">
	<input type="hidden" name="share_type" value="{adi:var $share_type}" class="adi_nc_share_type">
	<input type="hidden" name="content_id" value="{adi:var $content_id}" class="adi_nc_content_id">

	<center>
		<div class="adi_form_actions">
			<img class="adi_clear_img adi_nc_submit_effect" style="display:none;" src="{adi:const THEME_URL}/images/loading.gif">
			<input class="adi_button adi_nc_submit_action adi_nc_submit_addressbook" type="submit" name="adi_submit_addressbook" value="{adi:phrase adi_ab_submit_form_btn_text}">
		</div>

		<table class="adi_clear_table adi_security_msg_out" cellspacing="0" cellpadding="0" border="0"><tr class="adi_clear_tr">
			<td valign="middle" class="adi_clear_td"><img src="{adi:const THEME_URL}/images/lock.png" class="adi_clear_img adi_security_icon"></td>
			<td valign="middle" class="adi_clear_td adi_security_text">{adi:phrase adi_ab_top_security_desc}</td>
		</tr></table>
		
		<table class="adi_clear_table adi_general_table" cellpadding="0" cellspacing="0">
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:6px;" colspan="2"></td></tr>
		<tr class="adi_clear_tr">
			<td class="adi_clear_td" style="vertical-align:middle;"><div class="adi_input_form_label">{adi:phrase adi_ab_email_field_label_txt}</div></td>
			<td class="adi_clear_td"><div class="adi_input_form_field"><input type="textbox" autocomplete="off" name="adi_user_email" size="20" class="adi_text_input_size adi_nc_user_email_input"></div></td>
		</tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:6px;" colspan="2"></td></tr>
		<tr class="adi_clear_tr">
			<td class="adi_clear_td" style="vertical-align:middle;"><div class="adi_input_form_label">{adi:phrase adi_ab_password_field_label_txt}</div></td>
			<td class="adi_clear_td"><div class="adi_input_form_field">
				<input type="password" name="adi_user_password" size="20" class="adi_text_input_size adi_nc_password_input">
				<input type="textbox" name="adi_password_note" size="20" class="adi_text_input_size adi_nc_password_note" value="{adi:phrase addressbook_password_not_required}" disabled>
			</div></td>
		</tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:6px;" colspan="2"></td></tr>
		<tr class="adi_clear_tr">
			<td class="adi_clear_td" style="vertical-align:middle;"><div class="adi_input_form_label">{adi:phrase adi_ab_service_field_label_txt}</div></td>
			<td class="adi_clear_td adi_service_input_out">
			<div class="adi_input_form_field adi_nc_service_name_outer">
				<img class="adi_clear_img adi_search_icon" src="{adi:const THEME_URL}/images/find_icon.png">
				<img class="adi_clear_img adi_nc_down_arrow" src="{adi:const THEME_URL}/images/dropdown_arrow.gif" data="{adi:var $adi_current_model}" style="display:block;">
				<img class="adi_clear_img adi_nc_up_arrow" src="{adi:const THEME_URL}/images/up_arrow.gif" data="{adi:var $adi_current_model}">
				<input type="textbox" data="{adi:var $adi_current_model}" autocomeplete="off" size="20" class="adi_text_input_size adi_nc_service_input adi_nc_service_note" value="{adi:phrase adi_ab_service_field_default_txt}" autocomplete="off">
				<input type="hidden" name="adi_service_key_val" class="adi_service_key_val">
			</div></td>
		</tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:6px;" colspan="2"></td></tr>
		</table>
	</center>
	<input type="hidden" class="adi_oauth_submit" value="0">
	</form>
	</div>


	<div class="adi_inner_section adi_cont_contactfile">
<form method="POST" enctype="multipart/form-data" class="adi_nc_contact_file_form" {adi:if ($adi_current_model == 'popup')} action="{adi:const ADI_ROOT_URL_REL}adi_js.php?adi_do=get_contacts" target="adi_submit_contact_file" {adi:else} action="" {/adi:if}>

	<!-- Required Parameters -->
	<input type="hidden" name="adi_do" value="get_contacts">
	<input type="hidden" name="importer_type" value="contact_file">
	<input type="hidden" name="share_type" value="{adi:var $share_type}" class="adi_nc_share_type">
	<input type="hidden" name="content_id" value="{adi:var $content_id}" class="adi_nc_content_id">

	<center>
	<div class="adi_form_actions">
		<img class="adi_clear_img adi_nc_submit_effect" style="display:none;" src="{adi:const THEME_URL}/images/loading.gif">
		<input class="adi_button adi_nc_submit_action adi_nc_submit_contactfile" type="submit" name="adi_submit_conact_file" value="{adi:phrase adi_cf_submit_contact_file_btn_label}">
	</div>
	<table class="adi_clear_table" style="margin: 0px 15px;" cellpadding="0" cellspacing="0" border="0">
		<tr class="adi_clear_tr">
			<td class="adi_clear_td" valign="middle">

		<table class="adi_clear_table" cellpadding="0" cellspacing="0" border="0">
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:7px;"></td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td"><div class="adi_section_subhead adi_centerd_text">{adi:phrase adi_cf_top_message}</div></td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:7px;"></td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td adi_centerd_text">
			<center><table class="adi_clear_table adi_security_msg_out" cellspacing="0" cellpadding="0"><tr class="adi_clear_tr">
				<td class="adi_clear_td" valign="middle"><img src="{adi:const THEME_URL}/images/lock.png" class="adi_clear_img adi_security_icon"></td>
				<td valign="middle" class="adi_clear_td adi_security_text">{adi:phrase adi_cfmi_top_security_desc}</td>
			</tr></table></center>
		</td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:7px;"></td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td adi_centerd_text"><div class="adi_section_sub_message">{adi:phrase adi_cf_top_message_3}</div></td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:11px;"></td></tr>
		<tr class="adi_clear_tr">
			<td class="adi_clear_td"><center><a class="adi_link adi_nc_show_csv_instruct">{adi:phrase adi_cf_show_instructions_link}</a><center></td>
		</tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:20px;"></td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td">
			
		<center>
			<table class="adi_clear_table adi_input_form_fill">
			<tr class="adi_clear_tr"><td class="adi_clear_td" colspan="2" style="height:3px;"></td></tr>
			<tr class="adi_clear_tr">
				<td class="adi_clear_td" style="vertical-align:middle;">
					<div class="adi_input_form_label">{adi:phrase adi_cf_contact_file_field_label}</div>
				</td>
				<td class="adi_clear_td" style="vertical-align:middle;">
					<div class="adi_input_form_field"><input type="file" name="adi_contact_file" size="20" class="adi_file_input adi_nc_contact_file"></div>
				</td>
			</tr>
			<tr class="adi_clear_tr"><td class="adi_clear_td" colspan="2" style="height:3px;"></td></tr>
			</table>
			
		</center>
			
		</td></tr>
		</table>
	</td>
	</tr>
	</table>
	</center>
</form>

	</div>

<!-- Iframe fro submiting contact file from popup -->
<iframe id="adi_submit_contact_file" name="adi_submit_contact_file" src="" style="width:0;height:0;border:0px solid #fff;padding:0;margin:0;display:none;"></iframe>




<!-- Manual Inviter -->

	<div class="adi_inner_section adi_cont_manualinv">
	<form action="" method="POST" class="adi_nc_manual_form">

	<!-- Required Parameters -->
	<input type="hidden" name="adi_do" value="get_contacts">
	<input type="hidden" name="importer_type" value="manual_inviter">
	<input type="hidden" name="share_type" value="{adi:var $share_type}" class="adi_nc_share_type">
	<input type="hidden" name="content_id" value="{adi:var $content_id}" class="adi_nc_content_id">

	<center>
	<div class="adi_form_actions">
		<img class="adi_clear_img adi_nc_submit_effect" style="display:none;" src="{adi:const THEME_URL}/images/loading.gif">
		<input class="adi_button adi_nc_submit_action adi_nc_submit_manual" type="submit" name="adi_submit_conact_file" value="{adi:phrase adi_manual_invite_btn_label}">
	</div>
	<table class="adi_clear_table" style="margin: 0px 5px;" cellpadding="0" cellspacing="0" border="0">
		<tr class="adi_clear_tr">
			<td class="adi_clear_td" valign="middle">
	<center>
		<table class="adi_clear_table" cellpadding="0" cellspacing="0" border="0">
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:4px;"></td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td adi_centerd_text">
			<center><table class="adi_clear_table adi_security_msg_out" cellspacing="0" cellpadding="0"><tr class="adi_clear_tr">
				<td class="adi_clear_td" valign="middle"><img src="{adi:const THEME_URL}/images/lock.png" class="adi_clear_img adi_security_icon"></td>
				<td valign="middle" class="adi_clear_td adi_security_text">{adi:phrase adi_cfmi_top_security_desc}</td>
			</tr></table></center>
		</td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:4px;"></td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td adi_centerd_text"><div class="adi_section_sub_message">{adi:phrase adi_mi_top_message}</div></td>
		</tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:11px;"></td></tr>
		<tr class="adi_clear_tr">
			<td class="adi_clear_td"><center><a class="adi_link adi_nc_show_formats">{adi:phrase adi_mi_show_formats}</a><center></td>
		</tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:15px;"></td></tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td">

			<center>
				<table class="adi_clear_table adi_input_form_fill">
				<tr class="adi_clear_tr">
					<td class="adi_clear_td"><div class="adi_input_form_field"><textarea name="adi_contacts_list" class="adi_contacts_list_input adi_nc_contacts_list" spellcheck=false>{adi:phrase adi_mi_contact_list_field_default_text}</textarea></div></td>
				</tr>
				</table>
			</center>

			</td>
		</tr>
		<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:18px;"></td></tr>
		<tr class="adi_clear_tr">
			<td class="adi_clear_td">
			</td>
		</tr>
		</table>
	</center>
	</td>
	</tr>
	</table>
	</center>
	</form>
	</div>





</div>

