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
		$sql_nombre = mysql_query("SELECT Nombre FROM paginas_categorias WHERE Nombre='".$Nombre."' AND idPagGrupo='".$idPagGrupo."' "); 
		$n_nomb = mysql_num_rows($sql_nombre);
	} else {$n_nomb=0;}
	// Muestro error
	if($n_nomb > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	El nombre de la Categoria ya existe
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';

	
	//Verificaciones normales
	               
	//Valida el ingreso del Nombre
	if ( empty($idPagGrupo) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No Seleccionado un Grupo para la Categoria
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	//Valida el ingreso del Nombre
	if ( empty($Nombre) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado un Nombre para la Categoria
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	

	
?>