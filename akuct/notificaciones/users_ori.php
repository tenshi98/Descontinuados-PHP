<?php
class users {
 
 function __construct() {
  $con = mysql_connect("localhost", "root", "petland");  
  mysql_select_db("notificaciones_android");
 }
 


 public function saveUser($username, $gcmcode){
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
$fecha=$Anio.$mesdis.$diadis;

  $response = array("success" => "0");
// $sql  ="INSERT INTO usuarios (username, gcmcode) VALUES ('" . stripslashes($username) . "', '" . stripslashes($gcmcode) . "') ON DUPLICATE KEY UPDATE gcmcode = '" . stripslashes($gcmcode)."'";
  $sql  ="INSERT INTO usuarios (username, gcmcode, fecha ) VALUES ('" . stripslashes($username) . "', '" . stripslashes($gcmcode) . "', '" . stripslashes($fecha) . "')";
  
  $result = mysql_query($sql);
  if(mysql_affected_rows() > 0)
   $response["success"] = "1";  
  
  return json_encode($response);
 }
 
 public function getUser($username){
  $response = array("success" => 0);
  
  $sql = "SELECT username, gcmcode FROM usuarios WHERE username='".stripslashes($username)."'";
  $result = mysql_query($sql);
  if(mysql_num_rows($result) > 0){
while($data=mysql_fetch_array($result)) 
{ 

  $data = mysql_fetch_array($result);
   
   return $data;

}
  } else 
   return false;  
 }
}
?>
