<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

require_once('nombre_pag.php');
require_once('conexion.php');


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="mapestilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?=$nombreurl?>/scripts/gmaps.js"></script>
<script type="text/javascript">
    var map;
    $(document).ready(function(){
      map = new GMaps({
        div: '#map',
       lat: <?=$_GET["lat"]?>,
        lng: <?=$_GET["lon"]?>,
        zoom: 16,
		mapTypeId: google.maps.MapTypeId.HYBRID
      });


        map.addMarker({
        lat: <?=$_GET["lat"]?>,
        lng: <?=$_GET["lon"]?>,
        title: '<?=$_GET["nom"]?>'+'  '+'<?=$_GET["fono"]?>',
		icon: 'images/gota_verde.png',
      });
	 
      //Centrar el mapa de acuerdo a los límites

    });
</script>

</head>

<body topmargin=0 >


<!--***** -->

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">
              <tr>
                    <td align="center" valign="middle"><div align="center"><div id="map" style="width: 700px; height: 480px" ></div></div></td></tr>
					  
                    </table>

</body>
</html>
