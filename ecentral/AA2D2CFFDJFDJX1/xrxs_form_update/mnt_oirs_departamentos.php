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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])  ) {

			
		//Filtro para idDepto
        $a = "idDepto='".$idDepto."'" ;
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de idUsuario
		if(isset($idUsuario) && $idUsuario != ''){ 
        	$a .= ",idUsuario='".$idUsuario."'" ;
        }
		//filtro de n_dias
		if(isset($n_dias) && $n_dias != ''){ 
        	$a .= ",n_dias='".$n_dias."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `mnt_oirs_departamentos` SET ".$a." WHERE idDepto = '$idDepto'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>