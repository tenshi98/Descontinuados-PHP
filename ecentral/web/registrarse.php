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
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "registrarse.php";
//formulario para registrarse
if ( !empty($_POST['submit_register']) )  { 
	//ubicacion nueva
	$location.='?create=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_7.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_listado_2.php';
}
//formulario para activar usuario
if ( !empty($_POST['submit_activation']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_8.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_listado_3.php';
}
?>
<!DOCTYPE HTML>
<html lang="en-US"><!-- InstanceBegin template="/Templates/plant1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Registrarse</title>
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
if ( !empty($_GET['activation']) ) { ?>
<h3>Activar usuario</h3>
  <p>Presione el boton de mas abajo para activar su usuario</p>
  <div class="hr1"></div>

  <table>
  <form class="form" method="post"> 
  <tr>
    <td width="160"><label>Rut</label></td>
    <td width="500"><input type="text" name="Rut" placeholder="Rut" required <?php if(isset($Rut)) {echo 'value="'.$Rut.'"';}?> /></td>
    <td width="200"><?php  if (isset($errors[1])) {echo $errors[1];}?></td>
  </tr>

  <tr>
    <td>&nbsp;</td>
    <input type="hidden" name="Codigo_activacion" value="<?php echo $_GET['activation'] ?>">
    <td><input type="submit" value="Activar Usuario" class="submit" name="submit_activation" /></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>

<?php ////////////////////////////////////////////////////////////////////////////////////////
 } else { 
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
// Se trae un listado de todas las calles
$query = "SELECT  idComuna, idCalle, Nombre
FROM `mnt_ubicacion_calles` ";
$resultado = mysql_query ($query, $dbConn);
while ($Calle[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Calle);
array_multisort($Calle, SORT_ASC);
// Se trae un listado de todas las villas
$query = "SELECT  idComuna, idVilla, Nombre
FROM `mnt_ubicacion_villa` ";
$resultado = mysql_query ($query, $dbConn);
while ($Villa[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Villa);
array_multisort($Villa, SORT_ASC);
?>


 <h3>Registrarse</h3>
  <p>Todos los campos marcados con * son Obligatorios</p>
  <div class="hr1"></div>
<?php if (isset($_GET['create'])) {
	echo '<div class="alert_sucess" >Su usuario ya ha sido creado, sin embargo debe activarlo; dentro de poco deberia de recibir un correo con las instrucciones para hacerlo</div>';
}?>
  <table>
  <form class="form" method="post" name="form1"> 
  <tr>
    <td width="160"><label>Nombre</label></td>
    <td width="500"><input type="text" name="Nombres" placeholder="Ingrese su nombre" required <?php if(isset($Nombres)) {echo 'value="'.$Nombres.'"';}?> /></td>
    <td width="200"><?php  if (isset($errors[1])) {echo $errors[1];}?></td>
  </tr>
  <tr>
    <td width="160"><label>Apellido Paterno</label></td>
    <td width="500"><input type="text" name="ApellidoPat" placeholder="Ingrese su apellido Paterno" required <?php if(isset($ApellidoPat)) {echo 'value="'.$ApellidoPat.'"';}?> /></td>
    <td width="200"><?php  if (isset($errors[2])) {echo $errors[2];}?></td>
  </tr>
   <tr>
    <td width="160"><label>Apellido Materno</label></td>
    <td width="500"><input type="text" name="ApellidoMat" placeholder="Ingrese su apellido Materno" required <?php if(isset($ApellidoMat)) {echo 'value="'.$ApellidoMat.'"';}?> /></td>
    <td width="200"><?php  if (isset($errors[3])) {echo $errors[3];}?></td>
  </tr>
  <tr>
    <td><label>Telefono Casa</label></td>
    <td><input type="text" name="Fono1" placeholder="Telefono Casa" required <?php if(isset($Fono1)) {echo 'value="'.$Fono1.'"';}?> /></td>
    <td><?php  if (isset($errors[4])) {echo $errors[4];}?></td>
  </tr>
  <tr>
    <td><label>Telefono Celular</label></td>
    <td><input type="text" name="Fono2" placeholder="Telefono Celular"  <?php if(isset($Fono2)) {echo 'value="'.$Fono2.'"';}?> /></td>
    <td><?php  if (isset($errors[14])) {echo $errors[14];}?></td>
  </tr>
  <tr>
    <td><label>Correo electronico</label></td>
    <td><input type="email" name="email" placeholder="Correo electronico" required <?php if(isset($email)) {echo 'value="'.$email.'"';}?> /></td>
    <td><?php  if (isset($errors[5])) {echo $errors[5];}?></td>
  </tr>
  <tr>
    <td><label>Rut</label></td>
    <td><input type="text" name="Rut" placeholder="Rut" required <?php if(isset($Rut)) {echo 'value="'.$Rut.'"';}?> /></td>
    <td><?php  if (isset($errors[6])) {echo $errors[6];}?></td>
  </tr>
  <tr>
    <td><label>Fecha de nacimiento</label></td>
    <td><input type="date" placeholder="Fecha de nacimiento" id="datepicker"  <?php if(isset($fNacimiento)) {echo 'value="'.$fNacimiento.'"';} else { echo 'value="aaaa-mm-dd"';}?> name="fNacimiento" required ></td>
    <td><?php  if (isset($errors[7])) {echo $errors[7];}?></td>
  </tr>
   <tr>
    <td><label>Sexo</label></td>
    <td>
    <select name="Sexo" required >
    <option value="" selected="selected">Seleccione un Sexo</option>
    <option value="M" <?php if(isset($Sexo)&&$Sexo=='M') {echo 'Selected';}?>>Hombre</option>
    <option value="F" <?php if(isset($Sexo)&&$Sexo=='F') {echo 'Selected';}?>>Mujer</option>               
    </select>
    </td>
    <td><?php  if (isset($errors[8])) {echo $errors[8];}?></td>
  </tr>
  <tr>
    <td><label>Region</label></td>
    <td>
    <select name="idCiudad" required onChange="cambia_ciudad()" >
    <option value="" selected="selected">Seleccione una Region</option>
    <?php foreach ($arrCiudad as $ciudad) { ?>
    <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
    <?php } ?>             
    </select>
    </td>
    <td><?php  if (isset($errors[9])) {echo $errors[9];}?></td>
  </tr>
  <tr>
    <td><label>Comuna</label></td>
    <td>
    <select name="idComuna" required onChange="cambia_comuna();cambia_comuna2();">
    <option value="" selected>---</option>             
    </select>
    </td>
    <td><?php  if (isset($errors[10])) {echo $errors[10];}?></td>
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
    alert("La Region seleccionada no posee comunas asignadas");
}
	document.form1.idComuna.options[0].selected = true
}
</script>           
   <tr>
    <td><label>Filtro Villa</label></td>
    <td><input type="text" onkeyup="MyUtil.selectFilter('villa', this.value)" placeholder="Filtro" class="filter" /></td>
    <td></td>
  </tr>             
  <tr>
    <td><label>Villa</label></td>
    <td>
    <select name="idVilla" id="villa" >
    <option value="" selected>---</option>             
    </select>
    </td>
    <td></td>
  </tr>
<script>
<?php
//se imprime la id de la tarea
filtrar($Villa, 'idComuna'); 
foreach($Villa as $tipo=>$componentes){ 
echo'var id_villa_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idVilla'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Villa as $tipo=>$componentes){ 
echo'var villa_'.$tipo.'=new Array("Seleccione una Villa"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_comuna2(){
var Componente3
Componente3 = document.form1.idComuna[document.form1.idComuna.selectedIndex].value
try {
    if (Componente3 != '') {	 
		id_villa=eval("id_villa_" + Componente3)
		villa=eval("villa_" + Componente3)
		num_int = id_villa.length
		document.form1.idVilla.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idVilla.options[i].value=id_villa[i]
		   document.form1.idVilla.options[i].text=villa[i]
		}			
	}else{
		document.form1.idVilla.length = 1
		document.form1.idVilla.options[0].value = ""
	    document.form1.idVilla.options[0].text = "Seleccione una Villa"
	}
} catch (e) {
    alert("La comuna seleccionada no posee villas asignadas");
}
	document.form1.idVilla.options[0].selected = true 
}
</script>


            
   <tr>
    <td><label>Filtro Calle</label></td>
    <td><input type="text" onkeyup="MyUtil.selectFilter('calle', this.value)" placeholder="Filtro" class="filter"/></td>
    <td></td>
  </tr>
           
   <tr>
    <td><label>Calle</label></td>
    <td>
    <select name="idCalle" required  id="calle">
    <option value="" selected>---</option>             
    </select>
    </td>
    <td><?php  if (isset($errors[11])) {echo $errors[11];}?></td>
  </tr>
<script>
<?php
//se imprime la id de la tarea
filtrar($Calle, 'idComuna'); 
foreach($Calle as $tipo=>$componentes){ 
echo'var id_calle_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idCalle'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Calle as $tipo=>$componentes){ 
echo'var calle_'.$tipo.'=new Array("Seleccione una Calle"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_comuna(){
var Componente2
Componente2 = document.form1.idComuna[document.form1.idComuna.selectedIndex].value
try {
    if (Componente2 != '') {	 
		id_calle=eval("id_calle_" + Componente2)
		calle=eval("calle_" + Componente2)
		num_int = id_calle.length
		document.form1.idCalle.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idCalle.options[i].value=id_calle[i]
		   document.form1.idCalle.options[i].text=calle[i]
		}			
	}else{
		document.form1.idCalle.length = 1
		document.form1.idCalle.options[0].value = ""
	    document.form1.idCalle.options[0].text = "Seleccione una Calle"
	}
} catch (e) {
    alert("La comuna seleccionada no posee calles asignadas");
}
	document.form1.idCalle.options[0].selected = true 
}
</script>
<script>
MyUtil = new Object();
   MyUtil.selectFilterData = new Object();
   MyUtil.selectFilter = function(selectId, filter) {
     var list = document.getElementById(selectId);
     if(!MyUtil.selectFilterData[selectId]) { //if we don't have a list of all the options, cache them now'
       MyUtil.selectFilterData[selectId] = new Array();
       for(var i = 0; i < list.options.length; i++) MyUtil.selectFilterData[selectId][i] = list.options[i];
     }
     list.options.length = 0;   //remove all elements from the list
     for(var i = 0; i < MyUtil.selectFilterData[selectId].length; i++) { //add elements from cache if they match filter
       var o = MyUtil.selectFilterData[selectId][i];
       if(o.text.toLowerCase().indexOf(filter.toLowerCase()) >= 0) list.add(o, null);
     }
   }
