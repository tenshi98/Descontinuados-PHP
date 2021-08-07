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
$rowlevel['nombre_categoria'] = '';
$original = "core_usr_admin.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                       $location .= "&search=".$_GET['search'] ; 	}
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'usuario,password,repassword,Nombre,Rut';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idUsuario,Nombre,Rut';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/usuarios_listado.php';	
}
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Administracion de SuperUsuarios</title>
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
            <i class="fa fa-dashboard"></i> Administracion de SuperUsuarios
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
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT usuario,  email, Nombre, Rut, fNacimiento, Direccion, Fono, Ciudad, Comuna
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
			if(isset($Nombre)) {          $x1  = $Nombre;        }else{$x1  = $rowdata['Nombre'];}
			if(isset($Fono)) {            $x2  = $Fono;          }else{$x2  = $rowdata['Fono'];}
			if(isset($email)) {           $x3  = $email;         }else{$x3  = $rowdata['email'];}
			if(isset($Rut)) {             $x4  = $Rut;           }else{$x4  = $rowdata['Rut'];}
			if(isset($fNacimiento)) {     $x5  = $fNacimiento;   }else{$x5  = $rowdata['fNacimiento'];}
			if(isset($Ciudad)) {          $x6  = $Ciudad;        }else{$x6  = $rowdata['Ciudad'];}
			if(isset($Comuna)) {          $x7  = $Comuna;        }else{$x7  = $rowdata['Comuna'];}
			if(isset($Direccion)) {       $x8  = $Direccion;     }else{$x8  = $rowdata['Direccion'];}
		
			//se dibujan los inputs
			echo form_input('text', 'Nombre', 'Nombre', $x1, 2);
			echo form_input_phone('Fono', 'Fono', $x2, 1);
			echo form_input_icon('text', 'Email', 'email', $x3, 1,'fa fa-envelope-o');
			echo form_input_icon('text', 'Rut', 'Rut', $x4, 2,'fa fa-exclamation-triangle');
			echo form_date('Fecha de Nacimiento','fNacimiento', $x5, 1);
			echo form_input_icon('text', 'Ciudad', 'Ciudad', $x6, 1,'fa fa-map');	
            echo form_input_icon('text', 'Comuna', 'Comuna', $x7, 1,'fa fa-map');	
            echo form_input_icon('text', 'Direccion', 'Direccion', $x8, 1,'fa fa-map');
            
			?>

			<div class="form-group">
            	<input type="hidden" name="idUsuario" value="<?php echo $_GET['id']; ?>" >
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
			<h5>Crear Nuevo Usuario</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        	
			<?php 
			//Se verifican si existen los datos
			if(isset($usuario)) {         $x1  = $usuario;       }else{$x1  = '';}
			if(isset($password)) {        $x2  = $password;      }else{$x2  = '';}
			if(isset($repassword)) {      $x3  = $repassword;    }else{$x3  = '';}
			if(isset($Nombre)) {          $x4  = $Nombre;        }else{$x4  = '';}
			if(isset($Fono)) {            $x5  = $Fono;          }else{$x5  = '';}
			if(isset($email)) {           $x6  = $email;         }else{$x6  = '';}
			if(isset($Rut)) {             $x7  = $Rut;           }else{$x7  = '';}
			if(isset($fNacimiento)) {     $x8  = $fNacimiento;   }else{$x8  = '';}
			if(isset($Ciudad)) {          $x9  = $Ciudad;        }else{$x9  = '';}
			if(isset($Comuna)) {          $x10 = $Comuna;        }else{$x10 = '';}
			if(isset($Direccion)) {       $x11 = $Direccion;     }else{$x11 = '';}
		
			//se dibujan los inputs
			echo form_input('text', 'Usuario', 'usuario', $x1, 2);
			echo form_input('password', 'Password', 'password', $x2, 2);
			echo form_input('password', 'Repetir Password', 'repassword', $x3, 2);
			echo form_input('text', 'Nombre', 'Nombre', $x1, 2);
			echo form_input_phone('Fono', 'Fono', $x2, 1);
			echo form_input_icon('text', 'Email', 'email', $x3, 1,'fa fa-envelope-o');
			echo form_input_icon('text', 'Rut', 'Rut', $x4, 2,'fa fa-exclamation-triangle');
			echo form_date('Fecha de Nacimiento','fNacimiento', $x5, 1);
			echo form_input_icon('text', 'Ciudad', 'Ciudad', $x6, 1,'fa fa-map');	
            echo form_input_icon('text', 'Comuna', 'Comuna', $x7, 1,'fa fa-map');	
            echo form_input_icon('text', 'Direccion', 'Direccion', $x8, 1,'fa fa-map');
			?>

			<div class="form-group">
            	<input type="hidden" value="1" name="idEstado">
                <input type="hidden" value="SuperAdmin" name="tipo">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
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
usuarios_listado.usuario, 
usuarios_listado.tipo, 
usuarios_listado.email, 
usuarios_listado.Nombre, 
usuarios_listado.Rut, 
usuarios_listado.fNacimiento, 
usuarios_listado.Direccion, 
usuarios_listado.Fono, 
usuarios_listado.Ciudad, 
usuarios_listado.Comuna,
usuarios_listado.Ultimo_acceso,
usuarios_listado.Direccion_img,
usuarios_estado.Nombre AS estado
FROM `usuarios_listado`
LEFT JOIN `usuarios_estado`  ON usuarios_estado.idEstado   = usuarios_listado.idEstado
WHERE idUsuario = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
//Traigo un listado con todos sus accesos de sistema	
$arrAccess = array();
$query = "SELECT  Fecha, Hora
FROM `usuarios_accesos`
WHERE idUsuario = {$_GET['view']}
ORDER BY idAcceso DESC
LIMIT 13 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAccess,$row );
}
?>
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div>
			<h5>Datos</h5>
			<div class="toolbar"></div>
			<ul class="nav nav-tabs pull-right">
				<li class="active"><a href="#basicos" data-toggle="tab">Datos</a></li>
				<li class=""><a href="#ingresos" data-toggle="tab">Ingresos</a></li>
			</ul>	
		</header>
        <div id="div-3" class="tab-content">
			
			<div class="tab-pane fade active in" id="basicos">
				<div class="wmd-panel">
					
					<div class="col-lg-4">
						<?php if ($rowdata['Direccion_img']=='') { ?>
							<img style="margin-top:10px;" class="media-object img-thumbnail user-img width100" alt="User Picture" src="img/usr.png">
						<?php }else{  ?>
							<img style="margin-top:10px;" class="media-object img-thumbnail user-img width100" alt="User Picture" src="upload/<?php echo $arrUsuario['Direccion_img']; ?>">
						<?php }?>
					</div>
					<div class="col-lg-8">
						<h2 class="text-primary">Datos del Perfil</h2>
						<p class="text-muted"><strong>Usuario : </strong><?php echo $rowdata['usuario']; ?></p>
						<p class="text-muted"><strong>Tipo de usuario : </strong><?php echo $rowdata['tipo']; ?></p>
						<p class="text-muted"><strong>Estado : </strong><?php echo $rowdata['estado']; ?></p>
						<p class="text-muted"><strong>Ultimo Acceso : </strong><?php echo $rowdata['Ultimo_acceso']; ?></p>
						
						<h2 class="text-primary">Datos Personales</h2>
						<p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombre']; ?></p>
						<p class="text-muted"><strong>Fono : </strong><?php echo $rowdata['Fono']; ?></p>
						<p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
						<p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
						<p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['fNacimiento']); ?></p>
						<p class="text-muted"><strong>Ciudad : </strong><?php echo $rowdata['Ciudad']; ?></p>
						<p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['Comuna']; ?></p>
						<p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Direccion']; ?></p>
					</div>	
					<div class="clearfix"></div>
			
				</div>
			</div>
			
			<div class="tab-pane fade" id="ingresos">
				<div class="wmd-panel">
					
					<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
						<thead>
							<tr role="row">
								<th width="209">Fecha</th>
								<th width="472">Hora</th>
							</tr>
						</thead>
						<tbody role="alert" aria-live="polite" aria-relevant="all">
							<?php foreach ($arrAccess as $accesos) { ?>
								<tr class="odd">		
									<td><?php echo $accesos['Fecha']; ?></td>		
									<td><?php echo $accesos['Hora']; ?></td>	
								</tr>
							<?php } ?>                    
						</tbody>
					</table>
			
				</div>
			</div>
			
			
			
			
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
//Variable con la ubicacion
	$z="WHERE usuarios_listado.tipo='SuperAdmin'";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z.=" AND usuarios_listado.Nombre LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idUsuario FROM `usuarios_listado` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
