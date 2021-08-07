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
	$query  = "DELETE FROM `empresas_ot_tareas` WHERE idTarea = {$_GET['del_tarea']}";
	$result = mysql_query($query, $dbConn);	
	header( 'Location: '.$location );
	die;
?>