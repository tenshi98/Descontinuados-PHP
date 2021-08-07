<center>

<table cellpadding="0" cellspacing="0" border="0" width="100%" class="adi_clear_table adiinviter" style="width:100%;">
	<tr class="adi_clear_tr">
		<td class="adi_clear_td">
		<center>
			<form action="{adi:var $adiinviter->adi_root_url_rel}adi_invite_history.php?adi_do=download_csv" method="post">
				<input type="submit" class="adi_button adi_download_csv_btn" value="{adi:phrase adi_ih_download_csv_btn}">
				{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
					<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
				{/adi:foreach}
			</form>

			<!-- IFrame for downloading CSV -->
			<iframe id="adi_dcsv_window" src="" style="width:0;height:0;border:0px solid #fff;padding:0;margin:0;"></iframe>
		</center>
		</td>
	</tr>
</table>

</center>