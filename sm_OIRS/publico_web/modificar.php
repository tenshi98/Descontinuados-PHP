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
$location = "modificar.php";
//formulario para registrarse
if ( !empty($_POST['submit_update']) )  { 
	//ubicacion nueva
	$location.='?mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_9.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_listado.php';
}
?>
<!DOCTYPE HTML>
<html lang="en-US"><!-- InstanceBegin template="/Templates/plant1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Modificar Datos</title>
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
<script type="text/javascript" SRC="js/filterlist.js"></script>
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
// Se traen los datos de la persona
$query = "SELECT Nombres, ApellidoPat, ApellidoMat, Fono1, Fono2, email,Rut, fNacimiento, idCiudad, idComuna, idVilla, idCalle, n_calle, Sexo
FROM `clientes_listado`
WHERE idCliente = '{$arrCliente['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
$rowUser = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);
// Se trae un listado con todas las ciudades
$arrCiudad = array();
$query = "SELECT idCiudad,Nombre
FROM `mnt_ubicacion_ciudad`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCiudad,$row );
} 
// Se trae un listado con todas las comunas
 if ($rowUser['idCiudad']!=0&&$rowUser['idCiudad']!=''){
	$arrComuna = array();
	$query = "SELECT idComuna,Nombre
	FROM `mnt_ubicacion_comunas`
	WHERE idCiudad = ".$rowUser['idCiudad']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrComuna,$row );
	}
} 
// Se trae un listado con todas las calles
if ($rowUser['idComuna']!=0&&$rowUser['idComuna']!=''){
	$arrCalle = array();
	$query = "SELECT idCalle,Nombre
	FROM `mnt_ubicacion_calles`
	WHERE idComuna = ".$rowUser['idComuna']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrCalle,$row );
	}
// Se trae un listado con todas las villas
	$arrVilla = array();
	$query = "SELECT idVilla,Nombre
	FROM `mnt_ubicacion_villa`
	WHERE idComuna = ".$rowUser['idComuna']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrVilla,$row );
	}
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
array_multisort($Villa, SORT_ASC);?>


 <h3>Modificar Datos</h3>
  <p>Todos los campos marcados con * son Obligatorios</p>
  <div class="hr1"></div>
