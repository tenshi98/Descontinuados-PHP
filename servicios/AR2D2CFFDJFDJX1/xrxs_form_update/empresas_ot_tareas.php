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
if ( empty($errors[1])   ) {

			
		//Filtro para idComment
        $a = "idTarea='".$idTarea."'" ;
		//filtro de idOt
		if(isset($idOt) && $idOt != ''){ 
        	$a .= ",idOt='".$idOt."'" ;
        }
		//filtro de idSublist
		if(isset($idSublist) && $idSublist != ''){ 
        	$a .= ",idSublist='".$idSublist."'" ;
        }
		//filtro de idNombre
		if(isset($idNombre) && $idNombre != ''){ 
        	$a .= ",idNombre='".$idNombre."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_ot_tareas` SET ".$a." WHERE idTarea = '$idTarea'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>