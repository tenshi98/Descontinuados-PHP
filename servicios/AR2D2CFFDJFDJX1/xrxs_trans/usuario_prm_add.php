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
	$query  = "INSERT INTO `usuarios_permisos` (idAdmin_permisos, idUsuario) 
	VALUES ('$id_permiso','$id_usuario')";
	$result = mysql_query($query, $dbConn);	

header( 'Location: '.$location.'?id='.$id_usuario.'#permisos' );
die; 
 
 
 ?>