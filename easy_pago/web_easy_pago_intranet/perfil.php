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
$location = "perfil.php";

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Mi Perfil</title>
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
//Se consulta por las recargas del usuario

$query = "SELECT Nombre,Rut,fNacimiento,Direccion,Fono1,Fono2,email
FROM `clientes_listado`
WHERE idCliente = {$arrCliente['idCliente']}
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

//Se llaman a las partes de los menus		
require_once 'core/navbar_principal.php';
require_once 'core/navbar_sub.php';
			
?>
		
		<div class="main" style="min-height:600px;">
		  <div class="main-inner">
			<div class="container">
				
				<?php 
				//Listado de errores no manejables
				if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Perfil editado correctamente';}
				//Manejador de errores
				if(isset($error)&&$error!=''){echo notifications_list_2($error);};?>				
				
			  <div class="row">
				
				<div class="span6">
					
					
					<div class="widget widget-table action-table">
						<div class="widget-header"> 
							<i class="icon-th-list"></i><h3>Mis Datos Personales</h3>
						</div>
					
						<div class="widget-content">
							<table class="table table-striped table-bordered">
								<tbody>
						
									<tr><td>Nombre</td>               <td><?php echo $rowdata['Nombre']; ?></td></tr>
									<tr><td>DNI</td>                  <td><?php echo $rowdata['Rut']; ?></td></tr>
									<tr><td>Fecha de Nacimiento</td>  <td><?php echo fecha_estandar($rowdata['fNacimiento']); ?></td></tr>
									<tr><td>Direccion</td>            <td><?php echo $rowdata['Direccion']; ?></td></tr>
									<tr><td>Telefono Fijo</td>        <td><?php echo $rowdata['Fono1']; ?></td></tr>
									<tr><td>Telefono Movil</td>       <td><?php echo $rowdata['Fono2']; ?></td></tr>
									<tr><td>Email</td>                <td><?php echo $rowdata['email']; ?></td></tr>
									
								</tbody>
							</table>
							
							
								
								
						</div>
						
						<div class="form-group" style="margin-top:15px;">
							<div class="col-sm-offset-2 col-sm-10">	
								<a class="btn btn-primary fright" href="perfil_mod.php" style="margin-left:15px;">Modificar Perfil</a>
								<a class="btn btn-primary fright" href="password_mod.php" >Modificar Contraseña</a>
							</div>
						</div>
						<div class="clearfix"></div>	
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
	</body>
</html>
