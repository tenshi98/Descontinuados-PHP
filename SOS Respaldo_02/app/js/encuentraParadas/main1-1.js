var encuentraParadas; // Callback del formulario
var showingRoute = false;

var request1, request2;
var serviceAddr = 'http://200.29.15.107/rest/'

jQuery(function($) {

	uMarker = $.addMarker({
		map: map,
		draggable: true,
		animation: google.maps.Animation.DROP,
		icon: 'img/icon/punto_mid.png',
		//draggable:true,
		events: {
			'dragend': function() {
				$.getGeocode(this);
				encuentraParadas();
				if (!$('#encuentraParadas a.chg_js.clickTog').hasClass('hide')) toogle();
			}
		},
	}).hide();

	uMarker.el = $('#ubicacion');

	var placeChangeFunc = function(e, place) {
		map.setCenter(place.geometry.location);
		map.setZoom(16);

		uMarker.inputVal = $('#ubicacion').val();

		uMarker.setPosition(place.geometry.location);
		uMarker.show();
		uMarker.setMap(map);
	}

	$('#ubicacion').autocompleteGoogle().on('place_changed', placeChangeFunc)

	var toogle = function() {

		$('#ubicacion').prop('disabled', !$('#ubicacion').prop('disabled'));
		$('#encuentraParadas .chg_js').toggleClass('hide');

		refreshScroll($('.parRes.scrollable'));
	}

	/*$('#encuentraParadas a.chg_js.clickTog').click(function(e) {
		e.preventDefault();
		if (showingRoute) {
			showingRoute.setMap(null);
			showingRoute = false;
		}
		//uMarker.set('draggable',true);
		$.deleteMarkers('closeMarkers');
		toogle();
	});*/

	var types = [
		'bus', // 0 = Bus
		'bip' // 1 = Bip
	]

	var defaultMarker = {
		bus: 'img/icon/bus.png',
		bip: 'img/icon/bip.png'
	}

	// Html templates para encuentra paraderos
	var template = {
		list: '',
		marker: {
			base: '',
			bip: '',
			recorrido: '',
			service: ''
		}
	}

	// Reemplaza variables en template
	var info = function(path, data) {

		var str;
		eval('str=template.' + path);

		var reg = /\{([^{}]*)\}/g;
		var res;

		while (res = reg.exec(str)) {
			var rep = eval(res[1]);

			rep = rep ? rep : '';

			str = str.replace(res[0], rep);
			reg = /\{([^{}]*)\}/g; // Reset internal pointer
		}

		return str;
	}

	// Agrega marcador a pagina
	var addMarker = function(pos, type) {

		type = types[type]; // Numero a palabra

		return $.addMarker({
			name: "closeMarkers",
			map: map,
			position: pos,
			visible: true,
			icon: defaultMarker[type]
		})
	}

	var showMarcadores = function(data) {

		for (var a in data) {
			var tmp = addMarker(new google.maps.LatLng(data[a].pos[0], data[a].pos[1]), data[a].type);

			tmp.servicios = data[a].servicios;

			if (data[a].type == 0) {

				tmp.info(info('marker.base', (data[a])), false, {/*
					disableAutoPan: false
					//,maxWidth: 285
					,
					pixelOffset: new google.maps.Size(0, 0) //-435=3 -363=2 -291=1
					//,zIndex: null
					,
					boxStyle: {
						width: "0px"
					}
					//,closeBoxMargin: "10px"
					//,closeBoxURL: "img/close.png"
					,
					infoBoxClearance: new google.maps.Size(1, 1),
					isHidden: true,
					pane: "floatPane",
					enableEventPropagation: false,
					click: function() {/*
						this.infoWindow.resized = false;

						if (showingRoute) {
							showingRoute.setMap(null);
							showingRoute = false;
						}

						//var el = this.listItem;

						//$('#encuentraParadas .parRes .jspPane ol li').removeClass('active');
						//$(el).addClass('active');

						//var api = $('#encuentraParadas .scrollable').data('jsp');

						//api.scrollToElement($(el));

						google.maps.event.addListener(this.infoWindow, 'domready', function() {
							//$('.infoBox').css('height', "0px");
							//$('#paraderos').css('top', 400 - $('#paraderos').height() + "px");
							$('#paraderos .close').click(function(e) {

								$('#encuentraParadas .parRes .jspPane ol li').removeClass('active');
								e.preventDefault();
								if (showingRoute) {
									showingRoute.setMap(null);
									showingRoute = false;
								}
								$('#paraderos').data('infoWindow').close();
							});
							
							

							//$('#paraderos').data('servicios', this.servicios);
							//$('#paraderos').data('infoWindow', this.infoWindow);

							google.maps.event.clearListeners(this.infoWindow, 'domready');

							// Fix para poder scrollear con el mouse en paraderos
							$('#paraderos').on('mouseenter mouseleave', function(e) {
								map.setOptions({
									scrollwheel: e.type == 'mouseleave'
								})
							});

							/*$('#paraderos [data-id]').click(function(e) {
								$('#paraderos .scrollable').height(400);
								$('#paraderos').css('top', "0px");
								e.preventDefault();
								encuentraRecorrido($(this));
								//encuentraRecorrido
							});

							this.infoWindow.resized = true;
							$('#paraderos .scrollable').jScrollPane({
								showArrows: true,
								mouseWheelSpeed: 40,
								autoReinitialise: true
							});

						}.bind(this));
					}
				*/});
			} else {
				//tmp.info(info('marker.bip', (data[a])));
			}

			if (types[data[a].type] === 'bus') {
				var el = $(info('list', (data[a])));

				//el.data('marker', tmp);

				//tmp.listItem = el;

				//$('#encuentraParadas .parRes .jspPane ol').append(el);

				el.click(function(e) {
					//e.preventDefault();
					//$(this).data('marker').click();
				});

			}
		}

		if ($('#encuentraParadas .parRes .jspPane ol li').length == 0) {
			$('#encuentraParadas .parRes .jspPane ol').append($('<li/>').html('No se encontraron paraderos cercanos.'))
		}
	}

	// Entrada del formulario
	encuentraParadas = function(e, retry) {

		if (!$('#ubicacion').data('ready')) return;

		var $this = this;

		if (retry == undefined) {
			toggleLoading($this);
		}

		if ((!request1 || request1.readyState == 4) && (!request2 || request2.readyState == 4)) {

			$('#ubicacion').val(uMarker.inputVal || '');

			var pos = uMarker.getPosition();

			if (pos == undefined || !uMarker.isVisible()) {
				toggleLoading($this);
				$('#ubicacion').addClass('error').one('change keydown keypress', function() {
					$(this).removeClass('error')
				}).blur().focus();
				return;
			}

			// Borro datos anteriores
			$('#encuentraParadas .parRes .jspPane ol').html('');
			$.deleteMarkers('closeMarkers');
			$.support.cors = true;
			request1 = $.ajax({
				crossDomain: true,
				url: serviceAddr + 'getpuntoparada',
				data: {
					lat: pos.lat(),
					lon: pos.lng()
				},
				type: 'get',
				success: function(resp) {
					//console.log(resp);
					showMarcadores(resp);
					toggleLoading($this);
					toogle();
					//uMarker.set('draggable',false);
				},
				error: function(resp) {
					var args = arguments;
					//console.log(args);
					alert('Error al buscar puntos cercanos');
					toggleLoading($this);
				}
			});
		} else setTimeout(function() {
			encuentraParadas.bind($this)(e, true);
		}, 100);
	}

	toogleLoaderCartel = function() {
		$('#paraderos .loader').toggleClass('loading');
	}

	// Encuentra informacion de un recorrido
	encuentraRecorrido = function(el) {

		var codParada = $('#paraderos').data('cod'),
			codServicio = $(el).data('id');

		toogleLoaderCartel();
		$.support.cors = true;
		request2 = $.ajax({
			crossDomain: true,
			url: serviceAddr + 'getrecorrido',
			data: {
				cod: codServicio
			},
			type: 'get',
			success: function(resp) {

				var servicios = $('#paraderos').data('servicios'),
					id = $(el).data('id'),
					data;

				for (var a in servicios) {
					if (id == servicios[a].id) {
						data = servicios[a];
						break;
					}
				}

				if (data == undefined) {
					alert('no se donde clikeo, pero no existe esa ruta.');
					return false;
				}

				var holder = $('<div/>'),
					parent = $('#listado-paradas').parent();

				holder.append($('#listado-paradas'));

				parent.append($(info('marker.recorrido', $.extend(resp, data))));

				var infoWindow = $('#paraderos').data('infoWindow')

				infoWindow.setOptions({
					pixelOffset: new google.maps.Size(-142, -435)
				})

				$('#paraderos .jspContainer').data('oldHeight', $('#paraderos .jspContainer').height()).height(236);

				refreshScroll($('#paraderos .scrollable'));
				/*$('#data-recorrido .recorrido a').click(function(e) {
					e.preventDefault();
					if (!showingRoute) {
						showingRoute = drawRouteFromArray(resp.path, {
							color: resp.negocio.color
						});
					}
				});*/

				/*$('#paraderos a.volver').show().click(function(e) {

					$('#paraderos a.volver').hide();

					if (showingRoute) {
						showingRoute.setMap(null);
						showingRoute = false;
					}

					parent.find('#data-recorrido').remove();
					parent.append(holder.find('#listado-paradas'));

					var infoWindow = $('#paraderos').data('infoWindow')

					infoWindow.setOptions({
						pixelOffset: new google.maps.Size(-142, $('#paraderos').data('pixelOffset'))
					})

					$('#paraderos .jspContainer').height($('#paraderos .jspContainer').data('oldHeight'));

					refreshScroll($('#paraderos .scrollable'));
				});*/

				toogleLoaderCartel();
			},
			error: function(resp) {
				toogleLoaderCartel();
				var args = arguments;
				//console.log(args);
				alert('Error al buscar puntos cercanos');
			}
		});
	}

	// Maneja datos enviados desde iframe en home
	if (getParameterByName('paradero-ref') && getParameterByName('paradero-name')) {

		var punto;

		$(window).load(function() {

			$.getByReference(getParameterByName('paradero-ref'), function(res) {

				punto = res;

				var waitALittleLonger;

				waitALittleLonger = setInterval(function() {
					if ($('#ubicacion').is(':visible')) {

						clearInterval(waitALittleLonger);

						uMarker.show().setPosition(punto.geometry.location);

						map.setCenter(punto.geometry.location);
						map.setZoom(16);

						uMarker.setMap(map);

						$('#ubicacion').val(getParameterByName('paradero-name'));

						encuentraParadas();
					} else {
						//$('[href="#encuentraParadas"]:visible').click();
					}
				}, 100);

			});

		});
	}

	$.showMarcadores = showMarcadores;

	// Funcion de reset
	map.reset(function() {
		//uMarker.set('draggable',true);
		if (showingRoute) {
			showingRoute.setMap(null);
			showingRoute = false;
		}
		$.deleteMarkersInfo('closeMarkers');
		$.deleteMarkers('closeMarkers');
		$('#encuentraParadas .parRes .jspPane ol').html('');
		$('#ubicacion').val('');
		uMarker.setPosition(null);
		uMarker.hide();
		if (!$('#encuentraParadas a.chg_js.clickTog').hasClass('hide')) toogle();
	});
});

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