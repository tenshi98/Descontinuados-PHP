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
$original = "carreras_listado.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/


?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title><?php echo $rowlevel['nombre_transaccion']; ?></title>
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
	<link href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css" rel="stylesheet" type="text/css">
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
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.10.4.custom.css" />    
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
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
                <?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?>
					<img src="img/<?php echo $arrUsuario['imgLogo']; ?>" alt="">
				<?php }else{?>
					<img src="img/logo_default.png" alt="">
				<?php } ?>
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
            <i class="fa fa-dashboard"></i> <?php echo $rowlevel['nombre_transaccion']; ?>
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
<?php  if (isset($errors[7])) {echo $errors[7];}?>
<?php  if (isset($errors[8])) {echo $errors[8];}?>
<?php  if (isset($errors[9])) {echo $errors[9];}?>
<?php  if (isset($errors[10])) {echo $errors[10];}?>
<?php  if (isset($errors[11])) {echo $errors[11];}?>
<?php  if (isset($_GET['create'])) {?>
<div id="txf_03" class="alert_sucess">  
	Cliente Creado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Cliente Modificado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Cliente borrado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['view']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT
clientes_listado.Latitud, 
clientes_listado.Longitud,
detalle_general.Nombre AS estado_carrera
FROM `clientes_listado`
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = clientes_listado.EstadoCarrera
WHERE idCliente = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
?> 
<script type="text/javascript">
	function actualiza(){
	//recarga el div 
	$("#update").load("carreras_listado_consulta_2.php?pagina=<?php echo $_GET["pagina"] ?><?php if(isset($_GET["search"])&&$_GET["search"]!=''){echo '&search='.$_GET["search"];} ?><?php if(isset($_GET["view"])&&$_GET["view"]!=''){echo '&view='.$_GET["view"];} ?>"); 
	}
	//llama a la funcion actualiza cada 10 segundos
	window.onload=function(){
		setInterval( "actualiza()", 10000 ); //multiplicas la cantidad de segundos por mil	
	};
</script>

<div class="col-lg-12" id="update">
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(<?php echo $rowdata['Latitud'] ?>, <?php echo $rowdata['Longitud'] ?>);
		  var mapOptions = {
			zoom: 16,
			scrollwheel: false,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

		  var marker = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $rowdata['Latitud'] ?>, <?php echo $rowdata['Longitud'] ?>),
			  map: map,
			  title:"Taxista",
			  icon: 'img/icn/map_taxi.png'
		  });
 	  		
      }  
</script>
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Ubicacion Actual</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="40%">Estado actual del Taxista : <?php echo $rowdata['estado_carrera'] ?> </th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    
    	<tr class="odd">
            <td class=" " height="500">
            	<div id="map_canvas" style="width:100%; height:500px">
                	<script type="text/javascript">initialize();</script>
             	</div>
            </td>
		</tr>
                     
	</tbody>
</table>
</div>
</div>




<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<?php //Verifico si existe la variable de busqueda y pagina
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
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
//Verifico si la variable de busqueda existe
$z  ="WHERE clientes_listado.Estado = 1";
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z .=" AND clientes_listado.idTipoCliente>=0";	
}else{
	$z .=" AND clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
if (isset($_GET['search'])){
	$z .=" AND clientes_listado.Nombre LIKE '%{$_GET['search']}%'";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idCliente FROM `clientes_listado` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
clientes_listado.idCliente,
clientes_listado.Rut,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
clientes_listado.Apellido_Materno,
detalle_general.Nombre AS estado_carrera
FROM `clientes_listado`
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = clientes_listado.EstadoCarrera
".$z."
ORDER BY clientes_listado.Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
//Agrego las ubicaciones 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Taxista</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
</div>
<div class="clearfix"></div>  

<script type="text/javascript">
	function actualiza(){
	//recarga el div 
	$("#update").load("carreras_listado_consulta.php?pagina=<?php echo $_GET["pagina"] ?><?php if(isset($_GET["search"])&&$_GET["search"]!=''){echo '&search='.$_GET["search"];} ?>"); 
	}
	//llama a la funcion actualiza cada 10 segundos
	window.onload=function(){
		setInterval( "actualiza()", 10000 ); //multiplicas la cantidad de segundos por mil	
	};
</script>

                   
                                 
<div class="col-lg-12" id="update">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Taxistas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="209">Rut</th>
        <th>Nombre del Taxista</th>
        <th width="120">Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td class=" sorting_1"><?php echo $usuarios['Rut']; ?></td>
			<td class=" "><?php echo $usuarios['Nombre'].' '.$usuarios['Apellido_Paterno'].' '.$usuarios['Apellido_Materno']; ?></td>
			<td class=" "><?php echo $usuarios['estado_carrera']; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$usuarios['idCliente']; ?>" title="Ver Datos" class="icon-map info-tooltip"></a><?php }?>   
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
}?>
    <div class="row">
        <div class="col-lg-6">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">← Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">← Anterior</a></li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
    				<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
					<?php } ?>
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