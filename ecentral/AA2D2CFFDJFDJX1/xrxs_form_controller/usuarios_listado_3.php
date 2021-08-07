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


//Validaciones de ingreso de datos obligatorios

	//Se verifica el ingreso de la contraseña antigua						
	if ( empty($oldpassword) )  $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado la contraseña antigua
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se verifica el ingreso de la nueva contraseña
	if ( empty($password) )     $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado la nueva contraseña
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se verifica la repeticion de la nueva contraseña
	if ( empty($repassword) )   $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado la repeticion de la nueva contraseña
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se verifica si la contraseña nueva y la repeticion de esta es la misma
	if(isset( $password)&&isset($repassword) ){
		if ( $password != $repassword )      $errors[3]  = ' 	
	<div id="txf_04" class="alert_error">  
	  	Las contraseñas no coinciden
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	}
	
	//Se verifica si la contraseña antigua es la misma que esta almacenada en la base de datos
	if(isset($oldpassword) ){
		if ( md5($oldpassword) != $arrUsuario['password'] ) {
			$errors[1] = '
	<div id="txf_05" class="alert_error">  
	  La contrase&ntilde;a actual no coincide
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
		}
	}
?>