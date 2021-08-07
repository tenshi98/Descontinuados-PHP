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
	if ( !empty($_POST['idProcedimiento']) )  $idProcedimiento    = $_POST['idProcedimiento'];
	if ( !empty($_POST['idSistema']) )        $idSistema          = $_POST['idSistema'];
	if ( !empty($_POST['idCategoria']) )      $idCategoria        = $_POST['idCategoria'];
	if ( !empty($_POST['Version']) )          $Version            = $_POST['Version'];
	if ( !empty($_POST['Nombre']) )           $Nombre             = $_POST['Nombre'];
	if ( !empty($_POST['Direccion_img']) )    $Direccion_img      = $_POST['Direccion_img'];

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
			case 'idProcedimiento':  if(empty($idProcedimiento)){  $error['idProcedimiento']  = 'error/No ha ingresado el id';}break;
			case 'idSistema':        if(empty($idSistema)){        $error['idSistema']        = 'error/No ha ingresado el sistema';}break;
			case 'idCategoria':      if(empty($idCategoria)){      $error['idCategoria']      = 'error/No ha ingresado el permiso';}break;
			case 'Version':          if(empty($Version)){          $error['Version']          = 'error/No ha ingresado la version';}break;
			case 'Nombre':           if(empty($Nombre)){           $error['Nombre']           = 'error/No ha ingresado el nombre';}break;
			case 'Direccion_img':    if(empty($Direccion_img)){    $error['Direccion_img']    = 'error/No ha ingresado la imagen';}break;
			
		}
	}

