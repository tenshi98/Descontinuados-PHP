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
$dbConn   = conectar();
/**********************************************************************************************************************************/
/*                                  Se obtienen los datos para realizar la actualizacion                                          */
/**********************************************************************************************************************************/
$imei         = $_REQUEST['imei'];
$longitud     = $_REQUEST['long'];
$latitud      = $_REQUEST['lati'];

$sql = "UPDATE clientes_listado
SET Longitud=".$longitud.", Latitud=".$latitud."
WHERE Imei='".$imei."'";
$resultado = mysql_query($sql,$dbConn);

?>
