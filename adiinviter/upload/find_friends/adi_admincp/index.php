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

$base_path = dirname(__FILE__);
error_reporting(E_ALL ^ E_NOTICE);
include($base_path.DIRECTORY_SEPARATOR.'init.php');

if(!$adiinviter->db->connected || count($adiinviter->settings) == 0)
{
	header('location: db_installer.php');
	exit;
}

$sub_values = array(
	'website_name'          => $adiinviter->settings['website_title'],
	'website_logo'          => $adiinviter->settings['adiinviter_website_logo'],
	'my_website_logo'       => $adiinviter->settings['adiinviter_website_logo'],
	'my_website_logo_small' => $adiinviter->settings['adiinviter_website_logo_small'],
	'sender_avatar_url'     => $adiinviter->avatar_url,
	'sender_name'           => 'InviterName',
	'sender_username'       => 'InviterUsername',
	'attached_note'         => 'Custom Attach Note',
	'forum_url'             => $adiinviter->settings['adiinviter_root_url'],
	'website_root_url'      => $adiinviter->settings['adiinviter_website_root_url'],
	'adiinviter_root_url'   => $adiinviter->settings['adiinviter_files_root_url'],
);
$settings =& $adiinviter->settings;

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>AdiInviter Control Panel</title>
<link type="text/css" href="./css/style.css" rel="stylesheet" /> <!-- the layout css file -->
<link type="text/css" href="<?php echo $adiinviter->adi_root_url_rel; ?>adi_services/adiinviter_login.css" rel="stylesheet" /> <!-- the layout css file -->

<link type="text/css" rel="stylesheet" href="./css/tree.css">
<link type="text/css" rel="stylesheet" href="./css/charts.css">

<script type='text/javascript' src='./js/jquery-1.4.2.min.js'></script>	<!-- jquery library -->
<script type='text/javascript' src='./js/zingchart.js'></script>

<script type='text/javascript' src='./js/yui_mix.js'></script>
<script type='text/javascript' src='./js/adiinviter.js'></script>
<script type='text/javascript' src='./js/yui-min.js'></script>

<style type="text/css">
#chart { height: 350px; }
.chart_title {
	display: block;
	font-size: 1.2em;
	font-weight: bold;
	margin-bottom: 0.4em;
}
</style>
<script type="text/javascript">
var tree;
var subvalues = <?php echo json_encode($sub_values); ?>;
curTitle = 'adi_global';
</script>
<meta charset="UTF-8">
</head>
<body>
<div style="text-align:right;" class="signout">
	<span onclick="window.location = 'login.php?do=reset';">Reset Password</span>
	<span>&nbsp;</span>
	<span style="border-left: 1px solid #eee;">&nbsp;</span>
	<span onclick="window.location = 'login.php?do=logout';">Sign out</span>
</div>
<div id="loading_mask"></div>

<div id="loading_content">
<table><tr>
	<td align="center">
		<fieldset style="width: 315px; opacity: 1; padding: 20px 20px 20px 20px;">
			<h3>Updating settings, please wait..</h3>
			<img src="css/assets/loading.gif">
		</fieldset>
	</td>
</tr></table>
</div>

<div style="height:0px;">
	<div id="templatePreview" style="position:relative;visibility:hidden;height:auto;z-index:15;">
		<div id="templatePreviewCode"></div>
		<table style="width: 100%;">
		<tr>
		<td align="left">

		<a class="button_link guestClicked" type="button" onclick="return setPreview(this,'guest');" style="padding: 4px; margin: 4px 0px;display:inline-block;font-size: 12px;">Guest Mode</a>

		<a class="button_link_clicked regClicked" type="button" onclick="return setPreview(this,'reg');" style="padding: 4px; margin: 4px 0px;display:inline-block;font-size: 12px;"/> Logged-In Mode </a>

		</td>
		<td align="right" style="color:#EEE;">
			<span style="display:inline;"> Press ESC or click </span>
			<input class="button" type="button" value="Close" onclick="return hidePreview();" style="padding: 4px; margin: 4px 0px;display:inline;"/>
		</td>
		</tr>
		</table>
	</div>
