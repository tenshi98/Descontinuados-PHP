<?php 
class gcm {
 
 function __construct() {
  $con = mysql_connect("localhost", "root", "petland");  
  mysql_select_db("jootes");


 }
 
 function sendMessageToPhone($collapseKey, $messageText, $username)
 {
  $data = mysql_fetch_array($result);
  $user = new users();
  $data = $user->getUser($username); 
  if($data != false){
  
   $apiKey = 'AIzaSyAMha4T0QO6UFE2shJXUC2Ok3Ai-wgU90g';
   
   $userIdentificador = $data["gcmcode"];
   
   $headers = array('Authorization:key=' . $apiKey);


echo "apiKey ".$apiKey."<br>";
echo "userIdentificador ".$userIdentificador."<br>";
echo "messageText ".$messageText."<br>";
echo "collapseKey ".$collapseKey."<br>";

$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "i" , $tiempo ); 
$seg= date ( "i" , $tiempo ); 
$hora=$hora.$min.$seg;

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
$fecha=$diadis."/".$mesdis."/".$Anio." ".$hora.":".$min.":".$seg;


   $data = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
  
   $ch = curl_init();
  
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
   if ($headers)
   curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
   curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  

   $response = curl_exec($ch);
   $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
   if (curl_errno($ch)) {
    return 'fail';
   }
   if ($httpCode != 200) {
    return 'status code 200';
   }
   curl_close($ch);
	return $response;
  } else {
   return 'no user';
  }
 } 
 
}

?>
