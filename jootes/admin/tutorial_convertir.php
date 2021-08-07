<?php
session_start();
require_once('../nombre_pag.php');
require_once('../conexion.php');

	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>..:: <?=$pagina?> ::..</title>
<link rel="icon" href="./favicon.ico" type="image/x-icon">
<link href="../estilo.css" rel="stylesheet" type="text/css" />
<link href="../estilo_bot.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
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
//-->
</script>
<script src="http://<?=$nombreurl?>/AC_RunActiveContent.js" type="text/javascript"></script>
<script type='text/javascript' src='http://<?=$nombreurl?>/jw/jwplayer.js'></script>
<link rel="stylesheet" type="text/css" href="http://<?=$nombreurl?>/shadowbox/shadowbox.css">
<script type="text/javascript" src="http://<?=$nombreurl?>/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    overlayOpacity: 0.8
});
</script>
</head>

<body>


<table align="center" width="990" border="0" cellspacing="0" cellpadding="0" background="http://<?=$nombreurl?>/images/body_body.png">
  <tr>
    <td align="center" valign="top" >
	
<?  require_once('../inc/cabecera_admin.incl'); ?>  
</td>
                </tr>

  <tr>
    <td align="center" valign="top"  height=10>
<?  require_once('../inc/bot_admin.incl'); ?>  

</td>
</tr>
<tr>
<td align="center" valign="top" height=600>
<!-- CONTENIDO -->	


        
         <table border="0" width="100%" id="table1">
			<tr>
				<td width="98%" height="50" colspan="2" align="center"><a href="http://video.online-convert.com/convert-to-flv"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('selec','','../images/convierte_flv_up.jpg',1)"><img src="../images/convierte_flv.jpg" name=selec id=selec border=0 /></a></td>
		</tr>
			<!--tr>
				<td width="66%" height="50">Debes tener el archivo a convertir 
				en tu PC.</td>
				<td width="32%" align="center" height="50"><a href="http://video.online-convert.com/convert-to-flv" class=fondo_blanco target=_blank>Ir a convertir</a></td>
		</tr-->
		</table>
	<table width="550" border="0" cellspacing="0" cellpadding="0" id="table2">
      <tr>
        <td width="550" align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td height="5" align="left" valign="middle"></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="arial_12_normal"><p class="arial_tit_calip">Presiona el  bot&oacute;n &ldquo;Examinar&rdquo; y abrir&aacute; una ventana para que busques entre tus archivos, el  video que deseas convertir.</p></td>
      </tr>
      <tr>
        <td align="center" valign="middle">
		<img src="../images/1era_tut.png" width="500" height="362" /></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="arial_12_normal"><p class="arial_tit_calip">Una vez  encontrado presiona el bot&oacute;n &ldquo;Abrir&rdquo;.</td>
      </tr>
      <tr>
        <td align="center" valign="middle">
		<img src="../images/2da_tut.png" width="500" height="362" /></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="arial_12_blue"><br />
          Convirtiendo a FLV</td>
      </tr>
      <tr>
        <td height="5" align="left" valign="middle"></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="arial_12_normal"><p class="arial_tit_calip">Para  comenzar la conversi&oacute;n presiona el bot&oacute;n &ldquo;Convert File</p></td>
      </tr>
      <tr>
        <td align="center" valign="middle" class="arial_10_subtit">
		<img src="../images/3era_tut.png" width="500" height="362" /></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="arial_12_normal"><p class="arial_tit_calip">Una barra de progreso te mostrará el estado de subida del video.</td>
      </tr>
      <tr>
        <td align="center" valign="middle">
		<img src="../images/4ta_tut.png" width="500" height="362" /></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="arial_12_blue"><br />
          Guarda Tu Video</td>
      </tr>
      <tr>
        <td height="5" align="left" valign="middle"></td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="arial_12_normal"><p class="arial_tit_calip">Ya convertido, se abrirá una ventana que te permitirá guardar el video.</p></td>
      </tr>
      <tr>
        <td align="center" valign="middle" class="arial_10_subtit">
		<img src="../images/5ta_tut.png" width="500" height="362" /></td>
      </tr>
    </table>
	<br>
	<table border="0" width="100%" id="table1">
			<tr>
				<td width="98%" height="50" colspan="2" align="center"><a href="http://video.online-convert.com/convert-to-flv"  onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('selec2','','../images/convierte_flv_up.jpg',1)"><img src="../images/convierte_flv.jpg" name=selec2 id=selec2 border=0 /></a></td>
		</tr>
			<!--tr>
				<td width="66%" height="50">Debes tener el archivo a convertir 
				en tu PC.</td>
				<td width="32%" align="center" height="50"><a href="http://video.online-convert.com/convert-to-flv" class=fondo_blanco target=_blank>Ir a convertir</a></td>
		</tr-->
		</table>



<!-- CONTENIDO -->
</td>
</tr>

</table>
<!--Pie -->			
			
			
		<?  require_once('../inc/pie.incl'); ?>  	
			
			
			
<!-- Pie -->
</body>
</html>
