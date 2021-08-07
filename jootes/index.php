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
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/style.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js?ver=1.4.2"></script>
    <script src="js/login.js"></script>
    
    <link rel="stylesheet" type="text/css" href="js/jquery.slider.css" />
  <!--[if IE 6]>
  <link rel="stylesheet" type="text/css" href="javascript/slider/themes/default/jquery.slider.ie6.css" />
  <![endif]-->

<script type="text/javascript" src="http://<?=$nombreurl?>/js/jquery.min.js"></script>
<script type="text/javascript" src="http://<?=$nombreurl?>/js/jquery.slider.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".slider").slideshow({
        width      : 920,
        height     : 260,
        pauseOnHover : true,
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
  </script>
    <script type="text/javascript">
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>

<body onload="MM_preloadImages('http://<?=$nombreurl?>/images/face_bot_up.png','images/twit_bot_up.png')">
	<?   
    // BOTON FLOTANTE --->
       // require_once('inc/boton_flotante.incl');         
     // BOTON FLOTANTE --->

?>
<div id="nonFooter" width="100%">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" bgcolor="#000000">
	
	<?   
     // Cabecera --->
        require_once('inc/cabecera_ext.incl');         
     // Cabecera --->
?>


    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="patt_slider"><table width="970" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_bca esquina_red">
      <tr>
        <td align="center" valign="middle">
        
        <!-- Slider -->
        
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" valign="middle">&nbsp;</td>
        <td align="center" valign="top"><table width="900" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">
          <tr>
            <td align="center" valign="top"><div class="slider">
              <div>
                
                <table bgcolor="#ffffff" width="900" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="280" align="center" valign="top"><img src="http://<?=$nombreurl?>/images/cel_underwear.png" width="252" height="245" /></td>
            <td  align="center" valign="middle"><table width="90%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="middle" ><span class="titulo_yell">Llama Gratis!!</span></td>
              </tr>
              <tr>
                <td align="left" valign="middle"><p><span class="arial_light_med">Suena Increible, pero es cierto. Con Multimail puedes llamar gratis a celulares de cualquier compañía Completamente Gratis.</span><span class="arial_light_med"><br />
                      <br />
                      Es tan fácil como parece, ingresa tu mail, nombre y otros datos simples y te enviamos tu contraseña al Correo.<br />
                      <br />
                      Para llamar, sólo ingresa con tus datos, (email y contraseña) levanta y llama desde nuestra página.</span></p>
                  <p><span class="arial_light_med">* También puedes llamar a Teléfonos Fijos.</span><br />
                  </p></td>
              </tr>
              <tr>
                <td align="left" valign="middle"><input name="button11" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button11" value="Regístrate Gratis!!" /></td>
              </tr>
            </table></td>
          </tr>
        </table> </div>
              <div>
                <table bgcolor="#ffffff" width="900" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="280" align="center" valign="middle"><img src="http://<?=$nombreurl?>/images/cel_underwear.png" width="252" height="245" /></td>
                    <td align="center" valign="middle"><table width="90%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="middle" class="titulo_yell">Gana Lucas <span class="titulo_yell_rojo">Llamando</span></td>
                      </tr>
                      <tr>
                        <td align="left" valign="middle"><p><span class="arial_light_med">Si ya estás registrado en Multimail puedes empezar a generar ingresos sólo llamando</span>.</p>
                          <p><span class="arial_light_med">Así es, además de llamar completamente gratis, </span><span class="arial_rojo_light_med">te pagamos para que llames</span><span class="arial_light_med">, llama a quien quieres y consigue un ingreso extra a través de Multimail<br />
                            </span><br />
                            <span class="arial_light_med">Registrate Ahora y disfruta de todos los beneficios que sólo Multimail te puede entregar</span><br />
                            </p>
                          <p>
                            <input name="button9" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button9" value="¿Cómo Conseguirlos?" />
                          </p></td>
                      </tr>
                      </table></td>
                  </tr>
                </table>
              </div>
              <div>
                <table bgcolor="#ffffff" width="900" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="280" align="center" valign="middle"><img src="http://<?=$nombreurl?>/images/cel_underwear.png" width="252" height="245" /></td>
                    <td  align="center" valign="middle"><table width="90%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td align="left" valign="middle" class="titulo_yell">Gana una Tablet.</td>
                        </tr>
                      <tr>
                        <td align="left" valign="middle"><p><span class="arial_light_med"><br />
                          Ganar es muy fácil, </span><span class="arial_rojo_light_med">si entre todas las personas que invitaste</span><span class="arial_light_med"> a participar en Multimail </span><span class="arial_rojo_light_med">10 se registran</span><span class="arial_light_med">, estás participando automáticamente para Ganar una espectacular Tablet Samsung de 7 pulgadas.</span></p>
                          <p><span class="arial_light_med">No pierdas esta oportunidad, y no dejes de invitar amigos para que se registren, pues </span><span class="arial_rojo_light_med">por cada 10 amigos  tienes un cupón</span><span class="arial_light_med"> para participar de este espectacular Premio. </span><br />
                          </p></td>
                        </tr>
                      <tr>
                        <td align="left" valign="middle"><input name="button10" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button10" value="¿Cómo Participar?" /></td>
                        </tr>
                      </table></td>
                    </tr>
                </table>
              </div>
               </td>
            </tr>
        </table></td>
        </tr>
      </table>       
        
        <!-- Fin Slider -->
        
        
        </td>
      </tr>
  </table></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="25" align="center" valign="middle"></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><table width="970" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><table width="315" border="0" cellpadding="0" cellspacing="0" class="tabla_ama esquina_red">
          <tr>
            <td colspan="2" align="center" valign="middle" class="titulo_bco">Jootes para Android</td>
          </tr>
          <tr>
            <td width="163" rowspan="2" align="center" valign="top"><img src="http://<?=$nombreurl?>/images/icon-android.png" width="126" height="162" /></td>
            <td width="152" height="135" align="left" valign="top"><p class="cuerpo_gris">Descarga ahora la aplicación y disfruta de los beneficios que hemos creado para ti.<br />
              Gana puntos y cámbialos por Minutos para llamar gratis en nuestra Comunidad.<br />
            </p></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="cuerpo_gris">
              <input name="button8" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button8" value="Leer Más" />
            </span></td>
          </tr>
        </table></td>
        <td align="center" valign="top"><table width="315" border="0" cellpadding="0" cellspacing="0" class="tabla_ama esquina_red">
          <tr>
            <td colspan="2" align="center" valign="middle" class="titulo_bco">Jootes para Android</td>
          </tr>
          <tr>
            <td width="163" rowspan="2" align="center" valign="top"><img src="http://<?=$nombreurl?>/images/cel_underwear.png" width="163" height="157" /></td>
            <td width="152" height="135" align="left" valign="top"><p class="cuerpo_gris">Descarga ahora la aplicación y disfruta de los beneficios que hemos creado para ti.<br />
              Gana puntos y cámbialos por Minutos para llamar gratis en nuestra Comunidad.<br />
            </p></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="cuerpo_gris">
              <input name="button7" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button7" value="Leer Más" />
            </span></td>
          </tr>
        </table></td>
        <td align="right"><table width="315" border="0" cellpadding="0" cellspacing="0" class="tabla_ama esquina_red">
          <tr>
            <td colspan="2" align="center" valign="middle" class="titulo_bco">Jootes para Android</td>
            </tr>
          <tr>
            <td width="163" rowspan="2" align="center" valign="top"><img src="http://<?=$nombreurl?>/images/cel_underwear.png" width="163" height="157" /></td>
            <td width="152" height="135" align="left" valign="top"><p class="cuerpo_gris">Descarga ahora la aplicación y disfruta de los beneficios que hemos creado para ti.<br />
              Gana puntos y cámbialos por Minutos para llamar gratis en nuestra Comunidad.<br />
            </p></td>
          </tr>
          <tr>
            <td align="left" valign="top"><span class="cuerpo_gris">
              <input name="button6" type="submit" class="google_bot_txt_bco esquina_red_3px padding_10" id="button6" value="Leer Más" />
            </span></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
</table>


<!--Tabla de margen frente al footer -->

<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="80"></td>
  </tr>
</table>

<!--Fin de la Tabla de margen frente al footer -->

</div> 
<!-- Footer, debe estar dentro del Div-->

<?  require_once('./inc/footer.incl');  ?> 

</body>
</html>
