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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])&& !isset($errors[14])&& !isset($errors[15])&& !isset($errors[16])&& !isset($errors[17])&& !isset($errors[18])&& !isset($errors[19])  ) { 
	
		
		//filtro de usuario
		if(isset($usuario) && $usuario != ''){ 
        	$a = "'".$usuario."'" ;
		}else{
			$a ="''";
        }
		//filtro de fcreacion
		if(isset($fcreacion) && $fcreacion != ''){ 
        	$a .= ",'".$fcreacion."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de password
		if(isset($password) && $password != ''){ 
        	$a .= ",'".md5($password)."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",'".$Estado."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",'".$email."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Nombres
		if(isset($Nombres) && $Nombres != ''){ 
        	$a .= ",'".$Nombres."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Apellidos
		if(isset($Apellidos) && $Apellidos != ''){ 
        	$a .= ",'".$Apellidos."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Rut
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",'".$Rut."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Sexo
		if(isset($Sexo) && $Sexo != ''){ 
        	$a .= ",'".$Sexo."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de fNacimiento
		if(isset($fNacimiento) && $fNacimiento != ''){ 
        	$a .= ",'".$fNacimiento."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Direccion
		if(isset($Direccion) && $Direccion != ''){ 
        	$a .= ",'".$Direccion."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Fono1
		if(isset($Fono1) && $Fono1 != ''){ 
        	$a .= ",'".$Fono1."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Ultimo_acceso
		if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){ 
        	$a .= ",'".$Ultimo_acceso."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Tipo
		if(isset($Tipo) && $Tipo != ''){ 
        	$a .= ",'".$Tipo."'" ;
		}else{
			$a .= ",''";
        }
		
	
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_listado` (usuario, fcreacion, password, Estado, email, Nombres, Apellidos, Rut, Sexo, fNacimiento, Direccion, Fono1, Ultimo_acceso, Tipo) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);

		header( 'Location: '.$location2 );
		die;
		}
?>