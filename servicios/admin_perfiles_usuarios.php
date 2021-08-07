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
$location = "admin_perfiles_usuarios.php";
//formulario para crear usuario
if ( !empty($_POST['submit']) )  {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/usuario_listado.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/usuario_listado_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/usuario_listado.php';//se crean los datos
}
//formulario para editar permiso
if ( !empty($_POST['submit_edit']) )  {
	//se agrega la nueva ubicacion
	$location .= "?id=".$_GET['id']; 
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/usuario_listado.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/usuario_listado_3.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_update/usuario_listado.php';//se crean los datos
}
//formulario para el cambio del estado del usuario
if ( !empty($_GET['estado']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_trans/usuario_estado.php';//se crean los datos
}
//formulario para agregar permisos de acceso a las transacciones
if ( !empty($_GET['prm_add']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_trans/usuario_prm_add.php';//se crean los datos
}
//formulario para borrar los permisos de acceso a las transacciones
if ( !empty($_GET['prm_del']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_trans/usuario_prm_del.php';//se crean los datos
}
//formulario para la asignacion de la empresa
if ( !empty($_POST['submit_emp']) ) {
	//se completa la direccion
	$location .= "?id=".$_GET['id'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_common/usuario_empresas.php';//creacion de variables
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_controller/usuario_empresas_1.php';//revision si estan vacias
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_insert/usuario_empresas.php';//se crean los datos
}

/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
if ( !empty($_GET['del']) )     {require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/usuario_listado.php';}
//se borra un dato
if ( !empty($_GET['del_emp']) )     {
	//agrego una nueva locacion
	$location .= "?id=".$_GET['id'];
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_form_del/usuario_empresas.php';}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Usuarios Listado</title>
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
<div class="title"><p>Usuarios Listado</p></div>
<div class="content">
<?php /////////////////////////////////////////////// EDICION  ///////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { 
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
usuarios_listado.usuario, 
usuarios_listado.tipo, 
usuarios_listado.email, 
usuarios_listado.web, 
usuarios_listado.Nombre, 
usuarios_listado.Rut, 
usuarios_listado.fNacimiento, 
usuarios_listado.Direccion,  
usuarios_listado.Fono, 
usuarios_listado.Pais, 
usuarios_listado.Ciudad, 
usuarios_listado.Comuna, 
usuarios_listado.Fax,
detalle_general.Nombre AS estado
FROM `usuarios_listado`
INNER JOIN `detalle_general`  ON detalle_general.id_Detalle   = usuarios_listado.Estado
WHERE usuarios_listado.idUsuario = {$_GET['id']}";
	$resultado = mysql_query ($query, $dbConn);
	$rowusr = mysql_fetch_assoc ($resultado);
// SE TRAE UN LISTADO DE TODAS LAS EMPRESAS
$arrEmpresa = array();
$query = "SELECT idEmpresa, Nombre
FROM `empresas_listado`
 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEmpresa,$row );
}
mysql_free_result($resultado);
// se trae un listado de todas las empresas  asignadas a un usuario
$arrEmpresalist = array();
$query = "SELECT 
usuarios_empresas.idUsremp ,
empresas_listado.Nombre AS nombre_emp
FROM `usuarios_empresas`
LEFT JOIN `empresas_listado`  ON empresas_listado.idEmpresa   = usuarios_empresas.idEmpresa
WHERE usuarios_empresas.idUsuario = {$_GET['id']} ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEmpresalist,$row );
}
mysql_free_result($resultado);
// SE TRAE UN LISTADO DE TODOS LOS PERMISOS ASIGNADOS SOLO A UN USUARIO
$arrPermisos = array();
$query =
"SELECT 
admin_permisos.idAdmin_permisos, 
admin_permisos.Nombre,
detalle_general.Nombre AS Tipo,
(SELECT COUNT(idPermisos) FROM usuarios_permisos WHERE idAdmin_permisos = admin_permisos.idAdmin_permisos AND idUsuario = {$_GET['id']}) AS contar,
(SELECT idPermisos FROM usuarios_permisos WHERE idAdmin_permisos = admin_permisos.idAdmin_permisos AND idUsuario = {$_GET['id']}) AS idpermiso
FROM `admin_permisos`
INNER JOIN `detalle_general` ON detalle_general.id_Detalle = admin_permisos.Tipo
ORDER BY Tipo ASC, Nombre ASC 
";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPermisos,$row );
}
mysql_free_result($resultado);?>
<div>   
<div class="fleft"><h1>Editar Datos de <?php echo $rowusr['Nombre']; ?></h1></div>
<div class="fright"><a class="fleft" href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<div>   
<div class="fleft"><h2>Editar Estado del usuario</h2></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Estado Actual</th>
   <th width="120">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
  <tr> 
   <td>El usuario Actualmente se encuentra <?php echo $rowusr['estado']; ?></td> 
   <td>
   <?php if ( $rowusr['estado']=='Activo' ) {?>   
   <a href="<?php echo $location; ?>?id=<?php echo $_GET['id']; ?>&estado=7">Desactivar</a>
   <?php } else {?>
   <a href="<?php echo $location; ?>?id=<?php echo $_GET['id']; ?>&estado=6">Activar</a>
   <?php }?>
  </td> 
 </tr>	 
 </tbody> 
 </table>
</div>
</article>
<div class="clear"></div>

<div>   
<div class="fleft"><h2>Editar Datos Básicos</h2></div>
<div class="clear"></div></div>

<table class="tableform">
<form action="" method="post">
<tr>
	<td><label>Nick del usuario</label></td>
	<td><input type="text" name="usuario" placeholder="Nick del usuario" value="<?php echo $rowusr['usuario']; ?>"  required=""/><?php echo $errors[1] ?></td>
    <td><label>Nombre del usuario</label></td>
	<td><input type="text" name="nombre" placeholder="Nombre real del usuario" value="<?php echo $rowusr['Nombre']; ?>"required=""/><?php echo $errors[2] ?></td>
</tr>
<tr>
	<td><label>Fecha de nacimiento</label></td>
	<td><input type="date" name="fNacimiento" placeholder="Fecha de nacimiento del usuario (dd-mm-aaaa)" value="<?php echo $rowusr['fNacimiento']; ?>" /></td>
    <td><label>Rut</label></td>
    <?php //////////////////////// verifica si el rut esta en 0, si es asi no muestra nada ///////////////////////////////////////////////////// 
if ($rowusr['Rut']==0) { ?>
	<td><input type="text" name="rut" placeholder="Rut" required=""/><?php echo $errors[3] ?></td>
<?php } else { ?>
	<td><input type="text" name="rut" placeholder="Rut" value="<?php echo $rowusr['Rut']; ?>" required=""/><?php echo $errors[3] ?></td> 
<?php } ?>   
</tr>
<tr>
	<td><label>Pais</label></td>
	<td><input type="text" name="pais"  placeholder="Pais"  value="<?php echo $rowusr['Pais']; ?>" /></td>
    <td><label>Ciudad</label></td>
	<td><input type="text" name="ciudad" placeholder="Ciudad" value="<?php echo $rowusr['Ciudad']; ?>" /></td>
</tr>
<tr>
	<td><label>Comuna</label></td>
	<td><input type="text" name="comuna" placeholder="Comuna" value="<?php echo $rowusr['Comuna']; ?>"  required=""/><?php echo $errors[4] ?></td>
    <td><label>Direccion</label></td>
	<td><input type="text" name="direccion" placeholder="Direccion" value="<?php echo $rowusr['Direccion']; ?>"  required=""/><?php echo $errors[5] ?></td>
</tr>
<tr>
	<td><label>Telefono</label></td>
	<td><input type="text" name="fono" placeholder="Telefono de contacto" value="<?php echo $rowusr['Fono']; ?>" /></td>
    <td><label>Fax</label></td>
	<td><input type="text" name="fax" placeholder="Fax de contacto" value="<?php echo $rowusr['Fax']; ?>" /></td>
</tr>
<tr>
	<td><label>Correo electronico</label></td>
	<td colspan="3"><input type="text" name="email" placeholder="Correo electronico" value="<?php echo $rowusr['email']; ?>" required=""/><?php echo $errors[6] ?></td>
</tr>
<tr>
	<td><label>Sitio Web</label></td>
	<td colspan="3"><input type="text" name="web" placeholder="Sitio Web" value="<?php echo $rowusr['web']; ?>" /></td>
</tr>
<tr>
	<td><label>Tipo de usuario</label></td>
	<td>
    <select name="tipo" required="">
	  <option value="">Seleccione un tipo</option>
      <option value="Admin" <?php if ( $rowusr['tipo'] == 'Admin' ) echo 'selected="selected"' ?>>Admin</option>
      <option value="Operador" <?php if ( $rowusr['tipo'] == 'Operador' ) echo 'selected="selected"' ?>>Operador</option>
      <option value="Empresa"<?php if ( $rowusr['tipo'] == 'Empresa' ) echo 'selected="selected"' ?>>Empresa</option>
	</select> <?php echo $errors[5] ?>
    </td>
</tr>
<tr><input name="idUsuario" type="hidden" value="<?php echo $_GET['id']; ?>" />
	<td colspan="4"><div class="fright"> <input name="submit_edit" type="submit" value="Editar Datos &raquo;" /></div></td>
</tr>
</form>
</table>

<div>   
<div class="fleft"><h2>Editar Empresa Asignada</h2></div>
<div class="clear"></div></div>

<table class="tableform">
<form action="" method="post">
<tr>
	<td><label>Listado de Empresas</label></td>
	<td> <select name="idEmpresa">
<option value="" selected>Seleccione una Empresa</option>
<?php foreach ( $arrEmpresa as $empresa ) { ?>
<option value="<?php echo $empresa['idEmpresa']; ?>" ><?php echo $empresa['Nombre']; ?></option>
<?php } ?></select> <?php echo $errors[1] ?>
 </td>
 	<input name="idUsuario"  type="hidden" value="<?php echo $_GET['id']; ?>" />
	<td colspan="4"><div class="fright"> <input name="submit_emp" type="submit" value="Asignar &raquo;" /></div></td>
</tr>
</form>
</table>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Empresas ya asignadas</th>
   <th width="80">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrEmpresalist as $empresalist) { ?>
  <tr> 
   <td><?php echo $empresalist['nombre_emp']; ?></td>
   <td>
   <?php $ubicacion=$location.'?id='.$_GET['id'].'&del_emp='.$empresalist['idUsremp'];?>
   <a onclick="msg('<?php echo $ubicacion ?>')" ><input type="image" src="img/icn_trash.png" title="Borrar"></a>  
 </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>




<div>   
<div class="fleft"><a name="permisos" id="permisos"></a><h2>Editar listado de permisos asignados</h2></div>
<div class="clear"></div></div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>Permiso</th>
   <th width="120">Acciones</th> 
  </tr> 
 </thead>
 <tbody> 
 <?php foreach ($arrPermisos as $permiso) { ?>
  <tr> 
   <td><?php echo $permiso['Tipo']; ?> - <?php echo $permiso['Nombre']; ?></td> 
   <td>
   <?php if ( $permiso['contar']=='1' ) {?>   
   <a href="<?php echo $location; ?>?id=<?php echo $_GET['id']; ?>&prm_del=<?php echo $permiso['idpermiso']; ?>">Desactivar</a>
   <?php } else {?>
   <a href="<?php echo $location; ?>?id=<?php echo $_GET['id']; ?>&prm_add=<?php echo $permiso['idAdmin_permisos']; ?>">Activar</a>
   <?php }?>
  </td> 
 </tr> 
 <?php } ?>	 
 </tbody> 
 </table>
</div>
</article>
<div class="clear"></div>

<div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>


<?php /////////////////////////////////////////////// VER /////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// SE TRAEN LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
usuarios_listado.usuario, 
usuarios_listado.tipo, 
usuarios_listado.email, 
usuarios_listado.web, 
usuarios_listado.Nombre, 
usuarios_listado.Rut, 
usuarios_listado.fNacimiento, 
usuarios_listado.Direccion,  
usuarios_listado.Fono,  
usuarios_listado.Pais, 
usuarios_listado.Ciudad, 
usuarios_listado.Comuna, 
usuarios_listado.Fax,
detalle_general.Nombre AS estado,
empresas_listado.Nombre AS empresa
FROM `usuarios_listado`
INNER JOIN `detalle_general`  ON detalle_general.id_Detalle   = usuarios_listado.Estado
LEFT JOIN `empresas_listado`  ON empresas_listado.idEmpresa   = usuarios_listado.idEmpresa
WHERE usuarios_listado.idUsuario = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
//Se tre un listado de todas las empresas asignadas
$arrEmpresas = array();
$query = "SELECT 
empresas_listado.Nombre
FROM `usuarios_empresas`
LEFT JOIN `empresas_listado`   ON empresas_listado.idEmpresa   = usuarios_empresas.idEmpresa
WHERE usuarios_empresas.idUsuario = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEmpresas,$row );
}
mysql_free_result($resultado);
//SE TRAEN TODOS LOS PERMISOS DADOS A UN USUARIO
$arrPermisos = array();
$query = "SELECT 
detalle_general.Nombre AS nombre_tipo,
admin_permisos.Nombre AS nombre_permiso
FROM `usuarios_permisos`
LEFT JOIN `admin_permisos`   ON admin_permisos.idAdmin_permisos   = usuarios_permisos.idAdmin_permisos
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle        = admin_permisos.Tipo
WHERE usuarios_permisos.idUsuario = {$_GET['view']}
ORDER BY nombre_tipo ASC, nombre_permiso ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPermisos,$row );
}
mysql_free_result($resultado);?>
<div>   
<div class="fleft"><h1>Detalles de <?php echo $rowusr['Nombre']; ?></h1></div>
<div class="fright">
	<a class="fleft" href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a>
	<a class="fleft" href="<?php echo $location; ?>?id=<?php echo $_GET['view']; ?>" ><input name="" type="button" value="Editar Datos &raquo;" /></a>
