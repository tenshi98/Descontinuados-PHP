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
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "ingresos_datos.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Se crea el ingreso de datos
if ( !empty($_GET['new']) ) {
	//Se crean las variables a utilizar
	date_default_timezone_set("Chile/Continental");
	$Hora           = date("H:i:s",time());
	$Estado         = '5';
	$Fecha          = date("Y-m-d");
	$idUsuario      = $arrUsuario['idUsuario'];
	$Detalle        = 'Creacion del documento';
	
	//Se crea el nuevo registro						
	$query  = "INSERT INTO `oirs_listado` (Estado, Fecha, idUsuario, Inicia) 
	VALUES ('$Estado', '$Fecha', '$idUsuario', '$Fecha')";
	$result = mysql_query($query, $dbConn);
	//recibo el último id generado por mi sesion
    $ultimo_id = mysql_insert_id($dbConn);
	
	//Agrego detalles al historial
	$query  = "INSERT INTO `oirs_historial` (id_Oirs, idUsuario, Fecha, Hora, Detalle) 
	VALUES ('$ultimo_id', '$idUsuario', '$Fecha', '$Hora', '$Detalle')";
	$result = mysql_query($query, $dbConn);
	
	//Redirecciono
	header( 'Location: '.$location.'?pagina='.$_GET['pagina'].'&id='.$ultimo_id );
	die;				
}
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/oirs_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/oirs_listado_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/oirs_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/oirs_listado.php';
	
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&delete=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/oirs_listado.php';
}
//Se cierra la OIRS
if ( !empty($_GET['close']) )     {
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&closed=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/oirs_listado_2.php';
}


?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>OIRS Listado</title>
    <!-- InstanceEndEditable -->
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.min.css">
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.min.css">
    <!-- Metis Theme stylesheet -->
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.css">
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<link href="assets/css/theme_color_<?php echo $rowempresa['idTheme'] ?>.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
        <![endif]-->
    <!--Modernizr 2.7.2-->
    <script src="assets/lib/modernizr/modernizr.min.js"></script>
	<!-- Icono de la pagina -->
	<link rel="icon" type="image/png" href="img/mifavicon.png" />
    <!-- InstanceBeginEditable name="head" -->
<script type="text/javascript" SRC="js/filterlist.js"></script> 
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script>
  $(document).ready(function() {
    $("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" }).val();
    $("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" }).val();
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
<script language="javascript">
function msg(direccion){
if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
</script>   
    <!-- InstanceEndEditable -->
  </head>
  <body>
    <div id="wrap">
      <div id="top">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
              </button>
              <a href="index.html" class="navbar-brand">
                <img src="img/logo_sm.png" alt="">
              </a> 
            </header>
            <?php require_once 'core/infobox.php';?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <?php require_once 'core/menu_top.php';?>
            </div>
          </div>
        </nav>
        <header class="head">
          <div class="main-bar">
            <h3>
            <!-- InstanceBeginEditable name="titulo" -->
            <i class="fa fa-dashboard"></i> OIRS Listado
			<!-- InstanceEndEditable --> </h3>
          </div>
        </header>
      </div>
      <div id="left">
       <?php require_once 'core/userbox.php';?> 
       <?php require_once 'core/menu.php';?> 
      </div>
      <div id="content">
        <div class="outer">
            <div class="inner">
			<!-- InstanceBeginEditable name="Bodytext" -->
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_04" class="alert_sucess">  
	OIRS Modificada correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_04" class="alert_sucess">  
	OIRS Borrada correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['closed'])) {?>
<div id="txf_04" class="alert_sucess">  
	OIRS Cerrada correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_04&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['view']) ) {
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
clientes_listado.ApellidoPat AS ApellidoPat_cliente,
clientes_listado.ApellidoMat AS ApellidoMat_cliente,
mnt_oirs_departamentos.Nombre AS Nombre_depto
FROM `oirs_listado`
LEFT JOIN `mnt_oirs_origen`         ON mnt_oirs_origen.id_origen_a             = oirs_listado.id_origen_a
LEFT JOIN `mnt_oirs_destino`        ON mnt_oirs_destino.id_origen_b            = oirs_listado.id_origen_b
LEFT JOIN `mnt_oirs_antecedentes`   ON mnt_oirs_antecedentes.id_antecedentes   = oirs_listado.id_antecedentes
LEFT JOIN `mnt_oirs_materia`        ON mnt_oirs_materia.id_materia             = oirs_listado.id_materia
LEFT JOIN `clientes_listado`        ON clientes_listado.idCliente              = oirs_listado.idCliente
LEFT JOIN `mnt_oirs_departamentos`  ON mnt_oirs_departamentos.idDepto          = oirs_listado.idDepto
WHERE oirs_listado.id_Oirs = '{$_GET['view']}'";
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
WHERE id_Oirs = '{$_GET['view']}'
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
WHERE oirs_historial.id_Oirs = '{$_GET['view']}'
ORDER BY oirs_historial.id_OirsHistorial ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCambios,$row );
}
// Se traen todos los datos de la empresa
$query = "SELECT  Nombre, Dias_alcalde
FROM `core_datos`
WHERE id_Datos = '1'";
$resultado = mysql_query ($query, $dbConn);
$rowempresa = mysql_fetch_assoc ($resultado);
?>
<div class="col-lg-11 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificar OIRS</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="f1">

