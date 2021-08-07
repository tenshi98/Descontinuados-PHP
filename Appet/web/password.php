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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
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
//Cargamos la ubicacion 
$location = "password.php";
//formulario para registrarse
if ( !empty($_POST['submit_update']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_10.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_listado.php';
}
?>
<!DOCTYPE HTML>
<html lang="en-US"><!-- InstanceBegin template="/Templates/plant1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Cambiar contraseña</title>
<!-- InstanceEndEditable -->
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" type="text/css" href="style/type/museo.css" media="all" />
<link rel="stylesheet" type="text/css" href="style/type/ptsans.css" media="all" />
<link rel="stylesheet" type="text/css" href="style/type/charis.css" media="all" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script type="text/javascript" src="style/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="style/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="style/js/jquery.aw-showcase.js"></script>
<script type="text/javascript" src="style/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="style/js/carousel.js"></script>
<script type="text/javascript" src="style/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="style/js/jquery.superbgimage.min.js"></script>
<script type="text/javascript" src="style/js/jquery.slickforms.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
	$('.forms').dcSlickForms();
});
</script>
<script type="text/javascript">

$(document).ready(function()
{
	$("#showcase").awShowcase(
	{
		content_width:			900,
		content_height:			400,
		auto:					true,
		interval:				3000,
		continuous:				false,
		arrows:					true,
		buttons:				true,
		btn_numbers:			true,
		keybord_keys:			true,
		mousetrace:				false, /* Trace x and y coordinates for the mouse */
		pauseonover:			true,
		stoponclick:			false,
		transition:				'fade', /* hslide/vslide/fade */
		transition_delay:		0,
		transition_speed:		500,
		show_caption:			'onload' /* onload/onhover/show */
	});
});

</script>
<!-- InstanceBeginEditable name="head" -->
<script>
// This adds 'placeholder' to the items listed in the jQuery .support object. 
jQuery(function() {
   jQuery.support.placeholder = false;
   test = document.createElement('input');
   if('placeholder' in test) jQuery.support.placeholder = true;
});
// This adds placeholder support to browsers that wouldn't otherwise support it. 
$(function() {
   if(!$.support.placeholder) { 
      var active = document.activeElement;
      $(':text').focus(function () {
         if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
            $(this).val('').removeClass('hasPlaceholder');
         }
      }).blur(function () {
         if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
            $(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
         }
      });
      $(':text').blur();
      $(active).focus();
      $('form:eq(0)').submit(function () {
         $(':text.hasPlaceholder').val('');
      });
   }
});
</script>
<!-- InstanceEndEditable -->
</head>
<body>
<?php require_once 'core/background.php'; ?>
<div id="wrapper">
<?php require_once 'core/head.php'; ?>
  <div class="clear"></div>
  <?php require_once 'core/menu.php'; ?>
  <div id="container" class="opacity">
  <!-- InstanceBeginEditable name="content" -->

 <h3>Cambio de Contraseña</h3>
  <p>Todos los campos marcados con * son Obligatorios<br/>
  La sesion se cerrara una vez cambiada la clave</p>
  <div class="hr1"></div>

  <table>
  <form class="form" method="post"> 
  <tr>
    <td width="160"><label>Clave Antigua</label></td>
    <td width="500"><input type="password" name="oldpassword" placeholder="Clave Antigua" required  /></td>
    <td width="200"><?php  if (isset($errors[1])) {echo $errors[1];}?></td>
  </tr>
  <tr>
    <td><label>Nueva Clave</label></td>
    <td><input type="password" name="password" placeholder="Nueva Clave" required  /></td>
    <td><?php  if (isset($errors[2])) {echo $errors[2];}?></td>
  </tr>
  <tr>
    <td><label>Reingresar Clave</label></td>
    <td><input type="password" name="repassword" placeholder="Reingresar Nueva Clave" required  /></td>
    <td><?php  if (isset($errors[3])) {echo $errors[3];}?></td>
  </tr>
  
 
  <tr>
    <td>
    <input type="hidden" value="<?php echo $arrCliente['idCliente']; ?>"  name="idCliente" />
    </td>
    <td><input type="submit" value="Cambiar Clave" class="submit" name="submit_update" /></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>

  <!-- InstanceEndEditable --> 
  </div>
  <?php require_once 'core/footer.php'; ?>
</div>
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
<!-- InstanceEnd --></html>