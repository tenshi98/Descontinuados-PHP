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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
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
$original = "gestion_prueba.php";
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
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/gestion_alarmas_historico.php';		
}
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Alarmas Historico</title>
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
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.10.4.custom.css" />    
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
$(function() {
       $("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" }).val()
	   $("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" }).val()
});
</script>

    <!-- InstanceBeginEditable name="head" -->

     
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
            <i class="fa fa-dashboard"></i> Alarmas Historico
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


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['view']) ) {
$query="SELECT 
ejecutivos.nom_ejecutiv,
ejecutivos.region,
ejecutivos.ciudad_ejecutiv,
ejecutivos.dir_ejecutiv,
activaciones.Fecha,
activaciones.Hora,
activaciones.Longitud,
activaciones.Latitud 
FROM activaciones 
LEFT JOIN ejecutivos            ON ejecutivos.id_ejecutiv         = activaciones.id_usuario
WHERE id_sms = '{$_GET['view']}'";	  
$resultado2 = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado2);
?>




<div class="col-lg-12 fcenter" style="margin-bottom:50px">
<?php 
$s="?filter=true";
$x="";
$t="&pagina=".$_GET['pagina'];
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$x .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ;           
}
if(isset($_GET['tipo']) && $_GET['tipo'] != '')            { $x .= "&tipo=".$_GET['tipo'] ;           }
if(isset($_GET['Comuna']) && $_GET['Comuna'] != '')        { $x .= "&Comuna=".$_GET['Comuna'] ;       }

?>
	<a href="<?php echo $location.$s.$t.$x; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
</div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif(! empty($_GET["filter"]))  { 
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
//Variable con la ubicacion
$z="WHERE activaciones.remitente<>''";
$s="?filter=true";
$s0="&filter=true";
$x="";
$t="&pagina=".$_GET['pagina'];
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND activaciones.fecha_hora >= '{$_GET['rango_a']} 00:00:00' AND  activaciones.fecha_hora <= '{$_GET['rango_b']} 59:59:59'" ;
	$x .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ;           
}
if(isset($_GET['tipo']) && $_GET['tipo'] != '')            { 
	$z .= " AND activaciones.tipo_llamada = '".$_GET['tipo']."'" ;
	$x .= "&tipo=".$_GET['tipo'] ;           
}
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')        { 
	$z .= " AND ejecutivos.ciudad_ejecutiv = '".$_GET['idComuna']."'" ;
	$x .= "&idComuna=".$_GET['idComuna'] ;       
}

?>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="mapestilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../scripts/gmaps.js"></script>



<?php echo("<script language='JavaScript' type='text/JavaScript'>") ?>
var map;
    $(document).ready(function(){
      map = new GMaps({
        div: '#map',
       lat: -33.427287,
        lng: -70.611219,
        zoom: 8
     });
	 $('#geocoding_form').submit(function(e){
        e.preventDefault();
        GMaps.geocode({
          address: $('#address').val().trim(),
          callback: function(results, status){
            if(status=='OK'){
              var latlng = results[0].geometry.location;
              map.setCenter(latlng.lat(), latlng.lng());
              map.addMarker({
			    icon: '../images/chart.png',
                lat: latlng.lat(),
                lng: latlng.lng(),
				title: $('#address').val().trim()
              });
            }
          }
        });
     });  
<?
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT 
activaciones.id_sms 
FROM `activaciones` 
LEFT JOIN ejecutivos    ON ejecutivos.id_ejecutiv     = activaciones.id_usuario
".$z."";
$registrosx = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registrosx);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrAlarmas = array();
$query = "SELECT 
activaciones.id_sms,
ejecutivos.nom_ejecutiv,
activaciones.tipo_llamada,
activaciones.fecha_hora,
	activaciones.lat,
	activaciones.lon
FROM `activaciones`
LEFT JOIN ejecutivos    ON ejecutivos.id_ejecutiv     = activaciones.id_usuario
".$z."
ORDER BY activaciones.id_sms DESC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
		$lat=str_replace(",",".",$row["lat"]);
		$lon=str_replace(",",".",$row["lon"]); 
		$ejecutivo=$row["nom_ejecutiv"];


	  
	?>

	map.addMarker({
        lat: <?=$lat?>,
        lng: <?=$lon?>,
        title: '<?=$registro2["nom_ejecutiv"]?> - <?=$fecha_hoy?>',
		icon: '../images/emergency-ac.png',
	// LINK PARA VER EL DETALLE DE LA UBICACION
     infoWindow: {
          content: "<p><b><u><?=$row["nom_ejecutiv"]?></u></b></p>"
		           
        }
	// FIN LINK PARA VER EL DETALLE DE LA UBICACION
      });
	          
	       

 <?     

}?>
 });

<?php echo("</script>") ?>

                           
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Alarmas</h5>
		</header>
        
             
	<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="581" rowspan="4" align="center" valign="middle">
	    <span class="arial_light_med">&nbsp;<br /></span>
        <span class="google_fjalla_gde">Ultimas 150 Activaciones</span>
	</td></tr>
</table> 
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">


                      <tr><td align="center"><div id="map" style="width: 900px; height: 600px" ></div></td></tr>

          </table>
</div>
<div class="col-lg-12 fcenter" style="margin-bottom:50px">
	<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
</div>       
</div>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
?>
<div class="col-lg-8 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Alarmas</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
            
           
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Rango Fechas inicio</label>
				<div class="col-lg-8">
					<input type="text" placeholder="Rango Fechas inicio" class="form-control" id="datepicker1"  name="rango_a" readonly >
				</div>
			</div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Rango Fechas termino</label>
				<div class="col-lg-8">
					<input type="text" placeholder="Rango Fechas termino" class="form-control" id="datepicker2"  name="rango_b" readonly >
				</div>
			</div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Tipo de Activacion</label>
                <div class="col-lg-8">
                <select name="tipo" class="form-control" >
                    <option value="" selected>Seleccione un tipo de Activacion</option>
				<?	$tipo_llamada="select tipo_llamada from activaciones group by tipo_llamada order by tipo_llamada asc";
					$res_tipo_llamada=mysql_query($tipo_llamada,$dbConn); 
							while($fila_tipo_llamada=mysql_fetch_array($res_tipo_llamada))
					{
						$descripcion=$fila_tipo_llamada['tipo_llamada'];
				?>
					<option value="<?=$descripcion?>" ><?=$descripcion?></option>
				<?}?>
                </select>
                </select>
                </div>
            </div>

            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Comunas</label>
                <div class="col-lg-8">
                <select name="idComuna" class="form-control" >
                <option value="" selected>Seleccione una Comuna</option>
				<?	$query_region="select * from comuna order by comunas asc";
					$res_region=mysql_query($query_region,$dbConn); 
							while($fila_region=mysql_fetch_array($res_region))
					{
						$descripcion=$fila_region['comunas'];
				?>
					<option value="<?=$descripcion?>" ><?=$descripcion?></option>
				<?}?>
                </select>
                </div>
            </div>
            
           
            
			<div class="form-group">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="filtrar">
				
			</div>
                      
			</form> 
                
		</div>
	</div>   <div style="float:clear" > </div>
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