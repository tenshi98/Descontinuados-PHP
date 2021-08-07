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
	//Elimino el vehiculo
	$query  = "DELETE FROM `clientes_contacto_amigos` WHERE idAmigo = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);	

	header( 'Location: '.$location );
	die;
	?>