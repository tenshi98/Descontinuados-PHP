jQuery(document).ready(function($) {


	$('.poll_popup, #enc_planifica, #enc_thanks, #enc_msj, .inside_poll').hide();

	$('.inside_poll').on('mouseenter', function() {
		$(this).addClass('hovered');
		//mostrarEnHover();
	}).on('mouseleave', function() {
		$(this).removeClass('hovered');
	}).on('click', function() {
		ocultarNotificacion();
		mostrarEncuesta();
	});

	$('#close_msg').on('click', function() {
		ocultarNotificacion();
	});

	$('.msg_poll').on('mouseenter', function() {
		$(this).addClass('sobre');
	}).on('mouseleave', function() {
		$(this).removeClass('sobre');
	});

	$('#start_poll').on('click', function() {
		ocultarNotificacion();
		mostrarEncuesta();
	});

	$('.close_all').on('click', function(e) {
		e.preventDefault();
		cerrarEncuesta();
		$('.inside_poll').hide();
	});

	$('.close_all2').on('click', function(e) {
		e.preventDefault();
		cerrarEncuesta();
	});

	$('.radios label input').on('click', function() {
		$('input:not(:checked)').parent().removeClass('active');
		$('input:checked').parent().addClass('active');
	});

	$('#btnEnviarEnc').click(function(e) {
		e.preventDefault();
		$('#btnEnviarEnc').attr('disabled', 'disabled');
		enviarEncuesta();
	});

	$('input[name="p1"]').on('change', function() {
		if ($(this).val() == 0) {
			showAskHidden($(this));
		} else {
			hideAskHidden($(this));
		}
	});
});

jQuery(window).ready(function() {
	var visited = readCookie('mypopup');
	if (!visited) {
		$('.inside_poll').show();
	}
});

var mostrarEncuesta = function() {
	if (!$('.poll_popup').is(':visible')) {
		$('.poll_popup').show();
		$('#enc_planifica').fadeIn(600);
	}
}

var cerrarEncuesta = function() {
	if ($('.poll_popup').is(':visible')) {
		$('.poll_popup').fadeOut(600);
		$('#enc_planifica').fadeOut(600);
	}
}

var mostrarNotificacion = function() {
	if ($('.msg_poll').length > 0 && !$('.msg_poll').is(':visible') && !$('.poll_popup').is(':visible')) {
		$('.msg_poll').fadeIn('600');
	}
}

var ocultarNotificacion = function() {
	if ($('.msg_poll').length > 0 && $('.msg_poll').is(':visible')) {
		$('.msg_poll').fadeOut('600');
	}
}

var mostrarDpsSegundos = function(seg) {
	setTimeout(function() {
		mostrarNotificacion();
		ocultarDpsSegundos(5000);
	}, seg)
}

var ocultarDpsSegundos = function(seg) {
	setTimeout(function() {
		if (!$('.msg_poll').hasClass('sobre'))
			ocultarNotificacion();
	}, seg)
}

var showAskHidden = function(ele) {
	ele.parents('.box_question').find('.new_ask').show().find('input').val('').focus();
}
var hideAskHidden = function(ele) {
	ele.parents('.box_question').find('.new_ask').hide();
}

/*var mostrarEnHover = function() {
	setTimeout(function() {
		if ($('.inside_poll').hasClass('hovered'))
			mostrarNotificacion();
	}, 1500)
}*/

var enviarEncuesta = function() {
	var error = false;
	var p1 = $("input:radio[name ='p1']:checked").val();
	var p2 = $("input:radio[name ='p2']:checked").val();
	//var p3 = $("input:radio[name ='p3']:checked").val();
	var p4 = $("#options_poll").val();
	var m1 = $("#m1").val().trim().replace('/', '');
	var m2 = $("#m2").val().trim().replace('/', '');

	if (m1 == '') {
		m1 = 0;
	}

	if (m2 == '') {
		m2 = 0;
	}


	if (p1 == null) {
		$('#q1').addClass('error');
		$('.poll_error').show();
		error = true;
	} else {
		$('#q1').removeClass('error');
		if (p1 == 0 && m1 == "") {
			$('#q1').addClass('error');
			$('.poll_error').show();
			error = true;
		} else {
			$('#q1').removeClass('error');
		}
	}

	if (p2 == null) {
		$('#q2').addClass('error');
		$('.poll_error').show();
		error = true;
	} else {
		$('#q2').removeClass('error');
	}
	/*if (p3 == null) {
		$('#q3').addClass('error');
		$('.poll_error').show();
		error = true;
	} else {
		$('#q3').removeClass('error');
	}*/


	if ($('#options_poll').val() == 0) {
		$('#q3').addClass('error');
		$('.poll_error').show();
		error = true;
	} else {
		$('#q3').removeClass('error');
		if ($('#options_poll').val() == "m7" && m2 == "") {
			$('#q3').addClass('error');
			$('.poll_error').show();
			error = true;
		} else {
			$('#q3').removeClass('error');
		}
	}

	if (error) {
		$('#btnEnviarEnc').removeAttr('disabled');
		return;
	}

	$('.poll_error ').hide();

	$.ajax({
		url: 'http://200.29.15.107/rest/encuesta/' + p1 + "/" + p2 + "/0/" + p4 + "/" + m1 + "/" + m2,
		method: 'POST',
		success: function(response) {
			$('#enc_planifica').fadeOut(600);
			$('#enc_thanks').fadeIn(600);
			createCookie('mypopup', 'no', 0);
		},
		error: function() {
			$('#btnEnviarEnc').removeAttr('disabled');
		}
	});
}

function chequearSelect(val) {
	if (val == 'm7') {
		showAskHidden($('#options_poll'));
	} else {
		hideAskHidden($('#options_poll'));
	}
}
