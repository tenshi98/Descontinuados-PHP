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
list($idSolicitud, $Gsm_code, $Disp_code) =   split("3xyzxyz3", $_GET['mensaje'], 3);
/**********************************************************************************************************************************/
/*                                                    Realizo las consultas                                                       */
/**********************************************************************************************************************************/
$query  = "UPDATE `solicitud_taxi_listado` SET Estado='39' WHERE idSolicitud = '{$idSolicitud}'";
$result = mysql_query($query, $dbConn);	
/**********************************************************************************************************************************/
/*                                                        Envio el mensaje                                                        */
/**********************************************************************************************************************************/		
	// Se arma el mensaje
$msj =  'Se ha rechazado tu solicitud de taxi';
$ultimo_id = rand(1, 1500);

		//Envio del mensaje
		$reg_id = $Gsm_code;
		//Verifico el tipo de dispositivo
		if($Disp_code=='android'){
			//Envio el mensaje por android
			gcmnoti(  $reg_id, $msj, $ultimo_id );
		} else {
			//Envio el mensaje por iphone
			iosnoti(  $reg_id, $msj );
		}	
	
?>