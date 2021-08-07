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
                   
	//Valida el ingreso del idTipoBoton
	if ( empty($idTipoBoton) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado el tipo de boton para la alerta
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del Nombre
	if ( empty($Nombre) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado un Nombre para la alerta
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del Mensaje
	if ( empty($Mensaje) )      $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado un Mensaje para la alerta
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso de la idCatimg
	if ( empty($idCatimg) )      $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha seleccionado una categoria de imagen
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso de la idListimg
	if ( empty($idListimg) )      $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha seleccionado una imagen
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	

	
?>