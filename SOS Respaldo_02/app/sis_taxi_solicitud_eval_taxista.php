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
	if ( !empty($_POST['taxista_evaluacion']) )   $taxista_evaluacion   = $_POST['taxista_evaluacion'];
	if ( !empty($_POST['taxista_observacion']) )  $taxista_observacion  = $_POST['taxista_observacion'];


//Se validan los datos
	if ( empty($idSolicitud) )              $errors[1] 	  = 'error';
	if ( empty($taxista_evaluacion) )       $errors[2] 	  = 'error';

// si no hay errores ejecuto el codigo	
	if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])   ) {
		
		//Verifico que las tareas del servidor estan activas
		if($rowempresa['tareasServer']==1){
			//Reemplazo los espacios en las observaciones
			$new_observaciones =  str_replace(" ","_espaciador_",$taxista_observacion);
			//Recojo las variables
			$xy = '';
			$xy .= $idSolicitud;
			$xy .= '3xyzxyz3'.$taxista_evaluacion;
			if(isset($taxista_observacion) && $taxista_observacion != ''){ 
				$xy .= '3xyzxyz3'.$new_observaciones;
			}else{
				$xy .= '3xyzxyz3sin_espaciador_observaciones';
			}
	
			//Ejecutamos comando dentro del servidor
			$command = "/usr/bin/wget -N -q ".$rowempresa['UrlApp']."tareas_taxi_2.php?mensaje= '".$xy."' &";
			$fp = shell_exec($command);
			
		}elseif($rowempresa['tareasServer']==2){
			//Actualizo la vista de las alarmas
			$query  = "UPDATE `solicitud_taxi_listado` SET 
			taxista_evaluacion='{$taxista_evaluacion}', 
			taxista_observacion='{$taxista_observacion}' 
			WHERE idSolicitud = '{$idSolicitud}'";
			$result = mysql_query($query, $dbConn);	
		}
		
	
		header( 'Location: '.$location.'&idTipoAlerta='.$_GET['idTipoAlerta'] );
		die;
	
	}
?>