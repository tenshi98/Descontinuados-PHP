<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 3);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                        Se filtran las entradas para evitar ataques                                             */
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
$location = "admin_vecinos.php";
//formulario para crear usuario
if ( !empty($_POST['submit']) )  {
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_11.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_listado.php';
}
//formulario para editar permiso
if ( !empty($_POST['submit_edit']) )  {
	//se agrega la nueva ubicacion
	$location .= "?id=".$_GET['id']."&modificacion=true"; 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_12.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_listado.php';
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
//se borra un dato
if ( !empty($_GET['del']) )     {require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/clientes_listado.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plant1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Clientes</title>
<!-- InstanceEndEditable -->
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/tabla.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
<script type='text/javascript' src='js/infogrid.js'></script>
<link rel="icon" type="image/png" href="img/mifavicon.png" />
<!-- InstanceBeginEditable name="head" -->

<!-- InstanceEndEditable -->
</head>

<body >
<?php require_once 'core/menu.php'; ?>
<div align="center">
<!-- InstanceBeginEditable name="Bodytext" -->
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
<?php  if (isset($errors[16])) {echo $errors[16];}?>
<?php  if (isset($errors[17])) {echo $errors[17];}?>
<?php /////////////////////////////////////////////// EDICION  ///////////////////////////////////////////////////////////  
 if ( ! empty($_GET['id']) ) { 
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT Nombres, ApellidoPat, ApellidoMat, Sexo, email, Rut,Fono1,Fono2,Pais,Estado,idCiudad, idComuna,idCalle, n_calle, idVilla
FROM `clientes_listado`
WHERE clientes_listado.idCliente = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
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
 if ($rowusr['idCiudad']!=0&&$rowusr['idCiudad']!=''){
	$arrComuna = array();
	$query = "SELECT idComuna,Nombre
	FROM `mnt_ubicacion_comunas`
	WHERE idCiudad = ".$rowusr['idCiudad']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrComuna,$row );
	}
} 
// Se trae un listado con todas las calles
if ($rowusr['idComuna']!=0&&$rowusr['idComuna']!=''){
	$arrCalle = array();
	$query = "SELECT idCalle,Nombre
	FROM `mnt_ubicacion_calles`
	WHERE idComuna = ".$rowusr['idComuna']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrCalle,$row );
	}
// Se trae un listado con todas las villas
	$arrVilla = array();
	$query = "SELECT idVilla,Nombre
	FROM `mnt_ubicacion_villa`
	WHERE idComuna = ".$rowusr['idComuna']." 
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
array_multisort($Villa, SORT_ASC);
?>
<?php if ( ! empty($_GET['modificacion']) ) { 
 echo '<h4 class="alert_sucess">Datos Modificados</h4>';
}?>
 
   
 <table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCIÓN CLASE </span></td>
          <td width="15%" align="center" valign="middle"><span class="Arial4">
			<script type="text/javascript" language="JavaScript">
            document.write (Muestrafecha());
         </script>
          <br />
          <span class="Arial2">
			<script type="text/javascript">
            window.onload=function(){startTime();}
        </script>
            <div id="reloj"></div>
          </span></span></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" class="borde_button">
          <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" >

  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
	
    <tbody>
   <tr>
                <td width="343" align="center" ><img src="./images/configuracion.png" width="200" height="200" /></td>
                <td width="481" align="left" bgcolor="#FFFFFF">
 
 
<form  method="POST" name="form1" >
 
<table align="center" width="600px">
 <tr>
        <td colspan="2" align="center"><span class="Arial4">Modificar datos Vecino</span></td>
    </tr>
    <tr>
        <td colspan="2" class="Arial2">Para modificar al vecino, s&oacute;lo debes llenar
        los siguientes campos y pulsar el bot&oacute;n <b>Actualizar Vecino</b>. La cuenta del vecino se modifica inmediatamente.
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right" valign="middle" class="borde_button"></td>
   	</tr>
    <tr>
       <td class="Arial2"><label>Nombres</label></td>
       <td><input type="text" name="Nombres"  autocomplete="off" value="<?php if (isset($Nombres)) {echo $Nombres;}else{echo $rowusr['Nombres'];}?>"  required="required"/></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Apellido Paterno</label></td>
       <td><input type="text" name="ApellidoPat" autocomplete="off" value="<?php if (isset($ApellidoPat)) {echo $ApellidoPat;}else{echo $rowusr['ApellidoPat'];}?>"  required="required"/></td>
    </tr>
     <tr>
       <td class="Arial2"><label>Apellido Materno</label></td>
       <td><input type="text" name="ApellidoMat" autocomplete="off" value="<?php if (isset($ApellidoMat)) {echo $ApellidoMat;}else{echo $rowusr['ApellidoMat'];}?>"  required="required"/></td>
    </tr> 
    <tr>
       <td class="Arial2"><label>Rut</label></td>
       <td><input type="text" name="Rut"  autocomplete="off" value="<?php if (isset($Rut)) {echo $Rut;}else{echo $rowusr['Rut'];}?>"  required="required"/></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Sexo</label></td>
       <td>
       <select name="Sexo"  required="required" >
			<option value="">Seleccione Sexo</option>
			<option value="M" <?php if (isset($Sexo)&&$Sexo=='M') {echo 'selected="selected"';}else{if( $rowusr['Sexo']=='M'){echo 'selected="selected"';}} ?> >Masculino</option>
			<option value="F" <?php if (isset($Sexo)&&$Sexo=='F') {echo 'selected="selected"';}else{if( $rowusr['Sexo']=='F'){echo 'selected="selected"';}} ?> >Femenino</option>
        </select>      
       </td>
    </tr>
    <tr>
       <td class="Arial2"><label>Fono Casa</label></td>
       <td><input type="text" name="Fono1"  autocomplete="off" value="<?php if (isset($Fono1)) {echo $Fono1;}else{echo $rowusr['Fono1'];}?>"  required="required"/></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Fono Celular</label></td>
       <td><input type="text" name="Fono2"  autocomplete="off" value="<?php if (isset($Fono2)) {echo $Fono2;}else{echo $rowusr['Fono2'];}?>"  /></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Region</label></td>
       <td>
       <select name="idCiudad" class="form-control" onChange="cambia_ciudad()" required="required" >
       	<option value="" selected="selected">Seleccione una region</option>
        <?php foreach ($arrCiudad as $ciudad) { ?>
        <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}elseif($ciudad['idCiudad']==$rowusr['idCiudad']){echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
         <?php } ?>             
       </select>
       </td>
    </tr>
    
	<tr>
       <td class="Arial2"><label>Comuna</label></td>
       <td>
       <select name="idComuna" class="form-control" onChange="cambia_comuna(); cambia_comuna2();" required="required" >  
            <option value="" selected>---</option>
            <?php foreach ($arrComuna as $com) { ?>
            <option value="<?php echo $com['idComuna']; ?>" <?php if(isset($idComuna)&&$idComuna==$com['idComuna']) {echo 'selected="selected"';}elseif($com['idComuna']==$rowusr['idComuna']){echo 'selected="selected"';}?>><?php echo $com['Nombre']; ?></option>
             <?php } ?>         
       </select>
       </td>
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
    alert("La region seleccionada no posee comunas asignadas");
}
	document.form1.idComuna.options[0].selected = true
}
</script>
			<tr>
               <td class="Arial2"><label>Filtro Villa</label></td>
               <td><input type="text" onkeyup="MyUtil.selectFilter('villa', this.value)" placeholder="Filtro" class="filter" /></td>
            </tr>
            
            <tr>
               <td class="Arial2"><label>Villa</label></td>
               <td>
               <select name="idVilla" class="form-control" id="villa" >  
                    <option value="" selected>---</option>  
                    <?php foreach ($arrVilla as $villa) { ?>
                    <option value="<?php echo $villa['idVilla']; ?>" <?php if(isset($idVilla)&&$idVilla==$villa['idVilla']) {echo 'selected="selected"';}elseif($villa['idVilla']==$rowusr['idVilla']){echo 'selected="selected"';}?>><?php echo $villa['Nombre']; ?></option>
                    <?php } ?>     
               </select>
               </td>
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
               <td class="Arial2"><label>Filtro Calle</label></td>
               <td><input type="text" onkeyup="MyUtil.selectFilter('calle', this.value)" placeholder="Filtro" class="filter"/></td>
            </tr>
            
            <tr>
               <td class="Arial2"><label>Calle</label></td>
               <td>
               <select name="idCalle" class="form-control" required id="calle" >  
                    <option value="" selected>---</option>
                    <?php foreach ($arrCalle as $calle) { ?>
                    <option value="<?php echo $calle['idCalle']; ?>" <?php if(isset($idCalle)&&$idCalle==$calle['idCalle']) {echo 'selected="selected"';}elseif($calle['idCalle']==$rowusr['idCalle']){echo 'selected="selected"';}?>><?php echo $calle['Nombre']; ?></option>
                    <?php } ?>         
               </select>
               </td>
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
	    document.form1.idCalle.options[0].text = "Seleccione una Comuna"
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
               <td class="Arial2"><label>N° de Calle</label></td>
               <td>
              <input type="text" id="text2" placeholder="N° de Calle" class="form-control" value="<?php echo $rowusr['n_calle']; ?>" name="n_calle" required >
               </td>
            </tr> 

    <tr>
       <td class="Arial2"><label>Email</label></td>
       <td><input type="text" name="email"  autocomplete="off" value="<?php if (isset($email)) {echo $email;}else{echo $rowusr['email'];}?>"  /></td>
    </tr>
 
    <tr><td colspan="2">&nbsp;</td></tr>
 	<tr>
        <td align="center" colspan="2">
            <input name="idCliente" type="hidden" value="<?php echo $_GET['id'] ?>" />
            <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Cancelar y Volver</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit_edit" value="Actualizar Vecino" class="rojo_sombra">
        </td>
	</tr>
    
