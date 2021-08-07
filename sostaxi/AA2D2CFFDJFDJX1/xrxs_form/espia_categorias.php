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
	if ( !empty($_POST['idEspiaCat']) )  $idEspiaCat  = $_POST['idEspiaCat'];
	if ( !empty($_POST['Nombre']) )      $Nombre      = $_POST['Nombre'];
	if ( !empty($_POST['imagen']) )      $imagen      = $_POST['imagen'];
	if ( !empty($_POST['Margen']) )      $Margen      = $_POST['Margen'];
	if ( !empty($_POST['grid_color']) )  $grid_color  = $_POST['grid_color'];
	if ( !empty($_POST['grid_border']) ) $grid_border = $_POST['grid_border'];
	if ( !empty($_POST['grid_shadow']) ) $grid_shadow = $_POST['grid_shadow'];
	if ( !empty($_POST['grid_img']) )    $grid_img    = $_POST['grid_img'];
	if ( !empty($_POST['body_col']) )    $body_col    = $_POST['body_col'];
	
	
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
			case 'idEspiaCat':  if(empty($idEspiaCat)){  $error['idEspiaCat']   = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':      if(empty($Nombre)){      $error['Nombre']       = 'error/No ha ingresado la imagen';}break;
			case 'imagen':      if(empty($imagen)){      $error['imagen']       = 'error/No ha ingresado el email';}break;
			case 'Margen':      if(empty($Margen)){      $error['Margen']       = 'error/No ha ingresado el email';}break;
			case 'grid_color':  if(empty($grid_color)){  $error['grid_color']   = 'error/No ha ingresado el email';}break;
			case 'grid_border': if(empty($grid_border)){ $error['grid_border']  = 'error/No ha ingresado el email';}break;
			case 'grid_shadow': if(empty($grid_shadow)){ $error['grid_shadow']  = 'error/No ha ingresado el email';}break;
			case 'grid_img':    if(empty($grid_img)){    $error['grid_img']     = 'error/No ha ingresado el email';}break;
			case 'body_col':    if(empty($body_col)){    $error['body_col']     = 'error/No ha ingresado el email';}break;
			
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
				$sql_usuario = mysql_query("SELECT Nombre FROM espia_categorias WHERE Nombre='".$Nombre."'  "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/La categoria ya existe';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				

				
				//Ejecucion de codigo					
				if ($_FILES["imagen"]["error"] > 0){ 
					$error['imagen']        = 'error/Ha ocurrido un error';
				} else {
					if(!empty($Nombre)){
						//Se verifican las extensiones de los archivos
						$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
						//Se verifica que el archivo subido no exceda los 100 kb
						$limite_kb = 1000;
						//Sufijo
						$sufijo = 'espcat_';
						  
						if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
							//Se especifica carpeta de destino
							$ruta = "upload/".$sufijo.$_FILES['imagen']['name'];
							//Se verifica que el archivo un archivo con el mismo nombre no existe
							if (!file_exists($ruta)){
								//Se mueve el archivo a la carpeta previamente configurada
								$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
								if ($resultado){
									
									//Se guarda el nombre del archivo guardado
									$archivox = $sufijo.$_FILES['imagen']['name'];
									//filtros
									if(isset($Nombre) && $Nombre != ''){              $a = "'".$Nombre."'" ;          }else{$a ="''";}
									if(isset($archivox) && $archivox != ''){          $a .= ",'".$archivox."'" ;      }else{$a .= ",''";}
									if(isset($Margen) && $Margen != ''){              $a .= ",'".$Margen."'" ;        }else{$a .= ",''";}
									if(isset($grid_color) && $grid_color != ''){      $a .= ",'".$grid_color."'" ;    }else{$a .= ",''";}
									if(isset($grid_border) && $grid_border != ''){    $a .= ",'".$grid_border."'" ;   }else{$a .= ",''";}
									if(isset($grid_shadow) && $grid_shadow != ''){    $a .= ",'".$grid_shadow."'" ;   }else{$a .= ",''";}
									if(isset($grid_img) && $grid_img != ''){          $a .= ",'".$grid_img."'" ;      }else{$a .= ",''";}
									if(isset($body_col) && $body_col != ''){          $a .= ",'".$body_col."'" ;      }else{$a .= ",''";}

									// inserto los datos de registro en la db
									$query  = "INSERT INTO `espia_categorias` (Nombre, imagen, Margen, grid_color, grid_border, grid_shadow, grid_img, body_col) VALUES ({$a} )";
									$result = mysql_query($query, $dbConn);
									
																
								} else {
									$error['imagen']        = 'error/Ocurrio un error al mover el archivo';
								}
							} else {
								$error['imagen']        = 'error/El archivo '.$_FILES['imagen']['name'].' ya existe';
							}
						} else {
							$error['imagen']        = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido';
						}		
						
					}else{
						$error['imagen']        = 'error/Ha ocurrido un error';
					}
				}
				
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idEspiaCat='".$idEspiaCat."'" ;
				if(isset($Nombre) && $Nombre != ''){                 $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($imagen) && $imagen != ''){                 $a .= ",imagen='".$imagen."'" ;}
				if(isset($Margen) && $Margen != ''){                 $a .= ",Margen='".$Margen."'" ;}
				if(isset($grid_color) && $grid_color != ''){         $a .= ",grid_color='".$grid_color."'" ;}
				if(isset($grid_border) && $grid_border != ''){       $a .= ",grid_border='".$grid_border."'" ;}
				if(isset($grid_shadow) && $grid_shadow != ''){       $a .= ",grid_shadow='".$grid_shadow."'" ;}
				if(isset($grid_img) && $grid_img != ''){             $a .= ",grid_img='".$grid_img."'" ;}
				if(isset($body_col) && $body_col != ''){             $a .= ",body_col='".$body_col."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `espia_categorias` SET ".$a." WHERE idEspiaCat = '$idEspiaCat'";
				$result = mysql_query($query, $dbConn);

				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `espia_categorias` WHERE idEspiaCat = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;
/*******************************************************************************************************************/
		case 'update_img':	

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {

				//Ejecucion de codigo					
				if ($_FILES["imagen"]["error"] > 0){ 
					$error['imagen']        = 'error/Ha ocurrido un error';
				} else {
					if(!empty($Nombre)){
						//Se verifican las extensiones de los archivos
						$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
						//Se verifica que el archivo subido no exceda los 100 kb
						$limite_kb = 1000;
						//Sufijo
						$sufijo = 'espcat_';
						  
						if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
							//Se especifica carpeta de destino
							$ruta = "upload/".$sufijo.$_FILES['imagen']['name'];
							//Se verifica que el archivo un archivo con el mismo nombre no existe
							if (!file_exists($ruta)){
								//Se mueve el archivo a la carpeta previamente configurada
								$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
								if ($resultado){

									//Se guarda el nombre del archivo guardado
									$archivox = $sufijo.$_FILES['imagen']['name'];
									//Filtros
									$a = "idEspiaCat='".$idEspiaCat."'" ;
									if(isset($Nombre) && $Nombre != ''){                 $a .= ",Nombre='".$Nombre."'" ;}
									if(isset($archivox) && $archivox != ''){             $a .= ",imagen='".$archivox."'" ;}
									if(isset($Margen) && $Margen != ''){                 $a .= ",Margen='".$Margen."'" ;}
									if(isset($grid_color) && $grid_color != ''){         $a .= ",grid_color='".$grid_color."'" ;}
									if(isset($grid_border) && $grid_border != ''){       $a .= ",grid_border='".$grid_border."'" ;}
									if(isset($grid_shadow) && $grid_shadow != ''){       $a .= ",grid_shadow='".$grid_shadow."'" ;}
									if(isset($grid_img) && $grid_img != ''){             $a .= ",grid_img='".$grid_img."'" ;}
									if(isset($body_col) && $body_col != ''){             $a .= ",body_col='".$body_col."'" ;}
				
							
									// inserto los datos de registro en la db
									$query  = "UPDATE `espia_categorias` SET ".$a." WHERE idEspiaCat = '$idEspiaCat'";
									$result = mysql_query($query, $dbConn);
						
									header( 'Location: '.$location );
									die;
																
								} else {
									$error['imagen']        = 'error/Ocurrio un error al mover el archivo';
								}
							} else {
								$error['imagen']        = 'error/El archivo '.$_FILES['imagen']['name'].' ya existe';
							}
						} else {
							$error['imagen']        = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido';
						}		
						
					}else{
						$error['imagen']        = 'error/Ha ocurrido un error';
					}
				}	
			
			}

		break;
/*******************************************************************************************************************/
		case 'del_img':	

			// Se obtiene el nombre del logo
			$query = "SELECT imagen
			FROM `espia_categorias`
			WHERE idEspiaCat = {$_GET['del_img']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['imagen'];
			//variables
			$a = "imagen=''" ;

			if(unlink('upload/'.$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `espia_categorias` SET ".$a." WHERE idEspiaCat = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'&id='.$_GET['del_img'] );
				die;

			}else{

				// actualizo los datos de registro en la db
				$query  = "UPDATE `espia_categorias` SET ".$a." WHERE idEspiaCat = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'&id='.$_GET['del_img'] );
				die;

			}

		break;		
							
/*******************************************************************************************************************/
	}
?>