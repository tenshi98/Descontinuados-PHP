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

//Se toman los parametros
	if ( !empty($_POST['idSolicitud']) )          $idSolicitud          = $_POST['idSolicitud'];
	if ( !empty($_POST['minutos']) )              $minutos              = $_POST['minutos'];


//Se validan los datos
	if ( empty($idSolicitud) )              $errors[1] 	  = 'error';
	if ( empty($minutos) )                  $errors[2] 	  = 'error';

// si no hay errores ejecuto el codigo	
	if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])   ) {
		
	//Recojo las variables
		$xy = '';
		$xy .= $idSolicitud;
		$xy .= '3xyzxyz3'.$minutos;

		//Ejecutamos comando dentro del servidor
		/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_taxi_6.php?mensaje= '".$xy."' &";
		$fp = shell_exec($command);*/
		
echo 'BORRAME Y ACTIVA CONSULTAS POR SERVER';
echo '===========================================================================================================================';
		//Actualizo la vista de las alarmas
		$query  = "UPDATE `solicitud_taxi_listado` SET minutos='{$minutos}', Estado='41' WHERE idSolicitud = '{$idSolicitud}'";
		$result = mysql_query($query, $dbConn);
echo '===========================================================================================================================';	




		
	
		header( 'Location: '.$location );
		die;
	
	}
?>