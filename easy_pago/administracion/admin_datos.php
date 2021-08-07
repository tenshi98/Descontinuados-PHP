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
	$form_obligatorios = 'idSistema,Nombre,Rubro,Rut,Ciudad,Comuna,Direccion,NombreContrato,NContrato,FContrato,DContrato,idTheme,Bodega_OT';
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
              <a href="principal.php" class="navbar-brand">
                <?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?>
					<img src="upload/<?php echo $arrUsuario['imgLogo']; ?>" alt="">
				<?php }else{?>
					<img src="img/logo_default.png" alt="">
				<?php } ?>
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
Fax, Web, Rubro, Contacto, NombreContrato,NContrato,FContrato,DContrato, Bodega_OT
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
				if(isset($Rubro)) {            $x2  = $Rubro;            }else{$x2  = $rowdata['Rubro'];}
				if(isset($Rut)) {              $x3  = $Rut;              }else{$x3  = $rowdata['Rut'];}
				if(isset($Ciudad)) {           $x4  = $Ciudad;           }else{$x4  = $rowdata['Ciudad'];}
				if(isset($Comuna)) {           $x5  = $Comuna;           }else{$x5  = $rowdata['Comuna'];}
				if(isset($Direccion)) {        $x6  = $Direccion;        }else{$x6  = $rowdata['Direccion'];}
				if(isset($Contacto)) {         $x7  = $Contacto;         }else{$x7  = $rowdata['Contacto'];}
				if(isset($Fono)) {             $x8  = $Fono;             }else{$x8  = $rowdata['Fono'];}
				if(isset($Fax)) {              $x9  = $Fax;              }else{$x9  = $rowdata['Fax'];}
				if(isset($Web)) {              $x10 = $Web;              }else{$x10 = $rowdata['Web'];}
				if(isset($email_principal)) {  $x11 = $email_principal;  }else{$x11 = $rowdata['email_principal'];}
				if(isset($NombreContrato)) {   $x12 = $NombreContrato;   }else{$x12 = $rowdata['NombreContrato'];}
				if(isset($NContrato)) {        $x13 = $NContrato;        }else{$x13 = $rowdata['NContrato'];}
				if(isset($FContrato)) {        $x14 = $FContrato;        }else{$x14 = $rowdata['FContrato'];}
				if(isset($DContrato)) {        $x15 = $DContrato;        }else{$x15 = $rowdata['DContrato'];}
				if(isset($Bodega_OT)) {        $x16 = $Bodega_OT;        }else{$x16 = $rowdata['Bodega_OT'];}
				if(isset($idTheme)) {          $x17 = $idTheme;          }else{$x17 = $rowdata['idTheme'];}
	
				//se dibujan los inputs
				echo '<h3>Datos Basicos</h3>';
				echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
				echo form_input('text', 'Rubro', 'Rubro', $x2, 2);
				echo form_input_icon('text', 'Rut', 'Rut', $x3, 2,'fa fa-exclamation-triangle');
				echo form_input_icon('text', 'Ciudad', 'Ciudad', $x4, 2,'fa fa-map');	
				echo form_input_icon('text', 'Comuna', 'Comuna', $x5, 2,'fa fa-map');	
				echo form_input_icon('text', 'Direccion', 'Direccion', $x6, 2,'fa fa-map');
				
				
				echo '<h3>Datos de contacto</h3>';
				echo form_input('text', 'Nombre Contacto', 'Contacto', $x7, 1);
				echo form_input_phone('Fono','Fono', $x8, 1);
				echo form_input_fax('Fax','Fax', $x9, 1);
				echo form_input_icon('text', 'Web', 'Web', $x10, 1,'fa fa-internet-explorer');
				echo form_input_icon('text', 'Email', 'email_principal', $x11, 2,'fa fa-envelope-o');
			
			
				
				echo '<h3>Contrato</h3>';
				echo form_input('text', 'Nombre Contrato', 'NombreContrato', $x12, 2);
				echo form_input('text', 'Numero de Contrato', 'NContrato', $x13, 2);
				echo form_date('Fecha inicio Contrato','FContrato', $x14, 1);
				echo form_select_n_auto('Duracion Contrato(Meses)','DContrato', $x15, 2, 1, 72);

				echo '<h3>Bodega para las Ordenes de Trabajo</h3>';
				echo form_select('Bodega','Bodega_OT', $x16, 2, 'idBodega', 'Nombre', 'bodegas_listado', $z, $dbConn);
				
				echo '<h3>Tema</h3>';
				echo form_select('Tema','idTheme', $x17, 2, 'idTheme', 'Nombre', 'core_theme_colors', 0, $dbConn);
								
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
core_sistemas.Rubro, 
core_sistemas.Rut, 
core_sistemas.Ciudad, 
core_sistemas.Comuna, 
core_sistemas.Direccion, 
core_sistemas.Contacto, 
core_sistemas.Fono, 
core_sistemas.Fax, 
core_sistemas.Web, 
core_sistemas.email_principal, 
core_sistemas.NombreContrato, 
core_sistemas.NContrato, 
core_sistemas.FContrato, 
core_sistemas.DContrato,
bodegas_listado.Nombre AS NombreBodega


FROM `core_sistemas`
LEFT JOIN `bodegas_listado` ON bodegas_listado.idBodega = core_sistemas.Bodega_OT

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
            <p class="text-muted"><strong>Rubro : </strong><?php echo $rowdata['Rubro']; ?></p>
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
            
            <h2 class="text-primary">Contrato</h2>
            <p class="text-muted"><strong>Nombre Contrato : </strong><?php echo $rowdata['NombreContrato']; ?></p>
            <p class="text-muted"><strong>Numero de Contrato : </strong><?php echo $rowdata['NContrato']; ?></p>
            <p class="text-muted"><strong>Fecha inicio Contrato : </strong><?php echo $rowdata['FContrato']; ?></p>
            <p class="text-muted"><strong>Duracion Contrato(Meses) : </strong><?php echo $rowdata['DContrato']; ?></p>
			
			<h2 class="text-primary">Bodega utilizada en las Ordenes de Trabajo</h2>
            <p class="text-muted"><strong>Nombre Bodega : </strong><?php echo $rowdata['NombreBodega']; ?></p>
	
     
        	
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location ?>&id=true" class="btn btn-primary" data-original-title="" title="">Editar Datos</a><?php } ?>
        </div></div>
</div>
              
<?php } ?>		<!-- InstanceEndEditable -->   
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
