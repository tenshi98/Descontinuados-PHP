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
/*                                          Se filtran las entradas para evitar ataques                                           */
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
$location = "pruebas.php";
//se agrega la nueva ubicacion
$location .= "?usr=".$_GET['usr']; 
//formulario para crear usuario
if ( !empty($_POST['submit']) )  {
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_pruebas.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_pruebas_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_pruebas.php';
}
//formulario para editar permiso
if ( !empty($_POST['submit_edit']) )  {	
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_pruebas.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_pruebas_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_pruebas.php';
}
/**********************************************************************************************************************************/
/*                          Se llaman a las partes de los formularios encargados de borrar los datos                              */
/**********************************************************************************************************************************/
//se borra un dato
if ( !empty($_GET['del']) )     {require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/clientes_pruebas.php';}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/plant1.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title>Pruebas</title>
<!-- InstanceEndEditable -->
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/tabla.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js'></script>
<script type='text/javascript' src='js/infogrid.js'></script>
<link rel="icon" type="image/png" href="img/mifavicon.png" />
<!-- InstanceBeginEditable name="head" -->
<script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js'></script>

<script>

$(function() {

  $(".numbers-row").append('<div class="inc button">+</div><div class="dec button">-</div>');

  $(".button").on("click", function() {

    var $button = $(this);
    var oldValue = $button.parent().find("input").val();

    if ($button.text() == "+") {
  	  var newVal = parseFloat(oldValue) + 1;
  	} else {
	   // Don't allow decrementing below zero
      if (oldValue > 0) {
        var newVal = parseFloat(oldValue) - 1;
	    } else {
        newVal = 0;
      }
	  }

    $button.parent().find("input").val(newVal);

  });

});

</script>
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
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['evaluacion']) ) { 
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
clientes_listado.Rut,
clientes_listado.Nombres, 
clientes_listado.ApellidoPat, 
clientes_listado.ApellidoMat,
clientes_listado.Sexo,
clientes_listado.Fono1 AS Fono, 
clientes_listado.email
FROM `clientes_listado`
WHERE clientes_listado.idCliente = {$_GET['usr']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);
//SE TRAEN TODOS LOS DATOS DEL FORMULARIO	
$query = "SELECT 
Vehiculo, Nombre_examinador, Nombre_escuela, Comuna_escuela, checkbox01, checkbox02, checkbox03, checkbox04, checkbox05, checkbox06, checkbox07, checkbox08, checkbox09, checkbox10, checkbox11, checkbox12, checkbox13, checkbox14, checkbox15, checkbox16, checkbox17, checkbox18, checkbox19, checkbox20, checkbox21, checkbox22, checkbox23, checkbox24, checkbox25, checkbox26, checkbox27, checkbox28, checkbox29, checkbox30, checkbox31, checkbox32, checkbox33, checkbox34, checkbox35, checkbox36, checkbox37, checkbox38, checkbox39, checkbox40, checkbox41, checkbox42, checkbox43, checkbox44, checkbox45, checkbox46
FROM `clientes_pruebas`
WHERE idPrueba = {$_GET['evaluacion']}";
$resultado = mysql_query ($query, $dbConn);
$rowform = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado); ?>



