<!-- Startup Errors Display -->
{adi:template inpage_error_display}


<!-- Inpage Html Container -->
<table class="adi_clear_table adiinviter" cellpadding="0" cellspacing="0" border="0">
	<tr class="adi_clear_tr">
		<td class="adi_clear_td">
			<div class="adi_nc_inpage_panel_outer" id="adi_inpage_login_root">
				{adi:template login_form_html}
			</div>
		</td>
	</tr>
</table>


<!-- Register Inapage Model Event Handlers -->
<script type="text/javascript">
jQuery(document).ready(function(){
	adi.allocate_intr('lgip',jQuery('#adi_inpage_login_root'));
});
</script>