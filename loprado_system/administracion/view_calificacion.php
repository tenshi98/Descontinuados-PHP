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
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
/**********************************************************************************************************************************/
/*                                                       Consultas                                                                */
/**********************************************************************************************************************************/
error_reporting(E_ALL);
ini_set('display_errors', 1);

//conexion al seridor
$server = "200.55.192.42";
$sql_conection = mssql_connect($server, "patentes", "k34n/p46jh");  
if (!$sql_conection) {
  	die("Algo sali&oacute; mal mientras se conectaba a la base de datos");
} else {
	if (!mssql_select_db("[Rem_Municipal]", $sql_conection)){    
		  echo "No he podido abrir la base de datos de Patentes Comerciales";
		  exit();
	}else{
		//echo "Conexion exitosa";
	}
}


//Consulta por los datos basicos
$query = "SELECT 
FichaFuncionario.Nombres, 
FichaFuncionario.Apellidos
FROM FichaFuncionario 
WHERE FichaFuncionario.Id_Funcionario = {$_GET['idCasChile']}";
$resultado = mssql_query( $query, $sql_conection );
$rowbasicos = mssql_fetch_assoc ($resultado);

//Consulta por los datos laborales
$query = "SELECT 
PlantasMunicipales.PlantaNombre, 
FichaMunicipal.Id_Grado
FROM FichaMunicipal 
LEFT JOIN PlantasMunicipales  ON PlantasMunicipales.Id_Planta  = FichaMunicipal.Id_Planta
WHERE FichaMunicipal.Id_Funcionario = {$_GET['idCasChile']}";
$resultado = mssql_query( $query, $sql_conection );
$rowlaboral = mssql_fetch_assoc ($resultado);

//Consulta por los datos de evaluacion
$query = "SELECT 
Cant_Trabajo, Calidad_Labor, Rendimiento,
Conoc_Trabajo, Interes_Trabajo, Trabajo_Grupo, Condiciones_Personales,
Asist_Puntualidad, Normas_Instrucciones, Comportamiento_Funcionario,
Puntaje_Final
FROM Calificacion 
WHERE Id_Funcionario = {$_GET['idCasChile']}";
$resultado = mssql_query( $query, $sql_conection );
$roweval = mssql_fetch_assoc ($resultado);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Ver Datos de la Calificacion</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
	<link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	
</head>

<body style="background:white; padding:10px;">
	
	<div class="bs-example" data-example-id="condensed-table">
		<div class="col-lg-12">
			<div class="col-lg-3">
				<h5>
				Ilustre Municipalidad de Lo Prado<br/>
				Direccion de Administracion y Finanzas<br/>
				Departamento de Personal
				</h5>
			</div>
			<div class="col-lg-6">
				<h5>
				Calificaciones<br/>
				<?php 
				$periodo = $_GET['periodo'];
				$periodo_ant = $_GET['periodo']-1;
				echo 'Periodo 1 de Septiembre de '.$periodo_ant.' al 31 de agosto de '.$periodo ?> 
				</h5>
			</div>
			<div class="col-lg-3">
				
			</div>

		</div>
		<div class="col-lg-12">
			<div class="col-lg-6">
				<h4 style="text-align:left; font-size: 14px;">
					<strong>Nombre : </strong><?php echo $rowbasicos['Nombres'].' '.$rowbasicos['Apellidos']?><br/>
					<strong>Escalafon : </strong><?php echo $rowlaboral['PlantaNombre'] ?><br/>
					<strong>Grado : </strong><?php echo $rowlaboral['Id_Grado'] ?><br/>
				</h4>
			</div>
			<div class="col-lg-6"></div>	
		</div>
		
		<div class="col-lg-12">
			<table class="table table-bordered">
				
<tr class="info"> <td>Factores</td> <td>N Subfac</td> <td>Coef</td> </tr>

<tr class="active"><td colspan="3">Rendimiento</td></tr> 		  
<tr><td>Cantidad de Trabajo</td>           <td style="text-align:right;"><?php echo $roweval['Cant_Trabajo'] ?></td>  <td></td></tr>
<tr><td>Calidad de la labor realizada</td> <td style="text-align:right;"><?php echo $roweval['Calidad_Labor'] ?></td> <td></td></tr>
<tr><td colspan="2"></td><td><?php echo $roweval['Rendimiento'] ?></td></tr>
		
				
<tr class="active"><td colspan="3">Condiciones Personales</td></tr>
<tr><td>Conocimiento del Trabajo</td>                   <td style="text-align:right;"><?php echo $roweval['Conoc_Trabajo'] ?></td>   <td></td></tr>
<tr><td>Intereses por el trabajo que realiza</td>       <td style="text-align:right;"><?php echo $roweval['Interes_Trabajo'] ?></td> <td></td></tr>
<tr><td>Capacidad para realizar trabajos en grupo</td>  <td style="text-align:right;"><?php echo $roweval['Trabajo_Grupo'] ?></td>   <td></td></tr>
<tr><td colspan="2"></td><td><?php echo $roweval['Condiciones_Personales'] ?></td></tr>
				
	
<tr class="active"><td colspan="3">Comportamiento Funcionario</td></tr>	
<tr><td>Asistencia y puntualidad</td>   <td style="text-align:right;"><?php echo $roweval['Asist_Puntualidad'] ?></td>     <td></td></tr>
<tr><td>Cumplimiento de normas</td>     <td style="text-align:right;"><?php echo $roweval['Normas_Instrucciones'] ?></td>  <td></td></tr>
<tr><td colspan="2"></td><td><?php echo $roweval['Comportamiento_Funcionario'] ?></td></tr>  
				
<tr class="active"><td colspan="3">Puntaje Final</td></tr>
<tr><td colspan="2"></td><td><?php echo $roweval['Puntaje_Final'] ?></td></tr>
					  	
			      
			</table> 
		</div>
			
			<div class="clearfix"></div>
	</div>
	<div class="highlight">
		<input class="btn btn-default fright" type="button" name="imprimir" value="Imprimir" onclick="window.print();">
		<div class="clearfix"></div>
	</div>
	
</body>

</html>
