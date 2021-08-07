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


		$idElementos = $_GET['up_elemento'];
		$Orden = $_GET['orden'];
		$busqueda = $Orden-1;
		//Primero busco el item que este sobre para actualizarle el orden
		$query = "SELECT  idElementos FROM `app_areas_elementos` WHERE Orden = {$busqueda} AND idArea = {$_GET['viewgrilla']}";
		$resultado = mysql_query ($query, $dbConn);
		$row_data = mysql_fetch_assoc ($resultado);
		//actualizo el orden de este item
		$query  = "UPDATE `app_areas_elementos` SET Orden = {$Orden} WHERE idElementos = {$row_data['idElementos']} ";
		$result = mysql_query($query, $dbConn);
		//actualizo el orden del item actual
		$query  = "UPDATE `app_areas_elementos` SET Orden = {$busqueda} WHERE idElementos = {$idElementos} ";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;

?>