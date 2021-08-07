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
/*                                        Se filtran las entradas para evitar ataques                                             */
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
$original = "informes_social.php";
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
if ( !empty($_GET['agregar_social']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location .='&id='.$_GET['id'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/social_asistencia.php';
}
if ( !empty($_GET['idAsistencia']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location .='&id='.$_GET['id'];
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/social_asistencia_2.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location .='&id='.$_GET['id'];
	$location.='&delete=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/social_asistencia.php';
}



?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Informe Social</title>
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
            <i class="fa fa-dashboard"></i> Informe Social
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
 if ( ! empty($_GET['details']) ) { 
//Se filtran los datos
$q = "WHERE clientes_asistencia.idAsistencia > 0 ";
$x = '?tipo_informe=Calendario';
//filtro de id_socialcat
if(isset($_GET['id_socialcat']) && $_GET['id_socialcat'] != ''){ 
 $q .= " AND mnt_social_listado.id_socialcat = '{$_GET['id_socialcat']}'" ;
 $x .= '&id_socialcat='.$_GET['id_socialcat'];
}
//filtro de id_sociallist
if(isset($_GET['id_sociallist']) && $_GET['id_sociallist'] != ''){ 
 $q .= " AND social_eventos.id_sociallist = '{$_GET['id_sociallist']}'" ;
 $x .= '&id_sociallist='.$_GET['id_sociallist'];
}
//filtro de idEvento
if(isset($_GET['idEvento']) && $_GET['idEvento'] != ''){ 
 $q .= " AND clientes_asistencia.idEvento = '{$_GET['idEvento']}'" ;
 $x .= '&idEvento='.$_GET['idEvento'];
}
//filtro de Fecha_evento
if(isset($_GET['Fecha_evento']) && $_GET['Fecha_evento'] != ''){ 
 $q .= " AND social_eventos.Fecha = '{$_GET['Fecha_evento']}'" ;
 $x .= '&Fecha_evento='.$_GET['Fecha_evento'];
}
//filtro de Fecha_inscripcion
if(isset($_GET['Fecha_inscripcion']) && $_GET['Fecha_inscripcion'] != ''){ 
 $q .= " AND clientes_asistencia.Fecha_inscripcion = '{$_GET['Fecha_inscripcion']}'" ;
 $x .= '&Fecha_inscripcion='.$_GET['Fecha_inscripcion'];
}
//filtro de idCliente
if(isset($_GET['idCliente']) && $_GET['idCliente'] != ''){ 
 $q .= " AND clientes_asistencia.idCliente = '{$_GET['idCliente']}'" ;
 $x .= '&idCliente='.$_GET['idCliente'];
}
//filtro de Estado
if(isset($_GET['Estado']) && $_GET['Estado'] != ''){ 
 $q .= " AND clientes_asistencia.Estado = '{$_GET['Estado']}'" ;
 $x .= '&Estado='.$_GET['Estado'];
}
//filtro de day
if(isset($_GET['day']) && $_GET['day'] != ''){ 
 $q .= " AND social_eventos.day = '{$_GET['day']}'" ;
 $x .= '&day='.$_GET['day'];
}
//filtro de month
if(isset($_GET['month']) && $_GET['month'] != ''){ 
 $q .= " AND social_eventos.month = '{$_GET['month']}'" ;
 $x .= '&month='.$_GET['month'];
}
//filtro de year
if(isset($_GET['year']) && $_GET['year'] != ''){ 
 $q .= " AND social_eventos.year = '{$_GET['year']}'" ;
 $x .= '&year='.$_GET['year'];
}


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
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT 
clientes_asistencia.idAsistencia
FROM `clientes_asistencia`
LEFT JOIN `social_eventos`          ON social_eventos.idEvento            = clientes_asistencia.idEvento
LEFT JOIN `mnt_social_listado`      ON mnt_social_listado.id_sociallist   = social_eventos.id_sociallist
".$q;
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);



//se trae un listado con todas las categorias
$arrAsistencia = array();
$query = "SELECT 
mnt_social_categorias.Nombre AS Nombre_cat,
mnt_social_listado.Nombre AS Nombre_list,
social_eventos.Titulo AS Nombre_evento,
social_eventos.Fecha AS fecha_evento,
clientes_asistencia.Fecha_inscripcion,
detalle_general.Nombre AS estado_evento,
clientes_listado.Nombre AS Nombre_cliente,
clientes_listado.Apellidos AS Apellidos_cliente
FROM `clientes_asistencia`
LEFT JOIN `social_eventos`          ON social_eventos.idEvento                = clientes_asistencia.idEvento
LEFT JOIN `mnt_social_listado`      ON mnt_social_listado.id_sociallist       = social_eventos.id_sociallist
LEFT JOIN `mnt_social_categorias`   ON mnt_social_categorias.id_socialcat     = mnt_social_listado.id_socialcat
LEFT JOIN `detalle_general`         ON detalle_general.id_Detalle             = clientes_asistencia.Estado
LEFT JOIN `clientes_listado`        ON clientes_listado.idCliente             = clientes_asistencia.idCliente
".$q."
ORDER BY Nombre_cat ASC
LIMIT $comienzo, $cant_reg";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAsistencia,$row );
}
 
 ?>


<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Eventos asistidos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th>Evento</th>
        <th>Fecha Evento</th>
        <th>Fecha Inscripcion</th>
        <th>¿Asistio?</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrAsistencia as $asistencia) { ?>
    	<tr class="odd">
        	<td class=" "><?php echo $asistencia['Nombre_cliente'].' '.$asistencia['Apellidos_cliente']; ?></td>
			<td class=" "><?php echo $asistencia['Nombre_cat'].' - '.$asistencia['Nombre_list'].' - '.$asistencia['Nombre_evento']; ?></td>
			<td class=" "><?php echo $asistencia['fecha_evento']; ?></td>
            <td class=" "><?php echo $asistencia['Fecha_inscripcion']; ?></td>
			<td class=" "><?php echo $asistencia['estado_evento']; ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<a href="<?php echo $location.$x; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>  
</div>    
</div>
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 }elseif ( ! empty($_GET['tipo_informe'])&&$_GET['tipo_informe']=='Calendario' ) { 
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
//Obtenemos el dia de la semana del primer dia
//Devuelve 0 para domingo, 6 para sabado
$diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7; 
//Obtenemos el ultimo dia del mes
$ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1));
//Meses
$meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
"Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");


