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
	if ( !empty($_POST['idMsj_enviado']) )      $idMsj_enviado       = $_POST['idMsj_enviado'];
	if ( !empty($_POST['idUsuario']) )          $idUsuario           = $_POST['idUsuario'];
	if ( !empty($_POST['Tipo']) )               $Tipo                = $_POST['Tipo'];
	if ( !empty($_POST['Titulo']) )             $Titulo              = $_POST['Titulo'];
	if ( !empty($_POST['Mensaje']) )            $Mensaje             = $_POST['Mensaje'];
	if ( !empty($_POST['Fecha']) )              $Fecha               = $_POST['Fecha'];
	if ( !empty($_POST['Cantidad_clientes']) )  $Cantidad_clientes   = $_POST['Cantidad_clientes'];
	
	
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
			case 'idMsj_enviado':      if(empty($idMsj_enviado)){      $error['idMsj_enviado']      = 'error/No ha ingresado el id del sistema';}break;
			case 'idUsuario':          if(empty($idUsuario)){          $error['idUsuario']          = 'error/No ha ingresado el idUsuario del sistema';}break;
			case 'Tipo':               if(empty($Tipo)){               $error['Tipo']               = 'error/No ha ingresado la imagen';}break;
			case 'Titulo':             if(empty($Titulo)){             $error['Titulo']             = 'error/No ha ingresado el email';}break;
			case 'Mensaje':            if(empty($Mensaje)){            $error['Mensaje']            = 'error/No ha ingresado la razon social';}break;
			case 'Fecha':              if(empty($Fecha)){              $error['Fecha']              = 'error/No ha ingresado el Fecha';}break;
			case 'Cantidad_clientes':  if(empty($Cantidad_clientes)){  $error['Cantidad_clientes']  = 'error/No ha ingresado la Cantidad_clientes';}break;

			
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
				if(isset($idUsuario) && $idUsuario != ''){                   $a = "'".$idUsuario."'" ;             }else{$a ="''";}
				if(isset($Tipo) && $Tipo != ''){                             $a .= ",'".$Tipo."'" ;                }else{$a .= ",''";}
				if(isset($Titulo) && $Titulo != ''){                         $a .= ",'".$Titulo."'" ;              }else{$a .= ",''";}
				if(isset($Mensaje) && $Mensaje != ''){                       $a .= ",'".$Mensaje."'" ;             }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){                           $a .= ",'".$Fecha."'" ;               }else{$a .= ",''";}
				if(isset($Cantidad_clientes) && $Cantidad_clientes != ''){   $a .= ",'".$Cantidad_clientes."'" ;   }else{$a .= ",''";}
				
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `usuarios_msj_enviados` (idUsuario, Tipo, Titulo, Mensaje, Fecha, Cantidad_clientes) VALUES ({$a} )";
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
				$a = "idMsj_enviado='".$idMsj_enviado."'" ;
				if(isset($idUsuario) && $idUsuario != ''){                  $a .= ",idUsuario='".$idUsuario."'" ;}
				if(isset($Tipo) && $Tipo != ''){                            $a .= ",Tipo='".$Tipo."'" ;}
				if(isset($Titulo) && $Titulo != ''){                        $a .= ",Titulo='".$Titulo."'" ;}
				if(isset($Mensaje) && $Mensaje != ''){                      $a .= ",Mensaje='".$Mensaje."'" ;}
				if(isset($Fecha) && $Fecha != ''){                          $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Cantidad_clientes) && $Cantidad_clientes != ''){  $a .= ",Cantidad_clientes='".$Cantidad_clientes."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `usuarios_msj_enviados` SET ".$a." WHERE idMsj_enviado = '$idMsj_enviado'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `usuarios_msj_enviados` WHERE idMsj_enviado = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
						
/*******************************************************************************************************************/
	}
?>