</script>

  <tr>
    <td><label>N° de Calle</label></td>
    <td><input type="text" name="n_calle" placeholder="N° de Calle" required <?php if(isset($n_calle)) {echo 'value="'.$n_calle.'"';}?> /></td>
    <td><?php  if (isset($errors[12])) {echo $errors[12];}?></td>
  </tr>
  <tr>
    <td><label>Contraseña</label></td>
    <td><input type="password" name="password" placeholder="Contraseña" required <?php if(isset($password)) {echo 'value="'.$password.'"';}?> /></td>
    <td><?php  if (isset($errors[13])) {echo $errors[13];}?></td>
  </tr>
  <tr>
    <td><label>Repetir Contraseña</label></td>
    <td><input type="password" name="repassword" placeholder="Repetir Contraseña" required <?php if(isset($repassword)) {echo 'value="'.$repassword.'"';}?> /></td>
    <td><?php  if (isset($errors[14])) {echo $errors[14];}?></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <input type="hidden" value="2" name="Estado">
	<input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="fcreacion">
    <td><input type="submit" value="Registrarse" class="submit" name="submit_register" /></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
<?php } ?>
  <!-- InstanceEndEditable --> 
  </div>
  <?php require_once 'core/footer.php'; ?>
</div>
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
<!-- InstanceEnd --></html>