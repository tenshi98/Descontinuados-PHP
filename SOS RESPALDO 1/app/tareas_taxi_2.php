<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
$dbConn   = conectar();
/**********************************************************************************************************************************/
/*                                                      Tomo las variables                                                        */
/**********************************************************************************************************************************/
list($idSolicitud, $taxista_evaluacion, $observaciones) =   split("3xyzxyz3", $_GET['mensaje'], 3);
/**********************************************************************************************************************************/
/*                                                    Realizo las consultas                                                       */
/**********************************************************************************************************************************/
	//Actualizo la base de datos	
	$query  = "UPDATE `solicitud_taxi_listado` SET taxista_evaluacion='{$taxista_evaluacion}', observaciones = '{$observaciones}' WHERE idSolicitud = '{$idSolicitud}'";
	$result = mysql_query($query, $dbConn);
	
?>