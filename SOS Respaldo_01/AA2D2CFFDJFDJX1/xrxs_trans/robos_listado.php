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
	//Actualizo la vista de las alarmas
	$query  = "UPDATE `robos_listado` SET vista=1 WHERE idRobo = '{$_GET['id']}'";
	$result = mysql_query($query, $dbConn);

	header( 'Location: '.$location );
	die;
	?>