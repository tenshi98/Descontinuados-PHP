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

			
		//Filtro para idTipoCliente
        $a = "idTipoCliente='".$idTipoCliente."'" ;
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de imgLogo
		if(isset($imgLogo) && $imgLogo != ''){ 
        	$a .= ",imgLogo='".$imgLogo."'" ;
        }
		//filtro de email_principal
		if(isset($email_principal) && $email_principal != ''){ 
        	$a .= ",email_principal='".$email_principal."'" ;
        }
		//filtro de RazonSocial
		if(isset($RazonSocial) && $RazonSocial != ''){ 
        	$a .= ",RazonSocial='".$RazonSocial."'" ;
        }
		//filtro de Rut
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",Rut='".$Rut."'" ;
        }
		//filtro de Direccion
		if(isset($Direccion) && $Direccion != ''){ 
        	$a .= ",Direccion='".$Direccion."'" ;
        }
		//filtro de Fono
		if(isset($Fono) && $Fono != ''){ 
        	$a .= ",Fono='".$Fono."'" ;
        }
		//filtro de Ciudad
		if(isset($Ciudad) && $Ciudad != ''){ 
        	$a .= ",Ciudad='".$Ciudad."'" ;
        }
		//filtro de Comuna
		if(isset($Comuna) && $Comuna != ''){ 
        	$a .= ",Comuna='".$Comuna."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `clientes_tipos` SET ".$a." WHERE idTipoCliente = '$idTipoCliente'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>