<?php 
class gcm {
 
 function __construct() {
  $con = mysql_connect("localhost", "root", "petland");
  mysql_select_db("jootes");
 }
 
 function sendMessageToPhone($collapseKey, $messageText, $username)
 {
  include_once 'users.php';
  $user = new users();
  $data = $user->getUser($username); 
  if($data != false){
  
   $apiKey = 'AIzaSyBTQvlKOQBiQ6BcOzD_2HmZQlUaUyUlGSs';
   
   $userIdentificador = $data["gcmcode"];
   
   $headers = array('Authorization:key=' . $apiKey);
   $data = array(
     'registration_ids' => $userIdentificador,
     'collapse_key' => $collapseKey,
     'data.mensaje_empresa' => $messageText);
  
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