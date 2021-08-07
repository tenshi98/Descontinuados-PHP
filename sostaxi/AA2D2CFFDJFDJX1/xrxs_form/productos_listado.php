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
	if ( !empty($_POST['idProducto']) )    $idProducto     = $_POST['idProducto'];
	if ( !empty($_POST['Nombre']) )        $Nombre         = $_POST['Nombre'];
	if ( !empty($_POST['Fabricante']) )    $Fabricante     = $_POST['Fabricante'];
	if ( !empty($_POST['idEvaluacion']) )  $idEvaluacion   = $_POST['idEvaluacion'];
	if ( !empty($_POST['Evaluacion']) )    $Evaluacion     = $_POST['Evaluacion'];
	if ( !empty($_POST['Precio']) )        $Precio         = $_POST['Precio'];
	if ( !empty($_POST['idPasillo']) )     $idPasillo      = $_POST['idPasillo'];
	if ( !empty($_POST['Informacion']) )   $Informacion    = $_POST['Informacion'];
	if ( !empty($_POST['Descripcion']) )   $Descripcion    = $_POST['Descripcion'];
	if ( !empty($_POST['Nombre_imagen']) ) $Nombre_imagen  = $_POST['Nombre_imagen'];
	if ( !empty($_POST['CodigoProd']) )    $CodigoProd     = $_POST['CodigoProd'];
	
	
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
			case 'idProducto':     if(empty($idProducto)){      $error['idProducto']     = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':         if(empty($Nombre)){          $error['Nombre']         = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Fabricante':     if(empty($Fabricante)){      $error['Fabricante']     = 'error/No ha ingresado el nombre del sistema';}break;
			case 'idEvaluacion':   if(empty($idEvaluacion)){    $error['idEvaluacion']   = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Evaluacion':     if(empty($Evaluacion)){      $error['Evaluacion']     = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Precio':         if(empty($Precio)){          $error['Precio']         = 'error/No ha ingresado el nombre del sistema';}break;
			case 'idPasillo':      if(empty($idPasillo)){       $error['idPasillo']      = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Informacion':    if(empty($Informacion)){     $error['Informacion']    = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Descripcion':    if(empty($Descripcion)){     $error['Descripcion']    = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Nombre_imagen':  if(empty($Nombre_imagen)){   $error['Nombre_imagen']  = 'error/No ha ingresado el nombre del sistema';}break;
			case 'CodigoProd':     if(empty($CodigoProd)){      $error['CodigoProd']     = 'error/No ha ingresado el nombre del sistema';}break;
			
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
				$sql_usuario = mysql_query("SELECT Nombre FROM productos_listado WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El nombre del Color ya existe';}

		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//verificacion errores de la imagen
				if ($_FILES["Nombre_imagen"]["error"] > 0){ 
					$error['Nombre_imagen']     = 'error/Ha ocurrido un error'; 
				} else {
				  //Se verifican las extensiones de los archivos
				  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
				  //Se verifica que el archivo subido no exceda los 100 kb
				  $limite_kb = 1000;
				  //Sufijo
				  $sufijo = 'producto_';
				  
				  if (in_array($_FILES['Nombre_imagen']['type'], $permitidos) && $_FILES['Nombre_imagen']['size'] <= $limite_kb * 1024){
					//Se especifica carpeta de destino
					$ruta = "upload/".$sufijo.$Nombre.$_FILES['Nombre_imagen']['name'];
					//Se verifica que el archivo un archivo con el mismo nombre no existe
					if (!file_exists($ruta)){
					  //Se mueve el archivo a la carpeta previamente configurada
					  $resultado = @move_uploaded_file($_FILES["Nombre_imagen"]["tmp_name"], $ruta);
					  if ($resultado){
						
						//Filtro para idTipoCliente
						if ( !empty($_POST['idUsuario']) )    $idUsuario       = $_POST['idUsuario'];

							//filtros
							if(isset($Nombre) && $Nombre != ''){                   $a  = "'".$Nombre."'" ;            }else{$a  ="''";}
							if(isset($Fabricante) && $Fabricante != ''){           $a .= ",'".$Fabricante."'" ;       }else{$a .=",''";}
							if(isset($idEvaluacion) && $idEvaluacion != ''){       $a .= ",'".$idEvaluacion."'" ;     }else{$a .=",''";}
							if(isset($Evaluacion) && $Evaluacion != ''){           $a .= ",'".$Evaluacion."'" ;       }else{$a .=",''";}
							if(isset($Precio) && $Precio != ''){                   $a .= ",'".$Precio."'" ;           }else{$a .=",''";}
							if(isset($idPasillo) && $idPasillo != ''){             $a .= ",'".$idPasillo."'" ;        }else{$a .=",''";}
							if(isset($Informacion) && $Informacion != ''){         $a .= ",'".$Informacion."'" ;      }else{$a .=",''";}
							if(isset($Descripcion) && $Descripcion != ''){         $a .= ",'".$Descripcion."'" ;      }else{$a .=",''";}
							if(isset($CodigoProd) && $CodigoProd != ''){           $a .= ",'".$CodigoProd."'" ;       }else{$a .=",''";}
							$a .= ",'".$sufijo.$Nombre.$_FILES['Nombre_imagen']['name']."'" ;

							// inserto los datos de registro en la db
							$query  = "INSERT INTO `productos_listado` (Nombre,Fabricante, idEvaluacion, Evaluacion, Precio, idPasillo, Informacion, Descripcion, CodigoProd, Nombre_imagen) VALUES ({$a} )";
							$result = mysql_query($query, $dbConn);
								
							header( 'Location: '.$location.'&created=true' );
							die;
						
					  } else {
						$error['Nombre_imagen']     = 'error/Ocurrio un error al mover el archivo'; 
					  }
					} else {
					  $error['Nombre_imagen']     = 'error/El archivo '.$_FILES['Nombre_imagen']['name'].' ya existe'; 
					}
				  } else {
					$error['Nombre_imagen']     = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido'; 
				  }
				}	
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//verificacion errores de la imagen
				if(isset($_FILES["Nombre_imagen"])){
					if ($_FILES["Nombre_imagen"]["error"] > 0){ 
						$error['Nombre_imagen']     = 'error/Ha ocurrido un error'; 
					} else {
					  //Se verifican las extensiones de los archivos
					  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
					  //Se verifica que el archivo subido no exceda los 100 kb
					  $limite_kb = 1000;
					  //Sufijo
					  $sufijo = 'producto_';
					  
					  if (in_array($_FILES['Nombre_imagen']['type'], $permitidos) && $_FILES['Nombre_imagen']['size'] <= $limite_kb * 1024){
						//Se especifica carpeta de destino
						$ruta = "upload/".$sufijo.$Nombre.$_FILES['Nombre_imagen']['name'];
						//Se verifica que el archivo un archivo con el mismo nombre no existe
						if (!file_exists($ruta)){
						  //Se mueve el archivo a la carpeta previamente configurada
						  $resultado = @move_uploaded_file($_FILES["Nombre_imagen"]["tmp_name"], $ruta);
						  if ($resultado){
							
							//Filtro para idTipoCliente
							if ( !empty($_POST['idUsuario']) )    $idUsuario       = $_POST['idUsuario'];

								
								
								//Filtros
								$a = "idProducto='".$idProducto."'" ;
								$a .= ",Nombre_imagen='".$sufijo.$Nombre.$_FILES['Nombre_imagen']['name']."'" ;
						
								// inserto los datos de registro en la db
								$query  = "UPDATE `productos_listado` SET ".$a." WHERE idProducto = '$idProducto'";
								$result = mysql_query($query, $dbConn);
								
		
							
						  } else {
							$error['Nombre_imagen']     = 'error/Ocurrio un error al mover el archivo'; 
						  }
						} else {
						  $error['Nombre_imagen']     = 'error/El archivo '.$_FILES['Nombre_imagen']['name'].' ya existe'; 
						}
					  } else {
						$error['Nombre_imagen']     = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido'; 
					  }
					}
				}	
				
				//Filtros
				$a = "idProducto='".$idProducto."'" ;
				if(isset($Nombre) && $Nombre != ''){                 $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Fabricante) && $Fabricante != ''){         $a .= ",Fabricante='".$Fabricante."'" ;}
				if(isset($idEvaluacion) && $idEvaluacion != ''){     $a .= ",idEvaluacion='".$idEvaluacion."'" ;}
				if(isset($Evaluacion) && $Evaluacion != ''){         $a .= ",Evaluacion='".$Evaluacion."'" ;}
				if(isset($Precio) && $Precio != ''){                 $a .= ",Precio='".$Precio."'" ;}
				if(isset($idPasillo) && $idPasillo != ''){           $a .= ",idPasillo='".$idPasillo."'" ;}
				if(isset($Informacion) && $Informacion != ''){       $a .= ",Informacion='".$Informacion."'" ;}
				if(isset($Descripcion) && $Descripcion != ''){       $a .= ",Descripcion='".$Descripcion."'" ;}
				if(isset($CodigoProd) && $CodigoProd != ''){         $a .= ",CodigoProd='".$CodigoProd."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `productos_listado` SET ".$a." WHERE idProducto = '$idProducto'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			// Se obtiene el nombre del logo
			$query = "SELECT Nombre_imagen
			FROM `productos_listado`
			WHERE idProducto = {$_GET['del']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['Nombre_imagen'];
			//variables
			$a = "Nombre_imagen=''" ;

			if(unlink('upload/'.$archivo)){	
					
				//se borran los permisos del usuario
				$query  = "DELETE FROM `productos_listado` WHERE idProducto = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
							
				header( 'Location: '.$location.'&deleted=true' );
				die;

			}else{

				//se borran los permisos del usuario
				$query  = "DELETE FROM `productos_listado` WHERE idProducto = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
							
				header( 'Location: '.$location.'&deleted=true' );
				die;

			} 
			

		break;							
/*******************************************************************************************************************/
		case 'del_img':	
			
			// Se obtiene el nombre del logo
			$query = "SELECT Nombre_imagen
			FROM `productos_listado`
			WHERE idProducto = {$_GET['del_img']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['Nombre_imagen'];
			//variables
			$a = "Nombre_imagen=''" ;

			if(unlink('upload/'.$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `productos_listado` SET ".$a." WHERE idProducto = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'&id='.$_GET['del_img'].'&img_deleted=true' );
				die;

			}else{

				// actualizo los datos de registro en la db
				$query  = "UPDATE `productos_listado` SET ".$a." WHERE idProducto = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'&id='.$_GET['del_img'].'&img_deleted=true' );
				die;

			} 
			
			
			

		break;						
/*******************************************************************************************************************/
	}
?>
