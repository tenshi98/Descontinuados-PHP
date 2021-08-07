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
	$query  = "DELETE FROM `core_permisos` WHERE idAdmpm = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);	
	$query  = "DELETE FROM `usuarios_permisos` WHERE idAdmpm = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	header( 'Location: '.$location );
	die;
	?>