<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once('../nombre_pag.php');
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="../estilo.css" rel="stylesheet" type="text/css" />

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

</head >

<body onload="MM_preloadImages('images/logo_footer_up2.png')">
<div id="nonFooter" width="100%">
  <table bgcolor="#999999" width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td align="center" valign="middle"><table width="990" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="58%" align="right" valign="middle" class="google_fjalla_bco"><table border="0" cellpadding="0" cellspacing="0" class="logo_flot">
          <tr>
            <td><img src="../images/logo.png" height="200" /></td>
          </tr>
        </table>
          Administraci??n <?=$nombreurl?></td>
        <td width="42%" height="50" align="center" valign="middle">
		<input name="button" type="submit" class="bot_sombra_izq" id="button" value="" />
          <input name="button2" type="submit" class="bot_sombra_cent" id="button2" value="Cerrar Sesi??n"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/index.php?cierro=si';"/>
          <input name="button4" type="submit" class="bot_sombra_der" id="button4" value="" /></td>
      </tr>
    </table></td>
    </tr>
</table>





  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
   <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top">
		<table id="table3" border="0" cellpadding="0" cellspacing="0" width="100%" height=200>
          <tbody>
            <tr>
              <td>&nbsp;</td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td  align=center>
<TABLE align=center>
<TR>
	<TD align=center>		<input name="button" type="submit" class="bot_sombra_izq" id="button" value="" />
          <input name="button2" type="submit" class="bot_sombra_cent" id="button2" value="Monitoreo"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/monitor/index.php';"/>
          <input name="button4" type="submit" class="bot_sombra_der" id="button4" value="" />
		  <br><br>
		  </TD>
</TR>
<TR>
	<TD align=center>		<input name="button" type="submit" class="bot_sombra_izq" id="button" value="" />
          <input name="button2" type="submit" class="bot_sombra_cent" id="button2" value="Reportes"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/reportes/index.php';"/>
          <input name="button4" type="submit" class="bot_sombra_der" id="button4" value="" />
		  <br><br>		  
		  </TD>
</TR>
<TR>
	<TD align=center>		<input name="button" type="submit" class="bot_sombra_izq" id="button" value="" />
          <input name="button2" type="submit" class="bot_sombra_cent" id="button2" value="Mensajes por notificacion"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/notificaciones/mensajes.php';"/>
          <input name="button4" type="submit" class="bot_sombra_der" id="button4" value="" />
		  <br><br>		  
		  </TD>
</TR>
<TR>
	<TD align=center>		<input name="button" type="submit" class="bot_sombra_izq" id="button" value="" />
          <input name="button2" type="submit" class="bot_sombra_cent" id="button2" value="Ultimas 150 Activaciones"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/monitor/activaciones.php';"/>
          <input name="button4" type="submit" class="bot_sombra_der" id="button4" value="" />
		  <br><br>		  
		  </TD>
</TR>
<TD align=center>		<input name="button" type="submit" class="bot_sombra_izq" id="button" value="" />
          <input name="button2" type="submit" class="bot_sombra_cent" id="button2" value="Administrar Preguntas"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/preguntas/index.php';"/>
          <input name="button4" type="submit" class="bot_sombra_der" id="button4" value="" />
		  <br><br>		  
		  </TD>
</TR>
</TABLE>


</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top">
		<table id="table3" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td>&nbsp;</td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>

<!--Tabla de margen frente al footer -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="70">&nbsp;</td>
  </tr>
</table>

<!--Fin de la Tabla de margen frente al footer -->

</div> 

<!-- Footer, debe estar dentro del Div-->

<div id="Footer">

<table  width="100%" border="0" cellpadding="0" cellspacing="0" class="pie2" valign="bottom">
  <tr>
    <td align="center" valign="middle" ><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','../images/logo_footer_up2.png',1)"><img src="../images/logo_footer_up.png" name="Image2" width="300" height="64" border="0" id="Image2" /></a></td>
    </tr>
  </table>      
<table  width="100%" border="0" cellpadding="0" cellspacing="0" class="pie" valign="bottom">
  <tr>
    <td align="center" valign="middle" class="arial_bco_light_med">Avenida Kennedy 5735 ??? Edificio Hotel Marriot, Torre Poniente , Oficina 1107. Las Condes, Santiago ??? (56 2) 2454637 - 2454622</td>
    </tr>
  </table>
</div>

<!-- Fin del Footer-->

</body>
</html>
