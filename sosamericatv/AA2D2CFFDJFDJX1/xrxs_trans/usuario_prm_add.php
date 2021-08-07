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
	$id_permiso = $_GET['prm_add'];
	$level      = '1';
	$query  = "INSERT INTO `usuarios_permisos` (idUsuario, idAdmpm, level) 
	VALUES ('$id_usuario','$id_permiso','$level')";
	$result = mysql_query($query, $dbConn);	

	header( 'Location: '.$location );
	die;  
 ?>