<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*     Ejecucion del Codigo       */
/**********************************/
//Traspaso de valores input a variables
	//Datos del pago
	if ( !empty($_POST['idEncargado']) )    $idEncargado   = $_POST['idEncargado'];
	if ( !empty($_POST['idTaxista']) )      $idTaxista     = $_POST['idTaxista'];
	if ( !empty($_POST['Semana_pago']) )    $Semana_pago   = $_POST['Semana_pago'];
	if ( !empty($_POST['Ano_pago']) )       $Ano_pago      = $_POST['Ano_pago'];
	if ( !empty($_POST['Fecha_pago']) )     $Fecha_pago    = $_POST['Fecha_pago'];
	if ( !empty($_POST['idTipoPago']) )     $idTipoPago    = $_POST['idTipoPago'];
	if ( !empty($_POST['NDoc']) )           $NDoc          = $_POST['NDoc'];
	if ( !empty($_POST['Monto']) )          $Monto         = $_POST['Monto'];
	
	//actualizacion de las carreras para evitar que aparezcan en los filtros
		//Doy ubicaciones
		$z="WHERE clientes_listado.idCliente={$_GET['facturar']} AND solicitud_taxi_listado.EstadoPago!=2";	
	if ( !empty($_POST['idCliente']) )       {$z .= " AND solicitud_taxi_listado.idTaxista = '".$_POST['idCliente']."'" ;};      
	if ( !empty($_POST['Sexo']) )            {$z .= " AND clientes_listado.Sexo = '".$_POST['Sexo']."'" ;};        
	if ( !empty($_POST['idCiudad']) )        {$z .= " AND clientes_listado.idCiudad = '".$_POST['idCiudad']."'" ; };        
	if ( !empty($_POST['idComuna']) )        {$z .= " AND clientes_listado.idComuna = '".$_POST['idComuna']."'" ;};        
	if ( !empty($_POST['Semana']) )          {$z .= " AND solicitud_taxi_listado.Semana = '".$_POST['Semana']."'" ;};             
	if ( !empty($_POST['Ano']) )             {$z .= " AND solicitud_taxi_listado.Ano = '".$_POST['Ano']."'" ; };       
	if ( !empty($_POST['Estado']) )          {$z .= " AND clientes_listado.Estado = '".$_POST['Estado']."'" ; };        
	if ( !empty($_POST['EstadoCarrera']) )   {$z .= " AND solicitud_taxi_listado.Estado = '".$_POST['EstadoCarrera']."'" ;};       

	//Generacion de errores en caso de no haber llenado algun dato
	//Valida la seleccion del tipo de pago
	if ( empty($idTipoPago) )      $errors[1] 	  = '
	<div id="txf_01" class="alert_error">  
	  	No ha seleccionado el tipo de documento de pago
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	//Valida el ingreso del numero del documento
	if ( empty($NDoc) )      $errors[2] 	  = '
	<div id="txf_02" class="alert_error">  
	  	No ha ingresado el numero del documento de pago
		<a class="closed_b" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">
			<i class="fa fa-times"></i>
		</a>
	</div>';
	
	// si no hay errores ejecuto el codigo	
	if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3]) && !isset($errors[4])     ) { 
	
		//Inserto los datos en la tabla de pagos
		if(isset($idEncargado) && $idEncargado != ''){  $a = "'".$idEncargado."'" ;}else{$a ="''";}
		if(isset($idTaxista) && $idTaxista != ''){      $a .= ",'".$idTaxista."'" ; }else{ $a .=",''"; }
		if(isset($Semana_pago) && $Semana_pago != ''){  $a .= ",'".$Semana_pago."'" ; }else{ $a .=",''"; }
		if(isset($Ano_pago) && $Ano_pago != ''){        $a .= ",'".$Ano_pago."'" ; }else{ $a .=",''"; }
		if(isset($Fecha_pago) && $Fecha_pago != ''){    $a .= ",'".$Fecha_pago."'" ; }else{ $a .=",''"; }
		if(isset($idTipoPago) && $idTipoPago != ''){    $a .= ",'".$idTipoPago."'" ; }else{ $a .=",''"; }
		if(isset($NDoc) && $NDoc != ''){                $a .= ",'".$NDoc."'" ; }else{ $a .=",''"; }
		if(isset($Monto) && $Monto != ''){              $a .= ",'".$Monto."'" ; }else{ $a .=",''"; }
	
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
			
	}

		header( 'Location: '.$location.'?factura='.$ultimo_id );
		die;
?>