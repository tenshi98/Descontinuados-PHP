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
                   
	//Valida el ingreso del Nombre
	if ( empty($Nombre) )      $errors[1] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_01">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese un Nombre.</p>
	</div>';
	
	//Se valida el ingreso del Rut
	if ( empty($Rut) )     $errors[2] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_02">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese un Rut.</p>
	</div>';
	
	//Se valida el ingreso del Sexo
	if ( empty($Sexo) )   $errors[3] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_03">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Seleccione un Sexo.</p>
	</div>';
	
	//Valida el ingreso de la Direccion
	if ( empty($Direccion) )        $errors[4] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_04">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese una Direccion.</p>
	</div>';
	
	//Valida el ingreso de la Ciudad
	if ( empty($Ciudad) )         $errors[5] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_05">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Seleccione una Region.</p>
	</div>';
	
	//Valida el ingreso de la Comuna
	if ( empty($Comuna) )     $errors[6] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_06">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Seleccione una Comuna.</p>
	</div>';
	
	
//Validaciones de ingreso de datos optativos	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono1)){
		if (validarnumero($Fono1)) {   
			$errors[7]	    = '
	<div class="alert alert-danger alert-dismissable" id="txf_07">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese un numero de telefono fijo valido.</p>
	</div>'; 
		}
	}
	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($Fono2)){
		if (validarnumero($Fono2)) {   
			$errors[8]	    = '
	<div class="alert alert-danger alert-dismissable" id="txf_08">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_08&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese un numero de telefono celular valido.</p>
	</div>'; 
		}
	}
	
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[9]	    = '
	<div class="alert alert-danger alert-dismissable" id="txf_09">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_09&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese un numero de Rut Valido.</p>
	</div>'; 
		}
	}
	
	//Traspaso el rut como password
	$password=$Rut;
	
?>