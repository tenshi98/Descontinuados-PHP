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
// se verifica si el usuario ya existe

//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso del usuario
	if ( empty($Nombre) )      $errors[1] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado un nombre del departamento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del idUsuario
	if ( empty($idUsuario) )      $errors[2] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha seleccionado un usuario responsable
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso de numero de dias de respuesta
	if ( empty($n_dias) )      $errors[3] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha ingresado el numero de dias de respuesta
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	
	
?>