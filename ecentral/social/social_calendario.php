<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 2);
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
/*                                     Se filtran las entradas para evitar ataques                                                */
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
$original = "social_calendario.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 
	//agregamos ubicacion
	$location.='?create=true';
	if (isset($_GET['month'])) { 
	$location .='&month='.$_GET['month'].'&year='.$_GET['year'];
	}
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/social_eventos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/social_eventos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/social_eventos.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit']) )  { 
	//agregamos ubicacion
	$location.='?mod=true';
	if (isset($_GET['month'])) { 
	$location .='&month='.$_GET['month'].'&year='.$_GET['year'].'&view='.$_GET['edit'];
	}
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/social_eventos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/social_eventos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/social_eventos.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//agregamos ubicacion
	$location.='?delete=true';
	if (isset($_GET['month'])) { 
	$location .='&month='.$_GET['month'].'&year='.$_GET['year'];
	}
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/social_eventos.php';
}
//formulario para editar usuario
if ( !empty($_POST['Submit_vecino']) )  { 
	//agregamos ubicacion
	$location.='?vecino_add=true';
	if (isset($_GET['month'])) { 
	$location .='&month='.$_GET['month'].'&year='.$_GET['year'].'&view='.$_GET['view'];
	}
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_asistencia_eventos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_asistencia_eventos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_asistencia_eventos.php';
}
//se borra un dato
if ( !empty($_GET['del_vecino']) )     {
	//agregamos ubicacion
	$location.='?delete_vecino=true';
	if (isset($_GET['month'])) { 
	$location .='&month='.$_GET['month'].'&year='.$_GET['year'].'&view='.$_GET['view'];
	}
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/clientes_asistencia_eventos.php';
}
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Calendario de Actividades</title>
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
    $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val();
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
            <i class="fa fa-dashboard"></i> Calendario de Actividades
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
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($errors[5])) {echo $errors[5];}?>
<?php  if (isset($errors[6])) {echo $errors[6];}?>
<?php  if (isset($_GET['create'])) {?>
<div id="txf_01" class="alert_sucess">  
	Evento calendario Creado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_01" class="alert_sucess">  
	Evento calendario Modificado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_01" class="alert_sucess">  
	Evento calendario borrado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['vecino_add'])) {?>
<div id="txf_01" class="alert_sucess">  
	Vecino agregado al evento correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete_vecino'])) {?>
<div id="txf_01" class="alert_sucess">  
	Vecino eliminado del evento correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['edit']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT id_sociallist, Titulo, Fecha, Descripcion, Color
FROM `social_eventos`
WHERE idEvento = {$_GET['edit']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

//se trae un listado con todas las categorias
$arrCategorias = array();
$query = "SELECT 
mnt_social_listado.id_sociallist,
mnt_social_categorias.Nombre AS Nombre_cat,
mnt_social_listado.Nombre
FROM `mnt_social_listado`
INNER JOIN `mnt_social_categorias`   ON mnt_social_categorias.id_socialcat         = mnt_social_listado.id_socialcat
WHERE mnt_social_listado.Tipo = '1'
ORDER BY Nombre_cat ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
mysql_free_result($resultado); ?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Editar evento calendario</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        	
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Categoria Evento</label>
                <div class="col-lg-8">
                <select name="id_sociallist" class="form-control" required >
                <option value="" selected>Seleccione categoria evento</option>
                <?php foreach ( $arrCategorias as $categorias ) { ?>
                <option value="<?php echo $categorias['id_sociallist']; ?>" <?php if(isset($id_sociallist)&& $id_sociallist==$categorias['id_sociallist']){ echo 'selected="selected"';}else{if($rowdata['id_sociallist']==$categorias['id_sociallist']){ echo 'selected="selected"'; }}?>><?php echo $categorias['Nombre_cat'].'-'.$categorias['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Titulo" class="form-control"  name="Titulo" value="<?php if(isset($Titulo)) {echo $Titulo;}else{echo $rowdata['Titulo']; }?>" required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Fecha</label>
				<div class="col-lg-8">
				<input type="text" class="form-control" name="Fecha" id="datepicker" readonly <?php if(isset($Fecha)) {echo 'value="'.$Fecha.'"';}else{echo 'value="'.$rowdata['Fecha'].'"'; }?> placeholder="Fecha del evento" >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Descripcion</label>
				<div class="col-lg-8">
					<textarea id="text4" class="form-control" name="Descripcion" required><?php if(isset($Descripcion)) {echo $Descripcion;}else{echo $rowdata['Descripcion']; }?></textarea>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Color</label>
				<div class="col-lg-8">
					<select name="Color" class="form-control" required >
                    	<option value="" selected>Seleccione color del evento</option>
                        <option value="evcal_color1" <?php if(isset($Color)&&$Color=='evcal_color1') {echo 'selected';}else{if($rowdata['Color']=='evcal_color1'){echo 'selected';}}?> >Gris</option>
                        <option value="evcal_color2" <?php if(isset($Color)&&$Color=='evcal_color2') {echo 'selected';}else{if($rowdata['Color']=='evcal_color2'){echo 'selected';}}?> >Verde</option>
                        <option value="evcal_color3" <?php if(isset($Color)&&$Color=='evcal_color3') {echo 'selected';}else{if($rowdata['Color']=='evcal_color3'){echo 'selected';}}?> >Celeste</option>
                        <option value="evcal_color4" <?php if(isset($Color)&&$Color=='evcal_color4') {echo 'selected';}else{if($rowdata['Color']=='evcal_color4'){echo 'selected';}}?> >Naranja</option>
                        <option value="evcal_color5" <?php if(isset($Color)&&$Color=='evcal_color5') {echo 'selected';}else{if($rowdata['Color']=='evcal_color5'){echo 'selected';}}?> >Azul</option>
                    </select>
				</div>
			</div>
 
			<div class="form-group">
            	<input type="hidden" value="<?php echo $_GET['edit']; ?>" name="idEvento">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit">
               
               <?php if(isset($_GET["month"])){
				$location.=	'?view='.$_GET["edit"].'&month='.$_GET["month"].'&year='.$_GET["year"];
				}?>
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT 
mnt_social_categorias.Nombre AS Nombre_cat,
mnt_social_listado.Nombre AS Nombre_list,
social_eventos.Titulo,
social_eventos.Fecha,
social_eventos.Descripcion
FROM `social_eventos`
INNER JOIN `mnt_social_listado`      ON mnt_social_listado.id_sociallist    = social_eventos.id_sociallist
LEFT JOIN `mnt_social_categorias`    ON mnt_social_categorias.id_socialcat  = mnt_social_listado.id_socialcat
WHERE social_eventos.idEvento = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
//Se trae un listado con todos los vecinos que asistiran
$arrAsistentes = array();
$query = "SELECT 
clientes_listado.idCliente,
clientes_listado.Rut,
clientes_listado.Nombres,
clientes_listado.ApellidoPat,
clientes_listado.ApellidoMat,
clientes_asistencia_eventos.idAsistencia
FROM `clientes_asistencia_eventos`
INNER JOIN `clientes_listado`  ON clientes_listado.idCliente  = clientes_asistencia_eventos.idCliente
WHERE  clientes_asistencia_eventos.idEvento = {$_GET['view']}
ORDER BY clientes_listado.Nombres ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAsistentes,$row );
}
//Se trae un listado con todos los vecinos
$arrUsers = array();
$query = "SELECT 
clientes_listado.idCliente,
clientes_listado.Rut,
clientes_listado.Nombres,
clientes_listado.ApellidoPat,
clientes_listado.ApellidoMat
FROM `clientes_listado`
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = clientes_listado.Estado
WHERE clientes_listado.Estado=1
ORDER BY clientes_listado.Rut ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>

<div class="col-lg-12 fcenter">
	<div class="box">
		<header>
			<h5>Datos del evento</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <p class="text-muted"><strong>Categoria Evento: </strong><?php echo $rowdata['Nombre_cat']; ?></p>
            <p class="text-muted"><strong>Tipo Evento : </strong><?php echo $rowdata['Nombre_list']; ?></p>
            <p class="text-muted"><strong>Titulo : </strong><?php echo $rowdata['Titulo']; ?></p>
            <p class="text-muted"><strong>Fecha prevista : </strong><?php echo Fecha_completa($rowdata['Fecha']); ?></p>
            <p class="text-muted"><strong>Descripcion : </strong><?php echo $rowdata['Descripcion']; ?></p>  
        </div>
	</div>
<?php if(isset($_GET["month"])){
	$location.=	'?month='.$_GET["month"].'&year='.$_GET["year"];
}?>
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&edit='.$_GET["view"]; ?>" class="btn btn-primary fright" data-original-title="" title="">Editar Evento</a><?php }?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$_GET["view"];?>
<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="btn btn-danger fright margin_width">Borrar Evento</a><?php } ?>
</div>
<div class="clearfix"></div>


<?php if ($rowlevel['level']>=3){?>
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons">
				<i class="fa fa-exchange"></i>
			</div>
			<h5>Agregar Vecinos asistentes al evento</h5>
		</header>
		<div class="body">
		<form  class="form-inline"  method="post" name="form1">
		<div class="row form-group col-lg-8">
			<div class="col-lg-12">
				<select class="form-control width100" name="idCliente">
					<option value="">Seleccione un Vecino</option>
                    <?php foreach ($arrUsers as $usuarios) { ?>
					<option value="<?php echo $usuarios['idCliente'] ?>"><?php echo $usuarios['Rut'].' - '.$usuarios['Nombres'].' '.$usuarios['ApellidoPat'].' '.$usuarios['ApellidoMat'] ?></option>
                    <?php }?>  
				</select>
			</div><!-- /.col-lg-6 -->
		</div><!-- /.row -->
        <div class="row form-group col-lg-4">
			<div class="col-lg-12">
				<input class="form-control filter width100" type="text" name="Nombre" placeholder="Filtrar" value="" onKeyUp="myfilter.set(this.value)">
                <script type="text/javascript">
					<!--
					var myfilter = new filterlist(document.form1.idCliente);
					//-->
				</script>
			</div>	
		</div>
        <input type="hidden"  name="idEvento"           value="<?php echo $_GET['view']; ?>" >
        <input type="hidden"  name="Fecha_inscripcion"  value="<?php echo fecha_actual(); ?>" >
        <input type="hidden"  name="Estado"             value="10" >
        	
		<input type="submit" class="btn btn-primary" value="Agregar" name="Submit_vecino">
		</form>
		</div>
	</div>
</div>
<?php }?>             
                      
                                 

<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Vecinos Inscritos</h5>
		</header>         
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="209">Rut</th>
        <th>Nombre del Vecino</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>                    
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrAsistentes as $asistentes) { ?>
    	<tr class="odd">
			<td class=" sorting_1"><?php echo $asistentes['Rut']; ?></td>
			<td class=" "><?php echo $asistentes['Nombres'].' '.$asistentes['ApellidoPat'].' '.$asistentes['ApellidoMat']; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=3){?><?php $ubicacion=$location.'&del_vecino='.$asistentes['idAsistencia'].'&month='.$_GET['month'].'&year='.$_GET['year'].'&view='.$_GET['view'];?>
				<a onclick="msg('<?php echo $ubicacion ?>')" title="Descartar asistencia" class="icon-borrar info-tooltip"></a><?php } ?>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
