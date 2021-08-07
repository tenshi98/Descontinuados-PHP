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
$original = "ingresos_solicitudes.php";
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
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Mantencion de Solicitudes</title>
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
            <i class="fa fa-dashboard"></i> Mantencion de Solicitudes
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
 if ( ! empty($_GET['view']) ) { 
// Se traen todos los datos 
$query = "SELECT 
solicitud_listado.Nombres,
solicitud_listado.ApellidoPat,
solicitud_listado.ApellidoMat,
solicitud_listado.Rut,
solicitud_listado.email,
solicitud_listado.Fono1,
solicitud_listado.Fono2,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
mnt_oirs_tipomsje.Nombre AS tipo_mensaje,
mnt_oirs_departamentos.Nombre AS departamento,
solicitud_listado.Fcreacion,
solicitud_listado.Fecha,
solicitud_listado.Fvista,
solicitud_listado.Detalle,
solicitud_listado.idSolicitud
FROM `solicitud_listado`
LEFT JOIN `mnt_ubicacion_comunas`          ON mnt_ubicacion_comunas.idComuna     = solicitud_listado.idComuna
LEFT JOIN `mnt_oirs_tipomsje`              ON mnt_oirs_tipomsje.id_Tipomsje      = solicitud_listado.TipoMsje
LEFT JOIN `mnt_oirs_departamentos`         ON mnt_oirs_departamentos.idDepto     = solicitud_listado.Depto
WHERE idSolicitud = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
//Se actualiza el usuario quien vio la solicitud, el estado y la fecha en que lo vio
if($rowdata['Fvista']==0){
	date_default_timezone_set('UTC');
    $fecha =  date("Y-m-d");
	$query  = "UPDATE `solicitud_listado` SET Estado='8', idUsuario='".$arrUsuario['idUsuario']."', Fvista='".$fecha."' WHERE idSolicitud = {$_GET['view']}";
	$result = mysql_query($query, $dbConn);	
}
?>
 
<div class="col-lg-8 fcenter">
	<div class="box">
		<header>
			<h5>Datos de la solicitud</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
        

            <h2 class="text-primary">Datos del solicitante</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombres'].' '.$rowdata['ApellidoPat'].' '.$rowdata['ApellidoMat']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
            <p class="text-muted"><strong>Fono1 : </strong><?php echo $rowdata['Fono1']; ?></p>
            <p class="text-muted"><strong>Fono2 : </strong><?php echo $rowdata['Fono2']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['nombre_comuna']; ?></p>
            
            <h2 class="text-primary">Informacion de la solicitud</h2>
            <p class="text-muted"><strong>N° Solicitud : </strong><?php echo n_doc($rowdata['idSolicitud']); ?></p>
            <p class="text-muted"><strong>Tipo Mensaje : </strong><?php echo $rowdata['tipo_mensaje']; ?></p>
            <p class="text-muted"><strong>Departamento : </strong><?php echo $rowdata['departamento']; ?></p>
            <p class="text-muted"><strong>Fecha de creacion : </strong><?php echo Fecha_completa($rowdata['Fcreacion']); ?></p>
            <p class="text-muted"><strong>Fecha del evento : </strong><?php echo Fecha_completa($rowdata['Fecha']); ?></p>
                        
            <h2 class="text-primary">Detalle</h2> 
            <p class="text-muted"><strong>Mensaje : </strong><?php echo $rowdata['Detalle']; ?></p>
        		<?php
				//Verifico si existe la variable de busqueda y pagina 
				$location .='?pagina='.$_GET['pagina'];
				if (isset($_GET['search'])) { 
				$location .='&search='.$_GET['search'];
				}
				if (isset($_GET['filter'])) { 
				$location .='&filter='.$_GET['filter'];
				}
				if (isset($_GET['estado'])) { 
				$location .='&estado='.$_GET['estado'];
				}?>
           	
        </div>
	</div>
</div>

<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
 
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
//Creacion de una cedena para el filtro
$z="WHERE solicitud_listado.idSolicitud > '0'";
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search']!='' ){
	$z.="AND solicitud_listado.idSolicitud LIKE '%{$_GET['search']}%'";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['filter']) && $_GET['filter']!='' ){
	$z.="AND solicitud_listado.id_Oirs = '' ";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['estado']) && $_GET['estado']!='' ){
	$z.="AND solicitud_listado.Estado = '7' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$querys = "SELECT idSolicitud ,id_Oirs FROM `solicitud_listado` ".$z."";
$registros = mysql_query ($querys, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrSolicitud = array();
$query = "SELECT 
solicitud_listado.idSolicitud,
solicitud_listado.Nombres,
solicitud_listado.ApellidoPat,
solicitud_listado.ApellidoMat,
solicitud_listado.idCliente,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
mnt_oirs_tipomsje.Nombre AS tipo_mensaje,
mnt_oirs_departamentos.Nombre AS departamento,
detalle_general.Nombre AS estado,
solicitud_listado.Fcreacion,
solicitud_listado.id_Oirs
FROM `solicitud_listado`
LEFT JOIN `mnt_ubicacion_comunas`     ON mnt_ubicacion_comunas.idComuna     = solicitud_listado.idComuna
LEFT JOIN `mnt_oirs_tipomsje`         ON mnt_oirs_tipomsje.id_Tipomsje      = solicitud_listado.TipoMsje
LEFT JOIN `mnt_oirs_departamentos`    ON mnt_oirs_departamentos.idDepto     = solicitud_listado.Depto
LEFT JOIN `detalle_general`           ON detalle_general.id_Detalle         = solicitud_listado.Estado
".$z."
ORDER BY estado DESC , idSolicitud ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrSolicitud,$row );
}


?>
<?php 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
if (isset($_GET['filter'])) { 
$location .='&filter='.$_GET['filter'];
}
if (isset($_GET['estado'])) { 
$location .='&estado='.$_GET['estado'];
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar N° Solicitud</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="N° Solicitud">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onClick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>

</div>
                      
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Solicitudes</h5>
		</header>
            
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
    	<th width="100">N° Solicitud</th>
        <th width="100">F Creacion</th>
        <th>Solicitante</th>
        <th width="80">¿Inscrito?</th>
        <th>Comuna</th>
        <th>Tipo Mensaje</th>
        <th>Departamento</th>
        <th width="80">Estado</th>
        <th width="80">OIRS</th>
        <th width="100">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrSolicitud as $solicitud) { ?>
    	<tr class="odd">
			<td class=" "><?php echo n_doc($solicitud['idSolicitud']); ?></td>
            <td class=" "><?php echo $solicitud['Fcreacion']; ?></td>
            <td class=" "><?php echo $solicitud['Nombres'].' '.$solicitud['ApellidoPat'].' '.$solicitud['ApellidoMat']; ?></td>
            <td class=" "><?php if($solicitud['idCliente']!=0) {echo 'Si';}else{echo 'No';}; ?></td>
            <td class=" "><?php echo $solicitud['nombre_comuna']; ?></td>
            <td class=" "><?php echo $solicitud['tipo_mensaje']; ?></td>
            <td class=" "><?php echo $solicitud['departamento']; ?></td>
            <td class=" "><?php echo $solicitud['estado']; ?></td>
            <td class=" "><?php if($solicitud['id_Oirs']>0){ echo n_doc($solicitud['id_Oirs']);} ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$solicitud['idSolicitud']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
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
if (isset($_GET['filter'])) { 
$x.='&filter='.$_GET['filter'];
}
if (isset($_GET['estado'])) { 
$x.='&estado='.$_GET['estado'];
}?>
    <div class="row">
        <div class="col-lg-9 fcenter">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination">
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