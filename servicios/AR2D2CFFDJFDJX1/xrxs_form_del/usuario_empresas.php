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
	$query  = "DELETE FROM `usuarios_empresas` WHERE idUsremp = {$_GET['del_emp']}";
	$result = mysql_query($query, $dbConn);	
	header( 'Location: '.$location );
	die;
?>