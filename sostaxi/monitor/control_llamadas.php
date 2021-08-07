<?php
session_start();
require_once('../nombre_pag.php');
require_once('../conexion.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />

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
</script>
</head>

<body>

<table align="center" width="1050" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="234" height="40" align="center" valign="bottom">
	<img src="http://<?=$nombreurl?>/images/top_logo_ch.png" width="234" height="40" /></td>
    <td background="http://<?=$nombreurl?>/images/linea_dot.png" width="1" rowspan="5" align="center" valign="bottom"></td>

  </tr>
  <tr>
    <td align="center" valign="top">
	<img src="http://<?=$nombreurl?>/images/botton_logo_ch.png" width="234" height="85" /></td>
    <td width="581" rowspan="4" align="center" valign="top">
  
 <!--contenido-->


     <table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><span class="titulo_rojo_ppal_gd">Reporte de Llamadas</span></td>
        </tr>
      <tr>
	        <tr>
        <td>&nbsp;</td>
        </tr>

    </table>
<?
	
$sql_0="SELECT * FROM activaciones where estado='1'";
$res=mysql_query($sql_0,$base); 
$numeroRegistros=mysql_num_rows($res); 
if($numeroRegistros<=0) 
{ ?>
   	<div align='center'> 
   	<font face='verdana' size='-2'>No se encontraron resultados</font> 
   	</div> 
	
<?}else{ 

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
echo "<font face='verdana' size='-2'>encontrados ".$numeroRegistros." resultados<br>"; 
echo "</font></div>"; 
echo "<hr noshade style='color:CC6666;height:1px'>";
?>

<table width="100%" >  
 <tr>
                <td width="7%"  align="left" class="tabla_reportes" height="47" ><span class="arial_10_33"> Sistema </span></td>
                <td width="46%"  align="left" class="arial_10_neg_bold" height="47"><p>Mensaje
          del llamado</p></td>
                <td width="15%"  align="left" class="arial_10_neg_bold" height="47">Fecha y Hora</td>
                <td width="14%"  align="left" class="arial_10_neg_bold" height="47">
				Telefono</td>                                
                <td width="18%"  align="left" class="arial_10_neg_bold" height="47">
				Activador</td>                                
 
                              
</tr>
<?
$sql2="SELECT * FROM activaciones where estado='1' ORDER BY id_sms ASC LIMIT ".$limitInf.",".$tamPag; 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) 
{ 

		$remitente = $registro["remitente"];
		$mensaje=$registro["mensaje"];    
		$fecha_hora=$registro["fecha_hora"]; 
		$origen=$registro["origen"]; 
$sql ="Select * from ejecutivos where id_ejecutiv=" . $registro["id_usuario"];
$res=mysql_query($sql,$base); 
		while($fila=mysql_fetch_array($res))
		{
		  $nombre=$fila['nom_ejecutiv'];
		}
?>
  <!-- tabla de resultados --> 
   
 <tr>
                <td width="7%"  align="left" class="tabla_reportes" height=15>
                <span class="arial_10_33"><?=$remitente?></span></td>
                <td width="46%"  align="left" class="arial_10_33"><?=$mensaje?></td>
                <td width="15%"  align="left" class="arial_10_33"><?=$fecha_hora?></td>
                <td width="14%"  align="left" class="arial_10_33"><?=$origen?></td>                                   
                <td width="18%"  align="left" class="arial_10_33"><?=$nombre?></td>                                   
         
</tr>

    
   <!-- fin tabla resultados --> 
<?	
}//fin while ?>
 </table>
<?if ($contador_gral<$tamPag and $contador<>0) {
	echo "</tr> </table>";
}
//echo "</table>"; 
}//fin if 
//////////a partir de aqui viene la paginacion 
?> 
   	<br> 
   	<table border="0" cellspacing="0" cellpadding="0" align="center"> 
   	<tr><td align="center" valign="top"> 
<? 
   	if($pagina_reporte>1) 
   	{ 
      	 echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina_reporte=".($pagina_reporte-1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
      	 echo "<font face='verdana' size='-2'>anterior</font>"; 
      	 echo "</a> "; 
   	} 

   	for($i=$inicio;$i<=$final;$i++) 
   	{ 
      	 if($i==$pagina_reporte) 
      	 { 
         	 echo "<font face='verdana' size='-2'><b>".$i."</b> </font>"; 
      	 }else{ 
         	 echo "<a class='p' href='".$_SERVER["PHP_SELF"]."?pagina_reporte=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
         	 echo "<font face='verdana' size='-2'>".$i."</font></a> "; 
      	 } 
   	} 
   	if($pagina_reporte<$numPags) 
   { 
      	echo " <a class='p' href='".$_SERVER["PHP_SELF"]."?pagina_reporte=".($pagina_reporte+1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
      	echo "<font face='verdana' size='-2'>siguiente</font></a>"; 
   } 
//////////fin de la paginacion 
?> 
   	</td></tr> 
   	</table> 
<hr noshade style="color:CC6666;height:1px">   
    
    
    
    
    
    
    
    <!--contenido-->   

    
    
    </td>
  </tr>

 
</table>

 <!-- PIE  -->
 	        <?   
    require_once('../inc/pie.incl');  
?>
  
 <!-- PIE  -->
</body>

</html>