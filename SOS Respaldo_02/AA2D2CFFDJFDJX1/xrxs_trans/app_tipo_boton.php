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
if ( !isset($errors[1]) && !isset($errors[2])&& !isset($errors[3])&& !isset($errors[4])&& !isset($errors[5])&& !isset($errors[6]) && !isset($errors[7]) && !isset($errors[8]) && !isset($errors[9]) && !isset($errors[10]) && !isset($errors[11])  ) {

		//Actualizo la tabla de los elementos en caso de ser necesario, para actualizar enlaces	
		//filtro de Archivo
		if(isset($Archivo) && $Archivo != ''){ 
        	$a = "Archivo='".$Archivo."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `app_areas_elementos` SET ".$a." WHERE idTipoBoton = '$idTipoBoton'";
		$result = mysql_query($query, $dbConn);
	

	}?>