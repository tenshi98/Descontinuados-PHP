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
	
		
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a = "'".$Nombre."'" ;
		}else{
			$a ="''";
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",'".$idUsuario."'" ;
		}else{
			$a .=",''";
        }
		//filtro de n_dias
		if(isset($n_dias) && $n_dias != ''){ 
        	$a .= ",'".$n_dias."'" ;
		}else{
			$a .=",''";
        }
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `mnt_oirs_departamentos` (Nombre, idUsuario, n_dias ) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>