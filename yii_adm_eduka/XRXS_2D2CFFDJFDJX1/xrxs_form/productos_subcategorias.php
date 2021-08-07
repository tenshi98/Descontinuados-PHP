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
	if ( !empty($_POST['idSubcategoria']) )  $idSubcategoria    = $_POST['idSubcategoria'];
	if ( !empty($_POST['idCategoria']) )     $idCategoria       = $_POST['idCategoria'];
	if ( !empty($_POST['Nombre']) )          $Nombre            = $_POST['Nombre'];
	
	
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
			case 'idSubcategoria':  if(empty($idSubcategoria)){  $error['idSubcategoria']    = 'error/No ha ingresado el id';}break;
			case 'idCategoria':     if(empty($idCategoria)){     $error['idCategoria']       = 'error/No ha seleccionado la categoria';}break;
			case 'Nombre':          if(empty($Nombre)){          $error['Nombre']            = 'error/No ha ingresado el nombre';}break;
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
			
			//Se verifica si el usuario existe
			if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM productos_subcategorias WHERE Nombre='".$Nombre."' AND idCategoria='".$idCategoria."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['usuario'] = 'error/El Nombre ya esta en uso';}
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idCategoria) && $idCategoria != ''){    $a  = "'".$idCategoria."'" ;   }else{$a  ="''";}
				if(isset($Nombre) && $Nombre != ''){              $a .= ",'".$Nombre."'" ;       }else{$a .=",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `productos_subcategorias` (idCategoria,Nombre) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
					
				header( 'Location: '.$location.'&created=true' );
				die;
				
			}
	
		break;
/*******************************************************************************************************************/		
		case 'update':	
		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				//Filtros
				$a = "idSubcategoria='".$idSubcategoria."'" ;
				if(isset($idCategoria) && $idCategoria != ''){        $a .= ",idCategoria='".$idCategoria."'" ;}
				if(isset($Nombre) && $Nombre != ''){                  $a .= ",Nombre='".$Nombre."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `productos_subcategorias` SET ".$a." WHERE idSubcategoria = '$idSubcategoria'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':	
		
			//se borra al usuario
			$query  = "DELETE FROM `productos_subcategorias` WHERE idSubcategoria = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	

						
			header( 'Location: '.$location.'&deleted=true' );
			die;
	
		break;		
/*******************************************************************************************************************/
	}
?>