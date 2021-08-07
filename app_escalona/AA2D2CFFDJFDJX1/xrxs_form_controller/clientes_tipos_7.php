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
                   
	
	//Valida el ingreso del imgLogo
	if ( empty($imgLogo) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado el Nombre de la imagen del logo
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';

	
?>