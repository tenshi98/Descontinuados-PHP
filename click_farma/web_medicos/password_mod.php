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
if ( !empty($_POST['edit_clave']) )  { 
	//se agrega ubicacion
	$location .= "?d=d";
	//Llamamos al formulario
	$form_obligatorios = 'idMedico,oldpassword,password,repassword';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/medicos_listado.php';
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
//Se llaman a las partes de los menus		
require_once 'core/navbar_principal.php';
require_once 'core/navbar_sub.php';		
?>
		
	
	
	
	
		<div class="main" style="min-height:600px;">
		  <div class="main-inner">
			<div class="container">
				<?php 
				//Manejador de errores
				if(isset($error)&&$error!=''){echo notifications_list_2($error);};?>
			  <div class="row">
				
				<div class="span6">
					
					
					<div class="widget widget-table action-table">
						<div class="widget-header"> 
							<i class="icon-th-list"></i><h3>modificacion Datos Personales</h3>
						</div>
					
						<div class="widget-content">
							<form method="post" class="form-horizontal" style="margin:2%;" name="form1">
								
								
								<?php 
								//Se verifican si existen los datos
								if(isset($oldpassword)) {   $x1  = $oldpassword;  }else{$x1  = '';}
								if(isset($password)) {      $x2  = $password;     }else{$x2  = '';}
								if(isset($repassword)) {    $x3  = $repassword;   }else{$x3  = '';}
								
								//se dibujan los inputs
								echo '<div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>¡Atencion!</strong> Esto cerrara tu sesion actual.
                                       </div>';
                                
                                              
								echo '<br/>';
								echo form_input('password', 'Contraseña Actual', 'oldpassword', $x1, 2);
								echo form_input('password', 'Nueva contraseña', 'password', $x2, 2);
								echo form_input('password', 'Repetir contraseña', 'repassword', $x3, 2);
								?> 
								
								<div class="form-group" style="margin-top:15px;">
									<div class="col-sm-offset-2 col-sm-10">
										<input type="hidden" name="idMedico" value="<?php echo $arrMedico['idMedico']; ?>" >
										<input name="edit_clave" type="submit" class="btn btn-primary fright" value="Modificar">
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
