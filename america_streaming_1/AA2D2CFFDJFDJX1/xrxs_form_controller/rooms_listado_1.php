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
	if(isset($usuario)){
		$sql_usuario = mysql_query("SELECT Nombre FROM rooms_listado WHERE Nombre='".$Nombre."' "); 
		$n_usr = mysql_num_rows($sql_usuario);
	} else {$n_usr=0;}
	// Valido si el usuario existe
	if($n_usr > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	El nombre de la habitacion ya esta en uso, trate con otro nombre
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	


//Validaciones de ingreso de datos obligatorios

	//Valida el ingreso del Nombre
	if ( empty($Nombre) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresdo el nombre de la habitacion
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso de la contraseña
	if ( empty($Fecha) )     $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado la fecha de disponibilidad de la habitacion
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Se valida el ingreso de la repeticion de la contraseña
	if ( empty($Hora) )   $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado la hora en que se conectara el usuario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	//Valida el ingreso del nombre
	if ( empty($Tipo) )        $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha ingresado el tipo de habitacion
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	
?>