<!-- Startup Errors -->
{adi:template inpage_error_display}

<table cellpadding="0" cellspacing="0" class="adi_clear_table">
<tr class="adi_clear_tr"><td class="adi_clear_td">
	<div class="adi_nc_inpage_panel_outer adiinviter" id="adi_inpage_recaptcha_panel">
		<div class="adi_block2_header">{adi:phrase adi_ip_captcha_block_header}</div>
		<div class="adi_block_section_outer adi_captcha_section_outer">
			<form method="POST" action="" class="adi_clear_form">
			{adi:foreach $adiinviter->form_hidden_elements, $elem_name, $elem_val}
				<input type="hidden" name="{adi:var $elem_name}" value="{adi:var $elem_val}">
			{/adi:foreach}
			<div id="adi_security">

			<div id="custom_theme_widget" style="" align="left" class="adi_captcha_inner_panel recaptcha_isnot_showing_audio">
				<div class="recaptcha_only_if_image">
					<div style="padding-top: 5px;" class="adi_plain_text">{adi:phrase adi_ip_cap_top_message}</div>
					<div style="padding: 5px 0px 10px;">
						<span class="adi_plain_text">{adi:phrase adi_ip_cap_option_label}</span>
						<a href="#" class="adi_link adi_cap_change_img">{adi:phrase adi_ip_cap_change_image}</a>
						<span class="adi_plain_text">{adi:phrase adi_ip_cap_options_sep}</span>
						<a href="#" class="adi_link adi_cap_show_audio">{adi:phrase adi_ip_cap_show_audio}</a>
					</div>
				</div>
				<div class="recaptcha_only_if_audio">
					<div style="padding-top: 5px;" class="adi_plain_text">{adi:phrase adi_ip_cap_audio_inst}</div>
					<div style="padding: 5px 0px 10px;">
						<a href="#" class="adi_link adi_cap_show_captcha">{adi:phrase adi_ip_cap_show_captcha_txt}</a>
					</div>
				</div>
				<div id="recaptcha_image" class="adi_captcha_img_outer"></div>
				<div id="adi_security_failed" class="adi_captcha_error" style="{adi:if !$adi_show_error_message}display:none;{/adi:if}">
					{adi:phrase adi_ip_cap_wrong_answer_msg}
				</div>
				<span class="adi_plain_text">{adi:phrase adi_ip_cap_txt_label}</span>
				<input type="textbox" name="recaptcha_response_field" id="recaptcha_response_field" class="adi_text_input">
			</div>
			<script type="text/javascript">
				var recaptchaPubKey 	     = "{adi:var $adiinviter->settings['captcha_public_key']}";
				var play_again_phrase 	  = "{adi:phrase adi_ip_cap_play_audio_again}";
				var audio_download_phrase = "{adi:phrase adi_ip_cap_download_audio}";
				var RecaptchaStr,RecaptchaOptions,RecaptchaDefaultOptions,Recaptcha;
			</script>
			<script type="text/javascript" src="{adi:const ADI_ROOT_URL_REL}adiinviter/js/recaptcha.js"></script>
			</div>
			<div class="adi_action_btns_out adi_captcha_btn_out">
				<input type="submit" class="adi_button" name="submit_captcha" value="{adi:phrase adi_continue_btn_label}">
			</div>
			</form>
		</div>
	</div>
</td></tr></table>

<script type="text/javascript">
// adi_cap.init();
adi.allocate_intr('rcip', jQuery('#adi_inpage_recaptcha_panel'));
</script>
