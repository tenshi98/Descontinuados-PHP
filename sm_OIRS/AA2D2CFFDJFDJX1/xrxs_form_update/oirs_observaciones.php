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
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])  ) {

			
		//Filtro para id_OirsObservaciones
        $a = "id_OirsObservaciones='".$id_OirsObservaciones."'" ;
		//filtro de id_Oirs
		if(isset($id_Oirs) && $id_Oirs != ''){ 
        	$a .= ",id_Oirs='".$id_Oirs."'" ;
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",idUsuario='".$idUsuario."'" ;
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",Fecha='".$Fecha."'" ;
        }
		//filtro de Hora
		if(isset($Hora) && $Hora != ''){ 
        	$a .= ",Hora='".$Hora."'" ;
        }
		//filtro de Detalle
		if(isset($Detalle) && $Detalle != ''){ 
        	$a .= ",Detalle='".$Detalle."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `oirs_observaciones` SET ".$a." WHERE id_OirsObservaciones = '$id_OirsObservaciones'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>