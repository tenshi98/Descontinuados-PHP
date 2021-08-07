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
	if ( !empty($_POST['mode']) )           $mode 	        = $_POST['mode'];
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
			case 'mode':           if(empty($mode)){          $error['mode']           = 'error/No ha ingresado la web de videos';}break;
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
	
	
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
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
			if($n2 > 0) {$error['Rut'] = 'error/El sistema ya esta en uso';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($usuario) && $usuario != ''){              $a = "'".$usuario."'" ;          }else{$a ="''";}
				if(isset($password) && $password != ''){            $a .= ",'".$password."'" ;       }else{$a .= ",''";}
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
				if(isset($mode) && $mode != ''){                    $a .= ",'".$mode."'" ;           }else{$a .= ",''";}
				if(isset($idTheme) && $idTheme != ''){              $a .= ",'".$idTheme."'" ;        }else{$a .= ",''";}
				if(isset($idTipoCliente) && $idTipoCliente != ''){  $a .= ",'".$idTipoCliente."'" ;  }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `usuarios_listado` (usuario, password, tipo, Estado, email, Nombre, Rut, fNacimiento, Direccion, Fono, Ciudad, Comuna, Direccion_img, Ultimo_acceso, mode, idTheme, idTipoCliente) VALUES ({$a} )";
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
				if(isset($usuario) && $usuario != ''){              $a .= ",usuario='".$usuario."'" ;}
				if(isset($password) && $password != ''){            $a .= ",password='".$password."'" ;}
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
				if(isset($mode) && $mode != ''){                    $a .= ",mode='".$mode."'" ;}
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
	}
?>