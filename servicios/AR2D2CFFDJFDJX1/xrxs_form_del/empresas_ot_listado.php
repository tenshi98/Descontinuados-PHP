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

	//se borran los datos de la tabla empresas_ot_listado
	$query  = "DELETE FROM `empresas_ot_listado` WHERE idOt = {$_GET['delet']}";
	$result = mysql_query($query, $dbConn);	
	
	//borro a los responsables relacionados con la orden de trabajo
	$query  = "DELETE FROM `empresas_ot_resp` WHERE idOt = {$_GET['delet']}";
	$result = mysql_query($query, $dbConn);	
	
	//borro los comentarios relacionados a la orden de trabajo
	$query  = "DELETE FROM `empresas_ot_comment` WHERE idOt = {$_GET['delet']}";
	$result = mysql_query($query, $dbConn);	
	
	//redirecciono a una nueva ubicacion	
	header( 'Location: '.$location );
	die;
?>