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
$dbConn   = conectar();
/**********************************************************************************************************************************/
/*                                   Identifico quien envio la alerta y obtengo sus datos                                         */
/**********************************************************************************************************************************/
$query = "UPDATE clientes_listado SET 
idConductor   = 0,
idDisponibilidad = 2
WHERE idCliente='{$_GET['id']}'";
$resultado = mysql_query($query,$dbConn);	
?>