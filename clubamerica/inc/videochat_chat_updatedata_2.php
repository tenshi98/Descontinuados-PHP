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
//require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
	
$query = "SELECT idchat FROM `user_listado` WHERE var_room = '".$_GET['var_room']."' AND idvideo = '".$_GET['idvideo']."' AND idchat!=''";
$registros = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($registros);
echo $rowdata['idchat'];

?>