<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************************************************************************************************************/
/*                                   Se toma la solicitud y se guarda en la base de datos                                         */
/**********************************************************************************************************************************/

		//Actualizo el estado del sorteo a cancelado, todos los elementos
		$query  = "UPDATE `solicitud_taxi_sorteo` SET Estado='4' WHERE idSolicitud = '{$_GET['canceltodassol']}'";
		$result = mysql_query($query, $dbConn);
		
		//Se actualiza el estado de la solicitud
		$query  = "UPDATE `solicitud_taxi_listado` SET Estado='42' WHERE idSolicitud = '{$_GET['canceltodassol']}'";
		$result = mysql_query($query, $dbConn);

		//Redirijo a la pagina de espera de respuesta
		header( 'Location: '.$location );
		die;
	
?>