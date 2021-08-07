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

	//Valida el ingreso del cliente
	if ( empty($idCliente) )        $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado un cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Valida la seleccion del departamento
	if ( empty($idDepto) )        $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha seleccionado un departamento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Validacion de fechas
	if(isset($Expira) && $Expira!='0'){
		$start = strtotime($Inicia); 
		$end = strtotime($Expira); 

		if ( $start > $end)        $errors[3] 	  = '
		<div id="txf_03" class="alert_error">  
			La fecha de inicio es superior a la fecha de termino
			<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
				<i class="fa fa-times"></i>
			</a>
		</div>
		';
		
	}	
		
	

?>