</div>



<div style='' id="adi_overlay"></div>
<div id="container">

	<div id="left_navbar" style="z-index: 2;">
		<img src="css/assets/adiinviter_logo_small.png" style="position:absolute;margin: 20px 0px 0px 8px;left: 0;">
		<div id="primary_left" style="top: 140px; width: 197px;">
			<div id="menu"> <!-- navigation menu -->
				<ul>
					<li class="current" rel="adi_global"><a href="#"><span class="current">Global settings</span></a></li>
					<li rel="adi_db_integrate"><a href="#"><span class="current">Database Integration</span></a></li>
					<li rel="adi_manage_services"><a href="#"><span>Manage Services</span><img src="css/assets/admincp_loading.gif" class="loading_img"></a></li>
					<li rel="adi_oauth_applications"><a href="#"><span>OAuth Applications</span><img src="css/assets/admincp_loading.gif" class="loading_img"></a></li>
					<li rel="adi_invitation_mail"><a href="#"><span>Invitation Mail</span><img src="css/assets/admincp_loading.gif" class="loading_img"></a></li>
					<li rel="adi_content_share"><a href="#"><span>Content Share</span><img src="css/assets/admincp_loading.gif" class="loading_img"></a></li>
					<li rel="adi_reminder_mail"><a href="#"><span>Invitation Reminder</span><img src="css/assets/admincp_loading.gif" class="loading_img"></a></li>
					<li rel="adi_user_permissions"><a href="#"><span>User Permissions</span><img src="css/assets/admincp_loading.gif" class="loading_img"></a></li>
					<li rel="adi_lang_settings" id="lang_tab"><a href="#"><span>Language Settings</span><img src="css/assets/admincp_loading.gif" class="loading_img"></a></li>
					<li rel="adi_statistics"><a href="#"><span>Statistics</span><img src="css/assets/admincp_loading.gif" class="loading_img"></a>
					</li>
					<li rel="adi_check_updates"><a href="#"><span>Check for updates</span><img src="css/assets/admincp_loading.gif" class="loading_img"></a></li>
				</ul>
			</div> <!-- navigation menu end -->
		</div> <!-- sidebar end -->
	</div> <!-- left_navbar end -->

	<div id="bgwrap">
			<div id="primary_right">
				<div class="inner">
				<div style="height: 15px;"></div>
					<div class="notification_nclk success" id="adi_updateSuccess" style="display:none;" title="">
						<div class="text">
							<p><strong id="successText">All settings have been updated successfully!</strong></p>
						</div>
					</div>
					<div class="notification_nclk error" id="adi_updateError" style="display:none;" title="">
						<div class="text">
							<p><strong id="errorText">All settings have been updated successfully!</strong></p>
						</div>
					</div>

					<div class="notification success" id="adi_notify" style="display:none;" title="Click to close this message!!">
						<span></span>
						<div class="text">
							<p><strong id="successText">All settings have been updated successfully!</strong></p>
						</div>
					</div>
					<div class="notification error" id="adi_logged_out" style="display:none;" title="Click to close this message!!">
						<span></span>
						<div class="text">
							<p>Error! Your Joomla AdminCP session has been expired. Please log-in and try again.</p>
						</div>
					</div>
					<div class="notification error" id="adi_error" style="display:none;" title="Click to close this message!!">
						<span></span>
						<div class="text">
							<p>Error! Some error has been occured.</p>
						</div>
					</div>

					<div id="adi_db_integrate" state="1" style="display: none;">
					<form action="" method="post" onsubmit="return formSubmit(this,'db_integrate');">
					<div class="fieldset">
						<h1 style="margin-bottom:20px;">AdiInviter Database Integration</h1>
						<div class="clearboth"></div>
					</div>

					<div class="fieldset">
						<table class="adiinviter_table" style="margin-bottom:20px;">
						<tr>
							<td colspan="2"><b>User Table Details</b><br>
							<label>Enter following details about the database table which stores information about your website users.</label></td>
						</tr>
						<tr><td colspan="2"><hr/></td></tr>
						<tr>
							<td><b>User Table Name</b><br>
							<label>Enter full name of your user table with table prefix.</label></td>
							<td style="width:45%;"><input type="textbox" name="setting[adiinviter_user_table][table_name]" size="60" value="<?php echo $settings['adiinviter_user_table']['table_name']; ?>"></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>User ID field</b><br>
							<label>Enter field name from your user table where user IDs are stored.</label></td>
							<td><input type="textbox" name="setting[adiinviter_user_table][userid]" size="60" value="<?php echo $settings['adiinviter_user_table']['userid']; ?>"></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>Username field</b><br>
							<label>Enter field name from your user table where usernames are stored.</label></td>
							<td><input type="textbox" name="setting[adiinviter_user_table][username]" size="60" value="<?php echo $settings['adiinviter_user_table']['username']; ?>"></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>Email field</b><br>
							<label>Enter field name from your user table where user's email addresses are stored.</label></td>
							<td><input type="textbox" name="setting[adiinviter_user_table][email]" size="60" value="<?php echo $settings['adiinviter_user_table']['email']; ?>"></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>User Fullname field(s)</b><br>
							<label>Enter comma separated list of field(s) from your user table which forms users's fullname.</label></td>
							<td><input type="textbox" name="setting[adiinviter_user_table][fullname]" size="60" value="<?php echo $settings['adiinviter_user_table']['fullname']; ?>"></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>Usergroup ID field</b><br>
							<label>Enter field name from your user table where usergroup IDs are stored.</label><br>
							<label><font color="#DD4B39">Note:</font> If your webiste has separate table for user to usergroup mapping <a href="" onclick="adi.toggle('usergroup_mapping');return false;">click here.</label></td>
							<td><input type="textbox" name="setting[adiinviter_user_table][usergroupid]" size="60" value="<?php echo $settings['adiinviter_user_table']['usergroupid']; ?>"></td>
						</tr>
						<tr>
							<td colspan="2"><div id="usergroup_mapping"<?php echo empty($settings['adiinviter_usergroup_mapping_table']['table_name']) ? ' style="display: none;"' : ''; ?>>
							<table class="adiinviter_table" style="margin-bottom:20px;" align="left">
							<tr><td colspan="2" style="height: 5px;"></td></tr>
							<tr>
								<td><b>Table Name</b></td>
								<td><input type="textbox" name="setting[adiinviter_usergroup_mapping_table][table_name]" size="60" value="<?php echo $settings['adiinviter_usergroup_mapping_table']['table_name']; ?>"></td>
							</tr>
							<tr><td colspan="2" style="height: 5px;"></td></tr>
							<tr>
								<td><b>User ID field</b></td>
								<td><input type="textbox" name="setting[adiinviter_usergroup_mapping_table][userid]" size="60" value="<?php echo $settings['adiinviter_usergroup_mapping_table']['userid']; ?>"></td>
							</tr>
							<tr><td colspan="2" style="height: 5px;"></td></tr>
							<tr>
								<td><b>Usergroup ID field</b></td>
								<td><input type="textbox" name="setting[adiinviter_usergroup_mapping_table][usergroupid]" size="60" value="<?php echo $settings['adiinviter_usergroup_mapping_table']['usergroupid']; ?>"></td>
							</tr>
							</table>
							</div></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>Avatar URL field</b><br>
							<label>Enter field name from your user table where user's avatars are stored.</label><br>
							<label><font color="#DD4B39">Note:</font> If your webiste has separate table for user to avatar mapping <a href="" onclick="adi.toggle('avatar_mapping');return false;">click here.</label></td>
							<td><input type="textbox" name="setting[adiinviter_user_table][avatar]" size="60" value="<?php echo $settings['adiinviter_user_table']['avatar']; ?>"></td>
						</tr>
						<tr>
							<td colspan="2"><div id="avatar_mapping"<?php echo empty($settings['adiinviter_avatar_mapping_table']['table_name']) ? ' style="display: none;"' : ''; ?>>
							<table class="adiinviter_table" style="margin-bottom:20px;" align="left">
							<tr><td colspan="2" style="height: 5px;"></td></tr>
							<tr>
								<td><b>Table Name</b></td>
								<td><input type="textbox" name="setting[adiinviter_avatar_mapping_table][table_name]" size="60" value="<?php echo $settings['adiinviter_avatar_mapping_table']['table_name']; ?>"></td>
							</tr>
							<tr><td colspan="2" style="height: 5px;"></td></tr>
							<tr>
								<td><b>User ID field</b></td>
								<td><input type="textbox" name="setting[adiinviter_avatar_mapping_table][userid]" size="60" value="<?php echo $settings['adiinviter_avatar_mapping_table']['userid']; ?>"></td>
							</tr>
							<tr><td colspan="2" style="height: 5px;"></td></tr>
							<tr>
								<td><b>Avatar URL field</b></td>
								<td><input type="textbox" name="setting[adiinviter_avatar_mapping_table][avatar]" size="60" value="<?php echo $settings['adiinviter_avatar_mapping_table']['avatar']; ?>"></td>
							</tr>
							</table>
							</div></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>Avatar URL</b><br>
							<label>Enter user avatar url.</label><br>
						<table class="normal" style="margin-bottom:20px;">
