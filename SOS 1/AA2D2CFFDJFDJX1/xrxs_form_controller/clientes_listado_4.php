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

	//Valida el ingreso del idTipoCliente
	if ( empty($idTipoCliente) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado el tipo de cliente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	
?>