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
	if ( !empty($_POST['idReceta']) )          $idReceta          = $_POST['idReceta'];
	if ( !empty($_POST['Nombre']) )            $Nombre            = $_POST['Nombre'];
	if ( !empty($_POST['Minutos']) )           $Minutos           = $_POST['Minutos'];
	if ( !empty($_POST['idDificultad']) )      $idDificultad      = $_POST['idDificultad'];
	if ( !empty($_POST['Preparacion']) )       $Preparacion       = $_POST['Preparacion'];
	if ( !empty($_POST['NPorciones']) )        $NPorciones        = $_POST['NPorciones'];
	if ( !empty($_POST['InfoNutricional']) )   $InfoNutricional   = $_POST['InfoNutricional'];
	if ( !empty($_POST['NombreImagen']) )      $NombreImagen      = $_POST['NombreImagen'];
	
	
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
			case 'idReceta':           if(empty($idReceta)){          $error['idReceta']         = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':             if(empty($Nombre)){            $error['Nombre']           = 'error/No ha ingresado el nombre';}break;
			case 'Minutos':            if(empty($Minutos)){           $error['Minutos']          = 'error/No ha ingresado los minutos de preparacion';}break;
			case 'idDificultad':       if(empty($idDificultad)){      $error['idDificultad']     = 'error/No ha ingresado la dificultad';}break;
			case 'Preparacion':        if(empty($Preparacion)){       $error['Preparacion']      = 'error/No ha ingresado la preparacion';}break;
			case 'NPorciones':         if(empty($NPorciones)){        $error['NPorciones']       = 'error/No ha ingresado el numero de porciones';}break;
			case 'InfoNutricional':    if(empty($InfoNutricional)){   $error['InfoNutricional']  = 'error/No ha ingresado la informacion nutricional';}break;
			case 'NombreImagen':       if(empty($NombreImagen)){      $error['NombreImagen']     = 'error/No ha ingresado el nombre de la imagen';}break;
			
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
			
			//Se verifica si el dato existe
			if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM productos_recetas WHERE  Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El nombre de la alerta ya existe';}
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//verificacion errores de la imagen
				if ($_FILES["NombreImagen"]["error"] > 0){ 
					$error['NombreImagen']     = 'error/Ha ocurrido un error'; 
				} else {
				  //Se verifican las extensiones de los archivos
				  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
				  //Se verifica que el archivo subido no exceda los 100 kb
				  $limite_kb = 1000;
				  //Sufijo
				  $sufijo = 'receta_';
				  
				  if (in_array($_FILES['NombreImagen']['type'], $permitidos) && $_FILES['NombreImagen']['size'] <= $limite_kb * 1024){
					//Se especifica carpeta de destino
					$ruta = "upload/".$sufijo.$Nombre.$_FILES['NombreImagen']['name'];
					//Se verifica que el archivo un archivo con el mismo nombre no existe
					if (!file_exists($ruta)){
					  //Se mueve el archivo a la carpeta previamente configurada
					  $resultado = @move_uploaded_file($_FILES["NombreImagen"]["tmp_name"], $ruta);
					  if ($resultado){
						
						//Filtro para idTipoCliente
						if ( !empty($_POST['idUsuario']) )    $idUsuario       = $_POST['idUsuario'];

							//filtros
							if(isset($Nombre) && $Nombre != ''){                     $a  = "'".$Nombre."'" ;            }else{$a  ="''";}
							if(isset($Minutos) && $Minutos != ''){                   $a .= ",'".$Minutos."'" ;          }else{$a .= ",''";}
							if(isset($idDificultad) && $idDificultad != ''){         $a .= ",'".$idDificultad."'" ;     }else{$a .= ",''";}
							if(isset($Preparacion) && $Preparacion != ''){           $a .= ",'".$Preparacion."'" ;      }else{$a .= ",''";}
							if(isset($NPorciones) && $NPorciones != ''){             $a .= ",'".$NPorciones."'" ;       }else{$a .= ",''";}
							if(isset($InfoNutricional) && $InfoNutricional != ''){   $a .= ",'".$InfoNutricional."'" ;  }else{$a .= ",''";}
							//rescato el nombre de la imagen
							$a .= ",'".$sufijo.$Nombre.$_FILES['NombreImagen']['name']."'" ;

							
							// inserto los datos de registro en la db
							$query  = "INSERT INTO `productos_recetas` (Nombre, Minutos, idDificultad, Preparacion, NPorciones, InfoNutricional, NombreImagen) VALUES ({$a} )";
							$result = mysql_query($query, $dbConn);
							//recibo el último id generado por mi sesion
							$ultimo_id = mysql_insert_id($dbConn);
								
							header( 'Location: '.$location.'&id='.$ultimo_id );
							die;
						
						
						
					  } else {
						$error['NombreImagen']     = 'error/Ocurrio un error al mover el archivo'; 
					  }
					} else {
					  $error['NombreImagen']     = 'error/El archivo '.$_FILES['NombreImagen']['name'].' ya existe'; 
					}
				  } else {
					$error['NombreImagen']     = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido'; 
				  }
				}
			
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				
				//verificacion errores de la imagen
				if(isset($_FILES["NombreImagen"])){
					if ($_FILES["NombreImagen"]["error"] > 0){ 
						$error['NombreImagen']     = 'error/Ha ocurrido un error'; 
					} else {
					  //Se verifican las extensiones de los archivos
					  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
					  //Se verifica que el archivo subido no exceda los 100 kb
					  $limite_kb = 1000;
					  //Sufijo
					  $sufijo = 'receta_';
					  
					  if (in_array($_FILES['NombreImagen']['type'], $permitidos) && $_FILES['NombreImagen']['size'] <= $limite_kb * 1024){
						//Se especifica carpeta de destino
						$ruta = "upload/".$sufijo.$Nombre.$_FILES['NombreImagen']['name'];
						//Se verifica que el archivo un archivo con el mismo nombre no existe
						if (!file_exists($ruta)){
						  //Se mueve el archivo a la carpeta previamente configurada
						  $resultado = @move_uploaded_file($_FILES["NombreImagen"]["tmp_name"], $ruta);
						  if ($resultado){
							
							//Filtro para idTipoCliente
							if ( !empty($_POST['idUsuario']) )    $idUsuario       = $_POST['idUsuario'];

								
								
								//Filtros
								$a = "idReceta='".$idReceta."'" ;
								$a .= ",NombreImagen='".$sufijo.$Nombre.$_FILES['NombreImagen']['name']."'" ;
						
								// inserto los datos de registro en la db
								$query  = "UPDATE `productos_recetas` SET ".$a." WHERE idReceta = '$idReceta'";
								$result = mysql_query($query, $dbConn);
								
		
							
						  } else {
							$error['NombreImagen']     = 'error/Ocurrio un error al mover el archivo'; 
						  }
						} else {
						  $error['NombreImagen']     = 'error/El archivo '.$_FILES['NombreImagen']['name'].' ya existe'; 
						}
					  } else {
						$error['NombreImagen']     = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido'; 
					  }
					}
				}	
				
				//Filtros
				$a = "idReceta='".$idReceta."'" ;
				if(isset($Nombre) && $Nombre != ''){                    $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Minutos) && $Minutos != ''){                  $a .= ",Minutos='".$Minutos."'" ;}
				if(isset($idDificultad) && $idDificultad != ''){        $a .= ",idDificultad='".$idDificultad."'" ;}
				if(isset($Preparacion) && $Preparacion != ''){          $a .= ",Preparacion='".$Preparacion."'" ;}
				if(isset($NPorciones) && $NPorciones != ''){            $a .= ",NPorciones='".$NPorciones."'" ;}
				if(isset($InfoNutricional) && $InfoNutricional != ''){  $a .= ",InfoNutricional='".$InfoNutricional."'" ;}
					
				// inserto los datos de registro en la db
				$query  = "UPDATE `productos_recetas` SET ".$a." WHERE idReceta = '$idReceta'";
				$result = mysql_query($query, $dbConn);
							
				header( 'Location: '.$location.'&edited=true' );
				die;
				
				
				
				
			}
		
		break;	
					
