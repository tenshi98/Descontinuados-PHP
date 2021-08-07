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
require_once '../AA2D2CFFDJFDJX1/PHPMailer/class.phpmailer.php';
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
$original = "transantiago_conductores_historico.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                  $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['PPU']) && $_GET['PPU'] != ''){                        $location .= "&PPU=".$_GET['PPU'] ;  }
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {              $location .= "&N_Motor=".$_GET['N_Motor'] ; }
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {            $location .= "&N_Chasis=".$_GET['N_Chasis'] ; }
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {  $location .= "&idPropietario=".$_GET['idPropietario'] ; }
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {      $location .= "&idRecorrido=".$_GET['idRecorrido'] ; }
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {              $location .= "&idMarca=".$_GET['idMarca'] ; }
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {            $location .= "&idModelo=".$_GET['idModelo'] ; }
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {  $location .= "&idTransmision=".$_GET['idTransmision'] ;  }
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {        $location .= "&idColorV_1=".$_GET['idColorV_1'] ;  }
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {        $location .= "&idColorV_2=".$_GET['idColorV_2'] ;  }
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$location .= "&fechaInicio={$_GET['fechaInicio']}&fechaTermino={$_GET['fechaTermino']}" ;           
}
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idConductor,idPropietario,idRecorrido,PPU,idMarca,idModelo,idTransmision,idColorV_1,fFabricacion,N_Motor,N_Chasis,idTipoCliente';
	$form_trabajo= 'insert_vehicle';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idCliente,idConductor,idPropietario,idRecorrido,PPU,idMarca,idModelo,idTransmision,idColorV_1,fFabricacion,N_Motor,N_Chasis,idTipoCliente';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';	
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
<?php 
//Listado de errores no manejables
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Bus creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Bus editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Bus borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['view']) ) { 
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
transantiago_conductores.Rut,
transantiago_conductores.Nombre,
transantiago_conductores.Apellido_Paterno,
transantiago_conductores.Apellido_Materno,
transantiago_conductores_historico.Fecha AS Fecha_cond,
transantiago_conductores_historico.Hora AS Hora_cond
FROM `transantiago_conductores_historico`
LEFT JOIN `transantiago_conductores`   ON transantiago_conductores.idConductor   = transantiago_conductores_historico.idConductor
WHERE transantiago_conductores_historico.idCliente = '{$_GET['view']}'
ORDER BY transantiago_conductores.Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
} ?>
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Conductores</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="209">Rut</th>
        <th>Nombre del Conductor</th>
		<th>Fecha</th>
		<th>Hora</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['Rut']; ?></td>
			<td><?php echo $usuarios['Nombre'].' '.$usuarios['Apellido_Paterno'].' '.$usuarios['Apellido_Materno']; ?></td>
			<td><?php echo $usuarios['Fecha_cond']; ?></td>
			<td><?php echo $usuarios['Hora_cond']; ?></td>
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
 } elseif ( ! empty($_GET['fullsearch']) ) {?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Busqueda Avanzada</h5>
		</header>
		<div id="div-1" class="body">
			<form class="form-horizontal" action="<?php echo $location ?>" name="form1">
			
				<?php 
				//Se verifican si existen los datos
				if(isset($idPropietario)) {  $x1  = $idPropietario;  }else{$x1  = '';}
				if(isset($idRecorrido)) {    $x2  = $idRecorrido;    }else{$x2  = '';}
				if(isset($PPU)) {            $x3  = $PPU;            }else{$x3  = '';}
				if(isset($idMarca)) {        $x4  = $idMarca;        }else{$x4  = '';}
				if(isset($idModelo)) {       $x5  = $idModelo;       }else{$x5  = '';}
				if(isset($idTransmision)) {  $x6  = $idTransmision;  }else{$x6  = '';}
				if(isset($idColorV_1)) {     $x7  = $idColorV_1;     }else{$x7  = '';}
				if(isset($idColorV_2)) {     $x8  = $idColorV_2;     }else{$x8  = '';}
				if(isset($fechaInicio)) {    $x9  = $fechaInicio;    }else{$x9  = '';}
				if(isset($fechaTermino)) {   $x10 = $fechaTermino;   }else{$x10 = '';}
				if(isset($N_Motor)) {        $x11 = $N_Motor;        }else{$x11 = '';}
				if(isset($N_Chasis)) {       $x12 = $N_Chasis;       }else{$x12 = '';}

				//se dibujan los inputs
				echo form_select_filter('Propietario','idPropietario', $x1, 1, 'idPropietario', 'Nombre,Apellido_Paterno,Apellido_Materno', 'transantiago_propietarios', 0, $dbConn);
				echo form_select_filter('Recorrido','idRecorrido', $x2, 1, 'idRecorrido', 'Nombre', 'transantiago_recorridos', 0, $dbConn);
				echo form_input('text', 'Patente', 'PPU', $x3, 1);
				echo form_select_depend1('Marca','idMarca', $x4, 1, 'idMarca', 'Nombre', 'vehiculos_marcas', 0,
										'Modelo','idModelo', $x5, 1, 'idModelo', 'idMarca', 'Nombre', 'vehiculos_modelos', 0, 
										 $dbConn);
				echo form_select('Tipo de Transmision','idTransmision', $x6, 1, 'idTransmision', 'Nombre', 'vehiculos_transmision', 0, $dbConn);						 
				echo form_select('Color Base','idColorV_1', $x7, 1, 'idColorV', 'Nombre', 'vehiculos_colores', 0, $dbConn);						 
				echo form_select('Color Complementario','idColorV_2', $x8, 1, 'idColorV', 'Nombre', 'vehiculos_colores', 0, $dbConn);
				echo form_date('F Fabricacion Inicio','fechaInicio', $x9, 1);
				echo form_date('F Fabricacion Fin','fechaTermino', $x10, 1);
				echo form_input('text', 'Numero de Motor', 'N_Motor', $x11, 1);
				echo form_input('text', 'Numero de Chasis', 'N_Chasis', $x12, 1);
				?> 
            

				<div class="form-group">
					<input type="hidden" name="pagina" value="1" >
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Buscar" >
					<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
				</div>
                      
			</form>  
                    
		</div>
	</div>
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
//Le agrego condiciones a la consulta
$z="WHERE clientes_listado.idTipoCliente=3";	//Sistema transantiago
//Otros filtros
$z .=" AND clientes_listado.Nombre=''";
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){                  $z .=" AND clientes_listado.PPU LIKE '%{$_GET['search']}%'";}
if (isset($_GET['PPU']) && $_GET['PPU'] != ''){                        $z .=" AND clientes_listado.PPU LIKE '%{$_GET['PPU']}%'";}
if(isset($_GET['N_Motor']) && $_GET['N_Motor'] != '')  {               $z .= " AND clientes_listado.N_Motor LIKE '%{$_GET['N_Motor']}%' " ;}
if(isset($_GET['N_Chasis']) && $_GET['N_Chasis'] != '')  {             $z .= " AND clientes_listado.N_Chasis LIKE '%{$_GET['N_Chasis']}%' " ;}
if(isset($_GET['idPropietario']) && $_GET['idPropietario'] != '')  {   $z .= " AND clientes_listado.idPropietario = '".$_GET['idPropietario']."'" ;}
if(isset($_GET['idRecorrido']) && $_GET['idRecorrido'] != '')  {       $z .= " AND clientes_listado.idRecorrido = '".$_GET['idRecorrido']."'" ;}
if(isset($_GET['idMarca']) && $_GET['idMarca'] != '')  {               $z .= " AND clientes_listado.idMarca = '".$_GET['idMarca']."'" ;}
if(isset($_GET['idModelo']) && $_GET['idModelo'] != '')  {             $z .= " AND clientes_listado.idModelo = '".$_GET['idModelo']."'" ;}
if(isset($_GET['idTransmision']) && $_GET['idTransmision'] != '')  {   $z .= " AND clientes_listado.idTransmision = '".$_GET['idTransmision']."'" ;}
if(isset($_GET['idColorV_1']) && $_GET['idColorV_1'] != '')  {         $z .= " AND clientes_listado.idColorV_1 = '".$_GET['idColorV_1']."'" ;}
if(isset($_GET['idColorV_2']) && $_GET['idColorV_2'] != '')  {         $z .= " AND clientes_listado.idColorV_2 = '".$_GET['idColorV_2']."'" ;}
if(isset($_GET['fechaInicio']) && $_GET['fechaInicio'] != ''&&isset($_GET['fechaTermino']) && $_GET['fechaTermino'] != ''){ 
	$z .= " AND clientes_listado.fFabricacion BETWEEN '{$_GET['fechaInicio']}' AND '{$_GET['fechaTermino']}'" ;        
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
transantiago_recorridos.Nombre AS recorrido,
clientes_listado.PPU,
buses_marcas.Nombre AS Nombre_marca,
buses_modelos.Nombre AS Nombre_modelo,
transantiago_propietarios.Nombre AS Nombre_prop,
transantiago_propietarios.Apellido_Paterno AS Apellido_prop,
clientes_listado.idCliente,
detalle_general.Nombre AS estado,
clientes_tipos.RazonSocial AS sistema
FROM `clientes_listado`
LEFT JOIN `transantiago_recorridos`     ON transantiago_recorridos.idRecorrido       = clientes_listado.idRecorrido
LEFT JOIN `buses_marcas`                ON buses_marcas.idMarca                      = clientes_listado.idMarca
LEFT JOIN `buses_modelos`               ON buses_modelos.idModelo                    = clientes_listado.idModelo
LEFT JOIN `detalle_general`             ON detalle_general.id_Detalle                = clientes_listado.Estado
LEFT JOIN `clientes_tipos`              ON clientes_tipos.idTipoCliente              = clientes_listado.idTipoCliente
LEFT JOIN `transantiago_propietarios`   ON transantiago_propietarios.idPropietario   = clientes_listado.idPropietario
".$z."
ORDER BY clientes_listado.Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Bus</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Patente">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
			<a href="<?php echo $location; ?>&fullsearch=true" class="t_search_button_full" ><i class="fa fa-search-plus"></i></a>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
</div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Transantiago</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Bus</th>
        <th>Recorrido</th>
        <th>Propietario</th>
        <th>Sistema</th>
        <th>Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
               
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo 'Patente '.$usuarios['PPU'].' - '.$usuarios['Nombre_marca'].' '.$usuarios['Nombre_modelo']; ?></td>
            <td><?php echo $usuarios['recorrido']; ?></td>
            <td><?php echo $usuarios['Nombre_prop'].' '.$usuarios['Apellido_prop']; ?></td>
			<td><?php echo $usuarios['sistema']; ?></td>
            <td><?php echo $usuarios['estado']; ?></td>
			<td>
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$usuarios['idCliente']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>   
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
if (isset($_GET['search'])) {  $search ='&search='.$_GET['search']; } else { $search='';}
echo paginador_1($total_paginas, $original, $search, $num_pag ) ?> 
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