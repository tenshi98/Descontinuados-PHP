<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once('../nombre_pag.php');
require_once('../conexion.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


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

<body>
<div id="nonFooter" width="100%">
  <table bgcolor="#999999" width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td align="center" valign="middle">
	
	<table width="990" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="58%" align="center" valign="middle" class="google_fjalla_bco"><table border="0" cellpadding="0" cellspacing="0" class="logo_flot">
          <tr>
            <td><img src="../images/logo.png" /></td>
          </tr>
        </table>
         </td>
      </tr>
    </table></td>
    </tr>
</table>

                          <table width="100%" border="0" cellpadding="0" cellspacing="0" height=100>
                            <tr>
                              <td height="40" align="right"><br><br><input name="button5" type="submit" class="bot_rojo_gde" id="button5" onclick="javascript:window.location.href='http://<?=$nombreurl?>/reportes/index.php';" value="Inicio" /></td>
                              </tr>
                          </table>
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="50" align="center" valign="middle">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">
              <tr>
                <td>
				
<!-- CONTENIDO -->				
				


<?
if ($_GET["id_mensaje"]<>'') {
$mensaje=$_GET["id_mensaje"];
}else{
$mensaje=$_POST["id_mensaje"];
}


$Fecha=getdate(); 

$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes < 10) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia < 10) {
	$diadis="0".$Dia;
}else{
	$diadis=$Dia;
}
$fecha=$Anio.$mesdis.$diadis;


$sql="SELECT * FROM visitas where id_mensaje=". $mensaje;

$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 
if($numeroRegistros<=0) 
{ ?>
            <tr>
              <td ><span class="goole_1_rojo_ch">No se encontraron resultados</span></td>
              </tr>
			              <tr>
              <td height="10"></td>
              </tr>
	

	
<?}else{ 

   	//////////calculo de elementos necesarios para paginacion 
   	//tamaño de la pagina 
   	$tamPag=25; 

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

            <tr>
              <td ><span class="goole_1_rojo_ch">Registros (<?=$numeroRegistros?>)</span></td>
              </tr>
			              <tr>
              <td height="10"></td>
              </tr>
          <tr>
            <td align="center" valign="middle">
			

			<table width="942" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th class="top_tabla_red" scope="col">Nombre</th>
                <th class="top_tabla_red" scope="col">Fecha/Hora (Click)</th>
                <th class="top_tabla_red" scope="col">Edad</th>
                <th class="top_tabla_red" scope="col">Ciudad</th>
				<th class="top_tabla_red" scope="col">Ubicacion</th>
				<th class="top_tabla_red" scope="col">informacion</th>
              </tr>
<?$contador=0;
$contador_gral=0;

$sql2="SELECT * FROM visitas where  id_mensaje=". $mensaje ." ORDER BY id DESC LIMIT ".$limitInf.",".$tamPag; 

$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) 
{ 

$fecha_hora=$registro["fecha_hora"];

$sql="SELECT * FROM ejecutivos where imei='". $registro["login"]."'";
$gral2=mysql_query($sql,$base); 
while($ejecutivos=mysql_fetch_array($gral2)) 
{ 
	$rut=$ejecutivos["rut"];
	$codigo=$ejecutivos["gcmcode"];
	$nombre=$ejecutivos["nom_ejecutiv"];
	if ($ejecutivos["fecha_nacimiento"]<>''){
	$ano=substr($ejecutivos["fecha_nacimiento"],0,4);
	$ano=(int)$Anio-(int)$ano;
	}else{
	$ano="N/A";
	}	
		$ciudad=$ejecutivos["ciudad_ejecutiv"];

}


	$lat=0;
	$lon=0;

$sql2="SELECT * FROM visitas where gcmcode='". $codigo."' and id_mensaje=". $mensaje;
$gral22=mysql_query($sql2,$base); 
while($ejecutivos2=mysql_fetch_array($gral22)) 
{ 

	$lat=$ejecutivos2["lat"];
	$lon=$ejecutivos2["lon"];
}

?>  
  <!-- tabla de resultados --> 






              <tr>
                <td class="celda_reporte"><?=$nombre?></td>
                <td class="celda_reporte"><?=$fecha_hora?></td>
                <td class="celda_reporte"><?=$ano?></td>
                <td class="celda_reporte"><?=$ciudad?></td>
<td class="celda_reporte" align=center>
<?if ($lon<>0) {?>
<a href="http://<?=$nombreurl?>/reportes/donde.php?lon=<?=$lon?>&lat=<?=$lat?>" target=_self >
				<img src="http://<?=$nombreurl?>/images/mytracks_icon.png" width="45" height="45" border="0" /></a>
<?}?></td>
<td class="celda_reporte" align=center>
<?if ($lon<>0) {?>
<input type=image src="http://<?=$nombreurl?>/images/informado.png" 
onclick="window.open('http://<?=$nombreurl?>/reportes/detalle_rut2.php?rutpersona=<?=$rut?>', 'Consulta', 'width=1050,height=700,scrollbars=1'); return false;" />
<?}?></td>
              </tr>
         



<?}?>
          </table>


   <!-- fin tabla resultados --> 
<?	
}?> 
   	<br> 
   	<table border="0" cellspacing="0" cellpadding="0" align="center"> 
   	<tr><td align="center" valign="top"> 
<? 
   	if($pagina>1) 
   	{ 
      	 echo "<a class='paginar' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
      	 echo "<font face='verdana' size='-2'>anterior</font>"; 
      	 echo "</a> "; 
   	} 

   	for($i=$inicio;$i<=$final;$i++) 
   	{ 
      	 if($i==$pagina) 
      	 { 
         	 echo "<font face='verdana' size='-2'><b>".$i."</b> </font>"; 
      	 }else{ 
         	 echo "<a class='paginar' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
         	 echo "<font face='verdana' size='-2'>".$i."</font></a> "; 
      	 } 
   	} 
   	if($pagina<$numPags) 
   { 
      	echo " <a class='paginar' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&criterio=".$txt_criterio."'>"; 
      	echo "<font face='verdana' size='-2'>siguiente</font></a>"; 
   } 
//////////fin de la paginacion 
?> 
   	</td></tr> 
   	</table> 
	  <table width='600'>
  <tr>
    <td height="20" align="center" valign="bottom" bgcolor="#FFFFFF"><img src="http://<?=$nombreurl?>/images/div_gris_3.png" width="620" height="3" /></td>
  </tr>
  </table>



<!-- CONTENIDO -->
</td>
            </tr>
          </table></td>
            </tr>
          </table>
</td>
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

<div align=center>
  <!-- PIE -->

<?   
    require_once('../inc/pie.incl');  
?>  

  <!-- PIE -->
</div> 


</body>
</html>
