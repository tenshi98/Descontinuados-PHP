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
$original = "apariencia_principal_botoncolor.php";
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
    <title>Personalizacion de botones</title>
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
            <i class="fa fa-dashboard"></i> Personalizacion de botones		
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
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Boton editado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
			
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($errors[5])) {echo $errors[5];}?>
<?php  if (isset($errors[6])) {echo $errors[6];}?>
<?php  if (isset($errors[7])) {echo $errors[7];}?>
<?php  if (isset($errors[8])) {echo $errors[8];}?>
<?php  if (isset($errors[9])) {echo $errors[9];}?>
<?php  if (isset($errors[10])) {echo $errors[10];}?>
<?php  if (isset($errors[11])) {echo $errors[11];}?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  Boton modificado correctamente
<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">	<i class="fa fa-times"></i></a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['enlace']) ) {
// Se traen todos los datos 
$query = "SELECT 
btn_enlace_color_fondo, 
btn_enlace_ancho, 
btn_enlace_border,
btn_enlace_radio, 
btn_enlace_float,
btn_enlace_color_texto,
btn_enlace_sombra
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los colores de los botones
$arrColoresFondo = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=27
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
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion Boton Enlace</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">

	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="table_title">
            <th colspan="5">Tamaño boton</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrAncho as $ancho) { ?>
            	<a href="<?php echo $location.'?table=btn_enlace_ancho&val='.$ancho['Codigo'].'&return1=enlace&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['btn_enlace_ancho']==$ancho['Codigo']){ echo 'minimal_selected';}?>"><?php echo $ancho['Nombre']; ?></button>
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
            	<a href="<?php echo $location.'?table=btn_enlace_radio&val='.$border['Codigo'].'&return1=enlace&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['btn_enlace_radio']==$border['Codigo']){ echo 'minimal_selected';}?>"><?php echo $border['Nombre']; ?></button>
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
                <a href="<?php echo $location.'?table=btn_enlace_border&val='.$border['Codigo'].'&return1=enlace&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $border['Nombre']; ?>">
                <div class="box_preview <?php echo $border['Codigo']; ?><?php if($border['Codigo']==$rowdata['btn_enlace_border']){echo ' box_preview_active';} ?>"></div>
                </a>
            <?php } ?>    
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Alineamiento</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            	<a href="<?php echo $location.'?table=btn_enlace_float&val=fleft&return1=enlace&return2=mod&app_conf='.$_GET['app_conf']; ?>"title="Izquierda" >
                	<div class="box_preview <?php if($rowdata['btn_enlace_float']=='fleft'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-left"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_enlace_float&val=fright&return1=enlace&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Derecha">
                	<div class="box_preview <?php if($rowdata['btn_enlace_float']=='fright'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-right"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_enlace_float&val=fcenter&return1=enlace&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Centro">
                	<div class="box_preview <?php if($rowdata['btn_enlace_float']=='fcenter'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-center"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_enlace_float&val=fnone&return1=enlace&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Ninguna">
                	<div class="box_preview <?php if($rowdata['btn_enlace_float']=='fnone'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-justify"></i>
                    </div>
                </a> 
            </td>
        </tr>

        <tr class="table_title">
            <th colspan="5">Colores de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
              <a href="<?php echo $location.'?table=btn_enlace_color_texto&val='.$textcolor['Codigo'].'&return1=enlace&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['btn_enlace_color_texto']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
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
                <a href="<?php echo $location.'?table=btn_enlace_sombra&val='.$sombras['Codigo'].'&return1=enlace&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $sombras['Nombre']; ?>">
                <div class="box_preview <?php echo $sombras['Codigo']; ?><?php if($sombras['Codigo']==$rowdata['btn_enlace_sombra']){echo ' box_preview_active';} ?>"></div>
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
                <a href="<?php echo $location.'?table=btn_enlace_color_fondo&val='.$colores['Codigo'].'&return1=enlace&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $colores['Nombre']; ?>">
                <div class="box_preview <?php echo $colores['Codigo']; ?><?php if($colores['Codigo']==$rowdata['btn_enlace_color_fondo']){echo ' box_preview_active';} ?>"></div>
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
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_2a.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_botoncolor.php?app_conf=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['aceptar']) ) {
// Se traen todos los datos 
$query = "SELECT 
btn_aceptar_color_fondo, 
btn_aceptar_ancho, 
btn_aceptar_border,
btn_aceptar_radio, 
btn_aceptar_float,
btn_aceptar_color_texto,
btn_aceptar_sombra
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los colores de los botones
$arrColoresFondo = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=27
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
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion Boton Enlace</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">

	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="table_title">
            <th colspan="5">Tamaño boton</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrAncho as $ancho) { ?>
            	<a href="<?php echo $location.'?table=btn_aceptar_ancho&val='.$ancho['Codigo'].'&return1=aceptar&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['btn_aceptar_ancho']==$ancho['Codigo']){ echo 'minimal_selected';}?>"><?php echo $ancho['Nombre']; ?></button>
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
            	<a href="<?php echo $location.'?table=btn_aceptar_radio&val='.$border['Codigo'].'&return1=aceptar&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['btn_aceptar_radio']==$border['Codigo']){ echo 'minimal_selected';}?>"><?php echo $border['Nombre']; ?></button>
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
                <a href="<?php echo $location.'?table=btn_aceptar_border&val='.$border['Codigo'].'&return1=aceptar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $border['Nombre']; ?>">
                <div class="box_preview <?php echo $border['Codigo']; ?><?php if($border['Codigo']==$rowdata['btn_aceptar_border']){echo ' box_preview_active';} ?>"></div>
                </a>
            <?php } ?>    
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Alineamiento</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
                <a href="<?php echo $location.'?table=btn_aceptar_float&val=fleft&return1=aceptar&return2=mod&app_conf='.$_GET['app_conf']; ?>"title="Izquierda" >
                	<div class="box_preview <?php if($rowdata['btn_aceptar_float']=='fleft'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-left"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_aceptar_float&val=fright&return1=aceptar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Derecha">
                	<div class="box_preview <?php if($rowdata['btn_aceptar_float']=='fright'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-right"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_aceptar_float&val=fcenter&return1=aceptar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Centro">
                	<div class="box_preview <?php if($rowdata['btn_aceptar_float']=='fcenter'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-center"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_aceptar_float&val=fnone&return1=aceptar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Ninguna">
                	<div class="box_preview <?php if($rowdata['btn_aceptar_float']=='fnone'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-justify"></i>
                    </div>
                </a>
            </td>
        </tr>

        <tr class="table_title">
            <th colspan="5">Colores de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
             <a href="<?php echo $location.'?table=btn_aceptar_color_texto&val='.$textcolor['Codigo'].'&return1=aceptar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['btn_aceptar_color_texto']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
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
                <a href="<?php echo $location.'?table=btn_aceptar_sombra&val='.$sombras['Codigo'].'&return1=aceptar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $sombras['Nombre']; ?>">
                <div class="box_preview <?php echo $sombras['Codigo']; ?><?php if($sombras['Codigo']==$rowdata['btn_aceptar_sombra']){echo ' box_preview_active';} ?>"></div>
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
                <a href="<?php echo $location.'?table=btn_aceptar_color_fondo&val='.$colores['Codigo'].'&return1=aceptar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $colores['Nombre']; ?>">
                <div class="box_preview <?php echo $colores['Codigo']; ?><?php if($colores['Codigo']==$rowdata['btn_aceptar_color_fondo']){echo ' box_preview_active';} ?>"></div>
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
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_2b.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_botoncolor.php?app_conf=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['cancelar']) ) {
// Se traen todos los datos 
$query = "SELECT 
btn_cancelar_color_fondo, 
btn_cancelar_ancho,
btn_cancelar_border, 
btn_cancelar_radio, 
btn_cancelar_float,
btn_cancelar_color_texto,
btn_cancelar_sombra
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los colores de los botones
$arrColoresFondo = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=27
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
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion Boton Enlace</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">

	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="table_title">
            <th colspan="5">Tamaño boton</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrAncho as $ancho) { ?>
            	<a href="<?php echo $location.'?table=btn_cancelar_ancho&val='.$ancho['Codigo'].'&return1=cancelar&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['btn_cancelar_ancho']==$ancho['Codigo']){ echo 'minimal_selected';}?>"><?php echo $ancho['Nombre']; ?></button>
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
            	<a href="<?php echo $location.'?table=btn_cancelar_radio&val='.$border['Codigo'].'&return1=cancelar&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['btn_cancelar_radio']==$border['Codigo']){ echo 'minimal_selected';}?>"><?php echo $border['Nombre']; ?></button>
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
                <a href="<?php echo $location.'?table=btn_cancelar_border&val='.$border['Codigo'].'&return1=cancelar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $border['Nombre']; ?>">
                <div class="box_preview <?php echo $border['Codigo']; ?><?php if($border['Codigo']==$rowdata['btn_cancelar_border']){echo ' box_preview_active';} ?>"></div>
                </a>
            <?php } ?>    
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Alineamiento</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            	<a href="<?php echo $location.'?table=btn_cancelar_float&val=fleft&return1=cancelar&return2=mod&app_conf='.$_GET['app_conf']; ?>"title="Izquierda" >
                	<div class="box_preview <?php if($rowdata['btn_cancelar_float']=='fleft'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-left"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_cancelar_float&val=fright&return1=cancelar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Derecha">
                	<div class="box_preview <?php if($rowdata['btn_cancelar_float']=='fright'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-right"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_cancelar_float&val=fcenter&return1=cancelar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Centro">
                	<div class="box_preview <?php if($rowdata['btn_cancelar_float']=='fcenter'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-center"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_cancelar_float&val=fnone&return1=cancelar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Ninguna">
                	<div class="box_preview <?php if($rowdata['btn_cancelar_float']=='fnone'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-justify"></i>
                    </div>
                </a> 
            </td>
        </tr>
	<tr class="table_title">
            <th colspan="5">Colores de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
          <a href="<?php echo $location.'?table=btn_cancelar_color_texto&val='.$textcolor['Codigo'].'&return1=cancelar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['btn_cancelar_color_texto']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
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
                <a href="<?php echo $location.'?table=btn_cancelar_sombra&val='.$sombras['Codigo'].'&return1=cancelar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $sombras['Nombre']; ?>">
                <div class="box_preview <?php echo $sombras['Codigo']; ?><?php if($sombras['Codigo']==$rowdata['btn_cancelar_sombra']){echo ' box_preview_active';} ?>"></div>
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
              <a href="<?php echo $location.'?table=btn_cancelar_color_fondo&val='.$colores['Codigo'].'&return1=cancelar&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $colores['Nombre']; ?>">
                <div class="box_preview <?php echo $colores['Codigo']; ?><?php if($colores['Codigo']==$rowdata['btn_cancelar_color_fondo']){echo ' box_preview_active';} ?>"></div>
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
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_2c.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_botoncolor.php?app_conf=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['otros']) ) {
// Se traen todos los datos 
$query = "SELECT 
btn_otros_color_fondo, 
btn_otros_ancho, 
btn_otros_border, 
btn_otros_radio, 
btn_otros_float,
btn_otros_color_texto,
btn_otros_sombra
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['app_conf']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los colores de los botones
$arrColoresFondo = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=27
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
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion Boton Enlace</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">

	<tbody role="alert" aria-live="polite" aria-relevant="all">
    	<tr class="table_title">
            <th colspan="5">Tamaño boton</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            <?php foreach ($arrAncho as $ancho) { ?>
            	<a href="<?php echo $location.'?table=btn_otros_ancho&val='.$ancho['Codigo'].'&return1=otros&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['btn_otros_ancho']==$ancho['Codigo']){ echo 'minimal_selected';}?>"><?php echo $ancho['Nombre']; ?></button>
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
            	<a href="<?php echo $location.'?table=btn_otros_radio&val='.$border['Codigo'].'&return1=otros&return2=mod&app_conf='.$_GET['app_conf']; ?>" >
                	<button class="minimal <?php if($rowdata['btn_otros_radio']==$border['Codigo']){ echo 'minimal_selected';}?>"><?php echo $border['Nombre']; ?></button>
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
                <a href="<?php echo $location.'?table=btn_otros_border&val='.$border['Codigo'].'&return1=otros&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $border['Nombre']; ?>">
                <div class="box_preview <?php echo $border['Codigo']; ?><?php if($border['Codigo']==$rowdata['btn_otros_border']){echo ' box_preview_active';} ?>"></div>
                </a>
            <?php } ?>    
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Alineamiento</th>
        </tr>
        <tr class="odd">
        	<td colspan="5">
            	<a href="<?php echo $location.'?table=btn_otros_float&val=fleft&return1=otros&return2=mod&app_conf='.$_GET['app_conf']; ?>"title="Izquierda" >
                	<div class="box_preview <?php if($rowdata['btn_otros_float']=='fleft'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-left"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_otros_float&val=fright&return1=otros&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Derecha">
                	<div class="box_preview <?php if($rowdata['btn_otros_float']=='fright'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-right"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_otros_float&val=fcenter&return1=otros&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Centro">
                	<div class="box_preview <?php if($rowdata['btn_otros_float']=='fcenter'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-center"></i>
                    </div>
                </a>
                <a href="<?php echo $location.'?table=btn_otros_float&val=fnone&return1=otros&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="Ninguna">
                	<div class="box_preview <?php if($rowdata['btn_otros_float']=='fnone'){echo ' box_preview_active';} ?>">
                    	<i class="fa fa-align-justify"></i>
                    </div>
                </a>
            </td>
        </tr>
        
        <tr class="table_title">
            <th colspan="5">Colores de texto</th>
        </tr>
        <tr class="odd">
            <td colspan="5">
                <?php foreach ($arrColoresTexto as $textcolor) { ?>     
              <a href="<?php echo $location.'?table=btn_otros_color_texto&val='.$textcolor['Codigo'].'&return1=otros&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $textcolor['Nombre']; ?>">
                <div class="box_preview <?php if($textcolor['Codigo']==$rowdata['btn_otros_color_texto']){echo ' box_preview_active';} ?>">
                <p class="<?php echo $textcolor['Codigo']; ?>"><strong>A</strong></p>
                </div>
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
                <a href="<?php echo $location.'?table=btn_otros_sombra&val='.$sombras['Codigo'].'&return1=otros&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $sombras['Nombre']; ?>">
                <div class="box_preview <?php echo $sombras['Codigo']; ?><?php if($sombras['Codigo']==$rowdata['btn_otros_sombra']){echo ' box_preview_active';} ?>"></div>
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
                <a href="<?php echo $location.'?table=btn_otros_color_fondo&val='.$colores['Codigo'].'&return1=otros&return2=mod&app_conf='.$_GET['app_conf']; ?>" title="<?php echo $colores['Nombre']; ?>">
                <div class="box_preview <?php echo $colores['Codigo']; ?><?php if($colores['Codigo']==$rowdata['btn_otros_color_fondo']){echo ' box_preview_active';} ?>"></div>
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
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_2d.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_botoncolor.php?app_conf=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
 
  
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else {?>
<div class="col-lg-8">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Colores de los botones</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
		<tr role="row">
			<th width="">Nombre</th>
			<th width="120">Acciones</th>
		</tr>
	</thead>
	<tbody role="alert" aria-live="polite" aria-relevant="all">
  
    	<tr class="odd">		<td class=" ">Enlace</td>		<td class=" "><a href="<?php echo $location.'?app_conf='.$_GET['app_conf'].'&enlace=true' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a></td>	</tr>
        <tr class="odd">		<td class=" ">Aceptar</td>		<td class=" "><a href="<?php echo $location.'?app_conf='.$_GET['app_conf'].'&aceptar=true' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a></td>	</tr>
        <tr class="odd">		<td class=" ">Cancelar</td>		<td class=" "><a href="<?php echo $location.'?app_conf='.$_GET['app_conf'].'&cancelar=true' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a></td>	</tr>
        <tr class="odd">		<td class=" ">Otros</td>		<td class=" "><a href="<?php echo $location.'?app_conf='.$_GET['app_conf'].'&otros=true' ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a></td>	</tr>
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
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_2.php?app_conf=<?php echo $_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal.php?pagina=1&view=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
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