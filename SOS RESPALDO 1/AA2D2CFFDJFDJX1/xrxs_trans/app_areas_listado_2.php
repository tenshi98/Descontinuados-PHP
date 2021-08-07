<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/;
		
		
		$idArea = $_GET['down_grilla'];
		$Orden = $_GET['orden'];
		$busqueda = $Orden+1;
		//Primero busco el item que este sobre para actualizarle el orden
		$query = "SELECT  idArea FROM `app_areas_listado` WHERE Orden = {$busqueda} AND idPagelist = {$_GET['view']}";
		$resultado = mysql_query ($query, $dbConn);
		$row_data = mysql_fetch_assoc ($resultado);
		//actualizo el orden de este item
		$query  = "UPDATE `app_areas_listado` SET Orden = {$Orden} WHERE idArea = {$row_data['idArea']} ";
		$result = mysql_query($query, $dbConn);
		//actualizo el orden del item actual
		$query  = "UPDATE `app_areas_listado` SET Orden = {$busqueda} WHERE idArea = {$idArea} ";
		$result = mysql_query($query, $dbConn);
		
		
		header( 'Location: '.$location );
		die;

?>