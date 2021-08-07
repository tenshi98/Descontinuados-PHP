<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/********************************/
/* Configuracion de la conexion */
/********************************/
function conectar () {
	$dbConn = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
	//$db_con = mysql_pconnect (DB_SERVER,DB_USER,DB_PASS);
	if (!$dbConn) return false; 
	if (!mysql_select_db (DB_NAME, $dbConn)) return false;
	if (!mysql_query("SET NAMES 'utf8'")) return false;
	return $dbConn; 
}
?>