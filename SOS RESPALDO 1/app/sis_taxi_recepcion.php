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
	$location.='&carrera=true';
	$location.='&idSolicitud='.$_GET['idSolicitud'];
	//Se envia directamente la notificacion de solicitud de taxi
	require_once 'sis_taxi_recepcion_aceptar_carrera.php';		
}
if ( !empty($_POST['submit_eval']) )     {
	//Se envia directamente la notificacion de solicitud de taxi
	require_once 'sis_taxi_recepcion_eval_cliente.php';		
}
if ( !empty($_GET['termviaje']) )     {
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
if ( ! empty($_GET['pasajero']) ) { 
//Actualizo el estado
echo 'BORRAME Y ACTIVA CONSULTAS POR SERVER';
echo '===========================================================================================================================';
$query  = "UPDATE `solicitud_taxi_listado` SET Estado='43' WHERE idSolicitud = '{$_GET['idSolicitud']}'";
$result = mysql_query($query, $dbConn);
/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_taxi_4.php?idSolicitud= '".$_GET['idSolicitud']."' &";
$fp = shell_exec($command);*/
?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Taxi</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">
    <div class="alert fcenter <?php echo $config_app['msg_info_color_body'].' '.$config_app['msg_info_color_text'].' '.$config_app['msg_info_width'].' '.$config_app['msg_info_border'] ?>">
    <i class="fa fa-info"></i>
    <p class="long_txt">Movilizando Pasajero.</p>
    </div>
    </td>
  </tr>  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location.'&termviaje=true&idSolicitud='.$_GET['idSolicitud']; ?>" >Confirmar Pasajero bajado</a> 
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
?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Taxi</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">
    <div class="alert fcenter <?php echo $config_app['msg_error_color_body'].' '.$config_app['msg_error_color_text'].' '.$config_app['msg_error_width'].' '.$config_app['msg_error_border'] ?>">
    <i class="fa fa-ban"></i>
    <p class="long_txt">El cliente ha cancelado la carrera.</p>
    </div>
    <?php 
	//Verifico si es valida la evaluacion, si efectivamente la hora de la cancelacion es superior a la hora de llegada prevista
	$diferencia=resta($row_datos['Hora'],$row_datos['Hora_Cancel']);
   if(strtotime(minutos2horas($row_datos['minutos'])) > strtotime($diferencia)){?>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" style="margin-top:10px;">Agregue una evaluacion al cliente</h1>
      <div class="form <?php echo $config_app['form_color'] ?>">
      <form method="post">
      <h1>Evaluar</h1>

      <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      
        <select name="pasajero_evaluacion">
          <option value="" selected="selected">Seleccione una opcion</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select> 
      </div>
      <textarea placeholder="Observacion" name="observaciones"></textarea>
      <input type="hidden"   name="idSolicitud" value="<?php echo $_GET['idSolicitud']; ?>"  >
    
      <input type="submit"   value="Evaluar"  name="submit_eval" >
      </form>
      </div>
      <?php } ?>
      
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location; ?>" >Aceptar</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['carrera']) ) { 
// Se traen los datos de la solicitud
$query = "SELECT Cliente_Longitud, Cliente_Latitud
FROM `solicitud_taxi_listado`
WHERE idSolicitud = '{$_GET['idSolicitud']}'";
$resultado = mysql_query ($query, $dbConn);
$row_datos = mysql_fetch_assoc ($resultado);
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_datos['Cliente_Latitud']; ?>, <?php echo $row_datos['Cliente_Longitud']; ?>);
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
      }  
</script>
<script type="text/javaScript">
	//Se crea la variable con valor 0 en caso de que no existan datos
	var jconsulta  = 0 ;
</script>
<div id="consulta" ></div>
<script type="text/javascript">

	function actualiza(){
		//recarga el div que esta mas arriba
    	$("#consulta").load("sis_taxi_solicitud_consulta.php?idSolicitud=<?php echo $_GET['idSolicitud'] ?>");
		switch(jconsulta) {
			case 40:
				//Si el taxista rechaza la carrera se redirige a la pantalla correcta
				pagina="<?php echo $location.'&carreracancel2=true&idSolicitud='.$_GET['idSolicitud'] ?>"
				location.href=pagina
				break;
		} 
	}

	 function superload(){
        setInterval( "actualiza()", 5000 ); 
    }
     
    superload();
</script>

<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Taxi</h1>
    </td>
  </tr>	
  <tr height="10%">
    <td colspan="2">
    <div class="alert fcenter <?php echo $config_app['msg_info_color_body'].' '.$config_app['msg_info_color_text'].' '.$config_app['msg_info_width'].' '.$config_app['msg_info_border'] ?>">
    <i class="fa fa-info"></i>
    <p class="long_txt">Movilizandose al destino.</p>
    </div>
    </td>
  </tr>
  <tr height="60%">
    <td colspan="2">
    <div id="map_canvas">
		<script type="text/javascript">window.onload=function(){initialize();};</script>
    </div>
    </td>
  </tr>
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_otros_color_fondo'].' '.$config_app['btn_otros_ancho'].' '.$config_app['btn_otros_radio'].' '.$config_app['btn_otros_float'].' '.$config_app['btn_otros_color_texto'].' '.$config_app['btn_otros_sombra'] ?> btn_link" href="tel:<?php echo $row_datos['Fono1']; ?>" >Llamar</a>
    </td>
   </tr>
    
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location.'&pasajero=true&idSolicitud='.$_GET['idSolicitud']; ?>" >Confirmar Pasajero tomado</a> 
    </td>
  </tr>
