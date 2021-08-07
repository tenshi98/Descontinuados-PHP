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




</head >

<body>
<div id="nonFooter" width="90%">


                          <table width="100%" border="0" cellpadding="0" cellspacing="0" height=50>
                            <tr>
                              <td height="25" align="right">
							  <input type="submit" class="rojo_sombra" value="&laquo; Cerrar" onclick="javascript:window.close();"/>
						</td>
                              </tr>
                          </table>

		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="50" align="center" valign="middle">
			<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">
              <tr>
                <td>
				
<!-- CONTENIDO -->				
<?



if ($_GET["rutpersona"]<>'') {
	$rutoriginal=$_GET['rutpersona'];
	$rutpersona=$_GET['rutpersona'];
}else{
	$rutoriginal=$_POST['rutpersona'];
	$rutpersona=$_POST['rutpersona'];
}
	$sql_padron= "SELECT NOMBRE,SEX,DOMICILIO,Comuna,fono_celular,domicilio_2,comuna_2,correo FROM padron_electoral_CL where rut_compara='".$rutpersona."'";
	$res_padron=mysql_query($sql_padron,$base_padron); 

while($datos_padron=mysql_fetch_array($res_padron)) 
{ 
$NOMBRE=$datos_padron["NOMBRE"];
	$SEX=$datos_padron["SEX"];
	$DOMICILIO=$datos_padron["DOMICILIO"];
	$Comuna=$datos_padron["Comuna"];
	$fono_celular=$datos_padron["fono_celular"];
	$domicilio_2=$datos_padron["domicilio_2"];
	$comuna_2=$datos_padron["comuna_2"];
	$correo=$datos_padron["correo"];

}

?>				
            <tr>
              <td >
   <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
			<tr>
            <td width="20%" height="20" align="left"><span class="arial_light_med">Nombre</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$NOMBRE?></span></td>
             </tr>
			<tr>
            <td width="20%" height="20" align="left"><span class="arial_light_med">Sexo</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$SEX?></span></td>
             </tr>
			<tr>
            <td width="20%" height="20" align="left"><span class="arial_light_med">Direccion de Votacion</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$DOMICILIO?></span></td>
             </tr>		
			<tr>
            <td width="20%" height="20" align="left"><span class="arial_light_med">Comuna de Votacion</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$Comuna?></span></td>
             </tr>		
			<tr>
            <td width="20%" height="20" align="left"><span class="arial_light_med">Numero de Celular</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$fono_celular?></span></td>
             </tr>			 
			<tr>
            <td width="20%" height="20" align="left"><span class="arial_light_med">Direccion</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$domicilio_2?></span></td>
             </tr>		
			<tr>
            <td width="20%" height="20" align="left"><span class="arial_light_med">Comuna</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$comuna_2?></span></td>
             </tr>	
			<tr>
            <td width="20%" height="20" align="left"><span class="arial_light_med">E-mail</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$correo?></span></td>
             </tr>
			<tr>
            <td width="20%" height="20" align="left"></td>
            <td width="80%" align="center"><span class="arial_light_med">VEHICULOS</span></td>
             </tr>
			<tr>
            <td width="20%" height="20" align="left"></td>
            <td width="80%" align="left"> 
			  <table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
           <td width="20%" height="20" align="left"><span class="arial_light_med">TIPO</span></td>
           <td width="20%" height="20" align="left"><span class="arial_light_med">MARCA</span></td>
		   <td width="20%" height="20" align="left"><span class="arial_light_med">MODELO</span></td>
		   <td width="20%" height="20" align="left"><span class="arial_light_med">A&Ntilde;O</span></td>
		   <td width="20%" height="20" align="left"><span class="arial_light_med">PATENTE</span></td>
			</tr>
<?
	$sql_padron= "SELECT PPU,MARCA,MODELO,TIPO,ANO FROM parque_automotriz where rut_comparador='".$rutpersona."'";
	$res_padron=mysql_query($sql_padron,$base_padron); 

while($datos_padron=mysql_fetch_array($res_padron)) 
{ 
?>
			<tr>
           <td width="20%" height="20" align="left"><span class="arial_gris_med"><?=$datos_padron["TIPO"]?></span></td>
           <td width="20%" height="20" align="left"><span class="arial_gris_med"><?=$datos_padron["MARCA"]?></span></td>
		   <td width="20%" height="20" align="left"><span class="arial_gris_med"><?=$datos_padron["MODELO"]?></span></td>
		   <td width="20%" height="20" align="left"><span class="arial_gris_med"><?=$datos_padron["ANO"]?></span></td>
		   <td width="20%" height="20" align="left"><span class="arial_gris_med"><?=$datos_padron["PPU"]?></span></td>
             </tr>
<?}?>			
			
			
		
