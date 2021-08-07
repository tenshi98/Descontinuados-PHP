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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
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
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "ingresos_observaciones.php";
$location = $original;
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 
	//Se consiguen entregadas anteriormente
	$location .='?id_Oirs='.$_GET['id_Oirs'];
	$location .='&idUsuario='.$_GET['idUsuario'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/oirs_observaciones.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/oirs_observaciones_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/oirs_observaciones.php';
}

//Creacion de las variables a utilizar
date_default_timezone_set("Chile/Continental");
$Hora           = date("H:i:s",time());
$Fecha          = date("Y-m-d");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
	<link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
    
</head>

<body class="oirs_obs">
<?php // Se trae un listado con todas las observaciones de la OIRS
$arrObservaciones = array();
$query = "SELECT 
oirs_observaciones.Fecha,
oirs_observaciones.Hora,
oirs_observaciones.Detalle,
usuarios_listado.Nombre
FROM `oirs_observaciones`
LEFT JOIN `usuarios_listado` ON usuarios_listado.idUsuario = oirs_observaciones.idUsuario
WHERE id_Oirs = '{$_GET['id_Oirs']}'
ORDER BY id_OirsObservaciones ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrObservaciones,$row );
}?>
<form method="post">
<table class="width100">
<?php foreach ($arrObservaciones as $obs) { ?>
  <tr>
    <td>
    <div class="box_obs">
    <h1><?php echo 'Escrito por '.$obs['Nombre'].' el '.Fecha_completa_alt($obs['Fecha']).' a las '.$obs['Hora'] ?></h1>
    <p><?php echo $obs['Detalle'] ?></p>
    </div> 
    </td>
  </tr>
<?php } ?>
  <tr>
    <td>
    <textarea name="Detalle" class="form-control" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 54px;" placeholder="Ingrese su observacion aqui"></textarea> 
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
    <input type="hidden" name="id_Oirs"   value="<?php echo $_GET['id_Oirs']; ?>" >
	<input type="hidden" name="idUsuario" value="<?php echo $_GET['idUsuario']; ?>" >
    <input type="hidden" name="Fecha"     value="<?php echo $Fecha; ?>" >
    <input type="hidden" name="Hora"      value="<?php echo $Hora; ?>" >  
    <input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Observacion" name="submit">
    </td>
  </tr>
</table>
</form>
</body>
</html>