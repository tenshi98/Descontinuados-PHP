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

$adi_default_content_settings = array(
	'on_off'        => 0,
	'limit'         => 200,
	'page_url'      => '',
  'name' => '',

	'table_name'    => '',
	'id_attr'       => '',
	'content_attr'  => '',
	'title_attr'    => '',
	'pid_attr'      => '',

	'restrict_ids'  => '',
	'restrict_pids' => '',

	'redirect_onoff' => 0,

	'invitation_subject' => 'Content Share Invitation',

	'invitation_body' => '<table width="600" cellspacing="0" cellpadding="0" border="0">
<tbody>
  <tr>
    <td style="padding: 4px 8px; background: #1B59A8 none repeat scroll 0% 0%; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; color: rgb(255, 255, 255); font-weight: bold; font-family: Verdana, Lucida Sans Unicode,Lucida Grande,Trebuchet MS, Helvetica, Arial, sans-serif;font-size: 11px;line-height: 20px; vertical-align: middle; font-size: 13px; letter-spacing: -0.03em; text-align: left;" colspan="2">AdiInviter Pro Invitation
    </td>
  </tr>
  <tr>
    <td valign="top" style="border-left: 1px solid #CCC; border-right: 1px solid #CCC; border-bottom: 1px solid #CCC; padding: 15px; background-color: rgb(255, 255, 255); font-family: Verdana, arial,sans-serif;
line-height: 20px;" colspan="2">
    <table width="100%">
      <tbody>
        <tr>
          <td width="100%" valign="top" align="left" style="font-size: 12px;">
          <div style="margin-bottom: 15px;">
            <table cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
            <tbody>
            <tr valign="top">[user_mode]
              <td width="100px;" style="padding-right: 10px;vertical-align:top;" align="center">
                <div style="display:block;"><a target="_blank" href="[sender_profile_url]">
                  <img style="border: 0pt none ;max-height: 100px;max-width: 100px;" src="[sender_avatar_url]"></a>
                </div> 
                <div style="padding-top: 1px;color:#333;font-weight:bold;font-size: 13px;font-family:Verdana;" align="center">[sender_name]</div>
              </td>[/user_mode]
              [guest_mode]
              <td width="100px;" style="padding-right: 10px;vertical-align:top;" align="center">
                <div style="display:block;"><a target="_blank" href="[forum_url]">
                  <img style="border: 0pt none ;max-height: 100px;max-width: 100px;" src="[website_logo]"></a>
                </div>
              </td>[/guest_mode]
              <td width="100%" style="font-size: 11px;">
                <table cellspacing="0" cellpadding="0" style="border-collapse: collapse;">
                <tbody>
                  <tr valign="top">
                    <td align="right" style="font-size: 11px;">
                      <table cellspacing="0" cellpadding="0" style="border-collapse: collapse;"><tbody> 
                      <tr valign="top">
                        <td dir="ltr" style="padding: 0px 5px 10px 0px;font-size: 15px;font-family:Verdana;" align="left">Hello [receiver_name],</td>
                      </tr>
                      <tr valign="top">
                        <td dir="ltr" style="padding: 0px 5px 10px 0px;font-size: 14px; line-height: 20px;font-family:Verdana;" align="left">
                          This is a test invitation message sent using AdiInviter contacts inviter script.<br />
                          AdiInviter is an addressbook importer script. It allows your members to invite their friends to your website.<br />
                          All their friends will receive an email automatically recommending your website or asking them to come and join their friends on your network or website.<br />
                          In short - <b><font color="red">AdiInviter brings massive real traffic to your website.</font></b><br />
                        </td>
                      </tr>
                      </tbody></table>
                    </td>
                  </tr>
                  [attach_note_block]
                  <tr valign="top">
                    <td>
                      <table cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; width: 100%;"><tbody>
                        <tr>
                          <td style="border-style: solid none; border-color: rgb(204, 204, 204); border-width: 1px medium; padding: 10px; background-color: rgb(255, 255, 255);color:#333;font-size: 14px;font-family:Verdana;">Attached Note : [attached_note]</td>
                        </tr>
                      </tbody></table>
                    </td>
                  </tr>
                  [/attach_note_block]
                  <tr valign="top">
                    <td>
<table cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; width: 100%;"><tbody><tr><td style="border-style:none none solid none; border-color: rgb(204, 204, 204); border-width: 1px medium; padding-bottom: 10px; background-color: rgb(255, 255, 255);font-size: 14px;">I guess you might be interested in following topic. 

<div align="right">
<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;display: inline-block;"> <tbody> <tr>
<td style="border-width:1px;border-style:solid;border-color:#3b6e22 #3b6e22 #2c5115;background-color:#69a74e">
<table cellspacing="0" cellpadding="0" style="border-collapse:collapse"> <tbody> <tr>
<td style="font-size:11px;font-family: lucida grande,tahoma,verdana,arial,sans-serif;padding:2px 35px 4px;border-top:1px solid #95bf82">
  <a href="[verify_invitation_url]invitation_id=[invitation_id]&adi_do=accept" style="color:#3b5998;text-decoration:none;cursor:pointer;" target="_blank">
    <span style="font-weight:bold;color:#fff;font-size:13px">Join Now</span>
  </a>
</td> </tr> </tbody> </table> </td> </tr> </tbody> </table>
</div>

<div style="padding: 10px;font-size: 13px;" align="center"><b>[content_title]</b></div><div style="padding:7px;border: 1px solid #999;">[content_body]</div></td></tr></tbody></table>
                    </td>
                  </tr>
                  <tr>
                  <td align="left">
     <table cellspacing="0" cellpadding="0" border="0" style="border-collapse: collapse; width: 100%;"><tbody>
                        <tr>
                    <td style="padding: 10px 0px;font-size: 13px;">Thanks,<br>[sender_name]</td>
                    <td align="right">
<table cellspacing="0" cellpadding="0" style="border-collapse:collapse;display: inline-block;"> <tbody> <tr>
<td style="border-width:1px;border-style:solid;border-color:#3b6e22 #3b6e22 #2c5115;background-color:#69a74e">
<table cellspacing="0" cellpadding="0" style="border-collapse:collapse"> <tbody> <tr>
<td style="font-size:11px;font-family: lucida grande,tahoma,verdana,arial,sans-serif;padding:2px 35px 4px;border-top:1px solid #95bf82">
  <a href="[verify_invitation_url]invitation_id=[invitation_id]&adi_do=accept" style="color:#3b5998;text-decoration:none;cursor:pointer;" target="_blank">
    <span style="font-weight:bold;color:#fff;font-size:13px;font-family:Verdana;">Read More</span>
  </a>
</td> </tr> </tbody> </table> </td> </tr> </tbody> </table>
</td>
                  </tr></tbody></table>
                          </td>
                </tr>
                <tr>
                  <td></td>
                </tr>
                <tr>
                </tr>
                </tbody></table>
              </td>
            </tr>
            </tbody></table>
          </div>
        </td>
      </tr>
      </tbody></table>
    </td>
  </tr>
  <tr>
    <td style="padding-left: 0px; color: rgb(153, 153, 153); font-size: 0.8em; font-family: lucida grande,tahoma,verdana,arial,sans-serif;" colspan="2">
      <i>This message has been sent from www.adiinviter.com. You may safely <a href="[verify_invitation_url]invitation_id=[invitation_id]&adi_do=unsubscribe" target="_blank" style="cursor: pointer;color: #417394;">unsubscribe</a> from these emails. </i>
    </td>
  </tr>
</tbody></table>',
	'invitation_social_message_body' => 'This is a Default Social Topic share message for social networks. [verify_invitation_url]invitation_id=[invitation_id]&adi_do=accept',
	'invitation_twitter_message_body' => 'Your friend want to share a topic with you : [verify_invitation_url]invitation_id=[invitation_id]&adi_do=accept',
);


?>