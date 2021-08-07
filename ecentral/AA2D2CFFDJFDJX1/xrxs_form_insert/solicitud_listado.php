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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])  ) { 
	
		
		//filtro de Rut
		if(isset($Rut) && $Rut != ''){ 
        	$a = "'".$Rut."'" ;
		}else{
			$a ="''";
        }
		//filtro de Fcreacion
		if(isset($Fcreacion) && $Fcreacion != ''){ 
        	$a .= ",'".$Fcreacion."'" ;
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
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",'".$email."'" ;
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
		//filtro de Comuna
		if(isset($Comuna) && $Comuna != ''){ 
        	$a .= ",'".$Comuna."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de TipoMsje
		if(isset($TipoMsje) && $TipoMsje != ''){ 
        	$a .= ",'".$TipoMsje."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Depto
		if(isset($Depto) && $Depto != ''){ 
        	$a .= ",'".$Depto."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",'".$Fecha."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Detalle
		if(isset($Detalle) && $Detalle != ''){ 
        	$a .= ",'".$Detalle."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",'".$Estado."'" ;
		}else{
			$a .= ",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `solicitud_listado` (Rut, Fcreacion, Nombres, ApellidoPat, ApellidoMat, email, Fono1, Fono2, Comuna, TipoMsje, Depto, Fecha, Detalle, Estado) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
	
		header( 'Location: '.$location );
		die;
		}
?>