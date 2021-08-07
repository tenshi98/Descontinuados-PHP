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
	if ( !empty($_POST['id']) )                    $id                    = $_POST['id'];
	if ( !empty($_POST['comport_espera']) )        $comport_espera   = $_POST['comport_espera'];


//Se validan los datos
	if ( empty($id) )                        $errors[1] 	  = 'error';
	if ( empty($comport_espera) )            $errors[2] 	  = 'error';

// si no hay errores ejecuto el codigo	
if ( !isset($errors[1]) && !isset($errors[2]) && !isset($errors[3])   ) {
	

	//Actualizo la vista de las alarmas
	$query  = "UPDATE `clientes_tipos` SET comport_espera='{$comport_espera}' WHERE idTipoCliente = '{$id}'";
	$result = mysql_query($query, $dbConn);

	header( 'Location: '.$location );
	die;

	
}
	?>