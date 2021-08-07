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
$original = "seguridad_zonas.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idSistema,Nombre,ColorCode';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/seguridad_zonas_listado.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idZona,idSistema,Nombre,ColorCode';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/seguridad_zonas_listado.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/seguridad_zonas_listado.php';	
}
//formulario para crear
if ( !empty($_POST['submit_punto']) )  { 
	//se agregan ubicaciones
	$location .= "?idPuntos=".$_GET['idPuntos'] ;
	//Llamamos al formulario
	$form_obligatorios = 'idZona,Latitud,Longitud,Direccion,Orden';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/seguridad_zonas_listado_puntos.php';
}
//se borra un dato
if ( !empty($_GET['del_punto']) )     {
	//se agregan ubicaciones
	$location .= "?idPuntos=".$_GET['idPuntos'] ;
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/seguridad_zonas_listado_puntos.php';	
}
//se edita un dato
if ( !empty($_GET['up_orden']) )     {
	//se agregan ubicaciones
	$location .= "?idPuntos=".$_GET['idPuntos'] ;
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'up_orden';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/seguridad_zonas_listado_puntos.php';	
}
//se edita un dato
if ( !empty($_GET['down_orden']) )     {
	//se agregan ubicaciones
	$location .= "?idPuntos=".$_GET['idPuntos'] ;
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'down_orden';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/seguridad_zonas_listado_puntos.php';	
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
              <a href="principal.php" class="navbar-brand">
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
            <?php echo '<i class="'.$rowlevel['IconoCategoria'].'"></i> '.$rowlevel['nombre_transaccion']; ?>		
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Punto creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Punto editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Punto borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['idPuntos']) ) { 
// Se trae un listado con todos los puntos
$arrPuntos = array();
$query = "SELECT idPuntos, Latitud, Longitud, Direccion, Orden,idZona
FROM `seguridad_zonas_listado_puntos`
WHERE idZona = {$_GET['idPuntos']}
ORDER BY Orden ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPuntos,$row );
}
// variable utilizada para contar la cantidad de registros
$nn=1;

?>
	
	


<div class="col-lg-6 fleft">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Ingresar Puntos de referencia</h5>
		</header>
		<div id="div-1" class="body">
			
			<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

			<div id="map_canvas" style="width: 100%; height: 550px;"></div>
			<script>

				var map;
				var marker;
				
				


				/* ************************************************************************** */
				function initialize() {
					var myLatlng = new google.maps.LatLng(-33.477271996598965, -70.65170304882815);

					var myOptions = {
						zoom: 15,
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
						codeLatLng(event.latLng.lat(),event.latLng.lng(),'Direccion')

					});
					
					<?php if(isset($arrPuntos)&&$arrPuntos!=''){?>
						dibuja_zona();
					<?php } ?>
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
				function dibuja_zona() {
					
					var triangleCoords = [
						<?php 
						//Variables con la primera posicion
						$Latitud_x = '';
						$Longitud_x = '';
						//recorrer
						foreach ($arrPuntos as $puntos) {
							echo '{lat: '.$puntos['Latitud'].', lng: '.$puntos['Longitud'].'},
							';
							if(isset($puntos['Latitud'])&&$puntos['Latitud']!='0'){
								$Latitud_x = $puntos['Latitud'];
								$Longitud_x = $puntos['Longitud'];
							}
							//le sumo al orden
							$nn++;
						}
						if(isset($Longitud_x)&&$Longitud_x!=''){
							echo '{lat: '.$Latitud_x.', lng: '.$Longitud_x.'}'; 
						}	
						?>
					];
					
					<?php
					if(isset($Longitud_x)&&$Longitud_x!=''){
						echo 'marker.setPosition(new google.maps.LatLng('.$Latitud_x.', '.$Longitud_x.'));
							  map.panTo(marker.position);'; 
					}?>
					
						// Construct the polygon.
						var bermudaTriangle = new google.maps.Polygon({
							paths: triangleCoords,
							strokeColor: '#FF0000',
							strokeOpacity: 0.8,
							strokeWeight: 2,
							fillColor: '#FF0000',
							fillOpacity: 0.35
						});
						bermudaTriangle.setMap(map);

				
				}
				
				
				/* ************************************************************************** */
				
				google.maps.event.addDomListener(window, "load", initialize());
			
			
			

			</script>
			
			<br/>
		
			<form class="form-horizontal" method="post" name="form1">
			
				<?php 
				//Se verifican si existen los datos
				if(isset($Latitud)) {        $x1  = $Latitud;        }else{$x1  = '';}
				if(isset($Longitud)) {       $x2  = $Longitud;       }else{$x2  = '';}
				if(isset($Direccion)) {      $x3  = $Direccion;      }else{$x3  = '';}

				//se dibujan los inputs
				echo form_input('text', 'Latitud', 'Latitud', $x1, 2);
				echo form_input('text', 'Longitud', 'Longitud', $x2, 2);
				echo form_input('text', 'Direccion', 'Direccion', $x3, 2);
				echo '<input type="hidden" name="Orden" value="'.$nn.'" >';
				echo '<input type="hidden" name="idZona" value="'.$_GET['idPuntos'].'" >';
				?>

				<div class="form-group">
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Punto" name="submit_punto"> 
				</div>
                      
			</form>
			
                    
		</div>
	</div>
