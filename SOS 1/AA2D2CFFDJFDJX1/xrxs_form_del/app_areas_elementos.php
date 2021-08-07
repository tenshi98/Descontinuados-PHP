<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
	$query  = "DELETE FROM `app_areas_elementos` WHERE idElementos = {$_GET['del_elemento']}";
	$result = mysql_query($query, $dbConn);	
	header( 'Location: '.$location );
	die;
	?>