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
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/config3.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
// si no hay errores ejecuto el codigo
	$idUsuario  = $arrUsuario['idUsuario'];
	$location   = 'index.php?salir=true';
	// inserto los datos de registro en la db
	$query  = "UPDATE `usuarios_listado` SET videochat=2, Estado_chat=1 WHERE idUsuario = '$idUsuario'";
	$result = mysql_query($query, $dbConn);
	
	header( 'Location: '.$location );
	die;	

  
 ?>