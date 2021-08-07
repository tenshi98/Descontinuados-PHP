var map;

(function($){
    
    var setTimer;
    setTimer=function(){
        setTimeout(function(){
            var els=$('*').filter(function(){
                return !$(this).data('appeared');
            }).each(function(){
                if ($(this).is(':visible')) {
                    $(this).trigger('appeared');
                    $(this).data('appeared',true);
                }
            });
            
            setTimer();
            
        },50);
    }
    setTimer();
    
})(jQuery)


jQuery(function($){
    
    $('input[type="text"]').val('');
    
    //If the parent document doesn't have JQuery:
    var el=top.document.body;
    map=$('#hidden')[0];
    
    var files=[
        "http://162.242.146.223/css/ui-lightness/jquery-ui-1.10.3.custom.css",
        "http://162.242.146.223/css/ui-lightness/custom.css"
    ]
    
    var parentIframe=$(el).find('iframe').filter(function(){
        return window.frameElement==this
    });
    
    var parentIframePos=parentIframe.offset();
    
    for (var a in files) {
        var style=$("<link/>", {
            rel: "stylesheet",
            type: "text/css",
            href: files[a]
        });
        
        $(top.document).find('head').append(style);
    }
    
    $('#desde,#hasta,#paradero').each(function(){
        
        $(this).on('appeared',function(){
            
            var pos="left+"+($(this).offset().left)+
                " top+"+($(this).offset().top+$(this).outerHeight());
                
            $(this).autocompleteGoogle({
                appendTo:el,
                position:{
                    of:parentIframe,
                    at:pos
                }
            });
        });
        
    }).on('place_changed',function(e,place){		    
        var id=$(this).attr('id');
        $('[name="'+id+'-ref"]').val(place.reference);
        $('[name="'+id+'-name"]').val($(this).val());
    }).on('keydown',function(){
        $(this).removeClass('error');
    });
    
    $('form').submit(function(e){
        var ok=$(this).find('input[type="text"]').removeClass('error').filter(function(){
            return $(this).val().trim()=='';
        }).addClass('error').length==0;
        
        if (!ok) {
            e.preventDefault();
        }
        
    });
});