</table>
</form>
</td>
              </tr>
              
    </tbody>
 
<?php require_once 'core/footer.php';?> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
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
 
 <table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCION CLASE </span></td>
          <td width="15%" align="center" valign="middle"><span class="Arial4">
			<script type="text/javascript" language="JavaScript">
            document.write (Muestrafecha());
         </script>
          <br />
          <span class="Arial2">
			<script type="text/javascript">
            window.onload=function(){startTime();}
        </script>
            <div id="reloj"></div>
          </span></span></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" class="borde_button">
          <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" >

  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
	
    <tbody>
   <tr>
                <td width="343" align="center" ><img src="./images/configuracion.png" width="200" height="200" /></td>
                <td width="481" align="left" bgcolor="#FFFFFF">
 
 
<form id="registrar_usuario" name="form1"  method="POST"  >
 
<table align="center" width="600px">
 
    <tr>
        <td colspan="2" align="center"><span class="Arial4">Registrar Nuevo Vecino</span></td>
    </tr>
    <tr>
        <td colspan="2" class="Arial2">Para registrar un vecino, s&oacute;lo debes llenar
        los siguientes campos y pulsar el bot&oacute;n <b>Crear Vecino</b>. La cuenta del vecino se activa inmediatamente.
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right" valign="middle" class="borde_button"></td>
   	</tr>
    <tr>
       <td class="Arial2"><label>Nombres</label></td>
       <td><input type="text" name="Nombres" autocomplete="off" <?php if (isset($Nombres)) {echo 'value="'.$Nombres.'"';}?> required="required"/></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Apellido Paterno</label></td>
       <td><input type="text" name="ApellidoPat" autocomplete="off" <?php if (isset($ApellidoPat)) {echo 'value="'.$ApellidoPat.'"';}?> required="required"/></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Apellido Materno</label></td>
       <td><input type="text" name="ApellidoMat" autocomplete="off" <?php if (isset($ApellidoMat)) {echo 'value="'.$ApellidoMat.'"';}?> required="required"/></td>
    </tr> 
    <tr>
       <td class="Arial2"><label>Rut</label></td>
       <td><input type="text" name="Rut"  autocomplete="off" <?php if (isset($Rut)) {echo 'value="'.$Rut.'"';}?> required="required"/></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Sexo</label></td>
       <td>
       <select name="Sexo"  required="required" >
			<option value="">Seleccione Sexo</option>
			<option value="M" <?php if(isset($Sexo) && $Sexo == 'M'){ echo 'selected="selected"'; } ?>>Masculino</option>
			<option value="F" <?php if(isset($Sexo) && $Sexo == 'F'){ echo 'selected="selected"'; } ?>>Femenino</option>
        </select>      
       </td>
    </tr>
    <tr>
       <td class="Arial2"><label>Fono Casa</label></td>
       <td><input type="text" name="Fono1"  autocomplete="off" <?php if (isset($Fono1)) {echo 'value="'.$Fono1.'"';}?> required="required"/></td>
    </tr>
     <tr>
       <td class="Arial2"><label>Fono Celular</label></td>
       <td><input type="text" name="Fono2"  autocomplete="off" <?php if (isset($Fono2)) {echo 'value="'.$Fono2.'"';}?> /></td>
    </tr>
    <tr>
       <td class="Arial2"><label>Region</label></td>
       <td>
       <select name="idCiudad" class="form-control" onChange="cambia_ciudad();" required="required" >
       	<option value="" selected="selected">Seleccione una region</option>
        <?php foreach ($arrCiudad as $ciudad) { ?>
        <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
         <?php } ?>             
       </select>
       </td>
    </tr>
    
	<tr>
       <td class="Arial2"><label>Comuna</label></td>
       <td>
       <select name="idComuna" class="form-control" onChange="cambia_comuna(); cambia_comuna2();" required="required" >  
            <option value="" selected>---</option>         
       </select>
       </td>
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
    alert("La region seleccionada no posee comunas asignadas");
}
	document.form1.idComuna.options[0].selected = true
}
</script>
			
            <tr>
               <td class="Arial2"><label>Filtro Villa</label></td>
               <td><input type="text" onkeyup="MyUtil.selectFilter('villa', this.value)" placeholder="Filtro" class="filter" /></td>
            </tr>
            
            <tr>
               <td class="Arial2"><label>Villa</label></td>
               <td>
               <select name="idVilla" class="form-control" id="villa" >  
                    <option value="" selected>Seleccione una villa</option>       
               </select>
               </td>
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
               <td class="Arial2"><label>Filtro Calle</label></td>
               <td><input type="text" onkeyup="MyUtil.selectFilter('calle', this.value)" placeholder="Filtro" class="filter"/></td>
            </tr>
           
            <tr>
               <td class="Arial2"><label>Calle</label></td>
               <td>
               <select name="idCalle" class="form-control" required id="calle" >  
                    <option value="" selected>---</option>        
               </select>
               </td>
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
	    document.form1.idCalle.options[0].text = "Seleccione una Comuna"
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
               <td class="Arial2"><label>N° de Calle</label></td>
               <td>
              <input type="text" id="text2" placeholder="N° de Calle" class="form-control"  name="n_calle" required >
               </td>
            </tr> 
    
    
    <tr>
       <td class="Arial2"><label>Email</label></td>
       <td><input type="text" name="email" autocomplete="off" <?php if (isset($email)) {echo 'value="'.$email.'"';}?> /></td>
    </tr>
 
    <tr><td colspan="2">&nbsp;</td></tr>
 	<tr>
        <td align="center" colspan="2">
            <input name="Estado" type="hidden" value="1" />
            <?php date_default_timezone_set('UTC'); ?>
            <input name="fcreacion" type="hidden" value="<?php echo date("Y-m-d");?>" /> 
            <a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" name="submit" value="Crear Vecino" class="rojo_sombra">
        </td>
	</tr>
