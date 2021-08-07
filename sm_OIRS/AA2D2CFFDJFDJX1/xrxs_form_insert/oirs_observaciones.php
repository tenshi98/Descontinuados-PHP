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
if ( !isset($errors[1]) && !isset($errors[2])   ) { 
	
		
		//filtro de id_Oirs
		if(isset($id_Oirs) && $id_Oirs != ''){ 
        	$a = "'".$id_Oirs."'" ;
		}else{
			$a ="''";
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",'".$idUsuario."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",'".$Fecha."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Hora
		if(isset($Hora) && $Hora != ''){ 
        	$a .= ",'".$Hora."'" ;
		}else{
			$a .= ",''";
        }
		//filtro de Detalle
		if(isset($Detalle) && $Detalle != ''){ 
        	$a .= ",'".$Detalle."'" ;
		}else{
			$a .= ",''";
        }
		
		
		// inserto los datos de registro en la db
		$query  = "INSERT INTO `oirs_observaciones` (id_Oirs,idUsuario,Fecha,Hora,Detalle) VALUES ({$a} )";
		$result = mysql_query($query, $dbConn);
		
	
		header( 'Location: '.$location );
		die;
		}
?>