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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
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
$original = "transantiago_control_historico.php";
$location = $original;
//Se agregan ubicaciones
if(isset($_GET['filter']) && $_GET['filter'] != ''){                  $location .= "?filter=".$_GET['filter'] ; 	}
if(isset($_GET['search']) && $_GET['search'] != ''){                  $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['PPU']) && $_GET['PPU'] != ''){                        $location .= "&PPU=".$_GET['PPU'] ;  }
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {              $location .= "&N_Motor=".$_GET['N_Motor'] ; }
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {            $location .= "&N_Chasis=".$_GET['N_Chasis'] ; }
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  {      $location .= "&idConductor=".$_GET['idConductor'] ; }
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {  $location .= "&idPropietario=".$_GET['idPropietario'] ; }
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {      $location .= "&idRecorrido=".$_GET['idRecorrido'] ; }
if(isset($_GET['idRuta']) && $_GET['idRuta'] != '')  {                $location .= "&idRuta='".$_GET['idRuta']."'" ;}
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {              $location .= "&idMarca=".$_GET['idMarca'] ; }
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {            $location .= "&idModelo=".$_GET['idModelo'] ; }
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {  $location .= "&idTransmision=".$_GET['idTransmision'] ;  }
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {        $location .= "&idColorV_1=".$_GET['idColorV_1'] ;  }
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {        $location .= "&idColorV_2=".$_GET['idColorV_2'] ;  }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != '')  {              $location .= "&rango_a=".$_GET['rango_a'] ;  }
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$location .= "&fechaInicio={$_GET['fechaInicio']}&fechaTermino={$_GET['fechaTermino']}" ;           
}



//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'filter';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/z_filtros.php';
}

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
    <link rel="stylesheet" href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css">
    <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.css">
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<script src="assets/js/personel.js"></script>
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
                <?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?><img src="upload/<?php echo $arrUsuario['imgLogo']; ?>" alt=""><?php }else{?><img src="img/logo_default.png" alt=""><?php } ?>
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
 if ( ! empty($_GET['view']) ) { 
//Le agrego condiciones a la consulta
$z="WHERE clientes_listado.idTipoCliente=3";	//Sistema transantiago
//Otros filtros
$z .=" AND clientes_listado.Nombre=''";
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){                  $z .= " AND clientes_listado.PPU LIKE '%{$_GET['search']}%'";}
if (isset($_GET['PPU']) && $_GET['PPU'] != ''){                        $z .= " AND clientes_listado.PPU LIKE '%{$_GET['PPU']}%'";}
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {               $z .= " AND clientes_listado.N_Motor LIKE '%{$_GET['N_Motor']}%' " ;}
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {             $z .= " AND clientes_listado.N_Chasis LIKE '%{$_GET['N_Chasis']}%' " ;}
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {   $z .= " AND clientes_listado.idPropietario = '".$_GET['idPropietario']."'" ;}
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {               $z .= " AND clientes_listado.idMarca = '".$_GET['idMarca']."'" ;}
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {             $z .= " AND clientes_listado.idModelo = '".$_GET['idModelo']."'" ;}
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {   $z .= " AND clientes_listado.idTransmision = '".$_GET['idTransmision']."'" ;}
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {         $z .= " AND clientes_listado.idColorV_1 = '".$_GET['idColorV_1']."'" ;}
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {         $z .= " AND clientes_listado.idColorV_2 = '".$_GET['idColorV_2']."'" ;}
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  {       $z .= " AND transantiago_historico.idConductor = '".$_GET['idConductor']."'" ;}
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {       $z .= " AND transantiago_historico.idRecorrido = '".$_GET['idRecorrido']."'" ;}
if(isset($_GET['idRuta']) && $_GET['idRuta'] != '')  {                 $z .= " AND transantiago_historico.idRuta = '".$_GET['idRuta']."'" ;}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != '')  {               $z .= " AND transantiago_historico.Fecha = '".$_GET['rango_a']."'" ;}
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$z .= " AND clientes_listado.fFabricacion BETWEEN '{$_GET['fechaInicio']}' AND '{$_GET['fechaTermino']}'" ;        
}


//Realizo la consulta
$arrControl = array();	
$query="SELECT 
transantiago_historico.Fecha,
transantiago_historico.Hora,
transantiago_historico.Latitud,
transantiago_historico.Longitud,
transantiago_recorridos.Nombre AS recorrido,
transantiago_rutas.Nombre AS ruta,
clientes_listado.PPU,
transantiago_conductores.Nombre AS Nombre_cond,
transantiago_conductores.Apellido_Paterno AS Apellido_cond

