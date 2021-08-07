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
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Ver Datos del Bus</title>
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
    <link rel="stylesheet" href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css">
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
                <?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?><img src="upload/<?php echo $arrUsuario['imgLogo']; ?>" alt=""><?php }else{?><img src="img/logo_default.png" alt=""><?php } ?>
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
            <i class="fa fa-dashboard"></i> Ver Datos del Bus
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
 // Se traen todos los datos de mi usuario
$query = "SELECT 
clientes_listado.PPU,
vehiculos_marcas.Nombre AS Nombre_marca,
vehiculos_modelos.Nombre AS Nombre_modelo,
vehiculos_transmision.Nombre AS Nombre_transmision,
color1.Nombre AS Nombre_color1,
color2.Nombre AS Nombre_color2,
clientes_listado.fTransferencia,
clientes_listado.fFabricacion,
clientes_listado.N_Motor,
clientes_listado.N_Chasis,
clientes_listado.Obs,
clientes_listado.usuario,
detalle_general.Nombre AS estado,
clientes_listado.fcreacion,
clientes_listado.Ultimo_acceso,
taxista_recorridos.Nombre AS recorrido,

taxista_propietarios.Nombre AS Prop_Nombre,
taxista_propietarios.Apellido_Paterno AS Prop_ApellidoPat,
taxista_propietarios.Apellido_Materno AS Prop_ApellidoMat,
taxista_propietarios.Rut AS Prop_Rut,
taxista_propietarios.Sexo AS Prop_Sexo,
taxista_propietarios.fNacimiento AS Prop_Fnac,
taxista_propietarios.email AS Prop_Email,
taxista_propietarios.Pais AS Prop_Pais,
prop_ciudad.Nombre AS Prop_Ciudad,
prop_comuna.Nombre AS Prop_Comuna,
taxista_propietarios.Direccion AS Prop_Direccion,
taxista_propietarios.Fono1 AS Prop_Fono1,
taxista_propietarios.Fono2 AS Prop_Fono2,
taxista_propietarios.NombreEmpresa AS Prop_Empresa,

taxista_conductores.Nombre AS Cond_Nombre,
taxista_conductores.Apellido_Paterno AS Cond_ApellidoPat,
taxista_conductores.Apellido_Materno AS Cond_ApellidoMat,
taxista_conductores.Rut AS Cond_Rut,
taxista_conductores.Sexo AS Cond_Sexo,
taxista_conductores.fNacimiento AS Cond_Fnac,
taxista_conductores.email AS Cond_Email,
taxista_conductores.Pais AS Cond_Pais,
cond_ciudad.Nombre AS Cond_Ciudad,
cond_comuna.Nombre AS Cond_Comuna,
taxista_conductores.Direccion AS Cond_Direccion,
taxista_conductores.Fono1 AS Cond_Fono1,
taxista_conductores.Fono2 AS Cond_Fono2,

