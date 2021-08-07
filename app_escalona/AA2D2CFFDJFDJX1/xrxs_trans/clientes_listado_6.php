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
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])  ) { 

		
		//Actualizo la tabla de los usuarios
		$sql = "UPDATE clientes_listado
		SET Estado='1'
		WHERE create_pass='".$create_pass."'";
		$resultado = mysql_query($sql,$dbConn);
		

		//redirigo a la nueva pagina
		header( 'Location: '.$location );
		die;

}?>