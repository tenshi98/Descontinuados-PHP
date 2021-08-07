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
	if ( empty($email) ) 	       $errors[1] 	  = '<div class="bubble">No ha ingresado un correo</div>';
	//Verifica si el mail corresponde
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[1]	    = '<div class="bubble">El correo ingresado no es valido</div>'; 
		}
	}	
?>