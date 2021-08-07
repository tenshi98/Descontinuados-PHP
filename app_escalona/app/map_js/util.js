// Dibuja una ruta dado un arrar de arrays con coordenadas
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
    
    //map.fitBounds(bounds);
    
    return drawn;
}

// Lee variables GET pasadas a la aplicacion
var $_GET = {};
document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
        return decodeURIComponent(s.split("+").join(" "));
    }

    $_GET[decode(arguments[1])] = decode(arguments[2]);
});
    
var toggleLoading=function(el){
    $(el).find('.invert').toggleClass('disabled').prop('disabled',!$(el).find('.invert').prop('disabled'));
    
    $(el).find('.loader').toggleClass('loading');
    $(el).find(':input').add(el).prop('disabled',!$(el).find('[type="submit"]').prop('disabled'));
}