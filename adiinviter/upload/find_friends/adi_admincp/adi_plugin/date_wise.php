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
$pageSize = '25';
$sortBy = '';

$userTable = $adiinviter->user_table_name;
$userFields = $adiinviter->user_fields;

if(!is_GET('offset')) // send codes for graph also
{
	$result = adi_query_read("SELECT count(inviter_id) as cnt, invitation_status FROM adiinviter GROUP BY invitation_status");
	$alltotal = 0;
	$statusArr = array("invitation_sent"  => 0,"accepted" => 0,"blocked"  => 0,"waiting"  => 0);
	while($row = adi_fetch_assoc($result))
	{
		$now[$row['invitation_status']] = $row['cnt'];
		$statusArr[$row['invitation_status']] = $row['cnt'];
		$alltotal += $row['cnt'];
	}

	$dfrom = mktime(0,0,0,$_GET['from_month'],$_GET['from_date'],$_GET['from_year']);
	$dto   = mktime(23,59,59,$_GET['to_month'],$_GET['to_date'],$_GET['to_year']);
	
	$dfrom_txt = date('d M,y',$dfrom);
	$dto_txt = date('d M,y', $dto);

	$scriptTag = '<script type="text/javascript">

YDM.get("chartDescription").innerHTML= "<h3> Date wise summery : '.$dfrom_txt.' -> '.$dto_txt.'</h3> (Total number of invitations sent : '.$alltotal.')";

	adi.dispB("chartArea");
	adi.disp("pagination");
	var dataJSON = \'{ "show-progress": false, "graphset" : [ { "3d-aspect" : {"angle" : 25, "depth" : 80 }, "type" : "pie3d", "legend" : { "header":{"text":"Legend"},"draggable": true, "position" : "20% 100","margin-top" : 1,"margin-right" : 4,"margin-left" : 1,"margin-bottom" : 1,"shadow" : true,"shadow-alpha" : 1,"shadow-color" : "#000000","shadow-distance" : 2,"shadow-blur-x" : 1,"shadow-blur-y" : 1,"fixed" : false,"drag-handler" : "header", "minimize" : true, "item" : {"margin-top" : 10,"margin-right" : 10,"margin-left" : 10,"margin-bottom" : 10}},"alpha" : 1,"background-color" : "#fbfbfb","background-color-2" : "#f5f5f5","plot" : {"value-box" : {"text" : "%t","placement" : "out","connected" : true},"highlight" : true,"tooltip-text" : "%t : %v", "color": "#FFFFFF","animate" : true,"effect":1, "speed" : 0.8,"detach" : true,"slice":40}, "series" : [ ';

	$ext = ''; $finalOpt ='';
	
	$statusStr = array("invitation_sent"  => array(),"accepted" => array(),"blocked"  => array(),"waiting"  => array());
	foreach($statusStr as $status => $cnt)
	{
		$key = strtolower($status);

		$scriptTag .= $ext.' {"values":['.$statusArr[$status].'],"text":"'.$status_phrases[$status].'","animate":true,"effect":1,"alpha" : 1,"background-color" : "#'.
		$graphcolors[$key][0].'","background-color-2" : "#'.$graphcolors[$key][1].'"}';
		$ext = ',';
	}
	$scriptTag .= '] } ] }\';
	zingchart.render({
		liburl 			: "./css/zingchart.swf",
		data 		    : dataJSON,
		width	 		: '.(((int)$_GET['sWidth'])-310).',
		height 			: 350,
		container 		: "chart"
	});
	setTimeout(function(){
		YDM.setStyle("chart","height","350px");
	},100);
	</script>';
	echo $scriptTag;
}

