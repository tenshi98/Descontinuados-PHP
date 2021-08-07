<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idMusica']) )      $idMusica          = $_POST['idMusica'];
	if ( !empty($_POST['Nombre']) )        $Nombre            = $_POST['Nombre'];
	if ( !empty($_POST['NombreArchivo']) ) $NombreArchivo     = $_POST['NombreArchivo'];
	
/*******************************************************************************************************************/
/*                                      Verificacion de los datos obligatorios                                     */
/*******************************************************************************************************************/

	//limpio y separo los datos de la cadena de comprobacion
	$form_obligatorios = str_replace(' ', '', $form_obligatorios);
	$piezas = explode(",", $form_obligatorios);
	//recorro los elementos
	foreach ($piezas as $valor) {
		//veo si existe el dato solicitado y genero el error
		switch ($valor) {
			case 'idMusica':       if(empty($idMusica)){       $error['idMusica']      = 'error/No ha ingresado la id de la musica';}break;
			case 'Nombre':         if(empty($Nombre)){         $error['Nombre']        = 'error/No ha ingresado el nombre de la musica';}break;
			case 'NombreArchivo':  if(empty($NombreArchivo)){  $error['NombreArchivo'] = 'error/No ha ingresado el nombre del archivo';}break;
		}
	}
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			//Se verifica si el usuario existe
			if(isset($Nombre)){
			$sql_usuario = mysql_query("SELECT Nombre FROM saludos_tarjetas_musica WHERE Nombre='".$Nombre."'  "); 
			$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['usuario'] = 'error/El Nombre ya esta en uso';}

		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){                 $a = "'".$Nombre."'" ;               }else{$a ="''";}
				if(isset($NombreArchivo) && $NombreArchivo != ''){   $a .= ",'".$NombreArchivo."'" ;      }else{$a .= ",''";}
	
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `saludos_tarjetas_musica` (Nombre, NombreArchivo) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idMusica='".$idMusica."'" ;
				if(isset($Nombre) && $Nombre != ''){                  $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($NombreArchivo) && $NombreArchivo != ''){    $a .= ",NombreArchivo='".$NombreArchivo."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_musica` SET ".$a." WHERE idMusica = '$idMusica'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':	
		
			//se borra al usuario
			$query  = "DELETE FROM `saludos_tarjetas_musica` WHERE idMusica = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
			
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;	
/*******************************************************************************************************************/		
		case 'img_add':			
		
		if ($_FILES["NombreArchivo"]["error"] > 0){	
			$error['video_add'] = 'error/Ha ocurrido un error';	
		} else {
		  //Se verifican las extensiones de los archivos
		  $permitidos = array("audio/mpeg3","audio/mp3","audio/mpeg");
		  //Se verifica que el archivo subido no exceda un tamaño
		  $limite_kb = 1000000;
		  //Sufijo
		  $sufijo = 'musicList_';
		  
		  if (in_array($_FILES['NombreArchivo']['type'], $permitidos) && $_FILES['NombreArchivo']['size'] <= $limite_kb * 1024){
			//Se especifica carpeta de destino
			$ruta = $arrUsuario['ex_mp3'].$sufijo.$_FILES['NombreArchivo']['name'];
			//Se verifica que el archivo un archivo con el mismo nombre no existe
			if (!file_exists($ruta)){
			  //Se mueve el archivo a la carpeta previamente configurada
			  $resultado = @move_uploaded_file($_FILES["NombreArchivo"]["tmp_name"], $ruta);
			  if ($resultado){
				
				$a = "NombreArchivo='".$sufijo.$_FILES['NombreArchivo']['name']."'" ;
				// inserto los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_musica` SET ".$a." WHERE idMusica = '$idMusica'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&mus_id='.$idVideoList );
				die;
				
			  } else {
				$error['img_add'] = 'error/Ocurrio un error al mover el archivo';
			  }
			} else {
			  $error['img_add'] = 'error/El archivo '.$_FILES['NombreArchivo']['name'].' ya existe';
			}
		  } else {
			$error['img_add'] = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido';
		  }
		}


		break;			
/*******************************************************************************************************************/
		case 'del_mus':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT NombreArchivo
			FROM `saludos_tarjetas_musica`
			WHERE idMusica = {$_GET['del_mus']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);
			
			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['NombreArchivo'];
			//variables
			$a = "NombreArchivo=''" ;
			
			if(unlink($arrUsuario['ex_mp3'].$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_musica` SET ".$a." WHERE idMusica = '{$_GET['del_mus']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'&mus_id='.$_GET['del_mus'] );
				die;
			
			}else{
			
				// actualizo los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_musica` SET ".$a." WHERE idMusica = '{$_GET['del_mus']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'&mus_id='.$_GET['del_mus'] );
				die;
			
			}	
		
		break;			
		
		
					
/*******************************************************************************************************************/
	}
?>