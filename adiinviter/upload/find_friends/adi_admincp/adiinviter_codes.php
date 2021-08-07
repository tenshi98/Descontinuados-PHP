<?php
/*******************************************************************************************
 * AdiInviter Pro 1.1 Stable Release by AdiInviter, Inc.                                   *
 *-----------------------------------------------------------------------------------------*
 *                                                                                         *
 * https://www.adiinviter.com                                                              *
 *                                                                                         *
 * Copyright © 2008-2014, AdiInviter, Inc. All rights reserved.                            *
 * You may not redistribute this file or its derivatives without written permission.       *
 *                                                                                         *
 * Support Email: support@adiinviter.com                                                   *
 * Sales Email: sales@adiinviter.com                                                       * 
 *                                                                                         *
 *-------------------------------------LICENSE AGREEMENT-----------------------------------*
 * 1. You are allowed to use AdiInviter Pro software and its code only on domain(s) for    * 
 *    which you have purchased a valid and legal license from www.adiinviter.com.          *
 * 2. You ARE NOT allowed to REMOVE or MODIFY the copyright text within the .php files     *
 *    themselves.                                                                          *
 * 3. You ARE NOT allowed to DISTRIBUTE the contents of any of the included files.         *
 * 4. You ARE NOT allowed to COPY ANY PARTS of the code and/or use it for distribution.    *
 ******************************************************************************************/

header("Content-Type:text/html; charset=UTF-8");
header("Cache-Control: must-revalidate");

$base_path = dirname(__FILE__);
include($base_path.DIRECTORY_SEPARATOR.'init.php');


