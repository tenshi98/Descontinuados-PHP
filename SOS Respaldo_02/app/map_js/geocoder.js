var geocoder=new google.maps.Geocoder();

(function($){
    var geocode=function(marker,callback){
        var el=marker.el;
        callback=callback||function(){}
     
        geocoder.geocode({
            'latLng': marker.getPosition()
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {                    
                    marker.setPosition(results[0].geometry.location);
                    if (el) {
                        //el.blur();
                        el.data('geocoded',results[0].formatted_address);
                        el.val(results[0].formatted_address);
                        el.change();
                    }
                } else {
                    alert('No se encontraron resultados');
                }
            } else {
                alert('El Geocodificador fallo debido a: ' + status);
            }
            callback(results,status);
        });
    }
    
    var getByReference=function(reference,callback){
        
        var service = new google.maps.places.PlacesService(map);
        
        service.getDetails({reference:reference},function(resp,status){            
            if (status != google.maps.places.PlacesServiceStatus.OK) {
                alert("error al buscar detalle de direccion: "+status);
            }
            callback(resp,status);
        });
    }
    
    $.getGeocode=geocode;
    $.getByReference=getByReference;
    
})(jQuery);