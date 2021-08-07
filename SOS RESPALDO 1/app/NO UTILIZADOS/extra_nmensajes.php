<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_2.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>titulo</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />     
<style type="text/css">
/*<![CDATA[*/    
body {
	margin: 0px;
	padding: 0px;
}
p{
	text-align: center;
	margin: 0px;
	padding: 0px;
	color: #666;
}     
/*]]>*/

</style>
</head>
<body>
<p>
<?php 
//Mediante el Emei del equipo obtengo la cantidad de mensajes
$query ="SELECT COUNT(clientes_mensaje.idMensaje) AS n_mensajes
FROM `clientes_listado`
INNER JOIN `clientes_mensaje` ON clientes_mensaje.idRecibidor = clientes_listado.idCliente
WHERE clientes_listado.Imei='{$_GET['ID']}' AND clientes_mensaje.Leida=7";
$resultado = mysql_query ($query, $dbConn);
$row = mysql_fetch_assoc ($resultado);
echo $row['n_mensajes'] 
?>
</p>
</body>
</html>