$settings =& $adiinviter->settings;
switch(GET_var('section'))
{

case 'adi_lang_settings' :
	echo '<fieldset>
		<h1 style="margin-bottom:20px;">AdiInviter Pro Language Settings</h1>
		<div class="clearboth"></div>
	</fieldset>
	<div id="language_phrases">';
	// $code_name = 'language_phrases';
	$default_lang_code = $settings['adiinviter_lang_code'];
	// include($base_path.DIRECTORY_SEPARATOR.'adiinviter_common_codes.php');

	echo '<form action="" method="post" onsubmit="return formSubmit(this);">
<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
	<tr>
		<td style="width: 335px;"><b>Language Pack</b><br>
			<label>Select or edit default language pack for Adiinviter Pro.</label></td>
		<td style="vertical-align: middle;width: 210px;">
		<select name="setting[adiinviter_lang_code]" id="adiinviter_lang_code" style="width: 90%;">';

		$path = ADI_CORE_PATH.'lang'.DIRECTORY_SEPARATOR;
		
		$dir = opendir($path);
		while (($file = readdir($dir)) !== false)
		{
			if($file != '.' && $file != '..')
			{
				if( file_exists($path.$file) )
				{
					include($path.$file);
					$lang_code = str_replace('.php','',$file);
					if($default_lang_code == $lang_code)
						$str = ' selected="selected"';
					else
						$str='';
					echo '<option value="'.str_replace('.php','',$file).'"'.$str.'>'.$lang_name.'</option>';	
				}
			}
		}
		closedir($dir);

echo '</select>
		</td>
		<td align="left" style="vertical-align: middle;">
			<input class="button" type="submit" value=" Set As Default " />
			<input class="button" type="button" value=" Edit " onclick="return getPhrases();" />
			<input class="button" type="button" value=" Remove " onclick="remove_lang();" />
		</td>
	</tr>
	<tr><td colspan="3"><hr/></td></tr>
	<tr>
		<td colspan="3" style="vertical-align: middle;">
		<p align="left">
			<input class="button" type="button" value=" Add New Language " onclick="toggle_new_lang();" />
		</p>
		</td>
	</tr>
	</table>
	<div class="clearboth"></div>
</fieldset>
</form>

<form action="" method="post" onsubmit="return formSubmit(this,\'lang_tab\');">
<div id="new_language" style="display:none;">
<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
	<tr>
		<td colspan="2"><b>Add a New Language</b></td>
	</tr>
	<tr><td style="height: 15px;" colspan="2"></td></tr>
	<tr>
		<td><lable>Enter name of the Language</label></td>
		<td><input type="textbox" name="new_language[name]" size="60" value=""></td>
	</tr>
	<tr><td colspan="3"><hr/></td></tr>
	<tr>
		<td colspan="3">
		<p align="right">
			<input class="button" type="submit" value=" Submit " />
		</p>
		</td>
	</tr>
	</table>
	<div class="clearboth"></div>
</fieldset>
</div>
</form>

<div id="adi_edit_phrases_root"></div>
';


	echo '</div>';
break;

case 'adi_manage_services':
$adiinviter->load_services();
$services  = $adiinviter->settings['adiinviter_services'];

echo '<div class="fieldset" style="min-width: 890px;">
	<h1 style="margin-bottom:20px;">Manage Services</h1>
	<div class="clearboth"></div>
</div>
<form action="" method="post" onsubmit="return formSubmit(this,\'manage_services\');">
<div class="fieldset" style="padding-bottom: 29px;min-width: 890px;">
<table class="adiinviter_table" style="margin-bottom:20px;">
	<tr>
		<td><b>Number of columns in AdiInviter services table</b><br>
			<label>Enter number of columns in AdiInviter service selection drop-down menu.</label></td>
		<td><input type="textbox" name="setting[adiinviter_services_num_of_cols]" size="60"
			value="'.$settings['adiinviter_services_num_of_cols'].'" id="adiinviter_services_num_of_cols"></td>
	</tr>
	<tr><td colspan="2"><hr/></td></tr>
</table>
<ul style="margin-left: 18px;">
<li style="list-style: disc outside;"> Double click on service box to turn selected service On or Off. </li>
<li style="list-style: disc outside;"> Drag & drop services to and from ON/OFF services area. </li>
<li style="list-style: disc outside;"> Select multiple services below and click on "Turn Off" or "Turn On" button. </li>
</ul>
<br>
<div id="manage_serivce">
<strong> On services box : </strong><br>';

$num_cols = $settings['adiinviter_services_num_of_cols'];
$num_cols = $num_cols * 113;

$counter= 0;
$onServiceCode = '<div class="on_serviceBox" style="padding: 17px;"><div class="yui-u first" style="float:left;" id="adiinviter_onServices"> <ul id="list1" style="width: '.$num_cols.'px;">';
$offServiceCode = '<div class="off_serviceBox" style="min-height: 30px;padding-top: 10px;"><div class="yui-u second" id="adiinviter_offServices"> <ul id="list2" style="width: '.$num_cols.'px;">';
foreach($services as $service => $onOff)
{
	if($onOff === '1')
		$onServiceCode .= '<li rel="'.$service.'" class="adiinviter_on" rel="1"><span class="adiinviter_span service_item '.$service.'_si">'.$adiinviter->services_params[$service][0][1].'</span></li>';
	else if($onOff === '2')
		$onServiceCode .= '<span rel="'.$service.'" class="supported_domains" rel="1" style="display: none;"></span>';
	else
		$offServiceCode .= '<li rel="'.$service.'" class="adiinviter_off" rel="0"><span class="service_item '.$service.'_si">'.$adiinviter->services_params[$service][0][1].'</span></li>';
}
echo $onServiceCode.'</ul></div></div><div style="clear:both;"></div>
<br>
<table style="margin-bottom:20px; margin-left: 65px; width: 765px;"><tr><td style="width:50%;">
<input class="button" type="button" value=" Turn OFF " onclick="return services_swap(\'off\');" />
</td><td style="width:50%;" align="right">
<input class="button" type="button" value=" Turn ON " onclick="return services_swap(\'on\');" />
</td></tr></table>

<br><strong> Off services box : </strong>
<br>'.$offServiceCode.'</ul></div></div><div style="clear:both;"></div>
</div>
<script type="text/javascript">
list1 = YDM.get("list1");
list2 = YDM.get("list2");
adiinviter_onServices = YDM.get("adiinviter_onServices");
serviceDblClick = function(e)
{
	// Double click on service box
	if(YDM.isAncestor(YDM.get("adiinviter_onServices"),this))
	{
		//YDM.replaceClass(this,"adiinviter_on","adiinviter_off");
		list2.appendChild(this);
	}
	else
	{
		//YDM.replaceClass(this,"adiinviter_off","adiinviter_on");
		list1.appendChild(this);
	}
};

serviceClick = function(e){ // click on service box
	if(! YDM.hasClass(this,"adiinviter_selected") )
		//YDM.replaceClass(this,"adiinviter_on","adiinviter_selected");
		YDM.addClass(this,"adiinviter_selected");
	else
		//YDM.replaceClass(this,"adiinviter_selected","adiinviter_on");
		YDM.removeClass(this,"adiinviter_selected");
};

var alinks = YAHOO.util.Selector.query("#manage_serivce li");
YAHOO.util.Event.addListener(alinks, "click", serviceClick);
YAHOO.util.Event.addListener(alinks, "dblclick", serviceDblClick);


YUI().use("sortable", function (Y) {
	YUI().use("dd-constrain", "sortable", function(Y) {
		var list1 = new Y.Sortable({
			container: "#list1",
			nodes: "li",
			opacity: ".1"
		});
		var list2 = new Y.Sortable({
			container: "#list2",
			nodes: "li",
			opacity: ".1"
		});
		list1.join(list2);
	});
});
</script>
</div>
<div class="fieldset" style="min-width: 890px;">
	<p align="right" style="margin-bottom:20px;"><input class="button" type="submit" value=" Save " onclick="return saveServices();" /></p>
</div>
<input type="hidden" name="adi_manage_services" value="adi_global">
</form>
'; break;

/*
	adi_oauth_applications
*/
case 'adi_oauth_applications':
	echo '<form action="" method="post" onsubmit="return formSubmit(this);">
<fieldset>
	<h1 style="margin-bottom:20px;">OAuth Application Settings</h1>
	<div class="clearboth"></div>
</fieldset>
<fieldset>
<!-- Google Services Settings -->
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>
			<td><h2 style="margin-bottom: 5px; display: inline;" class="service_item_h3 gmail_si">
			 Gmail</h2><br>
			</td>
		</tr>
		<tr><td colspan="2" style="height:10px;"></td></tr>
		<tr>
			<td><b>Client ID</b></td>
			<td style="width: 45%;"><input type="textbox" name="setting[adiinviter_google_consumer_key]" value="'.$settings['adiinviter_google_consumer_key'].'" size="50"></td>
		</tr>
		<tr><td colspan="2" style="height:20px;"></td></tr>
		<tr>
			<td><b>Client Secret</b></td>
			<td><input type="textbox" name="setting[adiinviter_google_consumer_secret]" value="'.$settings['adiinviter_google_consumer_secret'].'" size="50"></td>
		</tr>
	</table>
	<div class="clearboth"></div>
</fieldset>
<fieldset>
<!-- Hotmail Settings -->
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>
			<td><h2 style="margin-bottom: 5px; display: inline;" class="service_item_h3 hotmail_si">
			 Outlook</h2><br></td>
		</tr>
		<tr><td colspan="2" style="height:10px;"></td></tr>
		<tr>
			<td><b>Client ID</b></td>
			<td style="width: 45%;"><input type="textbox" name="setting[adiinviter_hotmail_consumer_key]" value="'.$settings['adiinviter_hotmail_consumer_key'].'" size="50"></td>
		</tr>
		<tr><td colspan="2" style="height:20px;"></td></tr>
		<tr>
			<td><b>Client Secret (v1)</b></td>
			<td><input type="textbox" name="setting[adiinviter_hotmail_consumer_secret]" value="'.$settings['adiinviter_hotmail_consumer_secret'].'" size="50"></td>
		</tr>
	</table>
	<div class="clearboth"></div>
</fieldset>
<fieldset>
<!-- Yahoo Settings -->
	<table class="adiinviter_table" style="margin-bottom:20px;">
	<tr>
		<td><h2 style="margin-bottom: 5px; display: inline;" class="service_item_h3 yahoo_si">
		 Yahoo</h2><br></td>
	</tr>
	<tr><td colspan="2" style="height:10px;"></td></tr>
	<tr>
		<td><b>Consumer Key</b></td>
		<td style="width: 45%;"><input type="textbox" name="setting[adiinviter_yahoo_consumer_key]" value="'.$settings['adiinviter_yahoo_consumer_key'].'" size="50"></td>
	</tr>
	<tr><td colspan="2" style="height:20px;"></td></tr>
	<tr>
		<td><b>Consumer Secret</b></td>
		<td><input type="textbox" name="setting[adiinviter_yahoo_consumer_secret]" value="'.$settings['adiinviter_yahoo_consumer_secret'].'" size="50"></td>
	</tr>
</table>
	<div class="clearboth"></div>
</fieldset>

<!-- Facebook Settings -->
<!--
<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
<tr>
	<td><h2 style="margin-bottom: 5px; display: inline;" class="service_item_h3 facebook_si">
	Facebook</h2><br></td>
</tr>
<tr><td colspan="2" style="height:10px;"></td></tr>
<tr>
	<td><b>Facebook Connect API Key</b></td>
	<td style="width: 45%;"><input type="textbox" name="setting[adiinviter_facebook_consumer_key]" value="'.$settings['adiinviter_facebook_consumer_key'].'" size="50"></td>
</tr>
<tr><td colspan="2" style="height:20px;"></td></tr>
<tr>
	<td><b>Facebook Connect Secret Key</b></td>
	<td><input type="textbox" name="setting[adiinviter_facebook_consumer_secret]" value="'.$settings['adiinviter_facebook_consumer_secret'].'" size="50"></td>
</tr>
	</table>
	<div class="clearboth"></div>
</fieldset>
-->

<fieldset>
<!-- Twitter Settings -->
	<table class="adiinviter_table" style="margin-bottom:20px;">
	<tr>
		<td><h2 style="margin-bottom: 5px; display: inline;" class="service_item_h3 twitter_si">
		 Twitter</h2><br></td>
	</tr>
	<tr><td colspan="2" style="height:10px;"></td></tr>
	<tr>
		<td><b>API key</b></td>
		<td style="width: 45%;"><input type="textbox" name="setting[adiinviter_twitter_consumer_key]" value="'.$settings['adiinviter_twitter_consumer_key'].'" size="50"></td>
	</tr>
	<tr><td colspan="2" style="height:20px;"></td></tr>
	<tr>
		<td><b>API secret</b></td>
		<td><input type="textbox" name="setting[adiinviter_twitter_consumer_secret]" value="'.$settings['adiinviter_twitter_consumer_secret'].'" size="50"></td>
	</tr>
	</table>
	<div class="clearboth"></div>
</fieldset>

<fieldset>
<!-- Linkedin Settings -->
	<table class="adiinviter_table" style="margin-bottom:20px;">
	<tr>
		<td><h2 style="margin-bottom: 5px; display: inline;" class="service_item_h3 linkedin_si">
		 Linkedin</h2><br></td>
	</tr>
	<tr><td colspan="2" style="height:10px;"></td></tr>
	<tr>
		<td><b>API Key</b></td>
		<td style="width: 45%;"><input type="textbox" name="setting[adiinviter_linkedin_consumer_key]" value="'.$settings['adiinviter_linkedin_consumer_key'].'" size="50"></td>
	</tr>
	<tr><td colspan="2" style="height:20px;"></td></tr>
	<tr>
		<td><b>Secret Key</b></td>
		<td><input type="textbox" name="setting[adiinviter_linkedin_consumer_secret]" value="'.$settings['adiinviter_linkedin_consumer_secret'].'" size="50"></td>
	</tr>
	</table>
	<div class="clearboth"></div>
</fieldset>

<fieldset>
<!-- MailChimp Settings -->
	<table class="adiinviter_table" style="margin-bottom:20px;">
	<tr>
		<td><h2 style="margin-bottom: 5px; display: inline;" class="service_item_h3 mailchimp_si">
		 MailChimp</h2><br></td>
	</tr>
	<tr><td colspan="2" style="height:10px;"></td></tr>
	<tr>
		<td><b>client_id</b></td>
		<td style="width: 45%;"><input type="textbox" name="setting[adiinviter_mailchimp_consumer_key]" value="'.$settings['adiinviter_mailchimp_consumer_key'].'" size="50"></td>
	</tr>
	<tr><td colspan="2" style="height:20px;"></td></tr>
	<tr>
		<td><b>Client secret</b></td>
		<td><input type="textbox" name="setting[adiinviter_mailchimp_consumer_secret]" value="'.$settings['adiinviter_mailchimp_consumer_secret'].'" size="50"></td>
	</tr>
	<tr><td colspan="2" style="height:20px;"></td></tr>
	<tr>
		<td><b>API Key</b></td>
		<td><input type="textbox" name="setting[adiinviter_mailchimp_consumer_api_key]" value="'.$settings['adiinviter_mailchimp_consumer_api_key'].'" size="50"></td>
	</tr>
	</table>
	<div class="clearboth"></div>
</fieldset>

<fieldset>
	<p align="right" style="margin-bottom:20px;"><input class="button" type="submit" value="Save" /></p>
</fieldset>
<input type="hidden" name="adi_oauth_applications" value="adi_global">
</form>'; break;

/*
 * adi_invitation_mail
 */
case 'adi_invitation_mail':
	echo '<form action="" method="post" onsubmit="return formSubmit(this);">
<fieldset>
	<h1 style="margin-bottom:20px;">Invitation Mail</h1>
	<div class="clearboth"></div>
</fieldset>

<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>
			<td><b>Invitation subject</b><br>
			<label>Invitation subject for all webmails and social networks.</label><br><br>
			You can use following markups in subject text : <br>
			<table class="normal" style="margin-bottom:20px;">
<thead><tr><th class="perm_table_th">Syntax</th><th class="perm_table_th">Meaning</th></tr></thead>
<tbody>
<tr><td class="synt_table_td">[receiver_name]</td><td class="synt_table_td">Receiver\'s Name</td></tr>
<tr class="odd"><td class="synt_table_td">[receiver_email]</td><td class="synt_table_td">Receiver\'s Email</td></tr>
<tr><td class="synt_table_td">[sender_name]</td><td class="synt_table_td">Sender\'s Username</td></tr>
<tr class="odd"><td class="synt_table_td">[sender_email]</td><td class="synt_table_td">Sender\'s Email</td></tr>
<tr><td class="synt_table_td">[website_name]</td><td class="synt_table_td">Your Website Name</td></tr>
</tbody></table>
			</td>
			<td style="width: 45%;"><input type="textbox" name="setting[adiinviter_invitation_subject]" value="'.$settings['adiinviter_invitation_subject'].'" size="60"></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Invitation email body for webmails</b><br>
			Invitation email body for all webmails (HTML supported).<br><br>
			You can use following markups in message body : <br>
<table class="normal" style="margin-bottom:20px;">
<thead><tr><th class="perm_table_th">Syntax</th><th class="perm_table_th">Meaning</th></tr></thead>
<tbody>
<tr class="odd"><td class="synt_table_td">[receiver_name]</td><td class="synt_table_td">Receiver\'s Name</td></tr>
<tr><td class="synt_table_td">[receiver_email]</td><td class="synt_table_td">Receiver\'s Email</td></tr>
<tr class="odd"><td class="synt_table_td">[sender_name]</td><td class="synt_table_td">Sender\'s Username</td></tr>
<tr><td class="synt_table_td">[sender_email]</td><td class="synt_table_td">Sender\'s Email</td></tr>
<tr class="odd"><td class="synt_table_td">[sender_avatar_url]</td><td class="synt_table_td">Sender\'s Avatar URL</td></tr>
<tr><td class="synt_table_td">[website_name]</td><td class="synt_table_td">Your Website Name</td></tr>
<tr class="odd"><td class="synt_table_td">[sender_profile_url]</td><td class="synt_table_td">Sender\'s Profile URL</td></tr>
<tr><td class="synt_table_td">[my_website_logo]</td><td class="synt_table_td">Your Website Logo</td></tr>
<tr><td class="synt_table_td">[attached_note]</td><td class="synt_table_td">Sender\'s Attached Note</td></tr>
<tr class="odd"><td class="synt_table_td">[service]</td><td class="synt_table_td">Service used to import contacts.</td></tr>
</tbody></table>

			</td>
			<td>
			<div style="width:90%">
			<textarea name="setting[adiinviter_invitation_message_webmail]" id="adiinviter_invitation_message_webmail" rows="22" cols="40" style="width:100%;" wrap="virtual" tabindex="1" >'.$settings['adiinviter_invitation_message_webmail'].'</textarea><br>
			<p style="width:100%;padding-left: 10px;padding-top: 7px;" align="right"><input style="margin-right:0px;" class="button" type="button" onclick="return showPreview(\'adiinviter_invitation_message_webmail\');" value="Preview" ></p>
			</div>
			</td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Invitation attachment note On/Off</b><br>
			<label>Globally turn attachment note On/Off.</label></td>
			<td><input type="radio" name="setting[adiinviter_attachment_onoff]" value="1" '.($settings['adiinviter_attachment_onoff'] == '1'? 'checked="checked"':'').'> ON <br/>
			<input type="radio" name="setting[adiinviter_attachment_onoff]" value="0" '.($settings['adiinviter_attachment_onoff'] == '0'? 'checked="checked"':'').'> OFF <br/></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Attach Note Character Limit</b><br>
			<label>Specify character limit for attach note.</label></td>
			<td style="width: 45%;"><input type="textbox" name="setting[attach_note_length_limit]" value="'.$settings['attach_note_length_limit'].'" size="60"></td>
		</tr>
	</table>
	<div class="clearboth"></div>
</fieldset>
<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>	
			<td><b>Invitation message for social networks</b><br>
			Invitation message body for all social network services (No HTML).</td>
<td style="width: 45%;"><textarea name="setting[adiinviter_invitation_message_social]" rows="5" cols="40" style="width:90%" wrap="virtual" tabindex="1" >'.$settings['adiinviter_invitation_message_social'].'</textarea>

</td>
		</tr>
		</table>
	<div class="clearboth"></div>
</fieldset>
<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>
			<td><b>Invitation message body for Twitter</b><br>
			Invitation message body for Twitter (Limit : 100 characters).</td>
<td style="width: 45%;"><textarea name="setting[adiinviter_twitter_message]" rows="5" cols="40" style="width:90%" wrap="virtual" tabindex="1" >'.$settings['adiinviter_twitter_message'].'</textarea></td>
		</tr>
		</table>
	<div class="clearboth"></div>
</fieldset>
<fieldset>
	<p align="right" style="margin-bottom:20px;"><input class="button" type="submit" value="Save" /></p>
</fieldset>
<input type="hidden" name="adi_invitation_mail" value="adi_global">
</form>'; break;



case 'adi_content_share' :
	echo '
<fieldset>
	<h1 style="margin-bottom:20px;">Content Share</h1>
	<div class="clearboth"></div>
</fieldset>
<form action="" method="post" onsubmit="return chContentType(this);">
<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
	<tr>
		<td style="width: 335px;"><b>Add Content Type</b><br>
			<label>Add new content type for AdiInviter content share system.<br> For e.g. article, blog, thread, post, etc.</label></td>
		<td style="vertical-align: middle;width: 210px;">
			<input type="textbox" name="new_content_type" id="new_content_type" value="" style="width: 90%;">
		</td>
	</tr>
	<tr><td colspan="2"><hr/></td></tr>
	<tr>
		<td colspan="2" style="vertical-align: middle;">
		<p align="right">
			<input class="button" type="submit" value=" Add New Content Type ">
		</p>
		</td>
	</tr>
	</table>
	<div class="clearboth"></div>
</fieldset>
</form>

<div id="new_content_type_response"></div>';
if(count($settings['adiinviter_content_share_types']) > 0)
{
	foreach($settings['adiinviter_content_share_types'] as $content_type => $details)
	{
		$content_name   = $details['name'];
		$content_on_off = $details['on_off'];
		$limit          = $details['limit'];
		$page_url       = $details['page_url'];
		$table_name     = $details['table_name'];
		$id_attr        = $details['id_attr'];
		$content_attr   = $details['content_attr'];
		$title_attr     = $details['title_attr'];
		$pid_attr       = $details['pid_attr'];
		$restrict_ids   = $details['restrict_ids'];
		$restrict_pids  = $details['restrict_pids'];

		$redirect_onoff     = $details['redirect_onoff'];
		$invitation_subject = $details['invitation_subject'];
		$invitation_body    = $details['invitation_body'];

		$invitation_social_message_body  = $details['invitation_social_message_body'];
		$invitation_twitter_message_body = $details['invitation_twitter_message_body'];

		$code_name = 'content_type_settings';
		include($base_path.DIRECTORY_SEPARATOR.'adiinviter_common_codes.php');
	}
}



/*
echo '<form action="" method="post" onsubmit="return formSubmit(this,\'content_share\');">
<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>
			<td><b>HTML parsing of BBCodes in blog sharing invitation messages</b><br>
			<label>Click add more to add custom parsing of BBCodes in thread body.</label></td>
		</tr>
		<tr><td colspan="2" style="height:20px;"></td></tr>
		<tr>
			<td colspan="2" align="left">
				<input class="button" type="button" onclick="return add_more_codes();" value="Add More" />
			</td>
		</tr>
		<tr><td colspan="2">
			<div style="display:none;" id="addmorebbcode">
				<table style="width: 95%;">
					<tr>
						<td><b>Enter BBCode Name </b><br>
						<label>e.g. : quote, code, img, url, etc (case insensitive)</label></td>
						<td><input id="adiinviter_new_bbcode" type="textbox" name="setting[adiinviter_new_bbcode]" size="60"  value=""></td>
					</tr>
					<tr><td colspan="2" style="height:20px;"></td></tr>
					<tr>
						<td><b>Enter HTML parsed code</b><br>
						<label></label></td>
						<td>
						<textarea id="adiinviter_new_bbcode_value" name="setting[adiinviter_new_bbcode_value]"  rows="3" cols="40" style="width:90%" wrap="virtual"></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<p align="right" style="margin-left: 11px; margin-top: 7px; width: 90%;">
								<input class="button" type="button" style="margin-right: 0px;" value="Cancel" onclick="add_more_codes();"/>
								<input class="button" type="submit" style="margin-right: 0px;" value="Save"/>
							</p>
						</td>
					</tr>
				</table>
			</div>
		</td></tr>


		';
$theHR = ''; $allcodes='';
$cnt = 1;
foreach($settings as $name => $value)
{
	if(strpos($name, 'adiinviter_custom_bbcode_') !== false)
	{
		$codeName = explode('adiinviter_custom_bbcode_', $name);
		$codeName = $codeName[1];
		$allcodes .= $theHR.'
		<tr id="adi_'.$codeName.'">
		<td style="width: 30px;">'.$cnt.'.</td>
		<td style="width: 160px;"> ['.$codeName.'] [/'.$codeName.'] </td>
		<td style="width: auto;"><textarea name="setting['.$name.']" id="'.$name.'" rows="3" cols="40" style="width:90%" wrap="virtual">'.html_entity_decode($value).'</textarea><br>
		<p align="right" style="width: 90%; padding-left: 10px;"><input style="font-size: 11px;margin-right: 0px;" class="button" type="button" onclick="return remove_bbcodes(this,\''.$codeName.'\');" value="delete" alt="Click to remove parsing for BBCode : '.$codeName.'" /></p>
		</td>
		</tr>';
		$theHR = '<tr><td colspan="3"><hr/></td></tr>';
		$cnt++;
	}
}

if($allcodes != '')
{
	echo '<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td colspan="2">
			<center>
			<table class="bbcodetable" style="width: 95%;margin-bottom:20px;" id="adiallbbcodes">
			'.$allcodes.'
			</table>
			</center>
			</td>
		</tr>';
}

	echo '</table>
	<div class="clearboth"></div>
</fieldset>


<fieldset>
	<p align="right" style="margin-bottom:20px;"><input class="button" type="submit" value="Save"/></p>
</fieldset>
<input type="hidden" name="adi_invitation_mail" value="adi_global">
</form>';
*/
break;

/*************************************************************************************************************/

case 'adi_reminder_mail':
	echo '<form action="" method="post" onsubmit="return formSubmit(this);">
<fieldset>
	<h1 style="margin-bottom:20px;">Reminder Mail</h1>
	<div class="clearboth"></div>
</fieldset>
<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>
			<td><b>Invitation reminder system On/Off</b><br>
			<label>Globally turn invitation reminder system On/Off.</label></td>
			<td style="width: 45%;"><input type="radio" name="setting[adiinviter_reminder_onoff]" value="1" '.($settings['adiinviter_reminder_onoff'] == '1'? 'checked="checked"':'').'> ON <br/>
			<input type="radio" name="setting[adiinviter_reminder_onoff]" value="0" '.($settings['adiinviter_reminder_onoff'] == '0'? 'checked="checked"':'').'> OFF <br/></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Send Invitation Reminder Emails After These Many Days</b><br>
			<label>Specify duration in days for invitation reminder emails</label>
			</td>
			<td><input type="textbox" name="setting[adiinviter_reminder_duration]" value="'.$settings['adiinviter_reminder_duration'].'" size="60"></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Maximum Number Of Invitation Reminders To Be Sent After Above Duration</b><br>
			<label>Specify maximum no. of invitation reminders to be sent to each invitation receiver.</label>
			</td>
			<td><input type="textbox" name="setting[adiinviter_max_reminders_limit]" value="'.$settings['adiinviter_max_reminders_limit'].'" size="60"></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Invitation reminder subject</b><br><br>
			You can use following markups in subject text : <br>
			<table class="normal" style="margin-bottom:20px;">
<thead><tr><th class="perm_table_th">Syntax</th><th class="perm_table_th">Meaning</th></tr></thead>
<tbody>
<tr><td class="synt_table_td">[receiver_name]</td><td class="synt_table_td">Receiver\'s Name</td></tr>
<tr class="odd"><td class="synt_table_td">[receiver_email]</td><td class="synt_table_td">Receiver\'s Email</td></tr>
<tr><td class="synt_table_td">[sender_name]</td><td class="synt_table_td">Sender\'s Username</td></tr>
<tr class="odd"><td class="synt_table_td">[sender_email]</td><td class="synt_table_td">Sender\'s Email</td></tr>
<tr><td class="synt_table_td">[website_name]</td><td class="synt_table_td">Your Website Name</td></tr>
</tbody></table>
			</td>
			<td><input type="textbox" name="setting[adiinviter_reminder_subject]" value="'.$settings['adiinviter_reminder_subject'].'" size="60"></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Invitation reminder email body for all invitations except content share</b><br>
			Invitation reminder email body (HTML supported).<br><br>
			You can use following markups in message body : <br>
<table class="normal" style="margin-bottom:20px;">
<thead><tr><th class="perm_table_th">Syntax</th><th class="perm_table_th">Meaning</th></tr></thead>
<tbody>
<tr class="odd"><td class="synt_table_td">[receiver_name]</td><td class="synt_table_td">Receiver\'s Name</td></tr>
<tr><td class="synt_table_td">[receiver_email]</td><td class="synt_table_td">Receiver\'s Email</td></tr>
<tr class="odd"><td class="synt_table_td">[sender_name]</td><td class="synt_table_td">Sender\'s Username</td></tr>
<tr><td class="synt_table_td">[sender_email]</td><td class="synt_table_td">Sender\'s Email</td></tr>
<tr class="odd"><td class="synt_table_td">[sender_avatar_url]</td><td class="synt_table_td">Sender\'s Avatar URL</td></tr>
<tr><td class="synt_table_td">[website_name]</td><td class="synt_table_td">Your Website Name</td></tr>
<tr class="odd"><td class="synt_table_td">[sender_profile_url]</td><td class="synt_table_td">Sender\'s Profile URL</td></tr>
<tr><td class="synt_table_td">[my_website_logo]</td><td class="synt_table_td">Your Website Logo</td></tr>
<tr><td class="synt_table_td">[attached_note]</td><td class="synt_table_td">Sender\'s Attached Note</td></tr>
<tr class="odd"><td class="synt_table_td">[service]</td><td class="synt_table_td">Service used to import contacts.</td></tr>
<tr><td class="synt_table_td">[issued_date]</td><td class="synt_table_td">Issued Date of Invite</td></tr>
<tr class="odd"><td class="synt_table_td">[elapsed_days]</td><td class="synt_table_td">Elapsed Days Since Invite Was Issued.</td></tr>
<tr><td class="synt_table_td">[days_to_expire]</td><td class="synt_table_td">No. of Days Left For Invite Expiry.</td></tr>
</tbody></table>
			</td>
			<td>
			<div style="width:90%">
			<textarea name="setting[adiinviter_reminder_message_webmail]" id="adiinviter_reminder_message_webmail" rows="22" cols="40" style="width:100%;" wrap="virtual" tabindex="1" >'.$settings['adiinviter_reminder_message_webmail'].'</textarea><br>
			<p style="width:100%;padding-left: 10px;padding-top: 7px;" align="right"><input style="margin-right:0px;" class="button" type="button" onclick="return showPreview(\'adiinviter_reminder_message_webmail\');" value="Preview" ></p>
			</div>
			</td>
		</tr>
		</table>
	<div class="clearboth"></div>
</fieldset>

<fieldset>
	<p align="right" style="margin-bottom:20px;"><input class="button" type="submit" value="Save" /></p>
</fieldset>
<input type="hidden" name="adi_invitation_mail" value="adi_global">
</form>'; break;






/* adi_user_permissions
*/
case 'adi_user_permissions':
	echo '
<div class="fieldset">
	<h1 style="margin-bottom:20px;">User Permissions</h1>
	<div class="clearboth"></div>
</div>

<form action="" method="post" onsubmit="return formSubmit(this,\'user_permissions\');">
<div class="fieldset">
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>
			<td colspan="2">
			<b>Manage usergroup permissions for AdiInviter</b>
			<ul>
				<lh><font style="color:#f00"><b>Note :</b></font></lh>
				<li style="list-style: disc inside;margin-left: 20px;">You can write <b>Unlimited</b> under <b>Number of Invitations Per Month</b> field below.</li>
				<li style="list-style: disc inside;margin-left: 20px;">Only primary usergroup permissions will be effective for all users. All secondary usergroup permissions will be neglected.</li>
				<li style="list-style: disc inside;margin-left: 20px;">No. of invitations for usergroup <b>Unregistered/Not Logged In</b> indicates how many invitations they can send at a time. <font color="#f00"><b>This is not a monthly quota</b></font>.</li>
			</ul>

			<div style="height: auto; max-height: 600px; overflow: auto;padding: 15px;">
			 <center>
			  <table style="" style="margin-bottom:20px;" class="normal">
			   <colgroup></colgroup>
			   <colgroup id="col_2"></colgroup>
			   <colgroup id="col_3"></colgroup>
			   <colgroup id="col_4"></colgroup>
			   <thead>
			   <tr>
				   <th class="perm_table_th" style="width:260px;">Usergroup</th>
				   <th class="perm_table_th" style="text-align: center;width:65px;">Can Use AdiInviter</th>
				   <th class="perm_table_th" style="text-align: center;width:174px;">Number of Invitations Per Month</th>
				   <th class="perm_table_th" style="text-align: center;width:77px;">Can Delete Own Invites</th>
				   <th class="perm_table_th" style="text-align: center;width:100px;">Can Download AdiInviter CSV</th>
				   <th class="perm_table_th" style="text-align: center;width:75px;">Show reCAPTCHA</th>
			   </tr>
			   </thead>
			   <tbody>
			  ';
			$val = $settings['adiinviter_group_permissions'];
			$uGroups = $adiinviter->get_all_usergroups();
			$odd = false;
			$not_logged_in_usergroup_id = $adiinviter->default_usergroupid;
			foreach($uGroups as $ug_id => $ug_name)
			{
				if(!isset($val[$ug_id]))
				{
					$val[$ug_id] = array(
						ADI_P_NUM_INVITES => 'Unlimited',
						ADI_P_USE_INVITER => '1',
						ADI_P_DELETE_INVITES => '1',
						ADI_P_DOWN_CSV => '1',
						ADI_P_RECAPTCHA => '0',
					);
				}

				echo '
				<tr id="row_'.$ug_id.'" '.($odd?'class="odd"':'').'>
					<td class="perm_table_td" style="text-align: left;">'.$ug_name.'</td>

					<td rel="3" align="center" class="perm_table_td">
						<input type="checkbox" name="monthly_inv['.$ug_id.']['.ADI_P_USE_INVITER.']"
						id="monthly_inv_g_'.$ug_id.'"
						onchange="perm.change(this);"
						value="1" '.($val[$ug_id][ADI_P_USE_INVITER] == '1' ? "checked" : "").'>
					</td>
					<td class="perm_table_td">
					'.( $ug_id != $not_logged_in_usergroup_id ?
					'<div style="position:relative;width:180px;"><input type="textbox" name="monthly_inv['.$ug_id.']['.ADI_P_NUM_INVITES.']" value="'.$val[$ug_id][ADI_P_NUM_INVITES].'" size="20"></div>'
					:
						'<div style="position:relative;width:180px;"><input type="textbox" name="monthly_inv['.$ug_id.']['.ADI_P_NUM_INVITES.']" value="'.$val[$ug_id][ADI_P_NUM_INVITES].'" size="20" style="display:inline-block;" onclick="guest.show();" onblur="guest.hide();" id="guest_help_textbox">
						<img src="css/assets/adiinviter_note.png" style="position:absolute; right: 0px;top: 9px;" onclick="guest.toggle();"  id="guest_help_img"><br>
						<div id="guest_help" class="fieldset" style="display: none;position: absolute;padding: 10px;z-index:10;width:400px;" align="left">
							No. of invitations for usergroup <b>Unregistered/Not Logged In</b> indicates how many invitations they can send at a time. <font color="#f00"><b>This is not a monthly quota</b></font>.
						</div></div>').'
					</td>
					<td rel="4" align="center" class="perm_table_td">
					'.( $ug_id != $not_logged_in_usergroup_id ?
						'<input type="checkbox" name="monthly_inv['.$ug_id.']['.ADI_P_DELETE_INVITES.']"
						class="monthly_inv_g_'.$ug_id.'"
						onchange="perm.update(this);"
						value="1" '.($val[$ug_id][ADI_P_DELETE_INVITES] == '1' ? "checked" : "").'>'
					:
						'-').'
					</td>
					<td rel="4" align="center" class="perm_table_td">
					'.( $ug_id != $not_logged_in_usergroup_id ?
						'<input type="checkbox" name="monthly_inv['.$ug_id.']['.ADI_P_DOWN_CSV.']"
						class="monthly_inv_g_'.$ug_id.'"
						onchange="perm.update(this);"
						value="1" '.($val[$ug_id][ADI_P_DOWN_CSV] == '1' ? "checked" : "").'>'
					:
						'-').'
					</td>
					<td rel="4" align="center" class="perm_table_td">
						<input type="checkbox" name="monthly_inv['.$ug_id.']['.ADI_P_RECAPTCHA.']"
						class="monthly_inv_g_'.$ug_id.'"
						onchange="perm.update(this);"
						value="1" '.($val[$ug_id][ADI_P_RECAPTCHA] == '1' ? "checked" : "").'>
					</td>
				</tr>';
				$odd=!$odd;
			}

			echo '</tbody></table></center></div>
			</td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><center><p align="right" style="margin-right: 20px;width: 936px;"><input class="button" type="submit" value="Save" /></p>
			</center></td>
		</tr>
		</table>
	<div class="clearboth"></div>
