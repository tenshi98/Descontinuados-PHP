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

			
		//Filtro para idListimg
        $a = "idListimg='".$idListimg."'" ;
		//filtro de idCatimg
		if(isset($idCatimg) && $idCatimg != ''){ 
        	$a .= ",idCatimg='".$idCatimg."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `mnt_imagenes_listado` SET ".$a." WHERE idListimg = '$idListimg'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>