//Se filtran los datos
$q = "WHERE social_eventos.year={$year} AND social_eventos.month={$month} ";
$x = '&tipo_informe=Calendario';
//filtro de id_socialcat
if(isset($_GET['id_socialcat']) && $_GET['id_socialcat'] != ''){ 
 $q .= " AND mnt_social_listado.id_socialcat = '{$_GET['id_socialcat']}'" ;
 $x .= '&id_socialcat='.$_GET['id_socialcat'];
}
//filtro de id_sociallist
if(isset($_GET['id_sociallist']) && $_GET['id_sociallist'] != ''){ 
 $q .= " AND social_eventos.id_sociallist = '{$_GET['id_sociallist']}'" ;
 $x .= '&id_sociallist='.$_GET['id_sociallist'];
}
//filtro de idEvento
if(isset($_GET['idEvento']) && $_GET['idEvento'] != ''){ 
 $q .= " AND clientes_asistencia.idEvento = '{$_GET['idEvento']}'" ;
 $x .= '&idEvento='.$_GET['idEvento'];
}
//filtro de Fecha_evento
if(isset($_GET['Fecha_evento']) && $_GET['Fecha_evento'] != ''){ 
 $q .= " AND social_eventos.Fecha = '{$_GET['Fecha_evento']}'" ;
 $x .= '&Fecha_evento='.$_GET['Fecha_evento'];
}
//filtro de Fecha_inscripcion
if(isset($_GET['Fecha_inscripcion']) && $_GET['Fecha_inscripcion'] != ''){ 
 $q .= " AND clientes_asistencia.Fecha_inscripcion = '{$_GET['Fecha_inscripcion']}'" ;
 $x .= '&Fecha_inscripcion='.$_GET['Fecha_inscripcion'];
}
//filtro de idCliente
if(isset($_GET['idCliente']) && $_GET['idCliente'] != ''){ 
 $q .= " AND clientes_asistencia.idCliente = '{$_GET['idCliente']}'" ;
 $x .= '&idCliente='.$_GET['idCliente'];
}
//filtro de Estado
if(isset($_GET['Estado']) && $_GET['Estado'] != ''){ 
 $q .= " AND clientes_asistencia.Estado = '{$_GET['Estado']}'" ;
 $x .= '&Estado='.$_GET['Estado'];
}
// Se trae un listado con todos los usuarios
$arrEventos = array();
$query = "SELECT 
social_eventos.idEvento AS id_evento,
social_eventos.Titulo AS Nombre_evento,
social_eventos.day AS day_evento,
social_eventos.Color AS Color_evento
FROM `clientes_asistencia`
LEFT JOIN `social_eventos`          ON social_eventos.idEvento                = clientes_asistencia.idEvento
LEFT JOIN `mnt_social_listado`      ON mnt_social_listado.id_sociallist       = social_eventos.id_sociallist
".$q."
ORDER BY day_evento ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEventos,$row );
}
?>


