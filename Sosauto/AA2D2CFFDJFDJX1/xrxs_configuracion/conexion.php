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
	$db_con = mysql_pconnect (DB_SERVER,DB_USER,DB_PASS);
	if (!$db_con) return false; 
	if (!mysql_select_db (DB_NAME, $db_con)) return false;
	if (!mysql_query("SET NAMES 'utf8'")) return false;
	return $db_con; 
}
?>