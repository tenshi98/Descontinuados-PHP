<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Find a route using Geolocation and Google Maps API</title>

  </head>
  <body>
<?php 
//Direccion del archivo xml
$url = @file_get_contents('http://www.prt.cl/infovehiculomttwsNew.asmx/infoVehiculoMTT?ppu='.$_GET['PUU']);
//Verifico si obtengo una respuesta
if ($url) {
	//La respuesta la traspasamos a un arreglo
	$xml = new SimpleXMLElement($url);
	if($xml!=''&&($xml->rvm[0]->tipoVehiculo)!=''){
		echo '<tr><td>Vehiculo</td><td>
		'.$xml->rvm[0]->tipoVehiculo.
		' '.$xml->rvm[0]->marca.
		' '.$xml->rvm[0]->modelo.
		' COLOR '.$xml->rvm[0]->color.
		' PATENTE '.$xml->rvm[0]->patenteVehiculo.
		' FABRICADO EN '.$xml->rvm[0]->anioFabricacion.'</td></tr>';
		echo '<tr><td>N&ordm; Motor</td><td>'.$xml->rvm[0]->Nmotor.'</td></tr>';
		echo '<tr><td>N&ordm; Chasis</td><td>'.$xml->rvm[0]->Nchasis.'</td></tr>';
		echo '<tr><td>Fecha Vencimiento Rev. Tec.</td><td>'.$xml->prt[0]->fechaVencimiento.'</td></tr>';

	}
}
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var markers = [
            {
                "title": 'Alibaug',
                "lat": '18.641400',
                "lng": '72.872200',
                "description": 'Alibaug is a coastal town and a municipal council in Raigad District in the Konkan region of Maharashtra, India.'
            }
        ,
            {
                "title": 'Mumbai',
                "lat": '18.964700',
                "lng": '72.825800',
                "description": 'Mumbai formerly Bombay, is the capital city of the Indian state of Maharashtra.'
            }
        ,
            {
                "title": 'Pune',
                "lat": '18.523600',
                "lng": '73.847800',
                "description": 'Pune is the seventh largest metropolis in India, the second largest in the state of Maharashtra after Mumbai.'
            }
    ];
    window.onload = function () {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var lat_lng = new Array();
        var latlngbounds = new google.maps.LatLngBounds();
        for (i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            lat_lng.push(myLatlng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
            latlngbounds.extend(marker.position);
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
 
        //***********ROUTING****************//
 
        //Initialize the Path Array
        var path = new google.maps.MVCArray();
 
        //Initialize the Direction Service
        var service = new google.maps.DirectionsService();
 
        //Set the Path Stroke Color
        var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });
 
        //Loop and Draw Path Route between the Points on MAP
        for (var i = 0; i < lat_lng.length; i++) {
            if ((i + 1) < lat_lng.length) {
                var src = lat_lng[i];
                var des = lat_lng[i + 1];
                path.push(src);
                poly.setPath(path);
                service.route({
                    origin: src,
                    destination: des,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                }, function (result, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                            path.push(result.routes[0].overview_path[i]);
                        }
                    }
                });
            }
        }
    }
</script>
<div id="dvMap" style="width: 500px; height: 500px">
</div>

  </body>
</html>