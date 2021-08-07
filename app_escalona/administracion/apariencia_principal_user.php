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
$original = "apariencia_principal_user.php";
$location = $original;

/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//se edita un dato
if ( !empty($_GET['table']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'table';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/z_app_apariencia.php';	
}

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Modificar aspecto ventana bienvenida</title>
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
    <meta http-equiv="Expires" content="0" />
<meta http-equiv="Last-Modified" content="0" />
<meta http-equiv="Cache-Control" content="no-cache, must-revalidate" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="app_demo/css/estilo.css">
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
            <i class="fa fa-dashboard"></i> Modificar aspecto ventana bienvenida		
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
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Ventana de Bienvenida modificada correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php 
// Se traen todos los datos 
$query = "SELECT 
usr_img_border, 
usr_img_border_radius, 
usr_img_shadow, 
usr_img_width,
usr_name_lettersize,
usr_name_lettercolor,
usr_name_pat_lettersize,
usr_name_pat_lettercolor,
usr_name_pat_lettersize_2,
usr_name_pat_lettercolor_2
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los bordes de los contenedores
$arrBorder = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=25
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBorder,$row );
}
// Se trae un listado con todos los bordes redondeados
$arrBorder_radius = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=26
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBorder_radius,$row );
}
// Se trae un listado con todas las sombras
$arrSombras = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=31
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrSombras,$row );
}
// Se trae un listado con todos los tamaños de los contenedores
$arrAncho = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=23
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAncho,$row );
}
// Se trae un listado con todos los colores de los textos
$arrColoresTexto = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=29
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColoresTexto,$row );
}
// Se trae un listado con todos los tamaños de las letras
$arrSize = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=30
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrSize,$row );
}
?>

<div class="col-lg-8">
	<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion de la ventana de bienvenida</h5>	
	</header>
        
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">

	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="table_title">
            <th colspan="5">Tipo de Borde</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrBorder as $border) { ?>     
                <a href="<?php echo $location.'?table=usr_img_border&val='.$border['Codigo'].'&return1=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $border['Nombre']; ?>">
                <div class="box_preview <?php echo $border['Codigo']; ?><?php if($border['Codigo']==$rowdata['usr_img_border']){echo ' box_preview_active';} ?>"></div>
                </a>
            <?php } ?>    
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Bordes redondeados</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrBorder_radius as $radius) { ?>
            	<a href="<?php echo $location.'?table=usr_img_border_radius&val='.$radius['Codigo'].'&return1=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['usr_img_border_radius']==$radius['Codigo']){ echo 'minimal_selected';}?>"><?php echo $radius['Nombre']; ?></button>
                </a>
            <?php } ?> 
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Tipos de sombra</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrSombras as $sombras) { ?>     
                <a href="<?php echo $location.'?table=usr_img_shadow&val='.$sombras['Codigo'].'&return1=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $sombras['Nombre']; ?>">
                <div class="box_preview <?php echo $sombras['Codigo']; ?><?php if($sombras['Codigo']==$rowdata['usr_img_shadow']){echo ' box_preview_active';} ?>"></div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        

        
         <tr class="table_title">
            <th colspan="5">Tamaño contenedores</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrAncho as $content) { ?>
            	<a href="<?php echo $location.'?table=usr_img_width&val='.$content['Codigo'].'&return1=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['usr_img_width']==$content['Codigo']){ echo 'minimal_selected';}?>"><?php echo $content['Nombre']; ?></button>
                </a>
            <?php } ?> 
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Tamaño primera linea de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrSize as $size) { ?>     
              <a href="<?php echo $location.'?table=usr_name_lettersize&val='.$size['Codigo'].'&return1=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $size['Nombre']; ?>">
                <div class="box_preview <?php if($size['Codigo']==$rowdata['usr_name_lettersize']){echo ' box_preview_active';} ?>">
                <p class=""><strong><?php echo $size['Nombre']; ?></strong></p>
                </div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        
        
        <tr class="table_title">
            <th colspan="5">Color primera linea de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
              <a href="<?php echo $location.'?table=usr_name_lettercolor&val='.$textcolor['Codigo'].'&return1=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['usr_name_lettercolor']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        
        <tr class="table_title">
            <th colspan="5">Tamaño segunda linea de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrSize as $size) { ?>     
              <a href="<?php echo $location.'?table=usr_name_pat_lettersize&val='.$size['Codigo'].'&return1=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $size['Nombre']; ?>">
                <div class="box_preview <?php if($size['Codigo']==$rowdata['usr_name_pat_lettersize']){echo ' box_preview_active';} ?>">
                <p class=""><strong><?php echo $size['Nombre']; ?></strong></p>
                </div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        
        <tr class="table_title">
            <th colspan="5">Color segunda linea de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
              <a href="<?php echo $location.'?table=usr_name_pat_lettercolor&val='.$textcolor['Codigo'].'&return1=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['usr_name_pat_lettercolor']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        <tr class="table_title">
            <th colspan="5">Tamaño tercera linea de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrSize as $size) { ?>     
              <a href="<?php echo $location.'?table=usr_name_pat_lettersize_2&val='.$size['Codigo'].'&return1=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $size['Nombre']; ?>">
                <div class="box_preview <?php if($size['Codigo']==$rowdata['usr_name_pat_lettersize_2']){echo ' box_preview_active';} ?>">
                <p class=""><strong><?php echo $size['Nombre']; ?></strong></p>
                </div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        
        <tr class="table_title">
            <th colspan="5">Color tercera linea de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
              <a href="<?php echo $location.'?table=usr_name_pat_lettercolor_2&val='.$textcolor['Codigo'].'&return1=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['usr_name_pat_lettercolor_2']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
                </a>
                <?php } ?>
            </td>
   		</tr>

     </tbody>
</table>  
</div>
</div>
        
<div class="col-lg-4">
	<div class="box">	
		<header>		
			<h5>Preview</h5>		
			<div class="toolbar"></div>	
		</header>
		<div class="body">
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_3.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div>


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal.php?pagina=1&view=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
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