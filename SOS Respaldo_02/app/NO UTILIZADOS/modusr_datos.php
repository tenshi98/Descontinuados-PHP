<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_3.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "modusr_datos.php";
$location .= $w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para iniciar sesion
if ( !empty($_POST['submit_edit']) )  { 
	//Agregamos direcciones
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_listado_5.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_listado.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Mis datos</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->


<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
      <div class="text_content pd_top_5">
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
<?php  if (isset($_GET['mod'])) {?>
<div class="alert alert-success alert-dismissable" id="txf_01">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">&times;</button>
    <p class="long_txt"><b>Alerta!</b> Datos personales actualizados correctamente.</p>
</div>
<?php }?>       
<?php 
//Se revisa si el dispositivo esta registrado
$query = "SELECT Nombre, Rut, Sexo, email, Direccion, Fono1, Fono2, idCiudad , idComuna FROM `clientes_listado` WHERE idCliente = '".$arrCliente['idCliente']."'";
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

   
  <h2>Modificacion de datos</h2>       
  <form method="post" name="form1">
  	<label>Nombre Completo</label>
    <input type="text" name="Nombre" placeholder="Nombre Completo"   id="rut"  value="<?php if (isset($Nombre)) { echo $Nombre;}else{ echo $row_data['Nombre'];}?>"  >
    <label>Rut Usuario</label>
    <input type="text" name="Rut"    placeholder="Rut Usuario"      id="rut"  value="<?php echo $row_data['Rut'] ?>"  disabled="disabled" >
    <label>Seleccione Sexo</label>
    <select name="Sexo"  required>
        <option value="" selected="selected">Seleccione Sexo</option>
        <option value="M" <?php if(isset($Sexo)&&$Sexo=='M'){echo 'selected="selected"';}elseif($row_data['Sexo']=='M'){echo 'selected="selected"';}?>>Masculino</option>
        <option value="F" <?php if(isset($Sexo)&&$Sexo=='F'){echo 'selected="selected"';}elseif($row_data['Sexo']=='F'){echo 'selected="selected"';}?>>Femenino</option>        
    </select>                   
    <label>Direccion email</label>
    <input type="text" name="email"      placeholder="Direccion email"      value="<?php if (isset($email)) { echo $email;}else{ echo $row_data['email'];}?>"  >
    <label>Direccion Usuario</label>
    <input type="text" name="Direccion"  placeholder="Direccion Usuario"    value="<?php if (isset($Direccion)) { echo $Direccion;}else{ echo $row_data['Direccion'];}?>"  >
    <label>Telefono Fijo</label>
    <input type="tel"  name="Fono1"      placeholder="Telefono Fijo"        value="<?php if (isset($Fono1)) { echo $Fono1;}else{ echo $row_data['Fono1'];}?>"  >
    <label>Telefono Celular</label>
    <input type="tel"  name="Fono2"      placeholder="Telefono Celular"     value="<?php if (isset($Fono2)) { echo $Fono2;}else{ echo $row_data['Fono2'];}?>"  >
	
	<label>Seleccione una region</label>
    <select name="idCiudad" onChange="cambia_ciudad()" >
    <option value="" selected="selected">Seleccione una region</option>
    <?php foreach ($arrCiudad as $ciudad) { ?>
    <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}elseif($row_data['idCiudad']==$ciudad['idCiudad']){echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
    <?php } ?>             
    </select>
	
	<label>Seleccione una comuna</label>
    <select name="idComuna"  >
    <option value="" selected="selected">Seleccione una comuna</option>
    <?php foreach ($arrComuna as $com) { ?>
    <option value="<?php echo $com['idComuna']; ?>" <?php if(isset($idComuna)&&$idComuna==$com['idComuna']) {echo 'selected="selected"';}elseif($row_data['idComuna']==$com['idComuna']){echo 'selected="selected"';}?>><?php echo $com['Nombre']; ?></option>
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
    alert("La Region seleccionada no posee comunas asignadas");
}
	document.form1.idComuna.options[0].selected = true
}
</script> 
    
    

    <input type="hidden" name="primer_ingreso"  value="2"  >
    <input type="hidden" name="idCliente"       value="<?php echo $arrCliente['idCliente'] ?>"  >
    
    <input type="submit" name="submit_edit" value="Actualizar" class="btn btn_blue">
  </form>
  <div class="clear"></div>

        
   
		<a href="principal_datos.php<?php echo $w; ?>" class="btn btn_blue">Volver</a>  
      </div>  
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>