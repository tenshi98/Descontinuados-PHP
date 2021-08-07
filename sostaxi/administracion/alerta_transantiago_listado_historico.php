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
$original = "alerta_transantiago_listado_historico.php";
$location = $original;
//Se agregan ubicaciones
if(isset($_GET['filter']) && $_GET['filter'] != ''){                   $location .= "?filter={$_GET['filter']}";}
if(isset($_GET['PPU']) && $_GET['PPU'] != ''){                         $location .= "&PPU={$_GET['PPU']}";}
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {               $location .= "&N_Motor={$_GET['N_Motor']}";}
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {             $location .= "&N_Chasis={$_GET['N_Chasis']}";}
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  {       $location .= "&idConductor={$_GET['idConductor']}";}
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {   $location .= "&idPropietario={$_GET['idPropietario']}";}
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {       $location .= "&idRecorrido={$_GET['idRecorrido']}";}
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {               $location .= "&idMarca={$_GET['idMarca']}";}
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {             $location .= "&idModelo={$_GET['idModelo']}";}
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {   $location .= "&idTransmision={$_GET['idTransmision']}";}
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {         $location .= "&idColorV_1={$_GET['idColorV_1']}";}
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {         $location .= "&idColorV_2={$_GET['idColorV_2']}";}
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '') {              $location .= "&idCiudad={$_GET['idCiudad']}";}
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '') {              $location .= "&idComuna={$_GET['idComuna']}";}
if(isset($_GET['idTipoAlerta']) && $_GET['idTipoAlerta'] != '') {      $location .= "&idTipoAlerta={$_GET['idTipoAlerta']}";}
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$location .= "&fechaInicio={$_GET['fechaInicio']}&fechaTermino={$_GET['fechaTermino']}";        
}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}";
}

//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
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
                <?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?>
					<img src="upload/<?php echo $arrUsuario['imgLogo']; ?>" alt="">
				<?php }else{?>
					<img src="img/logo_default.png" alt="">
				<?php } ?>
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

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view']) ) {
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
LEFT JOIN `clientes_listado`                      ON clientes_listado.idCliente              = alertas_listado.idCliente
LEFT JOIN `transantiago_conductores`              ON transantiago_conductores.idConductor    = alertas_listado.idConductor

