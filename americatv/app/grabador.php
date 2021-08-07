<?php 
define('XMBCXRXSKGC', 1);
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
$imei = $_REQUEST['imei'];
$numero = $_REQUEST['numero'];

//$numero = "72489062";
//$imei="356878051272119";

$query = "SELECT sms1,sms2,sms3,sms4,sms5 FROM ejecutivos WHERE imei= '".$imei."' Limit 1";
$resultado = mysql_query ($query, $dbConn);
$rowusr=mysql_fetch_array($resultado);

$sql ="";
 if ($rowusr["sms1"]==$numero or $rowusr["sms2"]==$numero or $rowusr["sms3"]==$numero or  $rowusr["sms4"]==$numero or $rowusr["sms5"]==$numero) { 
	 $sql ="";
	 } else {
		if ($rowusr["sms1"]=='0'  ) { 
			$sql = "update ejecutivos set sms1='".$numero."' WHERE imei= '".$imei."'"; 
		}else if ($rowusr["sms2"]=='0') { 
			$sql = "update ejecutivos set sms2='".$numero."' WHERE imei= '".$imei."'"; 
		}else if  ($rowusr["sms3"]=='0') { 
			$sql = "update ejecutivos set sms3='".$numero."' WHERE imei= '".$imei."'";
		}else if  ($rowusr["sms4"]=='0') { 
			$sql = "update ejecutivos set sms4='".$numero."' WHERE imei= '".$imei."'";
		}else if  ($rowusr["sms5"]=='0') { 
			$sql = "update ejecutivos set sms5='".$numero."' WHERE imei= '".$imei."'"; 
	 }
if ($sql<>"") {
$resultado = mysql_query ($sql, $dbConn);
 }
	 }
?>
