$(document).ready(function(){
	$('.tabs_list .tab_item').click(function(){
		changeTab($(this));
	});
});

changeTab = function(el){
	target = $('#tab_'+el.data('tabrel'));
	if (target.length<1){
		//alert('No existe tab');
		return;
	}
	if (target.is(':visible')){
		return;
	}else{
		$('.tab_content').removeClass('tab_content_showed').addClass('tab_content_hidden');
		target.removeClass('tab_content_hidden').addClass('tab_content_showed');
		el.parent().find('.tab_item').removeClass('tab_item_active');
		el.addClass('tab_item_active');
	}
}