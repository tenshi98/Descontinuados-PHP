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
	$id_usuario = $_GET['id_usuario'];
	$estado     = $_GET['estado'];
	$query  = "UPDATE postulante SET rol = '$estado'	
	WHERE id_usuario    = '$id_usuario'";
	$result = mysql_query($query, $dbConn);

header( 'Location: '.$location );
die; 
 
 
 ?>