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
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Ver Datos del Conductor</title>
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
            <i class="fa fa-dashboard"></i> Ver Datos del Conductor
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
 // Se traen todos los datos de mi usuario
$query = "SELECT   
taxista_conductores.email, 
taxista_conductores.Nombre, 
taxista_conductores.Apellido_Paterno,
taxista_conductores.Apellido_Materno,
taxista_conductores.Rut, 
taxista_conductores.fNacimiento, 
taxista_conductores.Direccion, 
taxista_conductores.Fono1, 
taxista_conductores.Fono2, 
mnt_ubicacion_ciudad.Nombre AS nombre_region,
mnt_ubicacion_comunas.Nombre AS nombre_comuna
FROM `taxista_conductores`
LEFT JOIN `mnt_ubicacion_ciudad`      ON mnt_ubicacion_ciudad.idCiudad      = taxista_conductores.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`     ON mnt_ubicacion_comunas.idComuna     = taxista_conductores.idComuna
WHERE taxista_conductores.idConductor = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

// Se trae un listado con todos los vehiculos conducidos
$arrUsers = array();
$query = "SELECT 
transantiago_recorridos.Nombre AS recorrido,
clientes_listado.PPU,
buses_marcas.Nombre AS Nombre_marca,
buses_modelos.Nombre AS Nombre_modelo,
transantiago_propietarios.Nombre AS Nombre_prop,
transantiago_propietarios.Apellido_Paterno AS Apellido_prop,
transantiago_conductores_historico.Fecha AS Fecha_cond,
transantiago_conductores_historico.Hora AS Hora_cond

FROM `transantiago_conductores_historico`
LEFT JOIN `clientes_listado`            ON clientes_listado.idCliente                = transantiago_conductores_historico.idCliente
LEFT JOIN `transantiago_recorridos`     ON transantiago_recorridos.idRecorrido       = clientes_listado.idRecorrido
LEFT JOIN `buses_marcas`                ON buses_marcas.idMarca                      = clientes_listado.idMarca
LEFT JOIN `buses_modelos`               ON buses_modelos.idModelo                    = clientes_listado.idModelo
LEFT JOIN `transantiago_propietarios`   ON transantiago_propietarios.idPropietario   = clientes_listado.idPropietario
WHERE transantiago_conductores_historico.idConductor = '{$_GET['view']}'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
?>

<div class="col-lg-4">
	<div class="box">
		<header>
			<h5>Ver Datos del Conductor</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Datos Basicos</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombre'].' '.$rowdata['Apellido_Paterno'].' '.$rowdata['Apellido_Materno']; ?></p>
            <p class="text-muted"><strong>Telefono 1 : </strong><?php echo $rowdata['Fono1']; ?></p>
            <p class="text-muted"><strong>Telefono 2 : </strong><?php echo $rowdata['Fono2']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['fNacimiento']); ?></p>
            <p class="text-muted"><strong>Region : </strong><?php echo $rowdata['nombre_region']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['nombre_comuna']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Direccion']; ?></p>
 	
        </div>
	</div>
</div>

<div class="clearfix"></div>

<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Vehiculos Conducidos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
		<th>Fecha</th>
		<th>Hora</th>
        <th>Bus</th>
        <th>Recorrido</th>
        <th>Propietario</th>
    </tr>
	</thead>
               
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['Fecha_cond']; ?></td>
			<td><?php echo $usuarios['Hora_cond']; ?></td>
			<td><?php echo 'Patente '.$usuarios['PPU'].' - '.$usuarios['Nombre_marca'].' '.$usuarios['Nombre_modelo']; ?></td>
            <td><?php echo $usuarios['recorrido']; ?></td>
            <td><?php echo $usuarios['Nombre_prop'].' '.$usuarios['Apellido_prop']; ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
</div>
</div>





<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="#" onclick="history.back()" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
         
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