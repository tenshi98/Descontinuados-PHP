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
if (isset($_POST['minumero']) && isset($_POST['numllamado'])) {
	
	// Recibo los datos a traves de post
    $minumero       = $_POST['minumero'];
    $numllamado     = $_POST['numllamado'];
    
    
    $strExten="SIP/analysis/268765#569".$minumero;
	$strdest ="909".$numllamado;

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
	if (substr($cod_fono,0,2)=='51') {
		$strCallerId = substr($telefono,1,8)."@".$strHost;
	} else {
		if (substr($fono_alarma,0,2)=='51') {
			$bodytag = str_replace("511", "", $fono_alarma);
			$strCallerId = $bodytag."@".$strHost;
		}else{
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
