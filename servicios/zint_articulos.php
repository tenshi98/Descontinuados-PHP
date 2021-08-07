<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/listado_errores.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se define la variables vacias para evitar errores                                            */
/**********************************************************************************************************************************/
$errors[1]='';
$errors[2]='';
$errors[3]='';
$errors[4]='';
$errors[5]='';
$errors[6]='';
$errors[7]='';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "zint_articulos.php";
//formulario para agregar comentarios a la ot
if ( !empty($_POST['submit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['new'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/zint_articulos.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/zint_articulos_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/zint_articulos.php';//se crean los datos
}
//formulario para editar ot
if ( !empty($_POST['submit_edit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/zint_articulos.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/zint_articulos_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/zint_articulos.php';//se crean los datos
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
//eliminamos al responsable desde la pantalla de responsables
if ( !empty($_GET['del']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/zint_articulos.php';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Articulos</title>
<!-- InstanceEndEditable -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo2.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
function msg(direccion){
if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
</script>
<!-- InstanceEndEditable -->
</head>
<body>
<table class="table" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" height="39px;">
<?php require_once 'AR2D2CFFDJFDJX1/xrxs_core/menu_nav.php'; ?>     
    </td>
  </tr>
  <tr>
    <td width="220px;" bgcolor="#eee">
<?php require_once 'AR2D2CFFDJFDJX1/xrxs_core/menu_lateral.php'; ?>  
    </td>
    <td height="100%">
    	<div class="body">
		<!-- InstanceBeginEditable name="content" -->
<div class="modulo widht_modulo_full">
<div class="title"><p>Creacion de Articulos</p></div>
	<div class="content">        
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { 
// SE TRAE UN LISTADO DE TODOS LOS TIPOS DE PRODUCTOS
$arrTipo = array();
$query = "SELECT idTipo_prod, Tipo_producto
FROM `zint_tipo_prod` 
WHERE idEmpresa={$_GET['emp']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipo,$row );
}
mysql_free_result($resultado);
// SE TRAE UN LISTADO DE TODAS LAS CATEGORIAS DE PRODUCTOS
$arrCat = array();
$query = "SELECT idCat_prod, Cat_prod
FROM `zint_cat_prod` 
WHERE idEmpresa={$_GET['emp']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCat,$row );
}	
mysql_free_result($resultado);	
// SE TRAE UN LISTADO DE TODAS LAS UNIDADES DE MEDIDA
$arrUml = array();
$query = "SELECT idUml, Nombre
FROM `zint_uml` 
WHERE idEmpresa={$_GET['emp']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUml,$row );
}
mysql_free_result($resultado);
// SE TRAE UN LISTADO DE TODOS LOS TIPOS DE EMBALAJE
$arrEmbalaje = array();
$query = "SELECT idEmbalaje, Nombre
FROM `zint_embalaje`
WHERE idEmpresa={$_GET['emp']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEmbalaje,$row );
}	
mysql_free_result($resultado); 
// SE TRAEN LOS DATOS DE SOLO UN ARTICULO
$query = "SELECT  Nombre_art, idTipo_prod, idCat_prod, idUml, Cap_grad_min, idEmbalaje, Marca
FROM `zint_articulo`
WHERE idArticulo = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowarticulo = mysql_fetch_assoc ($resultado);
?>

<div>  
<div class="fleft"><h1>Editar Articulo</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td colspan="2"><label>Nombre</label></td>
        <td colspan="2"><input type="text" name="Nombre_art"  placeholder="Nombre del Articulo"  required="" value="<?php echo $rowarticulo['Nombre_art']; ?>"/><?php echo $errors[1] ?></td>
        <td><label>Tipo</label></td>
        <td colspan="3"><select name="idTipo_prod" required="">
			<option value="" selected>Seleccione un tipo</option>
			<?php foreach ( $arrTipo as $tipo ) { ?>
			<option value="<?php echo $tipo['idTipo_prod']; ?>" <?php if ( $tipo['idTipo_prod'] == $rowarticulo['idTipo_prod'] ) echo 'selected="selected"' ?>><?php echo $tipo['Tipo_producto']; ?></option><?php } ?></select><?php echo $errors[2] ?></td> 
	</tr>
    <tr>
    	<td colspan="2"><label>Categoria</label></td>
        <td colspan="2"><select name="idCat_prod" required="">
				<option value="" selected>Seleccione una categoría</option>
			<?php foreach ( $arrCat as $categoria ) { ?>
			<option value="<?php echo $categoria['idCat_prod']; ?>" <?php if ( $categoria['idCat_prod'] == $rowarticulo['idCat_prod'] ) echo 'selected="selected"' ?>><?php echo $categoria['Cat_prod']; ?></option><?php } ?></select><?php echo $errors[3] ?></td>
        <td><label>Capacidad</label></td>
        <td><input type="text" name="Cap_grad_min"  placeholder="Capacidad"  required="" value="<?php echo $rowarticulo['Cap_grad_min']; ?>"/><?php echo $errors[4] ?></td>
        <td><label>Uni Med</label></td>
        <td><select name="idUml" required="">
		<option value="" selected>Seleccione la unidad de medida</option>
		<?php foreach ( $arrUml as $uni_med ) { ?>
		<option value="<?php echo $uni_med['idUml']; ?>" <?php if ( $uni_med['idUml'] == $rowarticulo['idUml'] ) echo 'selected="selected"' ?>><?php echo $uni_med['Nombre']; ?></option><?php } ?></select><?php echo $errors[5] ?></td> 
	</tr>
    <tr>
    	<td colspan="2"><label>Tipo Emb</label></td>
        <td colspan="2"><select name="idEmbalaje" required="">
		<option value="" selected>Seleccione un tipo de embalaje</option>
		<?php foreach ( $arrEmbalaje as $embalaje ) { ?>
		<option value="<?php echo $embalaje['idEmbalaje']; ?>" <?php if ( $embalaje['idEmbalaje'] == $rowarticulo['idEmbalaje'] ) echo 'selected="selected"' ?>><?php echo $embalaje['Nombre']; ?></option><?php } ?></select><?php echo $errors[6] ?></td>
        <td><label>Fabricante</label></td>
        <td colspan="3"><input type="text" name="Marca"  placeholder="Marca o Nombre del Fabricante"  required="" value="<?php echo $rowarticulo['Marca']; ?>"/><?php echo $errors[7] ?></td>
         
	</tr>
    <tr>
		<td colspan="7"></td>
		<input name="idArticulo"  type="hidden" value="<?php echo $_GET['id'] ?>" />
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['emp'] ?>" />
		<td><div class="fright"> <input name="submit_edit" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table>	       

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
// SE TRAE UN LISTADO DE TODOS LOS TIPOS DE PRODUCTOS
$arrTipo = array();
$query = "SELECT idTipo_prod, Tipo_producto
FROM `zint_tipo_prod` 
WHERE idEmpresa={$_GET['new']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipo,$row );
}
mysql_free_result($resultado);
// SE TRAE UN LISTADO DE TODAS LAS CATEGORIAS DE PRODUCTOS
$arrCat = array();
$query = "SELECT idCat_prod, Cat_prod
FROM `zint_cat_prod` 
WHERE idEmpresa={$_GET['new']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCat,$row );
}	
mysql_free_result($resultado);	
// SE TRAE UN LISTADO DE TODAS LAS UNIDADES DE MEDIDA
$arrUml = array();
$query = "SELECT idUml, Nombre
FROM `zint_uml` 
WHERE idEmpresa={$_GET['new']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUml,$row );
}
mysql_free_result($resultado);
// SE TRAE UN LISTADO DE TODOS LOS TIPOS DE EMBALAJE
$arrEmbalaje = array();
$query = "SELECT idEmbalaje, Nombre
FROM `zint_embalaje`
WHERE idEmpresa={$_GET['new']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEmbalaje,$row );
}	
mysql_free_result($resultado); 
?>

<div>  
<div class="fleft"><h1>Crear Nuevo Articulo</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['new']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td colspan="2"><label>Nombre</label></td>
        <td colspan="2"><input type="text" name="Nombre_art"  placeholder="Nombre del Articulo"  required=""/><?php echo $errors[1] ?></td>
        <td><label>Tipo</label></td>
        <td colspan="3"><select name="idTipo_prod" required="">
			<option value="" selected>Seleccione un tipo</option>
			<?php foreach ( $arrTipo as $tipo ) { ?>
			<option value="<?php echo $tipo['idTipo_prod']; ?>"><?php echo $tipo['Tipo_producto']; ?></option><?php } ?></select><?php echo $errors[2] ?></td> 
	</tr>
    <tr>
    	<td colspan="2"><label>Categoria</label></td>
        <td colspan="2"><select name="idCat_prod" required="">
				<option value="" selected>Seleccione una categoría</option>
			<?php foreach ( $arrCat as $categoria ) { ?>
			<option value="<?php echo $categoria['idCat_prod']; ?>"><?php echo $categoria['Cat_prod']; ?></option><?php } ?></select><?php echo $errors[3] ?></td>
        <td><label>Capacidad</label></td>
        <td><input type="text" name="Cap_grad_min"  placeholder="Capacidad"  required=""/><?php echo $errors[4] ?></td>
        <td><label>Uni Med</label></td>
        <td><select name="idUml" required="">
		<option value="" selected>Seleccione la unidad de medida</option>
		<?php foreach ( $arrUml as $uni_med ) { ?>
		<option value="<?php echo $uni_med['idUml']; ?>"><?php echo $uni_med['Nombre']; ?></option><?php } ?></select><?php echo $errors[5] ?></td> 
	</tr>
    <tr>
    	<td colspan="2"><label>Tipo Emb</label></td>
        <td colspan="2"><select name="idEmbalaje" required="">
		<option value="" selected>Seleccione un tipo de embalaje</option>
		<?php foreach ( $arrEmbalaje as $embalaje ) { ?>
		<option value="<?php echo $embalaje['idEmbalaje']; ?>"><?php echo $embalaje['Nombre']; ?></option><?php } ?></select><?php echo $errors[6] ?></td>
        <td><label>Fabricante</label></td>
        <td colspan="3"><input type="text" name="Marca"  placeholder="Marca o Nombre del Fabricante"  required=""/><?php echo $errors[7] ?></td>
         
	</tr>
    <tr>
		<td colspan="7"></td>
		<input name="idEmpresa"  type="hidden" value="<?php echo $_GET['new'] ?>" />
		<td><div class="fright"> <input name="submit" type="submit" value="Crear &raquo;" /> </div></td>
	</tr>
</form>
</table> 
	 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) {
// SE TRAE UN LISTADO DE TODOS LOS ARTICULOS
$arrArticulos = array();
$query = "SELECT 
zint_articulo.idArticulo, 
zint_articulo.Nombre_art,
zint_tipo_prod.Tipo_producto AS nombre_tipo,
zint_cat_prod.Cat_prod AS nombre_cat,
zint_uml.Nombre AS nombre_uni,
zint_articulo.Cap_grad_min,
zint_embalaje.Nombre AS nombre_emb,
zint_articulo.Marca
FROM `zint_articulo`
INNER JOIN `zint_tipo_prod` ON zint_tipo_prod.idTipo_prod = zint_articulo.idTipo_prod
INNER JOIN `zint_cat_prod`  ON zint_cat_prod.idCat_prod   = zint_articulo.idCat_prod
INNER JOIN `zint_uml`       ON zint_uml.idUml             = zint_articulo.idUml
INNER JOIN `zint_embalaje`  ON zint_embalaje.idEmbalaje   = zint_articulo.idEmbalaje
WHERE zint_articulo.idEmpresa = {$_GET['view']}
ORDER BY Nombre_art ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrArticulos,$row );
}	 
?>	

