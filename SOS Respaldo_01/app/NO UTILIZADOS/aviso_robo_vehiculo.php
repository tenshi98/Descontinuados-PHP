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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "aviso_robo_vehiculo.php";
$location .= $w;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Vehiculos</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->


<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<div class="text_content pd_top_5">

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
// Se trae el listado con todos los vehiculos
$arrVehiculos = array();
$query ="SELECT 
clientes_vehiculos.idVehiculo, 
clientes_vehiculos.PPU, 
clientes_vehiculos.Marca, 
clientes_vehiculos.Modelo,
(SELECT Nombre FROM clientes_vehiculos_img WHERE idVehiculo = clientes_vehiculos.idVehiculo LIMIT 1 ) AS imagen
FROM `clientes_vehiculos`
WHERE idCliente='{$arrCliente['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVehiculos,$row );
}
mysql_free_result($resultado);	?>
<h2>Mis Vehiculos</h2>

<?php  foreach ($arrVehiculos as $vehiculos) { ?>
    <a class="list vehicle" href="<?php echo 'aviso_robo.php'.$w.'&vehiculo='.$vehiculos['idVehiculo']; ?>">
        <div class="img_vehiculo">
        	<?php if($vehiculos['imagen']==''){?>
            <img src="img/vehiculo.jpg"  />
            <?php }else{?>
            <img src="upload/<?php echo $vehiculos['imagen']; ?>"  />
            <?php }?>
        </div>
        <span><?php echo $vehiculos['Marca'].'   '.$vehiculos['Modelo'] ?></span>
        <br/>Patente : <?php echo $vehiculos['PPU']; ?>
    </a>
 <?php }?>       
 <div class="btn_box">
    <a href="principal_alarma.php<?php echo $w; ?>" class="btn btn_blue">Volver</a>
 </div>

</div> 
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>