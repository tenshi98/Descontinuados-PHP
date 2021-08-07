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
/*                                                    Realizo las consultas                                                       */
/**********************************************************************************************************************************/
	//Guardar la carrera cancelada
		$a = "'".hora_actual()."'" ;
		$query  = "UPDATE `solicitud_taxi_listado` SET Estado='40', Hora_Cancel = {$a} WHERE idSolicitud = '{$_GET['mensaje']}'";
		$result = mysql_query($query, $dbConn);
/**********************************************************************************************************************************/
/*                                          Busco los datos del cliente y envio mensaje                                           */
/**********************************************************************************************************************************/
// Se traen los datos de la solicitud
$query = "SELECT  
cliente.Nombre,
cliente.Apellido_Paterno,
taxista.Gsm,
taxista.dispositivo
FROM `solicitud_taxi_listado`
LEFT JOIN clientes_listado cliente ON cliente.idCliente = solicitud_taxi_listado.idCliente
LEFT JOIN clientes_listado taxista ON taxista.idCliente = solicitud_taxi_listado.idTaxista
WHERE solicitud_taxi_listado.idSolicitud = '{$_GET['mensaje']}'";
$resultado = mysql_query ($query, $dbConn);
$row_datos = mysql_fetch_assoc ($resultado);

// Se arma el mensaje
$msj =  $row_datos['Nombre'].' '. $row_datos['Apellido_Paterno'].' ha cancelado la carrera';
$ultimo_id = $_GET['idSolicitud'];

		//Envio del mensaje
		$reg_id = $row_datos['Gsm'];
		//Verifico el tipo de dispositivo
		if($row_datos['dispositivo']=='android'){
			//Envio el mensaje por android
			gcmnoti(  $reg_id, $msj, $ultimo_id );
		} elseif($row_datos['dispositivo']=='iphone') {
			//Envio el mensaje por iphone
			iosnoti(  $reg_id, $msj );
		}		
?>