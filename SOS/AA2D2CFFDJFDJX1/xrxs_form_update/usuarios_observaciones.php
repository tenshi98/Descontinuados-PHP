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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4])  ) { 

			
		//Filtro para idObservacion
        $a = "idObservacion='".$idObservacion."'" ;
		//filtro de idUsuario_observado
		if(isset($idUsuario_observado) && $idUsuario_observado != ''){ 
        	$a .= ",idUsuario_observado='".$idUsuario_observado."'" ;
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",idUsuario='".$idUsuario."'" ;
        }
		//filtro de Fecha
		if(isset($Fecha) && $Fecha != ''){ 
        	$a .= ",Fecha='".$Fecha."'" ;
        }
		//filtro de Observacion
		if(isset($Observacion) && $Observacion != ''){ 
        	$a .= ",Observacion='".$Observacion."'" ;
        }
		


		// inserto los datos de registro en la db
		$query  = "UPDATE `usuarios_observaciones` SET ".$a." WHERE idObservacion = '$idObservacion'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>