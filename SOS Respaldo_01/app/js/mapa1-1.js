var map;

jQuery(function($) {
    
    google.maps.visualRefresh = true;
    
    //Santiago, Chile
    var santiago=new google.maps.LatLng(-33.45281718606748, -70.63957510551757);

    var mapOptions = {
        zoom: 12,
        minZoom: 12,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        center: santiago,
        mapTypeControl: true,
        mapTypeControlOptions: {
            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            position: google.maps.ControlPosition.BOTTOM_CENTER
        },
        panControl: true,
        panControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
        },
        zoomControl: true,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.RIGHT_TOP
        },
        scaleControl: true,
        scaleControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
        },
        streetViewControl: true,
        streetViewControlOptions: {
            position: google.maps.ControlPosition.RIGHT_TOP
        }
        ,styles:[
                 {
                     "featureType": "road.highway",
                     "stylers": [
                         { "color": "#ffffff" }
                     ]
                 },{
                     "featureType": "road.highway",
                     "elementType": "labels.text",
                     "stylers": [
                         { "color": "#000000" },
                         { "weight": 0.1 }
                     ]
                 },{
                     "featureType": "road.arterial",
                     "stylers": [
                         { "color": "#ffffff" }
                     ]
                 },{
                     "featureType": "road.arterial",
                     "elementType": "labels.text",
                     "stylers": [
                         { "color": "#000000" },
                         { "weight": 0.1 }
                     ]
                 },{
                     "featureType": "road.local",
                     "stylers": [
                         { "color": "#ffffff" }
                     ]
                 },{
                     "featureType": "road.local",
                     "elementType": "labels.text",
                     "stylers": [
                         { "color": "#000000" },
                         { "weight": 0.1 }
                     ]
                 },{
                     "featureType": "landscape.natural",
                     "elementType": "geometry.fill",
                     "stylers": [
                         { "color": "#ebead5" }
                     ]
                 },{
                     "featureType": "transit.station.bus",
                     "stylers": [
                         { "visibility": "off" }
                     ]
                 },{
                     "featureType": "landscape.natural.terrain"  },{
                     "featureType": "poi",
                     "elementType": "labels.text.fill",
                     "stylers": [
                         { "color": "#E47903" }
                     ]
                 },{
                     "featureType": "transit.station.rail",
                     "elementType": "labels.text.fill",
                     "stylers": [
                         { "color": "#FF0000" },
                         { "visibility": "on" }
                     ]
                 },{
                     "featureType": "transit.station.rail",
                     "elementType": "labels.icon",
                     "stylers": [
                         { "hue": "#CC0000"}
                     ]
                 }
             ]	
       
         };
  
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  
    /**
    * Aca crear funciones de mapa, como reset, dentro del mapa:
    *
    * map.function(blabla) y listo :P
    */
    
    var callbacks=[]
    
    map.reset=function(callback){
        if (typeof callback === 'function') {
            callbacks.push(callback);
        } else {
            map.panTo(santiago);
            map.setZoom(12);
            for (var a in callbacks) {
                callbacks[a]();
            }
        }
    }
});