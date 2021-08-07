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
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "productos_recetas.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != '') {                        $location .= "&search=".$_GET['search'] ; 	}
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Nombre,Minutos,idDificultad,NPorciones,InfoNutricional,Preparacion';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/productos_recetas.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idReceta,Nombre,Minutos,idDificultad,NPorciones,InfoNutricional,Preparacion';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/productos_recetas.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/productos_recetas.php';	
}
//se borra un dato
if ( !empty($_GET['del_img']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del_img';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/productos_recetas.php';	
}
//formulario para crear
if ( !empty($_POST['submit_prod']) )  { 
	//se agrega ubicacion
	$location .= "&id=".$_GET['id'] ;
	//Llamamos al formulario
	$form_obligatorios = 'TextoAntes,idReceta';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/productos_recetas_productos.php';
}
//se borra un dato
if ( !empty($_GET['delprod']) )     {
	//se agrega ubicacion
	$location .= "&id=".$_GET['id'] ;
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/productos_recetas_productos.php';	
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
if (isset($_GET['created']))     {$error['usuario'] 	  = 'sucess/Receta creada correctamente';}
if (isset($_GET['edited']))      {$error['usuario'] 	  = 'sucess/Receta editada correctamente';}
if (isset($_GET['deleted']))     {$error['usuario'] 	  = 'sucess/Receta borrada correctamente';}
if (isset($_GET['img_deleted'])) {$error['usuario'] 	  = 'sucess/Imagen borrada correctamente';}
if (isset($_GET['addprod']))     {$error['usuario'] 	  = 'sucess/Producto agregado correctamente';}
if (isset($_GET['del_prod']))     {$error['usuario'] 	  = 'sucess/Producto eliminado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>			
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT Nombre,Minutos,idDificultad,NPorciones,NombreImagen,InfoNutricional,Preparacion
FROM `productos_recetas`
WHERE idReceta = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los productos relacionados con la receta
$arrProductos = array();
$query = "SELECT 
productos_recetas_productos.idRecetaProductos,
productos_recetas_productos.TextoAntes,
productos_recetas_productos.TextoDespues,
productos_listado.Nombre AS NombreProd

FROM `productos_recetas_productos`
LEFT JOIN `productos_listado`            ON productos_listado.idProducto           = productos_recetas_productos.idProducto

WHERE productos_recetas_productos.idReceta = {$_GET['id']}
ORDER BY productos_recetas_productos.TextoAntes ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrProductos,$row );
}
?>
 
<div class="col-lg-8 fleft">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion de la Receta</h5>
		</header>
		<div id="div-1" class="body">
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
			
				<?php 
				//Se verifican si existen los datos
				if(isset($Nombre)) {           $x1  = $Nombre;           }else{$x1  = $rowdata['Nombre'];}
				if(isset($Minutos)) {          $x2  = $Minutos;          }else{$x2  = $rowdata['Minutos'];}
				if(isset($idDificultad)) {     $x3  = $idDificultad;     }else{$x3  = $rowdata['idDificultad'];}
				if(isset($NPorciones)) {       $x4  = $NPorciones;       }else{$x4  = $rowdata['NPorciones'];}
				if(isset($InfoNutricional)) {  $x5  = $InfoNutricional;  }else{$x5  = $rowdata['InfoNutricional'];}
				if(isset($Preparacion)) {      $x6  = $Preparacion;      }else{$x6  = $rowdata['Preparacion'];}
				
				//se dibujan los inputs
				echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
				echo form_time('Minutos','Minutos', $x2, 2);
				echo form_select('Dificultad','idDificultad', $x3, 2, 'idDificultad', 'Nombre', 'productos_recetas_dificultad', 0, $dbConn);
				echo form_select_n_auto('Nº de porciones','NPorciones', $x4, 2, 1, 10);
				
				if(isset($rowdata['NombreImagen'])&&$rowdata['NombreImagen']!=''){
					echo '<div style="margin-top:10px;margin-bottom:10px;">';
						echo '<div class="col-lg-8 fright">';
						  echo '<img src="upload/'.$rowdata['NombreImagen'].'" width="100%" >'; 
						echo '</div>';
							echo '<a href="'.$location.'&del_img='.$_GET['id'].'" class="btn btn-danger fright margin_width" data-original-title="" title="">Borrar Imagen</a>';
							echo '<div class="clearfix"></div>';
					echo '</div>';	
						
				}else{
					echo form_input_file('Imagen','NombreImagen');
				}
				
				echo form_ckeditor('Informacion Nutricional','InfoNutricional', $x5, 2);
				echo form_ckeditor('Preparacion','Preparacion', $x6, 2);
				?>

				<div class="form-group">
					<input type="hidden" name="idReceta" value="<?php echo $_GET['id']; ?>" >
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				</div>
                      
			</form> 
                    
		</div>
	</div>
</div>

<div class="col-lg-4 fleft">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Agregar Productos a la receta</h5>
		</header>
		<div id="div-1" class="body">
			<form class="form-horizontal" method="post" enctype="multipart/form-data">
			
				<?php 
				//Se verifican si existen los datos
				if(isset($TextoAntes)) {     $x1  = $TextoAntes;      }else{$x1  = '';}
				if(isset($idProducto)) {     $x2  = $idProducto;      }else{$x2  = '';}
				if(isset($TextoDespues)) {   $x3  = $TextoDespues;    }else{$x3  = '';}
				
				//se dibujan los inputs
				echo form_input('text', 'Texto Antes', 'TextoAntes', $x1, 2);
				echo form_select_filter('Producto','idProducto', $x2, 2, 'idProducto', 'Nombre', 'productos_listado', 0, $dbConn);
				echo form_input('text', 'Texto Despues', 'TextoDespues', $x3, 1);
				?>

				<div class="form-group">
					<input type="hidden" name="idReceta" value="<?php echo $_GET['id']; ?>" >
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Agregar Producto" name="submit_prod"> 
				</div>
                      
			</form> 
			
			<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
				<thead>
					<tr role="row">
						<th>Ingredientes</th>
						<th width="120">Acciones</th>
					</tr>
				</thead>
								  
				<tbody role="alert" aria-live="polite" aria-relevant="all">
				<?php foreach ($arrProductos as $prod) { ?>
					<tr class="odd">
						<td class="word_break"><?php echo $prod['TextoAntes'].' '.$prod['NombreProd'].' '.$prod['TextoDespues']; ?></td>	
						<td>
							<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&id='.$_GET['id'].'&delprod='.$prod['idRecetaProductos'];?>
							<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php } ?>
						</td>
					</tr>
				<?php } ?>                    
				</tbody>
			</table>
                    
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
 <div class="col-lg-8 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nueva Receta</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" enctype="multipart/form-data">
        	
			<?php 
			//Se verifican si existen los datos
			if(isset($Nombre)) {           $x1  = $Nombre;           }else{$x1  = '';}
			if(isset($Minutos)) {          $x2  = $Minutos;          }else{$x2  = '';}
			if(isset($idDificultad)) {     $x3  = $idDificultad;     }else{$x3  = '';}
			if(isset($NPorciones)) {       $x4  = $NPorciones;       }else{$x4  = '';}
			if(isset($InfoNutricional)) {  $x5  = $InfoNutricional;  }else{$x5  = '';}
			if(isset($Preparacion)) {      $x6  = $Preparacion;      }else{$x6  = '';}
			
			//se dibujan los inputs
			echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
			echo form_time('Minutos','Minutos', $x2, 2);
			echo form_select('Dificultad','idDificultad', $x3, 2, 'idDificultad', 'Nombre', 'productos_recetas_dificultad', 0, $dbConn);
			echo form_select_n_auto('Nº de porciones','NPorciones', $x4, 2, 1, 10);
			echo form_input_file('Imagen','NombreImagen');
			echo form_ckeditor('Informacion Nutricional','InfoNutricional', $x5, 2);
			echo form_ckeditor('Preparacion','Preparacion', $x6, 2);
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
//Se inicializa el paginador de resultados
//tomo el numero de la pagina si es que este existe
if(isset($_GET["pagina"])){
	$num_pag = $_GET["pagina"];	
} else {
	$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){
	$comienzo = 0 ;
	$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z="WHERE Nombre LIKE '%{$_GET['search']}%'";	
} else {
	$z="";
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idReceta FROM `productos_recetas` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrColores = array();
$query = "SELECT idReceta,Nombre
FROM `productos_recetas`
".$z."
ORDER BY Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColores,$row );
}?>

<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Producto</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nueva Receta</a><?php } ?>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Recetas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th>Nombre</th>
				<th width="120">Acciones</th>
			</tr>
		</thead>
						  
		<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php foreach ($arrColores as $colores) { ?>
			<tr class="odd">
				<td><?php echo $colores['Nombre']; ?></td>
				<td>
					<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$colores['idReceta']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php } ?>
					<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$colores['idReceta'];?>
					<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php } ?>
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
