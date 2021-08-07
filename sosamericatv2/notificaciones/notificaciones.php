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
		</SCRIPT>
<form name="formulario" method="post" action="http://<?=$nombreurl?>/app/pide_rut.php?longitud=<?=$_GET["longitud"]?>&latitud=<?=$_GET["latitud"]?>&imei=<?=$_GET["imei"]?>&id=<?=$_GET["id"]?>&dispositivo=<?=$_GET["dispositivo"]?>">
            <input type="hidden" name="msg_error" value="1">
</form>
		<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>
<?
}

$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $id_usuario=$fila['id_ejecutiv'];
		  $rut_usuario=$fila['rut'];
		  $gcmcode=$fila['gcmcode'];
		}

if ($_GET["id"]!='' and $gcmcode=='') {
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


if ($_GET['longitud']<>"0.0") {
		$sql0 = "select id,categoria,subcategoria from mensajes where mensaje='".$_GET['msg']."' order by id desc  LIMIT 0, 1";
//	echo $sql0;
		$result0 = mysql_query($sql0,$base);
		while($registro=mysql_fetch_array($result0)) { 
		$id_mensaje=$registro["id"];
		$categoria=$registro["categoria"];
		$subcategoria=$registro["subcategoria"];
		}


	$sql1 ="SELECT * FROM visitas WHERE id_mensaje=".$id_mensaje." AND gcmcode='" . $_GET['id'] . "'";

	$res1=mysql_query($sql1,$base); 
	$numeroRegistros=mysql_num_rows($res1); 

	if ($numeroRegistros==0)  {
		$sql = "insert into visitas (id_mensaje,gcmcode,fecha_hora,lon,lat,login) values (".$id_mensaje.",'".$_GET['id']."','".$fecha."','".$_GET['longitud']."','".$_GET['latitud']."','".$_GET["imei"]."')";
		$result = mysql_query($sql,$base);

		$sql_pref ="insert into preferencias (rut_compara,item,categoria,subcategoria,fecha) values ('".$rut_usuario."','Notificaciones','".$categoria."','".$subcategoria."','".$fecha."')";
		$res_pref=mysql_query($sql_pref,$base_padron);

	}
}

$sql2="SELECT * FROM mensajes WHERE estado=0 and id_alerta=0 ORDER BY id DESC LIMIT 0, 15"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head>
	<meta charset="UTF-8">	
	<title>Mensajes</title> 


	<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin=0 leftmargin=0>


<table class="fondo_gris2" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" ><p class="america_bco">Notificaciones</p>
 <table class="fondo_bco" width="90%" border="0" cellspacing="0" cellpadding="0" align=center>
 <tr>
  <td >&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
	<? 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) { ?>
<form id="notificacion<?=$registro["id"]?>" name="notificacion" method="POST" action="<?=$registro["link"]?>">
<input type="hidden" name="latitud" value="<?=$latitud?>">
<input type="hidden" name="longitud" value="<?=$longitud?>">
  <tr>
    <td>
	<span class="america_22_neg">&nbsp;&nbsp;&nbsp;<?php echo $registro["mensaje"]; ?></span><br>
	<span class="america_14_gris">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $registro["fecha_hora"]; ?></span>
	</td>
  </tr>
  <tr><td align=right><input  type="submit" class="bot_orange1" value="Ver" /></td></tr>
</form>
<tr><td align="center">&nbsp;</td></tr>


<? }?>
<tr>
  <td >&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
 </table>



</body>
</html>
