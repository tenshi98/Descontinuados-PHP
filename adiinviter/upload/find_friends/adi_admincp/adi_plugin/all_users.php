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
// $offset = isset($_GET['offset'])?$_GET['offset']:0;
$pageSize = '20';
$sortBy = '';

if(!is_GET('offset'))
{ // send codes for graph also

	$alltotal = 0;
	$time_now = $adiinviter->adi_get_utc_timestamp();
	$ts = mktime(0, 0, 0, date("m",$time_now)-11, date("d",$time_now)+1, date("Y",$time_now));

	$result = adi_query_read("
	SELECT count(invitation_id) as cnt,issued_date,invitation_status
	FROM adiinviter
	GROUP BY issued_date, invitation_status
	HAVING issued_date > '".date("Y-m-d", mktime(0, 0, 0, date("m")-11, date("d")+1, date("Y")))."'");
	$biggest = 0;

	while ($row = adi_fetch_assoc($result))
	{
		$curMonthName = date('F-y', $row['issued_date']);
		if(! isset($now[$curMonthName]['total']) )
		{
			$now[$curMonthName]['total'] = 0;
		}
		if(! isset($now[$curMonthName][$row['invitation_status']]) )
		{
			$now[$curMonthName][$row['invitation_status']] = 0;
		}

		$now[$curMonthName]['total'] += $row['cnt'];
		$now[$curMonthName][$row['invitation_status']] += $row['cnt'];
	}

	$statusArr = array("invitation_sent", "blocked", "accepted", "waiting");
	$statusStr = array("invitation_sent" => '',"blocked"  => '',"accepted"  => '',"waiting"  => '');

	$ext = '';
	$scaleX = '"scale-x" : {"zooming" : true,"format" : "%v","item":{},"font-size" : 11,"color" : "#000000","text" : "Month","line-color" : "#000000","line-width" : 1,"line-gap-size" : 0,"tick":{"size" : 5,"line-color" : "#000000","line-width" : 1,"line-gap-size" : 0}, "values" : [';

	foreach($now as $month => $details)
	{
		$cur_total = 0;
     	$scaleX .= $ext.'"'.$month.'"';
		foreach($statusArr as $status)
		{
			$cur_cnt = (isset($details[$status]) ?  $details[$status] : 0);
			$cur_total += $cur_cnt+0;
			if($biggest < $cur_cnt)
				$biggest = $cur_cnt;
			$statusStr[$status] .= $ext.'"'.$cur_cnt.'"';
		}
		$ext=',';
		$alltotal += $cur_total+0;
	}
	$scaleX .= '] },';

	$finalOpt = '';$ext='';
	foreach($statusArr as $status)
	{
		$key = strtolower($status);

		$statusStr[$status] = $ext.' {"values":['.$statusStr[$status].'],"text":"'.$status_phrases[$status].
		'","animate":true,"effect":1,"alpha" : 1,"background-color" : "#'.
		$graphcolors[$key][0].'","background-color-2" : "#'.
		$graphcolors[$key][1].'"}';
		$ext = ',';
		$finalOpt .= $statusStr[$status];
	}
	$biggest= $biggest + (int) ($biggest * 0.1);

	$start = ceil($biggest / 10);
	$arr = range(0,($start*10),$start);
	$scaleY= '"scale-y" : {"zooming" : true,"text" : "Number of Invitations","tick":{"size":5},"values":['.implode(',', $arr).']},';

	echo '
<script type="text/javascript">

YDM.get("chartDescription").innerHTML= "<h3> All users summery </h3> (Total number of invitations sent : '.$alltotal.')";

adi.dispB("chartArea");
	adi.disp("pagination");
var dataJSON = \'{ "show-progress": false, "graphset" : [ { "legend" : {"layout":"1x", "draggable": true, "position" : "50 330","margin-top" : 1,"margin-right" : 4,"margin-left" : 1,"margin-bottom" : 1,"shadow" : true,"shadow-alpha" : 1,"shadow-color" : "#000000","shadow-distance" : 2,"shadow-blur-x" : 1,"shadow-blur-y" : 1,"fixed" : false,"drag-handler" : "header", "minimize" : true, "item" : {"margin-top" : 10,"margin-right" : 10,"margin-left" : 10,"margin-bottom" : 10}}, "plotarea" : {"position" : "0% 0%","margin-top" : 10,"margin-right" : 30,"margin-left" : 50,"margin-bottom" : 120}, '.$scaleY.' "type" : "bar3d", "alpha" : 1,"background-color" : "#fbfbfb","background-color-2" : "#f5f5f5", "plot" : {"highlight" : true,"tooltip-text" : "%t : %v"}, "lens" : {"visible" : true,"width" : 60,"height" : 60}, ';
	echo $scaleX.'"series":['.$finalOpt;
	echo '] } ] }\';
	zingchart.render({
		liburl 			: "./css/zingchart.swf",
		data 		    : dataJSON,
		width	 		: '.(((int)$_GET['sWidth'])-310).',
		height 			: 400,
		container 		: "chart"

	});
	adi.dispN("graph_paginate");
setTimeout(function(){
		YDM.setStyle("chart","height","400px");
	},100);
	</script>
		';

}


//Code for Statistics Table and pagination
echo '<table class="normal tablesorter" style="width: 100%;">
	<thead>
	<tr>
		<th class="header">User ID.</th>
		<th class="header">Username</th>
		<!-- <th class="header">Most Used Service (count)</th> -->
		<th class="header">Total Invites Sent</th>
		<th class="header">'.$status_phrases['accepted'].'</th>
		<th class="header">'.$status_phrases['invitation_sent'].'</th>
		<th class="header">'.$status_phrases['waiting'].'</th>
		<th class="header">'.$status_phrases['blocked'].'</th>
	</tr>
	</thead>
	<tbody>';

	$result = adi_query_read("SELECT count(distinct inviter_id) as cnt FROM adiinviter ");
	while ($row = adi_fetch_assoc($result))
	{
		$pages = ceil($row['cnt'] / $pageSize);
	}

	$userTable = $adiinviter->user_table_name;
	$userFields = $adiinviter->user_fields;

	$result = adi_query_read("SELECT inviter_id, COUNT(1) as Total, users.".$userFields['username']." as username,
		SUM(CASE WHEN invitation_status = 'waiting'  THEN 1 ELSE 0 END) AS waiting,
		SUM(CASE WHEN invitation_status = 'blocked'  THEN 1 ELSE 0 END) AS blocked,
		SUM(CASE WHEN invitation_status = 'invitation_sent'  THEN 1 ELSE 0 END) AS invitation_sent,
		SUM(CASE WHEN invitation_status = 'accepted' THEN 1 ELSE 0 END) AS accepted
	FROM adiinviter as adiinviter LEFT JOIN ".$userTable." as users ON
		adiinviter.inviter_id = users.".$userFields['userid']."
	GROUP BY inviter_id
	ORDER BY Total DESC, accepted DESC, invitation_sent DESC
	LIMIT ".$offset.",".$pageSize);

	$odd = true;
	while($row = adi_fetch_assoc($result))
	{
		echo "<tr ".($odd?'class="odd"':'')."><td>".$row['inviter_id']."</td><td>".($row['inviter_id'] != 0 ? $row['username'] : 'All non-registered users')."</td>";
		$check=0; $cString = ''; $occurance = 1;
		
		//echo '<td>'.$cString.'</td>';
		echo "<td>".$row['Total']."</td>";
		echo "<td>".$row['accepted']."</td>";
		echo "<td>".$row['invitation_sent']."</td>";
		echo "<td>".$row['waiting']."</td>";
		echo "<td>".$row['blocked']."</td>";

		//if(is_array($dt['status'])) 			foreach($dt['status'] as $status => $cnt)				echo "<td>".$status." : ".$cnt."</td>";
		echo "</tr>";
		$odd = !$odd;
	}
	echo '</tbody>
	</table>';

	$currentPage = intval($offset / $pageSize)+1;
	echo '<div align="right" style="margin-top:10px;">';
	if($currentPage > 2) echo '<input type="button" onclick="return paginate(\'adi_statistics\',0);" value="First">';
	if($currentPage > 1) echo '<input type="button" onclick="return paginate(\'adi_statistics\','.(($currentPage-2) * $pageSize).');" value="Prev">';
	echo '<span href="#" class="paginate_icon" style="display: inline-block;">Page '.$currentPage.' of '.$pages.'</span>';
	//echo '<a href="#" class="table_icon" style="" onclick="return false;"></a>';
	if($pages - $currentPage > 0) echo '<input type="button" onclick="return paginate(\'adi_statistics\','.($currentPage * $pageSize).');" value="Next">';
	if($pages - $currentPage > 1) echo '<input type="button" onclick="return paginate(\'adi_statistics\','.(($pages-1) * $pageSize ).');" value="Last">';


?>