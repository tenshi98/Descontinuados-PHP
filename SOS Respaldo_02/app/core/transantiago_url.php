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
if(isset($_GET['dispositivo'])&&$_GET['dispositivo']!='')   {$dispositivo=$_GET['dispositivo'];}else{$dispositivo='';}
if(isset($_GET['view_app'])&&$_GET['view_app']!='')         {$view_app=$_GET['view_app'];}else{$view_app='';}
if(isset($_GET['new_view_app'])&&$_GET['new_view_app']!='') {$new_view_app=$_GET['new_view_app'];}else{$new_view_app='';}
if(isset($_GET['app_conf'])&&$_GET['app_conf']!='')         {$app_conf=$_GET['app_conf'];}else{$app_conf='';}


$w  = '?IMEI='.$imei;
$w .= '&GSM='.$gsm;
$w .= '&dispositivo='.$dispositivo;
$w .= '&view_app='.$view_app;//depende directamente de la tabla de paginas, en donde se administran las paginas de la app
$w .= '&new_view_app='.$new_view_app;
$w .= '&app_conf='.$app_conf;
?>