FROM `transantiago_historico` 
LEFT JOIN clientes_listado            ON clientes_listado.idCliente            = transantiago_historico.idCliente
LEFT JOIN `transantiago_recorridos`   ON transantiago_recorridos.idRecorrido   = transantiago_historico.idRecorrido
LEFT JOIN `transantiago_rutas`        ON transantiago_rutas.idRuta             = transantiago_historico.idRuta
LEFT JOIN `transantiago_conductores`  ON transantiago_conductores.idConductor  = transantiago_historico.idConductor
".$z."
ORDER BY transantiago_historico.Fecha ASC, transantiago_historico.Hora ASC
";	  
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrControl,$row );
}
mysql_free_result($resultado2);
?>
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
var map;
      function initialize() {
          var myLatlng = new google.maps.LatLng(-33.4691199, -70.641997);
		  var mapOptions = {
			zoom: 14,
			
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		  
		  
		
		<?php 
		$nn=1;
		foreach ($arrControl as $control) {?>
		  var marker_<?php echo $nn ?> = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $control['Latitud'] ?>, <?php echo $control['Longitud'] ?>),
			  map: map,
			  title:"<?php echo 'Vehiculo patente '.$control['PPU'].' - '.$control['recorrido'].' - '.$control['ruta'].' - '.$control['Fecha'].' - '.$control['Hora'] ?>",
			  icon: 'img/icn_trans.png'
			  
		  });
		  map.panTo(marker_<?php echo $nn ?>.position);	
		<?php 
		$nn++;
		}?> 
		webserv();
      } 


/* ************************************************************************** */
				function webserv() {
					var serviceAddr = 'http://200.29.15.107/rest/'
					$.ajax({
						crossDomain: true,
						type: 'get',
						url: serviceAddr + 'conocerecorrido',
						data: {
							codsint: '<?php echo $arrControl[0]['recorrido']?>'
						},
						success: function(resp) {
							dibujarRuta(resp)
						},
						error: function() {
							alert('No se ha podido conectar con e webservice');
						}
					});
				}
				/* ************************************************************************** */
				function dibujarRuta(data) {

					var color = data.negocio.color;
					var ruta, paraderos;

					<?php if($arrControl[0]['ruta']=='ida'){?>
						ruta = data.ida.path;
						paraderos = data.ida.paraderos;
					<?php }else{ ?>
						ruta = data.regreso.path;
						paraderos = data.regreso.paraderos;
					<?php } ?>
					drawRoute(ruta, color);
					showParaderos(paraderos);
				}
				/* ************************************************************************** */
				function drawRoute(ruta, color) {
					lineaServicio = drawRouteFromArray(ruta, {
						color: color
					});
					lineaServicio.oldColor = color;
					map.setZoom(14);
					
					marker.setPosition(new google.maps.LatLng(ruta[0][0], ruta[0][1]));
					map.panTo(marker.position);
				}
				/* ************************************************************************** */
				var drawRouteFromArray=function(arr,opt){
					var route=[];
					
					var tmp;
					
					for (var a in arr){
						if (arr[a].drawRoute!='undefined'&&arr[a].length==2){
							
							tmp=new google.maps.LatLng(arr[a][0],arr[a][1]);
							route.push(tmp);
						}
					}
					
					opt=opt||{}
					
					var drawn = new google.maps.Polyline({
						map: map,
						path: route,
						strokeColor: opt.color||'black',
						strokeOpacity: opt.opacity||1,
						strokeWeight: opt.strokeWeight||5
					});
					
					return drawn;
				}
				/* ************************************************************************** */
				var showParaderos = function(data) {

					for (var a in data) {
					
						var myLatlng = new google.maps.LatLng(data[a].pos[0], data[a].pos[1]);
						var marker2 = new google.maps.Marker({
							position: myLatlng,
							map: map,
							icon: 'img/icn_bus.png',
							title: "Paradero"
						});
					}
				}
				/* ************************************************************************** */	
				function codeLatLng(lat,lng, div) {
					geocoder = new google.maps.Geocoder();
					var latlng = new google.maps.LatLng(lat, lng);
					geocoder.geocode({'latLng': latlng}, function(results, status) {
						if (status == google.maps.GeocoderStatus.OK) {
							if (results[0]) {
								document.getElementById(div).value = results[0].formatted_address;
							} else {
								alert('No results found');
							}
						} else {
							alert('Geocoder failed due to: ' + status);
						}
					});
				}
				
				/* ************************************************************************** */	  
</script>

 <div class="form-group"><form class="form-horizontal"></form></div>
