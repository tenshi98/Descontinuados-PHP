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
	//obtengo el listado de las profesiones
	$arrProf = array();
	$query = "SELECT Nombre
	FROM `clientes_profesiones` 
	ORDER BY Nombre ASC";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrProf,$row );
	}
	//obtengo el listado de los sexos
	$arrSex = array();
	$query = "SELECT Nombre
	FROM `clientes_sexo` 
	ORDER BY Nombre ASC";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrSex,$row );
	}
	
	$response["error"] = FALSE;
	//escrivo los datos
    $i=0;
    foreach ($arrProf as $profesion) {
		$response["profesiones"][$i]["Nombre"]   = $profesion["Nombre"];
		$i++;
	}
	$i=0;
    foreach ($arrSex as $sexo) {
		$response["sexo"][$i]["Nombre"]   = $sexo["Nombre"];
		$i++;
	}
		
	echo json_encode($response);

?>
