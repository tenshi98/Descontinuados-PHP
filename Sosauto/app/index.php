<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once 'core/url.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                                      Ejecucion del codigo                                                      */
/**********************************************************************************************************************************/
//Se revisa si el dispositivo esta registrado
$query = "SELECT Rut FROM `clientes_listado` WHERE Imei = '".$_GET['IMEI']."'";
$resultado = mysql_query ($query, $dbConn);
$número_filas = mysql_num_rows($resultado);
$row_data = mysql_fetch_assoc ($resultado);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_login.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_login_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_login.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Index</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<style>
body {
	background-color: #00548c;
	background-image: url(img/background_index.png);
	background-repeat: no-repeat;
	background-position: center center;
	padding-top: 40%;
}
.index {
	width: 200px;
	margin-right: auto;
	margin-left: auto;
	height: 200px;
}
.index img {
	height: 100%;
	width: 100%;
}
</style>
<?php if($número_filas!=1){?>
<meta http-equiv="refresh" content="5;URL=login.php<?php echo $w ?>" />
<?php } ?>
</head>
<body>
<div class="index">
<img src="img/logo.png" width="384" height="384" /> 
<?php if($número_filas==1){?>
<form method="post" name="myForm" id="myForm">
    <input type="hidden" name="Rut" placeholder="Rut Usuario" required="" id="rut" value="<?php echo $row_data['Rut']; ?>"  >
    <input type="hidden" name="submit" id="submit" value="Ingresar" class="btn btn_blue">
</form>


        
 <script type="text/javascript" language="javascript">
 var auto_refresh = setInterval(function() { submitform(); }, 10000);

function submitform()
{
  alert('test');
  document.getElementById("myForm").submit();
}

 </script>
  
<?php } ?>
</div>
</body>
</html>