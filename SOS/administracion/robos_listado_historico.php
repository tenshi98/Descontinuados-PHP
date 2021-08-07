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
$original = "robos_listado_historico.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ;           
}
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')            { $location .= "&idCliente=".$_GET['idCliente']; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                      { $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Ciudad']) && $_GET['Ciudad'] != '')                  { $location .= "&Ciudad=".$_GET['Ciudad'] ; }
if(isset($_GET['Comuna']) && $_GET['Comuna'] != '')                  { $location .= "&Comuna=".$_GET['Comuna'] ; }
if(isset($_GET['Marca']) && $_GET['Marca'] != '')                    { $location .= "&Marca=".$_GET['Marca'] ; }
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')                { $location .= "&idMarca=".$_GET['idMarca'] ; }
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')              { $location .= "&idModelo=".$_GET['idModelo'] ;  }
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')    { $location .= "&idTransmision=".$_GET['idTransmision'] ; }
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')          { $location .= "&idColorV_1=".$_GET['idColorV_1'] ; }
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')          { $location .= "&idColorV_2=".$_GET['idColorV_2'] ;  } 
if(isset($_GET['fTransferencia']) && $_GET['fTransferencia'] != '')  { $location .= "&fTransferencia=".$_GET['fTransferencia'] ; } 
if(isset($_GET['fFabricacion']) && $_GET['fFabricacion'] != '')      { $location .= "&fFabricacion=".$_GET['fFabricacion'] ; } 
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')                { $location .= "&N_Motor=".$_GET['N_Motor'] ; } 
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')              { $location .= "&N_Chasis=".$_GET['N_Chasis'] ; } 
if(isset($_GET['filter']) && $_GET['filter'] != '')                  { $location .= "&filter=".$_GET['filter'] ; } 

//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  { 
	//Llamamos al formulario
	$form_trabajo= 'filtrar_robos_historico';
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
<?php  if (isset($errors[1])) {echo $errors[1];}?>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view']) ) {
$query="SELECT 
clientes_listado.Nombre,
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

WHERE robos_listado.idRobo = '{$_GET['view']}'";	  
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
WHERE robos_listado_avistados.idRobo = '{$_GET['view']}'
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
			zoom: 18,
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
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Robos</h5>
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
             <p class="tbl_title">Datos del dueño</p>
             <p class="tbl_text">Nombre : <?php echo $row_data['Nombre'] ?><br/>
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
            <div style="position:static; width:100%; height:500px">
            	<div id="map_canvas" style="width:100%; height:100%">
                	<script type="text/javascript">initialize();</script>
             	</div>
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
	<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
