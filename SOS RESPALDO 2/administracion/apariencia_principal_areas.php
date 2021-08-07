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
$original = "apariencia_principal_areas.php";
$location = $original;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 
	//Se consiguen las variables 
	$location.='?create=true';
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/app_areas_pagelist.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/app_areas_pagelist_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/app_areas_pagelist.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit']) )  { 
	//Se consiguen las variables 
	$location.='?mod=true';
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/app_areas_pagelist.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/app_areas_pagelist_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/app_areas_pagelist.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Se consiguen las variables
	$location.='?delete=true';
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/del_app_areas_pagelist.php';
}





//formulario para crear usuario
if ( !empty($_POST['submit_grilla']) )  { 
	//Se consiguen las variables 
	$location.='?view='.$_GET['view'];
	$location.='&create=true';
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/app_areas_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/app_areas_listado_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/app_areas_listado.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit_grilla']) )  { 
	//Se consiguen las variables 
	$location.='?view='.$_GET['view'];
	$location.='&mod=true';
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/app_areas_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/app_areas_listado_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/app_areas_listado.php';
}
//se borra un dato
if ( !empty($_GET['del_grilla']) )     {
	//Se consiguen las variables
	$location.='?view='.$_GET['view'];
	$location.='&delete=true';
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/del_app_areas_listado.php';
}
//se sube de nivel un dato
if ( !empty($_GET['up_grilla']) )     {
	$location.='?view='.$_GET['view'];
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/app_areas_listado_1.php';
}
//se baja de nivel un dato
if ( !empty($_GET['down_grilla']) )     {
	$location.='?view='.$_GET['view'];
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/app_areas_listado_2.php';
}



