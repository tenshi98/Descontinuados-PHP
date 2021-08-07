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
if (isset($_POST['idCliente']) && isset($_POST['idTipoEvento']) ) {
	
	
	// Recibo los datos a traves de post
    $idCliente        = $_POST['idCliente'];
    $idTipoEvento     = $_POST['idTipoEvento'];
    $Fecha            = fecha_actual();
    $Hora             = hora_actual();
    $Longitud         = $_POST['Longitud'];
    $Latitud          = $_POST['Latitud'];
    
    //Se almacena la alerta
	if(isset($idCliente) && $idCliente != ''){               $a  = "'".$idCliente."'" ;         }else{$a ="''";}
	if(isset($idTipoEvento) && $idTipoEvento != ''){         $a .= ",'".$idTipoEvento."'" ;     }else{$a .= ",''";}
	if(isset($Fecha) && $Fecha != ''){                       $a .= ",'".$Fecha."'" ;            }else{$a .= ",''";}
	if(isset($Hora) && $Hora != ''){                         $a .= ",'".$Hora."'" ;             }else{$a .= ",''";}
	if(isset($Longitud) && $Longitud != ''){                 $a .= ",'".$Longitud."'" ;         }else{$a .= ",''";}
	if(isset($Latitud) && $Latitud != ''){                   $a .= ",'".$Latitud."'" ;          }else{$a .= ",''";}
		
	// inserto los datos de registro en la db
	$query  = "INSERT INTO `eventos_listado` (idCliente, idTipoEvento, Fecha, Hora, Longitud, Latitud) 
	VALUES ({$a} )";
	$result = mysql_query($query, $dbConn);
	//recibo el último id generado por mi sesion
	$ultimo_id = mysql_insert_id($dbConn);
	
	
	if(isset($ultimo_id)&&$ultimo_id!=''){
		//parseo la respuesta 
		$response["error"] = FALSE;
		echo json_encode($response);
		
		
	}else{
		$response["error"] = TRUE;
		$response["error_msg"] = "Error al enviar el evento";
		echo json_encode($response);
		
	}
	
    
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "No se han ingresado datos";
    echo json_encode($response);
}


?>
