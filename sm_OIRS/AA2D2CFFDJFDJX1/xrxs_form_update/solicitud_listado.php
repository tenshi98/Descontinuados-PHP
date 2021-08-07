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
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])&& !isset($errors[4])&& !isset($errors[5])&& !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])  ) {

			
		//Filtro para idSolicitud
        $a = "idSolicitud='".$idSolicitud."'" ;
		//filtro de Rut
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",Rut='".$Rut."'" ;
        }
		//filtro de Nombres
		if(isset($Nombres) && $Nombres != ''){ 
			$a .= ",Nombres='".$Nombres."'" ;
        }
		//filtro de ApellidoPat
		if(isset($ApellidoPat) && $ApellidoPat != ''){ 
			$a .= ",ApellidoPat='".$ApellidoPat."'" ;
        }
		//filtro de ApellidoMat
		if(isset($ApellidoMat) && $ApellidoMat != ''){ 
			$a .= ",ApellidoMat='".$ApellidoMat."'" ;
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",email='".$email."'" ;
        }
		//filtro de Fono1
		if(isset($Fono1) && $Fono1 != ''){ 
        	$a .= ",Fono1='".$Fono1."'" ;
        }
		//filtro de Fono2
		if(isset($Fono2) && $Fono2 != ''){ 
        	$a .= ",Fono2='".$Fono2."'" ;
        }
		//filtro de Comuna
		if(isset($Comuna) && $Comuna != ''){ 
        	$a .= ",Comuna='".$Comuna."'" ;
        }
		//filtro de TipoMsje
		if(isset($TipoMsje) && $TipoMsje != ''){ 
        	$a .= ",TipoMsje='".$TipoMsje."'" ;
        }
		//filtro de Depto
		if(isset($Depto) && $Depto != ''){ 
        	$a .= ",Depto='".$Depto."'" ;
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",Fecha='".$Fecha."'" ;
        }
		//filtro de Detalle
		if(isset($Detalle) && $Detalle != ''){ 
        	$a .= ",Detalle='".$Detalle."'" ;
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",Estado='".$Estado."'" ;
        }
		


		// inserto los datos de registro en la db
		$query  = "UPDATE `solicitud_listado` SET ".$a." WHERE idSolicitud = '$idSolicitud'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>