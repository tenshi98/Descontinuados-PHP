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
// si no hay errores ejecuto el codigo
$idempresa      = $_GET['view'];
 foreach($_POST['datos'] as $a => $n) {
	$nombre          = $n;
	$query  = "INSERT INTO `empresas_niveles` (idEmpresa, Nombre) VALUES ('$idempresa', '$nombre' )";
	$result = mysql_query($query, $dbConn);		
 }

header( 'Location: '.$location );
die; 
 
 
 ?>