LEFT JOIN `transantiago_recorridos`               ON transantiago_recorridos.idRecorrido     = clientes_listado.idRecorrido
LEFT JOIN `vehiculos_marcas`                      ON vehiculos_marcas.idMarca                = clientes_listado.idMarca
LEFT JOIN `vehiculos_modelos`                     ON vehiculos_modelos.idModelo              = clientes_listado.idModelo
LEFT JOIN `detalle_general`                       ON detalle_general.id_Detalle              = clientes_listado.Estado
LEFT JOIN `clientes_tipos`                        ON clientes_tipos.idTipoCliente            = clientes_listado.idTipoCliente
LEFT JOIN `transantiago_propietarios`             ON transantiago_propietarios.idPropietario = clientes_listado.idPropietario
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


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif(! empty($_GET["filter"]))  { 
//Le agrego condiciones a la consulta
$z="WHERE clientes_listado.idTipoCliente=3";	//Sistema transantiago
//Otros filtros
$z .=" AND clientes_listado.PPU!=''";
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){                  $z .= " AND clientes_listado.PPU LIKE '%{$_GET['search']}%'";}
if (isset($_GET['PPU']) && $_GET['PPU'] != ''){                        $z .= " AND clientes_listado.PPU LIKE '%{$_GET['PPU']}%'";}
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {               $z .= " AND clientes_listado.N_Motor LIKE '%{$_GET['N_Motor']}%' " ;}
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {             $z .= " AND clientes_listado.N_Chasis LIKE '%{$_GET['N_Chasis']}%' " ;}
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  {       $z .= " AND clientes_listado.idConductor = '".$_GET['idConductor']."'" ;}
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {   $z .= " AND clientes_listado.idPropietario = '".$_GET['idPropietario']."'" ;}
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {       $z .= " AND clientes_listado.idRecorrido = '".$_GET['idRecorrido']."'" ;}
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {               $z .= " AND clientes_listado.idMarca = '".$_GET['idMarca']."'" ;}
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {             $z .= " AND clientes_listado.idModelo = '".$_GET['idModelo']."'" ;}
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {   $z .= " AND clientes_listado.idTransmision = '".$_GET['idTransmision']."'" ;}
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {         $z .= " AND clientes_listado.idColorV_1 = '".$_GET['idColorV_1']."'" ;}
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {         $z .= " AND clientes_listado.idColorV_2 = '".$_GET['idColorV_2']."'" ;}
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '') {              $z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '') {              $z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ; }
if(isset($_GET['idTipoAlerta']) && $_GET['idTipoAlerta'] != '') {      $z .= " AND alertas_listado.idTipoAlerta = '".$_GET['idTipoAlerta']."'" ; } 
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$z .= " AND clientes_listado.fFabricacion BETWEEN '{$_GET['fechaInicio']}' AND '{$_GET['fechaTermino']}'" ;        
}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND alertas_listado.Fecha BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;
}
$z .= " AND alertas_listado.Longitud !='' AND alertas_listado.Longitud !=0" ;
$z .= " AND alertas_listado.Latitud !='' AND alertas_listado.Latitud !=0" ;
// Se trae un listado con todos los usuarios
$arrAlarmas = array();
$query = "SELECT 
clientes_listado.PPU,
transantiago_conductores.Nombre AS Cond_Nombre,
transantiago_conductores.Apellido_Paterno AS Cond_ApellidoPat,
alertas_listado.idAlerta,
alertas_listado.Fecha,
alertas_listado.Hora,
alertas_tipos.Nombre AS tipo_alerta,
alertas_listado.vista
FROM `alertas_listado`
LEFT JOIN clientes_listado             ON clientes_listado.idCliente              = alertas_listado.idCliente
LEFT JOIN alertas_tipos                ON alertas_tipos.idTipoAlerta              = alertas_listado.idTipoAlerta
LEFT JOIN `transantiago_conductores`   ON transantiago_conductores.idConductor    = alertas_listado.idConductor
".$z."
ORDER BY alertas_listado.idAlerta DESC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAlarmas,$row );
}?>
                                
