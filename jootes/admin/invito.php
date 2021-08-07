<?php
require_once('../nombre_pag.php');
require_once('../conexion.php');

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
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
//-->
</script>
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
<body class="body2">


<center>
 <table align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="26" height="26"><img src="http://<?=$nombreurl?>/images/a1.png" width="26" height="26" /></td>
    <td background="http://<?=$nombreurl?>/images/a2.png"></td>
    <td width="26" height="26"><img src="http://<?=$nombreurl?>/images/a3.png" width="26" height="26" /></td>
  </tr>
  <tr>
    <td background="http://<?=$nombreurl?>/images/b1.png"></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF">
<!-- contenido -->
<FORM  name="mainFrame" id="mainFrame"  action="envia.php" method="post" target="_self">  


<input type=hidden name=nombre_video value="<?=$_GET["video"]?>">
<table align="center" width="449" border="0" cellspacing="0" cellpadding="0" id="table4">
  <tr>
    <td colspan="2" align="center" valign="top" height="40" >
	<span class="georgia_bl_18_it_padd">Invitacion a Video Conferencia</span></td>
  </tr>
  <tr  class="celda_con_div">
    <td align="center" height="40" > Tu Nombre </td>
    <td align="center" height="40" ><div align="left">
      <input name="nombre" type="text" id="nombre" size="30" />
    </div></td>
  </tr>

  <tr  class="celda_con_div">
    <td align="center" height="40" >
	Tu Correo</td>
    <td align="center" height="40" >
      <div align="left">
        <input name="enviador" type="text" id="enviador" size="30" />
      </div></td>
  </tr>
  <tr  class="celda_con_div">
    <td align="center" height="40" >
	Correo a quien invitas</td>
    <td align="center" height="40" >
      <div align="left">
        <input name="receptor" type="text" id="receptor" size="30" />
      </div></td>
  </tr>
  <tr  class="celda_con_div">
    <td align="center" height="40" >
	Asunto</td>
    <td align="center" height="40" >
	  <div align="left">
	    <input name="asunto" type="text" id="asunto" size="30" />
	    </div></td>
  </tr>

  <tr  class="celda_con_div">
    <td align="center" height="60" >
	Mensaje</td>
    <td align="center" height="60" >
	  <div align="left">
	    <textarea rows="3" name="mensaje" cols="25"></textarea>
	    </div></td>
  </tr>
  
    <tr  class="celda_con_div">
    <td align="center" height="60" >
	Tiempo (numerico en segundos)</td>
    <td align="left" height="60" >
	    <input name="tiempo" type="text" id="tiempo" size="10" />



	</td>
  </tr>

  <tr>
    <td height="25" colspan="2" align="center" valign="middle" >
	<table width="400" border="0" cellspacing="0" cellpadding="0" id="table5">
      <tr>
        <td align="right" valign="middle" width="450">
 <input type="image" src="http://<?=$nombreurl?>/images/enviar_bot.png" name="I1"/></td>
        <td align="right" valign="middle">&nbsp; </td>
      </tr>
    </table></td>
  </tr>
</table>
</FORM>



<!-- contenido -->
</td>
    <td background="http://<?=$nombreurl?>/images/b3.png"></td>
  </tr>
  <tr>
    <td width="26" height="26"><img src="http://<?=$nombreurl?>/images/c1.png" width="26" height="26" /></td>
    <td background="http://<?=$nombreurl?>/images/c2.png"></td>
    <td width="26" height="26"><img src="http://<?=$nombreurl?>/images/c3.png" width="26" height="26" /></td>
  </tr>
    <tr>
    <td width="26" height="26">&nbsp;</td>
    <td align=center><a href="#" onclick="window.parent.Shadowbox.close();" ><IMG alt="Cerrar Pagina" src="http://<?=$nombreurl?>/images/cerrar_ventana.png" border=0></a></td>
    <td width="26" height="26">&nbsp;</td>
  </tr>
</table>
