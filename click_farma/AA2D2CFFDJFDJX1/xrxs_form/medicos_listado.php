<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridMedicoad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['idMedico']) )         $idMedico           = $_POST['idMedico'];
	if ( !empty($_POST['idSistema']) )        $idSistema          = $_POST['idSistema'];
	if ( !empty($_POST['idEstado']) )         $idEstado           = $_POST['idEstado'];
	if ( !empty($_POST['usuario']) )          $usuario            = $_POST['usuario'];
	if ( !empty($_POST['password']) )         $password           = $_POST['password'];
	if ( !empty($_POST['repassword']) )       $repassword         = $_POST['repassword'];
	if ( !empty($_POST['oldpassword']) )      $oldpassword        = $_POST['oldpassword'];
	if ( !empty($_POST['Sexo']) )             $Sexo               = $_POST['Sexo'];
	if ( !empty($_POST['email']) )            $email              = $_POST['email'];
	if ( !empty($_POST['Nombre']) )           $Nombre 	          = $_POST['Nombre'];
	if ( !empty($_POST['Edad']) )             $Edad 	          = $_POST['Edad'];
	if ( !empty($_POST['Rut']) )              $Rut 	              = $_POST['Rut'];
	if ( !empty($_POST['fNacimiento']) )      $fNacimiento 	      = $_POST['fNacimiento'];
	if ( !empty($_POST['Fono1']) )            $Fono1 	          = $_POST['Fono1'];
	if ( !empty($_POST['idDepartamento']) )   $idDepartamento     = $_POST['idDepartamento'];
	if ( !empty($_POST['idProvincia']) )      $idProvincia        = $_POST['idProvincia'];
	if ( !empty($_POST['idDistrito']) )       $idDistrito         = $_POST['idDistrito'];
	if ( !empty($_POST['Direccion']) )        $Direccion 	      = $_POST['Direccion'];
	if ( !empty($_POST['fcreacion']) )        $fcreacion          = $_POST['fcreacion'];
	if ( !empty($_POST['factualizacion']) )   $factualizacion     = $_POST['factualizacion'];
	if ( !empty($_POST['Ultimo_acceso']) )    $Ultimo_acceso      = $_POST['Ultimo_acceso'];
	if ( !empty($_POST['Especialidad']) )     $Especialidad       = $_POST['Especialidad'];
	if ( !empty($_POST['idDisponibilidad']) ) $idDisponibilidad   = $_POST['idDisponibilidad'];
	if ( !empty($_POST['nLlamadas']) )        $nLlamadas          = $_POST['nLlamadas'];
	
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
			case 'idMedico':          if(empty($idMedico)){        $error['idMedico']        = 'error/No ha ingresado el id';}break;
			case 'idSistema':         if(empty($idSistema)){       $error['idSistema']       = 'error/No ha seleccionado el sistema';}break;
			case 'idEstado':          if(empty($idEstado)){        $error['idEstado']        = 'error/No ha seleccionado el Estado';}break;
			case 'usuario':           if(empty($usuario)){         $error['usuario']         = 'error/No ha ingresado el nombre de usuario ';}break;
			case 'password':          if(empty($password)){        $error['password']        = 'error/No ha ingresado la contraseña ';}break;
			case 'repassword':        if(empty($repassword)){      $error['repassword']      = 'error/No ha reingresado la contraseña ';}break;
			case 'oldpassword':       if(empty($oldpassword)){     $error['oldpassword']     = 'error/No ha ingresado la contraseña antigua ';}break;
			case 'Sexo':              if(empty($Sexo)){            $error['Sexo']            = 'error/No ha ingresado el sexo ';}break;
			case 'email':             if(empty($email)){           $error['email']           = 'error/No ha ingresado el email ';}break;
			case 'Nombre':            if(empty($Nombre)){          $error['Nombre']          = 'error/No ha ingresado el nombre ';}break;
			case 'Edad':              if(empty($Edad)){            $error['Edad']            = 'error/No ha ingresado la edad ';}break;
			case 'Rut':               if(empty($Rut)){             $error['Rut']             = 'error/No ha ingresado el rut ';}break;
			case 'fNacimiento':       if(empty($fNacimiento)){     $error['fNacimiento']     = 'error/No ha ingresado la fecha de nacimiento ';}break;
			case 'Fono1':             if(empty($Fono1)){           $error['Fono1']           = 'error/No ha ingresado el fono ';}break;
			case 'idDepartamento':    if(empty($idDepartamento)){  $error['idDepartamento']  = 'error/No ha seleccionado el departamento ';}break;
			case 'idProvincia':       if(empty($idProvincia)){     $error['idProvincia']     = 'error/No ha seleccionado la provincia ';}break;
			case 'idDistrito':        if(empty($idDistrito)){      $error['idDistrito']      = 'error/No ha seleccionado el distrito ';}break;
			case 'Direccion':         if(empty($Direccion)){       $error['Direccion']       = 'error/No ha ingresado la direccion ';}break;
			case 'fcreacion':         if(empty($fcreacion)){       $error['fcreacion']       = 'error/No ha ingresado la fecha de creacion ';}break;
			case 'factualizacion':    if(empty($factualizacion)){  $error['factualizacion']  = 'error/No ha ingresado la fecha de actualizacion ';}break;
			case 'Ultimo_acceso':     if(empty($Ultimo_acceso)){   $error['Ultimo_acceso']   = 'error/No ha ingresado la fecha de Ultimo acceso ';}break;
			case 'Especialidad':      if(empty($Especialidad)){    $error['Especialidad']    = 'error/No ha seleccionado la especialidad';}break;
			case 'idDisponibilidad':  if(empty($idDisponibilidad)){$error['idDisponibilidad']= 'error/No ha seleccionado la disponibilidad';}break;
			case 'nLlamadas':         if(empty($nLlamadas)){       $error['nLlamadas']       = 'error/No ha ingresado el numero de llamadas';}break;
			
		}
	}
