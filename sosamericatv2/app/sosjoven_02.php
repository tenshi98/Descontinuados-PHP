
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
		  $fono_alarma=$fila["fono_alarma"];
		}

$latitud=$_GET["latitud"];
$longitud=$_GET["longitud"];
$tipo=$_GET["activacion"];
$sender = 'sosamerica';

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
$sql2="update ejecutivos set gcmcode='".$_GET["id"]."',lon=".$_GET["longitud"].",lat=".$_GET["latitud"].",hora_ubicacion='".$fecha_alerta."'   WHERE imei='" . $_GET["imei"] . "'";
$result = mysql_query($sql2,$base);


// MENSAJES GCM FIJOS

if ($tipo=="ubicacion") {
$messageText = "**.".$nombre.", Envia su ubicacion. imei:".$_GET["imei"];
}

if ($tipo=="llegue") {
$messageText = "**.".$nombre.", Llego a destino. imei:".$_GET["imei"];
}

if ($tipo=="transporte") {
$messageText = "**.".$nombre.", Requiere Transporte. imei:".$_GET["imei"];
}

if ($tipo=="llamame") {
$messageText = "**.".$nombre.", Necesita lo contacten. imei:".$_GET["imei"];
}

$link = "http://".$nombreurl;
$apiKey = $nombrebase_datos;

// MENSAJES GCM FIJOS

