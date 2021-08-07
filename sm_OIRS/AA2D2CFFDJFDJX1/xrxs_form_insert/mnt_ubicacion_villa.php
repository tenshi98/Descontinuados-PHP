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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])   ) { 
	
		
		//filtro de idCiudad
		if(isset($idCiudad) && $idCiudad != ''){ 
        	$a = "'".$idCiudad."'" ;
		}else{
			$a ="''";
        }
		//filtro de idComuna
		if(isset($idComuna) && $idComuna != ''){ 
        	$a .= ",'".$idComuna."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",'".$Nombre."'" ;
		}else{
			$a .=",''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `mnt_ubicacion_villa` (idCiudad,idComuna,Nombre) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>