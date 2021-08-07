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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario2.php';
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
$location = "modusr_alarma_form.php";
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Formulario creacion
if ( !empty($_POST['submit_edit']) )  { 
	//Agregamos direcciones
	$location.='&iduser='.$_GET['iduser'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_listado.php';
}
/**********************************************************************************************************************************/
/*                                    Se llaman los datos para completar el formulario                                            */
/**********************************************************************************************************************************/

//Se traen los datos del vehiculo seleccionado
$query ="SELECT Radio, Alarma
FROM `clientes_listado`
WHERE idCliente='{$_GET['iduser']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link href="css/jquery_ui.css" rel="stylesheet" type="text/css" />
</head>

<body>


<script src="js/jquery.js"></script>
<script src="js/jquery-mobile.js"></script> 
<form method="post"   > 
<table class="table_msg">
  <tr>
    <td colspan="2">Rango de alcance de Alarmas (KM)</td>
  </tr>
  <tr>
    <td colspan="2">
    <input type="range" name="Radio" id="slider-2" data-highlight="true" min="1" max="20" value="<?php echo $row_data['Radio'];?>">
    </td>
  </tr>
  <tr>
    <td>Recepcion Alarmas</td>
    <td>
    <select name="Alarma" id="flip-1" data-role="slider">
        <option value="Si" <?php if($row_data['Alarma']=='Si'){echo 'selected="selected"';}?> >Si</option>
        <option value="No" <?php if($row_data['Alarma']=='No'){echo 'selected="selected"';}?> >No</option>
    </select>
    </td>
  </tr>
 <tr>
    <td colspan="2">
    <div class="disable_jquery_style">
 	 <input name="idCliente" type="hidden" value="<?php echo $_GET['iduser'] ?>" />	
     <input name="submit_edit" type="submit"  id="post_button" class="eeeee"   value="Modificar"/>
     
    </div>
    </td>
  </tr>



  
</table>  

   
</form>
</body>
</html>