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
	if ( !empty($_POST['idTrabajador']) )   $idTrabajador  = $_POST['idTrabajador'];
	if ( !empty($_POST['idEmpresa']) ) 	    $idEmpresa     = $_POST['idEmpresa'];
	if ( !empty($_POST['Nombre']) ) 	    $Nombre        = $_POST['Nombre'];
	if ( !empty($_POST['Telefono']) ) 	    $Telefono      = $_POST['Telefono'];
	if ( !empty($_POST['Direccion']) ) 	    $Direccion     = $_POST['Direccion'];
	if ( !empty($_POST['Cargo']) ) 	        $Cargo         = $_POST['Cargo'];
	if ( !empty($_POST['Estado']) ) 	    $Estado        = $_POST['Estado'];
	if ( !empty($_POST['cta_cte']) ) 	    $cta_cte       = $_POST['cta_cte'];	
?>