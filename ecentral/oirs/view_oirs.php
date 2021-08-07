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
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Vista de OIRS</title>
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
            <i class="fa fa-dashboard"></i> Vista de Solicitudes
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

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
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
LEFT JOIN `mnt_oirs_origen`           ON mnt_oirs_origen.id_origen_a             = oirs_listado.id_origen_a
LEFT JOIN `mnt_oirs_destino`          ON mnt_oirs_destino.id_origen_b            = oirs_listado.id_origen_b
LEFT JOIN `mnt_oirs_antecedentes`     ON mnt_oirs_antecedentes.id_antecedentes   = oirs_listado.id_antecedentes
LEFT JOIN `mnt_oirs_materia`          ON mnt_oirs_materia.id_materia             = oirs_listado.id_materia
LEFT JOIN `clientes_listado`          ON clientes_listado.idCliente              = oirs_listado.idCliente
LEFT JOIN `mnt_oirs_departamentos`    ON mnt_oirs_departamentos.idDepto          = oirs_listado.idDepto
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
    <option value="" selected><?php echo $rowpOirs['Nombre_cliente'].' '.$rowpOirs['ApellidoPat_cliente'].' '.$rowpOirs['ApellidoMat_cliente'] ?></option>
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
	$id_Oirs        = $_GET['view'];
	//concateno
	$c = '?id_Oirs='.$id_Oirs;
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