<div class="col-lg-12">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Alarmas</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
		<tr role="row">
			<th width="190">Fecha</th>
			<th>Nombre</th>
			<th>Tipo de Alerta</th>
			<th>Estado</th>
			<th width="120">Acciones</th>
		</tr>
	</thead>                     
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrAlarmas as $alarmas) { ?>
    	<tr class="odd">		
			<td><?php echo $alarmas['Fecha'].' - '.$alarmas['Hora']; ?></td>
            <td><?php echo '(Patente '.$alarmas['PPU'].') '.$alarmas['Cond_Nombre'].' '.$alarmas['Cond_ApellidoPat']; ?></td>
            <td><?php echo $alarmas['tipo_alerta']; ?></td>
            <td>
            <?php if($alarmas['vista']==1){			
				echo 'Vista';		
			}elseif($alarmas['vista']==0){			
				echo 'No Vista';		
			}?>
            </td>		
			<td>
				<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$alarmas['idAlerta']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>		
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
		<h5>Filtro para Alertas</h5>	
		</header>	
		<div id="div-1" class="body">	
			<form class="form-horizontal" method="post" name="form1">		

				<?php 
			//Se verifican si existen los datos
			if(isset($idConductor)) {     $x1  = $idConductor;      }else{$x1  = '';}
			if(isset($idPropietario)) {   $x2  = $idPropietario;    }else{$x2  = '';}
			if(isset($idRecorrido)) {     $x3  = $idRecorrido;      }else{$x3  = '';}
			if(isset($PPU)) {             $x4  = $PPU;              }else{$x4  = '';}
			if(isset($idMarca)) {         $x5  = $idMarca;          }else{$x5  = '';}
			if(isset($idModelo)) {        $x6  = $idModelo;         }else{$x6  = '';}
			if(isset($idTransmision)) {   $x7  = $idTransmision;    }else{$x7  = '';}
			if(isset($idColorV_1)) {      $x8  = $idColorV_1;       }else{$x8  = '';}
			if(isset($idColorV_2)) {      $x9  = $idColorV_2;       }else{$x9  = '';}
			if(isset($fechaInicio)) {     $x10  = $fechaInicio;     }else{$x10  = '';}
			if(isset($fechaTermino)) {    $x11  = $fechaTermino;    }else{$x11  = '';}
			if(isset($N_Motor)) {         $x12  = $N_Motor;         }else{$x12  = '';}
			if(isset($N_Chasis)) {        $x13  = $N_Chasis;        }else{$x13  = '';}
			if(isset($idTipoAlerta)) {    $x14  = $idTipoAlerta;    }else{$x14  = '';}
			if(isset($rango_a)) {         $x15  = $rango_a;         }else{$x15  = '';}
			if(isset($rango_b)) {         $x16  = $rango_b;         }else{$x16  = '';}
			if(isset($idCiudad)) {        $x17  = $idCiudad;        }else{$x17  = '';}
			if(isset($idComuna)) {        $x18  = $idComuna;        }else{$x18  = '';}
			
			//se dibujan los inputs
			echo form_select_filter('Conductor','idConductor', $x1, 1, 'idConductor', 'Nombre,Apellido_Paterno,Apellido_Materno', 'transantiago_conductores', 0, $dbConn);
			echo form_select_filter('Propietario','idPropietario', $x2, 1, 'idPropietario', 'Nombre,Apellido_Paterno,Apellido_Materno', 'transantiago_propietarios', 0, $dbConn);
			echo form_select_filter('Recorrido','idRecorrido', $x3, 1, 'idRecorrido', 'Nombre', 'transantiago_recorridos', 0, $dbConn);
			echo form_select_filter('Vehiculos','PPU', $x4, 1, 'PPU', 'PPU', 'clientes_listado', $z, $dbConn);
			echo form_select_depend1('Marca','idMarca', $x5, 1, 'idMarca', 'Nombre', 'buses_marcas', 0,
									'Modelo','idModelo', $x6, 1, 'idModelo', 'idMarca', 'Nombre', 'buses_modelos', 0, 
									$dbConn);	
			echo form_select('Tipo de Transmision','idTransmision', $x7, 1, 'idTransmision', 'Nombre', 'buses_transmision', 0, $dbConn);
			echo form_select('Color Base','idColorV_1', $x8, 1, 'idColorV', 'Nombre', 'buses_colores', 0, $dbConn);
			echo form_select('Color Complementario','idColorV_2', $x9, 1, 'idColorV', 'Nombre', 'buses_colores', 0, $dbConn);
			echo form_date('F Fabricacion Inicio','fechaInicio', $x10, 1);
			echo form_date('F Fabricacion Fin','fechaTermino', $x11, 1);
			echo form_input('text', 'Numero de Motor', 'N_Motor', $x12, 1);
			echo form_input('text', 'Numero de Chasis', 'N_Chasis', $x13, 1);	
			echo form_select('Tipos de Alerta','idTipoAlerta', $x14, 1, 'idTipoAlerta', 'Nombre', 'alertas_tipos', 0, $dbConn);
			echo form_date('Rango Fechas inicio','rango_a', $x15, 1);
			echo form_date('Rango Fechas termino','rango_b', $x16, 1);
			echo form_select_depend1('Ciudad','idCiudad', $x17, 1, 'idCiudad', 'Nombre', 'mnt_ubicacion_ciudad', 0,
									'Comuna','idComuna', $x18, 1, 'idComuna', 'idCiudad', 'Nombre', 'mnt_ubicacion_comunas', 0, 
									 $dbConn);
			?>

            	<div class="form-group">
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="filtrar">					
				</div>
			</form> 
		</div>
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