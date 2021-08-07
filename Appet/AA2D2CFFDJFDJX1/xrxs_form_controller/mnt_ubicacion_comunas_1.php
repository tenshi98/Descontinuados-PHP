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
	if(isset($Nombre)&&isset($idCiudad)){
		$sql_comuna = mysql_query("SELECT Nombre FROM mnt_ubicacion_comunas WHERE Nombre='".$Nombre."' AND idCiudad='".$idCiudad."'"); 
		$n_com = mysql_num_rows($sql_comuna);
	} else {$n_com=0;}
	
	// Valido si el usuario existe
	if($n_com > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	La comuna ya existe
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	

//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso del usuario
	if ( empty($idCiudad) )      $errors[1] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No seleccionado una ciudad
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del usuario
	if ( empty($Nombre) )      $errors[2] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado un nombre para la comuna
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
?>