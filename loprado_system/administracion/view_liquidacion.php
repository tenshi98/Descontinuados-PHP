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
FichaFuncionario.Id_Funcionario,
FichaFuncionario.Nombres, 
FichaFuncionario.Apellidos,
FichaFuncionario.Rut,
FichaFuncionario.Fec_InicioContrato,
Afp.AfpNombre,
Isapres.IsapreNombre,
FichaFuncionario.ModoPactado,
FichaFuncionario.MontoPactado,
FichaFuncionario.ModoPactadoAuge,
FichaFuncionario.MontoAuge

FROM FichaFuncionario 
LEFT JOIN Afp      ON Afp.Id_Afp         = FichaFuncionario.Id_Afp
LEFT JOIN Isapres  ON Isapres.Id_Isapre  = FichaFuncionario.Id_Isapre

WHERE FichaFuncionario.Id_Funcionario = {$_GET['idCasChile']}";
$resultado = mssql_query( $query, $sql_conection );
$rowbasicos = mssql_fetch_assoc ($resultado);

//Consulta por los datos laborales
$query = "SELECT 
PlantasMunicipales.PlantaNombre, 
FichaMunicipal.Jornada, 
FichaMunicipal.NroBienios, 
FichaMunicipal.NroBieniosZona,
FichaMunicipal.Fec_InicioBienios,
FichaMunicipal.Trienios
FROM FichaMunicipal 
LEFT JOIN PlantasMunicipales  ON PlantasMunicipales.Id_Planta  = FichaMunicipal.Id_Planta
WHERE FichaMunicipal.Id_Funcionario = {$_GET['idCasChile']}";
$resultado = mssql_query( $query, $sql_conection );
$rowlaboral = mssql_fetch_assoc ($resultado);


// Se traen los datos del mes seleccionado
$query = "SELECT 
NroCargaNormal, NroCargaInvalida, NroCargaMaternal, SueldoBase, Incremento, AsigMunicipal, AsigLey18717, AsigLey18566, 
AsigLey18675A10, AsigLey18675A11, AsigLey19529, AsigLey19429, AsigZona, ComplementoZona, AsigBienios, AsigBieniosZona,
ZonaBienios, CompZonaBienios, AsigTrienios, AsigEstimulo, AsigProfesional, AsigResponsabilidad, AsigDLey3551A39,
AsigLey19112_32A, AsigLey19112_20B, ImponibleDesahucio, NroHrsExtras25, NroHrsExtras50, MontoHrsExtras25, MontoHrsExtras50,
IncrementoHrsExtras, MontoCarga, MontoCargaMater, MontoRetroactivo, MontoRetroMater, BaseImponible, TotalTributable, 
BaseTributable, MontoJubilacion, MontoDesahucio, MontoSalud, MontoAdicionalDos, ImpuestoUnico, TotalDctos, Liquido, 
MontoSisEmpleador, Porcentaje_Afp, DiasTrabajados

FROM HistoricoLiquidacion
WHERE Id_Funcionario = {$_GET['idCasChile']} AND Mes={$_GET['mes']} AND Ano={$_GET['periodo']} 
ORDER BY Ano DESC, Mes DESC";
$resultado = mssql_query ($query, $sql_conection);
$rowliq = mssql_fetch_assoc ($resultado);

