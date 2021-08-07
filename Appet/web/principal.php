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
$location = "principal.php";
//formulario para enviar mensaje
if ( !empty($_POST['submit_msj']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/solicitud_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/solicitud_listado_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/solicitud_listado.php';
}
?>
<!DOCTYPE HTML>
<html lang="en-US"><!-- InstanceBegin template="/Templates/plant1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Principal</title>
<!-- InstanceEndEditable -->
<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" type="text/css" href="style/type/museo.css" media="all" />
<link rel="stylesheet" type="text/css" href="style/type/ptsans.css" media="all" />
<link rel="stylesheet" type="text/css" href="style/type/charis.css" media="all" />
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="style/css/ie7.css" media="all" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="style/css/ie8.css" media="all" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="style/css/ie9.css" media="all" />
<![endif]-->
<script type="text/javascript" src="style/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="style/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="style/js/jquery.aw-showcase.js"></script>
<script type="text/javascript" src="style/js/jquery.jcarousel.js"></script>
<script type="text/javascript" src="style/js/carousel.js"></script>
<script type="text/javascript" src="style/js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="style/js/jquery.superbgimage.min.js"></script>
<script type="text/javascript" src="style/js/jquery.slickforms.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($){
	$('.forms').dcSlickForms();
});
</script>
<script type="text/javascript">

$(document).ready(function()
{
	$("#showcase").awShowcase(
	{
		content_width:			900,
		content_height:			400,
		auto:					true,
		interval:				3000,
		continuous:				false,
		arrows:					true,
		buttons:				true,
		btn_numbers:			true,
		keybord_keys:			true,
		mousetrace:				false, /* Trace x and y coordinates for the mouse */
		pauseonover:			true,
		stoponclick:			false,
		transition:				'fade', /* hslide/vslide/fade */
		transition_delay:		0,
		transition_speed:		500,
		show_caption:			'onload' /* onload/onhover/show */
	});
});

</script>
<!-- InstanceBeginEditable name="head" -->
<script>
// This adds 'placeholder' to the items listed in the jQuery .support object. 
jQuery(function() {
   jQuery.support.placeholder = false;
   test = document.createElement('input');
   if('placeholder' in test) jQuery.support.placeholder = true;
});
// This adds placeholder support to browsers that wouldn't otherwise support it. 
$(function() {
   if(!$.support.placeholder) { 
      var active = document.activeElement;
      $(':text').focus(function () {
         if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
            $(this).val('').removeClass('hasPlaceholder');
         }
      }).blur(function () {
         if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
            $(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
         }
      });
      $(':text').blur();
      $(active).focus();
      $('form:eq(0)').submit(function () {
         $(':text.hasPlaceholder').val('');
      });
   }
});
</script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script src="js/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val();
  });
  
  $(function($){
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
});
</script>
<!-- InstanceEndEditable -->
</head>
<body>
<?php require_once 'core/background.php'; ?>
<div id="wrapper">
<?php require_once 'core/head.php'; ?>
  <div class="clear"></div>
  <?php require_once 'core/menu.php'; ?>
  <div id="container" class="opacity">
  <!-- InstanceBeginEditable name="content" -->
<?php ////////////////////////////////////////////////////////////////////////////////////////
if ( !empty($_GET['new']) ) { 
// Se traen los datos de la persona
$query = "SELECT Rut, Nombre, email, Fono1, Fono2, idCiudad, idComuna
FROM `clientes_listado`
WHERE idCliente = '{$arrCliente['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
$rowUser = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado); 
// Se trae un listado de todos los tipos de mensajes
$arrMensaje = array();
$query = "SELECT  id_Tipomsje, Nombre
FROM `mnt_oirs_tipomsje`
ORDER BY Nombre ASC";
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrMensaje,$row );
}
// Se trae un listado de todos los departamentos
$arrDepartamento = array();
$query = "SELECT  idDepto, Nombre
FROM `mnt_oirs_departamentos`
ORDER BY Nombre ASC";
$resultado3 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado3)) {
array_push( $arrDepartamento,$row );
}?>
<h3>Crear nueva solicitud, reclamo o sugerencia</h3>
<p>Todos los campos marcados con * son Obligatorios</p>
<div class="hr1"></div>


  <table>
  <form class="form" method="post"> 
  <tr>
    <td width="160"><label>Tipo de Mensaje</label></td>
    <td width="500">
    <select name="TipoMsje" required >
