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
$offset = GET_var('offset', ADI_INT_VARS);
$pageSize = '20';
$sortBy = '';

$adiinviter_debug = array();

$userid = GET_var('userid', ADI_INT_VARS);
if( is_GET($_GET['userid'])) {
	$_SESSION['userid'] = $userid;
}
else if(! empty($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
}

if(is_GET('username'))
{
	$username = GET_var('username', ADI_STRING_VARS);
}

$userTable = $adiinviter->user_table_name;
$userFields = $adiinviter->user_fields;

/*
if(isset($_GET['userid']) )
{
	$_SESSION['userid'] = $_GET['userid'];
	$userid = $_GET['userid'];
	$_SESSION['username'] = '';
}
else if(! empty($_SESSION['userid'])) {
	$userid = $_SESSION['userid'];
}

if(isset($_GET['username']))
{
	$_SESSION['username'] = $_GET['username'];
	$username = $_GET['username'];
	$_SESSION['userid'] = '';
}
else if(! empty($_SESSION['username'])) {
	$username = $_SESSION['username'];
}
*/
if(! is_GET('offset') ) 
{ 
	// send codes for graph also
	// $statusArr = array("Accepted","Blocked","Expired","Pending");
	
	if(isset($username)) 
	{
		$query = "SELECT adv.inviter_id, count(inviter_id) as cnt, invitation_status, usr.".$userFields['username']." as username FROM adiinviter as adv, " . $userTable . " as usr where adv.inviter_id=usr.".$userFields['userid']." AND usr.".$userFields['username']." ='".$username."' GROUP BY invitation_status";
		$result = adi_query_read($query);
		//echo 'username';
	}
	else if(isset($userid)) 
	{
		$query = "Select adv.inviter_id, count(1) as cnt, invitation_status, usr.".$userFields['username']." as username from adiinviter as adv, " . $userTable . " as usr where adv.inviter_id=usr.".$userFields['userid']." AND inviter_id =".$userid." group by invitation_status";
		$result = adi_query_read($query);
		//echo 'userid';
	}
	$alltotal = 0;$now = array();
	while($row = adi_fetch_assoc($result))
	{
		$_SESSION['userid'] = $row['inviter_id'];
		$userid = $row['inviter_id'];
		$username = $row['username'];
		$alltotal += $row['cnt']; 
		$wCheck = 1;
		$now[$row['invitation_status']] = $row['cnt'];
		$name= $row['username'];
	}
	if(! isset($wCheck)) {
		print_r($adiinviter_debug);
		echo '<script>alert("User does not found..!!");</script>';
		exit;
	}
	
	$scriptTag = '<script type="text/javascript"> 
	adi.dispB("chartArea");
	adi.disp("pagination");
	YDM.setStyle("chart","height","350px");
	YDM.get("chartDescription").innerHTML= "<h3> All Invites summery of '.$name.'</h3> (Total number of invitations sent : '.$alltotal.')";

	
	var dataJSON = \'{ "show-progress": false, "graphset" : [ { "type" : "pie3d", "legend" : { "header":{"text":"Legend"},"draggable": true, "position" : "20% 75","margin-top" : 1,"margin-right" : 4,"margin-left" : 1,"margin-bottom" : 1,"shadow" : true,"shadow-alpha" : 1,"shadow-color" : "#000000","shadow-distance" : 2,"shadow-blur-x" : 1,"shadow-blur-y" : 1,"fixed" : false,"drag-handler" : "header", "minimize" : true, "item" : {"margin-top" : 10,"margin-right" : 10,"margin-left" : 10,"margin-bottom" : 10}},"alpha" : 1,"background-color" : "#fbfbfb","background-color-2" : "#f5f5f5","plot" : {"value-box" : {"text" : "%t","placement" : "out","connected" : true},"highlight" : true,"tooltip-text" : "%t : %v", "color": "#FFFFFF","animate" : true,"speed" : 0.8,"detach" : true, "effect":2}, "series" : [ ';

	$monthName = array("","January","February","March","April","May","June","July","Augast","September","October","November","December");
	// $statusArr = array("Accepted" => 0,"Blocked" => 0,"Expired" => 0,"Pending" => 0);
	$statusArr = array("invitation_sent"  => 0,"accepted" => 0,"blocked"  => 0,"waiting"  => 0);
	$ext = '';
	foreach($statusArr as $status => $cnt) 
	{
		$key = strtolower($status);
		
		$scriptTag .= $ext.'{"values" : ['.( isset($now[$status]) ? $now[$status] : 0).'], "text" : "'.$status_phrases[$status].'","background-color" : "#'.
		$graphcolors[$key][0].'","background-color-2" : "#'.
		$graphcolors[$key][1].'"}';
		$ext=',';
	}
$scriptTag .= ' ] } ] }\';
 zingchart.render({
		liburl 		: "./css/zingchart.swf",
		data 		: dataJSON,
		width	 	: '.(((int)$_GET['sWidth'])-310).',
		height 		: 300,
		container 	: "chart"
	}); adi.dispN("graph_paginate");
</script>';
echo $scriptTag;
}



if(isset($_GET['offset']) || isset($username) || isset($userid) )
{
	if(! empty($userid)) 
	{
		$query = "SELECT count(inviter_id) as cnt FROM adiinviter as adiinviter, " . $userTable . " as user WHERE adiinviter.inviter_id=user.".$userFields['userid']." AND adiinviter.inviter_id =".$userid;
		$adiinviter_debug[] = $query;
		$result = adi_query_read($query);

		$query = "SELECT adiinviter.receiver_name as name, invitation_id, inviter_id, adiinviter.receiver_username, adiinviter.receiver_email, adiinviter.receiver_name, adiinviter.invitation_status, adiinviter.service_used, issued_date, adiinviter.receiver_social_id
		FROM adiinviter as adiinviter,".$userTable." as user 
		WHERE adiinviter.inviter_id=user.".$userFields['userid']." AND adiinviter.inviter_id =".$userid." 
		ORDER BY issued_date desc 
		LIMIT ".$offset.",".$pageSize;
		$adiinviter_debug[] = $query;
		$result1 = adi_query_read($query);
	}

	while ($row = adi_fetch_assoc($result)) 
	{
		$pages = ceil($row['cnt'] / $pageSize);
	}
	if($pages == 0) {
		echo '<fieldset style="padding: 15px;"><h4>No invitations has been sent by the user <b>'.$username.'</b>.</h4></fieldset>';
		exit;
	}

	echo '<table class="normal tablesorter" style="width: 100%;margin-bottom: 20px;">
	<thead>
	<tr>
		<th class="header">Reciever Sender</th>
		<th class="header">Service</th>
		<th class="header">Status</th>
		<th class="header">Issued</th>
		<th class="header">ID / Email</th>
		<th class="header">Accepted By</th>
		<th class="header" style="width: 60px;"></th>
	</tr></thead><tbody>';
	$odd = true;
	$counter = $offset + 1;

	$adiinviter->load_services();
	while($row = adi_fetch_assoc($result1))
	{
		$service_key = $row['service_used'];
		$service_name = $adiinviter->services_config[$service_key]['service'];
		$status_code = strtolower($row['invitation_status']);
		$status = $row['invitation_status'];
		$status = $status_phrases[$status];

		$status_code = '<font style="color: #'.$graphcolors[$status_code][0].'"><b>'.$status.'</b></font>';
		$issued_date_txt = $adiinviter->adi_format_timeAgo($row['issued_date']);

		echo "<tr ".($odd?'class="odd"':'').">";
		echo "<td>".$row['receiver_name']."</td>";
		echo "<td><span class='adi_".$service_key."_si'>".$row['service_used']."</span></td>";
		echo "<td>".$status_code."</td>";
		echo "<td>".$issued_date_txt."</td>";
		echo "<td>".($row['receiver_email']!='None'?$row['receiver_email']:$row['receiver_social_id'])."</td>";
		echo "<td>".($row['receiver_username']!='None'?$row['receiver_username']:'.')."</td>";
		echo "<td><a class='record_del' rel='".$row['invitation_id']."'>Delete</></td>";

		//if(is_array($dt['status'])) 			foreach($dt['status'] as $status => $cnt)				echo "<td>".$status." : ".$cnt."</td>";  
		echo "</tr>";
		$odd = !$odd;
	}
	echo '</tbody></table>';

	$currentPage = intval($offset / $pageSize)+1;
	echo '<div align="right" style="margin-top:10px;">';
	if($currentPage > 2) echo '<input type="button" onclick="return paginate(\''.$reportName.'\',0);" value="First">';
	if($currentPage > 1) echo '<input type="button" onclick="return paginate(\''.$reportName.'\','.(($currentPage-2) * $pageSize).');" value="Prev">';
	echo '<span class="paginate_icon" style="display: inline-block;">Page '.$currentPage.' of '.$pages.'</span>';
	//echo '<a href="#" class="table_icon" style="" onclick="return false;"></a>';
	if($pages - $currentPage > 0) echo '<input type="button" onclick="return paginate(\''.$reportName.'\','.($currentPage * $pageSize).');" value="Next">';
	if($pages - $currentPage > 1) echo '<input type="button" onclick="return paginate(\''.$reportName.'\','.(($pages-1) * $pageSize ).');" value="Last">';

}
?>