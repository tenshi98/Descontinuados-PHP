<?php

require_once('../nombre_pag.php');
require_once('../conexion_chica.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="../estilo.css" rel="stylesheet" type="text/css"/>


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

</head>

<body  topmargin=10>

<FORM language=javascript name="mainFrame" id="mainFrame" onsubmit="return aceptar(this);" action="limpiadatos.php" method="post" target="_self">    
		<input type=hidden name="ciudad_fono" id="ciudad_fono" value=02>
	

<table width="92%" border=0 cellpadding="2" cellspacing="3" id="table15" align=center  >
<tr  class="arial_10_33">
        <td valign="middle"  height="25" width="29%" style="text-align: left" >
		<p style="text-align: right"><font color="#FFFFFF"><b>
		**
		</b>Número de Anexo</font></td>
        <td  width="69%" height="25" style="text-align: left">
		<font color="#FFFFFF">
		<input name="anexo"  type="text" class="formText" id="anexo" size="45"  onKeyPress="JValidaCaracter('Alfanumerico','&_-');" ></font></td>
</tr>


    

<tr  class="arial_12_red">
        <td valign="middle"  height="13" width="98%" style="text-align: left" colspan="2" >
		<p style="text-align: center">&nbsp;</p>
		<p style="text-align: center">
		
		<input type="submit" class="entra" name="entrar" value="Eliminar"/></td>
</tr>

<tr  class="arial_10_33">
        <td valign="middle"  height="40" width="100%" style="text-align: center" colspan="2" ><span class="arial_10_33">
			Los datos con (**) son obligatorios.</td>
</tr>

</table>

</form>

</body>
</html>