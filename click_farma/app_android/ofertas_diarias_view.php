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

// variable de error activa
$response = array("error" => TRUE);

//Compruebo si recibi los datos
if (isset($_POST['idOfertasDia']) ) {
	
	// Recibo los datos a traves de post
    $idOfertasDia        = $_POST['idOfertasDia'];
    
    
	/*********************************************************************/
    /*                           Importar Zonas                          */
    /*********************************************************************/
	//obtengo el listado con las zonas
	$query = "SELECT Titulo, Descripcion, Valor, Direccion_img
	FROM `ofertas_diarias` 
	WHERE idOfertasDia='{$idOfertasDia}' ";
	$resultado = mysql_query ($query, $dbConn);
	$row_data = mysql_fetch_assoc ($resultado);
	
	
	//Si el usuario existe y esta activo
    if (isset($row_data)&&$row_data!='') {
        
        $response["error"] = FALSE;
        
        //obtengo los datos
		$response["oferta"]["Titulo"]        = $row_data["Titulo"];
		$response["oferta"]["Descripcion"]   = $row_data["Descripcion"];
		$response["oferta"]["Valor"]         = $row_data["Valor"];
		$response["oferta"]["Direccion_img"] = $row_data["Direccion_img"];
		
		
        	
		echo json_encode($response);
        
    //Si no hay datos envio mensaje de error
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Datos Erroneos, intentelo nuevamente";
        echo json_encode($response);
    }
	
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Datos requeridos no han sido ingresados";
    echo json_encode($response);
}	
	

?>