//formulario para crear usuario
if ( !empty($_POST['submit_elemento']) )  { 
	//Se consiguen las variables 
	$location.='?view='.$_GET['view'];
	$location.='&viewgrilla='.$_GET['viewgrilla'];
	$location.='&tipo='.$_GET['tipo'];
	$location.='&create=true';
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/app_areas_elementos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/app_areas_elementos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/app_areas_elementos.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit_elemento']) )  { 
	//Se consiguen las variables 
	$location.='?view='.$_GET['view'];
	$location.='&viewgrilla='.$_GET['viewgrilla'];
	$location.='&tipo='.$_GET['tipo'];
	$location.='&mod=true';
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/app_areas_elementos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/app_areas_elementos_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/app_areas_elementos.php';
}
//se borra un dato
if ( !empty($_GET['del_elemento']) )     {
	//Se consiguen las variables
	$location.='?view='.$_GET['view'];
	$location.='&viewgrilla='.$_GET['viewgrilla'];
	$location.='&tipo='.$_GET['tipo'];
	$location.='&delete=true';
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/app_areas_elementos.php';
}
//se sube de nivel un dato
if ( !empty($_GET['up_elemento']) )     {
	$location.='?view='.$_GET['view'];
	$location.='&viewgrilla='.$_GET['viewgrilla'];
	$location.='&tipo='.$_GET['tipo'];
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/app_areas_elementos_1.php';
}
//se baja de nivel un dato
if ( !empty($_GET['down_elemento']) )     {
	$location.='?view='.$_GET['view'];
	$location.='&viewgrilla='.$_GET['viewgrilla'];
	$location.='&tipo='.$_GET['tipo'];
	$location.='&app_conf='.$_GET['app_conf'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/app_areas_elementos_2.php';
}

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Personalizar interfaz de la app</title>
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
	<link href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css" rel="stylesheet" type="text/css">
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
<script language="javascript">
function msg(direccion){
if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
</script>
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
					<img src="img/<?php echo $arrUsuario['imgLogo']; ?>" alt="">
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
            <i class="fa fa-dashboard"></i> Personalizar interfaz de la app
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
<?php  if (isset($_GET['create'])) {?>
<div id="txf_03" class="alert_sucess">  
	Datos Creados correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Datos Modificados correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Datos borrados correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de la pagina
$query = "SELECT  Nombre
FROM `app_areas_pagelist`
WHERE idPagelist = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos de la pagina</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control" value="<?php if(isset($Nombre)) {echo $Nombre;} else {echo $rowdata['Nombre'];}?>"  name="Nombre" required>
				</div>
			</div>
                      

            
			<div class="form-group">
            	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="idPagelist">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;?>
				<a href="<?php echo $location.'?app_conf='.$_GET['app_conf']; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>




<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nueva Pagina</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
            
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control"  name="Nombre" <?php if(isset($Nombre)) {echo 'value="'.$Nombre.'"';}?> required>
				</div>
			</div>
                      

            
			<div class="form-group">
            	<input type="hidden" name="app_conf" value="<?php echo $_GET['app_conf'] ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				?>
				<a href="<?php echo $location.'?app_conf='.$_GET['app_conf']; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['edittbgrid']) ) { 
// Se trae un listado con todos los anchos de la imagen
$arrImg = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=24
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrImg,$row );
}
//Obtengo la ubicacion del ultimo elemento
$query = "SELECT  Nombre, grid_color, grid_border, grid_shadow, body_col, body_fil, url_img, grid_img
FROM `app_areas_elementos`
WHERE idElementos = {$_GET['edittbgrid']}";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado); 
 ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Editar elemento</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
            
		
<?php if ($_GET['tipo']=='tb_1-2'or$_GET['tipo']=='tb_1-3'or$_GET['tipo']=='tb_1-4'or$_GET['tipo']=='tb_1-5' ){ 
// Se trae un listado con todos los colores de botones
$arrColorBoton = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=27
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColorBoton,$row );
}
// Se trae un listado con todos los tipos de bordes
$arrBorder = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=26
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBorder,$row );
}
// Se trae un listado con todos los tipos de sombra
$arrShadow = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=31
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrShadow,$row );
}
?>
 
 			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo</label>
				<div class="col-lg-8">
                	<input type="text" placeholder="Nombre del boton" class="form-control"  name="Nombre" <?php if(isset($Nombre)) {echo 'value="'.$Nombre.'"';}else{echo 'value="'.$row_data['Nombre'].'"';}?> required>
				</div>
			</div>
            
 			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Color del boton</label>
				<div class="col-lg-8">
					<select class="form-control" name="grid_color" required>
                            <option value="">Seleccione un color</option>
                            <?php foreach ($arrColorBoton as $colorboton) { ?>
                            <option class="<?php echo $colorboton['Codigo'] ?>" value="<?php echo $colorboton['Codigo'] ?>" <?php if(isset($grid_color)&&$grid_color==$colorboton['Codigo']) {echo 'selected="selected"';}elseif($colorboton['Codigo']==$row_data['grid_color']){echo 'selected="selected"';}?>><?php echo $colorboton['Nombre'] ?></option>
                            <?php } ?>       
					</select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Bordes redondeados</label>
				<div class="col-lg-8">
					<select class="form-control" name="grid_border" required>
                            <option value="">Seleccione un borde</option>
                            <?php foreach ($arrBorder as $border) { ?>
                            <option value="<?php echo $border['Codigo'] ?>" <?php if(isset($grid_border)&&$grid_border==$border['Codigo']) {echo 'selected="selected"';}elseif($border['Codigo']==$row_data['grid_border']){echo 'selected="selected"';}?>><?php echo $border['Nombre'] ?></option>
                            <?php } ?>       
					</select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Sombras</label>
				<div class="col-lg-8">
					<select class="form-control" name="grid_shadow" required>
                            <option value="">Seleccione una sombra</option>
                            <?php foreach ($arrShadow as $shadow) { ?>
                            <option value="<?php echo $shadow['Codigo'] ?>" <?php if(isset($grid_shadow)&&$grid_shadow==$shadow['Codigo']) {echo 'selected="selected"';}elseif($shadow['Codigo']==$row_data['grid_shadow']){echo 'selected="selected"';}?>><?php echo $shadow['Nombre'] ?></option>
                            <?php } ?>       
					</select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Columnas</label>
				<div class="col-lg-8">
					<select class="form-control" name="body_col" required>
                            <option value="">Seleccione cantidad Columnas</option>
                            <?php for ($i = 1; $i <= 5; $i++) {?>
                            <option value="<?php echo $i ?>" <?php if(isset($body_col)&&$body_col==$i) {echo 'selected="selected"';}elseif($i==$row_data['body_col']){echo 'selected="selected"';}?>><?php echo $i ?></option>
							<?php } ?>	       
					</select>
				</div>
			</div>
            
             <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Filas</label>
				<div class="col-lg-8">
					<select class="form-control" name="body_fil" required>
                            <option value="">Seleccione cantidad Filas</option>
                            <?php for ($i = 1; $i <= 5; $i++) {?>
                            <option value="<?php echo $i ?>" <?php if(isset($body_col)&&$body_col==$i) {echo 'selected="selected"';}elseif($i==$row_data['body_fil']){echo 'selected="selected"';}?>><?php echo $i ?></option>
							<?php } ?>	       
					</select>
				</div>
			</div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Url de la imagen</label>
				<div class="col-lg-8">
                	<input type="text" placeholder="Url de la imagen" class="form-control"  name="url_img" value="<?php if(isset($url_img)) {echo $url_img;}else{echo $row_data['url_img'];}?>" required>
				</div>
			</div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Ancho de la imagen</label>
				<div class="col-lg-8">
					<select class="form-control" name="grid_img" required>
                            <option value="">Seleccione un Ancho</option>
                            <?php foreach ($arrImg as $img) { ?>
                            <option value="<?php echo $img['Codigo'] ?>" <?php if(isset($grid_img)&&$grid_img==$img['Codigo']) {echo 'selected="selected"';}elseif($img['Codigo']==$row_data['grid_img']){echo 'selected="selected"';}?>><?php echo $img['Nombre'] ?></option>
                            <?php } ?>       
					</select>
				</div>
			</div>
            


