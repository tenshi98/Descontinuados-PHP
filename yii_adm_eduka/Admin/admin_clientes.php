<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/esUsuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/web_carga_usuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_configuracion/sesion_usuario.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/funciones.php';
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/componentes.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "admin_clientes.php";
$location = $original;
//Se consiguen las variables de busqueda y paginacion
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
//Verifico los permisos del usuario sobre la transaccion
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Nombre,email,Rut,fNacimiento,idSistema';
	$form_trabajo= 'update';
	require_once '../XRXS_2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
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
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
	<link href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css" rel="stylesheet" type="text/css">
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
	<link rel="icon" type="image/png" href="src_img/mifavicon.png" />
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
              	<?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?>
					<img src="img_upload/<?php echo $arrUsuario['imgLogo']; ?>" alt="">
				<?php }else{?>
					<img src="src_img/logo_default.png" alt="">
				<?php } ?>
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
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT usuario,  email, Nombre, Rut, fNacimiento, Direccion, Fono, Ciudad, Comuna, idSistema
FROM `usuarios_listado`
WHERE idUsuario = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos del Usuario</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        	
			<?php 
			//Se verifican si existen los datos
            if(isset($Nombre)) {        $x5  = $Nombre;       }else{$x5  = $rowdata['Nombre'];}
            if(isset($Fono)) {          $x6  = $Fono;         }else{$x6  = $rowdata['Fono'];}
            if(isset($email)) {         $x7  = $email;        }else{$x7  = $rowdata['email'];}
            if(isset($Rut)) {           $x8  = $Rut;          }else{$x8  = $rowdata['Rut'];}
            if(isset($fNacimiento)) {   $x9  = $fNacimiento;  }else{$x9  = $rowdata['fNacimiento'];}
            if(isset($Ciudad)) {        $x10 = $Ciudad;       }else{$x10 = $rowdata['Ciudad'];}
            if(isset($Comuna)) {        $x11 = $Comuna;       }else{$x11 = $rowdata['Comuna'];}
            if(isset($Direccion)) {     $x12 = $Direccion;    }else{$x12 = $rowdata['Direccion'];}
			if(isset($idSistema)) {     $x13 = $idSistema;    }else{$x13 = $rowdata['idSistema'];}
            
			//se dibujan los inputs
            echo form_input('text', 'Nombre', 'Nombre', $x5, 2); 
            echo form_input('text', 'Fono', 'Fono', $x6, 1); 
            echo form_input('text', 'Email', 'email', $x7, 2);
            echo form_input('text', 'Rut', 'Rut', $x8, 2);
            echo form_date('Fecha de Nacimiento','fNacimiento', $x9, 2); 
            echo form_input('text', 'Ciudad', 'Ciudad', $x10, 1);
            echo form_input('text', 'Comuna', 'Comuna', $x11, 1);
            echo form_input('text', 'Direccion', 'Direccion', $x12, 1);
			if($arrUsuario['tipo']=='SuperAdmin'){
			echo form_select('Sistema','idSistema', $x13, 2, 'idSistema', 'Nombre', 'core_sistemas', 0, $dbConn);
			}else{
			echo '<input type="hidden" name="idSistema"   value="'.$arrUsuario['idSistema'].' ">';
			}
			?> 
            
			<div class="form-group">
            	<input type="hidden" name="idUsuario" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
 // Se traen todos los datos de mi usuario
$query = "SELECT 
clientes_listado.idCliente,
clientes_listado.usuario,
clientes_listado.email,
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
clientes_listado.Apellido_Materno,
clientes_listado.Rut,
clientes_listado.Sexo,
clientes_listado.fNacimiento,
clientes_listado.Direccion,
clientes_listado.Fono1,
clientes_listado.Fono2,
clientes_listado.CtaCte,

clientes_listado.social_Facebook,
clientes_listado.social_Twitter,
clientes_listado.social_Googleplus,
clientes_listado.social_Linked,
clientes_listado.social_Pinterest,
clientes_listado.social_Flickr,
clientes_listado.social_Tumblr,
clientes_listado.social_Skype,
clientes_listado.social_Instagram,
clientes_listado.social_Dribble,
clientes_listado.social_Youtube,
clientes_listado.social_Vimeo,


clientes_tipos.Nombre AS tipo_cliente,
mnt_ubicacion_pais.Nombre AS pais,
mnt_ubicacion_ciudad.Nombre AS ciudad,
mnt_ubicacion_comunas.Nombre AS comuna,
clientes_tipo_cuentas.Nombre AS tipo_cuenta

