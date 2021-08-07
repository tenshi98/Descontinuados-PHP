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
// obtengo puntero de conexion con la db
$dbConn   = conectar();
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Se traen los datos del usuario
$query = "SELECT Informacion
FROM `productos_listado`
WHERE idProducto = '".$_GET['idProducto']."'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc($resultado);

//imprimo los datos
echo '<h1>Informacion Nutricional</h1>';
echo '<div class="receta_content">';
if(isset($row_data['Informacion']) && $row_data['Informacion']!=''){
	echo $row_data['Informacion'];
}else{
	echo '<p>no existen datos relacionados para este producto</p>';
}
echo '</div>';


?>




