<?php
session_start();
require_once('../nombre_pag.php');
require_once('../conexion.php');

if ($_POST["modifica"] == "modifica") {

	$sql="update dh_videos_correos set asunto='".$_POST["asunto"]."',mensaje='".$_POST["mensaje"]."' where id_orden=".$_POST["video_busca"]; 
	$res=mysql_query($sql,$base); 

if ($_POST["elimina"] == "Eliminar") {
	$sql="update dh_videos_correos set estado='0' where id_orden=".$_POST["video_busca"]; 
	$res=mysql_query($sql,$base); 
}
	
}



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




<?
if ($_GET["opt"]<>"todos") {
	$sql="SELECT * FROM dh_tipo_video where estado=1 and id_tipo=".$_GET["opt"]; 
	$res=mysql_query($sql,$base); 
	while($registro=mysql_fetch_array($res)) 
	{ 
		$sql0="SELECT * FROM dh_videos_correos where estado=1 and tipo_video=".$_GET["opt"]; 
		$quevideo=$registro["descripcion"];
	}
}else{
	$sql0="SELECT * FROM dh_videos_correos"; 
	$quevideo="Todos Los Videos";
}

$res=mysql_query($sql0,$base); 
$numeroRegistros=mysql_num_rows($res); 
if($numeroRegistros<=0) 
{ ?>
   	<div align='center'> <br><br><br>
   	<span class="arial_tit_gris13">No se encontraron resultados para <?=$quevideo?></span> 
   	</div> 
	
<?}else{ 

   	//////////calculo de elementos necesarios para paginacion 
   	//tamaño de la pagina 
   	$tamPag=20; 

   	//pagina actual si no esta definida y limites 
   	if(!isset($_GET["pagina"])) 
   	{ 
      	 $pagina=1; 
      	 $inicio=1; 
      	 $final=$tamPag; 
   	}else{ 
      	 $pagina = $_GET["pagina"]; 
   	} 
   	//calculo del limite inferior 
   	$limitInf=($pagina-1)*$tamPag; 

   	//calculo del numero de paginas 
   	$numPags=ceil($numeroRegistros/$tamPag); 
   	if(!isset($pagina)) 
   	{ 
      	 $pagina=1; 
      	 $inicio=1; 
      	 $final=$tamPag; 
   	}else{ 
      	 $seccionActual=intval(($pagina-1)/$tamPag); 
      	 $inicio=($seccionActual*$tamPag)+1; 

      	 if($pagina<$numPags) 
      	 { 
         	 $final=$inicio+$tamPag-1; 
      	 }else{ 
         	 $final=$numPags; 
      	 } 

       if ($final>$numPags){ 
          $final=$numPags; 
      	 } 
   	} 

//////////fin de dicho calculo 

//////////creacion de la consulta con limites 
 

//////////fin consulta con limites 
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
     <tr>
      <td width="100$" height="30" align="left" valign="middle" class="arial_tit_gris13"><?=$quevideo?>, encontrados <?=$numeroRegistros?> resultados (Las modificaciones se deben efectuar a cada uno y presionar modificar)</td>
    </tr>
</table> 
<?
$contador=0;
$contador_gral=0;
if ($_GET["opt"]<>"todos") {
	$sql2="SELECT * FROM dh_videos_correos  where estado=1 and tipo_video=".$_GET["opt"]." order by id_orden desc LIMIT ".$limitInf.",".$tamPag; 
}else{
	$sql2="SELECT * FROM dh_videos_correos where estado=1 order by id_orden desc LIMIT ".$limitInf.",".$tamPag; 
}

$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) 
{ 
	$nombre_video=$registro["nombre_video"];
	$nombre= $registro["nombre"];
	$origen=$registro["origen"];

	if ($contador==0) {?> 
		<table> <tr>  
	<?}
	$contador= $contador +1;
	$contador_gral= $contador_gral +1;
	?>  
  <!-- tabla de resultados --> 
   
	<td>
<FORM language=javascript name="<?=$nombre_video?>" id="<?=$nombre_video?>" action="<?=$_SERVER["PHP_SELF"]?>?pagina=<?=$pagina?>&opt=<?=$_GET["opt"]?>" method="post" target="_self"> 
<input type="hidden" name="modifica" value="modifica">
<input type="hidden" name="video_busca" value="<?=$registro["id_orden"]?>">
							  <table width="400" border="0" cellpadding="0" cellspacing="0" class="borde_gris_margin">
                                <tr>
                                  <td width="82" rowspan="3" align="left" valign="top">                 
									<img src="http://<?=$nombreurl?>/fotos_video/<?=$nombre_video?>.jpg" width="82" height="82" class="margen2" border=0 /></td>
                                  <td height="20" width="312" align="left" valign="top" colspan="2">
								  <input type="text" name="asunto" value="<?=$registro["asunto"]?>" size="50" ></td>
                                </tr>
                                <tr>
                                  <td height="42" width="312" align="left" valign="top" colspan="2">
								  <input type="text" name="mensaje" value="<?=$registro["mensaje"]?>" size="50" ></td>
                                </tr>

                                <tr>
                                  <td width="41" align="center" valign="top">
	<TABLE>
	<TR>
		<TD width=10%><input name="submit" type="submit" value="Modificar" class='button4' size="50" ></TD>
	</TR>
	</TABLE>
	</td>
                                  <td width="41" align="center" valign="top">	
								  <TABLE>
									<TR>
										<TD width=10%><input name="elimina" type="submit" value="Eliminar" class='button5' size="50" ></TD>
									</TR>
								</TABLE>
								</td>
                                </tr>
                              </table>

	</form>
	</td>
	<?if ($contador==2) {
		$contador=0;
	?> 

                            </tr>
                          </table>
   <!-- fin tabla resultados --> 
<?	}
}//fin while 

if ($contador_gral<$tamPag and $contador<>0) {
	echo "</tr> </table>";
}
//echo "</table>"; 
}//fin if 
//////////a partir de aqui viene la paginacion 
?> 
   	<br> 
   	<table border="0" cellspacing="0" cellpadding="0" align="center" class="arial_tit_gris2"> 
   	<tr><td align="center" valign="top"> 
<? 
   	if($pagina>1) 
   	{ 
      	 echo "<a class='button_horizontal_black' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&criterio=".$txt_criterio."&opt=".$_GET["opt"]."'>"; 
      	 echo "<span class=button_horizontal_black>anterior</span>"; 
      	 echo "</a> "; 
   	} 

   	for($i=$inicio;$i<=$final;$i++) 
   	{ 
      	 if($i==$pagina) 
      	 { 
         	 echo "<span class=button_horizontal_black><b>".$i."</b> </span>"; 
      	 }else{ 
         	 echo "<a class='button_horizontal_black' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&criterio=".$txt_criterio."&opt=".$_GET["opt"]."'>";  
         	 echo "<span class=button_horizontal_black>".$i."</span></a> "; 
      	 } 
   	} 
   	if($pagina<$numPags) 
   { 
      	echo " <a class='button_horizontal_black' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&criterio=".$txt_criterio."&opt=".$_GET["opt"]."'>";  
      	echo "<span class=button_horizontal_black>siguiente</span></a>"; 
   } 
//////////fin de la paginacion 
?> 
   	</td></tr> 
   	</table> 
<hr noshade style="color:CC6666;height:1px"> 



<!-- CONTENIDO -->
</td>
</tr>

</table>
<!--Pie -->			
			
			
		<?  require_once('../inc/pie.incl'); ?>  	
			
			
			
<!-- Pie -->
</body>
</html>
