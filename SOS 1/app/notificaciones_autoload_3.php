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
$group_number = filter_var($_POST["group_no_3"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
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
robos_listado.idRobo,
robos_listado.Fecha,
clientes_vehiculos.PPU AS Patente,
vehiculos_marcas.Nombre AS marca,
vehiculos_modelos.Nombre AS modelo,
color_1.Nombre AS color_base,
color_2.Nombre AS color_comp

FROM `robos_listado`
LEFT JOIN `clientes_vehiculos`            ON clientes_vehiculos.idVehiculo    = robos_listado.idVehiculo
LEFT JOIN `vehiculos_marcas`              ON vehiculos_marcas.idMarca         = clientes_vehiculos.idMarca
LEFT JOIN `vehiculos_modelos`             ON vehiculos_modelos.idModelo       = clientes_vehiculos.idModelo
LEFT JOIN `vehiculos_colores`   color_1   ON color_1.idColorV                 = clientes_vehiculos.idColorV_1
LEFT JOIN `vehiculos_colores`   color_2   ON color_2.idColorV                 = clientes_vehiculos.idColorV_2
WHERE robos_listado.idCliente={$arrCliente['idCliente']}
ORDER BY idRobo DESC
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
			echo '<h1 class="'.$config_app['noti_ul_color_tittle'].' '.$config_app['noti_ul_size_tittle'].'">';
				echo $noti['marca'].' '.$noti['modelo'].' patente '.$noti['Patente'].' color '.$noti['color_base'];
				if(isset($noti['color_comp'])&&$noti['color_comp']!=''){ echo ' con color '.$noti['color_comp'];}
			echo '</h1>';
			echo '<p class="'.$config_app['noti_ul_color_text'].' '.$config_app['noti_ul_size_text'].'"><strong>'.Fecha_completa($noti['Fecha']).'</strong> </p>';
				
	
	echo '<a class="'.$config_app['btn_enlace_color_fondo'].' '.$config_app['btn_enlace_radio'].' '.$config_app['btn_enlace_color_texto'].' '.$config_app['btn_enlace_sombra'].' btn_link fright" href="notificaciones.php'.$w.'&view_robo='.$noti['idRobo'].'">Ver</a>';  
			
			echo '<div class="clear" style="display:inline;"></div>';		
		echo '</li>';			
	}
}

?>