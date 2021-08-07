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
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "comportamiento_principal.php";
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
//formulario para agregar permisos de acceso a las transacciones
if ( !empty($_GET['table']) ) {
	
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/app_comportamiento.php';
}
//formulario estados de lectura
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/estados_leidos.php';
}
//formulario para editar el alcance de las alarmas
if ( !empty($_POST['submit_alcance']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/alcance_alarmas.php';
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
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Comportamiento Modificado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php // Se traen todos los datos de la empresa
$query = "SELECT  comport_register, comport_recover, comport_autoactivate, comport_client, comport_alcance
FROM `app_ajustes_generales`
WHERE id = '1'";
$result = mysql_query ($query, $dbConn);
$config_app = mysql_fetch_assoc($result);
?>

 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Comportamiento</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Usuario</th> 
        <th width="160">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">

<tr> 
    <td>Permitir registrarse en la aplicacion</td> 
    <td>
    <?php if ($rowlevel['level']>=2){?>
        <ul class="interruptor">   
        <?php if ( $config_app['comport_register']=='1' ) {?>   
        <li class="primer_int"><a href="<?php echo $location; ?>?table=comport_register&val=2">OFF</a></li>
        <li class="ultimo_int on"><a href="#">ON</a></li>
        <?php } else {?>
        <li class="primer_int on"><a href="#">OFF</a></li>
        <li class="ultimo_int"><a href="<?php echo $location; ?>?table=comport_register&val=1">ON</a></li>
        <?php }?>    
        </ul>
    <?php }?>    
    </td>
</tr>
<tr> 
    <td>Permitir recuperar contraseña</td> 
    <td>
    <?php if ($rowlevel['level']>=2){?>
        <ul class="interruptor">   
        <?php if ( $config_app['comport_recover']=='1' ) {?>   
        <li class="primer_int"><a href="<?php echo $location; ?>?table=comport_recover&val=2">OFF</a></li>
        <li class="ultimo_int on"><a href="#">ON</a></li>
        <?php } else {?>
        <li class="primer_int on"><a href="#">OFF</a></li>
        <li class="ultimo_int"><a href="<?php echo $location; ?>?table=comport_recover&val=1">ON</a></li>
        <?php }?>    
        </ul>
    <?php }?>    
    </td>
</tr>
<tr> 
    <td>Permitir autoactivacion despues del registro de usuario nuevo</td> 
    <td>
    <?php if ($rowlevel['level']>=2){?>
        <ul class="interruptor">   
        <?php if ( $config_app['comport_autoactivate']=='1' ) {?>   
        <li class="primer_int"><a href="<?php echo $location; ?>?table=comport_autoactivate&val=2">OFF</a></li>
        <li class="ultimo_int on"><a href="#">ON</a></li>
        <?php } else {?>
        <li class="primer_int on"><a href="#">OFF</a></li>
        <li class="ultimo_int"><a href="<?php echo $location; ?>?table=comport_autoactivate&val=1">ON</a></li>
        <?php }?>    
        </ul>
    <?php }?>    
    </td>
</tr>
<tr> 
    <td>Enviar notificaciones solo al mismo tipo de clientes</td> 
    <td>
    <?php if ($rowlevel['level']>=2){?>
        <ul class="interruptor">   
        <?php if ( $config_app['comport_client']=='1' ) {?>   
        <li class="primer_int"><a href="<?php echo $location; ?>?table=comport_client&val=2">OFF</a></li>
        <li class="ultimo_int on"><a href="#">ON</a></li>
        <?php } else {?>
        <li class="primer_int on"><a href="#">OFF</a></li>
        <li class="ultimo_int"><a href="<?php echo $location; ?>?table=comport_client&val=1">ON</a></li>
        <?php }?>    
        </ul>
    <?php }?>    
    </td>
</tr> 
<tr> 
<?php 
//se trae solo un dato de la base de datos
$query = "SELECT  Nombre
FROM `detalle_general`
WHERE id_Detalle = '7'";
$result = mysql_query ($query, $dbConn);
$no_leido = mysql_fetch_assoc($result);
?>
    <td>Modificar Texto estado de no leido, actualmente es : <?php echo $no_leido['Nombre'] ?></td> 
    <td>      
<form class="form-horizontal" method="post">
<input type="text" id="text2" placeholder="Nombre" class="form-control"   name="Nombre" required>
<input type="hidden" name="id_Detalle" value="7" >
<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
</form> 
    </td>
</tr>
<tr> 
<?php 
//se trae solo un dato de la base de datos
$query = "SELECT  Nombre
FROM `detalle_general`
WHERE id_Detalle = '8'";
$result = mysql_query ($query, $dbConn);
$leido = mysql_fetch_assoc($result);
?>
    <td>Modificar Texto estado de leido, actualmente es : <?php echo $leido['Nombre'] ?></td> 
    <td>      
<form class="form-horizontal" method="post">
<input type="text" id="text2" placeholder="Nombre" class="form-control"  name="Nombre" required>
<input type="hidden" name="id_Detalle" value="8" >
<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
</form> 
    </td>
</tr>
<tr> 
    <td>Modificar alcance de alertas, actualmente es : <?php echo $config_app['comport_alcance'] ?> kilometros</td> 
    <td>      
<form class="form-horizontal" method="post">
<input type="text" id="text2" placeholder="Nombre" class="form-control"  name="comport_alcance" required>
<input type="hidden" name="id" value="1" >
<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_alcance"> 
</form> 
    </td>
</tr> 
                    
	</tbody>
</table>
   
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