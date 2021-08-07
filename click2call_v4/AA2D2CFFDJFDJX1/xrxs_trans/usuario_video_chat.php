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
// si no hay errores ejecuto el codigo
	$videochat    = $_GET['activate'];
	$idUsuario    = $_GET['idUsuario'];
	
	// inserto los datos de registro en la db
	$query  = "UPDATE `usuarios_listado` SET videochat=".$videochat."   WHERE idUsuario = '$idUsuario'";
	$result = mysql_query($query, $dbConn);		

	header( 'Location: '.$location );
	die;  
 ?>