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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_cliente.php';
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
$location = "perfil.php";
$location .= $w;
//formulario para actualizar los datos
if ( !empty($_POST['submit_update']) )  { 
	//ubicacion nueva
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_7.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_listado.php';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plantilla1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Principal</title>
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
  <tr height="60px" bgcolor="#fff">
    <td width="20%">&nbsp;</td>
    <td colspan="3" width="60%"><h1 class="app_tittle">Inicio</h1></td>
    <td width="20%">&nbsp;</td>
  </tr>
  <tr bgcolor="#ffffff" >
    <td colspan="5">
	<!-- InstanceBeginEditable name="texto" -->
    <div class="body">
<?php ////////////////////////////////////////////////////////////////////////////////////////
// Se traen los datos de la persona
$query = "SELECT Nombres, ApellidoPat, ApellidoMat, Fono1, Fono2, email,Rut, idCiudad, idComuna, idVilla, idCalle, n_calle, Sexo
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
<form class="pure-form pure-form-stacked" method="post" name="form1">
      	<fieldset>       

<input type="text"  class="pure-input-1" placeholder="Nombres"     name="Nombres"   required  value="<?php if(isset($Nombres)){ echo $Nombres;}else{echo $rowUser['Nombres']; }?>">
<input type="text"  class="pure-input-1" placeholder="Apellido Paterno"     name="ApellidoPat"  required   value="<?php if(isset($ApellidoPat)){ echo $ApellidoPat;}else{echo $rowUser['ApellidoPat']; }?>">
<input type="text"  class="pure-input-1" placeholder="Apellido Materno"     name="ApellidoMat"  required   value="<?php if(isset($ApellidoMat)){ echo $ApellidoMat;}else{echo $rowUser['ApellidoMat']; }?>">
<input type="text"  class="pure-input-1" placeholder="Rut"        name="Rut"   required     value="<?php if(isset($Rut)){ echo $Rut;}else{echo $rowUser['Rut']; }?>">


<select name="Sexo" class="pure-input-1" required>
	<option value="">Seleccione Sexo</option>
	<option value="M" <?php if (isset($Sexo)&&$Sexo=='M') {echo 'selected';}elseif($rowUser['Sexo']=='M'){echo 'selected';}?>>Masculino</option>
	<option value="F" <?php if (isset($Sexo)&&$Sexo=='F') {echo 'selected';}elseif($rowUser['Sexo']=='F'){echo 'selected';}?>>Femenino</option>
</select>
<select name="idCiudad" required onChange="cambia_ciudad()" class="pure-input-1" >
    <option value="" selected="selected">Seleccione una Ciudad</option>
    <?php foreach ($arrCiudad as $ciudad) { ?>
    <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}elseif($ciudad['idCiudad']==$rowUser['idCiudad']){echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
    <?php } ?>             
</select>
<select name="idComuna" required onChange="cambia_comuna();cambia_comuna2();" class="pure-input-1">
    <option value="" selected>---</option>
    <?php foreach ($arrComuna as $com) { ?>
    <option value="<?php echo $com['idComuna']; ?>" <?php if(isset($idComuna)&&$idComuna==$com['idComuna']) {echo 'selected="selected"';}elseif($com['idComuna']==$rowUser['idComuna']){echo 'selected="selected"';}?>><?php echo $com['Nombre']; ?></option>
    <?php } ?>             
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
    <?php foreach ($arrVilla as $villa) { ?>
    <option value="<?php echo $villa['idVilla']; ?>" <?php if(isset($idVilla)&&$idVilla==$villa['idVilla']) {echo 'selected="selected"';}elseif($villa['idVilla']==$rowUser['idVilla']){echo 'selected="selected"';}?>><?php echo $villa['Nombre']; ?></option>
    <?php } ?>            
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
    <?php foreach ($arrCalle as $calle) { ?>
    <option value="<?php echo $calle['idCalle']; ?>" <?php if(isset($idCalle)&&$idCalle==$calle['idCalle']) {echo 'selected="selected"';}elseif($calle['idCalle']==$rowUser['idCalle']){echo 'selected="selected"';}?>><?php echo $calle['Nombre']; ?></option>
    <?php } ?>              
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
<input type="text" name="n_calle" placeholder="N° de Calle" class="pure-input-1" required value="<?php if(isset($n_calle)){ echo $n_calle;}else{echo $rowUser['n_calle']; }?>" />
<input type="email" class="pure-input-1" placeholder="email"      name="email"   required   value="<?php if(isset($email)){ echo $email;}else{echo $rowUser['email']; }?>">
<input type="text" class="pure-input-1" name="Fono1" placeholder="Telefono Casa" required value="<?php if(isset($Fono1)){ echo $Fono1;}else{echo $rowUser['Fono1']; }?>" />
<input type="text" class="pure-input-1" name="Fono2" placeholder="Telefono Celular"  value="<?php if(isset($Fono2)){ echo $Fono2;}else{echo $rowUser['Fono2']; }?>" />
        </fieldset>
        <input type="text"  name="idCliente" value="<?php echo $arrCliente['idCliente'] ?>" />   
        <input type="submit" class="pure-button pure-button-4 pure-input-1" name="submit_update" value="Actualizar">
        <a href="perfil.php<?php echo $w ?>" class="pure-button pure-button-4 pure-input-1 margin_top_5px">Volver</a>
    </form>

	</div>
	<!-- InstanceEndEditable --> 
    </td>
  </tr>
  <?php require_once 'core/footer.php';?>
</table>
</body>
<!-- InstanceEnd --></html>