</div>
</form>';

if($adiinviter->user_system)
{

echo '<form action="" method="post" onsubmit="return formSubmit(this,\'user_permissions\');">
<div class="fieldset">
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>
			<td colspan="2"><b>Assign custom permissions to single user</b></td>
		</tr>
		<tr><td colspan="2" style="height:20px;"></td></tr>
		<tr>
			<td align="right" style="padding: 5px;width:100px;">
			<label>Username : </label></td>
			<td>
			<input type="textbox" name="per_user[username]" id="new_user_perm" value="" size="50">
			<input style="font-size: 12px;" type="button" name="check_user" id="check_user" value="Check Username" onclick="return checkUserName();">
			<span style="color:#ff0000;" id="username_iv"></span><br><br>
			</td>
		</tr>
		<tr>
			<td align="right" style="padding: 5px;width:100px;">
			<label>UserID : </label></td>
			<td>
			<input type="textbox" name="per_user[userid]" id="new_user_perm_id" value="" size="50">
			<input style="font-size: 12px;" type="button" name="check_user" id="check_user" value="Check UserID" onclick="return checkUserID();">
			<span style="color:#ff0000;" id="userid_iv"></span><br><br>
			</td>
		</tr>
		<tr>
			<td colspan="2"><div id="new_user_row" style=""></div></td>
		</tr>
		</table>
	<div class="clearboth"></div>
</div>
</form>';
}

