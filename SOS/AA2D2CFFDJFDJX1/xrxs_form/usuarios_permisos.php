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
	if ( !empty($_POST['idPermisos']) )  $idPermisos  = $_POST['idPermisos'];
	if ( !empty($_POST['idUsuario']) )   $idUsuario   = $_POST['idUsuario'];
	if ( !empty($_POST['idAdmpm']) )     $idAdmpm     = $_POST['idAdmpm'];
	if ( !empty($_POST['level']) )       $level       = $_POST['level'];
	
	
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
			case 'idPermisos':  if(empty($idPermisos)){  $error['idPermisos']  = 'error/No ha ingresado el id del sistema';}break;
			case 'idUsuario':   if(empty($idUsuario)){   $error['idUsuario']   = 'error/No ha ingresado el idUsuario del sistema';}break;
			case 'idAdmpm':     if(empty($idAdmpm)){     $error['idAdmpm']     = 'error/No ha ingresado la imagen';}break;
			case 'level':       if(empty($level)){       $error['level']       = 'error/No ha ingresado el email';}break;
			
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
				if(isset($idUsuario) && $idUsuario != ''){ $a = "'".$idUsuario."'" ;  }else{$a ="''";}
				if(isset($idAdmpm) && $idAdmpm != ''){     $a .= ",'".$idAdmpm."'" ;  }else{$a .= ",''";}
				if(isset($level) && $level != ''){         $a .= ",'".$level."'" ;    }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `usuarios_permisos` (idUsuario, idAdmpm, level) VALUES ({$a} )";
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
				$a = "idPermisos='".$idPermisos."'" ;
				if(isset($idUsuario) && $idUsuario != ''){  $a .= ",idUsuario='".$idUsuario."'" ;}
				if(isset($idAdmpm) && $idAdmpm != ''){      $a .= ",idAdmpm='".$idAdmpm."'" ;}
				if(isset($level) && $level != ''){          $a .= ",level='".$level."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `usuarios_permisos` SET ".$a." WHERE idPermisos = '$idPermisos'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `usuarios_permisos` WHERE idPermisos = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;	
/*******************************************************************************************************************/
		case 'prm_add':	

			$id_usuario = $_GET['id'];
			$id_permiso = $_GET['prm_add'];
			$level      = '1';
			$query  = "INSERT INTO `usuarios_permisos` (idUsuario, idAdmpm, level) 
			VALUES ('$id_usuario','$id_permiso','$level')";
			$result = mysql_query($query, $dbConn);	

			header( 'Location: '.$location );
			die; 

		break;	
/*******************************************************************************************************************/
		case 'prm_del':	

			$id_usuario = $_GET['id'];
			$query  = "DELETE FROM `usuarios_permisos` WHERE idPermisos = {$_GET['prm_del']}";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location );
			die;

		break;	
/*******************************************************************************************************************/
		case 'perm':	

			$mod    = $_GET['mod'];
			$perm   = $_GET['perm'];
			$query  = "UPDATE usuarios_permisos SET level = '$mod'	
			WHERE idPermisos    = '$perm'";
			$result = mysql_query($query, $dbConn);

			header( 'Location: '.$location );
			die;

		break;		
						
/*******************************************************************************************************************/
	}
?>