FROM `clientes_listado`
LEFT JOIN `clientes_tipos`           ON clientes_tipos.idTipoCliente           = clientes_listado.idTipoCliente
LEFT JOIN `mnt_ubicacion_pais`       ON mnt_ubicacion_pais.idPais              = clientes_listado.idPais
LEFT JOIN `mnt_ubicacion_ciudad`     ON mnt_ubicacion_ciudad.idCiudad          = clientes_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`    ON mnt_ubicacion_comunas.idComuna         = clientes_listado.idComuna
LEFT JOIN `clientes_tipo_cuentas`    ON clientes_tipo_cuentas.idTipoCuenta     = clientes_listado.idTipoCuenta


WHERE idCliente = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);

// Se trae un listado con todas las observaciones el cliente
$arrCursos = array();
$query = "SELECT 
productos_listado.idProducto,
productos_listado.Titulo,
productos_categorias.Nombre AS categoria,
productos_subcategorias.Nombre AS subcategoria,
productos_estado.Nombre AS estado

FROM `productos_listado`
LEFT JOIN `productos_categorias`      ON productos_categorias.idCategoria           = productos_listado.idCategoria
LEFT JOIN `productos_subcategorias`   ON productos_subcategorias.idSubcategoria     = productos_listado.idSubcategoria
LEFT JOIN `productos_estado`          ON productos_estado.idEstado                  = productos_listado.idEstado

WHERE productos_listado.idCliente = {$_GET['view']}
ORDER BY productos_listado.idProducto ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCursos,$row );
}

?>

<div class="col-lg-4">
	<div class="box">
		<header>
			<h5>Ver Datos del Cliente</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Datos Basicos</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombre'].' '.$rowdata['Apellido_Paterno'].' '.$rowdata['Apellido_Materno']; ?></p>
            <p class="text-muted"><strong>Fono 1 : </strong><?php echo $rowdata['Fono1']; ?></p>
			<p class="text-muted"><strong>Fono 2 : </strong><?php echo $rowdata['Fono2']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
			<p class="text-muted"><strong>Sexo : </strong><?php echo $rowdata['Sexo']; ?></p>
            <p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['fNacimiento']); ?></p>
            <p class="text-muted"><strong>Pais : </strong><?php echo $rowdata['pais']; ?></p>
			<p class="text-muted"><strong>Ciudad : </strong><?php echo $rowdata['ciudad']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['comuna']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Direccion']; ?></p>
            <p class="text-muted"><strong>Cuenta : </strong><?php echo $rowdata['tipo_cuenta'].' '.$rowdata['CtaCte']; ?></p>
                        
            <h2 class="text-primary">Perfil de cliente</h2>
            <p class="text-muted"><strong>Usuario : </strong><?php echo $rowdata['usuario']; ?></p>
            <p class="text-muted"><strong>Tipo de usuario : </strong><?php echo $rowdata['tipo_cliente']; ?></p>

        </div>
	</div>
</div>

<div class="col-lg-4">
	<div class="box">
		<header>
			<h5>Redes sociales</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Redes sociales</h2>
            <p class="text-muted"><strong>Facebook : </strong><?php echo $rowdata['social_Facebook']; ?></p>
			<p class="text-muted"><strong>Twitter : </strong><?php echo $rowdata['social_Twitter']; ?></p>
            <p class="text-muted"><strong>Google plus : </strong><?php echo $rowdata['social_Googleplus']; ?></p>
            <p class="text-muted"><strong>Linked : </strong><?php echo $rowdata['social_Linked']; ?></p>
			<p class="text-muted"><strong>Pinterest : </strong><?php echo $rowdata['social_Pinterest']; ?></p>
            <p class="text-muted"><strong>Flickr : </strong><?php echo $rowdata['social_Flickr']; ?></p>
			<p class="text-muted"><strong>Tumblr : </strong><?php echo $rowdata['social_Tumblr']; ?></p>
            <p class="text-muted"><strong>Skype : </strong><?php echo $rowdata['social_Skype']; ?></p>
            <p class="text-muted"><strong>Instagram : </strong><?php echo $rowdata['social_Instagram']; ?></p>
			<p class="text-muted"><strong>Dribble : </strong><?php echo $rowdata['social_Dribble']; ?></p>
			<p class="text-muted"><strong>Youtube : </strong><?php echo $rowdata['social_Youtube']; ?></p>
			<p class="text-muted"><strong>Vimeo : </strong><?php echo $rowdata['social_Vimeo']; ?></p>
            
        </div>
	</div>
</div>
 


<div class="clearfix"></div>
                                
<div class="col-lg-12">
	<div class="box">
		<header>
<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Cursos Creados</h5>
		</header>
        
 
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Titulo</th>
        <th>Categoria</th>
		<th>Bubcategoria</th>
        <th>Estado</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrCursos as $cursos) { ?>
    	<tr class="odd">
			<td><?php echo $cursos['Titulo']; ?></td>
            <td><?php echo $cursos['categoria']; ?></td>
			<td><?php echo $cursos['subcategoria']; ?></td>
			<td><?php echo $cursos['estado']; ?></td>
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
//Inicio del paginador
//Defino la cantidad total de elementos por pagina
$cant_reg = 30;
//Identifico el numero de pagina
if(isset($_GET["pagina"])){$num_pag = $_GET["pagina"];	} else {$num_pag = 1;	}
//Se crea el paginador
if (!$num_pag){$comienzo = 0 ;$num_pag = 1 ;} else {$comienzo = ( $num_pag - 1 ) * $cant_reg ;}

//Variable con la ubicacion
	$z="WHERE clientes_listado.idCliente!=0";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z.=" AND clientes_listado.Apellido_Paterno LIKE '%{$_GET['search']}%' ";	
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
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
clientes_tipos.Nombre AS tipo_cliente

FROM `clientes_listado`
LEFT JOIN `clientes_tipos`   ON clientes_tipos.idTipoCliente     = clientes_listado.idTipoCliente
".$z."
ORDER BY clientes_listado.Apellido_Paterno ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar por Apellido</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Apellido">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
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
        <th>Nombre del cliente</th>
        <th width="160">Tipo Usuario</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['Nombre'].' '.$usuarios['Apellido_Paterno']; ?></td>
			<td><?php echo $usuarios['tipo_cliente']; ?></td>
			<td>
<?php if ($rowlevel['level_editar']==1){?><a href="<?php echo $location.'&id='.$usuarios['idCliente']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php } ?>
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
    <script src="assets/js/main.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
      $(function() {
        dashboard();
      });
    </script>
 
  </body>
<!-- InstanceEnd --></html>