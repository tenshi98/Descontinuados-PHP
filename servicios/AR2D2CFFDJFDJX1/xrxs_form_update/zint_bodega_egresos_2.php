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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])  ) {

		//GUARDO LOS DATOS EN VARIABLES CON UN ARRAY
 		foreach($_POST['idBodega'] as $a => $n) { 
 		echo $n;
		    $idBodega       = $n;
			$query  = "UPDATE `zint_bodega` set Estado = '14' WHERE idBodega = '$idBodega'";
			$result = mysql_query($query, $dbConn);	
		 }
		//SE ACTUALIZA EL ESTADO DE LA SOLICITUD PARA CERRARLA 
		$idSolicitud      = $_POST['idSolicitud'];
		$query  = "UPDATE `zint_bodega_solicitud` set Estado = '14' WHERE idSolicitud = '$idSolicitud'";
		$result = mysql_query($query, $dbConn);	

		header( 'Location: '.$location );
		die;
	}?>