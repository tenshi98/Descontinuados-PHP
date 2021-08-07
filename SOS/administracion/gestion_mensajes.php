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
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "gestion_mensajes.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'filtrar';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_msj_enviados.php';
}
//formulario para editar
if ( !empty($_POST['mms']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Tipo,Titulo,Mensaje';
	$form_trabajo= 'mms';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_msj_enviados.php';
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
<?php 
//Listado de errores no manejables
if (isset($_GET['send'])) {$error['usuario'] 	  = 'sucess/Se han enviado '.$_GET['send'].'mensajes con exito';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['filter']) ) {  ?>
 
 <div class="col-lg-9 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Enviar mensaje</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($Tipo)) {              $x1  = $Tipo;             }else{$x1  = '';}
			if(isset($Titulo)) {            $x2  = $Titulo;           }else{$x2  = '';}
			if(isset($Mensaje)) {           $x3  = $Mensaje;          }else{$x3  = '';}

			//se dibujan los inputs
			echo form_select('Tipos de mensaje','Tipo', $x1, 2, 'id_Detalle', 'Nombre', 'detalle_general', 'Tipo=8', $dbConn);
			echo form_input('text', 'Titulo del mensaje', 'Titulo', $x2, 2);
			echo form_ckeditor('Mensaje','Mensaje', $x3, 2);
			?>
			
			<div class="form-group">
                <?php //Se complementan los filtros
				if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')     { echo '<input type="hidden"  name="idCliente"   value="'.$_GET['idCliente'].'">' ; }
				if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')               { echo '<input type="hidden"  name="Sexo"        value="'.$_GET['Sexo'].'">' ; }
				if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')       { echo '<input type="hidden"  name="idCiudad"    value="'.$_GET['idCiudad'].'">' ; }
				if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')       { echo '<input type="hidden"  name="idComuna"    value="'.$_GET['idComuna'].'">' ; }
				?>
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Enviar Mensaje" name="mms">
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para el envio de mensajes</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($idCliente)) {   $x1  = $idCliente;   }else{$x1  = '';}
			if(isset($Sexo)) {        $x2  = $Sexo;        }else{$x2  = '';}
			if(isset($idCiudad)) {    $x3  = $idCiudad;    }else{$x3  = '';}
			if(isset($idComuna)) {    $x4  = $idComuna;    }else{$x4  = '';}
			
			//se dibujan los inputs
			echo form_select_filter('Listado de Clientes','idCliente', $x1, 1, 'idCliente', 'Nombre,Apellido_Paterno,Apellido_Materno', 'clientes_listado', "Nombre!=''", $dbConn);
			echo form_select('Sexo','Sexo', $x2, 1, 'Inicial', 'Nombre', 'clientes_sexo', 0, $dbConn);
			echo form_select_depend1('Ciudad','idCiudad', $x3, 1, 'idCiudad', 'Nombre', 'mnt_ubicacion_ciudad', 0,
									'Comuna','idComuna', $x4, 1, 'idComuna', 'idCiudad', 'Nombre', 'mnt_ubicacion_comunas', 0, 
									 $dbConn);						 
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