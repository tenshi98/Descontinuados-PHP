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
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Ver Datos del Cliente</title>
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
              <a href="principal.php" class="navbar-brand">
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
            <i class="fa fa-dashboard"></i> Ver Datos del Cliente
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
// Se traen todos los datos de mi usuario
$query = "SELECT 
clientes_listado.idTipo, 
clientes_listado.email, 
clientes_listado.Nombre, 
clientes_listado.Rut, 
clientes_listado.fNacimiento, 
clientes_listado.Fono1, 
clientes_listado.Fono2,
clientes_listado.Departamento, 
clientes_listado.Provincia, 
clientes_listado.Distrito, 
clientes_listado.Direccion, 
clientes_listado.img AS Direccion_img,
clientes_sexo.Nombre AS Sexo,
clientes_tipos.Nombre AS TipoCliente

FROM `clientes_listado`
LEFT JOIN `clientes_tipos`   ON clientes_tipos.idTipo     = clientes_listado.idTipo
LEFT JOIN `clientes_sexo`    ON clientes_sexo.idSexo      = clientes_listado.idSexo

WHERE clientes_listado.idCliente = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	


// Se trae un listado con todas las observaciones el cliente
$arrObservaciones = array();
$query = "SELECT 
usuarios_listado.Nombre AS nombre_usuario,
clientes_observaciones.Fecha,
clientes_observaciones.Observacion
FROM `clientes_observaciones`
LEFT JOIN `usuarios_listado`   ON usuarios_listado.idUsuario     = clientes_observaciones.idUsuario
WHERE clientes_observaciones.idCliente = {$_GET['view']}
ORDER BY clientes_observaciones.idObservacion ASC 
LIMIT 30";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrObservaciones,$row );
}



// Se trae un listado con todas las recargas
$arrRecargas = array();
$query = "SELECT 
usuarios_listado.Nombre AS nombre_usuario,
clientes_recargas.Fecha,
clientes_recargas.Monto
FROM `clientes_recargas`
LEFT JOIN `usuarios_listado`   ON usuarios_listado.idUsuario     = clientes_recargas.idUsuario
WHERE clientes_recargas.idCliente = {$_GET['view']}
ORDER BY clientes_recargas.Fecha DESC 
LIMIT 30";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRecargas,$row );
}

// Se trae un listado con todos los trabajos realizados
if($rowdata['idTipo']==1){
	$z = "WHERE clientes_trabajos.idTrabajador = {$_GET['view']}";
}else{
	$z = "WHERE clientes_trabajos.idOfertador = {$_GET['view']}";
}
$arrTrabajos = array();
$query = "SELECT 
Ofertador.Nombre AS NombreOfertador,
Trabajador.Nombre AS NombreTrabajador,
clientes_trabajos.Fecha,
clientes_trabajos_estado.Nombre AS Estado


FROM `clientes_trabajos`
LEFT JOIN `clientes_listado`  Ofertador   ON Ofertador.idCliente                  = clientes_trabajos.idOfertador
LEFT JOIN `clientes_listado`  Trabajador  ON Trabajador.idCliente                 = clientes_trabajos.idTrabajador
LEFT JOIN `clientes_trabajos_estado`      ON clientes_trabajos_estado.idEstado    = clientes_trabajos.idEstado

".$z."
ORDER BY clientes_trabajos.Fecha DESC 
LIMIT 30";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTrabajos,$row );
}

?>


