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
    $Longitud         = $_POST['Longitud'];
    $Latitud          = $_POST['Latitud'];
    
    //Se almacena la alerta
	if(isset($idCliente) && $idCliente != ''){               $a  = "'".$idCliente."'" ;         }else{$a ="''";}
	if(isset($idTipoAlerta) && $idTipoAlerta != ''){         $a .= ",'".$idTipoAlerta."'" ;     }else{$a .= ",''";}
	if(isset($idSubTipoAlerta) && $idSubTipoAlerta != ''){   $a .= ",'".$idSubTipoAlerta."'" ;  }else{$a .= ",''";}
	if(isset($Fecha) && $Fecha != ''){                       $a .= ",'".$Fecha."'" ;            }else{$a .= ",''";}
	if(isset($Hora) && $Hora != ''){                         $a .= ",'".$Hora."'" ;             }else{$a .= ",''";}
	if(isset($Longitud) && $Longitud != ''){                 $a .= ",'".$Longitud."'" ;         }else{$a .= ",''";}
	if(isset($Latitud) && $Latitud != ''){                   $a .= ",'".$Latitud."'" ;          }else{$a .= ",''";}
		
	// inserto los datos de registro en la db
	$query  = "INSERT INTO `alertas_listado` (idCliente, idTipoAlerta, idSubTipoAlerta, Fecha, Hora, Longitud, Latitud) 
	VALUES ({$a} )";
	$result = mysql_query($query, $dbConn);
	//recibo el último id generado por mi sesion
	$ultimo_id = mysql_insert_id($dbConn);
	
	
	//Busco los contactos del cliente con un GSM establecido (SOLO FAMILIARES)
	$arrContactos = array();
	$query = "SELECT
	clientes_contactos.idClienteMain,
	clientes_listado.dispositivo,
	clientes_listado.Fono1,
	clientes_contactos.GSM
	FROM `clientes_contactos`
	LEFT JOIN clientes_listado  ON clientes_listado.idCliente       = clientes_contactos.idCliente
	WHERE clientes_contactos.idCliente = '{$idCliente}' AND clientes_contactos.GSM!='' AND TipoContacto='Familiar' ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrContactos,$row );
	}
	
	
	//verifico que efectivamente tenga contactos
	if(isset($arrContactos)&&$arrContactos!=''){
		
		//Busco los datos de la alerta recien generada
		$query="SELECT 
		clientes_listado.Nombre AS NombreCliente,
		alertas_subtipo.Mensaje AS MensajeAlerta,
		alertas_subtipo.Nombre AS TipoAlerta
		FROM alertas_listado 
		LEFT JOIN clientes_listado  ON clientes_listado.idCliente       = alertas_listado.idCliente
		LEFT JOIN alertas_subtipo   ON alertas_subtipo.idSubTipoAlerta  = alertas_listado.idSubTipoAlerta
		WHERE idAlerta = '{$ultimo_id}'";		  
		$resultado = mysql_query ($query, $dbConn);
		$row_data = mysql_fetch_assoc ($resultado);
		
		
		//Recorro y envio los mensajes a los contactos que tengan gsm activo
		foreach ($arrContactos as $contacto) { 

			//Se crean las variables
			$reg_id = $contacto['GSM'];
			$msj = $row_data['NombreCliente'].' '.$row_data['MensajeAlerta'];
			
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

			//Se registra el mensaje en la tabla de mensajes
			$a = "'".$ultimo_id."'" ;
			$a .= ",'".$contacto['idClienteMain']."'" ;
			$a .= ",'".$msj."'" ;
			$a .= ",'1'" ;
			$a .= ",'".fecha_actual()."'" ;
			$a .= ",'".hora_actual()."'" ;
			$a .= ",'".$idTipoAlerta."'" ;
			$a .= ",'".$idSubTipoAlerta."'" ;
			$a .= ",'".$contacto['Fono1']."'" ;
			$a .= ",'".$msj."'" ;
			
			$query  = "INSERT INTO `clientes_notificaciones` (idAlerta, idCliente, mensaje, idEstado, Fecha, Hora, idTipoAlerta, idSubTipoAlerta, Fono, Texto) VALUES ({$a} )";
			$result = mysql_query($query, $dbConn);
		}
		
		//parseo la respuesta 
		$response["error"]        = FALSE;
		$response["fecha"]        = $Fecha;
		$response["hora"]         = $Hora;
		$response["longitud"]     = $Longitud;
		$response["latitud"]      = $Latitud;
		$response["tipo_alerta"]  = $row_data['TipoAlerta'];
		echo json_encode($response);
		
		
	}else{
		$response["error"] = TRUE;
		$response["error_msg"] = "No posee contactos que esten registrados";
		echo json_encode($response);
		
	}
    
    
    
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "No se han ingresado datos";
    echo json_encode($response);
}


?>
