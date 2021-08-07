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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esMedico.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_medico.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_medico.php';
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
//Se consulta por los datos del usuario
$query = "SELECT  Nombre,Fono1,Especialidad, idDisponibilidad
FROM `medicos_listado`
WHERE idMedico = {$arrMedico['idMedico']}
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);


// Se trae un listado con todas las llamadas
$arrLlamadas = array();
$query = "SELECT Fecha, Hora
FROM `medicos_llamadas`
WHERE idMedico = {$arrMedico['idMedico']}
ORDER BY Fecha DESC , Hora DESC
LIMIT 15 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrLlamadas,$row );
}


//Se llaman a las partes de los menus		
require_once 'core/navbar_principal.php';
require_once 'core/navbar_sub.php';
		
		
		
		
?>
		
	
	
	
	
		<div class="main" style="min-height:600px;">
			<div class="main-inner">
				<div class="container">
					
					<?php 
				//Listado de errores 
				if(!isset($rowdata['Nombre']) or $rowdata['Nombre']==''){$error['Nombre'] = "error/No ha ingresado su Nombre";}
				if(!isset($rowdata['Fono1']) or $rowdata['Fono1']==''){$error['Fono1'] = "error/No ha ingresado su Numero Telefonico";}
				if(!isset($rowdata['Especialidad']) or $rowdata['Especialidad']==''){$error['Especialidad'] = "error/No ha Seleccionado su especializacion";}
				if(!isset($rowdata['idDisponibilidad']) or $rowdata['idDisponibilidad']!='1'){$error['idDisponibilidad'] = "error/Esta como no disponible, si no cambia a disponible no recibira llamadas";}
				//Manejador de errores
				if(isset($error)&&$error!=''){echo notifications_list_3($error);};?>
	
			  
					<div class="row">
				
						<div class="span6">
					
					
							<div class="widget widget-table action-table">
								<div class="widget-header"> 
									<i class="icon-th-list"></i><h3>Mis Ultimas Llamadas Recibidas</h3>
								</div>
							
								<div class="widget-content">
									<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Fecha</th>
												<th>Hora</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($arrLlamadas as $llamadas) { ?>
												<tr>		
													<td><?php echo $llamadas['Fecha']; ?></td>		
													<td><?php echo $llamadas['Hora']; ?></td>		
												</tr>
											<?php } ?> 
										</tbody>
									</table>
								</div>
							</div>
					
					
						</div>
				
						<div class="span6">
					
							
				 
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
