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
// Se trae el listado de las noticias
$arrNoticias = array();
$query = "SELECT 
noticias_listado.idNotListado,
noticias_listado.Titulo,
noticias_listado.Fecha,
noticias_listado.Resumen
FROM `noticias_listado`
WHERE idNotCat={$_GET['filtercat']}
ORDER BY noticias_listado.Fecha DESC 
LIMIT $position, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNoticias,$row );
}
$xyz='';
$xyz.='&filtercat='.$_GET['filtercat'];
$xyz.='&filterGroup='.$_GET['filterGroup'];
$xyz.='&level_view='.$_GET['level_view'];	
//Verifico si hay datos
if ($resultado) {
    //se imprimen los datos
	foreach ($arrNoticias as $noti) {
		echo '<li>';
			echo '<h1 class="'.$config_app['noti_ul_color_tittle'].' '.$config_app['noti_ul_size_tittle'].'">';
				echo '<span class="'.$config_app['noti_ul_color_new'].' '.$config_app['noti_ul_size_new'].'">'.Fecha_completa($noti['Fecha']).'</span>  '.$noti['Titulo'].'';
			echo '</h1>';
			echo '<p class="'.$config_app['noti_ul_color_text'].' '.$config_app['noti_ul_size_text'].'">'.cortar($noti['Resumen'], 150).'</p>';

	echo '<a class="'.$config_app['btn_enlace_color_fondo'].' '.$config_app['btn_enlace_radio'].' '.$config_app['btn_enlace_color_texto'].' '.$config_app['btn_enlace_sombra'].' btn_link fright" href="list_noticias.php'.$w.'&view_noti='.$noti['idNotListado'].$xyz.'">Ver</a>';  
			
			echo '<div class="clear" style="display:inline;"></div>';		
		echo '</li>';			
	}
}

?>