<option value="" selected="selected">Seleccione un tipo de mensaje</option>
<?php foreach ($arrMensaje as $mensajes) { ?>
<option value="<?php echo $mensajes['id_Tipomsje']; ?>" <?php if(isset($TipoMsje)&&$TipoMsje==$mensajes['id_Tipomsje']) {echo 'selected="selected"';}?>><?php echo $mensajes['Nombre']; ?></option>
<?php } ?>           
</select>
    </td>
    <td width="200"><?php  if (isset($errors[7])) {echo $errors[7];}?></td>
  </tr>
  <tr>
    <td><label>Departamento</label></td>
    <td>
    <select name="Depto" required >
<option value="0" selected="selected">Seleccione un Departamento</option>
<?php foreach ($arrDepartamento as $departamento) { ?>
<option value="<?php echo $departamento['idDepto']; ?>" <?php if(isset($Depto)&&$Depto==$departamento['idDepto']) {echo 'selected="selected"';}?>><?php echo $departamento['Nombre']; ?></option>
<?php } ?>
</select>
    </td>
    <td><?php  if (isset($errors[8])) {echo $errors[8];}?></td>
  </tr>
  <tr>
    <td><label>Fecha del Evento</label></td>
    <td><input type="date" placeholder="Fecha del Evento" id="datepicker"  <?php if(isset($fNacimiento)) {echo 'value="'.$fNacimiento.'"';} else { echo 'value="aaaa-mm-dd"';}?> name="Fecha" required ></td>
    <td><?php  if (isset($errors[9])) {echo $errors[9];}?></td>
  </tr>
  <tr>
    <td><label>Detalle</label></td>
    <td><textarea  name="Detalle" placeholder="Mensaje" required ><?php if(isset($Detalle)) {echo $Detalle;}?></textarea></td>
    <td><?php  if (isset($errors[10])) {echo $errors[10];}?></td>
  </tr>
  <tr>
    <td>
    <input type="hidden" name="Rut"         value="<?php echo $rowUser['Rut']; ?>" />
    <input type="hidden" name="Nombre"      value="<?php echo $rowUser['Nombre']; ?>" />
    <input type="hidden" name="email"       value="<?php echo $rowUser['email']; ?>" />
    <input type="hidden" name="Fono1"       value="<?php echo $rowUser['Fono1']; ?>"/>
    <input type="hidden" name="Fono2"       value="<?php echo $rowUser['Fono2']; ?>"/>
    <input type="hidden" name="idCiudad"    value="<?php echo $rowUser['idCiudad']; ?>" />
    <input type="hidden" name="idComuna"    value="<?php echo $rowUser['idComuna']; ?>" />
    <input type="hidden" name="idCliente"   value="<?php echo $arrCliente['idCliente']; ?>" />   
    <input name="Estado" type="hidden"  value="7" />
  	<input name="Fcreacion" type="hidden"  value="<?php date_default_timezone_set('UTC');echo date("Y-m-d");?>" />
    </td>   
    <td><input type="submit" value="Enviar" class="submit" name="submit_msj" /> <input  type="reset" class="submit"  value="Limpiar" /><input type="button" value="Volver" class="submit" onclick="window.location = 'principal.php'" /></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>

