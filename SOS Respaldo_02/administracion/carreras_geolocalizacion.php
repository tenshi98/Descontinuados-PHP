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
/*                                    Se filtran las entradas para evitar ataques                                                 */
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
$original = "carreras_geolocalizacion.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['submit']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/carreras_geolocalizacion.php';		
}
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
$(function() {
       $("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" }).val()
	   $("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" }).val()
	   
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
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['filter']) ) { 
//Se complementan los filtros
$z  ="WHERE clientes_listado.Estado = 1";
$z .=" AND clientes_listado.idTipoCliente = 2 ";
//Verifico si la variable de busqueda existe
if(isset($_GET['PPU']) && $_GET['PPU'] != ''){                        $z .= " AND clientes_listado.PPU LIKE '%{$_GET['PPU']}%'"; }
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {              $z .= " AND clientes_listado.N_Motor LIKE '%{$_GET['N_Motor']}%' " ; }
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {            $z .= " AND clientes_listado.N_Chasis LIKE '%{$_GET['N_Chasis']}%' " ; }
if(isset($_GET['idConductor']) && $_GET['idConductor'] != '')  {      $z .= " AND clientes_listado.idConductor = '".$_GET['idConductor']."'" ; }
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {  $z .= " AND clientes_listado.idPropietario = '".$_GET['idPropietario']."'" ; }
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {      $z .= " AND clientes_listado.idRecorrido = '".$_GET['idRecorrido']."'" ; }
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {              $z .= " AND clientes_listado.idMarca = '".$_GET['idMarca']."'" ; }
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {            $z .= " AND clientes_listado.idModelo = '".$_GET['idModelo']."'" ; }
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {  $z .= " AND clientes_listado.idTransmision = '".$_GET['idTransmision']."'" ; }
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {        $z .= " AND clientes_listado.idColorV_1 = '".$_GET['idColorV_1']."'" ; }
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {        $z .= " AND clientes_listado.idColorV_2 = '".$_GET['idColorV_2']."'" ; }
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$z .= " AND clientes_listado.fFabricacion BETWEEN '{$_GET['fechaInicio']}' AND '{$_GET['fechaTermino']}'" ;         
}
$z .= " AND clientes_listado.Longitud !='' AND clientes_listado.Longitud !=0" ;
$z .= " AND clientes_listado.Latitud !='' AND clientes_listado.Latitud !=0" ;
// Se traen todos los datos de mi usuario
$arrAviso = array();
$query = "SELECT
clientes_listado.Latitud, 
clientes_listado.Longitud,
clientes_listado.PPU,
detalle_general.Nombre AS estado_carrera
FROM `clientes_listado`
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = clientes_listado.EstadoCarrera
".$z;
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAviso,$row );
}
mysql_free_result($resultado);
 
 ?>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyByK7Sc1NVgqz10pVRx3EfViR_gdO2N8FI&sensor=false"></script>
