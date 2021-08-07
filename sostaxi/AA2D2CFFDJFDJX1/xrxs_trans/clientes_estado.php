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
	$idCliente = $_GET['id'];
	$estado     = $_GET['estado'];
	$query  = "UPDATE clientes_listado SET Estado = '$estado'	
	WHERE idCliente    = '$idCliente'";
	$result = mysql_query($query, $dbConn);


header( 'Location: '.$location );
die; 
 
 
 ?>