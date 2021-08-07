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
	if(isset($PPU)){
		$sql_patente = mysql_query("SELECT PPU FROM taxista_vehiculos WHERE PPU='".$PPU."'  "); 
		$n_patente = mysql_num_rows($sql_patente);
	} else {$n_patente=0;}
	// Muestro error
	if($n_patente > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	La Patente ya existe
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	
	//Verificaciones normales
	               
	//Valida el ingreso del Nombre
	if ( empty($PPU) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha ingresado una Patente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	if(isset($PPU)){
		//valido patente
		$valpat = ValidaPatente($PPU);
		if(isset($valpat)&&$valpat!=''){
			$errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	La patente ingresada no tiene el formato correcto
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';	
		}
		
		//Verifica el largo de la patente
		$patente_corto = palabra_corto($PPU,6);	
		if(isset($patente_corto)){
			$errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
		La patente ingresada tiene mas de los 6 digitos solicitados
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';	
		}
		
		//Verifica el largo de la patente
		$patente_corto = palabra_largo($PPU,6);	
		if(isset($patente_corto)){
			$errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	La patente ingresada no tiene los 6 digitos solicitados
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';	
		}
	}
	
	
	
	//Valida el ingreso del Nombre
	if ( empty($idMarca) )      $errors[2] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado una marca
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($idModelo) )      $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha seleccionado un modelo
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($idTransmision) )      $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha seleccionado un tipo de transmision
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($idColorV_1) )      $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha seleccionado un color base
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($fFabricacion) )      $errors[6] 	  = '
	<div id="txf_06" class="alert_error">  
	  	No ha ingresado una fecha de fabricacion del Vehiculo
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($N_Motor) )      $errors[7] 	  = '
	<div id="txf_07" class="alert_error">  
	  	No ha ingresado un numero de motor
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($N_Chasis) )      $errors[8] 	  = '
	<div id="txf_08" class="alert_error">  
	  	No ha ingresado un numero de chasis
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_08&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del propietario
	if ( empty($idPropietario) )      $errors[9] 	  = '
	<div id="txf_09" class="alert_error">  
	  	No ha seleccionado un propietario
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_09&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del recorrido
	if ( empty($idRecorrido) )      $errors[10] 	  = '
	<div id="txf_10" class="alert_error">  
	  	No ha seleccionado el recorrido
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_10&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del conductor
	if ( empty($idConductor) )      $errors[11] 	  = '
	<div id="txf_11" class="alert_error">  
	  	No ha seleccionado el conductor
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_11&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	

	
?>