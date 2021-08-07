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
$original = "alertas_listado_historico.php";
$location = $original;
//Se agregan ubicaciones
if(isset($_GET['filter']) && $_GET['filter'] != ''){                 $location .= "?filter=".$_GET['filter'] ; 	}
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '') {          $location .= "&idCliente=".$_GET['idCliente']; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '') {                    $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Ciudad']) && $_GET['Ciudad'] != '') {                $location .= "&Ciudad=".$_GET['Ciudad'] ; }
if(isset($_GET['Comuna']) && $_GET['Comuna'] != '') {                $location .= "&Comuna=".$_GET['Comuna'] ; }
if(isset($_GET['idTipoAlerta']) && $_GET['idTipoAlerta'] != '')  {   $location .= "&idTipoAlerta=".$_GET['idTipoAlerta'] ; } 
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
$x .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ;           
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
<?php 
//Listado de errores no manejables
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Alarma silenciada correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view']) ) {
$query="SELECT 
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
clientes_listado.Apellido_Materno,
mnt_ubicacion_ciudad.Nombre AS nombre_region,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
clientes_listado.Direccion,

alertas_listado.Fecha,
alertas_listado.Hora,
alertas_listado.Longitud,
alertas_listado.Latitud ,
alertas_tipos.Nombre AS tipo_alerta,
mnt_imagenes_listado.file AS imagen_alerta

FROM alertas_listado 
LEFT JOIN clientes_listado            ON clientes_listado.idCliente         = alertas_listado.idCliente
LEFT JOIN `alertas_tipos`             ON alertas_tipos.idTipoAlerta         = alertas_listado.idTipoAlerta
LEFT JOIN `mnt_imagenes_listado`      ON mnt_imagenes_listado.idListimg     = alertas_tipos.idListimg
LEFT JOIN `mnt_ubicacion_ciudad`      ON mnt_ubicacion_ciudad.idCiudad      = clientes_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`     ON mnt_ubicacion_comunas.idComuna     = clientes_listado.idComuna
WHERE idAlerta = '{$_GET['view']}'";	  
$resultado2 = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado2);

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
	  title:"<?php echo $row_data['tipo_alerta'] ?>",		  
	  icon: 'upload/<?php echo $row_data['imagen_alerta']; ?>'	  
	  });	  
	   	 			
      }  
</script>

<div class="col-lg-12">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Detalles de la Alerta</h5>	
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
		<td  height="500">
             <p class="tbl_title">Datos del dueño</p>
             <p class="tbl_text">Nombre : <?php echo $row_data['Nombre'].' '.$row_data['Apellido_Paterno'].' '.$row_data['Apellido_Materno'] ?><br/>
                Region : <?php echo $row_data['nombre_region'] ?><br/>
                Comuna : <?php echo $row_data['nombre_comuna'] ?><br/>
                Direccion : <?php echo $row_data['Direccion'] ?></p>

            
            <p class="tbl_title">Datos de la alerta</p>
            <p class="tbl_text">Fecha : <?php echo $row_data['Fecha']?><br/>
            Hora : <?php echo $row_data['Hora']?><br/>
            Tipo de alerta : <?php echo $row_data['tipo_alerta']?></p> 
            
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
//Variable con la ubicacion
$z="WHERE alertas_listado.idAlerta!=0";
$z .= " AND alertas_listado.Longitud !='' AND alertas_listado.Longitud !=0" ;
$z .= " AND alertas_listado.Latitud !='' AND alertas_listado.Latitud !=0" ;
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '') {        $z .= " AND clientes_listado.idCliente = '".$_GET['idCliente']."'" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '') {                  $z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '') {          $z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '') {          $z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ; }
if(isset($_GET['idTipoAlerta']) && $_GET['idTipoAlerta'] != '') {  $z .= " AND alertas_listado.idTipoAlerta = '".$_GET['idTipoAlerta']."'" ; } 
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND alertas_listado.Fecha BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;       
}
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z .=" AND clientes_listado.idTipoCliente>=0 AND clientes_listado.PPU='' ";	
}else{
	$z .=" AND clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']} AND clientes_listado.PPU='' ";	
}
// Se trae un listado con todos los usuarios
$arrAlarmas = array();
$query = "SELECT 
alertas_listado.idAlerta,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
alertas_listado.Fecha,
alertas_listado.Hora,
alertas_tipos.Nombre AS tipo_alerta,
alertas_listado.vista
FROM `alertas_listado`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = alertas_listado.idCliente
LEFT JOIN alertas_tipos       ON alertas_tipos.idTipoAlerta     = alertas_listado.idTipoAlerta
".$z."
ORDER BY alertas_listado.idAlerta DESC ";
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
            <td><?php echo $alarmas['Nombre'].' '.$alarmas['Apellido_Paterno']; ?></td>
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
$z="clientes_listado.idTipoCliente>=0 AND clientes_listado.Nombre!=''";	
}else{
$z="clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']} AND clientes_listado.Nombre!=''";	
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
				if(isset($idCliente)) {     $x1  = $idCliente;      }else{$x1  = '';}
				if(isset($rango_a)) {       $x2  = $rango_a;        }else{$x2  = '';}
				if(isset($rango_b)) {       $x3  = $rango_b;        }else{$x3  = '';}
				if(isset($Sexo)) {          $x4  = $Sexo;           }else{$x4  = '';}
				if(isset($idCiudad)) {      $x5  = $idCiudad;       }else{$x5  = '';}
				if(isset($idComuna)) {      $x6  = $idComuna;       }else{$x6  = '';}
				if(isset($idTipoAlerta)) {  $x7  = $idTipoAlerta;   }else{$x7  = '';}
				
				//se dibujan los inputs
				echo form_select_filter('Listado de Clientes','idCliente', $x1, 1, 'idCliente', 'Nombre,Apellido_Paterno,Apellido_Materno', 'clientes_listado', $z, $dbConn);
				echo form_date('Rango Fechas inicio','rango_a', $x2, 1);
				echo form_date('Rango Fechas termino','rango_b', $x3, 1);
				echo form_select('Sexo','Sexo', $x4, 1, 'Inicial', 'Nombre', 'clientes_sexo', 0, $dbConn);
				echo form_select_depend1('Ciudad','idCiudad', $x5, 1, 'idCiudad', 'Nombre', 'mnt_ubicacion_ciudad', 0,
										'Comuna','idComuna', $x6, 1, 'idComuna', 'idCiudad', 'Nombre', 'mnt_ubicacion_comunas', 0, 
										 $dbConn);
				echo form_select('Tipos de Alerta','idTipoAlerta', $x7, 1, 'idTipoAlerta', 'Nombre', 'alertas_tipos', 0, $dbConn);						 				 
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