<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');


if ($_POST["descativar"]=="si") {
	$res22=mysql_query("update activaciones set estado='0' where id_sms=". $_POST["apagar"],$base); 
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="mapestilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://<?=$nombreurl?>/scripts/jquery.js"></script>
<script type="text/javascript" src="http://<?=$nombreurl?>/scripts/jquery.clearfield.js"></script>
<!-- script type="text/javascript" src="slide/js/2jquery.js"></script -->
<script type="text/javascript" src="http://<?=$nombreurl?>/slide/js/2scripts.js"></script>

<script type="text/javascript">
<!--
$(document).ready(function() {
	$('.clearField').clearField();
});

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
function refrescar()
{
	window.location.reload();
}
</script>
<script src="http://<?=$nombreurl?>/scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body onload="setTimeout('refrescar()', 5000);">
<div id="nonFooter">
<?  require_once('menu.incl');  ?>

<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="581" rowspan="4" align="center" valign="middle">
	    <span class="arial_light_med">&nbsp;<br /></span>
        <span class="google_fjalla_gde">Reporte de Alarmas Activas</span>
	</td></tr>
</table> 
<!--contenido-->
  	
<?
	
$sql_0="SELECT * FROM activaciones where estado='1'";
$res=mysql_query($sql_0,$base); 
$numeroRegistros=mysql_num_rows($res); 
if($numeroRegistros<=0) 
{ ?>
   	<div align='center'> 
   	<span class="arial_light_med">No se encontraron resultados</span>
   	</div> 
	
<? }else{ ?>
<div align="center"><!-- EMBED SRC="warning1.wav" AUTOSTART=TRUE WIDTH=144 HEIGHT=60></EMBED -->
<script type="text/javascript">
AC_FL_RunContent( 'codebase','http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0','width','62','height','28','src','player','quality','high','wmode','transparent','pluginspage','http://www.macromedia.com/go/getflashplayer','movie','player' ); //end AC code
</script>
<noscript><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="62" height="28">
  <param name="movie" value="player.swf" />
  <param name="quality" value="high" />
  <param name="wmode" value="transparent">
     <embed src="player.swf"
      quality="high"
      type="application/x-shockwave-flash"
      WMODE="transparent"
      width="62"
      height="28"
      pluginspage="http://www.macromedia.com/go/getflashplayer" />
</object>
</noscript>
</div>
<?
   	//////////calculo de elementos necesarios para paginacion 
   	//tamaño de la pagina 
   	$tamPag=25; 

   	//pagina actual si no esta definida y limites 
   	if(!isset($_GET["pagina_reporte"])) 
   	{ 
      	 $pagina_reporte=1; 
      	 $inicio=1; 
      	 $final=$tamPag; 
   	}else{ 
      	 $pagina_reporte = $_GET["pagina_reporte"]; 
   	} 
   	//calculo del limite inferior 
   	$limitInf=($pagina_reporte-1)*$tamPag; 

   	//calculo del numero de paginas 
   	$numPags=ceil($numeroRegistros/$tamPag); 
   	if(!isset($pagina_reporte)) 
   	{ 
      	 $pagina_reporte=1; 
      	 $inicio=1; 
      	 $final=$tamPag; 
   	}else{ 
      	 $seccionActual=intval(($pagina_reporte-1)/$tamPag); 
      	 $inicio=($seccionActual*$tamPag)+1; 

      	 if($pagina_reporte<$numPags) 
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
echo "<div align='left'>"; 
echo "<span class='arial_light_med'>&nbsp; &nbsp; Encontrados ".$numeroRegistros." resultados<br>"; 
echo "</span></div>"; 
?>

<table width="98%" align="center">  
 <tr><td colspan="7"><hr noshade='noshade' /></td></tr>
 <tr class="arial_tit_gris">
        <td width="7%"  align="left" height="47" >Tipo<br>Activacion</td>
        <td width="15%" align="left" height="47">Mensaje del llamado</td>
        <td width="15%" align="left" height="47">Fecha y Hora</td>
        <td width="14%" align="left" height="47">Tel&eacute;fono</td>     
        <td width="14%" align="left" height="47">Destino</td>   		
        <td width="18%" align="left" height="47">Activador</td>    
		<td width="10%" align="left" height="47">Localizaci&oacute;n</td>    
		<td width="7%"  align="left" >Apagar</td>                           
</tr>
<tr><td colspan="7"><hr noshade='noshade' /></td></tr> 
<?
$sql2="SELECT * FROM activaciones where estado='1' ORDER BY id_sms ASC LIMIT ".$limitInf.",".$tamPag; 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) 
{ 
		$id=$registro["id_sms"];
		$remitente = $registro["remitente"];
		$tipo_llamada = $registro["tipo_llamada"];
		$mensaje=$registro["mensaje"];    
		$fecha_hora=$registro["fecha_hora"]; 
		$origen=$registro["origen"]; 
		$destino=$registro["destino"];
		$municipal=$registro["municipal"];
		$lat=str_replace(",",".",$registro["lat"]);
		$lon=str_replace(",",".",$registro["lon"]); 
$sql ="Select * from ejecutivos where id_ejecutiv=" . $registro["id_usuario"];
$res=mysql_query($sql,$base); 
		while($fila=mysql_fetch_array($res))
		{
		  $nombre=$fila['nom_ejecutiv'];
		}

if ($municipal==0) {

	$estilo="arial_light_med_red";
}else{
	$estilo="arial_light_med";
}

?>
  <!-- tabla de resultados rel=shadowbox;width=700;height=500  --> 
 
 <tr>
                <td width="7%"  align="left" class="<?=$estilo?>" height=15>
                <span class="arial_10_33"><?=$tipo_llamada?></span></td>
                <td width="15%"  align="left" class="<?=$estilo?>"><?=$mensaje?></td>
                <td width="15%"  align="left" class="<?=$estilo?>"><?=$fecha_hora?></td>
                <td width="14%"  align="left" class="<?=$estilo?>"><?=$origen?></td>  
				<td width="14%"  align="left" class="<?=$estilo?>"><?=$destino?></td>     
                <td width="18%"  align="left" class="<?=$estilo?>"><?=$nombre?></td>
				<td width="10%"  align="left" class="<?=$estilo?>">
				<a href="http://<?=$nombreurl?>/monitor/alarmdetalle.php?lon=<?=$lon?>&lat=<?=$lat?>" target=_self >
				<img src="http://<?=$nombreurl?>/images/mytracks_icon.png" width="45" height="45" border="0" /></a></td>   
				 
				<td width="7%"  align="left" class="arial_10_33">
<FORM language=javascript name="<?=$id?>" id="<?=$id?>" action="alarmas.php" method="post" target="_self">
<input  type="hidden" name="descativar" value="si" size="28" >
<input type="hidden" name="apagar" value="<?=$id?>">
<input  type="submit" name="envia" value="Apagar" width="66" height="23" class="rojo_sombra_ch">
</form>
</td>
         
</tr>

    
   <!-- fin tabla resultados --> 
<?	
}//fin while ?>

<tr><td colspan="7">

<? if ($contador_gral<$tamPag and $contador<>0) {
	echo "</tr> </table>";
}
//echo "</table>"; 
}//fin if 
//////////a partir de aqui viene la paginacion 
?> 
   	<br> 
   	<table border="0" cellspacing="0" cellpadding="0" align="center"> 
   	<tr><td align="center" valign="middle"> 
<? 
   	if($pagina_reporte>1) 
   	{ 
      	 echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina_reporte=".($pagina_reporte-1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
      	 echo "<strong class='arial_cuerpo_gris'>Anterior </strong>"; 
      	 echo "</a> "; 
   	} 

   	for($i=$inicio;$i<=$final;$i++) 
   	{ 
      	 if($i==$pagina_reporte) 
      	 { 
         	 echo "<strong class='arial_cuerpo_gris'>".$i." </strong>"; 
      	 }else{ 
         	 echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina_reporte=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
         	 echo "<strong class='arial_cuerpo_gris'>".$i." </strong></a> "; 
      	 } 
   	} 
   	if($pagina_reporte<$numPags) 
   { 
      	echo " <a class='p' href='".$_SERVER["PHP_SELF"]."?pagina_reporte=".($pagina_reporte+1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
      	echo "<strong class='arial_cuerpo_gris'> Siguiente</strong></a>"; 
   } 
//////////fin de la paginacion 
?> 
   	</td></tr>
	
   	</table>
</td></tr> 
<tr><td colspan="7"><hr noshade='noshade' /></td></tr>   
</table>    
    
    

    <!--contenido-->   
<!-- PIE  -->
<!--Tabla de margen frente al footer -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td height="70">&nbsp;</td></tr>
</table>
<!--Fin de la Tabla de margen frente al footer -->

</div> 

<!-- Footer, debe estar dentro del Div-->
<div id="Footer">
<?  require_once('../inc/pie2.incl');  ?> 
</div>

<!-- Fin del Footer-->
</body>

</html>