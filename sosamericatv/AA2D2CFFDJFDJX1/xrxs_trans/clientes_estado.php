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
	$id_ejecutiv = $_GET['id'];
	$estado     = $_GET['estado'];
	$query  = "UPDATE ejecutivos SET estado_usr = '$estado'	
	WHERE id_ejecutiv    = '$id_ejecutiv'";
	$result = mysql_query($query, $dbConn);


header( 'Location: '.$location );
die; 
 
 
 ?>