<?php ////////////////////////////////////////////////////////////////////////////////////////
 } elseif ( !empty($_GET['consult']) ) { 
 //Se traen los datos de la OIRS
$query = "SELECT 
oirs_listado.id_Oirs, 
oirs_listado.Fecha, 
oirs_listado.Origen, 
oirs_listado.Destino,
mnt_oirs_origen.descripcion AS Nombre_origen,
mnt_oirs_destino.descripcion AS Nombre_destino,
oirs_listado.Inicia, 
oirs_listado.Expira, 
mnt_oirs_antecedentes.descripcion AS Nombre_antecedentes,
oirs_listado.n_antecedente, 
oirs_listado.obs_antecedente,
mnt_oirs_materia.descripcion AS Nombre_materia,
oirs_listado.obs_materia, 
oirs_listado.Acciones_01, 
oirs_listado.Acciones_02, 
oirs_listado.Acciones_03, 
oirs_listado.Acciones_04, 
oirs_listado.Acciones_05, 
oirs_listado.Acciones_06, 
oirs_listado.Acciones_07, 
oirs_listado.Acciones_08, 
oirs_listado.Acciones_09, 
oirs_listado.Acciones_10, 
oirs_listado.Acciones_11, 
oirs_listado.Acciones_12, 
oirs_listado.Acciones_13, 
oirs_listado.Acciones_14,
oirs_listado.idSolicitud,
clientes_listado.Nombres AS Nombre_cliente,
mnt_oirs_departamentos.Nombre AS Nombre_depto
FROM `oirs_listado`
LEFT JOIN `mnt_oirs_origen`         ON mnt_oirs_origen.id_origen_a             = oirs_listado.id_origen_a
LEFT JOIN `mnt_oirs_destino`        ON mnt_oirs_destino.id_origen_b            = oirs_listado.id_origen_b
LEFT JOIN `mnt_oirs_antecedentes`   ON mnt_oirs_antecedentes.id_antecedentes   = oirs_listado.id_antecedentes
LEFT JOIN `mnt_oirs_materia`        ON mnt_oirs_materia.id_materia             = oirs_listado.id_materia
LEFT JOIN `clientes_listado`        ON clientes_listado.idCliente              = oirs_listado.idCliente
LEFT JOIN `mnt_oirs_departamentos`  ON mnt_oirs_departamentos.idDepto          = oirs_listado.idDepto
WHERE oirs_listado.id_Oirs = '{$_GET['consult']}'";
$resultado = mysql_query ($query, $dbConn);
$rowpOirs = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado); 
// Se trae un listado con todas las observaciones de la OIRS
$arrObservaciones = array();
$query = "SELECT 
oirs_observaciones.Fecha,
oirs_observaciones.Hora,
oirs_observaciones.Detalle,
usuarios_listado.Nombre
FROM `oirs_observaciones`
LEFT JOIN `usuarios_listado` ON usuarios_listado.idUsuario = oirs_observaciones.idUsuario
WHERE id_Oirs = '{$_GET['consult']}'
ORDER BY id_OirsObservaciones ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrObservaciones,$row );
}	 
// Se trae un listado con todas las modificaciones de la OIRS
$arrCambios = array();
$query = "SELECT 
oirs_historial.Fecha,
oirs_historial.Hora,
oirs_historial.Detalle,
usuarios_listado.Nombre
FROM `oirs_historial`
LEFT JOIN `usuarios_listado` ON usuarios_listado.idUsuario = oirs_historial.idUsuario
WHERE oirs_historial.id_Oirs = '{$_GET['consult']}'
ORDER BY oirs_historial.id_OirsHistorial ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCambios,$row );
}
?>
<h3>Estado OIRS</h3>
<div class="hr1"></div>

<table style="width:100%">
  <tr>
    <td colspan="2"><p class="oirs_title">Datos del Documento</p></td>
  </tr>
  <tr>
    <td>Documento N° <?php echo n_doc($rowpOirs['id_Oirs']); ?></td>
    <td>Periodo :  <?php echo Fecha_año($rowpOirs['Fecha']); ?></td>
  </tr>
  <tr>
    <td colspan="2"><p class="oirs_title">Datos del Solicitante</p></td>
  </tr>
  <tr>
    <td>Nombre : <?php echo $rowpOirs['Nombre_cliente'] ?></td>
    <td>N°Solicitud asociada :  <?php echo n_doc($rowpOirs['idSolicitud']); ?></td>
  </tr>
  <tr>
    <td colspan="2"><p class="oirs_title">Observaciones</p></td>
  </tr>
  <?php foreach ($arrObservaciones as $obs) { ?>
  <tr>
    <td  colspan="2">
    <div class="box_obs">
    <h1><?php echo 'Escrito por '.$obs['Nombre'].' el '.Fecha_completa_alt($obs['Fecha']).' a las '.$obs['Hora'] ?></h1>
    <p><?php echo $obs['Detalle'] ?></p>
    </div> 
    </td>
  </tr>
<?php } ?>
  <tr>
    <td colspan="2"><p class="oirs_title">Historial de modificaciones</p></td>
  </tr>
  <?php foreach ($arrCambios as $cambios) { ?>
  <tr>
    <td  colspan="2">
    <div class="box_obs">
    <h1><?php echo 'Modificado por '.$cambios['Nombre'].' el '.Fecha_completa_alt($cambios['Fecha']).' a las '.$cambios['Hora'] ?></h1>
    <p><?php echo $cambios['Detalle'] ?></p>
    </div> 
    </td>
  </tr>
<?php } ?>
<tr>
    <td></td>
    <td><input type="button" value="Volver" class="submit" onclick="window.location = 'principal.php'" /></td>
    <td></td>
  </tr>