</table>


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['carreracancel']) ) { ?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Taxi</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">
    <div class="alert fcenter <?php echo $config_app['msg_error_color_body'].' '.$config_app['msg_error_color_text'].' '.$config_app['msg_error_width'].' '.$config_app['msg_error_border'] ?>">
    <i class="fa fa-ban"></i>
    <p class="long_txt">El cliente ha cancelado la carrera por demasiada espera de respuesta.</p>
    </div> 
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location; ?>" >Aceptar</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['acepttaxi']) ) { 
// Se traen los datos de la solicitud
$query = "SELECT 
cliente.Nombre,
cliente.Apellido_Paterno
FROM `solicitud_taxi_listado`
LEFT JOIN clientes_listado cliente ON cliente.idCliente = solicitud_taxi_listado.idCliente
WHERE solicitud_taxi_listado.idSolicitud = '{$_GET['idSolicitud']}'";
$resultado = mysql_query ($query, $dbConn);
$row_datos = mysql_fetch_assoc ($resultado);
//Se busca y se muestra la cantidad de estrellas
$query = "SELECT  
AVG(pasajero_evaluacion) AS evaluacion
FROM `solicitud_taxi_listado`
WHERE solicitud_taxi_listado.idCliente = {$_GET['idCliente']} AND pasajero_evaluacion!=''";
$resultado = mysql_query ($query, $dbConn);
$row_eval = mysql_fetch_assoc ($resultado);
?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Taxi</h1>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" style="margin-top:10px;">
    	<?php echo $row_datos['Nombre'].' '.$row_datos['Apellido_Paterno']; ?>
    </h1>
    </td>
  </tr>	
  <tr height="20%">
    <td colspan="2"> 
<h2 class="vehicle_titles" style="text-align:center">Calificacion</h2>   
<div class="fcenter" style="width:90px; margin-top:10px;">   
    <ul class="rating 
    <?php 
	switch (ceil($row_eval['evaluacion'])) {
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
  
  
   
  <tr height="60%">
    <td colspan="2">
    <div class="form <?php echo $config_app['form_color'] ?>" style="position:relative; height:100%">
      <form method="post">
    <h1>Tiempo Estimado</h1>
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
    <input type="submit"   value="Confirmar"  name="submit_taxi" style="bottom:0px; position:absolute;">
    </form>
</div>
    
   </td>
  </tr> 

  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo $location.'&show=true&idSolicitud='.$_GET['idSolicitud']; ?>" >Cancelar</a>
    </td>
  </tr>
</table>



<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['show']) ) { 
// Se traen los datos de la solicitud
$query = "SELECT 
solicitud_taxi_listado.Cliente_Longitud,
solicitud_taxi_listado .Cliente_Latitud,
cliente.Nombre,
cliente.Apellido_Paterno,
cliente.Gsm,
cliente.dispositivo,
cliente.idCliente
FROM `solicitud_taxi_listado`
LEFT JOIN clientes_listado cliente ON cliente.idCliente = solicitud_taxi_listado.idCliente
WHERE solicitud_taxi_listado.idSolicitud = '{$_GET['idSolicitud']}'";
$resultado = mysql_query ($query, $dbConn);
$row_datos = mysql_fetch_assoc ($resultado);

?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $row_datos['Cliente_Latitud']; ?>, <?php echo $row_datos['Cliente_Longitud']; ?>);
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
      }  
</script>
<script type="text/javaScript">
	//Se crea la variable con valor 0 en caso de que no existan datos
	var jconsulta  = 0 ;
</script>
<div id="consulta" ></div>
<script type="text/javascript">

	function actualiza(){
		//recarga el div que esta mas arriba
    	$("#consulta").load("sis_taxi_solicitud_consulta.php?idSolicitud=<?php echo $_GET['idSolicitud'] ?>");
		switch(jconsulta) {
			case 42:
				//Si el taxista rechaza la carrera se redirige a la pantalla correcta
				pagina="<?php echo $location.'&carreracancel=true' ?>"
				location.href=pagina
				break;
		} 
	}

	 function superload(){
        setInterval( "actualiza()", 5000 ); 
    }
     
    superload();
</script>

<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Taxi</h1>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" style="margin-top:10px;">
    	<?php echo $row_datos['Nombre'].' '.$row_datos['Apellido_Paterno']; ?>
	</h1>
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
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo $location.'&canceltaxi=true&idSolicitud='.$_GET['idSolicitud'].'&Gsm_code='.$row_datos['Gsm'].'&Disp_code='.$row_datos['dispositivo']; ?>" >Ignorar</a>
    </td>
   </tr>

 
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location.'&acepttaxi=true&idSolicitud='.$_GET['idSolicitud'].'&Gsm_code='.$row_datos['Gsm'].'&Disp_code='.$row_datos['dispositivo'].'&idCliente='.$row_datos['idCliente']; ?>" >Aceptar</a>
  
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
				pagina="<?php echo $location.'&show=true&idSolicitud=' ?>"+jconsulta
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
    <td colspan="2"><img src="img/logo.png" width="100%"  /></td>
  </tr>	
  <tr height="70%">
    <td colspan="2">

     <table class="tb_user">
        <tr>
            <td> 
                <div class="cover"> 
				<img src="<?php echo $arrCliente['Url_imagen'] ?>" class="<?php echo $config_app['usr_img_border'].' '.$config_app['usr_img_border_radius'].' '.$config_app['usr_img_shadow'].' '.$config_app['usr_img_width'] ?>" /> 
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
    <p>ESPERANDO PASAJEROS</p>
    </div>    
    </td>
  </tr> 
</table>

<?php } ?>

<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>