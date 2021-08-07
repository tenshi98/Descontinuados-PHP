<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sistema de Consulta Online</title>

</head>

<body>
    
<p>Consulta Soap</p>    

<?php
include('lib/nusoap.php');
$Rut="11511843";
$Comuna = 'LA FLORIDA';
//Ubicacion del webservice
$client = new nusoap_client('http://appl.smc.cl/ws/wsConsultaBDExt/wsConsultaBDExt.asmx?WSDL','wsdl');
$err = $client->getError();
if ($err) {
	echo '<h2>Error del constructor</h2><pre>' . $err . '</pre>';
}
//Ingreso de los parametros de busqueda 
$param = array('Nombre_Comuna'=>$Comuna,'NombreFuncion'=>'consultaporrut','XMLConsulta'=>'<PARAMETROS><RUT>'.$Rut.'</RUT></PARAMETROS>');
$result = $client->call('pfConsultaBDExt',$param);



// Existe alguna falla en el servicio?  
if ($client->fault) { //Si
	echo '<h2>No se pudo completar la operación</h2><pre>';
	print_r($result);
	echo '</pre>';
} else {// No 
	// Hay algun error ? 
	$err = $client->getError();
	if ($err) { // Si 
		// Display the error
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {// No 
		// Muestro los resultados
		echo '<h2>Result</h2><pre>';
		print_r($result);
		echo '</pre>';
	}
}
 
$r = $result;
$count = count($r);
echo '<p>'.$count.'</p>';




//Ubicacion del webservice
$client = new nusoap_client('http://appl.smc.cl/ws/wsConsultaBDExt/wsConsultaBDExt.asmx?WSDL','wsdl');
$err = $client->getError();
if ($err) {
	echo '<h2>Error del constructor</h2><pre>' . $err . '</pre>';
}
//Ingreso de los parametros de busqueda 
$param = array('Nombre_Comuna'=>$Comuna,'NombreFuncion'=>'busquedapornombre','XMLConsulta'=>'<PARAMETROS><NOMBRE>BALDOMERO DEL CARMEN</NOMBRE><APELLIDOPAT>MENA</APELLIDOPAT><APELLIDOMAT></APELLIDOMAT></PARAMETROS>');
$result = $client->call('pfConsultaBDExt',$param);
// Existe alguna falla en el servicio?  
if ($client->fault) { //Si
	echo '<h2>No se pudo completar la operación</h2><pre>';
	print_r($result);
	echo '</pre>';
} else {// No 
	// Hay algun error ? 
	$err = $client->getError();
	if ($err) { // Si 
		// Display the error
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {// No 
		// Muestro los resultados
		echo '<h2>Result</h2><pre>';
		print_r($result);
		echo '</pre>';
	}
}
?>

</body>
</html>