<table class="width100">
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $rowempresa['Nombre']; ?></td>
    <td>
    <script type="text/javascript" language="JavaScript">
    	document.write (Muestrafecha());
    </script>
    </td>    
    <td>     
    <script type="text/javascript">
    	window.onload=function(){startTime();}
    </script>
    <div id="reloj"></div>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Datos del Documento</p></td>
  </tr>
  <tr>
    <td colspan="2">Documento N° <?php echo n_doc($rowpOirs['id_Oirs']); ?></td>
    <td colspan="2">Periodo : <?php echo Fecha_año($rowpOirs['Fecha']); ?></td>
  </tr>
  
  
  
  
  <tr>
    <td colspan="4"><p class="oirs_title">Datos del Solicitante</p></td>
  </tr>
<tr>
    <td colspan="2"> 
 <div class="form-group">
    <div class="col-lg-8 width90">
    <select name="idCliente" class="form-control width90" name="idCliente" disabled >
   	<?php if (isset($rowpOirs['Nombre_cliente'])){ ?>
    <option value="" selected><?php echo $rowpOirs['Nombre_cliente'].' '.$rowpOirs['ApellidoPat_cliente'].' '.$rowpOirs['ApellidoMat_cliente']  ?></option>
	<?php } else { ?>
    <option value="" selected>No especificado</option>
    <?php } ?>
    </select>
    </div>
</div>
	</td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8  width100">
    	<input type="text" id="text1" placeholder="Filtro" class="form-control" name="regexp" value="" disabled >
    </div>
</div>
    </td>
  </tr>
  <tr>
    <td colspan="2">
    <div class="form-group">
        <div class="col-lg-8  width80">
            <input type="text" id="text1" placeholder="N° Solicitud(si corresponde)" class="form-control" name="idSolicitud" <?php if(isset($idSolicitud)) {echo 'value="'.$idSolicitud.'"';} else {if($rowpOirs['idSolicitud']!=0){ echo 'value="'.$rowpOirs['idSolicitud'].'" ';}}?> disabled >
        </div>
    </div>
    </td>
    <td colspan="2">
    <?php if($rowpOirs['idSolicitud']!=0){?>
    <a href="view_solicitudes.php?view=<?php echo $rowpOirs['idSolicitud']  ?>" class="btn btn-primary btn-line" target="_blank">Ver documento</a>
    <?php }?>
    </td>
</tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Departamento responsable</p></td>
  </tr>
 <tr>
    <td colspan="2">  
 <div class="form-group">
    <div class="col-lg-8 width90">
    <select name="idDepto" class="form-control width90" disabled >
   <?php if (isset($rowpOirs['Nombre_depto'])){ ?>
    <option value="" selected><?php echo $rowpOirs['Nombre_depto'] ?></option>
	<?php } else { ?>
    <option value="" selected>No especificado</option>
    <?php } ?>
    </select>
    </div>
</div>
	</td>
    <td colspan="2"></td>
  </tr>
  
  
  
  
  
  <tr>
    <td colspan="4"><p class="oirs_title">Ingreso de datos</p></td>
  </tr>
  <tr>
    <td><p class="oirs_text">Origen</p></td>
    <td>
<div class="radiobutton">
<input class="uniform" type="radio" name="Origen" value="3" onChange="cambia_origen()" <?php if(isset($rowpOirs['Origen']) && $rowpOirs['Origen']=='3' ) { echo 'checked=""';}?> disabled ><label>Interno</label>
<input class="uniform" type="radio" name="Origen" value="4" onChange="cambia_origen()" <?php if(isset($rowpOirs['Origen']) && $rowpOirs['Origen']=='4' ) { echo 'checked=""';}?> disabled ><label>Externo</label>
</div>                   
    </td>
    <td colspan="2">    
<div class="form-group">
    <div class="col-lg-8 width100">
    <select name="id_origen_a"  id="id_origen_a" class="form-control" disabled >
    <?php if (isset($rowpOirs['Nombre_origen'])){ ?>
    <option value="" selected><?php echo $rowpOirs['Nombre_origen'] ?></option>
	<?php } else { ?>
    <option value="" selected>No especificado</option>
    <?php } ?>
    </select>
    </div>
</div>        
    </td>
  </tr>
  <tr>
    <td><p class="oirs_text">Destino</p></td>
    <td>
<div class="radiobutton">
<input class="uniform" type="radio" name="Destino" value="3" onChange="cambia_destino()"<?php if(isset($rowpOirs['Destino']) && $rowpOirs['Destino']=='3' ) { echo 'checked=""';}?> disabled><label>Interno</label>
<input class="uniform" type="radio" name="Destino" value="4" onChange="cambia_destino()"<?php if(isset($rowpOirs['Destino']) && $rowpOirs['Destino']=='4' ) { echo 'checked=""';}?> disabled><label>Externo</label>
</div>     
    </td>
    <td colspan="2">

<div class="form-group">
    <div class="col-lg-8 width100">
    <select name="id_origen_b" class="form-control" disabled >
    <?php if (isset($rowpOirs['Nombre_destino'])){ ?>
    <option value="" selected><?php echo $rowpOirs['Nombre_destino'] ?></option>
	<?php } else { ?>
    <option value="" selected>No especificado</option>
    <?php } ?>
    </select>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Plazos</p></td>
  </tr>
  <tr>
    <td>Fecha Inicio</td>
    <td>
<div class="form-group">
    <div class="col-lg-3 width90">
    	<input type="text" class="form-control" name="Inicia" id="datepicker1" readonly value="<?php if(isset($rowpOirs['Inicia'])) {echo $rowpOirs['Inicia'];}?>" disabled >
    </div>
</div> 
    </td>
    <td>Fecha Termino</td>
    <td>
<div class="form-group">
    <div class="col-lg-3 width100">
    	<input type="text" class="form-control" name="Expira" id="datepicker2" readonly value="<?php if(isset($rowpOirs['Expira']))  {echo $rowpOirs['Expira'];}?>" disabled >
    </div>
