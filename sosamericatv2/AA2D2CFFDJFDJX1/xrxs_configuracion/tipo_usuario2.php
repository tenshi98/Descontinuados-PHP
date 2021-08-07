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
// verificamos que tenga la sesion iniciada
if ( empty($arrCliente) ) {
	header( 'Location: login.php'.$w );
	die;	
}?>