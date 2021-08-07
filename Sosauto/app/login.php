<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_3.php';
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
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_login.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_login_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_login.php';
}
$query_ini = "SELECT password, Rut, Estado FROM `clientes_listado` WHERE Imei = {$imei}";
$resultadox = mysql_query ($query_ini, $dbConn);
$row_cliente = mysql_fetch_assoc ($resultadox);
$nfilas_clientes = mysql_num_rows ($resultadox);
if($row_cliente['Estado']==1&&$nfilas_clientes!=0){
// definimos las sesiones
$_SESSION['Rut'] 	    = $row_cliente['Rut'];
$_SESSION['password']	= $row_cliente['password'];
// si todo esta bien te redirige hacia la pagina principal
header( 'Location: principal.php'.$w );
die;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo1.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="login_body">
  <div class="form_login">
  <?php  if (isset($errors[1])) {echo $errors[1];}?>                     
  <form method="post">
    <input type="text" name="Rut" placeholder="Rut Usuario" required="" id="rut" value="<?php if (isset($Rut)) { echo $Rut;}?>"  >
    <input type="submit" name="submit_login" value="Ingresar" class="btn btn_blue">
  </form>
  </div>
</div>
</body>
</html>