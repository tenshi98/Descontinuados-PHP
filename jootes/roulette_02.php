<?
require("conexion.php");
require("nombre_pag.php");
$telefono =$_POST["telefono"];
$telefono_encontrado =$_POST["telefono_encontrado"];
$id_usuario =$_POST["id_usuario"];
$latitud =$_POST["latitud"];
$longitud =$_POST["longitud"];
$sender =$_POST["sender"];
$nombre_encontrado =$_POST["nombre_encontrado"];
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Roulette</title>
<style type="text/css">
<!--
body {
	background-color: #ffffff;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.Estilo2 {
	color: #0267ff;
	font-size: 24px;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo3 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
}
.Estilo5 {
	color: #FFFFFF;
	font-family: Arial, Helvetica, sans-serif;
	font-size: 15px;
}
a:link {
	color: #FFFFFF;
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #FFFFFF;
}
a:hover {
	text-decoration: none;
	color: #000066;
}
a:active {
	text-decoration: none;
	color: #FFFFFF;
}
.Estilo7 {color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
.Estilo71 {color: #FF0000; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
-->
</style>


</head>
<body>
<TABLE align=center valign=middle>
<TR>
	<TD align=center valign=middle height=100>
	<img src="http://<?=$nombreurl?>/images/logo_ppal.png"   border="0" /></TD>
</TR>
<TR>
	<TD align=center valign=middle height=100  class=Estilo71> Llamada confirmada, 
	Te estamos comunicando con <?=$nombre_encontrado?>.<br>
	</TD>
</TR>
</TABLE>


<?
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



$strdest = "SIP/cibeles/628874#569".$telefono;
$llamador=$cod_fono.$telefono;
			
//DESTINATARIO ALEATORIO
$strExten = "909".$telefono_encontrado;


//echo "YO ".$strdest." final ".$strExten;

	$sender = 'Jootes';
	$sql="INSERT INTO activaciones (remitente,mensaje,fecha_hora,estado,origen,destino,id_usuario,lat,lon) VALUES ('$sender','$direccion',NOW(),1,'$llamador','$telefono_encontrado','$id_usuario','$latitud','$longitud')";
	$result = mysql_query($sql,$base);




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

</body>
</html>

