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
	if ( !empty($_POST['idPagelist']) )        $idPagelist        = $_POST['idPagelist'];
	if ( !empty($_POST['app_conf']) )           $app_conf           = $_POST['app_conf'];
	if ( !empty($_POST['Nombre']) )          $Nombre          = $_POST['Nombre'];
	
	
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
			case 'idPagelist':  if(empty($idPagelist)){  $error['idPagelist']  = 'error/No ha ingresado el id del sistema';}break;
			case 'app_conf':    if(empty($app_conf)){    $error['app_conf']    = 'error/No ha ingresado el app_conf del sistema';}break;
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
			
			//Se verifica si el usuario existe
			if(isset($Nombre)){
				$sql_usuario = mysql_query("SELECT Nombre FROM app_areas_pagelist WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['app_conf'] = 'error/El Nombre ya esta en uso';}

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($app_conf) && $app_conf != ''){    $a = "'".$app_conf."'" ;   }else{$a ="''";}
				if(isset($Nombre) && $Nombre != ''){        $a .= ",'".$Nombre."'" ;   }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `app_areas_pagelist` (app_conf, Nombre) VALUES ({$a} )";
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
				$a = "idPagelist='".$idPagelist."'" ;
				if(isset($app_conf) && $app_conf != ''){   $a .= ",app_conf='".$app_conf."'" ;}
				if(isset($Nombre) && $Nombre != ''){       $a .= ",Nombre='".$Nombre."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `app_areas_pagelist` SET ".$a." WHERE idPagelist = '$idPagelist'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `app_areas_pagelist` WHERE idPagelist = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>