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
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "empresas_item_cat.php";
//formulario para crear categoria
if ( !empty($_POST['submit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['new'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresa_item_cat.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresa_item_cat_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/empresa_item_cat.php';//se crean los datos
}
//formulario para editar categoria
if ( !empty($_POST['submit_edit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/empresa_item_cat.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/empresa_item_cat_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/empresa_item_cat.php';//se crean los datos
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )     {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/empresa_item_cat.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Itemizado - Categorias</title>
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
<div class="title"><p>Itemizado - Categorias</p></div>
	<div class="content">          
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { 
// se traen los datos de una categoria	
$query = "SELECT Nombre_cat, Nombre_Sub
FROM `empresas_item_cat`
WHERE idItemcat = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowitemcat = mysql_fetch_assoc ($resultado);
 ?>

<div>  
<div class="fleft"><h1>Editar Categoria del Itemizado</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Categoria</label></td>
		<td><input name="Nombre_cat"  type="text" required="" value="<?php echo $rowitemcat['Nombre_cat']; ?>"/><?php echo $errors[1] ?></td>  
		<td><label>Subcategoria</label></td>
		<td><input name="Nombre_Sub"  type="text" required="" value="<?php echo $rowitemcat['Nombre_Sub']; ?>"/><?php echo $errors[2] ?></td>  
	</tr>
    <tr>
		<td colspan="3"></td>
        <input name="idItemcat"  type="hidden" value="<?php echo $_GET['id'] ?>" />
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['emp'] ?>" />
		<td><div class="fright"> <input name="submit_edit" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table>


<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) {  ?> 
<div>  
<div class="fleft"><h1>Crear Nueva Categoria para el Itemizado</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['new']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Categoria</label></td>
		<td><input name="Nombre_cat"  type="text" required="" /><?php echo $errors[1] ?></td>  
		<td><label>Subcategoria</label></td>
		<td><input name="Nombre_Sub"  type="text" required="" /><?php echo $errors[2] ?></td>  
	</tr>
    <tr>
		<td colspan="3"></td>
        <input name="idEmpresa"  type="hidden" value="<?php echo $_GET['new'] ?>" />
		<td><div class="fright"> <input name="submit" type="submit" value="Crear &raquo;" /> </div></td>
	</tr>
</form>
</table> 
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 	
//obtengo los nombres de los niveles
$arrNombres = array();
$query = "SELECT idItemcat, Nombre_cat, Nombre_Sub
FROM `empresas_item_cat`
WHERE idEmpresa = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNombres,$row );
}
 ?> 
<div>  
<div class="fleft"><h1>Listado de las Categorias de los itemizados</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['view']?>" ><input name="" type="button" value="Crear Nuevo &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Categoria</th>
   <th>Subcategoria</th> 
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrNombres as $nombres) { ?>
  <tr> 
   <td><?php echo $nombres['Nombre_cat']; ?></td>
   <td><?php echo $nombres['Nombre_Sub']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?id=<?php echo $nombres['idItemcat']; ?>&emp=<?php echo $_GET['view']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
   <?php $ubicacion=$location.'?del='.$nombres['idItemcat'].'&emp='.$_GET['view'];?>
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