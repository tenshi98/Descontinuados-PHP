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
//Se consulta por la totalidad de solicitudes sin leer
$query = "SELECT usuarios_permisos.level 
FROM usuarios_permisos
INNER JOIN  core_permisos ON core_permisos.idAdmpm = usuarios_permisos.idAdmpm
WHERE core_permisos.Direccionbase ='".$original."' AND core_permisos.mode='2' AND usuarios_permisos.idUsuario='".$arrUsuario['idUsuario']."' "; 
$resultado = mysql_query ($query, $dbConn);	
$rowlevel = mysql_fetch_assoc ($resultado);	
$n_permisos = mysql_num_rows($resultado);

//Se verifica si tiene permisos,sino redirecciona
if($n_permisos <= 0) {
	header( 'Location: principal.php' );
	die;		
}



?>