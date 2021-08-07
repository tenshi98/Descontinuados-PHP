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
	//se borra al usuario
	$query  = "DELETE FROM `usuarios_listado` WHERE idUsuario = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	//se borran los permisos relacionados al usuario
	$query  = "DELETE FROM `usuarios_permisos` WHERE idUsuario = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	header( 'Location: '.$location );
	die;
	?>