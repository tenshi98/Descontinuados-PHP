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
// si no hay errores ejecuto el codigo	
if ( empty($errors[1])   ) { 

		// inserto los datos de registro en la db
		$fSolicitud     = date("Y-m-d");
		$idempresa      = $_GET['view'];
		$idresponsable  = $arrUsuario['idUsuario'];
		$query  = "INSERT INTO `zint_bodega_solicitud` (idEmpresa, Responsable, fSolicitud) 
		VALUES ('$idempresa', '$idresponsable', '$fSolicitud')";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
		}
?>