<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div>
			<h5>Datos</h5>
			
			<ul class="nav nav-tabs pull-right">
				<li class="active"><a href="#basicos" data-toggle="tab">Datos</a></li>
				<li class=""><a href="#observaciones" data-toggle="tab">Observaciones</a></li>
				<li class=""><a href="#recargas" data-toggle="tab">Recargas</a></li>
				<li class=""><a href="#trabajos" data-toggle="tab">Trabajos</a></li>
			</ul>	
		</header>
        <div id="div-3" class="tab-content">
			
			<div class="tab-pane fade active in" id="basicos">
				<div class="wmd-panel" style="padding:15px;">
									
					
					<div class="col-lg-4">
						<?php if ($rowdata['Direccion_img']=='') { ?>
							<img style="margin-top:10px;" class="media-object img-thumbnail user-img width100" alt="User Picture" src="img/usr.png">
						<?php }else{  ?>
							<img style="margin-top:10px;" class="media-object img-thumbnail user-img width100" alt="User Picture" src="upload/<?php echo $rowdata['Direccion_img']; ?>">
						<?php }?>
					</div>
					<div class="col-lg-8">
						<h2 class="text-primary">Datos Basicos</h2>
						<p class="text-muted"><strong>Tipo : </strong><?php echo $rowdata['TipoCliente']; ?></p>
						<p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombre']; ?></p>
						<p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
						<p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['fNacimiento']); ?></p>
						<p class="text-muted"><strong>Sexo : </strong><?php echo $rowdata['Sexo']; ?></p>
						<p class="text-muted"><strong>Departamento : </strong><?php echo $rowdata['Departamento']; ?></p>
						<p class="text-muted"><strong>Provincia : </strong><?php echo $rowdata['Provincia']; ?></p>
						<p class="text-muted"><strong>Distrito : </strong><?php echo $rowdata['Distrito']; ?></p>
						<p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Direccion']; ?></p>
						<p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
						<p class="text-muted"><strong>Telefono 1 : </strong><?php echo $rowdata['Fono1']; ?></p>
						<p class="text-muted"><strong>Telefono 2 : </strong><?php echo $rowdata['Fono2']; ?></p>
					</div>	
					<div class="clearfix"></div>
					
	
			
				</div>
			</div>
			
			<div class="tab-pane fade" id="observaciones">
				<div class="wmd-panel">
					<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
						<thead>
							<tr role="row">
								<th>Autor</th>
								<th>Fecha</th>
								<th>Observacion</th>
							</tr>
						</thead>
						<tbody role="alert" aria-live="polite" aria-relevant="all">
						<?php foreach ($arrObservaciones as $observaciones) { ?>
							<tr class="odd">		
								<td><?php echo $observaciones['nombre_usuario']; ?></td>
								<td><?php echo $observaciones['Fecha']; ?></td>		
								<td class="word_break"><?php echo $observaciones['Observacion']; ?></td>	
							</tr>
						<?php } ?>                    
						</tbody>
					</table>
				</div>
			</div>
			
			
			
			
			<div class="tab-pane fade" id="recargas">
				<div class="wmd-panel">
					<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
						<thead>
							<tr role="row">
								<th>Usuario</th>
								<th>Fecha</th>
								<th>Monto</th>
							</tr>
						</thead>
						<tbody role="alert" aria-live="polite" aria-relevant="all">
						<?php foreach ($arrRecargas as $recargas) { ?>
							<tr class="odd">		
								<td><?php echo $recargas['nombre_usuario']; ?></td>
								<td><?php echo $recargas['Fecha']; ?></td>		
								<td><?php echo $recargas['Monto']; ?></td>		
							</tr>
						<?php } ?>                    
						</tbody>
					</table>
				</div>
			</div>
			
			
			
			<div class="tab-pane fade" id="trabajos">
				<div class="wmd-panel">
					<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
						<thead>
							<tr role="row">
								<th>Ofertador</th>
								<th>Trabajador</th>
								<th>Fecha</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody role="alert" aria-live="polite" aria-relevant="all">
						<?php foreach ($arrTrabajos as $trabajos) { ?>
							<tr class="odd">		
								<td><?php echo $trabajos['NombreOfertador']; ?></td>
								<td><?php echo $trabajos['NombreTrabajador']; ?></td>
								<td><?php echo $trabajos['Fecha']; ?></td>		
								<td><?php echo $trabajos['Estado']; ?></td>		
							</tr>
						<?php } ?>                    
						</tbody>
					</table>
				</div>
			</div>
			
	
			
        </div>	
	
	</div>
</div>










<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="#" onclick="history.back()" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>

         
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
