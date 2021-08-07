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
	if ( !empty($_POST['idRecetaProductos']) )  $idRecetaProductos   = $_POST['idRecetaProductos'];
	if ( !empty($_POST['idReceta']) )           $idReceta            = $_POST['idReceta'];
	if ( !empty($_POST['idProducto']) )         $idProducto          = $_POST['idProducto'];
	if ( !empty($_POST['TextoAntes']) )         $TextoAntes          = $_POST['TextoAntes'];
	if ( !empty($_POST['TextoDespues']) )       $TextoDespues        = $_POST['TextoDespues'];
	
	
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
			case 'idRecetaProductos': if(empty($idRecetaProductos)){  $error['idRecetaProductos']  = 'error/No ha ingresado el id del sistema';}break;
			case 'idReceta':          if(empty($idReceta)){           $error['idReceta']           = 'error/No ha ingresado el idReceta del sistema';}break;
			case 'idProducto':        if(empty($idProducto)){         $error['idProducto']         = 'error/No ha ingresado la imagen';}break;
			case 'TextoAntes':        if(empty($TextoAntes)){         $error['TextoAntes']         = 'error/No ha ingresado el email';}break;
			case 'TextoDespues':      if(empty($TextoDespues)){       $error['TextoDespues']       = 'error/No ha ingresado el email';}break;
			
		}
	}
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			//Verifico otros datos
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idReceta) && $idReceta != ''){         $a = "'".$idReceta."'" ;       }else{$a ="''";}
				if(isset($idProducto) && $idProducto != ''){     $a .= ",'".$idProducto."'" ;   }else{$a .= ",''";}
				if(isset($TextoAntes) && $TextoAntes != ''){     $a .= ",'".$TextoAntes."'" ;   }else{$a .= ",''";}
				if(isset($TextoDespues) && $TextoDespues != ''){ $a .= ",'".$TextoDespues."'" ; }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `productos_recetas_productos` (idReceta, idProducto, TextoAntes, TextoDespues) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&addprod=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idRecetaProductos='".$idRecetaProductos."'" ;
				if(isset($idReceta) && $idReceta != ''){          $a .= ",idReceta='".$idReceta."'" ;}
				if(isset($idProducto) && $idProducto != ''){      $a .= ",idProducto='".$idProducto."'" ;}
				if(isset($TextoAntes) && $TextoAntes != ''){      $a .= ",TextoAntes='".$TextoAntes."'" ;}
				if(isset($TextoDespues) && $TextoDespues != ''){  $a .= ",TextoDespues='".$TextoDespues."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `productos_recetas_productos` SET ".$a." WHERE idRecetaProductos = '$idRecetaProductos'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
		break;	
					
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `productos_recetas_productos` WHERE idRecetaProductos = {$_GET['delprod']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&del_prod=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>
