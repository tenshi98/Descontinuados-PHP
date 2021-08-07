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
	if ( !empty($_POST['idArea']) )      $idArea      = $_POST['idArea'];
	if ( !empty($_POST['Nombre']) )      $Nombre      = $_POST['Nombre'];
	if ( !empty($_POST['Orden']) )       $Orden       = $_POST['Orden'];
	if ( !empty($_POST['idPagelist']) )  $idPagelist  = $_POST['idPagelist'];
	if ( !empty($_POST['Codigo']) )      $Codigo      = $_POST['Codigo'];
	if ( !empty($_POST['Margen']) )      $Margen      = $_POST['Margen'];
	
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
			case 'idArea':     if(empty($idArea)){     $error['idArea']      = 'error/No ha ingresado el id del sistema';}break;
			case 'Nombre':     if(empty($Nombre)){     $error['Nombre']      = 'error/No ha ingresado el Nombre del sistema';}break;
			case 'Orden':      if(empty($Orden)){      $error['Orden']       = 'error/No ha ingresado la imagen';}break;
			case 'idPagelist': if(empty($idPagelist)){ $error['idPagelist']  = 'error/No ha ingresado el email';}break;
			case 'Codigo':     if(empty($Codigo)){     $error['Codigo']      = 'error/No ha ingresado la razon social';}break;
			case 'Margen':     if(empty($Margen)){     $error['Margen']      = 'error/No ha ingresado el Margen';}break;
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
				$sql_nombre = mysql_query("SELECT Nombre FROM app_areas_listado WHERE Nombre='".$Nombre."' AND idPagelist = {$_GET['view']} "); 
				$n1 = mysql_num_rows($sql_nombre);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El nombre del area ya existe';}

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($Nombre) && $Nombre != ''){           $a = "'".$Nombre."'" ;         }else{$a ="''";}
				if(isset($Orden) && $Orden != ''){             $a .= ",'".$Orden."'" ;        }else{$a .= ",''";}
				if(isset($idPagelist) && $idPagelist != ''){   $a .= ",'".$idPagelist."'" ;   }else{$a .= ",''";}
				if(isset($Codigo) && $Codigo != ''){           $a .= ",'".$Codigo."'" ;       }else{$a .= ",''";}
				if(isset($Margen) && $Margen != ''){           $a .= ",'".$Margen."'" ;       }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `app_areas_listado` (Nombre, Orden, idPagelist, Codigo, Margen) VALUES ({$a} )";
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
				$a = "idArea='".$idArea."'" ;
				if(isset($Nombre) && $Nombre != ''){          $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Orden) && $Orden != ''){            $a .= ",Orden='".$Orden."'" ;}
				if(isset($idPagelist) && $idPagelist != ''){  $a .= ",idPagelist='".$idPagelist."'" ;}
				if(isset($Codigo) && $Codigo != ''){          $a .= ",Codigo='".$Codigo."'" ;}
				if(isset($Margen) && $Margen != ''){          $a .= ",Margen='".$Margen."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `app_areas_listado` SET ".$a." WHERE idArea = '$idArea'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}

		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `app_areas_listado` WHERE idArea = {$_GET['del_grilla']}";
			$result = mysql_query($query, $dbConn);	
			
			$query  = "DELETE FROM `app_areas_elementos` WHERE idArea = {$_GET['del_grilla']}";
			$result = mysql_query($query, $dbConn);	
	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;		
/*******************************************************************************************************************/
		case 'up_grilla':	

			$idArea   = $_GET['up_grilla'];
			$Orden    = $_GET['orden'];
			$busqueda = $Orden-1;
			//Primero busco el item que este sobre para actualizarle el orden
			$query = "SELECT  idArea FROM `app_areas_listado` WHERE Orden = {$busqueda} AND idPagelist = {$_GET['view']}";
			$resultado = mysql_query ($query, $dbConn);
			$row_data = mysql_fetch_assoc ($resultado);
			//actualizo el orden de este item
			$query  = "UPDATE `app_areas_listado` SET Orden = {$Orden} WHERE idArea = {$row_data['idArea']} ";
			$result = mysql_query($query, $dbConn);
			//actualizo el orden del item actual
			$query  = "UPDATE `app_areas_listado` SET Orden = {$busqueda} WHERE idArea = {$idArea} ";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location );
			die;

		break;	
/*******************************************************************************************************************/
		case 'down_grilla':	

			$idArea   = $_GET['down_grilla'];
			$Orden    = $_GET['orden'];
			$busqueda = $Orden+1;
			//Primero busco el item que este sobre para actualizarle el orden
			$query = "SELECT  idArea FROM `app_areas_listado` WHERE Orden = {$busqueda} AND idPagelist = {$_GET['view']}";
			$resultado = mysql_query ($query, $dbConn);
			$row_data = mysql_fetch_assoc ($resultado);
			//actualizo el orden de este item
			$query  = "UPDATE `app_areas_listado` SET Orden = {$Orden} WHERE idArea = {$row_data['idArea']} ";
			$result = mysql_query($query, $dbConn);
			//actualizo el orden del item actual
			$query  = "UPDATE `app_areas_listado` SET Orden = {$busqueda} WHERE idArea = {$idArea} ";
			$result = mysql_query($query, $dbConn);
			
			header( 'Location: '.$location );
			die;

		break;			
						
/*******************************************************************************************************************/
	}
?>