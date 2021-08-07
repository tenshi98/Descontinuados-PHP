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

$do = POST_var('adi_do', ADI_STRING_VARS);
$do = is_GET('adi_do') ? GET_var('adi_do', ADI_STRING_VARS) : $do;
$do = empty($do) ? 'invite_history' : $do;

$contents = '';
$adi_global_invite_history_message = '';

if($adiinviter->adiinviter_installed !== true)
{
	$contents = '<h3 style="font-family:Verdana,Tahoma;">AdiInviter Pro is not installed yet.</h3>';
}
else
{
	if($adiinviter->settings['adiinviter_onoff'] == 0)
	{
		$adi_display_message = 'AdiInviter Pro is turned Off by your administrator.';
		$contents .= eval(adi_get_template('inpage_no_permissions'));
	}
	else if($adiinviter->can_use_adiinviter == false)
	{
		$adi_display_message = $adiinviter->phrases['adi_ip_no_permissions_message'];
		$contents .= eval(adi_get_template('inpage_no_permissions'));
	}
	else if($adiinviter->user_system == false)
	{
		$adi_global_invite_history_message = $adiinviter->phrases['adi_ih_no_user_system_integration'];
		$contents .= eval(adi_get_template('invites_show_message'));
	}
	else if($adiinviter->userid == 0)
	{
		$adi_global_invite_history_message = $adiinviter->phrases['adi_ih_not_loggedin_msg'];
		$contents .= eval(adi_get_template('invites_show_message'));
	}
	else
	{
		if($do == 'invite_history')
		{
			$userid = $adiinviter->userid;
			$invite_history = get_resource('Adi_Invite_History');
			$page_size = $invite_history->invite_history_pagination_size;

			$invitations_count = $invite_history->get_invitations_count($adiinviter->userid);
			if($invitations_count > 0)
			{
				$page_no = 1;
				$show_type = 'all';

				$ih_records = $invite_history->get_invite_history_recods($adiinviter->userid, $page_no, $page_size, $show_type);
				$total_pages = ceil($invitations_count / $page_size); 
				$pages_list = get_pages_list($total_pages, $page_no);
				$contents .= eval(adi_get_template('invites_regular_section'));

				if($invite_history->get_email_invitations_count($adiinviter->userid) > 0 && (bool)$adiinviter->can_download_csv == true)
				{
					$contents .= eval(adi_get_template('invites_download_csv'));
				}
			}
			else
			{
				$adi_global_invite_history_message = $adiinviter->phrases['adi_ih_no_invites_err_msg'];
				$contents .= eval(adi_get_template('invites_show_message'));
			}
		}
		else
		{
			switch($do)
			{
				case 'paginate':
					$userid = $adiinviter->userid;
					$invite_history = get_resource('Adi_Invite_History');
					$page_size = $invite_history->invite_history_pagination_size;

					$inv_resource = false; 
					$show_type = POST_var('show_type', ADI_STRING_VARS);
					
					$page_no = POST_var('page_no', ADI_INT_VARS);
					$page_no = ($page_no < 1) ? 1 : $page_no;
					$ih_records = array();
					
					if(is_numeric($page_no))
					{
						$ih_records = $invite_history->get_invite_history_recods($adiinviter->userid, $page_no, $page_size, $show_type);
					}
					

					$invitations_count = $invite_history->get_invitations_count($adiinviter->userid, $show_type);
					$total_pages = ceil($invitations_count / $page_size); 
					$pages_list = get_pages_list($total_pages, $page_no);
					$contents .= eval(adi_get_template('invites_table_contents'));
				break;

				case 'delete_invites' :
					$inv_ids = POST_var('adi_ih_ids_list', ADI_ARRAY_VARS);
					if(is_POST('adi_ih_ids_list') && is_array($inv_ids) && count($inv_ids) > 0 && $adiinviter->can_delete_invites)
					{
						$invite_history = get_resource('Adi_Invite_History');
						$invite_history->delete_invites($inv_ids);
					}
				break;

				case 'download_csv':
					$invite_history = get_resource('Adi_Invite_History');
					$contents = '';
					$headers  = $invite_history->get_headers_for_csv();
					$contents = $invite_history->get_contacts_for_csv();
					if(!empty($contents))
					{
						header("Cache-Control: public");
						header("Content-Description: File Transfer");
						header("Content-Disposition: attachment; filename=Contacts.csv");
						header("Content-Type: application/zip");
						header("Content-Transfer-Encoding: binary");

						echo $headers."\r\n".$contents;
						exit;
					}
				break;
			}
			echo $contents;
		}
	}
} // adiinviter_installed check

?>