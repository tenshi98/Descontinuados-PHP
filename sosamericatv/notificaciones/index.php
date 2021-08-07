<?php

include_once 'users.php';
include_once 'gcm.php';
$tag = $_POST['tag'];

switch ($tag){
 case 'usersave':




  $username = "";
  $gcmcode = "";
  if(isset($_POST['username'])) $username = $_POST['username'];
  if(isset($_GET['login'])) $login = $_GET['login'];
  if(isset($_POST['gcmcode'])) $gcmcode = $_POST['gcmcode'];

  
  $user = new users();
  echo $user->saveUser($username, $gcmcode, $login);
  break;


 case 'sendmessage':


{ 
	$username = "";
	$message = "";
	$collapseKey = "";
	if(isset($_POST['message']))
		$messageText = $_POST['message'];
	if(isset($_POST['username']))
		$username = $_POST['username'];
	if(isset($_POST['collapsekey']))
		$collapseKey = $_POST['collapsekey'];

  $sql = "SELECT username, gcmcode FROM usuarios WHERE username='".$username."'";
  $result = mysql_query($sql);
 // if(mysql_num_rows($result) > 0){
	while($data=mysql_fetch_array($result)) 
		$message = new gcm();
		echo $message->sendMessageToPhone($collapseKey, $messageText, $username);
 
  }
//}
 break;
 default:
   $response = array("success" => "0", "err" => "no tag");
  echo json_encode($response);
  break; 
	  
}
?>
