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
$original = "view_vecinos.php";
$location = $original;
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
    <title>Busqueda de Vecinos</title>
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
            <i class="fa fa-dashboard"></i> Busqueda de Vecinos
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
// Se traen todos los datos de mi usuario
$query = "SELECT  
clientes_listado.fcreacion, 
clientes_listado.email, 
clientes_listado.Nombres, 
clientes_listado.ApellidoPat,
clientes_listado.ApellidoMat,
clientes_listado.Rut, 
clientes_listado.fNacimiento,  
clientes_listado.Sexo,
clientes_listado.Fono1, 
clientes_listado.Fono2, 
clientes_listado.Ultimo_acceso,
detalle_general.Nombre AS estado,
mnt_ubicacion_ciudad.Nombre AS nombre_ciudad,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
mnt_ubicacion_villa.Nombre AS nombre_villa,
mnt_ubicacion_calles.Nombre AS nombre_calle,
clientes_listado.n_calle,
prop.Nombre AS Tipo_propiedad
FROM `clientes_listado`
LEFT JOIN `detalle_general`         ON detalle_general.id_Detalle       = clientes_listado.Estado
LEFT JOIN `mnt_ubicacion_ciudad`    ON mnt_ubicacion_ciudad.idCiudad    = clientes_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`   ON mnt_ubicacion_comunas.idComuna   = clientes_listado.idComuna
LEFT JOIN `mnt_ubicacion_villa`     ON mnt_ubicacion_villa.idVilla      = clientes_listado.idVilla
LEFT JOIN `mnt_ubicacion_calles`    ON mnt_ubicacion_calles.idCalle     = clientes_listado.idCalle
LEFT JOIN `detalle_general`  prop   ON prop.id_Detalle                  = clientes_listado.Tipo_propiedad
WHERE clientes_listado.idCliente = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
//se trae un listado con todos los eventos asistidos
$arrAsistencia = array();
$query = "SELECT 
mnt_social_categorias.Nombre AS Nombre_cat,
mnt_social_listado.Nombre AS Nombre_list,
social_eventos.Titulo AS Nombre_evento,
social_eventos.Fecha AS fecha_evento,
clientes_asistencia_eventos.Fecha_inscripcion,
detalle_general.Nombre AS estado_evento
FROM `clientes_asistencia_eventos`
LEFT JOIN `social_eventos`          ON social_eventos.idEvento                = clientes_asistencia_eventos.idEvento
LEFT JOIN `mnt_social_listado`      ON mnt_social_listado.id_sociallist       = social_eventos.id_sociallist
LEFT JOIN `mnt_social_categorias`   ON mnt_social_categorias.id_socialcat     = mnt_social_listado.id_socialcat
LEFT JOIN `detalle_general`         ON detalle_general.id_Detalle             = clientes_asistencia_eventos.Estado
WHERE idCliente={$_GET['view']}
ORDER BY Nombre_cat ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAsistencia,$row );
}
// Se trae un listado con todos los beneficios obtenidos
$arrBeneficios = array();
$query = "SELECT 
clientes_asistencia_beneficios.idBeneficios,
clientes_asistencia_beneficios.fAtencion,
clientes_asistencia_beneficios.Resultado,
clientes_asistencia_beneficios.Valor,
clientes_asistencia_beneficios.Estado,
usuarios_listado.Nombre AS nombre_usuario,
mnt_social_listado.Nombre AS nombre_social_list,
mnt_social_categorias.Nombre AS nombre_social_cat
FROM `clientes_asistencia_beneficios`
LEFT JOIN `usuarios_listado`           ON usuarios_listado.idUsuario                = clientes_asistencia_beneficios.idUsuario
LEFT JOIN `mnt_social_listado`         ON mnt_social_listado.id_sociallist          = clientes_asistencia_beneficios.id_sociallist
LEFT JOIN `mnt_social_categorias`      ON mnt_social_categorias.id_socialcat        = mnt_social_listado.id_socialcat

WHERE clientes_asistencia_beneficios.idCliente = {$_GET['view']}
ORDER BY clientes_asistencia_beneficios.fAtencion ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBeneficios,$row );
}
//Verifico si existe la variable de busqueda y pagina
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['Nombres'])) { 
$location .='&Nombres='.$_GET['Nombres'];
}
if (isset($_GET['ApellidoPat'])) { 
$location .='&ApellidoPat='.$_GET['ApellidoPat'];
}
if (isset($_GET['ApellidoMat'])) { 
$location .='&ApellidoMat='.$_GET['ApellidoMat'];
}
if (isset($_GET['Rut'])) { 
$location .='&Rut='.$_GET['Rut'];
}
if (isset($_GET['Sexo'])) { 
$location .='&Sexo='.$_GET['Sexo'];
} ?>
            
<div class="col-lg-4">
	<div class="box">
		<header>
			<h5>Ver Datos del Vecino</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Datos Basicos</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombres'].' '.$rowdata['ApellidoPat'].' '.$rowdata['ApellidoMat']; ?></p>
            <p class="text-muted"><strong>Telefono Casa : </strong><?php echo $rowdata['Fono1']; ?></p>
            <p class="text-muted"><strong>Telefono Celular : </strong><?php echo $rowdata['Fono2']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Sexo : </strong><?php if($rowdata['Sexo']=='M'){echo 'Hombre';}else{echo 'Mujer';} ?></p>
            <p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['fNacimiento']); ?></p>
            <p class="text-muted"><strong>Region : </strong><?php echo $rowdata['nombre_ciudad']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['nombre_comuna']; ?></p>
            <p class="text-muted"><strong>Villa : </strong><?php echo $rowdata['nombre_villa']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['nombre_calle'].' '.$rowdata['n_calle']; ?></p>
            <p class="text-muted"><strong>Tipo de Propiedad : </strong><?php echo $rowdata['Tipo_propiedad']; ?></p>
                        
            <h2 class="text-primary">Perfil del Vecino</h2>
            <p class="text-muted"><strong>Usuario : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Estado : </strong><?php echo $rowdata['estado']; ?></p>
            <p class="text-muted"><strong>Fecha Creacion : </strong><?php echo $rowdata['fcreacion']; ?></p>
            <p class="text-muted"><strong>Ultimo Acceso : </strong><?php echo $rowdata['Ultimo_acceso']; ?></p>
 
        </div>
	</div>
</div>
<div class="clearfix"></div>
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Eventos asistidos</h5>
		</header>          
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Evento</th>
        <th>Fecha Evento</th>
        <th>Fecha Inscripcion</th>
        <th>¿Asistio?</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrAsistencia as $asistencia) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $asistencia['Nombre_cat'].' - '.$asistencia['Nombre_list'].' - '.$asistencia['Nombre_evento']; ?></td>
			<td class=" "><?php echo $asistencia['fecha_evento']; ?></td>
            <td class=" "><?php echo $asistencia['Fecha_inscripcion']; ?></td>
			<td class=" "><?php echo $asistencia['estado_evento']; ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table> 
</div>  
</div> 
<div class="clearfix"></div>
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Beneficios Adquiridos</h5>
		</header>
                
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>F Atencion</th>
        <th>Folio</th>
        <th>Beneficio</th>
        <th>Observacion</th>
        <th>Valor beneficio</th>
        <th>Atendido por</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrBeneficios as $beneficio) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $beneficio['fAtencion']; ?></td>
			<td class=" "><?php echo n_doc($beneficio['idBeneficios']); ?></td>
            <td class=" "><?php echo $beneficio['nombre_social_cat'].' '.$beneficio['nombre_social_list']; ?></td>
			<td class=" "><?php echo $beneficio['Resultado']; ?></td>
			<td class=" "><?php echo Valores_sd($beneficio['Valor']); ?></td>
            <td class=" "><?php echo $beneficio['nombre_usuario']; ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
  
</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px"> 
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
$z ="WHERE clientes_listado.idCliente > 0";
if (isset($_GET['Nombres'])){
$z .= " AND clientes_listado.Nombres LIKE '%{$_GET['Nombres']}%'";	
}
if (isset($_GET['ApellidoPat'])){
$z .= " AND clientes_listado.ApellidoPat LIKE '%{$_GET['ApellidoPat']}%'";	
}
if (isset($_GET['ApellidoMat'])){
$z .= " AND clientes_listado.ApellidoMat LIKE '%{$_GET['ApellidoMat']}%'";	
}
if (isset($_GET['Rut'])){
$z .= " AND clientes_listado.Rut LIKE '%{$_GET['Rut']}%'";	
}
if (isset($_GET['Sexo'])){
$z .= " AND clientes_listado.Sexo = '{$_GET['Sexo']}' ";	
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
clientes_listado.fcreacion, 
clientes_listado.Nombres,
clientes_listado.ApellidoPat,
clientes_listado.ApellidoMat,
clientes_listado.Ultimo_acceso,
detalle_general.Nombre AS estado
FROM `clientes_listado`
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = clientes_listado.Estado
".$z."
ORDER BY clientes_listado.Nombres ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<?php 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['Nombres'])) { 
$location .='&Nombres='.$_GET['Nombres'];
}
if (isset($_GET['ApellidoPat'])) { 
$location .='&ApellidoPat='.$_GET['ApellidoPat'];
}
if (isset($_GET['ApellidoMat'])) { 
$location .='&ApellidoMat='.$_GET['ApellidoMat'];
}
if (isset($_GET['Rut'])) { 
$location .='&Rut='.$_GET['Rut'];
}
if (isset($_GET['Sexo'])) { 
$location .='&Sexo='.$_GET['Sexo'];
} 
?>
<div class="form-group">
<form class="form-horizontal" >

</form>
</div>
                      
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Vecinos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="209">Rut</th>
        <th width="472">Nombre del Vecino</th>
        <th width="160">Ultimo acceso</th>
        <th width="160">Fecha Creacion</th>
        <th width="120">Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td class=" sorting_1"><?php echo $usuarios['Rut']; ?></td>
			<td class=" "><?php echo $usuarios['Nombres'].' '.$usuarios['ApellidoPat'].' '.$usuarios['ApellidoPat']; ?></td>
            <td class=" "><?php echo $usuarios['Ultimo_acceso']; ?></td>
			<td class=" "><?php echo $usuarios['fcreacion']; ?></td>
			<td class=" "><?php echo $usuarios['estado']; ?></td>
			<td class=" ">
				<a href="<?php echo $location.'&view='.$usuarios['idCliente']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>
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
$x='';
if (isset($_GET['Nombres'])) { 
$x .='&Nombres='.$_GET['Nombres'];	
}
if (isset($_GET['ApellidoPat'])) { 
$x .='&ApellidoPat='.$_GET['ApellidoPat'];	
}
if (isset($_GET['ApellidoMat'])) { 
$x .='&ApellidoMat='.$_GET['ApellidoMat'];	
}
if (isset($_GET['Rut'])) { 
$x .='&Rut='.$_GET['Rut'];	
}
if (isset($_GET['Sexo'])) { 
$x .='&Sexo='.$_GET['Sexo'];	
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

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="principal.php" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
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