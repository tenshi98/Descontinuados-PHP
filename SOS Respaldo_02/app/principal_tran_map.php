<!doctype html>
<html lang="en" id="mainWin">
<head>
	<meta charset="UTF-8">
	<title>Transantiago</title>
	<link href="css/default_mod.css" rel="stylesheet">

	<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places,geometry&language=es&region=CL"></script>
	<script src="js/jquery-jscrollpane.min.js" type="text/javascript"></script>
	<script src="js/infobox.js"></script>
	<script src="js/autocomplete.js" type="text/javascript"></script>
	<script src="js/global1-1.js" type="text/javascript"></script>
	<script src="js/util.js" type="text/javascript" async=true></script>
	<script src="js/mapa1-1.js" type="text/javascript"></script>
	<script src="js/marker.js" type="text/javascript"></script>
	<script src="js/main1-1.js" type="text/javascript" async=true></script>
	<script src="js/encuentraParadas/main1-1.js" type="text/javascript"></script>
	<script src="js/conoceRecorridos/main1-2.js" type="text/javascript"></script>

</head>
<body>
<div id="page">
<header id="header">       
<form action="#" method="post" name="cuandoLlega[step-1]" autocomplete="off" data-submit="conoceTusRecorridos"  id="form1">
<input type="text" name="step-1[3-recorrido]" id="recorrido"  placeholder="Ej.: 123" value="<?php echo $_GET["recorrido"] ?>"/>						
</form>       
<section id="conocerRecorridos" class="">
<article class="step-2">
<div class="c collap_js">
<div class="recRes">
<div class="tit"><strong>Recorrido</strong> <span class="numColor" style="background: red">212</span> <a href="#" title="Empresa de buses SuBus" target="_blank">Empresa de buses SuBus</a></div>
<ol>
<li><div id="ida" class="rec">Hacia: Estación Central</div></li>
<li><div id="vuelta" class="rec">Hacia: Estación Central</div></li>
</ol>
</div>
</div>
</article>
</section>      
</header>


<div id="main">
    <div class="bar">
        <div class="tabs puu_back"><span>Patente</span><p class="puu" id="patente"></p></div>
        <div class="tabs delante"><span>Bus Delante</span><p class="puu" id="anterior"></p></div>
        <div class="tabs atras"><span>Bus Atras</span><p class="puu" id="siguiente"></p></div>
        
        
        <div class="tabsx2" id="rellenar"></div>
    </div>
    
    <div id="map-canvas"></div>
</div>

</div>
<div id="consulta" ></div>	

<script type="text/javascript"> 
window.onload=function(){
	var timeout = 0;
	var myVar = setInterval(function(){myTimer()},1000);
	function myTimer() {
		switch(timeout) {
			//Ejecutar formulario con el recorrido y la ruta
			case 2:
				$("#form1").submit();
				break;
			//ejecuta la ruta	
			case 4:
				$('#<?php echo $_GET["ruta"] ?>').trigger('click');
				break;
			//ejecuto el php para obtener los datos	
			case 6:
				transMarker();
				break;	
			case 8:
				window.clearInterval(myVar);
				break;		
		}
		timeout++;
	}			
}



var icon_transMarker = {
		name: 'transMarkers',
		icon: 'img/icon/trans.png',
		title: 'Otros',
		visible: true
}
var icon_miBus = {
		name: 'miBus',
		icon: 'img/icon/mibus.png',
		title: 'MiBus',
		visible: true
}


function transMarker() {
	setInterval(function(){myTimer2()},2000);
}
var mapax = 0;	
var miBus = <?php echo $_GET['orden'];?>;
function myTimer2() {

	switch(mapax) {
		//Ejecutar formulario con el recorrido y la ruta
		case 1:
			$('#consulta').load('transantiago_ubicaciones.php?idrecorrido=<?php echo $_GET['idrecorrido'].'&idruta='.$_GET['idruta'];?>');
		break;
		//ejecuta la ruta	
		case 2:
			//Los demas buses
			$.hideMarkers('transMarkers');
			$.deleteMarkers('transMarkers');
			$.hideMarkers('miBus');
			$.deleteMarkers('miBus');
			//document.getElementById('anterior').innerHTML= '10';
			for(var i in locations){
				if(i!=miBus){
					transporte = $.addMarker(icon_transMarker);
					transporte.show().setPosition(new google.maps.LatLng(locations[i][1], locations[i][2]));
					
				}else{
					transporte = $.addMarker(icon_miBus);
					transporte.show().setPosition(new google.maps.LatLng(locations[i][1], locations[i][2]));
					map.panTo(transporte.position);	
					document.getElementById('patente').innerHTML= locations[i][3];
					calculateDistances(i);
				}
			}
		break;		
	}

	mapax++;	
	if(mapax==3){mapax=1}
}

			
				
function calculateDistances(valor) {						
	var total_usr = locations.length;
	var valor1 = parseInt(valor);
	var valor2 = 0;
	var valor3 = 0;
	if(valor1===total_usr-1){valor2=1;}else{valor2 = valor1 + 1;}
	if(valor1===1){valor3 = total_usr-1;}else{valor3 = valor1 - 1;}
	
	var origin1 = new google.maps.LatLng(locations[valor1][1], locations[valor1][2]);
	var origin2 = new google.maps.LatLng(locations[valor2][1], locations[valor2][2]);
	var destination = new google.maps.LatLng(locations[valor3][1], locations[valor3][2]);
	var service = new google.maps.DistanceMatrixService();
	service.getDistanceMatrix(
		{
			origins: [origin1,origin2],
			destinations: [destination],
			travelMode: google.maps.TravelMode.DRIVING,
			avoidHighways: false,
			avoidTolls: false
		}, callback);
}
					
function callback(response, status) {
	if (status != google.maps.DistanceMatrixStatus.OK) {
		alert('Error was: ' + status);
	} else {
		var origins = response.originAddresses;
		var destinations = response.destinationAddresses;
		var anterior = document.getElementById('anterior');
		var siguiente = document.getElementById('siguiente');
		anterior.innerHTML = '';
		siguiente.innerHTML = '';
			
		for (var i = 0; i < origins.length; i++) {
			var results = response.rows[i].elements;
			for (var j = 0; j < results.length; j++) {
				
				if(i===0){
					siguiente.innerHTML = results[j].duration.text;
				}else{
					anterior.innerHTML = results[j].duration.text;	
				}
				
			}
		}
	}
}



					
					
					
					
		
	

</script> 
	


	

</body>
</html>