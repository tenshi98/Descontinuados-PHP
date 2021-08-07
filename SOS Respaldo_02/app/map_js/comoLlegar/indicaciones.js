var directionsDisplay;

jQuery(function($) {

    // Panel de direcciones
    var rendererOptions = {
        draggable: false,
        hideRouteList: false,
        suppressMarkers: true,
    };

    directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

    $('#Hora').val('00:00');

    var getNextTime = function() {
        var Digital = new Date()
        var hours = Digital.getHours()
        var minutes = Digital.getMinutes()

        if (parseInt(minutes) < 30) {
            minutes = '30';
        } else {
            minutes = '00';
            hours++;
            if (parseInt(hours) > 23) {
                hours = '00';
            }
        }

        if (parseInt(hours) < 10) {
            hours = "0" + parseInt(hours);
        }

        return [hours, minutes];
    }

    var setTime = function(first) {

        var time = getNextTime();

        $('#comoLlegar select:last option').removeAttr('data-min').show();
        var min = $('#Hora').find('option[value="' + (time[0] + ":" + time[1]) + '"]');
        min.attr('data-min', true);

        if (first) {
            min.val(time[0] + ":" + time[1]);
        } else {
            var date = $('.datepicker').datepicker('getDate');
            var today = new Date();

            today.setDate(today.getDate() + $('.datepicker').datepicker("option", "minDate"));
            today.setHours(0);
            today.setMinutes(0);
            today.setSeconds(0);

            var els = min.prevAll();

            if (date && today.toString() == date.toString()) {

                min.val(time[0] + ":" + time[1]);

                els.hide();

                if ($('#comoLlegar select:last option[value="' + $('#comoLlegar select:last').val() + '"]').is(':hidden')) {
                    $('#comoLlegar select:last').val($('#comoLlegar select:last option[data-min]').attr('value'));
                }

            } else {
                els.show();
            }
        }

    }

    $(".datepicker").datepicker({
        "minDate": 0,
        maxDate: 7
    }).datepicker('setDate', '0');

    // Reset calendar cuando cambie de dia
    var resetDate;
    resetDate = function(first) {

        var time = getNextTime();
        var now = new Date();
        var realNow = new Date();

        var minDate = 0;

        if (time[0] == time[1]) { // Cambio de dia si estoy viendolo a las 12
            now.setDate(now.getDate() + 1);
            minDate = 1;
            $(".datepicker").datepicker('option', {
                "minDate": minDate,
                maxDate: minDate + 7
            });
        }

        setTime(first);
        update_select(2);

        var millisTill10 = new Date(now.getFullYear(), now.getMonth(), now.getDate(), time[0], time[1], 1, 0) - realNow;

        if (millisTill10 < 0) {
            millisTill10 += 2000; // en caso de, agregar media hora
        }

        $('.datepicker').change();

        setTimeout(resetDate, millisTill10);

    }
    resetDate(true);

    $('#directions-panel').jScrollPane({
        contentWidth: 330,
        showArrows: true,
        mouseWheelSpeed: 40
    });

    $('#comoLlegar input[type="text"]:not(.datepicker)').val('');


    $('#indications .hideShow').click(function() {
        indications($(this));
    });

    var showIndicaciones = function(route) {
        var theHiperTimer;
        theHiperTimer = setInterval(function() {

            if ($('#directions-panel .adp-list').length > 0 && $('#directions-panel .adp-list').html() != '') {

                $('#directions-panel td.adp-substep div div').remove();

                var variable = $('#directions-panel .adp-list').html();

                $('#resumen ul').hide();

                if ($('#resumen li').length == 0) $('#resumen').html(variable);
                $('#directions-panel .adp .adp-warnbox').remove();

                for (var a in route.steps) {
                    var type =
                        route.steps[a].travel_mode != "TRANSIT" ?
                        'walk' :
                        route.steps[a].transit.line.vehicle.type == 'SUBWAY' ?
                        'metro' :
                        'bus';

                    $('#directions-panel .adp-directions tr:eq(' + a + ')').addClass(type);
                }

                refreshScroll('#directions-panel');

                $('#directions-panel .adp-list').html('');

                if ($('#resumen li').length == 2) {
                    if ($('#resumen li:first').text() == $('#resumen li:last').text()) {
                        $('#resumen li:last').remove();
                    }
                }

                clearInterval(theHiperTimer);
            }
        }, 10);
    }

    // Muestra las 4 rutas sugeridas con iconos personalizados
    var showOptions = function(response) {
        var checkLoad

        checkLoad = setInterval(function() { // El intervalo es para detectar cuando se carga la informacion de google a modificar
            if ($('#resumen').find('li:first').length > 0) {

                clearInterval(checkLoad); // Todo listo, borrar intervalo

                $('#resumen ol>li').find('div:last').remove();

                for (var a in response.routes) { // Para las 4 ruta
                    var route = response.routes[a].legs[0].steps;

                    for (var b in route) { // Para cada paso
                        var type =
                            route[b].travel_mode != "TRANSIT" ?
                            'walk' :
                            route[b].transit.line.vehicle.type == 'SUBWAY' ?
                            'metro' :
                            'bus';

                        var el = $('#resumen div ol li:eq(' + a + ') div>span:eq(' + b + ')');

                        var icon = '',
                            color = false,
                            tipoClase = '';

                        switch (type) {
                            case 'metro':
                                icon = 'r_metro.png';
                                tipoClase = 'metro';
                                color = route[b].transit.line.color;
                                break;
                            case 'bus':
                                icon = 'r_bus.png';
                                tipoClase = 'recorrido';
                                break;
                            default:
                                icon = 'r_camina.png';
                                break;
                        }

                        el.find('>span>span>span').addClass(tipoClase);
                        if (el.find('.metro').length > 0) {
                            el.find('.metro:last').css('background', color).html(route[b].transit.line.name.replace('Línea ', 'L'));
                        }
                        var el = el.find('>span>span>img:not(.gm-arrow)');
                        el.attr('src', 'map_img/icon/' + icon);

                    }
                }

                $('#resumen ul').show();
            }
        }, 10);

        directionsDisplay.setDirections(response); // Renderizamos datos

        directionsDisplay.setPanel($('#directions-panel .jspPane')[0]);

    }

    $('body').on('click', '#directions-panel .adp-placemark tr:first, #directions-panel .adp-directions tr:first', function(e) {
        originMarker.click();
        e.stopPropagation();
    });
    $('body').on('click', '#directions-panel .adp-directions tr:not(:first)', function(e) {
        $.clickMarker('poliMarkers', parseInt($(this).attr('jsinstance').replace('*', '')) - 1);
        e.stopPropagation();
    });
    $('body').on('click', '#directions-panel .adp-placemark tr:last', function(e) {
        destinationMarker.click();
        e.stopPropagation();
    });

    $.showOptions = showOptions;
    $.showIndicaciones = showIndicaciones;

    var optionsHolder = $('<select/>');

    $('.datepicker').change(function() {
        var date = $(this).datepicker('getDate');
        var today = new Date();

        today.setDate(today.getDate() + $('.datepicker').datepicker("option", "minDate"));
        today.setHours(0);
        today.setMinutes(0);
        today.setSeconds(0);

        var els = $('#comoLlegar select:last option[data-min]').prevAll();

        if (today.toString() == date.toString()) {
            els.hide();

            if ($('#comoLlegar select:last option[value="' + $('#comoLlegar select:last').val() + '"]').is(':hidden')) {
                $('#comoLlegar select:last').val($('#comoLlegar select:last option[data-min]').attr('value'));
            }

        } else {
            els.show();
        }

    }).change();
});