</table>
						  
						  </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table>



			  </td>
              </tr>
			  <tr>
              <td height="10"></td>
              </tr>

<?


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



	$sql= "SELECT * FROM preferencias where rut_compara='".$rutpersona."'";



$res=mysql_query($sql,$base_padron); 
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
                <th class="top_tabla_red" scope="col">Item</th>
                <th class="top_tabla_red" scope="col">Categoria</th>
                <th class="top_tabla_red" scope="col">Subcategoria</th>
				<th class="top_tabla_red" scope="col">Ciudad</th>
              </tr>
<?$contador=0;
$contador_gral=0;



$sql2= $sql." ORDER BY fecha DESC LIMIT ".$limitInf.",".$tamPag; 

$gral=mysql_query($sql2,$base_padron);
while($registro=mysql_fetch_array($gral)) 
{ 

$fecha_hora=$registro["fecha"];
$item=$registro["item"];
$subcategoria=$registro["subcategoria"];
$descripcion_categoria="todas";
$descripcion_subcategoria="todas";
$sql="SELECT * FROM preferencias_categorias where id_categoria=". $registro["categoria"];
$gral2=mysql_query($sql,$base_padron); 
while($preferencias_categoria=mysql_fetch_array($gral2)) 
{ 
	$descripcion_categoria=$preferencias_categoria["descripcion"];
}

$sql="SELECT * FROM preferencias_subcategoria where id_subcategoria=". $registro["subcategoria"];
$gral2=mysql_query($sql,$base_padron); 
while($preferencias_subcategoria=mysql_fetch_array($gral2)) 
{ 
	$descripcion_subcategoria=$preferencias_subcategoria["descripcion"];
}
$sql="SELECT * FROM ejecutivos where rut='". $registro["rut_compara"]."'";
$gral2=mysql_query($sql,$base); 
while($ejecutivos=mysql_fetch_array($gral2)) 
{ 
	$codigo=$ejecutivos["gcmcode"];
	$nombre=$ejecutivos["nom_ejecutiv"];
	$ciudad=$ejecutivos["ciudad_ejecutiv"];

}


	

?>  
  <!-- tabla de resultados --> 






              <tr height=25>
                <td class="celda_reporte"><?=$nombre?></td>
                <td class="celda_reporte"><?=$fecha_hora?></td>
                <td class="celda_reporte"><?=$item?></td>
                <td class="celda_reporte"><?=$descripcion_categoria?></td>
                <td class="celda_reporte"><?=$descripcion_subcategoria?></td>
                <td class="celda_reporte"><?=$ciudad?></td>
<!--td class="celda_reporte" align=center>
<?if ($lon<>0) {?>
<a href="http://<?=$nombreurl?>/reportes/donde.php?lon=<?=$lon?>&lat=<?=$lat?>" target=_self >
				<img src="http://<?=$nombreurl?>/images/mytracks_icon.png" width="45" height="45" border="0" /></a>
<?}?></td-->
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
      	 echo "<a class='paginar' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina-1)."&orden=".$orden."&rutpersona=".$rutoriginal."'>"; 
      	 echo "<font face='verdana' size='-2'>anterior</font>"; 
      	 echo "</a> "; 
   	} 

   	for($i=$inicio;$i<=$final;$i++) 
   	{ 
      	 if($i==$pagina) 
      	 { 
         	 echo "<font face='verdana' size='-2'><b>".$i."</b> </font>"; 
      	 }else{ 
         	 echo "<a class='paginar' href='".$_SERVER["PHP_SELF"]."?pagina=".$i."&orden=".$orden."&criterio=".$txt_criterio."&rutpersona=".$rutoriginal."'>"; 
         	 echo "<font face='verdana' size='-2'>".$i."</font></a> "; 
      	 } 
   	} 
   	if($pagina<$numPags) 
   { 
      	echo " <a class='paginar' href='".$_SERVER["PHP_SELF"]."?pagina=".($pagina+1)."&orden=".$orden."&criterio=".$txt_criterio."&rutpersona=".$rutoriginal."'>"; 
      	echo "<font face='verdana' size='-2'>siguiente</font></a>"; 
   } 
//////////fin de la paginacion 
?> 
   	</td></tr> 
   	</table> 
	  <table width='100%'>
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



</body>
</html>
