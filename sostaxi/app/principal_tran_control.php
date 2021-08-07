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
/*                                  Identifico quien estaba conduciendo y obtengo sus datos                                       */
/**********************************************************************************************************************************/
// Se traen los datos del bus
$query = "SELECT  idConductor 
FROM `clientes_listado`
WHERE idCliente = {$_GET['idCliente']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
/**********************************************************************************************************************************/
/*                                   Identifico quien envio la alerta y obtengo sus datos                                         */
/**********************************************************************************************************************************/

		//Datos
        $a  = "'".$_GET['idCliente']."'" ;
        $a .= ",'".$_GET['idRecorrido']."'" ;
		$a .= ",'".$_GET['idRuta']."'" ;
		$a .= ",'".$_GET['Latitud']."'" ;
		$a .= ",'".$_GET['Longitud']."'" ;
		$a .= ",'".fecha_actual()."'" ;
		$a .= ",'".hora_actual()."'" ;
		$a .= ",'".$rowdata['idConductor']."'" ;
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `transantiago_historico` (idCliente, idRecorrido, idRuta, Latitud, Longitud, Fecha, Hora, idConductor) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);

?>
				