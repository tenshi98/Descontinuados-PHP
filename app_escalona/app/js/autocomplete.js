(function($){
    
    var added = ", Santiago, Chile";
    
    var autocompleteOptions ={
        componentRestrictions : { country: 'cl' },
        bounds:new google.maps.LatLngBounds(
            new google.maps.LatLng( -32.930318,-71.175385 ),
            new google.maps.LatLng( -33.941081,-70.093231 )
        )        
    }
    
    $.fn.autocompleteGoogle=function(opt){
        
        opt=opt||{}
        
        if (undefined == opt.bind){
            opt.bind={}
        }
        
        return $(this).each(function(){
            
            $(this).data('ready',true);
            
            var $this=$(this);
            var predictor=new google.maps.places.AutocompleteService();
            
            var options=[];
            
            var defaultVal;
            var oldVal;
            
            var $this=$(this);
            
            return $(this).autocomplete({
                autoFocus: true,
                source:function(input,output){
                    
                    $this.data('ready',false);
                    
                    var q=input.term;
                    
                    predictor.getPlacePredictions($.extend({ input: q+added },autocompleteOptions), function(resp){                        
                        options=resp;
                        var toResp=[];
                        for (var a in options) {
                            toResp.push(options[a].description);
                        }
                        output(toResp);
                    });
                },
                autoSelect:true,
                focus:function(e,u){
                    defaultVal=u.item.value;
                },
                select:function(){
                    $(this).blur();
                },
                appendTo:opt.appendTo,
                position:opt.position
            }).focus(function(){
                oldVal=$(this).val().trim();
            }).blur(function(e){
                
                //console.log('blur');
                
                var val=$(this).val().trim();
                
                if (oldVal!=val) {
                    if (val!=defaultVal) {
                        $(this).val(defaultVal);
                        val=$(this).val().trim();
                    }
                    
                    var found=false;
                    
                    for (var a in options) {
                        
                        if (options[a].description==val) {
                            
                            $.getByReference(options[a].reference,function(res){
                                $(this).trigger('place_changed',res);
                                $this.data('ready',true);
                                $(this).focus();
                            }.bind(this));
                            
                            found=true;
                            
                            break;
                        }
                        
                    }
                    
                    //console.log(found);
                    
                    if (!found) {
                        var dis=$(this).prop('disabled');
                        $(this).prop('disabled',false);
                        $(this).val(oldVal);
                        $(this).prop('disabled',dis);
                        $this.data('ready',true);
                    }
                    
                }
                
            });
            
        });
    }
    
})(jQuery);