</div>     
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Documentacion</p></td>
  </tr>
  <tr>
    <td>Antecedente</td>
    <td>
<div class="form-group">
    <div class="col-lg-8 width100">
    <select name="id_antecedentes" class="form-control width0" disabled >
    <?php if (isset($rowpOirs['Nombre_antecedentes'])){ ?>
    <option value="" selected><?php echo $rowpOirs['Nombre_antecedentes'] ?></option>
	<?php } else { ?>
    <option value="" selected>No especificado</option>
    <?php } ?>
    </select>
    </div>
</div>       
    </td>
    <td>N°</td>
    <td>
<div class="form-group">
    <div class="col-lg-8  width100">
    	<input type="text" id="text1" placeholder="Numero de Documento" class="form-control" name="n_antecedente" value="<?php if(isset($rowpOirs['n_antecedente']))  {echo $rowpOirs['n_antecedente'];}?>" disabled>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" rowspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
    	<textarea name="obs_antecedente" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 54px;" disabled><?php if(isset($rowpOirs['obs_antecedente']))  {echo $rowpOirs['obs_antecedente'];}?></textarea>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Materia</td>
    <td>
<div class="form-group">
    <div class="col-lg-8 width100">
    <select name="id_materia" class="form-control width90" disabled >
    <?php if (isset($rowpOirs['Nombre_materia'])){ ?>
    <option value="" selected><?php echo $rowpOirs['Nombre_materia'] ?></option>
	<?php } else { ?>
    <option value="" selected>No especificado</option>
    <?php } ?>
    </select>
    </div>
