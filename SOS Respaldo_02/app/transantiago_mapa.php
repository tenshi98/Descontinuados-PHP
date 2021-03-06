<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once 'core/config_app.php';
require_once 'core/datos_empresa.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "transantiago_mapa.php";
$location = $original.$w;
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Principal</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->

	<!--Estilos-->
	<link rel="stylesheet" href="map_css/layout1-1.css" media="all" />
	<link rel="stylesheet" href="map_css/forms.css" media="all" />
	<link rel="stylesheet" href="map_css/jscrollpane.css" media="all" />
	<link rel="stylesheet" href="map_css/default_mod.css">
	<link rel="stylesheet" href="map_css/rutas.css" media="all" />
	<link rel="stylesheet" href="map_css/tooltip.css" media="all" />
	<link rel="stylesheet" href="map_css/selects.css" media="all" />
	<link rel="stylesheet" href="map_css/poll.css" media="all" />
	<link rel="stylesheet" href="map_css/elements.css" media="all" />
	<link rel="stylesheet" href="map_css/ui-lightness/jquery-ui-1.10.3.custom.css" media="all" />
	<link rel="stylesheet" href="map_css/ui-lightness/custom.css" media="all" />
	<link rel="stylesheet" href="map_css/tutorial.css" media="all" />
	<link rel="stylesheet" href="map_js/tutorial/css/jcarousel.css" media="all" />
    
    <!--Vendor-->
	<script src="map_js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="map_js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="map_js/ie.ajax.js" type="text/javascript"></script>
	<script src="map_js/datepicker-es.js" type="text/javascript"></script>
	<script src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places,geometry&language=es&region=CL"></script>
	<script src="map_js/html5.js" type="text/javascript"></script>
	<script src="map_js/jquery-jscrollpane.min.js" type="text/javascript"></script>
	<script src="map_js/jquery-mousewheel.js" type="text/javascript"></script>
	<script src="map_js/infobox.js"></script>
	<script src="map_js/autocomplete.js" type="text/javascript"></script>
	
	<!--Globales-->
	<script src="map_js/global1-1.js" type="text/javascript"></script>
	<script src="map_js/poll1-1.js" type="text/javascript"></script>
	<script src="map_js/selects.js" type="text/javascript"></script>
	<script src="map_js/util.js" type="text/javascript" async=true></script>
	<script src="map_js/mapa1-1.js" type="text/javascript"></script>
	<script src="map_js/marker.js" type="text/javascript"></script>
	<script src="map_js/geocoder.js" type="text/javascript" async=true></script>
	<script src="map_js/main1-1.js" type="text/javascript" async=true></script>
	<script src="map_js/tooltip.js" type="text/javascript" async=true></script>

	<!--Slider Tutorial-->
	<script src="map_js/tutorial/jquery.jcarousel-core.min.js" type="text/javascript"></script>
	<script src="map_js/tutorial/global.js" type="text/javascript"></script>
	
	<!--Como llegar-->
	<script src="map_js/comoLlegar/main1-1.js" type="text/javascript"></script>
	<script src="map_js/comoLlegar/indicaciones.js" type="text/javascript"></script>
	<script src="map_js/comoLlegar/infoBox.js" type="text/javascript"></script>
	<script src="map_js/comoLlegar/controles.js" type="text/javascript"></script>
	<script src="map_js/comoLlegar/lineas1-1.js" type="text/javascript"></script>
	
	<!--Encuentra Paradas y Puntos Bip!-->
	<script src="map_js/encuentraParadas/main1-1.js" type="text/javascript"></script>

	<!--Conoce los recorridos-->
	<script src="map_js/conoceRecorridos/main1-2.js" type="text/javascript"></script>
	
<!--[if IE 9]>
	<script src="map_js/ie9.js" type="text/javascript"></script>
<![endif]-->

