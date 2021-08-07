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
	$query  = "DELETE FROM `empresas_ot_costosrel` WHERE idCostos = {$_GET['del_costo']}";
	$result = mysql_query($query, $dbConn);	
	header( 'Location: '.$location );
	die;
?>