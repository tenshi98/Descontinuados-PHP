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
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                       Se traen los datos que nos interesan                                                     */
/**********************************************************************************************************************************/

	$idUsuario      = $_GET['idUsuario'];
	$Fecha          = fecha_actual();
	$Hora           = hora_actual();
	$Estado         = $_GET['Estado'];
	$Direccion_IP   = $_GET['Direccion_IP'];
	
	$a  = "'".$idUsuario."'" ;
	$a .= ",'".$Fecha."'" ;
	$a .= ",'".$Hora."'" ;
	$a .= ",'".$Estado."'" ;
	$a .= ",'".$Direccion_IP."'" ;
	
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `usuarios_llamadas` (idUsuario, Fecha, Hora, Estado, Direccion_IP) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
	
	
?>
