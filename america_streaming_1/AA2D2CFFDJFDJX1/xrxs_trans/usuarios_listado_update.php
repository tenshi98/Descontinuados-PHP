<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])&& !isset($errors[4])&& !isset($errors[5])&& !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])&& !isset($errors[14])&& !isset($errors[15])&& !isset($errors[16])&& !isset($errors[17])  ) {

			
		//Filtro para idUsuario
        $a = "idUsuario='".$idUsuario."'" ;
		$b = "idCliente='".$idUsuario."'" ;
		//filtro de usuario
		if(isset($usuario) && $usuario != ''){ 
        	$a .= ",usuario='".$usuario."'" ;
			$b .= ",usuario='".$usuario."'" ;
        }
		//filtro de password
		if(isset($password) && $password != ''){ 
        	$a .= ",password='".md5($password)."'" ;
			$b .= ",password='".md5($password)."'" ;
        }
		//filtro de tipo
		if(isset($tipo) && $tipo != ''){ 
        	$a .= ",tipo='".$tipo."'" ;
        }
		//filtro de estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",Estado='".$Estado."'" ;
			$b .= ",Estado='".$Estado."'" ;
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",email='".$email."'" ;
			$b .= ",email='".$email."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
			$b .= ",Nombres='".$Nombre."'" ;
        }
		//filtro de rut
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",Rut='".$Rut."'" ;
			$b .= ",Rut='".$Rut."'" ;
        }
		//filtro de fNacimiento
		if(isset($fNacimiento) && $fNacimiento != ''){ 
        	$a .= ",fNacimiento='".$fNacimiento."'" ;
			$b .= ",fNacimiento='".$fNacimiento."'" ;
        }
		//filtro de fono
		if(isset($Fono) && $Fono != ''){ 
        	$a .= ",Fono='".$Fono."'" ;
			$b .= ",Fono1='".$Fono."'" ;
        }
		//filtro de Direccion_img
		if(isset($Direccion_img) && $Direccion_img != ''){ 
        	$a .= ",Direccion_img='".$Direccion_img."'" ;
        }
		//filtro de mode
		if(isset($mode) && $mode != ''){ 
        	$a .= ",mode='".$mode."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '$idUsuario'";
		$result = mysql_query($query, $dbConn);
		
		//Ubico el nombre de usuario dentro de la tabla de usuarios
		$query = "SELECT usuario FROM `usuarios_listado` WHERE idUsuario = '$idUsuario'";
		$resultado = mysql_query ($query, $dbConn);
		$rowdata = mysql_fetch_assoc ($resultado);
		
		//Ubico mi usuario en la tabla de clientes
		$query  = "UPDATE `clientes_listado` SET ".$a." WHERE usuario = '{$rowdata['usuario']}'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>