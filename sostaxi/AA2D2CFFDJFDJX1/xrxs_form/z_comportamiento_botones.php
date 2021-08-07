<?php
/*******************************************************************************************************************/
/*                                              Bloque de seguridad                                                */
/*******************************************************************************************************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/*******************************************************************************************************************/
/*                                        Se traspasan los datos a variables                                       */
/*******************************************************************************************************************/

	//Traspaso de valores input a variables
	if ( !empty($_POST['pagina']) )     $pagina    = $_POST['pagina'];
	if ( !empty($_POST['view']) )       $view      = $_POST['view'];
	if ( !empty($_POST['search']) )     $search    = $_POST['search'];
	if ( !empty($_POST['id_class']) )   $id_class  = $_POST['id_class'];
	if ( !empty($_POST['tipo']) )       $tipo      = $_POST['tipo'];
	
/*******************************************************************************************************************/
/*                                      Verificacion de los datos obligatorios                                     */
/*******************************************************************************************************************/

	//limpio y separo los datos de la cadena de comprobacion
	$form_obligatorios = str_replace(' ', '', $form_obligatorios);
	$piezas = explode(",", $form_obligatorios);
	//recorro los elementos
	foreach ($piezas as $valor) {
		//veo si existe el dato solicitado y genero el error
		switch ($valor) {
			case 'pagina':    if(empty($pagina)){    $error['pagina']    = 'error/No ha ingresado el id del sistema';}break;
			case 'view':      if(empty($view)){      $error['view']      = 'error/No ha ingresado el Nombre del sistema';}break;
			case 'search':    if(empty($search)){    $error['search']    = 'error/No ha ingresado la imagen';}break;
			case 'id_class':  if(empty($id_class)){  $error['id_class']  = 'error/No ha ingresado el email';}break;
			case 'tipo':      if(empty($tipo)){      $error['tipo']      = 'error/No ha ingresado la razon social';}break;

		}
	}
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'filtrar':
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				$q = '&function=true';
				if(isset($pagina) && $pagina != '')      { $q .= '&pagina='.$pagina ; }
				if(isset($view) && $view != '')          { $q .= '&view='.$view ; }
				if(isset($search) && $search != '')      { $q .= '&search='.$search ; }
				if(isset($id_class) && $id_class != '')  { $q .= '&id_class='.$id_class ; }
				if(isset($tipo) && $tipo != '')          { $q .= '&tipo='.$tipo ; }
				
				header( 'Location: '.$location.$q.'&filter=true' );
				die;

			}	
	
	
		break;			
/*******************************************************************************************************************/
	}
?>