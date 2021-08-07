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
require_once 'core/mobile_components.php';
/**********************************************************************************************************************************/
/*                                     Redireccion en caso de no tener sesion abierta                                             */
/**********************************************************************************************************************************/
if (empty($arrCliente) ) {
	header( 'Location: login.php'.$w.'&return_to1=notificaciones.php' );
	die;
}
/**********************************************************************************************************************************/
/*                                               Se ejecutan instrucciones                                                        */
/**********************************************************************************************************************************/
//Ubicacion 
$location= 'notificaciones.php'.$w;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Notificaciones</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script src="js/jquery.min.js"></script>
<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['vista']) ) {?>
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
			  title:"Hello World!"
		  });
		marker.setIcon('img/icn/map_mi_ubicacion.png');
      }  
</script>
<section class="tabs <?php echo $config_app['noti_width'].' '.$config_app['noti_border'].' '.$config_app['noti_shadow'].' '.$config_app['noti_aling'].' '.$config_app['noti_color'] ?>">
	<table class="tb_map">
		<tr height="80%">
			<td colspan="2">
				<div id="map_canvas" style=" min-height:200px;">
					<script type="text/javascript">window.onload=function(){initialize();};</script>
				</div>
			</td>
		</tr>
		<tr height="10%">
			<td colspan="2">
				<p>Confirmar Alerta</p>   
			</td>
		</tr>
		<tr height="10%">
			<td width="50%">
				<?php echo link_btn('cancelar',$location.'&view='.$_GET['view'].'&view_noti='.$_GET['view_noti'],'Cancelar','',$config_app); ?>
			</td>
			<td>
				<?php 
				//Se guardan las variables
				$xy = '';
				$xy .= '&idCliente='.$arrCliente['idCliente'];
				$xy .= '&idRobo='.$_GET['idAlerta'];
				$xy .= '&latitud='.$lat;
				$xy .= '&longitud='.$lon;
				$xy .= '&idAsaltado='.$_GET['idAsaltado'];
				$xy .= '&tarea=3';?>
				<?php echo link_btn('aceptar','tareas.php'.$w.$xy,'Confirmar','',$config_app); ?>
			</td>
		</tr>
	</table>
</section>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }elseif ( ! empty($_GET['view_robo_details']) ) {  
//Consulta de las vistas
$query = "SELECT 
robos_listado_avistados.Fecha AS fecha_vista,
robos_listado_avistados.Hora AS hora_vista,
robos_listado_avistados.Longitud,
robos_listado_avistados.Latitud,
clientes_listado.Nombre AS nombre_cliente,
clientes_listado.Apellido_Paterno AS apellido_cliente

FROM `robos_listado_avistados`
LEFT JOIN `clientes_listado`            ON clientes_listado.idCliente         = robos_listado_avistados.idCliente
WHERE robos_listado_avistados.idRobo={$_GET['view_robo']}  ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
 
 ?>
<section class="tabs <?php echo $config_app['noti_width'].' '.$config_app['noti_border'].' '.$config_app['noti_shadow'].' '.$config_app['noti_aling'].' '.$config_app['noti_color'] ?>"> 
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_data['Latitud']; ?>, <?php echo $row_data['Longitud']; ?>);
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
			  title:"Hello World!"
		  });
		marker.setIcon('img/icn/map_robo_vehiculo.png');
      }  
</script>
	<table class="tb_map">
		<tr height="70%">
			<td>
				<div id="map_canvas">
					<script type="text/javascript">window.onload=function(){initialize();};</script>
				</div>
			</td>
		</tr>
		<tr height="20%">
			<td class="textbox">
				<?php echo noti_text_new('h1','Detalles',$config_app);
				$texto_not  = $row_data['nombre_cliente'].' '.$row_data['apellido_cliente'].' vio tu vehiculo el '.Fecha_completa_alt($row_data['fecha_vista']).' a las '.$row_data['hora_vista'].' hrs';
				echo noti_text('h2',$texto_not,$config_app);?>
			</td>
		</tr>
		<tr height="10%">
			<td>
				<?php echo link_btn('cancelar',$location.$w.'&view_robo='.$_GET['view_robo'],'Cancelar','',$config_app); ?>
			</td>
		</tr>
	</table>