<?php }elseif($_GET['tipo']=='tb_img'){ ?>
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo</label>
				<div class="col-lg-8">
                	<input type="text" placeholder="Nombre de la imagen" class="form-control"  name="Nombre" <?php if(isset($Nombre)) {echo 'value="'.$Nombre.'"';}else{echo 'value="'.$row_data['Nombre'].'"';}?> required>
				</div>
			</div>
            
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Url de la imagen</label>
				<div class="col-lg-8">
                	<input type="text" placeholder="Url de la imagen" class="form-control"  name="url_img" value="<?php if(isset($url_img)) {echo $url_img;} else{echo $row_data['url_img']; }?>" required>
				</div>
			</div>

            


<?php }elseif($_GET['tipo']=='tb_menu_sup'){ ?>


<?php }elseif($_GET['tipo']=='subtitle fancy'or$_GET['tipo']=='headline1'or$_GET['tipo']=='headline2'or$_GET['tipo']=='headline3'){ ?>
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo</label>
				<div class="col-lg-8">
                	<input type="text" placeholder="Texto del titulo" class="form-control"  name="Nombre" <?php if(isset($Nombre)) {echo 'value="'.$Nombre.'"';}else{echo 'value="'.$row_data['Nombre'].'"';}?> required>
				</div>
			</div>

<?php }?>
            
			<div class="form-group">
                <input type="hidden"  name="idElementos"  value="<?php echo $_GET['edittbgrid'] ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit_elemento">
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				?>
				<a href="<?php echo $location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&app_conf='.$_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>  

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['newtbgrid']) ) { 
//Obtengo la ubicacion del ultimo elemento
$query = "SELECT  Orden
FROM `app_areas_elementos`
WHERE idArea = {$_GET['viewgrilla']}
ORDER BY Orden DESC
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
$nuevo_valor = $row_data['Orden']+1; ?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo elemento</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
            
		
<?php if ($_GET['tipo']=='tb_1-2'or$_GET['tipo']=='tb_1-3'or$_GET['tipo']=='tb_1-4'or$_GET['tipo']=='tb_1-5' ){ 
// Se trae un listado con todos los colores de botones
$arrColorBoton = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=27
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColorBoton,$row );
}
// Se trae un listado con todos los tipos de bordes
$arrBorder = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=26
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBorder,$row );
}
// Se trae un listado con todos los tipos de sombra
$arrShadow = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=31
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrShadow,$row );
}
// Se trae un listado con todos los anchos de la imagen
$arrImg = array();
$query = "SELECT  Nombre, Codigo
FROM `app_ajustes_tipo`
WHERE idGrupo=24
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrImg,$row );
}
?>
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo</label>
				<div class="col-lg-8">
                	<input type="text" placeholder="Nombre del boton" class="form-control"  name="Nombre" <?php if(isset($Nombre)) {echo 'value="'.$Nombre.'"';}?> required>
				</div>
			</div>
 
 			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Color del boton</label>
				<div class="col-lg-8">
					<select class="form-control" name="grid_color" required>
                            <option value="">Seleccione un color</option>
                            <?php foreach ($arrColorBoton as $colorboton) { ?>
                            <option class="<?php echo $colorboton['Codigo'] ?>" value="<?php echo $colorboton['Codigo'] ?>" <?php if(isset($grid_color)&&$grid_color==$colorboton['Codigo']) {echo 'selected="selected"';}?>><?php echo $colorboton['Nombre'] ?></option>
                            <?php } ?>       
					</select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Bordes redondeados</label>
				<div class="col-lg-8">
					<select class="form-control" name="grid_border" required>
                            <option value="">Seleccione un borde</option>
                            <?php foreach ($arrBorder as $border) { ?>
                            <option value="<?php echo $border['Codigo'] ?>" <?php if(isset($grid_border)&&$grid_border==$border['Codigo']) {echo 'selected="selected"';}?>><?php echo $border['Nombre'] ?></option>
                            <?php } ?>       
					</select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Sombras</label>
				<div class="col-lg-8">
					<select class="form-control" name="grid_shadow" required>
                            <option value="">Seleccione una sombra</option>
                            <?php foreach ($arrShadow as $shadow) { ?>
                            <option value="<?php echo $shadow['Codigo'] ?>" <?php if(isset($grid_shadow)&&$grid_shadow==$shadow['Codigo']) {echo 'selected="selected"';}?>><?php echo $shadow['Nombre'] ?></option>
                            <?php } ?>       
					</select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Columnas</label>
				<div class="col-lg-8">
					<select class="form-control" name="body_col" required>
                            <option value="">Seleccione cantidad Columnas</option>
                            <?php for ($i = 1; $i <= 5; $i++) {?>
                            <option value="<?php echo $i ?>" <?php if(isset($body_col)&&$body_col==$i) {echo 'selected="selected"';}?>><?php echo $i ?></option>
							<?php } ?>	       
					</select>
				</div>
			</div>
            
             <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Filas</label>
				<div class="col-lg-8">
					<select class="form-control" name="body_fil" required>
                            <option value="">Seleccione cantidad Filas</option>
                            <?php for ($i = 1; $i <= 5; $i++) {?>
                            <option value="<?php echo $i ?>" <?php if(isset($body_col)&&$body_col==$i) {echo 'selected="selected"';}?>><?php echo $i ?></option>
							<?php } ?>	       
					</select>
				</div>
			</div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Url de la imagen</label>
				<div class="col-lg-8">
                	<input type="text" placeholder="Url de la imagen" class="form-control"  name="url_img" <?php if(isset($url_img)) {echo 'value="'.$url_img.'"';}?> required>
				</div>
			</div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Ancho de la imagen</label>
				<div class="col-lg-8">
					<select class="form-control" name="grid_img" required>
                            <option value="">Seleccione un Ancho</option>
                            <?php foreach ($arrImg as $img) { ?>
                            <option value="<?php echo $img['Codigo'] ?>" <?php if(isset($grid_img)&&$grid_img==$img['Codigo']) {echo 'selected="selected"';}?>><?php echo $img['Nombre'] ?></option>
                            <?php } ?>       
					</select>
				</div>
			</div>
            
            <input type="hidden"  name="Tipo_elemento" value="boton" >


