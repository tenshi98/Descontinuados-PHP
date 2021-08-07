                                     
<?php
require_once('./conexion3.php');

echo "<strong>Conectado a Inspecciones</strong><br/>";
$rut='012123777-6';
echo "<br/>Mostrar base Partes M<br/><hr>";
$result = mssql_query("SELECT NumeroParte, AnoParte, FechaParte, FechaRecepcion, NumeroBoleta, RutInspector, TipoParte, RutInfractor, NombreInfractor, DireccionInfractor, TelefonoInfractor, ComunaInfractor, TipoOcupante, OrigenInfraccion, TipoInfraccion, LugarInfraccion, HoraInfraccion, Observacion, HoraCitacion, FechaCitacion, LugarCitacion, Estado, FechaEnvioJPL, TomadoJuzgado, FolioOficioJPL, UnidadVecinal, CodigoTerritorio, TipoDocumentoDepositado, Edad, Profesion, Oficio FROM Parte_M WITH (NOLOCK) WHERE RutInfractor='".$rut."' ORDER BY FechaParte DESC",$lnk_inspec);
$n=0;
while($row = mssql_fetch_array($result)) {
    $n=$n+1;
	$Rut=$row["RutInfractor"];
	$nombrecompleto=$row["NombreInfractor"];
	$callecom=$row["DireccionInfractor"];
	$numcom=$row["ComunaInfractor"];
	$poblacom="";
	$fonocom=$row["TelefonoInfractor"];
echo "RUT: ". $Rut ."&nbsp; Nombre Completo: ". $nombrecompleto ." &nbsp; Tel&eacute;fono: ".$fonocom."<br/>";
echo "Direcci&oacute;n: ".$callecom.", comuna: ".$numcom.", ".$poblacom." &nbsp; Orden= ".$n."<br /><br />";
}

echo "<br/>Correlativo Parte<br/><hr>";
$result = mssql_query("SELECT *  FROM Correlativo_Parte WHERE Ano='2013'",$lnk_inspec);
while($row = mssql_fetch_array($result)) {
	$numparte=$row["NumeroParte"];
	$anoparte=$row["Ano"];
echo "Correlativo Parte: ". $numparte ."&nbsp; A&ntilde;o ". $anoparte ."<br/>";
}

echo "<br/>Inspeccion Parte (todos Parte_M) <br/><hr>";
$result = mssql_query("SELECT top 30 NumeroParte, AnoParte, FechaParte, FechaRecepcion, NumeroBoleta, RutInspector, TipoParte, RutInfractor, NombreInfractor, DireccionInfractor, TelefonoInfractor, ComunaInfractor, TipoOcupante, OrigenInfraccion, TipoInfraccion, LugarInfraccion, HoraInfraccion, Observacion, HoraCitacion, FechaCitacion, LugarCitacion, Estado, FechaEnvioJPL, TomadoJuzgado, FolioOficioJPL, UnidadVecinal, CodigoTerritorio, TipoDocumentoDepositado, Edad, Profesion, Oficio FROM Parte_M WITH (NOLOCK) ORDER BY FechaParte DESC",$lnk_inspec);
while($row = mssql_fetch_array($result)) {
	$numparte=$row["NumeroParte"];
	$anoparte=$row["AnoParte"];
	$rutparte=$row["RutInfractor"];
	$nomparte=trim($row["NombreInfractor"]);
	$fecparte=trim($row["FechaParte"]);
	
echo "FechaParte: ".$fecparte."&nbsp; N&deg; Parte: ". $numparte ."&nbsp; A&ntilde;o ". $anoparte ."&nbsp; Rut Afectado: ". $rutparte ."&nbsp; Nombre: ". $nomparte ."<br/>";
}

echo "<br/>Lugar de Citacion<br/><hr>";
$result = mssql_query("SELECT Codigo, Descripcion FROM LugarCitacion",$lnk_inspec);
while($row = mssql_fetch_array($result)) {
	$numparte=$row["Codigo"];
	$anoparte=$row["Descripcion"];
	
echo "&nbsp; Cod Lugar: ". $numparte ."&nbsp; Descripcion ". $anoparte ."<br/>";
}
?>
<br /><br />