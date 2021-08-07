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
require_once 'core/datos_empresa.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
/**********************************************************************************************************************************/
/*                                     Redireccion en caso de no tener sesion abierta                                             */
/**********************************************************************************************************************************/
if (empty($arrCliente) ) {
	header( 'Location: login.php'.$w.'&return_to1=sis_taxi_recepcion.php' );
	die;
}
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "sis_taxi_recepcion.php".$w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
if ( !empty($_GET['canceltaxi']) )     {
	//Se envia directamente la notificacion de solicitud de taxi
	require_once 'sis_taxi_recepcion_cancelar.php';		
}
if ( !empty($_POST['submit_taxi']) )     {
	//Actualizo la ubicacion
	$location.='&idSolicitud='.$_GET['idSolicitud'];
	//Se envia directamente la notificacion de solicitud de taxi
	require_once 'sis_taxi_recepcion_aceptar_carrera.php';		
}
if ( !empty($_POST['submit_eval']) )     {
	//Se envia directamente la notificacion de solicitud de taxi
	require_once 'sis_taxi_recepcion_eval_cliente.php';		
}
if ( !empty($_GET['termviaje']) )     {
	//Actualizo la ubicacion
	$location.='&evalpasajero='.$_GET['idSolicitud'];
	//Se envia directamente la notificacion de solicitud de taxi
	require_once 'sis_taxi_recepcion_fin_viaje.php';		
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Recepcion llamada</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script src="js/jquery.min.js"></script>
<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['pasajeroinex']) ) { 
//Actualizo los datos 
$query  = "UPDATE `solicitud_taxi_listado` SET Estado='39' WHERE idSolicitud = '{$_GET['pasajeroinex']}'";
$result = mysql_query($query, $dbConn);	
//Cambia el estado del taxista a disponible
$query  = "UPDATE `clientes_listado` SET Alarma='Si', EstadoCarrera='45' WHERE idCliente = '{$arrCliente['idCliente']}'";
$result = mysql_query($query, $dbConn);
?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title1_size'].' '.$config_app['title1_color'] ?>" style="margin-top:10px;">Oferta Ausente</h1>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" >A continuación puede calificar al ofertante.</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">
      <div class="form <?php echo $config_app['form_color'] ?>">
      <form method="post">
      <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      
        <select name="pasajero_evaluacion">
          <option value="" selected="selected">Califique con una opcion</option>
          <option value="1">1 Estrella</option>
          <option value="2">2 Estrella</option>
          <option value="3">3 Estrella</option>
          <option value="4">4 Estrella</option>
          <option value="5">5 Estrella</option>
        </select> 
      </div>
      <textarea placeholder="Observacion" name="pasajero_observacion"></textarea>
      <input type="hidden"   name="idSolicitud" value="<?php echo $_GET['pasajeroinex']; ?>"  >
    
      <input type="submit"   value="Evaluar"  name="submit_eval" >
      </form>
      </div> 
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'].' '.$config_app['btn_aceptar_border']  ?> btn_link" href="<?php echo $location; ?>" >Ir al Inicio</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['evalpasajero']) ) { ?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title1_size'].' '.$config_app['title1_color'] ?>" style="margin-top:10px;">Trabajo Realizado</h1>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" >A continuación puede calificar al ofertante si lo desea.</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">
      <div class="form <?php echo $config_app['form_color'] ?>">
      <form method="post">
      <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      
        <select name="pasajero_evaluacion">
          <option value="" selected="selected">Califique con una opcion</option>
          <option value="1">1 Estrella</option>
          <option value="2">2 Estrella</option>
          <option value="3">3 Estrella</option>
          <option value="4">4 Estrella</option>
          <option value="5">5 Estrella</option>
        </select> 
      </div>
      <textarea placeholder="Observacion" name="pasajero_observacion"></textarea>
      <input type="hidden"   name="idSolicitud" value="<?php echo $_GET['evalpasajero']; ?>"  >
    
      <input type="submit"   value="Evaluar"  name="submit_eval" >
      </form>
      </div> 
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'].' '.$config_app['btn_aceptar_border']  ?> btn_link" href="<?php echo $location; ?>" >Ir al Inicio</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['pasajero']) ) { 
// Se traen los datos del taxista para mostrarlo en pantalla
$query = "SELECT  
cliente.Nombre,
cliente.Apellido_Paterno
FROM `solicitud_taxi_listado`
LEFT JOIN clientes_listado cliente ON cliente.idCliente = solicitud_taxi_listado.idCliente
WHERE solicitud_taxi_listado.idSolicitud = '{$_GET['idSolicitud']}'";
$resultado = mysql_query ($query, $dbConn);
$row_datos = mysql_fetch_assoc ($resultado);

