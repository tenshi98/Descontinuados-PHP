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
		$sql_nombre = mysql_query("SELECT Nombre FROM alertas_tipos WHERE Nombre='".$Nombre."' AND idTipoBoton = '".$idTipoBoton."'  "); 
		$n_nomb = mysql_num_rows($sql_nombre);
	} else {$n_nomb=0;}
	// Muestro error
	if($n_nomb > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	El nombre de la alerta ya existe
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	//Verificaciones normales
	               
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
	
	

	
?>