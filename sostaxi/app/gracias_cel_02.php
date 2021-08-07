<?
require("../conexion.php");
require("../nombre_pag.php");
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];

$sql ="SELECT * FROM ejecutivos WHERE imei='" . $_GET["imei"] . "'";

$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

?>


<form name="formulario" method="post" action="http://<?=$nombreurl?>/app/crea_usuario.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
            <input type="hidden" name="msg_error" value="1">
</form>
		<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>

<?
}

$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $nombre=$fila['nom_ejecutiv'];
		  $id_usuario=$fila['id_ejecutiv'];
		  $username=$fila['id_ejecutiv'];
		  $direccion=$fila["dir_ejecutiv"];
		  $telefono=$fila["fono_ejecutiv"];
		  $cod_fono=$fila["cod_fono"];
		  $sms1=$fila["sms1"];
		  $sms2=$fila["sms2"];
		  $sms3=$fila["sms3"];
		  $sms4=$fila["sms4"];
		  $sms5=$fila["sms5"];
		  $linea=$fila["linea"];
		  $fono_alarma=$fila["fono_alarma"];
		}

$latitud=$_GET["latitud"];
$longitud=$_GET["longitud"];
$tipo=$_POST["activacion"];

if ($fono_alarma==""){
	$fono_alarma="222454622";
}

	$sender = 'Sostaxi';
	$sql="INSERT INTO activaciones (remitente,mensaje,fecha_hora,estado,origen,destino,id_usuario,lat,lon,tipo_llamada) VALUES ('$sender','$direccion',NOW(),1,'$telefono','$fono_alarma','$id_usuario','$latitud','$longitud','$tipo')";
	$result = mysql_query($sql,$base);


	$sql_id="select id_sms from activaciones order by id_sms desc LIMIT 1";
	$result_id = mysql_query($sql_id,$base);
	while($fila_id=mysql_fetch_array($result_id))
	{
		$id_activacion=$fila_id["id_sms"];
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

$fecha_alerta=$diadis."/".$mesdis."/".$Anio."  ".$hora.":".$min.":".$seg;

// MENSAJES GCM FIJOS

if ($tipo=="Sostaxi") {
$messageText = $id_usuario."-->".$nombre.", Ha generado una alerta de Seguridad, comunicate con el al +569".$telefono;
//$fono_alarma="22454622";
}
if ($tipo=="Pasajero1") {
$messageText = $id_usuario."-->".$nombre." informa de pasajero en Ruta";
}
if ($tipo=="Pasajero2") {
$messageText = $id_usuario."-->".$nombre." informa de 2 pasajeros en Ruta";
}
if ($tipo=="Pasajero3") {
$messageText = $id_usuario."-->".$nombre." informa de mas de 3 pasajeros en Ruta";
}
if ($tipo=="Desvio") {
$messageText = $id_usuario."-->".$nombre." informa de Desvio en Ruta";
}
if ($tipo=="Accidente") {
$messageText = $id_usuario."-->".$nombre." informa de Accidente en Ruta";
}
if ($tipo=="Policia") {
$messageText = $id_usuario."-->".$nombre." informa de Control Policial en Ruta";
}
if ($tipo=="Trafico") {
$messageText = $id_usuario."-->".$nombre." informa de Congestion de trafico en Ruta";
}
if ($tipo=="Peligro") {
$messageText = $id_usuario."-->".$nombre." informa de Peligro en Ruta";
}
if ($tipo=="Cerrada") {
$messageText = $id_usuario."-->".$nombre." informa de Ruta cerrada";
}

$collapseKey = $telefono;
$link = "http://".$nombreurl;
$apiKey = 'AIzaSyBEClwPSzzQiwON6LDxnYt4s71CIf01i2k';

// MENSAJES GCM FIJOS



//PARA MI
	$sql = "SELECT login,gcmcode FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='" . $telefono . "' LIMIT 1";
	$result = mysql_query($sql,$base);

	while($data=mysql_fetch_array($result)) 
	{
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);

	//echo "userIdentificador ".$userIdentificador."<br>";

   $data_alcel = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.msg_sostaxi' => $messageText,'data.fecha' => $fecha);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
		if ($headers) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_alcel);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		}
	} 
//PARA MI