/***************************************************************************************************************************/
/*                                    Notificacines para el primero contacto                                               */
/***************************************************************************************************************************/
if ($sms1!='0') {
	$sms=$sms1;
	$sql = "SELECT login,gcmcode, dispositivo FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $sms . "' LIMIT 1";
	$result = mysql_query($sql,$base);

	while($data=mysql_fetch_array($result)) 
	{
			$collapseKey=rand(1,100);
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
/***************************************************************************************************************************/	
	$userIdentificador = $data["gcmcode"];
	$dispositivo = $data["dispositivo"];
	//Envio los mensajes en caso de ser un dispositivo android
	if($dispositivo=='android'){
$collapseKey = rand(1,100);
		$headers = array('Authorization:key=' . $apiKey);
		$data = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
			if ($headers) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$response = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
	
			}

	//Envio los mensajes en caso de ser un dispositivo iphone	
	}else{
	
		// ID del dispositivo, similar al gcm de google
		$deviceToken = $userIdentificador;
		
		// Clave de la llave con la que se genero la aplicacion
		$passphrase = 'inicio1*';
		
		// Mensaje
		$message = $messageText;
		
		////////////////////////////////////////////////////////////////////////////////
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', 'Sosclick.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
			'ssl://gateway.sandbox.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		
		if (!$fp)
			exit("Failed to connect: $err $errstr" . PHP_EOL);
		
		//echo 'Connected to APNS' . PHP_EOL;
		
		// Create the payload body
		$body['aps'] = array(
			'alert' => $message,
			'sound' => 'default'
			);
		
		// Encode the payload as JSON
		$payload = json_encode($body);
		
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
		
		/*if (!$result)
			echo 'Message not delivered' . PHP_EOL;
		else
			echo 'Message successfully delivered' . PHP_EOL;
		*/
		
		// Close the connection to the server
		fclose($fp);
	
	}	
	
	
	}
}
/***************************************************************************************************************************/
/*                                    Notificacines para el segundo contacto                                               */
/***************************************************************************************************************************/
if ($sms2!='0') {
	$sms=$sms2;
	$sql = "SELECT login,gcmcode, dispositivo FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $sms . "' LIMIT 1";
	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
	{
			$collapseKey=rand(1,100);
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
/***************************************************************************************************************************/	
	$userIdentificador = $data["gcmcode"];
	$dispositivo = $data["dispositivo"];
	//Envio los mensajes en caso de ser un dispositivo android
	if($dispositivo=='android'){
$collapseKey = rand(1,100);
		$headers = array('Authorization:key=' . $apiKey);
		$data = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
			if ($headers) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$response = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
	
			}

	//Envio los mensajes en caso de ser un dispositivo iphone	
	}else{
	
		// ID del dispositivo, similar al gcm de google
		$deviceToken = $userIdentificador;
		
		// Clave de la llave con la que se genero la aplicacion
		$passphrase = 'inicio1*';
		
		// Mensaje
		$message = $messageText;
		
		////////////////////////////////////////////////////////////////////////////////
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', 'Sosclick.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
			'ssl://gateway.sandbox.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		
		if (!$fp)
			exit("Failed to connect: $err $errstr" . PHP_EOL);
		
		//echo 'Connected to APNS' . PHP_EOL;
		
		// Create the payload body
		$body['aps'] = array(
			'alert' => $message,
			'sound' => 'default'
			);
		
		// Encode the payload as JSON
		$payload = json_encode($body);
		
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
		
		/*if (!$result)
			echo 'Message not delivered' . PHP_EOL;
		else
			echo 'Message successfully delivered' . PHP_EOL;
		*/
		
		// Close the connection to the server
		fclose($fp);
	
	}	
	
	
	} 
}
/***************************************************************************************************************************/
/*                                     Notificacines para el tercer contacto                                               */
/***************************************************************************************************************************/
if ($sms3!='0') {
	$sms=$sms3;
	$sql = "SELECT login,gcmcode, dispositivo FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $sms . "' LIMIT 1";
	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
	{
			$collapseKey=rand(1,100);
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
/***************************************************************************************************************************/	
	$userIdentificador = $data["gcmcode"];
	$dispositivo = $data["dispositivo"];
	//Envio los mensajes en caso de ser un dispositivo android
	if($dispositivo=='android'){
$collapseKey = rand(1,100);
		$headers = array('Authorization:key=' . $apiKey);
		$data = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
			if ($headers) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$response = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
	
			}

	//Envio los mensajes en caso de ser un dispositivo iphone	
	}else{
	
		// ID del dispositivo, similar al gcm de google
		$deviceToken = $userIdentificador;
		
		// Clave de la llave con la que se genero la aplicacion
		$passphrase = 'inicio1*';
		
		// Mensaje
		$message = $messageText;
		
		////////////////////////////////////////////////////////////////////////////////
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', 'Sosclick.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
			'ssl://gateway.sandbox.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		
		if (!$fp)
			exit("Failed to connect: $err $errstr" . PHP_EOL);
		
		//echo 'Connected to APNS' . PHP_EOL;
		
		// Create the payload body
		$body['aps'] = array(
			'alert' => $message,
			'sound' => 'default'
			);
		
		// Encode the payload as JSON
		$payload = json_encode($body);
		
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
		
		/*if (!$result)
			echo 'Message not delivered' . PHP_EOL;
		else
			echo 'Message successfully delivered' . PHP_EOL;
		*/
		
		// Close the connection to the server
		fclose($fp);
	
	}	
	

	
	} 
}
/***************************************************************************************************************************/
/*                                     Notificacines para el cuarto contacto                                               */
/***************************************************************************************************************************/
if ($sms4!='0') {
	$sms=$sms4;
	$sql = "SELECT login,gcmcode, dispositivo FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $sms . "' LIMIT 1";

	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
	{
			$collapseKey=rand(1,100);
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";

	$result_01 = mysql_query($sql_01,$base);
/***************************************************************************************************************************/	
	$userIdentificador = $data["gcmcode"];
	$dispositivo = $data["dispositivo"];

	//Envio los mensajes en caso de ser un dispositivo android
	if($dispositivo=='android'){
$collapseKey = rand(1,100);
		$headers = array('Authorization:key=' . $apiKey);
		$data = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
			if ($headers) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$response = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
	
			}

	//Envio los mensajes en caso de ser un dispositivo iphone	
	}else{
	
		// ID del dispositivo, similar al gcm de google
		$deviceToken = $userIdentificador;

		// Clave de la llave con la que se genero la aplicacion
		$passphrase = 'inicio1*';
		
		// Mensaje
		$message = $messageText;
	
		////////////////////////////////////////////////////////////////////////////////
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', 'Sosclick.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
			'ssl://gateway.sandbox.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		
		if (!$fp)
			exit("Failed to connect: $err $errstr" . PHP_EOL);
		
		//echo 'Connected to APNS' . PHP_EOL;
		
		// Create the payload body
		$body['aps'] = array(
			'alert' => $message,
			'sound' => 'default'
			);
		
		// Encode the payload as JSON
		$payload = json_encode($body);
		
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
		
		/*if (!$result)
			echo 'Message not delivered' . PHP_EOL;
		else
			echo 'Message successfully delivered' . PHP_EOL;
		*/
		
		// Close the connection to the server
		fclose($fp);

	}	

	} 
}
/***************************************************************************************************************************/
/*                                     Notificacines para el quinto contacto                                               */
/***************************************************************************************************************************/
if ($sms5!='0') {
	$sms=$sms5;
	$sql = "SELECT login,gcmcode, dispositivo FROM ejecutivos WHERE gcmcode<>'' and fono_ejecutiv='09" . $sms . "' LIMIT 1";
	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
	{
			$collapseKey=rand(1,100);
	$sql_01 = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,id_alerta) values ('".$messageText."','".$data["login"]."','".$fecha_alerta."','0','".$link."',".$id_activacion.")";
	$result_01 = mysql_query($sql_01,$base);
/***************************************************************************************************************************/	
	$userIdentificador = $data["gcmcode"];
	$dispositivo = $data["dispositivo"];
	//Envio los mensajes en caso de ser un dispositivo android
	if($dispositivo=='android'){
$collapseKey = rand(1,100);
		$headers = array('Authorization:key=' . $apiKey);
		$data = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
			if ($headers) {
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$response = curl_exec($ch);
			$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
	
			}

	//Envio los mensajes en caso de ser un dispositivo iphone	
	}else{
	
		// ID del dispositivo, similar al gcm de google
		$deviceToken = $userIdentificador;
		
		// Clave de la llave con la que se genero la aplicacion
		$passphrase = 'inicio1*';
		
		// Mensaje
		$message = $messageText;
		
		////////////////////////////////////////////////////////////////////////////////
		
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', 'Sosclick.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
			'ssl://gateway.sandbox.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		
		if (!$fp)
			exit("Failed to connect: $err $errstr" . PHP_EOL);
		
		//echo 'Connected to APNS' . PHP_EOL;
		
		// Create the payload body
		$body['aps'] = array(
			'alert' => $message,
			'sound' => 'default'
			);
		
		// Encode the payload as JSON
		$payload = json_encode($body);
		
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
		
		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));
		
		/*if (!$result)
			echo 'Message not delivered' . PHP_EOL;
		else
			echo 'Message successfully delivered' . PHP_EOL;
		*/
		
		// Close the connection to the server
		fclose($fp);
		
	}	

	} 
}
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>SosClick</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body class="fondo_gris">

<table class="fondo_gris" width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
  </table>
<script type="text/javascript">
window.onload=function(){MainActivity.getFromWebView7()};
</script>

</body>
</html>

