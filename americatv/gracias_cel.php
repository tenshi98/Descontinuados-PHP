<?
require("conexion.php");
$sql ="SELECT * FROM ejecutivos WHERE id_ejecutiv=" . $_POST["id"];

$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $nombre=$fila['nom_ejecutiv'];
		  $direccion=$fila["dir_ejecutiv"];
		  $telefono=$fila["fono_ejecutiv"];
		  $sms1=$fila["sms1"];
		  $sms2=$fila["sms2"];
		  $sms3=$fila["sms3"];
		  $fono_alarma=$fila["fono_alarma"];
		}

$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "m" , $tiempo ); 
$seg= date ( "s" , $tiempo ); 
$horaproc=$hora.$min.$seg;

$Fecha=getdate(); 
$numeroRegistros=0;
$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes<10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia<10) {
	$diadis="0".$Dia;
}else{
$diadis=$Dia;
}
$fecha=$Anio."-".$mesdis."-".$diadis;
require_once('scripts/sms.php');// Include SMS class file.	



if ($sms1<>"0") {
$gsm = "569".$sms1; //sample
$drormob_sms=	new sms();									
$drormob_sms->username=	'naturalphone@naturalphone.cl';				 
$drormob_sms->password=	'2D27B064';				
$drormob_sms->msgtext=	"Emergencia en ". substr($direccion,0,130);
$drormob_sms->phone=	$gsm;
echo $drormob_sms->send();

// Note: replace sign "+" with " " for sender and message text or it will be replaced with empty space
	$sender = 'Sosclick';
	$messagetext = str_replace("+"," ","Emergencia en ". substr($direccion,0,130));
	$result = mysql_query("INSERT INTO SMeses_historico (remitente,celular_destino,mensaje,fecha_hora) VALUES ('$sender','$gsm','$messagetext',NOW())",$base);
}

if ($sms2<>"0") {
$gsm = "569".$sms2; 
$drormob_sms=	new sms();									
$drormob_sms->username=	'naturalphone@naturalphone.cl';				 
$drormob_sms->password=	'2D27B064';				
$drormob_sms->msgtext=	"Emergencia en ". substr($direccion,0,130);
$drormob_sms->phone=	$gsm;
echo $drormob_sms->send();

	$sender = 'Sosclick';
	$messagetext = str_replace("+"," ","Emergencia en ". substr($direccion,0,130));
	$result = mysql_query("INSERT INTO SMeses_historico (remitente,celular_destino,mensaje,fecha_hora) VALUES ('$sender','$gsm','$messagetext',NOW())",$base);
}

if ($sms3<>"0") {
$gsm = "569".$sms3; 
$drormob_sms=	new sms();									
$drormob_sms->username=	'naturalphone@naturalphone.cl';				 
$drormob_sms->password=	'2D27B064';				
$drormob_sms->msgtext=	"Emergencia en ". substr($direccion,0,130);
$drormob_sms->phone=	$gsm;
echo $drormob_sms->send();

	$sender = 'Sosclick';
	$messagetext = str_replace("+"," ","Emergencia en ". substr($direccion,0,130));
	$result = mysql_query("INSERT INTO SMeses_historico (remitente,celular_destino,mensaje,fecha_hora) VALUES ('$sender','$gsm','$messagetext',NOW())",$base);
}

$gsm = "569".$telefono; 
$drormob_sms=	new sms();									
$drormob_sms->username=	'naturalphone@naturalphone.cl';				 
$drormob_sms->password=	'2D27B064';				
$drormob_sms->msgtext=	"Emergencia en ". substr($direccion,0,130);
$drormob_sms->phone=	$gsm;
echo $drormob_sms->send();							

	$sender = 'Sosclick';
	$messagetext = str_replace("+"," ","Emergencia en ". substr($direccion,0,130));
	$result = mysql_query("INSERT INTO SMeses_historico (remitente,celular_destino,mensaje,fecha_hora) VALUES ('$sender','$gsm','$messagetext',NOW())",$base);


?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>SosClick</title>
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
-->
</style>


</head>
<body>


<?
#Click-To-Call script brought to you by VoipJots.com
# corresponde al servidor donde esta el asterisk
//$strHost = "190.196.70.162";
$strHost = "bridge60.click2call.cl";
# corresponde al usuario que se crea en el manager_custom.conf en /etc/asterisk
$strUser = "sosclick";
$strSecret = "0chanc3yo";
# es el numero de talefono del cliente $strExten
# es el numero de telefono de la empresa $_POST['telefono']
# la ruta debe estar definida en el las rutas salientes del asterisk

/*if ($_POST['ciudad']=='2') {
$strdest = "SIP/TrunkTenor/".$_POST['telefono'];
} else {
	if ($_POST['ciudad']=='09') {
			$strdest = "SIP/cibeles/628874#569".$_POST['telefono'];
			} else {
				$strdest = "SIP/cibelesldn/628874#56".$_POST['ciudad'].$_POST['telefono'];
	}
}

*/




if ($_POST['ciudad']=='2') {
$strdest = "9".$_POST['telefono'];
} else {
	if ($_POST['ciudad']=='09') {
			$strdest = "9".$_POST['ciudad'].$_POST['telefono'];
			} else {
				$strdest = "9122".$_POST['ciudad'].$_POST['telefono'];
	}
}
//fijo
if ($fono_alarma<>""){
	$strExten = "SIP/TrunkTenor/".$fono_alarma;
}else{
	$strExten = "SIP/TrunkTenor/".'22454618';
}

//celulares
//$strExten = "SIP/cibeles/628874#569".'22454622';

//LDN
//$strExten = "9122".'09'.'22454622';


//echo $strdest ."<br>" . $strExten;

#specify the context to make the outgoing call from.  By default, AAH uses from-internal
#Using from-internal will make you outgoing dialing rules apply
$strContext = "discado_publicidad";
$strWaitTime = "30";
$strPriority = "1";
$strMaxRetry = "2";
$strCallerId = "Publicidad <$strdest>, <$strExten>";
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
fclose($oSocket);
?>
<div align="center">
<table width="275" height="297" border="0" cellspacing="1" bordercolor="#FFFFFF" background="http://www.click2call.cl/images/fondo_cel.jpg" >

  <tr>
    <td height="295">
<p align="center">
<a href="http://www.sosclick.cl">
			<img src="http://www.click2call.cl/images/gracias_cel.png" name="Image4"  border="0" id="Image4" /></a>

	</td>
  </tr>

  </table>
<script>
alert ("Su comunicacion se esta estableciendo, \nde click para cerrar la ventana.");
//window.close();
</script>

</div>

</body>
</html>

