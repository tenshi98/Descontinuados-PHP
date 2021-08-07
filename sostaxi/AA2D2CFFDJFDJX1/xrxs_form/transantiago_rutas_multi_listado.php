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
	if ( !empty($_POST['idListado']) ) $idListado   = $_POST['idListado'];
	if ( !empty($_POST['idRutaAlt']) ) $idRutaAlt   = $_POST['idRutaAlt'];
	if ( !empty($_POST['Latitud']) ) $Latitud   = $_POST['Latitud'];
	if ( !empty($_POST['Longitud']) ) $Longitud   = $_POST['Longitud'];
	if ( !empty($_POST['direccion']) ) $direccion   = $_POST['direccion'];
	
	
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
			case 'idListado':    if(empty($idListado)){   $error['idListado']  = 'error/No ha ingresado el id del sistema';}break;
			case 'idRutaAlt':    if(empty($idRutaAlt)){   $error['idRutaAlt']  = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Latitud':      if(empty($Latitud)){     $error['Latitud']    = 'error/No ha ingresado el nombre del sistema';}break;
			case 'Longitud':     if(empty($Longitud)){    $error['Longitud']   = 'error/No ha ingresado el nombre del sistema';}break;
			case 'direccion':    if(empty($direccion)){   $error['direccion']  = 'error/No ha ingresado el nombre del sistema';}break;
			
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
				if(isset($idRutaAlt) && $idRutaAlt != ''){   $a = "'".$idRutaAlt."'" ;      }else{$a ="''";}
				if(isset($Latitud) && $Latitud != ''){       $a .= ",'".$Latitud."'" ;      }else{$a .=",''";}
				if(isset($Longitud) && $Longitud != ''){     $a .= ",'".$Longitud."'" ;     }else{$a .=",''";}
				if(isset($direccion) && $direccion != ''){   $a .= ",'".$direccion."'" ;    }else{$a .=",''";}		
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `transantiago_rutas_multi_listado` (idRutaAlt, Latitud, Longitud, direccion) VALUES ({$a} )";
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
				$a = "idListado='".$idListado."'" ;
				if(isset($idRutaAlt) && $idRutaAlt != ''){   $a .= ",idRutaAlt='".$idRutaAlt."'" ;}
				if(isset($Latitud) && $Latitud != ''){       $a .= ",Latitud='".$Latitud."'" ;}
				if(isset($Longitud) && $Longitud != ''){     $a .= ",Longitud='".$Longitud."'" ;}
				if(isset($direccion) && $direccion != ''){   $a .= ",direccion='".$direccion."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `transantiago_rutas_multi_listado` SET ".$a." WHERE idListado = '$idListado'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del_ruta':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `transantiago_rutas_multi_listado` WHERE idListado = {$_GET['del_ruta']}";
			$result = mysql_query($query, $dbConn);	
			
			echo $query;
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>