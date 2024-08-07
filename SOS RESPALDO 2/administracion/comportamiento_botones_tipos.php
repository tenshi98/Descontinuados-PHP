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
/*                                          Se filtran las entradas para evitar ataques                                                  */
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
$original = "comportamiento_botones_tipos.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
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
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/app_tipo_boton.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/app_tipo_boton_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/app_tipo_boton.php';
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
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/app_tipo_boton.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/app_tipo_boton_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/app_tipo_boton.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/app_tipo_boton.php';
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
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/app_tipo_boton.php';
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
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($_GET['create'])) {?>
<div id="txf_03" class="alert_sucess">  
	Tipo Boton Creado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Tipo Boton Modificado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Tipo Boton borrado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT Nombre, Archivo, fun
FROM `app_tipo_boton`
WHERE idTipoBoton = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion de Tipo de Boton</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control" value="<?php if(isset($Nombre)) {echo $Nombre;} else {echo $rowdata['Nombre'];}?>"  name="Nombre" required >
				</div>
			</div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Archivo</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Archivo" class="form-control" value="<?php if(isset($Archivo)) {echo $Archivo;} else {echo $rowdata['Archivo'];}?>"  name="Archivo" required >
				</div>
			</div>
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Funcion del boton</label>
                <div class="col-lg-8">
                <select name="fun" class="form-control" required>
<option value="" selected>Seleccione una funcion</option>
<option value="1" <?php if(isset($fun)&&$fun==1) {echo 'selected="selected"';}elseif($rowdata['fun']==1){echo 'selected="selected"';}?>>Emergencias</option>
<option value="2" <?php if(isset($fun)&&$fun==2) {echo 'selected="selected"';}elseif($rowdata['fun']==2){echo 'selected="selected"';}?>>Abrir Todas Categorias Noticias</option>
<option value="3" <?php if(isset($fun)&&$fun==3) {echo 'selected="selected"';}elseif($rowdata['fun']==3){echo 'selected="selected"';}?>>Abrir Una Categoria Noticia</option>
<option value="4" <?php if(isset($fun)&&$fun==4) {echo 'selected="selected"';}elseif($rowdata['fun']==4){echo 'selected="selected"';}?>>Abrir Una Noticia</option>
<option value="5" <?php if(isset($fun)&&$fun==5) {echo 'selected="selected"';}elseif($rowdata['fun']==5){echo 'selected="selected"';}?>>Abrir Todas Categorias Paginas</option>
<option value="6" <?php if(isset($fun)&&$fun==6) {echo 'selected="selected"';}elseif($rowdata['fun']==6){echo 'selected="selected"';}?>>Abrir Una Categoria Pagina</option>
<option value="7" <?php if(isset($fun)&&$fun==7) {echo 'selected="selected"';}elseif($rowdata['fun']==7){echo 'selected="selected"';}?>>Abrir Una Pagina</option>
<option value="8" <?php if(isset($fun)&&$fun==8) {echo 'selected="selected"';}elseif($rowdata['fun']==8){echo 'selected="selected"';}?>>Ninguna</option>
<option value="9" <?php if(isset($fun)&&$fun==9) {echo 'selected="selected"';}elseif($rowdata['fun']==9){echo 'selected="selected"';}?>>Nueva Pantalla</option>
<option value="10" <?php if(isset($fun)&&$fun==10) {echo 'selected="selected"';}elseif($rowdata['fun']==10){echo 'selected="selected"';}?>>Modificar datos Usuario</option>
<option value="11" <?php if(isset($fun)&&$fun==11) {echo 'selected="selected"';}elseif($rowdata['fun']==11){echo 'selected="selected"';}?>>Realizar Llamada</option>
                </select>
                </div>
            </div>

			<div class="form-group">
            	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="idTipoBoton">
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
 } elseif ( ! empty($_GET['new']) ) { ?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Tipo de Boton</h5>
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
				<label for="text2" class="control-label col-lg-4">Archivo</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Archivo" class="form-control"  name="Archivo" <?php if(isset($Archivo)) {echo 'value="'.$Archivo.'"';}?> required>
				</div>
			</div>
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Funcion del boton</label>
                <div class="col-lg-8">
                <select name="fun" class="form-control" required>
					<option value="" selected>Seleccione una funcion</option>
                    <option value="1" <?php if(isset($fun)&&$fun==1) {echo 'selected="selected"';}?>>Emergencias</option>
                    <option value="2" <?php if(isset($fun)&&$fun==2) {echo 'selected="selected"';}?>>Abrir Todas Categorias Noticias</option>
                    <option value="3" <?php if(isset($fun)&&$fun==3) {echo 'selected="selected"';}?>>Abrir Una Categoria Noticia</option>
                    <option value="4" <?php if(isset($fun)&&$fun==4) {echo 'selected="selected"';}?>>Abrir Una Noticia</option>
                    <option value="5" <?php if(isset($fun)&&$fun==5) {echo 'selected="selected"';}?>>Abrir Todas Categorias Paginas</option>
                    <option value="6" <?php if(isset($fun)&&$fun==6) {echo 'selected="selected"';}?>>Abrir Una Categoria Pagina</option>
                    <option value="7" <?php if(isset($fun)&&$fun==7) {echo 'selected="selected"';}?>>Abrir Una Pagina</option>
                    <option value="8" <?php if(isset($fun)&&$fun==8) {echo 'selected="selected"';}?>>Ninguna</option>
                    <option value="9" <?php if(isset($fun)&&$fun==9) {echo 'selected="selected"';}?>>Nueva Pantalla</option>
                    <option value="10" <?php if(isset($fun)&&$fun==10) {echo 'selected="selected"';}?>>Modificar datos Usuario</option>
                    <option value="11" <?php if(isset($fun)&&$fun==11) {echo 'selected="selected"';}?>>Realizar Llamada</option>
                </select>
                </div>
            </div>
            
 
			<div class="form-group">
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
//Creo la variable con la ubicacion
	$z="WHERE idTipoBoton!=0 ";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z .=" AND Nombre LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idTipoBoton FROM `app_tipo_boton` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrTipoBoton = array();
$query = "SELECT idTipoBoton,Nombre, Archivo, fun
FROM `app_tipo_boton`
".$z."
ORDER BY Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipoBoton,$row );
}
//Variables de ubicacion 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Tipo boton</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Tipo de boton</a><?php } ?>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Tipos de Botones</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th>Archivo</th>
        <th>Funcion</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrTipoBoton as $tipo) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $tipo['Nombre']; ?></td>
			<td class=" "><?php echo $tipo['Archivo']; ?></td>
            <td class=" ">
			<?php 
			switch ($tipo['fun']) {
				case 1: echo "Emergencias"; break;
				case 2: echo "Abrir Todas Categorias Noticias"; break;
				case 3: echo "Abrir Una Categoria Noticia"; break;
				case 4: echo "Abrir Una Noticia"; break;
				case 5: echo "Abrir Todas Categorias Paginas"; break;
				case 6: echo "Abrir Una Categoria Pagina"; break;
				case 7: echo "Abrir Una Pagina"; break;
				case 8: echo "Ninguna"; break;
				case 9: echo "Nueva Pantalla"; break;
				case 10: echo "Modificar datos del usuario"; break;
				case 11: echo "Realizar Llamada"; break;
				
			}        
			?>
            </td>
			<td class=" ">
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$tipo['idTipoBoton']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level']>=3){?><?php $ubicacion=$location.'&del='.$tipo['idTipoBoton'];?>
				<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php } ?>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
//Verifico si hay mas de una pagina, sino coulto el paginador
if($total_paginas>1){
//Cargamos la ubicacion original
$location = $original;
$location .='?pagina=';
if (isset($_GET['search'])) { 
$x ='&search='.$_GET['search'];
} else {
$x='';	
}?>
    <div class="row">
        <div class="col-lg-6">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">← Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">← Anterior</a></li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
    				<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
					<?php } ?>
                    <?php if(($num_pag + 1)<=$total_paginas) { ?>
                    <li class="next"><a href="<?php echo $location.($num_pag+1).$x ?>">Siguiente → </a></li>
                    <?php } else {?>
                    <li class="next disabled"><a href="">Siguiente → </a></li>
                    <?php } ?>
                </ul>
            </div> 
        </div>
    </div>
<?php }?>   
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