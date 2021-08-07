<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
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
<link rel="stylesheet" type="text/css" href="../shadowbox/shadowbox.css">
<script type="text/javascript" src="../shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    overlayOpacity: 0.8
});
</script>


</head>

<body >


<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla_degra">
  <tr>
    <td align="center"><table width="987" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top" >       
          
          

<table width="900" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="150" align="center" valign="middle">
                                          
              
              <span class="arial_24_blue">ADMINISTRACIÓN</span><table height="" width="900" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center" valign="middle" class="arial_24_99">
            
                  <table height="" width="900" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="235" rowspan="4" align="left">
						<a href="http://<?=$nombreurl?>">
						<img src="http://<?=$nombreurl?>/images/logo.png"  border=0 /></a></td>
                      <td width="189" rowspan="4" align="center">
						<a href="http://<?=$nombreurl?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('dos','','http://<?=$nombreurl?>/images/home_bot_up.png',1)">
						<img src="http://<?=$nombreurl?>/images/home_bot.png" border=0 align="right" id=dos /></a></td>
                      <td width="87" rowspan="2" align="center" valign="bottom" class="arial_24_99">&nbsp;</td>
                      <td height="20" align="left" class="arial_24_99">
                      &nbsp;</td>
                      <td width="12" rowspan="2" class="arial_24_99">&nbsp;</td>
                      <td height="20" align="left" class="arial_24_99">
                      &nbsp;</td>
                    </tr>
                    <tr>
                      <td width="120" align="left" class="arial_12_bco">
                      &nbsp;</td>
                      <td width="147" align="left" class="arial_12_bold">
                        &nbsp;</td>
                    </tr>
                      <tr>
                        <td height="5" colspan="4" ></td>
                        </tr>
                      <tr>
                        <td colspan="2" align="right" valign=top class="arial_10_bco">
                        &nbsp;</td>
                        <td colspan="2" align="right" class="arial_12_bco">
                        &nbsp;</td>
                      </tr>
                      </table>

          
          
          
          </td>
                </tr>
                </table></td>
            </tr>
            </table>
          <table width="900" border="0" cellspacing="0" cellpadding="0">
            <tr>
    <td>
	<img src="../images/barra_sup_bco.png" width="900" height="10" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" background="../images/barra_body_bco.png"  class="arial_24_99">
    <table height="237" width="888" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="888" align="center" class="arial_24_neg">
        
        <!-- contenido -->
        
        
        

        
        
          <!-- contenido -->      
        
        </td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td>
	<img src="../images/barra_inf_bco.png" width="900" height="10" /></td>
  </tr>
          </table>
</td>
      </tr>
    </table></td>
  </tr>
</table>
  <!-- Pie de pagina -->
 <!--#include file="../pie.asp"-->      
         <!-- Pie de pagina --></td>
  </tr>
</table>
<center>

</center>
</body>
</html>