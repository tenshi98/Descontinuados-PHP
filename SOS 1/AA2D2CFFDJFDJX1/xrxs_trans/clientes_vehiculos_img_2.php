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
//Se trae el nombre de la imagen a borrar
$query ="SELECT Nombre
FROM `clientes_vehiculos_img`
WHERE idImagen='{$_GET['del_img']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
//Se elimina el archivo de la carpeta
$dir='upload/';
$img_name=$row_data['Nombre'];
unlink($dir.$img_name);
//Se elimina el registro de la base de datos
$query  = "DELETE FROM `clientes_vehiculos_img` WHERE idImagen = {$_GET['del_img']}";
$result = mysql_query($query, $dbConn);	
header( 'Location: '.$location.'&imagen='.$_GET['imagen'] );
die;
?>