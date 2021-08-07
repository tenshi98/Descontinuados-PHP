<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/* Configuracion Base de la datos */
/**********************************/
//conexion a la base de datos
$dbConn = mysql_connect("localhost","root","petland");
if (!$dbConn){
  die('Error en la coneccion: ' . mysql_error());
}
//realizo la conexion a la base de datos
mysql_select_db("jootes", $dbConn);
	
?>