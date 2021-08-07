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
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once 'core/config_app.php';
require_once 'core/datos_empresa.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
require_once 'core/sesion_cliente.php';
require_once 'core/mobile_components.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- InstanceBeginEditable name="doctitle" -->
	<title>Alertas</title>
	<!-- InstanceEndEditable -->
	<!-- InstanceBeginEditable name="head" -->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
    <script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>);
		  var mapOptions = {
			zoom: 15,
			scrollwheel: false,
			draggable: false,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		  var marker = new google.maps.Marker({
			  position: myLatlng,
			  map: map,
			  title:"Alerta"
		  });
		marker.setIcon('img/map_mi_ubicacion.png');
      }  
    </script>
<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->

<table class="tb_map">
	<tr height="10%">
		<td colspan="2">
			<div style="margin-top:10px;">
				<?php echo tag_text('title2','h1','Confirmar Alerta',$config_app);?>
			</div> 
		</td>
	</tr>
	<tr height="80%">
		<td colspan="2">
			<div id="map_canvas">
				<script type="text/javascript">window.onload=function(){initialize();};</script>
			</div>
		</td>
	</tr>
	<tr height="10%">
		<td width="50%">
			<?php echo link_btn('cancelar','principal.php'.$w,'Cancelar','',$config_app);?>
		</td>
		<td>
			<?php 
			//Se guardan las variables
			$xy = '';
			$xy .= '&idTipoAlerta='.$_GET['idTipoAlerta'];
			$xy .= '&cercanos='.$_GET['cercanos'];
			$xy .= '&contactar='.$_GET['contactar'];
			$xy .= '&desplegar='.$_GET['desplegar'];
			$xy .= '&idCliente='.$_GET['idCliente'];
			$xy .= '&tarea=1';
			echo link_btn('aceptar','tareas.php'.$w.$xy,'Confirmar','',$config_app);?>
		</td>
	</tr>
</table>
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>