</div>     
    
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" rowspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
    	<textarea name="obs_materia" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 54px;" disabled><?php if(isset($rowpOirs['obs_materia']))  {echo $rowpOirs['obs_materia'];}?></textarea>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Acciones</p></td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_01" <?php if(isset($rowpOirs['Acciones_01']) && $rowpOirs['Acciones_01'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>01 - Tomar contacto con
            </label>
        </div>
    </div>
</div>        
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_08" <?php if(isset($rowpOirs['Acciones_08']) && $rowpOirs['Acciones_08'] == '1' ) {echo 'checked="checked"';}?> disabled></span></div>08 - Para dar solucion
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_02" <?php if(isset($rowpOirs['Acciones_02']) && $rowpOirs['Acciones_02'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>02 - Estudio y proposicion
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_09" <?php if(isset($rowpOirs['Acciones_09']) && $rowpOirs['Acciones_09'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>09 - Informe verbal
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_03" <?php if(isset($rowpOirs['Acciones_03']) && $rowpOirs['Acciones_03'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>03 - Resolver segun corresponda
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_10" <?php if(isset($rowpOirs['Acciones_10']) && $rowpOirs['Acciones_10'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>10 - Informe escrito
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_04" <?php if(isset($rowpOirs['Acciones_04']) && $rowpOirs['Acciones_04'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>04 - Preparar resp. con firma alcalde tiene <?php echo $rowempresa['Dias_alcalde']; ?> dias
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_11" <?php if(isset($rowpOirs['Acciones_11']) && $rowpOirs['Acciones_11'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>11 - Para su visacion
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_05" <?php if(isset($rowpOirs['Acciones_05']) && $rowpOirs['Acciones_05'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>05 - Discutir materia con alcalde
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_12" <?php if(isset($rowpOirs['Acciones_12']) && $rowpOirs['Acciones_12'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>12 - Preparar decreto
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_06" <?php if(isset($rowpOirs['Acciones_06']) && $rowpOirs['Acciones_06'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>06 - Para su conocimiento y fines
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_13" <?php if(isset($rowpOirs['Acciones_13']) && $rowpOirs['Acciones_13'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>13 - Responder por orden del alcalde
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_07" <?php if(isset($rowpOirs['Acciones_07']) && $rowpOirs['Acciones_07'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>07 - Para su informacion
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_14" <?php if(isset($rowpOirs['Acciones_14']) && $rowpOirs['Acciones_14'] == '1' ) {echo 'checked="checked"';}?> disabled ></span></div>14 - Coordina
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Observaciones</p></td>
  </tr>
  <?php foreach ($arrObservaciones as $obs) { ?>
  <tr>
    <td  colspan="4">
    <div class="box_obs">
    <h1><?php echo 'Escrito por '.$obs['Nombre'].' el '.Fecha_completa_alt($obs['Fecha']).' a las '.$obs['Hora'] ?></h1>
    <p><?php echo $obs['Detalle'] ?></p>
    </div> 
    </td>
  </tr>
<?php } ?>
<tr>
    <td colspan="4"><p class="oirs_title">Archivos</p></td>
</tr>
<tr>
    <td colspan="4">
    <?php 
	//Se crean las variables a utilizar
	$idUsuario      = $arrUsuario['idUsuario'];	
	$id_Oirs        = $_GET['view'];
	//concateno
	$c = '?id_Oirs='.$id_Oirs;
	$c .= '&idUsuario='.$idUsuario;
	?> 
    <iframe name="window" src="upload_view.php<?php echo $c ?>" width="100%" height="600" marginwidth="0" scrolling="no" frameborder="0"></iframe>   
    </td>
</tr>    
  <tr>
    <td colspan="4"><p class="oirs_title">Historial de modificaciones</p></td>
  </tr>
  <?php foreach ($arrCambios as $cambios) { ?>
  <tr>
    <td  colspan="4">
    <div class="box_obs">
    <h1><?php echo 'Modificado por '.$cambios['Nombre'].' el '.Fecha_completa_alt($cambios['Fecha']).' a las '.$cambios['Hora'] ?></h1>
    <p><?php echo $cambios['Detalle'] ?></p>
    </div> 
    </td>
  </tr>
<?php } ?>
</table>    
			</form>                    
		</div>
	</div>
</div>	 

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<?php
	//Verifico si existe la variable de busqueda y pagina 
	$location = $original;
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	if (isset($_GET['estado'])) { 
	$location .='&estado='.$_GET['estado'];
	}?>
	<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
<div class="clearfix"></div>
</div> 
				
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['id']) ) {	 
//Se traen los datos de la OIRS
$query = "SELECT 
oirs_listado.id_Oirs, 
oirs_listado.Fecha, 
oirs_listado.Origen, 
oirs_listado.Destino, 
oirs_listado.id_origen_a, 
oirs_listado.id_origen_b,
oirs_listado.Inicia, 
oirs_listado.Expira, 
oirs_listado.id_antecedentes, 
oirs_listado.n_antecedente, 
oirs_listado.obs_antecedente, 
oirs_listado.id_materia, 
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
oirs_listado.idCliente, 
oirs_listado.idDepto,
oirs_listado.idSolicitud,
clientes_listado.Nombres AS Nombre_cliente,
clientes_listado.ApellidoPat AS ApellidoPat_cliente,
clientes_listado.ApellidoMat AS ApellidoMat_cliente
FROM `oirs_listado`
LEFT JOIN `clientes_listado`        ON clientes_listado.idCliente         = oirs_listado.idCliente
WHERE oirs_listado.id_Oirs = '{$_GET['id']}'";
$resultado = mysql_query ($query, $dbConn);
$rowpOirs = mysql_fetch_assoc ($resultado);
mysql_free_result($resultado);
// Se trae un listado de Origenes 
if($rowpOirs['Origen']!=0&&$rowpOirs['Origen']!=''){
	$arrOrigen = array();
	$query = "SELECT id_origen_a, descripcion
	FROM `mnt_oirs_origen`
	WHERE int_ext = ".$rowpOirs['Origen']."";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrOrigen,$row );
	}
	mysql_free_result($resultado);
}
// Se trae un listado de Destinos
if($rowpOirs['Destino']!=0&&$rowpOirs['Destino']!=''){
	$arrDestino = array();
	$query = "SELECT id_origen_b, descripcion
	FROM `mnt_oirs_destino`
	WHERE int_ext = ".$rowpOirs['Destino']."";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrDestino,$row );
	}
	mysql_free_result($resultado);
}
// Se trae un listado de todos los origenes
$query = "SELECT  id_origen_a, descripcion, int_ext
FROM `mnt_oirs_origen` ";
$resultado = mysql_query ($query, $dbConn);
while ($row_origen[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($row_origen);
array_multisort($row_origen, SORT_ASC);
// Se trae un listado de todos los destinos
$query = "SELECT  id_origen_b, descripcion, int_ext
FROM `mnt_oirs_destino` ";
$resultado = mysql_query ($query, $dbConn);
while ($row_destino[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($row_destino);
array_multisort($row_destino, SORT_ASC);
// Se trae un listado de todos los antecedentes
$arrAntecedentes = array();
$query = "SELECT id_antecedentes, descripcion
FROM `mnt_oirs_antecedentes` ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAntecedentes,$row );
}
mysql_free_result($resultado); 
// Se trae un listado de todas las materias
$arrMateria = array();
$query = "SELECT id_materia, descripcion
FROM `mnt_oirs_materia` ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrMateria,$row );
}
mysql_free_result($resultado); 
// Se trae un listado con todos los clientes
$arrCliente = array();
$query = "SELECT 
clientes_listado.idCliente, 
clientes_listado.Nombres,
clientes_listado.ApellidoPat,
clientes_listado.ApellidoMat
FROM `clientes_listado`
WHERE Estado = '1'
ORDER BY Nombres ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCliente,$row );
}
mysql_free_result($resultado); 
// Se trae un listado con todos los clientes
$arrDepto = array();
$query = "SELECT idDepto, Nombre 
FROM `mnt_oirs_departamentos`
ORDER BY Nombre ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrDepto,$row );
}
mysql_free_result($resultado);  
// Se trae un listado con todas las observaciones de la OIRS
$arrObservaciones = array();
$query = "SELECT Fecha
FROM `oirs_observaciones`
WHERE id_Oirs = '{$_GET['id']}'";
$resultado = mysql_query ($query, $dbConn);
$n_obs = mysql_num_rows($resultado);
?>
           
<div class="col-lg-11 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificar OIRS</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="f1">

<table class="width100">
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="30%">&nbsp;</td>
    <td width="20%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><?php echo $rowempresa['Nombre']; ?></td>
    <td>
    <script type="text/javascript" language="JavaScript">
    	document.write (Muestrafecha());
    </script>
    </td>    
    <td>     
    <script type="text/javascript">
    	window.onload=function(){startTime();}
    </script>
    <div id="reloj"></div>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Datos del Documento</p></td>
  </tr>
  <tr>
    <td colspan="2">Documento N° <?php echo n_doc($rowpOirs['id_Oirs']); ?></td>
    <td colspan="2">Periodo : <?php echo Fecha_año($rowpOirs['Fecha']); ?></td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Datos del Solicitante</p></td>
  </tr>
  
