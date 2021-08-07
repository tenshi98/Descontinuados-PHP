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
preguntas_listado.idPregunta,
preguntas_listado.Pregunta,
preguntas_listado.Fecha,
(SELECT COUNT(idPregunta) FROM clientes_votos WHERE idPregunta = preguntas_listado.idPregunta AND idCliente= {$arrCliente['idCliente']} LIMIT 1 ) AS votado
FROM `preguntas_listado`
WHERE idCategorias={$_GET['filtercat']}  AND idTipoCliente='{$_GET['app_conf']}' AND Estado=2
ORDER BY preguntas_listado.Fecha DESC 
LIMIT $position, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNoticias,$row );
}
$xyz='';
if(isset($_GET['filtercat'])&&$_GET['filtercat']!=''){      $xyz.='&filtercat='.$_GET['filtercat'];	}
if(isset($_GET['filterGroup'])&&$_GET['filterGroup']!=''){  $xyz.='&filterGroup='.$_GET['filterGroup'];	}
if(isset($_GET['level_view'])&&$_GET['level_view']!=''){    $xyz.='&level_view='.$_GET['level_view'];	}	
//Verifico si hay datos
if ($resultado) {
    //se imprimen los datos
	foreach ($arrNoticias as $noti) {
		echo '<li>';
			echo noti_title('',Fecha_completa($noti['Fecha']),$config_app);
			echo noti_text('p',cortar($noti['Pregunta'], 150),$config_app);
			if($noti['votado']>0){ //Boton de redireccion, verifica si es que ha votado
				echo link_btn('enlace','list_preguntas.php'.$w.'&view_result='.$noti['idPregunta'].$xyz,'Ver Resultados','fright',$config_app);
			}else{
				echo link_btn('enlace','list_preguntas.php'.$w.'&view_noti='.$noti['idPregunta'].$xyz,'Ver','fright',$config_app);
			}
			echo '<div class="clear" style="display:inline;"></div>';		
		echo '</li>';			
	}
}

?>
