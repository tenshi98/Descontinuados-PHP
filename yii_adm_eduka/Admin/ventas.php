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
$original = "ventas.php";
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
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Nombre,email,Rut,fNacimiento,idSistema';
	$form_trabajo= 'update';
	require_once '../XRXS_2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Usuario creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Usuario editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Usuario borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['detalle']) ) { // Se trae un listado 
$arrVentas = array();
$query = "SELECT
carro_meses.Nombre AS Mes,
clientes_cursos_comprados.Ano,
clientes_cursos_comprados.ValorActual,
clientes_cursos_comprados.descuento,
productos_listado.Titulo,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno
			
FROM `clientes_cursos_comprados`
			
LEFT JOIN `productos_listado`   ON productos_listado.idProducto    = clientes_cursos_comprados.idProducto
LEFT JOIN `clientes_listado`   ON clientes_listado.idCliente    = productos_listado.idCliente
LEFT JOIN `carro_meses`         ON carro_meses.idMes               = clientes_cursos_comprados.Mes

WHERE  clientes_cursos_comprados.Mes = ".$_GET['viewCliente']." AND productos_listado.idCliente=".$_GET['detalle']." ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVentas,$row );
}?>

<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div>
			<h5><?php echo 'Ventas de '.$arrVentas[0]['Nombre'].' '.$arrVentas[0]['Apellido_Paterno'].' con fecha: '.$arrVentas[0]['Mes'].' de '.$arrVentas[0]['Ano'] ?></h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
		<tr role="row">
			<th>#</th>
			<th>Curso</th>
			<th>Valor Venta</th>
			<th>Descuento</th>
			<th>Pagar</th>
		</tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
   

		<?php 
		$nn=1;
		$suma=0;
		foreach($arrVentas as $producto) {?>
			<tr>
				<td><?php echo $nn ?></td>
				<td><?php echo $producto['Titulo'] ?></td>
				<td><?php echo Valores_sd($producto['ValorActual']) ?></td>
				<td><?php echo $producto['descuento'].' % Desc.' ?></td>
												
				<?php
				$sub_total=$producto['ValorActual'];
				//Calculo del total
				if (isset($producto['descuento'])&&$producto['descuento']!=''){
					$total = $sub_total-(($sub_total/100)*$producto['descuento']);
				}else{
					$total = $sub_total;
				}
				$porcentaje=50;
				$total = $total-(($total/100)*$porcentaje);
				?>
				<td><?php echo Valores_sd($total) ?></td>
			</tr>
			<?php
			$nn++;
			$suma = $suma+$total;
		}?>	
		<tr>
			<td></td>
			<td></td>
			<td colspan="2"><strong>Total a Pagar</strong></td>
			<td><strong><?php echo Valores_sd($suma) ?></strong></td>
		</tr>
								
   
	</tbody>
