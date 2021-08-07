<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente_transantiago.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/transantiago_url.php';
require_once 'core/config_app.php';
require_once 'core/datos_empresa.php';
require_once 'core/gsm.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "principal_mapa_tran.php";
$location = $original.$w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Principal</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<style>
.gm-style-iw {
	width: 260px !important;
	top: 15px !important;
	left: 0px !important;
	background-color: rgba(0, 0, 0, 0.8);
	border: 4px solid #FFA84C;
	border-radius: 10px;
}
.gm-style img img{
    background-color: rgba(255, 255, 255, 1);
}
.iw-content img {
	float: right;
	margin: 0 5px 5px 10px;	
}
.iw-subTitle {
	font-size: 16px;
	font-weight: 700;
	padding: 5px 0;
}
.iw-bottom-gradient {
	position: absolute;
	width: 326px;
	height: 25px;
	bottom: 10px;
	right: 18px;
	background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
	background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
	background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
	background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
}
.header {
    text-align: center;
    padding: 10px 0px;
	color: #FFF;
}
.header .logoBus {
    display: inline-block;
    width: 37px;
    height: 46px;
    overflow: hidden;
    margin: 0px 5px;
    background: transparent url("img/logo_bus.png") no-repeat scroll left top;
    vertical-align: top;
}
.header h1 {
    display: block;
    margin: 4px 0px;
    font-size: 22px;
    font-weight: bold;
    line-height: 22px;
}
.header h2 {
    font-size: 14px;
    line-height: 16px;
    margin: 0px;
    font-weight: bold;
}
.list-wrapper{
	padding-left: 10px;
}
#listado-paradas ul {
    padding: 0px;
    margin: 0px;
    list-style: outside none none;
}
#listado-paradas ul li:nth-child(3n-1) {
    margin-right: 10px;
}
#listado-paradas ul li {
    width: 78px;
    height: 52px;
    position: relative;
    float: left;
    border-radius: 4px;
    text-align: center;
    overflow: hidden;
    margin-bottom: 10px;
    background: transparent url("img/bg_num_bus.gif") repeat-x scroll left top;
}
#listado-paradas ul {
    list-style: outside none none;
}
#listado-paradas ul li a {
    height: 66px;
    display: block;
    padding: 6px 0px;
    color: #FFF;
    text-decoration: none;
}
#listado-paradas ul li strong {
    display: block;
    font-size: 26px;
    line-height: 30px;
    margin-bottom: 4px;
}
#listado-paradas ul li span {
    display: block;
    font-size: 12px;
    line-height: 12px;
}
#listado-paradas ul li .triangle {
    width: 0px;
    height: 0px;
    position: absolute;
    top: 0px;
    right: 0px;
    border-style: solid;
    border-width: 0px 28px 28px 0px;
}


</style>
<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="js/jquery.min.js"></script>

<table  style="height:100%">
		
	<tr style="height:40px">
        <td>
            <div class="box_col_0 background_color_56 border_radius0 sombra_box_00 center_img_1">
                <a href="<?php echo 'principal.php'.$w ?>">
                    <img src="img/donde_viene_tit.png" border="0">
                </a>
            </div>
        </td>
    </tr>
		
	<tr style="height:94px">
        <td>
            <div class="box_img ">
                <img src="img/texto_transantiago.png" border="0" width="100%">
            </div>
        </td>
    </tr>
		
    <tr>
		<td style="height:100%" >
			<div id="map_canvasx" style="width:100%; height:100%;" ></div>
			<div id="consulta"></div>
		</td>
    </tr>
		
	<tr style="height:40px">
        <td rowspan="1" colspan="2">
            <div class="box_col_0 background_color_47 border_radius0 sombra_box_00 center_img_1">
                <a onclick="paraderosCerca();">
                    <img src="img/mostrar_paraderos.png" border="0">
                </a>
            </div>
        </td>
    </tr>
		
</table>