//Verifico que las tareas del servidor estan activas
if($rowempresa['tareasServer']==1){
	$command = "/usr/bin/wget -N -q ".$rowempresa['UrlApp']."tareas_taxi_4.php?idSolicitud= '".$_GET['idSolicitud']."' &";
	$fp = shell_exec($command);
}elseif($rowempresa['tareasServer']==2){
	$query  = "UPDATE `solicitud_taxi_listado` SET Estado='43' WHERE idSolicitud = '{$_GET['idSolicitud']}'";
	$result = mysql_query($query, $dbConn);	
}
?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title1_size'].' '.$config_app['title1_color'] ?>" style="margin-top:10px;">En proceso</h1>
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Oferta de : <?php echo $row_datos['Nombre'].' '.$row_datos['Apellido_Paterno'] ?></h1>
    </td>
  </tr>	
  
  <tr height="20%">
    <td colspan="2">
   <div id="cronometro" style=" color:#CCC; font-size:150px;" class="fcenter width60"></div>
   <script>

		var inicioConteo,
		idTimeout,
		cronometro = document.querySelector("#cronometro");
		
		function zeroIzq(n){
		return n.toString().replace(/^(d)$/,"0$1");
		}
		
		function formatoSegundos(s){
		return zeroIzq(Math.floor(s%3600 / 60))+":"+zeroIzq(Math.floor((s%3600)%60));
		}
		
		function actualizar(){
		var dif = Date.now() - inicioConteo;
		dif = Math.round(dif / 1000);
		cronometro.innerHTML = formatoSegundos(dif);
		idTimeout = setTimeout(actualizar,1000);
		}
		
		function iniciar(){
		clearTimeout(idTimeout);
		inicioConteo = Date.now();
		actualizar();
		}
		
		iniciar();

