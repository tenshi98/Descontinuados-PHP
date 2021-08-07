<!-- Default Error Message -->
{adi:if empty($adi_global_verify_invitation_error)}
	{adi:set $adi_global_verify_invitation_error = $adiinviter->phrases['adi_vi_defualt_error_msg']}
{/adi:if}

<!-- Verify Invitation Response HTML -->
<table class="adi_clear_table adiinviter" cellpadding="0" cellspacing="0" border="0">
<tr class="adi_clear_tr">
	<td class="adi_clear_td">
	<form action="" method="POST" class="adi_clear_form adi_ip_redirect_form">
		<input type="hidden" name="adi_do" value="adi_redirect">
		{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
			<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
		{/adi:foreach}
		<div class="adi_nc_inpage_panel_outer">

			<div class="adi_block2_header">{adi:phrase adi_vi_block_header}</div>
			<div class="adi_single_block_message">
				{adi:if (!empty($adi_global_verify_invitation_message))}
					<div class="adi_verify_info_message">{adi:var $adi_global_verify_invitation_message}</div>
				{adi:else/}
					<div class="adi_verify_error_text">{adi:var $adi_global_verify_invitation_error}</div>
				{/adi:if}
			</div>

		</div>
	</form>
	</td>
</tr>
</table>