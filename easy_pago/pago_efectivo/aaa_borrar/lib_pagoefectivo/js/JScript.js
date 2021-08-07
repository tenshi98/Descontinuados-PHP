$(document).ready(function() {
    $("#fancy").fancybox({
    width				: 615,
    height			: '75%',
    autoDimensions    : false,
    autoScale     	: false,
    transitionIn		: 'none',
    transitionOut		: 'none',
    type				: 'iframe',
    iframe: {
      scrolling : 'yes',
      preload   : true
      }
    });
    var params = {},
    flashvars = {},
    baseUrl_ = 'https://pagoefectivo.pe/App_Themes/SPE/ResourcesVideoPortada/';
    params.allowscriptaccess = "always";
    params.allowfullscreen = "true";
    params.wmode = "opaque";
    params.flashvars = "file=" + baseUrl_ + "video/1.flv&repeat=no&stretching=fill&skin=" + baseUrl_ + "swf/md.swf&autostart=false&bufferlength=1&image=" + baseUrl_ + "video/1.jpg";
    swfobject.embedSWF("" + baseUrl_ + "swf/playertv.swf", "mediaplayer", "480", "360", "9", "" + baseUrl_ + "js/swfobject/expressInstall.swf", flashvars, params);
});