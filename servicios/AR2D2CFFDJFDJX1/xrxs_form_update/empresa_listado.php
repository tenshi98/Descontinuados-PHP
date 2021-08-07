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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])  ) {

			
		//Filtro para idEmpresa
        $a = "idEmpresa='".$idEmpresa."'" ;
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de Abreviatura
		if(isset($Abreviatura) && $Abreviatura != ''){ 
        	$a .= ",Abreviatura='".$Abreviatura."'" ;
        }
		//filtro de email
		if(isset($email) && $email != ''){ 
        	$a .= ",email='".$email."'" ;
        }
		//filtro de Rut
		if(isset($Rut) && $Rut != ''){ 
        	$a .= ",Rut='".$Rut."'" ;
        }
		//filtro de Direccion
		if(isset($Direccion) && $Direccion != ''){ 
        	$a .= ",Direccion='".$Direccion."'" ;
        }
		//filtro de web
		if(isset($web) && $web != ''){ 
        	$a .= ",web='".$web."'" ;
        }
		//filtro de Nombre_contrato
		if(isset($Nombre_contrato) && $Nombre_contrato != ''){ 
        	$a .= ",Nombre_contrato='".$Nombre_contrato."'" ;
        }
		//filtro de N_contrato
		if(isset($N_contrato) && $N_contrato != ''){ 
        	$a .= ",N_contrato='".$N_contrato."'" ;
        }
		//filtro de Fono
		if(isset($Fono) && $Fono != ''){ 
        	$a .= ",Fono='".$Fono."'" ;
        }
		//filtro de Contacto
		if(isset($Contacto) && $Contacto != ''){ 
        	$a .= ",Contacto='".$Contacto."'" ;
        }
		//filtro de Pais
		if(isset($Pais) && $Pais != ''){ 
        	$a .= ",Pais='".$Pais."'" ;
        }
		//filtro de Ciudad
		if(isset($Ciudad) && $Ciudad != ''){ 
        	$a .= ",Ciudad='".$Ciudad."'" ;
        }
		//filtro de Comuna
		if(isset($Comuna) && $Comuna != ''){ 
        	$a .= ",Comuna='".$Comuna."'" ;
        }
		//filtro de Fax
		if(isset($Fax) && $Fax != ''){ 
        	$a .= ",Fax='".$Fax."'" ;
        }
		//filtro de Rubro
		if(isset($Rubro) && $Rubro != ''){ 
        	$a .= ",Rubro='".$Rubro."'" ;
        }
		//filtro de Fecha_ini_con
		if(isset($Fecha_ini_con) && $Fecha_ini_con != ''){ 
        	$a .= ",Fecha_ini_con='".$Fecha_ini_con."'" ;
        }
		//filtro de Fecha_term_con
		if(isset($Fecha_term_con) && $Fecha_term_con != ''){ 
        	$a .= ",Fecha_term_con='".$Fecha_term_con."'" ;
        }
		//filtro de duracion_contrato
		if(isset($duracion_contrato) && $duracion_contrato != ''){ 
        	$a .= ",duracion_contrato='".$duracion_contrato."'" ;
        }
		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_listado` SET ".$a." WHERE idEmpresa = '$idEmpresa'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location.'' );
		die;
	}?>