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

//Se toman los parametros
	if ( !empty($_POST['idSolicitud']) )          $idSolicitud          = $_POST['idSolicitud'];
	if ( !empty($_POST['minutos']) )              $minutos              = $_POST['minutos'];
	if ( !empty($_POST['idSorteo']) )             $idSorteo             = $_POST['idSorteo'];


//Se validan los datos
	if ( empty($idSolicitud) )              $errors[1] 	  = 'error';
	if ( empty($minutos) )                  $errors[2] 	  = 'error';
	if ( empty($idSorteo) )                 $errors[2] 	  = 'error';

// si no hay errores ejecuto el codigo	
	if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])   ) {
		
		//verifico si no ha sido aceptada la carrera por alguien mas
		$query="SELECT idCliente FROM solicitud_taxi_sorteo WHERE idSolicitud={$idSolicitud} AND Estado=2";
		$resultado = mysql_query ($query, $dbConn);
		$rownum = mysql_num_rows ($resultado);
		
		//Verifico el estado de mi solicitud
		$query="SELECT Estado FROM solicitud_taxi_sorteo WHERE idSorteo={$idSorteo} AND Estado=4 ";
		$resultado = mysql_query ($query, $dbConn);
		$rownum2 = mysql_num_rows ($resultado);
		

		//Si no ha sido aceptada se actualiza el estado con los datos de mi usuario para aceptarla
		if($rownum==0 && $rownum2==0){
			
			//Actualizo el estado del sorteo a cancelado, todos los elementos
			$query  = "UPDATE `solicitud_taxi_sorteo` SET Estado='4' WHERE idSolicitud = '{$idSolicitud}'";
			$result = mysql_query($query, $dbConn);
		
			//Actualizo el estado del sorteo
			$query  = "UPDATE `solicitud_taxi_sorteo` SET Estado='2' WHERE idSorteo = '{$idSorteo}'";
			$result = mysql_query($query, $dbConn);
			
			//Obtengo la ultima ubicacion del taxista
			$query="SELECT Latitud, Longitud FROM clientes_listado WHERE idCliente={$arrCliente['idCliente']} ";
			$resultado = mysql_query ($query, $dbConn);
			$row_data = mysql_fetch_assoc ($resultado);


			//Actualizo el estado de la solicitud
			$query  = "UPDATE `solicitud_taxi_listado` SET 
			minutos='{$minutos}', 
			Estado='41',
			idTaxista='{$arrCliente['idCliente']}',
			Taxista_Latitud='{$row_data['Latitud']}',
			Taxista_Longitud='{$row_data['Longitud']}'
			
			WHERE idSolicitud = '{$idSolicitud}'";
			$result = mysql_query($query, $dbConn);
			
			//Cambia el estado del taxista a no disponible
			$query  = "UPDATE `clientes_listado` SET Alarma='No', EstadoCarrera='46' WHERE idCliente = '{$arrCliente['idCliente']}'";
			$result = mysql_query($query, $dbConn);
					
			//Si no encuentra un taxista, redirige a la pantalla de nueva busqueda
			header( 'Location: '.$location.'&carrera=true' );
			die;
		//Si no ha sido aceptada se actualiza el estado con los datos de mi usuario para aceptarla
		}elseif($rownum2==1){
			header( 'Location: '.$location.'&carreracancel=true' );
			die;	
		//Si ha sido aceptada por alguien mas, redirijo
		}elseif($rownum=!0){
			header( 'Location: '.$location.'&carreraaceptbefore=true' );
			die;
		}

	
	}
?>