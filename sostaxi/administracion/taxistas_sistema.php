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
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
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
$original = "taxistas_sistema.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Si el estado esta distinto de vacio
if ( !empty($_POST['submit_edit']) ) {
	//Llamamos al formulario
	$form_obligatorios = 'idClient';
	$form_trabajo= 'update_data';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/taxista_sistema.php';
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
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Relacion editado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( !empty($_GET['id']) ) { 
//Obtengo los datos
$query = "SELECT ValorPlanBase, NumeroCarreras, ValorCarrera, Terminos, nombre_impuesto, porcentaje_impuesto, bloqueo_taxista
FROM `taxista_sistema`
WHERE idSistema = '1'";
$result = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc($result);
?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos del Clientes</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($idConductor)) {    $x1  = $idConductor;    }else{$x1  = $row_data[$_GET['id']];}

			//se dibujan los inputs
			echo form_input('text', 'Dato', 'idClient', $x1, 2);
			?>

            
			<div class="form-group">
            	<input type="hidden" name="idSistema" value="1" >
                <input type="hidden" name="table" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Obtengo los datos
$query = "SELECT ValorPlanBase, NumeroCarreras, ValorCarrera, Terminos, nombre_impuesto, porcentaje_impuesto, bloqueo_taxista
FROM `taxista_sistema`
WHERE idSistema = '1'";
$result = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc($result);
?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
</form>
</div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Clientes</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th colspan="2">Nombre Perfiles</th>
        <th width="120">Valores</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="odd">
			<td colspan="2">Valor Plan Base</td>
            <td><?php echo Valores_sd($row_data['ValorPlanBase']) ?></td>
			<td><?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'?id=ValorPlanBase' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?></td>
		</tr>
        
        
        <tr class="odd">
			<td colspan="2">Numero de carreras Minimas Diarias</td>
            <td><?php echo $row_data['NumeroCarreras'] ?></td>
			<td><?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'?id=NumeroCarreras' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?></td>
		</tr> 
        
        <tr class="odd">
			<td  colspan="2">Valores por carrera</td>
            <td><?php echo Valores_sd($row_data['ValorCarrera']) ?></td>
			<td><?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'?id=ValorCarrera' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?></td>
		</tr>
        
        <tr class="odd">
			<td>Terminos</td>
            <td colspan="2"><?php echo $row_data['Terminos'] ?></td>
			<td> <?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'?id=Terminos' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?></td>
		</tr>
        
        <tr class="odd">
			<td>Nombre Impuesto</td>
            <td colspan="2"><?php echo $row_data['nombre_impuesto'] ?></td>
			<td> <?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'?id=nombre_impuesto' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?></td>
		</tr>
        
        <tr class="odd">
			<td colspan="2">Porcentaje impuesto</td>
            <td><?php echo$row_data['porcentaje_impuesto'].' %' ?></td>
			<td> <?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'?id=porcentaje_impuesto' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?></td>
		</tr>
        
        <tr class="odd">
			<td colspan="2">Valor Bloqueo de taxista</td>
            <td><?php echo Valores_sd($row_data['bloqueo_taxista']) ?></td>
			<td> <?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'?id=bloqueo_taxista' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?></td>
		</tr>
        
        
                          
	</tbody>
</table>
  
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