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
	if ( empty($PPU) )      $errors[1] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_01">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese una Patente.</p>
	</div>';
	
	//Se valida el ingreso del Marca
	if ( empty($Marca) )     $errors[2] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_02">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese una Marca.</p>
	</div>';
	
	//Se valida el ingreso del Modelo
	if ( empty($Modelo) )   $errors[3] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_03">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese un Modelo.</p>
	</div>';
	
	//Valida el ingreso del Tipo
	if ( empty($Tipo) )        $errors[4] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_04">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese un Tipo de Vehiculo.</p>
	</div>';
	
	//Valida el ingreso del N_Motor
	if ( empty($N_Motor) )         $errors[5] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_05">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese el numero del motor.</p>
	</div>';
	
	//Valida el ingreso del N_Chasis
	if ( empty($N_Chasis) )     $errors[6] 	  = '
	<div class="alert alert-danger alert-dismissable" id="txf_06">
		<i class="fa fa-ban"></i>
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">&times;</button>
		<p class="long_txt"><b>Alerta!</b> Ingrese el numero del chasis.</p>
	</div>';
	
	
//Validaciones de ingreso de datos optativos	
	//Valida si el fono ingresado es un numero telefonico
	if(isset($PPU)){
		$patente1 = palabra_largo($PPU,6);
		$patente2 = palabra_corto($PPU,6);
		
		if(isset($patente1)){
		$errors[7]	    = '
		<div class="alert alert-danger alert-dismissable" id="txf_07">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">&times;</button>
			<p class="long_txt"><b>Alerta!</b> Patente:'.$patente1.'.</p>
		</div>';	
		}
		if(isset($patente2)){
		$errors[8]	    = '
		<div class="alert alert-danger alert-dismissable" id="txf_08">
			<i class="fa fa-ban"></i>
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_08&apos;).className = &apos;oculto&apos;">&times;</button>
			<p class="long_txt"><b>Alerta!</b> Patente:'.$patente2.'.</p>
		</div>';	
		}
		
			 
		
	}
	
	
	
	
	
?>