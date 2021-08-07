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

			
		//Filtro para id_pmcat
        $a = "id_pmcat='".$id_pmcat."'" ;
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de mode
		if(isset($mode) && $mode != ''){ 
        	$a .= ",mode='".$mode."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `core_permisos_cat` SET ".$a." WHERE id_pmcat = '$id_pmcat'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>