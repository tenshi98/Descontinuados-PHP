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
$original = "espia_listado.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                       $location .= "&search=".$_GET['search'] ; 	}
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Nombre,Margen,grid_color,grid_border,grid_shadow,grid_img,body_col';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/espia_categorias.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit_normal']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idEspiaCat,Nombre,Margen,grid_color,grid_border,grid_shadow,grid_img,body_col';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/espia_categorias.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit_img']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'update_img';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/espia_categorias.php';
}
//se borra un dato
if ( !empty($_GET['del_img']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del_img';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/espia_categorias.php';	
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/espia_categorias.php';	
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Imagen Creada correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Imagen Modificada correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Imagen borrada correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['view']) ) { 
// Se traen todos los datos
$query = "SELECT 
espia_listado.idEspiaListado,
espia_categorias.Nombre AS nombre_categoria,
clientes_listado.Nombre AS nombre_cliente,
clientes_listado.Apellido_Paterno,
clientes_listado.Apellido_Materno,
espia_listado.Fecha,
espia_listado.Texto,
espia_listado.Nrecorrido,
espia_listado.Nparada,
espia_estado.Nombre AS estado

FROM `espia_listado`
LEFT JOIN `espia_categorias`   ON espia_categorias.idEspiaCat   = espia_listado.idEspiaCat
LEFT JOIN `clientes_listado`   ON clientes_listado.idCliente    = espia_listado.idCliente
LEFT JOIN `espia_estado`       ON espia_estado.idEstado         = espia_listado.idEstado
WHERE espia_listado.idEspiaListado={$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado); 
//Actualizo la notificacion
$query  = "UPDATE `espia_listado` SET idEstado=2 WHERE idEspiaListado = '{$_GET['view']}'";
$result = mysql_query($query, $dbConn);

?>
 
<div class="col-lg-6 fcenter">
	<div class="box">	
		<header>		
			<h5>Ver Datos de la notificacion</h5>		
			<div class="toolbar"></div>	
		</header>
        <div class="body" >
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['nombre_cliente'].' '.$rowdata['Apellido_Paterno'].' '.$rowdata['Apellido_Materno']; ?></p>
            <p class="text-muted"><strong>Categoria : </strong><?php echo $rowdata['nombre_categoria']; ?></p>
            <p class="text-muted"><strong>Fecha : </strong><?php echo Fecha_completa($rowdata['Fecha']); ?></p>
            <p class="text-muted"><strong>Estado : </strong><?php echo $rowdata['estado']; ?></p>
			<p class="text-muted"><strong>Recorrido : </strong><?php echo $rowdata['Nrecorrido']; ?></p>
            <p class="text-muted"><strong>Numero Parada : </strong><?php echo $rowdata['Nparada']; ?></p>
            <p class="text-muted" style="word-wrap: break-word !important; white-space: normal;" ><strong>Notificaciones : </strong><?php echo $rowdata['Texto']; ?></p>

        </div>
	</div>
</div>


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
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idEspiaCat FROM `espia_listado` ";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrEspia = array();
$query = "SELECT 
espia_listado.idEspiaListado,
espia_categorias.Nombre AS nombre_cateforia,
clientes_listado.Nombre AS nombre_cliente,
clientes_listado.Apellido_Paterno,
espia_listado.Fecha,
espia_estado.Nombre AS estado

FROM `espia_listado`
LEFT JOIN `espia_categorias`   ON espia_categorias.idEspiaCat   = espia_listado.idEspiaCat
LEFT JOIN `clientes_listado`   ON clientes_listado.idCliente    = espia_listado.idCliente
LEFT JOIN `espia_estado`       ON espia_estado.idEstado         = espia_listado.idEstado
ORDER BY espia_listado.idEstado ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEspia,$row );
}?>
                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Categorias</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
		<th width="120">Fecha</th>
        <th>Categoria</th>
		<th>Cliente</th>
        <th width="120">Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrEspia as $notas) { ?>
    	<tr class="odd">
            <td><?php echo $notas['Fecha']; ?></td>
			<td><?php echo $notas['nombre_cateforia']; ?></td>
			<td><?php echo $notas['nombre_cliente'].' '.$notas['Apellido_Paterno']; ?></td>
			<td><?php echo $notas['estado']; ?></td> 
			<td>
				<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&view='.$notas['idEspiaListado']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
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