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
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                       Se traen los datos que nos interesan                                                     */
/**********************************************************************************************************************************/
$query = "SELECT idAlerta FROM `alertas_listado` WHERE vista='0' AND desplegar='1' ";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);

?>
<script type="text/javaScript">
	var jconsulta  = <?php echo $cuenta_registros; ?>;
</script>