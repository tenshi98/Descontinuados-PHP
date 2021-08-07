<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'url.php';
/**********************************************************************************************************************************/
/*                                                  Se capturan las variables                                                     */
/**********************************************************************************************************************************/
$telefono             = $_GET["telefono"];
$telefono_encontrado  = $_GET["telefono_encontrado"];
$id_usuario           = $_GET["id_usuario"];
$latitud              = $_GET["latitud"];
$longitud             = $_GET["longitud"];
$sender               = $_GET["sender"];
$nombre_encontrado    = $_GET["nombre_encontrado"];
/**********************************************************************************************************************************/
/*                                                       Script de llamada                                                        */
/**********************************************************************************************************************************/
#Click-To-Call script brought to you by VoipJots.com
# corresponde al servidor donde esta el asterisk
//$strHost = "bridge60.click2call.cl";
$strHost = "190.196.70.167";
# corresponde al usuario que se crea en el manager_custom.conf en /etc/asterisk
$strUser = "sosclick";
$strSecret = "0chanc3yo";
# es el numero de talefono del cliente $strExten
# es el numero de telefono de la empresa $telefono]
# la ruta debe estar definida en el las rutas salientes del asterisk



$strdest = "SIP/analysis/268749#569".$telefono;
$llamador=$cod_fono.$telefono;
			
//DESTINATARIO ALEATORIO
$strExten = "909".$telefono_encontrado;


//echo "YO ".$strdest." final ".$strExten;

	$sender = 'Jootes';
	$sql="INSERT INTO activaciones 
	(remitente,mensaje,fecha_hora,estado,origen,destino,id_usuario,lat,lon) VALUES
	('$sender','$direccion',NOW(),1,'$llamador','$telefono_encontrado','$id_usuario','$latitud','$longitud')";
	$result = mysql_query($sql,$dbConn);




#specify the context to make the outgoing call from.  By default, AAH uses from-internal
#Using from-internal will make you outgoing dialing rules apply
$strContext = "discado-publicidad";
$strWaitTime = "30";
$strPriority = "1";
$strMaxRetry = "2";
//$strCallerId = "Publicidad <$strdest>, <$strExten>";
if (substr($cod_fono,0,2)=='51') {
	$strCallerId = substr($telefono,1,8)."@".$strHost;
} else {
	if (substr($telefono_encontrado,0,2)=='51') {
		$bodytag = str_replace("511", "", $telefono_encontrado);
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
fputs($oSocket, "Channel: $strdest\r\n");
fputs($oSocket, "WaitTime: $strWaitTime\r\n");
fputs($oSocket, "CallerId: $strCallerId\r\n");
fputs($oSocket, "Exten: $strExten\r\n");
fputs($oSocket, "Context: $strContext\r\n");
fputs($oSocket, "Priority: $strPriority\r\n\r\n");
fputs($oSocket, "Action: Logoff\r\n\r\n");
fclose($oSocket);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Llamada</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="roulette_box">
	<div class="perfil_img_box">
    	<img src="images/logo_ppal.png"  /> 
    </div>
    <div class="load_bar">
    	<img src="images/loading-bar-gif-blue.gif"  /> 
    </div>
    <div class="llamada_txt">
    	<p>Lo estamos comunicando con <?php echo $nombre_encontrado; ?></p>
    </div
></div>
</body>
</html>