// Resize de indicaciones
jQuery(document).ready(function($) {
    var ventanaPadre = $(window),
        indicationBox = $('#indications'),
        indicationBoxInner = indicationBox.find('.c'),
        altoHeader = $('#header').outerHeight(),
        altoMaximo = 500,
        margenHeader = 30 + 130, //130 por el alto del buscador de como llegar
        altoVentana = ventanaPadre.height(),
        heightTop = parseFloat(altoHeader + margenHeader),
        altoHeaderIndi = 80, //Alto de la cabecera caja de indicaciones
        altoMinimoInd = 60,
        altoFinal = (altoVentana - heightTop) <= altoMaximo ? altoVentana - heightTop : altoMaximo,
        altoFinalInner = altoFinal - altoHeaderIndi, //El espacio final de la cabecera
        altoEspacio = '';

    indicationBox.attr('data-height', altoFinal);
    if (indicationBox.hasClass('showed_js')) {
        indicationBox.height(indicationBox.attr('data-height'));
        indicationBoxInner.height(indicationBox.attr('data-height') - altoHeaderIndi);
    } else {
        indicationBox.height(altoMinimoInd);
        indicationBoxInner.height(indicationBox.attr('data-height') - altoHeaderIndi);
    }

    ventanaPadre.bind('resize', function() {
        altoVentana = ventanaPadre.height();
        altoEspacio = altoVentana - altoHeader - margenHeader;
        if (altoEspacio <= altoMaximo) {
            altoFinal = altoVentana - heightTop;
            altoFinalInner = altoFinal - altoHeaderIndi;
            resizeBox(indicationBox, altoFinal);
            resizeBox(indicationBoxInner, altoFinalInner);
        } else {
            resizeBox(indicationBox, altoMaximo);
            altoFinalInner = altoMaximo - altoHeaderIndi;
            resizeBox(indicationBoxInner, altoFinalInner);
        }
    });
});

function resizeBox(ele, alto) {
    if ($('#indications').hasClass('showed_js')) {
        ele.height(alto);
        refreshScroll('#directions-panel');
    }
    ele.attr('data-height', alto);
}