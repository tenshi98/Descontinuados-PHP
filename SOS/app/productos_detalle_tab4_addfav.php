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
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/config_app.php';
require_once 'core/mobile_components.php';
/**********************************************************************************************************************************/
//primero consulto si el producto ya es favorito
$idProducto  = $_GET['idProducto'];
$idCliente   = $_GET['idCliente'];
//Se traen los datos del usuario
$query = "SELECT idFavorito
FROM `productos_favoritos`
WHERE idProducto = '".$idProducto."' AND idCliente = '".$idCliente."'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_num_rows($resultado);
//en caso de que no exista guardo el producto
if($row_data==0){
	// inserto los datos de registro en la db
	if(isset($idProducto) && $idProducto != ''){ $a = "'".$idProducto."'" ;    }else{$a ="''";}
	if(isset($idCliente) && $idCliente != ''){   $a .= ",'".$idCliente."'" ;   }else{$a .= ",''";}
				
	$query  = "INSERT INTO `productos_favoritos` (idProducto, idCliente) VALUES ({$a} )";
	$result = mysql_query($query, $dbConn);
	
	echo '<h1>Producto guardado en favoritos</h1>';
	echo link_btn_java('enlace','cargar(4)','volver','',$config_app);
}else{

	echo '<h1>Producto ya existe en favoritos</h1>';
	echo link_btn_java('enlace','cargar(4)','volver','',$config_app);
	
}
?>







