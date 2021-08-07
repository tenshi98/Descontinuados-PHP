
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="mapestilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/gmaps.js"></script>
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
		icon: '../images/gota_verde.png',
      });
	 
      //Centrar el mapa de acuerdo a los límites

    });
</script>

		 <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">
              <tr>
                    <td align="center" valign="middle"><div align="center"><div id="map" style="width: 900px; height: 600px" ></div></div></td></tr>
					  
                    </table>
 

			<!-- InstanceEndEditable -->   
            </div>
        </div>
      </div> 
    </div>
    