</section> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view_robo']) ) { 
//Consulta del robo
$query = "SELECT 
robos_listado.Fecha,
robos_listado.Hora,
robos_listado.Longitud,
robos_listado.Latitud,
clientes_vehiculos.PPU AS Patente,
vehiculos_marcas.Nombre AS marca,
vehiculos_modelos.Nombre AS modelo,
vehiculos_transmision.Nombre AS tipo_transmision,
alertas_tipos.Nombre AS tipo_alerta,
color_1.Nombre AS color_base,
color_2.Nombre AS color_comp,
clientes_vehiculos.Ffabricacion AS fecha_fabricacion,
clientes_vehiculos.N_Motor AS numero_motor,
clientes_vehiculos.N_Chasis AS numero_chasis,
clientes_vehiculos.Obs AS observaciones

FROM `robos_listado`
LEFT JOIN `clientes_vehiculos`            ON clientes_vehiculos.idVehiculo         = robos_listado.idVehiculo
LEFT JOIN `vehiculos_marcas`              ON vehiculos_marcas.idMarca              = clientes_vehiculos.idMarca
LEFT JOIN `vehiculos_modelos`             ON vehiculos_modelos.idModelo            = clientes_vehiculos.idModelo
LEFT JOIN `vehiculos_transmision`         ON vehiculos_transmision.idTransmision   = clientes_vehiculos.idTransmision
LEFT JOIN `vehiculos_colores`   color_1   ON color_1.idColorV                      = clientes_vehiculos.idColorV_1
LEFT JOIN `vehiculos_colores`   color_2   ON color_2.idColorV                      = clientes_vehiculos.idColorV_2
LEFT JOIN `alertas_tipos`                 ON alertas_tipos.idTipoAlerta            = robos_listado.idTipoAlerta
WHERE robos_listado.idRobo={$_GET['view_robo']}  ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
//Consulta de las vistas
$arrVistas = array();
$query = "SELECT 
robos_listado_avistados.idVista,
clientes_listado.Nombre AS nombre_cliente,
clientes_listado.Apellido_Paterno AS apellido_cliente

FROM `robos_listado_avistados`
LEFT JOIN `clientes_listado`            ON clientes_listado.idCliente         = robos_listado_avistados.idCliente
WHERE robos_listado_avistados.idRobo={$_GET['view_robo']}  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVistas,$row );
}?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_data['Latitud']; ?>, <?php echo $row_data['Longitud']; ?>);
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
			  title:"Hello World!"
		  });
		marker.setIcon('img/icn/map_robo_vehiculo.png');
      }  