<?php if ($rowpOirs['Nombre_cliente']=='' && $rowpOirs['Nombre_cliente']==0){ ?>  
<tr>
    <td colspan="2">  
 <div class="form-group">
    <div class="col-lg-8 width90">
    <select name="idCliente" class="form-control width90"  required >
    <option value="" selected>Seleccione un Vecino</option>
    <?php foreach ( $arrCliente as $cliente ) { ?>
	<option value="<?php echo $cliente['idCliente']; ?>" <?php if(isset($idCliente)) {if($idCliente==$cliente['idCliente']){ echo 'selected="selected"';}} else {if($rowpOirs['idCliente']==$cliente['idCliente']){echo 'selected="selected"';}}?>><?php echo $cliente['Nombres'].' '.$cliente['ApellidoPat'].' '.$cliente['ApellidoMat']; ?></option>
	<?php } ?>
    </select>
    </div>
</div>
	</td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8  width100">
    	<input type="text" id="text1" placeholder="Filtro" class="form-control filter" name="regexp" value="" onKeyUp="myfilter.set(this.value)">
    </div>
</div>
<script type="text/javascript">
<!--
var myfilter = new filterlist(document.f1.idCliente);
//-->
</script>
    </td>
  </tr>
<?php } else {?> 
<tr>
    <td colspan="2">  
 <div class="form-group">
    <div class="col-lg-8 width90">
    <input type="hidden" name="idCliente" value="<?php echo $rowpOirs['idCliente'] ?>"  >
    <select name="" class="form-control width90" name="" disabled >
   	<?php if (isset($rowpOirs['Nombre_cliente'])){ ?>
    <option value="<?php echo $rowpOirs['idCliente'] ?>" selected><?php echo $rowpOirs['Nombre_cliente'].' '.$rowpOirs['ApellidoPat_cliente'].' '.$rowpOirs['ApellidoMat_cliente'] ?></option>
    <?php } ?>
    </select>
    </div>
</div>
	</td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8  width100">
    	<input type="text" id="text1" placeholder="Filtro" class="form-control" name="regexp" value="" disabled >
    </div>
</div>
    </td>
  </tr>   
<?php } ?>  
<tr>
    <td colspan="2">
    <div class="form-group">
        <div class="col-lg-8  width80">
            <input type="hidden"  name="idSolicitud" <?php if(isset($idSolicitud)) {echo 'value="'.$idSolicitud.'"';} else {if($rowpOirs['idSolicitud']!=0){ echo 'value="'.$rowpOirs['idSolicitud'].'"';}}?>  >
            <input type="text" id="text1" placeholder="N° Solicitud(si corresponde)" class="form-control" name="idSolicitud" <?php if(isset($idSolicitud)) {echo 'value="'.$idSolicitud.'"';} else {if($rowpOirs['idSolicitud']!=0){ echo 'value="'.$rowpOirs['idSolicitud'].'" disabled';}}?>  >
        </div>
    </div>
    </td>
    <td colspan="2">
    </td>
</tr> 

  <tr>
    <td colspan="4"><p class="oirs_title">Departamento responsable</p></td>
  </tr>
 <tr>
    <td colspan="2">  
 <div class="form-group">
    <div class="col-lg-8 width90">
    <select name="idDepto" class="form-control width90" required >
    <option value="" selected>Seleccione un Departamento</option>
    <?php foreach ( $arrDepto as $depto ) { ?>
	<option value="<?php echo $depto['idDepto']; ?>" <?php if(isset($idDepto)) {if($idDepto==$depto['idDepto']){ echo 'selected="selected"';}} else {if($rowpOirs['idDepto']==$depto['idDepto']){echo 'selected="selected"';}}?>><?php echo $depto['Nombre']; ?></option>
	<?php } ?>
    </select>
    </div>
</div>
	</td>
    <td colspan="2"></td>
  </tr>
  
  <tr>
    <td colspan="4"><p class="oirs_title">Ingreso de datos</p></td>
  </tr>
  <tr>
    <td><p class="oirs_text">Origen</p></td>
    <td>
<div class="radiobutton">
<input class="uniform" type="radio" name="Origen" value="3" onChange="cambia_origen()" <?php if(isset($Origen)) {if($Origen=='3'){ echo 'checked=""';}} else {if($rowpOirs['Origen']=='3'){echo 'checked=""';}}?>><label>Interno</label>

<input class="uniform" type="radio" name="Origen" value="4" onChange="cambia_origen()" <?php if(isset($Origen)) {if($Origen=='4'){ echo 'checked=""';}} else {if($rowpOirs['Origen']=='4'){echo 'checked=""';}}?>><label>Externo</label>
</div>                   
    </td>
    <td colspan="2">
<script>
<?php
//se imprime la id 
filtrar($row_origen, 'int_ext'); 
foreach($row_origen as $tipo=>$componentes){ 
echo'var id_origen_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['id_origen_a'].'"';
 }
 echo')
';
}

//se imprime el nombre 
foreach($row_origen as $tipo=>$componentes){ 
echo'var origen_'.$tipo.'=new Array("Seleccione un tipo"';
foreach ($componentes as $comp) { 
echo',"'.$comp['descripcion'].'"';
 }
 echo')
';
}
 ?>
function cambia_origen(){	
	var Componente;		
	 for(var i=0;i<2;i++) { 
		 if(document.f1.Origen[i].checked) {
		 	Componente=document.f1.Origen[i].value;	
		 }
	 }
	if (Componente != '') {
		id_origen=eval("id_origen_" + Componente)
		origen=eval("origen_" + Componente)
		num_int = id_origen.length
		document.f1.id_origen_a.length = num_int
		//document.getElementById("id_origen_a").length=num_int
		for(i=0;i<num_int;i++){
		   document.f1.id_origen_a.options[i].value=id_origen[i]
		   document.f1.id_origen_a.options[i].text=origen[i]
		   //document.getElementById("id_origen_a").options[i].value=id_origen[i]
		   //document.getElementById("id_origen_a").options[i].text=origen[i]
		}	
	}else{
		document.f1.id_origen_a.length = 1
		document.f1.id_origen_a.options[0].value = ""
	    document.f1.id_origen_a.options[0].text = "Seleccione un tipo"
	}
	document.f1.id_origen_a.options[0].selected = true 
}
</script>



    
<div class="form-group">
    <div class="col-lg-8 width100">
    <select name="id_origen_a"  id="id_origen_a" class="form-control" >
    <option value="" selected>Seleccione un tipo</option>
    <?php foreach ($arrOrigen as $origen) { ?>
    <option value="<?php echo $origen['id_origen_a']; ?>" <?php if(isset($id_origen_a)&&$id_origen_a==$origen['id_origen_a']) {echo 'selected="selected"';}elseif($origen['id_origen_a']==$rowpOirs['id_origen_a']){echo 'selected="selected"';}?>><?php echo $origen['descripcion']; ?></option>
    <?php } ?> 
    </select>
    </div>
