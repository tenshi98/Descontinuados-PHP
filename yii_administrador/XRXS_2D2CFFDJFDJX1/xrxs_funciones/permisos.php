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

if($arrUsuario['tipo']!='SuperAdmin'){
	//Se consulta por las solicitudes
	$query = "SELECT 
	usuarios_permisos.level_ver,
	usuarios_permisos.level_editar,
	usuarios_permisos.level_crear,
	usuarios_permisos.level_borrar,
	core_permisos.Nombre AS nombre_transaccion
	FROM usuarios_permisos
	INNER JOIN  core_permisos ON core_permisos.idAdmpm = usuarios_permisos.idAdmpm
	WHERE core_permisos.Direccionbase ='".$original."'  AND usuarios_permisos.idUsuario='".$arrUsuario['idUsuario']."' "; 
	$resultado = mysql_query ($query, $dbConn);	
	$rowlevel = mysql_fetch_assoc ($resultado);	
	$n_permisos = mysql_num_rows($resultado);
	
	//Se verifica si tiene permisos,sino redirecciona
	if($n_permisos <= 0) {
		header( 'Location: principal.php' );
		die;		
	}
}else{
	//Se consulta por las solicitudes
	$query = "SELECT 
	core_permisos.Nombre AS nombre_transaccion
	FROM core_permisos
	WHERE core_permisos.Direccionbase ='".$original."'  "; 
	$resultado = mysql_query ($query, $dbConn);	
	$rowlevel = mysql_fetch_assoc ($resultado);
	//reseteo los permisos a full
	$rowlevel['level_ver']=1;
	$rowlevel['level_editar']=1;
	$rowlevel['level_crear']=1;
	$rowlevel['level_borrar']=1;
}

?>