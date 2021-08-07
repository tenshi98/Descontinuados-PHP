<?php


require_once('../nombre_pag.php');
require_once('../conexion.php');

?>


<html xmlns="http://www.w3.org/1999/xhtml">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="../estilo.css" rel="stylesheet" type="text/css" />
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
</head>
<body >
<?


list($tipo,$video) = split('-',$_GET["id"]);


	$sql_videosdh="SELECT * FROM videos_correos where nombre_video='".$video."'";
	$res=mysql_query($sql_videosdh,$base); 
	while($registro=mysql_fetch_array($res)) 
	{ 
		$nombre_video=$registro['nombre_video'];
		$destino=$registro['destino'];
		$asunto=$registro['asunto'];
		$tipo_video=$registro['tipo_video'];
		$visitas=$registro['visitas'];
		$visitas=$visitas+1;
		$sql_visitas="update videos_correos set visitas=". $visitas ." where nombre_video='".$video."'";
		$res_visitas=mysql_query($sql_visitas,$base); 
	}
	$result = mysql_query("select * from parametros",$base);
	while($row=mysql_fetch_array($result))
	{
	 if ($destino=='SWITCH') {
		$datos=$row['donde_graba'];
	 }else{
		$datos=$row['donde'];
	 }
	}

 
$mystring = $_SERVER['HTTP_REFERER'];
$findme   = 'personas';
$pos = strpos($mystring, $findme);

// Nótese el uso de ===. Puesto que == simple no funcionará como se espera
// porque la posición de 'a' está en el 1° (primer) caracter.
if ($pos === false) {
   // require_once('../inc/cabecera.incl'); 
} else {
	//require_once('../inc/cabecera_in.incl'); 
}
   
?>  

<table background="http://<?=$nombreurl?>/images/body_body.png" align="center" width="990" border="0" cellspacing="0" cellpadding="0">
             <?
				// VER MAS desde RECOMIENDO
				if ($tipo<>"004") {?>
			  <tr>
                <td align="center" valign="middle" >
				<!-- CABECERA -->	
	<?  require_once('../inc/cabecera_login.incl'); ?>  
	  
<!-- CABECERA --></td>
              </tr>
			  <?}?>
              <tr>
                <td align="center" valign="middle" height="30">&nbsp;</td>
              </tr>
  <tr>
    <td align="center" valign="top">
	

   <!--CONTENIDO-->    
    
    
 <table width="55" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td align="center" valign="middle" height="35">
				<?
				// VER MAS desde RECOMIENDO
				if ($tipo=="001") {?>
<a href="http://<?=$nombreurl?>/publicos.php" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Imagen22','','http://<?=$nombreurl?>/images/vermas_bot_up.jpg',1)" ><img src="http://<?=$nombreurl?>/images/vermas_bot.jpg" name="Imagen22"  border="0" class="margen1" id="Imagen22" /></a>
				<?}else{?>

<a href="javascript:history.back(-1);"   onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Imagen22','','http://<?=$nombreurl?>/images/volver_bot_up.jpg',1)" ><img src="http://<?=$nombreurl?>/images/volver_bot.jpg" name="Imagen22"  border="0" class="margen1" id="Imagen22" /></a>

				<?}?>			
				
				
				</td>
              </tr>
            </table>
              <table width="692" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>


<div id="intro">
<div id="mediaplayer"></div>
<script src="http://<?=$nombreurl?>/television/js/jwplayer.js"></script>
<?
$infor=$datos.$nombre_video.".flv";				
				?>
					<script type="text/javascript"> 
						jwplayer("mediaplayer").setup({ 
						flashplayer: "http://<?=$nombreurl?>/television/player.swf", 
						bufferlength: 5,
						autostart: false,
						image: "http://<?=$nombreurl?>/fotos_video/<?=$nombre_video?>.jpg",
						file: "<?=$infor?>",
						skin: "http://<?=$nombreurl?>/television/glow.zip",
								width: 692,
								height: 390,
		plugins: "http://<?=$nombreurl?>/television/js/adawe.swf",
		"adawe.type": "link",
		"adawe.banner": "<?=$ubicacion_flash?>",
		"adawe.link": "<?=$link_banner?>",
		"adawe.banneranimation":"none",
		"adawe.bannery": '<?=$alto_banner?>',
		"adawe.bannerx": '<?=$ancho_banner?>',
		modes: [
			{ type: "flash", src: "http://<?=$nombreurl?>/television/js/player.swf" },
			{ type: "html5" }
		]
						}); 
					</script> 
					</div>

			
					



</td>
                </tr>
                <tr>
                  <td height="10"></td>
                </tr>
                <tr>
                  <td><table width="693" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="670" align="left" valign="top" class="arial_tit_gris2"><span class="arial_tit_gris11"><?=$asunto?></span> </td>
                    </tr>
                    <tr>
                      <td height="10"></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td>
				  <table width="690" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="690">

					  <a href="http://<?=$nombreurl?>/recomendar/texto.php?video=<?=$_GET["video"]?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Imagen22','','http://<?=$nombreurl?>/images/reenvia_video_txt_up.jpg',1)"  rel=shadowbox;width=620;height=500><img src="http://<?=$nombreurl?>/images/reenvia_video_txt.jpg" name="Imagen22" width="230" height="33" border="0" class="margen1" id="Imagen22" /></a><a href="http://<?=$nombreurl?>/recomendar/index.php?video=<?=$_GET["video"]?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Imagen23','','http://<?=$nombreurl?>/images/reenvia_video_mail_up.jpg',1)"  rel=shadowbox;width=620;height=500><img src="http://<?=$nombreurl?>/images/reenvia_video_mail.jpg" name="Imagen23" width="230" height="33" border="0" class="margen1" id="Imagen23" /></a><a href="http://<?=$webcandidato?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Imagen24','','http://<?=$nombreurl?>/images/visita_mi_web_up.jpg',1)" target=_blank><img src="http://<?=$nombreurl?>/images/visita_mi_web.jpg" name="Imagen24" width="230" height="33" border="0" id="Imagen24" /></a>
					  </td>

                      </tr>
					  <tr>
					                        <td align=left width="690" class="arial_tit_gris13">Visto: <?=$visitas?></td>
					  </tr>
                    <tr>
                      <td height="5" ></td>
                      </tr>
                    </table>

                    <table width="690" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="127" height="30" align="left" valign="middle" class="arial_tit_gris13">Comentarios</td>
                        <td width="563" align="left" valign="middle" class="arial_tit_gris13">&nbsp;</td>
                      </tr>
                      </table>
					  
					  </td>
                </tr>
                <tr>
                  <td>
				  
				  
<br>
<div align=left>
<div class="fb-like" data-href="http://<?=$urlcorta?>/<?=$_GET["video"]?>" data-send="true" data-width="692" ></div><br>
</div>
		<!--Comentarios Facebook -->
				<fb:comments href="http://<?=$urlcorta?>/<?=$_GET["video"]?>" data-num-posts="2" data-width="692" ></fb:comments>
		<!--Comentarios Facebook -->





</td>
                </tr>
              </table>












    <!--CONTENIDO-->    
 			
</td>
  </tr>
</table>
<table background="http://<?=$nombreurl?>/images/body_body.png" align="center" width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center" valign="top">
	<table width="990" border="0" cellspacing="0" cellpadding="0">
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
