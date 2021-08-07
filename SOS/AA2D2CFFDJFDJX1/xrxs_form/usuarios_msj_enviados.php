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
	//Filtro
	if ( !empty($_POST['idCliente']) )          $idCliente           = $_POST['idCliente'];
	if ( !empty($_POST['Sexo']) )               $Sexo                = $_POST['Sexo'];
	if ( !empty($_POST['idCiudad']) )           $idCiudad            = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )           $idComuna            = $_POST['idComuna'];
	if ( !empty($_POST['rango_a']) )            $rango_a             = $_POST['rango_a'];
	if ( !empty($_POST['rango_b']) )            $rango_b             = $_POST['rango_b'];
	
	
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
			//Filtros
			case 'idCliente':      if(empty($idCliente)){      $error['idCliente']   = 'error/No ha ingresado la idCliente';}break;
			case 'Sexo':           if(empty($Sexo)){           $error['Sexo']        = 'error/No ha ingresado la Sexo';}break;
			case 'idCiudad':       if(empty($idCiudad)){       $error['idCiudad']    = 'error/No ha ingresado la idCiudad';}break;
			case 'idComuna':       if(empty($idComuna)){       $error['idComuna']    = 'error/No ha ingresado la idComuna';}break;
			case 'rango_a':        if(empty($rango_a)){        $error['rango_a']     = 'error/No ha ingresado la rango_a';}break;
			case 'rango_b':        if(empty($rango_b)){        $error['rango_b']     = 'error/No ha ingresado la rango_b';}break;

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
		case 'filtrar':	

			//Genero el filtro
			$q = '?filter=true';
			if(isset($idCliente) && $idCliente != '')  { $q .= '&idCliente='.$idCliente ; }
			if(isset($Sexo) && $Sexo != '')            { $q .= '&Sexo='.$Sexo ; }
			if(isset($idCiudad) && $idCiudad != '')    { $q .= '&idCiudad='.$idCiudad ; }
			if(isset($idComuna) && $idComuna != '')    { $q .= '&idComuna='.$idComuna ; }
			if(isset($Tipo) && $Tipo != '')            { $q .= '&Tipo='.$Tipo ; }
			if(isset($rango_a) && $rango_a != '')      { $q .= '&rango_a='.$rango_a ; }
			if(isset($rango_b) && $rango_b != '')      { $q .= '&rango_b='.$rango_b ; }
			if(isset($idUsuario) && $idUsuario != '')  { $q .= '&idUsuario='.$idUsuario ; }
				
			header( 'Location: '.$location.$q );
			die;

		break;
/*******************************************************************************************************************/
		case 'mms':	

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				//Se aplica el filtro
				$z="WHERE clientes_listado.idCliente>0";
				if(isset($idCliente) && $idCliente != '')   { $z .= " AND clientes_listado.idCliente = '".$idCliente."'" ; }
				if(isset($Sexo) && $Sexo != '')             { $z .= " AND clientes_listado.Sexo = '".$Sexo."'" ;           }
				if(isset($idCiudad) && $idCiudad != '')     { $z .= " AND clientes_listado.idCiudad = '".$idCiudad."'" ;   }
				if(isset($idComuna) && $idComuna != '')     { $z .= " AND clientes_listado.idComuna = '".$idComuna."'" ;   }
				$z .= " AND clientes_listado.Gsm !=''" ;
				//Realizo la consulta
				$arrAviso = array();	
				$query="SELECT 
				clientes_listado.idCliente,
				clientes_listado.Gsm 
				FROM clientes_listado 
				".$z;	  
				$resultado2 = mysql_query ($query, $dbConn);
				while ( $row = mysql_fetch_assoc ($resultado2)) {
				array_push( $arrAviso,$row );
				}
				$numero = mysql_num_rows($resultado2);
				mysql_free_result($resultado2);
				//===========================================================================================================
				//filtros
				$a = "'".$arrUsuario['idUsuario']."'" ;
				$a .= ",'".$Tipo."'" ;
				$a .= ",'".$Titulo."'" ;
				$a .= ",'".$Mensaje."'" ;
				$a .= ",'".fecha_actual()."'" ;
				$a .= ",'".$numero."'" ;
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `usuarios_msj_enviados` (idUsuario, Tipo, Titulo, Mensaje, Fecha, Cantidad_clientes) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
				//recibo el último id generado por mi sesion
				$ultimo_id = mysql_insert_id($dbConn);
				//===========================================================================================================
					//Se envian los mensajes a quienes estan cerca
					foreach ($arrAviso as $aviso) { 
						//Envio del mensaje
						$reg_id = $aviso['Gsm'];
						switch ($Tipo) {
							case 18:  $msgx = 'Informacion : '.$Titulo;   break;
							case 19:  $msgx = 'Mensaje : '.$Titulo;       break;
							case 20:  $msgx = 'Oferta : '.$Titulo;        break;	
						}
						$message = $msgx;
						gcmnoti(  $reg_id, $message );

						//Se registra el mensaje en la tabla de mensajes
						$a = "''" ;
						$a .= ",'".$aviso['idCliente']."'" ;
						$a .= ",'".$Tipo."'" ;
						$a .= ",'".fecha_actual()."'" ;
						$a .= ",'".$ultimo_id."'" ;
						$a .= ",'7'" ;

						$query  = "INSERT INTO `clientes_mensaje` (idRobo, idRecibidor, Tipo, Fecha, idMsj_enviado, Leida) VALUES ({$a} )";
						$result = mysql_query($query, $dbConn);
					}
				//===========================================================================================================
					
						//Reenvio a una nueva direccion
						header( 'Location: '.$location.'?send='.$numero );
						die;
			
			}

		break;		
/*******************************************************************************************************************/
	}
?>