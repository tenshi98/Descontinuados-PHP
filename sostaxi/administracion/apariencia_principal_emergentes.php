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
$original = "apariencia_principal_emergentes.php";
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
    <title>Personalizacion de colores mensajes emergentes</title>
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
            <i class="fa fa-dashboard"></i> Personalizacion de colores mensajes emergentes		
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
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/ Mensaje emergente modificado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['error']) ) {
// Se traen todos los datos 
$query = "SELECT 
msg_error_color_body, 
msg_error_color_text, 
msg_error_width, 
msg_error_border,
msg_error_border_color
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los colores de los botones
$arrColoresFondo = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=28
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColoresFondo,$row );
}
// Se trae un listado con todos los tamaños
$arrAncho = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=23
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAncho,$row );
}
// Se trae un listado con todos los bordes redondeados
$arrBorde = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=26
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBorde,$row );
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
?>

<div class="col-lg-8">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion de los mensajes de error</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">

	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="table_title">
            <th colspan="5">Tamaño del mensaje</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrAncho as $ancho) { ?>
            	<a href="<?php echo $location.'?table=msg_error_width&val='.$ancho['Codigo'].'&return1=error&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['msg_error_width']==$ancho['Codigo']){ echo 'minimal_selected';}?>"><?php echo $ancho['Nombre']; ?></button>
                </a>
            <?php } ?> 
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Bordes redondeados</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrBorde as $border) { ?>
            	<a href="<?php echo $location.'?table=msg_error_border&val='.$border['Codigo'].'&return1=error&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['msg_error_border']==$border['Codigo']){ echo 'minimal_selected';}?>"><?php echo $border['Nombre']; ?></button>
                </a>
            <?php } ?> 
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Colores de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
              <a href="<?php echo $location.'?table=msg_error_color_text&val='.$textcolor['Codigo'].'&return1=error&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['msg_error_color_text']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        

        <tr class="table_title">
            <th colspan="5">Colores de fondo</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresFondo as $colores) { ?>     
                <a href="<?php echo $location.'?table=msg_error_color_body&val='.$colores['Codigo'].'&return1=error&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $colores['Nombre']; ?>">
                <div class="box_preview <?php echo $colores['Codigo']; ?><?php if($colores['Codigo']==$rowdata['msg_error_color_body']){echo ' box_preview_active';} ?>"></div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        <tr class="table_title">
            <th colspan="5">Tipo de Borde</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrBorder as $border) { ?>     
                <a href="<?php echo $location.'?table=msg_error_border_color&val='.$border['Codigo'].'&return1=error&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $border['Nombre']; ?>">
                <div class="box_preview <?php echo $border['Codigo']; ?><?php if($border['Codigo']==$rowdata['msg_error_border_color']){echo ' box_preview_active';} ?>"></div>
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
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_9a.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_emergentes.php?app_conf=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['alert']) ) {
// Se traen todos los datos 
$query = "SELECT 
msg_alert_color_body, 
msg_alert_color_text, 
msg_alert_width, 
msg_alert_border,
msg_alert_border_color
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los colores de los botones
$arrColoresFondo = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=28
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColoresFondo,$row );
}
// Se trae un listado con todos los tamaños
$arrAncho = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=23
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAncho,$row );
}
// Se trae un listado con todos los bordes redondeados
$arrBorde = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=26
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBorde,$row );
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
?>

