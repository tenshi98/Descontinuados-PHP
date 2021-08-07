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
include_once(dirname(__FILE__).DIRECTORY_SEPARATOR.'adi_platform_init.php');
$path = dirname(__FILE__);
global $adiinviter;
include_once($path . DIRECTORY_SEPARATOR . 'adiinviter'. DIRECTORY_SEPARATOR .'init.php');

if(!headers_sent())
{
	header("charset: UTF-8");
}
$contents = '';

if($adiinviter->adiinviter_installed !== true)
{
	$contents = '<h3 style="font-family: Verdana,Tahoma;">AdiInviter Pro is not installed yet.</h3>';
}
else
{
	$adi_action    = GET_var('adi_do', ADI_STRING_VARS);
	$invitation_id = GET_var('invitation_id', ADI_STRING_VARS, '0-9a-z');

	$inviter_id   = 0;  $invitation_status = '';
	$adi_global_redirect_url = ''; 

	$adi_global_verify_invitation_message = ''; 
	$adi_global_verify_invitation_error = $adiinviter->phrases['adi_vi_defualt_error_msg']; 

	$share_type   = ''; $content_id = '';

	$invitation_exists = false;
	$check_params = true;


	$invitation_id = preg_replace('/[^0-9a-z]/i', '', $invitation_id);
	if(!empty($invitation_id))
	{
		$query = "SELECT * FROM adiinviter WHERE invitation_id = '".$invitation_id."'";
		if($row = adi_query_first_row($query))
		{
			$invitation_exists = true;
			$inviter_id = $row['inviter_id'];
			$invitation_status = $row['invitation_status'];

			$share_type = $row['share_type'];
			$content_id = $row['content_id'];
		}
	}


	if($adi_action == 'unsubscribe')
	{
		if($invitation_exists)
		{
			if($invitation_status == 'accepted')
			{
				$adi_global_verify_invitation_error = $adiinviter->phrases['adi_vi_failed_to_block_accepted_invitation'];
			}
			else 
			{
				$query = "UPDATE adiinviter SET invitation_status = 'blocked' WHERE invitation_id = '".$invitation_id."'";
				if($result = adi_query_write($query))
				{
					$adi_global_verify_invitation_message = $adiinviter->phrases['adi_vi_invitation_blocked_messeage'];
				}
			}
		}
	}
	else if($adi_action == 'accept')
	{
		if($invitation_exists)
		{
			if($share_type != "")
			{
				if($adiinviter->userid == 0)
				{
					$register_page_url = trim($adiinviter->settings['adiinviter_register_link'], ' ?&');
					$adi_global_redirect_url = $register_page_url;
				}
				else
				{
					$adi_global_redirect_url = $adiinviter->get_content_url($share_type, $content_id);
				}
			}
			else
			{
				if($invitation_status == 'accepted')
				{
					if($adiinviter->userid == 0 && $adiinviter->user_system)
					{
						$adi_global_redirect_url = $adiinviter->settings['adiinviter_website_login_url'];
					}
					else
					{
						$adi_global_redirect_url = $adiinviter->settings['adiinviter_root_url'];
					}
				}
				else
				{
					if($adiinviter->user_registration_system == true)
					{
						$register_page_url = trim($adiinviter->settings['adiinviter_register_link'], ' ?&');
						$adi_global_redirect_url = $register_page_url;
					}
					else
					{
						$adi_global_redirect_url = $adiinviter->settings['adiinviter_root_url'];
					}
				}
			}
			if($adiinviter->mark_as_registered_use_session && $invitation_status == 'invitation_sent' && $adiinviter->userid == 0)
			{
				$adiinviter->session->set('adi_inv_id', $invitation_id);
			}
		}
		else
		{
			$adi_global_redirect_url = $adiinviter->settings['adiinviter_root_url'];
		}
	}

	// Perform Action
	if( isset($adi_global_redirect_url) && !empty($adi_global_redirect_url) )
	{
		$vars = array(
			'invitation_id'    => '',
			'inviter_id'       => '',
			'inviter_username' => '',
			'inviter_email'    => '',
		);
		if($invitation_exists)
		{
			$vars['invitation_id'] = $invitation_id;
			$vars['inviter_id'] = $inviter_id;
			if($inviter_id != 0 && (strpos($adi_global_redirect_url, '[inviter_username]') !== false || 
			strpos($adi_global_redirect_url, '[inviter_email]') !== false) )
			{
				$adi_user = $adiinviter->getUserInfo($inviter_id);
				$vars['inviter_username'] = $adi_user->username;
				$vars['inviter_email']    = $adi_user->email;
			}
		}
		$adi_global_redirect_url = adi_replace_vars($adi_global_redirect_url, $vars);
		if(isset($adi_global_redirect_url) && !empty($adi_global_redirect_url))
		{
			if( !adi_page_redirect($adi_global_redirect_url) )
			{
				$contents .= eval(adi_get_template('inpage_redirect_page'));
			}
		}
	}
	else
	{
		$contents .= eval(adi_get_template('inpage_verify_invitation'));
	}
}

?>