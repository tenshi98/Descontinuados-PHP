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
	if ( !empty($_POST['Ciudad']) )           $Ciudad           = $_POST['Ciudad'];
	if ( !empty($_POST['Comuna']) )           $Comuna           = $_POST['Comuna'];
	if ( !empty($_POST['web_curso']) )        $web_curso 	    = $_POST['web_curso'];

	
	
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
			case 'Ciudad':          if(empty($Ciudad)){          $error['Ciudad']           = 'error/No ha ingresado el Ciudad';}break;
			case 'Comuna':          if(empty($Comuna)){          $error['Comuna']           = 'error/No ha ingresado la Comuna';}break;
			case 'web_curso':       if(empty($web_curso)){       $error['web_curso']        = 'error/No ha ingresado la carpeta de imagenes';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email_principal)){if(validaremail($email_principal)){ }else{   $error['email_principal']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono)){if (validarnumero($Fono)) {                             $error['Fono']	             = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Rut)){if(RutValidate($Rut)==0){                                $error['Rut']               = 'error/El Rut ingresado no es valido'; }}
	
	
	
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
				if(isset($Ciudad) && $Ciudad != ''){                     $a .= ",'".$Ciudad."'" ;            }else{$a .= ",''";}
				if(isset($Comuna) && $Comuna != ''){                     $a .= ",'".$Comuna."'" ;            }else{$a .= ",''";}
				if(isset($web_curso) && $web_curso != ''){               $a .= ",'".$web_curso."'" ;         }else{$a .= ",''";}
				
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `core_sistemas` (Nombre, imgLogo, email_principal, RazonSocial, Rut, Direccion, Fono, Ciudad, Comuna, web_curso) VALUES ({$a} )";
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
				if(isset($Ciudad) && $Ciudad != ''){                    $a .= ",Ciudad='".$Ciudad."'" ;}
				if(isset($Comuna) && $Comuna != ''){                    $a .= ",Comuna='".$Comuna."'" ;}
				if(isset($web_curso) && $web_curso != ''){              $a .= ",web_curso='".$web_curso."'" ;}
		
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
			$error['img_add'] = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido';
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