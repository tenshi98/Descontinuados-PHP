<!-- Redirect Message -->
<table class="adi_clear_table adiinviter" cellpadding="0" cellspacing="0" border="0">
<tr class="adi_clear_tr">
	<td class="adi_clear_td">
	<form action="" method="POST" class="adi_clear_form adi_ip_redirect_form">
		<input type="hidden" name="adi_do" value="adi_redirect">
		{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
			<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
		{/adi:foreach}
		<div class="adi_nc_inpage_panel_outer">
			<div class="adi_block2_header">{adi:phrase redirect_block_header}</div>
			<div class="adi_single_block_message">{adi:var adi_replace_vars($adiinviter->phrases['redirect_block_message'], array('redirect_url' => $adi_global_redirect_url,))}</div>
		</div>
	</form>
	</td>
</tr></table>

<script type="text/javascript">
setTimeout(function(){
	window.location = '{adi:var $adi_global_redirect_url}';
});
</script>