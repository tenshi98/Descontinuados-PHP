<?
require("../conexion.php");
require("../nombre_pag.php");
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"];
$sql ="SELECT * FROM ejecutivos WHERE imei='" . $_GET["imei"] . "'";

$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

?>


<form name="formulario" method="post" action="http://<?=$nombreurl?>/app/pide_rut.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&dispositivo=<?=$_GET["dispositivo"]?>">
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
		  $dispositivo=$fila['dispositivo'];
		}

if ($_GET["id"]<>'') {
		$sql2="update ejecutivos set gcmcode='".$_GET["id"]."'   WHERE imei='" . $_GET["imei"] . "'";
	$result = mysql_query($sql2,$base);
}


?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SosClick</title>

<link href="http://<?=$nombreurl?>/app/estilo.css" rel="stylesheet" type="text/css" />
<link href="http://<?=$nombreurl?>/app/css/estilo.css" rel="stylesheet" type="text/css" />
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="http://<?=$nombreurl?>/app/js/jquery.min.js"></script>
<link href="http://<?=$nombreurl?>/app/style.css" rel="stylesheet" type="text/css" />	        
</head>

<body topmargin=0 leftmargin=0 bgcolor="#79C1CF" >
<script type="text/javascript">
window.onload=function(){MainActivity.getFromWebView777("NOSE")};
</script>
<?
if ($sms1=='0' and $sms2=='0' and $sms3=='0' and $sms4=='0' and $sms5=='0') {

echo $sms1."   ".$sms2."   ".$sms3."   ".$sms4."   ".$sms5;
?>
<script type="text/javascript">
window.onload=function(){MainActivity.getFromWebView()};
</script>

<?}?>



<table class="fondo_bco" width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#34a2bb" ><img src="images/sosjoven.png" width="90%" /></td>
  </tr>
  <tr>
    <td width="50%" align="center" bgcolor="#79C1CF" ><!-- UBICACION -->
		<a href="http://<?=$nombreurl?>/app/sosjoven_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&activacion=ubicacion&dispositivo=<?=$_GET["dispositivo"]?>" target="_self"><img src="images/sosjoven_ubicacion.png" width="100%" border=0 /></a>
	</td>
    <td width="50%" align="center" bgcolor="#8694D1" ><!-- LLEGUE -->
		<a href="http://<?=$nombreurl?>/app/sosjoven_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&activacion=llegue&dispositivo=<?=$_GET["dispositivo"]?>" target="_self">	<img src="images/sosjoven_destino.png" width="100%"  border=0 /></a>
	</td>
  </tr>
  <tr>
    <td width="50%" align="center" bgcolor="#0089D1" ><!-- UBICACION -->
		<a href="http://<?=$nombreurl?>/app/sosjoven_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&activacion=transporte&dispositivo=<?=$_GET["dispositivo"]?>" target="_self"><img src="images/sosjoven_sinauto.png" width="100%"  border=0 /></a>
	</td>
    <td width="50%" align="center" bgcolor="#2A2D96" ><!-- LLEGUE -->
		<a href="http://<?=$nombreurl?>/app/sosjoven_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&activacion=llamame&dispositivo=<?=$_GET["dispositivo"]?>" target="_self"><img src="images/sosjoven_llamame.png" width="100%"  border=0 /></a>
	</td>
  </tr>
</table>

<!--table class="fondo_bco" width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td width="45%" height="20%"  align="center" bgcolor="#08298A" class="sombra_interna esquina_red_bot padding_bot">

		<a href="http://<?=$nombreurl?>/app/sosjoven_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&activacion=ubicacion&dispositivo=<?=$_GET["dispositivo"]?>" target="_self">	<img src="images/ubicacion.png" width="100%" id="Image3" border=0 /></a>

	</td>
	<td width="45%" height="20%"  align="center" bgcolor="#6A0888" class="sombra_interna esquina_red_bot padding_bot">

		<a href="http://<?=$nombreurl?>/app/sosjoven_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&activacion=llegue&dispositivo=<?=$_GET["dispositivo"]?>" target="_self">	<img src="images/llegue.png" width="100%" id="Image3" border=0 /></a>

	</td>	
	</tr>

	<tr>
	<td width="45%" height="20%"  align="center" bgcolor="#FA5858" class="sombra_interna esquina_red_bot padding_bot">

		<a href="http://<?=$nombreurl?>/app/sosjoven_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&activacion=transporte&dispositivo=<?=$_GET["dispositivo"]?>" target="_self">	<img src="images/transporte.png" width="100%" id="Image3" border=0 /></a>

	</td>
	<td width="45%" height="20%"  align="center" bgcolor="#173B0B" class="sombra_interna esquina_red_bot padding_bot">

		<a href="http://<?=$nombreurl?>/app/sosjoven_02.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&activacion=llamame&dispositivo=<?=$_GET["dispositivo"]?>" target="_self">	<img src="images/llamame.png" width="100%" id="Image3" border=0 /></a>

	</td>	
	</tr>
	</table>
<br>
    <div class="widht80 fcenter">
		<a href="http://<?=$nombreurl?>/app/gracias_cel_01.php?longitud=<?=$_GET["longitud"]?> &latitud=<?=$_GET["latitud"]?> &imei=<?=$_GET["imei"]?> &id=<?=$_GET["id"]?>&dispositivo=<?=$_GET["dispositivo"]?>" target="_self">
		<input name="submit" type="button" value="Volver" id="post_button" /></a>
	</div>
<br-->
<!--h1>Ubicaci&oacute;n actual</h1>
<table width="100%" border="0" height="90%" cellspacing="0" cellpadding="0"  valign="middle">
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
</table-->







</body>
</html>

