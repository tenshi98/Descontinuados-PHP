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
$original = "alerta_transantiago_listado.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para editar
if ( !empty($_GET['id']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'silence';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/alertas_listado.php';
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
      <div id="content">
        <div class="outer">
            <div class="inner">
			<!-- InstanceBeginEditable name="Bodytext" -->
<?php 
//Listado de errores no manejables
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Alerta Silenciada correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
//Se toman los datos para mostrarlos
$query="SELECT 
clientes_listado.PPU,
vehiculos_marcas.Nombre AS Nombre_marca,
vehiculos_modelos.Nombre AS Nombre_modelo,
vehiculos_transmision.Nombre AS Nombre_transmision,
color1.Nombre AS Nombre_color1,
color2.Nombre AS Nombre_color2,
clientes_listado.fTransferencia,
clientes_listado.fFabricacion,
clientes_listado.N_Motor,
clientes_listado.N_Chasis,
clientes_listado.Obs,
transantiago_recorridos.Nombre AS recorrido,

transantiago_propietarios.Nombre AS Prop_Nombre,
transantiago_propietarios.Apellido_Paterno AS Prop_ApellidoPat,
transantiago_propietarios.Apellido_Materno AS Prop_ApellidoMat,
transantiago_propietarios.Rut AS Prop_Rut,
transantiago_propietarios.Sexo AS Prop_Sexo,
transantiago_propietarios.fNacimiento AS Prop_Fnac,
transantiago_propietarios.email AS Prop_Email,
transantiago_propietarios.Pais AS Prop_Pais,
prop_ciudad.Nombre AS Prop_Ciudad,
prop_comuna.Nombre AS Prop_Comuna,
transantiago_propietarios.Direccion AS Prop_Direccion,
transantiago_propietarios.Fono1 AS Prop_Fono1,
transantiago_propietarios.Fono2 AS Prop_Fono2,
transantiago_propietarios.NombreEmpresa AS Prop_Empresa,

transantiago_conductores.Nombre AS Cond_Nombre,
transantiago_conductores.Apellido_Paterno AS Cond_ApellidoPat,
transantiago_conductores.Apellido_Materno AS Cond_ApellidoMat,
transantiago_conductores.Rut AS Cond_Rut,
transantiago_conductores.Sexo AS Cond_Sexo,
transantiago_conductores.fNacimiento AS Cond_Fnac,
transantiago_conductores.email AS Cond_Email,
transantiago_conductores.Pais AS Cond_Pais,
cond_ciudad.Nombre AS Cond_Ciudad,
cond_comuna.Nombre AS Cond_Comuna,
transantiago_conductores.Direccion AS Cond_Direccion,
transantiago_conductores.Fono1 AS Cond_Fono1,
transantiago_conductores.Fono2 AS Cond_Fono2,

alertas_listado.Fecha,
alertas_listado.Hora,
alertas_listado.Longitud,
alertas_listado.Latitud, 
alertas_tipos.Nombre AS tipo_alerta,
mnt_imagenes_listado.file AS imagen_alerta

FROM alertas_listado 
LEFT JOIN `clientes_listado`          ON clientes_listado.idCliente         = alertas_listado.idCliente

LEFT JOIN `transantiago_recorridos`               ON transantiago_recorridos.idRecorrido     = clientes_listado.idRecorrido
LEFT JOIN `vehiculos_marcas`                      ON vehiculos_marcas.idMarca                = clientes_listado.idMarca
LEFT JOIN `vehiculos_modelos`                     ON vehiculos_modelos.idModelo              = clientes_listado.idModelo
LEFT JOIN `detalle_general`                       ON detalle_general.id_Detalle              = clientes_listado.Estado
LEFT JOIN `clientes_tipos`                        ON clientes_tipos.idTipoCliente            = clientes_listado.idTipoCliente
LEFT JOIN `transantiago_propietarios`             ON transantiago_propietarios.idPropietario = clientes_listado.idPropietario
LEFT JOIN `transantiago_conductores`              ON transantiago_conductores.idConductor    = clientes_listado.idConductor
LEFT JOIN `vehiculos_transmision`                 ON vehiculos_transmision.idTransmision     = clientes_listado.idTransmision
LEFT JOIN `vehiculos_colores`      color1         ON color1.idColorV                         = clientes_listado.idColorV_1
LEFT JOIN `vehiculos_colores`      color2         ON color2.idColorV                         = clientes_listado.idColorV_2

LEFT JOIN `mnt_ubicacion_ciudad`   prop_ciudad    ON prop_ciudad.idCiudad                    = transantiago_propietarios.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`  prop_comuna    ON prop_comuna.idComuna                    = transantiago_propietarios.idComuna
LEFT JOIN `mnt_ubicacion_ciudad`   cond_ciudad    ON cond_ciudad.idCiudad                    = transantiago_conductores.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`  cond_comuna    ON cond_comuna.idComuna                    = transantiago_conductores.idComuna




LEFT JOIN `alertas_tipos`             ON alertas_tipos.idTipoAlerta         = alertas_listado.idTipoAlerta
LEFT JOIN `mnt_imagenes_listado`      ON mnt_imagenes_listado.idListimg     = alertas_tipos.idListimg

WHERE alertas_listado.idAlerta = '{$_GET['view']}'";	  
$resultado2 = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado2);
?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $rowdata['Latitud'] ?>, <?php echo $rowdata['Longitud'] ?>);
		  var mapOptions = {		
			  zoom: 16,		
			  scrollwheel: false,		
			  center: myLatlng,		
			  mapTypeId: google.maps.MapTypeId.ROADMAP	  
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		  var marker = new google.maps.Marker({		  
			  position:  new google.maps.LatLng(<?php echo $rowdata['Latitud'] ?>, <?php echo $rowdata['Longitud'] ?>),		  
			  map: map,		  
			  title:"<?php echo $rowdata['tipo_alerta'] ?>",		  
			  icon: 'upload/<?php echo $rowdata['imagen_alerta']; ?>'	  
		  });	  	  	 	  		
      }  