/*******************************************************************************************************************/
/*                                        Verificacion de los datos ingresados                                     */
/*******************************************************************************************************************/	
	//Verifica si el mail corresponde
	if(isset($email)){if(validaremail($email)){ }else{   $error['email']   = 'error/El Email ingresado no es valido'; }}	
	if(isset($Fono1)){if(validarnumero($Fono1)) {        $error['Fono1']   = 'error/Ingrese un numero telefonico valido'; }}
	if(isset($Fono2)){if(validarnumero($Fono2)) {        $error['Fono2']   = 'error/Ingrese un numero telefonico valido'; }}
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

			
			
			// se verifica si el rut ya existe
			if(isset($Rut)){
				$sql_email = mysql_query("SELECT Rut FROM medicos_listado WHERE Rut='".$Rut."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['Rut'] = 'error/El DNI ya existe en el sistema';}
			
			// se verifica si el correo ya existe
			if(isset($email)){
				$sql_email = mysql_query("SELECT email FROM medicos_listado WHERE email='".$email."'  ");
				$n2 = mysql_num_rows($sql_email);
			} else {$n2=0;}
			if($n2 > 0) {$error['email'] = 'error/El correo de ingresado ya existe en el sistema';}
			
			
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				$fcreacion       = fechahora_actual();    //Se obtiene la fecha actual
				$factualizacion  = fechahora_actual();    //Se obtiene la fecha actual
			
				//filtros
				if(isset($idSistema) && $idSistema != ''){              $a  = "'".$idSistema."'" ;        }else{$a ="''";}
				if(isset($idEstado) && $idEstado != ''){                $a .= ",'".$idEstado."'" ;        }else{$a .= ",''";}
				if(isset($usuario) && $usuario != ''){                  $a .= ",'".$usuario."'" ;         }else{$a .= ",''";}
				if(isset($password) && $password != ''){                $a .= ",'".md5($password)."'" ;   }else{$a .= ",''";}
				if(isset($Sexo) && $Sexo != ''){                        $a .= ",'".$Sexo."'" ;            }else{$a .= ",''";}
				if(isset($email) && $email != ''){                      $a .= ",'".$email."'" ;           }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                    $a .= ",'".$Nombre."'" ;          }else{$a .= ",''";}
				if(isset($Edad) && $Edad != ''){                        $a .= ",'".$Edad."'" ;            }else{$a .= ",''";}
				if(isset($Rut) && $Rut != ''){                          $a .= ",'".$Rut."'" ;             }else{$a .= ",''";}
				if(isset($fNacimiento) && $fNacimiento != ''){          $a .= ",'".$fNacimiento."'" ;     }else{$a .= ",''";}
				if(isset($Fono1) && $Fono1 != ''){                      $a .= ",'".$Fono1."'" ;           }else{$a .= ",''";}
				if(isset($idDepartamento) && $idDepartamento != ''){    $a .= ",'".$idDepartamento."'" ;  }else{$a .= ",''";}
				if(isset($idProvincia) && $idProvincia != ''){          $a .= ",'".$idProvincia."'" ;     }else{$a .= ",''";}
				if(isset($idDistrito) && $idDistrito != ''){            $a .= ",'".$idDistrito."'" ;      }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){              $a .= ",'".$Direccion."'" ;       }else{$a .= ",''";}
				if(isset($fcreacion) && $fcreacion != ''){              $a .= ",'".$fcreacion."'" ;       }else{$a .= ",''";}
				if(isset($factualizacion) && $factualizacion != ''){    $a .= ",'".$factualizacion."'" ;  }else{$a .= ",''";}
				if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){      $a .= ",'".$Ultimo_acceso."'" ;   }else{$a .= ",''";}
				if(isset($Especialidad) && $Especialidad != ''){        $a .= ",'".$Especialidad."'" ;    }else{$a .= ",''";}
				if(isset($idDisponibilidad) && $idDisponibilidad != ''){$a .= ",'".$idDisponibilidad."'" ;}else{$a .= ",''";}
				if(isset($nLlamadas) && $nLlamadas != ''){              $a .= ",'".$nLlamadas."'" ;       }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `medicos_listado` (idSistema, idEstado, usuario,password, Sexo, email, Nombre, Edad, Rut,
				fNacimiento, Fono1, idDepartamento, idProvincia, idDistrito, Direccion , fcreacion, factualizacion,Ultimo_acceso,
				Especialidad, idDisponibilidad, nLlamadas ) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
				
			
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;	
/*******************************************************************************************************************/		
		case 'update':	
		
			//Verificacion de la contraseña
			if(isset($oldpassword)){
				$sql_email = mysql_query("SELECT password FROM medicos_listado WHERE idMedico='".$idMedico."' AND password='".md5($oldpassword)."' ");
				$n2 = mysql_num_rows($sql_email);
				if($n2 == 0) {$error['password'] = 'error/Las contraseñas ingresadas no coinciden';}
			}
	
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idMedico='".$idMedico."'" ;
				if(isset($idSistema) && $idSistema != ''){               $a .= ",idSistema='".$idSistema."'" ;}
				if(isset($idEstado) && $idEstado != ''){                 $a .= ",idEstado='".$idEstado."'" ;}
				if(isset($usuario) && $usuario != ''){                   $a .= ",usuario='".$usuario."'" ;}
				if(isset($password) && $password != ''){                 $a .= ",password='".md5($password)."'" ;}
				if(isset($Sexo) && $Sexo != ''){                         $a .= ",Sexo='".$Sexo."'" ;}
				if(isset($email) && $email != ''){                       $a .= ",email='".$email."'" ;}
				if(isset($Nombre) && $Nombre != ''){                     $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Edad) && $Edad != ''){                         $a .= ",Edad='".$Edad."'" ;}
				if(isset($Rut) && $Rut != ''){                           $a .= ",Rut='".$Rut."'" ;}
				if(isset($fNacimiento) && $fNacimiento != ''){           $a .= ",fNacimiento='".$fNacimiento."'" ;}
				if(isset($Fono1) && $Fono1!= ''){                        $a .= ",Fono1='".$Fono1."'" ;}
				if(isset($idDepartamento) && $idDepartamento!= ''){      $a .= ",idDepartamento='".$idDepartamento."'" ;}
				if(isset($idProvincia) && $idProvincia!= ''){            $a .= ",idProvincia='".$idProvincia."'" ;}
				if(isset($idDistrito) && $idDistrito!= ''){              $a .= ",idDistrito='".$idDistrito."'" ;}
				if(isset($Direccion) && $Direccion!= ''){                $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($fcreacion) && $fcreacion!= ''){                $a .= ",fcreacion='".$fcreacion."'" ;}
				if(isset($factualizacion) && $factualizacion!= ''){      $a .= ",factualizacion='".$factualizacion."'" ;}
				if(isset($Ultimo_acceso) && $Ultimo_acceso!= ''){        $a .= ",Ultimo_acceso='".$Ultimo_acceso."'" ;}
				if(isset($Especialidad) && $Especialidad!= ''){          $a .= ",Especialidad='".$Especialidad."'" ;}
				if(isset($idDisponibilidad) && $idDisponibilidad!= ''){  $a .= ",idDisponibilidad='".$idDisponibilidad."'" ;}
				if(isset($nLlamadas) && $nLlamadas!= ''){                $a .= ",nLlamadas='".$nLlamadas."'" ;}

				
				// inserto los datos de registro en la db
				$query  = "UPDATE `medicos_listado` SET ".$a." WHERE idMedico = '$idMedico'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	

						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `medicos_listado` WHERE idMedico = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
