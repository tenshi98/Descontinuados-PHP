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
$original = "solicitud_taxi.php";
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

$query = "SELECT  
taxista.Nombre,
taxista.Apellido_Paterno,
taxista.Fono1,
taxista.Fono2,
solicitud_taxi_listado.Fecha,
solicitud_taxi_listado.Hora,
solicitud_taxi_listado.Cliente_Longitud, 
solicitud_taxi_listado.Cliente_Latitud,
solicitud_taxi_listado.Taxista_Longitud, 
solicitud_taxi_listado.Taxista_Latitud,
solicitud_taxi_listado.CarreraFinalizada_Longitud, 
solicitud_taxi_listado.CarreraFinalizada_Latitud

FROM `solicitud_taxi_listado`
LEFT JOIN clientes_listado taxista ON taxista.idCliente = solicitud_taxi_listado.idTaxista
WHERE solicitud_taxi_listado.idSolicitud = '{$_GET['view']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);

?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
      function initialize() {
		  var myLatlng = new google.maps.LatLng(-33.4691199, -70.641997);
		  var mapOptions = {
			zoom: 10,
			scrollwheel: false,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

		  var marker_1 = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $row_data['Cliente_Latitud'] ?>, <?php echo $row_data['Cliente_Longitud'] ?>),
			  map: map,
			  title:"Cliente",
			  icon: 'img/icn/map_pass.png'
		  });
		  var marker_2 = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $row_data['Taxista_Latitud'] ?>, <?php echo $row_data['Taxista_Longitud'] ?>),
			  map: map,
			  title:"Taxista",
			  icon: 'img/icn/map_taxi.png'
		  });
		  var marker_3 = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $row_data['CarreraFinalizada_Latitud'] ?>, <?php echo $row_data['CarreraFinalizada_Longitud'] ?>),
			  map: map,
			  title:"llegada",
			  icon: 'img/icn/map_pass_bajado.png'
		  });  
		 			
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
            <h2>Datos de la Carrera</h2>     
            <p>
            <strong>Nombre Taxista : </strong><?php echo $row_data['Nombre'].' '.$row_data['Apellido_Paterno']; ?><br />
            <strong>Fono 1 : </strong><?php echo $row_data['Fono1']; ?><br />
            <strong>Fono 2 : </strong><?php echo $row_data['Fono2']; ?><br />
            <strong>Fecha : </strong><?php echo Fecha_completa($row_data['Fecha']); ?><br />
            <strong>Hora : </strong><?php echo $row_data['Hora']; ?><br />
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
$query = "SELECT idSolicitud FROM `solicitud_taxi_listado` WHERE idCliente={$arrCliente['idCliente']} AND solicitud_taxi_listado.Estado = 44";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);
// Se trae el listado de notificaciones
$arrTaxi = array();
$query = "SELECT 
solicitud_taxi_listado.idSolicitud,
solicitud_taxi_listado.Fecha,
solicitud_taxi_listado.Hora,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno

FROM `solicitud_taxi_listado`
LEFT JOIN `clientes_listado`            ON clientes_listado.idCliente    = solicitud_taxi_listado.idTaxista
WHERE solicitud_taxi_listado.idCliente = {$arrCliente['idCliente']} AND solicitud_taxi_listado.Estado = 44

ORDER BY idSolicitud DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTaxi,$row );
}
 
 ?>
<div class="col-xs-12 fcenter">
<h2>Listado de solicitudes de taxi generadas</h2>

<table class="table table-hover">
<thead>
	<tr>
        <th>Taxista</th>
        <th width="140">Fecha</th>
        <th width="120">Hora</th>
        <th width="100">Acciones</th>
    </tr>
</thead>
<tbody>
	<?php foreach ($arrTaxi as $taxi) {?>
	<tr>
        <td><?php echo $taxi['Nombre'].' '.$taxi['Apellido_Paterno'] ?></td>
        <td><?php echo Fecha_completa($taxi['Fecha']) ?></td>
        <td><?php echo $taxi['Hora'] ?></td>
        <td>
            <a href="<?php echo $location.'&view='.$taxi['idSolicitud']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>   		
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