<thead><tr><th class="perm_table_th">Syntax</th><th class="perm_table_th">Meaning</th></tr></thead>
<tbody>
<tr><td class="synt_table_td">[userid]</td><td class="synt_table_td">User's ID</td></tr>
<tr><td class="synt_table_td">[uasername]</td><td class="synt_table_td">User's Username</td></tr>
<tr><td class="synt_table_td">[avatar_value]</td><td class="synt_table_td">Avatar value from avatar field</td></tr>
</tbody></table></td>
							<td><input type="textbox" name="setting[adiinviter_avatar_prefix]" size="60" value="<?php echo $settings['adiinviter_avatar_prefix']; ?>"></td>
						</tr>
						</table>
						<div class="clearboth"></div>
					</div>

					<div class="fieldset">
						<table class="adiinviter_table" style="margin-bottom:20px;">
						<tr>
							<td><b>User profile Page URL</b><br>
							<label>Enter full URL of user profile in your website in below format. <br>
							e.g. http://www.yourdomain.com/member.php?u=<b><i>[userid]</i></b><br>
							http://www.yourdomain.com/member.php?u=<b><i>[username]</i></b>
						</label></td>
							<td><input type="textbox" name="setting[adiinviter_profile_link]" size="60" value="<?php echo $settings['adiinviter_profile_link']; ?>"></td>
						</tr>
						</table>
						<div class="clearboth"></div>
					</div>


					<div class="fieldset">
						<table class="adiinviter_table" style="margin-bottom:20px;">
						<tr>
							<td colspan="2"><b>Usergroup Table Details</b><br>
							<label>Enter following details about the database table which stores information about all usergroups in your website.</label></td>
						</tr>
						<tr><td colspan="2"><hr/></td></tr>
						<tr>
							<td><b>Usergroup Table Name</b><br>
							<label>Enter full name of your usergroups table with table prefix.</label></td>
							<td style="width:45%;"><input type="textbox" name="setting[adiinviter_usergroup_table][table_name]" size="60" value="<?php echo $settings['adiinviter_usergroup_table']['table_name']; ?>"></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>Usergroup ID field</b><br>
							<label>Enter field name from your usergroups table where usergroup IDs are stored.</label></td>
							<td><input type="textbox" name="setting[adiinviter_usergroup_table][usergroupid]" size="60" value="<?php echo $settings['adiinviter_usergroup_table']['usergroupid']; ?>"></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>Usergroup name field</b><br>
							<label>Enter field name from your usergroups table where usergroup names are stored.</label></td>
							<td><input type="textbox" name="setting[adiinviter_usergroup_table][name]" size="60" value="<?php echo $settings['adiinviter_usergroup_table']['name']; ?>"></td>
						</tr>
						</table>
						<div class="clearboth"></div>
					</div>

					<div class="fieldset">
						<table class="adiinviter_table" style="margin-bottom:20px;">
						<tr>
							<td colspan="2"><b>Friends relations Table Details</b><br>
							<label>Enter following details about the database table which stores information about friendship relations between users of your website.</label></td>
						</tr>
						<tr><td colspan="2"><hr/></td></tr>
						<tr>
							<td><b>Friends Table Name</b><br>
							<label>Enter full name of friendship relations table with table prefix.</label></td>
							<td style="width:45%;"><input type="textbox" name="setting[adiinviter_friends_mapping_table][table_name]" size="60" value="<?php echo $settings['adiinviter_friends_mapping_table']['table_name']; ?>"></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>User ID field</b><br>
							<label>Enter field name from your friends relations table where user IDs are stored.</label></td>
							<td><input type="textbox" name="setting[adiinviter_friends_mapping_table][userid]" size="60" value="<?php echo $settings['adiinviter_friends_mapping_table']['userid']; ?>"></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>Friend ID field</b><br>
							<label>Enter field name from your friends relations table where friend IDs are stored.</label></td>
							<td><input type="textbox" name="setting[adiinviter_friends_mapping_table][friend_id]" size="60" value="<?php echo $settings['adiinviter_friends_mapping_table']['friend_id']; ?>"></td>
						</tr>
						<tr><td colspan="2" style="height: 15px;"></td></tr>
						<tr>
							<td><b>Friendship status field</b><br>
							<label>Enter field name from your friends relations table where status of friendships are stored.</label></td>
							<td><input type="textbox" name="setting[adiinviter_friends_mapping_table][status]" size="60" value="<?php echo $settings['adiinviter_friends_mapping_table']['status']; ?>"></td>
						</tr>
						<tr>
							<td colspan="2">
							<table class="adiinviter_table" style="margin-bottom:20px;" align="left">
							<tr><td colspan="2" style="height: 10px;"></td></tr>
							<tr><td colspan="2">Note: Specify following 2 values according to their datatype. If field datatype is <b>varchar</b> or <b>text</b> format, specify them in single quotes.<br>
							<label>for e.g. 'yes'</label></td></tr>
							<tr><td colspan="2" style="height: 10px;"></td></tr>
							<tr>
								<td><b>Status value if friend request is accepted</b></td>
								<td><input type="textbox" name="setting[adiinviter_friends_mapping_table][yes_value]" size="60" value="<?php echo $settings['adiinviter_friends_mapping_table']['yes_value']; ?>"></td>
							</tr>
							<tr><td colspan="2" style="height: 5px;"></td></tr>
							<tr>
								<td><b>Status value if friend request is waiting for approval</b></td>
								<td><input type="textbox" name="setting[adiinviter_friends_mapping_table][pending_value]" size="60" value="<?php echo $settings['adiinviter_friends_mapping_table']['pending_value']; ?>"></td>
							</tr>
							</table>
							</td>
						</tr>
						</table>
						<div class="clearboth"></div>
					</div>

					<div class="fieldset">
						<p align="right" style="margin-bottom:20px;"><input class="button" type="submit" value="Submit"/></p>
					</div>
					<input type="hidden" name="section" value="adi_global">
					</form>
					</div>


					<div id="adi_global" state="1">
					<form action="" method="post" onsubmit="return formSubmit(this);">
					<div class="fieldset">
						<h1 style="margin-bottom:20px;">AdiInviter Global Settings</h1>
						<div class="clearboth"></div>
					</div>
					<div class="fieldset">
						<table class="adiinviter_table" style="margin-bottom:20px;">
							<tr>
								<td><b>AdiInviter system On/Off</b><br>
								<label>Globally turn AdiInviter system On/Off.</label></td>
								<td><input type="radio" name="setting[adiinviter_onoff]" value="1" <?php echo ($settings['adiinviter_onoff'] == '1')? 'checked="checked"':''; ?> id="adiinviter_onoff_on">
								<label for="adiinviter_onoff_on"> On </label><br/>

								<input type="radio" name="setting[adiinviter_onoff]" value="0" <?php echo ($settings['adiinviter_onoff'] == '0')? 'checked="checked"':''; ?> id="adiinviter_onoff_off">
								<label for="adiinviter_onoff_off"> Off </label><br/></td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><label><b>AdiInviter turn off message</b></lavel><br><label>AdiInviter system turn off message.</label></td>
								<td>
								<textarea name="setting[adiinviter_turn_off_message]" rows="6" cols="40" style="width:90%" wrap="virtual" dir="ltr" tabindex="1" ><?php echo $settings['adiinviter_turn_off_message']; ?></textarea></td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>AdiInviter Theme</b><br>
								<label>Choose theme for AdiInviter.</label></td>
								<td><select name="setting[adiinviter_skin]">
								<?php