</div>        
    </td>
  </tr>
  <tr>
    <td><p class="oirs_text">Destino</p></td>
    <td>
<div class="radiobutton">
<input class="uniform" type="radio" name="Destino" value="3" onChange="cambia_destino()"<?php if(isset($Destino)) {if($Destino=='3'){ echo 'checked=""';}} else {if($rowpOirs['Destino']=='3'){echo 'checked=""';}}?>><label>Interno</label>
<input class="uniform" type="radio" name="Destino" value="4" onChange="cambia_destino()"<?php if(isset($Destino)) {if($Destino=='4'){ echo 'checked=""';}} else {if($rowpOirs['Destino']=='4'){echo 'checked=""';}}?>><label>Externo</label>
</div>     
    </td>
    <td colspan="2">
<script>
<?php
//se imprime la id de la tarea
filtrar($row_destino, 'int_ext'); 
foreach($row_destino as $tipo=>$componentes){ 
echo'var id_destino_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['id_origen_b'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($row_destino as $tipo=>$componentes){ 
echo'var destino_'.$tipo.'=new Array("Seleccione un tipo"';
foreach ($componentes as $comp) { 
echo',"'.$comp['descripcion'].'"';
 }
 echo')
';
}
 ?>
function cambia_destino(){
	var Componente2;		
	 for(var i=0;i<2;i++) { 
		 if(document.f1.Destino[i].checked) {
		 	Componente2=document.f1.Destino[i].value;	
		 }
	 }
	if (Componente2 != '') {
		id_destino=eval("id_destino_" + Componente2)
		destino=eval("destino_" + Componente2)
		num_int = id_destino.length
		document.f1.id_origen_b.length = num_int
		for(i=0;i<num_int;i++){
		   document.f1.id_origen_b.options[i].value=id_destino[i]
		   document.f1.id_origen_b.options[i].text=destino[i]
		}	
	}else{
		document.f1.id_origen_b.length = 1
		document.f1.id_origen_b.options[0].value = ""
	    document.f1.id_origen_b.options[0].text = "Seleccione un tipo"
	}
	document.f1.id_origen_b.options[0].selected = true
}
</script>
    
<div class="form-group">
    <div class="col-lg-8 width100">
    <select name="id_origen_b" class="form-control" >
    <option value="" selected>Seleccione un tipo</option>
    <?php foreach ($arrDestino as $destino) { ?>
    <option value="<?php echo $destino['id_origen_b']; ?>" <?php if(isset($id_origen_b)&&$id_origen_b==$destino['id_origen_b']) {echo 'selected="selected"';}elseif($destino['id_origen_b']==$rowpOirs['id_origen_b']){echo 'selected="selected"';}?>><?php echo $destino['descripcion']; ?></option>
    <?php } ?>
    </select>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Plazos</p></td>
  </tr>
  <tr>
    <td>Fecha Inicio</td>
    <td>
<div class="form-group">
    <div class="col-lg-3 width90">
    	<input type="text" class="form-control" name="Inicia" id="datepicker1" readonly value="<?php if(isset($Inicia)) {echo $Inicia;} else {echo $rowpOirs['Inicia'];}?>" >
    </div>
</div> 
    </td>
    <td>Fecha Termino</td>
    <td>
<div class="form-group">
    <div class="col-lg-3 width100">
    	<input type="text" class="form-control" name="Expira" id="datepicker2" readonly value="<?php if(isset($Expira)) {echo $Expira;} else {echo $rowpOirs['Expira'];}?>" >
    </div>
</div>     
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Documentacion</p></td>
  </tr>
  <tr>
    <td>Antecedente</td>
    <td>
<div class="form-group">
    <div class="col-lg-8 width100">
    <select name="id_antecedentes" class="form-control width90" >
    <option value="" selected>Seleccione Antecedente</option>
    <?php foreach ( $arrAntecedentes as $antecedentes ) { ?>
	<option value="<?php echo $antecedentes['id_antecedentes']; ?>" <?php if(isset($id_antecedentes)) {if($id_antecedentes==$antecedentes['id_antecedentes']){ echo 'selected="selected"';}} else {if($rowpOirs['id_antecedentes']==$antecedentes['id_antecedentes']){echo 'selected="selected"';}}?>><?php echo $antecedentes['descripcion']; ?></option>
	<?php } ?>
    </select>
    </div>
</div>       
    </td>
    <td>N°</td>
    <td>
<div class="form-group">
    <div class="col-lg-8  width100">
    	<input type="text" id="text1" placeholder="Numero de Documento" class="form-control" name="n_antecedente" value="<?php if(isset($n_antecedente)) {echo $n_antecedente;} else {if($rowpOirs['n_antecedente']!=0){echo $rowpOirs['n_antecedente'];}}?>">
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" rowspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
    	<textarea name="obs_antecedente" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 54px;" placeholder="Observaciones"><?php if(isset($obs_antecedente)) {echo $obs_antecedente;} else {echo $rowpOirs['obs_antecedente'];}?></textarea>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Materia</td>
    <td>
