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
	if ( !empty($_POST['idSistema']) )        $idSistema        = $_POST['idSistema'];
	if ( !empty($_POST['Nombre']) )           $Nombre           = $_POST['Nombre'];
	if ( !empty($_POST['imgLogo']) )          $imgLogo          = $_POST['imgLogo'];
	if ( !empty($_POST['email_principal']) )  $email_principal  = $_POST['email_principal'];
	if ( !empty($_POST['RazonSocial']) )      $RazonSocial      = $_POST['RazonSocial'];
	if ( !empty($_POST['Rut']) )              $Rut              = $_POST['Rut'];
	if ( !empty($_POST['Direccion']) )        $Direccion        = $_POST['Direccion'];
	if ( !empty($_POST['Fono']) )             $Fono 	        = $_POST['Fono'];
	if ( !empty($_POST['Departamento']) )     $Departamento     = $_POST['Departamento'];
	if ( !empty($_POST['Provincia']) )        $Provincia        = $_POST['Provincia'];
	if ( !empty($_POST['Distrito']) )         $Distrito 	    = $_POST['Distrito'];
	if ( !empty($_POST['ex_img']) )           $ex_img 	        = $_POST['ex_img'];
	if ( !empty($_POST['ex_mp3']) )           $ex_mp3 	        = $_POST['ex_mp3'];
	if ( !empty($_POST['ex_videos']) )        $ex_videos 	    = $_POST['ex_videos'];
	if ( !empty($_POST['ex_upload']) )        $ex_upload 	    = $_POST['ex_upload'];
	if ( !empty($_POST['web_ex_img']) )       $web_ex_img 	    = $_POST['web_ex_img'];
	if ( !empty($_POST['web_ex_mp3']) )       $web_ex_mp3 	    = $_POST['web_ex_mp3'];
	if ( !empty($_POST['web_ex_videos']) )    $web_ex_videos    = $_POST['web_ex_videos'];
	if ( !empty($_POST['web_ex_upload']) )    $web_ex_upload    = $_POST['web_ex_upload'];
	if ( !empty($_POST['web_talento']) )      $web_talento      = $_POST['web_talento'];
	
	
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
			case 'idSistema':       if(empty($idSistema)){       $error['idSistema']        = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':          if(empty($Nombre)){          $error['Nombre']           = 'error/No ha ingresado el nombre del sistema';}break;
			case 'imgLogo':         if(empty($imgLogo)){         $error['imgLogo']          = 'error/No ha ingresado la imagen';}break;
			case 'email_principal': if(empty($email_principal)){ $error['email_principal']  = 'error/No ha ingresado el email';}break;
			case 'RazonSocial':     if(empty($RazonSocial)){     $error['RazonSocial']      = 'error/No ha ingresado la razon social';}break;
			case 'Rut':             if(empty($Rut)){             $error['Rut']              = 'error/No ha ingresado el Rut';}break;
			case 'Direccion':       if(empty($Direccion)){       $error['Direccion']        = 'error/No ha ingresado la direccion';}break;
			case 'Fono':            if(empty($Fono)){            $error['Fono']             = 'error/No ha ingresado el fono';}break;
			case 'Departamento':    if(empty($Departamento)){    $error['Departamento']     = 'error/No ha ingresado el departamento';}break;
			case 'Provincia':       if(empty($Provincia)){       $error['Provincia']        = 'error/No ha ingresado la provincia';}break;
			case 'Distrito':        if(empty($Distrito)){        $error['Distrito']         = 'error/No ha ingresado el distrito';}break;	
			case 'ex_img':          if(empty($ex_img)){          $error['ex_img']           = 'error/No ha ingresado la carpeta de imagenes';}break;
			case 'ex_mp3':          if(empty($ex_mp3)){          $error['ex_mp3']           = 'error/No ha ingresado la carpeta de mp3';}break;
			case 'ex_videos':       if(empty($ex_videos)){       $error['ex_videos']        = 'error/No ha ingresado la carpeta de videos';}break;
			case 'ex_upload':       if(empty($ex_upload)){       $error['ex_upload']        = 'error/No ha ingresado la carpeta de videos subidos';}break;
			case 'web_ex_img':      if(empty($web_ex_img)){      $error['web_ex_img']       = 'error/No ha ingresado la web de imagenes';}break;
			case 'web_ex_mp3':      if(empty($web_ex_mp3)){      $error['web_ex_mp3']       = 'error/No ha ingresado la web de mp3';}break;
			case 'web_ex_videos':   if(empty($web_ex_videos)){   $error['web_ex_videos']    = 'error/No ha ingresado la web de videos';}break;
			case 'web_ex_upload':   if(empty($web_ex_upload)){   $error['web_ex_upload']    = 'error/No ha ingresado la web de videos subidos';}break;
			case 'web_talento':     if(empty($web_talento)){     $error['web_talento']      = 'error/No ha ingresado la web de talento';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email)){if(validaremail($email)){ }else{   $error['email']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono)){if (validarnumero($Fono)) {         $error['Fono']	   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Rut)){if(RutValidate($Rut)==0){            $error['Rut']     = 'error/El Rut ingresado no es valido'; }}
	
	
	
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
				$sql_usuario = mysql_query("SELECT Nombre FROM core_sistemas WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El sistema ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($RazonSocial)){
				$sql_email = mysql_query("SELECT RazonSocial FROM core_sistemas WHERE RazonSocial='".$RazonSocial."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['RazonSocial'] = 'error/El sistema ya esta en uso';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){                     $a = "'".$Nombre."'" ;              }else{$a ="''";}
				if(isset($imgLogo) && $imgLogo != ''){                   $a .= ",'".$imgLogo."'" ;           }else{$a .= ",''";}
				if(isset($email_principal) && $email_principal != ''){   $a .= ",'".$email_principal."'" ;   }else{$a .= ",''";}
				if(isset($RazonSocial) && $RazonSocial != ''){           $a .= ",'".$RazonSocial."'" ;       }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                           $a .= ",'".$Rut."'" ;               }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){               $a .= ",'".$Direccion."'" ;         }else{$a .= ",''";}
				if(isset($Fono) && $Fono != ''){                         $a .= ",'".$Fono."'" ;              }else{$a .= ",''";}
				if(isset($Departamento) && $Departamento != ''){         $a .= ",'".$Departamento."'" ;      }else{$a .= ",''";}
				if(isset($Provincia) && $Provincia != ''){               $a .= ",'".$Provincia."'" ;         }else{$a .= ",''";}
				if(isset($Distrito) && $Distrito != ''){                 $a .= ",'".$Distrito."'" ;          }else{$a .= ",''";}
				if(isset($ex_img) && $ex_img != ''){                     $a .= ",'".$ex_img."'" ;            }else{$a .= ",''";}
				if(isset($ex_mp3) && $ex_mp3 != ''){                     $a .= ",'".$ex_mp3."'" ;            }else{$a .= ",''";}
				if(isset($ex_videos) && $ex_videos != ''){               $a .= ",'".$ex_videos."'" ;         }else{$a .= ",''";}
				if(isset($ex_upload) && $ex_upload != ''){               $a .= ",'".$ex_upload."'" ;         }else{$a .= ",''";}
				if(isset($web_ex_img) && $web_ex_img != ''){             $a .= ",'".$web_ex_img."'" ;        }else{$a .= ",''";}
				if(isset($web_ex_mp3) && $web_ex_mp3 != ''){             $a .= ",'".$web_ex_mp3."'" ;        }else{$a .= ",''";}
				if(isset($web_ex_videos) && $web_ex_videos != ''){       $a .= ",'".$web_ex_videos."'" ;     }else{$a .= ",''";}
				if(isset($web_ex_upload) && $web_ex_upload != ''){       $a .= ",'".$web_ex_upload."'" ;     }else{$a .= ",''";}
				if(isset($web_talento) && $web_talento != ''){           $a .= ",'".$web_talento."'" ;       }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `core_sistemas` (Nombre, imgLogo, email_principal, RazonSocial, Rut, Direccion, Fono, Departamento, Provincia, Distrito, ex_img, ex_mp3, ex_videos, ex_upload, web_ex_img, web_ex_mp3, web_ex_videos, web_ex_upload, web_talento) VALUES ({$a} )";
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
				$a = "idSistema='".$idSistema."'" ;
				if(isset($Nombre) && $Nombre != ''){                    $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($imgLogo) && $imgLogo != ''){                  $a .= ",imgLogo='".$imgLogo."'" ;}
				if(isset($email_principal) && $email_principal != ''){  $a .= ",email_principal='".$email_principal."'" ;}
				if(isset($RazonSocial) && $RazonSocial != ''){          $a .= ",RazonSocial='".$RazonSocial."'" ;}
				if(isset($Rut) && $Rut != ''){                          $a .= ",Rut='".$Rut."'" ;}
				if(isset($Direccion) && $Direccion != ''){              $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($Fono) && $Fono != ''){                        $a .= ",Fono='".$Fono."'" ;}
				if(isset($Departamento) && $Departamento != ''){        $a .= ",Departamento='".$Departamento."'" ;}
				if(isset($Provincia) && $Provincia != ''){              $a .= ",Provincia='".$Provincia."'" ;}
				if(isset($Distrito) && $Distrito != ''){                $a .= ",Distrito='".$Distrito."'" ;}
				if(isset($ex_img) && $ex_img != ''){                    $a .= ",ex_img='".$ex_img."'" ;}
				if(isset($ex_mp3) && $ex_mp3 != ''){                    $a .= ",ex_mp3='".$ex_mp3."'" ;}
				if(isset($ex_videos) && $ex_videos != ''){              $a .= ",ex_videos='".$ex_videos."'" ;}
				if(isset($ex_upload) && $ex_upload != ''){              $a .= ",ex_upload='".$ex_upload."'" ;}
				if(isset($web_ex_img) && $web_ex_img != ''){            $a .= ",web_ex_img='".$web_ex_img."'" ;}
				if(isset($web_ex_mp3) && $web_ex_mp3 != ''){            $a .= ",web_ex_mp3='".$web_ex_mp3."'" ;}
				if(isset($web_ex_videos) && $web_ex_videos != ''){      $a .= ",web_ex_videos='".$web_ex_videos."'" ;}
				if(isset($web_ex_upload) && $web_ex_upload != ''){      $a .= ",web_ex_upload='".$web_ex_upload."'" ;}
				if(isset($web_talento) && $web_talento != ''){          $a .= ",web_talento='".$web_talento."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `core_sistemas` SET ".$a." WHERE idSistema = '$idSistema'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
/*******************************************************************************************************************/		
		case 'img_add':			
		
		if ($_FILES["imgLogo"]["error"] > 0){	
			$error['img_add'] = 'error/Ha ocurrido un error';	
		} else {
		  //Se verifican las extensiones de los archivos
		  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
		  //Se verifica que el archivo subido no exceda los 100 kb
		  $limite_kb = 1000;
		  //Sufijo
		  $sufijo = 'logos_';
		  
		  if (in_array($_FILES['imgLogo']['type'], $permitidos) && $_FILES['imgLogo']['size'] <= $limite_kb * 1024){
			//Se especifica carpeta de destino
			$ruta = "img_upload/".$sufijo.$_FILES['imgLogo']['name'];
			//Se verifica que el archivo un archivo con el mismo nombre no existe
			if (!file_exists($ruta)){
			  //Se mueve el archivo a la carpeta previamente configurada
			  $resultado = @move_uploaded_file($_FILES["imgLogo"]["tmp_name"], $ruta);
			  if ($resultado){
				
				$a = "idSistema='".$idSistema."'" ;
				$a .= ",imgLogo='".$sufijo.$_FILES['imgLogo']['name']."'" ;
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `core_sistemas` SET ".$a." WHERE idSistema = '$idSistema'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&img_id='.$idSistema );
				die;
				
			  } else {
				$error['img_add'] = 'error/Ocurrio un error al mover el archivo';
			  }
			} else {
			  $error['img_add'] = 'error/El archivo '.$_FILES['imgLogo']['name'].' ya existe';
			}
		  } else {
			$error['img_add'] = 'error/Esta tratando de subir un archivo no permitido o que excede el tama??o permitido';
		  }
		}


		break;							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `core_sistemas` WHERE idSistema = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
/*******************************************************************************************************************/
		case 'del_img':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT imgLogo
			FROM `core_sistemas`
			WHERE idSistema = {$_GET['del_img']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);
			
			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['imgLogo'];
			//variables
			$a = "idSistema='".$_GET['del_img']."'" ;
			$a .= ",imgLogo=''" ;
			
			if(unlink('img_upload/'.$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `core_sistemas` SET ".$a." WHERE idSistema = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'&img_id='.$_GET['del_img'] );
				die;
			
			}else{
			
				// actualizo los datos de registro en la db
				$query  = "UPDATE `core_sistemas` SET ".$a." WHERE idSistema = '{$_GET['del_img']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'&img_id='.$_GET['del_img'] );
				die;
			
			}	
		
		break;							
/*******************************************************************************************************************/
	}
?>