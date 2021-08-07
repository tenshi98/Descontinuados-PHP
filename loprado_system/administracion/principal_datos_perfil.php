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
$original = "principal_datos_perfil.php";
$location = $original;
$location .= '?d=d';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para editar
if ( !empty($_POST['edit_datos']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idUsuario,Nombre,email,Rut,fNacimiento';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
}
//formulario para editar
if ( !empty($_POST['edit_clave']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idUsuario,oldpassword,password,repassword';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
}
//formulario para editar
if ( !empty($_POST['submit_img']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'submit_img';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
}
//se borra un dato
if ( !empty($_GET['del_img']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del_img';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';	
}
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//variable con el nombre de la categoria de la transaccion
$rowlevel['nombre_categoria']='Mis Datos';
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Mis Datos Personales</title>
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
    <!--Modulos de javascript-->
    <script type="text/javascript" src="assets/lib/modernizr/modernizr.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
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
              <a href="principal.php" class="navbar-brand">
                <?php require_once 'core/logo_empresa.php';?>
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
            <i class="fa fa-dashboard"></i> Mis Datos Personales
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
if (isset($_GET['edited']))   {$error['usuario'] 	  = 'sucess/Tus datos han sido modificados correctamente';}
if (isset($_GET['password'])) {$error['usuario'] 	  = 'sucess/Tu clave ha sido modificada correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id_img']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT Direccion_img, Nombre
FROM `usuarios_listado`
WHERE idUsuario = {$arrUsuario['idUsuario']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado); ?>
 
 
    
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion Imagen usuario: <?php echo $rowdata['Nombre']; ?></h5>
		</header>
		<div id="div-1" class="body">
        <?php if(isset($rowdata['Direccion_img'])&&$rowdata['Direccion_img']!=''){?>
        
        <div class="col-lg-10 fcenter" style="margin-bottom:10px;">
          <img src="upload/<?php echo $rowdata['Direccion_img'] ?>" width="100%" > 
          </div>
            <a href="<?php echo $location.'?del_img=true'; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Borrar Imagen</a>
            <a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
            <div class="clearfix"></div>
        
		<?php }else{?>


		<form class="form-horizontal" method="post" enctype="multipart/form-data">
			
			<?php           
			//se dibujan los inputs
			echo form_input_file('Seleccionar archivo','imgLogo');
			?> 

			<div class="form-group">
            	<input type="hidden" name="idUsuario" value="<?php echo $arrUsuario['idUsuario']; ?>">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_img"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
           <?php }?>       
                  
                    
		</div>
	</div>
</div>     
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['clave']) ) { ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificar Mi Contraseña</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($oldpassword)) {   $x1  = $oldpassword;  }else{$x1  = '';}
            if(isset($password)) {      $x2  = $password;     }else{$x2  = '';}
            if(isset($repassword)) {    $x3  = $repassword;   }else{$x3  = '';}
            
			//se dibujan los inputs
			echo '<h4>Atencion!:Esto cerrara tu sesion actual</h4>';
        	echo form_input('password', 'Password Antigua', 'oldpassword', $x1, 2);
            echo form_input('password', 'Password', 'password', $x2, 2);
            echo form_input('password', 'Repetir Password', 'repassword', $x3, 2);
			?> 
                      
			<div class="form-group">
            	<input type="hidden" name="idUsuario" value="<?php echo $arrUsuario['idUsuario']; ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Cambiar Password" name="edit_clave">
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT email
FROM `usuarios_listado`
WHERE idUsuario = {$arrUsuario['idUsuario']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificar Perfil</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			
			<?php 
			//Se verifican si existen los datos
            if(isset($email)) {         $x1  = $email;        }else{$x1  = $rowdata['email'];}
            
			//se dibujan los inputs
            echo form_input_icon('text', 'Email', 'email', $x1, 2,'fa fa-envelope-o');	
			?> 
			
			<div class="form-group">
            	<input type="hidden" name="idUsuario" value="<?php echo $arrUsuario['idUsuario']; ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="edit_datos">
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {?>

<div class="col-lg-12">
	<div class="box">
		<header>
			<h5>Mis datos</h5>
			<ul class="nav nav-tabs pull-right">
				<li class="active"><a href="principal_datos_perfil.php" >Perfil</a></li>
				<li class=""><a href="principal_datos_ficha.php" >Ficha</a></li>
				<li class=""><a href="principal_datos_diasadmin.php?pagina=1" >Dias Administrativos</a></li>
				<li class=""><a href="principal_datos_horas.php?pagina=1" >Horas Compensatorias</a></li>
				<li class=""><a href="principal_datos_feriados.php?pagina=1" >Feriados</a></li>
				<li class=""><a href="principal_datos_licencias.php?pagina=1" >Licencias</a></li>
				<li class=""><a href="principal_datos_asistencia.php?pagina=1" >Asistencia</a></li>
				<li class=""><a href="principal_datos_liquidacion.php?pagina=1" >Liquidacion</a></li>
				<li class=""><a href="principal_datos_calificacion.php?pagina=1" >Calificaciones</a></li>
			</ul>
		</header>
        <div class="body">
			<div class="col-lg-4">
				<br/>
				<?php if ($arrUsuario['Direccion_img']=='') { ?>
					<img class="media-object img-thumbnail user-img width100" alt="User Picture" src="img/usr.png">
				<?php }else{  ?>
					<img class="media-object img-thumbnail user-img width100" alt="User Picture" src="upload/<?php echo $arrUsuario['Direccion_img']; ?>">
				<?php }?>
				<div class="btn-group-vertical" role="group" aria-label="..." style="margin-top:10px; width:100%;">
					<a href="<?php echo $location ?>&id=true" class="btn btn-primary" >Editar Perfil</a>
					<a href="<?php echo $location ?>&id_img=true" class="btn btn-primary" >Cambiar Imagen</a>
					<a href="<?php echo $location ?>&clave=true" class="btn btn-primary">Cambiar Password</a>
				</div>
			</div>
			<div class="col-lg-8">
				<h2 class="text-primary">Datos del Perfil</h2>
				<p class="text-muted"><strong>Nombre : </strong><?php echo $arrUsuario['Nombre'].' '.$arrUsuario['Apellido']; ?></p>
				<p class="text-muted"><strong>Rut : </strong><?php echo $arrUsuario['Rut']; ?></p>
				<p class="text-muted"><strong>Email : </strong><?php echo $arrUsuario['email']; ?></p>
				<p class="text-muted"><strong>Tipo de usuario : </strong><?php echo $arrUsuario['tipo']; ?></p>

			</div>	
			<div class="clearfix"></div>	
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
    <!--Otros archivos javascript -->
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/screenfull/screenfull.js"></script> 
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>
