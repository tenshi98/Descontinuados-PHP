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
	if ( empty($Rut) ) 	           $errors[1] 	  = '<div class="bubble">No ha ingresado el rut</div>';
	if ( empty($password) ) 	   $errors[2] 	  = '<div class="bubble">No ha ingresado la password</div>';
	
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[1]	    = '<div class="bubble">El Rut no es valido</div>'; 
		}
	}
	
		
?>