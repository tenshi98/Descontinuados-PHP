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
$location = "principal_mensajes.php";
$location .= $w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//se marca como visto
if ( !empty($_GET['vistoaqui']) )     {
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/vehiculo_visto.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/clientes_mensaje.php';
}
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
<title>Mensajes</title>
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
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['vista']) ) { ?>
<a class="title_icn" href="<?php echo $location.'&view='.$_GET['view'].'&msg='.$_GET['msg']; ?>"><img src="img/icon_volver.png" /></a>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view']) ) { ?>
<a class="title_icn" href="<?php echo $location; ?>"><img src="img/icon_volver.png" /></a>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['anuncio']) ) {?>
<a class="title_icn" href="<?php echo $location; ?>"><img src="img/icon_volver.png" /></a>
<?php } else{?> 
	<?php if($dispositivo=='android'){?>
    <a class="title_icn" onclick="MainActivity.MenuPrincipal()"><img src="img/icon_volver.png" /></a>  
    <?php } else { ?>
    <a class="title_icn" href="principal.php<?php echo $w ?>"><img src="img/icon_volver.png" /></a>
    <?php }?>
<?php }?>       
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
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($_GET['deleted'])) {?>
<div class="alert alert-success alert-dismissable" id="txf_03">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
    <p class="long_txt"><b>Alerta!</b> Mensaje eliminado correctamente.</p>
</div>
<?php }?>
<?php  if (isset($_GET['listo'])) {?>
<div class="alert alert-success alert-dismissable" id="txf_04">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">&times;</button>
    <p class="long_txt"><b>Alerta!</b> Vehiculo visto notificado.</p>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['vista']) ) { ?>
<h2>Mi Ubicacion</h2>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
    <script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $_GET['latitud']; ?>, <?php echo $_GET['longitud']; ?>);
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
<div id="map_canvas" style="width:100%; height:300px">
	<script type="text/javascript">initialize();</script>
</div>
<div class="text">
    <p>Tu ubicacion actual, si no es donde actualmente te encuentras actualiza la pantalla nuevamente</p>
</div>

<div class="btn_box">
	<a href="<?php echo $location.'&view='.$_GET['view'].'&msg='.$_GET['msg'].'&vista=true&vistoaqui=true'; ?>" class="btn btn_black">Lo vi aqui</a>
	<a href="<?php echo $location.'&view='.$_GET['view'].'&msg='.$_GET['msg']; ?>" class="btn btn_blue">Volver</a>
</div>      
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view']) ) { 
//Cambio el estado del mensaje como visto
$query  = "UPDATE `clientes_mensaje` SET Leida='8' WHERE idMensaje = '{$_GET['msg']}'";
$result = mysql_query($query, $dbConn);
//Se traen los datos del vehiculo seleccionado
$query ="SELECT 
clientes_robos.Fecha,
clientes_robos.Longitud,
clientes_robos.Latitud,
clientes_listado.Nombre,
clientes_listado.Fono1,
clientes_listado.Fono2,
clientes_vehiculos.PPU,
clientes_vehiculos.Marca,
clientes_vehiculos.Modelo,
clientes_vehiculos.Tipo,
clientes_vehiculos.Color_1,
clientes_vehiculos.Color_2,
clientes_vehiculos.Obs

FROM `clientes_robos`
INNER JOIN `clientes_listado`   ON clientes_listado.idCliente      = clientes_robos.idCliente
INNER JOIN `clientes_vehiculos` ON clientes_vehiculos.idVehiculo   = clientes_robos.idVehiculo
WHERE clientes_robos.idRobo='{$_GET['view']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);

?>

<h2>Datos de la persona </h2>
<table class="zebra">
<?php if ($row_data['Nombre']!=''){ ?>        <tr><td>Nombre</td></tr>                <tr><td><?php echo $row_data['Nombre'] ?></td></tr><?php }?>
<?php if ($row_data['Fono1']!=''){ ?>         <tr><td>Fono1</td></tr>                 <tr><td><?php echo $row_data['Fono1'] ?></td></tr><?php }?>
<?php if ($row_data['Fono2']!=''){ ?>         <tr><td>Fono2</td></tr>                 <tr><td><?php echo $row_data['Fono2'] ?></td></tr><?php }?> 
</table>

