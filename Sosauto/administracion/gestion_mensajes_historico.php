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
$original = "gestion_mensajes_historico.php";
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
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/gestion_mensajes_historico.php';		
}

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Historico Mensajes</title>
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
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.10.4.custom.css" />    
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
$(function() {
       $("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" }).val()
	   $("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" }).val()
});
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
            <i class="fa fa-dashboard"></i> Historico Mensajes
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
 if ( ! empty($_GET['view']) ) { 
$query="SELECT  
detalle_general.Nombre AS tipo_msj,
usuarios_msj_enviados.Titulo, 
usuarios_msj_enviados.Mensaje
FROM usuarios_msj_enviados 
LEFT JOIN detalle_general     ON detalle_general.id_Detalle     = usuarios_msj_enviados.Tipo
WHERE idMsj_enviado='{$_GET['view']}'
";	  
$resultado2 = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado2);
?>
 
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Enviar mensaje</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        
        	<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Tipo de Mensaje</label>
				<div class="col-lg-8">
					<select class="form-control" tabindex="15" name="Tipo" disabled >
                            <option value=""><?php echo $row_data['tipo_msj'] ?></option>
					</select>
				</div>
			</div>
        	<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo del mensaje</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Titulo" class="form-control"  name="Titulo" value="<?php echo $row_data['Titulo'] ?>" disabled>
				</div>
			</div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Mensaje</label>
                <div class="col-lg-8 height360">
                    <textarea disabled name="Mensaje" id="autosize" class="form-control height360" style="overflow: auto; word-wrap: break-word; resize: horizontal;"><?php echo $row_data['Mensaje'] ?></textarea>
                </div>
            </div> 
            
  
            
			<div class="form-group">
               <?php //Ubicaciones
				$location = $original;
				$location .='?filter=true';
				if (isset($_GET['idUsuario'])) { 
				$location .='&idUsuario='.$_GET['idUsuario'];
				}
				if (isset($_GET['Tipo'])) { 
				$location .='&Tipo='.$_GET['Tipo'];
				}
				if (isset($_GET['rango_a'])) { 
				$location .='&rango_a='.$_GET['rango_a'];
				}
				if (isset($_GET['rango_b'])) { 
				$location .='&rango_b='.$_GET['rango_b'];
				}?>

				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 <?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 }elseif ( ! empty($_GET['filter']) ) { 
 //Se complementan los filtros
$z="WHERE usuarios_msj_enviados.idMsj_enviado>0";
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND usuarios_msj_enviados.Fecha BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;          
}
if(isset($_GET['idUsuario']) && $_GET['idUsuario'] != '')  { $z .= " AND usuarios_msj_enviados.idUsuario = '".$_GET['idUsuario']."'" ; }
if(isset($_GET['Tipo']) && $_GET['Tipo'] != '')            { $z .= " AND usuarios_msj_enviados.Tipo = '".$_GET['Tipo']."'" ; }
 
//Realizo la consulta
$arrMensajes = array();	
$query="SELECT 
usuarios_msj_enviados.idMsj_enviado,
usuarios_listado.Nombre AS nombre_enviador,
detalle_general.Nombre AS tipo_msj,
usuarios_msj_enviados.Titulo AS titulo_msj,
usuarios_msj_enviados.Fecha AS fecha_msj,
usuarios_msj_enviados.Cantidad_clientes

FROM usuarios_msj_enviados 
LEFT JOIN usuarios_listado    ON usuarios_listado.idUsuario     = usuarios_msj_enviados.idUsuario
LEFT JOIN detalle_general     ON detalle_general.id_Detalle     = usuarios_msj_enviados.Tipo
".$z;	  
$resultado2 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado2)) {
array_push( $arrMensajes,$row );
}
mysql_free_result($resultado2); ?>
 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de mensajes</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="120">Fecha</th>
        <th>Enviador</th>
        <th>Tipo Mensaje</th>
        <th>Titulo</th>
        <th>Cantidad</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                  
	<tbody role="alert" aria-live="polite" aria-relevant="all">
	<?php //Ubicaciones
	$location = $original;
	$location .='?filter=true';
	if (isset($_GET['idUsuario'])) { 
	$location .='&idUsuario='.$_GET['idUsuario'];
	}
	if (isset($_GET['Tipo'])) { 
	$location .='&Tipo='.$_GET['Tipo'];
	}
	if (isset($_GET['rango_a'])) { 
	$location .='&rango_a='.$_GET['rango_a'];
	}
	if (isset($_GET['rango_b'])) { 
	$location .='&rango_b='.$_GET['rango_b'];
	}?>
    <?php foreach ($arrMensajes as $mensajes) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $mensajes['fecha_msj']; ?></td>
            <td class=" "><?php echo $mensajes['nombre_enviador']; ?></td>
            <td class=" "><?php echo $mensajes['tipo_msj']; ?></td>
            <td class=" "><?php echo $mensajes['titulo_msj']; ?></td>
            <td class=" "><?php echo $mensajes['Cantidad_clientes']; ?></td>
			<td class=" ">          
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$mensajes['idMsj_enviado']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
  
</div>
 
<div class="col-lg-12 fcenter" style="margin-bottom:50px">
	<?php $location = $original;?>
	<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
</div>
</div> 
 
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
//Se trae el listado con los usuarios
$arrUser = array();
$query = "SELECT idUsuario, Nombre
FROM `usuarios_listado`
ORDER BY Nombre ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUser,$row );
}
mysql_free_result($resultado);
//Se trae el listado con los tipos
$arrTipo = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo='8'
ORDER BY Nombre ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipo,$row );
}
mysql_free_result($resultado);
?>

<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para buscar en el historico de mensajes enviados</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			
            
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de usuarios</label>
                <div class="col-lg-8">
                <select name="idUsuario" class="form-control" >
                <option value="" selected>Seleccione un usuario</option>
                <?php foreach ( $arrUser as $usuario ) { ?>
                <option value="<?php echo $usuario['idUsuario']; ?>" ><?php echo $usuario['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Tipo de mensaje</label>
                <div class="col-lg-8">
                <select name="Tipo" class="form-control" >
                <option value="" selected>Seleccione un Tipo</option>
                <?php foreach ( $arrTipo as $tipo ) { ?>
                <option value="<?php echo $tipo['id_Detalle']; ?>" ><?php echo $tipo['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
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
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="filtrar">
				
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