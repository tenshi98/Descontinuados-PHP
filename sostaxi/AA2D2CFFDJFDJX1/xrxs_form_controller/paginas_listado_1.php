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
		$sql_nombre = mysql_query("SELECT Titulo FROM paginas_listado WHERE Titulo='".$Titulo."' AND idPagGrupo='".$idPagGrupo."' AND idPagCat='".$idPagCat."' AND idTipoCliente='".$idTipoCliente."' "); 
		$n_nomb = mysql_num_rows($sql_nombre);
	} else {$n_nomb=0;}
	// Muestro error
	if($n_nomb > 0) $errors[1]  = '
	<div id="txf_01" class="alert_error">  
	  	La noticia ya existe
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
	if ( empty($idPagCat) )      $errors[2] 	  = '
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
	
	

	
?>