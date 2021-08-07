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
$original = "principal_datos_horas.php";
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
// Se trae un listado con los dias administrativos tomados
$arrHoras = array();
$query = "SELECT  
Id_Decreto, Fecha_Decreto, Estado, Numero_Hora, Hora_Inicio, Hora_Termino, Fecha_Inicio, Fecha_Termino,Jornada
FROM Tiempo_Compensado
WHERE Id_Funcionario = {$arrUsuario['idCasChile']} AND Vigente=0
ORDER BY Fecha_Decreto DESC";
$resultado = mssql_query ($query, $sql_conection);
while ( $row = mssql_fetch_assoc ($resultado)) {
array_push( $arrHoras,$row );
}						
?>

<div class="col-lg-12">
	<div class="box">
		<header>
			<h5>Mis datos</h5>
			<ul class="nav nav-tabs pull-right">
				<li class=""><a href="principal_datos_perfil.php" >Perfil</a></li>
				<li class=""><a href="principal_datos_ficha.php" >Ficha</a></li>
				<li class=""><a href="principal_datos_diasadmin.php?pagina=1" >Dias Administrativos</a></li>
				<li class="active"><a href="principal_datos_horas.php?pagina=1" >Horas Compensatorias</a></li>
				<li class=""><a href="principal_datos_feriados.php?pagina=1" >Feriados</a></li>
				<li class=""><a href="principal_datos_licencias.php?pagina=1" >Licencias</a></li>
				<li class=""><a href="principal_datos_asistencia.php?pagina=1" >Asistencia</a></li>
				<li class=""><a href="principal_datos_liquidacion.php?pagina=1" >Liquidacion</a></li>
				<li class=""><a href="principal_datos_calificacion.php?pagina=1" >Calificaciones</a></li>
			</ul>
		</header>
        <div class="body">
			<div class="col-lg-2">
				<br/>
				
				<div class="bs-example" data-example-id="condensed-table">
					<h5>Horas Restantes</h5>
				</div>
				<div class="highlight">
					<?php 
					$totalh = 0;
					foreach($arrHoras as $horas) {
						if($horas['Estado']==1){
							$totalh+=$horas['Numero_Hora'];
						}else{
							$totalh-=$horas['Numero_Hora'];
						}
					}?>
						
					<p><?php echo $totalh ?></p>
				</div>

				
			</div>
			<div class="col-lg-10">
				<h2 class="text-primary">Horas Compensatorias</h2>
				<div class="table-responsive">
				<table class="table">
					<tr class="info">
						<td colspan="9">Tiempo Compensado</td>
					</tr>
					<tr class="active">
						<td>N° Resolucion</td>
						<td>Fecha Resolucion</td>
						<td>Horas Asignadas</td>
						<td>Horas Tomadas</td>
						<td>Hora Inicio</td>
						<td>Hora Termino</td>
						<td>Fecha Inicio</td>
						<td>Fecha Termino</td>
						<td>Jornada</td>
					</tr>			
					<?php foreach($arrHoras as $horas) {?>
						<tr>
							<?php 
							if($horas['Estado']==1){
								echo '<td>'.$horas['Id_Decreto'].'</td>';
								echo '<td>'.Fecha_estandar($horas['Fecha_Decreto']).'</td>';
								echo '<td>'.$horas['Numero_Hora'].'</td>';
								echo '<td></td>';
								echo '<td></td>';
								echo '<td></td>';
								echo '<td></td>';
								echo '<td></td>';
								echo '<td></td>';
							}else{
								echo '<td>'.$horas['Id_Decreto'].'</td>';
								echo '<td>'.Fecha_estandar($horas['Fecha_Decreto']).'</td>';
								echo '<td></td>';
								echo '<td>'.$horas['Numero_Hora'].'</td>';
								if($horas['Hora_Inicio']!=''){echo '<td>'.Hora_estandar($horas['Hora_Inicio']).'</td>';}else{echo '<td></td>';}
								if($horas['Hora_Termino']!=''){echo '<td>'.Hora_estandar($horas['Hora_Termino']).'</td>';}else{echo '<td></td>';}
								echo '<td>'.Fecha_estandar($horas['Fecha_Inicio']).'</td>';
								echo '<td>'.Fecha_estandar($horas['Fecha_Termino']).'</td>';
								switch ($horas['Jornada']) {
									case 0: echo '<td>Mañana</td>'; break;
									case 1: echo '<td>Tarde</td>'; break;
								}
							} ?>
						</tr> 
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
