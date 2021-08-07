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
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])&& !isset($errors[4])&& !isset($errors[5])&& !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11])  ) {

			
		//Filtro para idCliente
        $a = "idCliente='".$idCliente."'" ;
		//filtro de fcreacion
		if(isset($fcreacion) && $fcreacion != ''){ 
        	$a .= ",fcreacion='".$fcreacion."'" ;
        }
		//filtro de password
		if(isset($password) && $password != ''){ 
        	$a .= ",password='".md5($password)."'" ;
        }
		//filtro de tipo
		if(isset($tipo) && $tipo != ''){ 
        	$a .= ",tipo='".$tipo."'" ;
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