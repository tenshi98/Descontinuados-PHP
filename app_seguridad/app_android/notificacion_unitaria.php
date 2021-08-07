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
require 'src/GCMPushMessage.php';
// obtengo puntero de conexion con la db
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                                        Aplicacion                                                              */
/**********************************************************************************************************************************/    

// variable de error activa
$response = array("error" => TRUE);


//Compruebo si recibi los datos
if (isset($_POST['idCliente']) && isset($_POST['idTipoAlerta']) && isset($_POST['idSubTipoAlerta'])) {
	
	
	// Recibo los datos a traves de post
    $idCliente        = $_POST['idCliente'];
    $idTipoAlerta     = $_POST['idTipoAlerta'];
    $idSubTipoAlerta  = $_POST['idSubTipoAlerta'];
    $Fecha            = fecha_actual();
    $Hora             = hora_actual();
	$Mensaje          = $_POST['Mensaje'];
	$Destinatario     = $_POST['Destinatario'];
	$idClienteMain    = $_POST['idClienteMain'];
	
    //Se almacena la alerta
	if(isset($idCliente) && $idCliente != ''){               $a  = "'".$idCliente."'" ;         }else{$a ="''";}
	if(isset($idTipoAlerta) && $idTipoAlerta != ''){         $a .= ",'".$idTipoAlerta."'" ;     }else{$a .= ",''";}
	if(isset($idSubTipoAlerta) && $idSubTipoAlerta != ''){   $a .= ",'".$idSubTipoAlerta."'" ;  }else{$a .= ",''";}
	if(isset($Fecha) && $Fecha != ''){                       $a .= ",'".$Fecha."'" ;            }else{$a .= ",''";}
	if(isset($Hora) && $Hora != ''){                         $a .= ",'".$Hora."'" ;             }else{$a .= ",''";}
	
		
	// inserto los datos de registro en la db
	$query  = "INSERT INTO `alertas_listado` (idCliente, idTipoAlerta, idSubTipoAlerta, Fecha, Hora) 
	VALUES ({$a} )";
	$result = mysql_query($query, $dbConn);
	//recibo el último id generado por mi sesion
	$ultimo_id = mysql_insert_id($dbConn);
	


	//Se envia el mensaje
	$apiKey = "AIzaSyDTfsctSuv4-zH8nMWB_lsDE7S_-AOX_kQ";
	$devices = array($Destinatario);
	$message = $Mensaje;

	$gcpm = new GCMPushMessage($apiKey);
	$gcpm->setDevices($devices);
	$gcpm->send($message, array('title' => 'Test title'));
		

	//Se registra el mensaje en la tabla de mensajes
	$a = "'".$ultimo_id."'" ;
	$a .= ",'".$idClienteMain."'" ;
	$a .= ",'".$Mensaje."'" ;
	$a .= ",'1'" ;
	$a .= ",'".fecha_actual()."'" ;
	$a .= ",'".hora_actual()."'" ;
	$a .= ",'".$idTipoAlerta."'" ;
	$a .= ",'".$idSubTipoAlerta."'" ;
	$a .= ",'".$Mensaje."'" ;
			
	$query  = "INSERT INTO `clientes_notificaciones` (idAlerta, idCliente, mensaje, idEstado, Fecha, Hora, idTipoAlerta, idSubTipoAlerta, Texto) VALUES ({$a} )";
	$result = mysql_query($query, $dbConn);
		
		
	//parseo la respuesta 
	$response["error"] = FALSE;
	//$response["error_msg"] = $reg_id.'###########################'.$msj.'###########################'.$ultimo_id;
	echo json_encode($response);
		
    
    
    
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "No se han ingresado datos";
    echo json_encode($response);
}


?>
