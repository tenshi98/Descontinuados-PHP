<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="mapestilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?=$nombreurl?>/scripts/gmaps.js"></script>
<script type="text/javascript">
    var map;
    $(document).ready(function(){
      map = new GMaps({
        div: '#map',
       lat: <?=$_GET["lat"]?>,
        lng: <?=$_GET["lon"]?>,
        zoom: 16,
		mapTypeId: google.maps.MapTypeId.HYBRID
      });


        map.addMarker({
        lat: <?=$_GET["lat"]?>,
        lng: <?=$_GET["lon"]?>,
        title: '<?=$_GET["nom"]?>'+'  '+'<?=$_GET["fono"]?>',
		icon: '../images/gota_azul.png',
      });
	 
      //Centrar el mapa de acuerdo a los límites

    });
</script>
<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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

<body>
<div id="nonFooter">
<?  require_once('menu.incl'); ?>
<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="581" rowspan="4" align="center" valign="middle">
	    <span class="arial_light_med">&nbsp;<br /></span>
        <span class="google_fjalla_gde">Detalle de Alarma</span>
	</td></tr>
</table> 
<table border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
  <tr>
         <td align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">
              <tr>
                    <td align="center" valign="middle"><div align="center"><div id="map" style="width: 900px; height: 600px" ></div></div></td></tr>
					  
                    </table></td>
            </tr>
          </table>
	</td>
  </tr>
</table>
<!--Tabla de margen frente al footer -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td height="70">&nbsp;</td></tr>
</table>
<!--Fin de la Tabla de margen frente al footer -->

</div> 

<!-- Footer, debe estar dentro del Div-->
<div id="Footer">
<?  require_once('../inc/pie3.incl');  ?> 
</div>

<!-- Fin del Footer-->
</body>
</html>
