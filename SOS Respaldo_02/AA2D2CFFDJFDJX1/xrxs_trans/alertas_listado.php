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
	$query  = "UPDATE `alertas_listado` SET vista=1 WHERE idAlerta = '{$_GET['id']}'";
	$result = mysql_query($query, $dbConn);

	header( 'Location: '.$location );
	die;
	?>