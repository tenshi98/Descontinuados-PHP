
function ContextMenu(map, options){
	options=options || {};
	
	this.setMap(map);
	this.classNames_=options.classNames || {};
	this.map_=map;
	this.mapDiv_=map.getDiv();
	this.menuItems_=options.menuItems || [];
	this.pixelOffset=options.pixelOffset || new google.maps.Point(10, -5);
}

ContextMenu.prototype=new google.maps.OverlayView();

ContextMenu.prototype.draw=function(){
	if(this.isVisible_){
		var mapSize=new google.maps.Size(this.mapDiv_.offsetWidth, this.mapDiv_.offsetHeight);
		var menuSize=new google.maps.Size(this.menu_.offsetWidth, this.menu_.offsetHeight);
		var mousePosition=this.getProjection().fromLatLngToDivPixel(this.position_);
		
		var left=mousePosition.x;
		var top=mousePosition.y;
		
		if(mousePosition.x>mapSize.width-menuSize.width-this.pixelOffset.x){
			left=left-menuSize.width-this.pixelOffset.x;
		} else {
			left+=this.pixelOffset.x;
		}
		
		if(mousePosition.y>mapSize.height-menuSize.height-this.pixelOffset.y){
			top=top-menuSize.height-this.pixelOffset.y;
		} else {
			top+=this.pixelOffset.y;
		}
		
		this.menu_.style.left=left+'px';
		this.menu_.style.top=top+'px';
	}
};

ContextMenu.prototype.getVisible=function(){
	return this.isVisible_;
};

ContextMenu.prototype.hide=function(){
	if(this.isVisible_){
		this.menu_.style.display='none';
		this.isVisible_=false;
	}
};

ContextMenu.prototype.onAdd=function(){
	function createMenuItem(values){
		var menuItem=document.createElement('div');
		menuItem.innerHTML=values.label;
		if(values.className){
			menuItem.className=values.className;
		}
		if(values.id){
			menuItem.id=values.id;
		}
		menuItem.style.cssText='cursor:pointer; white-space:nowrap';
		menuItem.onclick=function(){
			google.maps.event.trigger($this, 'menu_item_selected', $this.position_, values.eventName);
		};
		return menuItem;
	}
	function createMenuSeparator(){
		var menuSeparator=document.createElement('div');
		if($this.classNames_.menuSeparator){
			menuSeparator.className=$this.classNames_.menuSeparator;
		}
		return menuSeparator;
	}
	var $this=this;	//	used for closures
	
	var menu=document.createElement('div');
	if(this.classNames_.menu){
		menu.className=this.classNames_.menu;
	}
	menu.style.cssText='display:none; position:absolute';
	
	for(var i=0, j=this.menuItems_.length; i<j; i++){
		if(this.menuItems_[i].label && this.menuItems_[i].eventName){
			menu.appendChild(createMenuItem(this.menuItems_[i]));
		} else {
			menu.appendChild(createMenuSeparator());
		}
	}
	
	delete this.classNames_;
	delete this.menuItems_;
	
	this.isVisible_=false;
	this.menu_=menu;
	this.position_=new google.maps.LatLng(0, 0);
	
	google.maps.event.addListener(this.map_, 'click', function(mouseEvent){
		$this.hide();
	});
	
	this.getPanes().floatPane.appendChild(menu);
};

ContextMenu.prototype.onRemove=function(){
	this.menu_.parentNode.removeChild(this.menu_);
	delete this.mapDiv_;
	delete this.menu_;
	delete this.position_;
};

ContextMenu.prototype.show=function(latLng){
	if(!this.isVisible_){
		this.menu_.style.display='block';
		this.isVisible_=true;
	}
	this.position_=latLng;
	this.draw();
};

jQuery(function($){
	var contextMenu=new ContextMenu(map, {
	classNames:{
	    menu:'context_menu',
	    menuSeparator:'context_menu_separator'
	},
	menuItems:[
	    {
		className:'context_menu_item',
		eventName:'directions_origin_click',
		label:'Ruta desde aqui'
	    },
	    {
		className:'context_menu_item',
		eventName:'directions_destination_click',
		label:'Ruta hasta aca'
	    }
	]
    });
	
    google.maps.event.addListener(map, 'rightclick', function(mouseEvent){
	contextMenu.show(mouseEvent.latLng);
    });

    google.maps.event.addListener(contextMenu, 'menu_item_selected', function(latLng, eventName){
	switch(eventName){
	    case 'directions_origin_click':
		originMarker.setPosition(latLng);
		originMarker.show().deleteInfo();
		$.deleteRoute();
		$.getGeocode(originMarker);
		
		break;
	    case 'directions_destination_click':
		destinationMarker.setPosition(latLng);
		destinationMarker.show().deleteInfo();
		$.deleteRoute();
		$.getGeocode(destinationMarker);
		
		break;
	}
    });
});