<?php 
require_once('../conexion.php');
$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "i" , $tiempo ); 
$seg= date ( "i" , $tiempo ); 
$hora_muestra=$hora.":".$min.":".$seg;

$Fecha=getdate(); 

$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes < 10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia < 10) {
	$diadis="0".$Dia;
}else{
	$diadis=$Dia;
}
$fecha=$diadis."/".$mesdis."/".$Anio."  ".$hora_muestra;
	$sql = "select id from mensajes order by id desc limit 1";
	$result = mysql_query($sql,$base);
	$data=mysql_fetch_array($result);
	$ultimo_id=$data["id"]+1;



list($messageText, $username, $yo) =   split("3xyzxyz3", $_GET['mensaje'], 3);



$messageText = str_replace("'", "", $messageText);
$username = str_replace("'", "", $username);
$yo = str_replace("'", "", $yo);
$collapsekey = $ultimo_id;
$link ="http://empresa.opinalo.cl/migrupo.php";
$sql = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,categoria,subcategoria,enviador) values ('".$messageText."','".$username."','".$fecha."','0','".$link."',99,99,".$yo.")";

echo $sql ;
$result = mysql_query($sql,$base);

/***************************************************************************************************************************/
/*                                              Notificaciones para mi                                                      */
/***************************************************************************************************************************/
	//Ubico mis datos en la base de datos
	$apiKey = 'AIzaSyCD-j4kI83UFJWbLkFo5hth3m7FRqMsZ7I';



	$sql0 = "SELECT mi_id FROM ejecutivo_seguidores WHERE id_sigo=".$username." and tipo='G'";
	$result0 = mysql_query($sql0,$base);
		
	//Genero el mensaje y lo inserto en el listado de mensajes
	while($data00=mysql_fetch_array($result0)) 
	{


	$sql = "SELECT dispositivo,login,gcmcode FROM ejecutivos WHERE gcmcode<>'' and id_ejecutiv=".$data00["mi_id"];
	$result = mysql_query($sql,$base);
	$data0=mysql_fetch_array($result);
/***************************************************************************************************************************/	
	$userIdentificador = $data0["gcmcode"];
	$dispositivo = $data0["dispositivo"];
	//Envio los mensajes en caso de ser un dispositivo android
	if($dispositivo=='android'){

		$headers = array('Authorization:key=' . $apiKey);
		$data = array('registration_id' => $userIdentificador,'collapse_key' => $collapsekey,'data.mensaje_psvirtual' => $messageText);
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
		stream_context_set_option($ctx, 'ssl', 'local_cert', 'JuntosSomosMas_dev.pem');
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


?>
