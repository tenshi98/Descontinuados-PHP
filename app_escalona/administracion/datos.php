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
$original = "datos.php";
$location = $original;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para editar datos
if ( !empty($_POST['edit_datos']) )  {
	//Se agregan nuevas ubicaciones
	$location.='?mod=true'; 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuarios_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuarios_listado_4.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/usuarios_listado.php';
}
//formulario para cambiar contraseña
if ( !empty($_POST['edit_clave']) )  { 
	//Se agregan nuevas ubicaciones
	$location.='?password=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuarios_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuarios_listado_3.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/usuarios_listado.php';
}
//formulario para editar imagen
if ( !empty($_POST['submit_img']) )  { 
	$location.='?mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/usuario_listado.php';
}
//se borra una imagen
if ( !empty($_GET['del_img']) )     {
	//$location.='?delete=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/usuario_listado_2.php';
}
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
    <link rel="stylesheet" href="assets/css/theme.css">
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
if(isset($error)&&$error!=''){echo errors_list($error);};?>
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
        
        <div class="col-lg-10 fcenter">
          <img src="img_upload/<?php echo $rowdata['Direccion_img'] ?>" width="100%" > 
          </div>
            <a href="<?php echo $location.'?del_img=true'; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Borrar Imagen</a>
            <a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
            <div class="clearfix"></div>
        <?php }else{?>


		<form class="form-horizontal" method="post" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Seleccionar archivo</label>
				<div class="col-lg-8">
                	<input id="uploadFile" placeholder="Seleccionar archivo" disabled="disabled" />
                    <div class="fileUpload btn btn-primary">
                        <span>Subir Imagen</span>
                        <input id="uploadBtn" type="file" class="upload" name="imgLogo" />
                    </div>
				</div>
			</div>

<script>
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>


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
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Password Antigua</label>
				<div class="col-lg-8">
					<input type="password" id="text2" placeholder="Password Antigua" class="form-control" name="oldpassword" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nueva Password</label>
				<div class="col-lg-8">
					<input type="password" id="text2" placeholder="Nueva Password" class="form-control" name="password" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Reingresar Nueva Password</label>
				<div class="col-lg-8">
					<input type="password" id="text2" placeholder="Reingresar Nueva Password" class="form-control" name="repassword" required>
				</div>
			</div>
                      
			<div class="form-group">
            	<input type="hidden" value="<?php echo $arrUsuario['idUsuario']; ?>" name="idUsuario">
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
$query = "SELECT usuario, tipo, email, Nombre, Rut, fNacimiento, Direccion, Fono, Ciudad, Comuna, idTheme
FROM `usuarios_listado`
WHERE idUsuario = {$arrUsuario['idUsuario']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
// Se trae un listado con todos los colores de los temas
$arrTheme = array();
$query = "SELECT idTheme, Nombre
FROM `core_theme_colors`
ORDER BY idTheme ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTheme,$row );
}
?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificar Mis Datos</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control" value="<?php echo $rowdata['Nombre']; ?>" name="Nombre" required >
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Fono</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Fono" class="form-control" value="<?php echo $rowdata['Fono']; ?>" name="Fono">
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Email</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Email" class="form-control" value="<?php echo $rowdata['email']; ?>" name="email" required >
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Rut</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Rut" class="form-control" value="<?php echo $rowdata['Rut']; ?>" name="Rut">
				</div>
			</div>
            
			<div class="form-group">
				<label class="control-label col-lg-4">Fecha de Nacimiento</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="Fecha de Nacimiento" class="form-control timepicker-default" type="text" name="fNacimiento" id="datepicker" value="<?php echo $rowdata['fNacimiento']; ?>" required>
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
					</div>
				</div>
			</div>
                                  
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Ciudad</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Ciudad" class="form-control" value="<?php echo $rowdata['Ciudad']; ?>" name="Ciudad">
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Comuna</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Comuna" class="form-control" value="<?php echo $rowdata['Comuna']; ?>" name="Comuna">
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Direccion</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Direccion" class="form-control" value="<?php echo $rowdata['Direccion']; ?>" name="Direccion" required >
				</div>
			</div>
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Combinacion de Colores</label>
                <div class="col-lg-8">
                <select name="idTheme" class="form-control" required>
                <option value="" selected>Seleccione un tema</option>
                <?php foreach ( $arrTheme as $theme ) { ?>
                <option value="<?php echo $theme['idTheme']; ?>" 
				<?php if(isset($idTheme)&&$idTheme==$theme['idTheme']){ echo 'selected="selected"';} elseif($rowdata['idTheme']==$theme['idTheme']){echo 'selected="selected"';}?>><?php echo $theme['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            
            
            
			<div class="form-group">
            	<input type="hidden" value="<?php echo $arrUsuario['idUsuario']; ?>" name="idUsuario">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="edit_datos">
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
// Se traen todos los datos de mi usuario
$query = "SELECT 
usuarios_listado.usuario, 
usuarios_listado.tipo, 
usuarios_listado.email, 
usuarios_listado.Nombre, 
usuarios_listado.Rut, 
usuarios_listado.fNacimiento, 
usuarios_listado.Direccion, 
usuarios_listado.Fono, 
usuarios_listado.Ciudad, 
usuarios_listado.Comuna,
clientes_tipos.RazonSocial,
usuarios_listado.Direccion_img
FROM `usuarios_listado`
LEFT JOIN `clientes_tipos`    ON clientes_tipos.idTipoCliente   = usuarios_listado.idTipoCliente
WHERE idUsuario = {$arrUsuario['idUsuario']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>

<div class="col-lg-6 fcenter">
	<div class="box">
		<header>
			<h5>Mis datos</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Basicos</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombre']; ?></p>
            <p class="text-muted"><strong>Fono : </strong><?php echo $rowdata['Fono']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['fNacimiento']); ?></p>
            <p class="text-muted"><strong>Ciudad : </strong><?php echo $rowdata['Ciudad']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['Comuna']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Direccion']; ?></p>
            <p class="text-muted"><strong>Empresa Relacionada : </strong><?php echo $rowdata['RazonSocial']; ?></p>
                        
            <h2 class="text-primary">Perfil</h2>
            <p class="text-muted"><strong>Usuario : </strong><?php echo $rowdata['usuario']; ?></p>
            <p class="text-muted"><strong>Tipo de usuario : </strong><?php echo $rowdata['tipo']; ?></p>
            <p class="text-muted"><strong>Imagen de usuario : </strong></p>
            <div style="width:200px; margin-bottom:20px;">
           	<?php if ($rowdata['Direccion_img']=='') { ?>
                <img class="media-object img-thumbnail user-img width100" alt="User Picture" src="img/usr.png">
            <?php }else{  ?>
                <img class="media-object img-thumbnail user-img width100" alt="User Picture" src="img_upload/<?php echo $arrUsuario['Direccion_img']; ?>">
            <?php }?> 
            </div>
            
        	
            <a href="<?php echo $location ?>?id=true" class="btn btn-primary" data-original-title="" title="">Editar Datos</a>
            <a href="<?php echo $location ?>?id_img=true" class="btn btn-primary" data-original-title="" title="">Cambiar Imagen</a>
			<a href="<?php echo $location ?>?clave=true" class="btn btn-primary" data-original-title="" title="">Cambiar Password</a>
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