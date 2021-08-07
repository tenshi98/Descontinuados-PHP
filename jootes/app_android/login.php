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
if (isset($_POST['email']) && isset($_POST['password'])) {
	
	// Recibo los datos a traves de post
    $email        = $_POST['email'];
    $password     = $_POST['password'];
    $dispositivo  = $_POST['dispositivo'];
    $IMEI         = $_POST['IMEI'];
    $GSM          = $_POST['GSM'];
    

    //Encripto la clave
    $password = md5($password);
    
    /*********************************************************************/
    /*                              Usuario                              */
    /*********************************************************************/
    //busco los datos en la base de datos
	$query = "SELECT idCliente, idEstado, email, Nombre, Rut, fNacimiento, Direccion, Fono1, Fono2, Departamento, Provincia, 
	Distrito, fcreacion, factualizacion, Saldo, Sexo, Edad
	FROM clientes_listado 
	WHERE email = '{$email}' AND password = '{$password}'";
	$resultado = mysql_query ($query, $dbConn);
	$row_data = mysql_fetch_assoc ($resultado);
	
	//Actualizo los datos del usuario al loguearse
	if (isset($row_data)&&$row_data!='') {
		
		$a = "idCliente='".$row_data['idCliente']."'" ;
		if(isset($dispositivo) && $dispositivo != ''){   $a .= ",dispositivo='".$dispositivo."'" ;}
		if(isset($IMEI) && $IMEI != ''){                 $a .= ",IMEI='".$IMEI."'" ;}
		if(isset($GSM) && $GSM != ''){                   $a .= ",GSM='".$GSM."'" ;}
					
		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '{$row_data['idCliente']}'";
		$result = mysql_query($query, $dbConn);	
	}
	

	//Si el usuario existe y esta activo
    if (isset($row_data)&&$row_data!=''&&$row_data["idEstado"]==1) {
        $response["error"] = FALSE;
        
        //obtengo los datos personales
        $response["user"]["idCliente"]      = $row_data["idCliente"];
        $response["user"]["email"]          = $row_data["email"];
        $response["user"]["Nombre"]         = $row_data["Nombre"];
        $response["user"]["Rut"]            = $row_data["Rut"];
        $response["user"]["fNacimiento"]    = $row_data["fNacimiento"];
        $response["user"]["Direccion"]      = $row_data["Direccion"];
        $response["user"]["Fono1"]          = $row_data["Fono1"];
        $response["user"]["Fono2"]          = $row_data["Fono2"];
        $response["user"]["Departamento"]   = $row_data["Departamento"];
        $response["user"]["Provincia"]      = $row_data["Provincia"];
        $response["user"]["Distrito"]       = $row_data["Distrito"];
        $response["user"]["fcreacion"]      = $row_data["fcreacion"];
        $response["user"]["factualizacion"] = $row_data["factualizacion"];
        $response["user"]["Saldo"]          = $row_data["Saldo"];
        $response["user"]["Sexo"]           = $row_data["Sexo"];
        $response["user"]["Edad"]           = $row_data["Edad"];
        
        
		
        echo json_encode($response);
    //Si el usuario existe y esta inactivo
    } elseif (isset($row_data)&&$row_data!=''&&$row_data["idEstado"]==2) {
		$response["error"] = TRUE;
        $response["error_msg"] = "Su usuario se encuentra inactivo, favor de contactar con el administrador";
        echo json_encode($response);
    //Si no hay datos envio mensaje de error
    } else {
        $response["error"] = TRUE;
        $response["error_msg"] = "Email o contraseña erroneos, intentelo nuevamente";
        echo json_encode($response);
    }
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Email o contraseña requeridos no han sido ingresados";
    echo json_encode($response);
}


?>
