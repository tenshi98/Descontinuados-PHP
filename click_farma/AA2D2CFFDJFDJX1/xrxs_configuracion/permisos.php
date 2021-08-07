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
	$query = "SELECT 
	usuarios_permisos.level,
	core_permisos.Nombre AS nombre_transaccion,
	IconoCat.Codigo AS IconoCategoria
	FROM usuarios_permisos

	INNER JOIN  core_permisos             ON core_permisos.idAdmpm            = usuarios_permisos.idAdmpm
	LEFT JOIN core_permisos_cat           ON core_permisos_cat.id_pmcat       = core_permisos.id_pmcat 
	LEFT JOIN `font_awesome`   IconoCat   ON IconoCat.idFont                  = core_permisos_cat.idFont

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
	core_permisos.Nombre AS nombre_transaccion,
	IconoCat.Codigo AS IconoCategoria
	FROM core_permisos
	LEFT JOIN core_permisos_cat           ON core_permisos_cat.id_pmcat     = core_permisos.id_pmcat 
	LEFT JOIN `font_awesome`   IconoCat   ON IconoCat.idFont                = core_permisos_cat.idFont
	WHERE core_permisos.Direccionbase ='".$original."'  "; 
	$resultado = mysql_query ($query, $dbConn);	
	$rowlevel = mysql_fetch_assoc ($resultado);
	//reseteo los permisos a full
	$rowlevel['level']=4;
}


?>
