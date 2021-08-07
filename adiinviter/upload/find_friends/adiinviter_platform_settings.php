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

class Adi_Main extends Adi_Main_Base
{
	public $mark_as_registered_use_session = true;
	/**
	 * This propery holds value of the usergroupd_id of guest users or not logged in users.
	 * Assign 0, if you don't have usergroups system.
	 * Note: Whenever this property is modified, Go to AdiInviter Pro Admin panel => User Permissions and click on Save button to update usergroup permissions.
	 */
	public $default_usergroupid = 0;



	/**
	* URLs to access AdiInviter Pro interfaces and pages in your website.
	*
	* Note: [website_root_url] markup in these URLs is replaced by the "Website root URL" setting value set under AdiInviter pro admin panel => Global Settings.
	*
	**/
	public $inpage_model_url      = '[website_root_url]/adiinviter.php';
	public $verify_invitation_url = '[website_root_url]/verify_invitation.php';
	public $invite_history_url    = '[website_root_url]/invite_history.php';


	/**
	* This function returns userid of currently logged in user.
	* Do not implement this function if you don't have users system.
	*
	* @return 	int 	: userid of currently logged in user.
	*
	**/
	function get_loggedin_userid()
	{
		return 0;
	}
}

?>