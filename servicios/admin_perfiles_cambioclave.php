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
$location = "admin_perfiles_cambioclave.php";
//formulario para crear nivel
if ( !empty($_POST['submit']) ) {
	//Llamamos a las partes del formulario
	require_once 'AR2D2CFFDJFDJX1/xrxs_trans/cambio_clave.php';//creacion de variables
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/estilo01.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Cambio de clave</title>
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
<div class="title"><p>Cambio de clave</p></div>
	<div class="content">          
<div>  
<div class="fleft"><h1>Cambio de clave</h1></div>
<div class="clear"></div></div>

<table class="tableform">
<form  method="post">
	<tr>
    	<td><label>Clave actual</label></td>
        <td><input type="password" name="password"   placeholder="Clave actual"  required=""/><?php echo $errors[1] ?></td>
    </tr>
    <tr>
    	<td><label>Clave nueva</label></td>
        <td><input type="password" name="password_nueva"    placeholder="Clave nueva"  required=""/><?php echo $errors[2] ?></td>
    </tr>
    <tr>
    	<td><label>Repetir Clave nueva</label></td>
        <td><input  type="password" name="re-password_nueva" placeholder="Repetir Clave nueva"  required=""/> <?php echo $errors[3] ?></td>
    </tr>
    <tr>
    	<input name="idUsuario" type="hidden" value="<?php echo $arrUsuario['idUsuario']; ?>" />
        <input name="usuario" type="hidden" value="<?php echo $arrUsuario['usuario']; ?>" />
		<td colspan="2"><div class="fright"> <input name="submit" type="submit" value="Cambiar &raquo;" /> </div></td>
	</tr>
</form>
</table>


			
</div>
</div>        	
		<!-- InstanceEndEditable --> 
    	</div>
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>