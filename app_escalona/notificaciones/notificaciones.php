<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
$dbConn   = conectar();
/**********************************************************************************************************************************/
/*                                  Se obtienen los datos para realizar la actualizacion                                          */
/**********************************************************************************************************************************/

//Realizo la consulta
$arrAviso = array();	
$query="SELECT 
	mensajes.Titulo,
	mensajes.Mensaje,
	mensajes.Fecha,
	mensajes.Hora
FROM mensajes 
LEFT JOIN clientes_listado ON clientes_listado.idCliente = mensajes.idCliente
WHERE clientes_listado.Imei = '{$_GET['IMEI']}'"; 
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrAviso,$row );
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head>
	<meta charset="UTF-8">	
	<title>Mensajes</title> 
	<link href="estilo.css" rel="stylesheet" type="text/css" />
	<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
</head>

<body > 

<?php foreach($arrAviso as $aviso){  ?>

<div class="msg_list" >
	<div class="msg_content_priv" >
		<table class="table_msg" >
			<tr><td width="75%" ><p><?php echo $aviso["Titulo"]; ?></p></td></tr>
			<tr><td width="75%" ><p><?php echo $aviso["Mensaje"]; ?></p></td></tr>
			<tr><td width="75%"><p><?php echo $aviso["Fecha"].' '.$aviso["Hora"]; ?></p></td></tr>
		</table>
	</div>
</div>
<?php }?>
</body>
</html>
