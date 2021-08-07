<div class="adiinviter adi_pp_final_msg_width">
	<div class="adi_block2_header">{adi:phrase adi_invite_block_header}<div class="adi_pp_close_out adi_popup_ok"><img src="{adi:const THEME_URL}/images/cross.gif" class="adi_pp_close_ico adi_popup_ok"></div></div>
	<center>
		<table class="adi_clear_table adiinviter" cellpadding="0" cellspacing="0" border="0"><tr class="adi_clear_tr"><td class="adi_clear_td">
		<form action="" method="POST" class="adi_clear_form adi_pp_redirect_form">
			<input type="hidden" name="adi_do" value="adi_redirect">
			{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
				<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
			{/adi:foreach}
			<div class="adi_pp_messages_out">
				<!-- Display Message -->
				<div class="adi_ip_final_msg_txt">{adi:var $popup_message_text}</div>

				<!-- Action Buttons -->
				<div class="adi_msg_btn_out">
					<input type="button" class="adi_button adi_pp_redirect" name="adi_invite_more" value="{adi:phrase adi_invite_more}">

					{adi:if ($adiinviter->userid == 0)}
						<input type="button" class="adi_button adi_pp_redirect adi_buttons_left_space" name="adi_website_register" value="{adi:phrase adi_register_btn_label}">
					{adi:else/}
						<input type="button" class="adi_button adi_pp_redirect adi_buttons_left_space" name="adi_invite_history" value="{adi:phrase adi_invite_history_btn_label}">
					{/adi:if}

				</div>
			</div>
		</form>
		</td></tr></table>
	</center>
</div>

<script type="text/javascript">
	adi.allocate_intr('fmpp', jQuery('.adi_pp_final_msg_width'));
</script>
