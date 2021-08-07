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
		}

		$sql2="update ejecutivos set gcmcode='".$_GET["id"]."'   WHERE imei='" . $_GET["imei"] . "'";
	$result = mysql_query($sql2,$base);



?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SosClick</title>

<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.min.js"></script>
	        
</head>

<body class="sombra_interna" >
<?
if ($sms1=='0' and $sms2=='0' and $sms3=='0' and $sms4=='0' and $sms5=='0') {

echo $sms1."   ".$sms2."   ".$sms3."   ".$sms4."   ".$sms5;
?>
<script type="text/javascript">
window.onload=function(){MainActivity.getFromWebView()};
</script>

<?

}

?>
	<br>	<br>
	<div class="alto_100">
	<table width="100%" border="0" height="80%" cellspacing="0" cellpadding="0"  valign="middle">
  <tr>
    <td width="64%" height="49%" colspan="4" align="center" bgcolor="#ff0000" class="sombra_interna esquina_red_bot padding_bot">
	<!-- SOSCLICK -->
		   <form name="formugrp" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Sosclick">
			<a href="#" onclick="document.formugrp.submit(); return false" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','images/sos_press.png',1)"><br />
            <img src="images/seguridad.png" width="100%" id="Image3" border=0 /></a><br />
			</form>
	<!-- SOSCLICK -->
</td>
    <td width="2%" rowspan="3" align="center" valign="middle"></td>
    <td width="34%" height="100%" rowspan="3" align="center" valign="middle" bgcolor="#642EBE" class="sombra_interna esquina_red_bot padding_bot">

	<!-- VIOLENCIA FAMILIAR -->
	<form name="formuvio" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	   <input type="hidden" name="activacion" value="Violencia Familiar">
	<a href="#" onclick="document.formuvio.submit(); return false" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','images/sos_press.png',1)"><br />
            <img src="images/violencia_fam.png" width="100%" id="Image4" border=0 /></a>
	</form>
	<!-- VIOLENCIA FAMILIAR -->
	</td>
  </tr>

  <tr>
    <td height="2%" colspan="4" align="center" valign="middle">&nbsp;</td>
  </tr>

  <tr>
    <td width="31%" height="49%" align="center" valign="middle" bgcolor="#00BFFF" class="sombra_interna esquina_red_bot padding_bot">
	<!-- Municipalidad -->
	<form name="formumuni" method="post" action="http://<?=$nombreurl?>/app/municipio.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
			   <input type="hidden" name="activacion" value="Municipalidad">
	<a href="#" onclick="document.formumuni.submit(); return false" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','images/sos_press.png',1)"><br />
            <img src="images/municipalidad.png" width="100%" id="Image5" border=0 /></a>
	</form>
	<!-- Municipalidad -->

	</td>
    <td width="2%" align="center" valign="middle">&nbsp;</td>
    <td width="31%" colspan="2" align="center" bgcolor="#DF7401" class="sombra_interna esquina_red_bot padding_bot">
	<!-- carrete2 -->
	<form name="formucarrete" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
	<input type="hidden" name="activacion" value="Carrete Sano">
	<a href="#" onclick="document.formucarrete.submit(); return false" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image3','','images/sos_press.png',1)"><br />
            <img src="images/carrete2.png" width="100%" id="Image5" border=0 /></a>
	</form>
	<!-- carrete2 -->
</td>
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

