<?
require("../conexion.php");
require("../nombre_pag.php");
$sql ="SELECT * FROM ejecutivos WHERE imei='" . $_GET["imei"] . "'";
$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $gcmcode=$fila['gcmcode'];
		  $sms1=$fila['lon'];
		  $sms2=$fila['lat'];
		  $sms3=$fila['sms3'];
		  $sms4=$fila['sms4'];
		  $sms5=$fila['sms5'];
		}

$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "m" , $tiempo ); 
$seg= date ( "s" , $tiempo ); 
$horaproc=$hora.$min.$seg;

$Fecha=getdate(); 
$numeroRegistros=0;
$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes<10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia<10) {
	$diadis="0".$Dia;
}else{
$diadis=$Dia;
}


//SACO EL LONLAT PARA NOTIFICAR:



list($mensaje, $imei) =  split("imei:", $_GET["msg"], 2);
$sql ="SELECT * FROM ejecutivos WHERE imei='" . $imei . "'";
$res=mysql_query($sql,$base); 
while($fila=mysql_fetch_array($res))
		{
		  $gcmcode=$fila['gcmcode'];
		  $longitud=$fila['lon'];
		  $latitud=$fila['lat'];
		  $nombre=$fila['nom_ejecutiv'];
		  $hora_ubicacion=$fila['hora_ubicacion'];
		  $telefono_llamar=substr($fila['fono_ejecutiv'], -8);
		}


?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SosClick</title>

<link href="estilo.css" rel="stylesheet" type="text/css" />
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.min.js"></script>
	        
</head>

<body class="sombra_interna" >
	<div class="alto_100">


<table width="100%" border="0" height="80%" cellspacing="0" cellpadding="0"  valign="middle">
  <tr>
    <td>
    <p><strong>Nombre : </strong><?php echo $nombre; ?></p>
    <p><strong>Fono : </strong><?php echo $telefono_llamar; ?> 
	<a href="tel:<?=$telefono_llamar?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','images/llama2_full_up.png',1)"><img src="images/llama2_full.png" width="300" height="89" id="Image1" /></a></p>
    </td>
  </tr>
  <tr>
    <td width="95%" height="50" colspan="6" align="center" valign="middle"  class="sombra_interna esquina_red_bot padding_bot">
	Hora de ultima ubicacion: <br><?=$hora_ubicacion?>
	
	</td>

    </tr>
  <tr>
    <td width="95%" height="370" colspan="6" align="center" valign="middle"  class="sombra_interna esquina_red_bot padding_bot">
	<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=ABQIAAAAHhzikxCQyRAS8ryQoB75mRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxQiqBRnE1Iky5sZfKGxzYbUanZ0HA" type="text/javascript"></script>
    <script type="text/javascript">  
      
    function inicializar() {  
      
        if (GBrowserIsCompatible()) {  
            var map = new GMap2(document.getElementById("map"));  
            map.setCenter(new GLatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>), 15);  
        }  
        map.addOverlay(new GMarker(new GLatLng(<?php echo $latitud; ?>, <?php echo $longitud; ?>)));  
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

