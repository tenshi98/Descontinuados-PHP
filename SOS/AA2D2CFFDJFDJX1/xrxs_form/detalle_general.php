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
	if ( !empty($_POST['id_Detalle']) )   $id_Detalle   = $_POST['id_Detalle'];
	if ( !empty($_POST['Tipo']) )         $Tipo         = $_POST['Tipo'];
	if ( !empty($_POST['Nombre']) )       $Nombre       = $_POST['Nombre'];
	
	
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
			case 'id_Detalle':  if(empty($id_Detalle)){  $error['id_Detalle']  = 'error/No ha ingresado el id del sistema';}break;
			case 'Tipo':        if(empty($Tipo)){        $error['Tipo']        = 'error/No ha ingresado el Tipo del sistema';}break;
			case 'Nombre':      if(empty($Nombre)){      $error['Nombre']      = 'error/No ha ingresado la imagen';}break;
			
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
				$sql_usuario = mysql_query("SELECT Nombre FROM detalle_general WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El sistema ya esta en uso';}
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Tipo) && $Tipo != ''){       $a = "'".$Tipo."'" ;      }else{$a ="''";}
				if(isset($Nombre) && $Nombre != ''){   $a .= ",'".$Nombre."'" ;  }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `detalle_general` (Tipo, Nombre) VALUES ({$a} )";
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
				$a = "id_Detalle='".$id_Detalle."'" ;
				if(isset($Tipo) && $Tipo != ''){       $a .= ",Tipo='".$Tipo."'" ;}
				if(isset($Nombre) && $Nombre != ''){   $a .= ",Nombre='".$Nombre."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `detalle_general` SET ".$a." WHERE id_Detalle = '$id_Detalle'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `detalle_general` WHERE id_Detalle = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>