<div class="clearfix"></div>                     
     

	 
<div class="col-lg-6 fleft">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div>
			<h5>Datos de <?php echo 'Bus Patente '.$arrControl[0]['PPU'].' '.$arrControl[0]['recorrido'].' '.$arrControl[0]['ruta'].' '.$arrControl[0]['Nombre_cond'].' '.$arrControl[0]['Apellido_cond']; ?></h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Fecha</th>
        <th>Hora</th>
        <th>Latitud</th>
		<th>Longitud</th>
    </tr>
	</thead>
               
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrControl as $control) { ?>
    	<tr class="odd">
			<td><?php echo $control['Fecha']; ?></td>
			<td><?php echo $control['Hora']; ?></td>
			<td><?php echo $control['Latitud']; ?></td>
			<td><?php echo $control['Longitud']; ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
</div>
</div>

<div class="col-lg-6 fleft">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Geolocalizacion en el mapa</h5>
		</header>
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
			<thead>
			<tr role="row">
				<th width="100%">Mapa</th>
			</tr>
			</thead>                   
			<tbody role="alert" aria-live="polite" aria-relevant="all">
				<tr class="odd">
					<td height="500">
						<div id="map_canvas" style="width:100%; height:500px">
							<script type="text/javascript">initialize();</script>
						</div>
					</td>
				</tr>              
			</tbody>
		</table>        
	</div>
</div>
 
 
 
 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 }elseif ( ! empty($_GET['filter']) ) { 
 //Le agrego condiciones a la consulta
$z="WHERE clientes_listado.idTipoCliente=3";	//Sistema transantiago
//Otros filtros
$z .=" AND clientes_listado.Nombre=''";
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){                  $z .= " AND clientes_listado.PPU LIKE '%{$_GET['search']}%'";}
if (isset($_GET['PPU']) && $_GET['PPU'] != ''){                        $z .= " AND clientes_listado.PPU LIKE '%{$_GET['PPU']}%'";}
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {               $z .= " AND clientes_listado.N_Motor LIKE '%{$_GET['N_Motor']}%' " ;}
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {             $z .= " AND clientes_listado.N_Chasis LIKE '%{$_GET['N_Chasis']}%' " ;}
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {   $z .= " AND clientes_listado.idPropietario = '".$_GET['idPropietario']."'" ;}
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {               $z .= " AND clientes_listado.idMarca = '".$_GET['idMarca']."'" ;}
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {             $z .= " AND clientes_listado.idModelo = '".$_GET['idModelo']."'" ;}
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {   $z .= " AND clientes_listado.idTransmision = '".$_GET['idTransmision']."'" ;}
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {         $z .= " AND clientes_listado.idColorV_1 = '".$_GET['idColorV_1']."'" ;}
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {         $z .= " AND clientes_listado.idColorV_2 = '".$_GET['idColorV_2']."'" ;}
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  {       $z .= " AND transantiago_historico.idConductor = '".$_GET['idConductor']."'" ;}
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {       $z .= " AND transantiago_historico.idRecorrido = '".$_GET['idRecorrido']."'" ;}
if(isset($_GET['idRuta']) && $_GET['idRuta'] != '')  {                 $z .= " AND transantiago_historico.idRuta = '".$_GET['idRuta']."'" ;}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != '')  {               $z .= " AND transantiago_historico.Fecha = '".$_GET['rango_a']."'" ;}
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$z .= " AND clientes_listado.fFabricacion BETWEEN '{$_GET['fechaInicio']}' AND '{$_GET['fechaTermino']}'" ;        
}


//Realizo la consulta
$arrControl = array();	
$query="SELECT 
transantiago_historico.idHistorico,
transantiago_recorridos.Nombre AS recorrido,
transantiago_rutas.Nombre AS ruta,
clientes_listado.PPU,
transantiago_conductores.Nombre AS Nombre_cond,
transantiago_conductores.Apellido_Paterno AS Apellido_cond

