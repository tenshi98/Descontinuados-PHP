<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
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
$original = "alertas_robos.php";
$location = $original.$w;
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
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view']) ) { 
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
clientes_vehiculos.fTransferencia AS fecha_transferencia,
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
WHERE robos_listado.idRobo={$_GET['view']}  ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
//Consulta de las vistas
$arrVistas = array();
$query = "SELECT 
clientes_listado.Nombre AS nombre_cliente,
clientes_listado.Apellido_Paterno AS apellido_cliente,
clientes_listado.email AS email_cliente,
clientes_listado.Fono1 AS fono1_cliente,
clientes_listado.Fono2 AS fono2_cliente,
robos_listado_avistados.Fecha AS fecha_visto,
robos_listado_avistados.Hora AS hora_visto


FROM `robos_listado_avistados`
LEFT JOIN `clientes_listado`            ON clientes_listado.idCliente         = robos_listado_avistados.idCliente
WHERE robos_listado_avistados.idRobo={$_GET['view']}  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVistas,$row );
}
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
		marker.setIcon('img/icn/map_alerta.png');
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
            <strong>Fecha : </strong><?php echo Fecha_completa($row_data['Fecha']).' a las '.$row_data['Hora'].'hrs'; ?><br />
            </p>
            
            <h2>Datos del Vehiculo</h2>
		
            <p>
            <strong>Patente : </strong><?php echo $row_data['Patente']; ?><br />
            <strong>Marca del Vehiculo : </strong><?php echo $row_data['marca']; ?><br />
            <strong>Modelo del Vehiculo : </strong><?php echo $row_data['modelo']; ?><br />
            <strong>Tipo de Transmision : </strong><?php echo $row_data['tipo_transmision']; ?><br />
            
            <?php if(isset($row_data['fecha_transferencia'])&&$row_data['fecha_transferencia']!='0000-00-00'){?>
            <strong>Fecha de Transferencia : </strong><?php echo Fecha_completa($row_data['fecha_transferencia']); ?><br />
            <?php }?>
            
            <strong>Color Base : </strong><?php echo $row_data['color_base']; ?><br />
            
            <?php if(isset($row_data['color_complementario'])&&$row_data['color_complementario']!=''){?>
            <strong>Color Complementario : </strong><?php echo $row_data['color_complementario']; ?><br />
            <?php }?>
            
            <strong>Fecha de Fabricacion : </strong><?php echo Fecha_mes_año($row_data['fecha_fabricacion']); ?><br />
            <strong>Numero de Motor : </strong><?php echo $row_data['numero_motor']; ?><br />
            <strong>Numero de Chasis : </strong><?php echo $row_data['numero_chasis']; ?><br />
            
            <?php if(isset($row_data['observaciones'])&&$row_data['observaciones']!=''){?>
            <strong>Observaciones : </strong><?php echo $row_data['observaciones']; ?><br />
            <?php }?>
            
            </p>
        
        
        </td>
        <td>
             <div id="map_canvas" style="height:500px;width:600px;">
                <script type="text/javascript">window.onload=function(){initialize();};</script>
             </div>   
        </td>
    </tr>
    
</tbody>
</table>

<table class="table table-hover">
<thead>
	<tr>
        <th>Persona</th>
        <th>Email</th>
        <th>Fono 1</th>
        <th>Fono 2</th>
        <th width="140">Fecha</th>
        <th width="140">Hora</th>
        <th width="100">Acciones</th>
    </tr>
</thead>
<tbody>

	<?php foreach ($arrVistas as $vista) {?>
	<tr>
        <td><?php echo $vista['nombre_cliente'].' '.$vista['apellido_cliente']?></td>
        <td><?php echo $vista['email_cliente']?></td>
        <td><?php echo $vista['fono1_cliente']?></td>
        <td><?php echo $vista['fono2_cliente']?></td>
        <td><?php echo Fecha_completa($robo['fecha_visto']) ?></td>
        <td><?php echo $vista['hora_visto']?></td>
        <td>
            <a href="<?php echo $location.'&view='.$robo['idRobo']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>   		
        </td>
    </tr>
	<?php }?>
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
$query = "SELECT idRobo FROM `robos_listado` WHERE idCliente={$arrCliente['idCliente']}";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);
// Se trae el listado de notificaciones
$arrRobos = array();
$query = "SELECT 
robos_listado.idRobo,
robos_listado.Fecha,
clientes_vehiculos.PPU AS Patente,
vehiculos_marcas.Nombre AS marca,
vehiculos_modelos.Nombre AS modelo,
color_1.Nombre AS color_base,
color_2.Nombre AS color_comp

FROM `robos_listado`
LEFT JOIN `clientes_vehiculos`            ON clientes_vehiculos.idVehiculo    = robos_listado.idVehiculo
LEFT JOIN `vehiculos_marcas`              ON vehiculos_marcas.idMarca         = clientes_vehiculos.idMarca
LEFT JOIN `vehiculos_modelos`             ON vehiculos_modelos.idModelo       = clientes_vehiculos.idModelo
LEFT JOIN `vehiculos_colores`   color_1   ON color_1.idColorV                 = clientes_vehiculos.idColorV_1
LEFT JOIN `vehiculos_colores`   color_2   ON color_2.idColorV                 = clientes_vehiculos.idColorV_2
WHERE robos_listado.idCliente={$arrCliente['idCliente']}
ORDER BY idRobo DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRobos,$row );
}
 
 ?>
<div class="col-xs-12 fcenter">
<h2>Listado de alertas de robo generadas</h2>

<table class="table table-hover">
<thead>
	<tr>
        <th>Vehiculo</th>
        <th width="140">Fecha</th>
        <th width="100">Acciones</th>
    </tr>
</thead>
<tbody>
	<?php foreach ($arrRobos as $robo) {?>
	<tr>
        <td><?php echo $robo['marca'].' '.$robo['modelo'].' '.$robo['Patente'].' '.$robo['color_base'].' '.$robo['color_comp'] ?></td>
        <td><?php echo Fecha_completa($robo['Fecha']) ?></td>
        <td>
            <a href="<?php echo $location.'&view='.$robo['idRobo']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>   		
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