</div>
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
$z="WHERE robos_listado.vista='1'";
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND robos_listado.Fecha BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;         
}
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')  {           $z .= " AND clientes_listado.idCliente = '".$_GET['idCliente']."'" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')  {                     $z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ;   }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '') {              $z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ;  }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '') {              $z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ;  }
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '') {                $z .= " AND clientes_vehiculos.idMarca = '".$_GET['idMarca']."'" ; }
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '') {              $z .= " AND clientes_vehiculos.idModelo = '".$_GET['idModelo']."'" ;  }
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {   $z .= " AND clientes_vehiculos.idTransmision = '".$_GET['idTransmision']."'" ;  }
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '') {          $z .= " AND clientes_vehiculos.idColorV_1 = '".$_GET['idColorV_1']."'" ;  }
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {         $z .= " AND clientes_vehiculos.idColorV_2 = '".$_GET['idColorV_2']."'" ;  }
if(isset($_GET['fTransferencia']) && $_GET['fTransferencia'] != '') {  $z .= " AND clientes_vehiculos.fTransferencia = '".$_GET['fTransferencia']."'" ;  } 
if(isset($_GET['fFabricacion']) && $_GET['fFabricacion'] != '') {      $z .= " AND clientes_vehiculos.fFabricacion = '".$_GET['fFabricacion']."'" ;  } 
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '') {                $z .= " AND clientes_vehiculos.N_Motor = '".$_GET['N_Motor']."'" ;  } 
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '') {              $z .= " AND clientes_vehiculos.N_Chasis = '".$_GET['N_Chasis']."'" ;  } 
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT 
robos_listado.idRobo 
FROM `robos_listado` 
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = robos_listado.idCliente
LEFT JOIN clientes_vehiculos  ON clientes_vehiculos.idVehiculo  = robos_listado.idVehiculo
".$z."";
$registrosx = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registrosx);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrAlarmas = array();
$query = "SELECT 
robos_listado.idRobo,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
clientes_listado.Apellido_Materno,
robos_listado.Fecha,
robos_listado.Hora,
clientes_vehiculos.PPU,
vehiculos_marcas.Nombre AS nombre_marca,
vehiculos_modelos.Nombre AS nombre_modelo
FROM `robos_listado`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = robos_listado.idCliente
LEFT JOIN clientes_vehiculos  ON clientes_vehiculos.idVehiculo  = robos_listado.idVehiculo
LEFT JOIN vehiculos_marcas    ON vehiculos_marcas.idMarca       = clientes_vehiculos.idMarca
LEFT JOIN vehiculos_modelos   ON vehiculos_modelos.idModelo     = clientes_vehiculos.idModelo
".$z."
ORDER BY robos_listado.idRobo DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAlarmas,$row );
}?>
                                
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Robos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="190">Fecha</th>
        <th>Nombre</th>
        <th>Vehiculo</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrAlarmas as $alarmas) { ?>
    	<tr class="odd">
			<td><?php echo $alarmas['Fecha'].' - '.$alarmas['Hora']; ?></td>
            <td><?php echo $alarmas['Nombre'].' '.$alarmas['Apellido_Paterno'].' '.$alarmas['Apellido_Materno']; ?></td>
            <td><?php echo $alarmas['nombre_marca'].' '.$alarmas['nombre_modelo'].' patente '.$alarmas['PPU']; ?></td>
			<td>
				<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$alarmas['idRobo']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
if (isset($_GET['search'])) {  $search ='&search='.$_GET['search']; } else { $search='';}
echo paginador_1($total_paginas, $original, $search, $num_pag ) ?> 
</div>
<div class="col-lg-12 fcenter" style="margin-bottom:50px">
	<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
</div>       
</div>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE clientes_listado.idTipoCliente>=0";	
}else{
	$z="WHERE clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
?>

<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Alarmas</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
            <?php 
			//Se verifican si existen los datos
			if(isset($idCliente)) {        $x1  = $idCliente;        }else{$x1  = '';}
            if(isset($rango_a)) {          $x2  = $rango_a;          }else{$x2  = '';}
            if(isset($rango_b)) {          $x3  = $rango_b;          }else{$x3  = '';}
			if(isset($Sexo)) {             $x4  = $Sexo;             }else{$x4  = '';}
            if(isset($idCiudad)) {         $x5  = $idCiudad;         }else{$x5  = '';}
			if(isset($idComuna)) {         $x6  = $idComuna;         }else{$x6  = '';}
			if(isset($idMarca)) {          $x7  = $idMarca;          }else{$x7  = '';}
			if(isset($idModelo)) {         $x8  = $idModelo;         }else{$x8  = '';}
			if(isset($idTransmision)) {    $x9  = $idTransmision;    }else{$x9  = '';}
			if(isset($idColorV_1)) {       $x10 = $idColorV_1;       }else{$x10 = '';}
			if(isset($idColorV_2)) {       $x11 = $idColorV_2;       }else{$x11 = '';}
			if(isset($fTransferencia)) {   $x12 = $fTransferencia;   }else{$x12 = '';}
			if(isset($fFabricacion)) {     $x13 = $fFabricacion;     }else{$x13 = '';}
			if(isset($N_Motor)) {          $x14 = $N_Motor;          }else{$x14 = '';}
			if(isset($N_Chasis)) {         $x15 = $N_Chasis;         }else{$x15 = '';}
			
			//se dibujan los inputs
			echo form_select_filter('Listado de Clientes','idCliente', $x1, 1, 'idCliente', 'Nombre,Apellido_Paterno,Apellido_Materno', 'clientes_listado', $z, $dbConn);
			echo form_date('Rango Fechas Robo','rango_a', $x2, 1);
			echo form_date('Rango Fechas Robo','rango_b', $x3, 1);
			echo form_select('Sexo','Sexo', $x4, 1, 'Inicial', 'Nombre', 'clientes_sexo', 0, $dbConn);
			echo form_select_depend1('Ciudad','idCiudad', $x5, 1, 'idCiudad', 'Nombre', 'mnt_ubicacion_ciudad', 0,
									'Comuna','idComuna', $x6, 1, 'idComuna', 'idCiudad', 'Nombre', 'mnt_ubicacion_comunas', 0, 
									 $dbConn);
			echo form_select_depend1('Marca','idMarca', $x7, 1, 'idMarca', 'Nombre', 'vehiculos_marcas', 0,
									'Modelo','idModelo', $x8, 1, 'idModelo', 'idMarca', 'Nombre', 'vehiculos_modelos', 0, 
									 $dbConn);						 
			echo form_select('Tipo de Transmision','idTransmision', $x9, 1, 'idTransmision', 'Nombre', 'vehiculos_transmision', 0, $dbConn);
			echo form_select('Color Base','idColorV_1', $x10, 1, 'idColorV', 'Nombre', 'vehiculos_colores', 0, $dbConn);
			echo form_select('Color Complementario','idColorV_2', $x11, 1, 'idColorV', 'Nombre', 'vehiculos_colores', 0, $dbConn);
			echo form_date('Fecha de Transferencia','fTransferencia', $x12, 1);
			echo form_date('Fecha de Fabricacion','fFabricacion', $x13, 1);						 
			echo form_input('text', 'Numero de Motor', 'N_Motor', $x14, 1);
			echo form_input('text', 'Numero de Chasis', 'N_Chasis', $x15, 1);						 
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