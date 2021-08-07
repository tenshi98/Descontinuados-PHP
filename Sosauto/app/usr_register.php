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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_2.php';
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
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "cargando.php";
$location .= $w;
//formulario para iniciar sesion
if ( !empty($_POST['submit_register']) )  { 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_listado_4.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_listado.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro de Usuario</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/estilo1.css" rel="stylesheet" type="text/css" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="register_body">
  <div class="form_register">
<?php 
// Se trae un listado de todas las comunas
$arrComunas = array();
$query = "SELECT  idComuna, Nombre
FROM `mnt_comunas`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrComunas,$row );
}?>
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
   
  <h2>Registro de Usuario</h2>           
  <form method="post">
    <input type="text" name="Nombre" placeholder="Nombre Completo"  required="" id="rut"  value="<?php if (isset($Nombre)) { echo $Nombre;}?>"  >
    <input type="text" name="Rut"    placeholder="Rut Usuario"      required="" id="rut"  value="<?php if (isset($Rut)) { echo $Rut;}?>"  >
    <select name="Sexo"  required>
        <option value="" selected="selected">Seleccione Sexo</option>
        <option value="M" <?php if(isset($Sexo)&&$Sexo=='M'){echo 'selected="selected"';}?>>Masculino</option>
        <option value="F" <?php if(isset($Sexo)&&$Sexo=='F'){echo 'selected="selected"';}?>>Femenino</option>        
    </select>                   
    <input type="text" name="Direccion"  placeholder="Direccion Usuario"  required=""  value="<?php if (isset($Direccion)) { echo $Direccion;}?>"  >
    <input type="text" name="Fono1"      placeholder="Telefono Fijo"                   value="<?php if (isset($Fono1)) { echo $Fono1;}?>"  >
    <input type="text" name="Fono2"      placeholder="Telefono Celular"                value="<?php if (isset($Fono2)) { echo $Fono2;}?>"  >
    <input type="text" name="Ciudad"     placeholder="Ciudad"             required=""  value="<?php if (isset($Ciudad)) { echo $Ciudad;}?>"  >
    <select name="Comuna"  >
    <option value="" selected="selected">Seleccione una comuna</option>
    <?php foreach ($arrComunas as $com) { ?>
    <option value="<?php echo $com['idComuna']; ?>" <?php if(isset($Comuna)&&$Comuna==$com['idComuna']) {echo 'selected="selected"';}?>><?php echo $com['Nombre']; ?></option>
    <?php } ?>             
    </select>
                    
    
    <input type="hidden" name="fcreacion"       value="<?php echo fecha_actual(); ?>"  >
    <input type="hidden" name="Estado"          value="1"  >
    <input type="hidden" name="Pais"            value="Chile"  >
    <input type="hidden" name="primer_ingreso"  value="1"  >
    <input type="hidden" name="Imei"            value="<?php echo $_GET['IMEI']; ?>"  >
    <input type="hidden" name="Gsm"             value="<?php echo $_GET['GSM']; ?>"  >
    <input type="hidden" name="Latitud"         value="<?php echo $_GET['Latitud']; ?>"  >
    <input type="hidden" name="Longitud"        value="<?php echo $_GET['Longitud']; ?>"  >
    
    <input type="submit" name="submit_register" value="Registrarse" class="btn btn_blue">
  </form>
  <div class="clear"></div>
  </div>
</div>
</body>
</html>