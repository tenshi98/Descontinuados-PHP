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
if ( !isset($errors[1]) && !isset($errors[2])  ) {

			
		//Filtro para idVilla
        $a = "idVilla='".$idVilla."'" ;
		//filtro de idCiudad
		if(isset($idCiudad) && $idCiudad != ''){ 
        	$a .= ",idCiudad='".$idCiudad."'" ;
        }
		//filtro de idComuna
		if(isset($idComuna) && $idComuna != ''){ 
        	$a .= ",idComuna='".$idComuna."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `mnt_ubicacion_villa` SET ".$a." WHERE idVilla = '$idVilla'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>