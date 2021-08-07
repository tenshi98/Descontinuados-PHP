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
if (isset($_POST['idCliente']) && isset($_POST['idAlerta']) && isset($_POST['longitud']) && isset($_POST['latitud'])  ) {
	
	//Busco los datos de la persona que solicito mi ubicacion
	$query = "SELECT
	clientes_listado.GSM,
	clientes_listado.dispositivo,
	clientes_listado.Fono1,
	alertas_listado.idCliente
	FROM `alertas_listado`
	LEFT JOIN clientes_listado  ON clientes_listado.idCliente       = alertas_listado.idCliente
	WHERE alertas_listado.idAlerta = '{$_POST['idAlerta']}'  ";
	$resultado = mysql_query ($query, $dbConn);
	$row_creador = mysql_fetch_assoc ($resultado);

	
	
	//Se crea la alerta
    $idCliente        = $_POST['idCliente'];
    $idTipoAlerta     = 2;
    $idSubTipoAlerta  = 8;
    $Fecha            = fecha_actual();
    $Hora             = hora_actual();
    $Longitud         = $_POST['longitud'];
    $Latitud          = $_POST['latitud'];
    
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
		
	
	
	//Se crean las variables
	$reg_id = $row_creador['GSM'];
	$msj = $row_data['NombreCliente'].' '.$row_data['MensajeAlerta'];
			
	//Verifico el tipo de dispositivo
	if($row_creador['dispositivo']=='android'){
		
		//Envio el mensaje por android
		$apiKey = "AIzaSyDTfsctSuv4-zH8nMWB_lsDE7S_-AOX_kQ";
		$devices = array($reg_id);
	
		$gcpm = new GCMPushMessage($apiKey);
		$gcpm->setDevices($devices);
		$gcpm->send($msj, array('title' => 'Notificacion'));

	} elseif($row_creador['dispositivo']=='iphone') {
		//Envio el mensaje por iphone
		//iosnoti( $reg_id, $msj );
	}



	//Se registra el mensaje en la tabla de mensajes
	$a = "'".$ultimo_id."'" ;
	$a .= ",'".$row_creador['idCliente']."'" ;
	$a .= ",'".$msj."'" ;
	$a .= ",'1'" ;
	$a .= ",'".fecha_actual()."'" ;
	$a .= ",'".hora_actual()."'" ;
	$a .= ",'".$idTipoAlerta."'" ;
	$a .= ",'".$idSubTipoAlerta."'" ;
	$a .= ",'".$row_creador['Fono1']."'" ;
	$a .= ",'".$msj."'" ;
			
	$query  = "INSERT INTO `clientes_notificaciones` (idAlerta, idCliente, mensaje, idEstado, Fecha, Hora, idTipoAlerta, idSubTipoAlerta, Fono, Texto) VALUES ({$a} )";
	$result = mysql_query($query, $dbConn);
			

	$response["error"]        = FALSE;
	echo json_encode($response);
    
    
//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "No se han ingresado datos";
    echo json_encode($response);
}


?>
