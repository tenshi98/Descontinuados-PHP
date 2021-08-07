<!-- Registered Contacts HTML -->

{adi:foreach $registered_contacts, $reg_id, $reg_details}

<div name="adi_nonSelected" class="adi_contact reg_conts adi_contact_{adi:var $reg_id}" tip="{adi:var $reg_details['name']} ({adi:var $info[$reg_id]['username']})" rel="{adi:var $reg_id}">
	<div class="reg_conts_img_out adi_left">
		<img src="{adi:var $info[$reg_id]['avatar']}"/>
	</div>
	<p class="adi_name">{adi:var $reg_details['name']} ({adi:var $info[$reg_id]['username']})</p>
	<p class="adi_id">{adi:var $reg_details['email']}</p>
	<div class="mutu_adi">
		{adi:if count($reg_details['friends']) > 0}
			<a href="#" class="adi_link adi_mf_link" data="{adi:var $reg_id}">{adi:var adi_get_mutual_link_text(count($reg_details['friends']))}</a>
			<div style="display:none;" id="adi_ip_mfuser_{adi:var $reg_id}">
				<div class="adi_ip_mf_cont">

					{adi:foreach $reg_details['friends'], $ind, $fr_id}
						{adi:if $adiinviter->profile_page_system == true}
							<div class="adi_ip_mf_prof_lnk">
								<a href="{adi:var $info[$fr_id]['profile_page_url']}" target="_blank">
								<img class="adi_mf_avatar" src="{adi:var $info[$fr_id]['avatar']}" data="{adi:var $info[$fr_id]['username']}"></a>
							</div>
						{adi:else}
							<div class="adi_ip_mf_prof_lnk">
								<img class="adi_mf_avatar" src="{adi:var $info[$fr_id]['avatar']}">
							</div>
						{/adi:if}
					{/adi:foreach}

					<div class="adi_clear"></div>
				</div>
				<div class="adi_ip_mf_btn_out">
					<input type="button" class="adi_button adi_ip_mf_btn" value="OK">
				</div>
			</div>
		{/adi:if}
	</div>
	<input type="checkbox" name="adi_reg_ids[]" value="{adi:var $reg_id}" class="adi_cont_checked">
</div>

	<script type="text/javascript">
	adi.add_to_contact_names({adi:var $reg_id},{adi:if ($config['email'] == 1)}" {adi:var strtolower($reg_details['name']).' '.strtolower($reg_details['email'])} >>>{adi:var $reg_id}; "{adi:else/}" {adi:var strtolower($reg_details['name'])} >>>{adi:var $reg_id}; "{/adi:if});
	</script>

{/adi:foreach}