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
	if ( !empty($_POST['idGrilla']) )   $idGrilla   = $_POST['idGrilla'];
	if ( !empty($_POST['Nombre']) )     $Nombre     = $_POST['Nombre'];
	if ( !empty($_POST['Codigo']) )     $Codigo     = $_POST['Codigo'];
	
	
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
			case 'idGrilla':   if(empty($idGrilla)){  $error['idGrilla']   = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':     if(empty($Nombre)){    $error['Nombre']     = 'error/No ha ingresado el Nombre del sistema';}break;
			case 'Codigo':     if(empty($Codigo)){    $error['Codigo']     = 'error/No ha ingresado la imagen';}break;
			
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
				$sql_usuario = mysql_query("SELECT Nombre FROM app_grilla WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El sistema ya esta en uso';}
			

			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){   $a = "'".$Nombre."'" ;    }else{$a ="''";}
				if(isset($Codigo) && $Codigo != ''){   $a .= ",'".$Codigo."'" ;  }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `app_grilla` (Nombre, Codigo) VALUES ({$a} )";
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
				$a = "idGrilla='".$idGrilla."'" ;
				if(isset($Nombre) && $Nombre != ''){  $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Codigo) && $Codigo != ''){  $a .= ",Codigo='".$Codigo."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `app_grilla` SET ".$a." WHERE idGrilla = '$idGrilla'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `app_grilla` WHERE idGrilla = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>