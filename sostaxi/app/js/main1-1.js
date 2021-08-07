//---------------------------------------Transantiago - Servicios Web--------------------------------------------------

//var serviceAddr='http://162.242.146.223:8080/ServiciosWebWS/rest/';
var serviceAddr = 'http://200.29.15.107/rest/'; //http://162.242.146.223

var directionsService = new google.maps.DirectionsService();


function callbackMarker(results, status) {
  if (status == google.maps.places.PlacesServiceStatus.OK) {
   
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}
function createMarker(place) {

  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location,
    animation: google.maps.Animation.DROP,
   icon:'img/bus.png'
  });
  
  var content='<!doctype html><html lang="en"><head><meta charset="UTF-8"><title>Transantiago Elementos de mapa</title><link rel="stylesheet" href="css/elements.css" media="all" /><link rel="stylesheet" href="css/jscrollpane.css" media="all" /><script src="js/jquery-1.10.2.min.js" type="text/javascript"></script><script src="js/jquery-jscrollpane.min.js" type="text/javascript"></script><script src="js/jquery-mousewheel.js" type="text/javascript"></script><script src="js/global.js" type="text/javascript"></script></head><body><div class="box_parada"><div class="w"><header><span class="logoBus">&nbsp;</span><span class="numParada">4</span><h1><span>Av.</span> Vicuña Mackena</h1><h2>Providencia, Santiago</h2></header><div class="c scrollable"><ul class="listParadas"><li><a href="#" title="Detalles del recorrido"><strong>210E</strong><span class="target">a San Carlos de Apoquindo</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>406C</strong><span class="target">a San Joaquin</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>210</strong><span class="target">a Terminal de Buses Metropolitano Vespucio Norte</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>405N</strong><span class="target">a San Carlos de Apoquindo</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>210</strong><span class="target">a San Carlos de Apoquindo</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>210</strong><span class="target">a San Carlos de Apoquindo</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>210</strong><span class="target">a San Carlos de Apoquindo</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>210</strong><span class="target">a San Carlos de Apoquindo</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>210</strong><span class="target">a San Carlos de Apoquindo</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>210</strong><span class="target">a San Carlos de Apoquindo</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>210</strong><span class="target">a San Carlos de Apoquindo</span></a></li><li><a href="#" title="Detalles del recorrido"><strong>210</strong><span class="target">a San Carlos de Apoquindo</span></a></li></ul></div><footer><p>Código de Parada: PC86</p></footer></div></div></body></html>';

    google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(content);
    infowindow.open(map, this);
  });
    
}

var iteracion =new Array();
var CountcalcRoute=0;
var cont=0;
var response=null;
var color =null;
var startlocLegs,endlocLegs,startlocSteps,endlocSteps;

jQuery(function($){
  
    $.support.cors = true;
  
    $(window).load(function(){
	    
	var waitALittleLonger;
	
	waitALittleLonger=setInterval(function(){
	    if (window.location.hash!=''&&$('#start2').is(':visible')) {
		
		clearInterval(waitALittleLonger);
		
		$('a[href='+window.location.hash+']:first').click();
	    }
	},100);
	
    });
  
    $('body').on('submit','[data-submit]',function(e){
      
	e.preventDefault();
	e.stopPropagation();
	var func=$(this).data('submit');
	eval(func+'.bind(this)(e);');
    });
});