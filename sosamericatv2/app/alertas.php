<!DOCTYPE html> 
<?php 
require("../conexion.php");
require("../nombre_pag.php");
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];

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
		  $login=$fila['login'];
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

		$sql0 = "select id,id_alerta from mensajes where grupo='".$login."' order by id desc  LIMIT 0, 1";
		$result0 = mysql_query($sql0,$base);
		while($registro=mysql_fetch_array($result0)) { 
		$id_mensaje=$registro["id"];
		$id_alerta=$registro["id_alerta"];
		}

if ($_GET['longitud']<>"0.0") {
	$sql1 ="SELECT * FROM visitas WHERE id_mensaje=".$id_mensaje." AND gcmcode='" . $_GET['id'] . "'";
	$res1=mysql_query($sql1,$base); 
	$numeroRegistros=mysql_num_rows($res1); 

	if ($numeroRegistros==0)  {
		$sql = "insert into visitas (id_mensaje,gcmcode,fecha_hora,lon,lat,login) values (".$id_mensaje.",'".$_GET['id']."','".$fecha."','".$_GET['longitud']."','".$_GET['latitud']."','".$_GET['login']."')";
		$result = mysql_query($sql,$base);
	}
}

$sql2="SELECT * FROM activaciones WHERE id_sms=".$id_alerta; 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) { 
	$id_activador=$registro['id_usuario'];
	$latitud_activador=$registro["lat"];
	$longitud_activador=$registro["lon"];
	$fecha_hora=$registro["fecha_hora"];
	$porciones = explode(" ", $fecha_hora);
}
?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head>
	<meta charset="UTF-8">	
	<title>Mensajes</title> 

	<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
<link href="http://<?=$nombreurl?>/app/style.css" rel="stylesheet" type="text/css" />
</head>

<body topmargin=0 leftmargin=0>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT ejecutivos.nom_ejecutiv AS nombre,ejecutivos.login AS email,ejecutivos.fono_ejecutiv AS fono,ejecutivos.ciudad_ejecutiv AS ciudad,ejecutivos.dir_ejecutiv AS direccion FROM `ejecutivos` WHERE ejecutivos.id_ejecutiv = ".$id_activador;
$resultado = mysql_query ($query, $base);
$rowusr = mysql_fetch_assoc ($resultado); 

$telefono_llamar=substr($rowusr['fono'], 2);
?>


<table class="fondo_red" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="bottom" ><p>&nbsp;</p>
      <p><img src="images/tit_alarma.png" width="275" height="131" />
      </p>
      <table class="fondo_bco" width="90%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="middle">
            <table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td  class="america_2_neg"><p><?php echo $rowusr['nombre']; ?></p></td>
              </tr>
              <tr>
                <td width="100%" valign="top" height="38">
				<img src="images/cal_icono.png" /><span class="america_2_gris"><?=$porciones[0]?>&nbsp;<?=$porciones[1]?> h</span></td>
              </tr>
              <tr>
                <td width="100%"  valign="top"  height="38">
				<img src="images/cel_icono.png" /><span class="america_2_gris"><?php echo $telefono_llamar; ?></span>
				</td>
              </tr>
              <tr>
                <td  align="center"><br /> <a href="tel:<?=$telefono_llamar?>" ><input name="button4" type="submit" class="bot_red1" id="button4" value="LLAMAR" /></a></td>
              </tr>

            </table></td>
        </tr>
        <tr>
          <td align="center" valign="middle">&nbsp;</td>
        </tr>
      </table>
      <br /></td>
  </tr>
</table>




<!-- UBCICACION ACTUAL -->
<table class="fondo_gris2" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td align="center" >
  <table class="fondo_gris2" width="90%%" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td align="center" >
   <?php if ($latitud_activador!=0){?>
    <td align="center" ><center><p class="america_bco">Ubicaci&oacute;n Alarma</p></center>
      <p class="america_bco"> 
	  <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAHhzikxCQyRAS8ryQoB75mRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQiqBRnE1Iky5sZfKGxzYbUanZ0HA" type="text/javascript"></script>
    <script type="text/javascript">  
    function inicializar() {  
        if (GBrowserIsCompatible()) {  
            var map = new GMap2(document.getElementById("map"));  
            map.setCenter(new GLatLng(<?php echo $latitud_activador; ?>, <?php echo $longitud_activador; ?>), 15);  
        }  
        map.addOverlay(new GMarker(new GLatLng(<?php echo $latitud_activador; ?>, <?php echo $longitud_activador; ?>)));  
    }  
    </script> 
    <div id="map" style="width:100%; height:350px; margin-top:10px; ">  
    <script type="text/javascript">inicializar();</script>  
    </div></p></td>
<?php } else {?>
  <td align="center" ><center><p class="america_bco">El usuario no activo su GPS</p></center>


	</td>
	 </tr>
	 </table>
    <?php } ?>  
	</td>
  </tr>
</table>

<!-- UBCICACION ACTUAL -->




</body>
</html>