</table>
</div>
</div>
 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location.'&viewCliente='.$_GET['viewCliente']; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['viewCliente']) ) { 
 // Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT idCliente,Nombre,Apellido_Paterno
FROM `clientes_listado`
WHERE clientes_listado.idTipoCliente = 2
ORDER BY Apellido_Paterno ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Instructores</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre del Instructor</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['Nombre'].' '.$usuarios['Apellido_Paterno']; ?></td>
			<td>
				<?php if ($rowlevel['level_editar']==1){?><a href="<?php echo $location.'&viewCliente='.$_GET['viewCliente'].'&detalle='.$usuarios['idCliente']; ?>" title="Ver ventas" class="icon-ver info-tooltip"></a><?php } ?>
			</td>
		</tr>
    <?php } ?>                    
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
 } elseif ( ! empty($_GET['view']) ) { 
// Se trae un listado 
$arrVentas = array();
$query = "SELECT
carro_meses.Nombre AS Mes,
clientes_cursos_comprados.Ano,
clientes_cursos_comprados.ValorActual,
clientes_cursos_comprados.descuento,
productos_listado.Titulo
			
FROM `clientes_cursos_comprados`
			
LEFT JOIN `productos_listado`   ON productos_listado.idProducto    = clientes_cursos_comprados.idProducto
LEFT JOIN `carro_meses`         ON carro_meses.idMes               = clientes_cursos_comprados.Mes

WHERE  clientes_cursos_comprados.Mes = ".$_GET['view']."";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVentas,$row );
}?>
                                
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5><?php echo 'Ventas de : '.$arrVentas[0]['Mes'].' de '.$arrVentas[0]['Ano'] ?></h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
		<tr role="row">
			<th>#</th>
			<th>Curso</th>
			<th>Valor Venta</th>
			<th>Descuento</th>
			<th>Pagar</th>
		</tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
   

		<?php 
		$nn=1;
		$suma=0;
		foreach($arrVentas as $producto) {?>
			<tr>
				<td><?php echo $nn ?></td>
				<td><?php echo $producto['Titulo'] ?></td>
				<td><?php echo Valores_sd($producto['ValorActual']) ?></td>
				<td><?php echo $producto['descuento'].' % Desc.' ?></td>
												
				<?php
				$sub_total=$producto['ValorActual'];
				//Calculo del total
				if (isset($producto['descuento'])&&$producto['descuento']!=''){
					$total = $sub_total-(($sub_total/100)*$producto['descuento']);
				}else{
					$total = $sub_total;
				}
				$porcentaje=50;
				$total = $total-(($total/100)*$porcentaje);
				?>
				<td><?php echo Valores_sd($total) ?></td>
			</tr>
			<?php
			$nn++;
			$suma = $suma+$total;
		}?>	
		<tr>
			<td></td>
			<td></td>
			<td colspan="2"><strong>Total a Pagar</strong></td>
			<td><strong><?php echo Valores_sd($suma) ?></strong></td>
		</tr>
										
										
										
   
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
// Se trae un listado 
$arrVentas = array();
$query = "SELECT
clientes_cursos_comprados.Mes AS Meses,
carro_meses.Nombre AS Mes,
clientes_cursos_comprados.Ano,
count(clientes_cursos_comprados.idComprados) AS cuenta

FROM `clientes_cursos_comprados`
			
LEFT JOIN `productos_listado`   ON productos_listado.idProducto    = clientes_cursos_comprados.idProducto
LEFT JOIN `carro_meses`         ON carro_meses.idMes               = clientes_cursos_comprados.Mes
			
GROUP BY clientes_cursos_comprados.Ano, clientes_cursos_comprados.Mes
ORDER BY clientes_cursos_comprados.Mes ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVentas,$row );
}?>
<div class="form-group">
<form class="form-horizontal" ></form>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Cursos Vendidos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">

                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
   
		<?php 
		filtrar($arrVentas, 'Ano');
		foreach($arrVentas as $ano=>$productos) { ?>
			<tr>
				<td><strong><?php echo $ano; ?></strong></td>
				<td><strong>N° Vendidos</strong></td>
				<td width="120"><strong>Acciones</strong></td>
			</tr>
										
			<?php foreach($productos as $producto) {?>
				<tr>
					<td><?php echo $producto['Mes'] ?></td>
					<td><?php echo $producto['cuenta'].' vendidos' ?></td>
					<td>
					<?php if ($rowlevel['level_ver']==1){?><a href="<?php echo $location.'&view='.$producto['Meses']; ?>" title="Ver ventas por Mes" class="icon-ver info-tooltip"></a><?php } ?>
					<?php if ($rowlevel['level_ver']==1){?><a href="<?php echo $location.'&viewCliente='.$producto['Meses']; ?>" title="Ver ventas por Instructor" class="icon-ver info-tooltip"></a><?php } ?>
					</td>
				</tr>
			<?php
			}
									
		} ?>
   
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
    <script src="assets/js/main.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>