</script>
    </td>
  </tr>
   <tr height="60%">
    <td colspan="2">
	<h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Tiempo invertido</h1>
    </td>
  </tr>	 
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'].' '.$config_app['btn_aceptar_border']  ?> btn_link" href="<?php echo $location.'&termviaje=true&idSolicitud='.$_GET['idSolicitud']; ?>" >Trabajo realizado</a> 
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['carreracancel2']) ) { 
// Se traen los datos de la solicitud
$query = "SELECT Hora, Hora_Cancel, minutos
FROM `solicitud_taxi_listado`
WHERE idSolicitud = '{$_GET['idSolicitud']}'";
$resultado = mysql_query ($query, $dbConn);
$row_datos = mysql_fetch_assoc ($resultado);
//Cambia el estado del taxista a disponible
$query  = "UPDATE `clientes_listado` SET Alarma='Si', EstadoCarrera='45' WHERE idCliente = '{$arrCliente['idCliente']}'";
$result = mysql_query($query, $dbConn);
?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title1_size'].' '.$config_app['title1_color'] ?>" style="margin-top:10px;">Solicitud Cancelada</h1>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" >El Cliente ha cancelado la Solicitud.</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">
    <?php 
	//Verifico si es valida la evaluacion, si efectivamente la hora de la cancelacion es superior a la hora de llegada prevista
	$diferencia=resta($row_datos['Hora'],$row_datos['Hora_Cancel']);
   if(strtotime(minutos2horas($row_datos['minutos'])) > strtotime($diferencia)){?>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" style="margin-top:10px;">Agregue una evaluacion al pasajero</h1>
      <div class="form <?php echo $config_app['form_color'] ?>">
      <form method="post">
      <h2>A Continiación pude calificar al Ciente</h2>

      <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      
        <select name="pasajero_evaluacion">
          <option value="" selected="selected">Califique con una opcion</option>
          <option value="1">1 Estrella</option>
          <option value="2">2 Estrella</option>
          <option value="3">3 Estrella</option>
          <option value="4">4 Estrella</option>
          <option value="5">5 Estrella</option>
        </select> 
      </div>
      <textarea placeholder="Observacion" name="pasajero_observacion"></textarea>
      <input type="hidden"   name="idSolicitud" value="<?php echo $_GET['idSolicitud']; ?>"  >
    
      <input type="submit"   value="Evaluar"  name="submit_eval" >
      </form>
      </div>
      <?php } ?>
      
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'].' '.$config_app['btn_aceptar_border']  ?> btn_link" href="<?php echo $location; ?>" >Ir al Inicio</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['carrera']) ) { 
// Se traen los datos de la solicitud
$query = "SELECT 
solicitud_taxi_listado.Cliente_Longitud, 
solicitud_taxi_listado.Cliente_Latitud,
solicitud_taxi_listado.Taxista_Longitud, 
solicitud_taxi_listado.Taxista_Latitud,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno

FROM `solicitud_taxi_listado`
LEFT JOIN `clientes_listado` ON clientes_listado.idCliente = solicitud_taxi_listado.idCliente
WHERE idSolicitud = '{$_GET['idSolicitud']}'";
$resultado = mysql_query ($query, $dbConn);
$row_datos = mysql_fetch_assoc ($resultado);
?>

<script type="text/javaScript">
	//Se crea la variable con valor 0 en caso de que no existan datos
	var jconsulta  = 0 ;
</script>
<div id="consulta" ></div>
<script type="text/javascript">
	function actualiza(){
		//recarga el div que esta mas arriba
		//se verifica si el cliente no ha cancelado la carrera durante la movilizacion del vehiculo
    	$("#consulta").load("sis_taxi_recepcion_consulta_2.php?idSolicitud=<?php echo $_GET['idSolicitud'] ?>");
		
		switch(jconsulta) {
			case 40:
				//Si el taxista rechaza la carrera se redirige a la pantalla correcta
				pagina="<?php echo $location.'&carreracancel2=true&idSolicitud='.$_GET['idSolicitud'] ?>"
				location.href=pagina
				break;
		} 
	}
	//llama a la funcion actualiza cada 10 segundos
	function superload(){
        setInterval( "actualiza()", 5000 ); 
    }
     
    superload();
</script>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var markers = [
            {
                "title": 'Taxista',
                "lat": '<?php echo $row_datos['Taxista_Latitud']; ?>',
                "lng": '<?php echo $row_datos['Taxista_Longitud']; ?>',
                "icon": 'img/icn/map_taxi.png'
            }
        ,
            {			
				"title": 'Cliente',
                "lat": '<?php echo $row_datos['Cliente_Latitud']; ?>',
                "lng": '<?php echo $row_datos['Cliente_Longitud']; ?>',
                "icon": 'img/icn/map_pass.png'
            }
        
    ];
    window.onload = function () {
        var mapOptions = {
            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
            zoom: 18,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
        var infoWindow = new google.maps.InfoWindow();
        var lat_lng = new Array();
        var latlngbounds = new google.maps.LatLngBounds();
        for (i = 0; i < markers.length; i++) {
            var data = markers[i]
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            lat_lng.push(myLatlng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });
			marker.setIcon(data.icon);
            latlngbounds.extend(marker.position);
            /*(function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent(data.description);
                    infoWindow.open(map, marker);
                });
            })(marker, data);*/
        }
        map.setCenter(latlngbounds.getCenter());
        map.fitBounds(latlngbounds);
 
        //***********ROUTING****************//
 
        //Initialize the Path Array
        var path = new google.maps.MVCArray();
 
        //Initialize the Direction Service
        var service = new google.maps.DirectionsService();
 
        //Set the Path Stroke Color
        var poly = new google.maps.Polyline({ map: map, strokeColor: '#4986E7' });
 
        //Loop and Draw Path Route between the Points on MAP
        for (var i = 0; i < lat_lng.length; i++) {
            if ((i + 1) < lat_lng.length) {
                var src = lat_lng[i];
                var des = lat_lng[i + 1];
                path.push(src);
                poly.setPath(path);
                service.route({
                    origin: src,
                    destination: des,
                    travelMode: google.maps.DirectionsTravelMode.DRIVING
                }, function (result, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                            path.push(result.routes[0].overview_path[i]);
                        }
                    }
                });
            }
        }
    }
