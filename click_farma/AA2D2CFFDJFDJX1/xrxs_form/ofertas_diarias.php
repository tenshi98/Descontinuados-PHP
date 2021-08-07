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
	if ( !empty($_POST['idOfertasDia']) )   $idOfertasDia   = $_POST['idOfertasDia'];
	if ( !empty($_POST['Titulo']) )         $Titulo         = $_POST['Titulo'];
	if ( !empty($_POST['Descripcion']) )    $Descripcion    = $_POST['Descripcion'];
	if ( !empty($_POST['Valor']) )          $Valor          = $_POST['Valor'];
	if ( !empty($_POST['Direccion_img']) )  $Direccion_img  = $_POST['Direccion_img'];
	
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
			case 'idOfertasDia':   if(empty($idOfertasDia)){  $error['idOfertasDia']   = 'error/No ha ingresado el id';}break;
			case 'Titulo':         if(empty($Titulo)){        $error['Titulo']         = 'error/No ha ingresado el nombre de Titulo del sistema';}break;
			case 'Descripcion':    if(empty($Descripcion)){   $error['Descripcion']    = 'error/No ha seleccionado el Descripcion de Titulo';}break;
			case 'Valor':          if(empty($Valor)){         $error['Valor']          = 'error/No ha seleccionado el estado';}break;
			case 'Direccion_img':  if(empty($Direccion_img)){ $error['Direccion_img']  = 'error/No ha ingresado el nombre de la imagen de perfil';}break;
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
			if(isset($Titulo)){
				$sql_Titulo = mysql_query("SELECT Titulo FROM ofertas_diarias WHERE Titulo='".$Titulo."' "); 
				$n1 = mysql_num_rows($sql_Titulo);
			} else {$n1=0;}
			if($n1 > 0) {$error['Titulo'] = 'error/El nombre de Titulo ingresado ya existe';}
			
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				if ($_FILES["imgLogo"]["error"] > 0){ 
					$error['imgLogo']     = 'error/Ha ocurrido un error'; 
				} else {
				  //Se verifican las extensiones de los archivos
				  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
				  //Se verifica que el archivo subido no exceda los 100 kb
				  $limite_kb = 1000;
				  //Sufijo
				  $sufijo = 'ofert_dia_img_';
				  
				  if (in_array($_FILES['imgLogo']['type'], $permitidos) && $_FILES['imgLogo']['size'] <= $limite_kb * 1024){
					//Se especifica carpeta de destino
					$ruta = "upload/".$sufijo.$_FILES['imgLogo']['name'];
					//Se verifica que el archivo un archivo con el mismo nombre no existe
					if (!file_exists($ruta)){
					  //Se mueve el archivo a la carpeta previamente configurada
					  $resultado = @move_uploaded_file($_FILES["imgLogo"]["tmp_name"], $ruta);
					  if ($resultado){
						  
							$Direccion_img = $sufijo.$_FILES['imgLogo']['name'];
							
							//filtros
							if(isset($Titulo) && $Titulo != ''){                $a  = "'".$Titulo."'" ;          }else{$a  ="''";}
							if(isset($Descripcion) && $Descripcion != ''){      $a .= ",'".$Descripcion."'" ;    }else{$a .= ",''";}
							if(isset($Valor) && $Valor != ''){                  $a .= ",'".$Valor."'" ;          }else{$a .= ",''";}
							if(isset($Direccion_img) && $Direccion_img != ''){  $a .= ",'".$Direccion_img."'" ;  }else{$a .= ",''";}
							
							// inserto los datos de registro en la db
							$query  = "INSERT INTO `ofertas_diarias` (Titulo, Descripcion, Valor, Direccion_img) VALUES ({$a} )";
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
				
				
				
				
				
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idOfertasDia='".$idOfertasDia."'" ;
				if(isset($Titulo) && $Titulo != ''){                $a .= ",Titulo='".$Titulo."'" ;}
				if(isset($Descripcion) && $Descripcion != ''){      $a .= ",Descripcion='".$Descripcion."'" ;}
				if(isset($Valor) && $Valor != ''){                  $a .= ",Valor='".$Valor."'" ;}
				if(isset($Direccion_img) && $Direccion_img != ''){  $a .= ",Direccion_img='".$Direccion_img."'" ;}
				
				// inserto los datos de registro en la db
				$query  = "UPDATE `ofertas_diarias` SET ".$a." WHERE idOfertasDia = '$idOfertasDia'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT Direccion_img
			FROM `ofertas_diarias`
			WHERE idOfertasDia = {$_GET['del']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['Direccion_img'];

			if(unlink('upload/'.$archivo)){	
				
				//se borran los datos	
				$query  = "DELETE FROM `ofertas_diarias` WHERE idOfertasDia = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
							
				header( 'Location: '.$location.'&deleted=true' );
				die;

			}else{

				//se borran los datos	
				$query  = "DELETE FROM `ofertas_diarias` WHERE idOfertasDia = {$_GET['del']}";
				$result = mysql_query($query, $dbConn);	
							
				header( 'Location: '.$location.'&deleted=true' );
				die;

			}

		break;	
/*******************************************************************************************************************/
		//Cambia el nivel del permiso
		case 'submit_img':	

			if ($_FILES["imgLogo"]["error"] > 0){ 
				$error['imgLogo']     = 'error/Ha ocurrido un error'; 
			} else {
			  //Se verifican las extensiones de los archivos
			  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			  //Se verifica que el archivo subido no exceda los 100 kb
			  $limite_kb = 1000;
			  //Sufijo
			  $sufijo = 'ofert_dia_img_';
			  
			  if (in_array($_FILES['imgLogo']['type'], $permitidos) && $_FILES['imgLogo']['size'] <= $limite_kb * 1024){
				//Se especifica carpeta de destino
				$ruta = "upload/".$sufijo.$_FILES['imgLogo']['name'];
				//Se verifica que el archivo un archivo con el mismo nombre no existe
				if (!file_exists($ruta)){
				  //Se mueve el archivo a la carpeta previamente configurada
				  $resultado = @move_uploaded_file($_FILES["imgLogo"]["tmp_name"], $ruta);
				  if ($resultado){
					
					//Filtro para idSistema
					if ( !empty($_POST['idOfertasDia']) )    $idOfertasDia       = $_POST['idOfertasDia'];
					
					$a = "idOfertasDia='".$idOfertasDia."'" ;
					$a .= ",Direccion_img='".$sufijo.$_FILES['imgLogo']['name']."'" ;

					// inserto los datos de registro en la db
					$query  = "UPDATE `ofertas_diarias` SET ".$a." WHERE idOfertasDia = '$idOfertasDia'";
					$result = mysql_query($query, $dbConn);
					
					header( 'Location: '.$location.'&id_img='.$idOfertasDia );
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


		break;	
/*******************************************************************************************************************/
		//Cambia el nivel del permiso
		case 'del_img':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT Direccion_img
			FROM `ofertas_diarias`
			WHERE idOfertasDia = {$_GET['del_img']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['Direccion_img'];
			//variables
			$a = "Direccion_img=''" ;

			if(unlink('upload/'.$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `ofertas_diarias` SET ".$a." WHERE idOfertasDia = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'&id_img='.$_GET['del_img'] );
				die;

			}else{

				// actualizo los datos de registro en la db
				$query  = "UPDATE `ofertas_diarias` SET ".$a." WHERE idOfertasDia = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'&id_img='.$_GET['del_img'] );
				die;

			} 


		break;	

		

	}
?>
