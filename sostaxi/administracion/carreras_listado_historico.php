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
$original = "carreras_listado_historico.php";
$location = $original;
//Se agregan ubicaciones
if(isset($_GET['pagina']) && $_GET['pagina'] != ''){                  $location .= "?pagina=".$_GET['pagina'] ; }
if(isset($_GET['PPU']) && $_GET['PPU'] != ''){                        $location .= "&PPU=".$_GET['PPU'] ; }
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {              $location .= "&N_Motor=".$_GET['N_Motor'] ;  }
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {            $location .= "&N_Chasis=".$_GET['N_Chasis'] ;  }
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  {      $location .= "&idConductor=".$_GET['idConductor'] ; }
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {  $location .= "&idPropietario=".$_GET['idPropietario'] ; }
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {      $location .= "&idRecorrido=".$_GET['idRecorrido'] ; }
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {              $location .= "&idMarca=".$_GET['idMarca'] ; }
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {            $location .= "&idModelo=".$_GET['idModelo'] ; }
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {  $location .= "&idTransmision=".$_GET['idTransmision'] ; }
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {        $location .= "&idColorV_1=".$_GET['idColorV_1'] ; }
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {        $location .= "&idColorV_2=".$_GET['idColorV_2'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != '')  {                $location .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$location .= "&fechaInicio={$_GET['fechaInicio']}&fechaTermino={$_GET['fechaTermino']}" ;           
}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ;           
}

//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'filter_vehicle';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
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
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view']) ) {
// Se traen todos los datos de la carrera del taxista
$query = "SELECT
solicitud_taxi_listado.Cliente_Longitud, 
solicitud_taxi_listado.Cliente_Latitud,
solicitud_taxi_listado.Taxista_Longitud, 
solicitud_taxi_listado.Taxista_Latitud,
solicitud_taxi_listado.CarreraFinalizada_Longitud, 
solicitud_taxi_listado.CarreraFinalizada_Latitud,
detalle_general.Nombre AS estado_carrera,
clientes_listado.PPU,
vehiculos_marcas.Nombre AS Nombre_marca,
vehiculos_modelos.Nombre AS Nombre_modelo
FROM `solicitud_taxi_listado`
LEFT JOIN `detalle_general`      ON detalle_general.id_Detalle     = solicitud_taxi_listado.Estado
LEFT JOIN `clientes_listado`     ON clientes_listado.idCliente     = solicitud_taxi_listado.idTaxista
LEFT JOIN `vehiculos_marcas`     ON vehiculos_marcas.idMarca       = clientes_listado.idMarca
LEFT JOIN `vehiculos_modelos`    ON vehiculos_modelos.idModelo     = clientes_listado.idModelo
WHERE idSolicitud = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
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
			  position:  new google.maps.LatLng(<?php echo $rowdata['Cliente_Latitud'] ?>, <?php echo $rowdata['Cliente_Longitud'] ?>),
			  map: map,
			  title:"Cliente",
			  icon: 'img/icn_map_pass.png'
		  });
		  var marker_2 = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $rowdata['Taxista_Latitud'] ?>, <?php echo $rowdata['Taxista_Longitud'] ?>),
			  map: map,
			  title:"Taxista",
			  icon: 'img/icn_map_taxi.png'
		  });
		  var marker_3 = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $rowdata['CarreraFinalizada_Latitud'] ?>, <?php echo $rowdata['CarreraFinalizada_Longitud'] ?>),
			  map: map,
			  title:"llegada",
			  icon: 'img/icn_map_pass_bajado.png'
		  });
		     
		 			
      }  
</script>

