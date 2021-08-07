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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])&& !isset($errors[14])&& !isset($errors[15])&& !isset($errors[16])&& !isset($errors[17])&& !isset($errors[18])&& !isset($errors[19])&& !isset($errors[20])&& !isset($errors[21])  ) { 
	
		
		//filtro de Nombre 
		if(isset($Nombre) && $Nombre != ''){ 
        	$a = "'".$Nombre."'" ;
		}else{
			$a = "''";
        }
		//filtro de Apellido_Paterno 
		if(isset($Apellido_Paterno) && $Apellido_Paterno != ''){ 
        	$a .= ",'".$Apellido_Paterno."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Apellido_Materno 
		if(isset($Apellido_Materno) && $Apellido_Materno != ''){ 
        	$a .= ",'".$Apellido_Materno."'" ;
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
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",'".$email."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Pais
		if(isset($Pais) && $Pais != ''){ 
        	$a .= ",'".$Pais."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idCiudad 
		if(isset($idCiudad) && $idCiudad != ''){ 
        	$a .= ",'".$idCiudad."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idComuna 
		if(isset($idComuna) && $idComuna != ''){ 
        	$a .= ",'".$idComuna."'" ;
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
		//filtro de Fono2
		if(isset($Fono2) && $Fono2 != ''){ 
        	$a .= ",'".$Fono2."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de NombreEmpresa
		if(isset($NombreEmpresa) && $NombreEmpresa != ''){ 
        	$a .= ",'".$NombreEmpresa."'" ;
		}else{
			$a .= ",''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `taxista_propietarios` (Nombre, Apellido_Paterno, Apellido_Materno, Rut, Sexo, fNacimiento, email, Pais, idCiudad, idComuna, Direccion, Fono1, Fono2, NombreEmpresa) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>