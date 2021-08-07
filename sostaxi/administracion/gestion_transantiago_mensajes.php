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
$original = "gestion_transantiago_mensajes.php";
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
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_msj_tran_enviados.php';
}
//formulario para editar
if ( !empty($_POST['mms']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Tipo,Titulo';
	$form_trabajo= 'mms';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_msj_tran_enviados.php';
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
 
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Enviar mensaje</h5>
		</header>
		<div id="div-1" class="body">
		<?php echo audio_capture();?>
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
			
			<?php 
			
			echo form_input_file('Archivo','Mensaje');
			
			
			?>
			
			<div class="form-group">
				<input type="hidden" name="idUsuario" value="<?php echo $arrUsuario['idUsuario']; ?>" >
                <?php //Se complementan los filtros
				if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')     { echo '<input type="hidden"  name="idConductor"     value="'.$_GET['idConductor'].'">' ; }
				if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '') { echo '<input type="hidden"  name="idPropietario"   value="'.$_GET['idPropietario'].'">' ; }
				if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')     { echo '<input type="hidden"  name="idRecorrido"     value="'.$_GET['idRecorrido'].'">' ; }
				if(isset($_GET['PPU']) && $_GET['PPU'] != '')                     { echo '<input type="hidden"  name="PPU"             value="'.$_GET['PPU'].'">' ; }
				if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')             { echo '<input type="hidden"  name="idMarca"         value="'.$_GET['idMarca'].'">' ; }
				if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')           { echo '<input type="hidden"  name="idModelo"        value="'.$_GET['idModelo'].'">' ; }
				if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '') { echo '<input type="hidden"  name="idTransmision"   value="'.$_GET['idTransmision'].'">' ; }
				if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')       { echo '<input type="hidden"  name="idColorV_1"      value="'.$_GET['idColorV_1'].'">' ; }
				if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')       { echo '<input type="hidden"  name="idColorV_2"      value="'.$_GET['idColorV_2'].'">' ; }
				if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != '')     { echo '<input type="hidden"  name="fechaInicio"     value="'.$_GET['fechaInicio'].'">' ; }
				if(isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != '')   { echo '<input type="hidden"  name="fechaTermino"    value="'.$_GET['fechaTermino'].'">' ; }
				if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')             { echo '<input type="hidden"  name="N_Motor"         value="'.$_GET['N_Motor'].'">' ; }
				if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')           { echo '<input type="hidden"  name="N_Chasis"        value="'.$_GET['N_Chasis'].'">' ; }
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
			if(isset($idConductor)) {    $x1  = $idConductor;    }else{$x1  = '';}
			if(isset($idPropietario)) {  $x2  = $idPropietario;  }else{$x2  = '';}
			if(isset($idRecorrido)) {    $x3  = $idRecorrido;    }else{$x3  = '';}
			if(isset($PPU)) {            $x4  = $PPU;            }else{$x4  = '';}
			if(isset($idMarca)) {        $x5  = $idMarca;        }else{$x5  = '';}
			if(isset($idModelo)) {       $x6  = $idModelo;       }else{$x6  = '';}
			if(isset($idTransmision)) {  $x7  = $idTransmision;  }else{$x7  = '';}
			if(isset($idColorV_1)) {     $x8  = $idColorV_1;     }else{$x8  = '';}
			if(isset($idColorV_2)) {     $x9  = $idColorV_2;     }else{$x9  = '';}
			if(isset($fechaInicio)) {    $x10 = $fechaInicio;    }else{$x10 = '';}
			if(isset($fechaTermino)) {   $x11 = $fechaTermino;   }else{$x11 = '';}
			if(isset($N_Motor)) {        $x12 = $N_Motor;        }else{$x12 = '';}
			if(isset($N_Chasis)) {       $x13 = $N_Chasis;       }else{$x13 = '';}

			//se dibujan los inputs
			echo form_select_filter('Conductor','idConductor', $x1, 1, 'idConductor', 'Nombre,Apellido_Paterno,Apellido_Materno', 'transantiago_conductores', 0, $dbConn);
			echo form_select_filter('Propietario','idPropietario', $x2, 1, 'idPropietario', 'Nombre,Apellido_Paterno,Apellido_Materno', 'transantiago_propietarios', 0, $dbConn);
			echo form_select_filter('Recorrido','idRecorrido', $x3, 1, 'idRecorrido', 'Nombre', 'transantiago_recorridos', 0, $dbConn);
			echo form_input('text', 'Patente', 'PPU', $x4, 1);
			echo form_select_depend1('Marca','idMarca', $x5, 1, 'idMarca', 'Nombre', 'vehiculos_marcas', 0,
									'Modelo','idModelo', $x6, 1, 'idModelo', 'idMarca', 'Nombre', 'vehiculos_modelos', 0, 
									$dbConn);
			echo form_select('Tipo de Transmision','idTransmision', $x7, 1, 'idTransmision', 'Nombre', 'vehiculos_transmision', 0, $dbConn);						 
			echo form_select('Color Base','idColorV_1', $x8, 1, 'idColorV', 'Nombre', 'vehiculos_colores', 0, $dbConn);						 
			echo form_select('Color Complementario','idColorV_2', $x9, 1, 'idColorV', 'Nombre', 'vehiculos_colores', 0, $dbConn);
			echo form_date('F Fabricacion Inicio','fechaInicio', $x10, 1);
			echo form_date('F Fabricacion Fin','fechaTermino', $x11, 1);
			echo form_input('text', 'Numero de Motor', 'N_Motor', $x12, 1);
			echo form_input('text', 'Numero de Chasis', 'N_Chasis', $x13, 1);
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