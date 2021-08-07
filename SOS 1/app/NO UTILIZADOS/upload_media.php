<?php
//obtengo variables desde la url
if(isset($_GET['IMEI'])&&$_GET['IMEI']!='')                 {$imei=$_GET['IMEI'];}else{$imei='';}
if(isset($_GET['GSM'])&&$_GET['GSM']!='')                   {$gsm=$_GET['GSM'];}else{$gsm='';}
if(isset($_GET['Roaming'])&&$_GET['Roaming']!='')           {$roaming=$_GET['Roaming'];}else{$roaming='';}
if(isset($_GET['latitud'])&&$_GET['latitud']!='')           {$lat=$_GET['latitud'];}else{$lat='';}
if(isset($_GET['longitud'])&&$_GET['longitud']!='')         {$lon=$_GET['longitud'];}else{$lon='';}
if(isset($_GET['dispositivo'])&&$_GET['dispositivo']!='')   {$dispositivo=$_GET['dispositivo'];}else{$dispositivo='';}
$z  = '?IMEI='.$imei;
$z .= '&GSM='.$gsm;
$z .= '&Roaming='.$roaming;
$z .= '&latitud='.$lat;
$z .= '&longitud='.$lon;
$z .= '&dispositivo='.$dispositivo;
$idVehiculo   = $_GET['idvehiculo'];
//variables a utilizar
$directorio = "upload/";
$nombre_archivo = $_FILES['uploaded_file']['name'];
$nuevo_nombre = $idVehiculo.'-'.$nombre_archivo;

$destino_final = $directorio . basename( $nuevo_nombre);
if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $destino_final)) {
    //echo "The first file ".  basename( $_FILES['uploaded_file']['name'])." has been uploaded.";
} else{
    echo "El archivo no ha sido subido, por favor trate nuevamente";
}
	header( 'Location: http://www.sosauto.cl/app/modusr_vehiculos.php'.$z.'&view='.$idVehiculo );
	
		
?>