</div>
<div class="clear"></div> </div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0">
<thead><tr> 
   <th colspan="4">Estado Actual</th>
</tr></thead>
<tbody>
<tr><td colspan="4">El usuario Actualmente se encuentra <?php echo $rowusr['estado']; ?></td></tr>
<tr class="title"><td colspan="4"><strong>Datos Básicos</strong></td></tr>
<tr><td colspan="2"><strong>Dirección : </strong><?php echo $rowusr['Direccion']; ?></td>
    <td colspan="2"><strong>Fono : </strong><?php echo $rowusr['Fono']; ?></td></tr>
<tr><td colspan="2"><strong>Pais : </strong><?php echo $rowusr['Pais']; ?></td>
    <td colspan="2"><strong>Fax : </strong><?php echo $rowusr['Fax']; ?></td></tr>
<tr><td colspan="2"><strong>Ciudad : </strong><?php echo $rowusr['Ciudad']; ?></td>
    <td colspan="2"><strong>Correo : </strong><?php echo $rowusr['email']; ?></td></tr>
<tr><td colspan="2"><strong>Comuna : </strong><?php echo $rowusr['Comuna']; ?></td>
    <td colspan="2"><strong>Web : </strong><?php echo $rowusr['web']; ?></td></tr>
<tr><td colspan="2"><strong>Rut : </strong><?php echo $rowusr['Rut']; ?></td>
    <td colspan="2"><strong>F.Nacimiento : </strong><?php echo Fecha_estandar($rowusr['fNacimiento']);  ?></td></tr>  
     