</script> 
<?php
$sectionclass  = '';
$sectionclass .= $config_app['noti_width'].' ';
$sectionclass .= $config_app['noti_border'].' ';
$sectionclass .= $config_app['noti_shadow'].' ';
$sectionclass .= $config_app['noti_aling'].' ';
$sectionclass .= $config_app['noti_color'];
?>
<section class="tabs <?php echo $sectionclass ?>">
	<table class="tb_map_ex">
		<tr>
			<td class="textbox">
				<?php echo noti_text_new('h1',$row_data['tipo_alerta'],$config_app);
				$texto_not  = 'Generada el '.Fecha_completa_alt($row_data['Fecha']).' a las '.$row_data['Hora'].' hrs';
				echo noti_text('h2',$texto_not,$config_app);?>
				<br />
				<?php echo noti_text_new('h1','Datos del Vehiculo',$config_app);
				echo noti_title('','Datos Basicos',$config_app);		
				$texto_not  = '<strong>Patente : </strong>'.$row_data['Patente'].'<br />';
				$texto_not .= '<strong>Marca del Vehiculo : </strong>'.$row_data['marca'].'<br />';
				$texto_not .= '<strong>Modelo del Vehiculo : </strong>'.$row_data['modelo'].'<br />';
				$texto_not .= '<strong>Tipo de Transmision : </strong>'.$row_data['tipo_transmision'].'<br />';
				if(isset($row_data['fecha_transferencia'])&&$row_data['fecha_transferencia']!='0000-00-00'){
					$texto_not .= '<strong>Fecha de Transferencia : </strong>'.Fecha_completa($row_data['fecha_transferencia']).'<br />';
				}
				$texto_not .= '<strong>Color Base : </strong>'.$row_data['color_base'].'<br />';
				if(isset($row_data['color_complementario'])&&$row_data['color_complementario']!=''){
					$texto_not .= '<strong>Color Complementario : </strong>'.$row_data['color_complementario'].'<br />';
				}
				$texto_not .= '<strong>Fecha de Fabricacion : </strong>'.Fecha_mes_año($row_data['fecha_fabricacion']).'<br />';
				$texto_not .= '<strong>Numero de Motor : </strong>'.$row_data['numero_motor'].'<br />';
				$texto_not .= '<strong>Numero de Chasis : </strong>'.$row_data['numero_chasis'].'<br />';
				if(isset($row_data['observaciones'])&&$row_data['observaciones']!=''){
					$texto_not .= '<strong>Observaciones : </strong>'.$row_data['observaciones'].'<br />';
				}
				echo noti_text('h2',$texto_not,$config_app);?>
			</td>
		</tr>
		<tr height="300">
			<td>
				<div id="map_canvas">
					<script type="text/javascript">window.onload=function(){initialize();};</script>
				</div>
			</td>
		</tr>
		<tr height="10%">
			<td class="textbox">
				<?php echo noti_text_new('h1','Avistamientos',$config_app);?>
			</td>
		</tr>
		<tr>
			<td class="textbox">
				<h2 class="<?php echo $config_app['noti_ul_color_text'].' '.$config_app['noti_ul_size_text'] ?>">
				<?php 
				$nn=0;
				foreach ($arrVistas as $vistas) { 
				echo $vistas['nombre_cliente'].' '.$vistas['apellido_cliente'].' ha visto tu vehiculo';
				echo '<br />' ;
				echo '<a class="'.$config_app['btn_enlace_color_fondo'].' '.$config_app['btn_enlace_radio'].' '.$config_app['btn_enlace_color_texto'].' '.$config_app['btn_enlace_sombra'].' '.$config_app['btn_enlace_border'].' btn_link fright btn_car" href="'.$location.$w.'&view_robo='.$_GET['view_robo'].'&view_robo_details='.$vistas['idVista'].'">Ver Detalles</a>';
				echo '<div class="clear" style="display:inline;"></div>';
				echo '<br /><br /><br />' ;
				$nn++;
				}
				if($nn==0){ echo 'Sin avistamientos';}
				?>
				</h2>
			</td>
		</tr>
		<tr height="10%">
			<td>
				<?php echo link_btn('cancelar',$location,'Volver','',$config_app); ?>
			</td>
		</tr>
	</table>   
</section> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }elseif ( ! empty($_GET['view_carrera']) ) {
$query = "SELECT  
taxista.Nombre,
taxista.Apellido_Paterno,
taxista.Fono1,
solicitud_taxi_listado.Fecha,
solicitud_taxi_listado.Hora,
solicitud_taxi_listado.Cliente_Longitud,
solicitud_taxi_listado.Cliente_Latitud

FROM `solicitud_taxi_listado`
LEFT JOIN clientes_listado taxista ON taxista.idCliente = solicitud_taxi_listado.idTaxista
WHERE solicitud_taxi_listado.idSolicitud = '{$_GET['view_carrera']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_data['Cliente_Latitud']; ?>, <?php echo $row_data['Cliente_Longitud']; ?>);
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
			  title:"Hello World!"
		  });
		marker.setIcon('img/icn/map_taxi.png');
      }  
</script> 
<?php
$sectionclass  = '';
$sectionclass .= $config_app['noti_width'].' ';
$sectionclass .= $config_app['noti_border'].' ';
$sectionclass .= $config_app['noti_shadow'].' ';
$sectionclass .= $config_app['noti_aling'].' ';
$sectionclass .= $config_app['noti_color'];
?>
<section class="tabs correct_tab <?php echo $sectionclass ?>">
	<table class="tb_map">
		<tr height="10%">
			<td class="textbox">
				<?php echo noti_text_new('h1','Taxista '.$row_data['Nombre'].' '.$row_data['Apellido_Paterno'],$config_app);
				$texto_not  = 'Solicitado el '.Fecha_completa_alt($row_data['Fecha']).' a las '.$row_data['Hora'].' hrs';
				echo noti_text('h2',$texto_not,$config_app);?>
			</td>
		</tr>
		<tr height="60%">
			<td>
				<div id="map_canvas">
					<script type="text/javascript">window.onload=function(){initialize();};</script>
				</div>
			</td>
		</tr>
		<tr height="10%">
			<td>
				<?php echo link_btn('otros','tel:'.$row_datos['Fono1'],'Llamar','',$config_app); ?>
			</td>
		</tr> 
		<tr height="10%">
			<td>
				<?php echo link_btn('cancelar',$location,'Volver','',$config_app); ?>
			</td>
		</tr>
	</table>  
