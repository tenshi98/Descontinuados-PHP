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

			
		//Filtro para id_sociallist
        $a = "id_sociallist='".$id_sociallist."'" ;
		//filtro de id_socialcat
		if(isset($id_socialcat) && $id_socialcat != ''){ 
        	$a .= ",id_socialcat='".$id_socialcat."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }
		//filtro de Tipo
		if(isset($Tipo) && $Tipo != ''){ 
        	$a .= ",Tipo='".$Tipo."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `mnt_social_listado` SET ".$a." WHERE id_sociallist = '$id_sociallist'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>