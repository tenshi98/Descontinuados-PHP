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
$query = "SELECT idSorteo FROM `solicitud_taxi_sorteo` WHERE idTaxista={$_GET['idCliente']} AND Estado='1' ";
$resultado = mysql_query ($query, $dbConn);
$row_clientes = mysql_fetch_assoc ($resultado);

?>
<script type="text/javaScript">
	var jconsulta  = <?php echo $row_clientes['idSorteo']; ?>;
</script>
