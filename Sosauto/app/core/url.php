<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
} 
/**********************************************************************************************************************************/
/*                                       Se cargan las variables URL para reutilizarlas                                           */
/**********************************************************************************************************************************/
if(isset($_GET['IMEI'])&&$_GET['IMEI']!='')                 {$imei=$_GET['IMEI'];}else{$imei='';}
if(isset($_GET['GSM'])&&$_GET['GSM']!='')                   {$gsm=$_GET['GSM'];}else{$gsm='';}
if(isset($_GET['Roaming'])&&$_GET['Roaming']!='')           {$roaming=$_GET['Roaming'];}else{$roaming='';}
if(isset($_GET['latitud'])&&$_GET['latitud']!='')           {$lat=$_GET['latitud'];}else{$lat='';}
if(isset($_GET['longitud'])&&$_GET['longitud']!='')         {$lon=$_GET['longitud'];}else{$lon='';}
if(isset($_GET['dispositivo'])&&$_GET['dispositivo']!='')   {$dispositivo=$_GET['dispositivo'];}else{$dispositivo='';}
$w  = '?IMEI='.$imei;
$w .= '&GSM='.$gsm;
$w .= '&Roaming='.$roaming;
$w .= '&latitud='.$lat;
$w .= '&longitud='.$lon;
$w .= '&dispositivo='.$dispositivo;
?>