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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])&& empty($errors[5])&& empty($errors[6])  ) {

			
		//Filtro para idTrabajo
        $a = "idUsuario='".$idUsuario."'" ;
		//filtro de usuario
		if(isset($usuario) && $usuario != ''){ 
        	$a .= ",usuario='".$usuario."'" ;
        }
		//filtro de password
		if(isset($password) && $password != ''){ 
        	$a .= ",password='".$password."'" ;
        }
		//filtro de tipo
		if(isset($tipo) && $tipo != ''){ 
        	$a .= ",tipo='".$tipo."'" ;
        }
		//filtro de estado
		if(isset($estado) && $estado != ''){ 
        	$a .= ",Estado='".$estado."'" ;
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",email='".$email."'" ;
        }
		//filtro de web
		if(isset($web) && $web != ''){ 
        	$a .= ",web='".$web."'" ;
        }
		//filtro de nombre
		if(isset($nombre) && $nombre != ''){ 
        	$a .= ",Nombre='".$nombre."'" ;
        }
		//filtro de rut
		if(isset($rut) && $rut != ''){ 
        	$a .= ",Rut='".$rut."'" ;
        }
		//filtro de fNacimiento
		if(isset($fNacimiento) && $fNacimiento != ''){ 
        	$a .= ",fNacimiento='".$fNacimiento."'" ;
        }
		//filtro de direccion
		if(isset($direccion) && $direccion != ''){ 
        	$a .= ",Direccion='".$direccion."'" ;
        }
		//filtro de fono
		if(isset($fono) && $fono != ''){ 
        	$a .= ",Fono='".$fono."'" ;
        }
		//filtro de pais
		if(isset($pais) && $pais != ''){ 
        	$a .= ",Pais='".$pais."'" ;
        }
		//filtro de ciudad
		if(isset($ciudad) && $ciudad != ''){ 
        	$a .= ",Ciudad='".$ciudad."'" ;
        }
		//filtro de comuna
		if(isset($comuna) && $comuna != ''){ 
        	$a .= ",Comuna='".$comuna."'" ;
        }
		//filtro de fax
		if(isset($fax) && $fax != ''){ 
        	$a .= ",Fax='".$fax."'" ;
        }
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '$idUsuario'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		
		die;
	}?>