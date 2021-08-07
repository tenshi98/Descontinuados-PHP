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

			
		//Filtro para id_Datos
        $a = "id_Datos='".$id_Datos."'" ;
		//filtro de email_principal
		if(isset($email_principal) && $email_principal != ''){ 
        	$a .= ",email_principal='".$email_principal."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de Nombre_slogan
		if(isset($Nombre_slogan) && $Nombre_slogan != ''){ 
        	$a .= ",Nombre_slogan='".$Nombre_slogan."'" ;
        }
		//filtro de Nombre_sist
		if(isset($Nombre_sist) && $Nombre_sist != ''){ 
        	$a .= ",Nombre_sist='".$Nombre_sist."'" ;
        }
		//filtro de Nombre_sist_slogan
		if(isset($Nombre_sist_slogan) && $Nombre_sist_slogan != ''){ 
        	$a .= ",Nombre_sist_slogan='".$Nombre_sist_slogan."'" ;
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
		//filtro de Fono_anexo
		if(isset($Fono_anexo) && $Fono_anexo != ''){ 
        	$a .= ",Fono_anexo='".$Fono_anexo."'" ;
        }
		//filtro de Fono_password
		if(isset($Fono_password) && $Fono_password != ''){ 
        	$a .= ",Fono_password='".$Fono_password."'" ;
        }
		//filtro de Estado_chat
		if(isset($Estado_chat) && $Estado_chat != ''){ 
        	$a .= ",Estado_chat='".$Estado_chat."'" ;
        }
		//filtro de Ciudad
		if(isset($Ciudad) && $Ciudad != ''){ 
        	$a .= ",Ciudad='".$Ciudad."'" ;
        }
		//filtro de Comuna
		if(isset($Comuna) && $Comuna != ''){ 
        	$a .= ",Comuna='".$Comuna."'" ;
        }
		//filtro de idTheme
		if(isset($idTheme) && $idTheme != ''){ 
        	$a .= ",idTheme='".$idTheme."'" ;
        }
		//filtro de idTheme2
		if(isset($idTheme2) && $idTheme2 != ''){ 
        	$a .= ",idTheme2='".$idTheme2."'" ;
        }
		


		// inserto los datos de registro en la db
		$query  = "UPDATE `core_datos` SET ".$a." WHERE id_Datos = '$id_Datos'";
		$result = mysql_query($query, $dbConn);

		header( 'Location: '.$location );
		die;
	}?>