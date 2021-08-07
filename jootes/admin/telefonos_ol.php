<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');
if ($_GET["eliminar"]<>"") {
	$sql2="update audios set estado=0 where  id=".$_GET["eliminar"]; 
	$res2=mysql_query($sql2,$base_fono); 
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
$result = mysql_query("select * from parametros",$base);

while($row=mysql_fetch_array($result))
{
		  $campana=$row['campana'];
		  $directorio=$row['directorio'];
		  $datos=$row['multipunto'];

		  list($ip1_in, $ip2_in, $ip3_in, $ip4_in) =split( '[.]', $row['IP_interna']);
		  list($ip1_out, $ip2_out, $ip3_out, $ip4_out) =split( '[.]', $row['IP_externa']);
		  
}	

$mi_ip = $_SERVER['REMOTE_ADDR']; 
list($ip1, $ip2, $ip3, $ip4) =split( '[.]', $mi_ip);
$inicio=$ip1_in.".".$ip2_in.".".$ip3_in.".";


if ($mi_ip == "200.119.246.138")
			{
				 $IPE=$ip1_in.".".$ip2_in.".".$ip3_in.".".$ip4_in;
			}
			  else
			{
	 			$IPE=$ip1_out.".".$ip2_out.".".$ip3_out.".".$ip4_out;
}



$criterio_txt="todos";
if ($_GET["numero"]<>'') {
	$criterio_txt=$_GET["numero"];
}
if ($_POST["numero"]<>'') {
	$criterio_txt=$_POST["numero"];
}

if ($criterio_txt<>"todos") {
$sql="SELECT * FROM audios where  estado=1  and nombrecampagna='".$campana."' and and tamano>=8 telefono like '%".$criterio_txt."%'";
}else{
$sql="SELECT * FROM audios where  estado=1  and nombrecampagna='".$campana."' and tamano>=8 "; 
}

$res=mysql_query($sql,$base_fono); 
$numeroRegistros=mysql_num_rows($res); 
if($numeroRegistros<=0) 
{ ?>
   	<div align='center'> 
   	<font face='verdana' size='-2'>No se encontraron resultados</font> 
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
echo "<div align='left'>"; 
echo "<font face='verdana' size='-2'>encontrados ".$numeroRegistros." resultados Sondeo Telefónico : <b>".$campana."</b><br>"; 
echo "</font></div>"; 
echo "<hr noshade style='color:CC6666;height:1px'>";
echo "<table width='90%'> ";
$contador=0;
$contador_gral=0;
if ($criterio_txt<>"todos") {
$sql2="SELECT * FROM audios where  estado=1  and nombrecampagna='".$campana."'  and tamano>=8 and telefono like '%".$criterio_txt."%'  order by id desc LIMIT ".$limitInf.",".$tamPag; 
}else{
$sql2="SELECT * FROM audios where  estado=1  and nombrecampagna='".$campana."' and tamano>=8 order by id desc LIMIT ".$limitInf.",".$tamPag; 
}
$gral=mysql_query($sql2,$base_fono);
while($registro=mysql_fetch_array($gral)) 
{ 
	$fecha=substr($registro["fecha"],6,2)."/".substr($registro["fecha"],4,2)."/".substr($registro["fecha"],0,4);
	$hora=substr($registro["hora"],0,2).":".substr($registro["hora"],2,2).":".substr($registro["hora"],4,2);
	$nombrecampagna=$registro["nombrecampagna"];
		$nombre=$registro["nombre"];
		$visitado=$registro["visitado"];
		$str_txt= substr($registro["texto"],0,45);
	$tamano=$registro["tamano"];
	if (substr($registro["telefono"],0,1)<>0)	{
		$telefono=substr($registro["telefono"],0,3)."xxx".substr($registro["telefono"],6,1);
	}else{
		$telefono=substr($registro["telefono"],2,5)."xxx".substr($registro["telefono"],9,1);
	}

	?>  
  <!-- tabla de resultados --> 
   
	<tr> <td align="left" width="36%">
      <a title="<?=$registro["nombrecampagna"]?>" href="http://<?=$nombreurl?>/escuchar.php?id=<?=$registro["id"];?>" rel=shadowbox;width=290;height=260  class="doctos"><?=$telefono?></a>&nbsp;&nbsp;
<object type="application/x-shockwave-flash" data="player_mp3.swf" width="150" height="20">
	<param name="movie" value="player_mp3.swf" />
	<param name="FlashVars" value="mp3=http://audio.opinalo.cl/audios/<?=$nombre?>.mp3&amp;bgcolor1=ffffff&amp;bgcolor2=0a71b3&amp;buttoncolor=#ff0f02&amp;buttonovercolor=0&amp;slidercolor1=ffffff&amp;slidercolor2=ff0f02&amp;sliderovercolor=666666&amp;textcolor=0" />
</object>

	</td>
	<td align="left" width="7%">
      <a title="<?=$registro["nombrecampagna"]?>" href="http://<?=$nombreurl?>/escuchar.php?id=<?=$registro["id"];?>" rel=shadowbox;width=290;height=260  class="doctos"><?=$fecha?></a>
	</td>
	<td align="left" width="7%">
      <a title="<?=$registro["nombrecampagna"]?>" href="http://<?=$nombreurl?>/escuchar.php?id=<?=$registro["id"];?>" rel=shadowbox;width=290;height=260  class="doctos"><?=$hora?></a>
	</td>
	<td align="left" width="40%"><?=$tamano?>Kb  Vistas: <?=$visitado?> <?=$str_txt?>
	</td>
	<td align="left" width="10%">
		<a class="paginar" href="<?=$_SERVER["PHP_SELF"]?>?pagina=<?=$pagina?>&orden=<?=$orden?>&numero=<?=$criterio_txt?>&eliminar=<?=$registro["id"];?>">Eliminar</a>
	</td>
	</tr> 


   <!-- fin tabla resultados --> 
<?	
}//fin while 

	echo "</table>";
}
//echo "</table>"; 

//////////a partir de aqui viene la paginacion 
?> 
   	<br> 
   	<table border="0" cellspacing="0" cellpadding="0" align="center"> 
   	<tr><td align="center" valign="top"> 
<? 
   	if($pagina>1) 
   	{ 
      	 echo "<a class='paginar' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&numero=".$criterio_txt."'>"; 
      	 echo "<font face='verdana' size='-2'>anterior</font>"; 
      	 echo "</a> "; 
   	} 

   	for($i=$inicio;$i<=$final;$i++) 
   	{ 
      	 if($i==$pagina) 
      	 { 
         	 echo "<font face='verdana' size='-2'><b>".$i."</b> </font>"; 
      	 }else{ 
         	 echo "<a class='paginar' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&numero=".$criterio_txt."'>"; 
         	 echo "<font face='verdana' size='-2'>".$i."</font></a> "; 
      	 } 
   	} 
   	if($pagina<$numPags) 
   { 
      	echo " <a class='paginar' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&numero=".$criterio_txt."'>"; 
      	echo "<font face='verdana' size='-2'>siguiente</font></a>"; 
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
