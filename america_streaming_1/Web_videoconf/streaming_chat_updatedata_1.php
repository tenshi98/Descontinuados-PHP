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

// obtengo puntero de conexion con la db
$dbConn = conectar();

		// Actualizo la identificacion de video del usuario
		$query  = "UPDATE `rooms_listado` SET var_room='".$_GET['room']."', idchat = '".$_GET['id']."' WHERE idRoom = '".$_GET['r']."'";
		$result = mysql_query($query, $dbConn);
		
	

	
?>