<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link href="http://<?=$nombreurl?>/estilo_bot.css" rel="stylesheet" type="text/css" />
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
<script src="http://<?=$nombreurl?>/AC_RunActiveContent.js" type="text/javascript"></script>
<script type='text/javascript' src='http://<?=$nombreurl?>/jwplayer/jwplayer.js'></script>
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
</head>
<body >


<table background="http://<?=$nombreurl?>/images/body_body.png" align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">
	
<!-- CABECERA -->	
	<?  require_once('../inc/cabecera_login.incl'); ?>  
	  
<!-- CABECERA -->	  
      <table width="984" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center" valign="middle" class="div_linea_nar"></td>
        </tr>
      </table>
      <table width="950" border="0" cellspacing="0" cellpadding="0">
        <tr align="right">
          <td height="40" colspan="2">

		  </td>
        </tr>
        <tr>
          <td width="165" align="center" valign="top">
          
        <!-- CABECERA MENU --> 
        <?   
    require_once('../inc/tabla_menu.incl');  
?>

 <!-- CABECERA MENU -->  
          
          </td>
          <td width="785" align="center" valign="top">

   <!--CONTENIDO-->    

		  <table width="80%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="50%" align="left" valign="middle">
			<a  href="http://<?=$nombreurl?>/telefono_ol.php" target=_self> <img src="http://<?=$nombreurl?>/images/ver_mas.jpg" border=0 /></a></td>
	<FORM language=javascript name="buscar_v" id="buscar_v"  action="http://<?=$nombreurl?>/telefonos_ol.php" method="post" target="_self">		  

              <td width="20%" align="left" valign="middle">
			  <span class="arial_neg_10">Busca tu teléfono</span>
			  </td>
              <td width="20%" align="left" valign="middle">
			  <input name="numero" type="text" class="arial_neg_10" id="numero" />
			  </td>
              <td width="10%" align="right" valign="middle">
			  <input  type="image" src="http://<?=$nombreurl?>/images/buscar_bot.jpg"  border="0" />
				</td>
</form>
              </tr>
          </table>
		  
    <?
$sql="SELECT * FROM audios where  id=".$_GET["id"]; 

$res=mysql_query($sql,$base_fono); 

while($row=mysql_fetch_array($res))  {
	$str = str_replace( ' ', '', $row["nombre"] );
	$visitas=$row["visitado"] + 1;

	$sql2="update audios set visitado=".$visitas." where  id=".$_GET["id"]; 
	$res2=mysql_query($sql2,$base_fono); 

}
?>


      <table width="90%" height="90%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td  align="center" valign="middle">

	
 <div id="intro">
<div id="container">Cargando...</div>
<script type="text/javascript"> 

    jwplayer("container").setup({ 
        flashplayer: "http://<?=$nombreurl?>/player.swf", 
		autostart: true,
		controlbar: "bottom",
		        //file: "<?=$infor2?>",
		        file: "http://audio.opinalo.cl/audios/<?=$str?>.mp3",
				skin: "http://<?=$nombreurl?>/jwplayer/glow.zip",
				plugins: {"revolt-1":{}},
								width: 290,
								height: 260
			
    }); 
</script> 
    
</td>
              </tr>
          </table>
				  
				  
<br>
<div align=left>
<div class="fb-like" data-href="http://<?=$urlcorta?>/<?=$_GET["id"]?>" data-send="true" data-width="692" ></div><br>
</div>
		<!--Comentarios Facebook -->
				<fb:comments href="http://<?=$urlcorta?>/<?=$_GET["id"]?>" data-num-posts="2" data-width="692" ></fb:comments>
		<!--Comentarios Facebook -->


















    <!--CONTENIDO-->    
 			
			</td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
        </tr>
    </table></td>
  </tr>
</table>
<table background="http://<?=$nombreurl?>/images/body_body.png" align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top"><table width="984" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" class="div_linea_nar"></td>
      </tr>
    </table>
      <!--Pie -->
       <? require_once('../inc/pie.incl');  ?>              
<!--Pie -->
<table align="center" width="990" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td >
	<img src="http://<?=$nombreurl?>/images/body_bottom.png" width="990" height="14" /></td>
  </tr>
</table>
</body>
</html>