<div class="form-group">
    <div class="col-lg-8 width90">
    <select name="id_materia" class="form-control width100" >
    <option value="" selected>Seleccione Materia</option>
    <?php foreach ( $arrMateria as $materia ) { ?>
	<option value="<?php echo $materia['id_materia']; ?>" <?php if(isset($id_materia)) {if($id_materia==$materia['id_materia']){ echo 'selected="selected"';}} else {if($rowpOirs['id_materia']==$materia['id_materia']){echo 'selected="selected"';}}?>><?php echo $materia['descripcion']; ?></option>
	<?php } ?>
    </select>
    </div>
</div>     
    
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3" rowspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
    	<textarea name="obs_materia" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 54px;" placeholder="Observaciones"><?php if(isset($obs_materia)) {echo $obs_materia;} else {echo $rowpOirs['obs_materia'];}?></textarea>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Acciones</p></td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_01" <?php if(isset($Acciones_01)) {if($Acciones_01=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_01']=='1'){echo 'checked="checked"';}}?> ></span></div>01 - Tomar contacto con
            </label>
        </div>
    </div>
</div>        
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_08" <?php if(isset($Acciones_08)) {if($Acciones_08=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_08']=='1'){echo 'checked="checked"';}}?> ></span></div>08 - Para dar solucion
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_02" <?php if(isset($Acciones_02)) {if($Acciones_02=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_02']=='1'){echo 'checked="checked"';}}?> ></span></div>02 - Estudio y proposicion
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_09" <?php if(isset($Acciones_09)) {if($Acciones_09=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_09']=='1'){echo 'checked="checked"';}}?> ></span></div>09 - Informe verbal
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_03" <?php if(isset($Acciones_03)) {if($Acciones_03=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_03']=='1'){echo 'checked="checked"';}}?> ></span></div>03 - Resolver segun corresponda
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_10" <?php if(isset($Acciones_10)) {if($Acciones_10=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_10']=='1'){echo 'checked="checked"';}}?> ></span></div>10 - Informe escrito
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_04" <?php if(isset($Acciones_04)) {if($Acciones_04=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_04']=='1'){echo 'checked="checked"';}}?> ></span></div>04 - Preparar resp. con firma alcalde tiene <?php echo $rowempresa['Dias_alcalde']; ?> dias
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_11" <?php if(isset($Acciones_11)) {if($Acciones_11=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_11']=='1'){echo 'checked="checked"';}}?> ></span></div>11 - Para su visacion
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_05" <?php if(isset($Acciones_05)) {if($Acciones_05=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_05']=='1'){echo 'checked="checked"';}}?> ></span></div>05 - Discutir materia con alcalde
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_12" <?php if(isset($Acciones_12)) {if($Acciones_12=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_12']=='1'){echo 'checked="checked"';}}?> ></span></div>12 - Preparar decreto
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_06" <?php if(isset($Acciones_06)) {if($Acciones_06=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_06']=='1'){echo 'checked="checked"';}}?> ></span></div>06 - Para su conocimiento y fines
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_13" <?php if(isset($Acciones_13)) {if($Acciones_13=='1'){ echo 'selected="selected"';}} else {if($rowpOirs['Acciones_13']=='1'){echo 'selected="selected"';}}?> ></span></div>13 - Responder por orden del alcalde
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_07" <?php if(isset($Acciones_07)) {if($Acciones_07=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_07']=='1'){echo 'checked="checked"';}}?> ></span></div>07 - Para su informacion
            </label>
        </div>
    </div>
</div>    
    </td>
    <td colspan="2">
<div class="form-group">
    <div class="col-lg-8 width100">
        <div class="checkbox">
            <label>
            	<div><span><input class="uniform" type="checkbox" value="1" name="Acciones_14" <?php if(isset($Acciones_14)) {if($Acciones_14=='1'){ echo 'checked="checked"';}} else {if($rowpOirs['Acciones_14']=='1'){echo 'checked="checked"';}}?> ></span></div>14 - Coordina
            </label>
        </div>
    </div>
</div>    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4"><p class="oirs_title">Observaciones</p></td>
  </tr>
  <tr>
    <td colspan="4">
    <?php 
	//Se crean las variables a utilizar
	$idUsuario      = $arrUsuario['idUsuario'];	
	$id_Oirs        = $_GET['id'];
	//concateno
	$c = '?id_Oirs='.$id_Oirs;
	$c .= '&idUsuario='.$idUsuario;
	//Calculo el alto de la ventana de observaciones
	$alto_obs = (50*$n_obs)+200;
	?> 
    <iframe name="window" src="ingresos_observaciones.php<?php echo $c ?>" width="100%" height="<?php echo $alto_obs ?>" marginwidth="0" scrolling="yes" frameborder="0"></iframe>
    </td>
  </tr>
<tr>
    <td colspan="4"><p class="oirs_title">Archivos</p></td>
</tr>
  <tr>
    <td colspan="4">
    
    
    <iframe name="window" src="upload_main.php<?php echo $c ?>" width="100%" height="800" marginwidth="0" scrolling="no" frameborder="0"></iframe>   
 
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

        
   
			
            
			<div class="form-group">
            	<input type="hidden" value="<?php echo $_GET['id'] ?>" name="id_Oirs">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				$location .='?pagina='.$_GET['pagina'];
				if (isset($_GET['search'])) { 
				$location .='&search='.$_GET['search'];
				}
				if (isset($_GET['estado'])) { 
				$location .='&estado='.$_GET['estado'];
				}?>
                <?php $ubicacion=$location.'&id='.$_GET['id'].'&close='.$_GET['id'];?>
				<a onClick="msg2('<?php echo $ubicacion ?>')" class="btn btn-metis-5 fright margin_width">Cerrar OIRS</a>
                <a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>            
            
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  {
//Se inicializa el paginador de resultados
//tomo el numero de la pagina si es que este existe
if(isset($_GET["pagina"])){
	$num_pag = $_GET["pagina"];	
} else {
	$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){
	$comienzo = 0 ;
	$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//Creacion de una cadena para el filtro
$z="WHERE oirs_listado.id_Oirs > '0'";
//$z.="AND mnt_oirs_departamentos.idUsuario='".$arrUsuario['idUsuario']."'";
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search']!='' ){
	$z.="AND oirs_listado.id_Oirs LIKE '%{$_GET['search']}%'";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['estado']) && $_GET['estado']!='' ){
	$z.="AND oirs_listado.Estado='5'  ";	
}

//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT id_Oirs 
FROM `oirs_listado` 
INNER JOIN mnt_oirs_departamentos ON mnt_oirs_departamentos.idDepto = oirs_listado.idDepto
".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos las oirs
$arrOirs = array();
$query = "SELECT 
oirs_listado.id_Oirs,
oirs_listado.Fecha,
detalle_general.Nombre AS estado,
oirs_listado.Estado AS id_estado,
mnt_oirs_origen.descripcion AS origen,
mnt_oirs_destino.descripcion AS destino,
usuarios_listado.Nombre AS usuario
FROM `oirs_listado`
LEFT JOIN    `detalle_general`         ON detalle_general.id_Detalle      = oirs_listado.Estado
LEFT JOIN    `mnt_oirs_origen`         ON mnt_oirs_origen.id_origen_a     = oirs_listado.id_origen_a
LEFT JOIN    `mnt_oirs_destino`        ON mnt_oirs_destino.id_origen_b    = oirs_listado.id_origen_b
LEFT JOIN    `usuarios_listado`        ON usuarios_listado.idUsuario      = oirs_listado.idUsuario
LEFT JOIN    `mnt_oirs_departamentos`  ON mnt_oirs_departamentos.idDepto  = oirs_listado.idDepto
".$z."
ORDER BY estado ASC, oirs_listado.id_Oirs DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrOirs,$row );
}?>

