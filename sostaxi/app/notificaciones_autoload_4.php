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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once 'core/config_app.php';
require_once 'core/mobile_components.php';
/**********************************************************************************************************************************/
/*                                                  Se ejecuta el codigo                                                          */
/**********************************************************************************************************************************/
//Cantidad de Registros por pagina
$cant_reg = $_GET['cant_reg'];
//Obtengo la paginacion y la sanitizo
$group_number = filter_var($_POST["group_no_4"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
//Verifico que la paginacion sea valida
if(!is_numeric($group_number)){
    header('HTTP/1.1 500 Invalid number!');
    exit();
}
//Obtengo la posicion actual
$position = ($group_number * $cant_reg);
// Se trae el listado de notificaciones
$arrRobos = array();
$query = "SELECT 
solicitud_taxi_listado.idSolicitud,
solicitud_taxi_listado.Fecha,
solicitud_taxi_listado.Hora,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno

FROM `solicitud_taxi_listado`
LEFT JOIN `clientes_listado`            ON clientes_listado.idCliente    = solicitud_taxi_listado.idTaxista
WHERE solicitud_taxi_listado.idCliente = {$arrCliente['idCliente']} AND solicitud_taxi_listado.Estado = 44

ORDER BY idSolicitud DESC
LIMIT $position, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRobos,$row );
}
//Verifico si hay datos
if ($resultado) {
    //se imprimen los datos
	foreach ($arrRobos as $noti) {
		echo '<li>';
			echo noti_title($noti['Nombre'].' '.$noti['Apellido_Paterno'],'',$config_app);
			echo noti_text('p','<strong>'.Fecha_completa($noti['Fecha']).'</strong>'.$noti['Hora'].'hrs',$config_app);			
			echo '<table>';
				echo '<tr height="32px">';
					echo '<td width="70%"></td>'; 
					echo '<td width="30%">';
						echo table_btn('acept','fa-eye','notificaciones.php'.$w.'&view_carrera='.$noti['idSolicitud'],'Ver','',$config_app); 
					echo '</td>';
				echo '</tr>';
			echo '</table>';
		echo '</li>';
					
	}
}

?>