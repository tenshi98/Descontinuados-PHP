<?php
class users {
 
 function __construct() {
  $con = mysql_connect("localhost", "root", "petland");  
  mysql_select_db("jootes");
 }
 
 public function saveUser($username, $gcmcode){
  $response = array("success" => "0");
  $sql  ="INSERT INTO usuarios (username, gcmcode) VALUES ('" . stripslashes($username) . "', '" . stripslashes($gcmcode) . "') 
    ON DUPLICATE KEY UPDATE gcmcode = '" . stripslashes($gcmcode)."' ; ";
  
  $result = mysql_query($sql);
  if(mysql_affected_rows() > 0)
   $response["success"] = "1";  
  
  return json_encode($response);
 }
 
 public function getUser($username){
  $response = array("success" => 0);
  
  $sql = "SELECT username, gcmcode
    FROM usuarios 
    WHERE username='".stripslashes($username)."';";
  $result = mysql_query($sql);
  if(mysql_num_rows($result) > 0){
   $data = mysql_fetch_array($result);
   
   return $data;
  } else 
   return false;  
 }
}
?>