</div>


<div class="col-lg-6 fleft">
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Puntos</h5>	
		</header>
        
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
			<thead>
				<tr role="row">
					<th width="80">Orden</th>
					<th>Direccion</th>
					<th width="120">Acciones</th>
				</tr>
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all">
				<?php $location .= "?idPuntos=".$_GET['idPuntos'];
				$grill = 1;
				foreach ($arrPuntos as $puntos) { ?>
					<tr class="odd">		
						<td><?php echo $puntos['Orden']; ?></td>		
						<td class="word_break"><?php echo $puntos['Direccion']; ?></td>			
						<td>
							<?php if($grill!=1){?> 			
								<a href="<?php echo $location.'&up_orden='.$puntos['idPuntos'].'&idZona='.$puntos['idZona'].'&orden='.$puntos['Orden'] ?>" title="Subir un nivel" class="icon-up info-tooltip"></a>
							<?php } else {?>
								<a href="#" title="Subir un nivel" class="icon-up info-tooltip"></a>
							<?php } ?> 
							<?php if($puntos['Orden']!=$nn){?>     
								<a href="<?php echo $location.'&down_orden='.$puntos['idPuntos'].'&idZona='.$puntos['idZona'].'&orden='.$puntos['Orden'] ?>" title="Bajar un nivel" class="icon-down info-tooltip"></a>
							<?php } else {?>			
								<a href="#" title="Bajar un nivel" class="icon-down info-tooltip"></a>		
							<?php } ?>
							
							
							<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del_punto='.$puntos['idPuntos'];?>			
							<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?>		
						</td>	
					</tr>
				<?php
				$grill++;
				} ?>                    
			</tbody>
		</table>
	</div>
</div>


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $original; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT idSistema, Nombre, ColorCode
FROM `seguridad_zonas_listado`
WHERE idZona = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos del Cliente</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
        	
			<?php 
			//Se verifican si existen los datos
			if(isset($Nombre)) {       $x1  = $Nombre;       }else{$x1  = $rowdata['Nombre'];}
			if(isset($ColorCode)) {    $x2  = $ColorCode;    }else{$x2  = $rowdata['ColorCode'];}
			if(isset($idSistema)) {    $x3  = $idSistema;    }else{$x3  = $rowdata['idSistema'];}

			//se dibujan los inputs
			echo form_input('text', 'Nombre', 'Nombre', $x1, 2);
			echo form_input('color', 'Color', 'ColorCode', $x2, 2); 
			

			if($arrUsuario['tipo']=='SuperAdmin'){
			echo form_select('Sistema','idSistema', $x3, 2, 'idSistema', 'Nombre', 'core_sistemas', 0, $dbConn);
			}else{
			echo '<input type="hidden" name="idSistema"   value="'.$arrUsuario['idSistema'].' ">';
			}	 
			?>  
          
			<div class="form-group">
            	<input type="hidden" name="idZona" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Cliente</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($Nombre)) {       $x1  = $Nombre;       }else{$x1  = '';}
			if(isset($ColorCode)) {    $x2  = $ColorCode;    }else{$x2  = '#ff0000';}
			if(isset($idSistema)) {    $x3  = $idSistema;    }else{$x3  = '';}	

			//se dibujan los inputs
			echo form_input('text', 'Nombre', 'Nombre', $x1, 2);
			echo form_input('color', 'Color', 'ColorCode', $x2, 2); 
			

			if($arrUsuario['tipo']=='SuperAdmin'){
			echo form_select('Sistema','idSistema', $x3, 2, 'idSistema', 'Nombre', 'core_sistemas', 0, $dbConn);
			}else{
			echo '<input type="hidden" name="idSistema"   value="'.$arrUsuario['idSistema'].' ">';
			}	 
			?>  

			<div class="form-group">
				<input type="submit" class="btn btn-primary fright margin_width" value="Guardar" name="submit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>   


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//verifico que sea un administrador
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE seguridad_zonas_listado.idSistema>=0";	
}else{
	$z="WHERE seguridad_zonas_listado.idSistema={$arrUsuario['idSistema']}";	
}
// Se trae un listado con todos los datos
$arrZona = array();
$query = "SELECT 
seguridad_zonas_listado.idZona,
seguridad_zonas_listado.Nombre,
seguridad_zonas_listado.ColorCode,
seguridad_zonas_listado_puntos.Latitud,
seguridad_zonas_listado_puntos.Longitud

