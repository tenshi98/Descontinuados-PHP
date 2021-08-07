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
if ( empty($errors[1]) && empty($errors[2])&& empty($errors[3])  ) {

			
		//Filtro para permiso
		$idpermiso = $_GET['id'];
        $a = "idAdmin_permisos='".$idpermiso."'" ;
		//filtro de tipo
		if(isset($tipo) && $tipo != ''){ 
        	$a .= ",Tipo='".$tipo."'" ;
        }
		//filtro de direccion
		if(isset($direccion) && $direccion != ''){ 
        	$a .= ",Direccionweb='".$direccion."'" ;
        }
		//filtro de nombre
		if(isset($nombre) && $nombre != ''){ 
        	$a .= ",Nombre='".$nombre."'" ;
        }
		// inserto los datos de registro en la db
		$query  = "UPDATE `admin_permisos` SET ".$a." WHERE idAdmin_permisos = '$idpermiso'";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location.'?edit=true' );
		die;
	}?>