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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                                          Seguridad                                                             */
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
$location = "principal.php";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Principal</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/pages/dashboard.css" rel="stylesheet">
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		
	</head>
	<body>


<?php 
$AnoActual = ano_actual();
//Se consulta por el saldo del usuario
$query = "SELECT  Saldo
FROM `clientes_listado`
WHERE idCliente = {$arrCliente['idCliente']}
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

//Se consulta por las recargas y ventas del usuario ordenadas por mes
$arrResumen = array();
$query = "SELECT  
core_meses.idMes,
core_meses.Nombre,
(SELECT SUM(Monto) FROM clientes_recargas WHERE idMes = core_meses.idMes AND Ano = {$AnoActual} AND clientes_recargas.idCliente = {$arrCliente['idCliente']}) AS Recargas,
(SELECT SUM(Monto) FROM clientes_ventas WHERE idMes = core_meses.idMes AND Ano = {$AnoActual} AND clientes_ventas.idCliente = {$arrCliente['idCliente']}) AS Ventas
FROM `core_meses`
ORDER BY core_meses.idMes";
$resultado2 = mysql_query ($query, $dbConn) or die(mysql_error());
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrResumen,$row );
}

//Se consulta por las ventas ordenadas por tipo de pin
$arrVentaPin = array();
$query = "SELECT
core_meses.idMes,
core_meses.Nombre,
(SELECT SUM(Monto) FROM clientes_ventas WHERE idMes = core_meses.idMes AND Ano = {$AnoActual} AND clientes_ventas.idCliente = {$arrCliente['idCliente']} AND Monto = 5 ) AS Pin5,
(SELECT SUM(Monto) FROM clientes_ventas WHERE idMes = core_meses.idMes AND Ano = {$AnoActual} AND clientes_ventas.idCliente = {$arrCliente['idCliente']} AND Monto = 10 ) AS Pin10,
(SELECT SUM(Monto) FROM clientes_ventas WHERE idMes = core_meses.idMes AND Ano = {$AnoActual} AND clientes_ventas.idCliente = {$arrCliente['idCliente']} AND Monto = 20 ) AS Pin20
FROM `core_meses`
ORDER BY core_meses.idMes";
$resultado2 = mysql_query ($query, $dbConn) or die(mysql_error());
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrVentaPin,$row );
}

//Se consulta por las recargas del usuario
$arrRecargas = array();
$query = "SELECT  Fecha, Monto
FROM `clientes_recargas`
WHERE idCliente = {$arrCliente['idCliente']}
ORDER BY Fecha DESC 
LIMIT 10";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRecargas,$row );
}
// Se trae un listado con todas las ventas
$arrVentas = array();
$query = "SELECT Monto, Fecha, Fono
FROM `clientes_ventas`
WHERE idCliente = {$arrCliente['idCliente']}
ORDER BY Fecha DESC 
LIMIT 10";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVentas,$row );
}


