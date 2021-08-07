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
if (isset($_POST['idMedico']) && isset($_POST['fonoMedico']) && isset($_POST['idCliente']) && isset($_POST['FonoCliente']) ) {
	
	
	$idMedico    = $_POST['idMedico'];
	$idCliente   = $_POST['idCliente'];
	$minumero    = $_POST['FonoCliente'];
    $numllamado  = $_POST['fonoMedico'];
	
	/******************************************************************************************************************/
	//Primero actualizo los datos del medico en caso de recibir la llamada
	//Realizo la consulta	
	$query="SELECT nLlamadas
	FROM medicos_listado 
	WHERE 	idMedico = '".$idMedico."'";		  
	$resultado = mysql_query ($query, $dbConn);
	$row_medico = mysql_fetch_assoc ($resultado);
	
	$nLlamadas = $row_medico["nLlamadas"] + 1;
	
	//actualizo la cantidad de llamadas recibidas
	$query  = "UPDATE `medicos_listado` SET nLlamadas = '".$nLlamadas."' WHERE idMedico = '$idMedico'";
	$result = mysql_query($query, $dbConn);
	
	//Guardo el registro de la llamada
	$fecha_actual  = fecha_actual();
	$hora_actual   = hora_actual();
	//filtros
	if(isset($idMedico) && $idMedico != ''){            $a  = "'".$idMedico."'" ;        }else{$a  = "''";}
	if(isset($numllamado) && $numllamado != ''){        $a .= ",'".$numllamado."'" ;     }else{$a .= ",''";}
	if(isset($idCliente) && $idCliente != ''){          $a .= ",'".$idCliente."'" ;      }else{$a .= ",''";}
	if(isset($minumero) && $minumero != ''){            $a .= ",'".$minumero."'" ;       }else{$a .= ",''";}
	if(isset($fecha_actual) && $fecha_actual != ''){    $a .= ",'".$fecha_actual."'" ;   }else{$a .= ",''";}
	if(isset($hora_actual) && $hora_actual != ''){      $a .= ",'".$hora_actual."'" ;    }else{$a .= ",''";}
	

	// inserto los datos de registro en la db
	$query  = "INSERT INTO `medicos_llamadas` (idMedico, fonoMedico, idCliente, FonoCliente, Fecha, Hora)
	VALUES ({$a})";
	$result = mysql_query($query, $dbConn);
	
	
	
	
	
	
	$minumero    = $_POST['FonoCliente'];
    $numllamado  = $_POST['fonoMedico'];

    
    
    /******************************************************************************************************************/
    //Realizo la llamada
	if (substr($minumero,0,1)=='9') {
		$strExten="SIP/analysis/268765#56".$minumero;
	}elseif (substr($minumero,0,2)=='51') {
		$strExten="SIP/analysis/268765#".$minumero;
	}

	$strdest =$numllamado;

	//Conexion al server de llamadas
	$strHost = "190.196.70.167";
	$strUser = "jootes";
	$strSecret = "0chanc3yo";

	// DE AQUI A ABAJO MANTENLO IGUAL
		
	#specify the context to make the outgoing call from.  By default, AAH uses from-internal
	#Using from-internal will make you outgoing dialing rules apply
	$strContext = "discado-jootes";
	$strWaitTime = "30";
	$strPriority = "1";
	$strMaxRetry = "2";
	//$strCallerId = "Publicidad <$strdest>, <$strExten>";

		if (substr($strdest,0,2)=='51') {
			$bodytag = str_replace("51", "99051", $numllamado);
			$strCallerId = $bodytag."@".$strHost;
								$strdest = "990".$strdest;
		}else{
			if (substr($strdest,0,1)=='9') {
					$strCallerId = "909".$strdest."@".$strHost;
					$strdest = "90".$strdest;
			}else{
									$strdest = $strdest;
					$strCallerId = $strdest."@".$strHost;
			}
		}

	
	$length = strlen($strExten);

	$oSocket = fsockopen($strHost, 5038, $errnum, $errdesc) or die("Connection to host failed");
	fputs($oSocket, "Action: login\r\n");
	fputs($oSocket, "Events: off\r\n");
	fputs($oSocket, "Username: $strUser\r\n");
	fputs($oSocket, "Secret: $strSecret\r\n\r\n");
	fputs($oSocket, "Action: originate\r\n");
	fputs($oSocket, "Channel: $strExten\r\n");
	fputs($oSocket, "WaitTime: $strWaitTime\r\n");
	fputs($oSocket, "CallerId: $strCallerId\r\n");
	fputs($oSocket, "Exten: $strdest\r\n");
	fputs($oSocket, "Context: $strContext\r\n");
	fputs($oSocket, "Priority: $strPriority\r\n\r\n");
	fputs($oSocket, "Action: Logoff\r\n\r\n");
	fputs($socket, "Timeout: 15000\r\n" );
	fclose($oSocket);

	//mensaje ok
	$response["error"] = FALSE;
	$response["error_msg"] = "OK";
    echo json_encode($response);
	

//Mensaje de error en caso de que se ejecute el formulario sin los datos post
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Datos requeridos no han sido ingresados";
    echo json_encode($response);
}


?>
