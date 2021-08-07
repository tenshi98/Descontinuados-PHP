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

			
		//Filtro para id_origen_a
        $a = "id_origen_a='".$id_origen_a."'" ;
		//filtro de descripcion
		if(isset($descripcion) && $descripcion != ''){ 
        	$a .= ",descripcion='".$descripcion."'" ;
        }
		//filtro de int_ext
		if(isset($int_ext) && $int_ext != ''){ 
        	$a .= ",int_ext='".$int_ext."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `mnt_oirs_origen` SET ".$a." WHERE id_origen_a = '$id_origen_a'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>