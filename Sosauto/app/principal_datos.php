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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
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
//Cambio de usuario nuevo a visto
$query  = "UPDATE `clientes_listado` SET primer_ingreso='2' WHERE idCliente = '{$arrCliente['idCliente']}'";
$result = mysql_query($query, $dbConn);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo1.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/iscroll-lite.js?v4"></script>
<script type="text/javascript">
	var myScroll;
	function iScrollLoad() {
		myScroll = new iScroll('wrapper');
		enableFormsInIscroll();
	}
	
	function enableFormsInIscroll(){
	  [].slice.call(document.querySelectorAll('input, select, button, textarea')).forEach(function(el){
		el.addEventListener(('ontouchstart' in window)?'touchstart':'mousedown', function(e){
		  e.stopPropagation();
		})
	  })
	}
	
	document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	document.addEventListener('DOMContentLoaded', function () { setTimeout(iScrollLoad, 200); }, false);
</script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Opciones</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->


<!-- InstanceEndEditable -->
</head>

<body onload="loaded()">
<table height="100%" width="100%">
   <tr>
    <td class="head">
    <div class="item20">
	<!-- InstanceBeginEditable name="volver" -->
    <?php if($dispositivo=='android'){?>
    <a class="title_icn" onclick="MainActivity.MenuPrincipal()"><img src="img/icon_volver.png" /></a>  
    <?php } else { ?>
    <a class="title_icn" href="principal.php<?php echo $w ?>"><img src="img/icon_volver.png" /></a>
    <?php }?>    
	<!-- InstanceEndEditable --> 
    </div>
    <div class="item60"><?php require_once 'core/titulo.php';?></div>
    <div class="item20"><?php require_once 'core/compartir.php';?></div>
    </td>
  </tr>
  <tr>
    <td>
    <div id="wrapper">
	<div id="scroller">
	<!-- InstanceBeginEditable name="text" -->
      <div class="text_content pd_top_5">
		<h2>Modificacion de datos</h2>
        <a class="list" href='modusr_datos.php<?php echo $w; ?>'><span>Mi Perfil</span><br/>Modificar mis datos personales</a>
        <a class="list" href="modusr_vehiculos.php<?php echo $w; ?>"><span>Mis Vehiculos</span><br/>Modificar la lista de mis vehiculos</a>
        <a class="list" href="modusr_mis_alarmas.php<?php echo $w; ?>"><span>Mis Alarmas</span><br/>Hacer seguimiento a mis alarmas generadas</a>
        <a class="list" href="modusr_alarma.php<?php echo $w; ?>"><span>Preferencias Alarmas</span><br/>Modificar mis preferencias de envio y recepcion</a>
        <a class="list" href="modusr_contactos_amigos.php<?php echo $w; ?>"><span>Contactos - Amigos</span><br/>Crear o modificar mis contacto</a>
        <a class="list" href="modusr_contactos_empresas.php<?php echo $w; ?>"><span>Contactos - Empresas</span><br/>Crear o modificar mis empresas</a>
        <a class="list" href="salir.php<?php echo $w; ?>"><span>Salir</span><br/>Cerrar tu sesion</a>
       
      </div>  
      <!-- InstanceEndEditable -->
    </div>
    </div>
    </td>
  </tr>
  <tr>
    <td class="foot">
    <?php require_once 'core/footer.php';?> 
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>