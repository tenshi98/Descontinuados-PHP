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

$dias = array("dom","lun","mar","mie","jue","vie","sab");
$dia_control=$dias[date('w')];

switch ($dia_control) {
    case "lun":
        $sql00 = "select * from alarmas where hora='".$hora."' and minuto='".$min."' and lun='1'";
        break;
    case "mar":
        $sql00 = "select * from alarmas where hora='".$hora."' and minuto='".$min."' and mar='1'";
        break;
    case "mie":
        $sql00 = "select * from alarmas where hora='".$hora."' and minuto='".$min."' and mie='1'";
        break;
    case "jue":
        $sql00 = "select * from alarmas where hora='".$hora."' and minuto='".$min."' and jue='1'";
        break;
    case "vie":
        $sql00 = "select * from alarmas where hora='".$hora."' and minuto='".$min."' and vie='1'";
        break;
    case "sab":
        $sql00 = "select * from alarmas where hora='".$hora."' and minuto='".$min."' and sab='1'";
        break;
    case "dom":
        $sql00 = "select * from alarmas where hora='".$hora."' and minuto='".$min."' and dom='1'";
        break;
}

	$result00 = mysql_query($sql00,$base);
	while($perfil_alarma=mysql_fetch_array($result00))
		{
			$messageText=$perfil_alarma["mensaje"]; 
			$idusuario_ala=$perfil_alarma["idusuario_ala"];

 	$username = "";
	$message = "";
	$collapseKey = "111";
	//$sql = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link) values ('".$messageText."','".$idusuario_ala."','".$fecha."','0','')";
	//$result = mysql_query($sql,$base);

		//$message = new gcm();
	$apiKey = 'AIzaSyAMha4T0QO6UFE2shJXUC2Ok3Ai-wgU90g';
	$sql = "SELECT username, gcmcode FROM usuarios WHERE login_usuario='".$idusuario_ala."'";
	$result = mysql_query($sql,$base);
	while($data=mysql_fetch_array($result)) 
		{
			$userIdentificador = $data["gcmcode"];
   			$headers = array('Authorization:key=' . $apiKey);
			$data = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
  			$ch = curl_init();
  
			curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
			if ($headers) {
				echo "apiKey ".$apiKey."<br>";
				echo "userIdentificador ".$userIdentificador."<br>";
				echo "messageText ".$messageText."<br>";

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
}
?>
