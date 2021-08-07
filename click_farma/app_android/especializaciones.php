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
	$arrEspec = array();
	$query = "SELECT Nombre
	FROM `medicos_especialidades` 
	ORDER BY Nombre ASC";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrEspec,$row );
	}
	
	$response["error"] = FALSE;
	//obtengo el listado de las zonas peligrosas
    $i=0;
    foreach ($arrEspec as $especializaciones) {
		$response["espec"][$i]["Nombre"]   = $especializaciones["Nombre"];
		$i++;
	}
		
	echo json_encode($response);

?>