<?php }elseif($_GET['tipo']=='tb_img'){ ?>
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo</label>
				<div class="col-lg-8">
                	<input type="text" placeholder="Nombre de la imagen" class="form-control"  name="Nombre" <?php if(isset($Nombre)) {echo 'value="'.$Nombre.'"';}?> required>
				</div>
			</div>
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Url de la imagen</label>
				<div class="col-lg-8">
                	<input type="text" placeholder="Url de la imagen" class="form-control"  name="url_img" <?php if(isset($url_img)) {echo 'value="'.$url_img.'"';}?> required>
				</div>
			</div>
 


<?php }elseif($_GET['tipo']=='tb_menu_sup'){ ?>


<?php }elseif($_GET['tipo']=='subtitle fancy'or$_GET['tipo']=='headline1'or$_GET['tipo']=='headline2'or$_GET['tipo']=='headline3'){ ?>
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo</label>
				<div class="col-lg-8">
                	<input type="text" placeholder="Texto del titulo" class="form-control"  name="Nombre" <?php if(isset($Nombre)) {echo 'value="'.$Nombre.'"';}?> required>
				</div>
			</div>

<?php }?>
            
			<div class="form-group">
            	<input type="hidden"  name="Orden"       value="<?php echo $nuevo_valor ?>" >
                <input type="hidden"  name="idArea"      value="<?php echo $_GET['viewgrilla'] ?>" >
                <input type="hidden"  name="idPagelist"  value="<?php echo $_GET['view'] ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_elemento">
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				?>
				<a href="<?php echo $location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&app_conf='.$_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>      
 
 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['viewgrilla']) ) { 
// Se trae un listado con todos los elementos de la grilla
$arrElementos = array();
$query = "SELECT   idElementos, Nombre, Orden
FROM `app_areas_elementos`
WHERE idArea = {$_GET['viewgrilla']}
ORDER BY Orden ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrElementos,$row );
}
//Obtengo la ubicacion de la ultima grilla de la pagina
$query = "SELECT  Orden
FROM `app_areas_elementos`
WHERE idArea = {$_GET['viewgrilla']}
ORDER BY Orden DESC
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado); 
?>

