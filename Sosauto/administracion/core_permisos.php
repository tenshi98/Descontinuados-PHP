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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
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
$original = "core_permisos.php";
$location = $original;
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&create=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/core_permisos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/core_permisos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/core_permisos.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/core_permisos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/core_permisos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/core_permisos.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&delete=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/core_permisos.php';
}

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Mantencion de Permisos</title>
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
	<link href="assets/css/theme_color_<?php echo $rowempresa['idTheme'] ?>.css" rel="stylesheet" type="text/css">
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
            <i class="fa fa-dashboard"></i> Mantencion de Permisos
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
<?php  if (isset($_GET['create'])) {?>
<div id="txf_03" class="alert_sucess">  
	Permiso Creado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Permiso Modificado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Permiso borrado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT id_pmcat, Direccionweb, Direccionbase, Nombre
FROM `core_permisos`
WHERE idAdmpm = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
//se trae un listado con todas las categorias
$arrCategorias = array();
$query = "SELECT  id_pmcat, Nombre
FROM `core_permisos_cat` 
WHERE mode='1' ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
mysql_free_result($resultado);
?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion de Permiso</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Categorias</label>
                <div class="col-lg-8">
                <select name="id_pmcat" class="form-control" required>
                <option value="" selected>Seleccione Categoria</option>
                <?php foreach ( $arrCategorias as $categorias ) { ?>
                <option value="<?php echo $categorias['id_pmcat']; ?>" <?php if(isset($id_pmcat)) {if($id_pmcat==$categorias['id_pmcat']){ echo 'selected="selected"';}} else {if($rowdata['id_pmcat']==$categorias['id_pmcat']){echo 'selected="selected"';}}?>  ><?php echo $categorias['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control"  name="Nombre" value="<?php if(isset($Nombre)) {echo $Nombre;} else {echo $rowdata['Nombre'];}?>" required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Direccion base</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Direccion base" class="form-control"  name="Direccionbase" value="<?php if(isset($Direccionbase)) {echo $Direccionbase;} else {echo $rowdata['Direccionbase'];}?>" required >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Direccion web</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Direccion web" class="form-control"  name="Direccionweb" value="<?php if(isset($Direccionweb)) {echo $Direccionweb;} else {echo $rowdata['Direccionweb'];}?>"  required>
				</div>
			</div>
            
            
            


			<div class="form-group">
            	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="idAdmpm">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				$location .='?pagina='.$_GET['pagina'];
				if (isset($_GET['search'])) { 
				$location .='&search='.$_GET['search'];
				}?>
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>




<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
//se trae un listado con todas las categorias
$arrCategorias = array();
$query = "SELECT  id_pmcat, Nombre
FROM `core_permisos_cat` 
WHERE mode='1' ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
mysql_free_result($resultado); ?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Permiso</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        	
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Categorias</label>
                <div class="col-lg-8">
                <select name="id_pmcat" class="form-control" required >
                <option value="" selected>Seleccione Categoria</option>
                <?php foreach ( $arrCategorias as $categorias ) { ?>
                <option value="<?php echo $categorias['id_pmcat']; ?>" <?php if(isset($id_pmcat)&& $id_pmcat==$categorias['id_pmcat']){ echo 'selected="selected"';}?>><?php echo $categorias['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control"  name="Nombre" <?php if(isset($Nombre)) {echo 'value="'.$Nombre.'"';}?> required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Direccion base</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Direccion base" class="form-control"  name="Direccionbase" <?php if(isset($Direccionbase)) {echo 'value="'.$Direccionbase.'"';}?> required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Direccion web</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Direccion web" class="form-control"  name="Direccionweb" <?php if(isset($Direccionweb)) {echo 'value="'.$Direccionweb.'"';}?> required>
				</div>
			</div>
 
			<div class="form-group">
            	<input type="hidden"  value="1" name="mode">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				$location .='?pagina='.$_GET['pagina'];
				if (isset($_GET['search'])) { 
				$location .='&search='.$_GET['search'];
				}?>
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>

 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Creo la variable con la ubicacion
	$z="WHERE core_permisos.mode='1' ";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z .="AND core_permisos.Nombre LIKE '%{$_GET['search']}%' ";	
}
// Se trae un listado con todos los usuarios
$arrPermisos = array();
$query = "SELECT 
core_permisos.idAdmpm,
core_permisos.Direccionweb,
core_permisos.Direccionbase,
core_permisos.Nombre,
core_permisos_cat.Nombre AS Nombre_cat
FROM `core_permisos`
INNER JOIN `core_permisos_cat`       ON core_permisos_cat.id_pmcat         = core_permisos.id_pmcat
".$z."
ORDER BY Nombre_cat ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPermisos,$row );
}?>
<?php 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Permiso</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Permiso</a>
</div>
                      
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Permisos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th>Direccion Base</th>
        <th>Direccion Web</th>

        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
filtrar($arrPermisos, 'Nombre_cat');  
foreach($arrPermisos as $categoria=>$permisos){ 
echo '<tr class="odd" ><td colspan="4"  style="background-color:#DDD">'.$categoria.'</td></tr>';
  foreach ($permisos as $subcategorias) { ?>
  <tr class="odd"> 
   <td><?php echo $subcategorias['Nombre']; ?></td>
   <td><?php echo $subcategorias['Direccionbase']; ?></td>
   <td><?php echo $subcategorias['Direccionweb']; ?></td>
   <td  class="options-width">
    <a href="<?php echo $location.'&id='.$subcategorias['idAdmpm']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a>
	<?php $ubicacion=$location.'&del='.$subcategorias['idAdmpm'];?>
	<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>	
   </td>   
 </tr> 
 <?php } 
}?>
                       
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