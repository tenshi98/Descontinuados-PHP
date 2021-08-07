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
	//Se borran los datos
	$query  = "DELETE FROM `clientes_accesos` WHERE idCliente = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	$query  = "DELETE FROM `clientes_asistencia_beneficios` WHERE idCliente = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	$query  = "DELETE FROM `clientes_asistencia_eventos` WHERE idCliente = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	$query  = "DELETE FROM `clientes_grupo_familiar` WHERE idCliente = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	$query  = "DELETE FROM `clientes_listado` WHERE idCliente = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	$query  = "DELETE FROM `clientes_pruebas` WHERE idCliente = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
		
	header( 'Location: '.$location );
	die;
	?>