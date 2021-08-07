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
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "principal_datos_ficha.php";
$location = $original;
$location .= '?d=d';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para editar
if ( !empty($_POST['edit_datos']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idUsuario,datos';
	$form_trabajo= 'mod';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/z_modificacion_datos.php';
}
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
<?php 
//Listado de errores no manejables
if (isset($_GET['send']))   {$error['usuario'] 	  = 'sucess/Modificaciones solicitadas enviada correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! empty($_GET['id']) ) { ?> 
<div class="col-lg-12">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Solicitud de Modificacion de datos</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			
			<?php 
			//Se verifican si existen los datos
            if(isset($email)) {   $x1  = $email;   }else{$x1  = "";}
            
			//se dibujan los inputs
			echo form_ckeditor_ex('Datos','datos', $x1, 2);
			?> 
			
			<div class="form-group">
            	<input type="hidden" name="idUsuario" value="<?php echo $arrUsuario['idUsuario']; ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Enviar" name="edit_datos">
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
//conexion al servidor
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


//Consulta por los datos basicos
$query = "SELECT 
FichaFuncionario.Nombres, 
FichaFuncionario.Apellidos, 
FichaFuncionario.Direccion, 
FichaFuncionario.Telefonos, 
FichaFuncionario.FonoMovil, 
FichaFuncionario.Email, 
FichaFuncionario.EstadoCivil, 
FichaFuncionario.Id_Comuna,
FichaFuncionario.Sexo, 
FichaFuncionario.Fec_Nacimiento, 
FichaFuncionario.Rut
FROM FichaFuncionario 
WHERE FichaFuncionario.Id_Funcionario = {$rowdata['idCasChile']}";
$resultado = mssql_query( $query, $sql_conection );
$rowdata = mssql_fetch_assoc ($resultado);
			
//Consulta por los datos laborales
$query = "SELECT 
FichaMunicipal.TipoCargo, 
FichaMunicipal.TipoCalidad, 
FichaMunicipal.TipoEmpleado, 

PlantasMunicipales.PlantaNombre, 
FichaMunicipal.Id_Grado, 
Incrementos.ValorIncremento, 
FichaMunicipal.Jornada, 
FichaMunicipal.Fec_InicioBienios, 
FichaMunicipal.NroBienios, 
FichaMunicipal.NroBieniosZona,

FichaMunicipal.Id_Direccion, 
FichaMunicipal.Id_Departamento, 
FichaMunicipal.Id_Seccion

FROM FichaMunicipal 
LEFT JOIN PlantasMunicipales  ON PlantasMunicipales.Id_Planta  = FichaMunicipal.Id_Planta
LEFT JOIN Incrementos         ON Incrementos.Id_Incremento     = FichaMunicipal.Id_Incremento
WHERE FichaMunicipal.Id_Funcionario = {$rowdata['idCasChile']}";
$resultado = mssql_query( $query, $sql_conection );
$rowlaboral = mssql_fetch_assoc ($resultado);

						
?>

<div class="col-lg-12">
	<div class="box">
		<header>
			<h5>Mis datos</h5>
			<ul class="nav nav-tabs pull-right">
				<li class=""><a href="view_funcionario.php?view=<?php echo $_GET['view'];?>" >Datos</a></li>
				<li class=""><a href="view_funcionario_ingresos.php?view=<?php echo $_GET['view'];?>">Ingresos</a></li>
				<li class=""><a href="view_funcionario_observaciones.php?view=<?php echo $_GET['view'];?>">Observaciones</a></li>
				<li class="active"><a href="view_funcionario_ficha.php?view=<?php echo $_GET['view'];?>" >Ficha</a></li>
				<li class=""><a href="view_funcionario_diasadmin.php?pagina=1&view=<?php echo $_GET['view'];?>" >Dias Administrativos</a></li>
				<li class=""><a href="view_funcionario_horas.php?pagina=1&view=<?php echo $_GET['view'];?>" >Horas Compensatorias</a></li>
				<li class=""><a href="view_funcionario_feriados.php?pagina=1&view=<?php echo $_GET['view'];?>" >Feriados</a></li>
				<li class=""><a href="view_funcionario_licencias.php?pagina=1&view=<?php echo $_GET['view'];?>" >Licencias</a></li>
				<li class=""><a href="view_funcionario_asistencia.php?pagina=1&view=<?php echo $_GET['view'];?>" >Asistencia</a></li>
				<li class=""><a href="view_funcionario_liquidacion.php?pagina=1&view=<?php echo $_GET['view'];?>" >Liquidacion</a></li>
				<li class=""><a href="view_funcionario_calificacion.php?pagina=1&view=<?php echo $_GET['view'];?>" >Calificaciones</a></li>
			</ul>
		</header>
        <div class="body">
			<div class="col-lg-4">
				<br/>
				<?php if ($arrUsuario['Direccion_img']=='') { ?>
					<img class="media-object img-thumbnail user-img width100" alt="User Picture" src="img/usr.png">
				<?php }else{  ?>
					<img class="media-object img-thumbnail user-img width100" alt="User Picture" src="upload/<?php echo $arrUsuario['Direccion_img']; ?>">
				<?php }?>
				
			</div>
			<div class="col-lg-8">
				<h2 class="text-primary">Ficha Personal</h2>
				
				
				<table class="table">
					<tr class="info">
						<td colspan="2">Datos Personales</td>
					</tr>
					
					<tr>
						<td><i class="fa fa-user"></i> Nombre</td>                     
						<td><?php echo $rowdata['Nombres'].' '.$rowdata['Apellidos']?></td>
					</tr>
					
					<tr>
						<td><i class="fa fa-map-o"></i> Direccion</td>                 
						<td><?php echo $rowdata['Direccion'] ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-phone"></i> Telefono</td>                  
						<td><?php if($rowdata['Telefonos']!='' && $rowdata['Telefonos']!=0){ echo $rowdata['Telefonos'];} ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-mobile"></i> Telefono Movil</td>           
						<td><?php if($rowdata['Telefonos']!='' && $rowdata['Telefonos']!=0){ echo $rowdata['FonoMovil'];} ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-envelope-o"></i> Email</td>                
						<td><?php echo $rowdata['Email'] ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-venus-mars"></i> Estado Civil</td>         
						<td><?php 
							switch ($rowdata['EstadoCivil']) {
								case 0: echo "Soltero(a)"; break;
								case 1: echo "Casado(a)"; break;
								case 2: echo "Viudo(a)"; break;
								case 3: echo "Divorciado(a)"; break;
							} ?>
						</td>
					</tr>
					<tr>
						<td><i class="fa fa-mars"></i> Sexo</td>                       
						<td><?php 
							switch ($rowdata['Sexo']) {
								case 0: echo "Masculino"; break;
								case 1: echo "Femenino"; break;
							} ?>
						</td>
					</tr>
					<tr>
						<td><i class="fa fa-birthday-cake"></i> Fecha Nacimiento</td>  
						<td><?php echo Fecha_estandar($rowdata['Fec_Nacimiento']) ?></td>
					</tr>
					<tr>
						<td><i class="fa fa-align-justify"></i> Rut</td>               
						<td><?php echo $rowdata['Rut'] ?></td>
					</tr>
					
					<tr><td colspan="2"></td></tr>
					
					<tr class="info">
						<td colspan="2">Datos Laborales</td>
					</tr>


					<tr><td class="active" colspan="2">Bloque 1</td></tr> 
					<tr>
						<td>Cargo</td>
						<td>
						<?php 
							switch ($rowlaboral['TipoCargo']) {
								case 0: echo "Planta"; break;
								case 1: echo "Contrata"; break;
							} ?>
						</td>
					</tr>
					<tr>
						<td>Calidad</td>
						<td>
						<?php 
							switch ($rowlaboral['TipoCalidad']) {
								case 0: echo "Titular"; break;
								case 1: echo "Suplente"; break;
								case 2: echo "Subrogante"; break;
							} ?>
						</td>
					</tr>
					<tr>
						<td>Funcionario</td>
						<td>
						<?php 
							switch ($rowlaboral['TipoEmpleado']) {
								case 0: echo "Empleado"; break;
								case 1: echo "Auxiliar"; break;
								case 2: echo "Tesoreria"; break;
							} ?>
						</td>
					</tr>
					
					
					


					<tr><td class="active" colspan="2">Bloque 2</td></tr> 
					<tr>
						<td>Planta Municipal</td>
						<td><?php echo $rowlaboral['PlantaNombre'] ?></td>
					</tr>
					<tr>
						<td>Grado</td>
						<td><?php echo $rowlaboral['Id_Grado'] ?></td>
					</tr>
					<tr>
						<td>Fecha de Inicio</td>
						<td><?php echo Fecha_estandar($rowlaboral['Fec_InicioBienios']) ?></td>
					</tr>
					<tr>
						<td>Incremento</td>
						<td><?php echo $rowlaboral['ValorIncremento'] ?></td>
					</tr>
					<tr>
						<td>Jornada</td>
						<td><?php echo $rowlaboral['Jornada'] ?></td>
					</tr>
					<tr>
						<td>N de Bienios S/Zona</td>
						<td><?php echo $rowlaboral['NroBienios'] ?></td>
					</tr>
					<tr>
						<td>N de Bienios C/Zona</td>
						<td><?php echo $rowlaboral['NroBieniosZona'] ?></td>
					</tr>
					
					
		
					
					
					
				</table>
				
				
				

			</div>	
			<div class="clearfix"></div>
				
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
