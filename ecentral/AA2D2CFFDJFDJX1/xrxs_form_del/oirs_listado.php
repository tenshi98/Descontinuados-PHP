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
	
	// Se trae un listado con todas las imagenes a borrar
	$arrBorrado = array();
	$query = "SELECT nombre
	FROM `tbl_temp_files`
	WHERE id_Oirs = {$_GET['del']} ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrBorrado,$row );
	}
	//procedo a borrar las imagenes
	$dir="uploads/";
	foreach ( $arrBorrado as $borrar ) {
		unlink($dir.$borrar['nombre']);
	}
	
	//Borro las oirs
	$query  = "DELETE FROM `oirs_listado` WHERE id_Oirs = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);	
	
	$query  = "DELETE FROM `oirs_dias` WHERE id_Oirs = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	$query  = "DELETE FROM `oirs_historial` WHERE id_Oirs = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	$query  = "DELETE FROM `oirs_observaciones` WHERE id_Oirs = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	$query  = "DELETE FROM `tbl_temp_files` WHERE id_Oirs = {$_GET['del']}";
	$result = mysql_query($query, $dbConn);
	
	header( 'Location: '.$location );
	die;
	?>