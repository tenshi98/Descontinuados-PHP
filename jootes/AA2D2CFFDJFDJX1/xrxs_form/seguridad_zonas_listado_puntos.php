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
	if ( !empty($_POST['idPuntos']) )    $idPuntos     = $_POST['idPuntos'];
	if ( !empty($_POST['idZona']) )      $idZona       = $_POST['idZona'];
	if ( !empty($_POST['Latitud']) )     $Latitud      = $_POST['Latitud'];
	if ( !empty($_POST['Longitud']) )    $Longitud     = $_POST['Longitud'];
	if ( !empty($_POST['Direccion']) )   $Direccion    = $_POST['Direccion'];
	if ( !empty($_POST['Orden']) )       $Orden        = $_POST['Orden'];
	
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
			case 'idPuntos':    if(empty($idPuntos)){    $error['idPuntos']     = 'error/No ha ingresado el id';}break;
			case 'idZona':      if(empty($idZona)){      $error['idZona']       = 'error/No ha seleccionado la zona';}break;
			case 'Latitud':     if(empty($Latitud)){     $error['Latitud']      = 'error/No ha ingresado el Latitud';}break;
			case 'Longitud':    if(empty($Longitud)){    $error['Longitud']     = 'error/No ha ingresado la longitud';}break;
			case 'Direccion':   if(empty($Direccion)){   $error['Direccion']    = 'error/No ha ingresado la direccion';}break;
			case 'Orden':       if(empty($Orden)){       $error['Orden']        = 'error/No ha ingresado el orden';}break;
			
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
				if(isset($idZona) && $idZona != ''){          $a = "'".$idZona."'" ;        }else{$a ="''";}
				if(isset($Latitud) && $Latitud != ''){        $a .= ",'".$Latitud."'" ;     }else{$a .= ",''";}
				if(isset($Longitud) && $Longitud != ''){      $a .= ",'".$Longitud."'" ;    }else{$a .= ",''";}
				if(isset($Direccion) && $Direccion != ''){    $a .= ",'".$Direccion."'" ;   }else{$a .= ",''";}
				if(isset($Orden) && $Orden != ''){            $a .= ",'".$Orden."'" ;       }else{$a .= ",''";}

				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `seguridad_zonas_listado_puntos` (idZona, Latitud, Longitud, Direccion, Orden) VALUES ({$a} )";
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
				$a = "idPuntos='".$idPuntos."'" ;
				if(isset($idZona) && $idZona != ''){         $a .= ",idZona='".$idZona."'" ;}
				if(isset($Latitud) && $Latitud != ''){       $a .= ",Latitud='".$Latitud."'" ;}
				if(isset($Longitud) && $Longitud != ''){     $a .= ",Longitud='".$Longitud."'" ;}
				if(isset($Direccion) && $Direccion != ''){   $a .= ",Direccion='".$Direccion."'" ;}
				if(isset($Orden) && $Orden != ''){           $a .= ",Orden='".$Orden."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `seguridad_zonas_listado_puntos` SET ".$a." WHERE idPuntos = '$idPuntos'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `seguridad_zonas_listado_puntos` WHERE idPuntos = {$_GET['del_punto']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted_punto=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
		case 'up_orden':	

			$idPuntos  = $_GET['up_orden'];
			$idZona    = $_GET['idZona'];
			$Orden     = $_GET['orden'];
			$busqueda  = $Orden-1;
			
			//Primero busco el item que este sobre para actualizarle el orden
			$query = "SELECT  idPuntos FROM `seguridad_zonas_listado_puntos` WHERE Orden = {$busqueda} AND idZona = {$idZona}";
			$resultado = mysql_query ($query, $dbConn);
			$row_data = mysql_fetch_assoc ($resultado);
			//actualizo el orden de este item
			$query  = "UPDATE `seguridad_zonas_listado_puntos` SET Orden = {$Orden} WHERE idPuntos = {$row_data['idPuntos']} ";
			$result = mysql_query($query, $dbConn);
			//actualizo el orden del item actual
			$query  = "UPDATE `seguridad_zonas_listado_puntos` SET Orden = {$busqueda} WHERE idPuntos = {$idPuntos} ";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location );
			die;

		break;	
/*******************************************************************************************************************/
		case 'down_orden':	

			$idPuntos   = $_GET['down_orden'];
			$idZona     = $_GET['idZona'];
			$Orden      = $_GET['orden'];
			$busqueda   = $Orden+1;
			
			//Primero busco el item que este sobre para actualizarle el orden
			$query = "SELECT  idPuntos FROM `seguridad_zonas_listado_puntos` WHERE Orden = {$busqueda} AND idZona = {$idZona}";
			$resultado = mysql_query ($query, $dbConn);
			$row_data = mysql_fetch_assoc ($resultado);
			//actualizo el orden de este item
			$query  = "UPDATE `seguridad_zonas_listado_puntos` SET Orden = {$Orden} WHERE idPuntos = {$row_data['idPuntos']} ";
			$result = mysql_query($query, $dbConn);
			//actualizo el orden del item actual
			$query  = "UPDATE `seguridad_zonas_listado_puntos` SET Orden = {$busqueda} WHERE idPuntos = {$idPuntos} ";
			$result = mysql_query($query, $dbConn);
			
			header( 'Location: '.$location );
			die;

		break;	

/*******************************************************************************************************************/









	}
?>
