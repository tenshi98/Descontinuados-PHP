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
	// completamos la variable error si es necesario
	if ( empty($Nombre_art) ) 	   $errors[1] 		= '<span class="error">'.errores(43).'</span>';
	if ( empty($idTipo_prod) ) 	   $errors[2] 		= '<span class="error">'.errores(44).'</span>';
	if ( empty($idCat_prod) ) 	   $errors[3] 		= '<span class="error">'.errores(45).'</span>';
	if ( empty($idUml) ) 	       $errors[4] 		= '<span class="error">'.errores(46).'</span>';
	if ( empty($Cap_grad_min) )    $errors[5] 		= '<span class="error">'.errores(47).'</span>';
	if ( empty($idEmbalaje) ) 	   $errors[6] 		= '<span class="error">'.errores(48).'</span>';
	if ( empty($Marca) ) 	       $errors[7] 		= '<span class="error">'.errores(49).'</span>';
	
?>