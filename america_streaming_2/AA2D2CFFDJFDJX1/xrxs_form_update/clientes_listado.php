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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])&& !isset($errors[14])&& !isset($errors[15])&& !isset($errors[16])&& !isset($errors[17])&& !isset($errors[18]) && !isset($errors[19]) ) { 

			
		//Filtro para idCliente
        $a = "idCliente='".$idCliente."'" ;
		//filtro de usuario
		if(isset($usuario) && $usuario != ''){ 
        	$a .= ",usuario='".$usuario."'" ;
        }
		//filtro de fcreacion
		if(isset($fcreacion) && $fcreacion != ''){ 
        	$a .= ",fcreacion='".$fcreacion."'" ;
        }
		//filtro de password
		if(isset($password) && $password != ''){ 
        	$a .= ",password='".md5($password)."'" ;
        }
		//filtro de estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",Estado='".$Estado."'" ;
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",email='".$email."'" ;
        }
		//filtro de Nombres
		if(isset($Nombres) && $Nombres != ''){ 
        	$a .= ",Nombres='".$Nombres."'" ;
        }
		//filtro de Apellidos
		if(isset($Apellidos) && $Apellidos != ''){ 
        	$a .= ",Apellidos='".$Apellidos."'" ;
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
		//filtro de Ultimo_acceso
		if(isset($Ultimo_acceso) && $Ultimo_acceso != ''){ 
        	$a .= ",Ultimo_acceso='".$Ultimo_acceso."'" ;
        }
		//filtro de Tipo
		if(isset($Tipo) && $Tipo != ''){ 
        	$a .= ",Tipo='".$Tipo."'" ;
        }
		


		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '$idCliente'";
		$result = mysql_query($query, $dbConn);

		header( 'Location: '.$location );
		die;
	}?>