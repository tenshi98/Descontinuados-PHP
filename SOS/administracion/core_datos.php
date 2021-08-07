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
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "core_datos.php";
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Nombre,Fono,email_principal,Rut,Ciudad,Comuna,Direccion,UrlApp,tareasServer';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/core_datos.php';
}
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Datos de la empresa de Soporte</title>
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
            <i class="fa fa-dashboard"></i> Datos de la empresa
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
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Los datos de la empresa han sido modificados con exito';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de la empresa
$query = "SELECT email_principal, Nombre, Rut, Direccion, Fono, Ciudad, Comuna, UrlApp, tareasServer
FROM `core_datos`
WHERE id_Datos = '1'";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificar Datos de la empresa de Soporte</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($Nombre)) {              $x1  = $Nombre;             }else{$x1  = $rowdata['Nombre'];}
            if(isset($Fono)) {                $x2  = $Fono;               }else{$x2  = $rowdata['Fono'];}
            if(isset($email_principal)) {     $x3  = $email_principal;    }else{$x3  = $rowdata['email_principal'];}
			if(isset($Rut)) {                 $x4  = $Rut;                }else{$x4  = $rowdata['Rut'];}
			if(isset($Ciudad)) {              $x5  = $Ciudad;             }else{$x5  = $rowdata['Ciudad'];}
			if(isset($Comuna)) {              $x6  = $Comuna;             }else{$x6  = $rowdata['Comuna'];}
			if(isset($Direccion)) {           $x7  = $Direccion;          }else{$x7  = $rowdata['Direccion'];}
			if(isset($UrlApp)) {              $x8  = $UrlApp;             }else{$x8  = $rowdata['UrlApp'];}
			if(isset($tareasServer)) {        $x9  = $tareasServer;       }else{$x9  = $rowdata['tareasServer'];}
			
			//se dibujan los inputs
			echo form_input('text', 'Nombre', 'Nombre', $x1, 2);
			echo form_input('text', 'Fono', 'Fono', $x2, 2);
			echo form_input('text', 'Email de respuesta', 'email_principal', $x3, 2);
			echo form_input('text', 'Rut', 'Rut', $x4, 2);
			echo form_input('text', 'Ciudad', 'Ciudad', $x5, 2);
			echo form_input('text', 'Comuna', 'Comuna', $x6, 2);
			echo form_input('text', 'Direccion', 'Direccion', $x7, 2);
			echo form_input('text', 'Url de la App', 'UrlApp', $x8, 2);
			echo form_select('Tareas de servidor','tareasServer', $x9, 2, 'idOpciones', 'Nombre', 'core_datos_opciones', 0, $dbConn);
			?>

			<div class="form-group">
            	<input type="hidden" value="1" name="id_Datos">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit">
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
// Se traen todos los datos de la empresa
$query = "SELECT email_principal,  Nombre,  Rut,  Direccion,  Fono,  Ciudad,  Comuna, UrlApp, tareasServer
FROM `core_datos`
WHERE id_Datos = '1'";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>

<div class="col-lg-5 fcenter">
	<div class="box">
		<header>
			<h5>Datos de la empresa de Soporte</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Basicos</h2>
            <p class="text-muted"><strong>Razon Social : </strong><?php echo $rowdata['Nombre']; ?></p>
            <p class="text-muted"><strong>Fono : </strong><?php echo $rowdata['Fono']; ?></p>
            <p class="text-muted"><strong>Email de respuesta : </strong><?php echo $rowdata['email_principal']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Ciudad : </strong><?php echo $rowdata['Ciudad']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['Comuna']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Direccion']; ?></p>
            
            <h2 class="text-primary">Otros Datos</h2>
            <p class="text-muted"><strong>Url de la App : </strong><?php echo $rowdata['UrlApp']; ?></p>  
            <p class="text-muted"><strong>Tareas del Servidor : </strong><?php if($rowdata['tareasServer']==1){echo 'Activa';}elseif($rowdata['tareasServer']==2){echo 'Inactiva';}; ?></p>     
        	
            <a href="<?php echo $location ?>?id=true" class="btn btn-primary" data-original-title="" title="">Editar Datos</a>
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