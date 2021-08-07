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
$original = "noticias_categorias.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                       $location .= "&search=".$_GET['search'] ; 	}
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/noticias_categorias.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/noticias_categorias.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/noticias_categorias.php';	
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Categoria Creada correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Categoria Modificada correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Categoria borrada correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>			
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
//Se verifica el tipo de usuario para mostrar los datos
if($arrUsuario['tipo']=='SuperAdmin'){
$zz="idTipoCliente>0";
}else{
$zz="idTipoCliente={$arrUsuario['idTipoCliente']}";	
} 
// Se traen todos los datos de mi usuario
$query = "SELECT idNotCat, idNotGrupo, Nombre, idTipoCliente
FROM `noticias_categorias`
WHERE idNotCat = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion de la Categoria</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($idNotGrupo)) {     $x1  = $idNotGrupo;     }else{$x1  = $rowdata['idNotGrupo'];}
			if(isset($Nombre)) {         $x2  = $Nombre;         }else{$x2  = $rowdata['Nombre'];}
			if(isset($idTipoCliente)) {  $x3  = $idTipoCliente;  }else{$x3  = $rowdata['idTipoCliente'];}

			//se dibujan los inputs
			echo form_select('Grupos','idNotGrupo', $x1, 2, 'idNotGrupo', 'Nombre', 'noticias_grupos', $zz, $dbConn);
			echo form_input('text', 'Nombre', 'Nombre', $x2, 2);
			if($arrUsuario['tipo']=='SuperAdmin'){
				echo form_select('Sistema','idTipoCliente', $x3, 2, 'idTipoCliente', 'Nombre', 'clientes_tipos', 0, $dbConn);
			}else{
				echo '<input type="hidden" name="idTipoCliente"   value="'.$arrUsuario['idTipoCliente'].' ">';
			}
			?>

			<div class="form-group">
            	<input type="hidden" name="idNotCat" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>




<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
//Se verifica el tipo de usuario para mostrar los datos
if($arrUsuario['tipo']=='SuperAdmin'){
$zz="WHERE idTipoCliente>0";
}else{
$zz="WHERE idTipoCliente={$arrUsuario['idTipoCliente']}";
} 
 ?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nueva Categoria</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        	
            <?php 
			//Se verifican si existen los datos
			if(isset($idNotGrupo)) {     $x1  = $idNotGrupo;     }else{$x1  = '';}
			if(isset($Nombre)) {         $x2  = $Nombre;         }else{$x2  = '';}
			if(isset($idTipoCliente)) {  $x3  = $idTipoCliente;  }else{$x3  = '';}

			//se dibujan los inputs
			echo form_select('Grupos','idNotGrupo', $x1, 2, 'idNotGrupo', 'Nombre', 'noticias_grupos', $zz, $dbConn);
			echo form_input('text', 'Nombre', 'Nombre', $x2, 2);
			if($arrUsuario['tipo']=='SuperAdmin'){
				echo form_select('Sistema','idTipoCliente', $x3, 2, 'idTipoCliente', 'Nombre', 'clientes_tipos', 0, $dbConn);
			}else{
				echo '<input type="hidden" name="idTipoCliente"   value="'.$arrUsuario['idTipoCliente'].' ">';
			}
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
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE noticias_categorias.idNotCat>=0";	
}else{
	$z="WHERE noticias_categorias.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z .=" AND noticias_categorias.Nombre LIKE '%{$_GET['search']}%' ";	
}
// Se trae un listado con todos los usuarios
$arrCategorias = array();
$query = "SELECT 
noticias_categorias.idNotCat,
noticias_categorias.Nombre,
noticias_grupos.Nombre AS Nombre_grupo,
clientes_tipos.RazonSocial AS sistema
FROM `noticias_categorias`
INNER JOIN `noticias_grupos`      ON noticias_grupos.idNotGrupo        = noticias_categorias.idNotGrupo
LEFT JOIN `clientes_tipos`        ON clientes_tipos.idTipoCliente      = noticias_categorias.idTipoCliente

".$z."
ORDER BY noticias_categorias.Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Categoria</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nueva Categoria</a><?php }?>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Categorias</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th width="160">Sistema</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                
	<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
filtrar($arrCategorias, 'Nombre_grupo');  
foreach($arrCategorias as $categoria=>$permisos){ 
echo '<tr class="odd" ><td colspan="5"  style="background-color:#DDD">'.$categoria.'</td></tr>';
  foreach ($permisos as $subcategorias) { ?>
  <tr class="odd"> 
   <td><?php echo $subcategorias['Nombre']; ?></td>
   <td><?php echo $subcategorias['sistema']; ?></td>
   <td  class="options-width">
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$subcategorias['idNotCat']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$subcategorias['idNotCat'];?>
	<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?>
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