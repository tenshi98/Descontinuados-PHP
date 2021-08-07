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

	if ( empty($idCliente) )            $errors[1] 	  = '<h4 class="alert_error">No hay registro del cliente</h4>';
	if ( empty($Fecha) )                $errors[2] 	  = '<h4 class="alert_error">No hay una fecha seleccionada</h4>';
	if ( empty($Vehiculo) )             $errors[3] 	  = '<h4 class="alert_error">No ha seleccionado el tipo de vehiculo</h4>';
	if ( empty($Nombre_examinador) )    $errors[4] 	  = '<h4 class="alert_error">No ha ingresado el nombre del examinador</h4>';
    if ( empty($Nombre_escuela) )       $errors[5] 	  = '<h4 class="alert_error">No ha ingresado el nombre de la escuela</h4>';
    if ( empty($Comuna_escuela) )       $errors[6] 	  = '<h4 class="alert_error">No ha ingresado la comuna de la escuela</h4>';
		
	
	
?>