<?
require("../conexion.php");
require("../nombre_pag.php");
$sql ="SELECT * FROM ejecutivos WHERE imei='" . $_GET["imei"] . "'";
$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $gcmcode=$fila['gcmcode'];
		}

//SACO EL LONLAT PARA NOTIFICAR:
list($mensaje, $imei) =  split("imei:", $_GET["msg"], 2);
$dato=$_GET["telefono"];
?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SosClick</title>

<link href="estilo.css" rel="stylesheet" type="text/css" />

<script src="js/jquery.min.js"></script>
 <script src="../scripts/AC_RunActiveContent.js" type="text/javascript"></script>
 <script src="http://code.jquery.com/jquery-latest.js"></script>
<link href="http://<?=$nombreurl?>/app/style.css" rel="stylesheet" type="text/css" />	
<script type="text/javascript">
	function actualiza(){
    	$("#chatbox").load("ubicacion_segumiento_refresh.php?dato=<?=$dato?>");
	}
	function Repetir() {
	setInterval( "actualiza()", 15000 ); //multiplicas la cantidad de segundos por mil
	}
</script>	        
</head>

<body  onLoad="Repetir()" topmargin=0 leftmargin=0>
<div class="widht100">
		<?$sql ="SELECT * FROM ejecutivos WHERE imei='" . $dato . "'";
		$res=mysql_query($sql,$base); 
		while($fila=mysql_fetch_array($res))
		{
		  $gcmcode=$fila['gcmcode'];
		  $longitud=$fila['lon'];
		  $latitud=$fila['lat'];
		  $hora_ubicacion=$fila['hora_ubicacion'];
		}?>				
		<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAHhzikxCQyRAS8ryQoB75mRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQiqBRnE1Iky5sZfKGxzYbUanZ0HA" type="text/javascript"></script>

		<div  id="chatbox" >


<table class="fondo_celeste" width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" >
    <p class="america_bco">&Uacute;ltima ubicaci&oacute;n<br><?=$hora_ubicacion?></p>
    <p class="america_bco"><script type="text/javascript">  
				function inicializar() {  
      
					if (GBrowserIsCompatible()) {  
						var map = new GMap2(document.getElementById("map"));  
						map.setCenter(new GLatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>), 15);  
					}  
					map.addOverlay(new GMarker(new GLatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>)));  
				}  
				</script> 
				<div id="map" style="width:90%; height:350px; margin-top:30px; "><script type="text/javascript">inicializar();</script></div></p></td>
  </tr>
</table>
		</div>	
</div>
</body>
</html>