usuarios_listado.idUsuario,
usuarios_listado.usuario,
usuarios_listado.tipo, 
usuarios_listado.Nombre,
usuarios_listado.Ultimo_acceso,
usuarios_estado.Nombre AS estado
FROM `usuarios_listado`
LEFT JOIN `usuarios_estado`  ON usuarios_estado.idEstado   = usuarios_listado.idEstado
".$z."
ORDER BY usuarios_listado.tipo ASC, usuarios_listado.usuario ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Usuario</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Usuario</a>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Usuarios</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Usuario</th>
        <th>Nombre del usuario</th>
        <th>Ultimo acceso</th>
        <th>Tipo Usuario</th>
        <th>Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td><?php echo $usuarios['usuario']; ?></td>
			<td><?php echo $usuarios['Nombre']; ?></td>
            <td><?php echo $usuarios['Ultimo_acceso']; ?></td>
			<td><?php echo $usuarios['tipo']; ?></td>
			<td><?php echo $usuarios['estado']; ?></td>
			<td>
            <a href="<?php echo $location.'&view='.$usuarios['idUsuario']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>
            <a href="<?php echo $location.'&id='.$usuarios['idUsuario']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a>
            <?php $ubicacion=$location.'&del='.$usuarios['idUsuario'];?>
				<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>
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
