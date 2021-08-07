<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 3);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';	
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                          Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "admin_usuarios.php";
//formulario para crear usuario
if ( !empty($_POST['submit']) )  {
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuarios_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuarios_listado_9.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/usuarios_listado.php';
}
//formulario para editar permiso
if ( !empty($_POST['submit_edit']) )  {
	//se agrega la nueva ubicacion
	$location .= "?id=".$_GET['id']."&modificacion=true"; 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuarios_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuarios_listado_10.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/usuarios_listado.php';
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
//se borra un dato
if ( !empty($_GET['del']) )     {require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/usuarios_listado.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plant1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Usuarios</title>
<!-- InstanceEndEditable -->
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/tabla.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
<script type='text/javascript' src='js/infogrid.js'></script>
<link rel="icon" type="image/png" href="img/mifavicon.png" />
<!-- InstanceBeginEditable name="head" -->



<!-- InstanceEndEditable -->
</head>

<body >
<?php require_once 'core/menu.php'; ?>
<div align="center">
<!-- InstanceBeginEditable name="Bodytext" -->
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($errors[5])) {echo $errors[5];}?>
<?php  if (isset($errors[6])) {echo $errors[6];}?>
<?php /////////////////////////////////////////////// EDICION  ///////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { 
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
usuarios_listado.usuario, 
usuarios_listado.tipo, 
usuarios_listado.email, 
usuarios_listado.Nombre, 
usuarios_listado.Estado
FROM `usuarios_listado`
WHERE usuarios_listado.idUsuario = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);?>

<?php if ( ! empty($_GET['modificacion']) ) { 
 
 echo '<h4 class="alert_sucess">Modificacion Realizada correctamente</h4>';
 
}?>
 
   
 <table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCIÓN CLASE </span></td>
          <td width="15%" align="center" valign="middle"><span class="Arial4">
			<script type="text/javascript" language="JavaScript">
            document.write (Muestrafecha());
         </script>
          <br />
          <span class="Arial2">
			<script type="text/javascript">
            window.onload=function(){startTime();}
        </script>
            <div id="reloj"></div>
          </span></span></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" class="borde_button">
          <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" >

  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
	
    <tbody>
   <tr>
                <td width="343" align="center" ><img src="./images/configuracion.png" width="200" height="200" /></td>
                <td width="481" align="left" bgcolor="#FFFFFF">
 
 
<form id="registrar_usuario" name="registrar_usuario"  method="POST" >
 
<table align="center" width="600px">
 
    <tr>
        <td colspan="2" align="center"><span class="Arial4">Registrar Nuevo Usuario</span></td>
    </tr>
    <tr>
        <td colspan="2" class="Arial2">Para registrar un usuario, s&oacute;lo debes llenar
        los siguientes campos y pulsar el bot&oacute;n <b>Registrar Usuario</b>. La cuenta del usuario, se activa inmediatamente.
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right" valign="middle" class="borde_button"></td>
   	</tr>
    <tr>
       <td class="Arial2"><label>Usuario</label></td>
       <td><input type="text" name=""  autocomplete="off" <?php if (isset($usuario)) {echo 'value="'.$usuario.'"';}else{echo 'value="'.$rowusr['usuario'].'"';}?> disabled="disabled"/></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Nombre Real</label></td>
       <td><input type="text" name="Nombre"  autocomplete="off" <?php if (isset($Nombre)) {echo 'value="'.$Nombre.'"';}else{echo 'value="'.$rowusr['Nombre'].'"';}?> required="required" /></td>
    </tr> 
    <tr>
       <td class="Arial2"><label>Correo electronico</label></td>
       <td><input type="text" name="email"  autocomplete="off" <?php if (isset($email)) {echo 'value="'.$email.'"';}else{echo 'value="'.$rowusr['email'].'"';}?> required="required" /></td>
    </tr>
    <tr>
	    <td class="Arial2">Tipo de usuario</td>
        <td>
		    <select name="tipo" required="" >
			<option value="">Seleccione un tipo</option>
			<option value="Administrador" <?php if ( $rowusr['tipo'] == 'Administrador' ) echo 'selected="selected"' ?>>Administrador</option>
			<option value="Normal" <?php if ( $rowusr['tipo'] == 'Normal' ) echo 'selected="selected"' ?>>Normal</option>
            </select>
        </td>
    </tr>
    <tr>
	    <td class="Arial2">Estado</td>
        <td>
		    <select name="Estado" required="" >
			<option value="">Seleccione un Estado</option>
			<option value="1" <?php if ( $rowusr['Estado'] == '1' ) echo 'selected="selected"' ?>>Activo</option>
			<option value="2" <?php if ( $rowusr['Estado'] == '2' ) echo 'selected="selected"' ?>>Inactivo</option>
            </select>
        </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
 	<tr>
        <td align="center" colspan="2">
            <input name="idUsuario" type="hidden" value="<?php echo $_GET['id']; ?>" />
            <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit_edit" value="Modificar Usuario" class="rojo_sombra">
        </td>
	</tr>
