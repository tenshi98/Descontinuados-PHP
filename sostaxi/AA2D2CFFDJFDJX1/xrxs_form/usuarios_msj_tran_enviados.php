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
	if ( !empty($_POST['Mensaje']) )            $Mensaje             = $_POST['Mensaje'];
	if ( !empty($_POST['Fecha']) )              $Fecha               = $_POST['Fecha'];
	if ( !empty($_POST['Cantidad_clientes']) )  $Cantidad_clientes   = $_POST['Cantidad_clientes'];
	//Filtro
	if ( !empty($_POST['idConductor']) )        $idConductor         = $_POST['idConductor'];
	if ( !empty($_POST['idPropietario']) )      $idPropietario       = $_POST['idPropietario'];
	if ( !empty($_POST['idRecorrido']) )        $idRecorrido         = $_POST['idRecorrido'];
	if ( !empty($_POST['PPU']) )                $PPU                 = $_POST['PPU'];
	if ( !empty($_POST['idMarca']) )            $idMarca             = $_POST['idMarca'];
	if ( !empty($_POST['idModelo']) )           $idModelo            = $_POST['idModelo'];
	if ( !empty($_POST['idTransmision']) )      $idTransmision       = $_POST['idTransmision'];
	if ( !empty($_POST['idColorV_1']) )         $idColorV_1          = $_POST['idColorV_1'];
	if ( !empty($_POST['idColorV_2']) )         $idColorV_2          = $_POST['idColorV_2'];
	if ( !empty($_POST['fechaInicio']) )        $fechaInicio         = $_POST['fechaInicio'];
	if ( !empty($_POST['fechaTermino']) )       $fechaTermino        = $_POST['fechaTermino'];
	if ( !empty($_POST['N_Motor']) )            $N_Motor             = $_POST['N_Motor'];
	if ( !empty($_POST['N_Chasis']) )           $N_Chasis            = $_POST['N_Chasis'];
	
	
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
			case 'Mensaje':            if(empty($Mensaje)){            $error['Mensaje']            = 'error/No ha ingresado la razon social';}break;
			case 'Fecha':              if(empty($Fecha)){              $error['Fecha']              = 'error/No ha ingresado el Fecha';}break;
			case 'Cantidad_clientes':  if(empty($Cantidad_clientes)){  $error['Cantidad_clientes']  = 'error/No ha ingresado la Cantidad_clientes';}break;
			//Filtros
			case 'idConductor':    if(empty($idConductor)){    $error['idConductor']    = 'error/No ha ingresado la idCliente';}break;
			case 'idPropietario':  if(empty($idPropietario)){  $error['idPropietario']  = 'error/No ha ingresado la Sexo';}break;
			case 'idRecorrido':    if(empty($idRecorrido)){    $error['idRecorrido']    = 'error/No ha ingresado la idCiudad';}break;
			case 'PPU':            if(empty($PPU)){            $error['PPU']            = 'error/No ha ingresado la idComuna';}break;
			case 'idMarca':        if(empty($idMarca)){        $error['idMarca']        = 'error/No ha ingresado la rango_a';}break;
			case 'idModelo':       if(empty($idModelo)){       $error['idModelo']       = 'error/No ha ingresado la rango_b';}break;
			case 'idTransmision':  if(empty($idTransmision)){  $error['idTransmision']  = 'error/No ha ingresado la rango_b';}break;
			case 'idColorV_1':     if(empty($idColorV_1)){     $error['idColorV_1']     = 'error/No ha ingresado la rango_b';}break;
			case 'idColorV_2':     if(empty($idColorV_2)){     $error['idColorV_2']     = 'error/No ha ingresado la rango_b';}break;
			case 'fechaInicio':    if(empty($fechaInicio)){    $error['fechaInicio']    = 'error/No ha ingresado la rango_b';}break;
			case 'fechaTermino':   if(empty($fechaTermino)){   $error['fechaTermino']   = 'error/No ha ingresado la rango_b';}break;
			case 'N_Motor':        if(empty($N_Motor)){        $error['N_Motor']        = 'error/No ha ingresado la rango_b';}break;
			case 'N_Chasis':       if(empty($N_Chasis)){       $error['N_Chasis']       = 'error/No ha ingresado la rango_b';}break;

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
				if(isset($Mensaje) && $Mensaje != ''){                       $a .= ",'".$Mensaje."'" ;             }else{$a .= ",''";}
				if(isset($Fecha) && $Fecha != ''){                           $a .= ",'".$Fecha."'" ;               }else{$a .= ",''";}
				if(isset($Cantidad_clientes) && $Cantidad_clientes != ''){   $a .= ",'".$Cantidad_clientes."'" ;   }else{$a .= ",''";}
				
				// inserto los datos de registro en la db
				$query  = "INSERT INTO `usuarios_msj_tran_enviados` (idUsuario, Mensaje, Fecha, Cantidad_clientes) VALUES ({$a} )";
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
				if(isset($Mensaje) && $Mensaje != ''){                      $a .= ",Mensaje='".$Mensaje."'" ;}
				if(isset($Fecha) && $Fecha != ''){                          $a .= ",Fecha='".$Fecha."'" ;}
				if(isset($Cantidad_clientes) && $Cantidad_clientes != ''){  $a .= ",Cantidad_clientes='".$Cantidad_clientes."'" ;}
		
				// inserto los datos de registro en la db
				$query  = "UPDATE `usuarios_msj_tran_enviados` SET ".$a." WHERE idMsj_enviado = '$idMsj_enviado'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&edited=true' );
				die;
			}
		
	
		break;	
						
