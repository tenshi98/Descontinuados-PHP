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
$location = "sis_taxi_solicitud.php".$w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Se busca un taxista cerca
if ( !empty($_GET['search']) )     {
	//Llamamos al formulario de busqueda
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/sis_taxi_solicitud_busqueda.php';
}
if ( !empty($_GET['confirm']) )     {
	//Se envia directamente la notificacion de solicitud de taxi
	require_once 'sis_taxi_solicitud_solicitar.php';		
}
if ( !empty($_POST['submit_eval']) )     {
	//Actualizo la ubicacion
	$location.='&search='.$config_app['comport_busq_taxi_2'];
	$location.='&idTipoAlerta='.$_GET['idTipoAlerta'];
	//Se envia directamente la notificacion de solicitud de taxi
	require_once 'sis_taxi_solicitud_eval_taxista.php';		
}
if ( !empty($_GET['cancelcarrera']) )     {
	//Actualizo la ubicacion
	$location.='&search='.$config_app['comport_busq_taxi_2'];
	$location.='&idTipoAlerta='.$_GET['idTipoAlerta'];
	//Se envia directamente la notificacion de solicitud de taxi
	require_once 'sis_taxi_solicitud_cancelar_carrera.php';		
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
<title>Solicitud Taxi</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->
<script src="js/jquery.min.js"></script>
<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['eval_final']) ) { ?>
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
    <p class="long_txt">Evalue al taxista.</p>
    </div>
    
      <div class="form <?php echo $config_app['form_color'] ?>">
      <form method="post">
      <h1>Evaluar</h1>

      <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      
        <select name="taxista_evaluacion">
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
 
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location.'&idTipoAlerta='.$_GET['idTipoAlerta']; ?>" >Finalizar</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['moviendo']) ) { ?>
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
			case 44:
				//Si el taxista rechaza la carrera se redirige a la pantalla correcta
				pagina="<?php echo $location.'&eval_final=true&idSolicitud='.$_GET['idSolicitud'].'&idTipoAlerta='.$_GET['idTipoAlerta'] ?>"
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
    <p class="long_txt">Moviendome.</p>
    </div>
    </td>
  </tr>
  <tr height="80%">
    <td colspan="2">
   	
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['acepttaxi']) ) { 
// Se trae la ubicacion actual del taxista para mostrarlo en pantalla
$query = "SELECT  
taxista.Nombre,
taxista.Apellido_Paterno,
taxista.Fono1,
solicitud_taxi_listado.minutos,
taxista.idCliente
FROM `solicitud_taxi_listado`
LEFT JOIN clientes_listado taxista ON taxista.idCliente = solicitud_taxi_listado.idTaxista
WHERE solicitud_taxi_listado.idSolicitud = '{$_GET['idSolicitud']}'";
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
    	$("#consulta").load("sis_taxi_solicitud_consulta.php?idSolicitud=<?php echo $_GET['idSolicitud'] ?>");
		
		switch(jconsulta) {
			case 43:
				//Si el taxista rechaza la carrera se redirige a la pantalla correcta
				pagina="<?php echo $location.'&moviendo=true&idSolicitud='.$_GET['idSolicitud'].'&idTipoAlerta='.$_GET['idTipoAlerta'] ?>"
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
    <p class="long_txt"><?php echo $row_datos['Nombre'].' '.$row_datos['Apellido_Paterno'].' ha aceptado tu solicitud, llegara en '.$row_datos['minutos'].' minutos aproximadamente' ?>.</p>
    </div>
    </td>
  </tr>
  <tr height="70%">
    <td colspan="2">
   	<iframe src="sis_taxi_solicitud_consulta_2.php?idCliente=<?php echo $row_datos['idCliente'] ?>" width="100%" height="100%" frameborder="0" scrolling="no" marginwidth="0">Tu navegador no soporta frames!!</iframe>
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_otros_color_fondo'].' '.$config_app['btn_otros_ancho'].' '.$config_app['btn_otros_radio'].' '.$config_app['btn_otros_float'].' '.$config_app['btn_otros_color_texto'].' '.$config_app['btn_otros_sombra'] ?> btn_link" href="tel:<?php echo $row_datos['Fono1']; ?>" >Llamar</a>
    </td>
   </tr>
   
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo $location.'&cancelcarrera='.$_GET['idSolicitud'].'&idTipoAlerta='.$_GET['idTipoAlerta']; ?>" >Cancelar Carrera</a>
    </td>
   </tr> 
  
 
</table>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['canceltaxi']) ) { ?>
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
    <p class="long_txt">El taxista ha rechazado la carrera, deseas buscar a otro taxista?</p>
    </div>
   </td>
  </tr>
  
  <tr height="10%">
    <td width="50%">
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo 'principal.php'.$w; ?>" >Cancelar</a>
    </td>
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location.'&search='.$config_app['comport_busq_taxi_2'].'&idTipoAlerta='.$_GET['idTipoAlerta']; ?>" >Buscar</a>
    </td>
  </tr>
</table>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['cancelsol']) ) { 
//primero verificar si el taxista acepto viaje mientras usuario cancelaba, si es asi redirigir a la pagina
$query = "SELECT Estado
FROM `solicitud_taxi_listado`
WHERE idSolicitud = {$_GET['cancelsol']}";
$resultado = mysql_query ($query, $dbConn);
$row_estado = mysql_fetch_assoc ($resultado);
if($row_estado['Estado']==41){
	$location.='&idSolicitud='.$_GET['cancelsol'];
	$location.='&idTipoAlerta='.$_GET['idTipoAlerta'];
	header( 'Location: '.$location );
	die;
}else{
//Guardar la carrera cancelada y enviar mensaje
echo 'BORRAME Y ACTIVA CONSULTAS POR SERVER';
echo '===========================================================================================================================';
$query  = "UPDATE `solicitud_taxi_listado` SET Estado='42' WHERE idSolicitud = '{$_GET['cancelsol']}'";
$result = mysql_query($query, $dbConn);
/*$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/tareas_taxi_cancelar_usuario.php?idSolicitud= '".$_GET['cancelsol']."' &";
$fp = shell_exec($command);*/	
}
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
    <p class="long_txt">Puede evaluar al taxista o puede volver a buscar otro.</p>
    </div>

      <div class="form <?php echo $config_app['form_color'] ?>">
      <form method="post">
      <h1>Evaluar</h1>

      <div class="input"><label id="icon" for="name"><i class="fa fa-anchor"></i></label>      
        <select name="taxista_evaluacion">
          <option value="" selected="selected">Seleccione una opcion</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select> 
      </div>
   	  <textarea placeholder="Observacion" name="observaciones"></textarea>	
      <input type="hidden"   name="idSolicitud" value="<?php echo $_GET['cancelsol']; ?>"  >
    
      <input type="submit"   value="Evaluar"  name="submit_eval" >
      </form>
      </div>
 
    </td>
  </tr>
  
  <tr height="10%">
    <td width="50%">
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo 'principal.php'.$w; ?>" >Cancelar</a>
    </td>
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location.'&search='.$config_app['comport_busq_taxi_2'].'&idTipoAlerta='.$_GET['idTipoAlerta']; ?>" >Buscar</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['idSolicitud']) ) { ?>
<table class="tb_map">
  <tr height="10%">
    <td>
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Taxi</h1>
    </td>
  </tr>	
  <tr height="20%">
    <td colspan="2">
    <div class="alert fcenter <?php echo $config_app['msg_info_color_body'].' '.$config_app['msg_info_color_text'].' '.$config_app['msg_info_width'].' '.$config_app['msg_info_border'] ?>">
    <i class="fa fa-info"></i>
    <p class="long_txt">En espera de la respuesta del Taxista.</p>
    </div>
    </td>
  </tr>
  
  <tr height="80%">
    <td colspan="2">
   <div id="cronometro" class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?> fcenter width10"></div>
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
<script type="text/javascript">
$(document).ready(function() {   
    setTimeout(function() {
        $(".content2").fadeIn(1500);
    },<?php echo $config_app['comport_espera'] ?>000);
});
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
			case 39:
				//Si el taxista rechaza la carrera se redirige a la pantalla correcta
				pagina="<?php echo $location.'&canceltaxi=true&idTipoAlerta='.$_GET['idTipoAlerta'] ?>"
				location.href=pagina
				break;
			case 41:
				//Si el taxista acepta la carrera se redirige a la pantalla correcta
				pagina="<?php echo $location.'&acepttaxi=true&idTipoAlerta='.$_GET['idTipoAlerta'].'&idSolicitud='.$_GET['idSolicitud'] ?>"
				location.href=pagina	
				break;
		} 

	 
	}
	//llama a la funcion actualiza cada 10 segundos
	window.onload=function(){
		setInterval( "actualiza()", 5000 ); //multiplicas la cantidad de segundos por mil	
	};
