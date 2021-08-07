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
                   
	//Valida el ingreso del PPU
	if ( empty($Nombre) )      $errors[1] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_01">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese una Patente.</p>
	</div>';
	
	//Se valida el ingreso del Marca
	if ( empty($Fono) )     $errors[2] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_02">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese una Marca.</p>
	</div>';
	
	
	//Validaciones de ingreso de datos optativos	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono)){
		if (validarnumero($Fono)) {   
			$errors[3]	    = '
	<div class="alert alert-danger alert-dismissable" id="txf_03">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese un numero telefonico valido.</p>
	</div>
			'; 
		}
	}
	//Verifica si el mail corresponde
	if(isset($email)){
		if(validaremail($email)){ }else{ 
   			$errors[4]	    = '
	<div class="alert alert-danger alert-dismissable" id="txf_04">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese un email valido.</p>
	</div>
			'; 
		}
	}
	

?>