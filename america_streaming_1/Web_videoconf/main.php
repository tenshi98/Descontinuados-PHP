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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "main.php";
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                               Se cargan los formularios                                                        */
/**********************************************************************************************************************************/

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Principal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    </head>

    <body>
		<div class="register-container container">
            <div class="row">
                <div class="register span12">
                <?php //Ubico el nombre de usuario dentro de la tabla de usuarios
				$query = "SELECT Nombres, Apellidos 
				FROM `clientes_listado` 
				WHERE idCliente = '{$arrCliente['idCliente']}'";
				$resultado = mysql_query ($query, $dbConn);
				$rowdata = mysql_fetch_assoc ($resultado);
				//Ubico todas las habitaciones publicas
				$arrRooms = array();
				$query = "SELECT idRoom, Nombre, Fecha, Hora
				FROM `rooms_listado`
				WHERE Tipo = 1
				ORDER BY Nombre ASC ";
				$resultado = mysql_query ($query, $dbConn);
				while ( $row = mysql_fetch_assoc ($resultado)) {
				array_push( $arrRooms,$row );
				}
?>
                <h2>Bienvenido <?php echo $rowdata['Nombres'].' '.$rowdata['Apellidos'] ?></h2>
                <div class="span8">
                <h3>Listado de streaming disponibles</h3>
                <table class="bordered">
                    <thead>
                        <tr>
                            <th>Nombre habitacion</th>
                            <th width="120">Fecha</th>
                            <th width="120">Hora</th>
                            <th width="120">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>	
                    <?php foreach ($arrRooms as $habitaciones) { ?>
                        <tr>
                            <td><?php echo $habitaciones['Nombre']; ?></td>
                            <td><?php echo $habitaciones['Fecha']; ?></td>
                            <td><?php echo $habitaciones['Hora']; ?></td>
                            <td><a target="new" href="streaming.php<?php echo '?room='.md5($habitaciones['idRoom']).'&r='.$habitaciones['idRoom']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a></td>
                            
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                
              
                </div>
                
                
                
                
                <div class="span3">
                <a class="botonblue" href="#">Modificar mis datos</a>
                <div class="clearfix"></div>
                <a class="botonblue" href="#">Modificar mi contraseña</a>
                <div class="clearfix"></div>
                </div>
				</div>
            </div>
        </div>  
        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
    </body>
</html>