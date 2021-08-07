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
$location = "mensaje_ok.php";
//formulario para enviar mensaje
if ( !empty($_POST['submit']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/solicitud_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/solicitud_listado_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/solicitud_listado.php';
}


?>
<!DOCTYPE HTML>
<html lang="en-US"><!-- InstanceBegin template="/Templates/plant1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Crear nueva solicitud, reclamo o sugerencia</title>
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
<?php /////////////////////////////////////////////////////////
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
}
// Se trae un listado con todas las ciudades
$arrCiudad = array();
$query = "SELECT idCiudad,Nombre
FROM `mnt_ubicacion_ciudad`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCiudad,$row );
}  
// Se trae un listado de todas las comunas
$query = "SELECT  idComuna, idCiudad, Nombre
FROM `mnt_ubicacion_comunas` ";
$resultado = mysql_query ($query, $dbConn);
while ($Comuna[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Comuna);
array_multisort($Comuna, SORT_ASC);

?>


  <h3>Datos del Solicitante</h3>
  <p>Todos los campos marcados con * son Obligatorios</p>
  <div class="hr1"></div>
  <table>
  <form class="form" method="post" name="form1"> 
  <tr>
    <td width="160"><label>Rut</label></td>
    <td width="500"><input type="text" name="Rut" placeholder="Ejemplo 12345678-9" required <?php if(isset($Rut)) {echo 'value="'.$Rut.'"';}?> /></td>
    <td width="200"><?php  if (isset($errors[1])) {echo $errors[1];}?></td>
  </tr>
  <tr>
    <td><label>Nombre</label></td>
    <td><input type="text" name="Nombres" placeholder="Nombres" required <?php if(isset($Nombres)) {echo 'value="'.$Nombres.'"';}?> /></td>
    <td><?php  if (isset($errors[2])) {echo $errors[2];}?></td>
  </tr>
  <tr>
    <td><label>Apellido Paterno</label></td>
    <td><input type="text" name="ApellidoPat" placeholder="Apellido Paterno" required <?php if(isset($ApellidoPat)) {echo 'value="'.$ApellidoPat.'"';}?> /></td>
    <td><?php  if (isset($errors[3])) {echo $errors[3];}?></td>
  </tr>
  <tr>
    <td><label>Apellido Materno</label></td>
    <td><input type="text" name="ApellidoMat" placeholder="Apellido Materno" required <?php if(isset($ApellidoMat)) {echo 'value="'.$ApellidoMat.'"';}?> /></td>
    <td><?php  if (isset($errors[4])) {echo $errors[4];}?></td>
  </tr>
  <tr>
    <td><label>Correo</label></td>
    <td><input type="text" name="email" placeholder="Ejemplo: micorreo@mimail.com" required <?php if(isset($email)) {echo 'value="'.$email.'"';}?> /></td>
    <td><?php  if (isset($errors[5])) {echo $errors[5];}?></td>
  </tr>
  <tr>
    <td><label>Teléfono Fijo</label></td>
    <td><input type="text" name="Fono1" placeholder="Telefono Fijo" required <?php if(isset($Fono1)) {echo 'value="'.$Fono1.'"';}?> /></td>
    <td><?php  if (isset($errors[6])) {echo $errors[6];}?></td>
  </tr>
  <tr>
    <td><label>Teléfono Celular</label></td>
    <td><input type="text" name="Fono2" placeholder="Telefono Celular" <?php if(isset($Fono2)) {echo 'value="'.$Fono2.'"';}?>  /></td>
    <td><?php  if (isset($errors[13])) {echo $errors[13];}?></td>
  </tr>
  <tr>
    <td><label>Ciudad</label></td>
    <td>
    <select name="idCiudad" required onChange="cambia_ciudad()" >
    <option value="" selected="selected">Seleccione una Ciudad</option>
    <?php foreach ($arrCiudad as $ciudad) { ?>
    <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
    <?php } ?>             
    </select>
    </td>
    <td><?php  if (isset($errors[7])) {echo $errors[7];}?></td>
  </tr>
  <tr>
    <td><label>Comuna</label></td>
    <td>
    <select name="idComuna" required >
    <option value="" selected>---</option>            
    </select>
    </td>
    <td><?php  if (isset($errors[8])) {echo $errors[8];}?></td>
  </tr>
<script>
<?php
//se imprime la id de la tarea
filtrar($Comuna, 'idCiudad'); 
foreach($Comuna as $tipo=>$componentes){ 
echo'var id_comuna_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idComuna'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Comuna as $tipo=>$componentes){ 
echo'var comuna_'.$tipo.'=new Array("Seleccione una Comuna"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_ciudad(){
	var Componente
	Componente = document.form1.idCiudad[document.form1.idCiudad.selectedIndex].value
	try {
	if (Componente != '') {
		id_comuna=eval("id_comuna_" + Componente)
		comuna=eval("comuna_" + Componente)
		num_int = id_comuna.length
		document.form1.idComuna.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idComuna.options[i].value=id_comuna[i]
		   document.form1.idComuna.options[i].text=comuna[i]
		}	
	}else{
		document.form1.idComuna.length = 1
		document.form1.idComuna.options[0].value = ""
	    document.form1.idComuna.options[0].text = "Seleccione una Comuna"
	}
	} catch (e) {
    alert("La ciudad seleccionada no posee comunas asignadas");
}
	document.form1.idComuna.options[0].selected = true
}
</script>   
  <tr>
    <td><label>Tipo de Mensaje</label></td>
    <td>
    <select name="TipoMsje" required >
<option value="" selected="selected">Seleccione un tipo de mensaje</option>
<?php foreach ($arrMensaje as $mensajes) { ?>
<option value="<?php echo $mensajes['id_Tipomsje']; ?>" <?php if(isset($TipoMsje)&&$TipoMsje==$mensajes['id_Tipomsje']) {echo 'selected="selected"';}?>><?php echo $mensajes['Nombre']; ?></option>
<?php } ?>           
</select>
    </td>
    <td><?php  if (isset($errors[9])) {echo $errors[9];}?></td>
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
    <td><?php  if (isset($errors[10])) {echo $errors[10];}?></td>
  </tr>
  <tr>
    <td><label>Fecha del Evento</label></td>
    <td><input type="date" placeholder="Fecha del Evento" id="datepicker"  <?php if(isset($Fecha)) {echo 'value="'.$Fecha.'"';} else { echo 'value="aaaa-mm-dd"';}?> name="Fecha" readonly ></td>
    <td><?php  if (isset($errors[11])) {echo $errors[11];}?></td>
  </tr>
  <tr>
    <td><label>Detalle</label></td>
    <td><textarea  name="Detalle" placeholder="Mensaje" required ><?php if(isset($Detalle)) {echo $Detalle;}?></textarea></td>
    <td><?php  if (isset($errors[12])) {echo $errors[12];}?></td>
  </tr>
  <tr>
    <td>
    <input name="Estado" type="hidden"  value="7" />
  	<input name="Fcreacion" type="hidden"  value="<?php date_default_timezone_set('UTC');echo date("Y-m-d");?>" /> 
    </td>
    <td><input type="submit" value="Enviar" class="submit" name="submit" /> <input  type="reset" class="submit"  value="Limpiar" /></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>

  
  <!-- InstanceEndEditable --> 
  </div>
  <?php require_once 'core/footer.php'; ?>
</div>
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
<!-- InstanceEnd --></html>