</table>


<?php ////////////////////////////////////////////////////////////////////////////////////////
 } elseif ( !empty($_GET['view']) ) { 
$query = "SELECT 
solicitud_listado.Nombres,
solicitud_listado.ApellidoPat,
solicitud_listado.ApellidoMat,
solicitud_listado.Rut,
solicitud_listado.email,
solicitud_listado.Fono1,
solicitud_listado.Fono2,
mnt_ubicacion_ciudad.Nombre AS nombre_ciudad,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
mnt_oirs_tipomsje.Nombre AS tipo_mensaje,
mnt_oirs_departamentos.Nombre AS departamento,
solicitud_listado.Fcreacion,
solicitud_listado.Fecha,
solicitud_listado.Fvista,
solicitud_listado.Detalle,
solicitud_listado.idSolicitud
FROM `solicitud_listado`
LEFT JOIN `mnt_ubicacion_ciudad`      ON mnt_ubicacion_ciudad.idCiudad      = solicitud_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`     ON mnt_ubicacion_comunas.idCiudad     = solicitud_listado.idComuna
LEFT JOIN `mnt_oirs_tipomsje`         ON mnt_oirs_tipomsje.id_Tipomsje      = solicitud_listado.TipoMsje
LEFT JOIN `mnt_oirs_departamentos`    ON mnt_oirs_departamentos.idDepto     = solicitud_listado.Depto
WHERE idSolicitud = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado); 
 ?>
<h3>Ver solicitud, reclamo o sugerencia</h3>
<div class="hr1"></div>

 <table>
 
  <tr>
    <td width="160"><label>Rut</label></td>
    <td width="500"><input type="text" name="Rut" value="<?php echo $rowdata['Rut'] ?>" disabled /></td>
    <td width="200"></td>
  </tr>
  <tr>
    <td><label>Nombre</label></td>
    <td><input type="text" name="Nombre" value="<?php echo $rowdata['Nombre'].' '.$rowdata['ApellidoPat'].' '.$rowdata['ApellidoMat'] ?>" disabled /></td>
    <td></td>
  </tr>
  <tr>
    <td><label>Correo</label></td>
    <td><input type="text" name="email" value="<?php echo $rowdata['email'] ?>" disabled  /></td>
    <td></td>
  </tr>
  <tr>
    <td><label>Teléfono</label></td>
    <td><input type="text" name="Fono1" value="<?php echo $rowdata['Fono1'] ?>" disabled /></td>
    <td></td>
  </tr>
  <tr>
    <td><label>Teléfono 2</label></td>
    <td><input type="text" name="Fono2" value="<?php echo $rowdata['Fono2'] ?>" disabled /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><label>Ciudad</label></td>
    <td>
    <select name="ciudad" disabled  >
    <option value="" selected="selected"><?php echo $rowdata['nombre_ciudad'] ?></option>             
    </select>
    </td>
    <td></td>
  </tr>
  <tr>
    <td><label>Comuna</label></td>
    <td>
    <select name="Comuna" disabled  >
    <option value="" selected="selected"><?php echo $rowdata['nombre_comuna'] ?></option>             
    </select>
    </td>
    <td></td>
  </tr>
  <tr>
    <td><label>Tipo de Mensaje</label></td>
    <td>
    <select name="TipoMsje" disabled  >
    <option value="" selected="selected"><?php echo $rowdata['tipo_mensaje'] ?></option>           
    </select>
    </td>
    <td></td>
  </tr>
  <tr>
    <td><label>Departamento</label></td>
    <td>
    <select name="Depto" disabled >
    <option value="0" selected="selected"><?php echo $rowdata['departamento'] ?></option>
    </select>
    </td>
    <td></td>
  </tr>
  <tr>
    <td><label>Fecha de creacion</label></td>
    <td><input type="date" name="Fecha"  value="<?php echo $rowdata['Fcreacion'] ?>" disabled ></td>
    <td></td>
  </tr>
  <tr>
    <td><label>Fecha del evento</label></td>
    <td><input type="date" name="Fecha"  value="<?php echo $rowdata['Fecha'] ?>" disabled ></td>
    <td></td>
  </tr>
  <tr>
    <td><label>Fecha recepcionada</label></td>
    <td><input type="date" name="Fecha"  value="<?php echo $rowdata['Fvista'] ?>" disabled ></td>
    <td></td>
  </tr>
  
  <tr>
    <td><label>Detalle</label></td>
    <td><textarea name="text"  name="Detalle" placeholder="Mensaje" disabled  ><?php echo $rowdata['Detalle'] ?></textarea></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="button" value="Volver" class="submit" onclick="window.location = 'principal.php'" /></td>
    <td></td>
  </tr>
 

</table>
 

<?php ////////////////////////////////////////////////////////////////////////////////////////
 } else { 
//Se inicializa el paginador de resultados
//tomo el numero de la pagina si es que este existe
if(isset($_GET["pagina"])){
	$num_pag = $_GET["pagina"];	
} else {
	$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){
	$comienzo = 0 ;
	$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//Creacion de una cedena para el filtro
$z="WHERE solicitud_listado.Rut = '".$arrCliente['Rut']."'";

//Realizo una consulta para saber el total de elementos existentes
$querys = "SELECT idSolicitud ,id_Oirs FROM `solicitud_listado` ".$z."";
$registros = mysql_query ($querys, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrSolicitud = array();
$query = "SELECT 
solicitud_listado.idSolicitud,
solicitud_listado.Fcreacion,
mnt_oirs_tipomsje.Nombre AS tipo_mensaje,
detalle_general.Nombre AS estado,
solicitud_listado.id_Oirs
FROM `solicitud_listado`
LEFT JOIN `mnt_oirs_tipomsje`  ON mnt_oirs_tipomsje.id_Tipomsje    = solicitud_listado.TipoMsje
LEFT JOIN `detalle_general`    ON detalle_general.id_Detalle       = solicitud_listado.Estado
".$z."
ORDER BY estado DESC , idSolicitud DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrSolicitud,$row );
}?>

<div>
	<div style="width:60%;" class="fleft"><h3>Listado de solicitudes, reclamos y sugerencias</h3></div>
    <div style="width:35%;" class="fright"><a href="<?php echo $location.'?new=true'; ?>" class="submit fright">Crear nuevo</a></div>
</div>
<div class="fclear"></div>
 <div class="hr1"></div>

  <table class="table">
  <thead>
  <tr>
   <th>N° Solicitud</th>
   <th>F Creacion</th>
   <th>Tipo Mensaje</th>
   <th>Estado</th>
   <th>OIRS</th>
   <th>Acciones</th> 
  </tr>
  </thead>
  
  <tbody>
  <?php foreach ($arrSolicitud as $solicitud) { ?>
  <tr>
    <td><?php echo n_doc($solicitud['idSolicitud']); ?></td>
    <td><?php echo $solicitud['Fcreacion']; ?></td>
    <td><?php echo $solicitud['tipo_mensaje']; ?></td>
    <td><?php echo $solicitud['estado']; ?></td>
    <td><?php if($solicitud['id_Oirs']>0){ echo n_doc($solicitud['id_Oirs']);} ?></td>
    <td>
    <a href="<?php echo $location.'?view='.$solicitud['idSolicitud']; ?>" title="Ver Solicitud" class="icon-ver info-tooltip"></a>
    <?php if($solicitud['id_Oirs']>0){  ?>   
    <a href="<?php echo $location.'?consult='.$solicitud['id_Oirs']; ?>" title="Ver OIRS" class="icon-ver info-tooltip"></a> 
	<?php } ?> 
    </td>
  </tr>
  <?php } ?>
  </tbody>
  
</table>
<?php } ?>
  <!-- InstanceEndEditable --> 
  </div>
  <?php require_once 'core/footer.php'; ?>
</div>
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
<!-- InstanceEnd --></html>