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
                   
	//Valida el ingreso del Nombre
	if ( empty($idNotGrupo) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No Seleccionado un Grupo para la Categoria
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($idNotCat) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No Seleccionado una Categoria de noticia
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($Titulo) )      $errors[3] 	  = '
	<div id="txf_03" class="alert_error">  
	  	No ha ingresado un titulo para la Noticia
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($Fecha) )      $errors[4] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No ha ingresado una fecha para la Noticia
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($Texto) )      $errors[5] 	  = '
	<div id="txf_05" class="alert_error">  
	  	No ha ingresado el cuerpo de la Noticia
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_05&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($Comentarios) )      $errors[6] 	  = '
	<div id="txf_06" class="alert_error">  
	  	No ha seleccionado si la noticia admite comentarios
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_06&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($Aprobar) )      $errors[7] 	  = '
	<div id="txf_07" class="alert_error">  
	  	No ha seleccionado si los comentarios se aprueban automaticamente
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_07&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
?>