clientes_tipos.RazonSocial AS sistema
FROM `clientes_listado`
LEFT JOIN `taxista_recorridos`                    ON taxista_recorridos.idRecorrido          = clientes_listado.idRecorrido
LEFT JOIN `vehiculos_marcas`                      ON vehiculos_marcas.idMarca                = clientes_listado.idMarca
LEFT JOIN `vehiculos_modelos`                     ON vehiculos_modelos.idModelo              = clientes_listado.idModelo
LEFT JOIN `detalle_general`                       ON detalle_general.id_Detalle              = clientes_listado.Estado
LEFT JOIN `clientes_tipos`                        ON clientes_tipos.idTipoCliente            = clientes_listado.idTipoCliente
LEFT JOIN `taxista_propietarios`                  ON taxista_propietarios.idPropietario      = clientes_listado.idPropietario
LEFT JOIN `taxista_conductores`                   ON taxista_conductores.idConductor         = clientes_listado.idConductor
LEFT JOIN `vehiculos_transmision`                 ON vehiculos_transmision.idTransmision     = clientes_listado.idTransmision
LEFT JOIN `vehiculos_colores`      color1         ON color1.idColorV                         = clientes_listado.idColorV_1
LEFT JOIN `vehiculos_colores`      color2         ON color2.idColorV                         = clientes_listado.idColorV_2
LEFT JOIN `mnt_ubicacion_ciudad`   prop_ciudad    ON prop_ciudad.idCiudad                    = taxista_propietarios.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`  prop_comuna    ON prop_comuna.idComuna                    = taxista_propietarios.idComuna
LEFT JOIN `mnt_ubicacion_ciudad`   cond_ciudad    ON cond_ciudad.idCiudad                    = taxista_conductores.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`  cond_comuna    ON cond_comuna.idComuna                    = taxista_conductores.idComuna
WHERE clientes_listado.idCliente = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
// Se trae un listado con todas las observaciones el cliente
$arrObservaciones = array();
$query = "SELECT 
usuarios_listado.Nombre AS nombre_usuario,
clientes_observaciones.Fecha,
clientes_observaciones.Observacion
FROM `clientes_observaciones`
LEFT JOIN `usuarios_listado`   ON usuarios_listado.idUsuario     = clientes_observaciones.idUsuario
WHERE clientes_observaciones.idCliente = {$_GET['view']}
ORDER BY clientes_observaciones.idObservacion ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrObservaciones,$row );
}	

// Se trae un listado con todos los vehiculos conducidos
$arrUsers = array();
$query = "SELECT 
transantiago_conductores.Nombre AS Nombre_cond,
transantiago_conductores.Apellido_Paterno AS Apellido_cond,
transantiago_conductores_historico.Fecha AS Fecha_cond,
transantiago_conductores_historico.Hora AS Hora_cond
FROM `transantiago_conductores_historico`
LEFT JOIN `clientes_listado`            ON clientes_listado.idCliente                = transantiago_conductores_historico.idCliente
LEFT JOIN `transantiago_conductores`    ON transantiago_conductores.idConductor      = clientes_listado.idConductor

WHERE transantiago_conductores_historico.idCliente = '{$_GET['view']}'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}


?>

<div class="col-lg-4">
	<div class="box">
		<header>
			<h5>Ver Datos del Taxi</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Datos del Vehiculo</h2>
            <p class="text-muted"><strong>Patente : </strong><?php echo $rowdata['recorrido']; ?></p>
            <p class="text-muted"><strong>Patente : </strong><?php echo $rowdata['PPU']; ?></p>
            <p class="text-muted"><strong>Marca : </strong><?php echo $rowdata['Nombre_marca']; ?></p>
            <p class="text-muted"><strong>Modelo : </strong><?php echo $rowdata['Nombre_modelo']; ?></p>
            <p class="text-muted"><strong>Transmision : </strong><?php echo $rowdata['Nombre_transmision']; ?></p>
            <p class="text-muted"><strong>Color 1 : </strong><?php echo $rowdata['Nombre_color1']; ?></p>
            <p class="text-muted"><strong>Color 2 : </strong><?php echo $rowdata['Nombre_color2']; ?></p>
            <p class="text-muted"><strong>Fecha de Transferencia : </strong><?php echo Fecha_completa($rowdata['fTransferencia']); ?></p>
            <p class="text-muted"><strong>Fecha de Fabricacion : </strong><?php echo Fecha_completa($rowdata['fFabricacion']); ?></p>
            <p class="text-muted"><strong>Numero de Motor : </strong><?php echo $rowdata['N_Motor']; ?></p>
            <p class="text-muted"><strong>Numero de Chasis : </strong><?php echo $rowdata['N_Chasis']; ?></p>
            <p class="text-muted"><strong>Observacion : </strong><?php echo $rowdata['Obs']; ?></p>
                        
            <h2 class="text-primary">Perfil del Taxi</h2>
            <p class="text-muted"><strong>Usuario : </strong><?php echo $rowdata['usuario']; ?></p>
            <p class="text-muted"><strong>Estado : </strong><?php echo $rowdata['estado']; ?></p>
            <p class="text-muted"><strong>Fecha Creacion : </strong><?php echo $rowdata['fcreacion']; ?></p>
            <p class="text-muted"><strong>Ultimo Acceso : </strong><?php echo $rowdata['Ultimo_acceso']; ?></p>
            <p class="text-muted"><strong>Sistema : </strong><?php echo $rowdata['sistema']; ?></p>
        	
        </div>
	</div>
