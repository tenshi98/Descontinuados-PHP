var conoceTusRecorridos;
var serviceAddr = 'http://200.29.15.107/rest/'
jQuery(function($) {

	var optMarker = {
		name: 'rutaMarkers',
		animation: google.maps.Animation.DROP,
		icon: 'img/icon/punto_a_min.png',
		title: 'Origen',
		visible: false
	}
	originRuteMarker = $.addMarker(optMarker);

	optMarker.icon = 'img/icon/punto_b_min.png';
	optMarker.title = 'Destino';

	destinationRuteMarker = $.addMarker(optMarker);

	$('#conocerRecorridos .step-1 form .note a').click(function(e) {
		e.preventDefault();
		$('#header .item-2 a').click();
	});

	// Carga numeros de micro para autocompletar al inicio
	/*$.support.cors = true;
	$.ajax({
		crossDomain: true,
		type: 'GET',
		url: serviceAddr + 'getservicios/all', //action/BuscarServicios.action
		datatype: "json",
		complete: function(data) {

			var oldData, defaultVal;
			var $recorrido = $('#recorrido');
			var options = data.responseJSON;

			$recorrido.autocomplete({
				minLength: 1,
				source: function(a, next) { // Para que se considere desde el principio del string
					var tmp = $.ui.autocomplete.escapeRegex(a.term);
					var reg = new RegExp('^(' + tmp + ')(.+)?', 'i');
					var resp = [];
					for (var a in options) {
						if (reg.test(options[a])) {
							resp.push(options[a]);
						}
					}
					return next(resp);
				},
				autoSelect: true,
				autoFocus: true,
				focus: function(e, u) {
					defaultVal = u.item.value;
				},
				select: function() {
					$(this).blur().focus();
				},
			}).focus(function() {
				oldData = $(this).val().trim();
			}).blur(function() {
				var val = $(this).val().trim();
				if (oldData != val) {
					if (val != defaultVal) {
						$(this).val(defaultVal);
						val = $(this).val().trim();
					}
				}
			});
		}
	});*/

	var lineaServicio;


	$('#conocerRecorridos .step-2 .recRes ol li').click(function() {
		drawRoute($(this).data('ruta'), $(this).data('paraderos'));
	});

	$('#conocerRecorridos .step-2 header a.help_inline').click(function(e) {
		e.preventDefault();
		resetForm();
	});

	function dibujarRuta(data) {

		

		$('#conocerRecorridos .collap_js').show();
		$('#conocerRecorridos .showBox').toggleClass('hideBox showBox');

		var color = data.negocio.color;

		//$('#conocerRecorridos .step-1, #conocerRecorridos .step-2').toggleClass('none');
		$('#conocerRecorridos.box .numColor').html($("#recorrido").val());
		$('#conocerRecorridos.box .numColor,#conocerRecorridos.box .busColor').css({
			background: color
		});
		$('#conocerRecorridos .tit a').html(data.negocio.nombre).attr('href', data.negocio.url).attr('title', data.negocio.nombre);

		var holder = $('#conocerRecorridos .step-2 .recRes ol');

		holder.find('li div:not(.rec)').remove();

		if (data.ida && data.ida.path && data.ida.path.length > 0) {
			var el = holder.find('li:first');

			el.show();

			el.find('.rec strong').html('Hacia: ' + data.ida.destino);

			//for (var a in data.ida.horarios) {
			//	el.append($('<div/>').append($('<span/>').html(data.ida.horarios[a])));
			//}

			el.data('ruta', data.ida.path);
			el.data('paraderos', data.ida.paraderos);
			holder.find('li:last').show();
		} else {
			holder.find('li:first').hide();
		}

		if (data.regreso && data.regreso.path && data.regreso.path.length > 0) {
			var el = holder.find('li:last');
			el.find('.rec strong').html('Hacia: ' + data.regreso.destino);

			//for (var a in data.regreso.horarios) {
			//	el.append($('<div/>').append($('<span/>').html(data.regreso.horarios[a])));
			//}

			el.data('ruta', data.regreso.path);
			el.data('paraderos', data.regreso.paraderos);
			holder.find('li:first').show();
		} else {
			holder.find('li:last').hide();
		}

		if(data.ida == undefined){
			var el = holder.find('li:first');
			el.hide();
		}

		if(data.regreso == undefined){
			var el = holder.find('li:last');
			el.hide();
		}

		holder.find('li:visible:first').addClass('active');

		var ruta, paraderos;

		if (data.ida) {
			ruta = data.ida.path;
			paraderos = data.ida.paraderos;
		} else if (data.regreso) {
			ruta = data.regreso.path;
			paraderos = data.regreso.paraderos;
		} else {
			resetForm();
			return alert('no tiene ningun recorrido!');
		}

		drawRoute(ruta, paraderos, color);
	}

	function drawRoute(ruta, paraderos, color) {

		if (showingRoute) {
			showingRoute.setMap(null);
			showingRoute = false;
		}

		originRuteMarker.show().setPosition(new google.maps.LatLng(ruta[0][0], ruta[0][1]));
		destinationRuteMarker.show().setPosition(new google.maps.LatLng(ruta[ruta.length - 1][0], ruta[ruta.length - 1][1]));

		$.deleteMarkers('closeMarkers');

		if (color == undefined && lineaServicio.oldColor) {
			color = lineaServicio.oldColor;
		}

		if (lineaServicio != undefined) {
			lineaServicio.setMap(null);
			lineaServicio = null;
		}

		lineaServicio = drawRouteFromArray(ruta, {
			color: color
		});

		lineaServicio.oldColor = color;

		map.setZoom(15);
		map.panTo(originRuteMarker.position);

		$.showMarcadores(paraderos);
	}

	var zoomListener;

	conoceTusRecorridos = function() {

		if ($('#recorrido').val().trim() == '') {
			$('#recorrido').addClass('error').one('change keydown keypress', function() {
				$(this).removeClass('error')
			}).blur().focus();
			return;
		}

		if (!zoomListener) zoomListener = google.maps.event.addListener(map, 'zoom_changed', function() {
			if (map.getZoom() >= 15) {
				$.showMarkers('closeMarkers');
			} else {
				$.hideMarkers('closeMarkers');
			}
		});

		$('#recorrido').blur();

		toggleLoading($('[data-submit="conoceTusRecorridos"]'));
		$.support.cors = true;
		$.ajax({
			crossDomain: true,
			type: 'get',
			url: serviceAddr + 'conocerecorrido',
			data: {
				codsint: $("#recorrido").val()
			},
			success: function(resp) {
				toggleLoading($('[data-submit="conoceTusRecorridos"]'));
				if (resp.negocio.color != undefined) {
					dibujarRuta(resp);
				} else {
					$('#recorrido').addClass('error').one('change keydown keypress', function() {
						$(this).removeClass('error')
					}).blur().focus();
				}
			},
			error: function() {
				//console.log(arguments);
				toggleLoading($('[data-submit="conoceTusRecorridos"]'));
			}
		});
	}

	var resetForm = function() {

		if (showingRoute) {
			showingRoute.setMap(null);
			showingRoute = false;
		}

		if (zoomListener) google.maps.event.removeListener(zoomListener);
		zoomListener = false;

		$.hideMarkers('rutaMarkers');
		$.deleteMarkers('closeMarkers');
		$("#recorrido").val('');
		//$('#conocerRecorridos .step-1').removeClass('none');
		//$('#conocerRecorridos .step-2').addClass('none').find('li').removeClass('active');
		if (lineaServicio != undefined) {
			lineaServicio.setMap(null);
			lineaServicio = null;
		}
	}

	map.reset(resetForm);

});
