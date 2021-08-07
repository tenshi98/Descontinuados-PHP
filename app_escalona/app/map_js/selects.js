$(window).load(function() {

	var checkForDisable;
	checkForDisable = function() {
		$('select[data-index]:disabled:not([data-got-disabled])').each(function() {
			$(this).attr('data-got-disabled', true);
			$('.sel_input[data-rel=' + $(this).data('index') + ']').addClass('disabled');
		});
		$('select[data-got-disabled]:not(:disabled)').each(function() { //:not([data-got-disabled])
			$(this).removeAttr('data-got-disabled');
			$('.sel_input[data-rel=' + $(this).data('index') + ']').removeClass('disabled');
		});

		setTimeout(checkForDisable, 10);
	}
	checkForDisable();

	$('select').each(function(e) {
		var index = e + 1;
		var sel = $(this);
		var sel_width = sel.outerWidth();
		var sel_id = sel.attr('id');
		var sel_name = sel.attr('name');
		var sel_class = sel.attr('class');
		var sel_value = sel.val();
		var sel_text = sel.find('option:first').text();
		var opt, opt_val, opt_text;
		var first = false;
		var dataCurrent = '';

		sel.attr('data-index', index).hide(); //oculto todos los selects luego de reemplazarlos

		$('body').append('<div data-rel-index="' + index + '" id="newsel_' + sel_id + '" class="custom_select_wrap"><div class="scrollable"><ul class="custom_select"></ul></div></div>');

		sel.find('option').each(function() {
			opt = $(this);
			opt_val = opt.val();
			opt_text = opt.text();

			dataCurrent = (sel_value == opt_val) ? ' data-current-val="true"' : '';

			if (opt.css('display') != 'none') {
				if (first == false) {
					first = true;
					sel_text = opt_text;
				}
				$('[data-rel-index="' + index + '"] ul').append('<li data-value="' + opt_val + '"' + dataCurrent + '>' + opt_text + '</li>');
			}
		});
		var input_sel_html = '<div data-rel="' + index + '" class="sel_input sel_id_' + index + '"><a class="select-text" href="#">' + sel_text + '</a></div>';
		sel.after(input_sel_html);
		$('.custom_select_wrap .scrollable').jScrollPane({
			showArrows: true,
			mouseWheelSpeed: 40
		});

	}).change();

	$('.select-text').on('focus blur', function(e) {
		if (e.type == 'focus') {
			addClassFocus($(this));
		} else {
			removeClassFocus($(this));
		}
	});

	$('body').on('click', '.sel_input:not(.disabled)', function(e) {
		e.stopPropagation();

		var sel_index = $(this).data('rel');
		var menu = $('[data-rel-index="' + sel_index + '"]');
		var sel_x = $(this).offset().top;
		var sel_y = $(this).offset().left;
		var ancho = $(this).outerWidth();
		var pos_top = sel_x + $(this).outerHeight();
		var pos_left = sel_y;
		$('.custom_select_wrap').hide();
		menu.css({
			'top': pos_top,
			'left': pos_left,
			'z-index': 200,
			'width': ancho,
			'height': 300
		});
		if ($(this).hasClass('selected')) {
			$('.sel_input').removeClass('selected');
			menu.fadeOut(300);
		} else {
			$('.sel_input').removeClass('selected');
			$(this).addClass('selected');
			menu.show();
		}
		$('[data-rel-index="' + sel_index + '"] .scrollable').height('100%');
		refreshScroll('[data-rel-index="' + sel_index + '"] .scrollable');
		if ($('[data-rel-index="' + sel_index + '"] .scrollable').find('.jspVerticalBar').length > 0) {
			$('[data-rel-index="' + sel_index + '"] .scrollable').addClass('bb');
		}

		var api = $('[data-rel-index="' + sel_index + '"] .scrollable').data('jsp');
		api.scrollToElement($('[data-rel-index="' + sel_index + '"]').find('li[data-current-val="true"]'), true);
	});

	$(document).click(function() {
		$('.custom_select_wrap').hide();
		$('.sel_input').removeClass('selected');
	});

	$('.custom_select_wrap').on('click', function(e) {
		e.stopPropagation();
	});
	$('.custom_select_wrap').on('click', 'li', function() {
		var val = $(this).data('value');
		var text = $(this).text();
		var parent = $(this).parents('.custom_select_wrap');
		var sel_target = parent.data('rel-index');
		$('select[data-index="' + sel_target + '"]').val(val);
		$('.sel_input[data-rel="' + sel_target + '"] .select-text').text(text);
		parent.hide();
		$('.sel_input').removeClass('selected');
		chequearSelect($(this).data('value'));
		$(this).parent().children('li').removeAttr('data-current-val');
		$(this).attr('data-current-val', 'true');
	});

	$('.datepicker').change(function() {
		update_select(2); //index relacionado con el menú desplegable creado
	});
});

function update_select(sel_index) {
	var select = $('select[data-index="' + sel_index + '"]');
	var index = sel_index;
	var select_text = select.val();
	var current_val = '';

	$('[data-rel-index="' + index + '"] ul').html('');

	select.find('option').each(function() {
		opt = $(this);
		opt_val = opt.val();
		opt_text = opt.text();

		current_val = (select_text == opt_val) ? ' data-current-val="true"' : '';

		if (opt.css('display') != 'none') {
			$('[data-rel-index="' + index + '"] ul').append('<li data-value="' + opt_val + '"' + current_val + '>' + opt_text + '</li>');
		}
	});

	if (select_text == '') {
		select_text = $('[data-rel-index="' + index + '"] ul li:first').text();
	}

	$('div[data-rel="' + index + '"] .select-text').text(select_text);
}

function addClassFocus(el) {
	el.parent().addClass('select-focus');
}

function removeClassFocus(el) {
	el.parent().removeClass('select-focus');
}