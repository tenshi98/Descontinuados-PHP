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
if ( empty($errors[1]) && empty($errors[2])  ) { 
	// verificamos que los datos ingresados correspondan a un usuario
	if ( $arrUsuario = esUsuario($usuario,md5($password),$dbConn) ) {
			
		// definimos las sesiones
		$_SESSION['usuario'] 	= $arrUsuario['usuario'];
		$_SESSION['password']	= $arrUsuario['password'];
			
		// si todo esta bien te redirige hacia la pagina principal
		header( 'Location: '.$location.'' );
		die;		
		
		//si no reconoce al usuario, envia un error	
		} else {
			$error['noExiste'] 		= '<p>El nombre de usuario o contraseña no coinciden</p>';
	}
}
?>