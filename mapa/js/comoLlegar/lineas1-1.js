(function($){
    var sortRoute;
    sortRoute={
        returnArr:function(res,sort){
            
            var tmp=[];
            
            for (var a in sort) {
                if (sort[a]!=undefined) {
                    tmp.push(res.routes[sort[a].key]);
                }
            }
            
            if (tmp.length==1) {
                tmp.push(tmp[0]);
            }
            
            res.routes=tmp;
            
            return res;
        },
        info:function(res){
            
            var toReturn=[]
            
            for (var route in res.routes){
                var base={
                    time:res.routes[route].legs[0].duration.value,
                    legs:res.routes[route].legs[0].steps.length,
                    metro:false,
                    key:route
                }
                
                for (step in res.routes[route].legs[0].steps) {
                    if (res.routes[route].legs[0].steps[step].transit!=undefined&&res.routes[route].legs[0].steps[step].transit.line.vehicle.type=="SUBWAY") {
                        base.metro=true;
                    }
                }
                
                toReturn[route]=base;
            }
            return toReturn;
        },
        onlyBus:function(res){
            
            var tmp=sortRoute.info(res);
            
            for (var a in tmp) {
                
                if (tmp[a].metro) {
                    
                    delete tmp[a];
                }
            }
            
            return sortRoute.returnArr(res,tmp);
        },
        lessSteps:function(res){
            var tmp=sortRoute.info(res);
            
            tmp.sort(function(a,b){
                return a.legs-b.legs;
            });
            
            return sortRoute.returnArr(res,tmp);
        },
        fastest:function(res){
            var tmp=sortRoute.info(res);
            
            tmp.sort(function(a,b){
                return a.time-b.time;
            });
            
            return sortRoute.returnArr(res,tmp);
        }
    }
    
    var drawLine=[];
    
    var polilines=[],
        loadedRoutes=[],
        opacity=1,
        previewOpacity=0.6,
        strokeWeight=5,
        polilinesPreview=[];
    /**
     * Borrar lineas del mapa
     */
    var deleteLines=function(){
        deletePreview();
        for (var a in polilines) {
            polilines[a].setMap(null);
        }
        $.deleteMarkers('poliMarkers');
        $.deleteMarkersInfo('searchMarkers');
        polilines=[];
    }
    
    var deletePreview=function(){
        if (polilinesPreview.length>0) for (var a in polilinesPreview) {
                polilinesPreview[a].setMap(null);
            }
        polilinesPreview=[];
    }
    
    var previewRoute=function(num){
        
        if (loadedRoutes.routes[num]==undefined) {
            return false;
        }
        
        var route = loadedRoutes.routes[num].legs[0]; // Ruta elegida (cero por defecto) 
        
        var oldOpacity=opacity;
        opacity=previewOpacity;
        
        for(var a in route.steps){
        
            var color='#444';
     
            var opt={
                path: route.steps[a].path,
                strokeColor: color,
                strokeWeight: strokeWeight,
                strokeOpacity: opacity
            }
            
            var travelMode=route.steps[a].travel_mode;
            
            var tmp=new google.maps.Polyline(opt);
            tmp.setMap(map);
            
            polilinesPreview.push(tmp);
            
        }
        
        opacity=oldOpacity;
        
        return true;
    }
    
    var drawRoute=function(num){
        
        if (loadedRoutes.routes[num]==undefined) {
            return false;
        }
        
        deleteLines();
        
        var defaultPath={
            "WALKING":{
                strokeOpacity: 0,
                icons:[{
                    icon:{
                        path: 'M 0,0 0,.1',
                        strokeOpacity: opacity,
                        scale: strokeWeight
                    },
                    offset:0,
                    repeat:'10px'
                }]
            },
            "TRANSIT":{
            }
        }
        
        var defaultMarker={
            "START":'img/icon/punto_a_min.png',
            "END":'img/icon/punto_b_min.png',
            "WALKING":"img/icon/caminar.png",
            "BUS":'img/icon/bus.png',
            "SUBWAY":'img/icon/metro.png'
        }
        
        var clickFunction=function(){
            map.setZoom(16);
            map.panTo(this.getPosition());
            
            var api=$('#directions-panel').data('jsp');
            
            if (this.markerFamilyName=="poliMarkers"){
                api.scrollToElement($('.adp tr:eq('+(parseInt(this.markerFamilyPos)+2)+')'));
            } else {
                if (parseInt(this.markerFamilyPos)==0) {
                    api.scrollToElement($('.adp tr:eq(0)'));
                } else {
                    api.scrollToElement($('.adp-agencies'));
                }
            }
            
            $('#indications.hidden_js span.hideShow').click();
            
        }
        
        var setMarker=function(type,pos){
            
            var tmp=$.addMarker({
                name:"poliMarkers",
                map: map,
                position:pos,
                visible:true,
                icon:defaultMarker[type]
            })
            
            return tmp;
            
        }
            
        var route = loadedRoutes.routes[num].legs[0]; // Ruta elegida (cero por defecto)
        
        //console.log(route);
        
        for(var a in route.steps){
        
            var color='#000000';
            
            if (route.steps[a].transit&&route.steps[a].transit.line.color) {
                color=route.steps[a].transit.line.color; // Color de la ruta enviada por goole
            }
            
            var opt={
                path: route.steps[a].path,
                strokeColor: color,
                strokeWeight: strokeWeight,
                strokeOpacity: opacity,
                geodesic: true,
                //clickable:false
            }
            
            var travelMode=route.steps[a].travel_mode;
            
            for (var b in defaultPath[travelMode]) {
                opt[b]=defaultPath[travelMode][b];
            }
            
            var tmp=new google.maps.Polyline(opt);

            tmp.setMap(map);
            
            polilines.push(tmp);
            
            var mark=false;
            
            if (a==0) { // Si es el primero ignorar icono y poner marcador de inicio
                //mark=setMarker("START",route.steps[a].start_location);
                mark=originMarker;
            } else { // De lo contrario, WALKING para WALKING o tipo de vehiculo para transit
                mark=setMarker(
                    travelMode!="TRANSIT"?
                        "WALKING":route.steps[a].transit.line.vehicle.type
                    ,route.steps[a].start_location
                );
            }
            
            // Agregar información de popup del marcador
            mark.info($.infoBox(route.steps[a]),clickFunction);
            
            if (a==route.steps.length-1) { // El ultimo marcador no es el ultimo punto ... en este se agrega end sin nada
                //mark=setMarker("END",route.steps[a].end_location);
                mark=destinationMarker;
                mark.info($.infoBox(route,"END"),clickFunction);
            }
            
        }
        
        $.setMarkersBound(['poliMarkers','searchMarkers']);
        
        $.showIndicaciones(route);
        
        return true;
    }
    
    function calcRoute() {
        
        deleteLines();
        
        var travelMode = 'TRANSIT';
    
        var hrs,min,timestamp,
            DepartureTime,
            timehour=$('#Hora').val()||'00:00';
            
        var splithour = timehour.split(":");
        hrs=splithour[0];
        min=splithour[1];
    
        DepartureTime=$('.datepicker').datepicker('getDate');
        DepartureTime.setHours(hrs);
        DepartureTime.setMinutes(min);
    
        var start=originMarker.getPosition()||$('#start2').val();
        var end=destinationMarker.getPosition()||$('#end2').val();
    
    // TODO BORRAR LINEA ANTERIOR
    
        var request = { // Prepara request
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode[travelMode],
            provideRouteAlternatives : true,
            transitOptions: {
                departureTime: DepartureTime
            },
            unitSystem: google.maps.UnitSystem.METRIC
        };
        
        toggleLoading($('#comoLlegar'));
        
        // Consultamos
        directionsService.route(request, function(response, status) {
            
            toggleLoading($('#comoLlegar'));
            
            $('#resumen').html('');
            
            if (status!=google.maps.DirectionsStatus.OK) {
                $('#suggestCont').hide();
            }
            if (response!=null) {
                switch($('#Preferencia').val()){
                    case '3':
                        response=sortRoute.onlyBus(response);
                        if (response.routes.length==0) {
                            status=google.maps.DirectionsStatus.ZERO_RESULTS;
                        }
                        break;
                    case '2':
                        response=sortRoute.lessSteps(response);
                        break;
                    default:
                        response=sortRoute.fastest(response);
                }
            }
            
            switch (status) {
                case google.maps.DirectionsStatus.OK:                    
                    
                    $.showOptions(response);
                    
                    loadedRoutes=response;
                    
                    drawRoute(0); // Dibujamos ruta 0
                    getPuntosBip(response);
                    
                    $('#indications').show(); // Este no va aca
                    
                    break;
                case google.maps.DirectionsStatus.NOT_FOUND:
                    alert('Disculpanos, La direccion no pudo ser encontrada.\n\nPor favor intentalo nuevamente ');
                    break;
                case google.maps.DirectionsStatus.ZERO_RESULTS:
                    alert('No existen servicios de transporte público para satisfacer la ruta señalada.');
                    break;
                case google.maps.DirectionsStatus.INVALID_REQUEST:
                    alert('La ruta no pudo se encontrada asegurate de que los puntos de origen y destino esten bien definidos');
                    break;
                case google.maps.DirectionsStatus.OVER_QUERY_LIMIT:
                    alert('Se han enviado muchas solicitudes de ruta, por favor espera a que termine de cargar la anterior');
                    break;
                case google.maps.DirectionsStatus.UNKNOWN_ERROR :
                    alert('Se ha producido un error. Por favor intentalo nuevamente.');
                    break;
            }
        });
        
    }
    
    var getPuntosBip=function(resp){
        //console.log(resp);
        if (
            resp.routes&&
            resp.routes[0]&&
            resp.routes[0].legs&&
            resp.routes[0].legs[0]&&
            resp.routes[0].legs[0].start_location
            ) {
                var pos=resp.routes[0].legs[0].start_location;
                $.support.cors = true; 
                $.ajax({
                    crossDomain: true,
                    url:serviceAddr+'getpuntobip',
                    data:{
                        lat:pos.lat(),
                        lon:pos.lng()
                    },
                    type:'get',
                    success:function(resp){
                        //console.log(resp);
                        $.showMarcadores(resp);
                    },
                    error:function(resp){
                        var args=arguments;
                        //console.log(args);
                     //   alert('Error al buscar puntos bip! cercanos');
                     console.log('Error al buscar puntos bip! cercanos')
                    }
                });
                
            }
    }
    
    // Cambio de rutas al clikear alternativas
    jQuery(function($){
        $('#resumen').on('click','div>ol>li',function(){
            
            if ($('#comoLlegar .showBox').length>0) {
                return;
            }
            
            $(this).parent().find('li').removeClass('adp-listsel');
            $(this).addClass('adp-listsel');
            drawRoute($(this).index())
            directionsDisplay.set('routeIndex', $(this).index());
            $('#indications span.hideShow').click();
            
        }).on('mouseleave','div>ol>li',deletePreview)
        .on('mouseenter','div>ol>li:not(.adp-listsel)',function(){        
            previewRoute($(this).index())
        })
    });
    
    $.calcRoute=calcRoute;
    $.deleteRoute=function(){
        deleteLines();
        $('#resumen').html('');
    }
    
})(jQuery);