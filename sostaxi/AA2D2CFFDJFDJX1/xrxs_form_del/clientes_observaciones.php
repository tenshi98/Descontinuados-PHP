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
	$query  = "DELETE FROM `clientes_observaciones` WHERE idObservacion = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);	
	header( 'Location: '.$location );
	die;
	?>