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
// obtengo puntero de conexion con la db
//$dbConn   = conectar();
/**********************************************************************************************************************************/
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/config_app.php';
require_once 'core/mobile_components.php';
?>
<h1>Favoritos</h1>
<div class="receta_content">
	<?php // verificamos que tenga la sesion iniciada
	if ( empty($arrCliente) ) {
		echo '<p>Inicia sesion para poder guardar tus favoritos</p>';	
	}else{
		//echo link_btn('enlace','enlace','Guardar Favorito','',$config_app);
		echo link_btn_java('enlace','cargar(6)','Guardar Favorito','',$config_app);
	}
	?>

</div>





