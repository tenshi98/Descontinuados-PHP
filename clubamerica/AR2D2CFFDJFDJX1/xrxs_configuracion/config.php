<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
}
/**********************************/
/* Configuracion Base de la datos */
/**********************************/
//conexion a la base de datos
$dbCasting = mysql_connect("190.98.210.41","americatv","naturalphoneam");
if (!$dbCasting ){
  die('Error en la coneccion: ' . mysql_error());
}
//realizo la conexion a la base de datos
mysql_select_db("casting", $dbCasting);

$nombre_corto="Club Am&eacute;rica";
$pagina="Club Am&eacute;rica";
//$nombreurl="www.clubamerica.com";
$nombreurl="pruebas.naturalphone.cl";
$urlcorta="pruebas.naturalphone.cl/urlcorta/show.php?video=";
$correopagina="informaciones@clubamerica.com";
$concopia="marcelolopezb@gmail.com";
$denuncia="marcelolopezb@gmail.com";
$cerrarsesion="pruebas.naturalphone.cl";
$mantener="pruebas.naturalphone.cl/trans/mantiene/index.php";
$importar="pruebas.naturalphone.cl/trans/cargar/index.php";
$importar_pop="pruebas.naturalphone.cl/trans/cargar_pop/index.php";
$importar_recomendar="pruebas.naturalphone.cl/trans/cargar_recomendar/index.php";
$cerrar="cerrar.comick2call.com/desk2";
$residencia="clubamerica";
?>