<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div>
			<h5>Detalles de la Carrera del vehiculo Patente <?php echo $rowdata['PPU'].', Marca '.$rowdata['Nombre_marca'].', Modelo  '.$rowdata['Nombre_modelo']?></h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Carrera : <?php echo $rowdata['estado_carrera'] ?></th>
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
<a href="<?php echo $location.'&filter=true'; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif(! empty($_GET["filter"]))  { 
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
//Variable con la ubicacion
$z="WHERE solicitud_taxi_listado.idSolicitud!=0";
//Verifico si la variable de busqueda existe
if (isset($_GET['PPU']) && $_GET['PPU'] != ''){                       $z .=" AND clientes_listado.PPU LIKE '%{$_GET['PPU']}%'";}
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {              $z .= " AND clientes_listado.N_Motor LIKE '%{$_GET['N_Motor']}%' " ;}
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {            $z .= " AND clientes_listado.N_Chasis LIKE '%{$_GET['N_Chasis']}%' " ;}
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  {      $z .= " AND clientes_listado.idConductor = '".$_GET['idConductor']."'" ;}
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {  $z .= " AND clientes_listado.idPropietario = '".$_GET['idPropietario']."'" ;}
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {      $z .= " AND clientes_listado.idRecorrido = '".$_GET['idRecorrido']."'" ;}
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {              $z .= " AND clientes_listado.idMarca = '".$_GET['idMarca']."'" ;}
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {            $z .= " AND clientes_listado.idModelo = '".$_GET['idModelo']."'" ;}
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {  $z .= " AND clientes_listado.idTransmision = '".$_GET['idTransmision']."'" ;}
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {        $z .= " AND clientes_listado.idColorV_1 = '".$_GET['idColorV_1']."'" ;}
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {        $z .= " AND clientes_listado.idColorV_2 = '".$_GET['idColorV_2']."'" ;}
if(isset($_GET['Estado']) && $_GET['Estado'] != '')          {        $z .= " AND solicitud_taxi_listado.Estado = '".$_GET['Estado']."'" ;     }
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$z .= " AND clientes_listado.fFabricacion BETWEEN '{$_GET['fechaInicio']}' AND '{$_GET['fechaTermino']}'" ;        
}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND solicitud_taxi_listado.Fecha BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;           
}

