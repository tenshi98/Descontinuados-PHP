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
	$id_usuario = $_GET['id'];
	$estado     = $_GET['estado'];
	$query  = "UPDATE user_listado SET rol = '$estado'	
	WHERE id    = '$id_usuario'";
	$result = mysql_query($query, $dbConn);

header( 'Location: '.$location );
die; 
 
 
 ?>