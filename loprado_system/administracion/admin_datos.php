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
$original = "admin_datos.php";
$location = $original;
//Se agregan ubicaciones
$location .='?dd=dd';
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para editar
if ( !empty($_POST['edit_datos']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idSistema,Nombre,idRubro,Rut,Ciudad,Comuna,Direccion,idTheme';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/core_sistemas.php';
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
            <?php echo '<i class="'.$rowlevel['IconoCategoria'].'"></i> '.$rowlevel['nombre_transaccion']; ?>		
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
if (isset($_GET['mod'])) {$error['usuario'] 	  = 'sucess/Los datos de la empresa han sido modificados con exito';}
//Manejador de errores
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de la empresa
$query = "SELECT Nombre, email_principal, Rut, Direccion, Fono, Ciudad, Comuna, idTheme,
Fax, Web, Contacto
FROM `core_sistemas`
WHERE idSistema = {$arrUsuario['idSistema']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

//verifico el tipo de usuario
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="idSistema>=0";	
}else{
	$z="idSistema={$arrUsuario['idSistema']}";	
}
?>
 
<div class="col-lg-9 fcenter">
	<div class="box dark">	
		<header>		
			<div class="icons"><i class="fa fa-edit"></i></div>		
			<h5>Modificar Datos de la empresa</h5>	
		</header>	
		<div id="div-1" class="body">	
			<form class="form-horizontal" method="post">	
			
				<?php 
				//Se verifican si existen los datos
				if(isset($Nombre)) {           $x1  = $Nombre;           }else{$x1  = $rowdata['Nombre'];}
				if(isset($Rut)) {              $x2  = $Rut;              }else{$x2  = $rowdata['Rut'];}
				if(isset($Ciudad)) {           $x3  = $Ciudad;           }else{$x3  = $rowdata['Ciudad'];}
				if(isset($Comuna)) {           $x4  = $Comuna;           }else{$x4  = $rowdata['Comuna'];}
				if(isset($Direccion)) {        $x5  = $Direccion;        }else{$x5  = $rowdata['Direccion'];}
				if(isset($Contacto)) {         $x6  = $Contacto;         }else{$x6  = $rowdata['Contacto'];}
				if(isset($Fono)) {             $x7  = $Fono;             }else{$x7  = $rowdata['Fono'];}
				if(isset($Fax)) {              $x8  = $Fax;              }else{$x8  = $rowdata['Fax'];}
				if(isset($Web)) {              $x9  = $Web;              }else{$x9  = $rowdata['Web'];}
				if(isset($email_principal)) {  $x10 = $email_principal;  }else{$x10 = $rowdata['email_principal'];}
				if(isset($idTheme)) {          $x11 = $idTheme;          }else{$x11 = $rowdata['idTheme'];}
	
				//se dibujan los inputs
				echo '<h3>Datos Basicos</h3>';
				echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
				echo form_input_icon('text', 'Rut', 'Rut', $x2, 2,'fa fa-exclamation-triangle');
				echo form_input_icon('text', 'Ciudad', 'Ciudad', $x3, 2,'fa fa-map');	
				echo form_input_icon('text', 'Comuna', 'Comuna', $x4, 2,'fa fa-map');	
				echo form_input_icon('text', 'Direccion', 'Direccion', $x5, 2,'fa fa-map');            
				
				echo '<h3>Datos de contacto</h3>';
				echo form_input('text', 'Nombre Contacto', 'Contacto', $x6, 1);
				echo form_input_phone('Fono', 'Fono', $x7, 1);
				echo form_input_fax('Fax', 'Fax', $x8, 1);
				echo form_input_icon('text', 'Web', 'Web', $x9, 1,'fa fa-internet-explorer');
				echo form_input_icon('text', 'Email', 'email_principal', $x10, 1,'fa fa-envelope-o');
				
				echo '<h3>Tema</h3>';
				echo form_select('Tema','idTheme', $x11, 2, 'idTheme', 'Nombre', 'core_theme_colors', 0, $dbConn);
								
				?>
						   
				<div class="form-group">
					<input type="hidden" name="idSistema" value="<?php echo $arrUsuario['idSistema'] ?>" >			
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
$query = "SELECT
core_sistemas.Nombre, 
core_sistemas.Rut, 
core_sistemas.Ciudad, 
core_sistemas.Comuna, 
core_sistemas.Direccion, 
core_sistemas.Contacto, 
core_sistemas.Fono, 
core_sistemas.Fax, 
core_sistemas.Web, 
core_sistemas.email_principal, 
core_theme_colors.Nombre AS NombreTema


FROM `core_sistemas`
LEFT JOIN `core_theme_colors`    ON core_theme_colors.idTheme     = core_sistemas.idTheme

WHERE core_sistemas.idSistema = {$arrUsuario['idSistema']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
?>


<div class="col-lg-8 fcenter">
	<div class="box">	
		<header>		
			<h5>Datos de la empresa</h5>		
			<div class="toolbar"></div>	
		</header>
        <div class="body">
			
			<h2 class="text-primary">Datos Basicos</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombre']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Ciudad : </strong><?php echo $rowdata['Ciudad']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['Comuna']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Direccion']; ?></p>
            
            
            <h2 class="text-primary">Datos de contacto</h2>
            <p class="text-muted"><strong>Nombre Contacto : </strong><?php echo $rowdata['Contacto']; ?></p>
            <p class="text-muted"><strong>Fono : </strong><?php echo $rowdata['Fono']; ?></p>
            <p class="text-muted"><strong>Fax : </strong><?php echo $rowdata['Fax']; ?></p>
            <p class="text-muted"><strong>Web : </strong><?php echo $rowdata['Web']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email_principal']; ?></p>
            
            
            
            <h2 class="text-primary">Tema Utilizado</h2>
            <p class="text-muted"><strong>Nombre tema : </strong><?php echo $rowdata['NombreTema']; ?></p>
            
            
            
	
     
        	
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location ?>&id=true" class="btn btn-primary" data-original-title="" title="">Editar Datos</a><?php } ?>
        </div></div>
</div>
              
<?php } ?>		<!-- InstanceEndEditable -->   
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
