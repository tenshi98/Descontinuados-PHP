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
    
	//Se verifica el nombre del color existe
	if(isset($Nombre)){
		$sql_nombre = mysql_query("SELECT Nombre FROM app_ajustes_tipo WHERE Nombre='".$Nombre."' AND idGrupo='".$idGrupo."' "); 
		$n_nomb = mysql_num_rows($sql_nombre);
	} else {$n_nomb=0;}
	// se verifica si el codigo del color existe
	if(isset($Codigo)){
		$sql_codigo = mysql_query("SELECT Codigo FROM app_ajustes_tipo WHERE Codigo='".$Codigo."' AND idGrupo='".$idGrupo."' ");
		$n_codigo = mysql_num_rows($sql_codigo);
	} else {$n_codigo=0;}
	// Muestro error
	if($n_nomb > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	El nombre del elemento ya existe
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	// Muestro error
	if($n_codigo > 0) $errors[2]  = '
	<div id="txf_02" class="alert_error">  
	  	El codigo del elemento ya existe
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Verificaciones normales
	               
	//Valida el ingreso del Nombre
	if ( empty($Nombre) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado un Nombre para el elemento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso del Codigo
	if ( empty($Codigo) )     $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado un codigo para el elemento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';

	
?>