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

//Se validan si existe el usuario o el email asociado de este en la base de datos
	//Se verifica si el usuario existe
	if(isset($descripcion)){
		$sql_usuario = mysql_query("SELECT descripcion FROM mnt_oirs_origen WHERE descripcion='".$descripcion."'"); 
		$n_org = mysql_num_rows($sql_usuario);
	} else {$n_org=0;}
	
	// Valido si el usuario existe
	if($n_org > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	Origen ya existente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	

//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso de la descripcion
	if ( empty($descripcion) )      $errors[1] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado la descripcion del Origen
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso del tipo
	if ( empty($int_ext) )     $errors[2] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha seleccionado un tipo
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
?>