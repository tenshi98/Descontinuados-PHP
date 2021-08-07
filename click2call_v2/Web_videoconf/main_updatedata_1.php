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
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                       Se traen los datos que nos interesan                                                     */
/**********************************************************************************************************************************/

	$activate     = $_GET['activate'];
	$idUsuario    = $_GET['user'];
	
	// inserto los datos de registro en la db
	$query  = "UPDATE `usuarios_listado` SET Estado_chat=".$activate."  WHERE idUsuario = '$idUsuario'";
	$result = mysql_query($query, $dbConn);
	
	
?>
