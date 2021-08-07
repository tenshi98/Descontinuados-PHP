<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once 'AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once 'AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once 'AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once('../nombre_pag.php');
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "index.php";
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Formulario creacion
if ( !empty($_POST['submit_create']) )  { 
	//Agregamos direcciones
	$location.='?create=true';
	//Llamamos a las partes del formulario
	require_once 'AA2D2CFFDJFDJX1/xrxs_trans/preguntas.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_controller/preguntas_1.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_trans/preguntas_1.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_insert/preguntas.php';
}
//Formulario edicion
if ( !empty($_POST['submit_edit']) )  { 
	//Agregamos direcciones
	$location.='?mod=true';
	//Llamamos a las partes del formulario
	require_once 'AA2D2CFFDJFDJX1/xrxs_trans/preguntas.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_controller/preguntas_1.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_trans/preguntas_1.php';
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_update/preguntas.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	$location.='?deleted=true';
	//Llamamos al formulario de borrado
	require_once 'AA2D2CFFDJFDJX1/xrxs_form_del/preguntas.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?php echo $pagina?> ::.</title>
<link rel="icon" href="http://<?php echo $nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?php echo $nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="mapestilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="miestilo.css">
<link href="font-awesome.min.css" rel="stylesheet" type="text/css" />
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


</head>

<body onload="MM_preloadImages('../images/logo_footer_up2.png')">
<div id="nonFooter" >

 <table bgcolor="#999999" width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td align="center" valign="middle"><table width="990" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="58%" align="right" valign="middle" class="google_fjalla_bco"><table border="0" cellpadding="0" cellspacing="0" class="logo_flot">
          <tr>
            <td><img src="../images/logo.png" height="200" /></td>
          </tr>
        </table>
          Administrar preguntas</td>
        <td width="42%" height="50" align="center" valign="middle">
		<input name="button" type="submit" class="bot_sombra_izq" id="button" value="" />
          <input name="button2" type="submit" class="bot_sombra_cent" id="button2" value="Volver"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/admin';"/>
          <input name="button4" type="submit" class="bot_sombra_der" id="button4" value="" /></td>
      </tr>
    </table></td>
    </tr>
</table>
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="50" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center">
                    
                    
                    
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" valign="middle"><table width="600" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td align="center" valign="middle" class="google_fjalla_gde">Listado de preguntas<br />
                                <span class="arial_light_med">&nbsp;</span></td>
                            </tr>
                            <tr>
                              <td align="right"><a href="<?php echo $location ?>?new=true" class="bot_sombra btn" >Crear nuevo</a></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr> 
                          </tbody>
                        </table></td>
                      </tr>
                      <tr>
                        <td>
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($errors[5])) {echo $errors[5];}?>
<?php  if (isset($_GET['create'])) {?>
<div id="txf_01" class="alert alert_sucess">  
	Pregunta Creada correctamente
	<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_01" class="alert alert_sucess">  
	Pregunta Modificada correctamente
	<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_01" class="alert alert_sucess">  
	Pregunta borrada correctamente
	<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
//se traen los datos de la pregunta
$query = "SELECT
preguntas.idPregunta,
preguntas.idCatPreg,
preguntas.Pregunta,
preguntas.Opcion1,
preguntas.Opcion2,
preguntas.Estado
FROM
preguntas
WHERE idPregunta = '{$_GET['id']}' ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
//Se traen todas las categorias
$arrCategorias = array();
$query = "SELECT
preguntas_categorias.idCatPreg,
preguntas_categorias.Categoria
FROM
preguntas_categorias
ORDER BY Categoria ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
} 
 ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="">
<form method="post">
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Categoria</span></td>
	<td>
    <select name="idCatPreg" required="required" class="arial_light_cuadro">
		<option value='' >Seleccione una Categoria</option>  
		<?php foreach ($arrCategorias as $categoria) { ?>
    	<option value="<?php echo $categoria['idCatPreg']; ?>" <?php if(isset($idCatPreg)&&$idCatPreg==$categoria['idCatPreg']) {echo 'selected="selected"';}elseif($row_data['idCatPreg']==$categoria['idCatPreg']){echo 'selected="selected"';}?>><?php echo $categoria['Categoria']; ?></option>
    <?php } ?>
	</select>
    </td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Pregunta</span></td>
	<td><input name="Pregunta" type="text" class="arial_light_cuadro" placeholder="Pregunta" value="<?php if (isset($Pregunta)) { echo $Pregunta;}else{ echo $row_data['Pregunta'];}?>"/></td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Opcion 1</span></td>
	<td><input name="Opcion1" type="text" class="arial_light_cuadro" placeholder="Opcion 1" value="<?php if (isset($Opcion1)) { echo $Opcion1;}else{ echo $row_data['Opcion1'];}?>"/></td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Opcion 2</span></td>
	<td><input name="Opcion2" type="text" class="arial_light_cuadro" placeholder="Opcion 2" value="<?php if (isset($Opcion2)) { echo $Opcion2;}else{ echo $row_data['Opcion2'];}?>"/></td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Estado</span></td>
	<td>
    <select name="Estado" required="required" class="arial_light_cuadro">
		<option value='0' <?php if (isset($Estado)&&$Estado=="0") { echo "Selected";}elseif($row_data['Estado']=="0"){echo "Selected";} ?> >No publicado</option>
        <option value='1' <?php if (isset($Estado)&&$Estado=="1") { echo "Selected";}elseif($row_data['Estado']=="1"){echo "Selected";} ?> >Abierta</option>
        <option value='2' <?php if (isset($Estado)&&$Estado=="2") { echo "Selected";}elseif($row_data['Estado']=="2"){echo "Selected";} ?> >Cerrada</option>
	</select>
    </td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"></td>
	<td>
    <input name="idPregunta" type="hidden" value="<?php echo $row_data['idPregunta'] ?>" />
    <input name="collapsekey" type="hidden"  value="<?php echo $row_data['idPregunta'] ; ?>" />
    <input name="submit_edit" type="submit" class="bot_sombra"  value="Editar Pregunta" />
    <a href="<?php echo $location ?>" class="bot_sombra btn" >Volver</a>
    </td>
