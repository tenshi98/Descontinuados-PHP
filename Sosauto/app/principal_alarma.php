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
<title>Ubicacion Robo</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->



<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
    <script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>);
		  var mapOptions = {
			zoom: 15,
			scrollwheel: false,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		  var marker = new google.maps.Marker({
			  position: myLatlng,
			  map: map,
			  title:"Hello World!"
		  });		
      }  
    </script>
    

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


      <div class="robo" >
          <div class="globo">
			<div id="map_canvas" style="width:100%; height:200px">
				<script type="text/javascript">window.onload=function(){initialize();};</script>
            </div>
          </div>
          <div class="text">
          <p>Tu ubicacion actual, si no es donde actualmente te encuentras actualiza la pantalla nuevamente</p>
          </div>
          <div class="button_robo">
          	<a class="btn btn_blue" href="<?php echo 'aviso_robo_vehiculo.php'.$w; ?>" >Aceptar</a>
          </div>
        <div class="clear"></div>
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