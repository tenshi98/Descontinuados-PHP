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
//formulario para iniciar sesion
if ( !empty($_POST['submit_register']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_5.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_listado_2.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla0.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Registro</title>
<!-- InstanceEndEditable -->
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
<link href="css/pure.css" rel="stylesheet" type="text/css" />
<link href="css/estilo1.css" rel="stylesheet" type="text/css" />
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<table width="100%" height="100%" >
  <tr bgcolor="#fafafa">
    <td colspan="5" class="body">
	<!-- InstanceBeginEditable name="Body_text" -->
    <?php  if (isset($errors[1])) {echo $errors[1];}?>
    <?php  if (isset($errors[2])) {echo $errors[2];}?>
    <?php  if (isset($errors[3])) {echo $errors[3];}?>
    <?php  if (isset($errors[4])) {echo $errors[4];}?>
    <?php  if (isset($errors[5])) {echo $errors[5];}?>
    <?php  if (isset($errors[6])) {echo $errors[6];}?>
    <?php  if (isset($errors[7])) {echo $errors[7];}?>
    <?php  if (isset($errors[8])) {echo $errors[8];}?>
    <?php  if (isset($errors[9])) {echo $errors[9];}?>
    <?php  if (isset($errors[10])) {echo $errors[10];}?>
    <?php  if (isset($errors[11])) {echo $errors[11];}?>
    <?php  if (isset($errors[12])) {echo $errors[12];}?>
    <?php  if (isset($errors[13])) {echo $errors[13];}?>
    <?php  if (isset($errors[14])) {echo $errors[14];}?>
    <?php  if (isset($errors[15])) {echo $errors[15];}?>
<?php 
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
array_multisort($Villa, SORT_ASC);?>

    <form class="pure-form pure-form-stacked" method="post" name="form1">
    <legend>Ingrese sus datos para registrarse</legend>
      	<fieldset>
        
<input type="text"  class="pure-input-1" placeholder="Usuario"    name="usuario" required   <?php if (isset($usuario))  {echo 'value="'.$usuario.'"';}?>>
<input type="email" class="pure-input-1" placeholder="email"      name="email"   required   <?php if (isset($email)) {echo 'value="'.$email.'"';}?>>
<input type="text"  class="pure-input-1" placeholder="Nombres"     name="Nombres"   required  <?php if (isset($Nombres)) {echo 'value="'.$Nombres.'"';}?>>
<input type="text"  class="pure-input-1" placeholder="Apellido Paterno"     name="ApellidoPat"  required   <?php if (isset($ApellidoPat)) {echo 'value="'.$ApellidoPat.'"';}?>>
<input type="text"  class="pure-input-1" placeholder="Apellido Materno"     name="ApellidoMat"  required   <?php if (isset($ApellidoMat)) {echo 'value="'.$ApellidoMat.'"';}?>>
<input type="text"  class="pure-input-1" placeholder="Rut"        name="Rut"   required     <?php if (isset($Rut)) {echo 'value="'.$Rut.'"';}?>>
<select name="Sexo" class="pure-input-1" required>
	<option value="">Seleccione Sexo</option>
	<option value="M" <?php if (isset($Sexo)&&$Sexo=='M') {echo 'selected';}?>>Masculino</option>
	<option value="F" <?php if (isset($Sexo)&&$Sexo=='F') {echo 'selected';}?>>Femenino</option>
</select>
<select name="idCiudad" required onChange="cambia_ciudad()" class="pure-input-1" >
    <option value="" selected="selected">Seleccione una Ciudad</option>
    <?php foreach ($arrCiudad as $ciudad) { ?>
    <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
    <?php } ?>             
</select>
<select name="idComuna" required onChange="cambia_comuna();cambia_comuna2();" class="pure-input-1">
    <option value="" selected>---</option>             
</select>
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
<select name="idVilla" id="villa" class="pure-input-1" >
    <option value="" selected>---</option>             
</select>
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
<select name="idCalle" required  id="calle" class="pure-input-1">
    <option value="" selected>---</option>             
</select>
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
<input type="text" name="n_calle" placeholder="N° de Calle" class="pure-input-1" required <?php if(isset($n_calle)) {echo 'value="'.$n_calle.'"';}?> />
<input type="password" name="password" placeholder="Contraseña" class="pure-input-1" required <?php if(isset($password)) {echo 'value="'.$password.'"';}?> />
<input type="password" name="repassword" placeholder="Repetir Contraseña" class="pure-input-1" required <?php if(isset($repassword)) {echo 'value="'.$repassword.'"';}?> />

<input type="hidden" value="1" name="Estado">
<input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="fcreacion">   
            

        </fieldset>
    
        <input type="submit" class="pure-button pure-button-4 pure-input-1" name="submit_register" value="Ingresar">
        <a href="ini_login.php<?php echo $w ?>" class="pure-button pure-button-4 pure-input-1 margin_top_5px">Volver</a>
    </form>
	<!-- InstanceEndEditable --> 
    </td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>
