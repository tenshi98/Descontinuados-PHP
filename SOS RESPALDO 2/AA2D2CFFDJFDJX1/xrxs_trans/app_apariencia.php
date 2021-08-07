<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/;

		//Rescato todas las variables de reubicacion
		$return = '?ss=true';
		if(isset($_GET['return1']))  {  $return .= '&'.$_GET['return1'].'=true';  }
		if(isset($_GET['return2']))  {  $return .= '&'.$_GET['return2'].'=true';  }
		//sistema actualizado
		if(isset($_GET['app_conf']))  {  $return .= '&app_conf='.$_GET['app_conf'];  }
		
		//por ultimo actualizo el estado de los ajustes generales
		$query  = "UPDATE `app_ajustes_generales` SET {$_GET['table']} = '{$_GET['val']}' WHERE id = {$_GET['app_conf']} ";
		$result = mysql_query($query, $dbConn);
		
		header( 'Location: '.$location.$return );
		die;

?>