FROM `transantiago_historico` 
LEFT JOIN clientes_listado            ON clientes_listado.idCliente            = transantiago_historico.idCliente
LEFT JOIN `transantiago_recorridos`   ON transantiago_recorridos.idRecorrido   = transantiago_historico.idRecorrido
LEFT JOIN `transantiago_rutas`        ON transantiago_rutas.idRuta             = transantiago_historico.idRuta
LEFT JOIN `transantiago_conductores`  ON transantiago_conductores.idConductor  = transantiago_historico.idConductor
".$z."
GROUP BY clientes_listado.PPU AND transantiago_conductores.idConductor
";	  
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrControl,$row );
}
mysql_free_result($resultado2);
?>
<div class="form-group"><form class="form-horizontal"></form></div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Transantiago</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Datos del Bus</th>
        <th>Recorrido y Ruta</th>
        <th>Conductor</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
               
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrControl as $control) { ?>
    	<tr class="odd">
			<td><?php echo 'Patente '.$control['PPU']; ?></td>
            <td><?php echo $control['recorrido'].' - '.$control['ruta']; ?></td>
			<td><?php echo $control['Nombre_cond'].' '.$control['Apellido_cond']; ?></td>
			<td>
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$control['idHistorico']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>   
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $original; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="clientes_listado.idTipoCliente>=0 AND clientes_listado.PPU!='' ";	
}else{
	$z="clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']} AND clientes_listado.PPU!='' ";	
}
?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Busqueda</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" action="<?php echo $location ?>" name="form1">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($idConductor)) {     $x1  = $idConductor;      }else{$x1  = '';}
			if(isset($idPropietario)) {   $x2  = $idPropietario;    }else{$x2  = '';}
			if(isset($idRecorrido)) {     $x3  = $idRecorrido;      }else{$x3  = '';}
			if(isset($idRuta)) {          $x4  = $idRuta;           }else{$x4  = '';}
			if(isset($PPU)) {             $x5  = $PPU;              }else{$x5  = '';}
			if(isset($idMarca)) {         $x6  = $idMarca;          }else{$x6  = '';}
			if(isset($idModelo)) {        $x7  = $idModelo;         }else{$x7  = '';}
			if(isset($idTransmision)) {   $x8  = $idTransmision;    }else{$x8  = '';}
			if(isset($idColorV_1)) {      $x9  = $idColorV_1;       }else{$x9  = '';}
			if(isset($idColorV_2)) {      $x10  = $idColorV_2;      }else{$x10  = '';}
			if(isset($fechaInicio)) {     $x11  = $fechaInicio;     }else{$x11  = '';}
			if(isset($fechaTermino)) {    $x12  = $fechaTermino;    }else{$x12  = '';}
			if(isset($N_Motor)) {         $x13  = $N_Motor;         }else{$x13  = '';}
			if(isset($N_Chasis)) {        $x14  = $N_Chasis;        }else{$x14  = '';}
			if(isset($rango_a)) {         $x15  = $rango_a;         }else{$x15  = '';}
			
			//se dibujan los inputs
			echo form_select_filter('Conductor','idConductor', $x1, 1, 'idConductor', 'Nombre,Apellido_Paterno,Apellido_Materno', 'transantiago_conductores', 0, $dbConn);
			echo form_select_filter('Propietario','idPropietario', $x2, 1, 'idPropietario', 'Nombre,Apellido_Paterno,Apellido_Materno', 'transantiago_propietarios', 0, $dbConn);
			echo form_select_filter('Recorrido','idRecorrido', $x3, 2, 'idRecorrido', 'Nombre', 'transantiago_recorridos', 0, $dbConn);
			echo form_select('Ruta','idRuta', $x4, 1, 'idRuta', 'Nombre', 'transantiago_rutas', 0, $dbConn);
			echo form_select_filter('Vehiculos','PPU', $x5, 2, 'PPU', 'PPU', 'clientes_listado', $z, $dbConn);
			echo form_select_depend1('Marca','idMarca', $x6, 1, 'idMarca', 'Nombre', 'buses_marcas', 0,
									'Modelo','idModelo', $x7, 1, 'idModelo', 'idMarca', 'Nombre', 'buses_modelos', 0, 
									$dbConn);	
			echo form_select('Tipo de Transmision','idTransmision', $x8, 1, 'idTransmision', 'Nombre', 'buses_transmision', 0, $dbConn);
			echo form_select('Color Base','idColorV_1', $x9, 1, 'idColorV', 'Nombre', 'buses_colores', 0, $dbConn);
			echo form_select('Color Complementario','idColorV_2', $x10, 1, 'idColorV', 'Nombre', 'buses_colores', 0, $dbConn);
			echo form_date('F Fabricacion Inicio','fechaInicio', $x11, 1);
			echo form_date('F Fabricacion Fin','fechaTermino', $x12, 1);
			echo form_input('text', 'Numero de Motor', 'N_Motor', $x13, 1);
			echo form_input('text', 'Numero de Chasis', 'N_Chasis', $x14, 1);	
			echo form_date('Fecha Control','rango_a', $x15, 2);

			?>
			
			<div class="form-group">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="filtrar">
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>

              
<?php } ?>		<!-- InstanceEndEditable -->   
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