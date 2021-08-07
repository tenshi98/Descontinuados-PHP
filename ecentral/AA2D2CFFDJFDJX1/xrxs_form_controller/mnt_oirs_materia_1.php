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
	//Se verifica si la materia existe
	if(isset($descripcion)){
		$sql_usuario = mysql_query("SELECT descripcion FROM mnt_oirs_materia WHERE descripcion='".$descripcion."'"); 
		$n_mat = mysql_num_rows($sql_usuario);
	} else {$n_mat=0;}
	
	// Valido si el usuario existe
	if($n_mat > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	La materia esta en uso
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';

//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso del usuario
	if ( empty($descripcion) )      $errors[1] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado la materia
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
?>