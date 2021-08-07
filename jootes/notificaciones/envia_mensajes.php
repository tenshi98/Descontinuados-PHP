<?php
require_once('../nombre_pag.php');
require_once('../conexion.php');

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
	if(isset($_POST['message']))  		$mensaje        = $_POST['message'];
	if(isset($_POST['username']))  		$username       = $_POST['username'];
	if(isset($_POST['grupo']))  		$grupo          = $_POST['grupo'];
	if(isset($_POST['collapsekey']))  	$collapseKey    = $_POST['collapsekey'];
	if(isset($_POST['link']))  			$link           = $_POST['link'];
	if(isset($_POST['room']))  			$room           = $_POST['room'];
	if(isset($_POST['tipo']))  			$tipo           = $_POST['tipo'];
	if(isset($_POST['enviador']))  		$enviador       = $_POST['enviador'];

//se revisa desde donde viene la invitacion y se separan los caracteres	
$pos = strpos($mensaje, "Tienes una Invitacion al Chat de jOOtes");
if ($pos == false) {
	$messageText=$mensaje;
} else {
	list($sala, $messageText) = split("-", $mensaje, 2);
} 


if($grupo<>'') {
	$sql = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,puntos_visita,enviador) values ('".$messageText."','".$grupo."','".$fecha."','1','".$link."',".$_POST['puntos'].",'Jootes')";
}
if($username<>'') {
	$sql = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,puntos_visita,enviador) values ('".$sala."-".$messageText."','".$username."','".$fecha."','1','".$link."',".$_POST['puntos'].",'".$enviador."')";
}

	$result = mysql_query($sql,$base);


		//$message = new gcm();
	$apiKey = 'AIzaSyAMha4T0QO6UFE2shJXUC2Ok3Ai-wgU90g';

if($username<>'') {
	$sql = "SELECT login, id_ejecutiv, gcmcode FROM ejecutivos WHERE login='".$username."'";
}
if($grupo<>'') {
	$sql = "SELECT login, id_ejecutiv, gcmcode FROM ejecutivos WHERE grupo='".$grupo."'";
}
	$result = mysql_query($sql,$base);

while($data=mysql_fetch_array($result)) 
{
	$sumador=$sumador+1;
//  $data = mysql_fetch_array($result);
	//$user = new users();
	$userIdentificador = $data["gcmcode"];
	$id_contacto = $data["id_ejecutiv"];
   	$headers = array('Authorization:key=' . $apiKey);
	/*echo "apiKey ".$apiKey."<br>";
	echo "userIdentificador ".$userIdentificador."<br>";
	echo "messageText ".$messageText."<br>";
	echo "collapseKey ".$collapseKey."<br>";

*/


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

if ($tipo=='chat') {?>

<style>
#post_button {
	background-color: #52a8e8;
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #52a8e8), color-stop(100%, #377ad0));
	background-image: -webkit-linear-gradient(top, #52a8e8, #377ad0);
	background-image: -moz-linear-gradient(top, #52a8e8, #377ad0);
	background-image: -ms-linear-gradient(top, #52a8e8, #377ad0);
	background-image: -o-linear-gradient(top, #52a8e8, #377ad0);
	background-image: linear-gradient(top, #52a8e8, #377ad0);
	border-top: 1px solid #4081af;
	border-right: 1px solid #2e69a3;
	border-bottom: 1px solid #20559a;
	border-left: 1px solid #2e69a3;
	-webkit-border-radius: 16px;
	-moz-border-radius: 16px;
	border-radius: 16px;
	color: #fff;
	font: normal 18px "lucida grande", sans-serif;
	line-height: 1;
	text-align: center;
	text-shadow: 0px -1px 1px #3275bc;
	width: 100%;
	-webkit-background-clip: padding-box;
	padding-top: 8px;
	padding-right: 5px;
	padding-bottom: 8px;
	padding-left: 5px;
	margin-top: 8px;
}
#post_button:hover {
    background-color: #3e9ee5;
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #3e9ee5), color-stop(100%, #206bcb));
    background-image: -webkit-linear-gradient(top, #3e9ee5 0%, #206bcb 100%);
    background-image: -moz-linear-gradient(top, #3e9ee5 0%, #206bcb 100%);
    background-image: -ms-linear-gradient(top, #3e9ee5 0%, #206bcb 100%);
    background-image: -o-linear-gradient(top, #3e9ee5 0%, #206bcb 100%);
    background-image: linear-gradient(top, #3e9ee5 0%, #206bcb 100%);
    border-top: 1px solid #2a73a6;
    border-right: 1px solid #165899;
    border-bottom: 1px solid #07428f;
    border-left: 1px solid #165899;
    -webkit-box-shadow: inset 0 1px 0 0 #62b1e9;
    -moz-box-shadow: inset 0 1px 0 0 #62b1e9;
    box-shadow: inset 0 1px 0 0 #62b1e9;
    cursor: pointer;
    text-shadow: 0 -1px 1px #1d62ab;
    -webkit-background-clip: padding-box; }
#post_button:active {
    background: #3282d3;
    border: 1px solid #154c8c;
    border-bottom: 1px solid #0e408e;
    -webkit-box-shadow: inset 0 0 6px 3px #1657b5, 0 1px 0 0 white;
    -moz-box-shadow: inset 0 0 6px 3px #1657b5, 0 1px 0 0 white;
    box-shadow: inset 0 0 6px 3px #1657b5, 0 1px 0 0 white;
    text-shadow: 0 -1px 1px #2361a4;
    -webkit-background-clip: padding-box; }
</style>

<div align=center>
<br><br><br><br><br><br><br>
 <form name="formuchat" method="post" action="http://www.jootes.cl/app/chat.php?room=<?php echo $room?>&id=<?php echo $_POST["id_usuario"]?>">
<input type="hidden" name="login" id="login" value='<?=$_GET["login"]?>'  >
<input name="chatat" type="submit" class="bot_red_med" id="post_button"  value="Invitacion enviada, continuar" />
  </form>
</div>
<?php 
//inserta un listado con los chat en los cuales se ha participado
//ejecuto la consulta
$datestamp    = $stime=date("Y-m-d");
$query  = "INSERT INTO `ejecutivos_chats` (mandante, cliente,fecha) VALUES ('".$_POST["id_usuario"]."', '$id_contacto', '$datestamp')";
$result = mysql_query($query,$base); ?>                     


	
<?php }else{ ?>
<div align=center>
<br><br><br><br><br><br><br>
<input name="button5" type="submit" class="bot_red_med" id="button5" onclick="javascript:window.location.href='http://<?=$nombreurl?>/notificaciones/mensajes.php';" value="Mensajes Enviados: <?php echo $sumador; ?>, Volver" />
</div>
<?}?>
