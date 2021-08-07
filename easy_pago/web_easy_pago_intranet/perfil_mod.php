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
$location = "perfil.php";
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para editar
if ( !empty($_POST['submit_edit']) )  {
	//se agrega ubicacion
	$location .= "?d=d";
	//Llamamos al formulario
	$form_obligatorios = 'idCliente,Nombre,Rut,Direccion,email';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Modificacion de Perfil</title>
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
//Se consulta por los datos del usuario
$query = "SELECT  Nombre,Rut,fNacimiento,Direccion,Fono1,Fono2,email
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
							<i class="icon-th-list"></i><h3>Modificacion Datos Personales</h3>
						</div>
					
						<div class="widget-content">
							<form method="post" class="form-horizontal" style="margin:2%;" name="form1">
								
								
								<?php 
								//Se verifican si existen los datos
								if(isset($Nombre)) {           $x1  = $Nombre;            }else{$x1  = $rowdata['Nombre'];}
								if(isset($Rut)) {              $x2  = $Rut;               }else{$x2  = $rowdata['Rut'];}
								if(isset($fNacimiento)) {      $x3  = $fNacimiento;       }else{$x3  = $rowdata['fNacimiento'];}
								if(isset($Direccion)) {        $x4  = $Direccion;         }else{$x4  = $rowdata['Direccion'];}
								if(isset($Fono1)) {            $x5  = $Fono1;             }else{$x5  = $rowdata['Fono1'];}
								if(isset($Fono2)) {            $x6  = $Fono2;             }else{$x6  = $rowdata['Fono2'];}
								if(isset($email)) {            $x7  = $email;             }else{$x7  = $rowdata['email'];}
								

								//se dibujan los inputs
								echo '<h3>Datos Basicos</h3>';
								echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
								echo form_input_icon('text', 'DNI', 'Rut', $x2, 2,'fa fa-exclamation-triangle');
								echo form_date('F Nacimiento','fNacimiento', $x3, 1);			 
								echo form_input_icon('text', 'Direccion', 'Direccion', $x4, 2,'fa fa-map');	 

								echo '<h3>Datos de contacto</h3>';
								echo form_input_phone('Telefono Fijo', 'Fono1', $x5, 1);
								echo form_input_phone('Telefono Movil', 'Fono2', $x6, 1);
								echo form_input_icon('text', 'Email', 'email', $x7, 2,'fa fa-envelope-o');
								?> 
								
								<div class="form-group" style="margin-top:15px;">
									<div class="col-sm-offset-2 col-sm-10">
										<input type="hidden" name="idCliente" value="<?php echo $arrCliente['idCliente']; ?>" >
										<input name="submit_edit" type="submit" class="btn btn-primary fright" value="Actualizar">
										<a class="btn btn-danger fright" href="perfil.php" style="margin-right:15px;">Cancelar</a>
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
