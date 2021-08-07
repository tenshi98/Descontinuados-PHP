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
	if ( !empty($_POST['idDistrito']) )       $idDistrito         = $_POST['idDistrito'];
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
			case 'idDistrito':     if(empty($idDistrito)){      $error['idDistrito']      = 'error/No ha ingresado la id del distrito';}break;
			case 'idProvincia':    if(empty($idProvincia)){     $error['idProvincia']     = 'error/No ha seleccionado una provincia';}break;
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
			$sql_usuario = mysql_query("SELECT Nombre FROM ubicacion_distrito WHERE Nombre='".$Nombre."' AND idDepartamento='".$idDepartamento."' AND idProvincia='".$idProvincia."' "); 
			$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['usuario'] = 'error/El Nombre ya esta en uso';}

		
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idDepartamento) && $idDepartamento != ''){   $a = "'".$idDepartamento."'" ;      }else{$a ="''";}
				if(isset($idProvincia) && $idProvincia != ''){         $a .= ",'".$idProvincia."'" ;       }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                   $a .= ",'".$Nombre."'" ;            }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `ubicacion_distrito` (idDepartamento, idProvincia, Nombre) VALUES ({$a} )";
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
				$a = "idDistrito='".$idDistrito."'" ;
				if(isset($idDepartamento) && $idDepartamento != ''){      $a .= ",idDepartamento='".$idDepartamento."'" ;}
				if(isset($idProvincia) && $idProvincia != ''){            $a .= ",idProvincia='".$idProvincia."'" ;}
				if(isset($Nombre) && $Nombre != ''){                      $a .= ",Nombre='".$Nombre."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `ubicacion_distrito` SET ".$a." WHERE idDistrito = '$idDistrito'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;				
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `ubicacion_distrito` WHERE idDistrito = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;				
/*******************************************************************************************************************/
	}
?>