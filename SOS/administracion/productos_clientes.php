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
$original = "productos_clientes.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                       $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != ''){                       $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != ''){   $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != ''){   $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != ''){                           $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != ''){                       $location .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != ''){                   $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != ''){                   $location .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != ''){             $location .= "&dispositivo=".$_GET['dispositivo'] ; }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; 
}
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Nombre,Apellido_Paterno,Apellido_Materno,Sexo,email,Rut,fNacimiento,Direccion';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idCliente,Nombre,Apellido_Paterno,Apellido_Materno,Sexo,email,Rut,fNacimiento,Direccion';
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Usuario creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Usuario editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Usuario borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['view_fav']) ) { 
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
productos_listado.Nombre AS Producto
FROM `productos_favoritos`
LEFT JOIN `productos_listado`   ON productos_listado.idProducto     = productos_favoritos.idProducto
WHERE productos_favoritos.idCliente = {$_GET['view_fav']} ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
//datos del cliente
$query = "SELECT Nombre,Apellido_Paterno
FROM `clientes_listado`
WHERE idCliente = {$_GET['view_fav']} ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
?>
<div class="form-group">
<form class="form-horizontal" ></form>
</div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Productos Favoritos de <?php echo $row_data['Nombre'].' '.$row_data['Apellido_Paterno']?></h5>	
		</header>
        
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th>Producto</th>
			</tr>
		</thead>
		<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">		
			<td><?php echo $usuarios['Producto']; ?></td>				
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
 } elseif ( ! empty($_GET['view_esc']) ) { 
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
productos_listado.Nombre AS Producto,
productos_consultados.Latitud,
productos_consultados.Longitud,
productos_consultados.Fecha

FROM `productos_consultados`
LEFT JOIN `productos_listado`   ON productos_listado.idProducto     = productos_consultados.idProducto
WHERE productos_consultados.idCliente = {$_GET['view_esc']} ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
//datos del cliente
$query = "SELECT Nombre,Apellido_Paterno
FROM `clientes_listado`
WHERE idCliente = {$_GET['view_esc']} ";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
?>
<div class="form-group">
<form class="form-horizontal" ></form>
</div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Productos Escaneados por <?php echo $row_data['Nombre'].' '.$row_data['Apellido_Paterno']?></h5>	
		</header>
        
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th>Producto</th>
				<th width="160">Latitud</th>
				<th width="120">Longitud</th>
				<th width="120">Fecha</th>
			</tr>
		</thead>
		<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">		
			<td><?php echo $usuarios['Producto']; ?></td>		
			<td><?php echo $usuarios['Latitud']; ?></td>		
			<td><?php echo $usuarios['Longitud']; ?></td>
            <td><?php echo $usuarios['Fecha']; ?></td>			
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
 } elseif ( ! empty($_GET['fullsearch']) ) { ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para Busqueda Avanzada</h5>
		</header>
		<div id="div-1" class="body">
		<form name="form1" class="form-horizontal" action="<?php echo $location; ?>" >
			
            <?php 
			//Se verifican si existen los datos
			if(isset($Nombre)) {                 $x1  = $Nombre;                 }else{$x1  = '';}
            if(isset($Apellido_Paterno)) {       $x2  = $Apellido_Paterno;       }else{$x2  = '';}
            if(isset($Apellido_Materno)) {       $x3  = $Apellido_Materno;       }else{$x3  = '';}
			if(isset($rango_a)) {                $x4  = $rango_a;                }else{$x4  = '';}
            if(isset($rango_b)) {                $x5  = $rango_b;                }else{$x5  = '';}
			if(isset($Sexo)) {                   $x6  = $Sexo;                   }else{$x6  = '';}
			if(isset($Estado)) {                 $x7  = $Estado;                 }else{$x7  = '';}
			if(isset($idCiudad)) {               $x8  = $idCiudad;               }else{$x8  = '';}
			if(isset($idComuna)) {               $x9  = $idComuna;               }else{$x9  = '';}
			if(isset($dispositivo)) {            $x10 = $dispositivo;            }else{$x10 = '';}
			
			//se dibujan los inputs
			echo form_input('text', 'Nombres', 'Nombre', $x1, 1);
			echo form_input('text', 'Apellido Paterno', 'Apellido_Paterno', $x2, 1);
			echo form_input('text', 'Apellido Materno', 'Apellido_Materno', $x3, 1);
			echo form_date('F Nacimiento inicio','rango_a', $x4, 1);
			echo form_date('F Nacimiento termino','rango_b', $x5, 1);
			echo form_select('Sexo','Sexo', $x6, 1, 'Inicial', 'Nombre', 'clientes_sexo', 0, $dbConn);
			echo form_select('Estado Cliente','Estado', $x7, 1, 'id_Detalle', 'Nombre', 'detalle_general', 'Tipo=1', $dbConn);
			echo form_select_depend1('Ciudad','idCiudad', $x8, 1, 'idCiudad', 'Nombre', 'mnt_ubicacion_ciudad', 0,
									'Comuna','idComuna', $x9, 1, 'idComuna', 'idCiudad', 'Nombre', 'mnt_ubicacion_comunas', 0, 
									 $dbConn);
			echo form_select('Dispositivo','dispositivo', $x10, 1, 'Nombre', 'Nombre', 'clientes_dispositivo', 0, $dbConn);						 
			?>        
   
			<div class="form-group">
            	<input type="hidden" name="pagina" value="1" >
				<input type="submit" class="btn btn-primary fright margin_width" value="Buscar" >
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
if(isset($_GET["pagina"])){$num_pag = $_GET["pagina"];	
} else {$num_pag = 1;	
}
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//resto de variables
if (!$num_pag){$comienzo = 0 ;$num_pag = 1 ;
} else {$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//Le agrego condiciones a la consulta
$z="WHERE clientes_listado.idTipoCliente=4";	//Sistema productos
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){                        $z .=" AND clientes_listado.Rut LIKE '%{$_GET['search']}%'";}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')  {                       $z .= " AND clientes_listado.Nombre LIKE '%{$_GET['Nombre']}%' " ;}
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')  {   $z .= " AND clientes_listado.Apellido_Paterno LIKE '%{$_GET['Apellido_Paterno']}%' " ;}
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')  {   $z .= " AND clientes_listado.Apellido_Materno LIKE '%{$_GET['Apellido_Materno']}%' " ;}
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')  {                           $z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ;}
if(isset($_GET['Estado']) && $_GET['Estado'] != '')  {                       $z .= " AND clientes_listado.Estado = '".$_GET['Estado']."'" ;}
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')  {                   $z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ;}
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')  {                   $z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ;}
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')  {             $z .= " AND clientes_listado.dispositivo = '".$_GET['dispositivo']."'" ;}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND clientes_listado.fNacimiento BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;
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
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
clientes_listado.Apellido_Materno,
detalle_general.Nombre AS estado,
clientes_tipos.RazonSocial AS sistema
FROM `clientes_listado`
LEFT JOIN `detalle_general`   ON detalle_general.id_Detalle     = clientes_listado.Estado
LEFT JOIN `clientes_tipos`    ON clientes_tipos.idTipoCliente   = clientes_listado.idTipoCliente
".$z."
ORDER BY clientes_listado.Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Cliente</label>
    <div class="col-lg-5">	<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >		
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Rut">
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
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Clientes</h5>	
		</header>
        
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th width="209">Rut</th>
				<th>Nombre del Cliente</th>
				<th width="160">Sistema</th>
				<th width="120">Estado</th>
				<th width="120">Acciones</th>
			</tr>
		</thead>
		<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">		
			<td><?php echo $usuarios['Rut']; ?></td>		
			<td><?php echo $usuarios['Nombre'].' '.$usuarios['Apellido_Paterno'].' '.$usuarios['Apellido_Materno']; ?></td>		
			<td><?php echo $usuarios['sistema']; ?></td>
            <td><?php echo $usuarios['estado']; ?></td>		
			<td>
				<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view_esc='.$usuarios['idCliente']; ?>" title="Ver Productos Escaneados" class="icon-ver info-tooltip"></a><?php }?>   
				<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view_fav='.$usuarios['idCliente']; ?>" title="Ver Productos Favoritos" class="icon-ver info-tooltip"></a><?php }?>   		
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