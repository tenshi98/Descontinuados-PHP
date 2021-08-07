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
// completamos la variable error si es necesario 


//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso del usuario
	if ( empty($idCliente) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado un vecino
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se verifica si el usuario existe
	if(isset($idCliente)){
		$sql_Asistencia = mysql_query("SELECT idCliente FROM clientes_asistencia_eventos WHERE idCliente='".$idCliente."' AND idEvento = '".$idEvento."'"); 
		$n_Asistencia = mysql_num_rows($sql_Asistencia);
	} else {$n_Asistencia=0;}
	
	//Valida si el email existe
	if($n_Asistencia > 0)   $errors[2]  = '
	<div id="txf_02" class="alert_error">  
	  	El vecino ya esta participando de este evento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	
	
	
?>