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
if(isset($_GET['app_conf'])&&$_GET['app_conf']!='')         {$app_conf=$_GET['app_conf'];}else{$app_conf='';}


$w = '?app_conf='.$app_conf;
?>