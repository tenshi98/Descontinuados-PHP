jQuery(function(){
    
    // Boton invertir ruta
    $('.invert').click(function(e){
        
        e.preventDefault();
        
        if ($(this).hasClass('disabled')) {
            return false;
        }
        
        var desde2 = $('#start2').val();
        var hasta2 = $('#end2').val();
        $('#start2').val(hasta2);
        $('#end2').val(desde2);
        
        
        hasta2=originMarker.getPosition();
        desde2=destinationMarker.getPosition();
        
        originMarker.show().setPosition(desde2);
        destinationMarker.show().setPosition(hasta2);
        
        $.deleteMarkers('closeMarkers');
        $.deleteRoute();
        
    });
});