<?php

//conecto con la base de datos
$con = mysql_connect("localhost","root","petland");
if (!$con)
  {
  die('Error en la coneccion: ' . mysql_error());
  }

mysql_select_db("jootes", $con);

$result = mysql_query("SELECT
lon,
lat

FROM visitas ");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Mapa de Google Maps</title>
<meta name="Description" content="Mapa elemental de Google Maps para usarlo desde la PC, que se muestra a todo lo ancho y alto del navegador e incluye un cuadro de b&#250;squeda.">
<meta name ="author" content ="Norfi Carrodeguas">
<style type="text/css" media="screen">
<!--
html,body{height:100%;margin:0;padding:0;}
#map_canvas{height:96%;}
-->
</style>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript">
		
		$(document).ready(function() {
            initialize();  
        });
		
			function initialize() {
				//centrado del mapa
				var latlng = new google.maps.LatLng(-33.4033743, -70.5767424);
				var settings = {
					zoom: 15,
					center: latlng,
					mapTypeControl: true,
					mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
					navigationControl: true,
					navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
					mapTypeId: google.maps.MapTypeId.ROADMAP};
				var map = new google.maps.Map(document.getElementById("map_canvas"), settings);
				var contentString = '<div id="content">'+
					'<div id="siteNotice">'+
					'</div>'+
					'<h1 id="firstHeading" class="firstHeading">Mi posicion</h1>'+
					'<div id="bodyContent">'+
					'<p></p>'+
					'</div>'+
					'</div>';
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});
				
				var companyImage = new google.maps.MarkerImage('images/logo.png',
					new google.maps.Size(100,50),
					new google.maps.Point(0,0),
					new google.maps.Point(50,50)
				);

				var companyShadow = new google.maps.MarkerImage('images/logo_shadow.png',
					new google.maps.Size(130,50),
					new google.maps.Point(0,0),
					new google.maps.Point(65, 50));

				var companyPos = new google.maps.LatLng(-33.4033743, -70.5767424);

				var companyMarker = new google.maps.Marker({
					position: companyPos,
					map: map,
					icon: companyImage,
					shadow: companyShadow,
					title:"ssss",
					zIndex: 3});
					
					
					
				<?php 
				$n=0;
				while($row = mysql_fetch_array($result)){?>
				var contentString = '<div id="content">'+
					'<div id="siteNotice">'+
					'</div>'+
					'<h1 id="firstHeading" class="firstHeading"><?php echo $n; ?></h1>'+
					'<div id="bodyContent">'+
					'<p>dddd</p>'+
					'</div>'+
					'</div>';
				var infowindow_<?php echo $n; ?> = new google.maps.InfoWindow({
					content: contentString
				});
				var trainImage_<?php echo $n; ?> = new google.maps.MarkerImage('images/train.png',
					new google.maps.Size(50,50),
					new google.maps.Point(0,0),
					new google.maps.Point(50,50)
				);

				var trainShadow_<?php echo $n; ?> = new google.maps.MarkerImage('images/train_shadow.png',
					new google.maps.Size(70,50),
					new google.maps.Point(0,0),
					new google.maps.Point(60, 50)
				);

				var trainPos_<?php echo $n; ?> = new google.maps.LatLng(<?php echo $row['lat']; ?>, <?php echo $row['lon']; ?>);

				var trainMarker_<?php echo $n; ?> = new google.maps.Marker({
					position: trainPos_<?php echo $n; ?>,
					map: map,
					icon: trainImage_<?php echo $n; ?>,
					shadow: trainShadow_<?php echo $n; ?>,
					title:"Train Station_<?php echo $n; ?>",
					zIndex: 2
				});
				google.maps.event.addListener(trainMarker_<?php echo $n; ?>, 'click', function() {
					infowindow_<?php echo $n; ?>.open(map,trainMarker_<?php echo $n; ?>);
				});
<?php

$n++;
 }
mysql_close($con);
?>


				
				
				
				google.maps.event.addListener(companyMarker, 'click', function() {
					infowindow.open(map,companyMarker);
				});
			}
		</script>	
</head>
<body onload="initialize()">
		<div id="map_canvas"></div>
	</body>
</html>
