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
	if ( !empty($_POST['idUsuario']) )      $idUsuario      = $_POST['idUsuario'];
	if ( !empty($_POST['usuario']) )        $usuario        = $_POST['usuario'];
	if ( !empty($_POST['password']) )       $password       = $_POST['password'];
	if ( !empty($_POST['repassword']) )     $repassword     = $_POST['repassword'];
	if ( !empty($_POST['oldpassword']) )    $oldpassword    = $_POST['oldpassword'];
	if ( !empty($_POST['tipo']) )           $tipo           = $_POST['tipo'];
	if ( !empty($_POST['Estado']) )         $Estado         = $_POST['Estado'];
	if ( !empty($_POST['email']) )          $email          = $_POST['email'];
	if ( !empty($_POST['Nombre']) )         $Nombre         = $_POST['Nombre'];
	if ( !empty($_POST['Rut']) )            $Rut 	        = $_POST['Rut'];
	if ( !empty($_POST['fNacimiento']) )    $fNacimiento    = $_POST['fNacimiento'];
	if ( !empty($_POST['Direccion']) )      $Direccion      = $_POST['Direccion'];
	if ( !empty($_POST['Fono']) )           $Fono 	        = $_POST['Fono'];
	if ( !empty($_POST['Ciudad']) )         $Ciudad 	    = $_POST['Ciudad'];
	if ( !empty($_POST['Comuna']) )         $Comuna 	    = $_POST['Comuna'];
	if ( !empty($_POST['Direccion_img']) )  $Direccion_img  = $_POST['Direccion_img'];
	if ( !empty($_POST['Ultimo_acceso']) )  $Ultimo_acceso  = $_POST['Ultimo_acceso'];
	if ( !empty($_POST['idTheme']) )        $idTheme        = $_POST['idTheme'];
	if ( !empty($_POST['idTipoCliente']) )  $idTipoCliente  = $_POST['idTipoCliente'];
	
	
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
			case 'idUsuario':      if(empty($idUsuario)){     $error['idUsuario']      = 'error/No ha ingresado el id del sistema';}break;
			case 'usuario':        if(empty($usuario)){       $error['usuario']        = 'error/No ha ingresado el usuario del sistema';}break;
			case 'password':       if(empty($password)){      $error['password']       = 'error/No ha ingresado la imagen';}break;
			case 'repassword':     if(empty($repassword)){    $error['repassword']     = 'error/No ha ingresado la imagen';}break;
			case 'oldpassword':    if(empty($oldpassword)){   $error['oldpassword']    = 'error/No ha ingresado la imagen';}break;
			case 'tipo':           if(empty($tipo)){          $error['tipo']           = 'error/No ha ingresado el email';}break;
			case 'Estado':         if(empty($Estado)){        $error['Estado']         = 'error/No ha ingresado la razon social';}break;
			case 'email':          if(empty($email)){         $error['email']          = 'error/No ha ingresado el email';}break;
			case 'Nombre':         if(empty($Nombre)){        $error['Nombre']         = 'error/No ha ingresado la Nombre';}break;
			case 'Rut':            if(empty($Rut)){           $error['Rut']            = 'error/No ha ingresado el Rut';}break;
			case 'fNacimiento':    if(empty($fNacimiento)){   $error['fNacimiento']    = 'error/No ha ingresado el fNacimiento';}break;
			case 'Direccion':      if(empty($Direccion)){     $error['Direccion']      = 'error/No ha ingresado la Direccion';}break;
			case 'Fono':           if(empty($Fono)){          $error['Fono']           = 'error/No ha ingresado el Fono';}break;	
			case 'Ciudad':         if(empty($Ciudad)){        $error['Ciudad']         = 'error/No ha ingresado la carpeta de imagenes';}break;
			case 'Comuna':         if(empty($Comuna)){        $error['Comuna']         = 'error/No ha ingresado la carpeta de mp3';}break;
			case 'Direccion_img':  if(empty($Direccion_img)){ $error['Direccion_img']  = 'error/No ha ingresado la carpeta de videos';}break;
			case 'Ultimo_acceso':  if(empty($Ultimo_acceso)){ $error['Ultimo_acceso']  = 'error/No ha ingresado la web de videos';}break;
			case 'idTheme':        if(empty($idTheme)){       $error['idTheme']        = 'error/No ha ingresado la web de videos';}break;
			case 'idTipoCliente':  if(empty($idTipoCliente)){ $error['idTipoCliente']  = 'error/No ha ingresado la web de talento';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email)){if(validaremail($email)){ }else{   $error['email']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono)){if (validarnumero($Fono)) {         $error['Fono']	   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Rut)){if(RutValidate($Rut)==0){            $error['Rut']     = 'error/El Rut ingresado no es valido'; }}
	if(isset($password)&&isset($repassword)){
		if ( $password <> $repassword )      $error['password']     = 'error/Las contraseñas ingresadas no coinciden'; 
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
			if(isset($usuario)){
				$sql_usuario = mysql_query("SELECT usuario FROM usuarios_listado WHERE usuario='".$usuario."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['usuario'] = 'error/El usuario ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($Nombre)){
				$sql_email = mysql_query("SELECT Nombre FROM usuarios_listado WHERE Nombre='".$Nombre."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Nombre'] = 'error/El Nombre ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($Rut)){
				$sql_email = mysql_query("SELECT Rut FROM usuarios_listado WHERE Rut='".$Rut."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Rut'] = 'error/El Rut ya esta en uso';}
			
			// se verifica si el correo ya existe
			if(isset($email)){
				$sql_email = mysql_query("SELECT email FROM usuarios_listado WHERE email='".$email."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['email'] = 'error/El email ya esta en uso';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($usuario) && $usuario != ''){              $a = "'".$usuario."'" ;          }else{$a ="''";}
				if(isset($password) && $password != ''){            $a .= ",'".md5($password)."'" ;  }else{$a .= ",''";}
				if(isset($tipo) && $tipo != ''){                    $a .= ",'".$tipo."'" ;           }else{$a .= ",''";}
				if(isset($Estado) && $Estado != ''){                $a .= ",'".$Estado."'" ;         }else{$a .= ",''";}
				if(isset($email) && $email != ''){                  $a .= ",'".$email."'" ;          }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                $a .= ",'".$Nombre."'" ;         }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                      $a .= ",'".$Rut."'" ;            }else{$a .= ",''";}
				if(isset($fNacimiento) && $fNacimiento != ''){      $a .= ",'".$fNacimiento."'" ;    }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){          $a .= ",'".$Direccion."'" ;      }else{$a .= ",''";}
				if(isset($Fono) && $Fono != ''){                    $a .= ",'".$Fono."'" ;           }else{$a .= ",''";}
				if(isset($Ciudad) && $Ciudad != ''){                $a .= ",'".$Ciudad."'" ;         }else{$a .= ",''";}
				if(isset($Comuna) && $Comuna != ''){                $a .= ",'".$Comuna."'" ;         }else{$a .= ",''";}
				if(isset($Direccion_img) && $Direccion_img != ''){  $a .= ",'".$Direccion_img."'" ;  }else{$a .= ",''";}
				if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){  $a .= ",'".$Ultimo_acceso."'" ;  }else{$a .= ",''";}
				if(isset($idTheme) && $idTheme != ''){              $a .= ",'".$idTheme."'" ;        }else{$a .= ",''";}
				if(isset($idTipoCliente) && $idTipoCliente != ''){  $a .= ",'".$idTipoCliente."'" ;  }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `usuarios_listado` (usuario, password, tipo, Estado, email, Nombre, Rut, fNacimiento, Direccion, Fono, Ciudad, Comuna, Direccion_img, Ultimo_acceso, idTheme, idTipoCliente) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			//
			if(isset($oldpassword)){
				$sql_email = mysql_query("SELECT password FROM usuarios_listado WHERE idUsuario='".$idUsuario."' AND password='".md5($oldpassword)."' ");
				$n2 = mysql_num_rows($sql_email);
				if($n2 == 0) {$error['password'] = 'error/Las contraseñas ingresadas no coinciden';}
			}
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idUsuario='".$idUsuario."'" ;
				if(isset($usuario) && $usuario != ''){              $a .= ",usuario='".$usuario."'" ;}
				if(isset($password) && $password != ''){            $a .= ",password='".md5($password)."'" ;}
				if(isset($tipo) && $tipo != ''){                    $a .= ",tipo='".$tipo."'" ;}
				if(isset($Estado) && $Estado != ''){                $a .= ",Estado='".$Estado."'" ;}
				if(isset($email) && $email != ''){                  $a .= ",email='".$email."'" ;}
				if(isset($Nombre) && $Nombre != ''){                $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Rut) && $Rut != ''){                      $a .= ",Rut='".$Rut."'" ;}
				if(isset($fNacimiento) && $fNacimiento != ''){      $a .= ",fNacimiento='".$fNacimiento."'" ;}
				if(isset($Direccion) && $Direccion != ''){          $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($Fono) && $Fono != ''){                    $a .= ",Fono='".$Fono."'" ;}
				if(isset($Ciudad) && $Ciudad != ''){                $a .= ",Ciudad='".$Ciudad."'" ;}
				if(isset($Comuna) && $Comuna != ''){                $a .= ",Comuna='".$Comuna."'" ;}
				if(isset($Direccion_img) && $Direccion_img != ''){  $a .= ",Direccion_img='".$Direccion_img."'" ;}
				if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){  $a .= ",Ultimo_acceso='".$Ultimo_acceso."'" ;}
				if(isset($idTheme) && $idTheme != ''){              $a .= ",idTheme='".$idTheme."'" ;}
				if(isset($idTipoCliente) && $idTipoCliente != ''){  $a .= ",idTipoCliente='".$idTipoCliente."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '$idUsuario'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `usuarios_listado` WHERE idUsuario = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;	
/*******************************************************************************************************************/
		//Cambio el estado de activo a inactivo
		case 'estado':	
		
			$idUsuario  = $_GET['id'];
			$estado     = $_GET['estado'];
			$query  = "UPDATE usuarios_listado SET Estado = '$estado'	
			WHERE idUsuario    = '$idUsuario'";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location.'&edited=true' );
			die; 


		break;	
/*******************************************************************************************************************/
		//Agrega un permiso al usuario
		case 'prm_add':	
		
			$id_usuario = $_GET['id'];
			$id_permiso = $_GET['prm_add'];
			$level      = '1';
			$query  = "INSERT INTO `usuarios_permisos` (idUsuario, idAdmpm, level) 
			VALUES ('$id_usuario','$id_permiso','$level')";
			$result = mysql_query($query, $dbConn);	

			header( 'Location: '.$location );
			die;   

		break;	
/*******************************************************************************************************************/
		//borra un permiso del usuario
		case 'prm_del':	
		
			$id_usuario = $_GET['id'];
			$query  = "DELETE FROM `usuarios_permisos` WHERE idPermisos = {$_GET['prm_del']}";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location );
			die;  

		break;	
/*******************************************************************************************************************/
		//Cambia el nivel del permiso
		case 'perm':	
		
			$mod    = $_GET['mod'];
			$perm   = $_GET['perm'];
			$query  = "UPDATE usuarios_permisos SET level = '$mod'	
			WHERE idPermisos    = '$perm'";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location );
			die; 


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
			  $sufijo = 'usr_img_';
			  
			  if (in_array($_FILES['imgLogo']['type'], $permitidos) && $_FILES['imgLogo']['size'] <= $limite_kb * 1024){
				//Se especifica carpeta de destino
				$ruta = "upload/".$sufijo.$_FILES['imgLogo']['name'];
				//Se verifica que el archivo un archivo con el mismo nombre no existe
				if (!file_exists($ruta)){
				  //Se mueve el archivo a la carpeta previamente configurada
				  $resultado = @move_uploaded_file($_FILES["imgLogo"]["tmp_name"], $ruta);
				  if ($resultado){
					
					//Filtro para idTipoCliente
					if ( !empty($_POST['idUsuario']) )    $idUsuario       = $_POST['idUsuario'];
					
					$a = "idUsuario='".$idUsuario."'" ;
					$a .= ",Direccion_img='".$sufijo.$_FILES['imgLogo']['name']."'" ;

					// inserto los datos de registro en la db
					$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '$idUsuario'";
					$result = mysql_query($query, $dbConn);
					
					header( 'Location: '.$location );
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
			FROM `usuarios_listado`
			WHERE idUsuario = {$arrUsuario['idUsuario']}";
			$resultado = mysql_query ($query, $dbConn);
			$rowdata = mysql_fetch_assoc ($resultado);

			//Obtengo el nombre fisico del archivo
			$archivo = $rowdata['Direccion_img'];
			//variables
			$a = "idUsuario='".$arrUsuario['idUsuario']."'" ;
			$a .= ",Direccion_img=''" ;

			if(unlink('upload/'.$archivo)){	
					
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
		case 'login':  
		//si no hay errores
		if ( empty($error) ) {
			
			// verificamos que los datos ingresados correspondan a un usuario
			if ( $arrUsuario = esUsuario($usuario,md5($password),$dbConn) ) {
					//Verifico si el usuario esta activo o inactivo
					if($arrUsuario['Estado']==1){
						
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
			clientes_tipos.RazonSocial,
			clientes_tipos.email_principal	
			FROM `usuarios_listado` 
			LEFT JOIN `clientes_tipos` ON clientes_tipos.idTipoCliente = usuarios_listado.idTipoCliente
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
					$query  = "UPDATE `usuarios_listado` SET password='".$nueva_clave."' WHERE email='".$email."'  ";
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
	}
?>