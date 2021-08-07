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
$query = "SELECT  Latitud, Longitud, Orden, PPU
FROM `clientes_listado`
WHERE idRecorrido={$_GET['idrecorrido']} AND idRuta={$_GET['idruta']}
ORDER BY Orden ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrPosiciones,$row );
}?>
<script>
var locations = [ 
<?php foreach ( $arrPosiciones as $pos ) { ?>
	['<?php echo $pos['Orden']; ?>', <?php echo $pos['Latitud']; ?>, <?php echo $pos['Longitud']; ?>, '<?php echo $pos['PPU']; ?>'], 					
<?php } ?>
];
</script>