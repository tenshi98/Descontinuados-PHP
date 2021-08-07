<?php 
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/*  Conexion de la Base de datos  */
/**********************************/
// obtengo puntero de conexion con la db
$dbConn   = conectar_1();
$dbConn_2 = conectar_2();

// vemos si el usuario quiere desloguear
if ( !empty($_GET['salir']) ) {
	// borramos y destruimos todo tipo de sesion del usuario
	session_unset();
	session_destroy();
}

// verificamos que no este conectado el usuario
if ( !empty( $_SESSION['Rut'] ) && !empty($_SESSION['password']) ) {
	$arrCliente = esCliente( $_SESSION['Rut'], $_SESSION['password'], $dbConn );		
}
?>