</table>
</form>
</td>
              </tr>
              
    </tbody>
<?php require_once 'core/footer.php';?> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
// SE TRAE UN LISTADO DE TODOS LOS USUARIOS
$arrUsers = array();
$query = "SELECT 
clientes_listado.idCliente, 
clientes_listado.Rut, 
clientes_listado.Nombres,
clientes_listado.ApellidoPat, 
clientes_listado.ApellidoMat, 
clientes_listado.Fono1,
detalle_general.Nombre AS estado
FROM clientes_listado 
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = clientes_listado.Estado
ORDER BY clientes_listado.Nombres ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>        
		
<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluación<br />
          <span class="Arial4">EXAMEN PRACTICO DE CONDUCCIÓN CLASE </span></td>
          <td width="15%" align="center" valign="middle"><span class="Arial4">
			<script type="text/javascript" language="JavaScript">
            document.write (Muestrafecha());
         </script>
          <br />
          <span class="Arial2">
			<script type="text/javascript">
            window.onload=function(){startTime();}
        </script>
            <div id="reloj"></div>
          </span></span></td>
        </tr>
        <tr>
          <td colspan="3" align="right" valign="middle" class="borde_button">
          <a href="<?php echo $location; ?>?new=true" ><input type="button" class="rojo_sombra margin_button" value="Crear Vecino" /></a>
          </td>
        </tr>
        <tr>
          <td colspan="3" >

  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
	<thead>
      <tr>
        <th width="200" align="center" >Rut</th>
        <th align="center" >Nombre del Vecino</th>
        <th width="100" align="center" >Fono</th>
        <th width="100" align="center" >Estado</th>
        <th width="100" align="center" >Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($arrUsers as $usuarios) { ?>
    <tr>
        <td width="200" align="center"><?php echo $usuarios['Rut']; ?></td>
        <td align="center"><?php echo $usuarios['Nombres'].' '.$usuarios['ApellidoPat'].' '.$usuarios['ApellidoMat']; ?></td>
        <td width="100" align="center"><?php echo $usuarios['Fono1']; ?></td>
        <td width="100" align="center"><?php echo $usuarios['estado']; ?></td>
        <td width="100"  align="center" class="options-width">
          <a href="pruebas.php?usr=<?php echo $usuarios['idCliente']; ?>" title="Ver Pruebas" class="icon-ver info-tooltip"></a>
          <a href="<?php echo $location.'?id='.$usuarios['idCliente']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a>
          <!--<?php $ubicacion=$location.'?del='.$usuarios['idCliente'];?>
          <a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>-->	
       </td>
    </tr>
<?php } ?>
    </tbody>

<?php require_once 'core/footer.php';?>              
<?php } ?>
<!-- InstanceEndEditable -->
</div>
</body>
<!-- InstanceEnd --></html>
