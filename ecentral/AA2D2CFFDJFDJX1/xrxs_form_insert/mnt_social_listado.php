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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4])   ) { 
	
		
		//filtro de id_socialcat
		if(isset($id_socialcat) && $id_socialcat != ''){ 
        	$a = "'".$id_socialcat."'" ;
		}else{
			$a ="''";
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",'".$Nombre."'" ;
		}else{
			$a .=",''";
        }
		//filtro de Tipo
		if(isset($Tipo) && $Tipo != ''){ 
        	$a .= ",'".$Tipo."'" ;
		}else{
			$a .=",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `mnt_social_listado` (id_socialcat, Nombre, Tipo) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>