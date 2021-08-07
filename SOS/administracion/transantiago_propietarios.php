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
$original = "transantiago_propietarios.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != '') {                        $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '') {                        $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '') {    $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '') {    $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '') {                            $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '') {                    $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '') {                    $location .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['Empresa']) && $_GET['Empresa'] != '') {                      $location .= "&Empresa=".$_GET['Empresa'] ; }
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
	$form_obligatorios = '';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/transantiago_propietarios.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/transantiago_propietarios.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/transantiago_propietarios.php';	
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Propietario creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Propietario editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Propietario borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>			
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT   Nombre, Apellido_Paterno, Apellido_Materno, Rut, Sexo, fNacimiento, email, Pais, idCiudad, idComuna, Direccion, Fono1, Fono2, NombreEmpresa
FROM `transantiago_propietarios`
WHERE idPropietario = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos del Propietario</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($Nombre)) {              $x1  = $Nombre;             }else{$x1  = $rowdata['Nombre'];}
            if(isset($Apellido_Paterno)) {    $x2  = $Apellido_Paterno;   }else{$x2  = $rowdata['Apellido_Paterno'];}
            if(isset($Apellido_Materno)) {    $x3  = $Apellido_Materno;   }else{$x3  = $rowdata['Apellido_Materno'];}
			if(isset($Sexo)) {                $x4  = $Sexo;               }else{$x4  = $rowdata['Sexo'];}
			if(isset($Fono1)) {               $x5  = $Fono1;              }else{$x5  = $rowdata['Fono1'];}
            if(isset($Fono2)) {               $x6  = $Fono2;              }else{$x6  = $rowdata['Fono2'];}
			if(isset($email)) {               $x7  = $email;              }else{$x7  = $rowdata['email'];}
			if(isset($Rut)) {                 $x8  = $Rut;                }else{$x8  = $rowdata['Rut'];}
			if(isset($fNacimiento)) {         $x9  = $fNacimiento;        }else{$x9  = $rowdata['fNacimiento'];}
			if(isset($idCiudad)) {            $x10 = $idCiudad;           }else{$x10 = $rowdata['idCiudad'];}	
			if(isset($idComuna)) {            $x11 = $idComuna;           }else{$x11 = $rowdata['idComuna'];}
			if(isset($Direccion)) {           $x12 = $Direccion;          }else{$x12 = $rowdata['Direccion'];}
			if(isset($idTipoCliente)) {       $x13 = $idTipoCliente;      }else{$x13 = $rowdata['idTipoCliente'];}
			if(isset($NombreEmpresa)) {       $x13 = $NombreEmpresa;      }else{$x13 = $rowdata['NombreEmpresa'];}
			
			//se dibujan los inputs
			echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
			echo form_input('text', 'Apellido Paterno', 'Apellido_Paterno', $x2, 2);
			echo form_input('text', 'Apellido Materno', 'Apellido_Materno', $x3, 2);
			echo form_select('Sexo','Sexo', $x4, 2, 'Inicial', 'Nombre', 'clientes_sexo', 0, $dbConn);
			echo form_input('text', 'Telefono Fijo', 'Fono1', $x5, 1);
			echo form_input('text', 'Telefono Movil', 'Fono2', $x6, 1);
			echo form_input('text', 'Email', 'email', $x7, 2);
			echo form_input('text', 'Rut', 'Rut', $x8, 2);
			echo form_date('F Nacimiento','fNacimiento', $x9, 2);
			echo form_select_depend1('Ciudad','idCiudad', $x10, 1, 'idCiudad', 'Nombre', 'mnt_ubicacion_ciudad', 0,
									'Comuna','idComuna', $x11, 1, 'idComuna', 'idCiudad', 'Nombre', 'mnt_ubicacion_comunas', 0, 
									 $dbConn);
			echo form_input('text', 'Direccion', 'Direccion', $x12, 2);	 
			echo form_input('text', 'Nombre de la Empresa', 'NombreEmpresa', $x13, 2);	
			?>
			
			<div class="form-group">
            	<input type="hidden" name="idPropietario" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
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
			<h5>Crear Nuevo Propietario</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			
			<?php 
			//Se verifican si existen los datos
			if(isset($Nombre)) {              $x1  = $Nombre;             }else{$x1  = '';}
            if(isset($Apellido_Paterno)) {    $x2  = $Apellido_Paterno;   }else{$x2  = '';}
            if(isset($Apellido_Materno)) {    $x3  = $Apellido_Materno;   }else{$x3  = '';}
			if(isset($Sexo)) {                $x4  = $Sexo;               }else{$x4  = '';}
			if(isset($Fono1)) {               $x5  = $Fono1;              }else{$x5  = '';}
            if(isset($Fono2)) {               $x6  = $Fono2;              }else{$x6  = '';}
			if(isset($email)) {               $x7  = $email;              }else{$x7  = '';}
			if(isset($Rut)) {                 $x8  = $Rut;                }else{$x8  = '';}
			if(isset($fNacimiento)) {         $x9  = $fNacimiento;        }else{$x9  = '';}
			if(isset($idCiudad)) {            $x10 = $idCiudad;           }else{$x10 = '';}
			if(isset($idComuna)) {            $x11 = $idComuna;           }else{$x11 = '';}
			if(isset($Direccion)) {           $x12 = $Direccion;          }else{$x12 = '';}
			if(isset($idTipoCliente)) {       $x13 = $idTipoCliente;      }else{$x13 = '';}
			if(isset($NombreEmpresa)) {       $x13 = $NombreEmpresa;      }else{$x13 = '';}
			
			//se dibujan los inputs
			echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
			echo form_input('text', 'Apellido Paterno', 'Apellido_Paterno', $x2, 2);
			echo form_input('text', 'Apellido Materno', 'Apellido_Materno', $x3, 2);
			echo form_select('Sexo','Sexo', $x4, 2, 'Inicial', 'Nombre', 'clientes_sexo', 0, $dbConn);
			echo form_input('text', 'Telefono Fijo', 'Fono1', $x5, 1);
			echo form_input('text', 'Telefono Movil', 'Fono2', $x6, 1);
			echo form_input('text', 'Email', 'email', $x7, 2);
			echo form_input('text', 'Rut', 'Rut', $x8, 2);
			echo form_date('F Nacimiento','fNacimiento', $x9, 2);
			echo form_select_depend1('Ciudad','idCiudad', $x10, 1, 'idCiudad', 'Nombre', 'mnt_ubicacion_ciudad', 0,
									'Comuna','idComuna', $x11, 1, 'idComuna', 'idCiudad', 'Nombre', 'mnt_ubicacion_comunas', 0, 
									 $dbConn);
			echo form_input('text', 'Direccion', 'Direccion', $x12, 2);	 
			echo form_input('text', 'Nombre de la Empresa', 'NombreEmpresa', $x13, 2);	
			?>

			<div class="form-group">
                <input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="fcreacion">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
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
		<form class="form-horizontal" action="<?php echo $location ?>" name="form1" >
			
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
			if(isset($NombreEmpresa)) {          $x10 = $NombreEmpresa;          }else{$x10 = '';}
			
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
			echo form_input('text', 'Nombre de la Empresa', 'NombreEmpresa', $x10, 1);			 
			?> 
            
			<div class="form-group">
            	<input type="hidden"  value="<?php echo $_GET['pagina'] ?>" name="pagina">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="filtrar">		
			</div>
                      
			</form> 
                    
		</div>
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
//Le agrego condiciones a la consulta
$z="WHERE transantiago_propietarios.idPropietario > 0";	
//Bloque de filtros
$x = '';
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){        $z .= " AND transantiago_propietarios.Rut LIKE '%{$_GET['search']}%'";}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')  {       $z .= " AND transantiago_propietarios.Nombre LIKE '%{$_GET['Nombre']}%' " ;}
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')  {           $z .= " AND transantiago_propietarios.Sexo = '".$_GET['Sexo']."'" ;}
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')  {   $z .= " AND transantiago_propietarios.idCiudad = '".$_GET['idCiudad']."'" ;}
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')  {   $z .= " AND transantiago_propietarios.idComuna = '".$_GET['idComuna']."'" ;}
if(isset($_GET['Empresa']) && $_GET['Empresa'] != '')  {     $z .= " AND transantiago_propietarios.NombreEmpresa LIKE '%{$_GET['Empresa']}%' " ;}
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')  { 
	$z .= " AND transantiago_propietarios.Apellido_Paterno LIKE '%{$_GET['Apellido_Paterno']}%' " ;
}
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')  { 
	$z .= " AND transantiago_propietarios.Apellido_Materno LIKE '%{$_GET['Apellido_Materno']}%' " ;
}
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ 
	$z .= " AND transantiago_propietarios.fNacimiento BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;        
}
//Realizo una consulta para saber el total de elementos existentes
$query1 = "SELECT idPropietario FROM `transantiago_propietarios` ".$z."";
$registros1 = mysql_query($query1,$dbConn);
$cuenta_registros = mysql_num_rows($registros1);

