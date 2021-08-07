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
// se verifica si el usuario ya existe

//Validaciones de ingreso de datos obligatorios

	if ( empty($TipoMsje) )     $errors[7] 	  = '<div class="bubble">Seleccione el tipo de mensaje</div>';
	if ( empty($Depto) )    	$errors[8] 	  = '<div class="bubble">Seleccione un Departamento</div>';
	if ( empty($Fecha) )     	$errors[9] 	  = '<div class="bubble">Ingrese una fecha</div>';
	if ( empty($Detalle) )     	$errors[10]   = '<div class="bubble">Escriba un mensaje</div>';
	
	
?>