<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
$dbConn = conectar();
/**********************************************************************************************************************************/
/*                                       Se traen los datos que nos interesan                                                     */
/**********************************************************************************************************************************/
$query = "SELECT Latitud, Longitud
FROM `clientes_listado`
WHERE  idCliente = '{$_GET['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
$row_datos = mysql_fetch_assoc ($resultado);
?>
<style>
#map_canvas{
	width:90%;
	height:90%;
	margin: 5%;
}
</style>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_datos['Latitud']; ?>, <?php echo $row_datos['Longitud']; ?>);
		  var mapOptions = {
			zoom: 15,
			scrollwheel: false,
			draggable: false,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		  var marker = new google.maps.Marker({
			  position: myLatlng,
			  map: map,
			  title:"Hello World!",  
		  });
		  marker.setIcon('img/icn/map_taxi.png');		
      }  
</script>
<script type="text/javascript">
	function actualiza(){
		//recargo la pagina
		location.reload();
	
	}
	window.onload=function(){
		initialize();//Ejecuto la funcion para ver el mapa
		setInterval( "actualiza()", 10000 ); //multiplicas la cantidad de segundos por mil	
	};
</script>
<div id="map_canvas"></div>

