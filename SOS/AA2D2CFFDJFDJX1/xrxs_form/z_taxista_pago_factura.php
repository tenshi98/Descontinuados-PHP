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
	if ( !empty($_POST['idEncargado']) )     $idEncargado     = $_POST['idEncargado'];
	if ( !empty($_POST['idTaxista']) )       $idTaxista       = $_POST['idTaxista'];
	if ( !empty($_POST['Semana_pago']) )     $Semana_pago     = $_POST['Semana_pago'];
	if ( !empty($_POST['Ano_pago']) )        $Ano_pago        = $_POST['Ano_pago'];
	if ( !empty($_POST['Fecha_pago']) )      $Fecha_pago      = $_POST['Fecha_pago'];
	if ( !empty($_POST['idTipoPago']) )      $idTipoPago      = $_POST['idTipoPago'];
	if ( !empty($_POST['NDoc']) )            $NDoc            = $_POST['NDoc'];
	if ( !empty($_POST['Monto']) )           $Monto           = $_POST['Monto'];
	if ( !empty($_POST['idCliente']) )       $idCliente       = $_POST['idCliente'];
	if ( !empty($_POST['Sexo']) )            $Sexo            = $_POST['Sexo'];
	if ( !empty($_POST['idCiudad']) )        $idCiudad        = $_POST['idCiudad'];
	if ( !empty($_POST['idComuna']) )        $idComuna        = $_POST['idComuna'];
	if ( !empty($_POST['Semana']) )          $Semana          = $_POST['Semana'];
	if ( !empty($_POST['Ano']) )             $Ano             = $_POST['Ano'];
	if ( !empty($_POST['Estado']) )          $Estado          = $_POST['Estado'];
	if ( !empty($_POST['EstadoCarrera']) )   $EstadoCarrera   = $_POST['EstadoCarrera'];

	
	
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
			case 'idEncargado':   if(empty($idEncargado)){     $error['idEncargado']    = 'error/No ha ingresado el id del sistema';}break;
			case 'idTaxista':     if(empty($idTaxista)){       $error['idTaxista']      = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'Semana_pago':   if(empty($Semana_pago)){     $error['Semana_pago']    = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'Ano_pago':      if(empty($Ano_pago)){        $error['Ano_pago']       = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'Fecha_pago':    if(empty($Fecha_pago)){      $error['Fecha_pago']     = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'idTipoPago':    if(empty($idTipoPago)){      $error['idTipoPago']     = 'error/No ha seleccionado el tipo de documento de pago';}break;
			case 'NDoc':          if(empty($NDoc)){            $error['NDoc']           = 'error/No ha ingresado el numero del documento de pago';}break;
			case 'Monto':         if(empty($Monto)){           $error['Monto']          = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'idCliente':     if(empty($idCliente)){       $error['idCliente']      = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'Sexo':          if(empty($Sexo)){            $error['Sexo']           = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'idCiudad':      if(empty($idCiudad)){        $error['idCiudad']       = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'idComuna':      if(empty($idComuna)){        $error['idComuna']       = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'Semana':        if(empty($Semana)){          $error['Semana']         = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'Ano':           if(empty($Ano)){             $error['Ano']            = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'Estado':        if(empty($Estado)){          $error['Estado']         = 'error/No ha ingresado el Fecha del sistema';}break;
			case 'EstadoCarrera': if(empty($EstadoCarrera)){   $error['EstadoCarrera']  = 'error/No ha ingresado el Fecha del sistema';}break;
			
		}
	}
	
/*******************************************************************************************************************/
/*                                            Se ejecutan las instrucciones                                        */
/*******************************************************************************************************************/
	//ejecuto segun la funcion
	switch ($form_trabajo) {
/*******************************************************************************************************************/		
		case 'facturar':
		

			// si no hay errores ejecuto el codigo	
			if ( empty($error) ) {
				
				//Creo filtro para la busqueda
				$z="WHERE clientes_listado.idCliente={$_GET['facturar']} AND solicitud_taxi_listado.EstadoPago!=2";	
				if (isset($idCliente)&&$idCliente!='')           {$z .= " AND solicitud_taxi_listado.idTaxista = '".$idCliente."'" ;};      
				if (isset($Sexo)&&$Sexo!='')                     {$z .= " AND clientes_listado.Sexo = '".$Sexo."'" ;};        
				if (isset($idCiudad)&&$idCiudad!='')             {$z .= " AND clientes_listado.idCiudad = '".$idCiudad."'" ; };        
				if (isset($idComuna)&&$idComuna!='')             {$z .= " AND clientes_listado.idComuna = '".$idComuna."'" ;};        
				if (isset($Semana)&&$Semana!='')                 {$z .= " AND solicitud_taxi_listado.Semana = '".$Semana."'" ;};             
				if (isset($Ano)&&$Ano!='')                       {$z .= " AND solicitud_taxi_listado.Ano = '".$Ano."'" ; };       
				if (isset($Estado)&&$Estado!='')                 {$z .= " AND clientes_listado.Estado = '".$Estado."'" ; };        
				if (isset($EstadoCarrera)&&$EstadoCarrera!='')   {$z .= " AND solicitud_taxi_listado.Estado = '".$EstadoCarrera."'" ;}; 
	
				//Inserto los datos en la tabla de pagos
				if(isset($idEncargado)&&$idEncargado!=''){  $a = "'".$idEncargado."'" ;   }else{ $a ="''";}
				if(isset($idTaxista)&&$idTaxista!=''){      $a .= ",'".$idTaxista."'" ;   }else{ $a .=",''"; }
				if(isset($Semana_pago)&&$Semana_pago!=''){  $a .= ",'".$Semana_pago."'" ; }else{ $a .=",''"; }
				if(isset($Ano_pago)&&$Ano_pago!=''){        $a .= ",'".$Ano_pago."'" ;    }else{ $a .=",''"; }
				if(isset($Fecha_pago)&&$Fecha_pago!=''){    $a .= ",'".$Fecha_pago."'" ;  }else{ $a .=",''"; }
				if(isset($idTipoPago)&&$idTipoPago!=''){    $a .= ",'".$idTipoPago."'" ;  }else{ $a .=",''"; }
				if(isset($NDoc)&&$NDoc!=''){                $a .= ",'".$NDoc."'" ;        }else{ $a .=",''"; }
				if(isset($Monto)&&$Monto!=''){              $a .= ",'".$Monto."'" ;       }else{ $a .=",''"; }
				
				$query  = "INSERT INTO `taxista_pagos` (idEncargado, idTaxista, Semana, Ano, Fecha, idTipoPago, NDoc, Monto ) VALUES ({$a} )";
				$result = mysql_query($query, $dbConn);
				//recibo el último id generado por mi sesion
				$ultimo_id = mysql_insert_id($dbConn);	
			
				//Actualizo los datos de las carreras
					//Obtengo listado de las id de la solicitudes
					$arrPago = array();
					$query = "SELECT solicitud_taxi_listado.idSolicitud
					FROM `taxista_calendario`
					LEFT JOIN solicitud_taxi_listado ON solicitud_taxi_listado.Semana = taxista_calendario.Semana
					LEFT JOIN clientes_listado ON clientes_listado.idCliente = solicitud_taxi_listado.idTaxista
					LEFT JOIN detalle_general ON detalle_general.id_Detalle = solicitud_taxi_listado.Estado
					".$z." ";
					$resultado1 = mysql_query ($query, $dbConn);
					while ( $row = mysql_fetch_assoc ($resultado1)) {
					array_push( $arrPago,$row );
					}
					//Se actualizan los datos de las solicitudes
					foreach ($arrPago as $pago) { 
						//Filtro para idSolicitud
						$a = "idSolicitud='".$pago['idSolicitud']."'" ;
						//filtro de idDocumento
						if(isset($ultimo_id) && $ultimo_id != ''){ 
							$a .= ",idDocumento='".$ultimo_id."'" ;
						}
						//filtro de EstadoPago
							$a .= ",EstadoPago='2'" ;
						
						// inserto los datos de registro en la db
						$query  = "UPDATE `solicitud_taxi_listado` SET ".$a." WHERE idSolicitud = '{$pago['idSolicitud']}'";
						$result = mysql_query($query, $dbConn);
					}
				//Actualizo el pago del atraso	
				//Filtro para idSolicitud
				$a = "Semana='".$Semana_pago."'" ;
				$a .= ",Ano='".$Ano_pago."'" ;
				$a .= ",FechaPago='".$Fecha_pago."'" ;
				$a .= ",idTipoPago='".$idTipoPago."'" ;
				$a .= ",NDoc='".$NDoc."'" ;
				$a .= ",idDocumento='".$ultimo_id."'" ;
				$a .= ",EstadoPago='2'" ;
				
				// inserto los datos de registro en la db
				$query  = "UPDATE `taxista_bloqueos` SET ".$a." WHERE EstadoPago = '1' AND idTaxista = {$idTaxista}";
				$result = mysql_query($query, $dbConn);	
					
				//Desbloqueo al taxista	
				//Filtro para idCliente
				$a = "idCliente='".$idTaxista."'" ;
				$a .= ",Estado=1" ;
			  
				// inserto los datos de registro en la db
				$query  = "UPDATE `clientes_listado` SET ".$a." WHERE idCliente = '{$idTaxista}'";
				$result = mysql_query($query, $dbConn);
				
				header( 'Location: '.$location.'&factura='.$ultimo_id );
				die;
				
			}
	
		break;
					
						
/*******************************************************************************************************************/
	}
?>