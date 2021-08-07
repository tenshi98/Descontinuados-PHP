<?php 
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
// obtengo los datos enviados desde la aplicacion
$imei = $_REQUEST['imei'];
/**********************************************************************************************************************************/
/*                                                     Base de datos                                                              */
/**********************************************************************************************************************************/
// Consulto todos los telefonos de los usuarios que estan como contactos
$arrFonos = array();
$query = "SELECT clientes_contacto_amigos.Fono
FROM `clientes_contacto_amigos` 
INNER JOIN `clientes_listado` ON clientes_listado.idCliente = clientes_contacto_amigos.idCliente
WHERE clientes_listado.Imei = ".$imei;
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrFonos,$row );
}

$digitos='0';
foreach ($arrFonos as $fonos) { 
 $digitos.=','.$fonos['Fono'];
}
echo $digitos;
?>