</div>
</div>


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
<div class="clearfix"></div>
</div>        
        

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
//se trae un listado con todas las categorias
$arrCategorias = array();
$query = "SELECT 
mnt_social_listado.id_sociallist,
mnt_social_categorias.Nombre AS Nombre_cat,
mnt_social_listado.Nombre
FROM `mnt_social_listado`
INNER JOIN `mnt_social_categorias`       ON mnt_social_categorias.id_socialcat         = mnt_social_listado.id_socialcat
WHERE mnt_social_listado.Tipo = '1'
ORDER BY Nombre_cat ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
mysql_free_result($resultado); ?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Evento</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        	
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Categoria Evento</label>
                <div class="col-lg-8">
                <select name="id_sociallist" class="form-control" required >
                <option value="" selected>Seleccione categoria evento</option>
                <?php foreach ( $arrCategorias as $categorias ) { ?>
                <option value="<?php echo $categorias['id_sociallist']; ?>" <?php if(isset($id_sociallist)&& $id_sociallist==$categorias['id_sociallist']){ echo 'selected="selected"';}?>><?php echo $categorias['Nombre_cat'].'-'.$categorias['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Titulo" class="form-control"  name="Titulo" <?php if(isset($Titulo)) {echo 'value="'.$Titulo.'"';}?> required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Fecha</label>
				<div class="col-lg-8">
				<input type="text" class="form-control" name="Fecha" id="datepicker" readonly <?php if(isset($Fecha)) {echo 'value="'.$Fecha.'"';}?> placeholder="Fecha del evento"  >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Descripcion</label>
				<div class="col-lg-8">
					<textarea id="text4" class="form-control" name="Descripcion" required><?php if(isset($Descripcion)) {echo $Descripcion;}?></textarea>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Color</label>
				<div class="col-lg-8">
					<select name="Color" class="form-control" required >
                    	<option value="" selected>Seleccione color del evento</option>
                        <option value="evcal_color1" <?php if(isset($Color)&&$Color=='evcal_color1') {echo 'selected';}?> >Gris</option>
                        <option value="evcal_color2" <?php if(isset($Color)&&$Color=='evcal_color2') {echo 'selected';}?> >Verde</option>
                        <option value="evcal_color3" <?php if(isset($Color)&&$Color=='evcal_color3') {echo 'selected';}?> >Celeste</option>
                        <option value="evcal_color4" <?php if(isset($Color)&&$Color=='evcal_color4') {echo 'selected';}?> >Naranja</option>
                        <option value="evcal_color5" <?php if(isset($Color)&&$Color=='evcal_color5') {echo 'selected';}?> >Azul</option>
                    </select>
				</div>
			</div>
 
			<div class="form-group">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
                <?php if(isset($_GET["month"])){
				$location.=	'?month='.$_GET["month"].'&year='.$_GET["year"];
				}?>
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Se define el numero del mes si es que no existe
if(isset($_GET["month"])){
	$month = $_GET["month"];
} else {
	$month = date("n");	
}
if(isset($_GET["year"])){
	$year  = $_GET["year"];	
} else {
	$year  = date("Y");
}

//Se verifica el dia actual
$diaActual=date("j");

# Obtenemos el dia de la semana del primer dia
# Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7; 
# Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
//Meses
$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

// Se trae un listado con todos los usuarios
$arrEventos = array();
$query = "SELECT idEvento, Titulo, day, Color
FROM `social_eventos`
WHERE year={$year} AND month={$month}
ORDER BY Fecha ASC  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEventos,$row );
}