</script>

    </td>
  </tr>
  
  <tr>
    <td>
<div class="content2" style="display:none;">    
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo $location.'&search_2='.$config_app['comport_busq_taxi_2'].'&idTipoAlerta='.$_GET['idTipoAlerta'].'&cancelsol='.$_GET['idSolicitud']; ?>" >Cancelar y Buscar Otro</a>  
 </div>   
    </td>
  </tr>
</table>


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['idTaxista']) ) { 
$query = "SELECT  
clientes_listado.Nombre, 
clientes_listado.Apellido_Paterno, 
clientes_listado.Url_imagen,
vehiculos_marcas.Nombre AS nombre_marca,
vehiculos_modelos.Nombre AS nombre_modelo,
clientes_vehiculos.PPU AS patente

FROM `clientes_listado`
LEFT JOIN clientes_vehiculos   ON clientes_vehiculos.idCliente   = clientes_listado.idCliente
LEFT JOIN vehiculos_marcas     ON vehiculos_marcas.idMarca       = clientes_vehiculos.idMarca
LEFT JOIN vehiculos_modelos    ON vehiculos_modelos.idModelo     = clientes_vehiculos.idModelo

WHERE clientes_listado.idCliente = {$_GET['idTaxista']}
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_clientes = mysql_fetch_assoc ($resultado);

?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Taxista</h1>
    </td>
  </tr>
  
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">
		<?php echo $row_clientes['Nombre'].' '.$row_clientes['Apellido_Paterno'] ?>
    </h1>
    </td>
  </tr>
  
  <tr height="40%">
    <td width="50%">
    <div class="width100">
    <img class="width85 border_radius15 cover_img_02 fright" src="<?php echo $row_clientes['Url_imagen'] ?>"  /> 
    </div>
    </td>
    <td width="50%">
    <h2 class="vehicle_titles">Vehiculo</h2>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" style="margin-top:5px;">
		<?php if ($row_clientes['patente']==''){echo 'Sin vehiculo';}else{echo $row_clientes['nombre_marca'].' '.$row_clientes['nombre_modelo'].' patente '.$row_clientes['patente'];} ?>
    </h1>
<?php 
//Se busca y se muestra la cantidad de estrellas
$query = "SELECT  
AVG(taxista_evaluacion) AS evaluacion
FROM `solicitud_taxi_listado`
WHERE solicitud_taxi_listado.idTaxista = {$_GET['idTaxista']} AND taxista_evaluacion!=''";
$resultado = mysql_query ($query, $dbConn);
$row_eval = mysql_fetch_assoc ($resultado);
?>    
 <h2 class="vehicle_titles">Calificacion</h2>   
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
  
  <tr height="20%">
    <td colspan="2">

    </td>
  </tr>
 
  <tr height="10%">
    <td colspan="2">
    <a class="<?php echo $config_app['btn_otros_color_fondo'].' '.$config_app['btn_otros_ancho'].' '.$config_app['btn_otros_radio'].' '.$config_app['btn_otros_float'].' '.$config_app['btn_otros_color_texto'].' '.$config_app['btn_otros_sombra'] ?> btn_link" href="<?php echo $location.'&search='.$config_app['comport_busq_taxi_2'].'&idTipoAlerta='.$_GET['idTipoAlerta']; ?>" >Buscar Otro Taxi</a>
    </td>
  </tr>
  
  <tr height="10%">
    <td width="50%">
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo 'principal.php'.$w; ?>" >Cancelar</a>
    </td>
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location.'&confirm='.$_GET['idTaxista'].'&lat_tax='.$_GET['lat_tax'].'&long_tax='.$_GET['long_tax'].'&idTipoAlerta='.$_GET['idTipoAlerta']; ?>" >Confirmar</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['repeat']) ) { ?>
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Taxi</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">
   	<h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" style="margin-top:10px;">Ninguna Coincidencia, desea repetir la busqueda?</h1>
    </td>
  </tr>
  
  <tr height="10%">
    <td width="50%">
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo 'principal.php'.$w; ?>" >Cancelar</a>
    </td>
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location.'&search='.$config_app['comport_busq_taxi_2'].'&idTipoAlerta='.$_GET['idTipoAlerta']; ?>" >Repetir</a>
    </td>
  </tr>
</table>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  {?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $lat; ?>, <?php echo $lon; ?>);
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
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Solicitud de Taxi</h1>
    <h1 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>" style="margin-top:10px;">Mi posicion actual</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">
    <div id="map_canvas">
		<script type="text/javascript">window.onload=function(){initialize();};</script>
    </div>
    </td>
  </tr>
  
  <tr height="10%">
    <td width="50%">
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo 'principal.php'.$w; ?>" >Cancelar</a>
    </td>
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location.'&search='.$config_app['comport_busq_taxi_1'].'&idTipoAlerta='.$_GET['idTipoAlerta']; ?>" >Confirmar</a>
    </td>
  </tr>
</table>
<?php } ?>
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>