// Se traen los datos del mes seleccionado
$arrDescuentos = array();
$query = "SELECT
HistoricoMovLiquidacion.Valor_haberDcto,
Descuentos.DctoDescripcion
FROM HistoricoMovLiquidacion
LEFT JOIN Descuentos ON Descuentos.Id_Descuento = HistoricoMovLiquidacion.Id_HaberDcto
WHERE HistoricoMovLiquidacion.Id_Funcionario = {$_GET['idCasChile']} 
AND HistoricoMovLiquidacion.Mes = {$_GET['mes']} AND HistoricoMovLiquidacion.Ano = {$_GET['periodo']} ";
$resultado = mssql_query ($query, $sql_conection);
while ( $row = mssql_fetch_assoc ($resultado)) {
array_push( $arrDescuentos,$row );
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Ver Datos de la Liquidacion</title>
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
				Liquidacion de remuneraciones<br/>
				Mes de <?php echo numero_a_mes($_GET['mes']).' '.$_GET['periodo']?> 
				</h5>
			</div>
			<div class="col-lg-3">
				
			</div>

		</div>
		<div class="col-lg-12">
			<div class="col-lg-6">
				<h4 style="text-align:left; font-size: 14px;">
					<strong>Codigo : </strong><?php echo $rowbasicos['Id_Funcionario'] ?><br/>
					<strong>Nombre : </strong><?php echo $rowbasicos['Nombres'].' '.$rowbasicos['Apellidos']?><br/>
					<strong>RUT : </strong><?php echo $rowbasicos['Rut'] ?><br/>
					<strong>Escalafon : </strong><?php echo $rowlaboral['PlantaNombre'] ?><br/>
					<strong>Jornada : </strong><?php echo $rowlaboral['Jornada'] ?><br/>
					<strong>Carga Normal : </strong><?php echo $rowliq['NroCargaNormal'] ?><br/>
					<strong>Carga Invalida : </strong><?php echo $rowliq['NroCargaInvalida'] ?><br/>
					<strong>Carga Maternal : </strong><?php echo $rowliq['NroCargaMaternal'] ?><br/>
					<strong>N de Bienios S/Zona : </strong><?php echo $rowlaboral['NroBienios'] ?><br/>
					<strong>N de Bienios C/Zona : </strong><?php echo $rowlaboral['NroBieniosZona'] ?><br/>
					<strong>Trienio : </strong><?php echo $rowlaboral['Trienios'] ?><br/>
					<strong>Fecha Inicio : </strong><?php echo Fecha_estandar($rowbasicos['Fec_InicioContrato']) ?><br/>
					<strong>Fecha Bienios : </strong><?php echo Fecha_estandar($rowlaboral['Fec_InicioBienios']) ?><br/>
					<strong>Dias Trabajados : </strong><?php echo $rowliq['DiasTrabajados'] ?><br/>
					<strong>Nro Hrs Extras 25% : </strong><?php echo $rowliq['NroHrsExtras25'] ?><br/>
					<strong>Nro Hrs Extras 50% : </strong><?php echo $rowliq['NroHrsExtras50'] ?><br/>
				</h4>
			</div>

			<div class="col-lg-6">
				<h4 style="text-align:left; font-size: 14px;">
					<strong>AFP : </strong><?php echo $rowbasicos['AfpNombre'] ?><br/>
					<strong>% Afecto : </strong><?php echo Cantidades_decimales_justos($rowliq['Porcentaje_Afp']) ?><br/>
					<strong>Isapre : </strong><?php echo $rowbasicos['IsapreNombre'] ?><br/>
					<strong>Modalidad : </strong><?php echo $rowbasicos['ModoPactado'] ?><br/>
					<strong>Pactado : </strong><?php echo Cantidades_decimales_justos($rowbasicos['MontoPactado']) ?><br/>
					<strong>Modalidad Auge : </strong><?php echo $rowbasicos['ModoPactadoAuge'] ?><br/>
					<strong>Pactado Auge : </strong><?php echo $rowbasicos['MontoAuge'] ?><br/>
				</h4>
			</div>
				
		</div>
		
		
		
		<div class="col-lg-12">
			<div class="col-lg-6">
				<table class="table table-bordered">
				  <thead>
					<tr><th colspan="2">Haberes</th></tr>
				  </thead>

				  <tbody>
<?php if($rowliq['SueldoBase']!=0){?>           <tr><td>Sueldo Base</td>             <td style="text-align:right;"><?php echo Valores_sd($rowliq['SueldoBase']) ?></td></tr><?php } ?>
<?php if($rowliq['Incremento']!=0){?>           <tr><td>Incremento</td>              <td style="text-align:right;"><?php echo Valores_sd($rowliq['Incremento']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigMunicipal']!=0){?>        <tr><td>Asig Municipal</td>          <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigMunicipal']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigLey18717']!=0){?>         <tr><td>Asig Ley 18717</td>          <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigLey18717']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigLey18566']!=0){?>         <tr><td>Asig Ley 18566</td>          <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigLey18566']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigLey18675A10']!=0){?>      <tr><td>Asig Ley 18675 Art 10</td>   <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigLey18675A10']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigLey18675A11']!=0){?>      <tr><td>Asig Ley 18675 Art 11</td>   <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigLey18675A11']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigLey19529']!=0){?>         <tr><td>Asig Ley 19529</td>          <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigLey19529']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigLey19429']!=0){?>         <tr><td>Asig Ley 19429</td>          <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigLey19429']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigZona']!=0){?>             <tr><td>Asig Zona</td>               <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigZona']) ?></td></tr><?php } ?>
<?php if($rowliq['ComplementoZona']!=0){?>      <tr><td>Complemento Zona</td>        <td style="text-align:right;"><?php echo Valores_sd($rowliq['ComplementoZona']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigBienios']!=0){?>          <tr><td>Asig Bienios</td>            <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigBienios']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigBieniosZona']!=0){?>      <tr><td>Asig Bienios Zona</td>       <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigBieniosZona']) ?></td></tr><?php } ?>
<?php if($rowliq['ZonaBienios']!=0){?>          <tr><td>Zona Bienios</td>            <td style="text-align:right;"><?php echo Valores_sd($rowliq['ZonaBienios']) ?></td></tr><?php } ?>
<?php if($rowliq['CompZonaBienios']!=0){?>      <tr><td>Comp Zona Bienios</td>       <td style="text-align:right;"><?php echo Valores_sd($rowliq['CompZonaBienios']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigTrienios']!=0){?>         <tr><td>Asig Trienios</td>           <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigTrienios']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigEstimulo']!=0){?>         <tr><td>Asig Estimulo</td>           <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigEstimulo']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigProfesional']!=0){?>      <tr><td>Asig Profesional</td>        <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigProfesional']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigResponsabilidad']!=0){?>  <tr><td>Asig Responsabilidad</td>    <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigResponsabilidad']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigDLey3551A39']!=0){?>      <tr><td>Asig Ley 3551A39</td>        <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigDLey3551A39']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigLey19112_32A']!=0){?>     <tr><td>Asig Ley 19112 32A</td>      <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigLey19112_32A']) ?></td></tr><?php } ?>
<?php if($rowliq['AsigLey19112_20B']!=0){?>     <tr><td>Asig Ley 19112 20B</td>      <td style="text-align:right;"><?php echo Valores_sd($rowliq['AsigLey19112_20B']) ?></td></tr><?php } ?>
<?php if($rowliq['MontoHrsExtras25']!=0){?>     <tr><td>Monto Hrs Extras 25%</td>    <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoHrsExtras25']) ?></td></tr><?php } ?>
<?php if($rowliq['MontoHrsExtras50']!=0){?>     <tr><td>Monto Hrs Extras 50%</td>    <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoHrsExtras50']) ?></td></tr><?php } ?>
<?php if($rowliq['IncrementoHrsExtras']!=0){?>  <tr><td>Incremento Hrs Extras</td>   <td style="text-align:right;"><?php echo Valores_sd($rowliq['IncrementoHrsExtras']) ?></td></tr><?php } ?>
<?php if($rowliq['MontoCarga']!=0){?>           <tr><td>Monto Carga</td>             <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoCarga']) ?></td></tr><?php } ?>
<?php if($rowliq['MontoCargaMater']!=0){?>      <tr><td>Monto Carga Mater</td>       <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoCargaMater']) ?></td></tr><?php } ?>
<?php if($rowliq['MontoRetroactivo']!=0){?>     <tr><td>Monto Retroactivo</td>       <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoRetroactivo']) ?></td></tr><?php } ?>
<?php if($rowliq['MontoRetroMater']!=0){?>      <tr><td>Monto Retro Mater</td>       <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoRetroMater']) ?></td></tr><?php } ?>

<?php if($rowliq['TotalTributable']!=0){?>      <tr class="active"><td><strong>Total Haberes</strong></td>           <td style="text-align:right;"><?php echo Valores_sd($rowliq['TotalTributable']) ?></td></tr><?php } ?>
<?php if($rowliq['BaseImponible']!=0){?>        <tr class="active"><td><strong>Base Imponible</strong></td>          <td style="text-align:right;"><?php echo Valores_sd($rowliq['BaseImponible']) ?></td></tr><?php } ?>
<?php if($rowliq['BaseTributable']!=0){?>       <tr class="active"><td><strong>Base Tributable</strong></td>         <td style="text-align:right;"><?php echo Valores_sd($rowliq['BaseTributable']) ?></td></tr><?php } ?>
					  
						  
	
	
				  </tbody>
				</table> 
			</div>
			
			<div class="col-lg-6">
				<table class="table table-bordered">
				  <thead>
					<tr><th colspan="2">Descuentos</th></tr>
				  </thead>
				  <tbody>

<?php $total_imposiciones = 0; ?> 
<?php if($rowliq['MontoJubilacion']!=0){?>    <tr><td>Cotizacion Obligatoria</td>  <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoJubilacion']); $total_imposiciones = $total_imposiciones + $rowliq['MontoJubilacion']; ?></td></tr><?php } ?>
<?php if($rowliq['MontoDesahucio']!=0){?>     <tr><td>Monto Desahucio</td>         <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoDesahucio']); $total_imposiciones = $total_imposiciones + $rowliq['MontoDesahucio']; ?></td></tr><?php } ?>
<?php if($rowliq['MontoSalud']!=0){?>         <tr><td>Salud</td>                   <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoSalud']); $total_imposiciones = $total_imposiciones + $rowliq['MontoSalud']; ?></td></tr><?php } ?>
<?php if($rowliq['MontoAdicionalDos']!=0){?>  <tr><td>Adicional</td>               <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoAdicionalDos']); $total_imposiciones = $total_imposiciones + $rowliq['MontoAdicionalDos']; ?></td></tr><?php } ?>

<tr><td>Total Imposiciones</td>   <td style="text-align:right;"><?php echo Valores_sd($total_imposiciones) ?></td></tr>

<?php if($rowliq['ImpuestoUnico']!=0){?>      <tr><td>Impuesto Unico</td>       <td style="text-align:right;"><?php echo Valores_sd($rowliq['ImpuestoUnico']) ?></td></tr><?php } ?>

<?php foreach ($arrDescuentos as $desc) { ?>
		<tr><td><?php echo $desc['DctoDescripcion'] ?></td>   <td style="text-align:right;"><?php echo Valores_sd($desc['Valor_haberDcto']) ?></td></tr>
<?php } ?>
		 
<?php if($rowliq['TotalDctos']!=0){?>  <tr class="active"><td><strong>Total Dctos</strong></td>   <td style="text-align:right;"><?php echo Valores_sd($rowliq['TotalDctos']) ?></td></tr><?php } ?>
<?php if($rowliq['Liquido']!=0){?>     <tr class="active"><td><strong>Liquido</strong></td>      <td style="text-align:right;"><?php echo Valores_sd($rowliq['Liquido']) ?></td></tr><?php } ?>
						 
				  </tbody>
				</table> 
			</div>

		</div>
			
		<div class="col-lg-12">
				<table class="table table-bordered">
				  <thead>
					<tr><th colspan="2">Haberes</th></tr>
				  </thead>	
				  <tbody>
<?php if($rowliq['MontoSisEmpleador']!=0){?>   <tr><td>MontoSisEmpleador</td>   <td style="text-align:right;"><?php echo Valores_sd($rowliq['MontoSisEmpleador']) ?></td></tr><?php } ?>
	  
					  	
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
