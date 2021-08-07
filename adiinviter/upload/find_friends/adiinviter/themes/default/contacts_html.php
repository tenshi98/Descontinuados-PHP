<?php

// Contact HTML for popup display

// Registered Contacts
/*
 - Enter HTML code for registered Contact which has no mutual friends with inviter.
 - Params
 	[member_username] : Username
 */
$member_without_mutual_friends = '
<div name="adi_nonSelected" class="adi_contact reg_conts adi_contact_[member_userid]" tip="[member_name]" rel="[member_userid]">
	<div class="reg_conts_img_out adi_left"><img src="[member_avatar]"/></div>
	<p class="adi_name">[member_name]</p>
	<p class="adi_id">[member_email]</p>
	<div class="mutu_adi"></div>
	<input type="checkbox" name="adi_reg_ids[]" value="[member_userid]" class="adi_cont_checked">
</div>
';

/*
 - Enter HTML code for registered Contact which has one or more mutual friends with inviter.
 - Params
 	[member_username] : Username
 */
$member_with_mutual_friends = '
<div name="adi_nonSelected" class="adi_contact reg_conts adi_contact_[member_userid]" tip="[member_name]" rel="[member_userid]">
	<div class="reg_conts_img_out adi_left"><img src="[member_avatar]"/></div>
	<p class="adi_name">[member_name]</p>
	<p class="adi_id">[member_email]</p>
	<div class="mutu_adi">
		<a href="#" class="adi_link adi_mf_link" data="[member_userid]">[member_mf_link]</a>
		<div style="display:none;" id="adi_ip_mfuser_[member_userid]">
			<div class="adi_ip_mf_cont">
				[member_mf_list]
				<div class="adi_clear"></div>
			</div>
			<div class="adi_ip_mf_btn_out">
				<input type="button" class="adi_button adi_ip_mf_btn" value="Ok">
			</div>
		</div>
	</div>
	<input type="checkbox" name="adi_reg_ids[]" value="[member_userid]" class="adi_cont_checked">
</div>
';


/*
 - Enter HTML code for displaying single mutual friend. 
 - This code will be repeated for every single mutual friend.
 - After that, this list will be replaced in registered contact html(specified above) by replacing the {adi_var:mf_list}
 */

// Mutual friend HTMl with profile page system
$mutual_friends_list_with_profile_page = '
<div class="adi_ip_mf_prof_lnk">
	<a href="[mf_profile_page]" target="_blank">
		<img class="adi_mf_avatar" src="[mf_avatar]" data="[mf_username]">
	</a>
</div>
';

// Mutual friend HTMl without profile page system
$mutual_friends_list_without_profile_page = '
<div class="adi_ip_mf_prof_lnk">
	<img class="adi_mf_avatar" src="[mf_avatar]" data="[mf_username]">
</div>
';




// Non-registered Contacts

/*
 - Following code will be used for displaying non-registered contacts according to the contact type.
 - [contact_status]
 */

/*
 - Enter HTML code for displaying social contact with Avatar URL.
 */
$social_contact_with_avatar = '
<div class="adi_contact [div_css_class] [contact_div_id]" tip="[contact_name]" rel="[contact_social_id]:-:[contact_name]">
	<div class="reg_conts_img_out adi_left"><img src="[contact_avatar]"/></div>
	<p class="adi_name">[contact_name]</p>
	<input class="adi_cont_checked" type="checkbox" name="adi_conts[[contact_social_id]]" value="[contact_name]">
</div>
';
/*
 - Enter HTML code for displaying social contact without Avatar URL.
 */
$social_contact_without_avatar = '
<div class="adi_contact [div_css_class] [contact_div_id]" tip="[contact_name]" rel="[contact_social_id]:-:[contact_name]">
	<p class="adi_name">[contact_name]<br /><br /></p>
	<input class="adi_cont_checked" type="checkbox" name="adi_conts[[contact_social_id]]" value="[contact_name]">
</div>
';

/*
 - Enter HTML code for displaying Webmail contact(email contact) with Avatar URL.
 */
$email_contact_with_avatar = '
<div class="adi_contact [div_css_class] [contact_div_id]" tip="[contact_name]" rel="[contact_email]:-:[contact_name]">
	<div class="reg_conts_img_out adi_left"><img src="[contact_avatar]"/ ></div>
	<p class="adi_name">[contact_name]</p>
	<p class="adi_id">[contact_email]</p>
	<input class="adi_cont_checked" type="checkbox" name="adi_conts[[contact_email]]" value="[contact_name]">
</div>
';
/*
 - Enter HTML code for displaying Webmail contact(email contact) without Avatar URL.
 */
$email_contact_without_avatar = '
<div class="adi_contact [div_css_class] [contact_div_id]" tip="[contact_name]" rel="[contact_email]:-:[contact_name]">
	<p class="adi_name">[contact_name]</p>
	<p class="adi_id">[contact_email]</p>
	<input class="adi_cont_checked" type="checkbox" name="adi_conts[[contact_email]]" value="[contact_name]">
</div>
';

?>