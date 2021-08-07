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
/*                                          Se filtran las entradas para evitar ataques                                           */
/**********************************************************************************************************************************/
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once '../AA2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$rowlevel['nombre_categoria'] = '';
$original = "core_sistemas.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                       $location .= "&search=".$_GET['search'] ; 	}
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Nombre,Rut,Ciudad,Comuna,Direccion,idTheme';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/core_sistemas.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idSistema,Nombre,Rut,Ciudad,Comuna,Direccion,idTheme';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/core_sistemas.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/core_sistemas.php';	
}
//formulario para editar
if ( !empty($_POST['submit_img']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'submit_img';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/core_sistemas.php';
}
//se borra un dato
if ( !empty($_GET['del_img']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del_img';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/core_sistemas.php';	
}

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Empresas</title>
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
            <i class="fa fa-dashboard"></i> Sistemas
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Empresa creada correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Empresa editada correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Empresa borrada correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo notifications_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['img_id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT imgLogo, Nombre
FROM `core_sistemas`
WHERE idSistema = {$_GET['img_id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado); ?>
 
 
    
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion Logo de la Empresa <?php echo $rowdata['Nombre']; ?></h5>
		</header>
		<div id="div-1" class="body">
        <?php if(isset($rowdata['imgLogo'])&&$rowdata['imgLogo']!=''){?>
        
			<div class="col-lg-10 fcenter">
			  <img src="upload/<?php echo $rowdata['imgLogo'] ?>" width="100%" > 
			</div> 
			<a href="<?php echo $location.'&del_img='.$_GET['img_id']; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Borrar Imagen</a>
			<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
			<div class="clearfix"></div>
			
        <?php }else{?>

			<form class="form-horizontal" method="post" enctype="multipart/form-data">
			
				<?php 
				//Se verifican si existen los datos
				if(isset($Nombre)) {              $x1  = $Nombre;             }else{$x1  = '';}
				
				//se dibujan los inputs
				echo form_input_file('Seleccionar archivo','imgLogo');
				?> 

				<div class="form-group">
					<input type="hidden" name="idSistema" value="<?php echo $_GET['img_id']; ?>">
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_img"> 
					<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
				</div>
                      
			</form> 
           <?php }?>       
                  
                    
		</div>
	</div>
</div>     
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} elseif ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT Nombre,Rut,Ciudad,Comuna,Direccion,Contacto,Fono,Fax,Web,email_principal,idTheme
FROM `core_sistemas`
WHERE idSistema = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
//verifico el tipo de usuario
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="idSistema>=0";	
}else{
	$z="idSistema={$arrUsuario['idSistema']}";	
}	?> 
<div class="col-lg-9 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion de la Empresa</h5>
		</header>
		<div id="div-1" class="body">
			<form class="form-horizontal" method="post">

				<?php 
			
				//Se verifican si existen los datos
				if(isset($Nombre)) {           $x1  = $Nombre;           }else{$x1  = $rowdata['Nombre'];}
				if(isset($Rut)) {              $x2  = $Rut;              }else{$x2  = $rowdata['Rut'];}
				if(isset($Ciudad)) {           $x3  = $Ciudad;           }else{$x3  = $rowdata['Ciudad'];}
				if(isset($Comuna)) {           $x4  = $Comuna;           }else{$x4  = $rowdata['Comuna'];}
				if(isset($Direccion)) {        $x5  = $Direccion;        }else{$x5  = $rowdata['Direccion'];}
				if(isset($Contacto)) {         $x6  = $Contacto;         }else{$x6  = $rowdata['Contacto'];}
				if(isset($Fono)) {             $x7  = $Fono;             }else{$x7  = $rowdata['Fono'];}
				if(isset($Fax)) {              $x8  = $Fax;              }else{$x8  = $rowdata['Fax'];}
				if(isset($Web)) {              $x9  = $Web;              }else{$x9  = $rowdata['Web'];}
				if(isset($email_principal)) {  $x10 = $email_principal;  }else{$x10 = $rowdata['email_principal'];}
				if(isset($idTheme)) {          $x11 = $idTheme;          }else{$x11 = $rowdata['idTheme'];}
	
				//se dibujan los inputs
				echo '<h3>Datos Basicos</h3>';
				echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
				echo form_input_icon('text', 'Rut', 'Rut', $x2, 2,'fa fa-exclamation-triangle');
				echo form_input_icon('text', 'Ciudad', 'Ciudad', $x3, 2,'fa fa-map');	
				echo form_input_icon('text', 'Comuna', 'Comuna', $x4, 2,'fa fa-map');	
				echo form_input_icon('text', 'Direccion', 'Direccion', $x5, 2,'fa fa-map');            
				
				echo '<h3>Datos de contacto</h3>';
				echo form_input('text', 'Nombre Contacto', 'Contacto', $x6, 1);
				echo form_input_phone('Fono', 'Fono', $x7, 1);
				echo form_input_fax('Fax', 'Fax', $x8, 1);
				echo form_input_icon('text', 'Web', 'Web', $x9, 1,'fa fa-internet-explorer');
				echo form_input_icon('text', 'Email', 'email_principal', $x10, 1,'fa fa-envelope-o');
				
				echo '<h3>Tema</h3>';
				echo form_select('Tema','idTheme', $x11, 2, 'idTheme', 'Nombre', 'core_theme_colors', 0, $dbConn);
						
				?>

				<div class="form-group">
					<input type="hidden" name="idSistema" value="<?php echo $_GET['id']; ?>"  >
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
					<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
				</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
//verifico el tipo de usuario
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="idSistema>=0";	
}else{
	$z="idSistema={$arrUsuario['idSistema']}";	
}	 
?>
 <div class="col-lg-9 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nueva Empresa</h5>
		</header>
		<div id="div-1" class="body">
			<form class="form-horizontal" method="post">

				<?php 
				//Se verifican si existen los datos
				if(isset($Nombre)) {           $x1  = $Nombre;           }else{$x1  = '';}
				if(isset($Rut)) {              $x2  = $Rut;              }else{$x2  = '';}
				if(isset($Ciudad)) {           $x3  = $Ciudad;           }else{$x3  = '';}
				if(isset($Comuna)) {           $x4  = $Comuna;           }else{$x4  = '';}
				if(isset($Direccion)) {        $x5  = $Direccion;        }else{$x5  = '';}
				if(isset($Contacto)) {         $x6  = $Contacto;         }else{$x6  = '';}
				if(isset($Fono)) {             $x7  = $Fono;             }else{$x7  = '';}
				if(isset($Fax)) {              $x8  = $Fax;              }else{$x8  = '';}
				if(isset($Web)) {              $x9  = $Web;              }else{$x9  = '';}
				if(isset($email_principal)) {  $x10 = $email_principal;  }else{$x10 = '';}
				if(isset($idTheme)) {          $x11 = $idTheme;          }else{$x11 = '';}
	
				//se dibujan los inputs
				echo '<h3>Datos Basicos</h3>';
				echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
				echo form_input_icon('text', 'Rut', 'Rut', $x2, 2,'fa fa-exclamation-triangle');
				echo form_input_icon('text', 'Ciudad', 'Ciudad', $x3, 2,'fa fa-map');	
				echo form_input_icon('text', 'Comuna', 'Comuna', $x4, 2,'fa fa-map');	
				echo form_input_icon('text', 'Direccion', 'Direccion', $x5, 2,'fa fa-map');            
				
				echo '<h3>Datos de contacto</h3>';
				echo form_input('text', 'Nombre Contacto', 'Contacto', $x6, 1);
				echo form_input_phone('Fono', 'Fono', $x7, 1);
				echo form_input_fax('Fax', 'Fax', $x8, 1);
				echo form_input_icon('text', 'Web', 'Web', $x9, 1,'fa fa-internet-explorer');
				echo form_input_icon('text', 'Email', 'email_principal', $x10, 1,'fa fa-envelope-o');
				
				echo '<h3>Tema</h3>';
				echo form_select('Tema','idTheme', $x11, 2, 'idTheme', 'Nombre', 'core_theme_colors', 0, $dbConn);
						
				?>
	 
				<div class="form-group">
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
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
//Creo la variable con la ubicacion
	$z="WHERE idSistema!=0 ";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z .=" AND Nombre LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idSistema FROM `core_sistemas` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae u listado con todos los tipos de sistema
$arrTipoCliente = array();
$query = "SELECT idSistema,Nombre, email_principal, Rut
FROM `core_sistemas`
".$z."
ORDER BY Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipoCliente,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Empresas</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onClick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nueva Empresa</a>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Empresas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th class="word_break">Nombre Empresa</th>
				<th>Rut</th>
				<th>Email</th>
				<th width="160">Acciones</th>
			</tr>
		</thead>
						 
		<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php foreach ($arrTipoCliente as $tipo) { ?>
			<tr class="odd">
				<td class="word_break"><?php echo $tipo['Nombre']; ?></td>
				<td><?php echo $tipo['Rut']; ?></td>
				<td><?php echo $tipo['email_principal']; ?></td>
				<td>
					<a href="<?php echo 'view_sistema.php?view='.$tipo['idSistema']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>
					<a href="<?php echo $location.'&id='.$tipo['idSistema']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a>
					<a href="<?php echo $location.'&img_id='.$tipo['idSistema']; ?>" title="Editar Imagen" class="icon-editar-img info-tooltip"></a>
					<?php $ubicacion=$location.'&del='.$tipo['idSistema'];?>
					<a onClick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>
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