</div>
<div class="col-lg-4">
	<div class="box">
		<header>
			<h5>Ver Datos del Propietario</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Datos del Propietario</h2>
            <p class="text-muted"><strong>Propietario : </strong><?php echo $rowdata['Prop_Nombre'].' '.$rowdata['Prop_ApellidoPat'].' '.$rowdata['Prop_ApellidoMat']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Prop_Rut']; ?></p>
            <p class="text-muted"><strong>Sexo : </strong><?php echo $rowdata['Prop_Sexo']; ?></p>
            <p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['Prop_Fnac']); ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['Prop_Email']; ?></p>
            <p class="text-muted"><strong>Pais : </strong><?php echo $rowdata['Prop_Pais']; ?></p>
            <p class="text-muted"><strong>Region : </strong><?php echo $rowdata['Prop_Ciudad']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['Prop_Comuna']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Prop_Direccion']; ?></p>
            <p class="text-muted"><strong>Fono 1 : </strong><?php echo $rowdata['Prop_Fono1']; ?></p>
            <p class="text-muted"><strong>Fono 2 : </strong><?php echo $rowdata['Prop_Fono2']; ?></p>
            <p class="text-muted"><strong>Empresa : </strong><?php echo $rowdata['Prop_Empresa']; ?></p>
        	
        </div>
	</div>
</div>
<div class="col-lg-4">
	<div class="box">
		<header>
			<h5>Ver Datos del Conductor Actual</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Datos del Conductor</h2>
            <p class="text-muted"><strong>Propietario : </strong><?php echo $rowdata['Cond_Nombre'].' '.$rowdata['Cond_ApellidoPat'].' '.$rowdata['Cond_ApellidoMat']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Cond_Rut']; ?></p>
            <p class="text-muted"><strong>Sexo : </strong><?php echo $rowdata['Cond_Sexo']; ?></p>
            <p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['Cond_Fnac']); ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['Cond_Email']; ?></p>
            <p class="text-muted"><strong>Pais : </strong><?php echo $rowdata['Cond_Pais']; ?></p>
            <p class="text-muted"><strong>Region : </strong><?php echo $rowdata['Cond_Ciudad']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['Cond_Comuna']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Cond_Direccion']; ?></p>
            <p class="text-muted"><strong>Fono 1 : </strong><?php echo $rowdata['Cond_Fono1']; ?></p>
            <p class="text-muted"><strong>Fono 2 : </strong><?php echo $rowdata['Cond_Fono2']; ?></p>
        	
        </div>
	</div>
</div>

<div class="clearfix"></div>
                                
<div class="col-lg-12">
	<div class="box">
		<header>
<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Observaciones</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Autor</th>
        <th>Fecha</th>
        <th>Observacion</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrObservaciones as $observaciones) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $observaciones['nombre_usuario']; ?></td>
            <td class=" "><?php echo $observaciones['Fecha']; ?></td>
			<td class=" word_break"><?php echo $observaciones['Observacion']; ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table> 
</div>
</div>

<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Conductores</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
		<th>Fecha</th>
		<th>Hora</th>
        <th>Conductor</th>
    </tr>
	</thead>
               
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['Fecha_cond']; ?></td>
			<td><?php echo $usuarios['Hora_cond']; ?></td>
            <td><?php echo $usuarios['Nombre_cond'].' '.$usuarios['Apellido_cond']; ?></td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
</div>
</div>





<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="#" onclick="history.back()" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
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