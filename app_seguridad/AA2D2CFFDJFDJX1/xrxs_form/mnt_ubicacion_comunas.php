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
	if ( !empty($_POST['idComuna']) )   $idComuna   = $_POST['idComuna'];
	if ( !empty($_POST['idCiudad']) )   $idCiudad   = $_POST['idCiudad'];
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
			case 'idComuna':  if(empty($idComuna)){   $error['idComuna']   = 'error/No ha ingresado el id';}break;
			case 'idCiudad':  if(empty($idCiudad)){   $error['idCiudad']   = 'error/No ha seleccionado la ciudad';}break;
			case 'Nombre':    if(empty($Nombre)){     $error['Nombre']     = 'error/No ha ingresado el nombre de la comuna';}break;
			
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
			if(isset($Nombre)&&isset($idCiudad)){
				$sql_usuario = mysql_query("SELECT Nombre FROM mnt_ubicacion_comunas WHERE Nombre='".$Nombre."' AND idCiudad='".$idCiudad."'"); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El nombre de la comuna ya existe';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idCiudad) && $idCiudad != ''){   $a = "'".$idCiudad."'" ;    }else{$a ="''";}
				if(isset($Nombre) && $Nombre != ''){       $a .= ",'".$Nombre."'" ;    }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `mnt_ubicacion_comunas` (idCiudad, Nombre) VALUES ({$a} )";
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
				$a = "idComuna='".$idComuna."'" ;
				if(isset($idCiudad) && $idCiudad != ''){    $a .= ",idCiudad='".$idCiudad."'" ;}
				if(isset($Nombre) && $Nombre != ''){        $a .= ",Nombre='".$Nombre."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `mnt_ubicacion_comunas` SET ".$a." WHERE idComuna = '$idComuna'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `mnt_ubicacion_comunas` WHERE idComuna = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
							
/*******************************************************************************************************************/
	}
?>
