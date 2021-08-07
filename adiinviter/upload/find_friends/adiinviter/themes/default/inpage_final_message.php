<!-- Display startup errors -->
{adi:template inpage_error_display}

<script type="text/javascript"> adi.scc = 0; </script>
<table class="adi_clear_table adiinviter" cellpadding="0" cellspacing="0" border="0">
<tr class="adi_clear_tr"><td class="adi_clear_td">
	<form action="" method="POST" class="adi_clear_form adi_ip_redirect_form">
		<input type="hidden" name="adi_do" value="adi_redirect">
		{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
			<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
		{/adi:foreach}
		<div class="adi_nc_inpage_panel_outer">
			<!-- Header -->
			<div class="adi_block2_header">{adi:var $block_header_text}</div>

			<!-- Message -->
			<div class="adi_ip_final_msg_txt">{adi:var $block_message_text}</div>

			<!-- Action Buttons -->
			<div class="adi_msg_btn_out">
				<input type="submit" class="adi_button adi_ip_redirect" name="adi_invite_more" value="{adi:phrase adi_invite_more}">
				
			</div>
		</div>
	</form>
</td></tr></table>
