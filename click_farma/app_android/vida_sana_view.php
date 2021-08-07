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
if (isset($_POST['idVidaSana']) ) {
	
	// Recibo los datos a traves de post
    $idVidaSana        = $_POST['idVidaSana'];
    
    
	/*********************************************************************/
    /*                           Importar Zonas                          */
    /*********************************************************************/
	//obtengo el listado con las zonas
	$query = "SELECT 
	vidasana_listado.Titulo,
	vidasana_listado.Descripcion,
	vidasana_categoria.Nombre AS Categoria
	
	FROM `vidasana_listado`
	LEFT JOIN `vidasana_categoria`   ON vidasana_categoria.idCategoria  = vidasana_listado.idCategoria
	WHERE vidasana_listado.idVidaSana='{$idVidaSana}' ";
	$resultado = mysql_query ($query, $dbConn);
	$row_data = mysql_fetch_assoc ($resultado);
	
	
	//Si el usuario existe y esta activo
    if (isset($row_data)&&$row_data!='') {
        
        $response["error"] = FALSE;
        
        //obtengo los datos
		$response["list"]["Titulo"]        = $row_data["Titulo"];
		$response["list"]["Descripcion"]   = $row_data["Descripcion"];
		$response["list"]["Categoria"]     = $row_data["Categoria"];
	
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
