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

			
		//Filtro para idAdmpm
        $a = "idAdmpm='".$idAdmpm."'" ;
		//filtro de id_pmcat
		if(isset($id_pmcat) && $id_pmcat != ''){ 
        	$a .= ",id_pmcat='".$id_pmcat."'" ;
        }
		//filtro de Direccionweb
		if(isset($Direccionweb) && $Direccionweb != ''){ 
        	$a .= ",Direccionweb='".$Direccionweb."'" ;
        }
		//filtro de Direccionbase
		if(isset($Direccionbase) && $Direccionbase != ''){ 
        	$a .= ",Direccionbase='".$Direccionbase."'" ;
        }
		//filtro de Nombre
		if(isset($Nombre) && $Nombre != ''){ 
        	$a .= ",Nombre='".$Nombre."'" ;
        }

		// inserto los datos de registro en la db
		$query  = "UPDATE `core_permisos` SET ".$a." WHERE idAdmpm = '$idAdmpm'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location );
		die;
	}?>