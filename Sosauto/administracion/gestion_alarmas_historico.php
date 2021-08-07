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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
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
$original = "gestion_alarmas_historico.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/gestion_alarmas_historico.php';		
}
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Alarmas Historico</title>
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
	<link href="assets/css/theme_color_<?php echo $rowempresa['idTheme'] ?>.css" rel="stylesheet" type="text/css">
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
            <i class="fa fa-dashboard"></i> Alarmas Historico
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

<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Alarma silenciada correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view']) ) {
$query="SELECT 
clientes_listado.Nombre,
mnt_ubicacion_ciudad.Nombre AS nombre_region,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
clientes_listado.Direccion,

clientes_robos.Fecha,
clientes_robos.Hora,
clientes_robos.Longitud,
clientes_robos.Latitud ,

clientes_vehiculos.Marca,
clientes_vehiculos.Modelo,
clientes_vehiculos.PPU,
clientes_vehiculos.Fecha AS fvehiculo,
clientes_vehiculos.Color_1,
clientes_vehiculos.Color_2,
clientes_vehiculos.Obs

FROM clientes_robos 
LEFT JOIN clientes_listado            ON clientes_listado.idCliente         = clientes_robos.idCliente
LEFT JOIN clientes_vehiculos          ON clientes_vehiculos.idVehiculo      = clientes_robos.idVehiculo
LEFT JOIN `mnt_ubicacion_ciudad`      ON mnt_ubicacion_ciudad.idCiudad      = clientes_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`     ON mnt_ubicacion_comunas.idComuna     = clientes_listado.idComuna
WHERE idRobo = '{$_GET['view']}'";	  
$resultado2 = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado2);
// Se trae un listado con todos los usuarios
$arrVistas = array();
$query = "SELECT 
clientes_robos_avistado.Fecha,
clientes_robos_avistado.Hora,
clientes_listado.Nombre AS nombre_visto,
clientes_robos_avistado.Longitud,
clientes_robos_avistado.Latitud
FROM `clientes_robos_avistado`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = clientes_robos_avistado.idCliente
WHERE clientes_robos_avistado.idRobo = '{$_GET['view']}'
ORDER BY clientes_robos_avistado.idVista ASC ";
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
			  title:"<?php echo $row_data['Marca'].' '.$row_data['Modelo'].' patente '.$row_data['PPU'].' de '.$row_data['Nombre'] ?>",
			  icon: 'img/caution.png'
		  });
		  <?php 
		  $nn=1;
		  foreach ($arrVistas as $vista) {?>
		  var marker_<?php echo $nn ?> = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $vista['Latitud'] ?>, <?php echo $vista['Longitud'] ?>),
			  map: map,
			  title:"visto",
			  icon: 'img/car.png'
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
			<td class=" " height="500">
             <p class="tbl_title">Datos del dueño</p>
             <p class="tbl_text">Nombre : <?php echo $row_data['Nombre'] ?><br/>
                Region : <?php echo $row_data['nombre_region'] ?><br/>
                Comuna : <?php echo $row_data['nombre_comuna'] ?><br/>
                Direccion : <?php echo $row_data['Direccion'] ?></p>
            
             <p class="tbl_title">Datos del vehiculo</p>
             <p class="tbl_text">Marca : <?php echo $row_data['Marca'] ?><br/>
                Modelo : <?php echo $row_data['Modelo'] ?><br/>
                Patente : <?php echo $row_data['PPU']?><br/>
                Color Base : <?php echo $row_data['Color_1']?><br/>
                Color secundario : <?php echo $row_data['Color_2']?><br/>
                Año del vehiculo : <?php echo $row_data['fvehiculo']?><br/>
                Observaciones : <?php echo $row_data['Obs']?></p>
            
            <p class="tbl_title">Fecha del siniestro</p>
            <p class="tbl_text">Fecha : <?php echo $row_data['Fecha']?></p>
            <p class="tbl_text">Hora : <?php echo $row_data['Hora']?></p>
            
            
            
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
<?php 
$s="?filter=true";
$x="";
$t="&pagina=".$_GET['pagina'];
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$x .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ;           
}
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')  { $x .= "&idCliente=".$_GET['idCliente'];  }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')            { $x .= "&Sexo=".$_GET['Sexo'] ;           }
if(isset($_GET['Ciudad']) && $_GET['Ciudad'] != '')        { $x .= "&Ciudad=".$_GET['Ciudad'] ;       }
if(isset($_GET['Comuna']) && $_GET['Comuna'] != '')        { $x .= "&Comuna=".$_GET['Comuna'] ;       }
if(isset($_GET['Marca']) && $_GET['Marca'] != '')          { $x .= "&Marca=".$_GET['Marca'] ;         }
if(isset($_GET['Modelo']) && $_GET['Modelo'] != '')        { $x .= "&Modelo=".$_GET['Modelo'] ;       }
if(isset($_GET['Tipo_v']) && $_GET['Tipo_v'] != '')        { $x .= "&Tipo_v=".$_GET['Tipo_v'] ;       }
if(isset($_GET['Color_1']) && $_GET['Color_1'] != '')      { $x .= "&Color_1=".$_GET['Color_1'] ;     }
if(isset($_GET['Color_2']) && $_GET['Color_2'] != '')      { $x .= "&Color_2=".$_GET['Color_2'] ;     }
if(isset($_GET['Fecha']) && $_GET['Fecha'] != '')          { $x .= "&Fecha=".$_GET['Fecha'] ;         } 
?>
	<a href="<?php echo $location.$s.$t.$x; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
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
$z="WHERE clientes_robos.vista='1'";
$s="?filter=true";
$x="";
$t="&pagina=".$_GET['pagina'];
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND clientes_robos.Fecha BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;
	$x .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ;           
}
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')  { 
	$z .= " AND clientes_listado.idCliente = '".$_GET['idCliente']."'" ;
	$x .= "&idCliente=".$_GET['idCliente']; 
}
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')            { 
	$z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ;
	$x .= "&Sexo=".$_GET['Sexo'] ;           
}
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')        { 
	$z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ;
	$x .= "&idCiudad=".$_GET['idCiudad'] ;       
}
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')        { 
	$z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ;
	$x .= "&idComuna=".$_GET['idComuna'] ;       
}
if(isset($_GET['Marca']) && $_GET['Marca'] != '')          { 
	$z .= " AND clientes_vehiculos.Marca = '".$_GET['Marca']."'" ; 
	$x .= "&Marca=".$_GET['Marca'] ;     
}
if(isset($_GET['Modelo']) && $_GET['Modelo'] != '')        { 
	$z .= " AND clientes_vehiculos.Modelo = '".$_GET['Modelo']."'" ; 
	$x .= "&Modelo=".$_GET['Modelo'] ;     
}
if(isset($_GET['Tipo_v']) && $_GET['Tipo_v'] != '')        { 
	$z .= " AND clientes_vehiculos.Tipo = '".$_GET['Tipo_v']."'" ;
	$x .= "&Tipo_v=".$_GET['Tipo_v'] ;       
}
if(isset($_GET['Color_1']) && $_GET['Color_1'] != '')      { 
	$z .= " AND clientes_vehiculos.Color_1 = '".$_GET['Color_1']."'" ;
	$x .= "&Color_1=".$_GET['Color_1'] ;   
}
if(isset($_GET['Color_2']) && $_GET['Color_2'] != '')      { 
	$z .= " AND clientes_vehiculos.Color_2 = '".$_GET['Color_2']."'" ;
	$x .= "&Color_2=".$_GET['Color_2'] ;   
}
if(isset($_GET['Fecha']) && $_GET['Fecha'] != '')          { 
	$z .= " AND clientes_vehiculos.Fecha = '".$_GET['Fecha']."'" ;
	$x .= "&Fecha=".$_GET['Fecha'] ;       
} 
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT 
clientes_robos.idRobo 
FROM `clientes_robos` 
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = clientes_robos.idCliente
LEFT JOIN clientes_vehiculos  ON clientes_vehiculos.idVehiculo  = clientes_robos.idVehiculo
".$z."";
$registrosx = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registrosx);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrAlarmas = array();
$query = "SELECT 
clientes_robos.idRobo,
clientes_listado.Nombre,
clientes_robos.Fecha,
clientes_robos.Hora,
clientes_vehiculos.Marca,
clientes_vehiculos.Modelo,
clientes_vehiculos.PPU
FROM `clientes_robos`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = clientes_robos.idCliente
LEFT JOIN clientes_vehiculos  ON clientes_vehiculos.idVehiculo  = clientes_robos.idVehiculo
".$z."
ORDER BY clientes_robos.idRobo DESC
LIMIT $comienzo, $cant_reg ";
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
        <th>Vehiculo</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrAlarmas as $alarmas) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $alarmas['Fecha'].' - '.$alarmas['Hora']; ?></td>
            <td class=" "><?php echo $alarmas['Nombre']; ?></td>
            <td class=" "><?php echo $alarmas['Marca'].' '.$alarmas['Modelo'].' patente '.$alarmas['PPU']; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.$s.$t.$x.'&view='.$alarmas['idRobo']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
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
$location .='?filter=true&pagina=';
?>
    <div class="row">
        <div class="col-lg-6">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">← Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">← Anterior</a></li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
    				<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
					<?php } ?>
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
<div class="col-lg-12 fcenter" style="margin-bottom:50px">
	<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
</div>       
</div>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
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
//Se trae el listado con la Marca
$arrMarca = array();
$query = "SELECT Marca
FROM `clientes_vehiculos`
WHERE Marca!=''
GROUP BY Marca ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrMarca,$row );
}
mysql_free_result($resultado);
//Se trae el listado con el modelo
$arrModelo = array();
$query = "SELECT Modelo
FROM `clientes_vehiculos`
WHERE Modelo!=''
GROUP BY Modelo ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrModelo,$row );
}
mysql_free_result($resultado);
//Se trae el listado con el Tipo
$arrTipo = array();
$query = "SELECT Tipo
FROM `clientes_vehiculos`
WHERE Tipo!=''
GROUP BY Tipo ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipo,$row );
}
mysql_free_result($resultado);
//Se trae el listado con el Color_1
$arrColor_1 = array();
$query = "SELECT Color_1
FROM `clientes_vehiculos`
WHERE Color_1!=''
GROUP BY Color_1 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColor_1,$row );
}
mysql_free_result($resultado);
//Se trae el listado con el Color_1
$arrColor_2 = array();
$query = "SELECT Color_2
FROM `clientes_vehiculos`
WHERE Color_2!=''
GROUP BY Color_2 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColor_2,$row );
}
mysql_free_result($resultado);
//Se trae el listado con la Fecha de adquisicion
$arrFecha = array();
$query = "SELECT Fecha
FROM `clientes_vehiculos`
WHERE Fecha!=''
GROUP BY Fecha ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrFecha,$row );
}
mysql_free_result($resultado);
//Listado de usuarios
$arrUsers = array();
$query = "SELECT idCliente,Nombre
FROM `clientes_listado`
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
mysql_free_result($resultado);
?>

<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Alarmas</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Clientes</label>
                <div class="col-lg-8">
                <select name="idCliente" class="form-control" >
                <option value="" selected>Seleccione un Cliente</option>
                <?php foreach ( $arrUsers as $usuario ) { ?>
                <option value="<?php echo $usuario['idCliente']; ?>" ><?php echo $usuario['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Rango Fechas inicio</label>
				<div class="col-lg-8">
					<input type="text" placeholder="Rango Fechas inicio" class="form-control" id="datepicker1"  name="rango_a" readonly >
				</div>
			</div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Rango Fechas termino</label>
				<div class="col-lg-8">
					<input type="text" placeholder="Rango Fechas termino" class="form-control" id="datepicker2"  name="rango_b" readonly >
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
            	<label for="text2" class="control-label col-lg-4">Listado de Marcas</label>
                <div class="col-lg-8">
                <select name="Marca" class="form-control" >
                <option value="" selected>Seleccione una Marca</option>
                <?php foreach ( $arrMarca as $marca ) { ?>
                <option value="<?php echo $marca['Marca']; ?>" ><?php echo $marca['Marca']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Modelos</label>
                <div class="col-lg-8">
                <select name="Modelo" class="form-control" >
                <option value="" selected>Seleccione un Modelo</option>
                <?php foreach ( $arrModelo as $modelo ) { ?>
                <option value="<?php echo $modelo['Modelo']; ?>" ><?php echo $modelo['Modelo']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Tipos</label>
                <div class="col-lg-8">
                <select name="Tipo_v" class="form-control" >
                <option value="" selected>Seleccione un Tipo</option>
                <?php foreach ( $arrTipo as $tipo ) { ?>
                <option value="<?php echo $tipo['Tipo']; ?>" ><?php echo $tipo['Tipo']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Color base</label>
                <div class="col-lg-8">
                <select name="Color_1" class="form-control" >
                <option value="" selected>Seleccione un Color base</option>
                <?php foreach ( $arrColor_1 as $color1 ) { ?>
                <option value="<?php echo $color1['Color_1']; ?>" ><?php echo $color1['Color_1']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Color complementario</label>
                <div class="col-lg-8">
                <select name="Color_2" class="form-control" >
                <option value="" selected>Seleccione un Color complementario</option>
                <?php foreach ( $arrColor_2 as $color2 ) { ?>
                <option value="<?php echo $color2['Color_2']; ?>" ><?php echo $color2['Color_2']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Año del vehiculo</label>
                <div class="col-lg-8">
                <select name="Fecha" class="form-control" >
                <option value="" selected>Seleccione un Año del vehiculo</option>
                <?php foreach ( $arrFecha as $fecha ) { ?>
                <option value="<?php echo $fecha['Fecha']; ?>" ><?php echo $fecha['Fecha']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            
            
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