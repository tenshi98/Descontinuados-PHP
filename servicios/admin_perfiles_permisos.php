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
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "admin_perfiles_permisos.php";
//formulario para crear permiso
if ( !empty($_POST['submit']) )  { 
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/usuario_permisos.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/usuario_permisos_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/usuario_permisos.php';//se crean los datos
}
//formulario para editar permiso
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/usuario_permisos.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/usuario_permisos_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/usuario_permisos.php';//se crean los datos
}

/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )     {require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/usuario_permisos.php';}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Permisos Listado</title>
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
<?php /////////////////////// manejador de errores ////////////////////////////////?>   
<?php if ( !empty($_GET['add']) ) { ?>
  <p class="alert_success width_small2">El Permiso se ha creado con &eacute;xito.</p>
<?php } elseif ( !empty($_GET['dele']) ) { ?>
  <p class="alert_success width_small2">El Permiso ha sido borrado con &eacute;xito.</p>
<?php } elseif ( !empty($_GET['edit']) ) { ?>
  <p class="alert_success width_small2">El Permiso ha sido editado con &eacute;xito.</p>
<?php } ?>

<div class="modulo widht_modulo_full">
<div class="title"><p>Permisos Listado</p></div>
<div class="content">
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
if ( ! empty($_GET['id']) ) { 
// SE TRAEN LOS DATOS DE SOLO UN PERMISO
$query = "SELECT Tipo, Direccionweb, Nombre
FROM `admin_permisos`
WHERE idAdmin_permisos = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowpermisos = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado); 
// SE TRAE UN LISTADO DE LAS CLASIFICACIONES DE LOS PERMISOS
$arrPermisos = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo ='1'
ORDER BY Tipo ASC,Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPermisos,$row );
}
mysql_free_result($resultado);?>    
    
<div>   
<div class="fleft"><h1>Editar Permiso Existente</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div> 
</div>   

<table class="tableform">
<form action="" method="post">
	<tr>
		<td><label>Nombre</label></td>
		<td><input name="nombre"  type="text" required="" value="<?php echo $rowpermisos['Nombre']; ?>" /><?php echo $errors[1] ?></td>
        <td><label>Clasificacion</label></td>
		<td><select name="tipo" required="" >
			<option value="" selected>Seleccione una Clasificacion</option>
				<?php foreach ( $arrPermisos as $permisos ) { ?>
                    <option value="<?php echo $permisos['id_Detalle']; ?>" <?php if ( $permisos['id_Detalle'] == $rowpermisos['Tipo'] ) echo 'selected="selected"' ?>><?php echo $permisos['Nombre']; ?></option>
				<?php } ?>
			</select><?php echo $errors[2] ?></td>
	</tr>
	<tr>
		<td><label>Ubicacion Fisica</label></td>
		<td colspan="3"><input name="direccion" type="text" required="" value="<?php echo $rowpermisos['Direccionweb']; ?>"/><?php echo $errors[3] ?></td>
	</tr>
    <tr>
		<td colspan="3"></td>
		<td><div class="fright"> <input name="submit_edit" type="submit" value="Editar Permiso &raquo;" /> </div></td>
	</tr>
</form>
</table>    
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
 // SE TRAE UN LISTADO DE LAS CLASIFICACIONES DE LOS PERMISOS
$arrPermisos = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo ='1'
ORDER BY Tipo ASC,Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPermisos,$row );
}
mysql_free_result($resultado);?>    
 
<div>   
<div class="fleft"><h1>Crear Nuevo Permiso</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div> 
</div>   

<table class="tableform">
<form action="" method="post">
	<tr>
		<td><label>Nombre</label></td>
		<td><input name="nombre"  type="text" required="" /><?php echo $errors[1] ?></td>
        <td><label>Clasificacion</label></td>
		<td><select name="tipo" required="" >
			<option value="" selected>Seleccione una Clasificacion</option>
				<?php foreach ( $arrPermisos as $permisos ) { ?>
					<option value="<?php echo $permisos['id_Detalle']; ?>"><?php echo $permisos['Nombre']; ?></option>
				<?php } ?>
			</select><?php echo $errors[2] ?></td>
	</tr>
	<tr>
		<td><label>Ubicacion Fisica</label></td>
		<td colspan="3"><input name="direccion" type="text" required="" /><?php echo $errors[3] ?></td>
	</tr>
    <tr>
		<td colspan="3"></td>
		<td><div class="fright"> <input name="submit" type="submit" value="Crear Permiso &raquo;" /> </div></td>
	</tr>
</form>
</table>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 } else  { 
// SE TRAE UN LISTADO DE TODOS LOS PERMISOS
$arrPermisos = array();
$query = "SELECT 
admin_permisos.idAdmin_permisos, 
detalle_general.Nombre AS Tipo, 
admin_permisos.Direccionweb, 
admin_permisos.Nombre
FROM `admin_permisos`
INNER JOIN `detalle_general` ON detalle_general.id_Detalle = admin_permisos.Tipo
ORDER BY Tipo, admin_permisos.Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPermisos,$row );
}
mysql_free_result($resultado);?>

<div>   
<div class="fleft"><h1>Listado de Permisos</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new='true'" ><input name="" type="button" value="Crear Permiso &raquo;" /></a>
</div>
<div class="clear"></div> 
</div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Tipo</th>
   <th>Nombre</th>
   <th>Direccion Web</th>
   <th width="80">Acciones</th>
  </tr> 
 </thead>
 <tbody> 
  <?php foreach ($arrPermisos as $permisos) { ?>
  <tr> 
   <td><?php echo $permisos['Tipo']; ?></td>
   <td><?php echo $permisos['Nombre']; ?></td>
   <td><?php echo $permisos['Direccionweb']; ?></td>
   <td>
    <a href="<?php echo $location; ?>?id=<?php echo $permisos['idAdmin_permisos']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
    <?php $ubicacion=$location.'?del='.$permisos['idAdmin_permisos'];?>
   <a onclick="msg('<?php echo $ubicacion ?>')" ><input type="image" src="img/icn_trash.png" title="Borrar"></a>
 </td> 
 </tr> 
 <?php } ?>	
 </tbody> 
 </table>
</div>
</article>
<div class="clear"></div>
       
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