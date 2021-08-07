<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
	//Se definen las variables
	if ( !empty($_POST['ruta']) )      		$ruta_inicial     = $_POST['ruta'];
	if ( !empty($_POST['extension']) )      $extension        = $_POST['extension'];
	if ( !empty($_POST['nombre']) )         $nombre_archivo   = $_POST['nombre'];

	//Se definen los errores
	//Valida el ingreso de la ruta
	if ( empty($ruta_inicial) )      $errors[1] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_01">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> No se ha detectado una ruta el archivo.</p>
	</div>';
	
	//Se valida el ingreso de la extension
	if ( empty($extension) )     $errors[2] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_02">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> No se ha detectado una extension del archivo.</p>
	</div>';
	
	//Se valida el ingreso del nombre_archivo
	if ( empty($nombre_archivo) )   $errors[3] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_03">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> No se ha detectado un nombre del archivo.</p>
	</div>';
	
	//Valido las extensiones de la imagen
	$permitidos = 0;
	switch ($extension) {
    case "image/jpg":   $permitidos+=1;   break;
    case "image/jpeg":  $permitidos+=1;   break;
    case "image/gif":   $permitidos+=1;   break;
	case "image/png":   $permitidos+=1;   break;
	}
	//Se muestra el mensaje de error
	if ( $permitidos!=1 )   $errors[4] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_03">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> El archivo que intenta subir no corresponde a ninguno de los permitidos.</p>
	</div>';

// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])  ) { 

		//Guardo el nombre del archivo en la base de datos y su ubicacion
		$idVehiculo    = $_GET['imagen'];
		$idCliente = $arrCliente['idCliente'];
		$Fecha= fecha_actual();
		$nombre_final  = $idVehiculo.'-'.$nombre_archivo;
	
		$query ="INSERT INTO `clientes_vehiculos_img`(idVehiculo, idCliente, Fecha, Nombre) 
		VALUES ('$idVehiculo','$idCliente', '$Fecha', '$nombre_final')";
		$result = mysql_query($query, $dbConn);
		header( 'Location: '.$location.'&upload_imagen='.$idVehiculo.'&ruta_inicial='.$ruta_inicial ); 
		die;
			
}
?>