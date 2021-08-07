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
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
$dbConn   = conectar();
/**********************************************************************************************************************************/
/*                                   Identifico quien envio la alerta y obtengo sus datos                                         */
/**********************************************************************************************************************************/
// Se trae el mensaje
$arrPosiciones = array();
$query = "SELECT  
usuarios_msj_tran_enviados.Mensaje,
transantiago_mensaje.idMensaje
FROM `transantiago_mensaje`
LEFT JOIN `usuarios_msj_tran_enviados` ON usuarios_msj_tran_enviados.idMsj_enviado = transantiago_mensaje.idMsj_enviado
WHERE transantiago_mensaje.idCliente={$_GET['idCliente']} AND transantiago_mensaje.idEstado=1 ";
$resultado1 = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado1);
$numero = mysql_num_rows($resultado1);
//en caso de que exista un mensaje se actualiza su estado a visto
if(isset($numero)&&$numero!=0&&$numero!=''){
	$query  = "UPDATE `transantiago_mensaje` SET  idEstado=2 WHERE idMensaje = '{$rowdata['idMensaje']}'";
	$result = mysql_query($query, $dbConn);
	
	echo '	<audio controls autoplay>
				<source src="http://190.98.210.36/sostaxi/administracion/upload/'.$rowdata['Mensaje'].'" type="audio/wav">
				Your browser does not support the audio tag.
			</audio> 
	';
	//echo '<iframe src="http://api.naturalreaders.com/v2/tts/?t='.$rowdata['Mensaje'].'&r=20&s=1&requesttoken=94915205a0694935365652d97917b7ef"></iframe>';

	
}

?>
  