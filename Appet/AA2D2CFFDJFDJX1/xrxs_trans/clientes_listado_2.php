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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])&& !isset($errors[14])  ) { 



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
			$a .=",''";
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
		//filtro de ApellidoPat
		if(isset($ApellidoPat) && $ApellidoPat != ''){ 
        	$a .= ",'".$ApellidoPat."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de ApellidoMat
		if(isset($ApellidoMat) && $ApellidoMat != ''){ 
        	$a .= ",'".$ApellidoMat."'" ;
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
		//filtro de idVilla
		if(isset($idVilla) && $idVilla != ''){ 
        	$a .= ",'".$idVilla."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idCalle
		if(isset($idCalle) && $idCalle != ''){ 
        	$a .= ",'".$idCalle."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de n_calle
		if(isset($n_calle) && $n_calle != ''){ 
        	$a .= ",'".$n_calle."'" ;
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
		
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_listado` (usuario, fcreacion, password, Estado, email, Nombres, ApellidoPat, ApellidoMat, Rut, Sexo, fNacimiento, Pais, idCiudad, idComuna, idVilla, idCalle, n_calle, Fono1, Fono2) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);

		//redirigo a la nueva pagina
		header( 'Location: ini_login.php'.$w );
		die;

}?>
