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
// Se traen los datos del bus
$query = "SELECT  Gsm, Latitud, Longitud, idConductor 
FROM `clientes_listado`
WHERE idCliente = {$_GET['idCliente']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
	
/**********************************************************************************************************************************/
/*                                    Se toma la alerta y se guarda en la base de datos                                           */
/**********************************************************************************************************************************/
//Se guarda la alerta
$a = "'".$_GET['idCliente']."'" ;
$a .= ",'".$rowdata['idConductor']."'" ;
$a .= ",'".$_GET['idTipoAlerta']."'" ;
$a .= ",'".fecha_actual()."'" ;
$a .= ",'".hora_actual()."'" ;
$a .= ",'".$rowdata['Longitud']."'" ;
$a .= ",'".$rowdata['Latitud']."'" ;
$a .= ",'".$rowdata['Gsm']."'" ;
$a .= ",'".$_GET['desplegar']."'" ;
$query  = "INSERT INTO `alertas_listado` (idCliente, idConductor, idTipoAlerta, Fecha, Hora, Longitud, Latitud, Gsm, desplegar) VALUES ({$a} )";
$result = mysql_query($query, $dbConn);
	
?>