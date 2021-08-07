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

$graphcolors = array(
	'invitation_sent'  => array('D98200','FFCC80'),
	'accepted' => array('70932F','BCD988'),
	'blocked'  => array('C40000','FF8C8C'),
	'waiting'  => array('6A869D','DDEBF7'),
); 
$lang_code = $adiinviter->settings['adiinviter_lang_code'];
$lang_path = ADI_CORE_PATH.'lang';

/*if( file_exists($lang_path.DIRECTORY_SEPARATOR.$lang_code.'.php'))
{
	include_once($lang_path.DIRECTORY_SEPARATOR.$lang_code.'.php');
}
else if( file_exists($lang_path.DIRECTORY_SEPARATOR.'en-us-adiinviter.php'))
{
	include_once($lang_path.DIRECTORY_SEPARATOR.'en-us-adiinviter.php');	
}*/
$status_phrases = array(
	'accepted'        => sprintf($adiinviter->phrases['adi_invitation_status_accepted']),
	'invitation_sent' => sprintf($adiinviter->phrases['adi_invitation_status_invited']),
	'blocked'         => sprintf($adiinviter->phrases['adi_invitation_status_blocked']),
	'waiting'         => sprintf($adiinviter->phrases['adiinviter_invitation_waiting']),
);

$reportName = is_GET('report') ? GET_var('report', ADI_STRING_VARS) : POST_var('report', ADI_STRING_VARS);
$reportName = $reportName != '' ? $reportName : 'All Users Summery';
switch($reportName)
{
	case 'All Users Summery':
	case 'adi_statistics':
		include_once($base_path.DIRECTORY_SEPARATOR.'adi_plugin/all_users.php'); break;
	case 'adi_date_wise': 
		include_once($base_path.DIRECTORY_SEPARATOR.'adi_plugin/date_wise.php'); break;
	case 'adi_user_wise': 
		include_once($base_path.DIRECTORY_SEPARATOR.'adi_plugin/user_wise.php'); break;
	case 'adi_topic_share_summery': 
		include_once($base_path.DIRECTORY_SEPARATOR.'adi_plugin/adi_topic_share_summery.php');
	break;
	case 'All services Summery': case 'all_services': 
		include_once('adi_plugin/all_services.php'); 
	break;
}

?>