<div>  
<div class="fleft"><h1>Listado de Articulos</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['view']?>" ><input name="" type="button" value="Crear Nuevo &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre</th>
   <th>Tipo</th>
   <th>Categoria</th>
   <th>Capacidad</th>
   <th>Embalaje</th>
   <th>Marca</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrArticulos as $articulos) { ?>
  <tr> 
   <td><?php echo $articulos['Nombre_art']; ?></td> 
   <td><?php echo $articulos['nombre_tipo']; ?></td>
   <td><?php echo $articulos['nombre_cat']; ?></td>
   <td><?php echo $articulos['Cap_grad_min'].' '.$articulos['nombre_uni']; ?></td>
   <td><?php echo $articulos['nombre_emb']; ?></td>
   <td><?php echo $articulos['Marca']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?id=<?php echo $articulos['idArticulo']; ?>&emp=<?php echo $_GET['view']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
    <?php $ubicacion=$location.'?del='.$articulos['idArticulo'].'&emp='.$_GET['view'];?>
   <a onclick="msg('<?php echo $ubicacion ?>')" ><input type="image" src="img/icn_trash.png" title="Borrar"></a>   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>

<div>  
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
// SE TRAE UN LISTADO DE TODAS LAS EMPRESAS
$arrUsers = array();
$query = "SELECT 
empresas_listado.idEmpresa, 
empresas_listado.Nombre
FROM `empresas_listado`
INNER JOIN `usuarios_empresas`     ON usuarios_empresas.idEmpresa      = empresas_listado.idEmpresa
WHERE usuarios_empresas.idUsuario = ".$arrUsuario['idUsuario']."
ORDER BY empresas_listado.Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<div>  
<div class="fleft"><h1>Listado de Empresas</h1></div>
<div class="clear"></div></div> 

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre de la Empresa</th> 
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrUsers as $usuarios) { ?>
  <tr> 
   <td><?php echo $usuarios['Nombre']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?view=<?php echo $usuarios['idEmpresa']; ?>"><input type="image" src="img/icn_categories.png" title="Ver"></a>	   
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>
	 
	 		
<?php } ?>		
</div>
</div> 		
		<!-- InstanceEndEditable --> 
    	</div>
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>