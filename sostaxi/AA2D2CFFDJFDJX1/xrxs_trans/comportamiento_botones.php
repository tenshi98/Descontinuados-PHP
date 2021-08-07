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
//Traspaso de valores input a variables
	if ( !empty($_POST['pagina']) )    $pagina     = $_POST['pagina'];
	if ( !empty($_POST['view']) )      $view       = $_POST['view'];
	if ( !empty($_POST['search']) )    $search     = $_POST['search'];
	if ( !empty($_POST['id_class']) )  $id_class   = $_POST['id_class'];
	if ( !empty($_POST['tipo']) )      $tipo       = $_POST['tipo'];
	
	//Valida el ingreso del tipo
	if ( empty($tipo) )      $errors[1] 	  = '
	<div id="txf_04" class="alert_error">  
	  	No se ha seleccionado un tipo de boton
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4]) && !isset($errors[5]) && !isset($errors[6])&& !isset($errors[7])&& !isset($errors[8])&& !isset($errors[9])&& !isset($errors[10])&& !isset($errors[11])  ) { 		
		//Genero el filtro
		$q = '?function=true';
		if(isset($pagina) && $pagina != '')      { $q .= '&pagina='.$pagina ; }
		if(isset($view) && $view != '')          { $q .= '&view='.$view ; }
		if(isset($search) && $search != '')      { $q .= '&search='.$search ; }
		if(isset($id_class) && $id_class != '')  { $q .= '&id_class='.$id_class ; }
		if(isset($tipo) && $tipo != '')          { $q .= '&tipo='.$tipo ; }
		
		header( 'Location: '.$location.$q.'&filter=true' );
		die;
}
?>