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
if (isset($_POST['idCliente']) && isset($_POST['idContacto']) && isset($_POST['room'])) {
	
	
	// Recibo los datos a traves de post
    $idCliente   = $_POST['idCliente'];
    $idContacto  = $_POST['idContacto'];
    $room        = $_POST['room'];
    
    //seleccionar mis datos para enviar el mensaje
    $query="SELECT Nombre 
	FROM clientes_listado 
	WHERE idCliente = '{$idCliente}'";		  
	$resultado = mysql_query ($query, $dbConn);
	$rowCliente = mysql_fetch_assoc ($resultado);
    
    //seleccionar los datos de quien va a recibir
    $query="SELECT dispositivo, GSM
	FROM clientes_listado 
	WHERE idCliente = '{$idContacto}'";		  
	$resultado = mysql_query ($query, $dbConn);
	$rowContacto = mysql_fetch_assoc ($resultado);
	
	//Variables
	$idTipoNoti  = 1;
	$mensaje     = $rowCliente['Nombre']." te ha solicitado un chateo";
    $idEstado    = 1;
    $Fecha       = fecha_actual();
    $Hora        = hora_actual();
    
    //insertar la notificacion en base a idcontacto
	if(isset($idContacto) && $idContacto != ''){  $a  = "'".$idContacto."'" ;  }else{$a ="''";}
	if(isset($idTipoNoti) && $idTipoNoti != ''){  $a .= ",'".$idTipoNoti."'" ; }else{$a .= ",''";}
	if(isset($mensaje) && $mensaje != ''){        $a .= ",'".$mensaje."'" ;    }else{$a .= ",''";}
	if(isset($texto) && $texto != ''){            $a .= ",'".$texto."'" ;      }else{$a .= ",''";}
	if(isset($idEstado) && $idEstado != ''){      $a .= ",'".$idEstado."'" ;   }else{$a .= ",''";}
	if(isset($Fecha) && $Fecha != ''){            $a .= ",'".$Fecha."'" ;      }else{$a .= ",''";}
	if(isset($Hora) && $Hora != ''){              $a .= ",'".$Hora."'" ;       }else{$a .= ",''";}
	if(isset($Web) && $Web != ''){                $a .= ",'".$Web."'" ;        }else{$a .= ",''";}
	if(isset($room) && $room != ''){              $a .= ",'".$room."'" ;       }else{$a .= ",''";}
	
		
	// inserto los datos de registro en la db
	$query  = "INSERT INTO `clientes_notificaciones` (idCliente, idTipoNoti, mensaje, texto, idEstado, Fecha, Hora, Web, room) 
	VALUES ({$a} )";
	$result = mysql_query($query, $dbConn);
	//recibo el último id generado por mi sesion
	$ultimo_id = mysql_insert_id($dbConn);
	

	//verifico que efectivamente se envio el mensaje
	if(isset($result)&&$result!=''){
		
		//Verifico el tipo de dispositivo
		if($rowContacto['dispositivo']=='android'){
			//Envio el mensaje por android
			$apiKey = "AIzaSyBRfBS39A5mdyYiOXljzzVpMuxcnMpQ2Do";
			$devices = array($rowContacto['GSM']);
	
			$gcpm = new GCMPushMessage($apiKey);
			$gcpm->setDevices($devices);
			$gcpm->send($mensaje, array('title' => 'Invitacion'));
			
			$response["error"]        = FALSE;
			echo json_encode($response);

		} elseif($contacto['dispositivo']=='iphone') {
			//Envio el mensaje por iphone
			//iosnoti( $reg_id, $msj );
		}
		
	}else{
		$response["error"] = TRUE;
		$response["error_msg"] = "No se ha enviado la invitacion";
		echo json_encode($response);
		
	}
    
    
    
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "No se han ingresado datos";
    echo json_encode($response);
}


?>