</tr>
</form>
</table>   
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['new']) ) { 
$arrCategorias = array();
$query = "SELECT
preguntas_categorias.idCatPreg,
preguntas_categorias.Categoria
FROM
preguntas_categorias
ORDER BY Categoria ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
$query = "SELECT idPregunta
FROM preguntas
ORDER BY idPregunta DESC LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
$ultimo_id=$row_data["idPregunta"]+1;	
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="">
<form method="post">
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Categoria</span></td>
	<td>
    <select name="idCatPreg" required="required" class="arial_light_cuadro">
		<option value='' >Seleccione una Categoria</option>  
		<?php foreach ($arrCategorias as $categoria) { ?>
    	<option value="<?php echo $categoria['idCatPreg']; ?>" <?php if(isset($idCatPreg)&&$idCatPreg==$categoria['idCatPreg']) {echo 'selected="selected"';}?>><?php echo $categoria['Categoria']; ?></option>
    <?php } ?>
	</select>
    </td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Pregunta</span></td>
	<td><input name="Pregunta" type="text" class="arial_light_cuadro"  placeholder="Pregunta" value="<?php if (isset($Pregunta)) { echo $Pregunta;} ?>" />     </td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Opcion 1</span></td>
	<td><input name="Opcion1" type="text" class="arial_light_cuadro" placeholder="Opcion 1" value="<?php if (isset($Opcion1)) { echo $Opcion1;} ?>" />     </td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Opcion 2</span></td>
	<td><input name="Opcion2" type="text" class="arial_light_cuadro" placeholder="Opcion 2" value="<?php if (isset($Opcion2)) { echo $Opcion2;} ?>" />     </td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"><span class="arial_tit_gris">Estado</span></td>
	<td>
    <select name="Estado" required="required" class="arial_light_cuadro">
		<option value='0' <?php if (isset($Estado)&&$Estado=="0") { echo "Selected";} ?> >No publicado</option>
        <option value='1' <?php if (isset($Estado)&&$Estado=="1") { echo "Selected";} ?> >Abierta</option>
        <option value='2' <?php if (isset($Estado)&&$Estado=="2") { echo "Selected";} ?> >Cerrada</option>
	</select>
    </td>
</tr>
<tr>
	<td width="19%"height="40" align="left" valign="middle"></td>
	<td>
    <input name="collapsekey" type="hidden"  value="<?php echo $ultimo_id ; ?>" />
    <input name="submit_create" type="submit" class="bot_sombra"  value="Crear Pregunta" />
    <a href="<?php echo $location ?>" class="bot_sombra btn" >Volver</a>
    </td>
</tr>
</form>
</table>                      
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
$arrPreguntas = array();
$query = "SELECT
preguntas.idPregunta,
preguntas.Pregunta,
preguntas.Opcion1,
preguntas.Opcion2,
preguntas.Estado,
(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '1') AS resp_opcion1,
(SELECT COUNT(Respuesta) FROM preguntas_resp WHERE idPregunta = preguntas.idPregunta AND Respuesta = '2') AS resp_opcion2
FROM
preguntas
ORDER BY preguntas.Estado ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPreguntas,$row );
}
?>                        
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="">
<thead>
	<tr>
    	<th>Pregunta</th>
        <th>Resp 1</th>
        <th>Resp 2</th>
        <th>Estado</th>
        <th>Modificar</th>
    </tr>
</thead>
<?php foreach ($arrPreguntas as $pregunta) { ?>
<?php 
$var_total = $pregunta['resp_opcion1']+ $pregunta['resp_opcion2'];
$por_opcion1 = ($pregunta['resp_opcion1']/$var_total)*100;
$por_opcion2 = ($pregunta['resp_opcion2']/$var_total)*100;
?>

	<tr>
		<td height="40" align="left" valign="middle">
        <span class="arial_tit_gris"><?php echo $pregunta['Pregunta']; ?></span></td>
         <td width="10%" align="center"><?php echo $pregunta['Opcion1'].'<br />('.porcentaje_cd($por_opcion1).')'; ?></td>
         <td width="10%" align="center"><?php echo $pregunta['Opcion2'].'<br />('.porcentaje_cd($por_opcion2).')'; ?></td>
         <td width="10%" align="center">
         	<?php 
			switch ($pregunta['Estado']) {
				case 0:
					echo "No publicado";
					break;
				case 1:
					echo "Abierta";
					break;
				case 2:
					echo "Cerrada";
					break;
			} ?>
         </td>
         <td width="19%">
            <a class="btn_list btn-app" href="<?php echo $location ?>?id=<?php echo $pregunta['idPregunta'] ?>"><i class="fap fap-edit"></i> Mod</a>
            <a class="btn_list btn-app" href="<?php echo $location ?>?del=<?php echo $pregunta['idPregunta'] ?>"><i class="fap fap-trash-o"></i> Elim</a>     
         </td>
	</tr>
<?php } ?>
    
</table>
<?php } ?>

                         
                          
                          
                          
                          </td>
                      </tr>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top">
		  <table id="table3" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td>&nbsp;</td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>

	


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
