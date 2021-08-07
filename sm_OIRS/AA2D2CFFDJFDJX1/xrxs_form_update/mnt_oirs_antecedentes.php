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

			
		//Filtro para id_antecedentes
        $a = "id_antecedentes='".$id_antecedentes."'" ;
		//filtro de descripcion
		if(isset($descripcion) && $descripcion != ''){ 
        	$a .= ",descripcion='".$descripcion."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `mnt_oirs_antecedentes` SET ".$a." WHERE id_antecedentes = '$id_antecedentes'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>