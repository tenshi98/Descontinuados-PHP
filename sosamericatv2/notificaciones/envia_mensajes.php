<?php 
require_once('conexion.php');
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


 	$username = "";
	$message = "";
	$collapseKey = "";
	if(isset($_POST['message']))  		$messageText = $_POST['message'];
	if(isset($_POST['username']))  		$username = $_POST['username'];
	if(isset($_POST['collapsekey']))  	$collapseKey = $_POST['collapsekey'];
	if(isset($_POST['link']))  			$link = $_POST['link'];
	if(isset($_POST['categoria']))  			$categoria = $_POST['categoria'];
		if(isset($_POST['subcategoria']))  			$subcategoria = $_POST['subcategoria'];

	$sql = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,categoria,subcategoria) values ('".$messageText."','".$username."','".$fecha."','0','".$link."',".$categoria.",".$subcategoria.")";
	$result = mysql_query($sql,$base);

		//$message = new gcm();
	$apiKey = 'AIzaSyAMha4T0QO6UFE2shJXUC2Ok3Ai-wgU90g';
	$sql = "SELECT login,gcmcode,dispositivo FROM ejecutivos WHERE gcmcode<>'' and grupo='".$username."' or login='".$username."'";
	$resultatdo = mysql_query($sql,$base);
while($data=mysql_fetch_array($resultatdo)) 
{
//  $data = mysql_fetch_array($result);
	//$user = new users();
	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);
	$dispositivo = $data["dispositivo"];
	echo "apiKey ".$apiKey."<br>";
	echo "userIdentificador ".$userIdentificador."<br>";
	echo "messageText ".$messageText."<br>";
	echo "collapseKey ".$collapseKey."<br>";
	echo "dispositivo ".$dispositivo."<br>";

	if($dispositivo=='android'){

			$data_and = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
			if ($headers) {
				curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data_and);
				$response = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
				curl_close($ch);
			}

	}else{
		// ID del dispositivo, similar al gcm de google
		$deviceToken = $userIdentificador;
		// Clave de la llave con la que se genero la aplicacion
		$passphrase = 'inicio1*';
		// Mensaje
		$message = $messageText;
		////////////////////////////////////////////////////////////////////////////////
		$ctx = stream_context_create();
		stream_context_set_option($ctx, 'ssl', 'local_cert', '../app/Sosclick.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
		
		// Open a connection to the APNS server
		$fp = stream_socket_client(
			'ssl://gateway.sandbox.push.apple.com:2195', $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
		
		if (!$fp) { exit("Failed to connect: $err $errstr" . PHP_EOL);	}
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
		
		if (!$result) {
			echo 'Message not delivered' . PHP_EOL;
		}else{
			echo 'Message successfully delivered' . PHP_EOL;
		}
		// Close the connection to the server
		fclose($fp);
	
	}
 } 


?>