<?php 
$location = $original;
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
if (isset($_GET['estado'])) { 
$location .='&estado='.$_GET['estado'];
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar OIRS</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="N° OIRS">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onClick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo OIRS</a><?php } ?>
</div>
                      
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de OIRS</h5>
		</header>
        
              
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
    	<th width="60">N°</th>
        <th width="100">F Creacion</th>
        <th width="472">Nombre del creador</th>
        <th width="100">Estado</th>
        <th width="160">Origen</th>
        <th width="160">Destino</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrOirs as $oirs) { ?>
    	<tr class="odd">
			<td class=" "><?php echo n_doc($oirs['id_Oirs']); ?></td>
            <td class=" "><?php echo $oirs['Fecha']; ?></td>
			<td class=" "><?php echo $oirs['usuario']; ?></td>
            <td class=" "><?php echo $oirs['estado']; ?></td>
			<td class=" "><?php echo $oirs['origen']; ?></td>
			<td class=" "><?php echo $oirs['destino']; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$oirs['id_Oirs']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
                <?php if($oirs['id_estado']=='5'){?>
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$oirs['id_Oirs']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$oirs['id_Oirs'];?>
				<a onClick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php } ?>
                <?php } ?>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
//Verifico si hay mas de una pagina, sino coulto el paginador
if($total_paginas>1){
//Cargamos la ubicacion original
$location = $original;
$location .='?pagina=';
if (isset($_GET['search'])) { 
$x ='&search='.$_GET['search'];
} else {
$x='';	
}
if (isset($_GET['estado'])) { 
$x .='&estado='.$_GET['estado'];
}?>
    <div class="row">
        <div class="contaux">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination menucent">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">← Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">← Anterior</a></li>
                    <?php } ?>
                    
                    <?php if ($total_paginas>10){
						if(0>$num_pag-5){
							for ($i = 1; $i <= 10; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }
						}elseif($total_paginas<$num_pag+5){
							for ($i = $num_pag-5; $i <= $total_paginas; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }	
						}else{
							for ($i = $num_pag-4; $i <= $num_pag+5; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }	
						}		
					}else{
						for ($i = 1; $i <= $total_paginas; $i++) { ?>
                   		<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
                        <?php }
						}?>
                    <?php if(($num_pag + 1)<=$total_paginas) { ?>
                    <li class="next"><a href="<?php echo $location.($num_pag+1).$x ?>">Siguiente → </a></li>
                    <?php } else {?>
                    <li class="next disabled"><a href="">Siguiente → </a></li>
                    <?php } ?>
                </ul>
            </div> 
        </div>
    </div>
<?php }?>   
</div>
    
    
    
		</div>
         
<?php } ?>             
			<!-- InstanceEndEditable -->   
            </div>
        </div>
      </div> 
    </div>
    <?php require_once 'core/footer.php';?>
    <!--jQuery 2.1.0 -->
    <script src="assets/lib/jquery/jquery.min.js"></script>
    <!--Bootstrap -->
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- Screenfull -->
    <script src="assets/lib/screenfull/screenfull.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script src="assets/lib/jquery.tablesorter/jquery.tablesorter.min.js"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/lib/flot/jquery.flot.js"></script>
    <script src="assets/lib/flot/jquery.flot.selection.js"></script>
    <script src="assets/lib/flot/jquery.flot.resize.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>