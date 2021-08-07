<!DOCTYPE html> 
<?php 
require_once('conexion.php');

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
		$sql0 = "select id from mensajes where mensaje='".$_GET['msg']."' order by id desc  LIMIT 0, 1";
		$result0 = mysql_query($sql0,$base);
		while($registro=mysql_fetch_array($result0)) { 
		$id_mensaje=$registro["id"];
		}


	$sql1 ="SELECT * FROM visitas WHERE id_mensaje=".$id_mensaje." AND gcmcode='" . $_GET['id'] . "'";
	$res1=mysql_query($sql1,$base); 
	$numeroRegistros=mysql_num_rows($res1); 

	if ($numeroRegistros==0)  {
		$sql = "insert into visitas (id_mensaje,gcmcode,fecha_hora,lon,lat) values (".$id_mensaje.",'".$_GET['id']."','".$fecha."','".$_GET['longitud']."','".$_GET['latitud']."')";
		$result = mysql_query($sql,$base);
	}
}

$sql2="SELECT * FROM mensajes WHERE estado=0 ORDER BY id DESC LIMIT 0, 15"; 
?>
<html> 
	<head>
  <meta charset="UTF-8">	
	<title>Notificaciones</title> 
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="jquery.mobile.structure-1.0.1.css" />
	<link rel="apple-touch-icon" href="images/launch_icon_57.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="images/launch_icon_72.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="images/launch_icon_114.png" />
	<link rel="stylesheet" href="jquery.mobile-1.0.1.css" />
	<link rel="stylesheet" href="custom.css" />
	<script src="js/jquery-1.7.1.min.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>
</head> 

<body> 
<div data-role="page" id="home" data-theme="c">

	<div data-role="content">
	
	<div id="branding">
		<h1>Notificaciones </h1>
	</div>
	
	<div class="choice_list"> 
	<h1> Selecciona: </h1>
	
	<ul data-role="listview" data-inset="true" >
	<? 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) { ?>

	<li>
	<a href="<?=$registro["link"]?>" data-transition="slidedown"> 
	<!--img src="logo_cuad48.png"/--> 
	<h3> <?=$registro["mensaje"]?> <br><?=$registro["fecha_hora"]?></h3></a>
	
	</li>
<? }?>
	</ul>	
	
	</div>
	</div>

</div><!-- /page -->
</body>
</html>
