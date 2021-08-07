(function($){

    var bases={
        'WALKING':''+
		'<div class="ww">'+
			'<div class="header">'+
				'<div class="line">'+
					'<i class="ico ico_person"></i>'+
					'<p><strong>{$this.instructions}</strong></p>'+
				'</div>'+
			'</div>'+
                        '<div class="footer">'+
				'<a class="avanzar" title="Siguiente paso" href="#">Paso siguiente <i class="ico_avanzar">&nbsp;</i></a>'+
			'</div>'+
		'</div>'+
	'',
        'BUS':''+
		'<div class="ww">'+
			'<div class="header">'+
				'<div class="line">'+
					'<i class="ico ico_busColor" style="background-color:{$this.transit.line.color};"></i>'+
					'<p><strong class="strong">Recorrido {$this.transit.line.short_name}</strong><br/><strong>Dirección: {$this.transit.headsign}</strong> '+
					'<br/>Hasta: {$this.transit.arrival_stop.name}</strong></p>'+
				'</div>'+
			'</div>'+
                        '<div class="footer">'+
				'<a class="avanzar" title="Siguiente paso" href="#">Paso siguiente <i class="ico_avanzar">&nbsp;</i></a>'+
			'</div>'+
		'</div>'+
	'',
        'SUBWAY':''+
		'<div class="ww">'+
			'<div class="header">'+
				'<div class="line">'+
					'<i class="ico ico_metro"></i>'+
					'<p><strong class="strong">Metro - {$this.transit.line.name}</strong><br/><strong>Dirección {$this.transit.headsign} '+
					'<br/>Hasta: Estación {$this.transit.arrival_stop.name}</strong></p>'+
				'</div>'+
			'</div>'+
                        '<div class="footer">'+
				'<a class="avanzar" title="Siguiente paso" href="#">Paso siguiente <i class="ico_avanzar">&nbsp;</i></a>'+
			'</div>'+
		'</div>'+
	'',
        'END':''+
		'<div class="ww">'+
			'<div class="header">'+
				'<div class="line">'+
					'<i class="ico ico_fin"></i>'+
					'<p><strong>{$this.end_address}</strong></p>'+
				'</div>'+
			'</div>'+
		'</div>'+
	''
    }
    

    var setDataBox=function(obj,type){
        
        var createBox=function(type,el){
            var str=bases[type];
            
            var reg=/\{([^{}]*)\}/g;
            
            var $this=obj;
            
            while (res=reg.exec(str)) {
                eval('var tmp2='+res[1]);                
                str=str.replace(res[0],tmp2);
		
		reg=/\{([^{}]*)\}/g;
            }
            
            return '<div class="box_datoPunto boxWhite">'+str+'</div>';
        };
        
        var t=type||(obj.travel_mode=="TRANSIT"?obj.transit.line.vehicle.type:"WALKING");
        
        return createBox(t,obj);
            
    }
    
    $.infoBox=function(marker,type){
        return setDataBox(marker,type);
    }
})(jQuery)