$results   = array();
$directory = ADI_CORE_PATH.'themes';
$handler   = opendir($directory);
$str = '';
while($file = readdir($handler))
{
	$str='';
	if(is_dir($directory.ADI_DS.$file))
	{
		if(file_exists($directory.ADI_DS.$file.ADI_DS.'index.php') && $file != '.' && $file != '..')
		{
			include($directory.ADI_DS.$file.ADI_DS.'index.php');
			$label = $adiinviter_theme_name;
			unset($adiinviter_theme_key, $adiinviter_theme_name);
			if($settings['adiinviter_skin'] == $file)
				$str = ' selected="selected"';
			else
				$str='';
			if(!empty($file) && !empty($label))
				echo '<option value="'.$file.'"'.$str.'>'.$label.'</option>';
		}
	}
}
closedir($handler);

?></select>
								</td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Show Already Registered Contacts.</b><br>
								<label>Show registered users from imported contacts even if you don't have Friends system.</label>
								</td>
								<td><input type="radio" name="setting[adiinviter_show_already_registered]" value="1" <?php echo ($settings['adiinviter_show_already_registered'] == '1')? 'checked="checked"':''; ?> id="adiinviter_show_already_registered_on">
								<label for="adiinviter_show_already_registered_on"> On </label><br/>
								<input type="radio" name="setting[adiinviter_show_already_registered]" value="0" <?php echo ($settings['adiinviter_show_already_registered'] == '0')? 'checked="checked"':''; ?> id="adiinviter_show_already_registered_off">
								<label for="adiinviter_show_already_registered_off"> Off </label><br/></td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Ask Guest User Details.</b><br>
								<label>Guest users are asked for their Name and Email Address before sending invitations.</label>
								</td>
								<td><input type="radio" name="setting[adiinviter_store_guest_user_info]" value="1" <?php echo ($settings['adiinviter_store_guest_user_info'] == '1')? 'checked="checked"':''; ?> id="adiinviter_store_guest_user_info_on">
								<label for="adiinviter_store_guest_user_info_on"> On </label><br/>
								<input type="radio" name="setting[adiinviter_store_guest_user_info]" value="0" <?php echo ($settings['adiinviter_store_guest_user_info'] == '0')? 'checked="checked"':''; ?> id="adiinviter_store_guest_user_info_off">
								<label for="adiinviter_store_guest_user_info_off"> Off </label><br/></td>
							</tr>

							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Website title</b><br>
								<label>Enter your website title.</label></td>
								<td><input type="textbox" name="setting[website_title]" size="60" value="<?php echo $settings['website_title']; ?>"></td>
							</tr>
							<tr><td colspan="2" style="height: 15px;"></td></tr>
							<tr>
								<td><b>Website root URL</b><br>
								<label>Enter full URL of your website root without trailing slash (/). <br>
								e.g. http://www.yourdomain.com</label></td>
								<td><input type="textbox" name="setting[adiinviter_root_url]" size="60" value="<?php echo $settings['adiinviter_root_url']; ?>"></td>
							</tr>
							<tr><td colspan="2" style="height: 15px;"></td></tr>
							<tr>
								<td><b>AdiInviter Pro Files root URL</b><br>
								<label>Enter full URL of your AdiInviter Pro files root without trailing slash (/). <br>
								e.g. http://www.yourdomain.com/find_friends</label></td>
								<td><input type="textbox" name="setting[adiinviter_files_root_url]" size="60" value="<?php echo $settings['adiinviter_files_root_url']; ?>"></td>
							</tr>
							<tr><td colspan="2" style="height: 15px;"></td></tr>
							<tr>
								<td><b>Register/Sign Up page URL</b><br>
								<label>Enter full URL of your website's register or sign up page. <br>
								e.g. http://www.yourdomain.com/register.php</label></td>
								<td style="width:45%;"><input type="textbox" name="setting[adiinviter_register_link]" size="60" value="<?php echo $settings['adiinviter_register_link']; ?>"></td>
							</tr>
							<tr><td colspan="2" style="height: 15px;"></td></tr>
							<tr>
								<td><b>Website Login Page URL</b><br>
								<label>Enter full url of your website's Login page.<br>
								e.g. http://www.yourdomain.com/login.php</label></td>
								<td style="width:45%;"><input type="textbox" name="setting[adiinviter_website_login_url]" size="60" value="<?php echo $settings['adiinviter_website_login_url']; ?>"></td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Invitation mail dispatch type</b><br>
								<label>Invitation mail dispatch method<br><font style="color:#f00"><b>Note:</b></font> Invitation mails are sent on per hour basis in scheduled dispatch delivery.</label></td>
								<td><input type="radio" name="setting[adiinviter_mail_method]" value="cron" <?php echo ($settings['adiinviter_mail_method'] == 'cron')? 'checked="checked"':''; ?> id="adiinviter_mail_method_cron">
								<label for="adiinviter_mail_method_cron"> Scheduled Dispatch </label><br/>
                                    <input type="radio" name="setting[adiinviter_mail_method]" value="mail" <?php echo ($settings['adiinviter_mail_method'] == 'mail')? 'checked="checked"':''; ?> id="adiinviter_mail_method_imm">
								<label for="adiinviter_mail_method_imm"> Immediate Dispatch </label><br/></td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Maximum number of invitation mails to be sent per hour (scheduled dispatch)</b><br>
								<label>Number of invitation mails to be sent per hour.<br>
								<font style="color:#f00"><b>Note:</b></font> This wont affect if you have chosen immediate dispatch method above.</label></td>
								<td><input type="textbox" name="setting[adiinviter_cron_hour_limit]" size="60" value="<?php echo $settings['adiinviter_cron_hour_limit']; ?>"><br>
								<?php echo '<span style="font-size: 11px;">Currently ('.getQueueCount().' mails in the mail queue)</span>'; ?>
								</td>
							</tr>
							 <?php if($adiinviter->platform_id == 'vbulletin') { ?>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Invite only registrations</b><br>
								<label>New registrations are available by valid AdiInviter invitations only.</label></td>
								<td><input type="radio" name="setting[adiinviter_invite_only_registrations]" value="1" <?php echo ($settings['adiinviter_invite_only_registrations'] == '1')? 'checked="checked"':''; ?> id="adiinviter_invite_only_registrations_on">
								<label for="adiinviter_invite_only_registrations_on"> On </label><br/>
                                 <input type="radio" name="setting[adiinviter_invite_only_registrations]" value="0" <?php echo ($settings['adiinviter_invite_only_registrations'] == '0')? 'checked="checked"':''; ?> id="adiinviter_invite_only_registrations_off">
								<label for="adiinviter_invite_only_registrations_off"> Off </label><br/></td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Force invite receivers to register with email, to which invitation was sent</b><br>
								<label>For e.g. If invite was sent to abc@domain.com then receiver cannot use any other email but abc@domain.com while registering on your website.</label></td>
								<td><input type="radio" name="setting[adiinviter_force_receivers_email]" value="1" <?php echo ($settings['adiinviter_force_receivers_email'] == '1')? 'checked="checked"':''; ?> id="adiinviter_force_receivers_email_on">
								<label for="adiinviter_force_receivers_email_on"> On </label><br/>
                                 <input type="radio" name="setting[adiinviter_force_receivers_email]" value="0" <?php echo ($settings['adiinviter_force_receivers_email'] == '0')? 'checked="checked"':''; ?> id="adiinviter_force_receivers_email_off">
								<label for="adiinviter_force_receivers_email_off"> Off </label><br/></td>
							</tr>
							<?php } ?>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Website logo</b><br>
								<label>Enter full URL of your website logo.</label></td>
								<td><input type="textbox" name="setting[adiinviter_website_logo]" size="60" value="<?php echo $settings['adiinviter_website_logo']; ?>"></td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Website logo Small</b><br>
								<label>Enter full URL of your website Small logo (100x100 max size).</label></td>
								<td><input type="textbox" name="setting[adiinviter_website_logo_small]" size="60" value="<?php echo $settings['adiinviter_website_logo_small']; ?>"></td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Default cookie path</b><br>
								<label>Enter path for storing cookies. Leave it to default if you dont know what you are doing.</label></td>
								<td><input type="textbox" name="setting[adiinviter_cookie_path]" value="<?php echo $settings['adiinviter_cookie_path']; ?>" size="60"></td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>Email Sender Name</b><br>
								<label>Enter name of the sender to specify as sender name in outgoing emails.</label></td>
								<td><input type="textbox" name="setting[adiinviter_sender_name]" value="<?php echo $settings['adiinviter_sender_name']; ?>" size="60"></td>
							</tr>
							<tr><td colspan="2" style="height: 25px;"></td></tr>
							<tr>
								<td><b>Sender email</b><br>
								<label>Enter email address to specify as sender email in outgoing emails.</label></td>
								<td><input type="textbox" name="setting[adiinviter_email_address]" value="<?php echo $settings['adiinviter_email_address']; ?>" size="60"></td>
							</tr>
							<tr><td colspan="2"><hr/></td></tr>
							<tr>
								<td><b>reCAPTCHA public key</b><br>
								<label>Enter the public key for reCaptcha for your website.</label><br>
								<label><a href="http://www.adiinviter.com/forums/AdiInviter_oauth_applications_manaual.html#recaptcha" target="_blank">Click here</a> to get your public key.</label></td>
								<td><input type="textbox" name="setting[captcha_public_key]" value="<?php echo $settings['captcha_public_key']; ?>" size="60"></td>
							</tr>
							<tr><td colspan="2" style="height:20px;"></td></tr>
							<tr>
								<td><b>reCAPTCHA private key</b></td>
								<td><input type="textbox" name="setting[captcha_private_key]" value="<?php echo $settings['captcha_private_key']; ?>" size="60"></td>
							</tr>
						</table>
						<div class="clearboth"></div>
					</div>
					<div class="fieldset">
						<p align="right" style="margin-bottom:20px;"><input class="button" type="submit" value="Submit"/></p>
					</div>
					<input type="hidden" name="section" value="adi_global">
					</form></div>
					<div id="adi_lang_settings" state="0"></div>
					<div id="adi_manage_services" state="0" style="min-width: 948px;"></div>
					<div id="adi_oauth_applications" state="0"></div>
					<div id="adi_invitation_mail" state="0"></div>
					<div id="adi_content_share" state="0"></div>
					<div id="adi_reminder_mail" state="0"></div>
					<div id="adi_user_permissions" state="0" style="min-width: 1001px;"></div>
					<div id="adi_statistics" state="0"></div>
					<div id="adi_date_wise" state="0"></div>
					<div id="adi_user_wise" state="0"></div>
					<div id="adi_service_summery" state="0"></div>

					<div id="adi_check_updates" state="0"></div>
					<div class="clearboth"></div>
					<div style="text-align:center;font-family:verdana,Arial;font-size:11px;color:#989898;">
						<div style="line-height: 16px;">Powered By AdiInviter Pro v1.1</div>
						<div style="line-height: 16px;">Build <?php echo $adiinviter->adiinviter_build_id; ?></div>
					</div>
				</div> <!-- inner -->
			</div> <!-- primary_right -->
			<div class="clearboth"></div>
		</div> <!-- bgwrap -->
	</div> <!-- container -->

</body>
</html>
