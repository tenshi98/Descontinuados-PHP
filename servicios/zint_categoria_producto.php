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
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "zint_categoria_producto.php";
//formulario para crear nivel
if ( !empty($_POST['submit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['new'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/zint_categoria_producto.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/zint_categoria_producto_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/zint_categoria_producto.php';//se crean los datos
}
//formulario para editar nivel
if ( !empty($_POST['submit_edit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/zint_categoria_producto.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/zint_categoria_producto_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/zint_categoria_producto.php';//se crean los datos
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/zint_categoria_producto.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Categoria Producto</title>
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
<div class="title"><p>Categoria productos</p></div>
	<div class="content">          
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) {  
 // SE TRAEN LOS DATOS DE SOLO UNA CATEGORIA DE PRODUCTO
$query = "SELECT Cat_prod
FROM `zint_cat_prod`
WHERE idCat_prod = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowtipo = mysql_fetch_assoc ($resultado); 
 ?>         
<div>  
<div class="fleft"><h1>Editar Categoria</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Nombre</label></td>
        <td><input type="text" name="Cat_prod"  placeholder="Categoria de producto"  required="" value="<?php echo $rowtipo['Cat_prod']; ?>"/><?php echo $errors[1] ?></td>
    </tr>
    <tr>
    	<input name="idCat_prod"  type="hidden" value="<?php echo $_GET['id'] ?>" />
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['emp'] ?>" />
		<td colspan="8"><div class="fright"> <input name="submit_edit" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table>
		
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
<div>  
<div class="fleft"><h1>Crear Nueva Categoria</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['new']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Nombre</label></td>
        <td><input type="text" name="Cat_prod"  placeholder="Categoria de producto"  required=""/><?php echo $errors[1] ?></td>
    </tr>
    <tr>
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['new'] ?>" />
		<td colspan="8"><div class="fright"> <input name="submit" type="submit" value="Crear &raquo;" /> </div></td>
	</tr>
</form>
</table>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// SE TRAE UN LISTADO DE TODAS LAS CATEGORIAS DE PRODUCTOS
$arrTipo = array();
$query = "SELECT idCat_prod, Cat_prod
FROM `zint_cat_prod`
WHERE idEmpresa = {$_GET['view']}
ORDER BY Cat_prod ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipo,$row );
}
?>
<div>  
<div class="fleft"><h1>Listado de Categorias</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['view']?>" ><input name="" type="button" value="Crear Nuevo &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Categorías de producto</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody>

<?php foreach ($arrTipo as $tipo) { ?>  
  <tr> 
   <td><?php echo $tipo['Cat_prod']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?id=<?php echo $tipo['idCat_prod']; ?>&emp=<?php echo $_GET['view']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
    <?php $ubicacion=$location.'?del='.$tipo['idCat_prod'].'&emp='.$_GET['view'];?>
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