?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1"></form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location.'?month='.$month.'&year='.$year; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Evento</a><?php }?>
</div>




<div class="col-lg-12">
<div class="box">
    <header>
        <h5>Calendario de eventos</h5>
    </header>
                  
                  
                  
<div id="calendar_content" class="body">
<div id="calendar" class="fc fc-ltr">

<table class="fc-header" style="width:100%">
<tbody>
<tr>
	<?php
	if(isset($_GET["year"])){
		$year_a  = $_GET["year"];
		$year_b  = $_GET["year"];	
	} else {
		$year_a  = date("Y");
		$year_b  = date("Y");
	}

	if (($month-1)==0)  {$mes_atras=12;   $year_a=$year_a-1;}else{$mes_atras=$month-1; }
	if (($month+1)==13) {$mes_adelante=1; $year_b=$year_b+1;}else{$mes_adelante=$month+1; }
	?>
    <td class="fc-header-left"><a href="<?php echo $location.'?month='.$mes_atras.'&year='.$year_a ?>" class="btn btn-default" data-original-title="" title="">‹</a></td>
    <td class="fc-header-center"><span class="fc-header-title"><h2><?php echo $meses[$month]." ".$year?></h2></span></td>
	<td class="fc-header-right"><a href="<?php echo $location.'?month='.$mes_adelante.'&year='.$year_b ?>" class="btn btn-default" data-original-title="" title="">›</a></td>
