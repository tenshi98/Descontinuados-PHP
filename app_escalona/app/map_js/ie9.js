jQuery(document).ready(function($){
	$('input:text').each(function(){
		placeHolder($(this));
	}).bind('keyup keypress blur focus', function(e){
		togglePlaceHolder($(this), e.type);
	});
	
	$('.placeholder_ie').bind('click', function(){
		$(this).parent().find('input:text').focus();
	});
	
	$('#header nav ul li a').bind('click', function(){
		$('.placeholder_ie').show();
	});
	
	$('.invert').bind('click', function(e){
		e.preventDefault();
		console.log('adawdwa ');
		$('.placeholder_ie.for_end2, .placeholder_ie.for_start2').hide();
	});
});

var placeHolder = function(ele){
	var valor = ele.attr('placeholder');
	var id_ele = ele.attr('id');
	if ((typeof valor !== undefined)) {
		if (ele.val()=='') {
			ele.before('<span class="placeholder_ie for_'+id_ele+'">'+valor+'</span>');
			ele.parent().find('.placeholder_ie');
		}
	}
}

var togglePlaceHolder = function(ele, evento){
	var valor = ele.val();
	if (evento=='keyup' || evento=='keypress' ) {
		if (valor=='') {
			ele.parent().find('.for_'+ele.attr('id')).show();
		}else{
			ele.parent().find('.for_'+ele.attr('id')).hide();
		}
	}
	if (evento=='blur' || evento=='focus') {
		if (valor=='') {
			ele.parent().find('.for_'+ele.attr('id')).show();
		}
	}
}