<h2>Datos del Vehiculo </h2>
<table class="zebra">
<?php if ($row_data['PPU']!=''){ ?>         <tr><td>Patente</td></tr>            <tr><td><?php echo $row_data['PPU'] ?></td></tr><?php }?>
<?php if ($row_data['Marca']!=''){ ?>       <tr><td>Marca</td></tr>              <tr><td><?php echo $row_data['Marca'] ?></td></tr><?php }?>
<?php if ($row_data['Modelo']!=''){ ?>      <tr><td>Modelo</td></tr>             <tr><td><?php echo $row_data['Modelo'] ?></td></tr><?php }?> 
<?php if ($row_data['Tipo']!=''){ ?>        <tr><td>Tipo</td></tr>               <tr><td><?php echo $row_data['Tipo'] ?></td></tr><?php }?> 
<?php if ($row_data['Color_1']!=''){ ?>     <tr><td>Color_1</td></tr>            <tr><td><?php echo $row_data['Color_1'] ?></td></tr><?php }?> 
<?php if ($row_data['Color_2']!=''){ ?>     <tr><td>Color_2</td></tr>            <tr><td><?php echo $row_data['Color_2'] ?></td></tr><?php }?> 
<?php if ($row_data['Obs']!=''){ ?>         <tr><td>Obs</td></tr>                <tr><td><?php echo $row_data['Obs'] ?></td></tr><?php }?> 
</table>

<h2>Ubicacion del robo </h2>
<table class="zebra">
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
	<a href="<?php echo $location.'&view='.$_GET['view'].'&msg='.$_GET['msg'].'&vista=true'; ?>" class="btn btn_blue2">Vista</a>
    <a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['anuncio']) ) {
//Cambio el estado del mensaje como visto
$query  = "UPDATE `clientes_mensaje` SET Leida='8' WHERE idMensaje = '{$_GET['anuncio']}'";
$result = mysql_query($query, $dbConn);
//Se traen los datos del vehiculo seleccionado
$query ="SELECT 
detalle_general.Nombre AS nombre_tipo,
usuarios_msj_enviados.Titulo,
usuarios_msj_enviados.Mensaje
FROM `clientes_mensaje`
INNER JOIN `detalle_general`         ON detalle_general.id_Detalle            = clientes_mensaje.Tipo
INNER JOIN `usuarios_msj_enviados`   ON usuarios_msj_enviados.idMsj_enviado   = clientes_mensaje.idMsj_enviado
WHERE clientes_mensaje.idMensaje='{$_GET['anuncio']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);	
	
	?>
<h2><?php echo $row_data['nombre_tipo'] ?></h2>
<table class="zebra">
        <tr><td><?php echo $row_data['Titulo'] ?></td></tr>
        <tr><td><?php echo $row_data['Mensaje'] ?></td></tr>
</table>
<div class="btn_box">
	<a href="principal_mensajes.php<?php echo $w; ?>" class="btn btn_blue">Volver</a>  
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
// Se trae el listado con todos los vehiculos
$arrMensajes = array();
$query ="SELECT 
clientes_mensaje.idMensaje, 
clientes_mensaje.idRobo,
clientes_mensaje.Fecha, 
clientes_mensaje.Leida, 
clientes_listado.Nombre,
clientes_mensaje.Tipo,
usuarios_msj_enviados.Titulo AS titulo_msj,
detalle_general.Nombre AS tipo_msj
FROM `clientes_mensaje`
LEFT JOIN `clientes_robos`          ON clientes_robos.idRobo                = clientes_mensaje.idRobo
LEFT JOIN `clientes_listado`        ON clientes_listado.idCliente           = clientes_robos.idCliente
LEFT JOIN `usuarios_msj_enviados`   ON usuarios_msj_enviados.idMsj_enviado  = clientes_mensaje.idMsj_enviado
LEFT JOIN `detalle_general`         ON detalle_general.id_Detalle           = clientes_mensaje.Tipo
WHERE idRecibidor='{$arrCliente['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrMensajes,$row );
}
mysql_free_result($resultado);	?>

<h2>Mensajes Recibidos</h2>

<table class="contacto_tbl zebra">
<?php  foreach ($arrMensajes as $mensajes) { ?>
  <tr>
    <td>
    <div class="fleft">
    	<p class="contacto fleft">
        	<?php if ($mensajes['Leida']==7){?>
            <span class="new">Nuevo</span>
            <?php } 
            if ($mensajes['Tipo']==17){ 
				echo $mensajes['Fecha'].'<br/> A '.$mensajes['Nombre'].' le han robado su vehiculo';
            } else { 
            	echo $mensajes['Fecha'].'<br/> '.$mensajes['tipo_msj'].' '.$mensajes['titulo_msj'];
            } ?>
        </p>
    </div>
    <div class="fright">
    	<?php if ($mensajes['Tipo']==17){ ?>
        <a class="btn_list btn-app" href="<?php echo $location.'&view='.$mensajes['idRobo'].'&msg='.$mensajes['idMensaje']; ?>"><i class="fap fap-eye"></i> Ver </a>
        <?php } else { ?>
        <a class="btn_list btn-app" href="<?php echo $location.'&anuncio='.$mensajes['idMensaje']; ?>"><i class="fap fap-eye"></i> Ver </a>
        <?php } ?>
        <a class="btn_list btn-app" href="<?php echo $location.'&del='.$mensajes['idMensaje']; ?>"><i class="fap fap-trash-o"></i> Elim </a>
    </div>
    </td>
  </tr> 
 <?php }?>  
</table> 
      

 <?php }?>
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