<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1"></form>
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
    <td class="fc-header-left"><a href="<?php echo $location.'?month='.$mes_atras.'&year='.$year_a.$x ?>" class="btn btn-default" data-original-title="" title="">‹</a></td>
    <td class="fc-header-center"><span class="fc-header-title"><h2><?php echo $meses[$month]." ".$year?></h2></span></td>
	<td class="fc-header-right"><a href="<?php echo $location.'?month='.$mes_adelante.'&year='.$year_b.$x ?>" class="btn btn-default" data-original-title="" title="">›</a></td>
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
								<?php if ($evento['day_evento']==$day) {?>
                                <div class="event_calendar <?php echo $evento['Color_evento'] ?>">
                                    <a href="<?php echo $location.'?view='.$evento['id_evento'].'&day='.$evento['day_evento'].'&month='.$month.'&year='.$year.$x.'&details=true' ?>">
                                        <?php echo cortar($evento['Nombre_evento'], 20) ?>
                                    </a>
                                </div>
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
<?php 
//Verifico si existe la variable de busqueda y pagina 
$location = $original;
?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
</div>
 

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['tipo_informe'])&&$_GET['tipo_informe']=='Listado' ) { 
//Se filtran los datos
$q = "WHERE clientes_asistencia.idAsistencia > 0 ";
$x = '?tipo_informe=Listado';
//filtro de id_socialcat
if(isset($_GET['id_socialcat']) && $_GET['id_socialcat'] != ''){ 
 $q .= " AND mnt_social_listado.id_socialcat = '{$_GET['id_socialcat']}'" ;
 $x .= '&id_socialcat='.$_GET['id_socialcat'];
}
//filtro de id_sociallist
if(isset($_GET['id_sociallist']) && $_GET['id_sociallist'] != ''){ 
 $q .= " AND social_eventos.id_sociallist = '{$_GET['id_sociallist']}'" ;
 $x .= '&id_sociallist='.$_GET['id_sociallist'];
}
//filtro de idEvento
if(isset($_GET['idEvento']) && $_GET['idEvento'] != ''){ 
 $q .= " AND clientes_asistencia.idEvento = '{$_GET['idEvento']}'" ;
 $x .= '&idEvento='.$_GET['idEvento'];
}
//filtro de Fecha_evento
if(isset($_GET['Fecha_evento']) && $_GET['Fecha_evento'] != ''){ 
 $q .= " AND social_eventos.Fecha = '{$_GET['Fecha_evento']}'" ;
 $x .= '&Fecha_evento='.$_GET['Fecha_evento'];
}
//filtro de Fecha_inscripcion
if(isset($_GET['Fecha_inscripcion']) && $_GET['Fecha_inscripcion'] != ''){ 
 $q .= " AND clientes_asistencia.Fecha_inscripcion = '{$_GET['Fecha_inscripcion']}'" ;
 $x .= '&Fecha_inscripcion='.$_GET['Fecha_inscripcion'];
}
//filtro de idCliente
if(isset($_GET['idCliente']) && $_GET['idCliente'] != ''){ 
 $q .= " AND clientes_asistencia.idCliente = '{$_GET['idCliente']}'" ;
 $x .= '&idCliente='.$_GET['idCliente'];
}
//filtro de Estado
if(isset($_GET['Estado']) && $_GET['Estado'] != ''){ 
 $q .= " AND clientes_asistencia.Estado = '{$_GET['Estado']}'" ;
 $x .= '&Estado='.$_GET['Estado'];
}


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
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT 
clientes_asistencia.idAsistencia
FROM `clientes_asistencia`
LEFT JOIN `social_eventos`          ON social_eventos.idEvento                = clientes_asistencia.idEvento
LEFT JOIN `mnt_social_listado`      ON mnt_social_listado.id_sociallist       = social_eventos.id_sociallist
".$q;
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);



