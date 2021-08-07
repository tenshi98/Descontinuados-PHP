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
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/app_functions.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                                        Aplicacion                                                              */
/**********************************************************************************************************************************/    

	//obtengo el listado con las zonas
	$arrVida = array();
	$query = "SELECT idCategoria, Nombre
	FROM `vademecum_categoria` 
	ORDER BY Nombre ASC";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrVida,$row );
	}
	
	//obtengo el listado de las zonas peligrosas
    $i=0;
    foreach ($arrVida as $vida) {
		$response[$i]["id"]        = $vida["idCategoria"];
		$response[$i]["nombre"]    = $vida["Nombre"];
		$i++;
	}
		
	echo json_encode($response);

?>
