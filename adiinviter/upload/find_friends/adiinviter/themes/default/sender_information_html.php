
{adi:if ($adi_current_model == 'inpage')}
<!-- Outer HTML for Inpage Model -->
	{adi:template inpage_error_display}

	<table class="adi_clear_table adiinviter" cellpadding="0" cellspacing="0" border="0">
	<tr class="adi_clear_tr">
		<td class="adi_clear_td">
		<form action="" method="POST" class="adi_clear_form">

			<input type="hidden" name="adi_do" value="submit_invite_sender">

			<div class="adi_nc_inpage_panel_outer">
{adi:else/}
<!-- Outer HTML for Popup Model -->
	<div class="adiinviter">
		<form class="adi_clear_form adi_sender_information_form" action="" method="POST">
{/adi:if}

{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
	<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
{/adi:foreach}

<!-- Common HTML -->
<div class="adi_block2_header adi_sinfo_header">
	{adi:phrase adi_ip_sinfo_block_header}
	{adi:if ($adi_current_model != 'inpage')}<div class="adi_pp_close_out adi_popup_ok"><img src="{adi:const THEME_URL}/images/cross.gif" class="adi_pp_close_ico adi_popup_ok"></div>{/adi:if}
</div>
<div class="adi_block_section_outer">
<center>

	<table class="adi_clear_table adi_security_msg_out" cellspacing="0" cellpadding="0">
	<tr class="adi_clear_tr">
		<td class="adi_clear_td" valign="middle"><img src="{adi:const THEME_URL}/images/lock.png" class="adi_security_icon" width="13" height="15"></td>
		<td valign="middle" class="adi_clear_td adi_security_text">{adi:phrase adi_ip_sinfo_security_message}</td>
	</tr>
	<tr class="adi_clear_tr">
		<td class="adi_clear_td" style="height:10px;" colspan="2"></td>
	</tr>
	</table>

	<div class="adi_section_sub_message">{adi:phrase adi_ip_sinfo_top_message}</div>

	<table class="adi_clear_table adi_input_form_fill adi_ip_sinfo_table" cellpadding="0" cellspacing="0" border="0">
	<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:10px;" colspan="2"></td></tr>
	<tr class="adi_clear_tr">
		<td class="adi_clear_td" valign="middle" style="vertical-align:middle;"><div class="adi_input_form_label adi_ip_sinfo_label">{adi:phrase adi_ip_sinfo_your_email_label}</div></td>
		<td class="adi_clear_td"><div class="adi_input_form_field adi_ip_sinfo_field"><input type="textbox" name="adi_sender_email" size="20" class="adi_text_input_size adi_sender_email_input"></div></td>
	</tr>
	<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:10px;" colspan="2"></td></tr>
	<tr class="adi_clear_tr">
		<td class="adi_clear_td" valign="middle" style="vertical-align:middle;"><div class="adi_input_form_label adi_ip_sinfo_label">{adi:phrase adi_ip_sinfo_your_name_label}</div></td>
		<td class="adi_clear_td"><div class="adi_input_form_field adi_ip_sinfo_field"><input type="textbox" name="adi_sender_name" size="20" class="adi_text_input_size adi_sender_name_input"></div></td>
	</tr>
	<tr class="adi_clear_tr"><td class="adi_clear_td" style="height:10px;" colspan="2"></td></tr>
	</table>

	<!-- Action Buttons -->
	<div class="adi_action_buttons adi_sinfo_action_buttons">
	<center>
		<input type="submit" size="20" name="adi_ip_sinfo_cancel" class="adi_button adi_ip_sinfo_cancel" value="{adi:phrase adi_cancel_btn_label}">
		<input type="submit" size="20" name="adi_ip_sinfo_submit_button" class="adi_button adi_buttons_left_space" value="{adi:phrase adi_continue_btn_label}">
	</center>
	</div>
	<!-- Custom Attach Note -->
	<textarea name="adi_attach_note_txt_input" style="display:none;">{adi:var $attach_note}</textarea>

</center>
</div>



{adi:if ($adi_current_model == 'inpage')}
<!-- Outer HTML for Inpage Model -->
				<!-- Invitation Receivers -->
				{adi:if count($contacts) > 0}
					{adi:foreach $contacts, $id, $name}<input type="hidden" name="adi_conts[{adi:var $id}]" value="{adi:var $name}">{/adi:foreach}
				{/adi:if}

				<!-- Current Service information -->
				{adi:foreach $config, $key, $value}<input type="hidden" name="adi_config[{adi:var $key}]" value="{adi:var $value}">{/adi:foreach}

			</div>
			<textarea name="adi_attach_note_txt_input" style="display:none;">{adi:var $attach_note}</textarea>
		</form>
		</td>
	</tr></table>
{adi:else/}
<!-- Outer HTML for Popup Model -->
	</form>
</div>
{/adi:if}