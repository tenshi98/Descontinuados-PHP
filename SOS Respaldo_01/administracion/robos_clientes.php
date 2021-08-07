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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                    Se filtran las entradas para evitar ataques                                                 */
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
$original = "robos_clientes.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title><?php echo $rowlevel['nombre_transaccion']; ?></title>
    <!-- InstanceEndEditable -->
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">
    <!-- Metis Theme stylesheet -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.css">
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
        <![endif]-->
    <!--Modernizr 2.7.2-->
    <script src="assets/lib/modernizr/modernizr.min.js"></script>
	<!-- Icono de la pagina -->
	<link rel="icon" type="image/png" href="img/mifavicon.png" />
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
    <div id="wrap">
      <div id="top">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              <a href="index.html" class="navbar-brand">
                <img src="img/logo_sm.png" alt="">
              </a> 
            </header>
            <?php require_once 'core/infobox.php';?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <?php require_once 'core/menu_top.php';?>
            </div>
          </div>
        </nav>
        <header class="head">
          <div class="main-bar">
            <h3>
            <!-- InstanceBeginEditable name="titulo" -->
            <i class="fa fa-dashboard"></i> <?php echo $rowlevel['nombre_transaccion']; ?>
			<!-- InstanceEndEditable --> </h3>
          </div>
        </header>
      </div>
      <div id="left">
       <?php require_once 'core/userbox.php';?> 
       <?php require_once 'core/menu.php';?> 
      </div>
      <div id="content">
        <div class="outer">
            <div class="inner">
			<!-- InstanceBeginEditable name="Bodytext" -->            

<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['map']) ) { 
//Se complementan los filtros
$z="WHERE robos_listado.idRobo>0";
if(isset($_GET['view']) && $_GET['view'] != '')  { $z .= " AND clientes_listado.idCliente = '".$_GET['view']."'" ; }

//Realizo la consulta
$arrAviso = array();	
$query="SELECT 
robos_listado.Longitud,
robos_listado.Latitud,
clientes_listado.Nombre,
vehiculos_marcas.Nombre AS Marca,
vehiculos_modelos.Nombre AS Modelo,
clientes_vehiculos.PPU
FROM robos_listado 
LEFT JOIN clientes_listado     ON clientes_listado.idCliente      = robos_listado.idCliente
LEFT JOIN clientes_vehiculos   ON clientes_vehiculos.idVehiculo   = robos_listado.idVehiculo
LEFT JOIN vehiculos_marcas     ON vehiculos_marcas.idMarca        = clientes_vehiculos.idMarca
LEFT JOIN vehiculos_modelos    ON vehiculos_modelos.idModelo      = clientes_vehiculos.idModelo
".$z;	  
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrAviso,$row );
}
mysql_free_result($resultado2); 
 ?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAMha4T0QO6UFE2shJXUC2Ok3Ai-wgU90g&sensor=false"></script>
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

		<?php 
		$nn=1;
		foreach ($arrAviso as $aviso) {?>
		  var marker_<?php echo $nn ?> = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $aviso['Latitud'] ?>, <?php echo $aviso['Longitud'] ?>),
			  map: map,
			  title:"<?php echo $aviso['Marca'].' '.$aviso['Modelo'].' patente '.$aviso['PPU'].' de '.$aviso['Nombre'] ?>",
			  icon: 'img/icn/map_robo_vehiculo.png'
		  });
		  
		<?php 
		$nn++;
		}?> 	  		
      }  
</script>
 
 
<div class="col-lg-12 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Geolocalizacion en el mapa</h5>
		</header>
		<div id="div-1" class="body" style="position:relative">
        		<div id="map_canvas" style="width:100%; height:500px">
                	<script type="text/javascript">initialize();</script>
             	</div>            
		</div>
	</div>