</table>
</form>
</td>
              </tr>
              
    </tbody>
<?php require_once 'core/footer.php';?> 

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
 
 <table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCIÓN CLASE </span></td>
          <td width="15%" align="center" valign="middle"><span class="Arial4">
			<script type="text/javascript" language="JavaScript">
            document.write (Muestrafecha());
         </script>
          <br />
          <span class="Arial2">
			<script type="text/javascript">
            window.onload=function(){startTime();}
        </script>
            <div id="reloj"></div>
          </span></span></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" class="borde_button">
          <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" >

  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
	
    <tbody>
   <tr>
                <td width="343" align="center" ><img src="./images/configuracion.png" width="200" height="200" /></td>
                <td width="481" align="left" bgcolor="#FFFFFF">
 
 
<form id="registrar_usuario" name="registrar_usuario"  method="POST" >
 
<table align="center" width="600px">
 
    <tr>
        <td colspan="2" align="center"><span class="Arial4">Registrar Nuevo Usuario</span></td>
    </tr>
    <tr>
        <td colspan="2" class="Arial2">Para registrar un usuario, s&oacute;lo debes llenar
        los siguientes campos y pulsar el bot&oacute;n <b>Registrar Usuario</b>. La cuenta del usuario, se activa inmediatamente.
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right" valign="middle" class="borde_button"></td>
   	</tr>
    <tr>
       <td class="Arial2"><label>Usuario</label></td>
       <td><input type="text" name="usuario"  autocomplete="off" <?php if (isset($usuario)) {echo 'value="'.$usuario.'"';}?> required="required"/></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Nombre Real</label></td>
       <td><input type="text" name="Nombre"  autocomplete="off" <?php if (isset($Nombre)) {echo 'value="'.$Nombre.'"';}?> required="required"/></td>
    </tr> 
    <tr>
       <td class="Arial2"><label>Correo electronico</label></td>
       <td><input type="text" name="email"  autocomplete="off" <?php if (isset($email)) {echo 'value="'.$email.'"';}?> required="required" /></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Contrase&ntilde;a</label></td>
       <td><input type="password" name="password"  autocomplete="off" <?php if (isset($password)) {echo 'value="'.$password.'"';}?>  required="required"/></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Confirme la contrase&ntilde;a</label></td>
       <td><input type="password" name="repassword"  autocomplete="off" <?php if (isset($repassword)) {echo 'value="'.$repassword.'"';}?>  required="required"/></td>
    </tr>
    <tr>
	    <td class="Arial2">Tipo de usuario</td>
        <td>
		    <select name="tipo" required="required" >
			<option value="">Seleccione un tipo</option>
			<option value="Administrador" <?php if(isset($tipo) && $tipo == 'Administrador'){ echo 'selected="selected"'; } ?>>Administrador</option>
			<option value="Normal" <?php if(isset($tipo) && $tipo == 'Normal'){ echo 'selected="selected"'; } ?>>Normal</option>
            </select>
        </td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
 	<tr>
        <td align="center" colspan="2">
            <input name="Estado" type="hidden" value="1" />
            <input name="mode"   type="hidden" value="<?php echo neomode ?>">
            <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit" value="Registrar Usuario" class="rojo_sombra">
        </td>
	</tr>
</table>
</form>
</td>
              </tr>
              
    </tbody>
<?php require_once 'core/footer.php';?> 

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
WHERE usuarios_listado.mode='".neomode."'
ORDER BY usuarios_listado.tipo ASC, usuarios_listado.usuario ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>        
		
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCIÓN CLASE </span></td>
          <td width="15%" align="center" valign="middle"><span class="Arial4">
			<script type="text/javascript" language="JavaScript">
            document.write (Muestrafecha());
         </script>
          <br />
          <span class="Arial2">
			<script type="text/javascript">
            window.onload=function(){startTime();}
        </script>
            <div id="reloj"></div>
          </span></span></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" class="borde_button">
          <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>?new=true" >Crear Usuario</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" >

  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
	<thead>
      <tr>
        <th width="200" align="center" >ID Usuario</th>
        <th align="center" >Nombre del usuario</th>
        <th width="100" align="center" >Tipo de usuario</th>
        <th width="100" align="center" >Estado</th>
        <th width="80" align="center" >Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($arrUsers as $usuarios) { ?>
    <tr>
        <td width="200" align="center"><?php echo $usuarios['usuario']; ?></td>
        <td align="center"><?php echo $usuarios['Nombre']; ?></td>
        <td width="100" align="center"><?php echo $usuarios['tipo']; ?></td>
        <td width="100" align="center"><?php echo $usuarios['estado']; ?></td>
        <td width="80"  align="center" class="options-width">
          <a href="<?php echo $location.'?id='.$usuarios['idUsuario']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a>
          <?php $ubicacion=$location.'?del='.$usuarios['idUsuario'];?>
          <a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>	
       </td>
    </tr>
<?php } ?>
    </tbody>
<?php require_once 'core/footer.php';?>              
<?php } ?>
<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>
