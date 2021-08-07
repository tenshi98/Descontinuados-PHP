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

			
		//Filtro para idCumplimiento
        $a = "idCumplimiento='".$idCumplimiento."'" ;
		//filtro de Verde
		if(isset($Verde) && $Verde != ''){ 
        	$a .= ",Verde='".$Verde."'" ;
        }
		//filtro de Amarillo
		if(isset($Amarillo) && $Amarillo != ''){ 
        	$a .= ",Amarillo='".$Amarillo."'" ;
        }
		//filtro de Rojo
		if(isset($Rojo) && $Rojo != ''){ 
        	$a .= ",Rojo='".$Rojo."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `mnt_oirs_cumplimiento` SET ".$a." WHERE idCumplimiento = '$idCumplimiento'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>