//se trae un listado con todas las categorias
$arrAsistencia = array();
$query = "SELECT 
mnt_social_categorias.Nombre AS Nombre_cat,
mnt_social_listado.Nombre AS Nombre_list,
social_eventos.Titulo AS Nombre_evento,
social_eventos.Fecha AS fecha_evento,
clientes_asistencia.Fecha_inscripcion,
detalle_general.Nombre AS estado_evento,
clientes_listado.Nombre AS Nombre_cliente,
clientes_listado.Apellidos AS Apellidos_cliente
FROM `clientes_asistencia`
LEFT JOIN `social_eventos`          ON social_eventos.idEvento                = clientes_asistencia.idEvento
LEFT JOIN `mnt_social_listado`      ON mnt_social_listado.id_sociallist       = social_eventos.id_sociallist
LEFT JOIN `mnt_social_categorias`   ON mnt_social_categorias.id_socialcat     = mnt_social_listado.id_socialcat
LEFT JOIN `detalle_general`         ON detalle_general.id_Detalle             = clientes_asistencia.Estado
LEFT JOIN `clientes_listado`        ON clientes_listado.idCliente             = clientes_asistencia.idCliente
".$q."
ORDER BY Nombre_cat ASC
LIMIT $comienzo, $cant_reg";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAsistencia,$row );
}
 
 ?>


<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Eventos asistidos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th>Evento</th>
        <th>Fecha Evento</th>
        <th>Fecha Inscripcion</th>
        <th>¿Asistio?</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrAsistencia as $asistencia) { ?>
    	<tr class="odd">
        	<td class=" "><?php echo $asistencia['Nombre_cliente'].' '.$asistencia['Apellidos_cliente']; ?></td>
			<td class=" "><?php echo $asistencia['Nombre_cat'].' - '.$asistencia['Nombre_list'].' - '.$asistencia['Nombre_evento']; ?></td>
			<td class=" "><?php echo $asistencia['fecha_evento']; ?></td>
            <td class=" "><?php echo $asistencia['Fecha_inscripcion']; ?></td>
			<td class=" "><?php echo $asistencia['estado_evento']; ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
//Verifico si existe la variable de busqueda y pagina 
$location = $original;
?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>  
</div>    
</div>

<?php 
//Verifico si hay mas de una pagina, sino coulto el paginador
if($total_paginas>1){
//Cargamos la ubicacion original
$location = $original;
$location .=$x;
$location .='&pagina=';
?>
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
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['tipo_informe'])&&$_GET['tipo_informe']=='Grafico' ) { 
//Se filtran los datos
$q = "WHERE clientes_asistencia.idAsistencia > 0 ";
//filtro de id_socialcat
if(isset($_GET['id_socialcat']) && $_GET['id_socialcat'] != ''){ 
 $q .= " AND mnt_social_listado.id_socialcat = '{$_GET['id_socialcat']}'" ;
}
//filtro de id_sociallist
if(isset($_GET['id_sociallist']) && $_GET['id_sociallist'] != ''){ 
 $q .= " AND social_eventos.id_sociallist = '{$_GET['id_sociallist']}'" ;
}
//filtro de idEvento
if(isset($_GET['idEvento']) && $_GET['idEvento'] != ''){ 
 $q .= " AND clientes_asistencia.idEvento = '{$_GET['idEvento']}'" ;
}
//filtro de Fecha_evento
if(isset($_GET['Fecha_evento']) && $_GET['Fecha_evento'] != ''){ 
 $q .= " AND social_eventos.Fecha = '{$_GET['Fecha_evento']}'" ;
}
//filtro de Fecha_inscripcion
if(isset($_GET['Fecha_inscripcion']) && $_GET['Fecha_inscripcion'] != ''){ 
 $q .= " AND clientes_asistencia.Fecha_inscripcion = '{$_GET['Fecha_inscripcion']}'" ;
}
//filtro de idCliente
if(isset($_GET['idCliente']) && $_GET['idCliente'] != ''){ 
 $q .= " AND clientes_asistencia.idCliente = '{$_GET['idCliente']}'" ;
}
//filtro de Estado
if(isset($_GET['Estado']) && $_GET['Estado'] != ''){ 
 $q .= " AND clientes_asistencia.Estado = '{$_GET['Estado']}'" ;
} 

//se trae un listado con todas las categorias
$arrCategoria = array();
$query = "SELECT 
mnt_social_categorias.Nombre AS Nombre_cat,
COUNT(social_eventos.Titulo) AS total_eventos
FROM `clientes_asistencia`
LEFT JOIN `social_eventos`          ON social_eventos.idEvento                = clientes_asistencia.idEvento
LEFT JOIN `mnt_social_listado`      ON mnt_social_listado.id_sociallist       = social_eventos.id_sociallist
LEFT JOIN `mnt_social_categorias`   ON mnt_social_categorias.id_socialcat     = mnt_social_listado.id_socialcat
".$q."
GROUP BY Nombre_cat ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategoria,$row );
}