/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			
			//Se verifica si el dato existe
			if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM procedimientos_listado WHERE idSistema='".$idSistema."' AND idCategoria='".$idCategoria."' AND Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El Nombre del archivo de procedimiento ya existe en el sistema';}
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				if(isset($_FILES["imgLogo"])){
					if ($_FILES["imgLogo"]["error"] > 0){ 
						$error['imgLogo']     = 'error/Ha ocurrido un error'; 
					} else {
						//Se verifican las extensiones de los archivos
						$permitidos = array("application/msword",
											"application/vnd.ms-word",
											"application/vnd.openxmlformats-officedocument.wordprocessingml.document", 
									
											"application/msexcel",
											"application/vnd.ms-excel",
											"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
											
											"application/mspowerpoint",
											"application/vnd.ms-powerpoint",
											"application/vnd.openxmlformats-officedocument.presentationml.presentation",
											
											"application/pdf",
											"application/octet-streamn",
											"application/x-real",
											"application/vnd.adobe.xfdf",
											"application/vnd.fdf"

											);
						//Se verifica que el archivo subido no exceda los 100 kb
						$limite_kb = 10000;
						//Sufijo
						$sufijo = 'archivo_procedimiento_';
					  
						if (in_array($_FILES['imgLogo']['type'], $permitidos) && $_FILES['imgLogo']['size'] <= $limite_kb * 1024){
							//Se especifica carpeta de destino
							$ruta = "upload/".$sufijo.$_FILES['imgLogo']['name'];
							//Se verifica que el archivo un archivo con el mismo nombre no existe
							if (!file_exists($ruta)){
								//Se mueve el archivo a la carpeta previamente configurada
								$resultado = @move_uploaded_file($_FILES["imgLogo"]["tmp_name"], $ruta);
								if ($resultado){
									

									//filtros
									if(isset($idSistema) && $idSistema != ''){          $a  = "'".$idSistema."'" ;        }else{$a  ="''";}
									if(isset($idCategoria) && $idCategoria != ''){      $a .= ",'".$idCategoria."'" ;     }else{$a .=",''";}
									if(isset($Version) && $Version != ''){              $a .= ",'".$Version."'" ;         }else{$a .=",''";}
									if(isset($Nombre) && $Nombre != ''){                $a .= ",'".$Nombre."'" ;          }else{$a .=",''";}
									$a .= ",'".$sufijo.$_FILES['imgLogo']['name']."'" ;
									
									// inserto los datos de registro en la db
									$query  = "INSERT INTO `procedimientos_listado` (idSistema, idCategoria, Version, Nombre, Direccion_img) VALUES ({$a} )";
									$result = mysql_query($query, $dbConn);
										
									header( 'Location: '.$location.'&created=true' );
									die;
		
										
								} else {
									$error['imgLogo']     = 'error/Ocurrio un error al mover el archivo'; 
								}
							} else {
								$error['imgLogo']     = 'error/El archivo '.$_FILES['imgLogo']['name'].' ya existe'; 
							}
						} else {
							$error['imgLogo']     = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido'; 
						}
					}
				
				}else{
					
					//filtros
					if(isset($idSistema) && $idSistema != ''){          $a  = "'".$idSistema."'" ;        }else{$a  ="''";}
					if(isset($idCategoria) && $idCategoria != ''){      $a .= ",'".$idCategoria."'" ;     }else{$a .=",''";}
					if(isset($Version) && $Version != ''){              $a .= ",'".$Version."'" ;         }else{$a .=",''";}
					if(isset($Nombre) && $Nombre != ''){                $a .= ",'".$Nombre."'" ;          }else{$a .=",''";}
									
					// inserto los datos de registro en la db
					$query  = "INSERT INTO `procedimientos_listado` (idSistema, idCategoria, Version, Nombre) VALUES ({$a} )";
					$result = mysql_query($query, $dbConn);
										
					header( 'Location: '.$location.'&created=true' );
					die;
									
				}
			
			
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				if(isset($_FILES["imgLogo"])){
					
					if ($_FILES["imgLogo"]["error"] > 0){ 
						$error['imgLogo']     = 'error/Ha ocurrido un error'; 
					} else {
						//Se verifican las extensiones de los archivos
						$permitidos = array("application/msword",
											"application/vnd.ms-word",
											"application/vnd.openxmlformats-officedocument.wordprocessingml.document", 
									
											"application/msexcel",
											"application/vnd.ms-excel",
											"application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
											
											"application/mspowerpoint",
											"application/vnd.ms-powerpoint",
											"application/vnd.openxmlformats-officedocument.presentationml.presentation",
											
											"application/pdf",
											"application/octet-streamn",
											"application/x-real",
											"application/vnd.adobe.xfdf",
											"application/vnd.fdf"

											);
						//Se verifica que el archivo subido no exceda los 100 kb
						$limite_kb = 10000;
						//Sufijo
						$sufijo = 'archivo_procedimiento_';
						  
						if (in_array($_FILES['imgLogo']['type'], $permitidos) && $_FILES['imgLogo']['size'] <= $limite_kb * 1024){
							//Se especifica carpeta de destino
							$ruta = "upload/".$sufijo.$_FILES['imgLogo']['name'];
							//Se verifica que el archivo un archivo con el mismo nombre no existe
							if (!file_exists($ruta)){
								//Se mueve el archivo a la carpeta previamente configurada
								$resultado = @move_uploaded_file($_FILES["imgLogo"]["tmp_name"], $ruta);
								if ($resultado){
									
									//Filtros
									$a = "idProcedimiento='".$idProcedimiento."'" ;
									if(isset($idSistema) && $idSistema != ''){             $a .= ",idSistema='".$idSistema."'" ;}
									if(isset($idCategoria) && $idCategoria != ''){         $a .= ",idCategoria='".$idCategoria."'" ;}
									if(isset($Version) && $Version != ''){                 $a .= ",Version='".$Version."'" ;}
									if(isset($Nombre) && $Nombre != ''){                   $a .= ",Nombre='".$Nombre."'" ;}
									$a .= ",Direccion_img='".$sufijo.$_FILES['imgLogo']['name']."'" ;
									
									// inserto los datos de registro en la db
									$query  = "UPDATE `procedimientos_listado` SET ".$a." WHERE idProcedimiento = '$idProcedimiento'";
									$result = mysql_query($query, $dbConn);
									
									header( 'Location: '.$location.'&edited=true' );
									die;
										
										
								} else {
									$error['imgLogo']     = 'error/Ocurrio un error al mover el archivo'; 
								}
							} else {
								$error['imgLogo']     = 'error/El archivo '.$_FILES['imgLogo']['name'].' ya existe'; 
							}
						} else {
							$error['imgLogo']     = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido'; 
						}
					}
			
				}else{
			
					//Filtros
					$a = "idProcedimiento='".$idProcedimiento."'" ;
					if(isset($idSistema) && $idSistema != ''){             $a .= ",idSistema='".$idSistema."'" ;}
					if(isset($idCategoria) && $idCategoria != ''){         $a .= ",idCategoria='".$idCategoria."'" ;}
					if(isset($Version) && $Version != ''){                 $a .= ",Version='".$Version."'" ;}
					if(isset($Nombre) && $Nombre != ''){                   $a .= ",Nombre='".$Nombre."'" ;}
									
					// inserto los datos de registro en la db
					$query  = "UPDATE `procedimientos_listado` SET ".$a." WHERE idProcedimiento = '$idProcedimiento'";
					$result = mysql_query($query, $dbConn);
									
					header( 'Location: '.$location.'&edited=true' );
					die;
					
				}
				
			}
		
	
		break;	
/*******************************************************************************************************************/
		case 'del_file':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT Direccion_img
			FROM `procedimientos_listado`
			WHERE idProcedimiento = {$_GET['del_file']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['Direccion_img'];
			

			if(unlink('upload/'.$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `procedimientos_listado` SET Direccion_img='' WHERE idProcedimiento = '{$_GET['del_file']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'&id='.$_GET['del_file'] );
				die;

			}else{

				// actualizo los datos de registro en la db
				$query  = "UPDATE `procedimientos_listado` SET Direccion_img='' WHERE idProcedimiento = '{$_GET['del_file']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'&id='.$_GET['del_file'] );
				die;

			} 


		break;							
/*******************************************************************************************************************/
		case 'del':	

			// Se obtiene el nombre del logo
			$query = "SELECT Direccion_img
			FROM `procedimientos_listado`
			WHERE idProcedimiento = {$_GET['del']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['Direccion_img'];
			

			if(unlink('upload/'.$archivo)){	
					
				//se borran los datos
				$query  = "DELETE FROM `procedimientos_listado` WHERE idProcedimiento = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
							
				header( 'Location: '.$location.'&deleted=true' );
				die;

			}else{

				//se borran los datos
				$query  = "DELETE FROM `procedimientos_listado` WHERE idProcedimiento = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
							
				header( 'Location: '.$location.'&deleted=true' );
				die;

			}
			


		break;							
					
/*******************************************************************************************************************/
	}
?>