/*******************************************************************************************************************/
		case 'del':	

			//se borran los permisos del usuario
			$query  = "DELETE FROM `usuarios_msj_tran_enviados` WHERE idMsj_enviado = {$_GET['del']}";
			$result = mysql_query($query, $dbConn);	
						
			header( 'Location: '.$location.'&deleted=true' );
			die;

		break;							
/*******************************************************************************************************************/
		case 'filtrar':	

			//Genero el filtro
			$q = '?filter=true';
			if(isset($idConductor) && $idConductor != '')        { $q .= '&idConductor='.$idConductor ; }
			if(isset($idPropietario) && $idPropietario != '')    { $q .= '&idPropietario='.$idPropietario ; }
			if(isset($idRecorrido) && $idRecorrido != '')        { $q .= '&idRecorrido='.$idRecorrido ; }
			if(isset($PPU) && $PPU != '')                        { $q .= '&PPU='.$PPU ; }
			if(isset($idMarca) && $idMarca != '')                { $q .= '&idMarca='.$idMarca ; }
			if(isset($idModelo) && $idModelo != '')              { $q .= '&idModelo='.$idModelo ; }
			if(isset($idTransmision) && $idTransmision != '')    { $q .= '&idTransmision='.$idTransmision ; }
			if(isset($idColorV_1) && $idColorV_1 != '')          { $q .= '&idColorV_1='.$idColorV_1 ; }
			if(isset($idColorV_2) && $idColorV_2 != '')          { $q .= '&idColorV_2='.$idColorV_2 ; }
			if(isset($fechaInicio) && $fechaInicio != '')        { $q .= '&fechaInicio='.$fechaInicio ; }
			if(isset($fechaTermino) && $fechaTermino != '')      { $q .= '&fechaTermino='.$fechaTermino ; }
			if(isset($N_Motor) && $N_Motor != '')                { $q .= '&N_Motor='.$N_Motor ; }
			if(isset($N_Chasis) && $N_Chasis != '')              { $q .= '&N_Chasis='.$N_Chasis ; }

				
			header( 'Location: '.$location.$q );
			die;

		break;
