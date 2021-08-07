<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once('nombre_pag.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SOS Click</title>
<link rel="icon" href="./favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="estilo.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" type="text/css" href="http://<?=$nombreurl?>/shadowbox/shadowbox.css">
<script type="text/javascript" src="http://<?=$nombreurl?>/shadowbox/shadowbox.js"></script>

<script type="text/javascript">
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    overlayOpacity: 0.8
});
</script>
<SCRIPT type=text/javascript>
<!--  
function vervideo(content, player, title) {  
Shadowbox.open({  
content: 'videos/animacion1.swf',  
player: 'swf',  
title: 'Video Explicativo',
width:708,
height:510
});  
}
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
  
// -->
</SCRIPT>
<!--[if IE]>
<script type="text/javascript">
var e = ("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
for (var i=0; i<e.length; i++) {
document.createElement(e[i]);
}
</script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript">
   document.createElement("nav");
   document.createElement("header");
   document.createElement("footer");
   document.createElement("section");
   document.createElement("article");
   document.createElement("aside");
   document.createElement("hgroup");
</script>
<![endif]-->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]--> 
<script type="text/javascript" src="./fplayer/swfobject.js"></script>
<script type="text/javascript" src="./fplayer/jquery-1.6.4.min.js"></script>
</head>

<body onload="MM_preloadImages('images/logo_footer_up2.png')" >
<div id="nonFooter">
<?   
    // BOTON FLOTANTE --->
        require_once('inc/boton_flotante.incl');         
     // BOTON FLOTANTE --->
?>
  <table bgcolor="#999" width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td align="center" valign="middle"><table width="990" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="58%" align="right" valign="middle" class="google_fjalla_bco">Inicio de Sesi&oacute;n</td>
        <td width="42%" height="50" align="center" valign="middle"><table width="95%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="42%" class="arial_bco_light_med">Nombre de Usuario</td>
            <td colspan="2"><span class="arial_bco_light_med">Contraseña</span></td>
          </tr>
		  <FORM name=ingreso ACTION="http://<?=$nombreurl?>/administracion.php" METHOD="post">     
          <tr>
            <td width="36%"><input name="login" type="text" class="arial_light_cuadro" id="login" size="28" /></td>
            <td width="36%" align="left" valign="top"><input name="password" type="password" class="arial_light_cuadro" id="password" size="28" /></td>
            <td width="22%" align="left" valign="top"><input name="button5" type="submit" class="rojo_sombra_ch" id="button5" value="Ingresar" /></td>
          </tr>
		 </form>
          <tr>
            <td></td>
            <td colspan="2" class="arial_rojo_light_med">Olvid&eacute; Mi Contraseña</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    </tr>
