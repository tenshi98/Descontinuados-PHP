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
if (isset($_POST['Rango']) && isset($_POST['Sexo'])&& isset($_POST['idCliente'])) {
	
	// Recibo los datos a traves de post
    $Rango       = $_POST['Rango'];
    $Sexo        = $_POST['Sexo'];
    $idCliente   = $_POST['idCliente'];
    
    
    //Verifico que el resultado no sea yo mismo
	$z="WHERE idCliente<>'".$idCliente."'";
	//Verifico el rango de edad
	switch ($Rango) {
		case 'de 18 a 25':
			$z .= " AND Edad BETWEEN '18' AND '25'" ;
			break;
		case 'de 26 a 35':
			$z .= " AND Edad BETWEEN '26' AND '35'" ;
			break;
		case 'de 36 a 45':
			$z .= " AND Edad BETWEEN '36' AND '45'" ;
			break;
		case 'de 46 a mas':
			$z .= " AND Edad > 46" ;
			break;
	}
	//verifico el sexo
	$z .= " AND Sexo = '".$Sexo."'" ;
	

	//Realizo la consulta	
	$query="SELECT 
	Nombre, idCliente, Fono1
	FROM clientes_listado 
	".$z."	
	ORDER BY RAND() 
	LIMIT 1";		  
	$resultado = mysql_query ($query, $dbConn);
	$row_data = mysql_fetch_assoc ($resultado);


	
	
    //Si el usuario existe y esta inactivo
    if (isset($row_data)&&$row_data!='') {
		$response["error"] = FALSE;
        $response["user"]["Nombre"] = $row_data["Nombre"];
        $response["user"]["idContacto"] = $row_data["idCliente"];
        $response["user"]["fonoContacto"] = $row_data["Fono1"];
        
        echo json_encode($response);
    //Si no hay datos envio mensaje de error
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "No se han encontrado personas";
        echo json_encode($response);
    }
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Datos requeridos no han sido ingresados";
    echo json_encode($response);
}


?>
