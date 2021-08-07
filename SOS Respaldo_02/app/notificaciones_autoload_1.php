<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
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
/**********************************************************************************************************************************/
/*                                                  Se ejecuta el codigo                                                          */
/**********************************************************************************************************************************/
//Cantidad de Registros por pagina
$cant_reg = $_GET['cant_reg'];
//Obtengo la paginacion y la sanitizo
$group_number = filter_var($_POST["group_no_1"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
//Verifico que la paginacion sea valida
if(!is_numeric($group_number)){
    header('HTTP/1.1 500 Invalid number!');
    exit();
}
//Obtengo la posicion actual
$position = ($group_number * $cant_reg);
// Se trae el listado de notificaciones
$arrNotificaciones = array();
$query = "SELECT 
clientes_notificaciones.Fecha,
clientes_notificaciones.idNotificacion,
clientes_notificaciones.mensaje,
alertas_tipos.Nombre AS tipo_alerta,
detalle_general.Nombre AS estado
FROM `clientes_notificaciones`
LEFT JOIN `alertas_tipos`     ON alertas_tipos.idTipoAlerta     = clientes_notificaciones.idTipoAlerta
LEFT JOIN `detalle_general`   ON detalle_general.id_Detalle     = clientes_notificaciones.Leida
WHERE idRecibidor={$arrCliente['idCliente']}
ORDER BY idNotificacion DESC
LIMIT $position, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNotificaciones,$row );
}
//Verifico si hay datos
if ($resultado) {
    //se imprimen los datos
	foreach ($arrNotificaciones as $noti) {
		echo '<li>';
			echo '<h1 class="'.$config_app['noti_ul_color_tittle'].' '.$config_app['noti_ul_size_tittle'].'">';
				echo '<span class="'.$config_app['noti_ul_color_new'].' '.$config_app['noti_ul_size_new'].'">'.$noti['estado'].'</span>  '.$noti['tipo_alerta'].'';
			echo '</h1>';
			echo '<p class="'.$config_app['noti_ul_color_text'].' '.$config_app['noti_ul_size_text'].'"><strong>'.Fecha_completa($noti['Fecha']).'</strong> - '.cortar($noti['mensaje'], 150).'</p>';
						
echo '<table>';
  echo '<tr height="32px">';
    echo '<td width="70%">';
   echo '<a class="'.$config_app['noti_btn_acept_bgcolor'].' '.$config_app['noti_btn_acept_textcolor'].' '.$config_app['noti_btn_acept_textsize'].' btn_link"  href="notificaciones.php'.$w.'&view_noti='.$noti['idNotificacion'].'">';
   		echo '<i class="fa fa-eye"></i>  Ver';
   echo '</a>'; 
    echo '</td>';
    echo '<td width="30%">';
    echo '<a  class="'.$config_app['noti_btn_cancel_bgcolor'].' '.$config_app['noti_btn_cancel_textcolor'].' '.$config_app['noti_btn_cancel_textsize'].' btn_link" href="notificaciones.php'.$w.'&del_noti='.$noti['idNotificacion'].'">';
    	echo '<i class="fa fa-times"></i>  Borrar';
    echo '</a>';
    echo '</td>';
  echo '</tr>';
echo '</table>';
			
				
		echo '</li>';			
	}
}

?>