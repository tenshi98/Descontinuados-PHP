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
if ( !empty($_POST['submit_edit']) )  {
	//se agrega ubicacion
	$location .= "?d=d";
	//Llamamos al formulario
	$form_obligatorios = 'idMedico,Nombre,Rut,Direccion,email';
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
//Se consulta por los datos del usuario
$query = "SELECT  Nombre,Rut,fNacimiento,Direccion,Fono1,email, Especialidad, idDisponibilidad,idDepartamento,idProvincia,
idDistrito,idSexo
FROM `medicos_listado`
WHERE idMedico = {$arrMedico['idMedico']}
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
								if(isset($Nombre)) {            $x1  = $Nombre;             }else{$x1  = $rowdata['Nombre'];}
								if(isset($Rut)) {               $x2  = $Rut;                }else{$x2  = $rowdata['Rut'];}
								if(isset($fNacimiento)) {       $x3  = $fNacimiento;        }else{$x3  = $rowdata['fNacimiento'];}
								if(isset($idSexo)) {            $x4  = $idSexo;             }else{$x4  = $rowdata['idSexo'];}
								if(isset($idDepartamento)) {    $x5  = $idDepartamento;     }else{$x5  = $rowdata['idDepartamento'];}
								if(isset($idProvincia)) {       $x6  = $idProvincia;        }else{$x6  = $rowdata['idProvincia'];}
								if(isset($idDistrito)) {        $x7  = $idDistrito;         }else{$x7  = $rowdata['idDistrito'];}
								if(isset($Direccion)) {         $x8  = $Direccion;          }else{$x8  = $rowdata['Direccion'];}
								if(isset($Especialidad)) {      $x9  = $Especialidad;       }else{$x9  = $rowdata['Especialidad'];}
								if(isset($idDisponibilidad)) {  $x10 = $idDisponibilidad;   }else{$x10 = $rowdata['idDisponibilidad'];}
								if(isset($Fono1)) {             $x11 = $Fono1;              }else{$x11 = $rowdata['Fono1'];}
								if(isset($email)) {             $x12 = $email;              }else{$x12 = $rowdata['email'];}
								
								

								//se dibujan los inputs
								echo '<h3>Datos Basicos</h3>';
								echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
								echo form_input_icon('text', 'DNI', 'Rut', $x2, 2,'fa fa-exclamation-triangle');
								echo form_date('F Nacimiento','fNacimiento', $x3, 1);
								echo form_select('Sexo','idSexo', $x4, 1, 'idSexo', 'Nombre', 'medicos_sexo', 0, $dbConn);	
								echo form_select_depend2('Departamento','idDepartamento', $x5, 2, 'idDepartamento', 'Nombre', 'ubicacion_departamento', 0,
									'Provincia','idProvincia', $x6, 2, 'idProvincia', 'idDepartamento', 'Nombre', 'ubicacion_provincia', 0, 
									'Distrito','idDistrito', $x7, 2, 'idDistrito', 'idProvincia', 'Nombre', 'ubicacion_distrito', 0,
									 $dbConn);	 
								echo form_input_icon('text', 'Direccion', 'Direccion', $x8, 2,'fa fa-map');	 
								echo form_select('Especialidad','Especialidad', $x9, 2, 'Nombre', 'Nombre', 'medicos_especialidades', 0, $dbConn);
								echo form_select('Disponibilidad','idDisponibilidad', $x10, 2, 'idDisponibilidad', 'Nombre', 'medicos_disponibilidad', 0, $dbConn);
								

								echo '<h3>Datos de contacto</h3>';
								echo form_input_phone('Telefono', 'Fono1', $x11, 1);
								echo form_input_icon('text', 'Email', 'email', $x12, 2,'fa fa-envelope-o');
								?> 
								
								<div class="form-group" style="margin-top:15px;">
									<div class="col-sm-offset-2 col-sm-10">
										<input type="hidden" name="idMedico" value="<?php echo $arrMedico['idMedico']; ?>" >
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
