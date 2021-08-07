var originMarker,
	destinationMarker;
var serviceAddr = 'http://200.29.15.107/rest/'

jQuery(function($) {
	// Marcadores de inicio y fin de recorrido
	var optMarker = {
		draggable: true,
		events: {
			'dragstart': function() {
				if (this.infoWindow) {
					this.infoWindow.close();
				}
			},
			'dragend': function() {
				$.deleteRoute();
				$.deleteMarkers('closeMarkers');
				$.deleteMarkersInfo('searchMarkers');
				if ($('header[data-box="comoLlegar"] .showBox').length > 0) {
					$('header[data-box="comoLlegar"]').click();
				}
				$('#indications, #suggestCont').hide();
				$.getGeocode(this);
				$("#btnComoLlegar").click();
			}
		},
		el: $('#start2'),
		name: 'searchMarkers',
		animation: google.maps.Animation.DROP,
		icon: 'img/icon/punto_a_min.png',
		title: 'Origen',
		visible: false
	}
	originMarker = $.addMarker(optMarker);

	optMarker.el = $('#end2');
	optMarker.icon = 'img/icon/punto_b_min.png';
	optMarker.title = 'Destino';

	destinationMarker = $.addMarker(optMarker);

	// Autocompletar de direcciones
	$('#start2, #end2').autocompleteGoogle().on(
		'place_changed', function(e, place) {
			// console.log(place);

			var tmpMarker;

			switch ($(this).attr('id')) {
				case "start2":
					tmpMarker = originMarker;
					break;
				case "end2":
					tmpMarker = destinationMarker;
					break;
			}

			tmpMarker.hide();

			map.setCenter(place.geometry.location);
			map.setZoom(14);

			tmpMarker.setPosition(place.geometry.location);
			tmpMarker.show();

			$.deleteMarkers('closeMarkers');
			$.deleteRoute();

			$.deleteMarkersInfo('searchMarkers');
			if ($('header[data-box="comoLlegar"] .showBox').length > 0) {
				$('header[data-box="comoLlegar"]').click();
			}
			$('#indications, #suggestCont').hide();
		});

	// Funcion de reset
	map.reset(function() {
		$.deleteMarkers('closeMarkers');
		$.deleteRoute();
		$.deleteMarkersInfo('searchMarkers');
		$('#indications, #suggestCont').hide();
		//$.hideMarkers('searchMarkers');
		originMarker.setPosition(null);
		destinationMarker.setPosition(null);
		$('#start2,#end2').val('');
	});

	// Maneja datos enviados desde iframe en home
	if (getParameterByName('desde-name') && getParameterByName('hasta-name')) {
		var hasta, desde;

		if (getParameterByName('desde-ref')) {
			$.getByReference(getParameterByName('desde-ref'), function(res) {
				desde = res;
			});
		} else {
			desde = getParameterByName('desde-ref')
		}

		if (getParameterByName('hasta-ref')) {
			$.getByReference(getParameterByName('hasta-ref'), function(res) {
				hasta = res;
			});
		} else {
			hasta = getParameterByName('hasta-ref');
		}

		$(window).load(function() {

			var waitALittleLonger;

			waitALittleLonger = setInterval(function() {
				if (hasta && desde && $('#start2').is(':visible')) {

					clearInterval(waitALittleLonger);

					originMarker.show().setPosition(desde.geometry.location);
					destinationMarker.show().setPosition(hasta.geometry.location);

					$('#start2').val(getParameterByName('desde-name'));
					$('#end2').val(getParameterByName('hasta-name'));

					buscarRuta();
				}
			}, 100);

		});
	}
})

// Validar formulario y darle corriente al hamster
var buscarRuta = function(e) {
	var visited = readCookie('mypopup');
	var inputstart = $('#start2').val();
	var inputend = $('#end2').val();

	if (inputstart != '' && inputend != '') {
		$('#resumen').html('<div class="loadingRoutes"><span>Cargando rutas</span> <span class="loader"><img src="img/ajax-loader.gif" alt="Cargando..." /></span></div>');
		$.calcRoute();
		$('#suggestCont').show();
		if (!visited) {
			mostrarNotificacion();
			ocultarDpsSegundos(15000);
		}
	} else showError($('#start2').parents('form')); // Marcar en rojo
}

function getParameterByName(name) {
	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(location.search);
	return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

var geocoder = new google.maps.Geocoder();

(function($) {
	var geocode = function(marker, callback) {
		var el = marker.el;
		callback = callback || function() {}

		geocoder.geocode({
			'latLng': marker.getPosition()
		}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					marker.setPosition(results[0].geometry.location);
					if (el) {
						//el.blur();
						el.data('geocoded', results[0].formatted_address);
						el.val(results[0].formatted_address);
						el.change();
					}
				} else {
					alert('No se encontraron resultados');
				}
			} else {
				alert('El Geocodificador fallo debido a: ' + status);
			}
			callback(results, status);
		});
	}

	var getByReference = function(reference, callback) {

		var service = new google.maps.places.PlacesService(map);

		service.getDetails({
			reference: reference
		}, function(resp, status) {
			if (status != google.maps.places.PlacesServiceStatus.OK) {
				alert("error al buscar detalle de direccion: " + status);
			}
			callback(resp, status);
		});
	}

	$.getGeocode = geocode;
	$.getByReference = getByReference;

})(jQuery);