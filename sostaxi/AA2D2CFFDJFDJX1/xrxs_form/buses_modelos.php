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
	if ( !empty($_POST['idModelo']) )   $idModelo   = $_POST['idModelo'];
	if ( !empty($_POST['idMarca']) )    $idMarca    = $_POST['idMarca'];
	if ( !empty($_POST['Nombre']) )     $Nombre     = $_POST['Nombre'];
	
	
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
			case 'idModelo':  if(empty($idModelo)){  $error['idModelo']  = 'error/No ha ingresado el id del sistema';}break;
			case 'idMarca':   if(empty($idMarca)){   $error['idMarca']   = 'error/No ha ingresado el idMarca del sistema';}break;
			case 'Nombre':    if(empty($Nombre)){    $error['Nombre']    = 'error/No ha ingresado la imagen';}break;
			
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
				$sql_nombre = mysql_query("SELECT Nombre FROM buses_modelos WHERE Nombre='".$Nombre."' AND idMarca='".$idMarca."'  "); 
				$n1 = mysql_num_rows($sql_nombre);
			} else {$n1=0;}
			if($n1 > 0) {$error['idMarca'] = 'error/El Nombre ya esta en uso';}
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idMarca) && $idMarca != ''){   $a = "'".$idMarca."'" ;   }else{$a ="''";}
				if(isset($Nombre) && $Nombre != ''){     $a .= ",'".$Nombre."'" ;  }else{$a .= ",''";}

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `buses_modelos` (idMarca, Nombre) VALUES ({$a} )";
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
				$a = "idModelo='".$idModelo."'" ;
				if(isset($idMarca) && $idMarca != ''){  $a .= ",idMarca='".$idMarca."'" ;}
				if(isset($Nombre) && $Nombre != ''){    $a .= ",Nombre='".$Nombre."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `buses_modelos` SET ".$a." WHERE idModelo = '$idModelo'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}

		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `buses_modelos` WHERE idModelo = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>