</section>	 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }elseif ( ! empty($_GET['view_alert']) ) { 
$query = "SELECT 
alertas_listado.Fecha,
alertas_listado.Hora,
alertas_listado.Longitud,
alertas_listado.Latitud,
alertas_tipos.Nombre AS tipo_alerta,
mnt_imagenes_listado.file AS imagen_alerta

FROM `alertas_listado`
LEFT JOIN `alertas_tipos`             ON alertas_tipos.idTipoAlerta         = alertas_listado.idTipoAlerta
LEFT JOIN `mnt_imagenes_listado`      ON mnt_imagenes_listado.idListimg     = alertas_tipos.idListimg
WHERE idAlerta={$_GET['view_alert']}";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_data['Latitud']; ?>, <?php echo $row_data['Longitud']; ?>);
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
			  title:"Hello World!"
		  });
		marker.setIcon('img/icn/<?php echo $row_data['imagen_alerta']; ?>');
			
      }  
</script> 
<?php
$sectionclass  = '';
$sectionclass .= $config_app['noti_width'].' ';
$sectionclass .= $config_app['noti_border'].' ';
$sectionclass .= $config_app['noti_shadow'].' ';
$sectionclass .= $config_app['noti_aling'].' ';
$sectionclass .= $config_app['noti_color'];
?>
<section class="tabs correct_tab <?php echo $sectionclass ?>">
	<table class="tb_map">
		<tr height="10%">
			<td class="textbox">	
				<?php echo noti_text_new('h1',$row_data['tipo_alerta'],$config_app);
				$texto_not  = 'Generada el '.Fecha_completa_alt($row_data['Fecha']).'a las '.$row_data['Hora'];
				echo noti_text('h2',$texto_not,$config_app);?>
			</td>
		</tr>
		<tr height="80%">
			<td>
				<div id="map_canvas">
					<script type="text/javascript">window.onload=function(){initialize();};</script>
				</div>
			</td>
		</tr>
		<tr height="10%">
			<td>
				<?php echo link_btn('cancelar',$location,'Volver','',$config_app); ?>
			</td>
		</tr>
	</table>  
