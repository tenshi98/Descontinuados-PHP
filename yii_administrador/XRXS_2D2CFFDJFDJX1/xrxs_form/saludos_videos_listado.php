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
	if ( !empty($_POST['idVideoList']) )      $idVideoList     = $_POST['idVideoList'];
	if ( !empty($_POST['idVideoCat']) )       $idVideoCat      = $_POST['idVideoCat'];
	if ( !empty($_POST['tipo']) )             $tipo            = $_POST['tipo'];
	if ( !empty($_POST['glosa']) )            $glosa           = $_POST['glosa'];
	if ( !empty($_POST['archivo']) )          $archivo         = $_POST['archivo'];
	if ( !empty($_POST['estado']) )           $estado          = $_POST['estado'];
	if ( !empty($_POST['n_enviados']) )       $n_enviados      = $_POST['n_enviados'];
	
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
			case 'idVideoList':   if(empty($idVideoList)){ $error['idVideoList'] = 'error/No ha ingresado la id del video';}break;
			case 'idVideoCat':    if(empty($idVideoCat)){  $error['idVideoCat']  = 'error/No ha seleccionado una categoria';}break;
			case 'tipo':          if(empty($tipo)){        $error['tipo']        = 'error/No ha seleccionado el tipo de video';}break;
			case 'glosa':         if(empty($glosa)){       $error['glosa']       = 'error/No ha ingresado la glosa';}break;
			case 'archivo':       if(empty($archivo)){     $error['archivo']     = 'error/No ha ingresado el archivo';}break;
			case 'estado':        if(empty($estado)){      $error['estado']      = 'error/No ha seleccionado un estado';}break;
			case 'n_enviados':    if(empty($n_enviados)){  $error['n_enviados']  = 'error/No ha ingresado los enviados';}break;
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
			if(isset($glosa)){
			$sql_usuario = mysql_query("SELECT glosa FROM saludos_videos_listado WHERE glosa='".$glosa."' AND idVideoCat='".$idVideoCat."' "); 
			$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['usuario'] = 'error/La glosa ya esta en uso';}

		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idVideoCat) && $idVideoCat != ''){   $a = "'".$idVideoCat."'" ;      }else{$a ="''";}
				if(isset($tipo) && $tipo != ''){               $a .= ",'".$tipo."'" ;          }else{$a .= ",''";}
				if(isset($glosa) && $glosa != ''){             $a .= ",'".$glosa."'" ;         }else{$a .= ",''";}
				if(isset($archivo) && $archivo != ''){         $a .= ",'".$archivo."'" ;       }else{$a .= ",''";}
				if(isset($estado) && $estado != ''){           $a .= ",'".$estado."'" ;        }else{$a .= ",''";}
				if(isset($n_enviados) && $n_enviados != ''){   $a .= ",'".$n_enviados."'" ;    }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `saludos_videos_listado` (idVideoCat, tipo, glosa, archivo, estado, n_enviados) VALUES ({$a} )";
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
				$a = "idVideoList='".$idVideoList."'" ;
				if(isset($idVideoCat) && $idVideoCat != ''){    $a .= ",idVideoCat='".$idVideoCat."'" ;}
				if(isset($tipo) && $tipo != ''){                $a .= ",tipo='".$tipo."'" ;}
				if(isset($glosa) && $glosa != ''){              $a .= ",glosa='".$glosa."'" ;}
				if(isset($archivo) && $archivo != ''){          $a .= ",archivo='".$archivo."'" ;}
				if(isset($estado) && $estado != ''){            $a .= ",estado='".$estado."'" ;}
				if(isset($n_enviados) && $n_enviados != ''){    $a .= ",n_enviados='".$n_enviados."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `saludos_videos_listado` SET ".$a." WHERE idVideoList = '$idVideoList'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':	
		
			//se borra al usuario
			$query  = "DELETE FROM `saludos_videos_listado` WHERE idVideoList = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
			
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;	
/*******************************************************************************************************************/		
		case 'img_add':			
		
		if ($_FILES["archivo"]["error"] > 0){	
			$error['video_add'] = 'error/Ha ocurrido un error';	
		} else {
		  //Se verifican las extensiones de los archivos
		  $permitidos = array("video/mp4");
		  //Se verifica que el archivo subido no exceda un tamaño
		  $limite_kb = 1000000;
		  //Sufijo
		  $sufijo = 'videoList_';
		  $nombreArchivo = $_FILES['archivo']['name'];
		  $nombreArchivo = str_replace(' ', '_', $nombreArchivo);
		  
		  if (in_array($_FILES['archivo']['type'], $permitidos) && $_FILES['archivo']['size'] <= $limite_kb * 1024){
			//Se especifica carpeta de destino
			$ruta = $arrUsuario['ex_videos'].$sufijo.$nombreArchivo;
			//Se verifica que el archivo un archivo con el mismo nombre no existe
			if (!file_exists($ruta)){
			  //Se mueve el archivo a la carpeta previamente configurada
			  $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], $ruta);
			  if ($resultado){
				
				$a = "archivo='".$sufijo.$_FILES['archivo']['name']."'" ;
				// inserto los datos de registro en la db
				$query  = "UPDATE `saludos_videos_listado` SET ".$a." WHERE idVideoList = '$idVideoList'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&vid_id='.$idVideoList );
				die;
				
			  } else {
				$error['img_add'] = 'error/Ocurrio un error al mover el archivo';
			  }
			} else {
			  $error['img_add'] = 'error/El archivo '.$_FILES['archivo']['name'].' ya existe';
			}
		  } else {
			$error['img_add'] = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido';
		  }
		}


		break;			
/*******************************************************************************************************************/
		case 'del_video':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT archivo
			FROM `saludos_videos_listado`
			WHERE idVideoList = {$_GET['del_video']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);
			
			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['archivo'];
			//variables
			$a = "archivo=''" ;
			
			if(unlink($arrUsuario['ex_videos'].$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `saludos_videos_listado` SET ".$a." WHERE idVideoList = '{$_GET['del_video']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'&vid_id='.$_GET['del_video'] );
				die;
			
			}else{
			
				// actualizo los datos de registro en la db
				$query  = "UPDATE `saludos_videos_listado` SET ".$a." WHERE idVideoList = '{$_GET['del_video']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'&vid_id='.$_GET['del_video'] );
				die;
			
			}	
		
		break;			
		
		
					
/*******************************************************************************************************************/
	}
?>