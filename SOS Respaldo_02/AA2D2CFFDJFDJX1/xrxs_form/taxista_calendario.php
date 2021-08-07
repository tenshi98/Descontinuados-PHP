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
	if ( !empty($_POST['id']) )      $id       = $_POST['id'];
	if ( !empty($_POST['Semana']) )  $Semana   = $_POST['Semana'];
	if ( !empty($_POST['Mes']) )     $Mes      = $_POST['Mes'];
	if ( !empty($_POST['Ano']) )     $Ano      = $_POST['Ano'];
	
	
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
			case 'id':       if(empty($id)){       $error['id']        = 'error/No ha ingresado el id del sistema';}break;
			case 'Semana':   if(empty($Semana)){   $error['Semana']    = 'error/No ha ingresado el Semana del sistema';}break;
			case 'Mes':      if(empty($Mes)){      $error['Mes']       = 'error/No ha ingresado la imagen';}break;
			case 'Ano':      if(empty($Ano)){      $error['Ano']       = 'error/No ha ingresado el email';}break;
			
		}
	}

	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'insert':
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Semana) && $Semana != ''){  $a = "'".$Semana."'" ;   }else{$a ="''";}
				if(isset($Mes) && $Mes != ''){        $a .= ",'".$Mes."'" ;    }else{$a .= ",''";}
				if(isset($Ano) && $Ano != ''){        $a .= ",'".$Ano."'" ;    }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `taxista_calendario` (Semana, Mes, Ano) VALUES ({$a} )";
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
				$a = "id='".$id."'" ;
				if(isset($Semana) && $Semana != ''){   $a .= ",Semana='".$Semana."'" ;}
				if(isset($Mes) && $Mes != ''){         $a .= ",Mes='".$Mes."'" ;}
				if(isset($Ano) && $Ano != ''){         $a .= ",Ano='".$Ano."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `taxista_calendario` SET ".$a." WHERE id = '$id'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `taxista_calendario` WHERE id = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>