//se trae un listado con todos los tipos
$arrTipo = array();
$query = "SELECT 
mnt_social_categorias.Nombre AS Nombre_cat,
mnt_social_listado.Nombre AS Nombre_tipo,
COUNT(social_eventos.Titulo) AS total_eventos
FROM `clientes_asistencia`
LEFT JOIN `social_eventos`          ON social_eventos.idEvento                = clientes_asistencia.idEvento
LEFT JOIN `mnt_social_listado`      ON mnt_social_listado.id_sociallist       = social_eventos.id_sociallist
LEFT JOIN `mnt_social_categorias`   ON mnt_social_categorias.id_socialcat     = mnt_social_listado.id_socialcat
".$q."
GROUP BY Nombre_tipo ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipo,$row );
}

//se trae un listado con todas las categorias
$arrEvento = array();
$query = "SELECT 
mnt_social_categorias.Nombre AS Nombre_cat,
mnt_social_listado.Nombre AS Nombre_tipo,
social_eventos.Titulo,
COUNT(social_eventos.Titulo) AS total_eventos
FROM `clientes_asistencia`
LEFT JOIN `social_eventos`          ON social_eventos.idEvento                = clientes_asistencia.idEvento
LEFT JOIN `mnt_social_listado`      ON mnt_social_listado.id_sociallist       = social_eventos.id_sociallist
LEFT JOIN `mnt_social_categorias`   ON mnt_social_categorias.id_socialcat     = mnt_social_listado.id_socialcat
".$q."
GROUP BY Titulo ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEvento,$row );
}
 ?>

<h1>Eventos por categoria</h1>

<div class="col-lg-5 fleft">
<div class="box">
<div class="body">
<table role="grid" class="table table-condensed table-hovered sortableTable tablesorter tablesorter-default">
    <thead>
        <tr role="row" class="tablesorter-headerRow">
            <th>Categoria</th>
            <th>N° eventos</th>
        </tr>
    </thead>
    <tbody aria-relevant="all" aria-live="polite">
     <?php foreach ($arrCategoria as $categoria) { ?>
        <tr class="active">
            <td><?php echo $categoria['Nombre_cat']; ?></td>
            <td><?php echo $categoria['total_eventos']; ?></td>
        </tr>
     <?php } ?>
	</tbody>
</table>
</div>
</div>
</div>