$val   = $settings['adiinviter_user_permissions'];
if(count($val) > 0)
{
echo '<form action="" method="post" onsubmit="return formSubmit(this,\'user_permissions\');">
<div class="fieldset">
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>
			<td><b>Manage previously assigned custom permissions to users.</b></td>
		</tr>
		<tr><td colspan="2" style="height:20px;"></td></tr>
		<tr>
			<td colspan="2">
			';
				$rows  = ''; $flg=false;

				$pageSize = 5;
				$pages = ceil(count($val) / $pageSize);
				$val   = array_slice($val,0,$pageSize,true);

				$odd=false;
				foreach($val as $userid => $perms)
				{
					$userinfo = $adiinviter->get_userinfo($userid);
					$username = isset($userinfo['username']) ? $userinfo['username'] : '';
					$flg = true;
					$rows .= '<tr '.($odd?'class="odd"':'').'>
						<td class="perm_table_td" style="text-align: center;">'.$userid.'</td>
						<td class="perm_table_td" style="text-align: left;">'.$username.'</td>
						<td align="center" class="perm_table_td">
							<input type="checkbox" name="per_user_inv['.$userid.']['.ADI_P_USE_INVITER.']"
							id="per_user_inv['.$userid.']['.ADI_P_USE_INVITER.']"
							onchange="perm.change(this);"
							value="1" '.($val[$userid][ADI_P_USE_INVITER] == '1' ? "checked" : "").'>
						</td>
						<td class="perm_table_td">
							<input type="textbox" name="per_user_inv['.$userid.']['.ADI_P_NUM_INVITES.']" value="'.$val[$userid][ADI_P_NUM_INVITES].'" size="20">
						</td>
						<td align="center" class="perm_table_td">
							<input type="checkbox" name="per_user_inv['.$userid.']['.ADI_P_DELETE_INVITES.']"
							id="per_user_inv['.$userid.']['.ADI_P_DELETE_INVITES.']"
							onchange="perm.update(this);"
							value="1" '.($val[$userid][ADI_P_DELETE_INVITES] == '1' ? "checked" : "").'>
						</td>
						<td align="center" class="perm_table_td">
							<input type="checkbox" name="per_user_inv['.$userid.']['.ADI_P_DOWN_CSV.']"
							id="per_user_inv['.$userid.']['.ADI_P_DOWN_CSV.']"
							onchange="perm.update(this);"
							value="1" '.($val[$userid][ADI_P_DOWN_CSV] == '1' ? "checked" : "").'>
						</td>
						<td align="center" class="perm_table_td">
							<input type="checkbox" name="per_user_inv['.$userid.']['.ADI_P_RECAPTCHA.']"
							id="per_user_inv['.$userid.']['.ADI_P_RECAPTCHA.']"
							onchange="perm.update(this);"
							value="1" '.($val[$userid][ADI_P_RECAPTCHA] == '1' ? "checked" : "").'>
						</td>
						<td class="perm_table_td">
							<input type="button" name="check_user" id="check_user" value="Delete" style="font-size: 12px;"
							onclick="return perm.del('.$userid.',\''.$username.'\');">
						</td>
					</tr>';
					$odd=!$odd;
				}
				if($flg) {
					echo '<div style="height: auto;" id="user_perms"><center>
					<table style="margin-bottom:20px;" class="normal">
					<thead>
					<tr>
						<th class="perm_table_th" style="width: 45px;">UserID</th>
						<th class="perm_table_th" style="width: 112px;">Username</th>
						<th class="perm_table_th" style="text-align: center;width:65px;">Can Use AdiInviter</th>
						<th class="perm_table_th" style="text-align: center;width:130px;">Number of Invitations Per Month</th>
						<th class="perm_table_th" style="text-align: center;width:77px;">Can Delete Own Invites</th>
						<th class="perm_table_th" style="text-align: center;width:100px;">Can Download AdiInviter CSV</th>
						<th class="perm_table_th" style="text-align: center;width:75px;">Show reCAPTCHA</th>
						<th class="perm_table_th" style="width:100px;"></th>
					</tr></thead><tbody>'.$rows.'</tbody></table>
					<p align="right" style="padding: 0px 10px 10px;width: 906px;">';

		$currentPage = 1;
		//$pages = ceil(count($val) / $pageSize);
		if($currentPage > 2)
			echo '<input type="button" style="font-size: 12px;" onclick="user_perm.pag(0);" value="First">';

		if($currentPage > 1)
			echo '<input type="button" style="font-size: 12px;" onclick="user_perm.pag('.($currentPage-1).');" value="Prev">';
		echo '<input type="button" style="display: inline-block;font-size: 12px;" value="Page '.$currentPage.' of '.$pages.'">';
		if($pages - $currentPage > 0)
			echo '<input type="button" style="font-size: 12px;" onclick="user_perm.pag('.($currentPage+1).');" value="Next">';
		if($pages - $currentPage > 1) echo '<input type="button" style="font-size: 12px;" onclick="user_perm.pag('.($pages).');" value="Last">';

		echo '</p></center></div>';
				}
			echo '</td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td>
				<center><p align="right" style="margin-right: 20px;width: 917px;"> <input class="button" type="submit" value="Save" /> </p>
				</center>
			</td>
		</tr>
	</table>
	<div class="clearboth"></div>
</div>';
}
echo  '<input type="hidden" name="adi_user_permissions" value="adi_global">
</form>';