</table>
<table width="990" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="35%" height="350" align="right" valign="top"><a href="http://<?=$nombreurl?>" ><!-- img src="images/logo.png" width="278" height="317" border=0 /--><img src="images/sos_iphone_cut01.png" width="456" border="0" />
        </a></td>
        <td width="65%" align="right" valign="top"><table width="534" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top"><!-- img src="images/sos_iphone_cut.png" width="693" height="320" / -->
			<video id=0 controls width=534 height=300 poster="http://<?=$nombreurl?>/images/imagen_probando.jpg" preload="auto" >
			<source src="/videos/SOSClick_VideoFinal01.ogv" type='video/ogg; codecs="theora, vorbis"'/>
			<source src="/videos/SOSClick_VideoFinal01.webm" type='video/webm' >
			<source src="/videos/SOSClick_VideoFinal01.mp4" type='video/mp4'>
            <object type="application/x-shockwave-flash" data="http://<?=$nombreurl?>/fplayer/flowplayer-3.2.1.swf" width="534" height="300">
		<param name="movie" value="http://<?=$nombreurl?>/fplayer/flowplayer-3.2.1.swf" />
		<param name="allowFullScreen" value="true" />
		<param name="wmode" value="transparent" />
		<param name="flashVars" value="config={'playlist':['http%3A%2F%2Fwww.sosclick.cl%2Fimages%2Fimagen_probando.jpg',{'url':'http%3A%2F%2Fwww.sosclick.cl%2Fvideos%2FSOSClick_VideoFinal01.flv','autoPlay':true}]}" />
		<img alt="Multimail" src="http://<?=$nombreurl?>/images/imagen_probando.jpg" width="534" height="300" title="No tiene capacidad de ver video" />
	</object>
			</video>
			</td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="49%" align="center" valign="top"><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><p><span class="google_fjalla_gde_red">&bull; ¿Qu&eacute; es SOSClick?</span><br />
              <span class="arial_cuerpo_gris"><br />
              SOSClick es una aplicaci&oacute;n para Smartphones con conexi&oacute;n a Internet, desarrollado frente a una necesidad cada vez mayor... La seguridad.</span></p>
              <p><span class="arial_cuerpo_gris">SOSClick te permite estar a un solo click de distancia de hacer un aviso de emergencia a una central que autom&aacute;ticamente se pondr&aacute; en contacto con tu celular, conociendo de antemano la ubicaci&oacute;n desde la cual presionaste SOSClick, gracias al GPS de tu celular. Adem&aacute;s, env&iacute;a 3 Mensajes de texto a celulares que hayas configurado para recibir un mensaje indicando que est&aacute;s en una emergencia.</span></p>
              <p><span class="arial_cuerpo_gris">Con SOSClick es una herramienta que te permite estar m&aacute;s seguro, est&eacute;s donde est&eacute;s.</span></p>
              <p>

			  <!--a title="Esto podria estar sucediendo en tu hogar"  href="http://<?=$nombreurl?>/videos/nana_golpea_1.flv" rel=shadowbox;width=708;height=510 onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Imagen15','','images/videos_sosclick3_up.jpg',1)"
                <input name="button" type="submit" class="bot_sombra1" id="button" onclick="javascript:vervideo();" value="Mira el Video Explicativo de SOSClick" />-->
              </p>
              </td>
            </tr>
          </table></td>
        <td width="2%" align="center" valign="middle"><img src="images/div_vert.png" width="3" height="140" /></td>
        <td width="49%" align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top"><p><span class="google_fjalla">&bull; Aplicaci&oacute;n 100% gratis</span><br />
              <span class="arial_cuerpo_gris">Las llamadas que recibes desde la central de emergencia, asi como los 3 SMS enviados a tus n&uacute;meros de confianza son completamente gratis para ti, o sea, no gastas nada al utilizar la aplicaci&oacute;n.</span></p>
              <p><span class="google_fjalla">&bull; Act&iacute;valo haciendo s&oacute;lo un click en la aplicaci&oacute;n</span><br />
                <span class="arial_cuerpo_gris">Sin complicados men&uacute;s, opciones, ni pasos extras. Si te encuentras en una emergencia, s&oacute;lo debes hacer click en el icono de la aplicaci&oacute;n en tu celular y ya has activado el servicio. </span></p>
              <p><span class="google_fjalla">&bull; Env&iacute;a 3 Mensajes de Texto a los n&uacute;meros que configures.</span><br />
                <span class="arial_cuerpo_gris">Para mayor seguridad, puedes configurar 3 n&uacute;meros celulares de confianza para que reciban un SMS, indic&aacute;ndoles que te encuentras en una emergencia.</span></p>
              <p><span class="google_fjalla">&bull; Env&iacute;a la ubicaci&oacute;n  donde activaste la emergencia</span><br />
                <span class="arial_cuerpo_gris">Al hacer click en la aplicaci&oacute;n, esta env&iacute;a autom&aacute;ticamente tu ubicaci&oacute;n a trav&eacute;s del GPS a la central de emergencia, para que sea m&aacute;s f&aacute;cil localizarte.</span></p>       
              </p></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>

<!-- PIE  -->
<!-- Tabla de margen frente al footer -->
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr><td height="70">&nbsp; </td></tr>
</table>
<!--Fin de la Tabla de margen frente al footer -->

</div> 

<!-- Footer, debe estar dentro del Div -->
<div id="Footer">
<?  require_once('./inc/pie2.incl');  ?> 
</div>

<!-- Fin del Footer-->

</body>
</html>
