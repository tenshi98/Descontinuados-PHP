<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
if ($_GET["cierro"]=="si") {
session_destroy();
}
require_once('nombre_pag.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="http://<?=$nombreurl?>/scripts/jquery.slider.css" />
  <!--[if IE 6]>
  <link rel="stylesheet" type="text/css" href="javascript/slider/themes/default/jquery.slider.ie6.css" />
  <![endif]-->

<script type="text/javascript" src="http://<?=$nombreurl?>/scripts/jquery.min.js"></script>
<script type="text/javascript" src="http://<?=$nombreurl?>/scripts/jquery.slider.min.js"></script>
  
<style type="text/css">
  .caption
  {
    display:none;
  }
  
  .caption h4
  {
    margin:0;
  }
</style>

  <script type="text/javascript">
<!--
jQuery(document).ready(function($) {
      $(".slider").slideshow({
        width      : 620,
        height     : 250,
        pauseOnHover : false,
        transition : ['slideLeft', 'slideRight', 'slideTop', 'slideBottom']
      });
      
      $(".caption").fadeIn(500);

      // playing with events:
      
      $(".slider").bind("sliderChange", function(event, curSlide) {
        $(curSlide).children(".caption").hide();
      });
      
      $(".slider").bind("sliderTransitionFinishes", function(event, curSlide) {
        $(curSlide).children(".caption").fadeIn(500);
      });
    });
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
//-->
</script>


</head>

<body onload="MM_preloadImages('images/muni_sos_logo_up.png','images/apk_logo_up.png')">

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
        <td width="35%" height="350" align="right" valign="bottom"><a href="http://<?=$nombreurl?>/creausuarios.php" ><img src="images/logo.png" width="278" height="317" border=0 /></a></td>
        <td width="65%"><table width="693" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra2">
          <tr>
            <td align="center" valign="top"><div class="slider">
              <div>
                <table width="640" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="350" align="left" valign="top" bgcolor="#FFFFFF" class="google_fjalla_gde"><span class="google_fjalla_gde_red">Totalmente Gratuito</span><br />
                      <br />
                      S&oacute;lo necesitas tener tu smartphone con conexi&oacute;n a Internet.<br />
                      SMS y llamados 100% gratis para el usuario.</td>
                    </tr>
                </table>
              </div>
              <div>
                <table width="640" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="350" align="left" valign="top" bgcolor="#FFFFFF" class="google_fjalla_gde"><span class="google_fjalla_gde_red">Llamado Gratis</span><br />
                      <br />
                      Con s&oacute;lo un Click de alerta!! Recibe el llamado inmediato de Seguridad
                      Ciudadana o Plan Cuadrante. </td>
                  </tr>
                </table>
              </div>
              <div>
                <table width="640" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="350" align="left" valign="top" bgcolor="#FFFFFF" class="google_fjalla_gde"><span class="google_fjalla_gde_red">M&aacute;s r&aacute;pido</span><br />
                      <br />
                      Una vez instalado en tu Tel&eacute;fono inteligente, s&oacute;lo necesitas
                      un click en el &iacute;cono de la Aplicaci&oacute;n!! </td>
                  </tr>
                </table>
              </div>
              <div>
                <table width="640" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="350" align="left" valign="top" bgcolor="#FFFFFF" class="google_fjalla_gde"><span class="google_fjalla_gde_red">3 SMS Gratis</span><br />
                      <br />
                      Env&iacute;a 3 Mensajes de Texto a los n&uacute;meros 
                      que configures. S&oacute;lo con un Click!!</td>
                  </tr>
                </table>
            </div>
              <div>
                <table width="640" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="350" align="left" valign="top" bgcolor="#FFFFFF" class="google_fjalla_gde"><span class="google_fjalla_gde_red">Indica tu Ubicaci&oacute;n<br />
                    </span><br />
                      La Aplicaci&oacute;n, en el mensaje de 
                      auxilio, indica tu posici&oacute;n autom&aacute;ticamente a trav&eacute;s del GPS.!</td>
                  </tr>
                </table>
              </div>
            </div></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="49%" align="center" valign="middle"><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
              <td width="27%" align="left">
			    <table width="141" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="141 height="135" align="center" valign="middle">
				  <a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image4','','images/apk_logo_up.png',1)" ><img src='images/apk_logo.png' alt='Desc&aacute;rgalo Aqu&iacute;' name='Image4' width='116' height='115' border='0' id='Image4' /></a>				 				  </td>
                </tr>
              </table></td>
              <td width="73%" align="center" valign="middle"><table width="90%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="35"><span class="arial_tit_gris">SOSClick en tu Smartphone </span></td>
                </tr>
                <tr>
                  <td align="left" valign="top"><span class="arial_cuerpo_gris">Si tienes un Smartphone con conexi&oacute;n a internet, entonces s&oacute;lo te falta descargar la Aplicaci&oacute;n.</span></td>
                </tr>
                <tr>
                  <td height="35" align="left" valign="bottom"><input name="button3" type="submit" class="bot_sombra1" id="button3"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/apk_menu_test.php';"  value="Conoce m&aacute;s sobre la Aplicaci&oacute;n" /></td>
                </tr>
              </table></td>
            </tr>
        </table></td>
        <td width="2%" align="center" valign="middle"><img src="images/div_vert.png" width="3" height="140" /></td>
        <td width="49%" align="center"><table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="27%" align="left"><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="141" height="135" align="center" valign="middle"><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image1','','images/muni_sos_logo_up.png',1)"><img src="images/muni_sos_logo.png" name="Image1" width="141" height="135" border="0" id="Image1" /></a></td>
                </tr>
              </table></td>
            <td width="73%" align="center" valign="middle"><table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="35"><span class="arial_tit_gris">SOS Click en tu Municipalidad</span></td>
              </tr>
              <tr>
                <td align="left" valign="top"><span class="arial_cuerpo_gris">Si tu Municipio est&aacute; suscrito, entonces el bot&oacute;n est&aacute; configurado para Seguridad Ciudadana del mismo. </span></td>
              </tr>
              <tr>
                <td height="35" align="left" valign="bottom"><input name="button2" type="submit" class="bot_sombra1" id="button2" value="Aplicaci&oacute;n para tu Comuna" /></td>
              </tr>
            </table></td>
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
<?  require_once('./inc/pie1.incl');  ?> 
</div>

<!-- Fin del Footer-->

</body>
</html>
