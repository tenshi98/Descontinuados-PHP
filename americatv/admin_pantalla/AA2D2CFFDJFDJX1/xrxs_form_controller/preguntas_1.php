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

	//Validacion
	if ( empty($idInterfaz) )      $errors[1] 	  = '
	<div id="txf_01" class="alert alert_error">  
	  	No ha seleccionado una interfaz para la pregunta
		<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Validacion
	if ( empty($idCatPreg) )      $errors[2] 	  = '
	<div id="txf_02" class="alert alert_error">  
	  	No ha seleccionado una categoria para la pregunta
		<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Validacion
	if ( empty($Pregunta) )      $errors[3] 	  = '
	<div id="txf_03" class="alert alert_error">  
	  	No ha ingresado una pregunta
		<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Validacion
	if ( empty($Opcion1) )      $errors[4] 	  = '
	<div id="txf_04" class="alert alert_error">  
	  	No ha ingresado la primera opcion
		<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Validacion
	if ( empty($Opcion2) )      $errors[5] 	  = '
	<div id="txf_05" class="alert alert_error">  
	  	No ha ingresado la segunda opcion
		<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';

	
	
?>