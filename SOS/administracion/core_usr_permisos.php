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
$original = "core_usr_permisos.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                       $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['id']) && $_GET['id'] != ''){                               $location .= "&id=".$_GET['id'] ; 	}
if(isset($_GET['anclaje']) && $_GET['anclaje'] != ''){                     $location .= "&#".$_GET['anclaje'] ; 	}
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_GET['prm_add']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'prm_add';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_permisos.php';
}
//formulario para editar
if ( !empty($_GET['prm_del']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'prm_del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_permisos.php';
}
//se borra un dato
if ( !empty($_GET['perm']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'perm';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_permisos.php';	
}
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Mantencion de Permisos para Superadministradores</title>
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
            <i class="fa fa-dashboard"></i> Mantencion de Permisos para superadministradores
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Permiso creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Permiso editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Permiso borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// SE TRAE UN LISTADO DE TODOS LOS PERMISOS ASIGNADOS SOLO A UN USUARIO
$arrPermisos = array();
$query =
"SELECT 
core_permisos.idAdmpm, 
core_permisos.Nombre AS Nombre_permiso,
core_permisos_cat.Nombre AS Categoria,
(SELECT COUNT(idPermisos) FROM usuarios_permisos WHERE idAdmpm = core_permisos.idAdmpm AND idUsuario = {$_GET['id']}) AS contar,
(SELECT idPermisos FROM usuarios_permisos WHERE idAdmpm = core_permisos.idAdmpm AND idUsuario = {$_GET['id']}) AS idpermiso,
(SELECT level FROM usuarios_permisos WHERE idAdmpm = core_permisos.idAdmpm AND idUsuario = {$_GET['id']}) AS level
FROM `core_permisos`
INNER JOIN `core_permisos_cat`     ON core_permisos_cat.id_pmcat        = core_permisos.id_pmcat
ORDER BY Categoria ASC,  Nombre_permiso ASC  
";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPermisos,$row );
}
mysql_free_result($resultado);
?>
 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Usuarios</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Usuario</th> 
        <th width="160">Acciones</th>
        <th width="160">Permisos</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
	<?php foreach ($arrPermisos as $permiso) { ?>
  <tr> 
   <td><a name="<?php echo $permiso['idAdmpm'] ?>"></a><?php echo $permiso['Categoria']; ?> - <?php echo $permiso['Nombre_permiso']; ?></td> 
   <td>
		<?php $w='&anclaje='.$permiso['idAdmpm'];?>
        <ul class="interruptor">   
           <?php if ( $permiso['contar']=='1' ) {?>   
            <li class="primer_int"><a href="<?php echo $location; ?>&prm_del=<?php echo $permiso['idpermiso'].$w; ?>">OFF</a></li>
            <li class="ultimo_int on"><a href="#">ON</a></li>
           <?php } else {?>
            <li class="primer_int on"><a href="#">OFF</a></li>
            <li class="ultimo_int"><a href="<?php echo $location; ?>&prm_add=<?php echo $permiso['idAdmpm'].$w; ?>">ON</a></li>
           <?php }?>    
        </ul>
  </td>
  <td>
 
  <?php if ($permiso['level'] > 0){ ?>
  <a href="<?php echo $location.'&perm='.$permiso['idpermiso'].'&mod=1'.$w ?>" title="Solo ver"                       class="icon-number-1 info-tooltip <?php if ($permiso['level'] == 1) { echo 'icon-number-selected';} ?>"></a>
  <a href="<?php echo $location.'&perm='.$permiso['idpermiso'].'&mod=2'.$w ?>" title="Ver - Editar"                   class="icon-number-2 info-tooltip <?php if ($permiso['level'] == 2) { echo 'icon-number-selected';} ?>"></a>
  <a href="<?php echo $location.'&perm='.$permiso['idpermiso'].'&mod=3'.$w ?>" title="Ver - Editar - Crear"           class="icon-number-3 info-tooltip <?php if ($permiso['level'] == 3) { echo 'icon-number-selected';} ?>"></a>
  <a href="<?php echo $location.'&perm='.$permiso['idpermiso'].'&mod=4'.$w ?>" title="Ver - Editar - Crear - Borrar"  class="icon-number-4 info-tooltip <?php if ($permiso['level'] == 4) { echo 'icon-number-selected';} ?>"></a>
  
  <?php } ?>
  
  </td> 
 </tr> 
 <?php } ?>
                    
	</tbody>
</table>
   
</div>
</div>

<?php
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                       $location .= "&search=".$_GET['search'] ; 	}
?>
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
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
//Se crea la variable con la ubicacion
	$z="WHERE usuarios_listado.tipo='SuperAdmin'";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z .=" AND usuarios_listado.Nombre LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idUsuario FROM `usuarios_listado` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
usuarios_listado.idUsuario,
usuarios_listado.usuario,
usuarios_listado.tipo, 
usuarios_listado.Nombre,
usuarios_listado.Ultimo_acceso,
detalle_general.Nombre AS estado
FROM `usuarios_listado`
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = usuarios_listado.Estado
".$z."
ORDER BY usuarios_listado.tipo ASC, usuarios_listado.usuario ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Usuario</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>

</div>
                      
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Usuarios</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="209">Usuario</th>
        <th width="472">Nombre del usuario</th>
        <th width="160">Ultimo acceso</th>
        <th width="160">Tipo Usuario</th>
        <th width="120">Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['usuario']; ?></td>
			<td><?php echo $usuarios['Nombre']; ?></td>
            <td><?php echo $usuarios['Ultimo_acceso']; ?></td>
			<td><?php echo $usuarios['tipo']; ?></td>
			<td><?php echo $usuarios['estado']; ?></td>
			<td>
			<a href="<?php echo $location.'&id='.$usuarios['idUsuario']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a>
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