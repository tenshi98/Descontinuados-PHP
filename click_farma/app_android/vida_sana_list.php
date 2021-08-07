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

//Compruebo si recibi los datos
if (isset($_GET['cat']) ) {
	
	// Recibo los datos a traves de post
    $cat        = $_GET['cat'];
    
    
    //obtengo el listado con las zonas
	$arrVida = array();
	$query = "SELECT idVidaSana, Titulo
	FROM `vidasana_listado`
	WHERE idCategoria = '{$cat}' 
	ORDER BY Titulo ASC";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrVida,$row );
	}
	
	//obtengo el listado de las zonas peligrosas
    $i=0;
    foreach ($arrVida as $vida) {
		$response[$i]["id"]        = $vida["idVidaSana"];
		$response[$i]["titulo"]    = $vida["Titulo"];
		$i++;
	}
		
	echo json_encode($response);
	
	
	
	
	
	
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Email o contraseña requeridos no han sido ingresados";
    echo json_encode($response);
}	
	

?>
