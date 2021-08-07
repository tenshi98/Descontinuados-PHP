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
	
		
		//filtro de fcreacion 
		if(isset($fcreacion) && $fcreacion != ''){ 
        	$a = "'".$fcreacion."'" ;
		}else{
			$a ="''";
        }
		//filtro de usuario
		if(isset($usuario) && $usuario != ''){ 
        	$a .= ",'".$usuario."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de password 
		if(isset($password) && $password != ''){ 
        	$a .= ",'".md5($password)."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de idTipoCliente 
		if(isset($idTipoCliente) && $idTipoCliente != ''){ 
        	$a .= ",'".$idTipoCliente."'" ;
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
		//filtro de Url_imagen
		if(isset($Url_imagen) && $Url_imagen != ''){ 
        	$a .= ",'".$Url_imagen."'" ;
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
		//filtro de Ultimo_acceso
		if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){ 
        	$a .= ",'".$Ultimo_acceso."'" ;
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
		//filtro de create_pass
		if(isset($create_pass) && $create_pass != ''){ 
        	$a .= ",'".$create_pass."'" ;
		}else{
			$a .= ",''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `clientes_listado` (fcreacion, usuario, password, idTipoCliente, Estado, email, Nombre, Apellido_Paterno, Apellido_Materno, Rut, Sexo, fNacimiento, Direccion, Fono1, Fono2, Url_imagen, Pais, idCiudad, idComuna, Ultimo_acceso, primer_ingreso, Imei, Gsm, Latitud, Longitud, Radio, Alarma, create_pass) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>