/*******************************************************************************************************************/
		case 'mms':	

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
			
				//Se aplica el filtro
				$z="WHERE clientes_listado.idTipoCliente=3";	//Sistema transantiago
				$z .=" AND clientes_listado.Nombre=''";         //Otros filtros
				if (isset($_GET['PPU']) && $_GET['PPU'] != ''){                        $z .= " AND clientes_listado.PPU LIKE '%{$_GET['PPU']}%'";}
				if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {               $z .= " AND clientes_listado.N_Motor LIKE '%{$_GET['N_Motor']}%' " ;}
				if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {             $z .= " AND clientes_listado.N_Chasis LIKE '%{$_GET['N_Chasis']}%' " ;}
				if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  {       $z .= " AND clientes_listado.idConductor = '".$_GET['idConductor']."'" ;}
				if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {   $z .= " AND clientes_listado.idPropietario = '".$_GET['idPropietario']."'" ;}
				if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {       $z .= " AND clientes_listado.idRecorrido = '".$_GET['idRecorrido']."'" ;}
				if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {               $z .= " AND clientes_listado.idMarca = '".$_GET['idMarca']."'" ;}
				if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {             $z .= " AND clientes_listado.idModelo = '".$_GET['idModelo']."'" ;}
				if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {   $z .= " AND clientes_listado.idTransmision = '".$_GET['idTransmision']."'" ;}
				if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {         $z .= " AND clientes_listado.idColorV_1 = '".$_GET['idColorV_1']."'" ;}
				if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {         $z .= " AND clientes_listado.idColorV_2 = '".$_GET['idColorV_2']."'" ;}
				if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
					$z .= " AND clientes_listado.fFabricacion BETWEEN '{$_GET['fechaInicio']}' AND '{$_GET['fechaTermino']}'" ;        
				}

				//Realizo la consulta
				$arrAviso = array();	
				$query="SELECT 
				clientes_listado.idCliente
				FROM clientes_listado 
				".$z;	  
				$resultado2 = mysql_query ($query, $dbConn);
				while ( $row = mysql_fetch_assoc ($resultado2)) {
				array_push( $arrAviso,$row );
				}
				$numero = mysql_num_rows($resultado2);
				mysql_free_result($resultado2);
				//===========================================================================================================
				if ($_FILES["Mensaje"]["error"] > 0){ 
				$error['Mensaje']     = 'error/Ha ocurrido un error'; 
				} else {
				  //Se verifican las extensiones de los archivos
				  $permitidos = array("audio/x-wav", "audio/wav");
				  //Se verifica que el archivo subido no exceda los 100 kb
				  $limite_kb = 10000;
				  //Sufijo
				  $sufijo = 'tran_msn__';
				  
				  if (in_array($_FILES['Mensaje']['type'], $permitidos) && $_FILES['Mensaje']['size'] <= $limite_kb * 1024){
					//Se especifica carpeta de destino
					$ruta = "upload/".$sufijo.$_FILES['Mensaje']['name'];
					//Se verifica que el archivo un archivo con el mismo nombre no existe
					if (!file_exists($ruta)){
					  //Se mueve el archivo a la carpeta previamente configurada
					  $resultado = @move_uploaded_file($_FILES["Mensaje"]["tmp_name"], $ruta);
					  if ($resultado){
						//===========================================================================================================
						//filtros
						$a = "'".$arrUsuario['idUsuario']."'" ;
						$a .= ",'".$sufijo.$_FILES['Mensaje']['name']."'" ;
						$a .= ",'".fecha_actual()."'" ;
						$a .= ",'".$numero."'" ;
						// inserto los datos de registro en la db
						$query  = "INSERT INTO `usuarios_msj_tran_enviados` (idUsuario, Mensaje, Fecha, Cantidad_clientes) VALUES ({$a} )";
						$result = mysql_query($query, $dbConn);
						//recibo el último id generado por mi sesion
						$ultimo_id = mysql_insert_id($dbConn);
						//===========================================================================================================
							//Se envian los mensajes a quienes estan cerca
							foreach ($arrAviso as $aviso) { 
								

								//Se registra el mensaje en la tabla de mensajes
								$a = "'".$aviso['idCliente']."'" ;
								$a .= ",'".$ultimo_id."'" ;
								$a .= ",'".$idUsuario."'" ;
								$a .= ",'".fecha_actual()."'" ;
								$a .= ",'1'" ;

								$query  = "INSERT INTO `transantiago_mensaje` (idCliente, idMsj_enviado, idUsuario, Fecha, idEstado) VALUES ({$a} )";
								$result = mysql_query($query, $dbConn);
								
							}
						//===========================================================================================================
							
								//Reenvio a una nueva direccion
								header( 'Location: '.$location.'?send='.$numero );
								die;
						

					  } else {
						$error['Mensaje']     = 'error/Ocurrio un error al mover el archivo'; 
					  }
					} else {
					  $error['Mensaje']     = 'error/El archivo '.$_FILES['Mensaje']['name'].' ya existe'; 
					}
				  } else {
					$error['Mensaje']     = 'error/Esta tratando de subir un archivo no permitido o que excede el tamaño permitido'; 
				  }
				}

			}

		break;		
/*******************************************************************************************************************/
	}
?>