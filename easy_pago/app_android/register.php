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
if (isset($_POST['Nombre']) && isset($_POST['email']) && isset($_POST['password'])) {
	
    // Recibo los datos a traves de post
    $email     = $_POST['email'];
    
	//busco los datos en la base de datos
	$query = "SELECT email
	FROM clientes_listado 
	WHERE email = '{$email}' ";
	$resultado = mysql_query ($query, $dbConn);
	$row_data = mysql_fetch_assoc ($resultado);
	
    //Si los datos existen envio mensaje de error
    if (isset($row_data)&&$row_data!='') {
        $response["error"] = TRUE;
        $response["error_msg"] = 'El correo '.$email.' ya existe, intentelo con otro correo.';
        echo json_encode($response);
    
    //Si no existe se procede a registrar
    } else {
        
        //datos post
        $idSistema    = $_POST['idSistema'];
        $idEstado     = $_POST['idEstado'];
        $idTipo       = $_POST['idTipo'];
        $Nombre       = $_POST['Nombre'];
        $password     = $_POST['password'];
 
  
        //creacion y modificacion de variables
		$password        = md5($password);        //Encripto la clave
		$unique_id       = uniqid('', true);      //creo la variable unica
		$fcreacion       = fechahora_actual();    //Se obtiene la fecha actual
		$factualizacion  = fechahora_actual();    //Se obtiene la fecha actual
    
        //filtros
		if(isset($idSistema) && $idSistema != ''){             $a  = "'".$idSistema."'" ;        }else{$a  = "''";}
		if(isset($idEstado) && $idEstado != ''){               $a .= ",'".$idEstado."'" ;        }else{$a .= ",''";}
		if(isset($idTipo) && $idTipo != ''){                   $a .= ",'".$idTipo."'" ;          }else{$a .= ",''";}
		if(isset($email) && $email != ''){                     $a .= ",'".$email."'" ;           }else{$a .= ",''";}
		if(isset($Nombre) && $Nombre != ''){                   $a .= ",'".$Nombre."'" ;          }else{$a .= ",''";}
		if(isset($unique_id) && $unique_id != ''){             $a .= ",'".$unique_id."'" ;       }else{$a .= ",''";}
		if(isset($password) && $password != ''){               $a .= ",'".$password."'" ;        }else{$a .= ",''";}
		if(isset($fcreacion) && $fcreacion != ''){             $a .= ",'".$fcreacion."'" ;       }else{$a .= ",''";}
		if(isset($factualizacion) && $factualizacion != ''){   $a .= ",'".$factualizacion."'" ;  }else{$a .= ",''";}

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_listado` (idSistema, idEstado, idTipo, email, Nombre, unique_id, password, fcreacion, factualizacion )
		 VALUES ({$a})";
		$result = mysql_query($query, $dbConn);
		
		/*
		//busco los datos en la base de datos
		$query = "SELECT idEstado, email, Nombre, Rut, fNacimiento, Direccion, Fono1, Fono2, idCiudad, idComuna, fcreacion, factualizacion
		FROM clientes_listado 
		WHERE email = '{$email}' AND password = '{$password}'";
		$resultado = mysql_query ($query, $dbConn);
		$row_data = mysql_fetch_assoc ($resultado);
		*/

        //Si los datos existen los guardo dentro de un arreglo y los envio a traves de json
		if (isset($row_data)&&$row_data!='') {
            $response["error"] = FALSE;
			/*$response["user"]["email"]          = $row_data["email"];
			$response["user"]["Nombre"]         = $row_data["Nombre"];
			$response["user"]["Rut"]            = $row_data["Rut"];
			$response["user"]["fNacimiento"]    = $row_data["fNacimiento"];
			$response["user"]["Direccion"]      = $row_data["Direccion"];
			$response["user"]["Fono1"]          = $row_data["Fono1"];
			$response["user"]["Fono2"]          = $row_data["Fono2"];
			$response["user"]["idCiudad"]       = $row_data["idCiudad"];
			$response["user"]["idComuna"]       = $row_data["idComuna"];
			$response["user"]["fcreacion"]      = $row_data["fcreacion"];
			$response["user"]["factualizacion"] = $row_data["factualizacion"];*/
			echo json_encode($response);        
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "un error ha ocurrido durante el registro, intentelo nuevamente mas tarde";
            echo json_encode($response);
            
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Datos requeridos (nombre, email o contraseña) inexistentes";
    echo json_encode($response);

}


    
?>