/*
<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Manually Change/Assign No. of Invitations For Single User</b></td>
		</tr>
		<tr><td colspan="2" style="height:20px;"></td></tr>
		<tr>
			<td><label>Username.</label></td>
			<td><input type="textbox" name="per_user[username]" value="" size="50" onblur="return checkUserName(this);">
			<span style="color:#ff0000;" id="username_iv"></span><span style="color:Green;" id="username_ok"></span></td>
		</tr>
		<tr><td colspan="2" style="height:20px;"></td></tr>
		<tr>
			<td><label>No. of invitations(You can write "Unlimited" without quotes).</label></td>
			<td><input type="textbox" name="per_user[inv]" value="" size="50"></td>
		</tr>
*/
break;

/* adi_statistics
*/
case 'adi_statistics':
case 'adi_user_wise':
case 'adi_date_wise':

$graphcolors = array(
	'invitation_sent'  => array('D98200','FFCC80'),
	'accepted' => array('70932F','BCD988'),
	'blocked'  => array('C40000','FF8C8C'),
	'waiting'  => array('6A869D','DDEBF7'),
);
/*$lang_code = $adiinviter->settings['adiinviter_lang_code'];
$lang_path = ADI_CORE_PATH.'lang'.ADI_DS;
if( file_exists($lang_path.$lang_code.'.php'))
{
	include($lang_path.$lang_code.'.php');
}
else if( file_exists($lang_path.'en-us-adiinviter.php'))
{
	include($lang_path.'en-us-adiinviter.php');
}*/
$status_phrases = array(
	'accepted' => sprintf($adiinviter->phrases['adi_invitation_status_accepted']),
	'invitation_sent'  => sprintf($adiinviter->phrases['adi_invitation_status_invited']),
	'blocked'  => sprintf($adiinviter->phrases['adi_invitation_status_blocked']),
	'waiting'  => sprintf($adiinviter->phrases['adiinviter_invitation_waiting']),
);

