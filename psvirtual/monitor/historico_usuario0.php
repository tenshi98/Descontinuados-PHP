<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');

$latidud="-33.04862";
$longitud="-71.60531";

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="http://<?=$nombreurl?>/scripts/gmaps.js"></script>
<script type="text/javascript">
    var map;
    $(document).ready(function(){
      map = new GMaps({
        div: '#map',
       lat: -33.427287,
        lng: -70.611219,
        zoom: 7
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
			    icon: 'emergency2.png',
                lat: latlng.lat(),
                lng: latlng.lng(),
				title: $('#address').val().trim()
              });
            }
          }
        });
     });     
</script>

</head>

<body>


<?php echo("<script language='JavaScript' type='text/JavaScript'>") ?>
var map;
    $(document).ready(function(){
      map = new GMaps({
        div: '#map',
       lat: -33.427287,
        lng: -70.611219,
        zoom: 7
      });
<?
if ($_POST["dedonde"]=="menu") {
	$usuario=$_POST["usuario"];
}else{
	$usuario=$_GET["usuario"];
}


	$sql2="SELECT * FROM activaciones where  id_usuario=".$usuario." order by fecha_hora desc LIMIT 0, 10"; 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) 
{ 

		$fecha_hoy=$registro["fecha_hora"];
		$lat=str_replace(",",".",$registro["lat"]);
		$lon=str_replace(",",".",$registro["lon"]); 
		$sql3="SELECT * FROM ejecutivos where  id_ejecutiv=".$registro["id_usuario"]; 
		$gral3=mysql_query($sql3,$base);
		while($registro2=mysql_fetch_array($gral3)) 
		{ $ejecutivo=$registro2["nom_ejecutiv"];
	

	?>


	
	map.addMarker({
        lat: <?=$lat?>,
        lng: <?=$lon?>,
        title: '<?=$registro2["nom_ejecutiv"]?> - <?=$fecha_hoy?>',
		icon: 'emergency.png',
	// LINK PARA VER EL DETALLE DE LA UBICACION
     infoWindow: {
          content: "<p><b><u><?=$registro2["nom_ejecutiv"]?></u></b></p><p><?=$registro2["cod_fono"]?>-<?=$registro2["fono_ejecutiv"]?></p>"+
		           "<p><a href='http://<?=$nombreurl?>/monitor/detalle.php?lon=<?=$lon?>&lat=<?=$lat?>&nom=<?=$registro2["nom_ejecutiv"]?>&fono=<?=$registro2["cod_fono"]?>-<?=$registro2["fono_ejecutiv"]?>'>"+
                   "Ver detalle</a>.</p>"
        }
	// LINK PARA VER EL DETALLE DE LA UBICACION
      });
	       

   
<?}
}?>
 });

	<?php echo("</script>") ?>

<table align="center" width="1050" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="234" height="40" align="center" valign="bottom">
	<img src="http://<?=$nombreurl?>/images/top_logo_ch.png" width="234" height="40" /></td>
    <td background="http://<?=$nombreurl?>/images/linea_dot.png" width="1" rowspan="5" align="center" valign="bottom"></td>

  </tr>
  <tr>
    <td align="center" valign="top">
	<img src="http://<?=$nombreurl?>/images/botton_logo_ch.png" width="234" height="85" /></td>
    <td width="581" rowspan="4" align="center" valign="top"><span class="titulo_rojo_ppal_app">Historico Usuario(<?=$ejecutivo?>)</span></td>
  </tr>
</table>

<!-- PIE  -->
<?   
    require_once('menu.incl');  
?>
  
 <!-- PIE  -->

<br>
     <table width="900" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
        <td >&nbsp;</td><td >
        <form method="post" id="geocoding_form">
          <div class="input"><label for="address">Dirección:</label>
          
            <input type="text" id="address" name="address" size="80" />
			<input type="submit" class="btn" value="Buscar en el plano" /> &nbsp; &nbsp;
			<input type="reset" class="btn" value="Limpiar dirección" />
          </div>
        </form>
		</td>
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
