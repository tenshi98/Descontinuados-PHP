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


	/*********************************************************************/
    /*                           Importar Zonas                          */
    /*********************************************************************/
	//obtengo el listado con las zonas
	$arrOfertas = array();
	$query = "SELECT idOfertasDia, Titulo, Descripcion, Valor, Direccion_img
	FROM `ofertas_diarias` 
	WHERE Direccion_img!=''
	ORDER BY Titulo ASC";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrOfertas,$row );
	}
	
	//obtengo el listado de las zonas peligrosas
    $i=0;
    foreach ($arrOfertas as $ofertas) {
		$response[$i]["id"]            = $ofertas["idOfertasDia"];
		$response[$i]["titulo"]        = $ofertas["Titulo"];
		$response[$i]["descripcion"]   = $ofertas["Descripcion"];
		$response[$i]["valor"]         = $ofertas["Valor"];
		$response[$i]["imagen"]        = $ofertas["Direccion_img"];
		$i++;
	}
		
	echo json_encode($response);

?>
