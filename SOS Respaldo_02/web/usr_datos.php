<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_cliente_2.php';
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
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once 'core/config_app.php';
//require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "usr_datos.php";
$location = $original.$w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
if ( !empty($_POST['submit']) )     {
	//Agregamos direcciones
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_6.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_listado.php';	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/normal2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Modificacion datos personales</title>
<!-- InstanceEndEditable -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/estilo.css">
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<!-- InstanceBeginEditable name="head" -->



<!-- InstanceEndEditable -->
</head>
<body>
<?php require_once 'core/menu.php';?>
<!-- InstanceBeginEditable name="cuerpo" -->
    <div class="container">
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
    
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['mod_datos']) ) { 
//Se traen los datos del usuario
$query = "SELECT Nombre, Apellido_Paterno, Apellido_Materno, email,Rut, Sexo, fNacimiento,Direccion,Fono1,Fono2, idCiudad, idComuna
FROM `clientes_listado` 
WHERE idCliente = '".$arrCliente['idCliente']."'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc($resultado);
// Se trae un listado de todas las ciudades
$arrCiudad = array();
$query = "SELECT  idCiudad, Nombre
FROM `mnt_ubicacion_ciudad`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrCiudad,$row );
}
// Se trae un listado con todas las comunas
 if ($row_data['idCiudad']!=0&&$row_data['idCiudad']!=''){
	$arrComuna = array();
	$query = "SELECT idComuna,Nombre
	FROM `mnt_ubicacion_comunas`
	WHERE idCiudad = ".$row_data['idCiudad']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrComuna,$row );
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
?>
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.10.4.custom.css" />   
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
$(function() {
	$("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()       
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


<div class="col-xs-7 fcenter">
<h2>Modificacion de Mis Datos Personales</h2>

<form class="form-horizontal" method="post" name="form1">

  <div class="form-group">
    <label>Nombres</label>
    <input type="text" class="form-control" placeholder="Nombres" required="required" name="Nombre" value="<?php if(isset($Nombres)){echo $Nombres;}else{echo $row_data['Nombre'];}?>">
  </div>
  <div class="form-group">
    <label>Apellido_Paterno</label>
    <input type="text" class="form-control" placeholder="Apellido_Paterno" required="required" name="Apellido_Paterno" value="<?php if(isset($Apellido_Paterno)){echo $Apellido_Paterno;}else{echo $row_data['Apellido_Paterno'];}?>">
  </div>
  <div class="form-group">
    <label>Apellido_Materno</label>
    <input type="text" class="form-control" placeholder="Apellido_Materno" required="required" name="Apellido_Materno" value="<?php if(isset($Apellido_Materno)){echo $Apellido_Materno;}else{echo $row_data['Apellido_Materno'];}?>">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" placeholder="Email" required="required" name="email" value="<?php if(isset($email)){echo $email;}else{echo $row_data['email'];}?>">
  </div>
  <div class="form-group">
    <label>Rut</label>
    <input type="text" class="form-control" placeholder="Rut" required="required" name="Rut" value="<?php if(isset($Rut)){echo $Rut;}else{echo $row_data['Rut'];}?>">
  </div>
  <div class="form-group"> 
    <label>Genero</label>
  	<select name="Sexo" class="form-control">
          <option value="" selected="selected">Seleccione un genero</option>
          <option value="M" <?php if(isset($Sexo)&&$Sexo=='M'){echo 'selected="selected"';}elseif($row_data['Sexo']=='M'){echo 'selected="selected"';}?>>Masculino</option>
		  <option value="F" <?php if(isset($Sexo)&&$Sexo=='F'){echo 'selected="selected"';}elseif($row_data['Sexo']=='F'){echo 'selected="selected"';}?>>Femenino</option>
        </select> 
  </div>
  
  <div class="form-group">
	<label>Fecha Nacimiento</label>
		<div class="input-group bootstrap-timepicker width100">
			<input placeholder="Fecha Nacimiento" class="form-control timepicker-default" type="text" name="fNacimiento" id="datepicker" value="<?php if(isset($fNacimiento)){echo $fNacimiento;}else{echo $row_data['fNacimiento'];}?>" >
			<span class="input-group-addon add-on"><i class="glyphicon glyphicon-calendar"></i></span> 
		</div>  
  </div>
  
  <div class="form-group">
    <label>Fono1</label>
    <input type="text" class="form-control" placeholder="Fono1" required="required" name="Fono1" value="<?php if(isset($Fono1)){echo $Fono1;}else{echo $row_data['Fono1'];}?>">
  </div>
  <div class="form-group">
    <label>Fono2</label>
    <input type="text" class="form-control" placeholder="Fono2" required="required" name="Fono2" value="<?php if(isset($Fono2)){echo $Fono2;}else{echo $row_data['Fono2'];}?>">
  </div>

  
  <div class="form-group">
  <label>Ciudad</label>     
        <select name="idCiudad" onChange="cambia_ciudad()" class="form-control">
          <option value="" selected="selected">Seleccione una Ciudad</option>
          <?php foreach ($arrCiudad as $ciudad) { ?>
    	  <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}elseif($row_data['idCiudad']==$ciudad['idCiudad']){echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
          <?php } ?>
        </select> 
  </div>
  
  <div class="form-group">
      <label>Comuna</label>     
        <select name="idComuna" class="form-control">
          <option value="" selected="selected">Seleccione una Comuna</option>
          <?php foreach ($arrComuna as $com) { ?>
          <option value="<?php echo $com['idComuna']; ?>" <?php if(isset($idComuna)&&$idComuna==$com['idComuna']) {echo 'selected="selected"';}elseif($row_data['idComuna']==$com['idComuna']){echo 'selected="selected"';}?>><?php echo $com['Nombre']; ?></option>
          <?php } ?>
        </select> 
  </div>
  
  <div class="form-group">
    <label>Direccion</label>
    <input type="text" class="form-control" placeholder="Direccion" required="required" name="Direccion" value="<?php if(isset($Direccion)){echo $Direccion;}else{echo $row_data['Direccion'];}?>">
  </div>
  

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


  
  
  
  
  <input type="hidden"   name="idCliente" value="<?php echo $arrCliente['idCliente'] ?>"   >
  
  <div class="form-group">
      <input name="submit" type="submit" class="btn btn-primary btn-block" value="Modificar">
      <a class=" btn btn-block <?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_color_texto'] ?> " href="<?php echo $location ?>">Volver</a>
  </div>
</form>


</div>





<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Se traen los datos del usuario
$query = "SELECT 
clientes_listado.Nombre, 
clientes_listado.Apellido_Paterno, 
clientes_listado.Apellido_Materno, 
clientes_listado.email, 
clientes_listado.Rut, 
clientes_listado.Sexo, 
clientes_listado.fNacimiento, 
clientes_listado.Direccion, 
clientes_listado.Fono1, 
clientes_listado.Fono2, 
mnt_ubicacion_ciudad.Nombre AS nombre_ciudad, 
mnt_ubicacion_comunas.Nombre AS nombre_comuna
FROM `clientes_listado` 
LEFT JOIN `mnt_ubicacion_ciudad`    ON mnt_ubicacion_ciudad.idCiudad    = clientes_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`   ON mnt_ubicacion_comunas.idComuna   = clientes_listado.idComuna
WHERE clientes_listado.idCliente = '".$arrCliente['idCliente']."'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc($resultado);
?>
<div class="col-xs-7 fcenter">
<h2>Mis Datos Personales</h2>

<table class="table table-hover">
<thead>
	<tr>
    	<th></th>
        <th></th>
    </tr>
</thead>
<tbody>
	<tr><td><strong>Nombre</strong> : </td>              <td><?php echo $row_data['Nombre'].' '.$row_data['Apellido_Paterno'].' '.$row_data['Apellido_Materno'] ?></td></tr>
    <tr><td><strong>Email</strong> : </td>               <td><?php echo $row_data['email'] ?></td></tr>
    <tr><td><strong>Rut</strong> : </td>                 <td><?php echo $row_data['Rut'] ?></td></tr>
    <tr><td><strong>Sexo</strong> : </td>                <td><?php if($row_data['Sexo']='M'){echo 'Hombre';}elseif($row_data['Sexo']='F'){echo 'Mujer';} ?></td></tr>
    <tr><td><strong>Fecha Nacimiento</strong> : </td>    <td><?php echo $row_data['fNacimiento'] ?></td></tr>
    <tr><td><strong>Ciudad</strong> : </td>              <td><?php echo $row_data['nombre_ciudad'] ?></td></tr>
    <tr><td><strong>Comuna</strong> : </td>              <td><?php echo $row_data['nombre_comuna'] ?></td></tr>
    <tr><td><strong>Direccion</strong> : </td>           <td><?php echo $row_data['Direccion'] ?></td></tr>
    <tr><td><strong>Fono1</strong> : </td>               <td><?php echo $row_data['Fono1'] ?></td></tr>
    <tr><td><strong>Fono2</strong> : </td>               <td><?php echo $row_data['Fono2'] ?></td></tr>
</tbody>
</table>
<a class="btn btn-block <?php echo $config_app['btn_enlace_color_fondo'].' '.$config_app['btn_enlace_radio'].' '.$config_app['btn_enlace_color_texto'] ?> btn_link" href="<?php echo $location.'&mod_datos=true'; ?>">Modificar</a>


   
</div>
<?php } ?>
</div> <!-- /container -->
<!-- InstanceEndEditable -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>  
</body>
<!-- InstanceEnd --></html>