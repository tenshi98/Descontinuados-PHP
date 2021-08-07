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
if (isset($_POST['Nombre']) && isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['sexo'])&& isset($_POST['edad'])) {
	
    // Recibo los datos a traves de post
    $email        = $_POST['email'];
    $idSistema    = $_POST['idSistema'];
    $idEstado     = $_POST['idEstado'];
    $idTipo       = $_POST['idTipo'];
    $Nombre       = $_POST['Nombre'];
    $password     = $_POST['password'];
    $sexo         = $_POST['sexo'];
    $edad         = $_POST['edad'];
    $dispositivo  = $_POST['dispositivo'];
	$IMEI         = $_POST['IMEI'];
	$GSM          = $_POST['GSM'];
 
  
    //creacion y modificacion de variables
	$password        = md5($password);        //Encripto la clave
	$fcreacion       = fechahora_actual();    //Se obtiene la fecha actual
	$factualizacion  = fechahora_actual();    //Se obtiene la fecha actual
		
		
		
	//busco los datos en la base de datos
	$query = "SELECT idCliente, idEstado, email, Nombre, Rut, fNacimiento, Direccion, Fono1, Fono2, Departamento, Provincia, 
	Distrito, fcreacion, factualizacion, Saldo, Sexo, Edad
	FROM clientes_listado 
	WHERE email = '{$email}' AND password = '{$password}'";
	$resultado = mysql_query ($query, $dbConn);
	$row_face = mysql_fetch_assoc ($resultado);
		
	//Actualizo los datos del usuario al loguearse
	if (isset($row_face['idCliente'])&&$row_face['idCliente']!='') {
			
		$a = "idCliente='".$row_face['idCliente']."'" ;
		if(isset($dispositivo) && $dispositivo != ''){   $a .= ",dispositivo='".$dispositivo."'" ;}
		if(isset($IMEI) && $IMEI != ''){                 $a .= ",IMEI='".$IMEI."'" ;}
		if(isset($GSM) && $GSM != ''){                   $a .= ",GSM='".$GSM."'" ;}
						
		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '{$row_face['idCliente']}'";
		$result = mysql_query($query, $dbConn);	
		
			//obtengo los datos personales
		$response["user"]["idCliente"]      = $row_face["idCliente"];
		$response["user"]["email"]          = $row_face["email"];
		$response["user"]["Nombre"]         = $row_face["Nombre"];
		$response["user"]["Rut"]            = $row_face["Rut"];
		$response["user"]["fNacimiento"]    = $row_face["fNacimiento"];
		$response["user"]["Direccion"]      = $row_face["Direccion"];
		$response["user"]["Fono1"]          = $row_face["Fono1"];
		$response["user"]["Fono2"]          = $row_face["Fono2"];
		$response["user"]["Departamento"]   = $row_face["Departamento"];
		$response["user"]["Provincia"]      = $row_face["Provincia"];
		$response["user"]["Distrito"]       = $row_face["Distrito"];
		$response["user"]["fcreacion"]      = $row_face["fcreacion"];
		$response["user"]["factualizacion"] = $row_face["factualizacion"];
		$response["user"]["Saldo"]          = $row_face["Saldo"];
		$response["user"]["Sexo"]           = $row_face["Sexo"];
		$response["user"]["Edad"]           = $row_face["Edad"];

			
	}else{
			
		if(isset($idSistema) && $idSistema != ''){             $a  = "'".$idSistema."'" ;        }else{$a  = "''";}
		if(isset($idEstado) && $idEstado != ''){               $a .= ",'".$idEstado."'" ;        }else{$a .= ",''";}
		if(isset($idTipo) && $idTipo != ''){                   $a .= ",'".$idTipo."'" ;          }else{$a .= ",''";}
		if(isset($email) && $email != ''){                     $a .= ",'".$email."'" ;           }else{$a .= ",''";}
		if(isset($Nombre) && $Nombre != ''){                   $a .= ",'".$Nombre."'" ;          }else{$a .= ",''";}
		if(isset($password) && $password != ''){               $a .= ",'".$password."'" ;        }else{$a .= ",''";}
		if(isset($sexo) && $sexo != ''){                       $a .= ",'".$sexo."'" ;            }else{$a .= ",''";}
		if(isset($edad) && $edad != ''){                       $a .= ",'".$edad."'" ;            }else{$a .= ",''";}
		if(isset($fcreacion) && $fcreacion != ''){             $a .= ",'".$fcreacion."'" ;       }else{$a .= ",''";}
		if(isset($factualizacion) && $factualizacion != ''){   $a .= ",'".$factualizacion."'" ;  }else{$a .= ",''";}
		if(isset($dispositivo) && $dispositivo != ''){         $a .= ",'".$dispositivo."'" ;     }else{$a .= ",''";}
		if(isset($IMEI) && $IMEI != ''){                       $a .= ",'".$IMEI."'" ;            }else{$a .= ",''";}
		if(isset($GSM) && $GSM != ''){                         $a .= ",'".$GSM."'" ;             }else{$a .= ",''";}

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_listado` (idSistema, idEstado, idTipo, email, Nombre, password, Sexo, Edad, fcreacion, 
		factualizacion, dispositivo, IMEI, GSM )
		VALUES ({$a})";
		$result = mysql_query($query, $dbConn);
		$ultimo_id = mysql_insert_id($dbConn);
			
	  
		//relleno con los datos que tengo
		$response["user"]["idCliente"]      = $ultimo_id;
		$response["user"]["email"]          = $email;
		$response["user"]["Nombre"]         = $Nombre;
		$response["user"]["Rut"]            = "";
		$response["user"]["fNacimiento"]    = "";
		$response["user"]["Direccion"]      = "";
		$response["user"]["Fono1"]          = "";
		$response["user"]["Fono2"]          = "";
		$response["user"]["Departamento"]   = "";
		$response["user"]["Provincia"]      = "";
		$response["user"]["Distrito"]       = "";
		$response["user"]["fcreacion"]      = $fcreacion;
		$response["user"]["factualizacion"] = $factualizacion;
		$response["user"]["Saldo"]          = "0";
		$response["user"]["Sexo"]           = $sexo;
		$response["user"]["Edad"]           = $edad;
			
	}
	
    //Si los datos existen los guardo dentro de un arreglo y los envio a traves de json
	if (isset($result)&&$result!='') {
        $response["error"] = FALSE;
		echo json_encode($response);        
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "un error ha ocurrido durante el registro, intentelo nuevamente mas tarde";
		echo json_encode($response);
            
    }
 
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Datos requeridos (nombre, email o contraseña) inexistentes";
    echo json_encode($response);

}


    
?>
