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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])   ) {

			
		//Filtro para idSublist
        $a = "idSublist='".$idSublist."'" ;
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		//filtro de idItemlist
		if(isset($idItemlist) && $idItemlist != ''){ 
        	$a .= ",idItemlist='".$idItemlist."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de idFrecuencia
		if(isset($idFrecuencia) && $idFrecuencia != ''){ 
        	$a .= ",idFrecuencia='".$idFrecuencia."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `empresas_item_sublist` SET ".$a." WHERE idSublist = '$idSublist'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location.'' );
		die;
	}?>