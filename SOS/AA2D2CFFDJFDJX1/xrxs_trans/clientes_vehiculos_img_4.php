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
	
if( !isset($_FILES['archivo']) ){
  echo '
  <div class="alert alert-danger alert-dismissable" id="txf_01">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ha habido un error, tienes que elegir un archivo.</p>
	</div>';
}else{
 
  $nombre = $_FILES['archivo']['name'];
  $nombre_tmp = $_FILES['archivo']['tmp_name'];
  $tipo = $_FILES['archivo']['type'];
  $tamano = $_FILES['archivo']['size'];
 
  $ext_permitidas = array('jpg','jpeg','gif','png');
  $partes_nombre = explode('.', $nombre);
  $extension = end( $partes_nombre );
  $ext_correcta = in_array($extension, $ext_permitidas);
 
  $tipo_correcto = preg_match('/^image\/(jpeg|jpeg|gif|png)$/', $tipo);
 
  $limite = 500 * 1024;
 
  if( $ext_correcta && $tipo_correcto && $tamano <= $limite ){
    if( $_FILES['archivo']['error'] > 0 ){
      echo 'Error: ' . $_FILES['archivo']['error'] . '<br/>';
    }else{

 
      if( file_exists( 'upload/'.$nombre) ){
        echo '
		<div class="alert alert-danger alert-dismissable" id="txf_01">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> El archivo ya existe: '.$nombre.'.</p>
	</div>';
      }else{
		 //Guardo el nombre del archivo en la base de datos y su ubicacion
		$idVehiculo    = $_GET['imagen'];
		$idCliente = $arrCliente['idCliente'];
		$Fecha= fecha_actual();
		$nombre_final  = $idVehiculo.'-'.$nombre;
		
        move_uploaded_file($nombre_tmp,
          "upload/" . $nombre_final);

		$query ="INSERT INTO `clientes_vehiculos_img`(idVehiculo, idCliente, Fecha, Nombre) 
		VALUES ('$idVehiculo','$idCliente', '$Fecha', '$nombre_final')";
		$result = mysql_query($query, $dbConn);
 
 
      }
    }
  }else{
    echo '
	<div class="alert alert-danger alert-dismissable" id="txf_01">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Archivo Invalido.</p>
	</div>';
  }
}

	
	
?>