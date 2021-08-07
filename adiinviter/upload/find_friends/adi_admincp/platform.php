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


if(! isset($adiinviter_debug))
	$adiinviter_debug = array();

if($adiinviter_database_integration)
{
	function getQueueCount()
	{
		global $adiinviter_debug;
		$query  = 'select count(1) as Total from '.TABLE_PREFIX.'adiinviter_queue';
		$adiinviter_debug[] = $query;
		$result = adi_query_read($query);
		$rw = adi_fetch_array($result);
		return $rw['Total'];
	}

	/**
	 * Functions for User Permissions tab.
	 */
	function getUserGroups()
	{
		global $adiinviter_debug, $usergroupTable, $usergroupFields;
		$query = 'SELECT gid,name FROM '.$usergroupTable.' ORDER BY '.$usergroupFields['usergroupid'];
		$adiinviter_debug[] = $query;
		$result   = adi_query_read($query);
		while($rw = adi_fetch_array($result))
		{
			$usergroups[] = array('usergroupid' => $rw[$usergroupFields['usergroupid']],'name' => $rw[$usergroupFields['name']]);
			$rw;
		}
		return $usergroups;
	}
	function getUsersInfo($condition = '')
	{
		global $adiinviter_debug, $userTable, $userFields;
		$query = 'SELECT '.$userFields['username'].','.$userFields['userid'].','.$userFields['email'].'
		FROM '.$userTable.' '.$condition;
		$adiinviter_debug[] = $query;
		$result   = adi_query_read($query);
		while($rw = adi_fetch_array($result))
		{
			$usersInfo[] = array('id' => $rw[$userFields['userid']], 'username' => $rw[$userFields['username']]);
		}
		return $usersInfo;
	}
	function updateUserDetails($condition = '')
	{
		global $adiinviter_debug, $userTable, $userFields;
		$query = 'UPDATE '.$userTable.' '.$condition;
		$adiinviter_debug[] = $query;
		return adi_query_write($query);
	}

	/**
	 * Functions for Reports
	 */
	function getInvitationCount()
	{
		global $adiinviter_debug;
		$query = 'SELECT count(id) as cnt FROM '.TABLE_PREFIX.'adiinviter';
		$adiinviter_debug[] = $query;
		$result   = adi_query_read($query);
		$rw = adi_fetch_array($result);
		return $rw['cnt'];
	}

	function addSettings($condition = '')
	{
		global $adiinviter_debug;
		$query  = 'INSERT INTO '.TABLE_PREFIX.'adiinviter_settings '.$condition;
		$adiinviter_debug[] = $query;
		return adi_query_write($query);
	}
	function delSettings($condition = '')
	{
		global $adiinviter_debug;
		$query  = 'DELETE FROM '.TABLE_PREFIX.'adiinviter_settings '.$condition;
		$adiinviter_debug[] = $query;
		return adi_query_write($query);
	}
	function updateSettings($condition = '')
	{
		global $adiinviter_debug;
		$query  = 'UPDATE '.TABLE_PREFIX.'adiinviter_settings '.$condition;
		$adiinviter_debug[] = $query;
		return adi_query_write($query);
	}

}

?>