<div class="form-group" style="margin-top:15px;">
<a href="<?php echo $location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&app_conf='.$_GET['app_conf'] ?>&newtbgrid=true" class="btn btn-default fright margin_width" >Crear Nuevo elemento</a>
</div>
<div class="clearfix"></div>
<div class="col-lg-8">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion de los elementos de la grilla</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="">Nombre</th>
        <th width="160">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php 
	$grill = 1;
	foreach ($arrElementos as $elementos) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $elementos['Nombre']; ?></td>
			<td class=" ">
            	<?php if($grill!=1){?> 
				<a href="<?php echo $location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&up_elemento='.$elementos['idElementos'].'&orden='.$elementos['Orden'].'&app_conf='.$_GET['app_conf']; ?>" title="Subir un nivel" class="icon-up info-tooltip"></a>
            <?php } else {?>
            	<a href="#" title="Subir un nivel" class="icon-up info-tooltip"></a>
            <?php } ?> 
            <?php if($elementos['Orden']!=$row_data['Orden']){?>     
                <a href="<?php echo $location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&down_elemento='.$elementos['idElementos'].'&orden='.$elementos['Orden'].'&app_conf='.$_GET['app_conf']; ?>" title="Bajar un nivel" class="icon-down info-tooltip"></a>
            <?php } else {?>
				<a href="#" title="Bajar un nivel" class="icon-down info-tooltip"></a>
			<?php } ?>
            
            
                <a href="<?php echo $location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&edittbgrid='.$elementos['idElementos'].'&app_conf='.$_GET['app_conf']; ?>" title="Editar informacion" class="icon-editar info-tooltip"></a>
                <?php $ubicacion=$location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&del_elem='.$elementos['idElementos'].'&app_conf='.$_GET['app_conf'];?>
				<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>

			</td>
		</tr>
      <?php $grill++;  ?>
    <?php } ?>                    
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
         <iframe class="frame_border" scrolling="auto" src="app_demo/preview_8.php?viewgrilla=<?php echo $_GET['viewgrilla'].'&app_conf='.$_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
        </div>
	</div>
