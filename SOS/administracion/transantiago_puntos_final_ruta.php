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
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
//require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
//$_POST = filterXSS($_POST);
//require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
//$ifilter = new InputFilter();
//$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "transantiago_puntos_final_ruta.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){             $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['idEstado']) && $_GET['idEstado'] != ''){         $location .= "&idEstado=".$_GET['idEstado'] ; }
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != ''){   $location .= "&idRecorrido=".$_GET['idRecorrido'] ; }
if(isset($_GET['idRuta']) && $_GET['idRuta'] != ''){             $location .= "&idRuta=".$_GET['idRuta'] ; }
if(isset($_GET['Nombre']) && $_GET['Nombre'] != ''){             $location .= "&Nombre=".$_GET['Nombre'] ; }
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idEstado,idRecorrido,idRuta,Nombre';
	$form_trabajo= 'insert_to_edit';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/transantiago_rutas_multi.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$location.='&id='.$_GET['id'];
	$form_obligatorios = 'idRutaAlt,idEstado,idRecorrido,idRuta,Nombre';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/transantiago_rutas_multi.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/transantiago_rutas_multi.php';	
}
//formulario para crear
if ( !empty($_POST['submit_ruta']) )  { 
	//Llamamos al formulario
	$location.='&id='.$_GET['id'];
	$form_obligatorios = '';
	$form_trabajo= 'update_off';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/transantiago_rutas_multi.php';
	$form_obligatorios = 'idRutaAlt,Latitud,Longitud,direccion';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/transantiago_rutas_multi_listado.php';
}
//se borra un dato
if ( !empty($_GET['del_ruta']) )     {
	//Llamamos al formulario
	$location.='&id='.$_GET['id'];
	$form_obligatorios = '';
	$form_trabajo= 'del_ruta';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/transantiago_rutas_multi_listado.php';	
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
<?php 
//Listado de errores no manejables
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Punto de Final de Ruta creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Punto de Final de Ruta editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Punto de Final de Ruta borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>			
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT 
transantiago_rutas_multi.idEstado, 
transantiago_rutas_multi.Nombre, 
transantiago_rutas_multi.idRecorrido, 
transantiago_rutas_multi.idRuta,
transantiago_rutas.Nombre AS Ruta,
transantiago_recorridos.Nombre AS Recorrido
FROM `transantiago_rutas_multi`
LEFT JOIN `transantiago_rutas`       ON transantiago_rutas.idRuta             = transantiago_rutas_multi.idRuta
LEFT JOIN `transantiago_recorridos`  ON transantiago_recorridos.idRecorrido   = transantiago_rutas_multi.idRecorrido
WHERE idRutaAlt = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los rutas
$arrRutasAlt = array();
$query = "SELECT idListado,Latitud, Longitud, direccion
FROM `transantiago_rutas_multi_listado`
WHERE idRutaAlt = {$_GET['id']}
ORDER BY idListado ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRutasAlt,$row );
}
?>

<div class="col-lg-4 fleft">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos del Punto de Final de Ruta</h5>
		</header>
		<div id="div-1" class="body">
			<form class="form-horizontal" method="post" name="form1">
			
				<?php 
				//Se verifican si existen los datos
				if(isset($idEstado)) {      $x1  = $idEstado;      }else{$x1  = $rowdata['idEstado'];}
				if(isset($idRecorrido)) {   $x2  = $idRecorrido;   }else{$x2  = $rowdata['idRecorrido'];}
				if(isset($idRuta)) {        $x3  = $idRuta;        }else{$x3  = $rowdata['idRuta'];}
				if(isset($Nombre)) {        $x4  = $Nombre;        }else{$x4  = $rowdata['Nombre'];}

				//se dibujan los inputs
				echo form_select('Estado','idEstado', $x1, 2, 'idEstado', 'Nombre', 'transantiago_rutas_multi_estado', 0, $dbConn);
				echo form_select('Recorrido','idRecorrido', $x2, 2, 'idRecorrido', 'Nombre', 'transantiago_recorridos', 0, $dbConn);
				echo form_select('Ruta','idRuta', $x3, 2, 'idRuta', 'Nombre', 'transantiago_rutas', 0, $dbConn);
				echo form_textarea('Descripcion', 'Nombre', $x4, 2); 
				?>

				<div class="form-group">
					<input type="hidden" name="idRutaAlt" value="<?php echo $_GET['id']; ?>" >
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				</div>
                      
			</form> 
                    
		</div>
	</div>
