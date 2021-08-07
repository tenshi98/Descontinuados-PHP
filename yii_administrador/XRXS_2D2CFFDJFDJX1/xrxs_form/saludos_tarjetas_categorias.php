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
	if ( !empty($_POST['idTarjetaCat']) )   $idTarjetaCat    = $_POST['idTarjetaCat'];
	if ( !empty($_POST['Nombre']) )         $Nombre          = $_POST['Nombre'];
	if ( !empty($_POST['img']) )            $img             = $_POST['img'];
	if ( !empty($_POST['n_enviados']) )     $n_enviados      = $_POST['n_enviados'];
	
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
			case 'idTarjetaCat':  if(empty($idTarjetaCat)){  $error['idTarjetaCat']  = 'error/No ha ingresado el id de la categoria';}break;
			case 'Nombre':        if(empty($Nombre)){        $error['Nombre']        = 'error/No ha ingresado el nombre de la categoria';}break;
			case 'img':           if(empty($img)){           $error['img']           = 'error/No ha ingresado la imagen de la categoria';}break;
			case 'n_enviados':    if(empty($n_enviados)){    $error['n_enviados']    = 'error/No ha ingresado el numero de enviados';}break;
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
				$sql_usuario = mysql_query("SELECT Nombre FROM saludos_tarjetas_categorias WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El Nombre ya esta en uso';}
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){               $a  = "'".$Nombre."'" ;             }else{$a  ="''";}
				if(isset($img) && $img != ''){                     $a .= ",'".$img."'" ;               }else{$a .=",''";}
				if(isset($n_enviados) && $n_enviados != ''){       $a .= ",'".$n_enviados."'" ;        }else{$a .=",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `saludos_tarjetas_categorias` (Nombre, img, n_enviados) VALUES ({$a} )";
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
				$a = "idTarjetaCat='".$idTarjetaCat."'" ;
				if(isset($Nombre) && $Nombre != ''){                $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($img) && $img != ''){                      $a .= ",img='".$img."'" ;}
				if(isset($n_enviados) && $n_enviados != ''){        $a .= ",n_enviados='".$n_enviados."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_categorias` SET ".$a." WHERE idTarjetaCat = '$idTarjetaCat'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
		break;			
/*******************************************************************************************************************/
		case 'del':	
			//se borra al usuario
			$query  = "DELETE FROM `saludos_tarjetas_categorias` WHERE idTarjetaCat = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
			
			//se borran los permisos del usuario
			$query  = "DELETE FROM `saludos_tarjetas_listado` WHERE idTarjetaCat = {$_GET['del']}";
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
		  $sufijo = 'tarjCat_';
		  
		  if (in_array($_FILES['img']['type'], $permitidos) && $_FILES['img']['size'] <= $limite_kb * 1024){
			//Se especifica carpeta de destino
			$ruta = $arrUsuario['ex_img'].$sufijo.$_FILES['img']['name'];
			//Se verifica que el archivo un archivo con el mismo nombre no existe
			if (!file_exists($ruta)){
			  //Se mueve el archivo a la carpeta previamente configurada
			  $resultado = @move_uploaded_file($_FILES["img"]["tmp_name"], $ruta);
			  if ($resultado){
				
				$a = "idTarjetaCat='".$idTarjetaCat."'" ;
				$a .= ",img='".$sufijo.$_FILES['img']['name']."'" ;
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_categorias` SET ".$a." WHERE idTarjetaCat = '$idTarjetaCat'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&img_id='.$idTarjetaCat );
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
			FROM `saludos_tarjetas_categorias`
			WHERE idTarjetaCat = {$_GET['del_img']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);
			
			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['img'];
			//variables
			$a = "img=''" ;
			
			if(unlink($arrUsuario['ex_img'].$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_categorias` SET ".$a." WHERE idTarjetaCat = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'&img_id='.$_GET['del_img'] );
				die;
			
			}else{
			
				// actualizo los datos de registro en la db
				$query  = "UPDATE `saludos_tarjetas_categorias` SET ".$a." WHERE idTarjetaCat = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'&img_id='.$_GET['del_img'] );
				die;
			
			}	
		
		break;		
			
			
/*******************************************************************************************************************/
		
	
	}
?>