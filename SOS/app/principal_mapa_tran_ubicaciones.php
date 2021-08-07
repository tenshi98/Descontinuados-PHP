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
// Se trae un listado de todos los buses del recorrido
$arrPosiciones = array();
$query = "SELECT  
clientes_listado.Latitud, 
clientes_listado.Longitud, 
clientes_listado.Orden, 
clientes_listado.idRuta

FROM `clientes_listado`
LEFT JOIN `transantiago_recorridos` ON transantiago_recorridos.idRecorrido = clientes_listado.idRecorrido
WHERE transantiago_recorridos.Nombre='{$_GET['idRecorrido']}'  AND clientes_listado.idDisponibilidad=1
ORDER BY Orden ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrPosiciones,$row );
}
?>
<script>
var locations = [ 
<?php 
$ordenx=1;
foreach ( $arrPosiciones as $pos ) { ?>
	['<?php echo $ordenx; ?>', <?php echo $pos['Latitud']; ?>, <?php echo $pos['Longitud']; ?>, '<?php echo $pos['idRuta']; ?>'], 					
<?php 
$ordenx++;
} ?>
];
</script>