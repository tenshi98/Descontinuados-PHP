<?php 
/**********************************************************************************************************************************/
/*                                       Se cargan las variables URL para reutilizarlas                                           */
/**********************************************************************************************************************************/
if(isset($_GET['IMEI'])&&$_GET['IMEI']!='')         {$imei=$_GET['IMEI'];}else{$imei='';}
if(isset($_GET['GSM'])&&$_GET['GSM']!='')           {$gsm=$_GET['GSM'];}else{$gsm='';}
if(isset($_GET['Roaming'])&&$_GET['Roaming']!='')   {$roaming=$_GET['Roaming'];}else{$roaming='';}
if(isset($_GET['latitud'])&&$_GET['latitud']!='')   {$lat=$_GET['latitud'];}else{$lat='';}
if(isset($_GET['longitud'])&&$_GET['longitud']!='') {$lon=$_GET['longitud'];}else{$lon='';}
$w  = '?IMEI='.$imei;
$w .= '&GSM='.$gsm;
$w .= '&Roaming='.$roaming;
$w .= '&latitud='.$lat;
$w .= '&longitud='.$lon;
?>