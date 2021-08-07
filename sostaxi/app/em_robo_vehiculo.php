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
	<title>Robo Vehiculo</title>
	<!-- InstanceEndEditable -->
	<!-- InstanceBeginEditable name="head" -->

	<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['geo']) ) { ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
    <script type="text/javascript">
	
	var realLat=<?php echo $lat; ?>;
	var realLong=<?php echo $lon; ?>;
	
		function initialize() {
			
			var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>);

			var myOptions = {
				zoom: 17,
				center: myLatlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

			marker = new google.maps.Marker({
				draggable: true,
				position: myLatlng,
				map: map,
				icon: 'img/map_mi_ubicacion.png',
				title: "Tu Ubicacion"
			});

			google.maps.event.addListener(marker, 'dragend', function (event) {

				realLat = event.latLng.lat();
				realLong = event.latLng.lng();
	
			});
					
			
		}  
		function Alerta(){
				<?php 
				//Se construye la direccion
				$xy = 'tareas.php'.$w;
				$xy .= '&idTipoAlerta='.$_GET['idTipoAlerta'];
				$xy .= '&cercanos='.$_GET['cercanos'];
				$xy .= '&contactar='.$_GET['contactar'];
				$xy .= '&desplegar='.$_GET['desplegar'];
				$xy .= '&idCliente='.$_GET['idCliente'];
				$xy .= '&idVehiculo='.$_GET['idVehiculo'];
				$xy .= '&tarea=2';
				echo 'var pagina="'.$xy.'";';
				?>
				window.location.href= pagina+'&realLat='+realLat+'&realLong='+realLong;
		};
    </script>
   
<table class="tb_map">
	<tr height="5%">
		<td colspan="2">
			<div style="margin-top:10px;">
				<?php echo tag_text('title2','h1','Confirmar robo de vehiculo',$config_app);?>
			</div> 
		</td>
	</tr>
	<tr height="85%">
		<td colspan="2">
			<div id="map_canvas">
				<script type="text/javascript">window.onload=function(){initialize();};</script>
			</div>
		</td>
	</tr>
	<tr height="10%">
		<td width="50%">
			<?php echo link_btn('cancelar','em_robo_vehiculo.php'.$w.$xy,'Cancelar','',$config_app);?>
		</td>
		<td>
			<?php echo link_btn_java('aceptar','Alerta()','Confirmar','',$config_app);?>
		</td>
	</tr>
</table> 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
// Se trae el listado con todos los vehiculos
$arrVehiculos = array();
$query ="SELECT 
clientes_vehiculos.idVehiculo, 
clientes_vehiculos.PPU, 
vehiculos_marcas.Nombre AS marca_vehiculo,
vehiculos_modelos.Nombre AS modelo_vehiculo,
(SELECT Nombre FROM clientes_vehiculos_img WHERE idVehiculo = clientes_vehiculos.idVehiculo LIMIT 1 ) AS imagen
FROM `clientes_vehiculos`
LEFT JOIN `vehiculos_marcas`   ON vehiculos_marcas.idMarca    = clientes_vehiculos.idMarca
LEFT JOIN `vehiculos_modelos`  ON vehiculos_modelos.idModelo  = clientes_vehiculos.idModelo
WHERE idCliente='{$arrCliente['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVehiculos,$row );
}
mysql_free_result($resultado);
//Se toman las variables de ubicacion
$xy = '';
$xy .= '&idTipoAlerta='.$_GET['idTipoAlerta'];
$xy .= '&cercanos='.$_GET['cercanos'];
$xy .= '&contactar='.$_GET['contactar'];
$xy .= '&desplegar='.$_GET['desplegar'];
$xy .= '&idCliente='.$_GET['idCliente']; 
$xy .= '&geo=true';
?>

<table class="height100">
	<tr height="90%">
		<td> 
			<?php //opciones
			$table_list = ''; 
			$table_list.= $config_app['list_shadow'].' '
			$table_list.= $config_app['list_color_border'].' '
			$table_list.= $config_app['list_sep'].' '
			$table_list.= $config_app['list_width'].' '
			$table_list.= $config_app['list_alin'] ?>
			<table class="tb_lister <?php echo $table_list;?>">
				<?php  foreach ($arrVehiculos as $vehiculos) { ?>  
				<tr class="<?php echo $config_app['list_deg'] ?>">
					<td width="30%">
						<?php if($vehiculos['imagen']==''){?>
							<img src="img/vehiculo.jpg" class="<?php echo $config_app['list_border'] ?>" />
						<?php }else{?>
							<img src="upload/<?php echo $vehiculos['imagen']; ?>" class="<?php echo $config_app['list_border'] ?>" />
						<?php }?>
					</td>
					<td width="70%">
						<a href="em_robo_vehiculo.php<?php echo $w.$xy.'&idVehiculo='.$vehiculos['idVehiculo'] ?>"  >
							<div class="lister_content" >
								<h1 class="<?php echo $config_app['list_tittle_size'].' '.$config_app['list_tittle_color'] ?>">Datos del Vehiculo</h1>    
								<p class="<?php echo $config_app['list_text_size'].' '.$config_app['list_text_color'] ?>"><?php echo $vehiculos['marca_vehiculo'].' '.$vehiculos['modelo_vehiculo'] ?></p>
								<p class="<?php echo $config_app['list_text_size'].' '.$config_app['list_text_color'] ?>"><?php echo 'Patente '.$vehiculos['PPU'] ?></p>    
							</div>
						</a> 
					</td>
				</tr>
				<?php } ?>
			</table>      	
		</td>
	</tr>
	<tr height="10%">
		<td width="100%">
			<?php echo link_btn('cancelar','principal.php'.$w,'Cancelar','',$config_app);?>
		</td>
	</tr>
</table>
 
<?php } ?>

<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>
