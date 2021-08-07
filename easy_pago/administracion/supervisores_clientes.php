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
$original = "supervisores_clientes.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                       $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != ''){                       $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['idEstado']) && $_GET['idEstado'] != ''){                   $location .= "&idEstado=".$_GET['idEstado'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != ''){                   $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != ''){                   $location .= "&idComuna=".$_GET['idComuna'] ; }
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
	$form_obligatorios = 'idTipo,Nombre,Rut,Direccion,idSistema,idUsuario';
	$form_trabajo= 'insert2';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/clientes_listado.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idCliente,idTipo,Nombre,Rut,Direccion,idSistema';
	$form_trabajo= 'update2';
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
              <a href="principal.php" class="navbar-brand">
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
            <?php echo '<i class="'.$rowlevel['IconoCategoria'].'"></i> '.$rowlevel['nombre_transaccion']; ?>		
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Almacen creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Almacen editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Almacen borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT idTipo, Nombre , Rut, fNacimiento,  Direccion, idSistema, Fono1, Fono2, email, Departamento, Provincia, Distrito, Rubro,
idUsuario
FROM `clientes_listado`
WHERE idCliente = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	

//se selecciona el nombre del Departamento
$query = "SELECT idDepartamento
FROM `ubicacion_departamento`
WHERE Nombre = '{$rowdata['Departamento']}'";
$resultado = mysql_query ($query, $dbConn);
$rowdepto = mysql_fetch_assoc ($resultado);
			
//se selecciona el nombre del Provincia
$query = "SELECT idProvincia
FROM `ubicacion_provincia`
WHERE Nombre = '{$rowdata['Provincia']}' AND idDepartamento='{$rowdepto['idDepartamento']}' ";
$resultado = mysql_query ($query, $dbConn);
$rowprov = mysql_fetch_assoc ($resultado);
			
