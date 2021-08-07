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
$query = "SELECT Direccion_img
FROM `usuarios_listado`
WHERE idUsuario = {$arrUsuario['idUsuario']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

//Obtengo el nombre fisico del archivo
$archivo = $rowdata['Direccion_img'];
//variables
$a = "idUsuario='".$arrUsuario['idUsuario']."'" ;
$a .= ",Direccion_img=''" ;

if(unlink('upload/'.$archivo)){	
		
	// actualizo los datos de registro en la db
	$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '{$arrUsuario['idUsuario']}'";
	$result = mysql_query($query, $dbConn);
	//Redirijo			
	header( 'Location: '.$location.'?id_img=true' );
	die;

}else{

	// actualizo los datos de registro en la db
	$query  = "UPDATE `usuarios_listado` SET ".$a." WHERE idUsuario = '{$arrUsuario['idUsuario']}'";
	$result = mysql_query($query, $dbConn);
	//Redirijo				
	header( 'Location: '.$location.'?id_img=true' );
	die;

}
    



		

			
		
	?>