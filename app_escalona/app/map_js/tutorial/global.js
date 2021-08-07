jQuery(document).ready(function($) {
    
    $('.jcarousel').jcarousel();

    $('.tutorial').click(function() {
        showTutorial($(this).data('tutor'));
    });
    
    $('.end').click(function() {
        hideWelcome();
    });
        
    $('.close_slide_tut').click(function() {
        var get_numtut = $(this).parents('.slide_tut').attr('class').split(' ')[1].split('t_')[1];
        hideTutorial(get_numtut);
    });
    
    $('.jcarousel-control-prev')
	.jcarouselControl({
	    target: '-=1'
	});
	
    $('.jcarousel-control-next')
	.jcarouselControl({
	    target: '+=1'
	});
	
	
    $('.jcarousel-pagination')
	.on('jcarouselpagination:active', 'a', function() {
	    $(this).addClass('active');
	})
	.on('jcarouselpagination:inactive', 'a', function() {
	    $(this).removeClass('active');
	})
	.jcarouselPagination();
    
    
    $('.jcarousel').on('jcarousel:animate', function(event, carousel) {
        $('.jcarousel-control-next').show();
        $('.jcarousel-control-prev').hide();
        $('.but_done').hide();

        if ($(carousel._visible).index() + 1 >= $(this).find('li').length){ //Si estoy en la última diapo
            $('.jcarousel-control-next').hide();
            $('.jcarousel-control-prev').show();
            $('.but_done').show();
        }else if($(carousel._visible).index() == 0){ //Si estoy en la primera diapo
            $('.jcarousel-control-prev').hide();
        }else{
            $('.jcarousel-control-next').show();
            $('.jcarousel-control-prev').show();
            $('.but_done').hide();
        }
    });
    
    $(document).keyup(function(e) {
        if (e.keyCode == 27 && ($('.slide_tut').is(':visible') || $('.welcome_tut').is(':visible'))) { //esc
            if ($('.slide_tut').is(':visible')){
                var get_numtut = $('.slide_tut:visible').attr('class').split(' ')[1].split('t_')[1];
                hideTutorial(get_numtut);
            }else{
                hideWelcome();
            }
        }
        
        if (e.keyCode == 39 && $('.slide_tut').is(':visible') && $('.slide_tut .jcarousel-pagination').is(':visible')) { //Next
            var page_active = $('.slide_tut:visible .jcarousel-pagination .active');
            if (!page_active.is(':last-child')){
                page_active.next().click();
            }
        }

        if (e.keyCode == 37 && $('.slide_tut').is(':visible') && $('.slide_tut .jcarousel-pagination').is(':visible')) { //Prev
            var page_active = $('.slide_tut:visible .jcarousel-pagination .active');
            if (!page_active.is(':first-child')){
                page_active.prev().click();
            }
        }
    });
});

var resetTutorial = function (num_tut){
    jQuery('.slide_tut.t_' + num_tut + ' .jcarousel-pagination a:eq(0)').click();
    jQuery('.slide_tut.t_' + num_tut + ' .jcarousel-control-next').show();
    jQuery('.slide_tut.t_' + num_tut + ' .jcarousel-control-prev').hide();
    jQuery('.slide_tut.t_' + num_tut + ' .but_done').hide();
}

var showTutorial = function (num_tut){
        resetTutorial(num_tut);
        jQuery('.opacity').fadeIn();
        jQuery('.slide_tut.t_' + num_tut).fadeIn();
}

var hideTutorial = function (num_tut){
    jQuery('.opacity').fadeOut(300);
    jQuery('.slide_tut.t_' + num_tut).fadeOut(300);
    resetTutorial(num_tut);
}

var hideWelcome = function(){
   $('.welcome_tut').fadeOut(300);
   $('.opacity').fadeOut(300);
}

var showTutoFromWelcome = function(){
    $('.welcome_tut').fadeOut(300);
    showTutorial($('.box:visible').find('.tutorial').data('tutor'));
}

var showWelcome = function(){
    $('.welcome_tut').fadeIn(300);
    $('.opacity').fadeIn(300);
}