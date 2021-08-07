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

			
		//Filtro para idInterfaz
        $a = "idInterfaz='".$idInterfaz."'" ;
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de img_fondo
		if(isset($img_fondo) && $img_fondo != ''){ 
        	$a .= ",img_fondo='".$img_fondo."'" ;
        }
		//filtro de img_icono
		if(isset($img_icono) && $img_icono != ''){ 
        	$a .= ",img_icono='".$img_icono."'" ;
        }
		

		// inserto los datos de registro en la db
		$query  = "UPDATE `interfaz` SET ".$a." WHERE idInterfaz = '$idInterfaz'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>