<?php
if($arrCliente['idCliente']){
$query = "SELECT Latitud, Longitud
FROM `clientes_listado`
WHERE idCliente = {$arrCliente['idCliente']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
}
?>  

  
<script>

var lon_x = <?php if(isset($rowdata['Latitud'])&&$rowdata['Latitud']!=''){echo $rowdata['Latitud'];}else{echo '-33.609007124313074';} ?>;
var lat_x = <?php if(isset($rowdata['Longitud'])&&$rowdata['Longitud']!=''){echo $rowdata['Longitud'];}else{echo '-70.57514782247927';} ?>;
	/* ************************************************************************** */
	function initialize() {
		var myLatlng = new google.maps.LatLng(lon_x, lat_x);

		var myOptions = {
			zoom: 16,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			
			panControl: false,
			zoomControl: false,
			mapTypeControl: false,
			scaleControl: false,
			streetViewControl: false,
			overviewMapControl: false

		};
		map = new google.maps.Map(document.getElementById("map_canvasx"), myOptions);
		
		marker = new google.maps.Marker({
			draggable: true,
			position: myLatlng,
			map: map,
			icon: 'img/map_mi_ubicacion.png',
			title: "Tu Ubicacion"
		});

		google.maps.event.addListener(marker, 'dragend', function (event) {

			lon_x = event.latLng.lat();
			lat_x = event.latLng.lng();

		});
	}
	/* ************************************************************************** */
	function paraderosCerca() {
		var serviceAddr = 'http://200.29.15.107/rest/'
		$.ajax({
			crossDomain: true,
			type: 'get',
			url: serviceAddr + 'getpuntoparada',
			data: {
				lat: lon_x,
				lon: lat_x
			},
			type: 'get',
			success: function(resp) {
				showParaderos(resp);

			},
			error: function() {
				alert('No se ha podido conectar con e webservice');
			}
		});
	}
	/* ************************************************************************** */
	


	var infowindow = new google.maps.InfoWindow();
	
	
	google.maps.event.addListener(infowindow, 'domready', function() {

    // Reference to the DIV that wraps the bottom of infowindow
    var iwOuter = $('.gm-style-iw');

    /* Since this div is in a position prior to .gm-div style-iw.
     * We use jQuery and create a iwBackground variable,
     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
    */
    var iwBackground = iwOuter.prev();

    // Removes background shadow DIV
    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

    // Removes white background DIV
    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

    // Moves the infowindow 115px to the right.
    iwOuter.parent().parent().css({left: '15px'});

    // Moves the shadow of the arrow 76px to the left margin.
    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 300px !important;'});

    // Moves the arrow 76px to the left margin.
    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 125px !important;'});
	
	// Changes the desired tail shadow color.
    iwBackground.children(':nth-child(3)').find('div').children().css({'background-color': 'rgba(255, 168, 76, 1)', 'z-index' : '1'});

    // Reference to the div that groups the close button elements.
    var iwCloseBtn = iwOuter.next();

    // Apply the desired effect to the close button
    iwCloseBtn.css({opacity: '1', left: '240px',padding: '10px', top: '3px', border: '7px solid #FFA84C', 'border-radius': '50px', 'box-shadow': '0 0 5px #3990B9'});

	iwCloseBtn.find('img').attr({'src':'img/close_round_button.png'});
	iwCloseBtn.find('img').css({ left: '-4px',top: '-4px',width: '42px',height: '42px'});
	
    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
    if($('.iw-content').height() < 140){
      $('.iw-bottom-gradient').css({display: 'none'});
    }

    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
    iwCloseBtn.mouseout(function(){
      $(this).css({opacity: '1'});
    });
  });
  
  
	var marker2;
	var markers = new Array();
	var recorrido = new Array();
	var recorrido_filtrado = new Array();
	//recorrido_filtrado[] = new Array();
	var rutas;
	var showParaderos = function(data) {

		for (var a in data) {
			
				//dibujo los marcadores con sus respectivos infobox
				marker2 = new google.maps.Marker({
					position: new google.maps.LatLng(data[a].pos[0], data[a].pos[1]),
					map: map,
					icon: 'img/icn_bus.png',
					title: "Paradero"
				});
				markers.push(marker2);

				
				google.maps.event.addListener(marker2, 'click', (function(marker2, a) {
					
					
					return function() {
						if(data[a].servicios){
							for (i = 0; i < data[a].servicios.length; i++) {
								recorrido[i] = data[a].servicios[i]['cod'];
								
							}
						}
						
						recorrido_filtrado = eliminateDuplicates(recorrido);
						//console.log(recorrido_filtrado);
						rutas = '';
						
						rutas = rutas+'<div class="header">';

						rutas = rutas+'<h1>'+data[a].name+'</h1>';
						rutas = rutas+'<h2>'+data[a].comuna+'</h2>';
						rutas = rutas+'</div>';
						
						rutas = rutas+'<div class="list-wrapper">';
						rutas = rutas+'<div style="overflow: hidden; padding: 0px; width: 245px;" class="c scrollable">';
						rutas = rutas+'<div style="width: 255px;" class="jspContainer">';
						rutas = rutas+'<div style="padding: 0px; top: 0px; left: 0px; width: 255px;" class="jspPane">';
						rutas = rutas+'<div id="listado-paradas">';
						rutas = rutas+'<ul class="listParadas">';
						
					
						for (x = 0; x < recorrido_filtrado.length; x++) {
		
							rutas = rutas+'<li>';
							rutas = rutas+'<a onclick="webserv(\''+recorrido_filtrado[x]+'\')">';
							rutas = rutas+'<strong>'+recorrido_filtrado[x]+'</strong>';
							rutas = rutas+'<div class="triangle" style="border-color: transparent #FFD400 transparent transparent;"></div>';
							rutas = rutas+'</a>';
							rutas = rutas+'</li>';
						}
						rutas = rutas+'</ul>';
						rutas = rutas+'</div>';
						rutas = rutas+'</div>';
						rutas = rutas+'</div>';
						rutas = rutas+'</div>';
						rutas = rutas+'</div>';
					
					  infowindow.setContent(rutas);
					  infowindow.open(map, marker2);
					  //infowindow.closeBoxURL('http://localhost:8080/DummyMap/images/mapClose.png');
					}
				})(marker2, a));
		
		}
	}
	
	//centrado de los infobox
    function AutoCenter() {
      //  Create a new viewpoint bound
      var bounds = new google.maps.LatLngBounds();
      //  Go through each...
      $.each(markers, function (index, marker) {
      bounds.extend(marker.position);
      });
      //  Fit these bounds to the map
      //map.fitBounds(bounds);
    }
    AutoCenter();
	function eliminateDuplicates(arr) {
	 var i,
		 len=arr.length,
		 out=[],
		 obj={};

	 for (i=0;i<len;i++) {
		obj[arr[i]]=0;
	 }
	 for (i in obj) {
		out.push(i);
	 }
	 return out;
	}
	/* ************************************************************************** */
	function webserv(data) {
	infowindow.close();
		var serviceAddr = 'http://200.29.15.107/rest/'
		$.ajax({
			crossDomain: true,
			type: 'get',
			url: serviceAddr + 'conocerecorrido',
			data: {
				codsint: data
			},
			success: function(resp) {
				dibujarRuta(resp)
			},
			error: function() {
				alert('No se ha podido conectar con e webservice');
			}
		});
		//Ubicacion de los distintos buses
		
		transMarker(2000, data);//se agrega el tiempo en una variable de referencia
	}
	/* ************************************************************************** */
	function dibujarRuta(data) {
		var color1 = '#df4f14';
		var color2 = '#212121';
		var ruta, paraderos;

		ruta_ida = data.ida.path;
		ruta_vuelta = data.regreso.path;
		
		drawRoute(ruta_ida,ruta_vuelta,color1,color2);
				
	}
	/* ************************************************************************** */
	var lineaServicio1;
	var lineaServicio2;
	function drawRoute(ruta1, ruta2, color1, color2) {
		if (lineaServicio1 != undefined ) {
			lineaServicio1.setMap(null);
			lineaServicio1 = null;
		}
		if (lineaServicio2 != undefined ) {
			lineaServicio2.setMap(null);
			lineaServicio2 = null;
		}
		lineaServicio1 = drawRouteFromArray(ruta1, {
			color: color1
		});
		lineaServicio2 = drawRouteFromArray(ruta2, {
			color: color2
		});

	}
	/* ************************************************************************** */
	var drawRouteFromArray=function(arr,opt){
		
		
		var route=[];
					
		var tmp;
					
		for (var a in arr){
			if (arr[a].drawRoute!='undefined'&&arr[a].length==2){		
				tmp=new google.maps.LatLng(arr[a][0],arr[a][1]);
				route.push(tmp);
			}
		}
					
		opt=opt||{}
					
		var drawn = new google.maps.Polyline({
			map: map,
			path: route,
			strokeColor: opt.color||'black',
			strokeOpacity: opt.opacity||1,
			strokeWeight: opt.strokeWeight||5
		});

					
		return drawn;
	}	
	/* ************************************************************************** */
	var myVar;
	var icon_transMarker = {
		name: 'transMarkers',
		icon: 'img/icn_trans.png',
		title: 'Otros',
		visible: true
	}
	var icon_transMarker_2 = {
		name: 'transMarkers_2',
		icon: 'img/icn_trans_2.png',
		title: 'Otros',
		visible: true
	}

	function transMarker(time, data) {
		clearInterval(myVar);
		myVar = setInterval(function(){myTimer2(data)},time);
	}
			
	var mapax = 0;	
	function myTimer2(data) {

		switch(mapax) {
			//Ejecutar formulario con el recorrido y la ruta
			case 1:
				$('#consulta').load('principal_mapa_tran_ubicaciones.php?idRecorrido='+data);
			break;
			//se dibujan los iconos de los buses	
			case 2:
				//Los demas buses
				hideMarkers('transMarkers');
				deleteMarkers('transMarkers');
				hideMarkers('transMarkers_2');
				deleteMarkers('transMarkers_2');
							
				for(var i in locations){
					if(locations[i][3]==1){
						transporte = addMarker(icon_transMarker);
						transporte.show().setPosition(new google.maps.LatLng(locations[i][1], locations[i][2]));
					}else{
						transporte = addMarker(icon_transMarker_2);
						transporte.show().setPosition(new google.maps.LatLng(locations[i][1], locations[i][2]));
					}
									
				}

			break;		
		}

		mapax++;	
		if(mapax==3){mapax=1}
	}			
	/* ************************************************************************** */
	var foreachMarkerByName=function(name,callback){
        
		var toRet=false
					
		if (typeof name != 'object') {
			name=[name]
		}
					
		for (var a in name){
			var tmp=name[a];
						
			if (tmp==undefined||markers[tmp]==undefined) {
				continue;
			}
						
			toRet=true;
						
			for (var a in markers[tmp]) callback(markers[tmp][a]);
		}
					
		return toRet;
	}
	/* ************************************************************************** */			
	hideMarkers=function(name){
		foreachMarkerByName(name,function(el){
			el.hide();
		});
		return this;
	}
	/* ************************************************************************** */
	deleteMarkers=function(name){
		foreachMarkerByName(name,function(el){            
			el.delete();
		});
		delete markers[name];
		return this;
	}
	/* ************************************************************************** */
	addMarker=function(opt){
        
		if (opt == undefined) return false;
					
		opt.map=map;
					
		var tmp=new google.maps.Marker(opt);
					
		if (opt.pos) tmp.setPosition(opt.pos);
					
		if (opt.name) {
			if (markers[opt.name] == undefined) markers[opt.name]=[];		
			markers[opt.name].push(tmp);			
			tmp.markerFamilyName=opt.name;
			tmp.markerFamilyPos=markers[opt.name].length-1;
		}
					
		if (opt.events) {
			for (var a in opt.events) {
				google.maps.event.addListener(tmp,a,opt.events[a].bind(tmp));
			}
		}
					
		// Borrar, esconder y mostrar
		tmp.delete=function(){
			this.deleteInfo();
			this.setMap(null);
						
			return this;
		}.bind(tmp);
					
		tmp.hide=function(){
			this.setVisible(false);
						
			return this;
		}.bind(tmp);
					
		tmp.show=function(){
			google.maps.event.trigger(this, 'show');
			this.setVisible(true);
						
			return this;
		}.bind(tmp)
					
		tmp.isVisible=function(){
			return this.visible
		}.bind(tmp)
					
		// Agrega mensajes a los marcadores
		tmp.info=function(message,click,opt){
						
			opt=opt||{}
						
			var custom=click===true;
						
			click=typeof click=='function'?click:opt.click||function(){};
					
			var opt=$.extend({content: message},opt);
					
			this.infoBox=custom;
					
			if (custom) {
				this.infoWindow = new InfoBox(opt);
			} else {
				this.infoWindow = new google.maps.InfoWindow(opt);
			}
					

			this.infoWindowListener=google.maps.event.addListener(this, 'click', function () {
							
				if (activeInfoWindow) {
					activeInfoWindow.close();
				}
				this.infoWindow.open(map, this);
				activeInfoWindow=this.infoWindow;                
				click.bind(this)();
							
				return this;
							
			}.bind(this));
		}.bind(tmp);
					
		tmp.deleteInfo=function(){
			if (this.infoWindow) {
				this.infoWindow.setMap(null);
				delete this.infoWindow;
							
				google.maps.event.removeListener(this.infoWindowListener);
				delete this.infoWindowListener;
			}
			return this;
						
		}.bind(tmp);
					
		tmp.click=function(){
			google.maps.event.trigger(this, 'click');
		}.bind(tmp);
					
		return tmp;
					
	}			
	/* ************************************************************************** */
	google.maps.event.addDomListener(window, "load", initialize());

</script>  
  
  
  
   
<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>