<tr class="title"><td colspan="4"><strong>Empresas Asignadas</strong></td></tr> 
<?php foreach ($arrEmpresas as $empresas) { ?>
  <tr> 
   <td colspan="4"><?php echo $empresas['Nombre']; ?></td> 
 </tr> 
<?php } ?>
<tr class="title"><td colspan="4"><strong>Permisos Asignados</strong></td></tr>
<?php foreach ($arrPermisos as $permiso) { ?>
  <tr> 
   <td><?php echo $permiso['nombre_tipo']; ?></td><td colspan="3"><?php echo $permiso['nombre_permiso']; ?></td> 
 </tr> 
<?php } ?>
</tbody>  
</table>
</div>
</article>
<div class="clear"></div>

<div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div></div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
<div>   
<div class="fleft"><h1>Crear Nuevo Usuario</h1></div>
<div class="fright"><a href="<?php echo $location; ?>" ><input name="" type="button" value="Volver &raquo;" /></a></div>
<div class="clear"></div> 
</div>   

<table class="tableform">
<form action="" method="post">
	<tr>
		<td><label>Usuario</label></td>
		<td width="25%"><input name="usuario"  type="text" required="" /><?php echo $errors[1] ?></td>
        <td><label>Nombre Real</label></td>
		<td><input name="nombre"  type="text" required="" /><?php echo $errors[2] ?></td> 
	</tr>
    <tr>
		<td><label>Password</label></td>
		<td><input name="password"  type="text" required="" /><?php echo $errors[3] ?></td>
        <td><label>Repetir password</label></td>
		<td><input name="repassword"  type="text" required="" /><?php echo $errors[3] ?></td> 
	</tr>
    <tr>
		<td><label>Correo electronico</label></td>
		<td colspan="3"><input name="email"  type="text" required="" /><?php echo $errors[4] ?></td> 
	</tr>
    <tr>
		<td><label>Tipo de Usuario</label></td>
		<td><select name="tipo" required="">
				<option value="">Seleccione un tipo</option>
				<option value="Admin">Admin</option>
				<option value="Operador">Operador</option>
				<option value="Empresa">Empresa</option>
			</select><?php echo $errors[5] ?></td>
        <td></td>
		<td></td> 
	</tr>
    <tr>
		<td colspan="3"><input name="estado"  type="hidden" value="6" /></td>
		<td><div class="fright"> <input name="submit" type="submit" value="Crear Usuario &raquo;" /> </div></td>
	</tr>