<div class="col-lg-8">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion de los mensajes de alerta</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">

	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="table_title">
            <th colspan="5">Tamaño del mensaje</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrAncho as $ancho) { ?>
            	<a href="<?php echo $location.'?table=msg_alert_width&val='.$ancho['Codigo'].'&return1=alert&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['msg_alert_width']==$ancho['Codigo']){ echo 'minimal_selected';}?>"><?php echo $ancho['Nombre']; ?></button>
                </a>
            <?php } ?> 
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Bordes redondeados</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrBorde as $border) { ?>
            	<a href="<?php echo $location.'?table=msg_alert_border&val='.$border['Codigo'].'&return1=alert&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['msg_alert_border']==$border['Codigo']){ echo 'minimal_selected';}?>"><?php echo $border['Nombre']; ?></button>
                </a>
            <?php } ?> 
            </td>
        </tr>

  
        
        <tr class="table_title">
            <th colspan="5">Colores de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
              <a href="<?php echo $location.'?table=msg_alert_color_text&val='.$textcolor['Codigo'].'&return1=alert&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['msg_alert_color_text']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        <tr class="table_title">
            <th colspan="5">Colores de fondo</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresFondo as $colores) { ?>     
                <a href="<?php echo $location.'?table=msg_alert_color_body&val='.$colores['Codigo'].'&return1=alert&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $colores['Nombre']; ?>">
                <div class="box_preview <?php echo $colores['Codigo']; ?><?php if($colores['Codigo']==$rowdata['msg_alert_color_body']){echo ' box_preview_active';} ?>"></div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        <tr class="table_title">
            <th colspan="5">Tipo de Borde</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrBorder as $border) { ?>     
                <a href="<?php echo $location.'?table=msg_alert_border_color&val='.$border['Codigo'].'&return1=alert&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $border['Nombre']; ?>">
                <div class="box_preview <?php echo $border['Codigo']; ?><?php if($border['Codigo']==$rowdata['msg_alert_border_color']){echo ' box_preview_active';} ?>"></div>
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
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_9b.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_emergentes.php?app_conf=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['success']) ) {
// Se traen todos los datos 
$query = "SELECT 
msg_success_color_body, 
msg_success_color_text, 
msg_success_width, 
msg_success_border,
msg_success_border_color
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los colores de los botones
$arrColoresFondo = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=28
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColoresFondo,$row );
}
// Se trae un listado con todos los tamaños
$arrAncho = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=23
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAncho,$row );
}
// Se trae un listado con todos los bordes redondeados
$arrBorde = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=26
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBorde,$row );
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
?>

<div class="col-lg-8"><div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion de los mensajes correcto</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">

	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="table_title">
            <th colspan="5">Tamaño del mensaje</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrAncho as $ancho) { ?>
            	<a href="<?php echo $location.'?table=msg_success_width&val='.$ancho['Codigo'].'&return1=success&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['msg_success_width']==$ancho['Codigo']){ echo 'minimal_selected';}?>"><?php echo $ancho['Nombre']; ?></button>
                </a>
            <?php } ?> 
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Bordes redondeados</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrBorde as $border) { ?>
            	<a href="<?php echo $location.'?table=msg_success_border&val='.$border['Codigo'].'&return1=success&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['msg_success_border']==$border['Codigo']){ echo 'minimal_selected';}?>"><?php echo $border['Nombre']; ?></button>
                </a>
            <?php } ?> 
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Colores de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
              <a href="<?php echo $location.'?table=msg_success_color_text&val='.$textcolor['Codigo'].'&return1=success&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['msg_success_color_text']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        <tr class="table_title">
            <th colspan="5">Colores de fondo</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresFondo as $colores) { ?>     
                <a href="<?php echo $location.'?table=msg_success_color_body&val='.$colores['Codigo'].'&return1=success&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $colores['Nombre']; ?>">
                <div class="box_preview <?php echo $colores['Codigo']; ?><?php if($colores['Codigo']==$rowdata['msg_success_color_body']){echo ' box_preview_active';} ?>"></div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        <tr class="table_title">
            <th colspan="5">Tipo de Borde</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrBorder as $border) { ?>     
                <a href="<?php echo $location.'?table=msg_success_border_color&val='.$border['Codigo'].'&return1=success&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $border['Nombre']; ?>">
                <div class="box_preview <?php echo $border['Codigo']; ?><?php if($border['Codigo']==$rowdata['msg_success_border_color']){echo ' box_preview_active';} ?>"></div>
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
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_9c.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_emergentes.php?app_conf=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['info']) ) {
// Se traen todos los datos 
$query = "SELECT 
msg_info_color_body, 
msg_info_color_text, 
msg_info_width, 
msg_info_border,
msg_info_border_color
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los colores de los botones
$arrColoresFondo = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=28
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColoresFondo,$row );
}
// Se trae un listado con todos los tamaños
$arrAncho = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=23
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAncho,$row );
}
// Se trae un listado con todos los bordes redondeados
$arrBorde = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=26
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBorde,$row );
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
?>

