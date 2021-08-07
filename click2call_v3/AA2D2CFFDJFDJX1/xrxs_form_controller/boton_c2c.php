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


	//se valida el nombre
	if ( empty($nombre) ) 	       $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado su nombre
		<a class="closed_a" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			x
		</a>
	</div>';
	//se valida el mensaje
	if ( empty($mensaje) ) 	       $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado su mensaje
		<a class="closed_a" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			x
		</a>
	</div>';

	//se valida el correo
	if ( empty($mail) ) 	       $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado un email
		<a class="closed_a" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			x
		</a>
	</div>';
	//Verifica si el mail corresponde
	if(isset($mail)){
		if(validaremail($mail)){ }else{ 
   			$errors[4]	    = '
			<div id="txf_04" class="alert_error">  
				El Email ingresado no es valido
				<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
					x
				</a>
			</div>
			'; 
		}
	}	
	
?>