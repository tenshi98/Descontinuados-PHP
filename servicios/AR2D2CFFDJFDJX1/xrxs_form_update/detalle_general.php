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

			
		//Filtro para id_Detalle
        $a = "id_Detalle='".$id_Detalle."'" ;
		//filtro de Tipo
		if(isset($Tipo) && $Tipo != ''){ 
        	$a .= ",Tipo='".$Tipo."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de Abreviatura
		if(isset($Abreviatura) && $Abreviatura != ''){ 
        	$a .= ",Abreviatura='".$Abreviatura."'" ;
        }
		//filtro de idEmpresa
		if(isset($idEmpresa) && $idEmpresa != ''){ 
        	$a .= ",idEmpresa='".$idEmpresa."'" ;
        }
		
		// inserto los datos de registro en la db
		$query  = "UPDATE `detalle_general` SET ".$a." WHERE id_Detalle = '$id_Detalle'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>