echo '<fieldset>
	<h1 style="margin-bottom:20px;">AdiInviter Statistics</h1>
	<div class="clearboth"></div>
</fieldset>';

if($adiinviter->get_invitation_count() == 0)
{
	echo '<fieldset style="padding: 15px;"><h4>No invitations has been sent using AdiInviter.</h4></fieldset>';
	break;
}

echo '<fieldset>
	<form action="" method="post" onsubmit="return getReports(this);">
	<p align="left" style="margin-bottom: 20px;">
		<a class="button_link_clicked" id="show_statsform1" style="cursor:pointer;" onclick="show_stats(1);" class="button_link">All Users Summery</a>
		<a class="button_link" id="show_statsform2" style="cursor:pointer;" onclick="show_stats(2);" class="button_link">Date-wise Summery</a>
		<a class="button_link" id="show_statsform3" style="cursor:pointer;" onclick="show_stats(3);" class="button_link">User-wise Summery</a>
		<a class="button_link" id="show_statsform4" style="cursor:pointer;" onclick="show_stats(4);" class="button_link">All services Summery</a>
		<a class="button_link" id="show_statsform5" style="cursor:pointer;" onclick="show_stats(5);" class="button_link">Content Share Summery</a>
	</p>
	</form>

</fieldset>
<fieldset id="date_wise" style="display: none;padding-bottom:20px;">
	<form action="" method="post" onsubmit="return getReports(this,2);">
	<table align="left" style="width:100%;">
	<tr>
		<td style="padding: 5px;width: 70px;" align="right">From : </td><td style="padding: 5px;">
		<select name="from_month">';
		for($a=1;$a<=12;$a++) {
			if($a+1==date("m"))
				echo "<option value='{$a}' selected>".date("F",mktime(0,0,0,$a,1,1999))."</option>";
			else
				echo "<option value='{$a}'>".date("F",mktime(0,0,0,$a,1,1999))."</option>";
		}
		echo '</select>
		<input type="textbox" name="from_date" size="2" maxlength="2" value="1">
		<input type="textbox" name="from_year" size="6" maxlength="4" value="'.date("Y").'"></td>
	</tr>
	<tr>
		<td style="padding: 5px;" align="right"> To : </td><td style="padding: 5px;">
		<select name="to_month">';
		for($a=1;$a<=12;$a++) {
			if($a==date("m"))
				echo "<option value='{$a}' selected>".date("F",mktime(0,0,0,$a,1,1999))."</option>";
			else
				echo "<option value='{$a}'>".date("F",mktime(0,0,0,$a,1,1999))."</option>";
		}
		echo '</select>
		<input type="textbox" name="to_date" size="2" maxlength="2" value="'.date("d").'">
		<input type="textbox" name="to_year" size="6" maxlength="4" value="'.date("Y").'"></td>
	</tr>
	<tr>
		<td colspan="2" align="right"><input class="button" type="submit" value="Go" /></td>
	</tr>
	</table>
	<input type="hidden" name="report" value="adi_date_wise">
	</form>
