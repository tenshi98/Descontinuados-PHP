<?php
class users {
 //include_once 'conexion.php';
function __construct() {
  $con = mysql_connect("localhost", "root", "petland");  
  mysql_select_db("sosclick");
 }
 


 public function saveUser($username, $gcmcode, $login){
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

$sql10  ="select * from  ejecutivos where login= '" . stripslashes($login) . "'";
echo $sql10;
$res10=mysql_query($sql10); 
$numeroRegistros10=mysql_num_rows($res10); 


$response = array("success" => "0");
$sql1  ="select * from  usuarios where gcmcode= '" . stripslashes($gcmcode) . "'";
$res=mysql_query($sql1); 
$numeroRegistros=mysql_num_rows($res); 
 
   
  /* 
   $sql0  ="INSERT INTO log (fecha, contenido, codigo ) VALUES ('".$numeroRegistros."', '" . stripslashes($username)."   ". stripslashes($login). "', '" . stripslashes($gcmcode) . "')";
  $result = mysql_query($sql0); 
*/

if ($numeroRegistros==0 and $numeroRegistros10==1)  {



  $sql1  ="INSERT INTO usuarios (username, gcmcode, fecha, login_usuario ) VALUES ('" . stripslashes($username) . "', '" . stripslashes($gcmcode) . "', '" . stripslashes($fecha) . "', '" . stripslashes($login) . "')";
  $result1 = mysql_query($sql1);
 
  if(mysql_affected_rows() > 0)
   $response["success"] = "1";  

}
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
