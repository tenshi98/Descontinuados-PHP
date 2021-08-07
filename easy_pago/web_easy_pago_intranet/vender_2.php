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
if ( !empty($_POST['submit_venta']) )  {
	//Llamamos al formulario
	$form_obligatorios = 'Monto,idCliente,idVendedor';
	$form_trabajo= 'venta';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/z_venta.php';
}
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
//Conecto a la base de datos externa
function conectar1 ($servidor, $usuario, $pass, $base) {
	$db_con = mysql_connect ($servidor,$usuario,$pass);
	if (!$db_con) return false; 
	if (!mysql_select_db ($base, $db_con)) return false;
	if (!mysql_query("SET NAMES 'utf8'")) return false;
	return $db_con; 
}
$dbConn2 = conectar1("190.98.210.37","userdbscl","petland","llappaperu");


//Selecciono datos del usuario
$query = "SELECT id_ejecutiv, nom_ejecutiv, fono_ejecutiv, mail_ejecutiv
FROM ejecutivos  
WHERE id_ejecutiv = '{$_GET["ejec"]}' ";
$resultado = mysql_query ($query, $dbConn2)or die(mysql_error());
$row_data = mysql_fetch_assoc ($resultado);


//Selecciono datos del usuario
$query = "SELECT Nombre, Valor
FROM core_pines  
WHERE idPin = '{$_GET["mount"]}' ";
$resultado = mysql_query ($query, $dbConn);
$rowmount = mysql_fetch_assoc ($resultado);
	
//Se llaman a las partes de los menus		
require_once 'core/navbar_principal.php';
require_once 'core/navbar_sub.php';
			
?>
		
	
	
	
	
		<div class="main" style="min-height:600px;">
		  <div class="main-inner">
			<div class="container">
				<?php 
				//Listado de errores no manejables
				if (isset($_GET['falta']))  {$error['falta'] 	  = 'sucess/No posee el saldo suficiente para realizar la recarga';}
				if (isset($_GET['error']))  {$error['error'] 	  = 'sucess/No ha ingresado todos los datos obligatorios';}
				//Manejador de errores
				if(isset($error)&&$error!=''){echo notifications_list_2($error);};?>
			  <div class="row">
				
				<div class="span6">
					
					
					<div class="widget widget-table action-table">
						<div class="widget-header"> 
							<i class="icon-th-list"></i><h3>Venta de Pines</h3>
						</div>
					
						<div class="widget-content">
							
							
							<?php if (isset($row_data)&&$row_data!=''){?>
							<form method="post" class="form-horizontal" style="margin:2%;" name="form1">
								
								<h3>Datos de la venta</h3>
								<p><strong>Nombre : </strong><?php echo $row_data['nom_ejecutiv']; ?></p>
								<p><strong>Telefono : </strong><?php echo $row_data['fono_ejecutiv']; ?></p>
								<p><strong>Monto  : </strong><?php echo $rowmount['Nombre']; ?></p>
								
								
								 
								
								<div class="form-group" style="margin-top:15px;">
									<div class="col-sm-offset-2 col-sm-10">
										<input type="hidden" name="Monto"  value="<?php echo $_GET["mount"];?>">
										<input type="hidden" name="idCliente"  value="<?php echo $_GET["ejec"];?>">
										<input type="hidden" name="idVendedor"  value="<?php echo $arrCliente['idCliente'];?>">
										<input type="hidden" name="Fono"  value="<?php echo $row_data['fono_ejecutiv'];?>">
										<input type="hidden" name="Valor"  value="<?php echo $rowmount['Valor'];?>">
										
										
										<input name="submit_venta" type="submit" class="btn btn-primary fright" value="Confirmar Venta">
									</div>
								</div>
								  
								<div class="clearfix"></div>
							</form>
							<?php }else{ ?>
								<h3>No Existen Datos</h3>
								<p>El numero telefonico ingresado no coincide con ningun cliente de Aaazu</p>
							<?php } ?>
							
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