//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT 
solicitud_taxi_listado.idSolicitud 
FROM `solicitud_taxi_listado` 
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = solicitud_taxi_listado.idTaxista
LEFT JOIN detalle_general     ON detalle_general.id_Detalle     = solicitud_taxi_listado.Estado
".$z."";
$registrosx = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registrosx);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrSolicitudes = array();
$query = "SELECT 
solicitud_taxi_listado.idSolicitud,
clientes_listado.PPU,
vehiculos_marcas.Nombre AS Nombre_marca,
vehiculos_modelos.Nombre AS Nombre_modelo,
taxista_conductores.Nombre AS Cond_Nombre,
taxista_conductores.Apellido_Paterno AS Cond_ApellidoPat,
taxista_conductores.Apellido_Materno AS Cond_ApellidoMat,
solicitud_taxi_listado.Fecha,
solicitud_taxi_listado.Hora,
detalle_general.Nombre AS estado_carrera,
clientes_listado.idConductor,
clientes_listado.idCliente
FROM `solicitud_taxi_listado`
LEFT JOIN clientes_listado         ON clientes_listado.idCliente            = solicitud_taxi_listado.idTaxista
LEFT JOIN detalle_general          ON detalle_general.id_Detalle            = solicitud_taxi_listado.Estado
LEFT JOIN `vehiculos_marcas`       ON vehiculos_marcas.idMarca              = clientes_listado.idMarca
LEFT JOIN `vehiculos_modelos`      ON vehiculos_modelos.idModelo            = clientes_listado.idModelo
LEFT JOIN `taxista_conductores`    ON taxista_conductores.idConductor       = clientes_listado.idConductor
".$z."
ORDER BY solicitud_taxi_listado.idSolicitud DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrSolicitudes,$row );
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
        <th>Datos del vehiculo</th>
        <th>Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>                     
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrSolicitudes as $solicitudes) { ?>
    	<tr class="odd">
			<td><?php echo $solicitudes['Fecha'].' - '.$solicitudes['Hora']; ?></td>
            <td>
				<a href="<?php echo 'view_taxista.php?view='.$solicitudes['idCliente']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>
				<p><?php echo $solicitudes['Nombre_marca'].' '.$solicitudes['Nombre_modelo'].' Patente '.$solicitudes['PPU']; ?></p>
				<a href="<?php echo 'view_conductor.php?view='.$solicitudes['idConductor']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>
				<p><?php echo 'Conductor : '.$solicitudes['Cond_Nombre'].' '.$solicitudes['Cond_ApellidoPat'].' '.$solicitudes['Cond_ApellidoMat']; ?></p>
            </td>
            <td><?php echo $solicitudes['estado_carrera']; ?></td>
			<td>
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$solicitudes['idSolicitud']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
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

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $original; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Historico</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" action="<?php echo $location ?>" name="form1">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($idConductor)) {    $x1  = $idConductor;     }else{$x1  = '';}
			if(isset($idPropietario)) {  $x2  = $idPropietario;   }else{$x2  = '';}
			if(isset($idRecorrido)) {    $x3  = $idRecorrido;     }else{$x3  = '';}
			if(isset($PPU)) {            $x4  = $PPU;             }else{$x4  = '';}
			if(isset($idMarca)) {        $x5  = $idMarca;         }else{$x5  = '';}
			if(isset($idModelo)) {       $x6  = $idModelo;        }else{$x6  = '';}
			if(isset($idTransmision)) {  $x7  = $idTransmision;   }else{$x7  = '';}
			if(isset($idColorV_1)) {     $x8  = $idColorV_1;      }else{$x8  = '';}
			if(isset($idColorV_2)) {     $x9  = $idColorV_2;      }else{$x9  = '';}
			if(isset($fechaInicio)) {    $x10 = $fechaInicio;     }else{$x10 = '';}
			if(isset($fechaTermino)) {   $x11 = $fechaTermino;    }else{$x11 = '';}
			if(isset($N_Motor)) {        $x12 = $N_Motor;         }else{$x12 = '';}
			if(isset($N_Chasis)) {       $x13 = $N_Chasis;        }else{$x13 = '';}		
			if(isset($rango_a)) {        $x14 = $rango_a;         }else{$x14 = '';}
			if(isset($rango_b)) {        $x15 = $rango_b;         }else{$x15 = '';}
			if(isset($Estado)) {         $x16 = $Estado;          }else{$x16 = '';}
			
			//se dibujan los inputs
			echo form_select('Conductor','idConductor', $x1, 1, 'idConductor', 'Nombre,Apellido_Paterno', 'taxista_conductores', 0, $dbConn);
			echo form_select('Propietario','idPropietario', $x2, 1, 'idPropietario', 'Nombre,Apellido_Paterno', 'taxista_propietarios', 0, $dbConn);
			echo form_select('Recorrido','idRecorrido', $x3, 1, 'idRecorrido', 'Nombre', 'taxista_recorridos', 0, $dbConn);
			echo form_input('text', 'Patente', 'PPU', $x4, 1);
			echo form_select_depend1('Marca','idMarca', $x5, 1, 'idMarca', 'Nombre', 'vehiculos_marcas', 0,
									'Modelo','idModelo', $x6, 1, 'idModelo', 'idMarca', 'Nombre', 'vehiculos_modelos', 0, 
									 $dbConn);
			echo form_select('Tipo de Transmision','idTransmision', $x7, 1, 'idTransmision', 'Nombre', 'vehiculos_transmision', 0, $dbConn);
			echo form_select('Color Base','idColorV_1', $x8, 1, 'idColorV', 'Nombre', 'vehiculos_colores', 0, $dbConn);
			echo form_select('Color Complementario','idColorV_2', $x9, 1, 'idColorV', 'Nombre', 'vehiculos_colores', 0, $dbConn);			
			echo form_date('F Fabricacion Inicio','fechaInicio', $x10, 1);
			echo form_date('F Fabricacion Fin','fechaTermino', $x11, 1);			
			echo form_input('text', 'Numero de Motor', 'N_Motor', $x12, 1);
			echo form_input('text', 'Numero de Chasis', 'N_Chasis', $x13, 1);
			echo form_date('Rango Fechas inicio','rango_a', $x10, 1);
			echo form_date('Rango Fechas termino','rango_b', $x11, 1);
			echo form_select('Estado Carrera','Estado', $x3, 1, 'id_Detalle', 'Nombre', 'detalle_general', 'Tipo=11', $dbConn);
			?>

			<div class="form-group">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="submit">
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