if(isset($_GET['from_date']) && isset($_GET['from_year']) && isset($_GET['to_date']) && isset($_GET['to_year']) && $_GET['to_date']<=31 && $_GET['from_date']<=31)
{
	$date_from = mktime(0,0,0,$_GET['from_month'],$_GET['from_date'],$_GET['from_year']);
	$date_to   = mktime(23,59,59,$_GET['to_month'],$_GET['to_date'],$_GET['to_year']);
	
	// $date_from = $_GET['from_year']."-".$_GET['from_month']."-".$_GET['from_date'];
	// $date_to = $_GET['to_year']."-".$_GET['to_month']."-".$_GET['to_date'];

	$_SESSION['date_from'] = $date_from;
	$_SESSION['date_to'] = $date_to;
}
else if( isset($_SESSION['date_from']) && isset($_SESSION['date_to']) )
{
	$date_from = $_SESSION['date_from'];
	$date_to = $_SESSION['date_to'];
}
if(is_GET('offset') || (isset($date_from) && isset($date_to)) )
{
	$date_from_txt = date('d M,y',$date_from);
	$date_to_txt   = date('d M,y', $date_to);

	$result = adi_query_read("SELECT count(inviter_id) as cnt FROM adiinviter as adv, ".$userTable." as usr WHERE adv.inviter_id=usr.".$userFields['userid']." AND (issued_date between '".$date_from."' and '".$date_to."' ) ");  
	while($row = adi_fetch_assoc($result))
	{
		$pages = ceil($row['cnt'] / $pageSize);
	}
	if($pages == 0)
	{
		echo '<fieldset style="padding: 15px;"><h4>No invitations has been sent from '.$date_from_txt.' to '.$date_to_txt.'.</h4></fieldset>';
		exit;
	}

	echo '<table class="normal tablesorter" style="width: 100%;">
	<thead>
	<tr>
		<th class="header" style="width: 19px;">User ID</th>
		<th class="header">Invite Sender</th>
		<th class="header">Service</th>
		<th class="header">Status</th>
		<th class="header" style="width: 69px;">Issued</th>
		<th class="header">Name(Email)</th>
		<th class="header">Accepted By</th>
		<th class="header" style="width: 42px;"></th>
	</tr></thead><tbody>';
	$result = adi_query_read("SELECT user.".$userFields['username']." as username, inviter_id, adiinviter.invitation_id, adiinviter.receiver_name, 
	adiinviter.receiver_username, adiinviter.receiver_email, adiinviter.invitation_status, adiinviter.service_used, issued_date, adiinviter.receiver_social_id
	FROM adiinviter as adiinviter, ".$userTable." as user
	WHERE
		adiinviter.inviter_id=user.".$userFields['userid']." AND 
		(issued_date between '".$date_from."' and '".$date_to."' )
	ORDER BY issued_date 
	LIMIT ".$offset.",".$pageSize);

	$adiinviter->load_services();

	$odd = true;
	while($row = adi_fetch_assoc($result))
	{
		$service_key = $row['service_used'];
		$service_name = $adiinviter->services_config[$service_key]['service'];
		$status_code = strtolower($row['invitation_status']);
		$status = $row['invitation_status'];
		$status = $status_phrases[$status];
		
		$status_code = '<font style="color: #'.$graphcolors[$status_code][0].'"><b>'.$status.'</b></font>';

		if($row['receiver_email'] == 'None')
			$name_email = $row['receiver_name'];
		else
			$name_email = $row['receiver_name'].' ('.$row['receiver_email'].')';

		$issued_date_txt = $adiinviter->adi_format_timeAgo($row['issued_date']);

		echo "<tr ".($odd?'class="odd"':'')."><td>".$row['inviter_id']."</td><td>".$row['username']."</td>";
		echo "<td><span class='adi_".$service_key."_si'>".$service_name."</span></td>";
		echo "<td>".$status_code."</td>";
		echo "<td>".$issued_date_txt."</td>";
		echo "<td>".$name_email."</td>";
		echo "<td>".($row['receiver_username']!='None' ? $row['receiver_username'] : '.')."</td>";
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
	echo '<span href="#" class="paginate_icon" style="display: inline-block;">Page '.$currentPage.' of '.$pages.'</span>';
	//echo '<a href="#" class="table_icon" style="" onclick="return false;"></a>';
	if($pages - $currentPage > 0) echo '<input type="button" onclick="return paginate(\''.$reportName.'\','.($currentPage * $pageSize).');" value="Next">';
	if($pages - $currentPage > 1) echo '<input type="button" onclick="return paginate(\''.$reportName.'\','.(($pages-1) * $pageSize ).');" value="Last">';

}
?>