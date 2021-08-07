<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
// si no hay errores ejecuto el codigo
	$videochat  = $_GET['activate'];
	$idUsuario  = $_GET['idUsuario'];
	$estado_chat  = $_GET['estado_chat'];
	
	// inserto los datos de registro en la db
	$query  = "UPDATE `usuarios_listado` SET videochat=".$videochat.", Estado_chat=".$estado_chat." WHERE idUsuario = '$idUsuario'";
	$result = mysql_query($query, $dbConn);	

  
 ?>