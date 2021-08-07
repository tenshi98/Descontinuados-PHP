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
	$query  = "UPDATE usuarios_listado SET Estado = '$estado'	
	WHERE idUsuario    = '$id_usuario'";
	$result = mysql_query($query, $dbConn);

header( 'Location: '.$location.'?id='.$id_usuario );
die; 
 
 
 ?>