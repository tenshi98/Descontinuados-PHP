<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/funciones.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "saludos_tarjetas_categorias.php";
$location = $original;
//Se consiguen las variables de busqueda y paginacion
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
//Verifico los permisos del usuario sobre la transaccion
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Nombre';
	$form_trabajo= 'insert';
	require_once '../XRXS_2D2CFFDJFDJX1/xrxs_form/saludos_tarjetas_categorias.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idTarjetaCat,Nombre';
	$form_trabajo= 'update';
	require_once '../XRXS_2D2CFFDJFDJX1/xrxs_form/saludos_tarjetas_categorias.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../XRXS_2D2CFFDJFDJX1/xrxs_form/saludos_tarjetas_categorias.php';	
}
//formulario para editar imagen
if ( !empty($_POST['submit_img']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idTarjetaCat,img';
	$form_trabajo= 'img_add';
	require_once '../XRXS_2D2CFFDJFDJX1/xrxs_form/saludos_tarjetas_categorias.php';
}
//se borra una imagen
if ( !empty($_GET['del_img']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del_img';
	require_once '../XRXS_2D2CFFDJFDJX1/xrxs_form/saludos_tarjetas_categorias.php';
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
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<link href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css" rel="stylesheet" type="text/css">
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
	<link rel="icon" type="image/png" href="src_img/mifavicon.png" />
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
              	<?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?>
					<img src="img_upload/<?php echo $arrUsuario['imgLogo']; ?>" alt="">
				<?php }else{?>
					<img src="src_img/logo_default.png" alt="">
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Categoria creada correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Categoria editada correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Categoria borrada correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['img_id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT img, Nombre
FROM `saludos_tarjetas_categorias`
WHERE idTarjetaCat = {$_GET['img_id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado); ?>
  
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion de la imagen: <?php echo $rowdata['Nombre']; ?></h5>
		</header>
		<div id="div-1" class="body">
        <?php if(isset($rowdata['img'])&&$rowdata['img']!=''){?>
        
        <div class="col-lg-10 fcenter" style="margin-bottom:15px;">
          <img src="<?php echo $arrUsuario['web_ex_img'].$rowdata['img'] ?>" width="100%" > 
          </div>
            <a href="<?php echo $location.'&del_img='.$_GET['img_id']; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Borrar Imagen</a>
            <a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
            <div class="clearfix"></div>
        
		<?php }else{?>

		<form class="form-horizontal" method="post" enctype="multipart/form-data">           
            
            <?php           
			//se dibujan los inputs
			echo form_input_file('Seleccionar archivo','img');
			?> 

			<script>
            document.getElementById("uploadBtn").onchange = function () {
                document.getElementById("uploadFile").value = this.value;
            };
            </script>


			<div class="form-group">
            	<input type="hidden" name="idTarjetaCat" value="<?php echo $_GET['img_id']; ?>">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_img"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
           <?php }?>       
                  
                    
		</div>
	</div>
</div>     
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT Nombre
FROM `saludos_tarjetas_categorias`
WHERE idTarjetaCat = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion de la Categoria de la Tarjeta</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			
            <?php 
			//Se verifican si existen los datos
            if(isset($Nombre)) {        $x1  = $Nombre;       }else{$x1  = $rowdata['Nombre'];}

			//se dibujan los inputs
            echo form_input('text', 'Nombre', 'Nombre', $x1, 2); 
			?>


			<div class="form-group">
            	<input type="hidden" name="idTarjetaCat" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
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
			<h5>Crear Nueva Categoria de Tarjeta</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        	
            <?php 
			//Se verifican si existen los datos
            if(isset($Nombre)) {        $x1  = $Nombre;       }else{$x1  = '';}

			//se dibujan los inputs
            echo form_input('text', 'Nombre', 'Nombre', $x1, 2); 
			?>
 
			<div class="form-group">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form>                   
		</div>
	</div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Inicio del paginador
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//Identifico el numero de pagina
if(isset($_GET["pagina"])){$num_pag = $_GET["pagina"];	} else {$num_pag = 1;	}
//Se crea el paginador
if (!$num_pag){$comienzo = 0 ;$num_pag = 1 ;} else {$comienzo = ( $num_pag - 1 ) * $cant_reg ;}

//ubicaciones
$z="";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z.="WHERE Nombre LIKE '%{$_GET['search']}%'";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idTarjetaCat FROM `saludos_tarjetas_categorias` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrCategoria = array();
$query = "SELECT idTarjetaCat,Nombre, img
FROM `saludos_tarjetas_categorias`
".$z."
ORDER BY Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategoria,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Categoria de Tarjeta</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onClick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level_crear']==1){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nueva Categoria</a><?php } ?>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Categorias de Tarjetas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
		<tr role="row">
        	<th width="120">Preview</th>
			<th>Nombre</th>
			<th width="120">Acciones</th>
		</tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrCategoria as $cat) { ?>
    	<tr class="odd">
        	<td><img src="<?php echo $arrUsuario['web_ex_img'].$cat['img'] ?>" width="60px" ></td>
			<td><?php echo $cat['Nombre']; ?></td>
			<td>
<?php if ($rowlevel['level_editar']==1){?><a href="<?php echo $location.'&id='.$cat['idTarjetaCat']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level_editar']==1){?><a href="<?php echo $location.'&img_id='.$cat['idTarjetaCat']; ?>" title="Editar Imagen" class="icon-editar-img info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level_borrar']==1){?><?php $ubicacion=$location.'&del='.$cat['idTarjetaCat'];?>
			<a onClick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php } ?>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
if (isset($_GET['search'])) {  $search ='&search='.$_GET['search']; } else { $search='';}
echo paginador_1($total_paginas, $original, $search, $num_pag ) ?>  
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
    <script src="assets/js/main.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>