<?php if (isset($_GET['mod'])) {
	echo '<div class="alert_sucess" >Sus datos han sido modificados satisfactoriamente</div>';
}?>
  <table>
  <form class="form" method="post" name="form1"> 
  <tr>
    <td width="160"><label>Nombre</label></td>
    <td width="500"><input type="text" name="Nombres" placeholder="Ingrese su nombre" required value="<?php if(isset($Nombres)){ echo $Nombres;}else{echo $rowUser['Nombres']; }?>" /></td>
    <td width="200"><?php  if (isset($errors[1])) {echo $errors[1];}?></td>
  </tr>
  <tr>
    <td><label>Apellido Paterno</label></td>
    <td><input type="text" name="ApellidoPat" placeholder="Apellido Paterno" required value="<?php if(isset($ApellidoPat)){ echo $ApellidoPat;}else{echo $rowUser['ApellidoPat']; }?>" /></td>
    <td><?php  if (isset($errors[11])) {echo $errors[11];}?></td>
  </tr>
  <tr>
    <td><label>Apellido Materno</label></td>
    <td><input type="text" name="ApellidoMat" placeholder="Apellido Materno" required value="<?php if(isset($ApellidoMat)){ echo $ApellidoMat;}else{echo $rowUser['ApellidoMat']; }?>" /></td>
    <td><?php  if (isset($errors[12])) {echo $errors[12];}?></td>
  </tr>
  <tr>
    <td><label>Telefono Casa</label></td>
    <td><input type="text" name="Fono1" placeholder="Telefono Casa" required value="<?php if(isset($Fono1)){ echo $Fono1;}else{echo $rowUser['Fono1']; }?>" /></td>
    <td><?php  if (isset($errors[2])) {echo $errors[2];}?></td>
  </tr>
  <tr>
    <td><label>Telefono Celular</label></td>
    <td><input type="text" name="Fono2" placeholder="Telefono Celular"  value="<?php if(isset($Fono2)){ echo $Fono2;}else{echo $rowUser['Fono2']; }?>" /></td>
    <td><?php  if (isset($errors[10])) {echo $errors[10];}?></td>
  </tr>
  <tr>
    <td><label>Correo electronico</label></td>
    <td><input type="email" name="email" placeholder="Correo electronico" required value="<?php if(isset($email)){ echo $email;}else{echo $rowUser['email']; }?>" /></td>
    <td><?php  if (isset($errors[3])) {echo $errors[3];}?></td>
  </tr>
  <tr>
    <td><label>Rut</label></td>
    <td><input type="text" name="Rut" placeholder="Rut" required value="<?php if(isset($Rut)){ echo $Rut;}else{echo $rowUser['Rut']; }?>" /></td>
    <td><?php  if (isset($errors[4])) {echo $errors[4];}?></td>
  </tr>
  <tr>
    <td><label>Fecha de nacimiento</label></td>
    <td><input type="text" placeholder="Fecha de nacimiento" id="datepicker"  <?php if(isset($fNacimiento)) {echo 'value="'.$fNacimiento.'"';} else { echo 'value="aaaa-mm-dd"';}?> name="fNacimiento" required ></td>
    <td><?php  if (isset($errors[5])) {echo $errors[5];}?></td>
  </tr>
   <tr>
    <td><label>Sexo</label></td>
    <td>
    <select name="Sexo" required >
    <option value="" selected="selected">Seleccione un Sexo</option>
    <option value="M" <?php if(isset($Sexo)&&$Sexo=='M') {echo 'Selected';}elseif($rowUser['Sexo']=='M'){echo 'Selected';}?>>Hombre</option>
    <option value="F" <?php if(isset($Sexo)&&$Sexo=='F') {echo 'Selected';}elseif($rowUser['Sexo']=='F'){echo 'Selected';}?>>Mujer</option>               
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
    <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}elseif($ciudad['idCiudad']==$rowUser['idCiudad']){echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
    <?php } ?>             
    </select>
    </td>
    <td><?php  if (isset($errors[6])) {echo $errors[6];}?></td>
  </tr>
  <tr>
    <td><label>Comuna</label></td>
    <td>
    <select name="idComuna" required onChange="cambia_comuna();cambia_comuna2();">
    <option value="" selected>---</option> 
    <?php foreach ($arrComuna as $com) { ?>
    <option value="<?php echo $com['idComuna']; ?>" <?php if(isset($idComuna)&&$idComuna==$com['idComuna']) {echo 'selected="selected"';}elseif($com['idComuna']==$rowUser['idComuna']){echo 'selected="selected"';}?>><?php echo $com['Nombre']; ?></option>
    <?php } ?>             
    </select>
    </td>
    <td><?php  if (isset($errors[7])) {echo $errors[7];}?></td>
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
    <td><input type="text" id="text1" placeholder="Filtro" class="form-control filter" name="regexp" value="" onKeyUp="myfilter2.set(this.value)"></td>
    <td></td>
  </tr>
             
  <tr>
    <td><label>Villa</label></td>
    <td>
    <select name="idVilla" >
    <option value="" selected>---</option>  
    <?php foreach ($arrVilla as $villa) { ?>
    <option value="<?php echo $villa['idVilla']; ?>" <?php if(isset($idVilla)&&$idVilla==$villa['idVilla']) {echo 'selected="selected"';}elseif($villa['idVilla']==$rowUser['idVilla']){echo 'selected="selected"';}?>><?php echo $villa['Nombre']; ?></option>
    <?php } ?>           
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
<script type="text/javascript">
	<!--
	var myfilter2 = new filterlist(document.form1.idVilla);
	//-->
</script>
            
  <tr>
    <td><label>Filtro Calle</label></td>
    <td><input type="text" id="text1" placeholder="Filtro" class="form-control filter" name="regexp" value="" onKeyUp="myfilter.set(this.value)"></td>
    <td></td>
  </tr>
  
          
   <tr>
    <td><label>Calle</label></td>
    <td>
    <select name="idCalle" required >
    <option value="" selected>---</option>
    <?php foreach ($arrCalle as $calle) { ?>
    <option value="<?php echo $calle['idCalle']; ?>" <?php if(isset($idCalle)&&$idCalle==$calle['idCalle']) {echo 'selected="selected"';}elseif($calle['idCalle']==$rowUser['idCalle']){echo 'selected="selected"';}?>><?php echo $calle['Nombre']; ?></option>
    <?php } ?>             
    </select>
    </td>
    <td><?php  if (isset($errors[8])) {echo $errors[8];}?></td>
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
<script type="text/javascript">
	<!--
	var myfilter = new filterlist(document.form1.idCalle);
	//-->
</script>

  <tr>
    <td><label>N° de Calle</label></td>
    <td><input type="text" name="n_calle" placeholder="N° de Calle" required value="<?php if(isset($n_calle)) {echo $n_calle;}else{echo $rowUser['n_calle'];}?>" /></td>
    <td><?php  if (isset($errors[9])) {echo $errors[9];}?></td>
  </tr>
 
  <tr>
    <td>
    <input type="hidden" value="<?php echo $arrCliente['idCliente']; ?>"  name="idCliente" />
    </td>
    <td><input type="submit" value="Actualizar" class="submit" name="submit_update" /></td>
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