<table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr>
          <td width="17%" height="50" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="67%" align="center" valign="middle"><span class="Arial1">FICHA DE EVALUACION</span><br />
            <span class="Arial4">EXAMEN PRACTICO DE CONDUCCIÓN CLASE B</span></td>
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
          <td colspan="3" align="left"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin margin_top">
            <tr>
              <td height="10" class="tabla_tit">Identidad del Postulante</td>
              </tr>
            <tr>
              <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="20%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr>
                      <td class="campo_txt"><strong>Rut:</strong><?php echo $rowusr['Rut']; ?></td>
                      </tr>
                    </table></td>
                  <td width="40%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr>
                      <td class="campo_txt"><strong>Nombres:</strong><?php echo $rowusr['Nombres']; ?></td>
                      </tr>
                    </table></td>
                  <td width="40%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr>
                      <td class="campo_txt"><strong>Apellidos:</strong><?php echo $rowusr['ApellidoPat'].' '.$rowusr['ApellidoMat']; ?></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
              <tr>
                <td height="10" class="tabla_tit">Información del Postulante</td>
                </tr>
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="0" >
                  <tr>
                    <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td class="campo_txt"><strong>Sexo:</strong><?php if($rowusr['Sexo']=='M'){echo 'Masculino';}else{echo 'Femenino';}; ?></td>
                        </tr>
                      </table></td>
                    <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td class="campo_txt"><strong>Transmisión: </strong>
                          <?php if ( $rowform['Vehiculo'] == '1') {
								echo 'Mecanico';	
							} else {
								echo 'Automatico';
							}?>
                          </td>
                        </tr>
                      </table></td>
                    <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td class="campo_txt"><strong>Telefono:</strong><?php echo $rowusr['Fono']; ?></td>
                        </tr>
                      </table></td>
                    <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td class="campo_txt"><strong>Email:</strong><?php echo $rowusr['email']; ?></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
              <tr>
                <td height="10" class="tabla_tit">Información Examinador y Escuela de Conducir</td>
                </tr>
              <tr>
                <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="40%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td class="campo_txt"><strong>Examinador:</strong><?php echo $rowform['Nombre_examinador']; ?></td>
                        </tr>
                      </table></td>
                    <td width="40%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td class="campo_txt"><strong>Escuela: </strong><?php echo $rowform['Nombre_escuela']; ?> <strong> Comuna: </strong><?php echo $rowform['Comuna_escuela']; ?></td>
                        </tr>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
              </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="50%" align="center" valign="top"><table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                  <thead>
                    <tr>
                      <th colspan="2">COMPROBACIONES PREVIAS</th>
                      <th colspan="2">Total</th>
                      </tr>
                    </thead>
                  <tr>
                    <td width="54">L1</td>
                    <td>Documentos</td>
                    <td width="32" align="center"><?php echo $rowform['checkbox01']; ?></td>
                    <td width="25">L</td>
                    </tr>
                  <tr>
                    <td>L2</td>
                    <td>Ajuste espejo/asiento</td>
                    <td><?php echo $rowform['checkbox02']; ?></td>
                    <td>L</td>
                    </tr>
                  <tr>
                    <td>R1</td>
                    <td width="761">Sin cinturón(conductor y pasajero)</td>
                    <td><?php echo $rowform['checkbox03']; ?></td>
                    <td>R</td>
                    </tr>
                  <tr>
                    <td>L3</td>
                    <td>Arranque con motor en marcha</td>
                    <td><?php echo $rowform['checkbox04']; ?></td>
                    <td>L</td>
                    </tr>
                  <tr>
                    <td>L4</td>
                    <td>No quitar freno de estacionamiento</td>
                    <td><?php echo $rowform['checkbox05']; ?></td>
                    <td>L</td>
                    </tr>
                  <tr>
                    <td>L5</td>
                    <td>Puertas mal cerradas</td>
                    <td><?php echo $rowform['checkbox06']; ?></td>
                    <td>L</td>
                    </tr>
                  </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">INGRESO A LA CIRCULACIÓN</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">G1</td>
                      <td width="761">Obstaculizar</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox07']; ?></td>
                      <td width="25">G</td>
                      </tr>
                    <tr>
                      <td>R2</td>
                      <td>Generar Riesgo</td>
                      <td><?php echo $rowform['checkbox08']; ?></td>
                      <td>R</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">CIRCULACIÓN NORMAL </th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">R7</td>
                      <td width="761">Exceso de Velocidad</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox09']; ?></td>
                      <td width="20">R</td>
                      </tr>
                    <tr>
                      <td>G15</td>
                      <td>No respetar  Distancias</td>
                      <td><?php echo $rowform['checkbox10']; ?></td>
                      <td>G</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">CAMBIO DE PISTA</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">L6</td>
                      <td width="761">Subir, forzar, golpear cuneta </td>
                      <td width="32" align="center"><?php echo $rowform['checkbox11']; ?></td>
                      <td width="25">L</td>
                      </tr>
                    <tr>
                      <td>G2</td>
                      <td>Cambio brusco obstaculizando</td>
                      <td><?php echo $rowform['checkbox12']; ?></td>
                      <td>G</td>
                      </tr>
                    <tr>
                      <td>G3</td>
                      <td>No señalizar o hacerlo mal</td>
                      <td><?php echo $rowform['checkbox13']; ?></td>
                      <td>G</td>
                      </tr>
                    <tr>
                      <td>L7</td>
                      <td>No quitar señal</td>
                      <td><?php echo $rowform['checkbox14']; ?></td>
                      <td>L</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">VIRAJES</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">L8</td>
                      <td width="761">No señalizar o hacerlo mal</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox15']; ?></td>
                      <td width="25">L</td>
                      </tr>
                    <tr>
                      <td>L9</td>
                      <td>No señalizar o hacerlo mal</td>
                      <td><?php echo $rowform['checkbox16']; ?></td>
                      <td>L</td>
                      </tr>
                    <tr>
                      <td>L10</td>
                      <td>Subir la cuneta</td>
                      <td><?php echo $rowform['checkbox17']; ?></td>
                      <td>L</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">INTERSECCIONES</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">G6</td>
                      <td width="761">Ingresar obstaculizando</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox18']; ?></td>
                      <td width="25">G</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">ADELANTAMIENTOS / SOBREPASOS</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">R3</td>
                      <td width="761">Sobrepasar por la berma</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox19']; ?></td>
                      <td width="25">R</td>
                      </tr>
                    <tr>
                      <td>G4</td>
                      <td>Paso peatonal / Cruce no regulados</td>
                      <td><?php echo $rowform['checkbox20']; ?></td>
                      <td>G</td>
                      </tr>
                    <tr>
                      <td>G5</td>
                      <td>Riesgo en sentido contrario</td>
                      <td><?php echo $rowform['checkbox21']; ?></td>
                      <td>G</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">VIRAJES EN U</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">L15</td>
                      <td width="761">No señalizar o hacerlo mal</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox22']; ?></td>
                      <td width="25">L</td>
                      </tr>
                    </table>
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td height="10"><p class="Arial2 margin_left">Observaciones:</p></td>
                      </tr>
                  </table></td>
                <td width="50%" align="center" valign="top"><table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                  <thead>
                    <tr>
                      <th colspan="2">ESTACIONAMIENTO</th>
                      <th colspan="2">Total</th>
                      </tr>
                    </thead>
                  <tr>
                    <td width="54">L11</td>
                    <td>Separación (30 cm y 60 cm)</td>
                    <td width="32" align="center"><?php echo $rowform['checkbox23']; ?></td>
                    <td width="25">L</td>
                    </tr>
                  <tr>
                    <td>L12</td>
                    <td>Doble fila</td>
                    <td><?php echo $rowform['checkbox24']; ?></td>
                    <td>L</td>
                    </tr>
                  <tr>
                    <td>L13</td>
                    <td width="761">No poner freno de estacionamiento</td>
                    <td><?php echo $rowform['checkbox25']; ?></td>
                    <td>R</td>
                    </tr>
                  <tr>
                    <td>L14</td>
                    <td>Subir, forzar, golpear cuneta</td>
                    <td><?php echo $rowform['checkbox26']; ?></td>
                    <td>L</td>
                    </tr>
                  <tr>
                    <td>G7</td>
                    <td>Bajar sin observar el transito</td>
                    <td><?php echo $rowform['checkbox27']; ?></td>
                    <td>L</td>
                    </tr>
                  </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">DEMARCACIONES</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">G10</td>
                      <td width="761">Sobrepasar eje calzada</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox28']; ?></td>
                      <td width="25">G</td>
                      </tr>
                    <tr>
                      <td>L16</td>
                      <td>No respetarlas</td>
                      <td><?php echo $rowform['checkbox29']; ?></td>
                      <td>L</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">MANEJO DEL VEHICULO</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">R5</td>
                      <td>Golpear a alguien o algo</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox30']; ?></td>
                      <td width="25">R</td>
                      </tr>
                    <tr>
                      <td>R6</td>
                      <td>Perder el control del vehiculo</td>
                      <td><?php echo $rowform['checkbox31']; ?></td>
                      <td>R</td>
                      </tr>
                    <tr>
                      <td>L17</td>
                      <td width="761"> Relación de marchas inadecuadas</td>
                      <td><?php echo $rowform['checkbox32']; ?></td>
                      <td>L</td>
                      </tr>
                    <tr>
                      <td>G12</td>
                      <td>Confusión pedales</td>
                      <td><?php echo $rowform['checkbox33']; ?></td>
                      <td>G</td>
                      </tr>
                    <tr>
                      <td>G13</td>
                      <td>Soltar dos manos del volante</td>
                      <td><?php echo $rowform['checkbox34']; ?></td>
                      <td>G</td>
                      </tr>
                    <tr>
                      <td>G14</td>
                      <td>Circular en sentido contrario</td>
                      <td><?php echo $rowform['checkbox35']; ?></td>
                      <td>G</td>
                      </tr>
                    <tr>
                      <td>L20</td>
                      <td>Conducir de forma brusca</td>
                      <td><?php echo $rowform['checkbox36']; ?></td>
                      <td>L</td>
                      </tr>
                    <tr>
                      <td>G16</td>
                      <td>Manipular radio, celular, etc.</td>
                      <td><?php echo $rowform['checkbox37']; ?></td>
                      <td>G</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">OBSERVACIÓN</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">L21</td>
                      <td width="761">No observar el trafico</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox38']; ?></td>
                      <td width="25">L</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">SEÑALES</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">R4</td>
                      <td>Señal Pare/Luz roja</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox39']; ?></td>
                      <td width="25">R</td>
                      </tr>
                    <tr>
                      <td>G8</td>
                      <td>Señal Ceda el Paso</td>
                      <td><?php echo $rowform['checkbox40']; ?></td>
                      <td>G</td>
                      </tr>
                    <tr>
                      <td>G9</td>
                      <td width="761">Señales de prohibición/restricción</td>
                      <td><?php echo $rowform['checkbox41']; ?></td>
                      <td>G</td>
                      </tr>
                    <tr>
                      <td>R8</td>
                      <td>No obedecer a Carabineros</td>
                      <td><?php echo $rowform['checkbox42']; ?></td>
                      <td>R</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">LUCES</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">G11</td>
                      <td width="761">No encender luces</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox43']; ?></td>
                      <td width="25">G</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">PREFERENCIAS</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">G17</td>
                      <td width="761">Peatones, ciclista, otros vehiculos</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox44']; ?></td>
                      <td width="25">G</td>
                      </tr>
                    </table>
                  <table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
                    <thead>
                      <tr>
                        <th colspan="2">MANDOS DEL VEHICULO</th>
                        <th colspan="2">Total</th>
                        </tr>
                      </thead>
                    <tr>
                      <td width="54">L18</td>
                      <td width="761">Usar bocina sin motivo</td>
                      <td width="32" align="center"><?php echo $rowform['checkbox45']; ?></td>
                      <td width="25">L</td>
                      </tr>
                    <tr>
                      <td>L19</td>
                      <td>No identificar mandos</td>
                      <td align="center"><?php echo $rowform['checkbox46']; ?></td>
                      <td>L</td>
                      </tr>
                  </table></td>
                </tr>
              </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="margin_top_gde">
              <tr>
                <td align="left" valign="top">&nbsp;</td>
                <td width="50%" align="center"><table width='99%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
                  <thead>
                    <tr>
                      <th rowspan="2">Resultado Final</th>
                      <th colspan="4">Total</th>
                      </tr>
                    <tr>
                      <th>&nbsp;</th>
                      <th>L</th>
                      <th>G</th>
                      <th>R</th>
                      </tr>
                    </thead>
                  <tr>
                    <?php
				  //Se suman las leves 
				  	$ev_leve = 
					$rowform['checkbox01']+
					$rowform['checkbox02']+
					$rowform['checkbox04']+
					$rowform['checkbox05']+
					$rowform['checkbox06']+
					$rowform['checkbox11']+
					$rowform['checkbox14']+
					$rowform['checkbox15']+
					$rowform['checkbox16']+
					$rowform['checkbox17']+
					$rowform['checkbox22']+
					$rowform['checkbox23']+
					$rowform['checkbox24']+
					$rowform['checkbox26']+
					$rowform['checkbox27']+
					$rowform['checkbox29']+
					$rowform['checkbox32']+
					$rowform['checkbox36']+
					$rowform['checkbox38']+
					$rowform['checkbox45']+
					$rowform['checkbox46'];
					//Se suman las reprobadas
					$ev_r = 
					$rowform['checkbox03']+
					$rowform['checkbox08']+
					$rowform['checkbox09']+
					$rowform['checkbox19']+
					$rowform['checkbox25']+
					$rowform['checkbox30']+
					$rowform['checkbox31']+
					$rowform['checkbox39']+
					$rowform['checkbox42'];
					//Se suman las graves
					$ev_grave =
					$rowform['checkbox07']+
					$rowform['checkbox10']+
					$rowform['checkbox12']+
					$rowform['checkbox13']+
					$rowform['checkbox18']+
					$rowform['checkbox20']+
					$rowform['checkbox21']+
					$rowform['checkbox28']+
					$rowform['checkbox33']+
					$rowform['checkbox34']+
					$rowform['checkbox35']+
					$rowform['checkbox37']+
					$rowform['checkbox40']+
					$rowform['checkbox41']+
					$rowform['checkbox43']+
					$rowform['checkbox44'];
				  //Se hacen las revisiones para ver si reprueba o no
				  $ev_final = 0;
					 if($ev_leve>=10){ $ev_final = $ev_final +1;}
					 if($ev_leve>=5&&$ev_grave>=1){ $ev_final = $ev_final +1;}
				  	 if($ev_r>=1){ $ev_final = $ev_final +1;}
				  ?>
                    <td><?php 
					if($ev_final==0){
						echo 'Aprobado';
						echo '<div class="anuncio"><h1>Aprobado</h1></div>';	
					} else {
						echo 'Reprobado';
						echo '<div class="anuncio"><h1>Reprobado</h1></div>';
					}?>
                      </td>
                    <td width="32" align="center">&nbsp;</td>
                    <td width="20"><?php echo $ev_leve; ?></td>
                    <td width="20"><?php echo $ev_grave; ?></td>
                    <td width="20"><?php echo $ev_r; ?></td>
                    </tr>
                  <tr>
                    <td colspan="5">(*)1R,2G,1G+5L,10L</td>
                    </tr>
                  </table></td>
                </tr>
              </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin margin_top_gde">
              <tr><td colspan="6">&nbsp;</td></tr>
              <tr><td colspan="6">&nbsp;</td></tr>
              <tr>
                <td width="90" align="left" class="Arial2 margin_left">Firma Examinador:</td>
                <td width="272" align="left" class="Arial2 margin_left borde_bottom">&nbsp;</td>
                <td width="24" align="left">&nbsp;</td>
                <td width="83" align="left"><span class="Arial2">Firma Postulante:</span></td>
                <td width="295" align="left" class="Arial2 borde_bottom">&nbsp;</td>
                <td width="18" align="left" >&nbsp;</td>
                </tr>
              </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
              <tr><td colspan="4">&nbsp;</td></tr>
              <tr><td colspan="4">&nbsp;</td></tr>
              <tr><td colspan="4">&nbsp;</td></tr>
              <tr>
                <td width="97" align="left"><input type="button" class="rojo_sombra_print" value="Imprimir" onclick="window.print();return false;" /></td>
                <td width="653" align="left"><a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a></td>
                <td width="100" align="right" class="Arial2"></td>
                <td width="91" align="center"></td>
                </tr>
              </table>
            </td>
          </tr>
      </table></td>
    </tr>
