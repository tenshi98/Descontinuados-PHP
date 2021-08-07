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
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
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
$original = "transantiago_orden.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != '') {                    $location .= "&search=".$_GET['search'] ; 	}
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//se edita un dato
if ( !empty($_GET['up_orden']) )     {
	//Llamamos al formulario
	$location .= "&view=".$_GET['view'] ;
	$form_obligatorios = '';
	$form_trabajo= 'up_orden';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';	
}
//se edita un dato
if ( !empty($_GET['down_orden']) )     {
	//Llamamos al formulario
	$location .= "&view=".$_GET['view'] ;
	$form_obligatorios = '';
	$form_trabajo= 'down_orden';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';	
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Recorrido creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Recorrido editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Recorrido borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>			
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['view']) ) { 
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
clientes_listado.idCliente,
transantiago_recorridos.Nombre AS recorrido,
clientes_listado.PPU,
buses_marcas.Nombre AS Nombre_marca,
buses_modelos.Nombre AS Nombre_modelo,
transantiago_conductores.Nombre AS Nombre_cond,
transantiago_conductores.Apellido_Paterno AS Apellido_cond,
detalle_general.Nombre AS estado,
clientes_disponibilidad.Nombre AS disponibilidad,
clientes_listado.Orden

FROM `clientes_listado`
LEFT JOIN `transantiago_recorridos`     ON transantiago_recorridos.idRecorrido           = clientes_listado.idRecorrido
LEFT JOIN `buses_marcas`                ON buses_marcas.idMarca                          = clientes_listado.idMarca
LEFT JOIN `buses_modelos`               ON buses_modelos.idModelo                        = clientes_listado.idModelo
LEFT JOIN `detalle_general`             ON detalle_general.id_Detalle                    = clientes_listado.Estado
LEFT JOIN `transantiago_conductores`    ON transantiago_conductores.idConductor          = clientes_listado.idConductor
LEFT JOIN `clientes_disponibilidad`     ON clientes_disponibilidad.idDisponibilidad      = clientes_listado.idDisponibilidad
WHERE clientes_listado.idRecorrido = {$_GET['view']}
ORDER BY clientes_listado.Orden ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
} 
//Obtengo la ubicacion de la ultima grilla de la pagina
$query = "SELECT  Orden
FROM `clientes_listado`
WHERE idRecorrido = {$_GET['view']}
ORDER BY Orden DESC
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado); 
?>
 <div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Buses del Recorrido <?php echo $arrUsers[0]['recorrido'];?></h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Orden</th>
		<th>Bus</th>
        <th>Conductor Actual</th>
        <th>Estado</th>
		<th>Disponibilidad</th>
		<th width="120">Acciones</th>
    </tr>
	</thead>
               
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php 
	$grill = 1;
	foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['Orden']; ?></td>
			<td><?php echo 'Patente '.$usuarios['PPU'].' - '.$usuarios['Nombre_marca'].' '.$usuarios['Nombre_modelo']; ?></td>
            <td><?php echo $usuarios['Nombre_cond'].' '.$usuarios['Apellido_cond']; ?></td>
            <td><?php echo $usuarios['estado']; ?></td>
			<td><?php echo $usuarios['disponibilidad']; ?></td>
			<td>

			<?php if($grill!=1){?> 			
					<a href="<?php echo $location.'&view='.$_GET['view'].'&up_orden='.$usuarios['idCliente'].'&orden='.$usuarios['Orden'] ?>" title="Subir un nivel" class="icon-up info-tooltip"></a>
				<?php } else {?>
					<a href="#" title="Subir un nivel" class="icon-up info-tooltip"></a>
				<?php } ?> 
				<?php if($usuarios['Orden']!=$row_data['Orden']){?>     
					<a href="<?php echo $location.'&view='.$_GET['view'].'&down_orden='.$usuarios['idCliente'].'&orden='.$usuarios['Orden'] ?>" title="Bajar un nivel" class="icon-down info-tooltip"></a>
				<?php } else {?>			
				<a href="#" title="Bajar un nivel" class="icon-down info-tooltip"></a>		
				<?php } ?>
			</td>	
				
		</tr>
    <?php
	$grill++;
	} ?>                    
	</tbody>
</table>
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
//Le agrego condiciones a la consulta
$z="WHERE idRecorrido > 0";	
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){
	$z .=" AND Nombre LIKE '%{$_GET['search']}%'";
}
//Realizo una consulta para saber el total de elementos existentes
$query1 = "SELECT idRecorrido FROM `transantiago_recorridos` ".$z."";
$registros1 = mysql_query($query1,$dbConn);
$cuenta_registros = mysql_num_rows($registros1);

//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT idRecorrido, Nombre
FROM `transantiago_recorridos`
".$z."
ORDER BY Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>

<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Recorrido</label>
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
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Recorridos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['Nombre']; ?></td>
			<td>   
				<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&view='.$usuarios['idRecorrido']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>
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