</form>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
// SE TRAE UN LISTADO DE TODOS LOS USUARIOS
$arrUsers = array();
$query = "SELECT 
usuarios_listado.idUsuario,
usuarios_listado.usuario,
usuarios_listado.tipo, 
usuarios_listado.Nombre,
detalle_general.Nombre AS estado
FROM `usuarios_listado`
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = usuarios_listado.Estado
ORDER BY usuarios_listado.tipo ASC, usuarios_listado.usuario ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>        
		
<div>   
<div class="fleft"><h1>Listado de usuarios</h1></div>
<div class="fright"><a href="<?php echo $location; ?>?new='true'" ><input name="" type="button" value="Crear Usuario &raquo;" /></a></div>
<div class="clear"></div> </div>

<article class="module width_full">            
<div class="module_content">
<table class="tablesorter" cellspacing="0"> 
 <thead> 
  <tr> 
   <th>ID Usuario</th>
   <th>Nombre del usuario</th> 
   <th width="120">Tipo de usuario</th> 
   <th width="120">Estado</th>
   <th width="80">Acciones</th>
  </tr> 
 </thead>
 <tbody> 
  <?php foreach ($arrUsers as $usuarios) { ?>
  <tr> 
   <td><?php echo $usuarios['usuario']; ?></td> 
   <td><?php echo $usuarios['Nombre']; ?></td> 
   <td><?php echo $usuarios['tipo']; ?></td>
   <td><?php echo $usuarios['estado']; ?></td> 
   <td>
    <a href="<?php echo $location; ?>?view=<?php echo $usuarios['idUsuario']; ?>">
    <input type="image" src="img/icn_categories.png" title="Ver"></a>
    <a href="<?php echo $location; ?>?id=<?php echo $usuarios['idUsuario']; ?>">
    <input type="image" src="img/icn_edit.png" title="Editar"></a>  
    <?php $ubicacion=$location.'?del='.$usuarios['idUsuario'];?>
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