<style>
.infobox-wrapper {
    display:none;
}
#infobox {
    border:2px solid black;
    margin-top: 8px;
    background:#333;
    color:#FFF;
    font-family:Arial, Helvetica, sans-serif;
    font-size:12px;
    padding: .5em 1em;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    text-shadow:0 -1px #000000;
    -webkit-box-shadow: 0 0  8px #000;
    box-shadow: 0 0 8px #000;
}

</style>


<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
  
  
     
 <div class="mainLoader"><img src="map_img/ajax-loader2.gif" alt="Cargando..."></div>
	<div id="page">
		<header id="header">
			<nav>
				<ul>
					<li class="item-1" data-box="comoLlegar"><a href="#comoLlegar" title="Ver"><i>&nbsp;</i></a></li>
					<li class="item-2" data-box="comoLlegar"><a href="#encuentraParadas" title="Ver"><i>&nbsp;</i></a></li>
					<li class="item-3" data-box="comoLlegar"><a href="#conocerRecorridos" title="Ver"><i>&nbsp;</i></a></li>
				</ul>
			</nav>
			
		</header>
	
		<div id="main">
			<div id="map-canvas">
				
			</div>
		</div>
		
		<div id="indications" class="hidden_js" style="display: block;">
			<div class="hd">
				<span class="logo_indi"><img src="map_img/indi_logo.png" alt="indicaciones"/></span>
				<div class="head">
					<h2>Indicaciones</h2>
					<span class="hideShow" title="Mostrar/Ocultar" data-box="comoLlegar">Mostrar</span>
				</div>
			</div>
			<div class="indi_wrap">
				<div class="c" id="directions-panel">
				</div>
			</div>
		</div>
	
		<footer>
			
			<section id="comoLlegar" class="box none">				 
				 <article class="step-1">
					<header data-box="comoLlegar">
						<h1>??C??mo llegar?</h1>
						<span title="Ocultar/Mostrar" class="hideShowBox hideBox" ></span>
					</header>
					<div class="c">

					</div>
					<div class="f">
						<div class="fo collap_js" >
							<form action="" method="post" name="comoLlegar[step-2]" data-submit="buscarRuta" autocomplete="off">
								<div class="input text line"  >
									<div class="w">
										<div class="cp">
											<label for="step-2[desde]"><strong>Desde</strong></label>
											<div class="ind ico_point min"><span>A</span></div>
										</div>
										<input type="text" name="step-1[desde]" id="start2"  placeholder="Ej.: Plaza Italia"/><!-- class error-->
									</div>
								</div>
								
								<div class="input text line">
									<div class="w">
										<div class="cp">
											<label for="step-2[hasta]"><strong>Hasta</strong></label>
											<div class="ind ico_point min"><span>B</span></div>
										</div>
										<input type="text" name="step-1[hasta]" id="end2"  placeholder="Ej.: Huelen, Providencia"/>
									</div>
								</div>
                                <div class="line">
									<a href="#" title="Invertir ruta" class="invert" tabindex="999" >Invertir ruta <span class="ico ico_invert"></span></a>
								</div>
								<div class="line preferencias" >
									<div class="input select sel_pref">
										<label for="comoLlegar[pref]"><strong>Preferencias</strong></label><br>
										<select id="Preferencia" name="">
											<option value="1">M??s r??pido</option>
											<option value="2">Menos combinaciones</option>
											<option value="3">Solo bus</option>
										</select>
									</div>
									<div class="input select sel_temp">
										<label class="dia_label" for="comoLlegar[tiempo]"><strong>D??a de salida</strong></label>
										<label for="comoLlegar[hora]"><strong>Hora</strong></label><br/>
										<input type="text" class="datepicker" readonly />
										<select name="" id="Hora">
											<option value="00:00">00:00</option><option value="00:30">00:30</option>
											<option value="01:00">01:00</option><option value="01:30">01:30</option>
											<option value="02:00">02:00</option><option value="02:30">02:30</option>
											<option value="03:00">03:00</option><option value="03:30">03:30</option>
											<option value="04:00">04:00</option><option value="04:30">04:30</option>
											<option value="05:00">05:00</option><option value="05:30">05:30</option>
											<option value="06:00">06:00</option><option value="06:30">06:30</option>
											<option value="07:00">07:00</option><option value="07:30">07:30</option>
											<option value="08:00">08:00</option><option value="08:30">08:30</option>
											<option value="09:00">09:00</option><option value="09:30">09:30</option>
											<option value="10:00">10:00</option><option value="10:30">10:30</option>
											<option value="11:00">11:00</option><option value="11:30">11:30</option>
											<option value="12:00">12:00</option><option value="12:30">12:30</option>
											<option value="13:00">13:00</option><option value="13:30">13:30</option>
											<option value="14:00">14:00</option><option value="14:30">14:30</option>
											<option value="15:00">15:00</option><option value="15:30">15:30</option>
											<option value="16:00">16:00</option><option value="16:30">16:30</option>
											<option value="17:00">17:00</option><option value="17:30">17:30</option>
											<option value="18:00">18:00</option><option value="18:30">18:30</option>
											<option value="19:00">19:00</option><option value="19:30">19:30</option>
											<option value="20:00">20:00</option><option value="20:30">20:30</option>
											<option value="21:00">21:00</option><option value="21:30">21:30</option>
											<option value="22:00">22:00</option><option value="22:30">22:30</option>
											<option value="23:00">23:00</option><option value="23:30">23:30</option>
										</select>
									</div>
								</div>
								<div class="line tcenter submit">
									
									<input type="submit" class="btn_submit" value="C??mo llegar" id="btnComoLlegar"/>
									<span class="loader"><img src="map_img/ajax-loader.gif" alt="Cargando..." /></span>
								</div>
							</form>
						</div>
						<div id="suggestCont" style="display:none">
							
							<div id="resumen">
							</div>
						</div>
					</div>
				 </article> 
	
			</section>
			
			<section id="encuentraParadas" class="box none">
				 <article class="step-1">
					<header data-box="encuentraParadas">
						<div class="tit_min none">Encuentra Paradas y Puntos Bip</div>
						<h1>Encuentra Paradas y Puntos Bip</h1>
						<span title="Ocultar/Mostrar" class="hideShowBox hideBox"></span>
					</header>
					<div class="f collap_js" >
						<div class="form_c">
							<form action="#" method="post" name="encuentraParadas[step-1]" data-submit="encuentraParadas" autocomplete="off">
								<div class="input text line">
									<div class="w">
										<label for="step-1[4-direrccion]"><strong>Escribe una direcci??n o hito (museo, estadio, plaza, etc.)</strong></label><br/>
										<input type="text" name="step-1[4-direrccion]" id="ubicacion" placeholder="Ej.: Estaci??n Mapocho, Santiago"/>
										<a class="right clear small hide chg_js clickTog" href="#" title="Realizar otra b??squeda">Cambiar direcci??n</a>
									</div>
								</div>
								<div class="line submit tcenter chg_js">
									 
									<div class="w">
										<input type="submit" class="button clickTog yellow inline chg_js btn_submit" value="Buscar"/>
										<span class="loader"><img src="map_img/ajax-loader.gif" alt="Cargando..." /></span>
									</div>
								</div>
							</form>
						</div>
						<div class="c hide chg_js">
							<h2>Paraderos cercanos:</h2>
							<div class="parRes scrollable">
								<ol>
									<li>
										<div class="li">
											<span class="parada"><img src="map_img/parada.png" alt="Parada" /></span>
											<div><strong>Parada 11 - Plaza Italia</strong></div>
											<div><span class="small min">C??digo de parada: PA384</span></div>
										</div>
									</li>
									<li>
										<div class="li">
											<span class="parada"><img src="map_img/parada.png" alt="Parada" /></span>
											<div><strong>Parada 11 - Plaza Italia</strong></div>
											<div><span class="small min">C??digo de parada: PA384</span></div>
										</div>
									</li>
				
								</ol>
							</div>
						</div>
					</div>
				 </article>
				 <article class="step-2 none">
					<header>
						<h1>Conoce los recorridos</h1>
						<a href="#" class="help_inline" title="Seleccionar otro recorrido">Cambiar recorrido</a>
					</header>
					<div class="c">
						<div class="recRes">
							<span class="busColor" style="background-color: red;"><img src="map_img/logo_bus.png" alt="Bus"></span>
							<div class="tit">Recorrido <span class="numColor" style="background: red">212</span> <a href="#" title="Empresa de buses SuBus">Empresa de buses SuBus</a></div>
							<ol>
								<li>
									<div><span class="arrow"><img src="map_img/arrow_right.png" alt="Hacia" /></span> <strong>Hacia: Estaci??n Central</strong></div>
									<div><span class="hora1">Circula de Lunes a Viernes de 07:00 a 23:00 hrs.</span></div>
									<div><span class="hora2">S??bado de 08:00 a 21:00 hrs.</span></div>
									<div><span class="hora3">Domingo y Festivos de 07:00 a 23:00 hrs.</span></div>
								</li>
								<li>
									<div><span class="arrow"><img src="map_img/arrow_left.png" alt="Hacia" /></span> <strong>Hacia: Estaci??n Central</strong></div>
									<div><span class="hora1">Circula de Lunes a Viernes de 07:00 a 23:00 hrs.</span></div>
									<div><span class="hora2">S??bado de 08:00 a 21:00 hrs.</span></div>
									<div><span class="hora3">Domingo y Festivos de 07:00 a 23:00 hrs.</span></div>
								</li>
							</ol>
						</div>
					</div>
				 </article>
			</section>
	
			
			<section id="conocerRecorridos" class="box none steps">
				 <article class="step-1">
					<header data-box="conocerRecorridos">
						<h1>Conoce los recorridos</h1>
                        <span title="Ocultar/Mostrar" class="hideShowBox hideBox"></span>
					</header>
					<div class="f collap_js">
						<form action="#" method="post" name="cuandoLlega[step-1]" autocomplete="off" data-submit="conoceTusRecorridos">
							<div class="input text line">
								<div class="w">
									<label for="step-1[3-recorrido]"><strong>Ingresa el n??mero de recorrido</strong></label>
									<input type="text" name="step-1[3-recorrido]" id="recorrido"  placeholder="Ej.: 123"/>
								</div>
							</div>
							<div class="line submit tcenter ">
								
								<div class="w">
									<input type="submit" class="button yellow inline btn_submit" value="Buscar" />
									<span class="loader"><img src="map_img/ajax-loader.gif" alt="Cargando..." /></span>
								</div>
							</div>
						</form>
					</div>
				 </article>
				 <article class="step-2 none">
					<header data-box="conocerRecorridos">
						<h1>Conoce los recorridos</h1>
						<a href="#" class="help_inline btn_otr" title="Seleccionar otro recorrido">Cambiar recorrido</a>
						<span title="Ocultar/Mostrar" class="hideShowBox hideBox" ></span>
					</header>
					<div class="c collap_js" >
						<div class="recRes">
							<span class="busColor" style="background-color: red;"><img src="map_img/logo_bus.png" alt="Bus"></span>
							<div class="tit"><strong>Recorrido</strong> <span class="numColor" style="background: red">212</span> <a href="#" title="Empresa de buses SuBus" target="_blank">Empresa de buses SuBus</a></div>
							<ol>
								<li>
									<div class="rec"><span class="arrow"><img src="map_img/arrow_right.png" alt="Hacia" /></span> <strong>Hacia: Estaci??n Central</strong></div>
									<div><span class="hora1">Circula de Lunes a Viernes de 07:00 a 23:00 hrs.</span></div>
									<div><span class="hora2">S??bado de 08:00 a 21:00 hrs.</span></div>
									<div><span class="hora3">Domingo y Festivos de 07:00 a 23:00 hrs.</span></div>
								</li>
								<li>
									<div class="rec"><span class="arrow"><img src="map_img/arrow_left.png" alt="Hacia" /></span> <strong>Hacia: Estaci??n Central</strong></div>
									<div><span class="hora1">Circula de Lunes a Viernes de 07:00 a 23:00 hrs.</span></div>
									<div><span class="hora2">S??bado de 08:00 a 21:00 hrs.</span></div>
									<div><span class="hora3">Domingo y Festivos de 07:00 a 23:00 hrs.</span></div>
								</li>
							</ol>
						</div>
					</div>
				 </article>
			</section>
	
			
			<section id="cuandoLlega" class="box none steps">
				 <article class="step-1">
					<header>
						<h1>??Cu??ndo llega el bus?</h1>
						<!--<a href="#" class="help_inline" title="Ayuda paso a paso">Ayuda paso a paso</a>-->
					</header>
					<div class="f">
						<form action="#" method="post" name="cuandoLlega[step-1]" autocomplete="off">
							<div class="input text line">
								<div class="w">
									<label for="step-1[2-codigo]"><strong>C??digo de Parada</strong></label>
									<input type="text" name="step-1[2-codigo]" id="step-1[2-codigo]" />
								</div>
							</div>
							<div class="input text line">
								<div class="w">
									<label for="step-1[2-recorrido]"><strong>N??mero de recorrido (opcional)</strong></label>
									<input type="text" name="step-1[2-recorrido]" id="step-1[2-recorrido]" />
								</div>
							</div>
							<div class="line submit special_button_cont">
								<div class="w">
									<span class="note">M??s informaci??n en <a href="#" title="Encuentra tu paradero">Encuentra tu paradero</a></span>
									<input type="submit" class="button yellow inline" value="Buscar" />
									<span class="loader"><img src="map_img/ajax-loader.gif" alt="Cargando..." /></span>
								</div>
							</div>
						</form>
					</div>
				 </article>
				 <article class="step-2 none">
					<header>
						<h1>??Cu??ndo llega el bus?</h1>
					</header>
					<div class="c">
						<p>
							<strong><span class="gray">B??squeda para:</span><br/> "C??digo de Parada PA384 - Recorrido 406"</strong><br/>
							<a href="#" title="Realizar nueva b??squeda">Realizar nueva b??squeda</a>
						</p>
					</div>
				 </article>
			</section>
			
			
			
		</footer>


	</div>  
   
