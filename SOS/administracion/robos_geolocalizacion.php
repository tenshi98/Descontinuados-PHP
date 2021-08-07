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
$original = "robos_geolocalizacion.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  { 
	//Llamamos al formulario
	$form_trabajo= 'filtrar_robos_geolocalizacion';
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
 if ( ! empty($_GET['filter']) ) { 
//Se complementan los filtros
$z="WHERE robos_listado.idRobo>0";
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND robos_listado.Fecha BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;          
}
if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')            { $z .= " AND clientes_listado.idCliente = '".$_GET['idCliente']."'" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                      { $z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')              { $z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')              { $z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ; }
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')                { $z .= " AND clientes_vehiculos.idMarca = '".$_GET['idMarca']."'" ; }
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')              { $z .= " AND clientes_vehiculos.idModelo = '".$_GET['idModelo']."'" ; }
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')    { $z .= " AND clientes_vehiculos.idTransmision = '".$_GET['idTransmision']."'" ; }
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')          { $z .= " AND clientes_vehiculos.idColorV_1 = '".$_GET['idColorV_1']."'" ; }
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')          { $z .= " AND clientes_vehiculos.idColorV_2 = '".$_GET['idColorV_2']."'" ; }
if(isset($_GET['fTransferencia']) && $_GET['fTransferencia'] != '')  { $z .= " AND clientes_vehiculos.fTransferencia = '".$_GET['fTransferencia']."'" ; }
if(isset($_GET['fFabricacion']) && $_GET['fFabricacion'] != '')      { $z .= " AND clientes_vehiculos.fFabricacion = '".$_GET['fFabricacion']."'" ; } 
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')                { $z .= " AND clientes_vehiculos.N_Motor = '".$_GET['N_Motor']."'" ; } 
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')              { $z .= " AND clientes_vehiculos.N_Chasis = '".$_GET['N_Chasis']."'" ; }  
$z .= " AND robos_listado.Longitud !='' AND robos_listado.Longitud !=0" ;
$z .= " AND robos_listado.Latitud !='' AND robos_listado.Latitud !=0" ;
//Realizo la consulta
$arrAviso = array();	
$query="SELECT 
robos_listado.Longitud,
robos_listado.Latitud ,
clientes_listado.Nombre,
vehiculos_marcas.Nombre AS nombre_marca,
vehiculos_modelos.Nombre AS nombre_modelo,
clientes_vehiculos.PPU
FROM robos_listado 
LEFT JOIN clientes_listado    ON clientes_listado.idCliente         = robos_listado.idCliente
LEFT JOIN clientes_vehiculos  ON clientes_vehiculos.idVehiculo      = robos_listado.idVehiculo
LEFT JOIN vehiculos_marcas    ON vehiculos_marcas.idMarca           = clientes_vehiculos.idMarca
LEFT JOIN vehiculos_modelos   ON vehiculos_modelos.idModelo         = clientes_vehiculos.idModelo

".$z;	  
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrAviso,$row );
}
mysql_free_result($resultado2);
 
 ?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $arrAviso[0]['Latitud'] ?>, <?php echo $arrAviso[0]['Longitud'] ?>);
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
			  title:"<?php echo $aviso['nombre_marca'].' '.$aviso['nombre_modelo'].' patente '.$aviso['PPU'].' de '.$aviso['Nombre'] ?>",
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
		<div id="div-1" class="body">
            	<div id="map_canvas" style="width:100%; height:100%">
                	<script type="text/javascript">initialize();</script>
             	</div>             
		</div>
	</div>
</div>
<div class="col-lg-12 fcenter" style="margin-bottom:50px">
	<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
</div>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="clientes_listado.idTipoCliente>=0";	
}else{
	$z="clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
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