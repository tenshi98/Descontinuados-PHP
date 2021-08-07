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
	$form_obligatorios = 'Nombre,Rubro,Rut,Ciudad,Comuna,Direccion,NombreContrato,NContrato,FContrato,DContrato,idTheme,Bodega_OT';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/core_sistemas.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idSistema,Nombre,Rubro,Rut,Ciudad,Comuna,Direccion,NombreContrato,NContrato,FContrato,DContrato,idTheme,Bodega_OT';
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
$query = "SELECT Nombre, email_principal, Rut, Direccion, Fono, Ciudad, Comuna, idTheme, Fax, Web, Rubro, Contacto, NombreContrato,NContrato,FContrato,DContrato, Bodega_OT, idRubro
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
				if(isset($Rubro)) {            $x3  = $Rubro;            }else{$x3  = $rowdata['Rubro'];}
				if(isset($Rut)) {              $x4  = $Rut;              }else{$x4  = $rowdata['Rut'];}
				if(isset($Ciudad)) {           $x5  = $Ciudad;           }else{$x5  = $rowdata['Ciudad'];}
				if(isset($Comuna)) {           $x6  = $Comuna;           }else{$x6  = $rowdata['Comuna'];}
				if(isset($Direccion)) {        $x7  = $Direccion;        }else{$x7  = $rowdata['Direccion'];}
				if(isset($Contacto)) {         $x8  = $Contacto;         }else{$x8  = $rowdata['Contacto'];}
				if(isset($Fono)) {             $x9  = $Fono;             }else{$x9  = $rowdata['Fono'];}
				if(isset($Fax)) {              $x10 = $Fax;              }else{$x10 = $rowdata['Fax'];}
				if(isset($Web)) {              $x11 = $Web;              }else{$x11 = $rowdata['Web'];}
				if(isset($email_principal)) {  $x12 = $email_principal;  }else{$x12 = $rowdata['email_principal'];}
				if(isset($NombreContrato)) {   $x13 = $NombreContrato;   }else{$x13 = $rowdata['NombreContrato'];}
				if(isset($NContrato)) {        $x14 = $NContrato;        }else{$x14 = $rowdata['NContrato'];}
				if(isset($FContrato)) {        $x15 = $FContrato;        }else{$x15 = $rowdata['FContrato'];}
				if(isset($DContrato)) {        $x16 = $DContrato;        }else{$x16 = $rowdata['DContrato'];}
				if(isset($Bodega_OT)) {        $x17 = $Bodega_OT;        }else{$x17 = $rowdata['Bodega_OT'];}
				if(isset($idTheme)) {          $x18 = $idTheme;          }else{$x18 = $rowdata['idTheme'];}
				if(isset($idRubro)) {          $x19 = $idRubro;          }else{$x19 = $rowdata['idRubro'];}
	
				//se dibujan los inputs
				echo '<h3>Datos Basicos</h3>';
				echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
				echo form_input('text', 'Rubro', 'Rubro', $x3, 2);
				echo form_input_icon('text', 'Rut', 'Rut', $x4, 2,'fa fa-exclamation-triangle');
				echo form_input_icon('text', 'Ciudad', 'Ciudad', $x5, 2,'fa fa-map');	
				echo form_input_icon('text', 'Comuna', 'Comuna', $x6, 2,'fa fa-map');	
				echo form_input_icon('text', 'Direccion', 'Direccion', $x7, 2,'fa fa-map');
            
				
				echo '<h3>Datos de contacto</h3>';
				echo form_input('text', 'Nombre Contacto', 'Contacto', $x8, 1);
				echo form_input_phone('Fono', 'Fono', $x9, 1);
				echo form_input_fax('Fax', 'Fax', $x10, 1);
				echo form_input_icon('text', 'Web', 'Web', $x11, 1,'fa fa-internet-explorer');
				echo form_input_icon('text', 'Email', 'email_principal', $x12, 1,'fa fa-envelope-o');
			
			
				
				echo '<h3>Contrato</h3>';
				echo form_input('text', 'Nombre Contrato', 'NombreContrato', $x13, 2);
				echo form_input('text', 'Numero de Contrato', 'NContrato', $x14, 2);
				echo form_date('Fecha inicio Contrato','FContrato', $x15, 2);
				echo form_select_n_auto('Duracion Contrato(Meses)','DContrato', $x16, 2, 1, 72);
				
				echo '<h3>Bodega para las Ordenes de Trabajo</h3>';
				echo form_select('Bodega','Bodega_OT', $x17, 2, 'idBodega', 'Nombre', 'bodegas_listado', $z, $dbConn);
				
				echo '<h3>Tema</h3>';
				echo form_select('Tema','idTheme', $x18, 2, 'idTheme', 'Nombre', 'core_theme_colors', 0, $dbConn);
				
				echo '<h3>Rubro Giro</h3>';
				echo form_select('Rubro Giro','idRubro', $x19, 2, 'idRubro', 'Nombre', 'core_sistemas_rubro', 0, $dbConn);				
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
				if(isset($Rubro)) {            $x3  = $Rubro;            }else{$x3  = '';}
				if(isset($Rut)) {              $x4  = $Rut;              }else{$x4  = '';}
				if(isset($Ciudad)) {           $x5  = $Ciudad;           }else{$x5  = '';}
				if(isset($Comuna)) {           $x6  = $Comuna;           }else{$x6  = '';}
				if(isset($Direccion)) {        $x7  = $Direccion;        }else{$x7  = '';}
				if(isset($Contacto)) {         $x8  = $Contacto;         }else{$x8  = '';}
				if(isset($Fono)) {             $x9  = $Fono;             }else{$x9  = '';}
				if(isset($Fax)) {              $x10 = $Fax;              }else{$x10 = '';}
				if(isset($Web)) {              $x11 = $Web;              }else{$x11 = '';}
				if(isset($email_principal)) {  $x12 = $email_principal;  }else{$x12 = '';}
				if(isset($NombreContrato)) {   $x13 = $NombreContrato;   }else{$x13 = '';}
				if(isset($NContrato)) {        $x14 = $NContrato;        }else{$x14 = '';}
				if(isset($FContrato)) {        $x15 = $FContrato;        }else{$x15 = '';}
				if(isset($DContrato)) {        $x16 = $DContrato;        }else{$x16 = '';}
				if(isset($Bodega_OT)) {        $x17 = $Bodega_OT;        }else{$x17 = '';}
				if(isset($idTheme)) {          $x18 = $idTheme;          }else{$x18 = '';}
				if(isset($idRubro)) {          $x19 = $idRubro;          }else{$x19 = '';}

				//se dibujan los inputs
				echo '<h3>Datos Basicos</h3>';
				echo form_input('text', 'Nombres', 'Nombre', $x1, 2);
				echo form_input('text', 'Rubro', 'Rubro', $x3, 2);
				echo form_input_icon('text', 'Rut', 'Rut', $x4, 2,'fa fa-exclamation-triangle');
				echo form_input_icon('text', 'Ciudad', 'Ciudad', $x5, 2,'fa fa-map');	
				echo form_input_icon('text', 'Comuna', 'Comuna', $x6, 2,'fa fa-map');	
				echo form_input_icon('text', 'Direccion', 'Direccion', $x7, 2,'fa fa-map');
            
				
				echo '<h3>Datos de contacto</h3>';
				echo form_input('text', 'Nombre Contacto', 'Contacto', $x8, 1);
				echo form_input_phone('Fono', 'Fono', $x9, 1);
				echo form_input_fax('Fax', 'Fax', $x10, 1);
				echo form_input_icon('text', 'Web', 'Web', $x11, 1,'fa fa-internet-explorer');
				echo form_input_icon('text', 'Email', 'email_principal', $x12, 1,'fa fa-envelope-o');
				
				echo '<h3>Contrato</h3>';
				echo form_input('text', 'Nombre Contrato', 'NombreContrato', $x13, 2);
				echo form_input('text', 'Numero de Contrato', 'NContrato', $x14, 2);
				echo form_date('Fecha inicio Contrato','FContrato', $x15, 2);
				echo form_select_n_auto('Duracion Contrato(Meses)','DContrato', $x16, 2, 1, 72);
				
				echo '<h3>Bodega para las Ordenes de Trabajo</h3>';
				echo form_select('Bodega','Bodega_OT', $x17, 2, 'idBodega', 'Nombre', 'bodegas_listado', $z, $dbConn);
				
				echo '<h3>Tema</h3>';
				echo form_select('Tema','idTheme', $x18, 2, 'idTheme', 'Nombre', 'core_theme_colors', 0, $dbConn);
				
				echo '<h3>Rubro Giro</h3>';
				echo form_select('Rubro Giro','idRubro', $x19, 2, 'idRubro', 'Nombre', 'core_sistemas_rubro', 0, $dbConn);				
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
				<th>Nombre Empresa</th>
				<th>Rut</th>
				<th>Email</th>
				<th width="120">Acciones</th>
			</tr>
		</thead>
						 
		<tbody role="alert" aria-live="polite" aria-relevant="all">
		<?php foreach ($arrTipoCliente as $tipo) { ?>
			<tr class="odd">
				<td><?php echo $tipo['Nombre']; ?></td>
				<td><?php echo $tipo['Rut']; ?></td>
				<td><?php echo $tipo['email_principal']; ?></td>
				<td>
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