<div id="consulta" ></div>	     
<script>
var icon_Marker_ida = {
		name: 'markerIda',
		icon: 'map_img/icon/trans.png',
		title: 'Otros',
		visible: true
}
var icon_Marker_vuelta = {
		name: 'markerVuelta',
		icon: 'map_img/icon/trans.png',
		title: 'MiBus',
		visible: true
}


function transMarker(recorrido) {
	setInterval(function(){myTimer2(recorrido)},2000);
}
var mapax = 0;	
function myTimer2(recorrido) {

	switch(mapax) {
		//Ejecutar formulario con el recorrido y la ruta
		case 1:
			$('#consulta').load('transantiago_mapa_ubicaciones.php?recorrido='+recorrido);
		break;
		//ejecuta la ruta	
		case 2:
			//Los demas buses
			$.hideMarkers('markerIda');
			$.deleteMarkers('markerIda');
			$.hideMarkers('markerVuelta');
			$.deleteMarkers('markerVuelta');
			for(var i in locations){
				if(i==1){
					transporte = $.addMarker(icon_Marker_ida);
					transporte.show().setPosition(new google.maps.LatLng(locations[i][1], locations[i][2]));
				}else{
					transporte = $.addMarker(icon_Marker_vuelta);
					transporte.show().setPosition(new google.maps.LatLng(locations[i][1], locations[i][2]));
				}
			}
		break;		
	}

	mapax++;	
	if(mapax==3){mapax=1}
}
</script>      
<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>