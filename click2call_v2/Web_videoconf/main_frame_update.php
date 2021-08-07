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
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                      Se filtran las entradas para evitar ataques                                               */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                               Consulta a la base de datos                                                      */
/**********************************************************************************************************************************/
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT idUsuario, Nombre, idvideochat, idchat
FROM `usuarios_listado`
WHERE videochat=1 AND idvideochat!='' AND Estado_chat=1";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<h2>Listado de ejecutivos</h2>
<ul>
	<?php foreach ($arrUsers as $usuarios) { ?>
		<input type="hidden" id="callto-id_<?php echo $usuarios['idUsuario']; ?>" value="<?php echo $usuarios['idvideochat']; ?>">
		<input type="hidden" id="msgto-id_<?php echo $usuarios['idUsuario']; ?>" value="<?php echo $usuarios['idchat']; ?>">
		<li><a href="#" id="make-call_<?php echo $usuarios['idUsuario']; ?>"><?php echo $usuarios['Nombre']; ?></a></li> 
	<?php } ?>
</ul>