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
$location = "consultar.php";
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 

	//Se crean las variables
	if ( !empty($_POST['Rut']) )             $Rut            = $_POST['Rut'];
	if ( !empty($_POST['idSolicitud']) )     $idSolicitud    = $_POST['idSolicitud'];
	
	//Se rellenan las variables en caso de error
	if ( empty($Rut) )     		    $errors[1] 	  = '<div class="bubble">No ha ingresado un Rut</div>';
	if ( empty($idSolicitud) )   	$errors[2] 	  = '<div class="bubble">No ha ingresado N° de solicitud</div>';
	
	
	//Valida si el rut ingresado sea un rut valido
	if(isset($Rut)){
		if(RutValidate($Rut)==0){
   			$errors[1]	    = '<div class="bubble">El Rut ingresado no es valido</div>'; 
		}
	}

	if (validarnumero($idSolicitud)) {   
        $errors[2]	    = '<div class="bubble">Ingrese valor numerico</div>';
		
	};
	
	
	if ( !isset($errors[1]) && !isset($errors[2])   ) { 
	
		$query = "SELECT  oirs_listado.id_Oirs
		FROM `oirs_listado`
		LEFT JOIN `oirs_listado` ON oirs_listado.idCliente = oirs_listado.idCliente
		WHERE oirs_listado.idSolicitud = '{$idSolicitud}' AND clientes_listado.Rut = '{$Rut}' ";
		$resultado = mysql_query ($query, $dbConn);
		$rowpOirs = mysql_fetch_assoc ($resultado);
		$verificar = mysql_num_rows($resultado);

		if($verificar>0){
			header( 'Location: consultar.php?solicitud='.$rowpOirs['id_Oirs'] );
			die;
		} else {
			header( 'Location: consultar.php?error='.$idSolicitud );
			die;	
		}	
		
		
	}		

}



?>
<!DOCTYPE HTML>
<html lang="en-US"><!-- InstanceBegin template="/Templates/plant1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta charset="UTF-8">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Consultar solicitud, reclamo o sugerencia</title>
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
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['error']) ) {?>
<h3>Resultado</h3>
  <div class="hr1"></div>	
    <div class="fcenter">
       <p>La solicitud N° <?php echo n_doc($_GET['error']) ?> aun no tiene gestion</p>

      <a href="consultar.php"><input class="submit" type="button" value="Volver" /></a>
   </div>
   
    
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['solicitud']) ) {
//Se traen los datos de la OIRS
$query = "SELECT 
oirs_listado.id_Oirs, 
oirs_listado.Fecha, 
oirs_listado.Origen, 
oirs_listado.Destino,
mnt_oirs_origen.descripcion AS Nombre_origen,
mnt_oirs_destino.descripcion AS Nombre_destino,
oirs_listado.Inicia, 
oirs_listado.Expira, 
mnt_oirs_antecedentes.descripcion AS Nombre_antecedentes,
oirs_listado.n_antecedente, 
oirs_listado.obs_antecedente,
mnt_oirs_materia.descripcion AS Nombre_materia,
oirs_listado.obs_materia, 
oirs_listado.Acciones_01, 
oirs_listado.Acciones_02, 
oirs_listado.Acciones_03, 
oirs_listado.Acciones_04, 
oirs_listado.Acciones_05, 
oirs_listado.Acciones_06, 
oirs_listado.Acciones_07, 
oirs_listado.Acciones_08, 
oirs_listado.Acciones_09, 
oirs_listado.Acciones_10, 
oirs_listado.Acciones_11, 
oirs_listado.Acciones_12, 
oirs_listado.Acciones_13, 
oirs_listado.Acciones_14,
oirs_listado.idSolicitud,
clientes_listado.Nombres AS Nombre_cliente,
mnt_oirs_departamentos.Nombre AS Nombre_depto
FROM `oirs_listado`
LEFT JOIN `mnt_oirs_origen`          ON mnt_oirs_origen.id_origen_a             = oirs_listado.id_origen_a
LEFT JOIN `mnt_oirs_destino`         ON mnt_oirs_destino.id_origen_b            = oirs_listado.id_origen_b
LEFT JOIN `mnt_oirs_antecedentes`    ON mnt_oirs_antecedentes.id_antecedentes   = oirs_listado.id_antecedentes
LEFT JOIN `mnt_oirs_materia`         ON mnt_oirs_materia.id_materia             = oirs_listado.id_materia
LEFT JOIN `clientes_listado`         ON clientes_listado.idCliente              = oirs_listado.idCliente
LEFT JOIN `mnt_oirs_departamentos`   ON mnt_oirs_departamentos.idDepto          = oirs_listado.idDepto
WHERE oirs_listado.id_Oirs = '{$_GET['solicitud']}'";
$resultado = mysql_query ($query, $dbConn);
$rowpOirs = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado); 
// Se trae un listado con todas las observaciones de la OIRS
$arrObservaciones = array();
$query = "SELECT 
oirs_observaciones.Fecha,
oirs_observaciones.Hora,
oirs_observaciones.Detalle,
usuarios_listado.Nombre
FROM `oirs_observaciones`
LEFT JOIN `usuarios_listado` ON usuarios_listado.idUsuario = oirs_observaciones.idUsuario
WHERE id_Oirs = '{$_GET['solicitud']}'
ORDER BY id_OirsObservaciones ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrObservaciones,$row );
}	 
// Se trae un listado con todas las modificaciones de la OIRS
$arrCambios = array();
$query = "SELECT 
oirs_historial.Fecha,
oirs_historial.Hora,
oirs_historial.Detalle,
usuarios_listado.Nombre
FROM `oirs_historial`
LEFT JOIN `usuarios_listado` ON usuarios_listado.idUsuario = oirs_historial.idUsuario
WHERE oirs_historial.id_Oirs = '{$_GET['solicitud']}'
ORDER BY oirs_historial.id_OirsHistorial ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCambios,$row );
}?>
<h3>Resultado</h3>
<div class="hr1"></div>

