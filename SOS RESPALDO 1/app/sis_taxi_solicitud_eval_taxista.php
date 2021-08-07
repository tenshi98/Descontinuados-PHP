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
	if ( !empty($_POST['observaciones']) )        $observaciones        = $_POST['observaciones'];


//Se validan los datos
	if ( empty($idSolicitud) )              $errors[1] 	  = 'error';
	if ( empty($taxista_evaluacion) )       $errors[2] 	  = 'error';

// si no hay errores ejecuto el codigo	
	if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])   ) {
		
		//Reemplazo los espacios en las observaciones
		$new_observaciones =  str_replace(" ","_espaciador_",$observaciones);
		//Recojo las variables
		$xy = '';
		$xy .= $idSolicitud;
		$xy .= '3xyzxyz3'.$taxista_evaluacion;
		if(isset($observaciones) && $observaciones != ''){ 
        $xy .= '3xyzxyz3'.$new_observaciones;
        }else{
		$xy .= '3xyzxyz3sin_espaciador_observaciones';
		}

		//Ejecutamos comando dentro del servidor
		/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_taxi_2.php?mensaje= '".$xy."' &";
		$fp = shell_exec($command);*/
		
echo 'BORRAME Y ACTIVA CONSULTAS POR SERVER';
echo '===========================================================================================================================';
		//Actualizo la vista de las alarmas
		$query  = "UPDATE `solicitud_taxi_listado` SET taxista_evaluacion='{$taxista_evaluacion}' WHERE idSolicitud = '{$idSolicitud}'";
		$result = mysql_query($query, $dbConn);
echo '===========================================================================================================================';		
	
	
	
		header( 'Location: '.$location.'&idTipoAlerta='.$_GET['idTipoAlerta'] );
		die;
	
	}
?>