</script>

<div class="col-lg-12">
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Alarmas</h5>	
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
					<td height="500">
						<h2 class="text-primary">Datos del Vehiculo</h2>
							<p class="text-muted"><strong>Patente : </strong><?php echo $rowdata['recorrido']; ?></p>
							<p class="text-muted"><strong>Patente : </strong><?php echo $rowdata['PPU']; ?></p>
							<p class="text-muted"><strong>Marca : </strong><?php echo $rowdata['Nombre_marca']; ?></p>
							<p class="text-muted"><strong>Modelo : </strong><?php echo $rowdata['Nombre_modelo']; ?></p>
							<p class="text-muted"><strong>Transmision : </strong><?php echo $rowdata['Nombre_transmision']; ?></p>
							<p class="text-muted"><strong>Color 1 : </strong><?php echo $rowdata['Nombre_color1']; ?></p>
							<p class="text-muted"><strong>Color 2 : </strong><?php echo $rowdata['Nombre_color2']; ?></p>
							<p class="text-muted"><strong>Fecha de Transferencia : </strong><?php echo Fecha_completa($rowdata['fTransferencia']); ?></p>
							<p class="text-muted"><strong>Fecha de Fabricacion : </strong><?php echo Fecha_completa($rowdata['fFabricacion']); ?></p>
							<p class="text-muted"><strong>Numero de Motor : </strong><?php echo $rowdata['N_Motor']; ?></p>
							<p class="text-muted"><strong>Numero de Chasis : </strong><?php echo $rowdata['N_Chasis']; ?></p>
							<p class="text-muted"><strong>Observacion : </strong><?php echo $rowdata['Obs']; ?></p>
							
							
						<h2 class="text-primary">Datos del Propietario</h2>
							<p class="text-muted"><strong>Propietario : </strong><?php echo $rowdata['Prop_Nombre'].' '.$rowdata['Prop_ApellidoPat'].' '.$rowdata['Prop_ApellidoMat']; ?></p>
							<p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Prop_Rut']; ?></p>
							<p class="text-muted"><strong>Sexo : </strong><?php echo $rowdata['Prop_Sexo']; ?></p>
							<p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['Prop_Fnac']); ?></p>
							<p class="text-muted"><strong>Email : </strong><?php echo $rowdata['Prop_Email']; ?></p>
							<p class="text-muted"><strong>Pais : </strong><?php echo $rowdata['Prop_Pais']; ?></p>
							<p class="text-muted"><strong>Region : </strong><?php echo $rowdata['Prop_Ciudad']; ?></p>
							<p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['Prop_Comuna']; ?></p>
							<p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Prop_Direccion']; ?></p>
							<p class="text-muted"><strong>Fono 1 : </strong><?php echo $rowdata['Prop_Fono1']; ?></p>
							<p class="text-muted"><strong>Fono 2 : </strong><?php echo $rowdata['Prop_Fono2']; ?></p>
							<p class="text-muted"><strong>Empresa : </strong><?php echo $rowdata['Prop_Empresa']; ?></p>

						<h2 class="text-primary">Datos del Conductor</h2>
							<p class="text-muted"><strong>Propietario : </strong><?php echo $rowdata['Cond_Nombre'].' '.$rowdata['Cond_ApellidoPat'].' '.$rowdata['Cond_ApellidoMat']; ?></p>
							<p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Cond_Rut']; ?></p>
							<p class="text-muted"><strong>Sexo : </strong><?php echo $rowdata['Cond_Sexo']; ?></p>
							<p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['Cond_Fnac']); ?></p>
							<p class="text-muted"><strong>Email : </strong><?php echo $rowdata['Cond_Email']; ?></p>
							<p class="text-muted"><strong>Pais : </strong><?php echo $rowdata['Cond_Pais']; ?></p>
							<p class="text-muted"><strong>Region : </strong><?php echo $rowdata['Cond_Ciudad']; ?></p>
							<p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['Cond_Comuna']; ?></p>
							<p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Cond_Direccion']; ?></p>
							<p class="text-muted"><strong>Fono 1 : </strong><?php echo $rowdata['Cond_Fono1']; ?></p>
							<p class="text-muted"><strong>Fono 2 : </strong><?php echo $rowdata['Cond_Fono2']; ?></p>

						<h2 class="text-primary">Datos de la alerta</h2>
							<p class="text-muted"><strong>Fecha : </strong><?php echo $rowdata['Fecha']; ?></p>
							<p class="text-muted"><strong>Hora : </strong><?php echo $rowdata['Hora']; ?></p>
							<p class="text-muted"><strong>Tipo de alerta : </strong><?php echo $rowdata['tipo_alerta']; ?></p>
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
        
		<!-- InstanceEndEditable -->   
            </div>
        </div>
      </div> 
    </div>
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