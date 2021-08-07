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
$location = "modusr_mis_alarmas.php";
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
<title>Mis Alarmas</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->


<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
      <div class="text_content pd_top_5">	
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['details']) ) {
// actualizo su estado a visto
$query  = "UPDATE `clientes_robos_avistado` SET vista='1' WHERE idVista='{$_GET['details']}' ";
$result = mysql_query($query, $dbConn);
// Obtengo los datos solicitados
$query = "SELECT 
clientes_robos_avistado.idVista,
clientes_robos_avistado.Fecha,
clientes_robos_avistado.Hora,
clientes_listado.Nombre AS nombre_visto,
clientes_listado.email AS email_visto,
clientes_listado.Fono1 AS fono_1,
clientes_listado.Fono2 AS fono_2,
clientes_robos_avistado.Longitud,
clientes_robos_avistado.Latitud
FROM `clientes_robos_avistado`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = clientes_robos_avistado.idCliente
WHERE clientes_robos_avistado.idVista='{$_GET['details']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);	?>
<h2>Vehiculo avistado</h2>
<h2>Datos de quien vio el vehiculo</h2>
<table class="zebra">
<?php if ($row_data['nombre_visto']!=''){ ?> <tr><td>Nombre</td></tr>        <tr><td><?php echo $row_data['nombre_visto'] ?></td></tr><?php }?>
<?php if ($row_data['Fecha']!=''){ ?>        <tr><td>Fecha - Hora</td></tr>  <tr><td><?php echo $row_data['Fecha'].'-'.$row_data['Hora'] ?></td></tr><?php }?>
<?php if ($row_data['email_visto']!=''){ ?>  <tr><td>Email</td></tr>         <tr><td><?php echo $row_data['email_visto'] ?></td></tr><?php }?> 
<?php if ($row_data['fono_1']!=''){ ?>       <tr><td>Fono fijo</td></tr>     <tr><td><?php echo $row_data['fono_1'] ?></td></tr><?php }?> 
<?php if ($row_data['fono_2']!=''){ ?>       <tr><td>Fono celular</td></tr>  <tr><td><?php echo $row_data['fono_2'] ?></td></tr><?php }?> 

</table>

<h2>Ubicacion</h2>
<table width="100%">
<tr>
    <td height="300">
    	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
		<script type="text/javascript">
          function initialize() {
              var myLatlng = new google.maps.LatLng(<?php echo $row_data['Latitud']; ?>, <?php echo $row_data['Longitud']; ?>);
              var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              }
              var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
            
              var marker = new google.maps.Marker({
                  position: myLatlng,
                  map: map,
                  title:"Hello World!"
              });		
          }  
        </script>
        <div id="map_canvas" style="width:100%; height:100%">
				<script type="text/javascript">initialize();</script>
        </div>
    </td>
</tr> 
</table> 
<div class="btn_box">
	<a href="<?php echo $location.'&view='.$_GET['view']; ?>" class="btn btn_blue">Volver</a>  
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view']) ) {
//Se traen los datos del vehiculo seleccionado
$query ="SELECT 
clientes_robos.Fecha,
clientes_robos.Longitud,
clientes_robos.Latitud,
clientes_vehiculos.PPU,
clientes_vehiculos.Marca,
clientes_vehiculos.Modelo,
clientes_vehiculos.Tipo,
clientes_vehiculos.Color_1,
clientes_vehiculos.Color_2,
clientes_vehiculos.Obs

FROM `clientes_robos`
LEFT JOIN `clientes_vehiculos` ON clientes_vehiculos.idVehiculo   = clientes_robos.idVehiculo
WHERE clientes_robos.idRobo='{$_GET['view']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);	

// Se trae un listado con todos los usuarios que han visto el vehiculo
$arrAlarmas = array();
$query = "SELECT 
clientes_robos_avistado.idVista,
clientes_robos_avistado.Fecha,
clientes_robos_avistado.Hora,
clientes_robos_avistado.vista,
clientes_listado.Nombre AS nombre_visto
FROM `clientes_robos_avistado`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = clientes_robos_avistado.idCliente
WHERE clientes_robos_avistado.idRobo='{$_GET['view']}'
ORDER BY clientes_robos_avistado.idRobo ASC";
$resultado = mysql_query ($query, $dbConn);
$row_number=mysql_num_rows($resultado);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAlarmas,$row );
} 

