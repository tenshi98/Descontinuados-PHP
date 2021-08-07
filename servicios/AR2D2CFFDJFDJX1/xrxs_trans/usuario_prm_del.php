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
	$query  = "DELETE FROM `usuarios_permisos` WHERE idPermisos = {$_GET['prm_del']}";
	$result = mysql_query($query, $dbConn);

header( 'Location: '.$location.'?id='.$id_usuario.'#permisos' );
die; 
 
 
 ?>