/*******************************************************************************************************************/
		case 'estado':	
		
			$idMedico  = $_GET['id'];
			$estado     = $_GET['estado'];
			$query  = "UPDATE medicos_listado SET idEstado = '$estado'	
			WHERE idMedico    = '$idMedico'";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location.'&edited=true' );
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
					
					//Filtro para idSistema
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
			if ( $arrMedico = esMedico($usuario,md5($password),$dbConn) ) {
					//Verifico si el usuario esta activo o inactivo
					if($arrMedico['idEstado']==1){
						
						// definimos las sesiones
						$_SESSION['usuario']    = $arrMedico['usuario'];
						$_SESSION['password']	= $arrMedico['password'];
							
						//Almaceno la fecha y la hora del ingreso
						$fecha=date("Y-m-d");
				
						//Actualizo la tabla de los usuarios
						$sql = "UPDATE medicos_listado
						SET Ultimo_acceso='".$fecha."'
						WHERE idMedico='".$arrMedico['idMedico']."' ";
						$resultado = mysql_query($sql,$dbConn);

						// si todo esta bien te redirige hacia la pagina principal
						header( 'Location: '.$location );
						die;
						
					} else {
						// si el usuario esta inactivo reenvia a una pagina
						$error['idMedico']   = 'error/Su usuario esta desactivado, Contactese con el administrador';
					}		
				//si no reconoce al usuario, envia un error	
				} else {
					$error['idMedico']   = 'error/El nombre de usuario o contraseña no coinciden';
			}
		} 
		 break;						
/*******************************************************************************************************************/
	}
?>
