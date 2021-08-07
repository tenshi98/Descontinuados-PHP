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
		$fcreacion       = fechahora_actual();    //Se obtiene la fecha actual
		$factualizacion  = fechahora_actual();    //Se obtiene la fecha actual
    
        //filtros
		if(isset($idSistema) && $idSistema != ''){             $a  = "'".$idSistema."'" ;        }else{$a  = "''";}
		if(isset($idEstado) && $idEstado != ''){               $a .= ",'".$idEstado."'" ;        }else{$a .= ",''";}
		if(isset($idTipo) && $idTipo != ''){                   $a .= ",'".$idTipo."'" ;          }else{$a .= ",''";}
		if(isset($email) && $email != ''){                     $a .= ",'".$email."'" ;           }else{$a .= ",''";}
		if(isset($Nombre) && $Nombre != ''){                   $a .= ",'".$Nombre."'" ;          }else{$a .= ",''";}
		if(isset($password) && $password != ''){               $a .= ",'".$password."'" ;        }else{$a .= ",''";}
		if(isset($fcreacion) && $fcreacion != ''){             $a .= ",'".$fcreacion."'" ;       }else{$a .= ",''";}
		if(isset($factualizacion) && $factualizacion != ''){   $a .= ",'".$factualizacion."'" ;  }else{$a .= ",''";}

		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_listado` (idSistema, idEstado, idTipo, email, Nombre, password, fcreacion, factualizacion )
		 VALUES ({$a})";
		$result = mysql_query($query, $dbConn);
		
		

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
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Datos requeridos (nombre, email o contraseña) inexistentes";
    echo json_encode($response);

}


    
?>
