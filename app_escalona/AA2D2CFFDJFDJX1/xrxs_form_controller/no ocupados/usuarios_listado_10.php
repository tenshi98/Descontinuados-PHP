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
// completamos la variable error si es necesario
	if ( empty($Nombre) )       $errors[2] 	  = '<h4 class="alert_error">No ha ingresado el nombre real del usuario</h4>';
    if ( empty($email) )        $errors[5] 	  = '<h4 class="alert_error">No ha ingresado el email del usuario</h4>';
    if ( empty($tipo) )         $errors[6] 	  = '<h4 class="alert_error">No ha seleccionado el tipo de perfil del usuario</h4>';	
	
	if(isset($email)){
		if (validaremail($email)) {   
			}else{ 
			$errors[5]	    = '<h4 class="alert_error">Ingrese un email valido</h4>'; 
		}
	}
?>