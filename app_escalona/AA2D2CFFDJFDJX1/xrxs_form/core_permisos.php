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
	if ( !empty($_POST['idAdmpm']) )            $idAdmpm            = $_POST['idAdmpm'];
	if ( !empty($_POST['id_pmcat']) )           $id_pmcat           = $_POST['id_pmcat'];
	if ( !empty($_POST['Direccionweb']) )       $Direccionweb       = $_POST['Direccionweb'];
	if ( !empty($_POST['Direccionbase']) )      $Direccionbase      = $_POST['Direccionbase'];
	if ( !empty($_POST['Nombre']) )             $Nombre             = $_POST['Nombre'];
	if ( !empty($_POST['mode']) )               $mode               = $_POST['mode'];
	if ( !empty($_POST['visualizacion']) )      $visualizacion      = $_POST['visualizacion'];
	
	
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
			case 'idAdmpm':           if(empty($idAdmpm)){           $error['idAdmpm']            = 'error/No ha ingresado el id del sistema';}break;
			case 'id_pmcat':          if(empty($id_pmcat)){          $error['id_pmcat']           = 'error/No ha ingresado el id_pmcat del sistema';}break;
			case 'Direccionweb':      if(empty($Direccionweb)){      $error['Direccionweb']       = 'error/No ha ingresado la imagen';}break;
			case 'Direccionbase':     if(empty($Direccionbase)){     $error['Direccionbase']      = 'error/No ha ingresado el email';}break;
			case 'Nombre':            if(empty($Nombre)){            $error['Nombre']             = 'error/No ha ingresado la razon social';}break;
			case 'mode':              if(empty($mode)){              $error['mode']               = 'error/No ha ingresado el mode';}break;
			case 'visualizacion':     if(empty($visualizacion)){     $error['visualizacion']      = 'error/No ha ingresado la visualizacion';}break;
			
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
				$sql_usuario = mysql_query("SELECT Nombre FROM core_permisos WHERE Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['Nombre'] = 'error/El Nombre ya esta en uso';}
			

			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($id_pmcat) && $id_pmcat != ''){             $a = "'".$id_pmcat."'" ;          }else{$a ="''";}
				if(isset($Direccionweb) && $Direccionweb != ''){     $a .= ",'".$Direccionweb."'" ;    }else{$a .= ",''";}
				if(isset($Direccionbase) && $Direccionbase != ''){   $a .= ",'".$Direccionbase."'" ;   }else{$a .= ",''";}
				if(isset($Nombre) && $Nombre != ''){                 $a .= ",'".$Nombre."'" ;          }else{$a .= ",''";}
				if(isset($mode) && $mode != ''){                     $a .= ",'".$mode."'" ;            }else{$a .= ",''";}
				if(isset($visualizacion) && $visualizacion != ''){   $a .= ",'".$visualizacion."'" ;   }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `core_permisos` (id_pmcat, Direccionweb, Direccionbase, Nombre, mode, visualizacion) VALUES ({$a} )";
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
				$a = "idAdmpm='".$idAdmpm."'" ;
				if(isset($id_pmcat) && $id_pmcat != ''){            $a .= ",id_pmcat='".$id_pmcat."'" ;}
				if(isset($Direccionweb) && $Direccionweb != ''){    $a .= ",Direccionweb='".$Direccionweb."'" ;}
				if(isset($Direccionbase) && $Direccionbase != ''){  $a .= ",Direccionbase='".$Direccionbase."'" ;}
				if(isset($Nombre) && $Nombre != ''){                $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($mode) && $mode != ''){                    $a .= ",mode='".$mode."'" ;}
				if(isset($visualizacion) && $visualizacion != ''){  $a .= ",visualizacion='".$visualizacion."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `core_permisos` SET ".$a." WHERE idAdmpm = '$idAdmpm'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
							
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `core_permisos` WHERE idAdmpm = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;														
/*******************************************************************************************************************/
	}
?>