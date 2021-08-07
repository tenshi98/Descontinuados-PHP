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
$query = "SELECT imgLogo
FROM `clientes_tipos`
WHERE idTipoCliente = {$_GET['del_img']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

//Obtengo el nombre fisico del archivo
$archivo = $rowdata['imgLogo'];
//variables
$a = "idTipoCliente='".$_GET['del_img']."'" ;
$a .= ",imgLogo=''" ;

if(unlink('upload/'.$archivo)){	
		
	// actualizo los datos de registro en la db
	$query  = "UPDATE `clientes_tipos` SET ".$a." WHERE idTipoCliente = '{$_GET['del_img']}'";
	$result = mysql_query($query, $dbConn);
	//Redirijo			
	header( 'Location: '.$location.'&img_id='.$_GET['del_img'] );
	die;

}else{

	// actualizo los datos de registro en la db
	$query  = "UPDATE `clientes_tipos` SET ".$a." WHERE idTipoCliente = '{$_GET['del_img']}'";
	$result = mysql_query($query, $dbConn);
	//Redirijo				
	header( 'Location: '.$location.'&img_id='.$_GET['del_img'] );
	die;

}
    



		

			
		
	?>