<div id="chart_div" style="width: 50%; height: 300px;" class="fleft"></div> 
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Categorias', 'N° eventos']
		  <?php foreach ($arrCategoria as $categoria) { ?>
		  	,['<?php echo $categoria['Nombre_cat']; ?>',  <?php echo $categoria['total_eventos']; ?>]
			
		 <?php } ?>
          
        ]);

        var options = {
          title: 'N° de eventos por categoria',
          hAxis: {title: 'Categorias', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

<div class="clearfix"></div>
<h1>Eventos por tipo</h1>

<div class="col-lg-5 fleft">
<div class="box">
<div class="body">
<table role="grid" class="table table-condensed table-hovered sortableTable tablesorter tablesorter-default">
    <thead>
        <tr role="row" class="tablesorter-headerRow">
            <th>Categoria</th>
            <th>Tipo</th>
            <th>N° eventos</th>
        </tr>
    </thead>
    <tbody aria-relevant="all" aria-live="polite">
     <?php foreach ($arrTipo as $tipo) { ?>
        <tr class="active">
            <td><?php echo $tipo['Nombre_cat']; ?></td>
            <td><?php echo $tipo['Nombre_tipo']; ?></td>
            <td><?php echo $tipo['total_eventos']; ?></td>
        </tr>
     <?php } ?>
	</tbody>
</table>
</div>
</div>
</div>


<div id="chart_div2" style="width: 50%; height: 300px;" class="fleft"></div> 
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Categorias', 'N° eventos']
		  <?php foreach ($arrTipo as $tipo) { ?>
		  	,['<?php echo $tipo['Nombre_tipo']; ?>',  <?php echo $tipo['total_eventos']; ?>]
			
		 <?php } ?>
          
        ]);

        var options = {
          title: 'N° de eventos por categoria',
          hAxis: {title: 'Categorias', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
        chart.draw(data, options);
      }
    </script>

<div class="clearfix"></div>
<h1>Total eventos</h1>

<div class="col-lg-5 fleft">
<div class="box">
<div class="body">
<table role="grid" class="table table-condensed table-hovered sortableTable tablesorter tablesorter-default">
    <thead>
        <tr role="row" class="tablesorter-headerRow">
            <th>Categoria</th>
            <th>Tipo</th>
            <th>Nombre evento</th>
            <th>N° eventos</th>
        </tr>
    </thead>
    <tbody aria-relevant="all" aria-live="polite">
     <?php foreach ($arrEvento as $evento) { ?>
        <tr class="active">
            <td><?php echo $evento['Nombre_cat']; ?></td>
            <td><?php echo $evento['Nombre_tipo']; ?></td>
            <td><?php echo $evento['Titulo']; ?></td>
            <td><?php echo $evento['total_eventos']; ?></td>
        </tr>
     <?php } ?>
	</tbody>
</table>
</div>
</div>
</div>


<div id="chart_div3" style="width: 50%; height: 300px;" class="fleft"></div> 
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Categorias', 'N° eventos']
		  <?php foreach ($arrEvento as $evento) { ?>
		  	,['<?php echo $evento['Titulo']; ?>',  <?php echo $evento['total_eventos']; ?>]
			
		 <?php } ?>
          
        ]);

        var options = {
          title: 'N° de eventos por categoria',
          hAxis: {title: 'Categorias', titleTextStyle: {color: 'red'}}
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div3'));
        chart.draw(data, options);
      }
    </script>
    
    
   
                
 <?php 
//Verifico si existe la variable de busqueda y pagina 
$location = $original;
?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a> 
             
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
// Se trae un listado de todas las categorias
$arrCategorias = array();
$query = "SELECT id_socialcat, Nombre
FROM `mnt_social_categorias` ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
mysql_free_result($resultado); 
// Se trae un listado de todos los listados sociales
$query = "SELECT  id_sociallist, id_socialcat, Nombre
FROM `mnt_social_listado`  ";
$resultado = mysql_query ($query, $dbConn);
while ($row_listado[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($row_listado);
array_multisort($row_listado, SORT_ASC);
// Se trae un listado de todos los eventos
$query = "SELECT  idEvento, id_sociallist, Titulo, Fecha
FROM `social_eventos`  ";
$resultado = mysql_query ($query, $dbConn);
while ($row_event[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($row_event);
array_multisort($row_event, SORT_ASC); 
// Se trae un listado de todos los vecinos
$arrClientes = array();
$query = "SELECT idCliente, Nombre, Apellidos
FROM `clientes_listado`
WHERE Estado = '1' ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrClientes,$row );
}
mysql_free_result($resultado);
// Se trae un listado de todos los estados
$arrEstado = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo = '5' ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrEstado,$row );
}
mysql_free_result($resultado);

 ?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Filtrar Sociales</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
            
            <select name="id_socialcat" class="form-control" onchange="cambia_categoria()" >
    		<option value="" selected>Seleccione una Categoria</option>
			<?php foreach ( $arrCategorias as $categorias ) { ?>
            <option value="<?php echo $categorias['id_socialcat']; ?>" ><?php echo $categorias['Nombre']; ?></option>
            <?php } ?>
            </select>
            
            <select name="id_sociallist" class="form-control" onchange="cambia_listado()" >
    		<option value="" selected>----</option>
            </select>
