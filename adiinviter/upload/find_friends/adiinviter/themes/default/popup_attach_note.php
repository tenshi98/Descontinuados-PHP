<table cellspacing="0" cellpadding="0" class="adi_clear_table">
<tr class="adi_clear_tr"><td class="adi_clear_td">

<div class="adi_popup_inner_space">
	<div class="adi_attach_note_desc">
		<!-- Sub Header -->
		<div class="adi_popup_header adi_attach_note_title">{adi:phrase adi_attach_note}</div>

		<!-- Attach note limit -->
		<div class="adi_attach_note_limit_out">
			<span class="adi_nc_attach_note_limit">{adi:var $adiinviter->settings['attach_note_length_limit']}</span>
			<span class="adi_attach_note_limit_desc">{adi:phrase adi_pp_attach_note_desc}</span>
		</div>
		<div class="adi_clear"></div>

		<!-- Attach note box -->
		<textarea class="adi_attach_note_input adi_attach_note_input"></textarea>
	</div>

	<!-- Action Buttons -->
	<div class="adi_action_buttons">
		<input type="button" class="adi_button adi_attach_note_cancel" value="{adi:phrase adi_cancel_btn_label}">
		<input type="button" class="adi_button adi_attach_note_save adi_buttons_left_space" value="{adi:phrase adi_ok_btn_label}">
	</div>
</div>

</td></tr></table>