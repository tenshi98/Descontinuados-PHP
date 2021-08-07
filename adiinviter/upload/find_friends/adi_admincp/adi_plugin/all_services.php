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
$pageSize = '10';
$sortBy = '';
$page = ceil($offset / $pageSize);


$userTable = $adiinviter->user_table_name;
$userFields = $adiinviter->user_fields;


	$result = adi_query_read("SELECT SQL_CALC_FOUND_ROWS COUNT(1) as Total, service_used, 
	SUM(CASE WHEN invitation_status = 'waiting'  THEN 1 ELSE 0 END) AS waiting, 
	SUM(CASE WHEN invitation_status = 'blocked'  THEN 1 ELSE 0 END) AS blocked,	
	SUM(CASE WHEN invitation_status = 'invitation_sent'  THEN 1 ELSE 0 END) AS invitation_sent,	
	SUM(CASE WHEN invitation_status = 'accepted' THEN 1 ELSE 0 END) AS accepted	
	FROM adiinviter
	GROUP BY service_used
	ORDER BY Total DESC, accepted DESC, invitation_sent DESC 
	LIMIT ".$offset.",".$pageSize);
	
	$result1 = adi_query_read("SELECT count(1) as cnt FROM adiinviter");
	while ($row = adi_fetch_assoc($result1)) {
		$allcount = $row['cnt'];
	}

	$result1 = adi_query_read("SELECT count(cnt) as cnt 
		FROM (SELECT count(1) AS cnt FROM adiinviter GROUP BY service_used HAVING cnt >0 ) as a ORDER BY cnt DESC");
	while($row = adi_fetch_assoc($result1)) {
		$pages = ceil($row['cnt'] / $pageSize);
	}
	
	$statusArr = array("invitation_sent", "blocked", "accepted", "waiting");
	$statusStr = array("invitation_sent" => array(),"blocked"  => array(),"accepted"  => array(),"waiting"  => array());

	$counter = 0;
	//$allSent = 'allSent = {';
	$scaleX = '"scale-x" : {"zooming" : true,"format" : "%v","item":{},"font-size" : 11,"color" : "#000000","text" : "AdiInviter services","line-color" : "#000000","line-width" : 1,"line-gap-size" : 0,"tick":{"size" : 5,"line-color" : "#000000","line-width" : 1,"line-gap-size" : 0}, "values" : ['; 
	$ext=''; $biggest =0; $cnt = 0;
	$tmp2 = array(); $tmp1 = array();
	$odd = true; $tablerows = ''; $counter = $offset + 1;
	$adiinviter->load_services();
	while($row = adi_fetch_assoc($result))
	{
		if($row['Total'] === '0') continue;
		$service_key = $row['service_used'];
		$service_name = $adiinviter->services_config[$service_key]['service'];

		$tablerows .= "<tr ".($odd?'class="odd"':'')."><td>".($counter++)."</td>";
		$tablerows .= "<td><span class='adi_".$service_key."_si'>".$service_name."</span></td>";
		$tablerows .= "<td>".$row['Total']."</td>";
		$tablerows .= "<td>".$row['waiting']."</td>";
		$tablerows .= "<td>".$row['blocked']."</td>";
		$tablerows .= "<td>".$row['invitation_sent']."</td>";
		$tablerows .= "<td>".$row['accepted']."</td>";

		//if(is_array($dt['status'])) foreach($dt['status'] as $status => $cnt) echo "<td>".$status." : ".$cnt."</td>";  
		$tablerows .= "</tr>";
		$odd = !$odd;

		
		$tmp1[] = '"'.$service_name.'"';
		$tmp=0;
		foreach($statusArr as $status)
		{
			$tt = $row[$status];
			$tmp+=$tt;
			$statusStr[$status][] = '"'.($tt).'"';
		}
		if($biggest<$tmp)
			$biggest=$tmp;
		$ext=',';
		++$cnt;
		//if(++$cnt == $pageSz) break;
	}
	$ht = 160+($cnt*50);
	$count = 90+88 + ($cnt *40);
	while($cnt < $pageSize)
	{
		$tmp1[] = '""';
		foreach($statusArr as $status)
		{
			$statusStr[$status][] = '"0"';
		}
		$cnt++;
	}
	$biggest= $biggest + (int) ($biggest * 0.1);

	$start = ceil($biggest / 10);
	$arr = range(0,($start*10),$start);
	$scaleY= '"scale-y" : {"zooming" : true,"text" : "Number of Invitations","tick":{"size":5},"values":['.implode(',', $arr).']},';
	

	$scaleX .= implode(',', $tmp1).'] },';

	$finalOpt = '';$ext='';
	foreach($statusArr as $status)
	{
		$key = strtolower($status);
		
		//$statusStr[$status] = array_reverse($statusStr[$status], true);
		$statusStr[$status] = $ext.' {"values":['.implode(',',$statusStr[$status]).'],"text":"'.$status_phrases[$status].'","animate":true,"effect":1,"alpha" : 1,"background-color" : "#'.
		$graphcolors[$key][0].'","background-color-2" : "#'.
		$graphcolors[$key][1].'"}'; 
		$ext =',';
		$finalOpt .= $statusStr[$status];
	}
	

	$scriptTag = '
	YDM.get("chartDescription").innerHTML= "<h3> All services summery </h3> (Total number of invitations sent : '.$allcount.')";

		adi.dispB("chartArea");
	adi.disp("pagination");

	var dataJSON = \'{ "show-progress": true, "graphset" : [ {"legend" : {"layout":"1x", "draggable": true, "position" : "50 10","margin-top" : 1,"margin-right" : 4,"margin-left" : 1,"margin-bottom" : 1,"shadow" : true,"shadow-alpha" : 1,"shadow-color" : "#000000","shadow-distance" : 2,"shadow-blur-x" : 1,"shadow-blur-y" : 1,"fixed" : false,"drag-handler" : "header", "minimize" : true, "item" : {"margin-top" : 10,"margin-right" : 10,"margin-left" : 10,"margin-bottom" : 10}},  "plotarea" : {"position" : "0% 0%","margin-top" : 75,"margin-right" : 50,"margin-left" : 80,"margin-bottom" : 90}, '.$scaleY.' "histogram" : false,"stacked" : true,"3d-aspect" : {"angle" : 55}, "type" : "bar3d", "alpha" : 1,"background-color" : "#fbfbfb","background-color-2" : "#f5f5f5","tooltip" : {"visible" : true,"font-size" : 11,"color" : "#333333","text-align" : "left"}, "plot" : {"highlight" : true,"tooltip-text" : "%t : %v<br/>Total Invites : %total"}, "lens" : {"visible" : true,"width" : 60,"height" : 60},               ';
	$scriptTag .= $scaleX.'"series":['.$finalOpt;
	$scriptTag .= '] } ] }\';
	zingchart.render({
		liburl 			: "./css/zingchart.swf",
		data 		    : dataJSON,
		width	 		: '.(((int)$_GET['sWidth'])-310).',
		height 			: 578,
		container 		: "chart"

	});
	setTimeout(function(){
		YDM.setStyle("chart","height","578px");
	},100);
	';

	$scriptTag .= 'YDM.setStyle("chart","height","'.$count.'px");';

//if(! isset($_GET['offset']) ) { // send codes for graph also
	
	//$_GET['v'] = 'all_services';
	$scriptTag = '<script type="text/javascript">adi.dispN("graph_paginate");'.$scriptTag.'</script>';
	echo $scriptTag;
//}

	echo '<table class="normal tablesorter" style="width: 100%;margin-bottom: 20px;">
	<thead>
	<tr>
		<th class="header">Sr. No.</th>
		<th class="header">Service Name</th>
		<th class="header">Total Invites Sent</th>
		<th class="header">'.$status_phrases['waiting'].'</font></th>
		<th class="header">'.$status_phrases['blocked'].'</th>
		<th class="header">'.$status_phrases['invitation_sent'].'</th>
		<th class="header">'.$status_phrases['accepted'].'</th>
	</tr></thead><tbody>';


	$odd = true;
	$counter = $offset + 1;

	echo $tablerows;
	echo '</tbody></table>';

	$currentPage = intval($offset / $pageSize)+1;
	echo '<div align="right" style="margin-top:10px;">';
	if($currentPage > 2) echo '<input type="button" class="paginate_icon" style="" onclick="return paginate(\''.$reportName.'\',0);" value="First">';
	if($currentPage > 1) echo '<input type="button" class="paginate_icon" style="" onclick="return paginate(\''.$reportName.'\','.(($currentPage-2) * $pageSize).');" value="Prev">';
	echo '<span class="paginate_icon" style="display: inline-block;">Page '.$currentPage.' of '.$pages.'</span>';
	//echo '<a href="#" class="table_icon" style="" onclick="return false;"></a>';
	if($pages - $currentPage > 0) echo '<input type="button" class="paginate_icon" style="" onclick="return paginate(\''.$reportName.'\','.($currentPage * $pageSize).');" value="Next">';
	if($pages - $currentPage > 1) echo '<input type="button" class="paginate_icon" style="" onclick="return paginate(\''.$reportName.'\','.(($pages-1) * $pageSize ).');" value="Last">';


?>