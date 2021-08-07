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
		
		//Verifico que las tareas del servidor estan activas
		if($rowempresa['tareasServer']==1){
			//Recojo las variables
			$xy = '';
			$xy .= $_GET['cancelcarrera'];
			//Ejecutamos comando dentro del servidor
			$command = "/usr/bin/wget -N -q ".$rowempresa['UrlApp']."tareas_taxi_3.php?mensaje= '".$xy."' &";
			$fp = shell_exec($command);
		}elseif($rowempresa['tareasServer']==2){
			//Guardar la carrera cancelada
			$a = "'".hora_actual()."'" ;
			$query  = "UPDATE `solicitud_taxi_listado` SET Estado='40', Hora_Cancel = {$a} WHERE idSolicitud = '{$_GET['cancelcarrera']}'";
			$result = mysql_query($query, $dbConn);	
		}
		
		//Redirijo a la pagina de espera de respuesta
		header( 'Location: '.$location );
		die;
	
?>