//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
transantiago_propietarios.idPropietario,
transantiago_propietarios.Rut,
transantiago_propietarios.Nombre,
transantiago_propietarios.Apellido_Paterno,
transantiago_propietarios.Apellido_Materno,
transantiago_propietarios.email,
transantiago_propietarios.NombreEmpresa
FROM `transantiago_propietarios`
".$z."
ORDER BY transantiago_propietarios.Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Propietario</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Rut">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
			<a href="<?php echo $location; ?>&fullsearch=true" class="t_search_button_full" ><i class="fa fa-search-plus"></i></a>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Propietario</a><?php }?>
</div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Propietarios</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="209">Rut</th>
        <th>Nombre Dueño</th>
		<th>Nombre Empresa</th>
        <th>email</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['Rut']; ?></td>
			<td><?php echo $usuarios['Nombre'].' '.$usuarios['Apellido_Paterno'].' '.$usuarios['Apellido_Materno']; ?></td>
			<td><?php echo $usuarios['NombreEmpresa']; ?></td>
            <td><?php echo $usuarios['email']; ?></td>
			<td>
				<?php if ($rowlevel['level']>=1){?><a href="<?php echo 'view_tran_propietario.php?view='.$usuarios['idPropietario']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>   
				<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$usuarios['idPropietario']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
				<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$usuarios['idPropietario'];?>
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