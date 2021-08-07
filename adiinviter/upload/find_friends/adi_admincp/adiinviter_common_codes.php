<?php
$base_path = dirname(__FILE__);
error_reporting(E_ALL ^ E_NOTICE);

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


switch($code_name)
{
	case 'content_type_settings':

	/*
	$content_type
	$content_on_off
	$table_name
	$id_attr
	$content_attr
	$title_attr
	$pid_attr
	$restrict_ids
	$restrict_pids
	$limit
	$page_url

	$redirect_onoff
	$invitation_body
	$invitation_subject
	$invitation_social_message_body
	$invitation_twitter_message_body
	*/

	$unique_id = 'adi_cs_sett_'.rand(1,1000);

	echo '
<form action="" method="post" onsubmit="return formSubmit(this);" id="'.$unique_id.'">
<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
		<tr>
			<td colspan="2"><h2><b>'.$content_name.'</b> Settings (id: '.$content_type.')</h2>
			<input type="hidden" name="setting[adiinviter_content_share_types]['.$content_type.'][name]" value="'.$content_name.'">
			</td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Content share On/Off for Content type : '.$content_name.'</b><br>
			<label>Globally turn content share system On/Off for content type '.$content_name.'.</label></td>
			<td style="width: 45%;"><input type="radio" name="setting[adiinviter_content_share_types]['.$content_type.'][on_off]" value="1" '.($content_on_off == '1'? 'checked="checked"':'').'> ON <br/>
			<input type="radio" name="setting[adiinviter_content_share_types]['.$content_type.'][on_off]" value="0" '.($content_on_off !== '1'? 'checked="checked"':'').'> OFF <br/></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Word limit for content body in an invitation message</b><br>
			<label>Enter the number of words(not characters) to be extracted from a content body being shared.</label>
			</td>
			<td><input type="textbox" name="setting[adiinviter_content_share_types]['.$content_type.'][limit]" value="'.$limit.'" size="60"></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Specify URL to '.$content_name.' page.</b><br>
			<label>Enter the URL of the '.$content_name.' page on which invitation reciever will be redirected upon registration.</label>
			</td>
			<td><input type="textbox" name="setting[adiinviter_content_share_types]['.$content_type.'][page_url]" value="'.$page_url.'" size="60"></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td colspan="2"><b>Enter database details to fetch content body and title.</b></td>
		</tr>
		<tr>
			<td><b>Table name</b><br>
			<label>Specify databse table name with table prefix which stores content body and title.</label>
			</td>
			<td><input type="textbox" name="setting[adiinviter_content_share_types]['.$content_type.'][table_name]" value="'.$table_name.'" size="60"></td>
		</tr>
		<tr><td colspan="2" style="height:15px;"></td></tr>
		<tr>
			<td><b>Content ID field</b><br>
			<label>Enter field name in above table which stores content ID.</label>
			</td>
			<td><input type="textbox" name="setting[adiinviter_content_share_types]['.$content_type.'][id_attr]" value="'.$id_attr.'" size="60"></td>
		</tr>
		<tr><td colspan="2" style="height:15px;"></td></tr>
		<tr>
			<td><b>Content Body field</b><br>
			<label>Enter field name in above table which stores content body.</label>
			</td>
			<td><input type="textbox" name="setting[adiinviter_content_share_types]['.$content_type.'][content_attr]" value="'.$content_attr.'" size="60"></td>
		</tr>
		<tr><td colspan="2" style="height:15px;"></td></tr>
		<tr>
			<td><b>Content Title field</b><br>
			<label>Enter field name in above table which stores content Title.</label>
			</td>
			<td><input type="textbox" name="setting[adiinviter_content_share_types]['.$content_type.'][title_attr]" value="'.$title_attr.'" size="60"></td>
		</tr>
		<tr><td colspan="2" style="height:15px;"></td></tr>
		<tr>
			<td><b>Content category field</b><br>
			<label>Enter field name in above table which stores content category. This field is used to restrict contents from sharing. </label>
			</td>
			<td><input type="textbox" name="setting[adiinviter_content_share_types]['.$content_type.'][pid_attr]" value="'.$pid_attr.'" size="60"></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td style="padding-right: 10px;"><b>Restricted Contents</b><br>
			<label>Enter comma separated list of '.$content_name.' id(s) for which you want to turn Off content sharing.</label></td>
			<td><br><textarea type="textbox" name="setting[adiinviter_content_share_types]['.$content_type.'][restrict_ids]" value="" rows="3" cols="40" style="width:90%" wrap="virtual"
			size="50">'.$restrict_ids.'</textarea></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td style="padding-right: 10px;"><b>Restricted Categories</b><br>
			<label>Enter comma separated list of category id(s) in which you want to turn Off content sharing for '.$content_name.'.</label></td>
			<td><br><textarea type="textbox" name="setting[adiinviter_content_share_types]['.$content_type.'][restrict_pids]" value="" rows="3" cols="40" style="width:90%" wrap="virtual"
			size="50">'.$restrict_pids.'</textarea></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Automatic redirection to content URL upon registration</b><br>
			<label>This will redirect user(s) only once upon their first login to the content page they were invited to.</label></td>
			<td style="width:45%;"><input type="radio" name="setting[adiinviter_content_share_types]['.$content_type.'][redirect_onoff]" value="1" '.($redirect_onoff == '1'? 'checked="checked"':'').'> ON <br/>
			<input type="radio" name="setting[adiinviter_content_share_types]['.$content_type.'][redirect_onoff]" value="0" '.($redirect_onoff == '0'? 'checked="checked"':'').'> OFF <br/></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td style="padding-right: 10px;"><b>Invitation Subject</b><br>
			<label>Enter Subject for content share invitation email.</label></td>
			<td><input type="textbox" name="setting[adiinviter_content_share_types]['.$content_type.'][invitation_subject]" value="'.$invitation_subject.'" size="60"></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Invitation email body for content share</b><br>
			Default invitation email body for content share (HTML supported).<br><br>
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
<tr class="odd"><td class="synt_table_td">[content_id]</td><td class="synt_table_td"> Content ID to share</td></tr>
<tr><td class="synt_table_td">[content_title]</td><td class="synt_table_td"> Content Title</td></tr>
<tr class="odd"><td class="synt_table_td">[content_body]</td><td class="synt_table_td">Content Body</td></tr>
</tbody></table>
</td>
<td>
			<div style="width:90%">
			<textarea name="setting[adiinviter_content_share_types]['.$content_type.'][invitation_body]" id="adiinviter_content_share_mail" rows="22" cols="40" style="width:90%" wrap="virtual" tabindex="1" >'.$invitation_body.'</textarea><br>
			<p style="width:100%;padding-left: 10px;padding-top: 7px;" align="right"><input style="margin-right:0px;" class="button" type="button" onclick="return showPreview(\'adiinviter_content_share_mail\');" value="Preview" ></p>
			</div>
</td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Default content sharing invitation message body for social network.</b><br>
			Content sharing invitation body for all social networks (No HTML).</td>
			<td><textarea name="setting[adiinviter_content_share_types]['.$content_type.'][invitation_social_message_body]" rows="5" cols="40" style="width:90%" wrap="virtual" tabindex="1" >'.$invitation_social_message_body.'</textarea></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td><b>Content sharing invitation message body for Twitter</b><br>
			Content sharing invitation message body for Twitter (Limit : 100 characters).</td>
			<td><textarea name="setting[adiinviter_content_share_types]['.$content_type.'][invitation_twitter_message_body]" rows="5" cols="40" style="width:90%" wrap="virtual" tabindex="1" >'.$invitation_twitter_message_body.'</textarea></td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td colspan="2">
				<b>Embed Code</b><br><br>
				<label class="opts_note"><span class="label_red_note">Note: </span> For a static content body, replace &lt;CONTENT_ID&gt; by 0 in below code. You can also write your own code to fetch and replace current item\'s content id.
				</label><br><br>
				<b>HTML Code</b>
				<div class="embed_code_out">';
$inpage_model_url = $adiinviter->inpage_model_url_ext_rel;
$cont_share_id = $content_type;
echo <<<HTML
&lt;a adi_content_id=<font color="#66CC33">&quot;<font style="color:#FA3C08;font-weight:bold;">&lt;CONTENT_ID&gt;</font>&quot;</font> <br>
&nbsp;&nbsp; href=<font color="#66CC33">&quot;{$inpage_model_url}adi_share_type={$cont_share_id}&amp;adi_content_id=<font style="color:#FA3C08;font-weight:bold;">&lt;CONTENT_ID&gt;</font>&quot;</font><br>
&nbsp;&nbsp; class=<font color="#66CC33">&quot;adi_link adi_open_popup_model&quot;</font><br>
&nbsp;&nbsp; adi_share_type=<font color="#66CC33">&quot;{$cont_share_id}&quot;</font>&gt; <br>
 <font style="color:#FFCC00;">Share With Friends</font><br>
&lt;/a&gt;
HTML;
				echo '</div><br><br>
				<b>PHP Code</b>
				<div class="embed_code_out">';
$inpage_model_url = $adiinviter->inpage_model_url_ext_rel;
$cont_share_id = $content_type;
?>
&lt;?php<br>
<font color="#CC7833">include_once</font>(<font color="#66CC33">'<?php echo ADI_CORE_PATH.'init.php'; ?>'</font>);<br>
$content_id = <font color="#66CC33">'<font style="color:#FA3C08;font-weight:bold;">&lt;CONTENT_ID&gt;</font>'</font>;<br>
<font color="#CC7833">if</font>($allow_share = $adiinviter->is_sharing_allowed(<font color="#66CC33">'<?php echo $cont_share_id ?>'</font>, $content_id))<br>
{<br>
&nbsp;&nbsp; <font color="#C83730">echo</font> <font color="#66CC33">"<br>
&nbsp;&nbsp; &lt;a invId='{$content_id}'<br>
&nbsp;&nbsp;&nbsp;&nbsp; href='"</font>.$adiinviter->inpage_model_url_ext_rel.<font color="#66CC33">"adi_share_type=<?php echo $cont_share_id; ?>&adi_content_id={$content_id}'<br>
&nbsp;&nbsp;&nbsp;&nbsp; class='adi_link adi_open_popup_model'<br>
&nbsp;&nbsp;&nbsp;&nbsp; invType='<?php echo $cont_share_id; ?>'&gt;<br>
&nbsp;&nbsp; Share With Friends<br>
&nbsp;&nbsp; &lt;/a&gt;"</font>;<br>
}<br>
?&gt;
<?php
				echo '</div>
			</td>
		</tr>
		<tr><td colspan="2"><hr/></td></tr>
		<tr>
			<td colspan="2">
				<p align="right" style="margin-bottom:20px;">
					<input class="button" type="submit" value="Save" />
					<input class="button" type="button" value="Remove" onclick="return removeContentType(\''.$content_type.'\',\''.$unique_id.'\');"/>
				</p>
			</td>
		</tr>
	</table>
</fieldset>
</form>';
	break;


	/*case 'language_phrases' :
		echo '<form action="" method="post" onsubmit="return formSubmit(this);">
<fieldset>
	<table class="adiinviter_table" style="margin-bottom:20px;">
	<tr>
		<td style="width: 335px;"><b>Language Pack</b><br>
			<label>Select or edit default language pack for Adiinviter Pro.</label></td>
		<td style="vertical-align: middle;width: 210px;">
		<select name="setting[adiinviter_lang_code]" id="adiinviter_lang_code" style="width: 90%;">';

		$path = dirname($base_path).DIRECTORY_SEPARATOR.'adiinviter'.DIRECTORY_SEPARATOR.'lang'.DIRECTORY_SEPARATOR;
		
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
</form>';


	break;*/

}



?>