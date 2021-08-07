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
	if ( !empty($_POST['idListimg']) )  $idListimg  = $_POST['idListimg'];
	if ( !empty($_POST['idCatimg']) )   $idCatimg   = $_POST['idCatimg'];
	if ( !empty($_POST['Nombre']) )     $Nombre     = $_POST['Nombre'];
	if ( !empty($_POST['file']) )       $file       = $_POST['file'];
	
	
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
			case 'idListimg':  if(empty($idListimg)){  $error['idListimg']   = 'error/No ha ingresado el id del sistema';}break;
			case 'idCatimg':   if(empty($idCatimg)){   $error['idCatimg']    = 'error/No ha ingresado el idCatimg del sistema';}break;
			case 'Nombre':     if(empty($Nombre)){     $error['Nombre']      = 'error/No ha ingresado la imagen';}break;
			case 'file':       if(empty($file)){       $error['file']        = 'error/No ha ingresado el email';}break;
			
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
				$sql_usuario = mysql_query("SELECT Nombre FROM mnt_imagenes_listado WHERE Nombre='".$Nombre."' AND idCatimg='".$idCatimg."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['idCatimg'] = 'error/El sistema ya esta en uso';}
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idCatimg) && $idCatimg != ''){  $a = "'".$idCatimg."'" ;   }else{$a ="''";}
				if(isset($Nombre) && $Nombre != ''){      $a .= ",'".$Nombre."'" ;   }else{$a .= ",''";}
				if(isset($file) && $file != ''){          $a .= ",'".$file."'" ;     }else{$a .= ",''";}

				// inserto los datos de registro en la db
				$query  = "INSERT INTO `mnt_imagenes_listado` (idCatimg, Nombre, file) VALUES ({$a} )";
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
				$a = "idListimg='".$idListimg."'" ;
				if(isset($idCatimg) && $idCatimg != ''){   $a .= ",idCatimg='".$idCatimg."'" ;}
				if(isset($Nombre) && $Nombre != ''){       $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($file) && $file != ''){           $a .= ",file='".$file."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `mnt_imagenes_listado` SET ".$a." WHERE idListimg = '$idListimg'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `mnt_imagenes_listado` WHERE idListimg = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
							
/*******************************************************************************************************************/
	}
?>