<?
require("../conexion.php");
require("../nombre_pag.php");
$sql ="SELECT * FROM ejecutivos WHERE imei='" . $_GET["imei"] . "'";

$res=mysql_query($sql,$base); 
$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $gcmcode=$fila['gcmcode'];
		  $sms1=$fila['sms1'];
		  $sms2=$fila['sms2'];
		  $sms3=$fila['sms3'];
		  $sms4=$fila['sms4'];
		  $sms5=$fila['sms5'];
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


//SACO EL IMEI PARA NOTIFICAR.imei:
list($mensaje, $imei) =  split("imei:", $_GET["msg"], 2);

$fecha=$Anio."-".$mesdis."-".$diadis;
$fecha_alerta=$diadis."/".$mesdis."/".$Anio."  ".$hora.":".$min.":".$seg;
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SosClick</title>

<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.min.js"></script>
	        
</head>

<body class="sombra_interna" >
<div class="widht90 fcenter perfil">
<h1>Ubicacion Enviada</h1>
<br>
    <div class="widht90 fcenter">
		<a href="http://<?=$nombreurl?>/app/gracias_cel_01.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>"" target="_self">
		<input name="submit" type="button" value="Ir al Inicio" id="post_button" /></a>
	</div>
<br>


<?
if ($_GET["id"]<>'') {
	$sql2="update ejecutivos set gcmcode='".$_GET["id"]."',lon=".$_GET["longitud"].",lat=".$_GET["latitud"].",hora_ubicacion='".$fecha_alerta."'   WHERE imei='" . $_GET["imei"] . "'";
	$result = mysql_query($sql2,$base);


// MENSAJES GCM FIJOS
/***************************************************************************************************************************/
/*                                              Notificaciones para mi                                                      */
/***************************************************************************************************************************/
	//Ubico mis datos en la base de datos
	$sql = "SELECT login,gcmcode, dispositivo FROM ejecutivos WHERE gcmcode<>'' and imei='" . $imei . "' LIMIT 1";
	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
	{

	$dispositivo = $data["dispositivo"];
	//Envio los mensajes en caso de ser un dispositivo android
	if($dispositivo=='android'){
		$collapseKey = "101";
		$apiKey = 'AIzaSyAMha4T0QO6UFE2shJXUC2Ok3Ai-wgU90g';
		$messageText = "Mi ubicacion actual. imei:".$_GET["imei"];
		$userIdentificador = $data["gcmcode"];
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
	}else {
	
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
		
		echo 'Connected to APNS' . PHP_EOL;
		
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
		
		if (!$result)
			echo 'Message not delivered' . PHP_EOL;
		else
			echo 'Message successfully delivered' . PHP_EOL;
		
		// Close the connection to the server
		fclose($fp);

		
	}
	
	
	} 

}
?>
    <div class="widht90 fcenter">
<table width="100%" border="0" height="80%" cellspacing="0" cellpadding="0"  valign="middle">
  <tr>
    <td width="95%" height="370" colspan="6" align="center" valign="middle"  class="sombra_interna esquina_red_bot padding_bot">
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAHhzikxCQyRAS8ryQoB75mRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQiqBRnE1Iky5sZfKGxzYbUanZ0HA" type="text/javascript"></script>
    <script type="text/javascript">  
      
    function inicializar() {  
      
        if (GBrowserIsCompatible()) {  
            var map = new GMap2(document.getElementById("map"));  
            map.setCenter(new GLatLng(<?php echo $_GET['latitud']; ?>, <?php echo $_GET['longitud']; ?>), 15);  
        }  
        map.addOverlay(new GMarker(new GLatLng(<?php echo $_GET['latitud']; ?>, <?php echo $_GET['longitud']; ?>)));  
    }  
      
    </script> 
    <div id="map" style="width:90%; height:350px; margin-top:30px; ">  
    <script type="text/javascript">inicializar();</script>  
    </div>
	
	</td>

    </tr>
</table>



</div>





</body>
</html>

