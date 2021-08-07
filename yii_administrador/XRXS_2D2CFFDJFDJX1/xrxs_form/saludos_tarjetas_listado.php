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
	if ( !empty($_POST['idTarjetaList']) )      $idTarjetaList    = $_POST['idTarjetaList'];
	if ( !empty($_POST['idTarjetaCat']) )       $idTarjetaCat     = $_POST['idTarjetaCat'];
	if ( !empty($_POST['img']) )                $img              = $_POST['img'];
	if ( !empty($_POST['motivo']) )             $motivo           = $_POST['motivo'];
	if ( !empty($_POST['estado']) )             $estado           = $_POST['estado'];
	if ( !empty($_POST['n_enviados']) )         $n_enviados       = $_POST['n_enviados'];
	
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
			case 'idTarjetaList': if(empty($idTarjetaList)){ $error['idTarjetaList'] = 'error/No ha ingresado la id de la tarjeta';}break;
			case 'idTarjetaCat':  if(empty($idTarjetaCat)){  $error['idTarjetaCat']  = 'error/No ha seleccionado una categoria';}break;
			case 'img':           if(empty($img)){           $error['img']           = 'error/No ha ingresado el nombre de la imagen';}break;
			case 'motivo':        if(empty($motivo)){        $error['motivo']        = 'error/No ha ingresado el motivo';}break;
			case 'estado':        if(empty($estado)){        $error['estado']        = 'error/No ha seleccionado un estado';}break;
			case 'n_enviados':    if(empty($n_enviados)){    $error['n_enviados']    = 'error/No ha ingresado los enviados';}break;
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
			if(isset($motivo)){
			$sql_usuario = mysql_query("SELECT motivo FROM saludos_tarjetas_listado WHERE motivo='".$motivo."' AND idTarjetaCat='".$idTarjetaCat."' "); 
			$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['usuario'] = 'error/El motivo ya esta en uso';}

		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idTarjetaCat) && $idTarjetaCat != ''){   $a = "'".$idTarjetaCat."'" ;     }else{$a ="''";}
				if(isset($img) && $img != ''){                     $a .= ",'".$img."'" ;            }else{$a .= ",''";}
				if(isset($motivo) && $motivo != ''){               $a .= ",'".$motivo."'" ;         }else{$a .= ",''";}
				if(isset($estado) && $estado != ''){               $a .= ",'".$estado."'" ;         }else{$a .= ",''";}
				if(isset($n_enviados) && $n_enviados != ''){       $a .= ",'".$n_enviados."'" ;     }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `saludos_tarjetas_listado` (idTarjetaCat, img, motivo, estado, n_enviados) VALUES ({$a} )";
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
				$a = "idTarjetaList='".$idTarjetaList."'" ;
				if(isset($idTarjetaCat) && $idTarjetaCat != ''){    $a .= ",idTarjetaCat='".$idTarjetaCat."'" ;}
				if(isset($img) && $img != ''){                      $a .= ",img='".$img."'" ;}
				if(isset($motivo) && $motivo != ''){                $a .= ",motivo='".$motivo."'" ;}
				if(isset($estado) && $estado != ''){                $a .= ",estado='".$estado."'" ;}
				if(isset($n_enviados) && $n_enviados != ''){        $a .= ",n_enviados='".$n_enviados."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_listado` SET ".$a." WHERE idTarjetaList = '$idTarjetaList'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':	
		
			//se borra al usuario
			$query  = "DELETE FROM `saludos_tarjetas_listado` WHERE idTarjetaList = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
			
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;	
/*******************************************************************************************************************/		
		case 'img_add':			
		
		if ($_FILES["img"]["error"] > 0){	
			$error['img_add'] = 'error/Ha ocurrido un error';	
		} else {
		  //Se verifican las extensiones de los archivos
		  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		  //Se verifica que el archivo subido no exceda los 100 kb
		  $limite_kb = 1000;
		  //Sufijo
		  $sufijo = 'tarjList_';
		  
		  if (in_array($_FILES['img']['type'], $permitidos) && $_FILES['img']['size'] <= $limite_kb * 1024){
			//Se especifica carpeta de destino
			$ruta = $arrUsuario['ex_img'].$sufijo.$_FILES['img']['name'];
			//Se verifica que el archivo un archivo con el mismo nombre no existe
			if (!file_exists($ruta)){
			  //Se mueve el archivo a la carpeta previamente configurada
			  $resultado = @move_uploaded_file($_FILES["img"]["tmp_name"], $ruta);
			  if ($resultado){
				
				$a = "idTarjetaList='".$idTarjetaList."'" ;
				$a .= ",img='".$sufijo.$_FILES['img']['name']."'" ;
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_listado` SET ".$a." WHERE idTarjetaList = '$idTarjetaList'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&img_id='.$idTarjetaList );
				die;
				
			  } else {
				$error['img_add'] = 'error/Ocurrio un error al mover el archivo';
			  }
			} else {
			  $error['img_add'] = 'error/El archivo '.$_FILES['img']['name'].' ya existe';
			}
		  } else {
			$error['img_add'] = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido';
		  }
		}


		break;			
/*******************************************************************************************************************/
		case 'del_img':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT img
			FROM `saludos_tarjetas_listado`
			WHERE idTarjetaList = {$_GET['del_img']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);
			
			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['img'];
			//variables
			$a = "img=''" ;
			
			if(unlink($arrUsuario['ex_img'].$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_listado` SET ".$a." WHERE idTarjetaList = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'&img_id='.$_GET['del_img'] );
				die;
			
			}else{
			
				// actualizo los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_listado` SET ".$a." WHERE idTarjetaList = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'&img_id='.$_GET['del_img'] );
				die;
			
			}	
		
		break;			
		
		
					
/*******************************************************************************************************************/
	}
?>