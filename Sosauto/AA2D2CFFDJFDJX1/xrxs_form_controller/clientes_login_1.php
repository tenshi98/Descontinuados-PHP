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
	if ( empty($Rut) ) 	           $errors[1] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_03">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese un Rut.</p>
	</div>';
	
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[1]	    = '
			<div class="alert alert-danger alert-dismissable" id="txf_03">
				<i class="fa fa-ban"></i>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
				<p class="long_txt"><b>Alerta!</b> El rut ingresado no es valido.</p>
			</div>'; 
		}
	}
	$Rut_limpio = str_replace(".","",$Rut);
		
?>