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
	if ( !empty($_POST['idProvincia']) )      $idProvincia        = $_POST['idProvincia'];
	if ( !empty($_POST['idDepartamento']) )   $idDepartamento     = $_POST['idDepartamento'];
	if ( !empty($_POST['Nombre']) )           $Nombre             = $_POST['Nombre'];
	
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
			case 'idProvincia':    if(empty($idProvincia)){     $error['idProvincia']     = 'error/No ha ingresado la id de la provincia';}break;
			case 'idDepartamento': if(empty($idDepartamento)){  $error['idDepartamento']  = 'error/No ha seleccionado un departamento';}break;
			case 'Nombre':         if(empty($Nombre)){          $error['Nombre']          = 'error/No ha ingresado el nombre de la provincia';}break;
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
			$sql_usuario = mysql_query("SELECT Nombre FROM ubicacion_provincia WHERE Nombre='".$Nombre."' AND idDepartamento='".$idDepartamento."' "); 
			$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['usuario'] = 'error/El Nombre ya esta en uso';}

		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idDepartamento) && $idDepartamento != ''){   $a = "'".$idDepartamento."'" ;      }else{$a ="''";}
				if(isset($Nombre) && $Nombre != ''){                   $a .= ",'".$Nombre."'" ;            }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `ubicacion_provincia` (idDepartamento, Nombre) VALUES ({$a} )";
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
				$a = "idProvincia='".$idProvincia."'" ;
				if(isset($idDepartamento) && $idDepartamento != ''){      $a .= ",idDepartamento='".$idDepartamento."'" ;}
				if(isset($Nombre) && $Nombre != ''){                      $a .= ",Nombre='".$Nombre."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `ubicacion_provincia` SET ".$a." WHERE idProvincia = '$idProvincia'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':	
		
			//se borra al usuario
			$query  = "DELETE FROM `ubicacion_provincia` WHERE idProvincia = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
			
			//se borran los permisos del usuario
			$query  = "DELETE FROM `ubicacion_distrito` WHERE idProvincia = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;				
/*******************************************************************************************************************/
	}
?>