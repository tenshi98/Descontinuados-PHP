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
	//Se verifica si el nombre existe
	if(isset($Nombre)){
		$sql_usuario = mysql_query("SELECT Nombre FROM mnt_oirs_departamentos WHERE Nombre='".$Nombre."'"); 
		$n_nom = mysql_num_rows($sql_usuario);
	} else {$n_nom=0;}
	
	// Validaciones
	if($n_nom > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	Nombre de la derivacion ya existe
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	

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
	if ( empty($idUsuario) )      $errors[3] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha ingresado el numero de dias de respuesta
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
		
?>