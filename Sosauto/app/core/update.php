<?php
/**********************************/
/*       Bloque de seguridad      */
/**********************************/
if( ! defined('XMBCXRXSKGC')) {
    die('No tienes acceso a esta carpeta o archivo.');
} 
/**********************************************************************************************************************************/
/*                                       Se cargan las variables URL para reutilizarlas                                           */
/**********************************************************************************************************************************/
//actualizo mi posicion en la tabla de ejecutivos para asi obtener datos mas exactos
if ($_GET['longitud']!='' && $_GET['longitud']!=0 && $_GET['longitud']!='0.0') {
	$sql = "UPDATE clientes_listado
	SET Longitud=".$_GET['longitud'].", Latitud=".$_GET['latitud']."
	WHERE idCliente='".$arrCliente['idCliente']."'";
	$resultado2 = mysql_query($sql,$dbConn);
}
?>