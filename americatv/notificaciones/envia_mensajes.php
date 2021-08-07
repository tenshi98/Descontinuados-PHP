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
	$sql = "SELECT login,gcmcode FROM ejecutivos WHERE gcmcode<>'' and grupo='".$username."' or login='".$username."'";
	$result = mysql_query($sql,$base);
while($data=mysql_fetch_array($result)) 
{
//  $data = mysql_fetch_array($result);
	//$user = new users();
	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);
	echo "apiKey ".$apiKey."<br>";
	echo "userIdentificador ".$userIdentificador."<br>";
	echo "messageText ".$messageText."<br>";
	echo "collapseKey ".$collapseKey."<br>";




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
 } 


?>
