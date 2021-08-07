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
	if ( !empty($_POST['idUsuario']) )      $idUsuario        = $_POST['idUsuario'];
	if ( !empty($_POST['usuario']) )        $usuario          = $_POST['usuario'];
	if ( !empty($_POST['oldpassword']) )    $oldpassword      = $_POST['oldpassword'];
	if ( !empty($_POST['password']) )       $password         = $_POST['password'];
	if ( !empty($_POST['repassword']) )     $repassword       = $_POST['repassword'];
	if ( !empty($_POST['tipo']) )           $tipo             = $_POST['tipo'];
	if ( !empty($_POST['idEstado']) )       $idEstado 	      = $_POST['idEstado'];
	if ( !empty($_POST['email']) )          $email 	          = $_POST['email'];
	if ( !empty($_POST['Nombre']) )         $Nombre 	      = $_POST['Nombre'];
	if ( !empty($_POST['Rut']) )            $Rut 	          = $_POST['Rut'];
	if ( !empty($_POST['fNacimiento']) )    $fNacimiento 	  = $_POST['fNacimiento'];
	if ( !empty($_POST['Direccion']) )      $Direccion 	      = $_POST['Direccion'];
	if ( !empty($_POST['Fono']) )           $Fono 	          = $_POST['Fono'];
	if ( !empty($_POST['Ciudad']) )         $Ciudad 	      = $_POST['Ciudad'];
	if ( !empty($_POST['Comuna']) )         $Comuna 	      = $_POST['Comuna'];
	if ( !empty($_POST['Direccion_img']) )  $Direccion_img    = $_POST['Direccion_img'];
	if ( !empty($_POST['idTheme']) )        $idTheme          = $_POST['idTheme'];
	if ( !empty($_POST['idSistema']) )      $idSistema        = $_POST['idSistema'];
	
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
			case 'idUsuario':      if(empty($idUsuario)){      $error['idUsuario']        = 'error/No ha ingresado el id del usuario';}break;
			case 'usuario':        if(empty($usuario)){        $error['usuario']          = 'error/No ha ingresado el nombre de usuario';}break;
			case 'oldpassword':    if(empty($oldpassword)){    $error['oldpassword']      = 'error/No ha ingresado la antigua contraseña';}break;
			case 'password':       if(empty($password)){       $error['password']         = 'error/No ha ingresado la contraseña';}break;
			case 'repassword':     if(empty($repassword)){     $error['repassword']       = 'error/No ha ingresado la repeticion de la contraseña';}break;
			case 'tipo':           if(empty($tipo)){           $error['tipo']             = 'error/No ha seleccionado el tipo de usuario';}break;
			case 'idEstado':       if(empty($idEstado)){       $error['idEstado']         = 'error/No ha seleccionado un estado';}break;
			case 'email':          if(empty($email)){          $error['email']            = 'error/No ha ingresado el email';}break;
			case 'Nombre':         if(empty($Nombre)){         $error['Nombre']           = 'error/No ha ingresado el nombre real';}break;
			case 'Rut':            if(empty($Rut)){            $error['Rut']              = 'error/No ha ingresado el Rut';}break;
			case 'fNacimiento':    if(empty($fNacimiento)){    $error['fNacimiento']      = 'error/No ha ingresado la fecha de nacimiento';}break;
			case 'Direccion':      if(empty($Direccion)){      $error['Direccion']        = 'error/No ha ingresado el domicilio';}break;
			case 'Fono':           if(empty($Fono)){           $error['Fono']             = 'error/No ha ingresado el telefono de contacto';}break;
			case 'Ciudad':         if(empty($Ciudad)){         $error['Ciudad']           = 'error/No ha ingresado la ciudad';}break;
			case 'Comuna':         if(empty($Comuna)){         $error['Comuna']           = 'error/No ha ingresado la comuna';}break;
			case 'Direccion_img':  if(empty($Direccion_img)){  $error['Direccion_img']    = 'error/No ha ingresado una imagen';}break;
			case 'idTheme':        if(empty($idTheme)){        $error['idTheme']          = 'error/No ha seleccionado un tema';}break;
			case 'idSistema':      if(empty($idSistema)){      $error['idSistema']        = 'error/No ha seleccionado el sistema';}break;
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
		case 'login':  
		//si no hay errores
		if ( empty($error) ) {
			
			// verificamos que los datos ingresados correspondan a un usuario
			if ( $arrUsuario = esUsuario($usuario,md5($password),$dbConn) ) {
					//Verifico si el usuario esta activo o inactivo
					if($arrUsuario['idEstado']==1){
						
						// definimos las sesiones
						$_SESSION['usuario'] 	= $arrUsuario['usuario'];
						$_SESSION['password']	= $arrUsuario['password'];
							
						//Almaceno la fecha y la hora del ingreso
						$fecha=date("Y-m-d");
						date_default_timezone_set("Chile/Continental");
						$hora=date("H:i:s",time());
						//Actualizo la tabla de los usuarios
						$sql = "UPDATE usuarios_listado
						SET Ultimo_acceso='".$fecha."'
						WHERE idUsuario='".$arrUsuario['idUsuario']."' ";
						$resultado = mysql_query($sql,$dbConn);
						//Inserto la fecha con el ingreso
						$query  = "INSERT INTO `usuarios_accesos` (idUsuario,Fecha, Hora) VALUES ({$arrUsuario['idUsuario']},'{$fecha}','{$hora}' )";
						$result = mysql_query($query, $dbConn);
						
						// si todo esta bien te redirige hacia la pagina principal
						header( 'Location: '.$location );
						die;
						
					} else {
						// si el usuario esta inactivo reenvia a una pagina
						$error['idUsuario']   = 'error/Su usuario esta desactivado, Contactese con el administrador';
					}		
				//si no reconoce al usuario, envia un error	
				} else {
					$error['idUsuario']   = 'error/El nombre de usuario o contraseña no coinciden';
			}
		} 
		 break;
