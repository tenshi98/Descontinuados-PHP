<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_login']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_4.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_login.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla0.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Login</title>
<!-- InstanceEndEditable -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href="css/pure.css" rel="stylesheet" type="text/css" />
<link href="css/estilo1.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<table width="100%" height="100%" >
  <tr bgcolor="#fafafa">
    <td colspan="5" class="body">
	<!-- InstanceBeginEditable name="Body_text" -->
    <?php  if (isset($errors[1])) {echo $errors[1];}?>
    <?php  if (isset($errors[2])) {echo $errors[2];}?>
    <form class="pure-form pure-form-stacked" method="post">
    <legend>Ingrese sus datos para iniciar sesion</legend>
      	<fieldset>
            <input type="text"     class="pure-input-1" placeholder="Usuario"  name="usuario"  <?php if (isset($usuario))  {echo 'value="'.$usuario.'"';}?>>
            <input type="password" class="pure-input-1" placeholder="Password" name="password" <?php if (isset($password)) {echo 'value="'.$password.'"';}?>>
        </fieldset>
    
        <input type="submit" class="pure-button pure-button-4 pure-input-1" name="submit_login" value="Ingresar">
        <a href="ini_register.php<?php echo $w ?>" class="pure-button pure-button-4 pure-input-1 margin_top_5px">Registrarse</a>
        <a href="ini_recover.php<?php echo $w ?>" class="pure-button pure-button-4 pure-input-1 margin_top_5px">Recuperar Password</a>
    </form>
	<!-- InstanceEndEditable --> 
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