?>
<h2>Seguimiento de mis Alarmas</h2>
<h2>Datos del Vehiculo </h2>
<table class="zebra">
<?php if ($row_data['PPU']!=''){ ?>         <tr><td>Patente</td></tr>               <tr><td><?php echo $row_data['PPU'] ?></td></tr><?php }?>
<?php if ($row_data['Marca']!=''){ ?>       <tr><td>Marca</td></tr>                 <tr><td><?php echo $row_data['Marca'] ?></td></tr><?php }?>
<?php if ($row_data['Modelo']!=''){ ?>      <tr><td>Modelo</td></tr>                <tr><td><?php echo $row_data['Modelo'] ?></td></tr><?php }?> 
<?php if ($row_data['Tipo']!=''){ ?>        <tr><td>Tipo</td></tr>                  <tr><td><?php echo $row_data['Tipo'] ?></td></tr><?php }?> 
<?php if ($row_data['Color_1']!=''){ ?>     <tr><td>Color Base</td></tr>            <tr><td><?php echo $row_data['Color_1'] ?></td></tr><?php }?> 
<?php if ($row_data['Color_2']!=''){ ?>     <tr><td>Color Complementario</td></tr>  <tr><td><?php echo $row_data['Color_2'] ?></td></tr><?php }?> 
<?php if ($row_data['Obs']!=''){ ?>         <tr><td>Obs</td></tr>                   <tr><td><?php echo $row_data['Obs'] ?></td></tr><?php }?> 
</table>

<h2>Ubicacion del Robo </h2>
<table width="100%">
<tr>
    <td height="300">
    	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
		<script type="text/javascript">
          function initialize() {
              var myLatlng = new google.maps.LatLng(<?php echo $row_data['Latitud']; ?>, <?php echo $row_data['Longitud']; ?>);
              var mapOptions = {
                zoom: 15,
                scrollwheel: false,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              }
              var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
            
              var marker = new google.maps.Marker({
                  position: myLatlng,
                  map: map,
                  title:"Hello World!"
              });		
          }  
        </script>
        <div id="map_canvas" style="width:100%; height:100%">
				<script type="text/javascript">initialize();</script>
        </div>
    </td>
</tr> 
</table> 
 
<?php if ($row_number!=0){ ?> 
<h2 style="margin-top:25px;">Vehiculo visto por</h2>
<table class="contacto_tbl zebra">
<?php  foreach ($arrAlarmas as $alarma) { ?>
  <tr>
    <td>
    <div class="fleft">
        <p class="contacto"><?php echo $alarma['Fecha'].' - '.$alarma['Hora'] ?><?php if($alarma['vista']==0){ echo '<span class="new"> - Nueva -</span>';}?><br/>
        <?php echo $alarma['nombre_visto'] ?></p>
    </div>
    <div class="fright">
    	<a class="btn_list btn-app" href="<?php echo $location.'&view='.$_GET['view'].'&details='.$alarma['idVista']; ?>"><i class="fap fap-eye"></i> Ver </a>
    </div>
    </td>
  </tr> 
 <?php }?>  
</table> 
<?php } ?>

    
<div class="btn_box">
	<a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a>  
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
// Se trae un listado con todos los usuarios
$arrAlarmas = array();
$query = "SELECT 
clientes_robos.idRobo,
clientes_robos.Fecha,
clientes_robos.Hora,
clientes_vehiculos.Marca,
clientes_vehiculos.Modelo,
clientes_vehiculos.PPU
FROM `clientes_robos`
LEFT JOIN clientes_listado    ON clientes_listado.idCliente     = clientes_robos.idCliente
LEFT JOIN clientes_vehiculos  ON clientes_vehiculos.idVehiculo  = clientes_robos.idVehiculo
WHERE clientes_robos.idCliente = '{$arrCliente['idCliente']}'
ORDER BY clientes_robos.idRobo DESC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAlarmas,$row );
} 
$alertas = mysql_num_rows ($resultado);
?>
<h2>Mis Alarmas generadas</h2>
<table class="contacto_tbl zebra">
<?php if($alertas!=''){?>
	<?php  foreach ($arrAlarmas as $alarmas) { ?>
      <tr>
        <td>
        <div class="fleft">
            <p class="contacto"><?php echo $alarmas['Marca'].' - '.$alarmas['Modelo'].' Patente '.$alarmas['PPU'] ?><br/>
            <?php echo $alarmas['Fecha'].' - '.$alarmas['Hora'] ?></p>
        </div>
        <div class="fright">
            <a class="btn_list btn-app" href="<?php echo $location.'&view='.$alarmas['idRobo']; ?>"><i class="fap fap-eye"></i> Ver </a>
        </div>
        </td>
      </tr> 
     <?php }?> 
<?php } else { ?>   
		<tr><td>Aun no tienes ninguna alarma generada</td></tr>
<?php }?>   
</table>   
<div class="btn_box">
	<a href="principal_datos.php<?php echo $w; ?>" class="btn btn_blue">Volver</a>  
</div>        
<?php } ?>             	
      </div> 
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>