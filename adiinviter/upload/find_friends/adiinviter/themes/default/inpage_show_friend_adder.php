<!-- Display startup errors -->
{adi:template inpage_error_display}

<!-- Go to Inviter page again -->
<form action="" method="POST" class="adi_back_to_inviter" style="display:none;">
<input type="hidden" name="adi_no_captcha_display" value="1">
{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
	<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
{/adi:foreach}
</form>

<!-- Inpage Container for Friend Adder Interface -->
<table class="adi_clear_table adiinviter" cellpadding="0" cellspacing="0" border="0">
<tr class="adi_clear_tr"><td class="adi_clear_td">
	<div class="adi_nc_inpage_panel_outer" id="adi_friend_adder_root">

		<!-- Fetch common template for Friend Adder interface -->
		{adi:template friend_adder_html}

	</div>
</td></tr></table>

<script type="text/javascript">
adi.allocate_intr('faip', jQuery('#adi_friend_adder_root'));
</script>