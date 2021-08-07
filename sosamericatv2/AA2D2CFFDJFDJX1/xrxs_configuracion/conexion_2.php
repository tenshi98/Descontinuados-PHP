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
//Se define los datos de conexion para la base de datos numero 1
function conectar_1 () {
	$db_con_1 = mysql_pconnect (DB_SERVER_1,DB_USER_1,DB_PASS_1);
	if (!$db_con_1) return false; 
	if (!mysql_select_db (DB_NAME_1, $db_con_1)) return false;
	if (!mysql_query("SET NAMES 'utf8'")) return false;
	return $db_con_1; 
}
//Se define los datos de conexion para la base de datos numero 2
function conectar_2 () {
	$db_con_2 = mysql_pconnect (DB_SERVER_2,DB_USER_2,DB_PASS_2);
	if (!$db_con_2) return false; 
	if (!mysql_select_db (DB_NAME_2, $db_con_2)) return false;
	if (!mysql_query("SET NAMES 'utf8'")) return false;
	return $db_con_2; 
}
?>