</table>

<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['id']) ) { 
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
clientes_listado.Rut,
clientes_listado.Nombres, 
clientes_listado.ApellidoPat,
clientes_listado.ApellidoMat, 
clientes_listado.Sexo,
clientes_listado.Fono1 AS Fono, 
clientes_listado.email
FROM `clientes_listado`
WHERE clientes_listado.idCliente = {$_GET['usr']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);
//SE TRAEN TODOS LOS DATOS DEL FORMULARIO	
$query = "SELECT 
Vehiculo, Nombre_examinador, Nombre_escuela, Comuna_escuela, checkbox01, checkbox02, checkbox03, checkbox04, checkbox05, checkbox06, checkbox07, checkbox08, checkbox09, checkbox10, checkbox11, checkbox12, checkbox13, checkbox14, checkbox15, checkbox16, checkbox17, checkbox18, checkbox19, checkbox20, checkbox21, checkbox22, checkbox23, checkbox24, checkbox25, checkbox26, checkbox27, checkbox28, checkbox29, checkbox30, checkbox31, checkbox32, checkbox33, checkbox34, checkbox35, checkbox36, checkbox37, checkbox38, checkbox39, checkbox40, checkbox41, checkbox42, checkbox43, checkbox44, checkbox45, checkbox46
FROM `clientes_pruebas`
WHERE idPrueba = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowform = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado); ?>
<form method="post" >
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
          <td colspan="3" align="left"><table class="margin_top" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="20%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Rut </td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/id.png" width="20" height="20" /></td>
                      <td ><input name="textfield6" type="text" class="campo_txt" id="textfield9" value="<?php echo $rowusr['Rut']; ?>" disabled /></td>
                    </tr>
                  </table></td>
                  </tr>
              </table></td>
              <td width="40%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Nombre Postulante</td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/user.png" width="20" height="20" /></td>
                      <td width="716" ><input name="textfield9" type="text" class="campo_txt" id="textfield7" value="<?php echo $rowusr['Nombres']; ?>" disabled /></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              <td width="40%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Apellido Postulante</td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/user.png" width="20" height="20" /></td>
                      <td width="716" ><input name="textfield" type="text" class="campo_txt" id="textfield" value="<?php echo $rowusr['ApellidoPat'].' '.$rowusr['ApellidoMat']; ?>" disabled /></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
        </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Sexo</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td width="8%" height="35"><input name="radio" type="radio"  <?php if ($rowusr['Sexo']=='F'){ echo 'checked="checked"';} ?> disabled /></td>
                        <td width="24%" class="Arial2">Femenino</td>
                        <td width="8%"><input type="radio" name="radio"  <?php if ($rowusr['Sexo']=='M'){ echo 'checked="checked"';} ?> disabled /></td>
                        <td width="44%" class="Arial2">Masculino</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Vehiculo</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td width="8%" height="35"><input name="Vehiculo" type="radio" value="1" <?php if ($rowform['Vehiculo']=='1'){ echo 'checked="checked"';} ?>/></td>
                        <td width="24%" class="Arial2">Mecanico</td>
                        <td width="8%"><input type="radio" name="Vehiculo" value="2" <?php if ($rowform['Vehiculo']=='2'){ echo 'checked="checked"';} ?> /></td>
                        <td width="44%" class="Arial2">Automatico</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Telefono (Opcional)</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/phone.png" width="20" height="20" /></td>
                        <td ><input name="textfield2" type="text" class="campo_txt" id="textfield3" value="<?php echo $rowusr['Fono']; ?>" disabled /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                    <tr>
                      <td height="10" class="tabla_tit">Email (Opcional)</td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                        <tr class="tabla_margin">
                          <td width="25" align="left" valign="middle"><img src="images/icons/mail.png" width="20" height="20" /></td>
                          <td ><input name="textfield4" type="text" class="campo_txt" id="textfield4" value="<?php echo $rowusr['email']; ?>" disabled/></td>
                        </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
            </table>
            
         
            
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Nombre del Examinador</td>
                  </tr>
                  <tr>
                    <td>

                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="468" ><input name="Nombre_examinador" type="text" class="campo_txt" id="textfield10" value="<?php echo $rowform['Nombre_examinador']; ?>"/></td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Nombre de la Escuela</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="89%" ><input name="Nombre_escuela" type="text" class="campo_txt" id="textfield11" value="<?php echo $rowform['Nombre_escuela']; ?>"/></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Comuna de la Escuela</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="89%" ><input name="Comuna_escuela" type="text" class="campo_txt" id="textfield2" value="<?php echo $rowform['Comuna_escuela']; ?>"/></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">COMPROBACIONES PREVIAS</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="57">L1</td>
                <td>Documentos</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox01" class="view_data" value="<?php if($rowform['checkbox01']!=''){ echo $rowform['checkbox01']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="27">L</td>
              </tr>
              <tr>
                <td>L2</td>
                <td>Ajuste espejo/asiento</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox02" class="view_data" value="<?php if($rowform['checkbox02']!=''){ echo $rowform['checkbox02']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>R1</td>
                <td width="743">Sin cinturón(conductor y pasajero)</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox03" class="view_data" value="<?php if($rowform['checkbox03']!=''){ echo $rowform['checkbox03']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>R</td>
              </tr>
              <tr>
                <td>L3</td>
                <td>Arranque con motor en marcha</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox04" class="view_data" value="<?php if($rowform['checkbox04']!=''){ echo $rowform['checkbox04']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L4</td>
                <td>No quitar freno de estacionamiento</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox05" class="view_data" value="<?php if($rowform['checkbox05']!=''){ echo $rowform['checkbox05']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L5</td>
                <td>Puertas mal cerradas</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox06" class="view_data" value="<?php if($rowform['checkbox06']!=''){ echo $rowform['checkbox06']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">INGRESO A LA CIRCULACIÓN</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G1</td>
                <td width="761">Obstaculizar</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox07" class="view_data" value="<?php if($rowform['checkbox07']!=''){ echo $rowform['checkbox07']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
              <tr>
                <td>R2</td>
                <td>Generar Riesgo</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox08" class="view_data" value="<?php if($rowform['checkbox08']!=''){ echo $rowform['checkbox08']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>R</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">CIRCULACIÓN NORMAL </th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R7</td>
                <td width="761">Exceso de Velocidad</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox09" class="view_data" value="<?php if($rowform['checkbox09']!=''){ echo $rowform['checkbox09']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">R</td>
              </tr>
              <tr>
                <td>G15</td>
                <td>No respetar  Distancias</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox10" class="view_data" value="<?php if($rowform['checkbox10']!=''){ echo $rowform['checkbox10']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">CAMBIO DE PISTA</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L6</td>
                <td width="761">Subir, forzar, golpear cuneta </td>
                <td width="120" align="center">
                 <div class="numbers-row">
                <input type="text" name="checkbox11" class="view_data" value="<?php if($rowform['checkbox11']!=''){ echo $rowform['checkbox11']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>G2</td>
                <td>Cambio brusco obstaculizando</td>
                <td>
                 <div class="numbers-row">
                <input type="text" name="checkbox12" class="view_data" value="<?php if($rowform['checkbox12']!=''){ echo $rowform['checkbox12']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G3</td>
                <td>No señalizar o hacerlo mal</td>
                <td>
                 <div class="numbers-row">
                <input type="text" name="checkbox13" class="view_data" value="<?php if($rowform['checkbox13']!=''){ echo $rowform['checkbox13']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>L7</td>
                <td>No quitar señal</td>
                <td>
                 <div class="numbers-row">
                <input type="text" name="checkbox14" class="view_data" value="<?php if($rowform['checkbox14']!=''){ echo $rowform['checkbox14']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">VIRAJES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L8</td>
                <td width="761">No señalizar o hacerlo mal</td>
                <td width="120" align="center">
                 <div class="numbers-row">
                <input type="text" name="checkbox15" class="view_data" value="<?php if($rowform['checkbox15']!=''){ echo $rowform['checkbox15']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L9</td>
                <td>No señalizar o hacerlo mal</td>
                <td>
                 <div class="numbers-row">
                <input type="text" name="checkbox16" class="view_data" value="<?php if($rowform['checkbox16']!=''){ echo $rowform['checkbox16']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L10</td>
                <td>Subir la cuneta</td>
                <td>
                 <div class="numbers-row">
                <input type="text" name="checkbox17" class="view_data" value="<?php if($rowform['checkbox17']!=''){ echo $rowform['checkbox17']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">INTERSECCIONES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G6</td>
                <td width="761">Ingresar obstaculizando</td>
                <td width="120" align="center">
                 <div class="numbers-row">
                <input type="text" name="checkbox18" class="view_data" value="<?php if($rowform['checkbox18']!=''){ echo $rowform['checkbox18']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">ADELANTAMIENTOS / SOBREPASOS</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R3</td>
                <td width="761">Sobrepasar por la berma</td>
                <td width="120" align="center">
                 <div class="numbers-row">
                <input type="text" name="checkbox19" class="view_data" value="<?php if($rowform['checkbox19']!=''){ echo $rowform['checkbox19']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">R</td>
              </tr>
              <tr>
                <td>G4</td>
                <td>Paso peatonal / Cruce no regulados</td>
                <td>
                 <div class="numbers-row">
                <input type="text" name="checkbox20" class="view_data" value="<?php if($rowform['checkbox20']!=''){ echo $rowform['checkbox20']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G5</td>
                <td>Riesgo en sentido contrario</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox21" class="view_data" value="<?php if($rowform['checkbox21']!=''){ echo $rowform['checkbox21']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">VIRAJES EN U</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L15</td>
                <td width="761">No señalizar o hacerlo mal</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox22" class="view_data" value="<?php if($rowform['checkbox22']!=''){ echo $rowform['checkbox22']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">ESTACIONAMIENTO</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L11</td>
                <td>Separación (30 cm y 60 cm)</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox23" class="view_data" value="<?php if($rowform['checkbox23']!=''){ echo $rowform['checkbox23']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L12</td>
                <td>Doble fila</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox24" class="view_data" value="<?php if($rowform['checkbox24']!=''){ echo $rowform['checkbox24']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L13</td>
                <td width="761">No poner freno de estacionamiento</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox25" class="view_data" value="<?php if($rowform['checkbox25']!=''){ echo $rowform['checkbox25']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>R</td>
              </tr>
              <tr>
                <td>L14</td>
                <td>Subir, forzar, golpear cuneta</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox26" class="view_data" value="<?php if($rowform['checkbox26']!=''){ echo $rowform['checkbox26']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>G7</td>
                <td>Bajar sin observar el transito</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox27" class="view_data" value="<?php if($rowform['checkbox27']!=''){ echo $rowform['checkbox27']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">DEMARCACIONES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G10</td>
                <td width="761">Sobrepasar eje calzada</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox28" class="view_data" value="<?php if($rowform['checkbox28']!=''){ echo $rowform['checkbox28']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
              <tr>
                <td>L16</td>
                <td>No respetarlas</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox29" class="view_data" value="<?php if($rowform['checkbox29']!=''){ echo $rowform['checkbox29']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">MANEJO DEL VEHICULO</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R5</td>
                <td>Golpear a alguien o algo</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox30" class="view_data" value="<?php if($rowform['checkbox30']!=''){ echo $rowform['checkbox30']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">R</td>
              </tr>
              <tr>
                <td>R6</td>
                <td>Perder el control del vehiculo</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox31" class="view_data" value="<?php if($rowform['checkbox31']!=''){ echo $rowform['checkbox31']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>R</td>
              </tr>
              <tr>
                <td>L17</td>
                <td width="761"> Relación de marchas inadecuadas</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox32" class="view_data" value="<?php if($rowform['checkbox32']!=''){ echo $rowform['checkbox32']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>G12</td>
                <td>Confusión pedales</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox33" class="view_data" value="<?php if($rowform['checkbox33']!=''){ echo $rowform['checkbox33']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G13</td>
                <td>Soltar dos manos del volante</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox34" class="view_data" value="<?php if($rowform['checkbox34']!=''){ echo $rowform['checkbox34']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G14</td>
                <td>Circular en sentido contrario</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox35" class="view_data" value="<?php if($rowform['checkbox35']!=''){ echo $rowform['checkbox35']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>L20</td>
                <td>Conducir de forma brusca</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox36" class="view_data" value="<?php if($rowform['checkbox36']!=''){ echo $rowform['checkbox36']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>G16</td>
                <td>Manipular radio, celular, etc.</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox37" class="view_data" value="<?php if($rowform['checkbox37']!=''){ echo $rowform['checkbox37']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">OBSERVACIÓN</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L21</td>
                <td width="761">No observar el trafico</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox38" class="view_data" value="<?php if($rowform['checkbox38']!=''){ echo $rowform['checkbox38']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">SEÑALES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R4</td>
                <td>Señal Pare/Luz roja</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox39" class="view_data" value="<?php if($rowform['checkbox39']!=''){ echo $rowform['checkbox39']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">R</td>

              </tr>
              <tr>
                <td>G8</td>
                <td>Señal Ceda el Paso</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox40" class="view_data" value="<?php if($rowform['checkbox40']!=''){ echo $rowform['checkbox40']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G9</td>
                <td width="761">Señales de prohibición/restricción</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox41" class="view_data" value="<?php if($rowform['checkbox41']!=''){ echo $rowform['checkbox41']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>R8</td>
                <td>No obedecer a Carabineros</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox42" class="view_data" value="<?php if($rowform['checkbox42']!=''){ echo $rowform['checkbox42']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>R</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">LUCES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G11</td>
                <td width="761">No encender luces</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox43" class="view_data" value="<?php if($rowform['checkbox43']!=''){ echo $rowform['checkbox43']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">PREFERENCIAS</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G17</td>
                <td width="761">Peatones, ciclista, otros vehiculos</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox44" class="view_data" value="<?php if($rowform['checkbox44']!=''){ echo $rowform['checkbox44']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">MANDOS DEL VEHICULO</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L18</td>
                <td width="761">Usar bocina sin motivo</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox45" class="view_data" value="<?php if($rowform['checkbox45']!=''){ echo $rowform['checkbox45']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L19</td>
                <td>No identificar mandos</td>
                <td align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox46" class="view_data" value="<?php if($rowform['checkbox46']!=''){ echo $rowform['checkbox46']; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="10"><p></p></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
              <tr>
              <input name="idPrueba" type="hidden" value="<?php echo $_GET['id'] ?>" />
             
              
                <td width="97" align="left"><input type="button" class="rojo_sombra_print" value="Imprimir" onclick="window.print();return false;" /></td>
                <td width="653" align="left"><a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a></td>
                <td width="100" align="right" class="Arial2">Guardar el Examen</td>
                <td width="91" align="center"><input type="submit" class="rojo_sombra" value="Guardar" name="submit_edit" /></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>

 


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
clientes_listado.Rut,
clientes_listado.Nombres, 
clientes_listado.ApellidoPat, 
clientes_listado.ApellidoMat,
clientes_listado.Sexo,
clientes_listado.Fono1 AS Fono, 
clientes_listado.email
FROM `clientes_listado`
WHERE clientes_listado.idCliente = {$_GET['usr']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);?>
<form method="post" >
 <table align="center" width="960" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle" class="Arial1">
      <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_sup">
        <tr class="borde_button">
          <td width="32%" height="100" align="center" valign="middle"><img src="images/logo_sm_transito.png" width="160" height="53" /><br /></td>
          <td width="53%" align="left" valign="middle">Consulta Ficha de Evaluacion<br />
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
          <td colspan="3" align="left"><table class="margin_top" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="20%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Rut </td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/id.png" width="20" height="20" /></td>
                      <td ><input name="textfield6" type="text" class="campo_txt" id="textfield9" value="<?php echo $rowusr['Rut']; ?>" disabled /></td>
                    </tr>
                  </table></td>
                  </tr>
              </table></td>
              <td width="40%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Nombre Postulante</td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/user.png" width="20" height="20" /></td>
                      <td width="716" ><input name="textfield9" type="text" class="campo_txt" id="textfield7" value="<?php echo $rowusr['Nombres']; ?>" disabled /></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              <td width="40%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Apellido Postulante</td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/user.png" width="20" height="20" /></td>
                      <td width="716" ><input name="textfield" type="text" class="campo_txt" id="textfield" value="<?php echo $rowusr['ApellidoPat'].' '.$rowusr['ApellidoMat']; ?>" disabled /></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
        </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Sexo</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td width="8%" height="35"><input name="radio" type="radio"  <?php if ($rowusr['Sexo']=='F'){ echo 'checked="checked"';} ?> disabled /></td>
                        <td width="24%" class="Arial2">Femenino</td>
                        <td width="8%"><input type="radio" name="radio"  <?php if ($rowusr['Sexo']=='M'){ echo 'checked="checked"';} ?> disabled /></td>
                        <td width="44%" class="Arial2">Masculino</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Vehiculo</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td width="8%" height="35"><input name="Vehiculo" type="radio" value="1" /></td>
                        <td width="24%" class="Arial2">Mecanico</td>
                        <td width="8%"><input type="radio" name="Vehiculo" value="2" /></td>
                        <td width="44%" class="Arial2">Automatico</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Telefono (Opcional)</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/phone.png" width="20" height="20" /></td>
                        <td ><input name="textfield2" type="text" class="campo_txt" id="textfield3" value="<?php echo $rowusr['Fono']; ?>" disabled /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                    <tr>
                      <td height="10" class="tabla_tit">Email (Opcional)</td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                        <tr class="tabla_margin">
                          <td width="25" align="left" valign="middle"><img src="images/icons/mail.png" width="20" height="20" /></td>
                          <td ><input name="textfield4" type="text" class="campo_txt" id="textfield4" value="<?php echo $rowusr['email']; ?>" disabled/></td>
                        </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
            </table>
            
         
            
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Nombre del Examinador</td>
                  </tr>
                  <tr>
                    <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="468" ><input name="Nombre_examinador" type="text" class="campo_txt" id="textfield10" /></td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Nombre de la Escuela</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="89%" ><input name="Nombre_escuela" type="text" class="campo_txt" id="textfield11" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Comuna de la Escuela</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="89%" ><input name="Comuna_escuela" type="text" class="campo_txt" id="textfield2" /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">COMPROBACIONES PREVIAS</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L1</td>
                <td>Documentos</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox01" class="view_data" value="<?php if(isset($checkbox01)&&$checkbox01!=0){ echo $checkbox01; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L2</td>
                <td>Ajuste espejo/asiento</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox02" class="view_data" value="<?php if(isset($checkbox02)&&$checkbox02!=0){ echo $checkbox02; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>R1</td>
                <td width="761">Sin cinturón(conductor y pasajero)</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox03" class="view_data" value="<?php if(isset($checkbox03)&&$checkbox03!=0){ echo $checkbox03; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>R</td>
              </tr>
              <tr>
                <td>L3</td>
                <td>Arranque con motor en marcha</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox04" class="view_data" value="<?php if(isset($checkbox04)&&$checkbox04!=0){ echo $checkbox04; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L4</td>
                <td>No quitar freno de estacionamiento</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox05" class="view_data" value="<?php if(isset($checkbox05)&&$checkbox05!=0){ echo $checkbox05; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L5</td>
                <td>Puertas mal cerradas</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox06" class="view_data" value="<?php if(isset($checkbox06)&&$checkbox06!=0){ echo $checkbox06; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">INGRESO A LA CIRCULACIÓN</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G1</td>
                <td width="761">Obstaculizar</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox07" class="view_data" value="<?php if(isset($checkbox07)&&$checkbox07!=0){ echo $checkbox07; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
              <tr>
                <td>R2</td>
                <td>Generar Riesgo</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox08" class="view_data" value="<?php if(isset($checkbox08)&&$checkbox08!=0){ echo $checkbox08; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>R</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">CIRCULACIÓN NORMAL </th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R7</td>
                <td width="761">Exceso de Velocidad</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox09" class="view_data" value="<?php if(isset($checkbox09)&&$checkbox09!=0){ echo $checkbox09; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">R</td>
              </tr>
              <tr>
                <td>G15</td>
                <td>No respetar  Distancias</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox10" class="view_data" value="<?php if(isset($checkbox10)&&$checkbox10!=0){ echo $checkbox10; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">CAMBIO DE PISTA</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L6</td>
                <td width="761">Subir, forzar, golpear cuneta </td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox11" class="view_data" value="<?php if(isset($checkbox11)&&$checkbox11!=0){ echo $checkbox11; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>G2</td>
                <td>Cambio brusco obstaculizando</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox12" class="view_data" value="<?php if(isset($checkbox12)&&$checkbox12!=0){ echo $checkbox12; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G3</td>
                <td>No señalizar o hacerlo mal</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox13" class="view_data" value="<?php if(isset($checkbox13)&&$checkbox13!=0){ echo $checkbox13; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>L7</td>
                <td>No quitar señal</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox14" class="view_data" value="<?php if(isset($checkbox14)&&$checkbox14!=0){ echo $checkbox14; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">VIRAJES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L8</td>
                <td width="761">No señalizar o hacerlo mal</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox15" class="view_data" value="<?php if(isset($checkbox15)&&$checkbox15!=0){ echo $checkbox15; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L9</td>
                <td>No señalizar o hacerlo mal</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox16" class="view_data" value="<?php if(isset($checkbox16)&&$checkbox16!=0){ echo $checkbox16; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L10</td>
                <td>Subir la cuneta</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox17" class="view_data" value="<?php if(isset($checkbox17)&&$checkbox17!=0){ echo $checkbox17; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">INTERSECCIONES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G6</td>
                <td width="761">Ingresar obstaculizando</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox18" class="view_data" value="<?php if(isset($checkbox18)&&$checkbox18!=0){ echo $checkbox18; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">ADELANTAMIENTOS / SOBREPASOS</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R3</td>
                <td width="761">Sobrepasar por la berma</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox19" class="view_data" value="<?php if(isset($checkbox19)&&$checkbox19!=0){ echo $checkbox19; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">R</td>
              </tr>
              <tr>
                <td>G4</td>
                <td>Paso peatonal / Cruce no regulados</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox20" class="view_data" value="<?php if(isset($checkbox20)&&$checkbox20!=0){ echo $checkbox20; }else{ echo'0';} ?>">
                </div></td>
                <td>G</td>
              </tr>
              <tr>
                <td>G5</td>
                <td>Riesgo en sentido contrario</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox21" class="view_data" value="<?php if(isset($checkbox21)&&$checkbox21!=0){ echo $checkbox21; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">VIRAJES EN U</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L15</td>
                <td width="761">No señalizar o hacerlo mal</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox22" class="view_data" value="<?php if(isset($checkbox22)&&$checkbox22!=0){ echo $checkbox22; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">ESTACIONAMIENTO</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L11</td>
                <td>Separación (30 cm y 60 cm)</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox23" class="view_data" value="<?php if(isset($checkbox23)&&$checkbox23!=0){ echo $checkbox23; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L12</td>
                <td>Doble fila</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox24" class="view_data" value="<?php if(isset($checkbox24)&&$checkbox24!=0){ echo $checkbox24; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L13</td>
                <td width="761">No poner freno de estacionamiento</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox25" class="view_data" value="<?php if(isset($checkbox25)&&$checkbox25!=0){ echo $checkbox25; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>R</td>
              </tr>
              <tr>
                <td>L14</td>
                <td>Subir, forzar, golpear cuneta</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox26" class="view_data" value="<?php if(isset($checkbox26)&&$checkbox26!=0){ echo $checkbox26; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>G7</td>
                <td>Bajar sin observar el transito</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox27" class="view_data" value="<?php if(isset($checkbox27)&&$checkbox27!=0){ echo $checkbox27; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">DEMARCACIONES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G10</td>
                <td width="761">Sobrepasar eje calzada</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox28" class="view_data" value="<?php if(isset($checkbox28)&&$checkbox28!=0){ echo $checkbox28; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
              <tr>
                <td>L16</td>
                <td>No respetarlas</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox29" class="view_data" value="<?php if(isset($checkbox29)&&$checkbox29!=0){ echo $checkbox29; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">MANEJO DEL VEHICULO</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R5</td>
                <td>Golpear a alguien o algo</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox30" class="view_data" value="<?php if(isset($checkbox30)&&$checkbox30!=0){ echo $checkbox30; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">R</td>
              </tr>
              <tr>
                <td>R6</td>
                <td>Perder el control del vehiculo</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox31" class="view_data" value="<?php if(isset($checkbox31)&&$checkbox31!=0){ echo $checkbox31; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>R</td>
              </tr>
              <tr>
                <td>L17</td>
                <td width="761"> Relación de marchas inadecuadas</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox32" class="view_data" value="<?php if(isset($checkbox32)&&$checkbox32!=0){ echo $checkbox32; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>G12</td>
                <td>Confusión pedales</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox33" class="view_data" value="<?php if(isset($checkbox33)&&$checkbox33!=0){ echo $checkbox33; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G13</td>
                <td>Soltar dos manos del volante</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox34" class="view_data" value="<?php if(isset($checkbox34)&&$checkbox34!=0){ echo $checkbox34; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G14</td>
                <td>Circular en sentido contrario</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox35" class="view_data" value="<?php if(isset($checkbox35)&&$checkbox35!=0){ echo $checkbox35; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>L20</td>
                <td>Conducir de forma brusca</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox36" class="view_data" value="<?php if(isset($checkbox36)&&$checkbox36!=0){ echo $checkbox36; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>G16</td>
                <td>Manipular radio, celular, etc.</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox37" class="view_data" value="<?php if(isset($checkbox37)&&$checkbox37!=0){ echo $checkbox37; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">OBSERVACIÓN</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L21</td>
                <td width="761">No observar el trafico</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox38" class="view_data" value="<?php if(isset($checkbox38)&&$checkbox38!=0){ echo $checkbox38; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">SEÑALES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R4</td>
                <td>Señal Pare/Luz roja</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox39" class="view_data" value="<?php if(isset($checkbox39)&&$checkbox39!=0){ echo $checkbox39; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">R</td>
              </tr>
              <tr>
                <td>G8</td>
                <td>Señal Ceda el Paso</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox40" class="view_data" value="<?php if(isset($checkbox40)&&$checkbox40!=0){ echo $checkbox40; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G9</td>
                <td width="761">Señales de prohibición/restricción</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox41" class="view_data" value="<?php if(isset($checkbox41)&&$checkbox41!=0){ echo $checkbox41; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>R8</td>
                <td>No obedecer a Carabineros</td>
                <td>
                <div class="numbers-row">
                <input type="text" name="checkbox42" class="view_data" value="<?php if(isset($checkbox42)&&$checkbox42!=0){ echo $checkbox42; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>R</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">LUCES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G11</td>
                <td width="761">No encender luces</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox43" class="view_data" value="<?php if(isset($checkbox43)&&$checkbox43!=0){ echo $checkbox43; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">PREFERENCIAS</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G17</td>
                <td width="761">Peatones, ciclista, otros vehiculos</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox44" class="view_data" value="<?php if(isset($checkbox44)&&$checkbox44!=0){ echo $checkbox44; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">MANDOS DEL VEHICULO</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L18</td>
                <td width="761">Usar bocina sin motivo</td>
                <td width="120" align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox45" class="view_data" value="<?php if(isset($checkbox45)&&$checkbox45!=0){ echo $checkbox45; }else{ echo'0';} ?>">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L19</td>
                <td>No identificar mandos</td>
                <td align="center">
                <div class="numbers-row">
                <input type="text" name="checkbox46" class="view_data" value="<?php if(isset($checkbox46)&&$checkbox46!=0){ echo $checkbox46; }else{ echo'0';} ?>">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="10"><p></p></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
              <tr>
              <input name="idCliente" type="hidden" value="<?php echo $_GET['usr'] ?>" />
              <?php 
				// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
				date_default_timezone_set('UTC');
				//Imprimimos la fecha actual dandole un formato
				$date = date("Y-m-d");
				?>
              <input name="Fecha" type="hidden" value="<?php echo $date; ?>"  />
              
                <td width="97" align="left"><input type="button" class="rojo_sombra_print" value="Imprimir" onclick="window.print();return false;" /></td>
                <td width="653" align="left"><a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a></td>
                <td width="100" align="right" class="Arial2">Guardar el Examen</td>
                <td width="91" align="center"><input type="submit" class="rojo_sombra" value="Guardar" name="submit" /></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>
</form>
 <?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
//SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT 
clientes_listado.Rut,
clientes_listado.Nombres, 
clientes_listado.ApellidoPat, 
clientes_listado.ApellidoMat,
clientes_listado.Sexo,
clientes_listado.Fono1 AS Fono, 
clientes_listado.email
FROM `clientes_listado`
WHERE clientes_listado.idCliente = {$_GET['usr']}";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);
//SE TRAEN TODOS LOS DATOS DEL FORMULARIO	
$query = "SELECT 
Vehiculo, Nombre_examinador, Nombre_escuela, Comuna_escuela, checkbox01, checkbox02, checkbox03, checkbox04, checkbox05, checkbox06, checkbox07, checkbox08, checkbox09, checkbox10, checkbox11, checkbox12, checkbox13, checkbox14, checkbox15, checkbox16, checkbox17, checkbox18, checkbox19, checkbox20, checkbox21, checkbox22, checkbox23, checkbox24, checkbox25, checkbox26, checkbox27, checkbox28, checkbox29, checkbox30, checkbox31, checkbox32, checkbox33, checkbox34, checkbox35, checkbox36, checkbox37, checkbox38, checkbox39, checkbox40, checkbox41, checkbox42, checkbox43, checkbox44, checkbox45, checkbox46
FROM `clientes_pruebas`
WHERE idPrueba = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowform = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);

?>

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
          <td colspan="3" align="left"><table class="margin_top" width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="20%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Rut </td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/id.png" width="20" height="20" /></td>
                      <td ><input name="textfield6" type="text" class="campo_txt" id="textfield9" value="<?php echo $rowusr['Rut']; ?>" disabled /></td>
                    </tr>
                  </table></td>
                  </tr>
              </table></td>
              <td width="40%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Nombres Postulante</td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/user.png" width="20" height="20" /></td>
                      <td width="716" ><input name="textfield9" type="text" class="campo_txt" id="textfield7" value="<?php echo $rowusr['Nombres']; ?>" disabled /></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
              <td width="40%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                <tr>
                  <td height="10" class="tabla_tit">Apellido Postulante</td>
                </tr>
                <tr>
                  <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                    <tr class="tabla_margin">
                      <td width="25" align="left" valign="middle"><img src="images/icons/user.png" width="20" height="20" /></td>
                      <td width="716" ><input name="textfield" type="text" class="campo_txt" id="textfield" value="<?php echo $rowusr['ApellidoPat'].' '.$rowusr['ApellidoMat']; ?>" disabled /></td>
                    </tr>
                  </table></td>
                </tr>
              </table></td>
            </tr>
        </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Sexo</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td width="8%" height="35"><input name="radio" type="radio"  <?php if ($rowusr['Sexo']=='F'){ echo 'checked="checked"';} ?> disabled /></td>
                        <td width="24%" class="Arial2">Femenino</td>
                        <td width="8%"><input type="radio" name="radio"  <?php if ($rowusr['Sexo']=='M'){ echo 'checked="checked"';} ?> disabled /></td>
                        <td width="44%" class="Arial2">Masculino</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Vehiculo</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr>
                        <td width="8%" height="35"><input name="Vehiculo" type="radio" value="1" <?php if ($rowform['Vehiculo']=='1'){ echo 'checked="checked"';} ?> disabled/></td>
                        <td width="24%" class="Arial2">Mecanico</td>
                        <td width="8%"><input type="radio" name="Vehiculo" value="2" <?php if ($rowform['Vehiculo']=='2'){ echo 'checked="checked"';} ?>  disabled/></td>
                        <td width="44%" class="Arial2">Automatico</td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Telefono (Opcional)</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="25" align="left" valign="middle"><img src="images/icons/phone.png" width="20" height="20" /></td>
                        <td ><input name="textfield2" type="text" class="campo_txt" id="textfield3" value="<?php echo $rowusr['Fono']; ?>" disabled /></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                    <tr>
                      <td height="10" class="tabla_tit">Email (Opcional)</td>
                    </tr>
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                        <tr class="tabla_margin">
                          <td width="25" align="left" valign="middle"><img src="images/icons/mail.png" width="20" height="20" /></td>
                          <td ><input name="textfield4" type="text" class="campo_txt" id="textfield4" value="<?php echo $rowusr['email']; ?>" disabled/></td>
                        </tr>
                      </table></td>
                    </tr>
                </table></td>
              </tr>
            </table>
            
         
            
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Nombre del Examinador</td>
                  </tr>
                  <tr>
                    <td>

                    <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="468" ><input name="Nombre_examinador" type="text" class="campo_txt" id="textfield10" value="<?php echo $rowform['Nombre_examinador']; ?>" disabled/></td>
                      </tr>
                    </table>
                    </td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Nombre de la Escuela</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="89%" ><input name="Nombre_escuela" type="text" class="campo_txt" id="textfield11" value="<?php echo $rowform['Nombre_escuela']; ?>" disabled/></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
                <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
                  <tr>
                    <td height="10" class="tabla_tit">Comuna de la Escuela</td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_cont">
                      <tr class="tabla_margin">
                        <td width="89%" ><input name="Comuna_escuela" type="text" class="campo_txt" id="textfield2" value="<?php echo $rowform['Comuna_escuela']; ?>" disabled/></td>
                      </tr>
                    </table></td>
                  </tr>
                </table></td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">COMPROBACIONES PREVIAS</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L1</td>
                <td>Documentos</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox01" class="view_data" value="<?php echo $rowform['checkbox01']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L2</td>
                <td>Ajuste espejo/asiento</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox02" class="view_data" value="<?php echo $rowform['checkbox02']; ?>" disabled="disabled">
                </div> 
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>R1</td>
                <td width="761">Sin cinturón(conductor y pasajero)</td>
                <td>
                 <div class="numbers-row2">
                <input type="text" name="checkbox03" class="view_data" value="<?php echo $rowform['checkbox03']; ?>" disabled="disabled">
                </div>
                </td>
                <td>R</td>
              </tr>
              <tr>
                <td>L3</td>
                <td>Arranque con motor en marcha</td>
                <td>
                 <div class="numbers-row2">
                <input type="text" name="checkbox04" class="view_data" value="<?php echo $rowform['checkbox04']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L4</td>
                <td>No quitar freno de estacionamiento</td>
                <td>
                 <div class="numbers-row2">
                <input type="text" name="checkbox05" class="view_data" value="<?php echo $rowform['checkbox05']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L5</td>
                <td>Puertas mal cerradas</td>
                <td>
                 <div class="numbers-row2">
                <input type="text" name="checkbox06" class="view_data" value="<?php echo $rowform['checkbox06']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">INGRESO A LA CIRCULACIÓN</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G1</td>
                <td width="761">Obstaculizar</td>
                <td width="48" align="center">
                 <div class="numbers-row2">
                <input type="text" name="checkbox07" class="view_data" value="<?php echo $rowform['checkbox07']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
              <tr>
                <td>R2</td>
                <td>Generar Riesgo</td>
                <td>
                 <div class="numbers-row2">
                <input type="text" name="checkbox08" class="view_data" value="<?php echo $rowform['checkbox08']; ?>" disabled="disabled">
                </div>
                </td>
                <td>R</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">CIRCULACIÓN NORMAL </th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R7</td>
                <td width="761">Exceso de Velocidad</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox09" class="view_data" value="<?php echo $rowform['checkbox09']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">R</td>
              </tr>
              <tr>
                <td>G15</td>
                <td>No respetar  Distancias</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox10" class="view_data" value="<?php echo $rowform['checkbox10']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">CAMBIO DE PISTA</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L6</td>
                <td width="761">Subir, forzar, golpear cuneta </td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox11" class="view_data" value="<?php echo $rowform['checkbox11']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>G2</td>
                <td>Cambio brusco obstaculizando</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox12" class="view_data" value="<?php echo $rowform['checkbox12']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G3</td>
                <td>No señalizar o hacerlo mal</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox13" class="view_data" value="<?php echo $rowform['checkbox13']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>L7</td>
                <td>No quitar señal</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox14" class="view_data" value="<?php echo $rowform['checkbox14']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">VIRAJES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L8</td>
                <td width="761">No señalizar o hacerlo mal</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox15" class="view_data" value="<?php echo $rowform['checkbox15']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L9</td>
                <td>No señalizar o hacerlo mal</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox16" class="view_data" value="<?php echo $rowform['checkbox16']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L10</td>
                <td>Subir la cuneta</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox17" class="view_data" value="<?php echo $rowform['checkbox17']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">INTERSECCIONES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G6</td>
                <td width="761">Ingresar obstaculizando</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox18" class="view_data" value="<?php echo $rowform['checkbox18']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">ADELANTAMIENTOS / SOBREPASOS</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R3</td>
                <td width="761">Sobrepasar por la berma</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox19" class="view_data" value="<?php echo $rowform['checkbox19']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">R</td>
              </tr>
              <tr>
                <td>G4</td>
                <td>Paso peatonal / Cruce no regulados</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox20" class="view_data" value="<?php echo $rowform['checkbox20']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G5</td>
                <td>Riesgo en sentido contrario</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox21" class="view_data" value="<?php echo $rowform['checkbox21']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">VIRAJES EN U</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L15</td>
                <td width="761">No señalizar o hacerlo mal</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox22" class="view_data" value="<?php echo $rowform['checkbox22']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">ESTACIONAMIENTO</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L11</td>
                <td>Separación (30 cm y 60 cm)</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox23" class="view_data" value="<?php echo $rowform['checkbox23']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L12</td>
                <td>Doble fila</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox24" class="view_data" value="<?php echo $rowform['checkbox24']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>L13</td>
                <td width="761">No poner freno de estacionamiento</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox25" class="view_data" value="<?php echo $rowform['checkbox25']; ?>" disabled="disabled">
                </div>
                </td>
                <td>R</td>
              </tr>
              <tr>
                <td>L14</td>
                <td>Subir, forzar, golpear cuneta</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox26" class="view_data" value="<?php echo $rowform['checkbox26']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>G7</td>
                <td>Bajar sin observar el transito</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox27" class="view_data" value="<?php echo $rowform['checkbox27']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">DEMARCACIONES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G10</td>
                <td width="761">Sobrepasar eje calzada</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox28" class="view_data" value="<?php echo $rowform['checkbox28']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
              <tr>
                <td>L16</td>
                <td>No respetarlas</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox29" class="view_data" value="<?php echo $rowform['checkbox29']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">MANEJO DEL VEHICULO</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R5</td>
                <td>Golpear a alguien o algo</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox30" class="view_data" value="<?php echo $rowform['checkbox30']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">R</td>
              </tr>
              <tr>
                <td>R6</td>
                <td>Perder el control del vehiculo</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox31" class="view_data" value="<?php echo $rowform['checkbox31']; ?>" disabled="disabled">
                </div>
                </td>
                <td>R</td>
              </tr>
              <tr>
                <td>L17</td>
                <td width="761"> Relación de marchas inadecuadas</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox32" class="view_data" value="<?php echo $rowform['checkbox32']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>G12</td>
                <td>Confusión pedales</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox33" class="view_data" value="<?php echo $rowform['checkbox33']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G13</td>
                <td>Soltar dos manos del volante</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox34" class="view_data" value="<?php echo $rowform['checkbox34']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G14</td>
                <td>Circular en sentido contrario</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox35" class="view_data" value="<?php echo $rowform['checkbox35']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>L20</td>
                <td>Conducir de forma brusca</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox36" class="view_data" value="<?php echo $rowform['checkbox36']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
              <tr>
                <td>G16</td>
                <td>Manipular radio, celular, etc.</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox37" class="view_data" value="<?php echo $rowform['checkbox37']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">OBSERVACIÓN</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L21</td>
                <td width="761">No observar el trafico</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox38" class="view_data" value="<?php echo $rowform['checkbox38']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">SEÑALES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">R4</td>
                <td>Señal Pare/Luz roja</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox39" class="view_data" value="<?php echo $rowform['checkbox39']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">R</td>

              </tr>
              <tr>
                <td>G8</td>
                <td>Señal Ceda el Paso</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox40" class="view_data" value="<?php echo $rowform['checkbox40']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>G9</td>
                <td width="761">Señales de prohibición/restricción</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox41" class="view_data" value="<?php echo $rowform['checkbox41']; ?>" disabled="disabled">
                </div>
                </td>
                <td>G</td>
              </tr>
              <tr>
                <td>R8</td>
                <td>No obedecer a Carabineros</td>
                <td>
                <div class="numbers-row2">
                <input type="text" name="checkbox42" class="view_data" value="<?php echo $rowform['checkbox42']; ?>" disabled="disabled">
                </div>
                </td>
                <td>R</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">LUCES</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G11</td>
                <td width="761">No encender luces</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox43" class="view_data" value="<?php echo $rowform['checkbox43']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">PREFERENCIAS</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">G17</td>
                <td width="761">Peatones, ciclista, otros vehiculos</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox44" class="view_data" value="<?php echo $rowform['checkbox44']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">G</td>
              </tr>
            </table>
            <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered margin_top' >
              <thead>
                <tr>
                  <th colspan="2">MANDOS DEL VEHICULO</th>
                  <th colspan="2">Total</th>
                </tr>
              </thead>
              <tr>
                <td width="54">L18</td>
                <td width="761">Usar bocina sin motivo</td>
                <td width="48" align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox45" class="view_data" value="<?php echo $rowform['checkbox45']; ?>" disabled="disabled">
                </div>
                </td>
                <td width="25">L</td>
              </tr>
              <tr>
                <td>L19</td>
                <td>No identificar mandos</td>
                <td align="center">
                <div class="numbers-row2">
                <input type="text" name="checkbox46" class="view_data" value="<?php echo $rowform['checkbox46']; ?>" disabled="disabled">
                </div>
                </td>
                <td>L</td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="10"><p></p></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_margin">
              <tr>
              
              
                <td width="97" align="left"><input type="button" class="rojo_sombra_print" value="Imprimir" onclick="window.print();return false;" /></td>
                <td width="653" align="left"><a class="rojo_sombra margin_button btn" href="<?php echo $location; ?>">Volver</a></td>     
                <td width="100" align="right" class="Arial2"></td>
                <td width="91" align="center"></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
</table>



<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['usr']) ) {
// SE TRAE UN LISTADO DE TODOS LOS USUARIOS
$arrPruebas = array();
$query = "SELECT 
clientes_pruebas.idPrueba,
clientes_pruebas.Fecha,
clientes_pruebas.Vehiculo, 
clientes_pruebas.Nombre_examinador, 
clientes_pruebas.Nombre_escuela, 
clientes_pruebas.Comuna_escuela
FROM clientes_pruebas 
WHERE clientes_pruebas.idCliente = {$_GET['usr']}
ORDER BY clientes_pruebas.Nombre_escuela ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPruebas,$row );
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
          <a class="rojo_sombra margin_button btn" href="admin_vecinos.php">Volver</a>
          <a href="<?php echo $location; ?>&new=true" ><input type="button" class="rojo_sombra margin_button" value="Crear Prueba" /></a>
          </td>
        </tr>
        <tr>
          <td colspan="3" >

  <table width='100%' border='1' cellspacing='0' cellpadding='0' class='bordered' >
	<thead>
      <tr>
        <th width="100" align="center" >Fecha</th>
        <th align="center" >Nombre Escuela</th>
        <th width="100" align="center" >Comuna Escuela</th>
        <th width="100" align="center" >Nombre Examinador</th>
        <th width="100" align="center" >Vehiculo</th>
        <th width="100" align="center" >Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($arrPruebas as $pruebas) { ?>
    <tr>
        <td width="100" align="center"><?php echo $pruebas['Fecha']; ?></td>
        <td align="center"><?php echo $pruebas['Nombre_escuela']; ?></td>
        <td width="100" align="center"><?php echo $pruebas['Comuna_escuela']; ?></td>
        <td width="100" align="center"><?php echo $pruebas['Nombre_examinador']; ?></td>
        <td width="100" align="center">
		<?php if ( $pruebas['Vehiculo'] == '1') {
			echo 'Mecanico';	
		} else {
			echo 'Automatico';
		}?>
        </td>
        <td width="100"  align="center" class="options-width">
        	<a href="<?php echo $location.'&evaluacion='.$pruebas['idPrueba']; ?>" title="Ver Evaluacion" class="icon-ver info-tooltip"></a>
          	<a href="<?php echo $location.'&view='.$pruebas['idPrueba']; ?>" title="Ver Prueba" class="icon-ver info-tooltip"></a>
          	<a href="<?php echo $location.'&id='.$pruebas['idPrueba']; ?>" title="Editar Prueba" class="icon-editar info-tooltip"></a>	
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