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
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo1.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/iscroll-lite.js?v4"></script>
<script type="text/javascript">
	var myScroll;
	function iScrollLoad() {
		myScroll = new iScroll('wrapper');
		enableFormsInIscroll();
	}
	
	function enableFormsInIscroll(){
	  [].slice.call(document.querySelectorAll('input, select, button, textarea')).forEach(function(el){
		el.addEventListener(('ontouchstart' in window)?'touchstart':'mousedown', function(e){
		  e.stopPropagation();
		})
	  })
	}
	
	document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
	document.addEventListener('DOMContentLoaded', function () { setTimeout(iScrollLoad, 200); }, false);
</script>
<!-- InstanceBeginEditable name="doctitle" -->
<title>Vehiculos</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->


<!-- InstanceEndEditable -->
</head>

<body onload="loaded()">
<table height="100%" width="100%">
   <tr>
    <td class="head">
    <div class="item20">
	<!-- InstanceBeginEditable name="volver" -->
<a class="title_icn" href="principal_alarma.php<?php echo $w; ?>"><img src="img/icon_volver.png" /></a>       
	<!-- InstanceEndEditable --> 
    </div>
    <div class="item60"><?php require_once 'core/titulo.php';?></div>
    <div class="item20"><?php require_once 'core/compartir.php';?></div>
    </td>
  </tr>
  <tr>
    <td>
    <div id="wrapper">
	<div id="scroller">
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
    </div>
    </div>
    </td>
  </tr>
  <tr>
    <td class="foot">
    <?php require_once 'core/footer.php';?> 
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>