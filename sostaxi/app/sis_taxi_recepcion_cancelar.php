<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************************************************************************************************************/
/*                                                           Ejecuto codigo                                                       */
/**********************************************************************************************************************************/

	
	$query  = "UPDATE `solicitud_taxi_sorteo` SET Estado='3' WHERE idSorteo = '{$_GET['idSorteo']}' AND idTaxista={$arrCliente['idCliente']}";
	$result = mysql_query($query, $dbConn);


	//redirijo a la pagina principal
	header( 'Location: '.$location );
	die;

			
?>