</div> 
 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_areas.php?view=<?php echo $_GET['view'].'&app_conf='.$_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['edit_grilla']) ) {
// Se trae un listado con todos los tipos de grilla almacenada
$arrGrilla = array();
$query = "SELECT   Nombre, Codigo
FROM `app_grilla`
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrilla,$row );
}	 
// Se traen todos los datos de la pagina
$query = "SELECT  Nombre, Codigo
FROM `app_areas_listado`
WHERE idArea = {$_GET['edit_grilla']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos de la Grilla</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control" value="<?php if(isset($Nombre)) {echo $Nombre;} else {echo $rowdata['Nombre'];}?>"  name="Nombre" required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Tipo de Grilla</label>
				<div class="col-lg-8">
					<select class="form-control" tabindex="15" name="Codigo" required>
                            <option value="">Seleccione Tipo Grilla</option>
                            <?php foreach ($arrGrilla as $grilla) { ?>
                            <option value="<?php echo $grilla['Codigo'] ?>" <?php if(isset($Codigo)&&$Codigo==$grilla['Codigo']) {echo 'selected="selected"';}elseif($grilla['Codigo']==$rowdata['Codigo']){echo 'selected="selected"';}?>><?php echo $grilla['Nombre'] ?></option>
                            <?php } ?>       
					</select>
				</div>
			</div>
                      

            
			<div class="form-group">
            	<input type="hidden" value="<?php echo $_GET['edit_grilla']; ?>" name="idArea">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit_grilla"> 
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;?>
				<a href="<?php echo $location.'?view='.$_GET['view'].'&app_conf='.$_GET['app_conf']; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>	 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new_grilla']) ) {
// Se trae un listado con todos los tipos de grilla almacenada
$arrGrilla = array();
$query = "SELECT   Nombre, Codigo
FROM `app_grilla`
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrilla,$row );
}
//Obtengo la ubicacion de la ultima grilla de la pagina
$query = "SELECT  Orden
FROM `app_areas_listado`
WHERE idPagelist = {$_GET['view']}
ORDER BY Orden DESC
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
$nuevo_valor = $row_data['Orden']+1;	 
?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nueva Grilla</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
            
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control"  name="Nombre" <?php if(isset($Nombre)) {echo 'value="'.$Nombre.'"';}?> required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Tipo de Grilla</label>
				<div class="col-lg-8">
					<select class="form-control" tabindex="15" name="Codigo" required>
                            <option value="">Seleccione Tipo Grilla</option>
                            <?php foreach ($arrGrilla as $grilla) { ?>
                            <option value="<?php echo $grilla['Codigo'] ?>" <?php if(isset($Codigo)&&$Codigo==$grilla['Codigo']) {echo 'selected="selected"';}?>><?php echo $grilla['Nombre'] ?></option>
                            <?php } ?>       
					</select>
				</div>
			</div>
                      

            
			<div class="form-group">
            	<input type="hidden"  name="Orden"       value="<?php echo $nuevo_valor ?>" >
                <input type="hidden"  name="idPagelist"  value="<?php echo $_GET['view'] ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_grilla">
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				?>
				<a href="<?php echo $location.'?view='.$_GET['view'].'&app_conf='.$_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>  
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// Se trae un listado con todos los colores de los botones
$arrGrilla = array();
$query = "SELECT  
app_areas_listado.idArea, 
app_areas_listado.Nombre, 
app_areas_listado.Orden, 
app_areas_listado.Codigo AS Tipo,
app_grilla.Nombre AS Codigo
FROM `app_areas_listado`
LEFT JOIN `app_grilla` ON app_grilla.Codigo = app_areas_listado.Codigo
WHERE idPagelist = {$_GET['view']}
ORDER BY Orden ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrilla,$row );
}
//Obtengo la ubicacion de la ultima grilla de la pagina
$query = "SELECT  Orden
FROM `app_areas_listado`
WHERE idPagelist = {$_GET['view']}
ORDER BY Orden DESC
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
?>
<div class="form-group" style="margin-top:15px;">
<a href="<?php echo $location; ?>?view=<?php echo $_GET['view'].'&app_conf='.$_GET['app_conf'] ?>&new_grilla=true" class="btn btn-default fright margin_width" >Crear Nueva Grilla</a>
</div>
<div class="clearfix"></div>
<div class="col-lg-8">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion de la Grilla</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="">Nombre</th>
        <th width="">Tipo</th>
        <th width="180">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php 
	$grill = 1;
	foreach ($arrGrilla as $grilla) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $grilla['Nombre']; ?></td>
            <td class=" "><?php echo $grilla['Codigo']; ?></td>
			<td class=" ">
            	<a href="<?php echo $location.'?view='.$_GET['view'].'&viewgrilla='.$grilla['idArea'].'&tipo='.$grilla['Tipo'].'&app_conf='.$_GET['app_conf']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a> 
            <?php if($grill!=1){?> 
				<a href="<?php echo $location.'?view='.$_GET['view'].'&up_grilla='.$grilla['idArea'].'&orden='.$grilla['Orden'].'&app_conf='.$_GET['app_conf']; ?>" title="Subir un nivel" class="icon-up info-tooltip"></a>
            <?php } else {?>
            	<a href="#" title="Subir un nivel" class="icon-up info-tooltip"></a>
            <?php } ?> 
            <?php if($grilla['Orden']!=$row_data['Orden']){?>     
                <a href="<?php echo $location.'?view='.$_GET['view'].'&down_grilla='.$grilla['idArea'].'&orden='.$grilla['Orden'].'&app_conf='.$_GET['app_conf']; ?>" title="Bajar un nivel" class="icon-down info-tooltip"></a>
            <?php } else {?>
				<a href="#" title="Bajar un nivel" class="icon-down info-tooltip"></a>
			<?php } ?>    
                <a href="<?php echo $location.'?view='.$_GET['view'].'&edit_grilla='.$grilla['idArea'].'&app_conf='.$_GET['app_conf']; ?>" title="Editar informacion" class="icon-editar info-tooltip"></a>
                <?php $ubicacion=$location.'?view='.$_GET['view'].'&del_grilla='.$grilla['idArea'].'&app_conf='.$_GET['app_conf'];?>
				<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>

			</td>
		</tr>
      <?php $grill++;  ?>
    <?php } ?>                    
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
         <iframe class="frame_border" scrolling="auto" src="app_demo/preview_8.php?view=<?php echo $_GET['view'].'&app_conf='.$_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
        </div>
	</div>
</div>
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_areas.php?app_conf=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 	
// Se trae un listado con todos los usuarios
$arrPage = array();
$query = "SELECT  idPagelist, Nombre
FROM `app_areas_pagelist`
WHERE app_conf = {$_GET['app_conf']}
ORDER BY idPagelist ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPage,$row );
}?>

<div class="form-group" style="margin-top:15px;">
<a href="<?php echo $location.'?new=true&app_conf='.$_GET['app_conf']; ?>" class="btn btn-default fright margin_width" >Crear Nueva Pagina</a>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Paginas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th width="120">ID</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrPage as $paginas) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $paginas['Nombre']; ?></td>
            <td class=" "><?php echo $paginas['idPagelist']; ?></td>
			<td class=" ">
<a href="<?php echo $location.'?view='.$paginas['idPagelist'].'&app_conf='.$_GET['app_conf']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>
<a href="<?php echo $location.'?id='.$paginas['idPagelist'].'&app_conf='.$_GET['app_conf']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a>
<?php $ubicacion=$location.'?del='.$paginas['idPagelist'].'&app_conf='.$_GET['app_conf'];?>
				<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>   
</div>
</div>


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal.php?pagina=1&view=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
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