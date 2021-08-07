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
	if ( empty($Nombre) )      $errors[1] 	  = '
	<div id="txf_01" class="alert alert_error">  
	  	No ha ingresado un nombre para la interfaz
		<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Validacion
	if ( empty($img_fondo) )      $errors[2] 	  = '
	<div id="txf_02" class="alert alert_error">  
	  	No ha ingresado el nombre de la imagen de fondo
		<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Validacion
	if ( empty($img_icono) )      $errors[3] 	  = '
	<div id="txf_03" class="alert alert_error">  
	  	No ha ingresado el nombre de la imagen del icono
		<a class="close" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';


	
	
?>