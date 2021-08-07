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

if ($_FILES["imgLogo"]["error"] > 0){
  $errors[1] = '
  <div id="txf_01" class="alert_error">  
	  	Ha ocurrido un error
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
  ';
} else {
  //Se verifican las extensiones de los archivos
  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
  //Se verifica que el archivo subido no exceda los 100 kb
  $limite_kb = 1000;
  //Sufijo
  $sufijo = 'logos_';
  
  if (in_array($_FILES['imgLogo']['type'], $permitidos) && $_FILES['imgLogo']['size'] <= $limite_kb * 1024){
    //Se especifica carpeta de destino
    $ruta = "img_upload/".$sufijo.$_FILES['imgLogo']['name'];
    //Se verifica que el archivo un archivo con el mismo nombre no existe
    if (!file_exists($ruta)){
      //Se mueve el archivo a la carpeta previamente configurada
      $resultado = @move_uploaded_file($_FILES["imgLogo"]["tmp_name"], $ruta);
      if ($resultado){
        
		//Filtro para idTipoCliente
		if ( !empty($_POST['idTipoCliente']) )    $idTipoCliente       = $_POST['idTipoCliente'];
		
        $a = "idTipoCliente='".$idTipoCliente."'" ;
        $a .= ",imgLogo='".$sufijo.$_FILES['imgLogo']['name']."'" ;

		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_tipos` SET ".$a." WHERE idTipoCliente = '$idTipoCliente'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location.'&img_id='.$idTipoCliente );
		die;
		
		
      } else {
        $errors[1] = '
	<div id="txf_01" class="alert_error">  
	  	Ocurrio un error al mover el archivo
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
      }
    } else {
      $errors[1] = '
	  <div id="txf_01" class="alert_error">  
	  	El archivo '.$_FILES['imgLogo']['name'].' ya existe
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
    }
  } else {
    $errors[1] = '
	<div id="txf_01" class="alert_error">  
	  	Esta tratando de subir un archivo no permitido o que excede el tamaño permitido
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
  }
}	
?>