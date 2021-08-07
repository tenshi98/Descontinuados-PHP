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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])  ) { 
	
		
		//filtro de fcreacion
		if(isset($fcreacion) && $fcreacion != ''){ 
        	$a = "'".$fcreacion."'" ;
		}else{
			$a ="''";
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
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",'".$Nombre."'" ;
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
		//filtro de Fono2
		if(isset($Fono2) && $Fono2 != ''){ 
        	$a .= ",'".$Fono2."'" ;
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
		//filtro de primer_ingreso
		if(isset($primer_ingreso) && $primer_ingreso != ''){ 
        	$a .= ",'".$primer_ingreso."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Imei
		if(isset($Imei) && $Imei != ''){ 
        	$a .= ",'".$Imei."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Gsm
		if(isset($Gsm) && $Gsm != ''){ 
        	$a .= ",'".$Gsm."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Latitud
		if(isset($Latitud) && $Latitud != ''){ 
        	$a .= ",'".$Latitud."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Longitud
		if(isset($Longitud) && $Longitud != ''){ 
        	$a .= ",'".$Longitud."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Radio
		if(isset($Radio) && $Radio != ''){ 
        	$a .= ",'".$Radio."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Alarma
		if(isset($Alarma) && $Alarma != ''){ 
        	$a .= ",'".$Alarma."'" ;
		}else{
			$a .= ",''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_listado` (fcreacion, password, Estado, email, Nombre, Rut, Sexo, fNacimiento, Direccion, Fono1, Fono2, Pais, idCiudad, idComuna, primer_ingreso, Imei, Gsm, Latitud, Longitud, Radio, Alarma) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>