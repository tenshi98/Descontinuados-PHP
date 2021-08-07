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
if (isset($_POST['idCliente']) ) {
	
	// Recibo los datos a traves de post
    $idCliente        = $_POST['idCliente'];

	//Busco la ubicacion actual de mi contacto
	$query = "SELECT Latitud, Longitud,factualizacion
	FROM `clientes_listado`
	WHERE idCliente = '{$idCliente}' ";
	$resultado = mysql_query ($query, $dbConn);
	$row_data = mysql_fetch_assoc ($resultado);
	
	//verifico que efectivamente tenga contactos
	if(isset($row_data)&&$row_data!=''){
		
		//imprimo los datos
		$response["error"] = FALSE;
		$response["Latitud"]   = $row_data["Latitud"];
		$response["Longitud"]  = $row_data["Longitud"];
		$response["Fecha"]  = $row_data["factualizacion"];
		echo json_encode($response);
	}else{
		$response["error"] = TRUE;
		$response["error_msg"] = "No hay datos relacionados".$idCliente;
		echo json_encode($response);	
	}
    
    
  
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Usuario no identificado";
    echo json_encode($response);
}


?>