if ($tipo=="Sostaxi") {
	if ($sms1!='0') {
	$sms=$sms1;
	$sql = "SELECT login,gcmcode FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $sms . "' LIMIT 1";
	$result = mysql_query($sql,$base);

	while($data=mysql_fetch_array($result)) 
	{
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);

	//echo "userIdentificador ".$userIdentificador."<br>";

   $data_alcel = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.msg_sostaxi' => $messageText,'data.fecha' => $fecha);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
		if ($headers) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_alcel);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		}
	} 
	}

	if ($sms2!='0') {
	$sms=$sms2;
	$sql = "SELECT login,gcmcode FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $sms . "' LIMIT 1";
	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
	{
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);

	//echo "userIdentificador ".$userIdentificador."<br>";

   $data_alcel = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.msg_sostaxi' => $messageText,'data.fecha' => $fecha);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
		if ($headers) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_alcel);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		}
	} 
	}

	if ($sms3!='0') {
	$sms=$sms3;
	$sql = "SELECT login,gcmcode FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $sms . "' LIMIT 1";
	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
	{
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);
   $data_alcel = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.msg_sostaxi' => $messageText,'data.fecha' => $fecha);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
		if ($headers) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_alcel);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		}
	} 
	}

	if ($sms4!='0') {
	$sms=$sms4;
	$sql = "SELECT login,gcmcode FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $sms . "' LIMIT 1";
	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
	{
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);
   $data_alcel = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.msg_sostaxi' => $messageText,'data.fecha' => $fecha);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
		if ($headers) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_alcel);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		}
	} 
	}

	if ($sms5!='0') {
	$sms=$sms5;
	$sql = "SELECT login,gcmcode FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $sms . "' LIMIT 1";
	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
	{
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);
   $data_alcel = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.msg_sostaxi' => $messageText,'data.fecha' => $fecha);
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
		if ($headers) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_alcel);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		}
	} 
	}
}else{
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$linea."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
	$sql = "SELECT login,gcmcode FROM ejecutivos WHERE gcmcode<>'' and linea='" . $linea . "'";
	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
	{

	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);
   $data_alcel = array('registration_id' => $userIdentificador,
	   'collapse_key' => $collapseKey,
	   'data.msg_sostaxi' => $messageText,
	   'data.fecha' => $fecha);

   $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
		if ($headers) {
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_alcel);
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
		}
	} 


}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>SosTaxi</title>
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
if ($tipo=="Sostaxi") {

$strHost = "190.196.70.167";
$strUser = "akuct";
$strSecret = "0chanc3yo";
//MAQUINA 164
/*if ($telefono<>"") {
if (substr($telefono,0,2)=='51') {
$strdest = "900".$telefono;
$llamador=$telefono;
} else {
			if (substr($telefono,0,2)=='09') {
			$strdest = "9".$telefono;
			$llamador=$cod_fono.$telefono;
			} else {
				$strdest ="901".$cod_fono.$telefono;
					$llamador=$cod_fono.$telefono;
			}
}
if (substr($fono_alarma,0,2)=='51') {
		$strExten = "SIP/analysys/268749#".$fono_alarma;
}else{
		$strExten = "SIP/RutaQuintum/".$fono_alarma;

}
	*/
//MAQUINA 167
if ($telefono<>"") {
if (substr($telefono,0,2)=='51') {
$strdest = "900".$telefono;
$llamador=$telefono;
} else {
			if (substr($telefono,0,2)=='09') {
			$strdest = "9".$telefono;
			$llamador=$cod_fono.$telefono;
			} else {
				$strdest ="901".$cod_fono.$telefono;
					$llamador=$cod_fono.$telefono;
			}
	
}
if (substr($fono_alarma,0,2)=='51') {
		$strExten = "SIP/analysys/268749#".$fono_alarma;
		//$strExten = "SIP/convergia-peru/".substr($fono_alarma,3,8);
}else{
		$strExten = "SIP/TrunkTenor/".$fono_alarma;
}

	
#specify the context to make the outgoing call from.  By default, AAH uses from-internal
#Using from-internal will make you outgoing dialing rules apply
$strContext = "discado-natural";
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

//echo $strExten;



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

}
}
//header( 'Location: http://'.$nombreurl.'/fin_llamado.php' ) ;

?>

<form name="formulario" method="post" action="http://<?=$nombreurl?>/app/cierre.php">
            <input type="hidden" name="msg_error" value="1">
</form>
		<script type="text/javascript">
    //Redireccionar con el formulario creado
   document.formulario.submit();
</script>

</body>
</html>

