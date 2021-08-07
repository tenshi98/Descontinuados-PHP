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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])&& empty($errors[4])&& empty($errors[5])  ) {

			
		//Filtro para idTrabajador
        $a = "idTrabajador='".$idTrabajador."'" ;
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de Telefono
		if(isset($Telefono) && $Telefono != ''){ 
        	$a .= ",Telefono='".$Telefono."'" ;
        }
		//filtro de Direccion
		if(isset($Direccion) && $Direccion != ''){ 
        	$a .= ",Direccion='".$Direccion."'" ;
        }
		//filtro de Cargo
		if(isset($Cargo) && $Cargo != ''){ 
        	$a .= ",Cargo='".$Cargo."'" ;
        }
		//filtro de Estado
		if(isset($Estado) && $Estado != ''){ 
        	$a .= ",Estado='".$Estado."'" ;
        }
		//filtro de cta_cte
		if(isset($cta_cte) && $cta_cte != ''){ 
        	$a .= ",cta_cte='".$cta_cte."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `trabajadores_listado` SET ".$a." WHERE idTrabajador = '$idTrabajador'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>