<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_4.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "gestion_mensajes.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/gestion_mensajes.php';		
}
//formulario para envio de mensaje
if ( !empty($_POST['mms']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/gestion_envio_mensajes.php';		
}
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Enviar mensajes</title>
    <!-- InstanceEndEditable -->
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">
    <!-- Metis Theme stylesheet -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.css">
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<link href="assets/css/theme_color_<?php echo $rowempresa['idTheme'] ?>.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
        <![endif]-->
    <!--Modernizr 2.7.2-->
    <script src="assets/lib/modernizr/modernizr.min.js"></script>
	<!-- Icono de la pagina -->
	<link rel="icon" type="image/png" href="img/mifavicon.png" />
    <!-- InstanceBeginEditable name="head" -->

    
    
    <!-- InstanceEndEditable -->
  </head>
  <body>
      <div id="content">
        <div class="outer">
            <div class="inner">
<?



if ($_GET["rutpersona"]<>'') {
	$rutoriginal=$_GET['rutpersona'];
	$rutpersona=$_GET['rutpersona'];
}else{
	$rutoriginal=$_POST['rutpersona'];
	$rutpersona=$_POST['rutpersona'];
}
	$sql_padron= "SELECT NOMBRE,SEX,DOMICILIO,Comuna,fono_celular,domicilio_2,comuna_2,correo FROM padron_electoral_CL where rut_compara='".$rutpersona."'";
	$res_padron=mysql_query($sql_padron,$dbConn_2); 

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
            <td width="20%" height="20" align="left">
				<label for="text2" class="control-label">Nombre</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$NOMBRE?></span></td>
             </tr>
			<tr>
            <td width="20%" height="20" align="left"><label for="text2" class="control-label">Sexo</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$SEX?></span></td>
             </tr>
			<tr>
            <td width="20%" height="20" align="left"><label for="text2" class="control-label">Direccion de Votacion</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$DOMICILIO?></span></td>
             </tr>		
			<tr>
            <td width="20%" height="20" align="left"><label for="text2" class="control-label">Comuna de Votacion</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$Comuna?></span></td>
             </tr>		
			<tr>
            <td width="20%" height="20" align="left"><label for="text2" class="control-label">Numero de Celular</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$fono_celular?></span></td>
             </tr>			 
			<tr>
            <td width="20%" height="20" align="left"><label for="text2" class="control-label">Direccion</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$domicilio_2?></span></td>
             </tr>		
			<tr>
            <td width="20%" height="20" align="left"><label for="text2" class="control-label">Comuna</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$comuna_2?></span></td>
             </tr>	
			<tr>
            <td width="20%" height="20" align="left"><label for="text2" class="control-label">E-mail</span></td>
            <td width="80%" align="left"><span class="arial_gris_med"><?=$correo?></span></td>
             </tr>
			<tr>
            <td width="20%" height="20" align="left"></td>
            <td width="80%" align="center"><label for="text2" class="control-label">VEHICULOS</span></td>
             </tr>
			<tr>
            <td width="20%" height="20" align="left"></td>
            <td width="80%" align="left"> 
<table width="98%" align="center" id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable"> 
<thead>
 <tr class="tbl_title">
                <th width="17%"  align="left" height="40">TIPO</span></td>
           <th width="17%"  align="left" height="40">MARCA</span></td>
		   <th width="17%"  align="left" height="40">MODELO</span></td>
		   <th width="17%"  align="left" height="40">A&Ntilde;O</span></td>
		   <th width="17%"  align="left" height="40">PATENTE</span></td>
			</tr>
</thead>
<?
	$sql_padron= "SELECT PPU,MARCA,MODELO,TIPO,ANO FROM parque_automotriz where rut_comparador='".$rutpersona."'";
	$res_padron=mysql_query($sql_padron,$dbConn_2); 

while($datos_padron=mysql_fetch_array($res_padron)) 
{ 
?>
			<tbody role="alert" aria-live="polite" aria-relevant="all">
 <tr class="odd">
                <td width="17%"  align="left" height="40" class=" "><?=$datos_padron["TIPO"]?></span></td>
           <td width="17%"  align="left" height="40" class=" "><?=$datos_padron["MARCA"]?></span></td>
		   <td width="17%"  align="left" height="40" class=" "><?=$datos_padron["MODELO"]?></span></td>
		   <td width="17%"  align="left" height="40" class=" "><?=$datos_padron["ANO"]?></span></td>
		   <td width="17%"  align="left" height="40" class=" "><?=$datos_padron["PPU"]?></span></td>
             </tr>
			 </tbody>
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



$res=mysql_query($sql,$dbConn_2); 
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
			

			<table width="98%" align="center" id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable"> 
<thead>
 <tr class="tbl_title">
                <th width="17%"  align="left" height="40">Nombre</th>
                <th width="17%"  align="left" height="40">Fecha/Hora (Click)</th>
                <th width="17%"  align="left" height="40">Item</th>
                <th width="17%"  align="left" height="40">Categoria</th>
                <th width="17%"  align="left" height="40">Subcategoria</th>
				<th width="17%"  align="left" height="40">Ciudad</th>
              </tr>
</thead>
<?$contador=0;
$contador_gral=0;



$sql2= $sql." ORDER BY fecha DESC LIMIT ".$limitInf.",".$tamPag; 

$gral=mysql_query($sql2,$dbConn_2);
while($registro=mysql_fetch_array($gral)) 
{ 

$fecha_hora=$registro["fecha"];
$item=$registro["item"];
$subcategoria=$registro["subcategoria"];
$descripcion_categoria="todas";
$descripcion_subcategoria="todas";
$sql="SELECT * FROM preferencias_categorias where id_categoria=". $registro["categoria"];
$gral2=mysql_query($sql,$dbConn_2); 
while($preferencias_categoria=mysql_fetch_array($gral2)) 
{ 
	$descripcion_categoria=$preferencias_categoria["descripcion"];
}

$sql="SELECT * FROM preferencias_subcategoria where id_subcategoria=". $registro["subcategoria"];
$gral2=mysql_query($sql,$dbConn_2); 
while($preferencias_subcategoria=mysql_fetch_array($gral2)) 
{ 
	$descripcion_subcategoria=$preferencias_subcategoria["descripcion"];
}
$sql="SELECT * FROM ejecutivos where rut='". $registro["rut_compara"]."'";
$gral2=mysql_query($sql,$dbConn); 
while($ejecutivos=mysql_fetch_array($gral2)) 
{ 
	$codigo=$ejecutivos["gcmcode"];
	$nombre=$ejecutivos["nom_ejecutiv"];
	$ciudad=$ejecutivos["ciudad_ejecutiv"];

}


	

?>  
  <!-- tabla de resultados --> 


<tbody role="alert" aria-live="polite" aria-relevant="all">
 <tr class="odd">
                <td width="17%"  align="left" height="40" class=" "><?=$nombre?></td>
                <td width="17%"  align="left" height="40" class=" "><?=$fecha_hora?></td>
                <td width="17%"  align="left" height="40" class=" "><?=$item?></td>
                <td width="17%"  align="left" height="40" class=" "><?=$descripcion_categoria?></td>
                <td width="17%"  align="left" height="40" class=" "><?=$descripcion_subcategoria?></td>
                <td width="17%"  align="left" height="40" class=" "><?=$ciudad?></td>

              </tr>
         
</tbody>
         



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
<!-- InstanceEnd --></html>