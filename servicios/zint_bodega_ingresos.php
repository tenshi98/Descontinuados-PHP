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
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "zint_bodega_ingresos.php";
//formulario para crear ingreso
if ( !empty($_POST['submit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['view'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/zint_bodega_ingresos.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/zint_bodega_ingresos_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/zint_bodega_ingresos.php';//se crean los datos
}
//Furmulario para actualizar el estado
if ( !empty($_GET['apr']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/zint_bodega_ingresos.php';}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/zint_bodega_ingresos.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Bodega - Ingreso stock</title>
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
<div class="title"><p>Bodega Ingresos</p></div>
	<div class="content">          
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['view']) ) { 
// SE TRAE UN LISTADO DE TODOS LOS ARTICULOS
$arrArticulos = array();
$query = "SELECT idArticulo,Nombre_art
FROM `zint_articulo` 
WHERE idEmpresa={$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrArticulos,$row );
}
mysql_free_result($resultado);
// SE TRAE UN LISTADO DE LOS TIPOS DE DOCUMENTOS
$arrDocumentos = array();
$query = "SELECT id_Detalle,Nombre 
FROM `detalle_general`
WHERE Tipo='4' AND Abreviatura ='1'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrDocumentos,$row );
}
mysql_free_result($resultado);
// SE TRAE UN LISTADO DE TODOS LOS ARTICULOS QUE ESTAN EN BODEGA SIN APROBAR
$arrBodega = array();
$query = "SELECT 
zint_bodega.idBodega, 
zint_articulo.Nombre_art as nombre_articulo,
zint_bodega.Cantidad, 
zint_bodega.Valor,
detalle_general.Nombre AS tipo_doc,
zint_bodega.N_doc,
zint_bodega.Procedencia
FROM `zint_bodega`
INNER JOIN `zint_articulo`    ON zint_articulo.idArticulo    = zint_bodega.idArticulo
INNER JOIN `detalle_general`  ON detalle_general.id_Detalle  = zint_bodega.Tipo_doc
WHERE zint_bodega.idEmpresa = {$_GET['view']} AND zint_bodega.idUsuario = {$arrUsuario['idUsuario']} AND zint_bodega.Estado = '13' AND zint_bodega.operacion = '15'
 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBodega,$row );
}
mysql_free_result($resultado);
?>
<div>  
<div class="fleft"><h1>Crear Nuevo Ingreso a Bodega</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Nombre</label></td>
        <td colspan="3"><select name="idArticulo" required="">
		<option value="" selected>Seleccione un articulo</option>
		<?php foreach ( $arrArticulos as $articulos ) { ?>
		<option value="<?php echo $articulos['idArticulo']; ?>"><?php echo $articulos['Nombre_art']; ?></option><?php } ?></select><?php echo $errors[1] ?></td>
        <td><label>Cantidad</label></td>
        <td><input type="text" name="Cantidad"  placeholder="Cantidad"  required=""/><?php echo $errors[2] ?></td>
        <td><label>Valor Unitario</label></td>
        <td><input type="text" name="Valor"     placeholder="Valor unitario"  required=""/><?php echo $errors[3] ?></td>
        
    </tr>
    <tr>
    	<td><label>Procedencia</label></td>
        <td colspan="3"><input type="text" name="Procedencia"     placeholder="Procedencia"  required=""/><?php echo $errors[4] ?></td>
        <td><label>Tipo Doc</label></td>
        <td><select name="Tipo_doc" required="">
		<option value="" selected>Seleccione un tipo de documento</option>
		<?php foreach ( $arrDocumentos as $documentos ) { ?>
		<option value="<?php echo $documentos['id_Detalle']; ?>"><?php echo $documentos['Nombre']; ?></option><?php } ?></select><?php echo $errors[5] ?></td>
        <td><label>N° Doc</label></td>
        <td><input type="text" name="N_doc"     placeholder="N° Documento"  required=""/><?php echo $errors[6] ?></td>

    </tr>
    <tr>	
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['view']; ?>" />
        <input name="idUsuario"  type="hidden" value="<?php echo $arrUsuario['idUsuario']; ?>" />
		<td colspan="8"><div class="fright"> <input name="submit" type="submit" value="Ingresar &raquo;" /> </div></td>
	</tr>
</form>
</table>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
    <th>Nombre del Articulo</th>
   <th>Tipo Doc</th>
   <th>N° Doc</th>
   <th>Cantidad</th>
   <th>Valor unit</th>
   <th>Procedencia</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody>

<?php foreach ($arrBodega as $bodega) { ?>  
  <tr> 
   <td><?php echo $bodega['nombre_articulo']; ?></td>
   <td><?php echo $bodega['tipo_doc']; ?></td>
   <td><?php echo n_doc($bodega['N_doc']); ?></td>
   <td><?php echo Cantidades_sd($bodega['Cantidad']); ?></td>
   <td><?php echo Valores_sd($bodega['Valor']); ?></td>
   <td><?php echo $bodega['Procedencia']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?apr=<?php echo $bodega['idBodega']; ?>&emp=<?php echo $_GET['view']; ?>"><input type="image" src="img/icn_alert_success2.png" title="Aprobar Ingreso"></a>
    <?php $ubicacion=$location.'?del='.$bodega['idBodega'].'&emp='.$_GET['view'];?>
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