<script type="text/javascript">
      function initialize() {
          var myLatlng = new google.maps.LatLng(-33.4691199, -70.641997);
		  var mapOptions = {
			zoom: 10,
			scrollwheel: false,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
		
		<?php 
		$nn=1;
		foreach ($arrAviso as $aviso) {?>
		  var marker_<?php echo $nn ?> = new google.maps.Marker({
			  position:  new google.maps.LatLng(<?php echo $aviso['Latitud'] ?>, <?php echo $aviso['Longitud'] ?>),
			  map: map,
			  title:"<?php echo 'Vehiculo patente '.$aviso['PPU'].' - '.$aviso['estado_carrera'] ?>",
			  icon: 'img/icn/map_taxi.png'
		  });
		  
		<?php 
		$nn++;
		}?> 	  		
      }  
</script>
 
 
<div class="col-lg-12 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Geolocalizacion en el mapa</h5>
		</header>
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="100%">Mapa</th>
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
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
// Se trae un listado de todas las marcas
$arrMarca = array();
$query = "SELECT  idMarca, Nombre
FROM `vehiculos_marcas`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrMarca,$row );
} 
// Se trae un listado de todos los modelos
$query = "SELECT  idModelo, idMarca, Nombre
FROM `vehiculos_modelos` ";
$resultado = mysql_query ($query, $dbConn);
while ($Modelo[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Modelo);
array_multisort($Modelo, SORT_ASC);
// Se trae un listado con todos los tipos de transmision
$arrTransmision = array();
$query = "SELECT idTransmision,Nombre
FROM `vehiculos_transmision`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTransmision,$row );
}
// Se trae un listado con todos los colores
$arrColorV = array();
$query = "SELECT idColorV,Nombre
FROM `vehiculos_colores`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColorV,$row );
}
// Se trae un listado con todos los taxistas
$arrConductor = array();
$query = "SELECT idConductor,Nombre, Apellido_Paterno, Apellido_Materno
FROM `taxista_conductores`
ORDER BY Apellido_Paterno ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrConductor,$row );
}
// Se trae un listado con todos los propietarios
$arrPropietario = array();
$query = "SELECT idPropietario,Nombre,Apellido_Paterno,Apellido_Materno
FROM `taxista_propietarios`
ORDER BY Apellido_Paterno ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPropietario,$row );
}
// Se trae un listado con todos los recorridos
$arrRecorrido = array();
$query = "SELECT idRecorrido,Nombre
FROM `taxista_recorridos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrRecorrido,$row );
}
?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Geolocalizacion</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" action="<?php echo $location ?>" name="form1">
			

            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Conductor</label>
				<div class="col-lg-8">
                    <select name="idConductor" class="form-control" >
                    <option value="" selected="selected">Seleccione un Conductor</option>
                    <?php foreach ($arrConductor as $conductor) { ?>
                    <option value="<?php echo $conductor['idConductor']; ?>" ><?php echo $conductor['Nombre'].' '.$conductor['Apellido_Paterno'].' '.$conductor['Apellido_Materno']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Propietario</label>
				<div class="col-lg-8">
                    <select name="idPropietario" class="form-control" >
                    <option value="" selected="selected">Seleccione un Propietario</option>
                    <?php foreach ($arrPropietario as $propietario) { ?>
                    <option value="<?php echo $propietario['idPropietario']; ?>"><?php echo $propietario['Nombre'].' '.$propietario['Apellido_Paterno'].' '.$propietario['Apellido_Materno']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Recorrido</label>
				<div class="col-lg-8">
                    <select name="idRecorrido" class="form-control" >
                    <option value="" selected="selected">Seleccione un Recorrido</option>
                    <?php foreach ($arrRecorrido as $recorrido) { ?>
                    <option value="<?php echo $recorrido['idRecorrido']; ?>" ><?php echo $recorrido['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Patente</label>
				<div class="col-lg-8">
					<input type="text" placeholder="Patente" class="form-control"  name="PPU"  >
				</div>
			</div>
                        
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Marca</label>
				<div class="col-lg-8">
                    <select name="idMarca" class="form-control"  onChange="cambia_marca()">
                    <option value="" selected="selected">Seleccione una Marca</option>
                    <?php foreach ($arrMarca as $marca) { ?>
                    <option value="<?php echo $marca['idMarca']; ?>" ><?php echo $marca['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Modelo</label>
				<div class="col-lg-8">
                    <select name="idModelo" class="form-control">
                    <option value="" selected="selected">Seleccione un Modelo</option>           
                    </select>
				</div>
			</div>
            
<script>
<?php
//se imprime la id de la tarea
filtrar($Modelo, 'idMarca'); 
foreach($Modelo as $tipo=>$componentes){ 
echo'var id_modelo_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idModelo'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Modelo as $tipo=>$componentes){ 
echo'var modelo_'.$tipo.'=new Array("Seleccione un Modelo"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_marca(){
	var Componente
	Componente = document.form1.idMarca[document.form1.idMarca.selectedIndex].value
	try {
	if (Componente != '') {
		id_modelo=eval("id_modelo_" + Componente)
		modelo=eval("modelo_" + Componente)
		num_int = id_modelo.length
		document.form1.idModelo.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idModelo.options[i].value=id_modelo[i]
		   document.form1.idModelo.options[i].text=modelo[i]
		}	
	}else{
		document.form1.idModelo.length = 1
		document.form1.idModelo.options[0].value = ""
	    document.form1.idModelo.options[0].text = "Seleccione un Modelo"
	}
	} catch (e) {
    alert("La Marca seleccionada no posee Modelos");
}
	document.form1.idModelo.options[0].selected = true
}
</script>            
            
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Tipo de Transmision</label>
				<div class="col-lg-8">
                    <select name="idTransmision" class="form-control">
                    <option value="" selected="selected">Seleccione un tipo de Transmision</option>
                    <?php foreach ($arrTransmision as $transmision) { ?>
                    <option value="<?php echo $transmision['idTransmision']; ?>" ><?php echo $transmision['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Color Base</label>
				<div class="col-lg-8">
                    <select name="idColorV_1" class="form-control">
                    <option value="" selected="selected">Seleccione un Color Base</option>
                    <?php foreach ($arrColorV as $color) { ?>
                    <option value="<?php echo $color['idColorV']; ?>" ><?php echo $color['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Color Complementario</label>
				<div class="col-lg-8">
                    <select name="idColorV_2" class="form-control" >
                    <option value="" selected="selected">Seleccione un Color Complementario</option>
                    <?php foreach ($arrColorV as $color) { ?>
                    <option value="<?php echo $color['idColorV']; ?>" ><?php echo $color['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label class="control-label col-lg-4">F Fabricacion Inicio</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="Fecha de Transferencia" class="form-control timepicker-default" type="text" name="fechaInicio" id="datepicker1"  >
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
					</div>
				</div>
			</div>
            
            <div class="form-group">
				<label class="control-label col-lg-4">F Fabricacion Fin</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="Fecha de Fabricacion" class="form-control timepicker-default" type="text" name="fechaTermino" id="datepicker2" >
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
					</div>
				</div>
			</div>
            
            
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Numero de Motor</label>
				<div class="col-lg-8">
					<input type="text"  placeholder="Numero de Motor" class="form-control"  name="N_Motor"  >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Numero de Chasis</label>
				<div class="col-lg-8">
					<input type="text"  placeholder="Numero de Chasis" class="form-control"  name="N_Chasis"  >
				</div>
			</div>
            

			<div class="form-group">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="submit">
			</div>
                      
			</form> 
                    
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
    <script src="assets/lib/fullcalendar/fullcalendar.min.js"></script>
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