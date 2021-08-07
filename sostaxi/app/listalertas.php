<!DOCTYPE html> 
<?php 
session_start();
require("../conexion.php");
require("../nombre_pag.php");

//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"]."<br>";

$sql ="SELECT * FROM ejecutivos WHERE imei='" . $_GET["imei"] . "'";

$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

?>
		<script language="javascript">
			alert("Los datos ingresados son erroneos, debera confirmar sus datos en el sitio,\n desintalar e instalar la aplicacion.");
			window.location = "http://<?=$nombreurl?>";
		</SCRIPT>
<?
}

$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $id_usuario=$fila['id_ejecutiv'];
		  $rut_usuario=$fila['rut'];
		  $gcmcode=$fila['gcmcode'];
		  $linea=$fila['linea'];
		}

if ($_GET["id"]!='') {
	$sql2="update ejecutivos set gcmcode='".$_GET["id"]."'   WHERE imei='" . $_GET["imei"] . "'";
	$result = mysql_query($sql2,$base);

}



$latitud=$_GET["latitud"];
$longitud=$_GET["longitud"];
$_SESSION['uid']=$id_usuario;






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




$sql2="SELECT * FROM mensajes WHERE estado=0 and id_alerta<>0 and grupo='".$linea."' ORDER BY id DESC LIMIT 0, 15"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head>
	<meta charset="UTF-8">	
	<title>Alertas</title> 
	<link href="../css/estilo.css" rel="stylesheet" type="text/css" />
	<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
</head>

<body > 




	<? 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) { 
	list($usuario, $msg) =   split("-->", $registro["mensaje"], 2);
$id_mensaje=$registro["id"]

	
	?>
<div class="msg_list" >
<div class="msg_content_priv" >
<table class="table_msg" >



<form id="notificacion<?=$registro["id"]?>" name="notificacion" method="POST" action="<?=$registro["link"]?>/app/alertas_ver.php">
<input type="hidden" name="latitud" value="<?=$latitud?>">
<input type="hidden" name="longitud" value="<?=$longitud?>">
<input type="hidden" name="id_mensaje" value="<?=$id_mensaje?>">
<input type="hidden" name="imei" value="<?=$_GET['imei']?>">
<input type="hidden" name="id" value="<?=$_GET['id']?>">
  <tr>
    <td width="75%" ><p><?php echo $msg; ?></p></td>
  </tr>
  <tr>
    <td width="75%"><p><?php echo $registro["fecha_hora"]; ?></p></td>
  </tr>
  <tr>

    <td width="75%"><input  type="submit" class="msg_button" id="post_button"" value="Ver" /></td>
  </tr>


</form>
</table>

</div></div></div>
<? }?>




</body>
</html>
