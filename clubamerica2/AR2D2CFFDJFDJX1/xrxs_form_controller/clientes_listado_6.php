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
//Valida el ingreso del usuario

	//Valida si las contraseñas ingresadas son las mismas
	if(isset($password)&&isset($repassword)){
	if ( $password <> $repassword )      $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	Las contraseñas ingresadas no coinciden
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	}
	
	//Se valida el ingreso de la contraseña
	if ( empty($password) )     $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado la contraseña
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso de la repeticion de la contraseña
	if ( empty($repassword) )   $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado la repeticion de la contraseña
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	
		
?>