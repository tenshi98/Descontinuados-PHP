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


$sql = "SELECT 
COUNT(clientes_notificaciones.idNotificacion) AS numero
FROM `clientes_notificaciones`
LEFT JOIN `clientes_listado`     ON clientes_listado.idCliente     = clientes_notificaciones.idRecibidor
WHERE clientes_listado.Imei='".$imei."' 
AND  clientes_notificaciones.Leida = 7";
$resultado = mysql_query($sql,$dbConn);
$rowusr = mysql_fetch_array($resultado);
echo $rowusr["numero"];
?>
