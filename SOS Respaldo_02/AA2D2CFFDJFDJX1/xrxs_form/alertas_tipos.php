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
	if ( !empty($_POST['idTipoAlerta']) )  $idTipoAlerta   = $_POST['idTipoAlerta'];
	if ( !empty($_POST['idTipoBoton']) )   $idTipoBoton    = $_POST['idTipoBoton'];
	if ( !empty($_POST['Nombre']) )        $Nombre         = $_POST['Nombre'];
	if ( !empty($_POST['Mensaje']) )       $Mensaje        = $_POST['Mensaje'];
	if ( !empty($_POST['idCatimg']) )      $idCatimg       = $_POST['idCatimg'];
	if ( !empty($_POST['idListimg']) )     $idListimg      = $_POST['idListimg'];
	
	
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
			case 'idTipoAlerta': if(empty($idTipoAlerta)){  $error['idTipoAlerta']  = 'error/No ha ingresado el id del sistema';}break;
			case 'idTipoBoton':  if(empty($idTipoBoton)){   $error['idTipoBoton']   = 'error/No ha ingresado el idTipoBoton del sistema';}break;
			case 'Nombre':       if(empty($Nombre)){        $error['Nombre']        = 'error/No ha ingresado la imagen';}break;
			case 'Mensaje':      if(empty($Mensaje)){       $error['Mensaje']       = 'error/No ha ingresado el email';}break;
			case 'idCatimg':     if(empty($idCatimg)){      $error['idCatimg']      = 'error/No ha ingresado la razon social';}break;
			case 'idListimg':    if(empty($idListimg)){     $error['idListimg']     = 'error/No ha ingresado el idListimg';}break;
			
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
				$sql_usuario = mysql_query("SELECT Nombre FROM alertas_tipos WHERE idTipoBoton='".$idTipoBoton."' AND Nombre='".$Nombre."' "); 
				$n1 = mysql_num_rows($sql_usuario);
			} else {$n1=0;}
			if($n1 > 0) {$error['idTipoBoton'] = 'error/El Nombre ya esta en uso';}
			
			
			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//filtros
				if(isset($idTipoBoton) && $idTipoBoton != ''){  $a = "'".$idTipoBoton."'" ;  }else{$a ="''";}
				if(isset($Nombre) && $Nombre != ''){            $a .= ",'".$Nombre."'" ;     }else{$a .= ",''";}
				if(isset($Mensaje) && $Mensaje != ''){          $a .= ",'".$Mensaje."'" ;    }else{$a .= ",''";}
				if(isset($idCatimg) && $idCatimg != ''){        $a .= ",'".$idCatimg."'" ;   }else{$a .= ",''";}
				if(isset($idListimg) && $idListimg != ''){      $a .= ",'".$idListimg."'" ;  }else{$a .= ",''";}

				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `alertas_tipos` (idTipoBoton, Nombre, Mensaje, idCatimg, idListimg) VALUES ({$a} )";
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
				$a = "idTipoAlerta='".$idTipoAlerta."'" ;
				if(isset($idTipoBoton) && $idTipoBoton != ''){   $a .= ",idTipoBoton='".$idTipoBoton."'" ;}
				if(isset($Nombre) && $Nombre != ''){             $a .= ",Nombre='".$Nombre."'" ;}
				if(isset($Mensaje) && $Mensaje != ''){           $a .= ",Mensaje='".$Mensaje."'" ;}
				if(isset($idCatimg) && $idCatimg != ''){         $a .= ",idCatimg='".$idCatimg."'" ;}
				if(isset($idListimg) && $idListimg != ''){       $a .= ",idListimg='".$idListimg."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `alertas_tipos` SET ".$a." WHERE idTipoAlerta = '$idTipoAlerta'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
		break;	
					
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `alertas_tipos` WHERE idTipoAlerta = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>