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
$sql_conection2 = mssql_connect($server, "patentes", "k34n/p46jh");  
if (!$sql_conection2) {
  	die("Algo sali&oacute; mal mientras se conectaba a la base de datos");
} else {
	if (!mssql_select_db("[Reloj_Control]", $sql_conection2)){    
		  echo "No he podido abrir la base de datos de Patentes Comerciales";
		  exit();
	}else{
		//echo "Conexion exitosa";
	}
}
//Consulta por los datos basicos
$query = "SELECT 
FichaFuncionario.Id_Funcionario,
FichaFuncionario.Nombres, 
FichaFuncionario.Apellidos,
FichaFuncionario.Rut
FROM FichaFuncionario 
WHERE FichaFuncionario.Id_Funcionario = {$_GET['idCasChile']}";
$resultado = mssql_query( $query, $sql_conection );
$rowdata = mssql_fetch_assoc ($resultado);

//Consulta por los datos basicos
$arrAsistencia = array();
$query = "SELECT 
Dia, HrEntrada1, HrSalida1, HrEntrada2, HrSalida2, Num_Dias, Permiso, FecDesdePermiso, FecHastaPermiso, Atrasos, HrsExtras25, HrsExtras50,Fecha_Dia
FROM LibroAsistencia 
WHERE Id_Funcionario = {$_GET['idCasChile']} AND Mes={$_GET['mes']} AND Ano={$_GET['periodo']}";
$resultado = mssql_query ($query, $sql_conection2);
while ( $row = mssql_fetch_assoc ($resultado)) {
array_push( $arrAsistencia,$row );
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Asistencia</title>
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
				Libro de Asistencia<br/>
				Mes de <?php echo numero_a_mes($_GET['mes']).' '.$_GET['periodo']?> 
				</h5>
			</div>
			<div class="col-lg-3">
				
			</div>
		
		</div>
		<div class="col-lg-12">
			<h4 style="text-align:left; font-size: 14px;">
				<strong>Codigo : </strong><?php echo $rowdata['Id_Funcionario'] ?><br/>
				<strong>Nombre : </strong><?php echo $rowdata['Nombres'].' '.$rowdata['Apellidos']?><br/>
				<strong>RUT : </strong><?php echo $rowdata['Rut'] ?><br/>
			</h4>
				
		</div>
		<div class="col-lg-12">
			
			<table class="table table-bordered">
			  <thead>
				<tr>
				  <th colspan="2">Dia</th>
				  <th>Entrada</th>
				  <th>Sal Col</th>
				  <th>Ent Col</th>
				  <th>Salida</th>
				  <th>N° Dias</th>
				  <th>N° Horas</th>
				  <th>Permiso</th>
				  <th>Desde</th>
				  <th>Hasta</th>
				  <th>Atraso</th>
				  <th>25%</th>
				  <th>50%</th>
				  <th>Observacion</th>
				</tr>
			  </thead>
			  <tbody>

				<?php 
				$asistencia = 0;
				$inasistencia = 0;
				$atrasos = '';
				$horas25 = '';
				$horas50 = '';
				foreach($arrAsistencia as $asist) {?>
					<tr>
					  <td><?php echo $asist['Dia'] ?></td>
					  <td><?php echo dia_transformado2($asist['Fecha_Dia']) ?></td>
					  <td><?php echo $asist['HrEntrada1'] ?></td>
					  <td><?php echo $asist['HrEntrada2'] ?></td>
					  <td><?php echo $asist['HrSalida2'] ?></td>
					  <td><?php echo $asist['HrSalida1'] ?></td>
					  <td><?php echo $asist['Num_Dias'] ?></td>
					  <td></td>
					  <td><?php echo $asist['Permiso'] ?></td>
					  <td><?php if($asist['FecDesdePermiso']!=''){echo Fecha_estandar($asist['FecDesdePermiso']);} ?></td>
					  <td><?php if($asist['FecHastaPermiso']!=''){echo Fecha_estandar($asist['FecHastaPermiso']);} ?></td>
					  <td><?php echo $asist['Atrasos'] ?></td>
					  <td><?php echo $asist['HrsExtras25'] ?></td>
					  <td><?php echo $asist['HrsExtras50'] ?></td>
					  <td></td>
					</tr>
					<?php 
					if(dia_transformado2($asist['Fecha_Dia'])!='Sabado' && dia_transformado2($asist['Fecha_Dia'])!='Domingo' ){
						
						if($asist['HrEntrada1']!='' or $asist['HrSalida1']!=''){
							$asistencia++;
						}elseif($asist['Permiso']!=''){
							$inasistencia++;
						}
					}
					$atrasos = sumahoras($atrasos,$asist['Atrasos']);
					$horas25 = sumahoras($horas25,$asist['HrsExtras25']);
					$horas50 = sumahoras($horas50,$asist['HrsExtras50']);
					
				} ?>
					<tr>
					  <td colspan="3">Dias Trabajados</td>
					  <td><?php echo $asistencia ?></td>
					  <td colspan="8" style="text-align:right;"><?php echo $atrasos ?></td>
					  <td><?php echo $horas25 ?></td>
					  <td><?php echo $horas50 ?></td>
					  <td></td>
					</tr>
			  </tbody>
			</table>
		</div>
		
		<div class="col-lg-6">
			
			<table class="table table-bordered">
			  <thead>
				<tr>
				  <th colspan="2">Totales</th>
				</tr>
			  </thead>
			  <tbody>
				  <tr>
					  <td>Asistencia</td>
					  <td><?php echo $asistencia ?></td>
				  </tr>
				  <tr>
					  <td>Inasistencia</td>
					  <td><?php echo $inasistencia ?></td>
				  </tr>
				  <tr>
					  <td>Horas Atrasos</td>
					  <td><?php echo $atrasos ?></td>
				  </tr>
				  <tr>
					  <td>Horas extras 25%</td>
					  <td><?php echo $horas25 ?></td>
				  </tr>
				  <tr>
					  <td>Horas extras 50%</td>
					  <td><?php echo $horas50 ?></td>
				  </tr>
				
			  </tbody>
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
