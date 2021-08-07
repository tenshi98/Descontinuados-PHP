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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once 'core/config_app.php';
require_once 'core/datos_empresa.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
/**********************************************************************************************************************************/
/*                                                  Ejecuto las tareas asignadas                                                  */
/**********************************************************************************************************************************/
//Ubico la tarea correcta
switch ($_GET['tarea']) {
	//Alertas normales
    case 1:
		//Recojo las variables
		$xy = '';
		$xy .= $_GET['idTipoAlerta'];
		$xy .= '3xyzxyz3'.$_GET['cercanos'];
		$xy .= '3xyzxyz3'.$_GET['contactar'];
		$xy .= '3xyzxyz3'.$_GET['desplegar'];
		$xy .= '3xyzxyz3'.$_GET['idCliente'];
		$xy .= '3xyzxyz3'.$_GET['latitud'];
		$xy .= '3xyzxyz3'.$_GET['longitud'];
		$xy .= '3xyzxyz3'.$_GET['GSM'];
		$xy .= '3xyzxyz3'.$config_app['comport_client'];
		//Ejecutamos comando dentro del servidor
		/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_alertas.php?mensaje= '".$xy."' &";
		$fp = shell_exec($command);*/
		
		//Testeo de funcionamiento
		header( 'Location: tareas_alertas.php?mensaje='.$xy );
		die;
        break;
	
	
	//Robos	de vehiculo
    case 2:
		//Recojo las variables
		$xy = '';
		$xy .= $_GET['idTipoAlerta'];
		$xy .= '3xyzxyz3'.$_GET['cercanos'];
		$xy .= '3xyzxyz3'.$_GET['contactar'];
		$xy .= '3xyzxyz3'.$_GET['desplegar'];
		$xy .= '3xyzxyz3'.$_GET['idCliente'];
		$xy .= '3xyzxyz3'.$_GET['latitud'];
		$xy .= '3xyzxyz3'.$_GET['longitud'];
		$xy .= '3xyzxyz3'.$_GET['GSM'];
		$xy .= '3xyzxyz3'.$config_app['comport_client'];
		$xy .= '3xyzxyz3'.$_GET['idVehiculo'];
		//Ejecutamos comando dentro del servidor
		/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_robo_vehiculo.php?mensaje= '".$xy."' &";
		$fp = shell_exec($command);*/
		
		//Testeo de funcionamiento
		header( 'Location: tareas_robo_vehiculo.php?mensaje='.$xy );
		die;
        break;
	
	
	//Robos	de vehiculo
    case 3:
		//Recojo las variables
		$xy = '';
		$xy .= $_GET['idCliente'];
		$xy .= '3xyzxyz3'.$_GET['idRobo'];
		$xy .= '3xyzxyz3'.$_GET['latitud'];
		$xy .= '3xyzxyz3'.$_GET['longitud'];
		$xy .= '3xyzxyz3'.$_GET['idAsaltado'];
		//Ejecutamos comando dentro del servidor
		/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_robo_vehiculo_visto.php?mensaje= '".$xy."' &";
		$fp = shell_exec($command);*/
		
		//Testeo de funcionamiento
		header( 'Location: tareas_robo_vehiculo_visto.php?mensaje='.$xy );
		die;
        break;
		
	//Aviso solicitud Taxi
    case 4:
		//Recojo las variables
		$xy = '';
		$xy .= $_GET['confirm'];
		//Ejecutamos comando dentro del servidor
		/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_robo_vehiculo_visto.php?mensaje= '".$xy."' &";
		$fp = shell_exec($command);*/
		
	
		//Testeo de funcionamiento
		//header( 'Location: tareas_robo_vehiculo_visto.php?mensaje='.$xy );
		//die;
        break;		
}
	//Redirecciono
	//header( 'Location: principal.php'.$w );
	//die;
?>