</div>
<div class="col-lg-12 fcenter" style="margin-bottom:50px">
<?php //Se verifican las variables
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != '')                                                     { $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')                                                     { $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')                                 { $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')                                 { $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ $location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                                                         { $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != '')                                                     { $location .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')                                                 { $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')                                                 { $location .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')                                           { $location .= "&dispositivo=".$_GET['dispositivo'] ; }
?>
	<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }elseif ( ! empty($_GET['viewmap']) ) {
$query="SELECT 
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
clientes_listado.Apellido_Materno,
mnt_ubicacion_ciudad.Nombre AS nombre_region,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
clientes_listado.Direccion,

robos_listado.Fecha,
robos_listado.Hora,
robos_listado.Longitud,
robos_listado.Latitud ,

clientes_vehiculos.PPU AS patente,
clientes_vehiculos.fFabricacion AS fecha_fabricacion,
clientes_vehiculos.Obs AS observaciones,
vehiculos_marcas.Nombre AS nombre_marca,
vehiculos_modelos.Nombre AS nombre_modelo,
color_1.Nombre AS color_base,
color_2.Nombre AS color_comp

FROM robos_listado 
LEFT JOIN clientes_listado            ON clientes_listado.idCliente         = robos_listado.idCliente
LEFT JOIN clientes_vehiculos          ON clientes_vehiculos.idVehiculo      = robos_listado.idVehiculo
LEFT JOIN `mnt_ubicacion_ciudad`      ON mnt_ubicacion_ciudad.idCiudad      = clientes_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`     ON mnt_ubicacion_comunas.idComuna     = clientes_listado.idComuna
LEFT JOIN vehiculos_marcas            ON vehiculos_marcas.idMarca           = clientes_vehiculos.idMarca
LEFT JOIN vehiculos_modelos           ON vehiculos_modelos.idModelo         = clientes_vehiculos.idModelo
LEFT JOIN vehiculos_colores  color_1  ON color_1.idColorV                   = clientes_vehiculos.idColorV_1
LEFT JOIN vehiculos_colores  color_2  ON color_2.idColorV                   = clientes_vehiculos.idColorV_2


WHERE robos_listado.idRobo = '{$_GET['viewmap']}'";	  
$resultado2 = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado2);
// Se trae un listado con todos los usuarios
$arrVistas = array();
$query = "SELECT 
robos_listado_avistados.Fecha,
robos_listado_avistados.Hora,
clientes_listado.Nombre AS nombre_visto,
robos_listado_avistados.Longitud,
robos_listado_avistados.Latitud
FROM `robos_listado_avistados`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = robos_listado_avistados.idCliente
WHERE robos_listado_avistados.idRobo = '{$_GET['viewmap']}'
ORDER BY robos_listado_avistados.idVista ASC ";
$resultado = mysql_query ($query, $dbConn);
$num_row = mysql_num_rows ($resultado);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVistas,$row );
}

?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_data['Latitud'] ?>, <?php echo $row_data['Longitud'] ?>);
		  var mapOptions = {
			zoom: 12,
			scrollwheel: false,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

		  var marker = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $row_data['Latitud'] ?>, <?php echo $row_data['Longitud'] ?>),
			  map: map,
			  title:"<?php echo $row_data['nombre_marca'].' '.$row_data['nombre_modelo'].' patente '.$row_data['patente'].' de '.$row_data['Nombre'] ?>",
			  icon: 'img/icn/map_robo_vehiculo.png'
		  });
		  
		  
		  <?php 
		  $nn=1;
		  foreach ($arrVistas as $vista) {?>
		  var marker_<?php echo $nn ?> = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $vista['Latitud'] ?>, <?php echo $vista['Longitud'] ?>),
			  map: map,
			  title:"visto",
			  icon: 'img/icn/map_robo_visto.png'
		  }); 
		  <?php
		  $nn++;
		   } ?>
		   
		   var routes = [
				new google.maps.LatLng(<?php echo $row_data['Latitud'] ?>, <?php echo $row_data['Longitud'] ?>)
				<?php foreach ($arrVistas as $vista) {?>
				, new google.maps.LatLng(<?php echo $vista['Latitud'] ?>, <?php echo $vista['Longitud'] ?>)
				<?php } ?>
			];
		 
			var polyline = new google.maps.Polyline({
				path: routes
				, map: map
				, strokeColor: '#ff0000'
				, strokeWeight: 5
				, strokeOpacity: 0.3
				, clickable: false
			});
		    
		 	  		
      }  
</script>

<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Detalle de la alarma</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="40%">Datos</th>
        <th width="60%">Mapa</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">   
    	<tr class="odd">
			<td class=" " height="500">
             <p class="tbl_title">Datos del dueño</p>
             <p class="tbl_text">Nombre : <?php echo $row_data['Nombre'].' '.$row_data['Apellido_Paterno'].' '.$row_data['Apellido_Materno'] ?><br/>
                Region : <?php echo $row_data['nombre_region'] ?><br/>
                Comuna : <?php echo $row_data['nombre_comuna'] ?><br/>
                Direccion : <?php echo $row_data['Direccion'] ?></p>
            
             <p class="tbl_title">Datos del vehiculo</p>
             <p class="tbl_text">Marca : <?php echo $row_data['nombre_marca'] ?><br/>
                Modelo : <?php echo $row_data['nombre_modelo'] ?><br/>
                Patente : <?php echo $row_data['patente']?><br/>
                Color Base : <?php echo $row_data['color_base']?><br/>
                Color secundario : <?php echo $row_data['color_comp']?><br/>
                Año del vehiculo : <?php echo $row_data['fecha_fabricacion']?><br/>
                Observaciones : <?php echo $row_data['observaciones']?></p>
            
            <p class="tbl_title">Fecha del siniestro</p>
            <p class="tbl_text">Fecha : <?php echo $row_data['Fecha']?><br/>
            Hora : <?php echo $row_data['Hora']?></p>
            
            
            </td>
            <td class=" ">
            	<div id="map_canvas" style="width:100%; height:500px">
                	<script type="text/javascript">initialize();</script>
             	</div>
            </td>
		</tr>
                     
	</tbody>
</table>  
</div>
</div>

<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de personas que vio el vehiculo</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="290">Fecha y hora</th>
        <th>Nombre</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrVistas as $vistas) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $vistas['Fecha'].' - '.$vistas['Hora']; ?></td>
            <td class=" "><?php echo $vistas['nombre_visto']; ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>   
</div>

        
        
<div class="col-lg-12 fcenter" style="margin-bottom:50px">
<?php //Se verifican las variables
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != '')                                                     { $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')                                                     { $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')                                 { $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')                                 { $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ $location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                                                         { $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != '')                                                     { $location .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')                                                 { $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')                                                 { $location .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')                                           { $location .= "&dispositivo=".$_GET['dispositivo'] ; }
$location.='&view='.$_GET["view"];
?>
	<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
</div>
</div>



<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 }elseif ( ! empty($_GET['view']) ) { 
// Se trae un listado con todos los usuarios
$arrAlarmas = array();
$query = "SELECT 
robos_listado.idRobo,
clientes_listado.Nombre,
robos_listado.Fecha,
robos_listado.Hora,
vehiculos_marcas.Nombre AS nombre_marca,
vehiculos_modelos.Nombre AS nombre_modelo,
clientes_vehiculos.PPU
FROM `robos_listado`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente         = robos_listado.idCliente
LEFT JOIN clientes_vehiculos  ON clientes_vehiculos.idVehiculo      = robos_listado.idVehiculo
LEFT JOIN vehiculos_marcas    ON vehiculos_marcas.idMarca           = clientes_vehiculos.idMarca
LEFT JOIN vehiculos_modelos   ON vehiculos_modelos.idModelo         = clientes_vehiculos.idModelo

WHERE robos_listado.idCliente='{$_GET['view']}'
ORDER BY robos_listado.idRobo DESC ";
$resultado = mysql_query ($query, $dbConn);
$num_row = mysql_num_rows ($resultado);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAlarmas,$row );
}
$alarmas_n = mysql_num_rows ($resultado);
?>

                              
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div>
            <h5>
            <?php if ($alarmas_n!=''){ ?>
            Listado de Alarmas de <?php echo $arrAlarmas[0]['Nombre']; ?>
            <?php } else { ?>
            No hay alarmas que mostrar
            <?php } ?>
            
            </h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="190">Fecha</th>
        <th>Vehiculo</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php //Se verifican las variables
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != '')                                                     { $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')                                                     { $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')                                 { $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')                                 { $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ $location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                                                         { $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != '')                                                     { $location .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')                                                 { $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')                                                 { $location .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')                                           { $location .= "&dispositivo=".$_GET['dispositivo'] ; }
$x='&view='.$_GET["view"];
?>
    <?php foreach ($arrAlarmas as $alarmas) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $alarmas['Fecha'].' - '.$alarmas['Hora']; ?></td>
            <td class=" "><?php echo $alarmas['nombre_marca'].' '.$alarmas['nombre_modelo'].' patente '.$alarmas['PPU']; ?></td>
			<td class=" ">
            
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.$x.'&viewmap='.$alarmas['idRobo']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
  
</div>
 
<div class="col-lg-12 fcenter" style="margin-bottom:50px">

	<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
</div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['fullsearch']) ) { 
// Se trae un listado de todas las ciudades
$arrCiudad = array();
$query = "SELECT  idCiudad, Nombre
FROM `mnt_ubicacion_ciudad`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrCiudad,$row );
} 
// Se trae un listado de todas las comunas
$query = "SELECT  idComuna, idCiudad, Nombre
FROM `mnt_ubicacion_comunas` ";
$resultado = mysql_query ($query, $dbConn);
while ($Comuna[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Comuna);
array_multisort($Comuna, SORT_ASC); 
// Se trae un listado de todos los estados
$arrEstados = array();
$query = "SELECT  id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo=1
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrEstados,$row );
}?>
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.10.4.custom.css" />    
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
$(function() {
       $("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" }).val()
	   $("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" }).val()
	   
	   $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
});
</script>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Busqueda Avanzada</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" action="<?php echo $location ?>" name="form1" >
			
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombres</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre de Usuario" class="form-control"  name="Nombre"  >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Apellido Paterno</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Apellido Paterno" class="form-control"  name="Apellido_Paterno"  >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Apellido Materno</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Apellido Materno" class="form-control"  name="Apellido_Materno"  >
				</div>
			</div>
            
			<div class="form-group">
				<label class="control-label col-lg-4">Fecha Nacimiento - Inicio</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="Rango Fechas inicio" class="form-control timepicker-default" type="text" name="rango_a" id="datepicker1" >
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
					</div>
				</div>
			</div>
            
            <div class="form-group">
				<label class="control-label col-lg-4">Fecha Nacimiento - Termino</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="Rango Fechas termino" class="form-control timepicker-default" type="text" name="rango_b" id="datepicker2" >
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
					</div>
				</div>
			</div>

            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Sexo</label>
                <div class="col-lg-8">
                <select name="Sexo" class="form-control" >
                    <option value="" selected>Seleccione un Sexo</option>
                    <option value="M" >Masculino</option>
                    <option value="F" >Femenino</option>
                </select>
                </div>
            </div>
            

            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Estado Cliente</label>
				<div class="col-lg-8">
                    <select name="Estado" class="form-control" >
                    <option value="" selected="selected">Seleccione un Estado</option>
                    <?php foreach ($arrEstados as $estado) { ?>
                    <option value="<?php echo $estado['id_Detalle']; ?>" ><?php echo $estado['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Regiones</label>
                <div class="col-lg-8">
                <select name="idCiudad" class="form-control" onChange="cambia_ciudad()">
                <option value="" selected>Seleccione una Region</option>
                <?php foreach ( $arrCiudad as $ciudad ) { ?>
                <option value="<?php echo $ciudad['idCiudad']; ?>" ><?php echo $ciudad['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Comunas</label>
                <div class="col-lg-8">
                <select name="idComuna" class="form-control" >
                <option value="" selected>Seleccione una Comuna</option>
                </select>
                </div>
            </div>
            
<script>
<?php
//se imprime la id de la tarea
filtrar($Comuna, 'idCiudad'); 
foreach($Comuna as $tipo=>$componentes){ 
echo'var id_comuna_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idComuna'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Comuna as $tipo=>$componentes){ 
echo'var comuna_'.$tipo.'=new Array("Seleccione una Comuna"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_ciudad(){
	var Componente
	Componente = document.form1.idCiudad[document.form1.idCiudad.selectedIndex].value
	try {
	if (Componente != '') {
		id_comuna=eval("id_comuna_" + Componente)
		comuna=eval("comuna_" + Componente)
		num_int = id_comuna.length
		document.form1.idComuna.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idComuna.options[i].value=id_comuna[i]
		   document.form1.idComuna.options[i].text=comuna[i]
		}	
	}else{
		document.form1.idComuna.length = 1
		document.form1.idComuna.options[0].value = ""
	    document.form1.idComuna.options[0].text = "Seleccione una Comuna"
	}
	} catch (e) {
    alert("La Region seleccionada no posee comunas asignadas");
}
	document.form1.idComuna.options[0].selected = true
}
</script>
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Dispositivo</label>
                <div class="col-lg-8">
                <select name="dispositivo" class="form-control" >
                    <option value="" selected>Seleccione un dispositivo</option>
                    <option value="android" >Android</option>
                    <option value="iphone" >Iphone</option>
                </select>
                </div>
            </div>
            
			<div class="form-group">
            	<input type="hidden"  value="<?php echo $_GET['pagina'] ?>" name="pagina">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="filtrar">		
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<?php //Verifico si existe la variable de busqueda y pagina
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Se inicializa el paginador de resultados
//tomo el numero de la pagina si es que este existe
if(isset($_GET["pagina"])){
	$num_pag = $_GET["pagina"];	
} else {
	$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){
	$comienzo = 0 ;
	$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}

//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE clientes_listado.idTipoCliente>=0";	
}else{
	$z="WHERE clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
//Bloque de filtros
$x = '';
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){
	$z .=" AND clientes_listado.Rut LIKE '%{$_GET['search']}%'";
	$x .= "&search=".$_GET['search'] ; 	
}

if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')  { 
	$z .= " AND clientes_listado.Nombre LIKE '%{$_GET['Nombre']}%' " ;
	$x .= "&Nombre=".$_GET['Nombre'] ; 
}
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')  { 
	$z .= " AND clientes_listado.Apellido_Paterno LIKE '%{$_GET['Apellido_Paterno']}%' " ;
	$x .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; 
}
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')  { 
	$z .= " AND clientes_listado.Apellido_Materno LIKE '%{$_GET['Apellido_Materno']}%' " ;
	$x .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; 
}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND clientes_listado.fNacimiento BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;
	$x .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ;           
}
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')  { 
	$z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ;
	$x .= "&Sexo=".$_GET['Sexo'] ; 
}
if(isset($_GET['Estado']) && $_GET['Estado'] != '')  { 
	$z .= " AND clientes_listado.Estado = '".$_GET['Estado']."'" ;
	$x .= "&Estado=".$_GET['Estado'] ; 
}
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')  { 
	$z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ;
	$x .= "&idCiudad=".$_GET['idCiudad'] ; 
}
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')  { 
	$z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ;
	$x .= "&idComuna=".$_GET['idComuna'] ; 
}
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')  { 
	$z .= " AND clientes_listado.dispositivo = '".$_GET['dispositivo']."'" ;
	$x .= "&dispositivo=".$_GET['dispositivo'] ; 
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idCliente FROM `clientes_listado` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
clientes_listado.idCliente,
clientes_listado.Rut,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
clientes_listado.Apellido_Materno,
COUNT(robos_listado.idCliente) AS cantidad
FROM `clientes_listado`
LEFT JOIN robos_listado    ON robos_listado.idCliente     = clientes_listado.idCliente
".$z."
GROUP BY clientes_listado.Nombre, clientes_listado.Apellido_Paterno, clientes_listado.Apellido_Materno
ORDER BY clientes_listado.Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<?php 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
$location .= $x;?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Cliente</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Rut">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
			<a href="<?php echo $location; ?>&fullsearch=true" class="t_search_button_full" ><i class="fa fa-search-plus"></i></a>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
</div>
                      
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Clientes</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="209">Rut</th>
        <th>Nombre del Cliente</th>
        <th width="120">Cantidad</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $usuarios['Rut']; ?></td>
			<td class=" "><?php echo $usuarios['Nombre'].' '.$usuarios['Apellido_Paterno'].' '.$usuarios['Apellido_Materno']; ?></td>
            <td class=" "><?php echo $usuarios['cantidad']; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?>
<a href="<?php echo $location.'&view='.$usuarios['idCliente']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>
<a href="<?php echo $location.'&map='.$usuarios['idCliente']; ?>" title="Ver Mapa" class="icon-map info-tooltip"></a>
<?php }?>  
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
//Verifico si hay mas de una pagina, sino coulto el paginador
if($total_paginas>1){
//Cargamos la ubicacion original
$location = $original;
$location .='?pagina=';
if (isset($_GET['search'])) { 
$x ='&search='.$_GET['search'];
} else {
$x='';	
}?>
    <div class="row">
        <div class="contaux">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination menucent">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">← Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">← Anterior</a></li>
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
                    <li class="next"><a href="<?php echo $location.($num_pag+1).$x ?>">Siguiente → </a></li>
                    <?php } else {?>
                    <li class="next disabled"><a href="">Siguiente → </a></li>
                    <?php } ?>
                </ul>
            </div> 
        </div>
    </div>
<?php }?>   
</div>
</div>


<?php } ?>
			<!-- InstanceEndEditable -->   
            </div>
        </div>
      </div> 
    </div>
    <?php require_once 'core/footer.php';?>
    <!--jQuery 2.1.0 -->
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <!--Bootstrap -->
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- Screenfull -->
    <script src="assets/lib/screenfull/screenfull.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script src="assets/lib/fullcalendar/fullcalendar.min.js"></script>
    <script src="assets/lib/jquery.tablesorter/jquery.tablesorter.min.js"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/lib/flot/jquery.flot.js"></script>
    <script src="assets/lib/flot/jquery.flot.selection.js"></script>
    <script src="assets/lib/flot/jquery.flot.resize.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>