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
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "principal.php";
$location .= $w;

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
<title>Sosauto</title>
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
<a class="title_icn" href="#"><img src="img/icon_volver2.png" /></a>  
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
      <?php if($arrCliente['primer_ingreso']==1){?>
      <script type="text/javascript">
		window.onload=function(){MainActivity.MostrarAlarma()};
	  </script>
      <?php } ?>  
      <div class="text_content pd_top_5">
      <?php if($dispositivo=='android'){?>
      <a class="btn btn_blue" onclick="MainActivity.MenuAlarma()">Robo de Vehiculo</a>
      <?php } else { ?>
	  <a class="btn btn_blue" href="principal_alarma.php<?php echo $w ?>">Robo de Vehiculo</a>
	  <?php }?>
      <?php //====================================================================================================
	  // Se trae el listado con todas las empresas
		$arrAmistades = array();
		$query ="SELECT  Nombre, Fono
		FROM `clientes_contacto_empresas`
		WHERE idCliente='{$arrCliente['idCliente']}'";
		$resultado = mysql_query ($query, $dbConn);
		while ( $row = mysql_fetch_assoc ($resultado)) {
		array_push( $arrAmistades,$row );
		}
		mysql_free_result($resultado);?>
        <?php  foreach ($arrAmistades as $amistades) { ?>
        	<a class="btn btn_blue2" href="tel:<?php echo $amistades['Fono']; ?>" ><?php echo $amistades['Nombre']; ?></a>
        <?php }?>
        <?php //====================================================================================================
	  // Se trae el listado con todos los numeros definidos por el administrador
		$arrFonos = array();
		$query ="SELECT  Nombre, Fono
		FROM `mnt_fonos`";
		$resultado2 = mysql_query ($query, $dbConn);
		while ( $row = mysql_fetch_assoc ($resultado2)) {
		array_push( $arrFonos,$row );
		}
		mysql_free_result($resultado2);?>
        <?php  foreach ($arrFonos as $fonos) { ?>
        	<a class="btn btn_black" href="tel:<?php echo $fonos['Fono']; ?>" ><?php echo $fonos['Nombre']; ?></a>
        <?php }?>
     
       
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