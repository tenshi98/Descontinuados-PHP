<div class="adiinviter">
<form class="adi_clear_form adi_sender_information_form" action="" method="POST">
{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
	<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
{/adi:foreach}
	<div class="adi_block_header adi_sinfo_header">{adi:phrase cs_redirect_block_header}</div>

	<div class="adi_block_section_outer">

		<center>
			<!-- Redirect Message -->
			<div class="adi_section_sub_message" style="margin-bottom: 11px;">{adi:var $cs_redirect_top_message}</div>
			<!-- Content Title -->
			<div class="adi_section_sub_message" style="white-space:nowrap;text-overflow:ellipsis;overflow:hidden;width: 430px; margin-bottom: 11px;">
				<a class="adi_link" href="{adi:var $content_url}">{adi:var $content_title}</a>
			</div>
			<!-- Auto-Redirect Message -->
			<div class="adi_section_sub_message" style="margin-bottom: 16px;">{adi:phrase cs_redirect_autoredirect_message}</div>

			<div><img src="{adi:const THEME_URL}/images/loading.gif"/></div>
		</center>

		<!-- Action Buttons -->
		<div class="adi_action_buttons adi_sinfo_action_buttons">
		<center>
			<input type="button" size="20" name="adi_ip_sinfo_cancel" class="adi_button adi_popup_ok" value="{adi:phrase adi_cancel_btn_label}">
			<input type="submit" size="20" name="adi_ip_sinfo_submit_button" class="adi_button adi_buttons_left_space" onclick="window.location='{adi:var $content_url}'; return false;" value="{adi:phrase cs_redirect_view_content_btn_label}">
		</center>
		</div>

	</div>

</form>
</div>

<script type="text/javascript">
adipps.tr.red_url = "{adi:var $content_url}";
</script>