<table style="width:100%">
  <tr>
    <td colspan="2"><p class="oirs_title">Datos del Documento</p></td>
  </tr>
  <tr>
    <td>Documento N° <?php echo n_doc($rowpOirs['id_Oirs']); ?></td>
    <td>Periodo :  <?php echo Fecha_año($rowpOirs['Fecha']); ?></td>
  </tr>
  <tr>
    <td colspan="2"><p class="oirs_title">Datos del Solicitante</p></td>
  </tr>
  <tr>
    <td>Nombre : <?php echo $rowpOirs['Nombre_cliente'] ?></td>
    <td>N°Solicitud asociada :  <?php echo n_doc($rowpOirs['idSolicitud']); ?></td>
  </tr>
  <tr>
    <td colspan="2"><p class="oirs_title">Observaciones</p></td>
  </tr>
  <?php foreach ($arrObservaciones as $obs) { ?>
  <tr>
    <td  colspan="2">
    <div class="box_obs">
    <h1><?php echo 'Escrito por '.$obs['Nombre'].' el '.Fecha_completa_alt($obs['Fecha']).' a las '.$obs['Hora'] ?></h1>
    <p><?php echo $obs['Detalle'] ?></p>
    </div> 
    </td>
  </tr>
<?php } ?>
  <tr>
    <td colspan="2"><p class="oirs_title">Historial de modificaciones</p></td>
  </tr>
  <?php foreach ($arrCambios as $cambios) { ?>
  <tr>
    <td  colspan="2">
    <div class="box_obs">
    <h1><?php echo 'Modificado por '.$cambios['Nombre'].' el '.Fecha_completa_alt($cambios['Fecha']).' a las '.$cambios['Hora'] ?></h1>
    <p><?php echo $cambios['Detalle'] ?></p>
    </div> 
    </td>
  </tr>
<?php } ?>
</table>


<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 } else{ ?>	
<h3>Consulta de Solicitud</h3>
  <p>Todos los campos marcados con * son Obligatorios</p>
  <div class="hr1"></div>
  <table>
  <form class="form" method="post"> 
  <tr>
    <td width="160"><label>Rut</label></td>
    <td width="500"><input type="text" name="Rut" placeholder="Ejemplo 12345678-9" required <?php if(isset($Rut)) {echo 'value="'.$Rut.'"';}?> /></td>
    <td width="200"><?php  if (isset($errors[1])) {echo $errors[1];}?></td>
  </tr>
  <tr>
    <td><label>N° Solicitud</label></td>
    <td><input type="text" name="idSolicitud" placeholder="N° Solicitud"  required <?php if(isset($idSolicitud)) {echo 'value="'.$idSolicitud.'"';}?> /></td>
    <td><?php  if (isset($errors[2])) {echo $errors[2];}?></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" value="Consultar" class="submit" name="submit" /> <input  type="reset" class="submit"  value="Limpiar" /></td>
    <td>&nbsp;</td>
  </tr>
  </form>
</table>
<?php }  ?> 
  <!-- InstanceEndEditable --> 
  </div>
  <?php require_once 'core/footer.php'; ?>
</div>
<script type="text/javascript" src="style/js/scripts.js"></script>
</body>
<!-- InstanceEnd --></html>