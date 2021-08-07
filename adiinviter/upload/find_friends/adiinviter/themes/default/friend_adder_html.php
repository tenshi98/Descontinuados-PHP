<form action="" method="POST" class="adi_clear_form adi_friend_adder_form">
	<input type="hidden" name="adi_do" value="submit_friend_adder">
	<input type="hidden" name="adi_service_key_val" class="adi_service_key_val" value="{adi:var $config['service_key']}">
	{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
		<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
	{/adi:foreach}

<!-- Top Header -->
<div class="adi_block_header">
	{adi:var $fa_top_header}
	{adi:if ($adi_current_model != 'inpage')}<div class="adi_pp_close_out adi_pp_close_out_no adi_popup_ok"><img src="{adi:const THEME_URL}/images/cross.gif" class="adi_pp_close_ico adi_popup_ok"></div>{/adi:if}
</div>


<div class="adi_block_section_outer adi_upper_section adi_nc_orientation_{adi:var $adiinviter->current_orientation}">
<table class="adi_clear_table" cellpadding="0" cellspacing="0" width="100%" style="width:100%;">
<tr class="adi_clear_tr"><td colspan="2" class="adi_clear_td">
	<div class="adi_top_description_text">{adi:var $fa_top_msg}</div>
</td></tr>
<tr class="adi_clear_tr">
	<td colspan="2" class="adi_clear_td adi_left">
	<table cellpadding="0" cellspacing="0" width="100%" class="adi_clear_table" style="width:100%;">
	<tr class="adi_clear_tr">
		<td class="adi_clear_td adi_conts_table_col adi_filter_conts_out" valign="middle">
	<div class="adi_relative">
		<div class="adi_search_user_out">
			<!-- Search in contacts -->
			<img class="adi_clear_img adi_search_icon" src="{adi:const THEME_URL}/images/find_icon.png">
			<input type="textbox" class="adi_text_input adi_search_friend" value="{adi:phrase adi_search_contacts_default_text}">
		</div>
		<div class="adi_filter_buttons_out" style="margin-top:12px;">
			<!-- Go to inviter interface link -->
			<a href="{adi:if $adi_current_model != 'inpage'}{adi:var $adiinviter->inpage_model_url_rel}{/adi:if}" class="adi_link adi_goto_inviter_page_link">{adi:phrase open_login_form_link}</a>
			<span class="adi_clear_span adi_link_sep">|</span>
			<!-- Select All contacts link -->
			<a href="#" class="adi_link adi_select_all_link">{adi:phrase adi_select_all_link}</a>
		</div>
		<div style="clear:both;"></div>
	</div>
	</td></tr></table>
</td></tr></table>

</div>



<!-- Contacts Display -->
<div class="adi_conts_container_out adi_upper_section">
<table class="adi_clear_table" cellpadding="0" cellspacing="0" width="100%" style="width:100%;">
<tr class="adi_clear_tr">
	<td colspan="2" class="adi_clear_td adi_left">
	<table cellpadding="0" cellspacing="0" width="100%" class="adi_clear_table" style="width:100%;">
	<tr class="adi_clear_tr"><td class="adi_clear_td adi_conts_table_col adi_conts_outer_td">
		<div class="adi_conts_container">
			{adi:if $adi_current_model == 'inpage'}
				{adi:template registered_contacts}
			{/adi:if}
		</div>
	</td></tr>
	</table>
	</td>
</tr>
</table>
</div>


<!-- Action Buttons -->
<div class="adi_block_section_outer">
<table class="adi_clear_table" cellpadding="0" cellspacing="0" width="100%" style="width:100%;">
<tr class="adi_clear_tr">
	<td class="adi_clear_td" style="vertical-align:middle;">
		<div class="adi_contacts_info"></div>
	</td>
	<td class="adi_clear_td" style="vertical-align:middle;">
		<div class="adi_conts_action_btns_out">
		<input type="submit" class="adi_button adi_skip_button" name="adi_skip_button" value="{adi:phrase fa_skip_button_txt}">

		{adi:if $adiinviter->friends_system && $adiinviter->userid !== 0}
			<input type="submit" name="adi_add_friend_button" class="adi_button adi_buttons_left_space adi_add_friend_button" value="{adi:phrase fa_add_as_friends_btn_txt}">
		{/adi:if}
		</div>
	</td>
</tr>
</table>
</div>


{adi:if ($adi_current_model == 'inpage')}
<!-- Not-registered contacts for next step -->
{adi:if count($contacts) > 0}
	{adi:foreach $contacts, $id, $details}
		{adi:foreach $details,$key,$value}<input type="hidden" name="adi_conts[{adi:var $id}][{adi:var $key}]" value="{adi:var $value}">{/adi:foreach}
	{/adi:foreach}
{/adi:if}

<!-- Service Configuration -->
{adi:foreach $config, $key, $value}<input type="hidden" name="adi_config[{adi:var $key}]" value="{adi:var $value}">{/adi:foreach}
{/adi:if}


</form>