FROM `seguridad_zonas_listado`
LEFT JOIN `seguridad_zonas_listado_puntos` ON seguridad_zonas_listado_puntos.idZona = seguridad_zonas_listado.idZona
".$z."
ORDER BY seguridad_zonas_listado.Nombre ASC , seguridad_zonas_listado_puntos.Orden ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrZona,$row );
}

?>
<div class="form-group">
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>?new=true" class="btn btn-default fright margin_width" >Crear Nueva Zona</a><?php }?>
</div>
<div class="clearfix"></div>                     
   
<div class="col-lg-6">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Zonas</h5>	
	</header>
        
    <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th width="50">Color</th>
				<th>Zona</th>
				<th width="120">Acciones</th>
			</tr>
		</thead>
        <tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php 
	//llamamos a la función para filtrar los datos
	filtrar($arrZona, 'Nombre');
	//para saber la cantidad de celdas a utilizar
	$nn1=0;
	//recorremos el array para imprimirlo con formato HTML
	foreach($arrZona as $titulos=>$zonas) {
		$nn1++;
	}?> 

		
			
    <?php 
    $nn2=1;
    foreach($arrZona as $titulos=>$zonas) { ?>
    	<tr class="odd">
			
			<style>
				.tdcolor_<?php echo $nn2; ?>{
					background-color:<?php echo $zonas[0]['ColorCode']; ?> !important;
				}	
			</style>
					
			<td class="tdcolor_<?php echo $nn2; ?>"></td>		
			<td><?php echo $titulos; ?></td>		
			<td>
				<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'?idPuntos='.$zonas[0]['idZona']; ?>" title="Editar Puntos" class="icon-editar info-tooltip"></a><?php }?>
				<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'?id='.$zonas[0]['idZona']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
				<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$zonas[0]['idZona'];?>			
				<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?>		
			</td>
				
		</tr>
    <?php
    $nn2++;
    } ?>                  
		</tbody>
</table>
</div>
</div>

                                 
<div class="col-lg-6">
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Zonas</h5>	
		</header>
        
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th width="60%">Mapa</th>
			</tr>
		</thead>
		<tbody role="alert" aria-live="polite" aria-relevant="all">
			
			<tr class="odd">
				
				
				<td>
					<div id="map_canvas" style="width: 100%; height: 550px;"></div>
				</td>
					
			</tr>
			
	 
    
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <script>
		var map;
		var marker;
		
		
		<?php
		$contar=0;
		echo 'var maya = [
				';
		foreach($arrZona as $titulos=>$zonas) {
				echo '[
				';
				foreach($zonas as $zona) {
					echo "[".$zona['Latitud'].", ".$zona['Longitud'].", '".$zona['ColorCode']."'],
					";
				}
				echo '],
				';
				$contar++;
		}
		echo '];
		var cuenta='.$contar.';
		';

		?>
		
		
		
		/* ************************************************************************** */
		function initialize() {
			var myLatlng = new google.maps.LatLng(-33.477271996598965, -70.65170304882815);
			var myOptions = {
				zoom: 15,
				center: myLatlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

			for (x = 0; x < cuenta; x++) {
				
				var route=[];
				for(var i in maya[x]){
					tmp=new google.maps.LatLng(maya[x][i][0], maya[x][i][1]);
					route.push(tmp);
									 
					//console.log("lat="+maya[x][i][0]);
					//console.log("lon="+maya[x][i][1]);
					
				}
				
				var drawn = new google.maps.Polygon({
					path: route,
					strokeColor: maya[x][0][2],
					strokeOpacity: 0.8,
					strokeWeight: 2,
					fillColor: maya[x][0][2],
					fillOpacity: 0.35

				});
								
				drawn.setMap(map);

			}

	
		
		}
		

								 
								 		
		
				
				google.maps.event.addDomListener(window, "load", initialize());
			</script>
    
    
                 
	</tbody>
</table>

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
