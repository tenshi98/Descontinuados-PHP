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
	if ( empty($usuario) ) 	       $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado el nombre de usuario
		<a class="closed_a" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	if ( empty($password) ) 	   $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado una contraseña
		<a class="closed_a" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';	
?>