</script>



<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title1_size'].' '.$config_app['title1_color'] ?>" style="margin-top:10px;">En Ruta</h1>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" >Movilizandose a <?php echo $row_datos['Nombre'].' '.$row_datos['Apellido_Paterno']; ?></h1>
    </td>
  </tr>	

  <tr height="60%">
    <td colspan="2">
    <div id="map_canvas">
		
    </div>
    </td>
  </tr>
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_otros_color_fondo'].' '.$config_app['btn_otros_ancho'].' '.$config_app['btn_otros_radio'].' '.$config_app['btn_otros_float'].' '.$config_app['btn_otros_color_texto'].' '.$config_app['btn_otros_sombra'].' '.$config_app['btn_otros_border'] ?> btn_link" href="tel:<?php echo $row_datos['Fono1']; ?>" >Llamar</a>
    </td>
   </tr>
   <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'].' '.$config_app['btn_cancelar_border'] ?> btn_link" href="<?php echo $location.'&pasajeroinex='.$_GET['idSolicitud']; ?>" >Oferta Ausente</a>
    </td>
   </tr>
    
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'].' '.$config_app['btn_aceptar_border']  ?> btn_link" href="<?php echo $location.'&pasajero=true&idSolicitud='.$_GET['idSolicitud']; ?>" >Confirmar Oferta tomada</a> 
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['carreracancel']) ) { ?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Trabajador</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">
    <div class="alert fcenter <?php echo $config_app['msg_error_color_body'].' '.$config_app['msg_error_color_text'].' '.$config_app['msg_error_width'].' '.$config_app['msg_error_border'].' '.$rowdata['msg_error_border_color'] ?>">
    <i class="fa fa-ban"></i>
    <p class="long_txt">El cliente ha cancelado la carrera por demasiada espera de respuesta.</p>
    </div> 
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'].' '.$config_app['btn_aceptar_border']  ?> btn_link" href="<?php echo $location; ?>" >Aceptar</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['carreraaceptbefore']) ) { ?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Trabajador</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">
    <div class="alert fcenter <?php echo $config_app['msg_error_color_body'].' '.$config_app['msg_error_color_text'].' '.$config_app['msg_error_width'].' '.$config_app['msg_error_border'].' '.$rowdata['msg_error_border_color'] ?>">
    <i class="fa fa-ban"></i>
    <p class="long_txt">Otro taxista acepto la carrera.</p>
    </div> 
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'].' '.$config_app['btn_aceptar_border']  ?> btn_link" href="<?php echo $location; ?>" >Aceptar</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['acepttaxi']) ) { 
// Se traen los datos de la solicitud
$query = "SELECT 
Nombre, 
Apellido_Paterno,
(SELECT AVG(pasajero_evaluacion) FROM solicitud_taxi_listado WHERE solicitud_taxi_listado.idCliente = clientes_listado.idCliente AND pasajero_evaluacion!='') AS evaluacion
FROM `clientes_listado`
WHERE idCliente = '{$_GET['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
$row_datos = mysql_fetch_assoc ($resultado);
?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Trabajador</h1>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" style="margin-top:10px;">
    	<?php echo $row_datos['Nombre'].' '.$row_datos['Apellido_Paterno']; ?>
    </h1>
    <div class="fcenter" style="width:90px; margin-top:10px;">   
    <ul class="rating 
    <?php 
	switch (ceil($row_datos['evaluacion'])) {
		case 0: echo "nostar"; break;
		case 1: echo "onestar"; break;
		case 2: echo "twostar"; break;
		case 3: echo "threestar"; break;
		case 4: echo "fourstar"; break;
		case 5: echo "fivestar"; break;
	}
	?>  
    fcenter">
        <li class="one"><a href="#" title="1 Star">1</a></li>
        <li class="two"><a href="#" title="2 Stars">2</a></li>
        <li class="three"><a href="#" title="3 Stars">3</a></li>
        <li class="four"><a href="#" title="4 Stars">4</a></li>
        <li class="five"><a href="#" title="5 Stars">5</a></li>
    </ul>
</div>
    </td>
  </tr>	 
  <tr height="80%">
    <td colspan="2">
    <div class="form <?php echo $config_app['form_color'] ?>" style="position:relative; height:100%">
      <form method="post">
    <h1>Tiempo Estimado</h1>
    <h2>Llegada a la ubicacion</h2>
      <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      
        <select name="minutos">
          <option value="" selected="selected">Seleccione una opcion</option>
          <option value="5">5 Minutos</option>
          <option value="10">10 Minutos</option>
          <option value="15">15 Minutos</option>
          <option value="20">20 Minutos</option>
          <option value="25">25 Minutos</option>
          <option value="30">mas de 30 Minutos</option>
        </select> 
      </div>
      
    <input type="hidden"   name="idSolicitud" value="<?php echo $_GET['idSolicitud']; ?>"  >
    <input type="hidden"   name="idSorteo" value="<?php echo $_GET['idSorteo']; ?>"  >
    

    <input type="submit"   value="Confirmar"  name="submit_taxi" style="bottom:0px; position:absolute;">
    </form>
</div>
    
   </td>
  </tr> 

  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'].' '.$config_app['btn_cancelar_border'] ?> btn_link" href="<?php echo $location.'&show=true&idSorteo='.$_GET['idSorteo']; ?>" >Cancelar</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['show']) ) { 
// Se traen los datos de la solicitud
$query = "SELECT 
solicitud_taxi_sorteo.idSolicitud,
clientes_listado.Nombre,
clientes_listado.Latitud,
clientes_listado.Longitud,
clientes_listado.Apellido_Paterno,
clientes_listado.Gsm,
clientes_listado.dispositivo,
clientes_listado.idCliente,
(SELECT AVG(pasajero_evaluacion) FROM solicitud_taxi_listado WHERE solicitud_taxi_listado.idCliente = solicitud_taxi_sorteo.idCliente AND pasajero_evaluacion!='') AS evaluacion
FROM `solicitud_taxi_sorteo`
LEFT JOIN clientes_listado ON clientes_listado.idCliente = solicitud_taxi_sorteo.idCliente
WHERE solicitud_taxi_sorteo.idSorteo = '{$_GET['idSorteo']}'";
$resultado = mysql_query ($query, $dbConn);
$row_datos = mysql_fetch_assoc ($resultado);

?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_datos['Latitud']; ?>, <?php echo $row_datos['Longitud']; ?>);
		  var mapOptions = {
			zoom: 15,
			scrollwheel: false,
			draggable: false,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		  var marker = new google.maps.Marker({
			  position: myLatlng,
			  map: map,
			  title:"Hello World!"
		  });	
		  marker.setIcon('img/icn/map_pass.png');	
      }  
