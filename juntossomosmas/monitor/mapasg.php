<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- http://www.cristalab.com/tutoriales/insertar-google-maps-en-tu-web-es-facil-con-gmaps.js-c106028l/   -->
<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');

/*
if ($_POST["descativar"]=="si") {
	$res22=mysql_query("update activaciones set estado='0' where id_sms=". $_POST["apagar"],$base); 
}

*/
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="https://raw.github.com/HPNeo/gmaps/master/gmaps.js"></script>

<script type="text/javascript">
    var map;
    $(document).ready(function(){
      map = new GMaps({
        div: '#map',
        lat: -33.427287,
        lng: -70.611219
      });
	  $('#geocoding_form').submit(function(e){
        e.preventDefault();
        GMaps.geocode({
          address: $('#address').val().trim(),
          callback: function(results, status){
            if(status=='OK'){
              var latlng = results[0].geometry.location;
              map.setCenter(latlng.lat(), latlng.lng());
              map.addMarker({
			    icon: '../images/chart_star.png',
                lat: latlng.lat(),
                lng: latlng.lng(),
				title: $('#address').val().trim()
              });
            }
          }
        });
      });
      map.addMarker({
        lat: -33.427981,
        lng: -70.610698,
        title: 'Patrulla de Vigilancia,Providencia, Chile',
		icon: '../images/car_blue.png',
		animation: google.maps.Animation.DROP,
        details: {
          database_id: 42,
          author: 'HPNeo'
        },
        click: function(e){
          if(console.log)
            console.log(e);
          alert('Hizo click en el marcador');
        }
      });
      map.addMarker({
        lat: -33.431954,
        lng: -70.60945,
        title: 'Municipalidad de Providencia',
		icon: '../images/palace-2.png',
        infoWindow: {
          content: "<p><b><u>Municipalidad de Providencia</u></b></p><p>Pedro de Valdivia 963</p>"+
		           "<p>Web: <a href=\"http://http://www.providencia.cl/\">"+
                   "www.providencia.cl</a>.</p>"
        }
      });
	  map.addMarker({
        lat: -33.426783,
        lng: -70.611022,
        title: 'Corporación Cultural de Providencia',
		icon: '../images/art-museum-2.png',
        infoWindow: {
          content: "<p><b>Corporación Cultural de Providencia</b>, ubicada en avenida 11 de Septiembre #1995, en la comuna de Providencia de la ciudad de Santiago de Chile</p>" 
        }
      });
	  	map.addMarker({
        lat: -33.43175,
        lng: -70.603083,
        title: 'Moto',
		icon: '../images/moto.png',
		animation: google.maps.Animation.DROP,
        infoWindow: {
          content: "<p>Vigilante en Moto</p>" 
        }
      });
	  map.addMarker({
        lat: -33.427949,
        lng: -70.607491,
        title: 'Vigilante',
		icon: '../images/vigilante.png',
		animation: google.maps.Animation.DROP,
        infoWindow: {
          content: "<p>Vigilante</p>" 
        }
      });
      //Centrar el mapa de acuerdo a los límites

    });
</script>
</head>

<body>
<table align="center" width="1050" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="234" height="40" align="center" valign="bottom">
	<img src="http://<?=$nombreurl?>/images/top_logo_ch.png" width="234" height="40" /></td>
    <td background="http://<?=$nombreurl?>/images/linea_dot.png" width="1" rowspan="5" align="center" valign="bottom"></td>

  </tr>
  <tr>
    <td align="center" valign="top">
	<img src="http://<?=$nombreurl?>/images/botton_logo_ch.png" width="234" height="85" /></td>
    <td width="581" rowspan="4" align="center" valign="top"><span class="titulo_rojo_ppal_gd">Ubicación de Móviles</span></td>
  </tr>
</table>
     <table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td >&nbsp;</td><td >
        <form method="post" id="geocoding_form">
          <div class="input"><label for="address">Dirección:</label>
          
            <input type="text" id="address" name="address" size="80" /><input type="submit" class="btn" value="Buscar en el plano" /> &nbsp; &nbsp;
			<input type="reset" class="btn" value="Limpiar dirección" />
          </div>
        </form></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
     </table>	
<div align="center">
<div id="map" style="width: 800px; height: 600px" ></div>
</div>
<!-- PIE  -->
<?   
    require_once('../inc/pie.incl');  
?>
  
 <!-- PIE  -->
</body>
</html>
