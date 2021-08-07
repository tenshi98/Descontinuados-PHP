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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])&& !isset($errors[12])&& !isset($errors[13])&& !isset($errors[14])&& !isset($errors[15])&& !isset($errors[16])&& !isset($errors[17])  ) { 
	
		
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
			$a .= ",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `postulante_videochat_listado` (Nombre, idUsuario) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>