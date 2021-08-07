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
if (isset($_POST['idCliente']) && isset($_POST['Nombre']) ) {
	
	
	// Recibo los datos a traves de post
    $idCliente        = $_POST['idCliente'];
    $Nombre           = $_POST['Nombre'];
    $Fecha            = fecha_actual();
    $Hora             = hora_actual();

    
    //Se almacena la alerta
	if(isset($idCliente) && $idCliente != ''){               $a  = "'".$idCliente."'" ;         }else{$a ="''";}
	if(isset($Fecha) && $Fecha != ''){                       $a .= ",'".$Fecha."'" ;            }else{$a .= ",''";}
	if(isset($Hora) && $Hora != ''){                         $a .= ",'".$Hora."'" ;             }else{$a .= ",''";}
		
	// Registro la alerta en el registro de alertas
	$query  = "INSERT INTO `alertas_listado` (idCliente, Fecha, Hora) 
	VALUES ({$a} )";
	$result = mysql_query($query, $dbConn);
	
	
	
	//Se almacena la alerta
	if(isset($idCliente) && $idCliente != ''){  $a  = "'".$idCliente."'" ;   }else{$a ="''";}
	if(isset($Fecha) && $Fecha != ''){          $a .= ",'".$Fecha."'" ;      }else{$a .= ",''";}
	if(isset($Hora) && $Hora != ''){            $a .= ",'".$Hora."'" ;       }else{$a .= ",''";}
	$a .= ",'2'" ;                        //idTipoNoti
	$a .= ",'Alerta'" ;                   //mensaje
	$a .= ",'Has enviado una alerta'" ;   //texto
	$a .= ",'1'" ;                        //idEstado
	
	// Registro la alerta en el registro de alertas
	$query  = "INSERT INTO `clientes_notificaciones` (idCliente, Fecha, Hora, idTipoNoti, mensaje, texto, idEstado) 
	VALUES ({$a} )";
	$result = mysql_query($query, $dbConn);
	
	
	
	//verifico que efectivamente tenga contactos
	if(result){
		
		//Busco los contactos del cliente con un GSM establecido
		$arrContactos = array();
		$query = "SELECT
		clientes_listado.idCliente,
		clientes_listado.dispositivo,
		clientes_listado.GSM
		FROM `clientes_contactos`
		LEFT JOIN clientes_listado  ON clientes_listado.idCliente       = clientes_contactos.idClienteMain
		WHERE clientes_listado.GSM!='' ";
		$resultado = mysql_query ($query, $dbConn);
		while ( $row = mysql_fetch_assoc ($resultado)) {
		array_push( $arrContactos,$row );
		}
		
		
		
		
		//Recorro y envio los mensajes a los contactos que tengan gsm activo
		foreach ($arrContactos as $contacto) { 

			//Se crean las variables
			$reg_id = $contacto['GSM'];
			$msj = $Nombre.' te ha enviado una notificacion.';
			
			//Verifico el tipo de dispositivo
			if($contacto['dispositivo']=='android'){
				//Envio el mensaje por android
				$apiKey = "AIzaSyDTfsctSuv4-zH8nMWB_lsDE7S_-AOX_kQ";
				$devices = array($reg_id);
	
				$gcpm = new GCMPushMessage($apiKey);
				$gcpm->setDevices($devices);
				$gcpm->send($msj, array('title' => 'Alerta'));

			} elseif($contacto['dispositivo']=='iphone') {
				//Envio el mensaje por iphone
				//iosnoti( $reg_id, $msj );
			}
			
			//Se almacena la alerta
			if(isset($contacto['idCliente']) && $contacto['idCliente'] != ''){  $a  = "'".$contacto['idCliente']."'" ;   }else{$a ="''";}
			if(isset($Fecha) && $Fecha != ''){          $a .= ",'".$Fecha."'" ;      }else{$a .= ",''";}
			if(isset($Hora) && $Hora != ''){            $a .= ",'".$Hora."'" ;       }else{$a .= ",''";}
			$a .= ",'2'" ;                                                                    //idTipoNoti
			$a .= ",'Alerta'" ;                                                               //mensaje
			$a .= ",'".$Nombre." te ha enviado una alerta para que te comuniques con el'" ;   //texto
			$a .= ",'1'" ;                                                                    //idEstado
			
			// Registro la alerta en el registro de alertas
			$query  = "INSERT INTO `clientes_notificaciones` (idCliente, Fecha, Hora, idTipoNoti, mensaje, texto, idEstado) 
			VALUES ({$a} )";
			$result = mysql_query($query, $dbConn);
	

		}
		
		//parseo la respuesta 
		$response["error"]        = FALSE;
		echo json_encode($response);
		
		
	}else{
		$response["error"] = TRUE;
		$response["error_msg"] = "No existen notificaciones";
		echo json_encode($response);
	}
    
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "No se han ingresado datos";
    echo json_encode($response);
}

?>
