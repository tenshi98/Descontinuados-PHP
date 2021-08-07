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

//Validaciones de ingreso de datos obligatorios
	if ( empty($Rut) )              $errors[1] 	  = '<div class="bubble">Ingrese un Rut</div>';
	

	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[1]	    = '<div class="bubble">El Rut ingresado no es valido</div>'; 
		}
	}
	
?>