/*******************************************************************************************************************/
		case 'del':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT NombreImagen
			FROM `productos_recetas`
			WHERE idReceta = {$_GET['del']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['NombreImagen'];
			//variables
			$a = "NombreImagen=''" ;

			if(unlink('upload/'.$archivo)){	
					
				//se borran los datos
				$query  = "DELETE FROM `productos_recetas` WHERE idReceta = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);
				
				//se borran los datos
				$query  = "DELETE FROM `productos_recetas_productos` WHERE idReceta = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
							
				header( 'Location: '.$location.'&deleted=true' );
				die;

			}else{

				//se borran los datos
				$query  = "DELETE FROM `productos_recetas` WHERE idReceta = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);
				
				//se borran los datos
				$query  = "DELETE FROM `productos_recetas_productos` WHERE idReceta = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
							
				header( 'Location: '.$location.'&deleted=true' );
				die;

			} 
			

		break;							
/*******************************************************************************************************************/
		//Cambia el nivel del permiso
		case 'del_img':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT NombreImagen
			FROM `productos_recetas`
			WHERE idReceta = {$_GET['del_img']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['NombreImagen'];
			//variables
			$a = "NombreImagen=''" ;

			if(unlink('upload/'.$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `productos_recetas` SET ".$a." WHERE idReceta = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'&id='.$_GET['del_img'].'&img_deleted=true' );
				die;

			}else{

				// actualizo los datos de registro en la db
				$query  = "UPDATE `productos_recetas` SET ".$a." WHERE idReceta = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'&id='.$_GET['del_img'].'&img_deleted=true' );
				die;

			} 


		break;							
/*******************************************************************************************************************/
	}
?>