</fieldset>

<fieldset id="user_wise" style="display: none;">
	<form action="" method="post" onsubmit="return getReports(this,3);">
	<table align="left" style="width:100%;margin-bottom:20px;">
	<tr>
		<td style="padding: 5px;width: 80px;" align="right">Username : </td>
		<td style="padding: 5px;width: 100px;"><input type="textbox" name="username" id="report_username" size="20"></td>
		<td><input class="button" type="submit" value="Go" style="margin-top: 3px;"/></td>
	</tr>
	</table><input type="hidden" name="report" value="adi_user_wise">
	</form>

	<form action="" method="post" onsubmit="return getReports(this,3);">
	<table align="left" style="width:100%;margin-bottom:20px;">
	<tr>
		<td style="padding: 5px;width: 80px;" align="right">User ID : </td>
		<td style="padding: 5px;width: 100px;"><input type="textbox" name="userid" id="report_userid" size="20"></td>
		<td><input class="button" type="submit" value="Go" style="margin-top: 3px;"/></td>
	</tr>
	</table><input type="hidden" name="report" value="adi_user_wise">
	</form>
</fieldset>

<fieldset id="chartArea">
	<div id="chartDescription"></div>
	<div id="chart" style="margin-bottom: 20px;" align="center"><p style="margin-bottom:20px;">Unable to load Flash content. The YUI Charts Control requires Flash Player 9.0.45 or higher. You can download the latest version of Flash Player from the <a href="http://www.adobe.com/go/getflashplayer">Adobe Flash Player Download Center</a>.</p></div>
	<div style="display:none;margin-bottom: 12px;" id="graph_paginate" align="center">
		<input class="button prev" onclick="graph.paginate(this);" page="1" type="button" value="Previous" style="margin-top: 3px;display:inline-block;display: none;"/>
		<input class="button info" type="button" value="Page 1 of " style="margin-top: 3px;display:inline-block;"/>
		<input class="button next" onclick="graph.paginate(this);" page="2" type="button" value="Next" style="margin-top: 3px;display:inline-block;"/>
	</div>
<div class="clearboth"></div>
</fieldset>

<div id="pagination" style="margin-right: 15px;">';
require_once($base_path.DIRECTORY_SEPARATOR.'adi_plugin'.DIRECTORY_SEPARATOR.'all_users.php');
echo '</div>
</div>
'; break;

/**
 * adi_Check Version
 */
case 'adi_check_updates':
	echo '<form action="" method="post" onsubmit="return formSubmit(this);">
	<fieldset>
		<h1 style="margin-bottom:20px;">AdiInviter Pro Change Log</h1>
		<div class="clearboth"></div>
	</fieldset>';

	if(function_exists('curl_init'))
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://www.adiinviter.com/adiinviterUpdatesCheck.php?b=".$adiinviter->adiinviter_build_id);
		curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
		$res = curl_exec($ch);
		echo $res;
		curl_close($ch);
	}
	else
	{
		die('Sorry cURL is not installed!');
	}

	echo '<input type="hidden" name="adi_help" value="adi_global">
	</form>'; break;
}

?>