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
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
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
$location = "vender.php";
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para editar
if ( !empty($_POST['submit']) )  {
	//Llamamos al formulario
	$form_obligatorios = 'Fono,Monto';
	$form_trabajo= 'filtro';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/z_venta.php';
}

error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Venta</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		<link href="css/font-awesome.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/pages/dashboard.css" rel="stylesheet">
		
	</head>
	<body>


<?php 
//Se llaman a las partes de los menus		
require_once 'core/navbar_principal.php';
require_once 'core/navbar_sub.php';
			
?>
		
	
	
	
	
		<div class="main" style="min-height:600px;">
		  <div class="main-inner">
			<div class="container">
				<?php 
				//Listado de errores no manejables
				if (isset($_GET['sell']))  {$error['sell'] 	  = 'sucess/Venta realizada correctamente';}
				//Manejador de errores
				if(isset($error)&&$error!=''){echo notifications_list_2($error);};?>
			  <div class="row">
				
				<div class="span6">
					
					
					<div class="widget widget-table action-table">
						<div class="widget-header"> 
							<i class="icon-th-list"></i><h3>Venta de Pines</h3>
						</div>
					
						<div class="widget-content">
							<form method="post" class="form-horizontal" style="margin:2%;" name="form1">
								
								
								<?php 
								//Se verifican si existen los datos
								if(isset($Fono)) {    $x1  = $Fono;   }else{$x1  = '';}
								if(isset($Monto)) {   $x2  = $Monto;  }else{$x2  = '';}
					
								//se dibujan los inputs
								echo form_input_phone('Numero Telefonico','Fono', $x1, 2);
								echo form_select('Monto','Monto', $x2, 2, 'idPin', 'Nombre', 'core_pines', 'idPin>3', $dbConn);
								?> 
								
								<div class="form-group" style="margin-top:15px;">
									<div class="col-sm-offset-2 col-sm-10">
										<input name="submit" type="submit" class="btn btn-primary fright" value="Siguiente">
									</div>
								</div>
								  
								<div class="clearfix"></div>
							</form>
							
						</div>
					</div>
					
					
				</div>
				
				
			  </div>
			  
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
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
						
	</body>
</html>
