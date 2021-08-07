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
	$perm   = $_GET['perm'];
	$table  = $_GET['table'];
	$value  = $_GET['value'];
	$query  = "UPDATE usuarios_permisos SET 
	$table = '$value'	
	WHERE idPermisos    = '$perm'";
	$result = mysql_query($query, $dbConn);

	header( 'Location: '.$location );
	die; 

 ?>