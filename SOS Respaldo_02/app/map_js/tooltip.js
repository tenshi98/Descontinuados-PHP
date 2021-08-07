$(document).ready(function(){
	var eventos = 'mouseenter mouseleave'
	var tt_num = 0;
	$('[data-info]').on(eventos, function(e){
		if (!$(this).hasClass('disabled')&&$(this).find('.disabled').length==0) {
			var el = $(this);
			var evento = e.type;
			
			if (evento=="focus" || evento=="mouseenter"){
				tt_num = tt_num+1;
				var info = el.data('info');
				//if (!el.attr('data-tooltip')){
					el.attr('data-tooltip', tt_num);
					tooltip(el, info);
				//}
			}else{
				removeTooltip(el);
			}
		}
	});
});

function createBox(left, top, info, rel){
	var html = $('#tooltip_'+rel).length>0?$('#tooltip_'+rel):$('<div id="tooltip_'+rel+'" class="tooltip"><span>'+info+'</span></div>');
	$('body').append(html);
	html.css({
		'left': left+20,
		'top': top,
		'opacity': 0
	}).stop().animate({
		'left': "-=15",
		'opacity': 1
	}, 300);
}
function get_data(ele, info){
	var pos = ele.offset();
	var get_pos_x = pos.left;
	var get_pos_y = pos.top;
	var ancho = ele.outerWidth();
	var alto = ele.outerHeight();
	var pos_x = ancho+get_pos_x; //limite derecho del elemento
	var pos_y = get_pos_y + (alto/2) - (18); //centro vertical del elemento
	var rel = ele.data('tooltip');
	//if ($('#tooltip_'+rel).length<1){
		createBox(pos_x, pos_y, info, rel);
	//}
}

function tooltip(el, info){
	get_data(el, info);
}

function tooltipDelay(el, info){
	setTimeout(function(){
		if (el.data('active')==true){
			get_data(el, info);
		}
	}, 300)
}

function removeTooltip(el){
	var id = el.data('tooltip');
	el.removeAttr('data-tooltip');
	$('#tooltip_'+id).stop().fadeOut(300, function(){
		$(this).remove();
	});
}