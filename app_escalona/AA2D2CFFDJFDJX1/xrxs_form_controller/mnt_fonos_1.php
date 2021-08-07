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
	//Se verifica si el antecedente existe
	if(isset($Nombre)){
		$sql_fono = mysql_query("SELECT Nombre FROM mnt_fonos WHERE Nombre='".$Nombre."'"); 
		$n_fono = mysql_num_rows($sql_fono);
	} else {$n_fono=0;}
	
	// Valido si el usuario existe
	if($n_fono > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	El dato ingresado ya existe
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	

//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso del usuario
	if ( empty($Nombre) )      $errors[1] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado un nombre para el contacto
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del fono
	if ( empty($Fono) )      $errors[2] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado el telefono
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
?>