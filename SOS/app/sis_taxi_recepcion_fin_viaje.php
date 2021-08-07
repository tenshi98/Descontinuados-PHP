<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************************************************************************************************************/
/*                                                          Ejecuto Codigo                                                        */
/**********************************************************************************************************************************/

		//Verifico que las tareas del servidor estan activas
		if($rowempresa['tareasServer']==1){
			//Recojo las variables
			$xy = '';
			$xy .= $_GET['idSolicitud'];
			$xy .= '3xyzxyz3'.$arrCliente['idCliente'];
	
			//Ejecutamos comando dentro del servidor
			$command = "/usr/bin/wget -N -q ".$rowempresa['UrlApp']."tareas_taxi_8.php?mensaje= '".$xy."' &";
			$fp = shell_exec($command);
		
		}elseif($rowempresa['tareasServer']==2){
			// Se trae la ubicacion actual del taxista 
			$query = "SELECT  
			taxista.Latitud,
			taxista.Longitud
			FROM `solicitud_taxi_listado`
			LEFT JOIN clientes_listado taxista ON taxista.idCliente = solicitud_taxi_listado.idTaxista
			WHERE solicitud_taxi_listado.idSolicitud = '{$_GET['idSolicitud']}'";
			$resultado = mysql_query ($query, $dbConn);
			$row_datos = mysql_fetch_assoc ($resultado);
			
			//Actualizo los datos 
			$query  = "UPDATE `solicitud_taxi_listado` SET Estado='44', CarreraFinalizada_Latitud = '{$row_datos['Latitud']}', CarreraFinalizada_Longitud =  '{$row_datos['Longitud']}' WHERE idSolicitud = '{$_GET['idSolicitud']}'";
			$result = mysql_query($query, $dbConn);
			
			//Cambia el estado del taxista a disponible
			$query  = "UPDATE `clientes_listado` SET Alarma='Si', EstadoCarrera='45' WHERE idCliente = '{$arrCliente['idCliente']}'";
			$result = mysql_query($query, $dbConn);	
		}
		

	//redirijo a la pagina principal
	header( 'Location: '.$location );
	die;
			
?>