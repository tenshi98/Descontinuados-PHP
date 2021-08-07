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

			
		//Filtro para idTipoAlerta
        $a = "idTipoAlerta='".$idTipoAlerta."'" ;
		//filtro de idTipoBoton
		if(isset($idTipoBoton) && $idTipoBoton != ''){ 
        	$a .= ",idTipoBoton='".$idTipoBoton."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de Mensaje
		if(isset($Mensaje) && $Mensaje != ''){ 
        	$a .= ",Mensaje='".$Mensaje."'" ;
        }
		//filtro de idCatimg
		if(isset($idCatimg) && $idCatimg != ''){ 
        	$a .= ",idCatimg='".$idCatimg."'" ;
        }
		//filtro de idListimg
		if(isset($idListimg) && $idListimg != ''){ 
        	$a .= ",idListimg='".$idListimg."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `alertas_tipos` SET ".$a." WHERE idTipoAlerta = '$idTipoAlerta'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>