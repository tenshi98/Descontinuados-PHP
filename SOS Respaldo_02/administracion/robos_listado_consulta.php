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
//Verifico el tipo de usuario que esta ingresando
if($_GET['typeuser']==0){
	$z=" AND clientes_listado.idTipoCliente>=0";	
}else{
	$z=" AND clientes_listado.idTipoCliente={$_GET['typeuser']}";	
}
$query = "SELECT 
robos_listado.idRobo
FROM `robos_listado`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = robos_listado.idCliente
WHERE robos_listado.vista='0' AND desplegar='1' ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);

?>
<script type="text/javaScript">
	var jconsulta  = <?php echo $cuenta_registros; ?>;
</script>