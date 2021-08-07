<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once('./nombre_pag.php');
require_once('./conexion.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="./favicon.ico" type="image/x-icon">

<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>

</head >
<?php 
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
	if(isset($_POST['message']))  		$messageText = $_POST['message'];
	if(isset($_POST['username']))  		$username = $_POST['username'];
	if(isset($_POST['grupo']))  		$grupo = $_POST['grupo'];
	if(isset($_POST['collapsekey']))  	$collapseKey = $_POST['collapsekey'];
	if(isset($_POST['link']))  			$link = $_POST['link'];

if($grupo<>'') {
	$sql = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,puntos_visita,enviador) values ('".$messageText."','".$grupo."','".$fecha."','0','".$link."',".$_POST['puntos'].",'chatpush')";
}
if($username<>'') {
	$sql = "insert into mensajes (mensaje,grupo,fecha_hora,estado,link,puntos_visita,enviador) values ('".$messageText."','".$username."','".$fecha."','1','".$link."',".$_POST['puntos'].",'chatpush')";
}

	$result = mysql_query($sql,$base);


		//$message = new gcm();
	$apiKey = 'AIzaSyAMha4T0QO6UFE2shJXUC2Ok3Ai-wgU90g';

if($username<>'') {
	$sql = "SELECT username, gcmcode FROM usuarios WHERE username='".$username."'";
}
if($grupo<>'') {
	$sql = "SELECT username, gcmcode FROM usuarios WHERE grupo='".$grupo."'";
}
	$result = mysql_query($sql,$base);

while($data=mysql_fetch_array($result)) 
{
	$sumador=$sumador+1;
//  $data = mysql_fetch_array($result);
	//$user = new users();
	$userIdentificador = $data["gcmcode"];
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


?>
<div align=center>
<br><br><br><br><br><br><br>
<input name="button5" type="submit" class="bot_red_med" id="button5" onclick="javascript:window.location.href='http://<?=$nombreurl?>/mensajes.php';" value="Mensajes Enviados: <?=$sumador?>, Volver" />
</div>