</section>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }elseif ( ! empty($_GET['view_noti']) ) { 
//actualizo el estado de esta notificacion en la base de datos
$query  = "UPDATE `clientes_notificaciones` SET Leida = 8 WHERE idNotificacion = {$_GET['view_noti']} ";
$result = mysql_query($query, $dbConn);

//Se realiza la consulta a la base de datos
$query = "SELECT 
clientes_notificaciones.idCliente,
clientes_notificaciones.idAlerta,
alertas_tipos.Nombre AS tipo_alerta,
mnt_imagenes_listado.file AS imagen_alerta,
clientes_notificaciones.mensaje,
clientes_notificaciones.Fecha,
alertas_listado.Hora,
clientes_listado.Nombre AS nombre_cliente,
clientes_listado.Apellido_Paterno AS apellido_paterno,
clientes_listado.Direccion,
clientes_listado.Fono1,
clientes_listado.Fono2,
clientes_notificaciones.idVehiculo,
alertas_listado.Longitud,
alertas_listado.Latitud

FROM `clientes_notificaciones`
LEFT JOIN `clientes_listado`          ON clientes_listado.idCliente         = clientes_notificaciones.idCliente
LEFT JOIN `alertas_tipos`             ON alertas_tipos.idTipoAlerta         = clientes_notificaciones.idTipoAlerta
LEFT JOIN `mnt_imagenes_listado`      ON mnt_imagenes_listado.idListimg     = alertas_tipos.idListimg
LEFT JOIN `alertas_listado`           ON alertas_listado.idAlerta           = clientes_notificaciones.idAlerta

WHERE idNotificacion={$_GET['view_noti']}";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_data['Latitud']; ?>, <?php echo $row_data['Longitud']; ?>);
		  var mapOptions = {
			zoom: 18,
			scrollwheel: false,
			draggable: false,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		  var marker = new google.maps.Marker({
			  position: myLatlng,
			  map: map,
			  title:"Hello World!"
		  });	
		marker.setIcon('img/icn/<?php echo $row_data['imagen_alerta']; ?>');
      }  
</script> 
<?php
$sectionclass  = '';
$sectionclass .= $config_app['noti_width'].' ';
$sectionclass .= $config_app['noti_border'].' ';
$sectionclass .= $config_app['noti_shadow'].' ';
$sectionclass .= $config_app['noti_aling'].' ';
$sectionclass .= $config_app['noti_color'];
?>
<section class="tabs <?php echo $sectionclass ?>">
	<table class="tb_map_ex">
		<tr>
			<td class="textbox">

				<?php echo noti_text_new('h1','Datos de la alerta',$config_app);
				$texto_not  = $row_data['tipo_alerta'].'<br/>';
				$texto_not .= '<strong>Fecha : </strong>'.Fecha_completa($row_data['Fecha']).'<br />';
				$texto_not .= '<strong>Hora : </strong>'.$row_data['Hora'].'<br />';
				$texto_not .= $row_data['mensaje'];
				echo noti_text('p',$texto_not,$config_app);?>


				<?php echo noti_text_new('h1','Datos de la persona',$config_app);
				$texto_not  = $row_data['nombre_cliente'].' '.$row_data['apellido_paterno'].'<br/>';
				$texto_not .= '<strong>Direccion : </strong>'.$row_data['Direccion'].'<br />';
				$texto_not .= '<strong>Fono 1 : </strong>'.$row_data['Fono1'].'<br />';
				$texto_not .= '<strong>Fono 2 : </strong>'.$row_data['Fono2'].'<br />';
				echo noti_text('p',$texto_not,$config_app);?>

				<?php if($row_data['idVehiculo']!=0&&$row_data['idVehiculo']!=''){
				//Se realiza la consulta a la base condicionada a la existencia de un vehiculo, solo para las notificaciones de robo
				$query = "SELECT 
				clientes_vehiculos.PPU AS patente,
				vehiculos_marcas.Nombre AS nombre_marca,
				vehiculos_modelos.Nombre AS nombre_modelo,
				vehiculos_transmision.Nombre AS tipo_transmision,
				clientes_vehiculos.ftransferencia AS fecha_transferencia,
				colors_1.Nombre AS color_base,
				colors_2.Nombre AS color_complementario,
				clientes_vehiculos.Ffabricacion AS fecha_fabricacion,
				clientes_vehiculos.N_Motor AS numero_motor,
				clientes_vehiculos.N_Chasis AS numero_chasis,
				clientes_vehiculos.Obs AS observaciones
				FROM `clientes_vehiculos`
				LEFT JOIN `vehiculos_marcas`            ON vehiculos_marcas.idMarca              = clientes_vehiculos.idMarca
				LEFT JOIN `vehiculos_modelos`           ON vehiculos_modelos.idModelo            = clientes_vehiculos.idModelo
				LEFT JOIN `vehiculos_transmision`       ON vehiculos_transmision.idTransmision   = clientes_vehiculos.idTransmision
				LEFT JOIN `vehiculos_colores`  colors_1 ON colors_1.idColorV                     = clientes_vehiculos.idColorV_1
				LEFT JOIN `vehiculos_colores`  colors_2 ON colors_2.idColorV                     = clientes_vehiculos.idColorV_2
				WHERE idVehiculo={$row_data['idVehiculo']} ";
				$resultado = mysql_query ($query, $dbConn);
				$rowvehiculo = mysql_fetch_assoc ($resultado);

				// Se trae el listado con todas las imagenes de los vehiculos
				$arrImagenes = array();
				$query ="SELECT  Nombre
				FROM `clientes_vehiculos_img`
				WHERE idVehiculo='{$row_data['idVehiculo']}'";
				$resultado = mysql_query ($query, $dbConn);
				while ( $row = mysql_fetch_assoc ($resultado)) {
				array_push( $arrImagenes,$row );
				}
				$n_filas = mysql_num_rows($resultado);
				mysql_free_result($resultado);
				
				
				echo noti_text_new('h1','Datos del Vehiculo',$config_app);
				echo noti_title('Datos Basicos','',$config_app);
				
				$texto_not  = '<strong>Patente : </strong>'.$rowvehiculo['patente'].'<br />';
				$texto_not .= '<strong>Marca del Vehiculo : </strong>'.$rowvehiculo['nombre_marca'].'<br />';
				$texto_not .= '<strong>Modelo del Vehiculo : </strong>'.$rowvehiculo['nombre_modelo'].'<br />';
				$texto_not .= '<strong>Tipo de Transmision : </strong>'.$rowvehiculo['tipo_transmision'].'<br />';
				if(isset($rowvehiculo['fecha_transferencia'])&&$rowvehiculo['fecha_transferencia']!='0000-00-00'){
					$texto_not .= '<strong>Fecha de Transferencia : </strong>'.Fecha_completa($rowvehiculo['fecha_transferencia']).'<br />';
				}
				$texto_not .= '<strong>Color Base : </strong>'.$rowvehiculo['color_base'].'<br />';
				if(isset($rowvehiculo['color_complementario'])&&$rowvehiculo['color_complementario']!=''){
					$texto_not .= '<strong>Color Complementario : </strong>'.$rowvehiculo['color_complementario'].'<br />';
				}
				$texto_not .= '<strong>Fecha de Fabricacion : </strong>'.Fecha_mes_año($rowvehiculo['fecha_fabricacion']).'<br />';
				$texto_not .= '<strong>Numero de Motor : </strong>'.$rowvehiculo['numero_motor'].'<br />';
				$texto_not .= '<strong>Numero de Chasis : </strong>'.$rowvehiculo['numero_chasis'].'<br />';
				if(isset($rowvehiculo['observaciones'])&&$rowvehiculo['observaciones']!=''){
					$texto_not .= '<strong>Observaciones : </strong>'.$rowvehiculo['observaciones'].'<br />';
				}
				echo noti_text('p',$texto_not,$config_app);
				
				//No se muestran las imagenes si es que estas no existen
				if ($n_filas!=0){ ?>
				<?php echo noti_title('Fotografias','',$config_app);?>
				<table class="gallery">
				  <tr height="50%">
				   <?php  
				   $i=0;
				   foreach ($arrImagenes as $imagenes) { ?>
				   <?php if($i==0){ echo '<tr height="50%">';}?>
					<td width="50%"><img src='upload/<?php echo $imagenes['Nombre'] ?>' /></td>
				  <?php $i++; if($i==2){ echo '</tr>'; $i=0; }?>
				  <?php }?>
				  <?php if($i==1){ echo '<td width="50%"></td></tr>';}?> 
				</table>
				<?php }?>


				<?php } ?>
				<?php echo noti_text_new('h1','Ubicacion de Siniestro',$config_app);?>
			</td>
		</tr>
  
  
		<tr height="300">
			<td>
				<div id="map_canvas">
					<script type="text/javascript">window.onload=function(){initialize();};</script>
				</div>
			</td>
		</tr>
		<?php  if($row_data['idVehiculo']!=0&&$row_data['idVehiculo']!=''){?> 
		<tr height="10%">
			<td>
				<?php echo link_btn('otros',$location.'&view='.$_GET['view'].'&vista=true&idAlerta='.$row_data['idAlerta'].'&idAsaltado='.$row_data['idCliente'].'&view_noti='.$_GET['view_noti'],'Lo vi','',$config_app);?>
			</td>
		</tr>
		<?php } ?> 
		<tr height="10%">
			<td>
				<?php echo link_btn('enlace',$location,'Volver','',$config_app);?>
			</td>
		</tr>
	</table>
</section> 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { ?>
 
 <?php
$cant_reg = 10;
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idNotificacion FROM `clientes_notificaciones` WHERE idRecibidor = {$arrCliente['idCliente']}";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas_1 = ceil($cuenta_registros / $cant_reg);

//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idAlerta FROM `alertas_listado` WHERE idCliente = {$arrCliente['idCliente']}";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas_2 = ceil($cuenta_registros / $cant_reg);

//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idRobo FROM `robos_listado` WHERE idCliente = {$arrCliente['idCliente']} ";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas_3 = ceil($cuenta_registros / $cant_reg);

//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idSolicitud FROM `solicitud_taxi_listado` WHERE idCliente = {$arrCliente['idCliente']} AND Estado = 44 ";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas_4 = ceil($cuenta_registros / $cant_reg);

?>
<script>
$(document).ready(function() {
	//Inicializacion de variables
    var track_load_1 = 0; //total loaded record group(s)
    var loading_1  = false; //to prevents multipal ajax loads
    var total_groups_1 = <?php echo $total_paginas_1; ?>; //total record group(s)
	
	var track_load_2 = 0; //total loaded record group(s)
    var loading_2  = false; //to prevents multipal ajax loads
    var total_groups_2 = <?php echo $total_paginas_2; ?>; //total record group(s)
	
	var track_load_3 = 0; //total loaded record group(s)
    var loading_3  = false; //to prevents multipal ajax loads
    var total_groups_3 = <?php echo $total_paginas_3; ?>; //total record group(s)
	
	var track_load_4 = 0; //total loaded record group(s)
    var loading_4  = false; //to prevents multipal ajax loads
    var total_groups_4 = <?php echo $total_paginas_4; ?>; //total record group(s)
	
	
   
   //Declaracion de los divs en donde se guardara la informacion
$('#resultados_1').load("notificaciones_autoload_1.php<?php echo $w.'&cant_reg='.$cant_reg; ?>", {'group_no_1':track_load_1}, function() {track_load_1++;}); //load first group
$('#resultados_2').load("notificaciones_autoload_2.php<?php echo $w.'&cant_reg='.$cant_reg; ?>", {'group_no_2':track_load_2}, function() {track_load_2++;}); //load first group
$('#resultados_3').load("notificaciones_autoload_3.php<?php echo $w.'&cant_reg='.$cant_reg; ?>", {'group_no_3':track_load_3}, function() {track_load_3++;}); //load first group
$('#resultados_4').load("notificaciones_autoload_4.php<?php echo $w.'&cant_reg='.$cant_reg; ?>", {'group_no_4':track_load_4}, function() {track_load_4++;}); //load first group
	
   
   //Detecta el scroll de la ventana
    $(window).scroll(function() { //detect page scroll
       
	   
	   //Modifica el tamaño de la ventana
        if($(window).scrollTop() + $(window).height() == $(document).height()) {  //user scrolled to bottom of the page?
        
           
            if(track_load_1 <= total_groups_1 && loading_1==false) {//there's more data to load
                loading_1 = true; //prevent further ajax loading_1
                $('.animation_image_1').show(); //show loading_1 image
                //load data from the server using a HTTP POST request
                $.post('notificaciones_autoload_1.php<?php echo $w.'&cant_reg='.$cant_reg; ?>',{'group_no_1': track_load_1}, function(data){              
                    $("#resultados_1").append(data); //append received data into the element
                    //hide loading_1 image
                    $('.animation_image_1').hide(); //hide loading_1 image once data is received
                    track_load_1++; //loaded group increment
                    loading_1 = false;
                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                   
                    alert(thrownError); //alert with HTTP error
                    $('.animation_image_1').hide(); //hide loading_1 image
                    loading_1 = false;
                });
            }
			
			if(track_load_2 <= total_groups_2 && loading_2==false) {//there's more data to load
                loading_2 = true; //prevent further ajax loading_1
                $('.animation_image_2').show(); //show loading_1 image
                //load data from the server using a HTTP POST request
                $.post('notificaciones_autoload_2.php<?php echo $w.'&cant_reg='.$cant_reg; ?>',{'group_no_2': track_load_2}, function(data){              
                    $("#resultados_2").append(data); //append received data into the element
                    //hide loading_1 image
                    $('.animation_image_2').hide(); //hide loading_1 image once data is received
                    track_load_2++; //loaded group increment
                    loading_2 = false;
                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                   
                    alert(thrownError); //alert with HTTP error
                    $('.animation_image_2').hide(); //hide loading_1 image
                    loading_2 = false;
                });
            }
			
			if(track_load_3 <= total_groups_3 && loading_3==false) {//there's more data to load
                loading_3 = true; //prevent further ajax loading_1
                $('.animation_image_3').show(); //show loading_1 image
                //load data from the server using a HTTP POST request
                $.post('notificaciones_autoload_3.php<?php echo $w.'&cant_reg='.$cant_reg; ?>',{'group_no_3': track_load_3}, function(data){        
                    $("#resultados_3").append(data); //append received data into the element
                    //hide loading_1 image
                    $('.animation_image_3').hide(); //hide loading_1 image once data is received
                    track_load_3++; //loaded group increment
                    loading_3 = false;
                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                   
                    alert(thrownError); //alert with HTTP error
                    $('.animation_image_3').hide(); //hide loading_1 image
                    loading_3 = false;
                });
            }
			
			if(track_load_4 <= total_groups_4 && loading_4==false) {//there's more data to load
                loading_4 = true; //prevent further ajax loading_1
                $('.animation_image_4').show(); //show loading_1 image
                //load data from the server using a HTTP POST request
                $.post('notificaciones_autoload_4.php<?php echo $w.'&cant_reg='.$cant_reg; ?>',{'group_no_4': track_load_4}, function(data){        
                    $("#resultados_4").append(data); //append received data into the element
                    //hide loading_1 image
                    $('.animation_image_4').hide(); //hide loading_1 image once data is received
                    track_load_4++; //loaded group increment
                    loading_4 = false;
                }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?
                   
                    alert(thrownError); //alert with HTTP error
                    $('.animation_image_4').hide(); //hide loading_1 image
                    loading_4 = false;
                });
            }
	
        }
    });
});
</script>
<?php
$sectioclass  = '';
$sectioclass .= $config_app['noti_width'].' ';
$sectioclass .= $config_app['noti_border'].' ';
$sectioclass .= $config_app['noti_shadow'].' ';
$sectioclass .= $config_app['noti_aling'].' ';
$sectioclass .= $config_app['noti_color'].' ';
$sectioclass .= $config_app['noti_tab_hover'].' ';
$sectioclass .= $config_app['noti_tab_check'].' ';
$sectioclass .= $config_app['noti_tab_label'].' ';
$sectioclass .= $config_app['noti_tab_label_select'];
?>
<section class="tabs <?php echo $sectioclass ?>">
       
       
        <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
        <label for="tab-1" class="tab-label-1 <?php echo $config_app['noti_tab_color'] ?>"><i class="fa fa-inbox"></i></label>
        
        <input id="tab-2" type="radio" name="radio-set" class="tab-selector-2" />
        <label for="tab-2" class="tab-label-2 <?php echo $config_app['noti_tab_color'] ?>"><i class="fa fa-share-square-o"></i></label>
        
        <input id="tab-3" type="radio" name="radio-set" class="tab-selector-3" />
        <label for="tab-3" class="tab-label-3 <?php echo $config_app['noti_tab_color'] ?>"><i class="fa fa-taxi"></i></label>
        
		<?php if ($_GET['app_conf']==1){ ?>
        <input id="tab-4" type="radio" name="radio-set" class="tab-selector-4" />
        <label for="tab-4" class="tab-label-4 <?php echo $config_app['noti_tab_color'] ?>"><i class="fa fa-at"></i></label>
		<?php }else{ ?>
        <input id="tab-4" type="hidden"  class="tab-selector-4" />
        <label for="tab-4" class="tab-label-4 <?php echo $config_app['noti_tab_color'] ?>"></label>
        <?php } ?>
        <?php /*
	   //se deshabilita mientra no se utiliza
        <input id="tab-5" type="radio" name="radio-set" class="tab-selector-5" />
        <label for="tab-5" class="tab-label-5 <?php echo $config_app['noti_tab_color'] ?>"><i class="fa fa-at"></i></label>
        */?>
        <input id="tab-5" type="hidden"  class="tab-selector-5" />
        <label for="tab-5" class="tab-label-5 <?php echo $config_app['noti_tab_color'] ?>"></label>
    
        <div class="clear-shadow"></div>
        
        
        <div class="content <?php echo $config_app['noti_separator'] ?>">
          
        <div class="content-1">
			<?php echo noti_title('Notificaciones','',$config_app);?>
			<ul id="resultados_1"></ul>
			<div class="animation_image_1" style="display:none" align="center"><img src="img/ajax-loader.gif"></div> 
        </div>
        <div class="content-2">
			<?php echo noti_title('Mis Alertas','',$config_app);?>
			<ul id="resultados_2"></ul>
			<div class="animation_image_2" style="display:none" align="center"><img src="img/ajax-loader.gif"></div>
        </div>
		<div class="content-3">
			<?php echo noti_title('Mis Robos','',$config_app);?>
			<ul id="resultados_3"></ul>
			<div class="animation_image_3" style="display:none" align="center"><img src="img/ajax-loader.gif"></div>
        </div>
        <div class="content-4">
			<?php echo noti_title('Mis Solicitudes de taxi','',$config_app);?>
			<ul id="resultados_4"></ul>
			<div class="animation_image_4" style="display:none" align="center"><img src="img/ajax-loader.gif"></div>
        </div>
          <div class="content-5"></div>
          
        </div>
        
<div class=" clear"></div>        
</section>
 
<?php } ?>  
<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>