/*******************************************************************************************************************/		
		case 'getpass':
		
			//traigo los datos almacenados
			$query = "SELECT 
			usuarios_listado.email,
			core_sistemas.RazonSocial,
			core_sistemas.email_principal	
			FROM `usuarios_listado` 
			LEFT JOIN `core_sistemas` ON core_sistemas.idSistema = usuarios_listado.idSistema
			WHERE usuarios_listado.email='".$email."'  ";	
			$resultado = mysql_query ($query, $dbConn);
			$rowusr = mysql_fetch_assoc ($resultado);
			
			//verifico si los datos ingresados son iguales a los almacenados
			if(isset($email)){
				if($rowusr['email']!=$email){  $error['email'] 	  = 'error/El email ingresado no existe';}	
			}
	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			 
					//Generacion de nueva clave
					$num_caracteres = "10"; //cantidad de caracteres de la clave
					$clave = substr(md5(rand()),0,$num_caracteres); //generador aleatorio de claves 
					$nueva_clave = md5($clave);//se codifica la clave 
					
					//Actualizacion de la clave en la base de datos
					$query  = "UPDATE `usuarios_listado` SET password='".$nueva_clave."' WHERE email='".$email."' AND mode='".neomode."' ";
					$result = mysql_query($query, $dbConn);
					
					//envio de correo de con la clave nueva
					$mail             = new PHPMailer();
					$mail->IsHTML(true);
					$mail->SMTPAuth   = true;
					$mail->Host       = "localhost";
					//>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
					//====== DE QUIEN ES ========
					$mail->From=$rowusr['email_principal'];
					$mail->FromName=$rowusr['RazonSocial'];
					$mail->Sender=$rowusr['email_principal'];
					$mail->AddReplyTo("".$rowusr['email_principal']."", "Responde a este mail");
					//====== PARA QUIEN =========
					$mail->Subject = "Cambio de password" ;
					$mail->AddAddress($email);    
					//====== MENSAJE =========
					$strBody = "<p>Se ha generado una nueva contraseña para el usuario ".$email.", su nueva contraseña es: ".$nueva_clave."</p>";
					$mail->MsgHTML($strBody);
					if(!$mail->Send()){
						$mail->ClearAddresses();
					}else{
						$mail->ClearAddresses();
					}
					
					//genero mensaje de alerta
					$error['email'] 	  = 'sucess/La nueva contraseña fue enviada a tu correo';
					
					header( 'Location: index.php' );
					die;	
			}

		break;	
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			//Se verifica si el usuario existe
			if(isset($usuario)){
				$sql_usuario = mysql_query("SELECT usuario FROM usuarios_listado WHERE usuario='".$usuario."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['usuario'] = 'error/El usuario ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($email)){
				$sql_email = mysql_query("SELECT email FROM usuarios_listado WHERE email='".$email."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['email'] = 'error/El email ya esta en uso';}
			
			
			//Valida si las contraseñas ingresadas son las mismas
			if(isset($password)&&isset($repassword)){
				if ( $password <> $repassword )      $error['password']  = 'error/Las contraseñas ingresadas no coinciden';
			}
	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($usuario) && $usuario != ''){               $a = "'".$usuario."'" ;            }else{$a ="''";}
				if(isset($password) && $password != ''){             $a .= ",'".md5($password)."'" ;    }else{$a .= ",''";}
				if(isset($tipo) && $tipo != ''){                     $a .= ",'".$tipo."'" ;             }else{$a .= ",''";}
				if(isset($idEstado) && $idEstado != ''){             $a .= ",'".$idEstado."'" ;         }else{$a .= ",''";}
				if(isset($email) && $email != ''){                   $a .= ",'".$email."'" ;            }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                 $a .= ",'".$Nombre."'" ;           }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                       $a .= ",'".$Rut."'" ;              }else{$a .= ",''";}
				if(isset($fNacimiento) && $fNacimiento != ''){       $a .= ",'".$fNacimiento."'" ;      }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){           $a .= ",'".$Direccion."'" ;        }else{$a .= ",''";}
				if(isset($Fono) && $Fono != ''){                     $a .= ",'".$Fono."'" ;             }else{$a .= ",''";}
				if(isset($Ciudad) && $Ciudad != ''){                 $a .= ",'".$Ciudad."'" ;           }else{$a .= ",''";}
				if(isset($Comuna) && $Comuna != ''){                 $a .= ",'".$Comuna."'" ;           }else{$a .= ",''";}
				if(isset($Direccion_img) && $Direccion_img != ''){   $a .= ",'".$Direccion_img."'" ;    }else{$a .= ",''";}
				if(isset($idTheme) && $idTheme != ''){               $a .= ",'".$idTheme."'" ;          }else{$a .= ",''";}
				if(isset($idSistema) && $idSistema != ''){           $a .= ",'".$idSistema."'" ;        }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `usuarios_listado` (usuario, password, tipo, idEstado, email, Nombre, Rut, fNacimiento, Direccion, Fono, Ciudad, Comuna, Direccion_img, idTheme, idSistema) VALUES ({$a} )";
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
				$a = "idUsuario='".$idUsuario."'" ;
				if(isset($usuario) && $usuario != ''){                $a .= ",usuario='".$usuario."'" ;}
				if(isset($password) && $password != ''){              $a .= ",password='".md5($password)."'" ;}
				if(isset($tipo) && $tipo != ''){                      $a .= ",tipo='".$tipo."'" ;}
				if(isset($idEstado) && $idEstado != ''){              $a .= ",idEstado='".$idEstado."'" ;}
				if(isset($email) && $email != ''){                    $a .= ",email='".$email."'" ;}
				if(isset($Nombre) && $Nombre != ''){                  $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Rut) && $Rut != ''){                        $a .= ",Rut='".$Rut."'" ;}
				if(isset($fNacimiento) && $fNacimiento != ''){        $a .= ",fNacimiento='".$fNacimiento."'" ;}
				if(isset($Direccion) && $Direccion != ''){            $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($Fono) && $Fono != ''){                      $a .= ",Fono='".$Fono."'" ;}
				if(isset($Ciudad) && $Ciudad != ''){                  $a .= ",Ciudad='".$Ciudad."'" ;}
				if(isset($Comuna) && $Comuna != ''){                  $a .= ",Comuna='".$Comuna."'" ;}
				if(isset($Direccion_img) && $Direccion_img != ''){    $a .= ",Direccion_img='".$Direccion_img."'" ;}
				if(isset($idTheme) && $idTheme != ''){                $a .= ",idTheme='".$idTheme."'" ;}
				if(isset($idSistema) && $idSistema != ''){            $a .= ",idSistema='".$idSistema."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '$idUsuario'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;			
/*******************************************************************************************************************/		
		case 'cambio_clave':
			//Verifico otros datos
			
			//Valida si las contraseñas ingresadas son las mismas
			if(isset($password)&&isset($repassword)){
				if ( $password <> $repassword )      $error['password']  = 'error/Las contraseñas ingresadas no coinciden';
			}
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				$a = "idUsuario='".$idUsuario."'" ;
				if(isset($password) && $password != ''){              $a .= ",password='".md5($password)."'" ;}
				
				// inserto los datos de registro en la db
				$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '$idUsuario'";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'pass':
			//traigo los datos almacenados
			$query = "SELECT password	
			FROM `usuarios_listado` 
			WHERE  idUsuario='".$idUsuario."'  ";	
			$resultado = mysql_query ($query, $dbConn);
			$rowusr = mysql_fetch_assoc ($resultado);
			
			//Valida que la contraseña antigua sea correcta
			if(isset($password)){
				if ( $rowusr['password'] <> md5($oldpassword) )    $error['password']  = 'error/Las contraseñas ingresadas no coinciden';
			}
			//Valida si las contraseñas ingresadas son las mismas
			if(isset($password)&&isset($repassword)){
				if ( $password <> $repassword )      $error['password']  = 'error/Las contraseñas ingresadas no coinciden';
			}
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				$a = "idUsuario='".$idUsuario."'" ;
				if(isset($password) && $password != ''){              $a .= ",password='".md5($password)."'" ;}
				
				// inserto los datos de registro en la db
				$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '$idUsuario'";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;		
/*******************************************************************************************************************/
		case 'img_add':

			if ($_FILES["imgLogo"]["error"] > 0){
				$error['password']  = 'error/Ha ocurrido un error';
			} else {
			  //Se verifican las extensiones de los archivos
			  $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			  //Se verifica que el archivo subido no exceda los 100 kb
			  $limite_kb = 1000;
			  //Sufijo
			  $sufijo = 'usr_img_';
			  
			  if (in_array($_FILES['imgLogo']['type'], $permitidos) && $_FILES['imgLogo']['size'] <= $limite_kb * 1024){
				//Se especifica carpeta de destino
				$ruta = "img_upload/".$sufijo.$_FILES['imgLogo']['name'];
				//Se verifica que el archivo un archivo con el mismo nombre no existe
				if (!file_exists($ruta)){
				  //Se mueve el archivo a la carpeta previamente configurada
				  $resultado = @move_uploaded_file($_FILES["imgLogo"]["tmp_name"], $ruta);
				  if ($resultado){
			
					$a = "idUsuario='".$idUsuario."'" ;
					$a .= ",Direccion_img='".$sufijo.$_FILES['imgLogo']['name']."'" ;
			
					// inserto los datos de registro en la db
					$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '$idUsuario'";
					$result = mysql_query($query, $dbConn);
					
					header( 'Location: '.$location );
					die;
					
				  } else {
					$error['password']  = 'error/Ocurrio un error al mover el archivo';
				  }
				} else {
				  $error['password']  = 'error/El archivo '.$_FILES['imgLogo']['name'].' ya existe';
				}
			  } else {
				$error['password']  = 'error/Esta tratando de subir un archivo no permitido';
			  }
			}
		break;		
/*******************************************************************************************************************/
		case 'del_img':	
		
			// Se obtiene el nombre del logo
			$query = "SELECT Direccion_img
			FROM `usuarios_listado`
			WHERE idUsuario = {$arrUsuario['idUsuario']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);
			
			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['Direccion_img'];
			//variables
			$a = "idUsuario='".$arrUsuario['idUsuario']."'" ;
			$a .= ",Direccion_img=''" ;
			
			if(unlink('img_upload/'.$archivo)){	
					
				// actualizo los datos de registro en la db
				$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '{$arrUsuario['idUsuario']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo			
				header( 'Location: '.$location.'?id_img=true' );
				die;
			
			}else{
			
				// actualizo los datos de registro en la db
				$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '{$arrUsuario['idUsuario']}'";
				$result = mysql_query($query, $dbConn);
				//Redirijo				
				header( 'Location: '.$location.'?id_img=true' );
				die;
			
			}
		
		break;		
/*******************************************************************************************************************/
		case 'del':	
		
			//se borra al usuario
			$query  = "DELETE FROM `usuarios_listado` WHERE idUsuario = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
			
			//se borran los permisos del usuario
			$query  = "DELETE FROM `usuarios_permisos` WHERE idUsuario = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;
	
		break;		
/*******************************************************************************************************************/
	}
?>