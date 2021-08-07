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
$location = "admin_perfiles_trabajadores.php";
//formulario para crear trabajador
if ( !empty($_POST['submit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['new'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/trabajadores_listado.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/trabajadores_listado_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/trabajadores_listado.php';//se crean los datos
}
//formulario para editar trabajador
if ( !empty($_POST['submit_edit']) ) {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/trabajadores_listado.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/trabajadores_listado_2.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/trabajadores_listado.php';//se crean los datos
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )  {
	//agrego una nueva locacion
	$location .= "?view=".$_GET['emp'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/trabajadores_listado.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Trabajadores Listado</title>
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
<div class="title"><p>Trabajadores Listado</p></div>
<div class="content">        
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) {
// se traen los datos de un trabajador	
$query = "SELECT idEmpresa, Nombre, Telefono, Direccion, Cargo, Estado, cta_cte
FROM `trabajadores_listado`
WHERE idTrabajador = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowtrab = mysql_fetch_assoc ($resultado);
//obtengo el listado de empresas
$arrEmpresas = array();
$query = "SELECT idEmpresa, Abreviatura
FROM `empresas_listado` ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push($arrEmpresas,$row );
}
//se trae el estado del trabajador
$arrEstado = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general` 
WHERE Tipo = '2'  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push($arrEstado,$row );
}
?>

<div>  
<div class="fleft"><h1>Editar datos del Trabajador</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['emp']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Nombre</label></td>
		<td><input name="Nombre"  type="text" required="" value="<?php echo $rowtrab['Nombre']; ?>"/><?php echo $errors[1] ?></td>  
		<td><label>Cargo</label></td>
		<td width="250"><input name="Cargo"  type="text" required="" value="<?php echo $rowtrab['Cargo']; ?>"/><?php echo $errors[2] ?></td>  
	</tr>
    <tr>
    	<td><label>Direccion</label></td>
		<td><input name="Direccion"  type="text" required="" value="<?php echo $rowtrab['Direccion']; ?>"/><?php echo $errors[3] ?></td>
        <td><label>Telefono</label></td>
		<td><input name="Telefono"  type="text" required="" value="<?php echo $rowtrab['Telefono']; ?>"/><?php echo $errors[4] ?></td>  
	</tr>
    <tr>
    	<td><label>Empresa</label></td>
        <td><select name="idEmpresa" required="" >
			<option value="" selected>Seleccione una Empresa</option>
				<?php foreach ($arrEmpresas as $empresas ) { ?>
                <option value="<?php echo $empresas['idEmpresa']; ?>" <?php if ( $empresas['idEmpresa'] == $rowtrab['idEmpresa'] ) echo 'selected="selected"' ?>><?php echo $empresas['Abreviatura']; ?></option> 
				<?php } ?>
			</select><?php echo $errors[5] ?></td>
        <td><label>Estado</label></td>
        <td><select name="Estado" required="" >
			<option value="" selected>Seleccione un Estado</option>
				<?php foreach ($arrEstado as $estado ) { ?>
                <option value="<?php echo $estado['id_Detalle']; ?>" <?php if ( $estado['id_Detalle'] == $rowtrab['Estado'] ) echo 'selected="selected"' ?>><?php echo $estado['Nombre']; ?></option> 
				<?php } ?>
			</select></td>              
    </tr>
    <tr>
    	<td><label>Cta Cte/Rut</label></td>
		<td><input name="cta_cte"  type="text" value="<?php echo $rowtrab['cta_cte']; ?>"/></td>
        <td></td>
		<td></td>  
	</tr>
    <tr>
		<td colspan="3"></td>
        <input name="idTrabajador"  type="hidden" value="<?php echo $_GET['id'] ?>" />
		<td><div class="fright"> <input name="submit_edit" type="submit" value="Editar &raquo;" /> </div></td>
	</tr>
</form>
</table> 
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
<div>  
<div class="fleft"><h1>Crear nuevo Trabajador</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?view=<?php echo $_GET['new']?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Nombre</label></td>
		<td><input name="Nombre"  type="text" required="" /><?php echo $errors[1] ?></td>  
		<td><label>Cargo</label></td>
		<td width="250"><input name="Cargo"  type="text" required="" /><?php echo $errors[2] ?></td>  
	</tr>
    <tr>
    	<td><label>Direccion</label></td>
		<td><input name="Direccion"  type="text" required="" /><?php echo $errors[3] ?></td>
        <td><label>Telefono</label></td>
		<td><input name="Telefono"  type="text" required="" /><?php echo $errors[4] ?></td>  
	</tr>
    <tr>
    	<td><label>Cta Cte/Rut</label></td>
		<td><input name="cta_cte"  type="text"  /></td>
        <td></td>
		<td></td>  
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
//obtengo el listado de los empleados
$arrNombres = array();
$query = "SELECT 
trabajadores_listado.idTrabajador, 
trabajadores_listado.Nombre, 
trabajadores_listado.Telefono, 
trabajadores_listado.Direccion, 
trabajadores_listado.Cargo,
trabajadores_listado.cta_cte,
detalle_general.Nombre AS Estado
FROM `trabajadores_listado`
INNER JOIN `detalle_general`  ON detalle_general.id_Detalle   = trabajadores_listado.Estado
WHERE trabajadores_listado.idEmpresa = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNombres,$row );
}
 ?>
<div>  
<div class="fleft"><h1>Listado de Trabajadores</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new=<?php echo $_GET['view']?>" ><input name="" type="button" value="Crear Nuevo &raquo;" /></a></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Nombre</th>
   <th>Telefono</th>
   <th>Direccion</th>
   <th>Cargo</th>
   <th>Estado</th>
   <th>Cta Cte</th> 
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrNombres as $nombres) { ?>
  <tr> 
   <td><?php echo $nombres['Nombre']; ?></td>
   <td><?php echo $nombres['Telefono']; ?></td>
   <td><?php echo $nombres['Direccion']; ?></td>
   <td><?php echo $nombres['Cargo']; ?></td>
   <td><?php echo $nombres['Estado']; ?></td> 
   <td><?php echo $nombres['cta_cte']; ?></td>
   <td>
	<a href="<?php echo $location; ?>?id=<?php echo $nombres['idTrabajador']; ?>&emp=<?php echo $_GET['view']; ?>"><input type="image" src="img/icn_edit.png" title="Editar"></a>
    <?php $ubicacion=$location.'?del='.$nombres['idTrabajador'].'&emp='.$_GET['view'];?>
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