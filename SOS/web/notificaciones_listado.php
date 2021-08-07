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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_cliente_2.php';
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
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once 'core/config_app.php';
//require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "notificaciones_listado.php";
$location = $original.$w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//se borra un dato
if ( !empty($_GET['del_noti']) )     {
	//Se consiguen las variables de busqueda y paginacion
	
	$location.='&delete=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_notificaciones.php';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/normal2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Listado de notificaciones</title>
<!-- InstanceEndEditable -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilo.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<!-- InstanceBeginEditable name="head" -->
<script language="javascript">
function msg(direccion){
if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
</script> 
<!-- InstanceEndEditable -->
</head>
<body>
<?php require_once 'core/menu.php';?>
<!-- InstanceBeginEditable name="cuerpo" -->
    <div class="container">
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($errors[5])) {echo $errors[5];}?>
<?php  if (isset($errors[6])) {echo $errors[6];}?>
<?php  if (isset($errors[7])) {echo $errors[7];}?>
<?php  if (isset($errors[8])) {echo $errors[8];}?>
<?php  if (isset($errors[9])) {echo $errors[9];}?>
<?php  if (isset($errors[10])) {echo $errors[10];}?>
<?php  if (isset($errors[11])) {echo $errors[11];}?>
<?php  if (isset($errors[12])) {echo $errors[12];}?>
<?php  if (isset($errors[13])) {echo $errors[13];}?>
<?php  if (isset($errors[14])) {echo $errors[14];}?>
<?php  if (isset($errors[15])) {echo $errors[15];}?>
<?php  if (isset($errors[16])) {echo $errors[16];}?>
<?php  if (isset($_GET['delete'])) {?>
    <div class="alert fcenter width100 <?php echo $config_app['msg_info_color_body'].' '.$config_app['msg_info_color_text'].' '.$config_app['msg_info_border'].' '.$config_app['msg_info_border_color'] ?>">
    <i class="fa fa-info"></i>
    <p class="long_txt"><b>Informacion!</b> Notificacion borrada correctamente.</p>
    </div>
<?php }?>
  
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view']) ) { 
//actualizo el estado de esta notificacion en la base de datos
$query  = "UPDATE `clientes_notificaciones` SET Leida = 8 WHERE idNotificacion = {$_GET['view']} ";
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

WHERE idNotificacion={$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_data['Latitud']; ?>, <?php echo $row_data['Longitud']; ?>);
		  var mapOptions = {
			zoom: 18,
			scrollwheel: true,
			draggable: true,
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




<table class="table table-hover">
<thead>
	<tr>
    	<th>Datos</th>
        <th>Mapa</th>
    </tr>
</thead>
<tbody>
	<tr>
    	<td>
        <h2>Datos de la alerta</h2>    
        
        <p>
        <strong>Tipo Alerta : </strong><?php echo $row_data['tipo_alerta']; ?><br />
        <strong>Fecha : </strong><?php echo Fecha_completa($row_data['Fecha']); ?><br />
        <strong>Hora : </strong><?php echo $row_data['Hora']; ?><br />
        <?php echo $row_data['mensaje']; ?>
        </p>
        
        <h2>Datos de la persona</h2>
        <p>
		<strong>Nombre : </strong><?php echo $row_data['nombre_cliente'].' '.$row_data['apellido_paterno']; ?><br />
        <strong>Direccion : </strong><?php echo $row_data['Direccion']; ?><br />
        <strong>Fono 1 : </strong><?php echo $row_data['Fono1']; ?><br />
        <strong>Fono 2 : </strong><?php echo $row_data['Fono2']; ?><br />
		
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
			
		?>
		<h2>Datos del Vehiculo</h2>
		
		<p>
		<strong>Patente : </strong><?php echo $rowvehiculo['patente']; ?><br />
		<strong>Marca del Vehiculo : </strong><?php echo $rowvehiculo['nombre_marca']; ?><br />
		<strong>Modelo del Vehiculo : </strong><?php echo $rowvehiculo['nombre_modelo']; ?><br />
		<strong>Tipo de Transmision : </strong><?php echo $rowvehiculo['tipo_transmision']; ?><br />
		
		<?php if(isset($rowvehiculo['fecha_transferencia'])&&$rowvehiculo['fecha_transferencia']!='0000-00-00'){?>
		<strong>Fecha de Transferencia : </strong><?php echo Fecha_completa($rowvehiculo['fecha_transferencia']); ?><br />
		<?php }?>
        
		<strong>Color Base : </strong><?php echo $rowvehiculo['color_base']; ?><br />
		
		<?php if(isset($rowvehiculo['color_complementario'])&&$rowvehiculo['color_complementario']!=''){?>
		<strong>Color Complementario : </strong><?php echo $rowvehiculo['color_complementario']; ?><br />
		<?php }?>
        
		<strong>Fecha de Fabricacion : </strong><?php echo Fecha_mes_año($rowvehiculo['fecha_fabricacion']); ?><br />
		<strong>Numero de Motor : </strong><?php echo $rowvehiculo['numero_motor']; ?><br />
		<strong>Numero de Chasis : </strong><?php echo $rowvehiculo['numero_chasis']; ?><br />
		
		<?php if(isset($rowvehiculo['observaciones'])&&$rowvehiculo['observaciones']!=''){?>
		<strong>Observaciones : </strong><?php echo $rowvehiculo['observaciones']; ?><br />
		<?php }?>
        
		</p>
		
		<?php 
		//No se muestran las imagenes si es que estas no existen
		if ($n_filas!=0){ ?>
		<h1 class="<?php echo $config_app['noti_ul_color_tittle'].' '.$config_app['noti_ul_size_tittle'] ?>">Fotografias</h1>
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

        
        </td>
        <td>
		 <div id="map_canvas" style="height:500px;width:600px;">
			<script type="text/javascript">window.onload=function(){initialize();};</script>
        </div>
        
        </td>
    </tr>
    
</tbody>
</table>






















<div class="clearfix"></div>
<div class="col-xs-12">
<a class=" btn fright <?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_color_texto'] ?> " href="<?php echo $location ?>">Volver</a>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Se inicializa el paginador de resultados
//tomo el numero de la pagina si es que este existe
if(isset($_GET["pagina"])){$num_pag = $_GET["pagina"];	
} else {$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){$comienzo = 0 ;$num_pag = 1 ;
} else {$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idNotificacion FROM `clientes_notificaciones` WHERE idRecibidor={$arrCliente['idCliente']}";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);
// Se trae el listado de notificaciones
$arrNotificaciones = array();
$query = "SELECT 
clientes_notificaciones.Fecha,
clientes_notificaciones.idNotificacion,
clientes_notificaciones.mensaje,
alertas_tipos.Nombre AS tipo_alerta,
detalle_general.Nombre AS estado
FROM `clientes_notificaciones`
LEFT JOIN `alertas_tipos`     ON alertas_tipos.idTipoAlerta     = clientes_notificaciones.idTipoAlerta
LEFT JOIN `detalle_general`   ON detalle_general.id_Detalle     = clientes_notificaciones.Leida
WHERE idRecibidor={$arrCliente['idCliente']}
ORDER BY idNotificacion DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNotificaciones,$row );
} 
 
 ?>
<div class="col-xs-12 fcenter">
<h2>Listado de notificaciones</h2>

<table class="table table-hover">
<thead>
	<tr>
    	<th>Estado</th>
        <th>Tipo Alerta</th>
        <th width="140">Fecha</th>
        <th>Mensaje</th>
        <th width="100">Acciones</th>
    </tr>
</thead>
<tbody>
	<?php foreach ($arrNotificaciones as $noti) {?>
	<tr>
    	<td><?php echo $noti['estado'] ?></td>
        <td><?php echo $noti['tipo_alerta'] ?></td>
        <td><?php echo Fecha_completa($noti['Fecha']) ?></td>
        <td><?php echo cortar($noti['mensaje'], 150) ?></td>
        <td>
            <a href="<?php echo $location.'&view='.$noti['idNotificacion']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>   
            <?php $ubicacion=$location.'&del_noti='.$noti['idNotificacion'];?>
            <a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>		
        </td>
    </tr>
	<?php }?>
</tbody>
</table>
<?php 
//Verifico si hay mas de una pagina, sino coulto el paginador
if($total_paginas>1){
//Cargamos la ubicacion original
$location = $original.$w;
$location .='&pagina=';
if (isset($_GET['search'])) { 
$x ='&search='.$_GET['search'];
} else {
$x='';	
}?>
<nav>
  <ul class="pagination">
  	<?php if(($num_pag - 1) > 0) { ?>
    <li><a href="<?php echo $location.($num_pag-1).$x ?>" aria-label="Anterior"><span aria-hidden="true">&laquo;</span></a></li>
    <?php } else {?>
    <li><a href="#" aria-label="Anterior"><span aria-hidden="true">&laquo;</span></a></li>
    <?php } ?>
    
	<?php if ($total_paginas>10){
		if(0>$num_pag-5){	
			for ($i = 1; $i <= 10; $i++) { ?>	
			<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
		<?php }					
		}elseif($total_paginas<$num_pag+5){	
			for ($i = $num_pag-5; $i <= $total_paginas; $i++) { ?>
			<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
			<?php }						
		}else{						
			for ($i = $num_pag-4; $i <= $num_pag+5; $i++) { ?>
			<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
			<?php }	
		}
	}else{
		for ($i = 1; $i <= $total_paginas; $i++) { ?>
		<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
		<?php }					
	}?>
                        
    <?php if(($num_pag + 1)<=$total_paginas) { ?>
    <li><a href="<?php echo $location.($num_pag+1).$x ?>" aria-label="Siguiente"><span aria-hidden="true">&raquo;</span></a></li>
	<?php } else {?>
    <li><a href="#" aria-label="Siguiente"><span aria-hidden="true">&raquo;</span></a></li>
	<?php } ?>
  </ul>
</nav>


   
<?php }?> 

</div>
<?php } ?>
</div> <!-- /container -->
<!-- InstanceEndEditable -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>  
</body>
<!-- InstanceEnd --></html>