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
	$query  = "DELETE FROM `core_permisos_cat` WHERE id_pmcat = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);	
	
	// Se trae un listado con todos los permisos relacionados a la categoria
	$arrBorrado = array();
	$query = "SELECT idAdmpm
	FROM `core_permisos`
	WHERE id_pmcat = {$_GET['del']} ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrBorrado,$row );
	}
	//Se borran todos los permisos de los usuarios relacionados a la categoria
	foreach ( $arrBorrado as $borrar ) {
		$query  = "DELETE FROM `usuarios_permisos` WHERE idAdmpm = {$borrar['idAdmpm']}";
		$result = mysql_query($query, $dbConn);
	}
	$query  = "DELETE FROM `core_permisos` WHERE id_pmcat = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);	
	
	
	header( 'Location: '.$location );
	die;
	?>