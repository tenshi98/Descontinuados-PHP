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

// Se obtiene el nombre del logo
$query = "SELECT file
FROM `mnt_imagenes_listado`
WHERE idListimg = {$_GET['del_img']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

//Obtengo el nombre fisico del archivo
$archivo = $rowdata['file'];
//variables
$a = "file=''" ;

if(unlink('img_upload/'.$archivo)){	
		
	// actualizo los datos de registro en la db
	$query  = "UPDATE `mnt_imagenes_listado` SET ".$a." WHERE idListimg = '{$_GET['del_img']}'";
	$result = mysql_query($query, $dbConn);
	//Redirijo			
	header( 'Location: '.$location.'&id='.$_GET['del_img'] );
	die;

}else{

	// actualizo los datos de registro en la db
	$query  = "UPDATE `mnt_imagenes_listado` SET ".$a." WHERE idListimg = '{$_GET['del_img']}'";
	$result = mysql_query($query, $dbConn);
	//Redirijo				
	header( 'Location: '.$location.'&id='.$_GET['del_img'] );
	die;

}
?>