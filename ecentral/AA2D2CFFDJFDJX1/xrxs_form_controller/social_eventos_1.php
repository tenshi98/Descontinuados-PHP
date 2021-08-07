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

	//Validacion
	if ( empty($id_sociallist) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado una categoria para el evento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Validacion
	if ( empty($Titulo) )     $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado un titulo para el evento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Validacion
	if ( empty($Fecha) )   $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha seleccionado una fecha para el evento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Validacion
	if ( empty($Descripcion) )        $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha ingresado una descripcion del evento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	
	//Validacion
	if ( empty($Color) )         $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha seleccionado un color para el evento
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	//Valida las fechas
	$fecha = $Fecha; //en formato Y-m-d (opcional H:i:s)
	$hoy = date("Y-m-d");
	
	if (strtotime($hoy) > strtotime($fecha)) {
	$errors[6] 	  = '
	<div id="txf_06" class="alert_error">  
	  	La fecha es inferior a la actual
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>
	';
	}  


	//Transformo algunos datos para enviar los datos correctos
	$year  = Fecha_año($Fecha);
	$month = Fecha_mes_n2($Fecha);
	$day   = Fecha_dia($Fecha);
	

	
?>