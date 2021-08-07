<?php
include_once 'users.php';
include_once 'gcm.php';
$tag = $_POST['tag'];

switch ($tag){
 case 'usersave':
  $username = "";
  $gcmcode = "";
  
  
  //if(isset($_GET['login']))        $username    = $_GET['login'];
  //if(isset($_GET['password']))     $nombre      = $_GET['password'];
  	if(isset($_POST['gcmcode']))     $gcmcode     = $_POST['gcmcode'];
 	$grupo = $_POST['grupo'];
//Se consultan los datos 
$sql_id = "select login, nom_ejecutiv from ejecutivos where gcmcode='".$gcmcode."'";
$result_id = mysql_query($sql_id);
//se verifica que el equipo sea el mismo que con el que se ingreso la ultima vez
$revision = mysql_num_rows($result_id);
if($revision != 0){
	while($registro_id=mysql_fetch_array($result_id)) { 
		$username = $registro_id["login"];
		$nombre   = $registro_id["nom_ejecutiv"];
	}
}

  $user = new users();
  echo $user->saveUser($username, $gcmcode, $grupo, $nombre);
  break;


 case 'sendmessage':
{ 
	$username = "";
	$message = "";
	$collapseKey = "";
	if(isset($_POST['message']))        $messageText   = $_POST['message'];
	if(isset($_POST['username']))       $username      = $_POST['username'];
	if(isset($_POST['collapsekey']))    $collapseKey   = $_POST['collapsekey'];
/*
  $sql = "SELECT username, gcmcode FROM usuarios WHERE username='".$username."'";
  $result = mysql_query($sql);
 // if(mysql_num_rows($result) > 0){
	while($data=mysql_fetch_array($result)) 
		$message = new gcm();
		echo $message->sendMessageToPhone($collapseKey, $messageText, $username);
 

//}
*/
//Se consultan los datos 
$sql_id = "select login, gcmcode from ejecutivos where login='".$username."'";
$result_id = mysql_query($sql_id);

	while($registro_id=mysql_fetch_array($result_id)) { 
		$message = new gcm();
		echo $message->sendMessageToPhone($collapseKey, $messageText, $username);
	}

  }//fin de case

 break;
 default:
   $response = array("success" => "0", "err" => "no tag");
  echo json_encode($response);
  break; 
	  
}


?>