</div>

<div class="col-lg-8 fleft">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Ingresar Puntos de referencia</h5>
		</header>
		<div id="div-1" class="body">
			<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
			<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
			<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

			<div id="map_canvas" style="width: 100%; height: 550px;"></div>
			<script>

				var map;
				var marker;
				
				
	
				/* ************************************************************************** */
				function initialize() {
					var myLatlng = new google.maps.LatLng(-33.477271996598965, -70.65170304882815);

					var myOptions = {
						zoom: 12,
						center: myLatlng,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					};
					map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

					marker = new google.maps.Marker({
						draggable: true,
						position: myLatlng,
						map: map,
						icon: 'img/icn_trans.png',
						title: "Tu Ubicacion"
					});

					google.maps.event.addListener(marker, 'dragend', function (event) {

						document.getElementById("Latitud").value = event.latLng.lat();
						document.getElementById("Longitud").value = event.latLng.lng();
						codeLatLng(event.latLng.lat(),event.latLng.lng(),'direccion')

					});
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
							codsint: '<?php echo $rowdata['Recorrido']?>'
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

					<?php if($rowdata['Ruta']=='ida'){?>
						ruta = data.ida.path;
						paraderos = data.ida.paraderos;
					<?php }else{ ?>
						ruta = data.regreso.path;
						paraderos = data.regreso.paraderos;
					<?php } ?>
					drawRoute(ruta, color);
					showParaderos(paraderos);
					//RutasAlternativas();
					PuntosControl();
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
				function PuntosControl() {
					
					var data = [ 
					<?php 
					$xx=0;
					foreach ( $arrRutasAlt as $pos ) { ?>
						[<?php echo $pos['Latitud']; ?>, <?php echo $pos['Longitud']; ?>], 					
					<?php
					$xx++;
					} ?>
					];
					
					for (var i in data) {
						var myLatlng = new google.maps.LatLng(data[i][0], data[i][1]);
						var marker2 = new google.maps.Circle({
							strokeColor: '#2E29AF',
							strokeOpacity: 0.8,
							strokeWeight: 2,
							fillColor: '#2E29AF',
							fillOpacity: 0.35,
							map: map,
							center: myLatlng,
							radius: 150

						});
					}
					
					if(data){
						marker.setPosition(new google.maps.LatLng(data[data.length - 1][0], data[data.length - 1][1]));
						map.panTo(marker.position);
					}
					
				}
				/* ************************************************************************** */
				
				
				
				google.maps.event.addDomListener(window, "load", initialize());
			
			
			

			</script>
			
			<br/>
		
			<?php if($xx==0){?>
			<form class="form-horizontal" method="post" name="form1">
			
				<?php 
				//Se verifican si existen los datos
				if(isset($Latitud)) {        $x1  = $Latitud;        }else{$x1  = '';}
				if(isset($Longitud)) {       $x2  = $Longitud;       }else{$x2  = '';}
				if(isset($direccion)) {      $x3  = $direccion;      }else{$x3  = '';}

				//se dibujan los inputs
				echo form_input('text', 'Latitud', 'Latitud', $x1, 2);
				echo form_input('text', 'Longitud', 'Longitud', $x2, 2);
				echo form_input('text', 'Direccion', 'direccion', $x3, 2);
				?>

				<div class="form-group">
					<input type="hidden" name="idRutaAlt" value="<?php echo $_GET['id']; ?>" >
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Punto" name="submit_ruta"> 
				</div>
                      
			</form>
			<?php }else{?>
			<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
				<thead>
				<tr role="row">
					<th>Calle</th>
					<th width="120">Acciones</th>
				</tr>
				</thead>
								  
				<tbody role="alert" aria-live="polite" aria-relevant="all">
				<?php foreach ($arrRutasAlt as $rutas) { ?>
					<tr class="odd">
						<td><?php echo $rutas['direccion']; ?></td>
						<td>   
							<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&id='.$_GET['id'].'&del_ruta='.$rutas['idListado'];?>
							<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?>
						</td>
					</tr>
				<?php } ?>                    
				</tbody>
			</table>
			<?php } ?>

                    
		</div>
	</div>
</div>


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Punto de Final de Ruta</h5>
		</header>
		<div id="div-1" class="body">
			<form class="form-horizontal" method="post" name="form1">

				<?php 
				//Se verifican si existen los datos
				if(isset($idRecorrido)) {   $x1  = $idRecorrido;   }else{$x1  = '';}
				if(isset($idRuta)) {        $x2  = $idRuta;        }else{$x2  = '';}
				if(isset($Nombre)) {        $x3  = $Nombre;        }else{$x3  = '';}

				//se dibujan los inputs
				echo form_select('Recorrido','idRecorrido', $x1, 2, 'idRecorrido', 'Nombre', 'transantiago_recorridos', 0, $dbConn);
				echo form_select('Ruta','idRuta', $x2, 2, 'idRuta', 'Nombre', 'transantiago_rutas', 0, $dbConn);
				echo form_textarea('Descripcion', 'Nombre', $x3, 2); 
				?>

				<div class="form-group">
					<input type="hidden" name="idTipo" value="5" >
					<input type="hidden" name="idEstado" value="2" >
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
					<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
				</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['fullsearch']) ) { ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Busqueda Avanzada</h5>
		</header>
		<div id="div-1" class="body">
			<form name="form1" class="form-horizontal" action="<?php echo $location; ?>" >
			
				<?php 
				//Se verifican si existen los datos
				if(isset($idEstado)) {      $x1  = $idEstado;      }else{$x1  = '';}
				if(isset($idRecorrido)) {   $x2  = $idRecorrido;   }else{$x2  = '';}
				if(isset($idRuta)) {        $x3  = $idRuta;        }else{$x3  = '';}
				if(isset($Nombre)) {        $x4  = $Nombre;        }else{$x4  = '';}

				//se dibujan los inputs
				echo form_select('Estado','idEstado', $x1, 1, 'idEstado', 'Nombre', 'transantiago_rutas_multi_estado', 0, $dbConn);
				echo form_select('Recorrido','idRecorrido', $x2, 1, 'idRecorrido', 'Nombre', 'transantiago_recorridos', 0, $dbConn);
				echo form_select('Ruta','idRuta', $x3, 1, 'idRuta', 'Nombre', 'transantiago_rutas', 0, $dbConn);
				echo form_textarea('Descripcion', 'Nombre', $x4, 1); 
				?>        
   
				<div class="form-group">
					<input type="hidden" name="pagina" value="1" >
					<input type="submit" class="btn btn-primary fright margin_width" value="Buscar" >
					<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
				</div>
                      
			</form> 
                    
		</div>
	</div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
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
//Le agrego condiciones a la consulta
$z="WHERE transantiago_rutas_multi.idTipo = 5";		
//Verifico si la variable de busqueda existe			
if (isset($_GET['search']) && $_GET['search'] != ''){               $z .= " AND transantiago_rutas_multi.Nombre LIKE '%{$_GET['search']}%'";}
if(isset($_GET['idEstado']) && $_GET['idEstado'] != '')  {          $z .= " AND transantiago_rutas_multi.idEstado = '".$_GET['idEstado']."'" ;}
if(isset($_GET['idDias']) && $_GET['idDias'] != '')  {              $z .= " AND transantiago_rutas_multi.idDias = '".$_GET['idDias']."'" ;}
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {    $z .= " AND transantiago_rutas_multi.idRecorrido = '".$_GET['idRecorrido']."'" ;}
if(isset($_GET['idRuta']) && $_GET['idRuta'] != '')  {              $z .= " AND transantiago_rutas_multi.idRuta = '".$_GET['idRuta']."'" ;}
if(isset($_GET['Fecha']) && $_GET['Fecha'] != '')  {                $z .= " AND transantiago_rutas_multi.Fecha = '".$_GET['Fecha']."'" ;}
if(isset($_GET['HoraInicio']) && $_GET['HoraInicio'] != '')  {      $z .= " AND transantiago_rutas_multi.HoraInicio = '".$_GET['HoraInicio']."'" ;}
if(isset($_GET['HoraTermino']) && $_GET['HoraTermino'] != '')  {    $z .= " AND transantiago_rutas_multi.HoraTermino = '".$_GET['HoraTermino']."'" ;}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')  {              $z .= " AND transantiago_rutas_multi.Nombre LIKE '%{$_GET['Nombre']}%' " ;}
//Realizo una consulta para saber el total de elementos existentes
$query1 = "SELECT transantiago_rutas_multi.idRutaAlt 
FROM `transantiago_rutas_multi` 
LEFT JOIN `transantiago_rutas_multi_dias`       ON transantiago_rutas_multi_dias.idDias          = transantiago_rutas_multi.idDias
LEFT JOIN `transantiago_rutas_multi_estado`     ON transantiago_rutas_multi_estado.idEstado      = transantiago_rutas_multi.idEstado
LEFT JOIN `transantiago_recorridos`             ON transantiago_recorridos.idRecorrido           = transantiago_rutas_multi.idRecorrido
LEFT JOIN `transantiago_rutas`                  ON transantiago_rutas.idRuta                     = transantiago_rutas_multi.idRuta
".$z."";
$registros1 = mysql_query($query1,$dbConn);
$cuenta_registros = mysql_num_rows($registros1);

//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los rutas
$arrRutas = array();
$query = "SELECT 
transantiago_rutas_multi.idRutaAlt, 
transantiago_rutas_multi.Nombre AS justificacion,
transantiago_rutas_multi_estado.Nombre AS estado,
transantiago_recorridos.Nombre AS Recorrido,
transantiago_rutas.Nombre AS Ruta
FROM `transantiago_rutas_multi`
LEFT JOIN `transantiago_rutas_multi_estado`     ON transantiago_rutas_multi_estado.idEstado      = transantiago_rutas_multi.idEstado
LEFT JOIN `transantiago_recorridos`             ON transantiago_recorridos.idRecorrido           = transantiago_rutas_multi.idRecorrido
LEFT JOIN `transantiago_rutas`                  ON transantiago_rutas.idRuta                     = transantiago_rutas_multi.idRuta
".$z."
ORDER BY transantiago_rutas_multi.Fecha DESC, transantiago_rutas_multi_estado.idEstado DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRutas,$row );
}
?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Por Descripcion</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Descripcion">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
			<a href="<?php echo $location; ?>&fullsearch=true" class="t_search_button_full" ><i class="fa fa-search-plus"></i></a>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Punto</a><?php }?>
</div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Puntos de Control</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
		<th>Recorrido</th>
		<th>Ruta</th>
		<th>Justificacion</th>
		<th>Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrRutas as $rutas) { ?>
    	<tr class="odd">
			<td><?php echo $rutas['Recorrido']; ?></td>
			<td><?php echo $rutas['Ruta']; ?></td>
			<td><?php echo $rutas['justificacion']; ?></td>
			<td><?php echo $rutas['estado']; ?></td>
			<td>   
				<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$rutas['idRutaAlt']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
				<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$rutas['idRutaAlt'];?>
				<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
if (isset($_GET['search'])) {  $search ='&search='.$_GET['search']; } else { $search='';}
echo paginador_1($total_paginas, $original, $search, $num_pag ) ?> 
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