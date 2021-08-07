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

	//Valida el ingreso del id_pmcat
	if ( empty($id_pmcat) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado una categoria para el permiso
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($Nombre) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado un nombre para el permiso
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Direccionweb
	if ( empty($Direccionweb) )      $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado la ubicacion fisica del archivo
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Direccionbase
	if ( empty($Direccionbase) )      $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha ingresado la direccion base del archivo
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Direccionbase
	if ( empty($visualizacion) )      $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha seleccionado quien ve la transaccion
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
?>