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
	if ( empty($email) ) 	       $errors[1] 	  = '<span class="error_log">No ha ingresado un correo</span>';
	//Verifica si el mail corresponde
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[1]	    = '<span class="error_log">El correo ingresado no tiene el formato correcto</span>'; 
		}
	}	
?>