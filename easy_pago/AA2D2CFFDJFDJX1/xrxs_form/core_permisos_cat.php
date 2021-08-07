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
	if ( !empty($_POST['id_pmcat']) )  $id_pmcat   = $_POST['id_pmcat'];
	if ( !empty($_POST['Nombre']) )    $Nombre     = $_POST['Nombre'];
	if ( !empty($_POST['idFont']) )    $idFont     = $_POST['idFont'];
	
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
			case 'id_pmcat':  if(empty($id_pmcat)){  $error['id_pmcat']  = 'error/No ha ingresado el id';}break;
			case 'Nombre':    if(empty($Nombre)){    $error['Nombre']    = 'error/No ha ingresado el Nombre';}break;
			case 'idFont':    if(empty($idFont)){    $error['idFont']    = 'error/No ha seleccionado el icono';}break;
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
			
			//Se verifica si el dato existe
			if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM core_permisos_cat WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/La Categoria de permiso ya existe';}
			
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){  $a  = "'".$Nombre."'" ;    }else{$a  ="''";}
				if(isset($idFont) && $idFont != ''){  $a .= ",'".$idFont."'" ;   }else{$a .=",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `core_permisos_cat` (Nombre,idFont) VALUES ({$a} )";
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
				$a = "id_pmcat='".$id_pmcat."'" ;
				if(isset($Nombre) && $Nombre != ''){   $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($idFont) && $idFont != ''){   $a .= ",idFont='".$idFont."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `core_permisos_cat` SET ".$a." WHERE id_pmcat = '$id_pmcat'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `core_permisos_cat` WHERE id_pmcat = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;												
/*******************************************************************************************************************/
	}
?>
