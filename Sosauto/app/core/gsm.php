<?php //actualizo mi posicion en la tabla de ejecutivos para asi obtener datos mas exactos
if ($arrCliente['GSM']!=''&&$_GET['GSM']!='' ) {
	$sql = "UPDATE clientes_listado
	SET Gsm=".$_GET['Gsm']."
	WHERE idCliente='".$arrCliente['idCliente']."'";
	$resultado2 = mysql_query($sql,$dbConn);
}?>