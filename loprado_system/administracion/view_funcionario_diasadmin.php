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
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
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
$original = "principal_datos_diasadmin.php";
$location = $original;
$location .= '?d=d';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//variable con el nombre de la categoria de la transaccion
$rowlevel['nombre_categoria']='Mis Datos';
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Mis Datos Personales</title>
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
	<script src="assets/js/personel.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/lib/html5shiv/html5shiv.js"></script>
        <script src="assets/lib/respond/respond.min.js"></script>
        <![endif]-->
    <!--Modulos de javascript-->
    <script type="text/javascript" src="assets/lib/modernizr/modernizr.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
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
              <a href="principal.php" class="navbar-brand">
                <?php require_once 'core/logo_empresa.php';?>
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
            <i class="fa fa-dashboard"></i> Mis Datos Personales
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
//conexion al seridor
$server = "200.55.192.42";
$sql_conection = mssql_connect($server, "patentes", "k34n/p46jh");  
if (!$sql_conection) {
  	die("Algo sali&oacute; mal mientras se conectaba a la base de datos");
} else {
	if (!mssql_select_db("[Rem_Municipal]", $sql_conection)){    
		  echo "No he podido abrir la base de datos de Patentes Comerciales";
		  exit();
	}else{
		//echo "Conexion exitosa";
	}
}
// Se la identificacion interna
$query = "SELECT 
idCasChile
FROM `usuarios_listado`
WHERE idUsuario = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

// Se trae un listado con los dias administrativos tomados
$arrDiasAdmin = array();
$query = "SELECT  TOP 30
Periodo, NroDecreto, FechaSolicitud, NroDiasSolicitados, FechaInicio, FechaTermino, Hora_Inicio, Hora_Termino
FROM PermisosAdministrativos
WHERE Id_Funcionario = {$rowdata['idCasChile']} AND Periodo='".ano_actual()."'
ORDER BY Periodo DESC";
$resultado = mssql_query ($query, $sql_conection);
while ( $row = mssql_fetch_assoc ($resultado)) {
array_push( $arrDiasAdmin,$row );
}
//Consulta por los dias administrativos que quedan
$query = "SELECT NroDiasPermisosAdmins
FROM PermisosLegales 
WHERE Id_Funcionario = {$rowdata['idCasChile']} AND Periodo='".ano_actual()."'";
$resultado = mssql_query( $query, $sql_conection );
$rowdata = mssql_fetch_assoc ($resultado);									
?>

<div class="col-lg-12">
	<div class="box">
		<header>
			<h5>Mis datos</h5>
			<ul class="nav nav-tabs pull-right">
				<li class=""><a href="view_funcionario.php?view=<?php echo $_GET['view'];?>" >Datos</a></li>
				<li class=""><a href="view_funcionario_ingresos.php?view=<?php echo $_GET['view'];?>">Ingresos</a></li>
				<li class=""><a href="view_funcionario_observaciones.php?view=<?php echo $_GET['view'];?>">Observaciones</a></li>
				<li class=""><a href="view_funcionario_ficha.php?view=<?php echo $_GET['view'];?>" >Ficha</a></li>
				<li class="active"><a href="view_funcionario_diasadmin.php?pagina=1&view=<?php echo $_GET['view'];?>" >Dias Administrativos</a></li>
				<li class=""><a href="view_funcionario_horas.php?pagina=1&view=<?php echo $_GET['view'];?>" >Horas Compensatorias</a></li>
				<li class=""><a href="view_funcionario_feriados.php?pagina=1&view=<?php echo $_GET['view'];?>" >Feriados</a></li>
				<li class=""><a href="view_funcionario_licencias.php?pagina=1&view=<?php echo $_GET['view'];?>" >Licencias</a></li>
				<li class=""><a href="view_funcionario_asistencia.php?pagina=1&view=<?php echo $_GET['view'];?>" >Asistencia</a></li>
				<li class=""><a href="view_funcionario_liquidacion.php?pagina=1&view=<?php echo $_GET['view'];?>" >Liquidacion</a></li>
				<li class=""><a href="view_funcionario_calificacion.php?pagina=1&view=<?php echo $_GET['view'];?>" >Calificaciones</a></li>
			</ul>
		</header>
        <div class="body">
			<div class="col-lg-2">
				<br/>
				
				<div class="bs-example" data-example-id="condensed-table">
					<h5>Dias Restantes</h5>
				</div>
				<div class="highlight">
					<p><?php echo $rowdata['NroDiasPermisosAdmins'] ?></p>
				</div>

				
			</div>
			<div class="col-lg-10">
				<h2 class="text-primary">Dias Administrativos</h2>
				
				<div class="table-responsive">
				<table class="table">
					<tr class="info">
						<td colspan="7">Permisos administrativos asignados</td>
					</tr>
					
					<tr class="active">
						<td>N?? Decreto</td>
						<td>Fecha Decreto</td>
						<td>N?? Dias</td>
						<td>Fecha Inicio</td>
						<td>Fecha Termino</td>
						<td>Hora Inicio</td>
						<td>Hora Termino</td>
					</tr>
					<?php 
					filtrar($arrDiasAdmin, 'Periodo');
					foreach ($arrDiasAdmin as $Periodo=>$diasAdmin) { ?>
						<tr class="active"><td colspan="7">Periodo : <?php echo $Periodo ?></td></tr>
						<?php foreach($diasAdmin as $dias) {?>
							<tr>
								<td><?php echo $dias['NroDecreto'] ?></td>
								<td><?php echo Fecha_estandar($dias['FechaSolicitud']) ?></td>
								<td><?php echo $dias['NroDiasSolicitados'] ?></td>
								<td><?php echo Fecha_estandar($dias['FechaInicio']) ?></td>
								<td><?php echo Fecha_estandar($dias['FechaTermino']) ?></td>
								<td><?php if($dias['Hora_Inicio']!=''){echo Hora_estandar($dias['Hora_Inicio']);} ?></td>
								<td><?php if($dias['Hora_Termino']!=''){echo Hora_estandar($dias['Hora_Termino']);} ?></td>
							</tr>
						<?php } ?>  
					<?php } ?>     
		
					
					
					
				</table>
				
				</div>	
				

			</div>	
			<div class="clearfix"></div>
				
        </div>	
	
        
	</div>
</div>
            

			<!-- InstanceEndEditable -->   
            </div>
        </div>
      </div> 
    </div>
    <?php require_once 'core/footer.php';?>
    <!--Otros archivos javascript -->
    <script src="assets/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/lib/screenfull/screenfull.js"></script> 
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script src="assets/js/main.min.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>
