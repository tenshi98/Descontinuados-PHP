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

<? }

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

<link href="http://<?=$nombreurl?>/app/estilo_app.css" rel="stylesheet" type="text/css" />
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.min.js"></script>
	        
</head>

<body class="sombra_interna" >
<? if ($sms1=='0' and $sms2=='0' and $sms3=='0' and $sms4=='0' and $sms5=='0') {
  echo $sms1."   ".$sms2."   ".$sms3."   ".$sms4."   ".$sms5;
?>
<script type="text/javascript">
window.onload=function(){MainActivity.getFromWebView()};
</script>

<? } ?>

<table class="bg_guerra" align="center" height="98% " border="0" cellspacing="0" cellpadding="0">
  <td height="24%" colspan="5" align="center" valign="middle"  >
  	<!-- SOSCLICK -->
		   <form name="formugrp" method="post" action="http://<?=$nombreurl?>/app/gracias_cel_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>">
		   <input type="hidden" name="activacion" value="Sosclick">
			<a href="#" onClick="document.formugrp.submit(); return false" ><img src="http://<?=$nombreurl?>/app/images/sosclick.png" width="98%"  /></a>
			</form>
	<!-- SOSCLICK -->

</td>
    </tr>
    <tr>
    <td height="49%"  colspan="5" align="center" valign="middle"  ><p><a href="#"><img src="http://<?=$nombreurl?>/app/images/guerra.png" width="98%" border="0"  /></a><br />
        <br />
      </p></td>
  <tr>
    <td width="153" height="24%" align="right" valign="middle" ><a href="#"><img src="http://<?=$nombreurl?>/app/images/encuesta.png" width="98%" border="0" /></a></td>
    <td width="4" align="center" valign="middle"></td>
    <td width="153" align="center" valign="middle" ><a href="#"><img src="http://<?=$nombreurl?>/app/images/vota.png" width="98%" border="0" /></a></td>
    <td width="3" align="center" valign="middle"></td>
    <td width="157" align="left" valign="middle" ><a href="#"><img src="http://<?=$nombreurl?>/app/images/participa.png" width="98%" border="0" /></a></td>
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

