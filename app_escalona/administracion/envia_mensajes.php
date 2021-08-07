<?php

require("../notificaciones/nombre_pag.php");
require("../notificaciones/conexion.php");


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
	$messageText = "ESTE ES UN ENVIO DE PRUEBAS";

$collapseKey = "1234";
$link = "http://www.juntossomosmas.cl";
$categoria = "1";
$subcategoria = "1";

	$sql = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,categoria,subcategoria) values ('".$messageText."','".$username."','".$fecha."','0','".$link."',".$categoria.",".$subcategoria.")";
	$result = mysql_query($sql,$base);

	$sql = "SELECT Gsm,Imei FROM clientes_listado WHERE Gsm<>''";
	$resultatdo = mysql_query($sql,$base);
while($data=mysql_fetch_array($resultatdo)) 
{
//  $data = mysql_fetch_array($result);
	//$user = new users();
	$userIdentificador = $data["Gsm"];
   	$headers = array('Authorization:key=' . $apiKey);
	echo "apiKey ".$apiKey."<br>";
	echo "userIdentificador ".$data["Imei"]."<br>";
	echo "messageText ".$messageText."<br>";
	echo "collapseKey ".$collapseKey."<br>";


			$data_and = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.msj_sos' => $messageText,'data.fecha' => $fecha);
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

	
 } 


?>

  </body>
<!-- InstanceEnd --></html>