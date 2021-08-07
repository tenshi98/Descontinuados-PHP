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

			
		//Filtro para idCliente
        $a = "idCliente='".$idCliente."'" ;
		//filtro de fcreacion
		if(isset($fcreacion) && $fcreacion != ''){ 
        	$a .= ",fcreacion='".$fcreacion."'" ;
        }
		//filtro de usuario
		if(isset($usuario) && $usuario != ''){ 
        	$a .= ",usuario='".$usuario."'" ;
        }
		//filtro de password
		if(isset($password) && $password != ''){ 
        	$a .= ",password='".md5($password)."'" ;
        }
		//filtro de idTipoCliente
		if(isset($idTipoCliente) && $idTipoCliente != ''){ 
        	$a .= ",idTipoCliente='".$idTipoCliente."'" ;
        }
		//filtro de estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",Estado='".$Estado."'" ;
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",email='".$email."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de Apellido_Paterno
		if(isset($Apellido_Paterno) && $Apellido_Paterno != ''){ 
        	$a .= ",Apellido_Paterno='".$Apellido_Paterno."'" ;
        }
		//filtro de Apellido_Materno
		if(isset($Apellido_Materno) && $Apellido_Materno != ''){ 
        	$a .= ",Apellido_Materno='".$Apellido_Materno."'" ;
        }
		//filtro de rut
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",Rut='".$Rut."'" ;
        }
		//filtro de Sexo
		if(isset($Sexo) && $Sexo != ''){ 
        	$a .= ",Sexo='".$Sexo."'" ;
        }
		//filtro de fNacimiento
		if(isset($fNacimiento) && $fNacimiento != ''){ 
        	$a .= ",fNacimiento='".$fNacimiento."'" ;
        }
		//filtro de Direccion
		if(isset($Direccion) && $Direccion != ''){ 
        	$a .= ",Direccion='".$Direccion."'" ;
        }
		//filtro de Fono1
		if(isset($Fono1) && $Fono1 != ''){ 
        	$a .= ",Fono1='".$Fono1."'" ;
        }
		//filtro de Fono2
		if(isset($Fono2) && $Fono2 != ''){ 
        	$a .= ",Fono2='".$Fono2."'" ;
        }
		//filtro de Url_imagen
		if(isset($Url_imagen) && $Url_imagen != ''){ 
        	$a .= ",Url_imagen='".$Url_imagen."'" ;
        }
		//filtro de Pais
		if(isset($Pais) && $Pais != ''){ 
        	$a .= ",Pais='".$Pais."'" ;
        }
		//filtro de idCiudad
		if(isset($idCiudad) && $idCiudad != ''){ 
        	$a .= ",idCiudad='".$idCiudad."'" ;
        }
		//filtro de idComuna
		if(isset($idComuna) && $idComuna != ''){ 
        	$a .= ",idComuna='".$idComuna."'" ;
        }
		//filtro de Ultimo_acceso
		if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){ 
        	$a .= ",Ultimo_acceso='".$Ultimo_acceso."'" ;
        }
		//filtro de primer_ingreso
		if(isset($primer_ingreso) && $primer_ingreso != ''){ 
        	$a .= ",primer_ingreso='".$primer_ingreso."'" ;
        }
		//filtro de Imei
		if(isset($Imei) && $Imei != ''){ 
        	$a .= ",Imei='".$Imei."'" ;
        }
		//filtro de Gsm
		if(isset($Gsm) && $Gsm != ''){ 
        	$a .= ",Gsm='".$Gsm."'" ;
        }
		//filtro de Latitud
		if(isset($Latitud) && $Latitud != ''){ 
        	$a .= ",Latitud='".$Latitud."'" ;
        }
		//filtro de Longitud
		if(isset($Longitud) && $Longitud != ''){ 
        	$a .= ",Longitud='".$Longitud."'" ;
        }
		//filtro de Radio
		if(isset($Radio) && $Radio != ''){ 
        	$a .= ",Radio='".$Radio."'" ;
        }
		//filtro de Alarma
		if(isset($Alarma) && $Alarma != ''){ 
        	$a .= ",Alarma='".$Alarma."'" ;
        }


		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '$idCliente'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>