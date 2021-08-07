<?php
require_once('./nombre_pag.php');
require_once('./conexion.php');
 
$sumador=0;
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
	if(isset($_POST['mensaje']))  		$messageText = str_replace("_", " ", $_POST['mensaje']);
	if(isset($_POST['correo']))  		$username = $_POST['correo'];
	if(isset($_POST['login']))  		$login = $_POST['login'];
	$collapseKey = "111";



if ($messageText<>''){


	$quien = $_POST['login'];



	$sql = "insert into mensajes (mensaje,grupo,fecha_hora,estado,enviador) values ('".$messageText."','".$username."','".$fecha."','0','".$quien."')";
	$result = mysql_query($sql,$base);


		//$message = new gcm();
	$apiKey = 'AIzaSyAMha4T0QO6UFE2shJXUC2Ok3Ai-wgU90g';

	$sql = "SELECT username, gcmcode FROM usuarios WHERE username='".$username."'";
	$result = mysql_query($sql,$base);

while($data=mysql_fetch_array($result)) 
{

	$userIdentificador = $data["gcmcode"];
   	$headers = array('Authorization:key=' . $apiKey);

   $data = array('registration_id' => $userIdentificador,'collapse_key' => $collapseKey,'data.mensaje_viene' => $messageText,'data.fecha' => $fecha);
  
   $ch = curl_init();
  
   curl_setopt($ch, CURLOPT_URL, "https://android.googleapis.com/gcm/send");
   if ($headers) {
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
  <meta charset="UTF-8">	
	<title>Privado</title> 
	
		<!--meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="jquery.mobile.structure-1.0.1.css" />

		<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>
		<link rel="stylesheet" href="jquery.mobile-1.0.1.css" /-->
		<link rel="stylesheet" type="text/css" href="resources/styles.css"/>
<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
</head> 
<body> 
    <div id="content1" class="content">
        <div id = "form" class="center">
<table align="center" width="100%"  height="100%" border="0" cellspacing="0" cellpadding="0" id="table4">
<FORM  name="volver" id="volver"  action="notificaciones.php" method="post" target="_self">  
<input type=hidden name=correo value="<?=$_POST["correo"]?>">
<input type=hidden name=login value="<?=$_POST["login"]?>">

	<tr>
    <td width="100%"  height="300"  align="center" >
	<input type=submit value=volver  class="bot_one"></td>
	</TR>
</form>



</TABLE>
</div></div>
</body>
</html>
