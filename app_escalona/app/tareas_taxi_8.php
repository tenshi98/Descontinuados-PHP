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
list($idSolicitud, $idCliente) =   split("3xyzxyz3", $_GET['mensaje'], 2);
/**********************************************************************************************************************************/
/*                                                    Realizo las consultas                                                       */
/**********************************************************************************************************************************/
	// Se trae la ubicacion actual del taxista 
		$query = "SELECT  
		taxista.Latitud,
		taxista.Longitud
		FROM `solicitud_taxi_listado`
		LEFT JOIN clientes_listado taxista ON taxista.idCliente = solicitud_taxi_listado.idTaxista
		WHERE solicitud_taxi_listado.idSolicitud = '{$idSolicitud}'";
		$resultado = mysql_query ($query, $dbConn);
		$row_datos = mysql_fetch_assoc ($resultado);
		
		//Actualizo los datos 
		$query  = "UPDATE `solicitud_taxi_listado` SET Estado='44', CarreraFinalizada_Latitud = '{$row_datos['Latitud']}', CarreraFinalizada_Longitud =  '{$row_datos['Longitud']}' WHERE idSolicitud = '{$idSolicitud}'";
		$result = mysql_query($query, $dbConn);
		
		//Cambia el estado del taxista a disponible
		$query  = "UPDATE `clientes_listado` SET Alarma='Si', EstadoCarrera='45' WHERE idCliente = '{$idCliente}'";
		$result = mysql_query($query, $dbConn);
	
?>