//Se llaman a las partes de los menus		
require_once 'core/navbar_principal.php';
require_once 'core/navbar_sub.php';
		
		
		
		
?>
		
	
	
	
	
		<div class="main" style="min-height:600px;">
			<div class="main-inner">
				<div class="container">
			  
					<div class="row">
						<div class="span6">
							<div class="widget widget-table action-table">
								<div class="widget-header"> 
									<i class="icon-th-list"></i><h3>Saldo</h3>
								</div>
							
								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<tbody>
											<tr>		
												<td>Monto Actual</td>		
												<td><?php echo $rowdata['Saldo'].' Soles'; ?></td>		
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					
					

    
    
    			  
					<div class="row">
						<script type="text/javascript">
						  google.load("visualization", "1", {packages:["corechart"]});
						  google.setOnLoadCallback(drawChart);
						  function drawChart() {
							var data = google.visualization.arrayToDataTable([
							  ['Mes', 'Recargas', 'Ventas']
								<?php foreach ($arrResumen as $resumen) { 
									if(isset($resumen['Recargas'])&&$resumen['Recargas']!=''){$recarga = $resumen['Recargas'];}else{$recarga = 0;}
									if(isset($resumen['Ventas'])&&$resumen['Ventas']!=''){$venta = $resumen['Ventas'];}else{$venta = 0;}
									echo ",['".$resumen['Nombre']."',  ".$recarga.",      ".$venta."]";	
								} ?> 
							]);

							var options = {
							  legend: {position: 'top', maxLines: 3},
							  title: 'Resumen',
							  hAxis: {title: 'Meses',  titleTextStyle: {color: '#333'}},
							  vAxis: {minValue: 0}
							};

							var chart = new google.visualization.AreaChart(document.getElementById('Resumen'));
							chart.draw(data, options);
						  }
						</script>
						<div class="span12">
							<div class="widget">
								<div class="widget-header">
									<i class="icon-bar-chart"></i>
									<h3>Resumen de Recargas y Ventas</h3>
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<div id="Resumen" style="width: 100%; height: 300px;"></div>
								</div>
								<!-- /widget-content -->
							</div>
						</div>	
					</div>
					
					
					<div class="row">
						<script type="text/javascript">
						  google.load("visualization", "1", {packages:["corechart"]});
						  google.setOnLoadCallback(drawChart);
						  function drawChart() {
							var data = google.visualization.arrayToDataTable([
							  ['Mes', 'Pin 5 Soles', 'Pin 10 Soles', 'Pin 20 Soles']
								<?php foreach ($arrVentaPin as $pin) { 
									if(isset($pin['Pin5'])&&$pin['Pin5']!=''){$Pin5 = $pin['Pin5'];}else{$Pin5 = 0;}
									if(isset($pin['Pin10'])&&$pin['Pin10']!=''){$Pin10 = $pin['Pin10'];}else{$Pin10 = 0;}
									if(isset($pin['Pin20'])&&$pin['Pin20']!=''){$Pin20 = $pin['Pin20'];}else{$Pin20 = 0;}
									echo ",['".$pin['Nombre']."',".$Pin5.",".$Pin10.",".$Pin20."]";	
								} ?> 
							]);

							var options = {
							  legend: {position: 'top', maxLines: 3},
							  title: 'Resumen',
							  hAxis: {title: 'Meses',  titleTextStyle: {color: '#333'}},
							  vAxis: {minValue: 0}
							};

							var chart = new google.visualization.AreaChart(document.getElementById('Resumen2'));
							chart.draw(data, options);
						  }
						</script>
						<div class="span12">
							<div class="widget">
								<div class="widget-header">
									<i class="icon-bar-chart"></i>
									<h3>Tipos de Pines Vendidos</h3>
								</div>
								<!-- /widget-header -->
								<div class="widget-content">
									<div id="Resumen2" style="width: 100%; height: 300px;"></div>
								</div>
								<!-- /widget-content -->
							</div>
						</div>	
					</div>
					
		
				  
			  
					<div class="row">
				
						<div class="span6">
					
					
							<div class="widget widget-table action-table">
								<div class="widget-header"> 
									<i class="icon-th-list"></i><h3>Mis Ultimas Recargas</h3>
								</div>
							
								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Fecha</th>
												<th>Monto</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($arrRecargas as $recargas) { ?>
												<tr>		
													<td><?php echo $recargas['Fecha']; ?></td>		
													<td><?php echo $recargas['Monto'].' Soles'; ?></td>		
												</tr>
											<?php } ?> 
										</tbody>
									</table>
								</div>
							</div>
					
					
						</div>
				
						<div class="span6">
					
							<div class="widget widget-table action-table">
								<div class="widget-header"> 
									<i class="icon-th-list"></i><h3>Mis Ultimas Ventas</h3>
								</div>
							
								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Fecha</th>
												<th>Monto</th>
												<th>Fono</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($arrVentas as $ventas) { ?>
												<tr>		
													<td><?php echo $ventas['Fecha']; ?></td>
													<td><?php echo $ventas['Monto'].' Soles'; ?></td>		
													<td><?php echo $ventas['Fono']; ?></td>		
												</tr>
											<?php } ?>  
										</tbody>
									</table>
								</div>
							</div>
				 
						</div>
				<!-- /span6 --> 
					</div>
			  
			  
			  
			  
			  
			  <!-- /row --> 
				</div>
				<!-- /container --> 
			</div>
			<!-- /main-inner --> 
		</div>
		<!-- /extra -->
		<?php require_once 'core/footer.php'; ?> 
		<!-- Le javascript
		================================================== --> 
		<!-- Placed at the end of the document so the pages load faster --> 
		<script src="js/jquery-1.7.2.min.js"></script> 
		<script src="js/bootstrap.js"></script>
		<script src="js/base.js"></script> 
	</body>
</html>
