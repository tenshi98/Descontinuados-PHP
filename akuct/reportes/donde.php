<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once('../nombre_pag.php');
require_once('../conexion.php');
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
		icon: '../images/gota_verde.png',
      });
	 
      //Centrar el mapa de acuerdo a los límites

    });
</script>

</head>

<body>
<div id="nonFooter" width="100%">


                          <table width="100%" border="0" cellpadding="0" cellspacing="0" height=100>
                            <tr>
                              <td height="40" align="right"><br><br><input name="button5" type="submit" class="bot_rojo_gde" id="button5" onclick="javascript:window.location.href='http://<?=$nombreurl?>/reportes/index.php';" value="Volver" /></td>
                              </tr>
                          </table>
 



<table border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
  <tr>
         <td align="center" valign="middle">
		 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">
             <tr>
                <td align="center" valign="middle">
					<div align="center"><div id="map" style="width: 900px; height: 600px" ></div></div>
				</td>
			</tr>
        </table>
		 
		 </td>
  </tr>
</table>




<!--Tabla de margen frente al footer -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="70">&nbsp;</td>
  </tr>
</table>

<!--Fin de la Tabla de margen frente al footer -->

</div> 

<div align=center>
  <!-- PIE -->

<?   
    require_once('../inc/pie.incl');  
?>  

  <!-- PIE -->
</div> 


</body>
</html>
