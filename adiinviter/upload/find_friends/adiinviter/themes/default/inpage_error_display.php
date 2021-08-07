<div class="adi_inpage_error_out" {adi:if $adiinviter->error->show_error == true} style="visibility:visible;"{/adi:if}>
<center>
	<table class="adi_clear_table adi_inpage_error_table">
		<tr class='adi_clear_tr'>
			<td valign='top' class='adi_clear_td' style="vertical-align:middle;">
				<img class='adi_inpage_error_icon' src='{adi:const THEME_URL}/images/error_ico.png'>
			</td>
			<td valign='center' class='adi_clear_td adi_inpage_error_msg' style="vertical-align:middle;">
				<!-- Fetch first error message -->
				{adi:if $adiinviter->error->show_error == true}
					{adi:var $adiinviter->error->errors[0]}
				{/adi:if}
			</td>
		</tr>
	</table>
</center>
</div>