<div class="col-lg-8">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion de los mensajes de informacion</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">

	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="table_title">
            <th colspan="5">Tamaño del mensaje</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrAncho as $ancho) { ?>
            	<a href="<?php echo $location.'?table=msg_info_width&val='.$ancho['Codigo'].'&return1=info&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['msg_info_width']==$ancho['Codigo']){ echo 'minimal_selected';}?>"><?php echo $ancho['Nombre']; ?></button>
                </a>
            <?php } ?> 
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Bordes redondeados</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrBorde as $border) { ?>
            	<a href="<?php echo $location.'?table=msg_info_border&val='.$border['Codigo'].'&return1=info&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['msg_info_border']==$border['Codigo']){ echo 'minimal_selected';}?>"><?php echo $border['Nombre']; ?></button>
                </a>
            <?php } ?> 
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Colores de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
              <a href="<?php echo $location.'?table=msg_info_color_text&val='.$textcolor['Codigo'].'&return1=info&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['msg_info_color_text']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        <tr class="table_title">
            <th colspan="5">Colores de fondo</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresFondo as $colores) { ?>     
                <a href="<?php echo $location.'?table=msg_info_color_body&val='.$colores['Codigo'].'&return1=info&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $colores['Nombre']; ?>">
                <div class="box_preview <?php echo $colores['Codigo']; ?><?php if($colores['Codigo']==$rowdata['msg_info_color_body']){echo ' box_preview_active';} ?>"></div>
                </a>
                <?php } ?>
            </td>
   		</tr>
        
        <tr class="table_title">
            <th colspan="5">Tipo de Borde</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrBorder as $border) { ?>     
                <a href="<?php echo $location.'?table=msg_info_border_color&val='.$border['Codigo'].'&return1=info&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $border['Nombre']; ?>">
                <div class="box_preview <?php echo $border['Codigo']; ?><?php if($border['Codigo']==$rowdata['msg_info_border_color']){echo ' box_preview_active';} ?>"></div>
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
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_9d.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_emergentes.php?app_conf=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else {?>
<div class="col-lg-8">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de tipos de Mensaje</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
		<tr role="row">
			<th width="">Nombre</th>
			<th width="120">Acciones</th>
		</tr>
	</thead>
	<tbody role="alert" aria-live="polite" aria-relevant="all"> 
    	<tr class="odd">		<td class=" ">Mensajes de error</td>		<td class=" "><a href="<?php echo $location.'?app_conf='.$_GET['app_conf'].'&error=true' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a></td>	</tr>
        <tr class="odd">		<td class=" ">Mensajes de alerta</td>		<td class=" "><a href="<?php echo $location.'?app_conf='.$_GET['app_conf'].'&alert=true' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a></td>	</tr>
        <tr class="odd">		<td class=" ">Mensajes de exito</td>		<td class=" "><a href="<?php echo $location.'?app_conf='.$_GET['app_conf'].'&success=true' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a></td>	</tr>
        <tr class="odd">		<td class=" ">Mensajes de informacion</td>  <td class=" "><a href="<?php echo $location.'?app_conf='.$_GET['app_conf'].'&info=true' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a></td>	</tr>
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
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_9.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal.php?pagina=1&view=<?php echo $_GET['app_conf']?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
 <?php }?>


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