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

	if ( empty($email) )            $errors[1] 	  = '<div class="alert alert-danger" ><strong>Error</strong> Ingrese un Correo</div>';
	

	//Verifica si la fecha ingresada tiene el formato fecha
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[2]	    = '<div class="alert alert-danger" ><strong>Error</strong> El Email ingresado no es valido</div>'; 
		}
	}	
	
?>