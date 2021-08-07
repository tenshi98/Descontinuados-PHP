<?
require("../conexion.php");
require("../nombre_pag.php");
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];
$sql ="SELECT * FROM ejecutivos WHERE imei='" . $_GET["imei"] . "'";

$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

?>


<form name="formulario" method="post" action="http://<?=$nombreurl?>/app/pide_rut.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
            <input type="hidden" name="msg_error" value="1">
</form>
		<script type="text/javascript">
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>

<?}

$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $gcmcode=$fila['gcmcode'];
		  $sms1=$fila['sms1'];
		  $sms2=$fila['sms2'];
		  $sms3=$fila['sms3'];
		  $sms4=$fila['sms4'];
		  $sms5=$fila['sms5'];
		  $linea=$fila['linea'];
		}
if ($_GET["id"]<>'') {
	$sql2="update ejecutivos set gcmcode='".$_GET["id"]."'   WHERE imei='" . $_GET["imei"] . "'";
	$result = mysql_query($sql2,$base);
}



?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SosTaxi</title>

<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.min.js"></script>
	        
</head>

<body class="sombra_interna" >
<?
//if ($linea==0) {
if (($sms1=='0' and $sms2=='0' and $sms3=='0' and $sms4=='0' and $sms5=='0') or $linea==0 ) {

//echo $sms1."   ".$sms2."   ".$sms3."   ".$sms4."   ".$sms5;
?>
<script type="text/javascript">
window.onload=function(){MainActivity.getFromWebView()};
</script>

<?

}

?>

	<div class="alto_100">

<table align="center" height="98% " width="97%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="33%"  colspan="5"height="2" align="center" valign="middle"></td>

  </tr>
  <tr>
    <td height="24%" colspan="5" align="center" valign="middle" bgcolor="#CC0000" class=" esquina_red_bot padding_bot">
			   <form name="formugrp" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Sostaxi">
			<a href="#" onclick="document.formugrp.submit(); return false"><img src="images/ayuda.png" width="70%" border="0"/></a></form>
	</td>
  </tr>
  <tr>
    <td height="25" colspan="5" align="left" valign="middle" class="cuerpo_gris_12"><span class="red_arial_15">PASAJERO</span> en Ruta</td>
    <!--td width="2" rowspan="7" align="center" valign="middle"></td>
    <td align="center" valign="middle" ></td>
    <td width="2" rowspan="7" align="center" valign="middle"></td>
    <td align="center" valign="middle" ></td-->
  </tr>
  <tr>
    <td width="33%" height="24%" align="center" valign="middle" bgcolor="#003366" class=" esquina_red_bot padding_bot">
				   <form name="Pasajero1" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Pasajero1">
			<a href="#" onclick="document.Pasajero1.submit(); return false"><img src="images/pasajero1.png" width="90%" border="0"/></a></form>
	</td>
	<td width="2" rowspan="7" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle" bgcolor="#333399" class=" esquina_red_bot padding_bot">
				   <form name="Pasajero2" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Pasajero2">
			<a href="#" onclick="document.Pasajero2.submit(); return false"><img src="images/pasajero2.png" width="90%" border="0"/></a></form>
	</td>
	<td width="2" rowspan="7" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle" bgcolor="#6633CC" class=" esquina_red_bot padding_bot">
				   <form name="Pasajero3" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Pasajero3">
			<a href="#" onclick="document.Pasajero3.submit(); return false"><img src="images/pasajero3.png" width="90%" border="0"/></a></form>
	</td>
  </tr>
  <tr>
    <td width="33%" height="25" align="left" valign="middle"><span class="cuerpo_gris_12">
	<span class="red_arial_15">Alerta </span>En Ruta</span></td>
    <td width="33%" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
  </tr>
  <tr>
    <td width="33%" height="24%" align="center" valign="middle" bgcolor="#FF9900" class=" esquina_red_bot padding_bot">
				   <form name="Desvio" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Desvio">
			<a href="#" onclick="document.Desvio.submit(); return false"><img src="images/desvio.png" width="90%" border="0"/></a></form>
	</td>
    <td width="33%" align="center" valign="middle" bgcolor="#CC0000" class=" esquina_red_bot padding_bot">
				   <form name="Accidente" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Accidente">
			<a href="#" onclick="document.Accidente.submit(); return false"><img src="images/accidente.png" width="90%" border="0"/></a></form>
	</td>
    <td width="33%" align="center" valign="middle" bgcolor="#336633" class=" esquina_red_bot padding_bot">
				   <form name="Policia" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Policia">
			<a href="#" onclick="document.Policia.submit(); return false"><img src="images/policia.png" width="90%" border="0"/></a></form>
	</td>
  </tr>
  <tr>
    <td width="33%" height="2" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
  </tr>
  <tr>
    <td width="33%" height="24%" align="center" valign="middle" bgcolor="#233243" class=" esquina_red_bot padding_bot">
				   <form name="Trafico" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Trafico">
			<a href="#" onclick="document.Trafico.submit(); return false"><img src="images/trafico.png" width="90%" border="0"/></a></form>
	</td>
    <td width="33%" align="center" valign="middle" bgcolor="#FF6600" class=" esquina_red_bot padding_bot">
				   <form name="Peligro" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Peligro">
			<a href="#" onclick="document.Peligro.submit(); return false"><img src="images/peligro.png" width="90%" border="0"/></a></form>
	</td>
    <td width="33%" align="center" valign="middle" bgcolor="#742533" class=" esquina_red_bot padding_bot">
				   <form name="Cerrada" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Cerrada">
			<a href="#" onclick="document.Cerrada.submit(); return false"><img src="images/cerrada.png" width="90%" border="0"/></a></form>
	</td>
  </tr>
  <tr>
    <td width="33%" height="2" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
    <td width="33%" align="center" valign="middle"></td>
  </tr>
</table>



<table width="100%" border="0" height="80%" cellspacing="0" cellpadding="0"  valign="middle">
  <tr>
    <td width="95%" height="370" colspan="6" align="center" valign="middle"  class="sombra_interna esquina_red_bot padding_bot">
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAHhzikxCQyRAS8ryQoB75mRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQiqBRnE1Iky5sZfKGxzYbUanZ0HA" type="text/javascript"></script>
    <script type="text/javascript">  
      
    function inicializar() {  
      
        if (GBrowserIsCompatible()) {  
            var map = new GMap2(document.getElementById("map"));  
            map.setCenter(new GLatLng(<?php echo $_GET['latitud']; ?>, <?php echo $_GET['longitud']; ?>), 15);  
        }  
        map.addOverlay(new GMarker(new GLatLng(<?php echo $_GET['latitud']; ?>, <?php echo $_GET['longitud']; ?>)));  
    }  
      
    </script> 
    <div id="map" style="width:90%; height:350px; margin-top:30px; ">  
    <script type="text/javascript">inicializar();</script>  
    </div>
	
	</td>

    </tr>
</table>



</div>





</body>
</html>

