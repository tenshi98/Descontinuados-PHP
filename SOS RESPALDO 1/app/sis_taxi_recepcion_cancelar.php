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
//Recojo las variables
		$xy = '';
		$xy .= $_GET['idSolicitud'];
		$xy .= '3xyzxyz3'.$_GET['Gsm_code'];
		$xy .= '3xyzxyz3'.$_GET['Disp_code'];

		//Ejecutamos comando dentro del servidor
		/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_taxi_5.php?mensaje= '".$xy."' &";
		$fp = shell_exec($command);*/
		
echo 'BORRAME Y ACTIVA CONSULTAS POR SERVER';
echo '===========================================================================================================================';
		$query  = "UPDATE `solicitud_taxi_listado` SET Estado='39' WHERE idSolicitud = '{$_GET['idSolicitud']}'";
$result = mysql_query($query, $dbConn);
/**********************************************************************************************************************************/
/*                                          Busco los datos del cliente y envio mensaje                                           */
/**********************************************************************************************************************************/
// Se arma el mensaje
$msj =  'Se ha rechazado tu solicitud de taxi';
$ultimo_id = rand(1, 1500);

		//Envio del mensaje
		$reg_id = $_GET['Gsm_code'];
		//Verifico el tipo de dispositivo
		if($_GET['Disp_code']=='android'){
			//Envio el mensaje por android
			gcmnoti(  $reg_id, $msj, $ultimo_id );
		} else {
			//Envio el mensaje por iphone
			iosnoti(  $reg_id, $msj );
		}	
echo '===========================================================================================================================';


	//redirijo a la pagina principal
	header( 'Location: '.$location );
	die;

			
?>