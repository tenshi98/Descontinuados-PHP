<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
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
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Vista de Solicitudes</title>
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
            <i class="fa fa-dashboard"></i> Vista de Solicitudes
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
// Se traen todos los datos 
$query = "SELECT 
solicitud_listado.Nombres,
solicitud_listado.ApellidoPat,
solicitud_listado.ApellidoMat,
solicitud_listado.Rut,
solicitud_listado.email,
solicitud_listado.Fono1,
solicitud_listado.Fono2,
mnt_oirs_tipomsje.Nombre AS tipo_mensaje,
mnt_oirs_departamentos.Nombre AS departamento,
solicitud_listado.Fcreacion,
solicitud_listado.Fecha,
solicitud_listado.Fvista,
solicitud_listado.Detalle,
solicitud_listado.idSolicitud,
mnt_ubicacion_ciudad.Nombre AS nombre_ciudad,
mnt_ubicacion_comunas.Nombre AS nombre_comuna
FROM `solicitud_listado`
LEFT JOIN `mnt_oirs_tipomsje`            ON mnt_oirs_tipomsje.id_Tipomsje         = solicitud_listado.TipoMsje
LEFT JOIN `mnt_oirs_departamentos`       ON mnt_oirs_departamentos.idDepto        = solicitud_listado.Depto
LEFT JOIN `mnt_ubicacion_ciudad`         ON mnt_ubicacion_ciudad.idCiudad         = solicitud_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`        ON mnt_ubicacion_comunas.idComuna        = solicitud_listado.idComuna
WHERE idSolicitud = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
?>
 
<div class="col-lg-8 fcenter">
	<div class="box">
		<header>
			<h5>Datos de la solicitud</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">

            <h2 class="text-primary">Datos del solicitante</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombres'].' '.$rowdata['ApellidoPat'].' '.$rowdata['ApellidoMat']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
            <p class="text-muted"><strong>Fono1 : </strong><?php echo $rowdata['Fono1']; ?></p>
            <p class="text-muted"><strong>Fono2 : </strong><?php echo $rowdata['Fono2']; ?></p>
            <p class="text-muted"><strong>Region : </strong><?php echo $rowdata['nombre_ciudad']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['nombre_comuna']; ?></p>
            
            <h2 class="text-primary">Informacion de la solicitud</h2>
            <p class="text-muted"><strong>N° Solicitud : </strong><?php echo n_doc($rowdata['idSolicitud']); ?></p>
            <p class="text-muted"><strong>Tipo Mensaje : </strong><?php echo $rowdata['tipo_mensaje']; ?></p>
            <p class="text-muted"><strong>Departamento : </strong><?php echo $rowdata['departamento']; ?></p>
            <p class="text-muted"><strong>Fecha de creacion : </strong><?php echo Fecha_completa($rowdata['Fcreacion']); ?></p>
            <p class="text-muted"><strong>Fecha del evento : </strong><?php echo Fecha_completa($rowdata['Fecha']); ?></p>
            <p class="text-muted"><strong>Fecha vista : </strong><?php echo Fecha_completa($rowdata['Fvista']); ?></p>
                        
            <h2 class="text-primary">Detalle</h2> 
            <p class="text-muted"><strong>Mensaje : </strong><?php echo $rowdata['Detalle']; ?></p>
        		
           	
        </div>
	</div>
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