//se selecciona el nombre del Distrito
$query = "SELECT idDistrito
FROM `ubicacion_distrito`
WHERE Nombre = '{$rowdata['Distrito']}' AND idProvincia='{$rowprov['idProvincia']}'";
$resultado = mysql_query ($query, $dbConn);
$rowdist = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos del Almacen</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
        	
            <?php 
			//Se verifican si existen los datos
			if(isset($idTipo)) {           $x1  = $idTipo;            }else{$x1  = $rowdata['idTipo'];}
			if(isset($Nombre)) {           $x2  = $Nombre;            }else{$x2  = $rowdata['Nombre'];}
			if(isset($Rut)) {              $x3  = $Rut;               }else{$x3  = $rowdata['Rut'];}
            if(isset($fNacimiento)) {      $x4  = $fNacimiento;       }else{$x4  = $rowdata['fNacimiento'];}
            if(isset($Rubro)) {            $x5  = $Rubro;             }else{$x5  = $rowdata['Rubro'];}
            if(isset($idDepartamento)) {   $x6  = $idDepartamento;    }else{$x6  = $rowdepto['idDepartamento'];}
            if(isset($idProvincia)) {      $x7  = $idProvincia;       }else{$x7  = $rowprov['idProvincia'];}
            if(isset($idDistrito)) {       $x8  = $idDistrito;        }else{$x8  = $rowdist['idDistrito'];}
			if(isset($Direccion)) {        $x9  = $Direccion;         }else{$x9  = $rowdata['Direccion'];}
			if(isset($idSistema)) {        $x10 = $idSistema;         }else{$x10 = $rowdata['idSistema'];}
			if(isset($Fono1)) {            $x11 = $Fono1;             }else{$x11 = $rowdata['Fono1'];}
			if(isset($Fono2)) {            $x12 = $Fono2;             }else{$x12 = $rowdata['Fono2'];}
			if(isset($email)) {            $x13 = $email;             }else{$x13 = $rowdata['email'];}
			if(isset($idUsuario)) {        $x14 = $idUsuario;         }else{$x14 = $rowdata['idUsuario'];}

			//se dibujan los inputs
			echo '<h3>Datos Basicos</h3>';
			echo form_select('Tipo de Almacen','idTipo', $x1, 2, 'idTipo', 'Nombre', 'clientes_tipos', 0, $dbConn);
			echo form_input('text', 'Nombres', 'Nombre', $x2, 2);
			echo form_input_icon('text', 'DNI', 'Rut', $x3, 2,'fa fa-exclamation-triangle');
			echo form_date('F Nacimiento','fNacimiento', $x4, 1);
			echo form_input('text', 'Rubro', 'Rubro', $x5, 2);
			echo form_select_depend2('Departamento','idDepartamento', $x6, 2, 'idDepartamento', 'Nombre', 'ubicacion_departamento', 0,
									'Provincia','idProvincia', $x7, 2, 'idProvincia', 'idDepartamento', 'Nombre', 'ubicacion_provincia', 0, 
									'Distrito','idDistrito', $x8, 2, 'idDistrito', 'idProvincia', 'Nombre', 'ubicacion_distrito', 0,
									 $dbConn);
			echo form_input_icon('text', 'Direccion', 'Direccion', $x9, 2,'fa fa-map');	 
			if($arrUsuario['tipo']=='SuperAdmin'){
			echo form_select('Sistema','idSistema', $x10, 2, 'idSistema', 'Nombre', 'core_sistemas', 0, $dbConn);
			}else{
			echo '<input type="hidden" name="idSistema"   value="'.$arrUsuario['idSistema'].' ">';
			}
			
			echo '<h3>Datos de contacto</h3>';
			echo form_input_phone('Telefono Fijo', 'Fono1', $x11, 1);
			echo form_input_phone('Telefono Movil', 'Fono2', $x12, 1);
			echo form_input_icon('text', 'Email', 'email', $x13, 1,'fa fa-envelope-o');
			
			echo '<h3>Vendedor Asignado</h3>';
			echo form_select('Vendedores','idUsuario', $x14, 2, 'idUsuario', 'Nombre', 'usuarios_listado', 'tipo="Vendedor"', $dbConn);
			
			echo '<input type="hidden" name="idEstado"   value="1" >';	

			?>
          
			<div class="form-group">
            	<input type="hidden" name="idCliente" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Almacen</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($idTipo)) {           $x1  = $idTipo;            }else{$x1  = '';}
			if(isset($Nombre)) {           $x2  = $Nombre;            }else{$x2  = '';}
			if(isset($Rut)) {              $x3  = $Rut;               }else{$x3  = '';}
            if(isset($fNacimiento)) {      $x4  = $fNacimiento;       }else{$x4  = '';}
            if(isset($Rubro)) {            $x5  = $Rubro;             }else{$x5  = '';}
            if(isset($idDepartamento)) {   $x6  = $idDepartamento;    }else{$x6  = '';}
            if(isset($idProvincia)) {      $x7  = $idProvincia;       }else{$x7  = '';}
            if(isset($idDistrito)) {       $x8  = $idDistrito;        }else{$x8  = '';}
			if(isset($Direccion)) {        $x9  = $Direccion;         }else{$x9  = '';}
			if(isset($idSistema)) {        $x10 = $idSistema;         }else{$x10 = '';}
			if(isset($Fono1)) {            $x11 = $Fono1;             }else{$x11 = '';}
			if(isset($Fono2)) {            $x12 = $Fono2;             }else{$x12 = '';}
			if(isset($email)) {            $x13 = $email;             }else{$x13 = '';}
			if(isset($idUsuario)) {        $x14 = $idUsuario;         }else{$x14 = '';}

			//se dibujan los inputs
			echo '<h3>Datos Basicos</h3>';
			echo form_select('Tipo de Almacen','idTipo', $x1, 2, 'idTipo', 'Nombre', 'clientes_tipos', 0, $dbConn);
			echo form_input('text', 'Nombres', 'Nombre', $x2, 2);
			echo form_input_icon('text', 'DNI', 'Rut', $x3, 2,'fa fa-exclamation-triangle');
			echo form_date('F Nacimiento','fNacimiento', $x4, 1);
			echo form_input('text', 'Rubro', 'Rubro', $x5, 2);
			echo form_select_depend2('Departamento','idDepartamento', $x6, 2, 'idDepartamento', 'Nombre', 'ubicacion_departamento', 0,
									'Provincia','idProvincia', $x7, 2, 'idProvincia', 'idDepartamento', 'Nombre', 'ubicacion_provincia', 0, 
									'Distrito','idDistrito', $x8, 2, 'idDistrito', 'idProvincia', 'Nombre', 'ubicacion_distrito', 0,
									 $dbConn);			 
			echo form_input_icon('text', 'Direccion', 'Direccion', $x9, 2,'fa fa-map');	 
			if($arrUsuario['tipo']=='SuperAdmin'){
			echo form_select('Sistema','idSistema', $x10, 2, 'idSistema', 'Nombre', 'core_sistemas', 0, $dbConn);
			}else{
			echo '<input type="hidden" name="idSistema"   value="'.$arrUsuario['idSistema'].'">';
			}
			
			echo '<h3>Datos de contacto</h3>';
			echo form_input_phone('Telefono Fijo', 'Fono1', $x11, 1);
			echo form_input_phone('Telefono Movil', 'Fono2', $x12, 1);
			echo form_input_icon('text', 'Email', 'email', $x13, 1,'fa fa-envelope-o');
			
			echo '<h3>Vendedor Asignado</h3>';
			echo form_select('Vendedores','idUsuario', $x14, 2, 'idUsuario', 'Nombre', 'usuarios_listado', 'tipo="Vendedor"', $dbConn);

			echo '<input type="hidden" name="idEstado"   value="1" >';		 
			?>        
   
			<div class="form-group">
				<input type="submit" class="btn btn-primary fright margin_width" value="Guardar" name="submit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
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
			if(isset($rango_a)) {                $x2  = $rango_a;                }else{$x2  = '';}
            if(isset($rango_b)) {                $x3  = $rango_b;                }else{$x3  = '';}
			if(isset($idEstado)) {               $x5  = $idEstado;               }else{$x5  = '';}
			
			
			//se dibujan los inputs
			echo form_input('text', 'Nombres', 'Nombre', $x1, 1);
			echo form_date('F Nacimiento inicio','rango_a', $x2, 1);
			echo form_date('F Nacimiento termino','rango_b', $x3, 1);
			echo form_select('Estado Almacen','idEstado', $x5, 1, 'idEstado', 'Nombre', 'clientes_estado', 0, $dbConn);
			
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
if (!$num_pag){
	$comienzo = 0 ;$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//verifico que sea un administrador
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE clientes_listado.idSistema>=0";	
}else{
	$z="WHERE clientes_listado.idSistema={$arrUsuario['idSistema']}";	
}	
//Verifico si la variable de busqueda existe
if(isset($_GET['search']) && $_GET['search'] != ''){                         $z .= " AND clientes_listado.Rut LIKE '%{$_GET['search']}%'";}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')  {                       $z .= " AND clientes_listado.Nombre LIKE '%{$_GET['Nombre']}%' " ;}
if(isset($_GET['idEstado']) && $_GET['idEstado'] != '')  {                   $z .= " AND clientes_listado.idEstado = '".$_GET['idEstado']."'" ;}
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')  {                   $z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ;}
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')  {                   $z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ;}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND clientes_listado.fNacimiento BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;
}