<script>
<?php
//se imprime la id de la tarea
filtrar($row_listado, 'id_socialcat'); 
foreach($row_listado as $tipo=>$componentes){ 
echo'var id_listado_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['id_sociallist'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($row_listado as $tipo=>$componentes){ 
echo'var listado_'.$tipo.'=new Array("Seleccione un Tipo"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_categoria(){
	var Componente
	Componente = document.form1.id_socialcat[document.form1.id_socialcat.selectedIndex].value
	if (Componente != '') {
		id_listado=eval("id_listado_" + Componente)
		listado=eval("listado_" + Componente)
		num_int = id_listado.length
		document.form1.id_sociallist.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.id_sociallist.options[i].value=id_listado[i]
		   document.form1.id_sociallist.options[i].text=listado[i]
		}	
	}else{
		document.form1.id_sociallist.length = 1
		document.form1.id_sociallist.options[0].value = ""
	    document.form1.id_sociallist.options[0].text = "Seleccione un Tipo"
	}
	document.form1.id_sociallist.options[0].selected = true
}
</script>
            
            
            <select name="idEvento" class="form-control"  >
    		<option value="" selected>----</option>
            </select>
<script>
<?php
//se imprime la id de la tarea
filtrar($row_event, 'id_sociallist'); 
foreach($row_event as $tipo=>$componentes){ 
echo'var id_evento_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idEvento'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($row_event as $tipo=>$componentes){ 
echo'var evento_'.$tipo.'=new Array("Seleccione un Evento"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Fecha'].' - '.$comp['Titulo'].'"';
 }
 echo')
';
}
 ?>
function cambia_listado(){
	var Componente
	Componente = document.form1.id_sociallist[document.form1.id_sociallist.selectedIndex].value
	if (Componente != '') {
		id_evento=eval("id_evento_" + Componente)
		evento=eval("evento_" + Componente)
		num_int = id_evento.length
		document.form1.idEvento.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idEvento.options[i].value=id_evento[i]
		   document.form1.idEvento.options[i].text=evento[i]
		}	
	}else{
		document.form1.idEvento.length = 1
		document.form1.idEvento.options[0].value = ""
	    document.form1.idEvento.options[0].text = "Seleccione un Evento"
	}
	document.form1.idEvento.options[0].selected = true
}
</script>


          	<input type="text" class="form-control" name="Fecha_evento" id="datepicker1" readonly  placeholder="Ingrese la fecha del evento" >
            <input type="text" class="form-control" name="Fecha_inscripcion" id="datepicker2" readonly  placeholder="Ingrese la fecha de inscripcion" >
            
            <select name="idCliente" class="form-control"  >
    		<option value="" selected>Seleccione un Vecino</option>
			<?php foreach ( $arrClientes as $cliente ) { ?>
            <option value="<?php echo $cliente['idCliente']; ?>" ><?php echo $cliente['Nombre'].' '.$cliente['Apellidos']; ?></option>
            <?php } ?>
            </select>
            
            <select name="Estado" class="form-control"  >
    		<option value="" selected>Seleccione un Estado</option>
			<?php foreach ( $arrEstado as $estado ) { ?>
            <option value="<?php echo $estado['id_Detalle']; ?>" ><?php echo $estado['Nombre']; ?></option>
            <?php } ?>
            </select>  
            
            <select name="tipo_informe" class="form-control" required >
    		<option value="" selected>Seleccione tipo de Informe</option>
            <option value="Listado" >Listado</option>
            <option value="Calendario" >Calendario</option>
            <option value="Grafico" >Grafico</option>
            </select>

            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" 
            onclick="document.form1.id_socialcat.value = '';
            document.form1.id_sociallist.value = '';
            document.form1.idEvento.value = '';
            document.form1.Fecha_evento.value = '';
            document.form1.Fecha_inscripcion.value = '';
            document.form1.idCliente.value = '';
            document.form1.Estado.value = '';
            document.form1.tipo_informe.value = '';
            "><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
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