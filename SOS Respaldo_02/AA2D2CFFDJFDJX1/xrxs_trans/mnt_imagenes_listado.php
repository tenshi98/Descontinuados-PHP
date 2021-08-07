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

//Filtro para idTipoCliente
if ( !empty($_POST['idCatimg']) )    $idCatimg       = $_POST['idCatimg'];
if ( !empty($_POST['Nombre']) )      $Nombre         = $_POST['Nombre'];
					
//Ejecucion de codigo					
if ($_FILES["file"]["error"] > 0){
  $errors[1] = '
  <div id="txf_01" class="alert_error">  
	  	Ha ocurrido un error
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
  ';
} else {
	if(!empty($idCatimg)){


		//Se verifican las extensiones de los archivos
		$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		//Se verifica que el archivo subido no exceda los 100 kb
		$limite_kb = 1000;
		//Sufijo
		$sufijo = 'icn_';
		  
		if (in_array($_FILES['file']['type'], $permitidos) && $_FILES['file']['size'] <= $limite_kb * 1024){
			//Se especifica carpeta de destino
			$ruta = "img_upload/".$sufijo.$_FILES['file']['name'];
			//Se verifica que el archivo un archivo con el mismo nombre no existe
			if (!file_exists($ruta)){
				//Se mueve el archivo a la carpeta previamente configurada
				$resultado = @move_uploaded_file($_FILES["file"]["tmp_name"], $ruta);
				if ($resultado){

					$a = "'".$idCatimg."'" ;
					$a .= ",'".$Nombre."'" ;
					$a .= ",'".$sufijo.$_FILES['file']['name']."'" ;
		
					// inserto los datos de registro en la db
					$query  = "INSERT INTO `mnt_imagenes_listado` (idCatimg, Nombre, file) VALUES ({$a} )";
					$result = mysql_query($query, $dbConn);
							
					header( 'Location: '.$location );
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
					El archivo '.$_FILES['file']['name'].' ya existe
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
		
	}else{
		$errors[1] = '
		  <div id="txf_01" class="alert_error">  
				Ha ocurrido un error
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
					<i class="fa fa-times"></i>
				</a>
			</div>
		  ';
	}
}	
?>