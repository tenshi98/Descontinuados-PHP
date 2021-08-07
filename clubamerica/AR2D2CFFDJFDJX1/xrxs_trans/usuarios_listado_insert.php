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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])&& !isset($errors[14])&& !isset($errors[15])&& !isset($errors[16])&& !isset($errors[17])  ) { 
	
		
		//filtro de usuario
		if(isset($usuario) && $usuario != ''){ 
        	$a = "'".$usuario."'" ;
			$b = "'".$usuario."'" ;
		}else{
			$a ="''";
			$b ="''";
        }
		//filtro de password
		if(isset($password) && $password != ''){ 
        	$a .= ",'".md5($password)."'" ;
			$b .= ",'".md5($password)."'" ;
		}else{
			$a .= ",''";
			$b .= ",''";
        }
		//filtro de tipo
		if(isset($tipo) && $tipo != ''){ 
        	$a .= ",'".$tipo."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",'".$Estado."'" ;
			$b .= ",'".$Estado."'" ;
		}else{
			$a .= ",''";
			$b .= ",''";
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",'".$email."'" ;
			$b .= ",'".$email."'" ;
		}else{
			$a .= ",''";
			$b .= ",''";
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",'".$Nombre."'" ;
			$b .= ",'".$Nombre."'" ;
		}else{
			$a .= ",''";
			$b .= ",''";
        }
		//filtro de Rut
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",'".$Rut."'" ;
			$b .= ",'".$Rut."'" ;
		}else{
			$a .= ",''";
			$b .= ",''";
        }
		//filtro de fNacimiento
		if(isset($fNacimiento) && $fNacimiento != ''){ 
        	$a .= ",'".$fNacimiento."'" ;
			$b .= ",'".$fNacimiento."'" ;
		}else{
			$a .= ",''";
			$b .= ",''";
        }
		//filtro de Fono
		if(isset($Fono) && $Fono != ''){ 
        	$a .= ",'".$Fono."'" ;
			$b .= ",'".$Fono."'" ;
		}else{
			$a .= ",''";
			$b .= ",''";
        }
		//filtro de Direccion_img
		if(isset($Direccion_img) && $Direccion_img != ''){ 
        	$a .= ",'".$Direccion_img."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de mode
		if(isset($mode) && $mode != ''){ 
        	$a .= ",'".$mode."'" ;
		}else{
			$a .= ",''";;
        }
		//filtro de Tipo
		if(isset($Tipo) && $Tipo != ''){ 
        	$a .= ",'".$Tipo."'" ;
		}else{
			$a .= ",''";;
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `usuarios_listado` (usuario, password, tipo, Estado, email, Nombre, Rut, fNacimiento, Fono, Direccion_img, mode) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_listado` (usuario, password, Estado, email, Nombres, Rut, fNacimiento, Fono1,Tipo) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>