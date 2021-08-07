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
	if ( !empty($_POST['id_Detalle']) )    $id_Detalle      = $_POST['id_Detalle'];
	if ( !empty($_POST['Nombre']) )        $Nombre          = $_POST['Nombre'];


//Se validan los datos
	if ( empty($id_Detalle) )   $errors[1] 	  = 'error';
	if ( empty($Nombre) )       $errors[2] 	  = 'error';

// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])   ) {
	

	//Actualizo la vista de las alarmas
	$query  = "UPDATE `detalle_general` SET Nombre='{$Nombre}' WHERE id_Detalle = '{$id_Detalle}'";
	$result = mysql_query($query, $dbConn);

	header( 'Location: '.$location );
	die;

	
}
	?>