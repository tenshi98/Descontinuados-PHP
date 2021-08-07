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
	$mod    = $_GET['mod'];
	$perm   = $_GET['perm'];
	$query  = "UPDATE usuarios_permisos SET level = '$mod'	
	WHERE idPermisos    = '$perm'";
	$result = mysql_query($query, $dbConn);

	header( 'Location: '.$location );
	die; 
 
 
 ?>