</tr>
</tbody>
</table>

<div class="fc-content" style="position: relative;">
<div class="fc-view fc-view-month fc-grid" style="position:relative" unselectable="on">

<table class="fc-border-separate correct_border" style="width:100%" cellspacing="0"> 
	<thead>
        <tr class="fc-first fc-last"> 
            <th class="fc-day-header fc-sun fc-widget-header" width="14%">Lunes</th>
            <th class="fc-day-header fc-sun fc-widget-header" width="14%">Martes</th>
            <th class="fc-day-header fc-sun fc-widget-header" width="14%">Miercoles</th>
            <th class="fc-day-header fc-sun fc-widget-header" width="14%">Jueves</th>
            <th class="fc-day-header fc-sun fc-widget-header" width="14%">Viernes</th>
            <th class="fc-day-header fc-sun fc-widget-header" width="14%">Sabado</th>
            <th class="fc-day-header fc-sun fc-widget-header" width="14%">Domingo</th>
        </tr>
    </thead>
    <tbody>
        <tr class="fc-week"> 
            <?php
            $last_cell=$diaSemana+$ultimoDiaMes;
            // hacemos un bucle hasta 42, que es el máximo de valores que puede
            // haber... 6 columnas de 7 dias
            for($i=1;$i<=42;$i++){
                if($i==$diaSemana){
                    // determinamos en que dia empieza
                    $day=1;
                }
                if($i<$diaSemana || $i>=$last_cell){
                    // celca vacia
                    echo "<td class='fc-day fc-wed fc-widget-content fc-other-month fc-future fc-state-none'> </td>";
                }else{
                    // mostramos el dia ?>  
                    	 <td class="fc-day fc-sun fc-widget-content fc-past fc-first <?php if($day==$diaActual){ echo 'fc-state-highlight'; }?>">
                            <div class="calendar_min">
                            <div class="fc-day-number"><?php echo $meses[$month].' '.$day; ?></div>
                            <div class="fc-day-content">
                            <?php foreach ($arrEventos as $evento) { ?>
								<?php if ($evento['day']==$day) {?>
                                    <div class="event_calendar <?php echo $evento['Color'] ?>"><a href="<?php if ($rowlevel['level']>=1){?><?php echo $location.'?view='.$evento['idEvento'].'&month='.$month.'&year='.$year ?><?php }?>"><?php echo cortar($evento['Titulo'], 20) ?></a></div>
                                <?php } ?>
                            <?php } ?>    
                            </div></div>
                        </td>
                        
					<?php  
					$day++;
                }
                // cuando llega al final de la semana, iniciamos una columna nueva
                if($i%7==0){
                    echo "</tr><tr class='fc-week'>\n";
                }
            }
        ?>
        </tr>
    </tbody>
</table>

</div></div></div>
                  </div>
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