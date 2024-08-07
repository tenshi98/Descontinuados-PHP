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
//formulario para editar datos
if ( !empty($_POST['edit_datos']) )  {
	//Se agregan nuevas ubicaciones
	$location.='?mod=true'; 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/core_datos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/core_datos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/core_datos.php';
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
    <link rel="stylesheet" href="assets/css/theme.css">
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
<script language="javascript">
function msg(direccion){
if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
</script>
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
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?> 
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($errors[5])) {echo $errors[5];}?>
<?php  if (isset($errors[6])) {echo $errors[6];}?>
<?php  if (isset($errors[7])) {echo $errors[7];}?> 
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Los datos de la empresa han sido modificados con exito
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
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
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control" value="<?php echo $rowdata['Nombre']; ?>" name="Nombre" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Fono</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Fono" class="form-control" value="<?php echo $rowdata['Fono']; ?>" name="Fono" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Email de respuesta</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Email" class="form-control" value="<?php echo $rowdata['email_principal']; ?>" name="email_principal" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Rut</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Rut" class="form-control" value="<?php echo $rowdata['Rut']; ?>" name="Rut" required>
				</div>
			</div>
                      
			
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Ciudad</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Ciudad" class="form-control" value="<?php echo $rowdata['Ciudad']; ?>" name="Ciudad" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Comuna</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Comuna" class="form-control" value="<?php echo $rowdata['Comuna']; ?>" name="Comuna" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Direccion</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Direccion" class="form-control" value="<?php echo $rowdata['Direccion']; ?>" name="Direccion" required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Url de la App</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Url de la App" class="form-control" value="<?php echo $rowdata['UrlApp']; ?>" name="UrlApp" required>
				</div>
			</div>
            
            <div class="form-group">
                <label for="text2" class="control-label col-lg-4">Tareas de servidor</label>
                <div class="col-lg-8">
                    <select name="tareasServer" class="form-control" required >
                        <option value="" selected="selected">Seleccione para activar las tareas</option>
                        <option value="1" <?php if($rowdata['tareasServer']==1){echo 'selected="selected"';}; ?> >Si</option>
                        <option value="2" <?php if($rowdata['tareasServer']==2){echo 'selected="selected"';}; ?> >No</option>
                                     
                    </select>
                </div>
            </div>
             
            
            
            
            
			<div class="form-group">
            	<input type="hidden" value="1" name="id_Datos">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="edit_datos">
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