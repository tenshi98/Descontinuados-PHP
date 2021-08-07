
(function($){
    
    var markers={},
        activeInfoWindow=null;
    
    $.addMarker=function(opt){
        
        if (opt == undefined) return false;
        
        opt.map=map;
        
        var tmp=new google.maps.Marker(opt);
        
        if (opt.pos) tmp.setPosition(opt.pos);
        //tmp.setVisible(opt.visible||true);
        
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
        
            //this.infoWindow = new google.maps.InfoWindow(opt);

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
    
    // Para recorrer todos por tipo
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
    
    // Esconder todos los marcadores por tipo
    $.hideMarkers=function(name){
        foreachMarkerByName(name,function(el){
            el.hide();
        });
        return this;
    }
    
    $.showMarkers=function(name){
        foreachMarkerByName(name,function(el){
            el.show();
        });
        return this;
    }
    
    // Borrar todos los marcadores por tipo
    $.deleteMarkers=function(name){
        foreachMarkerByName(name,function(el){            
            el.delete();
        });
        delete markers[name];
        return this;
    }
    
    $.deleteMarkersInfo=function(name){
        foreachMarkerByName(name,function(el){            
            el.deleteInfo();
        });
        return this;
    }
    
    $.getMarkers=function(name){
        return markers[name]||false;
    }
    
    $.getMarkersBound=function(name){
        var bounds=new google.maps.LatLngBounds();
        foreachMarkerByName(name,function(el){
            bounds.extend(el.getPosition());
        });
        
        return bounds;
    }
    
    $.areMarkersVisible=function(name){
        
        var toRet=true;
        
        foreachMarkerByName(name,function(el){            
            if (!el.isVisible()) toRet=false;
        });
        
        return toRet;
        
    }
    
    $.clickMarker=function (name,id){
        if (markers[name]!=undefined&&markers[name][id]!=undefined) {
            markers[name][id].click();
        }
    }
    
    $.setMarkersBound=function(name){
        map.fitBounds($.getMarkersBound(name));
    }
    
    $(function(){
        $('#map-canvas').on('click','div.box_datoPunto a.avanzar',function(e){
            e.preventDefault();
                
            var name=activeInfoWindow.anchor.name;
            
            for(var a in markers[name]) {
                
                if (name=="searchMarkers"&&a==0) {
                    name="poliMarkers";
                    a=-1
                } else if (name=="poliMarkers"&&markers[name][parseInt(a)+1]==undefined) {
                    a=0;
                    name="searchMarkers";
                }
                
                if (a!=undefined&&(a==-1||name=="searchMarkers"||markers[activeInfoWindow.anchor.name][a]===activeInfoWindow.anchor)&&markers[name][parseInt(a)+1]!=undefined) {
                    google.maps.event.trigger(markers[name][parseInt(a)+1], 'click');
                    break;
                }
            }
        });
    });
    
    
})(jQuery);