//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT clientes_listado.idCliente FROM `clientes_listado` ".$z."";
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
clientes_estado.Nombre AS estado,
core_sistemas.Nombre AS sistema
FROM `clientes_listado`
LEFT JOIN `clientes_estado`   ON clientes_estado.idEstado       = clientes_listado.idEstado
LEFT JOIN `core_sistemas`     ON core_sistemas.idSistema        = clientes_listado.idSistema
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
<label class="control-label col-lg-4">Buscar Almacen</label>
    <div class="col-lg-5">	<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >		
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="DNI">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <a href="<?php echo $location; ?>&fullsearch=true" class="t_search_button_full" ><i class="fa fa-search-plus"></i></a>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
           </div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Almacen</a><?php }?>
</div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Almacenes</h5>	
		</header>
        
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th width="209">DNI</th>
				<th>Nombre del Almacenero</th>
				<th width="160">Sistema</th>
				<th width="120">Estado</th>
				<th width="120">Acciones</th>
			</tr>
		</thead>
		<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">		
			<td><?php echo $usuarios['Rut']; ?></td>		
			<td><?php echo $usuarios['Nombre']; ?></td>		
			<td><?php echo $usuarios['sistema']; ?></td>
            <td><?php echo $usuarios['estado']; ?></td>		
			<td>
<?php if ($rowlevel['level']>=1){?><a href="<?php echo 'view_cliente.php?view='.$usuarios['idCliente']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>   
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$usuarios['idCliente']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$usuarios['idCliente'];?>			
<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?>		
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