</script>


<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Trabajador</h1>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" style="margin-top:10px;">
    	<?php echo $row_datos['Nombre'].' '.$row_datos['Apellido_Paterno']; ?>
	</h1>
    <div class="fcenter" style="width:90px; margin-top:10px;">   
    <ul class="rating 
    <?php 
	switch (ceil($row_datos['evaluacion'])) {
		case 0: echo "nostar"; break;
		case 1: echo "onestar"; break;
		case 2: echo "twostar"; break;
		case 3: echo "threestar"; break;
		case 4: echo "fourstar"; break;
		case 5: echo "fivestar"; break;
	}
	?>  
    fcenter">
        <li class="one"><a href="#" title="1 Star">1</a></li>
        <li class="two"><a href="#" title="2 Stars">2</a></li>
        <li class="three"><a href="#" title="3 Stars">3</a></li>
        <li class="four"><a href="#" title="4 Stars">4</a></li>
        <li class="five"><a href="#" title="5 Stars">5</a></li>
    </ul>
</div>
    </td>
  </tr>	
  
  <tr height="70%">
    <td colspan="2">
    <div id="map_canvas">
		<script type="text/javascript">window.onload=function(){initialize();};</script>
    </div>
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'].' '.$config_app['btn_cancelar_border'] ?> btn_link" href="<?php echo $location.'&canceltaxi=true&idSorteo='.$_GET['idSorteo']; ?>" >Ignorar</a>
    </td>
   </tr>

  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'].' '.$config_app['btn_aceptar_border']  ?> btn_link" href="<?php echo $location.'&acepttaxi=true&idSorteo='.$_GET['idSorteo'].'&idSolicitud='.$row_datos['idSolicitud'].'&Gsm_code='.$row_datos['Gsm'].'&Disp_code='.$row_datos['dispositivo'].'&idCliente='.$row_datos['idCliente']; ?>" >Aceptar</a>
  
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}else{ ?>
<script type="text/javaScript">
	//Se crea la variable con valor 0 en caso de que no existan datos
	var jconsulta  = 0 ;
</script>
<div id="consulta" ></div>
<script type="text/javascript">
	function actualiza(){
		//recarga el div que esta mas arriba
    	$("#consulta").load("sis_taxi_recepcion_consulta.php?idCliente=<?php echo $arrCliente['idCliente'] ?>");
		//redirijo
		if(jconsulta>0){
				//Si el taxista rechaza la carrera se redirige a la pantalla correcta
				pagina="<?php echo $location.'&show=true&idSorteo=' ?>"+jconsulta
				location.href=pagina
		} 
	}
	//llama a la funcion actualiza cada 10 segundos
	window.onload=function(){
		setInterval( "actualiza()", 5000 ); //multiplicas la cantidad de segundos por mil	
	};
</script>

<table class="tb_map">
  <tr height="10%">
    <td colspan="2" align="center"><img src="img/logo_taxi.png" width="40%" /></td>
  </tr>	
  <tr height="70%">
    <td colspan="2">

     <table class="tb_user">
        <tr>
            <td> 
                <div class="cover"> 
				<img src="<?php if($arrCliente['Url_imagen']!=''){ echo $arrCliente['Url_imagen'];}else{echo 'img/avatar.png';} ?>" class="<?php echo $config_app['usr_img_border'].' '.$config_app['usr_img_border_radius'].' '.$config_app['usr_img_shadow'].' '.$config_app['usr_img_width'] ?>" /> 
                      <p class="name <?php echo $config_app['usr_name_lettersize'].' '.$config_app['usr_name_lettercolor'] ?>">Bienvenido</p>
                      <p class="name_pat <?php echo $config_app['usr_name_pat_lettersize'].' '.$config_app['usr_name_pat_lettercolor'] ?>">
                      <?php echo $arrCliente['Nombre'].' '.$arrCliente['Apellido_Paterno'] ?>
                      </p>      
                </div>
            </td>
        </tr>
    </table>
    </td>
  </tr>
  
  <tr height="20%">
    <td>
    <div class="tax_footer">
    <p>ESPERANDO OFERTAS</p>
    </div>    
    </td>
  </tr> 
</table>

<?php } ?>
<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>
