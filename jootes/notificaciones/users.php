<?php
class users {
 
 function __construct() {
  $con = mysql_connect("localhost", "root", "petland");  
  mysql_select_db("jootes");
 }
 


public function saveUser($username, $gcmcode, $grupo, $nombre){
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
//selecciono solo un dato para contar la cantidad de registros
$sql="select gcmcode from  ejecutivos where gcmcode= '" . stripslashes($gcmcode) . "'";
$res=mysql_query($sql); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {
  
  $sql  ="INSERT INTO ejecutivos (nom_ejecutiv, gcmcode, fecha_ingreso, grupo, nombre ) VALUES ('".stripslashes($username)."', '".stripslashes($gcmcode)."', '".stripslashes($fecha)."', '".stripslashes($grupo)."','".stripslashes($nombre)."')";
  $result = mysql_query($sql);
 
  if(mysql_affected_rows() > 0){
   $response["success"] = "1";  
	}
}
 return json_encode($response);
 }
 
 public function getUser($username){
  $response = array("success" => 0);
  
  $sql = "SELECT nom_ejecutiv, gcmcode FROM ejecutivos WHERE nom_ejecutiv='".stripslashes($username)."' and grupo='" . stripslashes($grupo) . "'";
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
