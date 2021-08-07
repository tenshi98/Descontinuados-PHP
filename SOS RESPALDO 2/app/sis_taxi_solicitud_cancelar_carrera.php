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
		
		//Recojo las variables
		$xy = '';
		$xy .= $_GET['cancelcarrera'];

		//Ejecutamos comando dentro del servidor
		/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_taxi_3.php?mensaje= '".$xy."' &";
		$fp = shell_exec($command);*/
		
echo 'BORRAME Y ACTIVA CONSULTAS POR SERVER';
echo '===========================================================================================================================';
		//Guardar la carrera cancelada
		$a = "'".hora_actual()."'" ;
		$query  = "UPDATE `solicitud_taxi_listado` SET Estado='40', Hora_Cancel = {$a} WHERE idSolicitud = '{$_GET['cancelcarrera']}'";
		$result = mysql_query($query, $dbConn);
echo '===========================================================================================================================';	


		
		
		
		//Redirijo a la pagina de espera de respuesta
		header( 'Location: '.$location );
		die;
	
?>