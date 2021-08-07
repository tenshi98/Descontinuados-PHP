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

$adb =& $adi_op;


$userTable = $adiinviter->user_table_name;
$userFields = $adiinviter->user_fields;

if(! is_GET('offset')) // send codes for graph also
{
	$statusArr = array("invitation_sent"  => 0,"accepted" => 0,"blocked"  => 0,"waiting"  => 0);
	$result = adi_query_read("SELECT count(inviter_id) as cnt, invitation_status FROM adiinviter WHERE content_id != 0 group by invitation_status");
	$alltotal = 0;
	while ($row = adi_fetch_assoc($result)) {
		$now[$row['invitation_status']] = $row['cnt'];
		$statusArr[$row['invitation_status']] = $row['cnt'];
		$alltotal += $row['cnt'];
	}
	
	$res = adi_query_read("SELECT COUNT(distinct content_id) as content_id FROM adiinviter WHERE content_id != 0");
	if($rw = adi_fetch_assoc($res)) 
	{
		$alltotal = $rw['content_id'];
	}

	$scriptTag = '<script type="text/javascript">
	YDM.get("chartDescription").innerHTML= "<h3> All Topic share summery </h3> (Total number of contents shared : '.$alltotal.')";
	adi.dispB("chartArea");
	adi.disp("pagination");
	var dataJSON = \'{ "show-progress": false, "graphset" : [ { "3d-aspect" : {"angle" : 25, "depth" : 80 }, "type" : "pie3d", "legend" : { "draggable": true, "position" : "20% 75","margin-top" : 1,"margin-right" : 4,"margin-left" : 1,"margin-bottom" : 1,"shadow" : true,"shadow-alpha" : 1,"shadow-color" : "#000000","shadow-distance" : 2,"shadow-blur-x" : 1,"shadow-blur-y" : 1,"fixed" : false,"drag-handler" : "header", "minimize" : true, "item" : {"margin-top" : 10,"margin-right" : 10,"margin-left" : 10,"margin-bottom" : 10}},"alpha" : 1,"background-color" : "#fbfbfb","background-color-2" : "#f5f5f5","plot" : {"value-box" : {"text" : "%t","placement" : "out","connected" : true},"highlight" : true,"tooltip-text" : "%t : %v<br> Total : '.$alltotal.'", "color": "#FFFFFF","animate" : true,"effect":1, "speed" : 0.8,"detach" : true,"slice":40}, "series" : [ ';

	$ext = ''; $finalOpt ='';
	
	$statusStr = array("invitation_sent" => array(),"blocked"  => array(),"accepted"  => array(),"waiting"  => array());
	foreach($statusStr as $status => $cnt)
	{
		$key = strtolower($status);
		$statusArr[$status] = ($statusArr[$status] == ''?'0':$statusArr[$status]);

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
	$_GET['offset'] = '0';
}

if(is_GET('offset'))
{
	$result = adi_query_read("SELECT count(inviter_id) as cnt FROM adiinviter WHERE content_id != 0");  
	while($row = adi_fetch_assoc($result))   
	{
		$pages = ceil($row['cnt'] / $pageSize);
	}
	if($pages == 0) {
		echo '<fieldset style="padding: 15px;"><h4>No Topic has been shared from using AdiInviter System.</h4></fieldset>';
		exit;
	}

	echo '<table class="normal tablesorter" style="">
	<thead>
	<tr>
		
		<th class="header">Invite Sender</th>
		<th class="header">Service</th>
		<th class="header">Status</th>
		<th class="header" style="width: 75px;">Issued</th>
		<th class="header">ID / Email</th>
		<th class="header">Topic Title</th>
		<th class="header">Accepted By</th>
		<th class="header" style="width: 60px;"></th>
	</tr></thead><tbody>';
	$result = adi_query_read("
	SELECT user.".$userFields['username']." as username, invitation_id, inviter_id, adiinviter.receiver_name, adiinviter.receiver_username, adiinviter.receiver_email, adiinviter.invitation_status, adiinviter.service_used, issued_date, adiinviter.receiver_social_id, adiinviter.content_id, adiinviter.share_type
	FROM adiinviter,".$userTable." as user 
	WHERE adiinviter.inviter_id=user.".$userFields['userid']." AND content_id != 0 
	ORDER BY issued_date desc 
	LIMIT ".$offset.",".$pageSize);

	$odd = true;
	$adiinviter->load_services();
	while($row = adi_fetch_assoc($result))
	{
		$service_key = $row['service_used'];
		$service_name = $adiinviter->services_config[$service_key]['service'];

		$status_code = strtolower($row['invitation_status']);
		$status = $row['invitation_status'];
		$status = $status_phrases[$status];
		
		$contentTitle = getContentTitle($row['content_id'], $row['share_type']);
		$contentLink  = getContentLink($row['content_id'], $row['share_type']);

		$issued_date_txt = $adiinviter->adi_format_timeAgo($row['issued_date']);

		$status_code = '<font style="color: #'.$graphcolors[$status_code][0].'"><b>'.$status.'</b></font>';
		echo "<tr ".($odd?'class="odd"':'').">";
		echo "<td>".$row['username']."</td>";
		echo "<td><span class='adi_".$service_key."_si'>".$service_name."</span></td>";
		echo "<td>".$status_code."</td>";
		echo "<td>".$issued_date_txt."</td>";
		echo "<td>".($row['receiver_email']!='None'?$row['receiver_email']:$row['receiver_social_id'])."</td>";
		echo "<td><div style='white-space:nowrap;text-overflow:ellipsis;overflow:hidden;width: 150px;'><a href='".$contentLink."' target='_blank' title='".$contentTitle."'> ".$contentTitle." </a></div></td>";
		echo "<td>".($row['receiver_username']!='None'?$row['receiver_username']:'.')."</td>";
		echo "<td><a class='record_del' rel='".$row['invitation_id']."'>Delete</></td>";
		echo "</tr>";
		$odd = !$odd;
	}
	echo '</tbody></table>';

	$currentPage = intval($offset / $pageSize)+1;
	echo '<div align="right" style="margin-top:10px;">';
	if($currentPage > 2) echo '<input type="button" onclick="return paginate(\''.$reportName.'\',0);" value="First">';
	if($currentPage > 1) echo '<input type="button" onclick="return paginate(\''.$reportName.'\','.(($currentPage-2) * $pageSize).');" value="Prev">';
	echo '<span href="#" class="paginate_icon" style="display: inline-block;">Page '.$currentPage.' of '.$pages.'</span>';
	
	if($pages - $currentPage > 0) echo '<input type="button" onclick="return paginate(\''.$reportName.'\','.($currentPage * $pageSize).');" value="Next">';
	if($pages - $currentPage > 1) echo '<input type="button" onclick="return paginate(\''.$reportName.'\','.(($pages-1) * $pageSize ).');" value="Last">';

}
?>