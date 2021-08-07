<?
require("../conexion.php");
require("../nombre_pag.php");

$dato=$_GET["dato"];

$sql ="SELECT * FROM ejecutivos WHERE imei='" . $dato . "'";
$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $gcmcode=$fila['gcmcode'];
		  $longitud=$fila['lon'];
		  $latitud=$fila['lat'];
		  $hora_ubicacion=$fila['hora_ubicacion'];
		}?>

<link href="http://<?=$nombreurl?>/app/style.css" rel="stylesheet" type="text/css" />	
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



