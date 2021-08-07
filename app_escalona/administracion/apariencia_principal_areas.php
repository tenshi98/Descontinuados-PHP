<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 1);
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
$original = "apariencia_principal_areas.php";
$location = $original;
//Se agregan ubicaciones
$location .='?app_conf='.$_GET['app_conf'];
if(isset($_GET['view']) && $_GET['view'] != ''){                           $location .= "&view=".$_GET['view'] ; 	}
if(isset($_GET['viewgrilla']) && $_GET['viewgrilla'] != ''){               $location .= "&viewgrilla=".$_GET['viewgrilla'] ; 	}
if(isset($_GET['tipo']) && $_GET['tipo'] != ''){                           $location .= "&tipo=".$_GET['tipo'] ; 	}
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Nombre';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_pagelist.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idPagelist,Nombre';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_pagelist.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_pagelist.php';	
}







//formulario para crear
if ( !empty($_POST['submit_grilla']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'Nombre,Codigo,Margen';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_listado.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit_grilla']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idArea,Nombre,Codigo,Margen';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_listado.php';
}
//se borra un dato
if ( !empty($_GET['del_grilla']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_listado.php';	
}
//se edita un dato
if ( !empty($_GET['up_grilla']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'up_grilla';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_listado.php';	
}
//se edita un dato
if ( !empty($_GET['down_grilla']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'down_grilla';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_listado.php';	
}



//formulario para crear
if ( !empty($_POST['submit_elemento']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_elementos.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit_elemento']) )  { 
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_elementos.php';
}
//se borra un dato
if ( !empty($_GET['del_elemento']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_elementos.php';	
}
//se edita un dato
if ( !empty($_GET['up_elemento']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'up_elemento';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_elementos.php';	
}
//se edita un dato
if ( !empty($_GET['down_elemento']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'down_elemento';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/app_areas_elementos.php';	
}



?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Personalizar interfaz de la app</title>
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
    <link rel="stylesheet" href="assets/css/theme.css">
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
<link rel="stylesheet" href="app_demo/css/estilo.css">
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
                <img src="img/logo_sm.png" alt="">
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
            <i class="fa fa-dashboard"></i> Personalizar interfaz de la app		<!-- InstanceEndEditable --> </h3>
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Datos creado correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Datos editado correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Datos borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de la pagina
$query = "SELECT  Nombre
FROM `app_areas_pagelist`
WHERE idPagelist = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">	
		<header>		
			<div class="icons"><i class="fa fa-edit"></i></div>		
			<h5>Modificacion datos de la pagina</h5>	
		</header>	
		<div id="div-1" class="body">	
			<form class="form-horizontal" method="post">		
				
				<?php 
				//Se verifican si existen los datos
				if(isset($Nombre)) {         $x1  = $Nombre;         }else{$x1  = $rowdata['Nombre'];}

				//se dibujan los inputs
				echo form_input('text', 'Nombre', 'Nombre', $x1, 2);
				?>

									  
				<div class="form-group">
					<input type="hidden" value="<?php echo $_GET['id']; ?>" name="idPagelist">			
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
					<?php			
					//Verifico si existe la variable de busqueda y pagina 			
					$location = $original;?>			
					<a href="<?php echo $location.'?app_conf='.$_GET['app_conf']; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>		
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
			<h5>Crear Nueva Pagina</h5>	
		</header>	
		<div id="div-1" class="body">	
			<form class="form-horizontal" method="post">
				
				<?php 
				//Se verifican si existen los datos
				if(isset($Nombre)) {         $x1  = $Nombre;         }else{$x1  = '';}

				//se dibujan los inputs
				echo form_input('text', 'Nombre', 'Nombre', $x1, 2);
				?>
									  
				<div class="form-group">
					<input type="hidden" name="app_conf" value="<?php echo $_GET['app_conf'] ?>" >			
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
					<?php			
					//Verifico si existe la variable de busqueda y pagina 			
					$location = $original;?>			
					<a href="<?php echo $location.'?app_conf='.$_GET['app_conf']; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>		
				</div>
			</form> 
		</div>
	</div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['edittbgrid']) ) { 
//Obtengo la ubicacion del ultimo elemento
$query = "SELECT  Nombre, grid_color, grid_border, grid_shadow, body_col, body_fil, url_img, grid_img
FROM `app_areas_elementos`
WHERE idElementos = {$_GET['edittbgrid']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado); 
 ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">	
		<header>		
			<div class="icons"><i class="fa fa-edit"></i></div>		
			<h5>Editar elemento</h5>	
		</header>	
		<div id="div-1" class="body">	
			<form class="form-horizontal" method="post">
            	
				<?php if ($_GET['tipo']=='tb_1-2'or$_GET['tipo']=='tb_1-3'or$_GET['tipo']=='tb_1-4'or$_GET['tipo']=='tb_1-5' ){ 
					//Se verifican si existen los datos
					if(isset($Nombre)) {        $x1  = $Nombre;        }else{$x1  = $rowdata['Nombre'];}
					if(isset($grid_color)) {    $x2  = $grid_color;    }else{$x2  = $rowdata['grid_color'];}
					if(isset($grid_border)) {   $x3  = $grid_border;   }else{$x3  = $rowdata['grid_border'];}
					if(isset($grid_shadow)) {   $x4  = $grid_shadow;   }else{$x4  = $rowdata['grid_shadow'];}
					if(isset($body_col)) {      $x5  = $body_col;      }else{$x5  = $rowdata['body_col'];}
					if(isset($body_fil)) {      $x6  = $body_fil;      }else{$x6  = $rowdata['body_fil'];}
					if(isset($url_img)) {       $x7  = $url_img;       }else{$x7  = $rowdata['url_img'];}
					if(isset($grid_img)) {      $x8  = $grid_img;      }else{$x8  = $rowdata['grid_img'];}

					//se dibujan los inputs
					echo form_input('text', 'Nombre del boton', 'Nombre', $x1, 2);
					echo form_select_class('Color del boton','grid_color', $x2, 2, 'Codigo','Codigo', 'Nombre', 'app_ajustes_tipo', 'idGrupo=27', $dbConn);
					echo form_select('Bordes redondeados','grid_border', $x3, 2, 'Codigo', 'Nombre', 'app_ajustes_tipo', 'idGrupo=26', $dbConn);
					echo form_select('Sombras','grid_shadow', $x4, 2, 'Codigo', 'Nombre', 'app_ajustes_tipo', 'idGrupo=31', $dbConn);
					echo form_select_n_auto('Columnas','body_col', $x5, 2, 1, 5);
					echo form_select_n_auto('Filas','body_fil', $x6, 2, 1, 5);
					echo form_input('text', 'Url de la imagen', 'url_img', $x7, 2);
					echo form_select('Ancho de la imagen','grid_img', $x8, 2, 'Codigo', 'Nombre', 'app_ajustes_tipo', 'idGrupo=24', $dbConn);
				
				}elseif($_GET['tipo']=='tb_img'){ 
					//Se verifican si existen los datos
					if(isset($Nombre)) {        $x1  = $Nombre;        }else{$x1  = $rowdata['Nombre'];}
					if(isset($url_img)) {       $x2  = $url_img;       }else{$x2  = $rowdata['url_img'];}
					
					//se dibujan los inputs
					echo form_input('text', 'Nombre de la imagen', 'Nombre', $x1, 2);
					echo form_input('text', 'Url de la imagen', 'url_img', $x2, 2);
				
				}elseif($_GET['tipo']=='tb_menu_sup'){ 
				}elseif($_GET['tipo']=='subtitle fancy'or$_GET['tipo']=='headline1'or$_GET['tipo']=='headline2'or$_GET['tipo']=='headline3'){		
					//Se verifican si existen los datos
					if(isset($Nombre)) {        $x1  = $Nombre;        }else{$x1  = $rowdata['Nombre'];}
					
					//se dibujan los inputs
					echo form_input('text', 'Texto del titulo', 'Nombre', $x1, 2);

				}?>

				<div class="form-group">
					<input type="hidden"  name="idElementos"  value="<?php echo $_GET['edittbgrid'] ?>" >			
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit_elemento">		
					<a href="<?php echo $location ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>		
				</div>

			</form> 
		</div>
	</div>
</div>  

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['newtbgrid']) ) { 
//Obtengo la ubicacion del ultimo elemento
$query = "SELECT  Orden
FROM `app_areas_elementos`
WHERE idArea = {$_GET['viewgrilla']}
ORDER BY Orden DESC
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
$nuevo_valor = $row_data['Orden']+1; ?>
 <div class="col-lg-6 fcenter">
	 <div class="box dark">	
		 <header>		
			 <div class="icons"><i class="fa fa-edit"></i></div>		
			 <h5>Crear Nuevo elemento</h5>	
		 </header>	
		 <div id="div-1" class="body">	
			<form class="form-horizontal" method="post">
            	
				<?php if ($_GET['tipo']=='tb_1-2'or$_GET['tipo']=='tb_1-3'or$_GET['tipo']=='tb_1-4'or$_GET['tipo']=='tb_1-5' ){ 
					//Se verifican si existen los datos
					if(isset($Nombre)) {        $x1  = $Nombre;        }else{$x1  = '';}
					if(isset($grid_color)) {    $x2  = $grid_color;    }else{$x2  = '';}
					if(isset($grid_border)) {   $x3  = $grid_border;   }else{$x3  = '';}
					if(isset($grid_shadow)) {   $x4  = $grid_shadow;   }else{$x4  = '';}
					if(isset($body_col)) {      $x5  = $body_col;      }else{$x5  = '';}
					if(isset($body_fil)) {      $x6  = $body_fil;      }else{$x6  = '';}
					if(isset($url_img)) {       $x7  = $url_img;       }else{$x7  = '';}
					if(isset($grid_img)) {      $x8  = $grid_img;      }else{$x8  = '';}

					//se dibujan los inputs
					echo form_input('text', 'Nombre del boton', 'Nombre', $x1, 2);
					echo form_select_class('Color del boton','grid_color', $x2, 2, 'Codigo','Codigo', 'Nombre', 'app_ajustes_tipo', 'idGrupo=27', $dbConn);
					echo form_select('Bordes redondeados','grid_border', $x3, 2, 'Codigo', 'Nombre', 'app_ajustes_tipo', 'idGrupo=26', $dbConn);
					echo form_select('Sombras','grid_shadow', $x4, 2, 'Codigo', 'Nombre', 'app_ajustes_tipo', 'idGrupo=31', $dbConn);
					echo form_select_n_auto('Columnas','body_col', $x5, 2, 1, 5);
					echo form_select_n_auto('Filas','body_fil', $x6, 2, 1, 5);
					echo form_input('text', 'Url de la imagen', 'url_img', $x7, 2);
					echo form_select('Ancho de la imagen','grid_img', $x8, 2, 'Codigo', 'Nombre', 'app_ajustes_tipo', 'idGrupo=24', $dbConn);
					echo form_input_hidden('Tipo_elemento', 'boton');
				
				}elseif($_GET['tipo']=='tb_img'){ 
					//Se verifican si existen los datos
					if(isset($Nombre)) {        $x1  = $Nombre;        }else{$x1  = '';}
					if(isset($url_img)) {       $x2  = $url_img;       }else{$x2  = '';}
					
					//se dibujan los inputs
					echo form_input('text', 'Nombre de la imagen', 'Nombre', $x1, 2);
					echo form_input('text', 'Url de la imagen', 'url_img', $x2, 2);
				
				}elseif($_GET['tipo']=='tb_menu_sup'){ 
				}elseif($_GET['tipo']=='subtitle fancy'or$_GET['tipo']=='headline1'or$_GET['tipo']=='headline2'or$_GET['tipo']=='headline3'){		
					//Se verifican si existen los datos
					if(isset($Nombre)) {        $x1  = $Nombre;        }else{$x1  = '';}
					
					//se dibujan los inputs
					echo form_input('text', 'Texto del titulo', 'Nombre', $x1, 2);

				}?>

				<div class="form-group">
					<input type="hidden"  name="Orden"       value="<?php echo $nuevo_valor ?>" >
					<input type="hidden"  name="idArea"      value="<?php echo $_GET['viewgrilla'] ?>" >
					<input type="hidden"  name="idPagelist"  value="<?php echo $_GET['view'] ?>" >			
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_elemento">			
					<a href="<?php echo $location ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>		
				</div>
			</form> 
		</div>
	</div>
</div>      
 
 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['viewgrilla']) ) { 
// Se trae un listado con todos los elementos de la grilla
$arrElementos = array();
$query = "SELECT   idElementos, Nombre, Orden
FROM `app_areas_elementos`
WHERE idArea = {$_GET['viewgrilla']}
ORDER BY Orden ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrElementos,$row );
}
//Obtengo la ubicacion de la ultima grilla de la pagina
$query = "SELECT  Orden
FROM `app_areas_elementos`
WHERE idArea = {$_GET['viewgrilla']}
ORDER BY Orden DESC
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado); 
?>

<div class="form-group" style="margin-top:15px;">
<a href="<?php echo $location ?>&newtbgrid=true" class="btn btn-default fright margin_width" >Crear Nuevo elemento</a>
</div>
<div class="clearfix"></div>
<div class="col-lg-8">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion de los elementos de la grilla</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
		<tr role="row">
			<th width="">Nombre</th>
			<th width="160">Acciones</th>
		</tr>
	</thead>
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php $grill = 1;foreach ($arrElementos as $elementos) { ?>
    	<tr class="odd">		
			<td><?php echo $elementos['Nombre']; ?></td>		
			<td>
				<?php if($grill!=1){?> 			
					<a href="<?php echo $location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&up_elemento='.$elementos['idElementos'].'&orden='.$elementos['Orden'].'&app_conf='.$_GET['app_conf']; ?>" title="Subir un nivel" class="icon-up info-tooltip"></a>
				<?php } else {?>
					<a href="#" title="Subir un nivel" class="icon-up info-tooltip"></a>
				<?php } ?> 
				<?php if($elementos['Orden']!=$row_data['Orden']){?>     
					<a href="<?php echo $location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&down_elemento='.$elementos['idElementos'].'&orden='.$elementos['Orden'].'&app_conf='.$_GET['app_conf']; ?>" title="Bajar un nivel" class="icon-down info-tooltip"></a>
				<?php } else {?>			
				<a href="#" title="Bajar un nivel" class="icon-down info-tooltip"></a>		
				<?php } ?>
					<a href="<?php echo $location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&edittbgrid='.$elementos['idElementos'].'&app_conf='.$_GET['app_conf']; ?>" title="Editar informacion" class="icon-editar info-tooltip"></a>
					<?php $ubicacion=$location.'?view='.$_GET['view'].'&viewgrilla='.$_GET['viewgrilla'].'&tipo='.$_GET['tipo'].'&del_elemento='.$elementos['idElementos'].'&app_conf='.$_GET['app_conf'];?>			
					<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>
			</td>	
		</tr>
      <?php $grill++;  ?>
    <?php } ?>                    
	</tbody>
</table>  
</div>
</div>
        
<div class="col-lg-4">
	<div class="box">	
		<header>		
			<h5>Preview</h5>		
			<div class="toolbar"></div>	
		</header>
		<div class="body">
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_8.php?viewgrilla=<?php echo $_GET['viewgrilla'].'&app_conf='.$_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div> 
 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_areas.php?view=<?php echo $_GET['view'].'&app_conf='.$_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['edit_grilla']) ) {	 
// Se traen todos los datos de la pagina
$query = "SELECT  Nombre, Codigo, Margen
FROM `app_areas_listado`
WHERE idArea = {$_GET['edit_grilla']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">	
		<header>		
			<div class="icons"><i class="fa fa-edit"></i></div>		
			<h5>Modificacion datos de la Grilla</h5>	
		</header>	
		<div id="div-1" class="body">	
			<form class="form-horizontal" method="post">		
				
				<?php
				//Se verifican si existen los datos
				if(isset($Nombre)) {        $x1  = $Nombre;        }else{$x1  = $rowdata['Nombre'];}
				if(isset($Codigo)) {        $x2  = $Codigo;        }else{$x2  = $rowdata['Codigo'];}
				if(isset($Margen)) {        $x3  = $Margen;        }else{$x3  = $rowdata['Margen'];}
				
				//se dibujan los inputs
				echo form_input('text', 'Nombre', 'Nombre', $x1, 2);
				echo form_select('Tipo de Grilla','Codigo', $x2, 2, 'Codigo', 'Nombre', 'app_grilla', 0, $dbConn);
				echo form_select('Tipo de margen','Margen', $x3, 2, 'Codigo', 'Nombre', 'app_ajustes_tipo', 'idGrupo=38', $dbConn);
				?>

				<div class="form-group">
					<input type="hidden" name="idArea" value="<?php echo $_GET['edit_grilla']; ?>" >			
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit_grilla"> 
					<?php			
					//Verifico si existe la variable de busqueda y pagina 			
					$location = $original;?>			
					<a href="<?php echo $location.'?view='.$_GET['view'].'&app_conf='.$_GET['app_conf']; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>		
				</div>
			</form> 
		</div>
	</div>
</div>	 
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new_grilla']) ) {
//Obtengo la ubicacion de la ultima grilla de la pagina
$query = "SELECT  Orden
FROM `app_areas_listado`
WHERE idPagelist = {$_GET['view']}
ORDER BY Orden DESC
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
$nuevo_valor = $row_data['Orden']+1;
	 
?>
<div class="col-lg-6 fcenter">
	<div class="box dark">	
		<header>		
			<div class="icons"><i class="fa fa-edit"></i></div>		
			<h5>Crear Nueva Grilla</h5>	
		</header>	
		<div id="div-1" class="body">	
			<form class="form-horizontal" method="post">
			
				<?php
				//Se verifican si existen los datos
				if(isset($Nombre)) {        $x1  = $Nombre;        }else{$x1  = '';}
				if(isset($grid_color)) {    $x2  = $grid_color;    }else{$x2  = '';}
				if(isset($grid_border)) {   $x3  = $grid_border;   }else{$x3  = '';}
				
				//se dibujan los inputs
				echo form_input('text', 'Nombre', 'Nombre', $x1, 2);
				echo form_select('Tipo de Grilla','Codigo', $x2, 2, 'Codigo', 'Nombre', 'app_grilla', 0, $dbConn);
				echo form_select('Tipo de margen','Margen', $x3, 2, 'Codigo', 'Nombre', 'app_ajustes_tipo', 'idGrupo=38', $dbConn);
				?>			  

				<div class="form-group">
					<input type="hidden"  name="Orden"       value="<?php echo $nuevo_valor ?>" >
					<input type="hidden"  name="idPagelist"  value="<?php echo $_GET['view'] ?>" >			
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_grilla">
					<?php			
					//Verifico si existe la variable de busqueda y pagina 			
					$location = $original;?>			
					<a href="<?php echo $location.'?view='.$_GET['view'].'&app_conf='.$_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>		
				</div>
			</form> 
		</div>
	</div>
</div>  
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// Se trae un listado con todos los colores de los botones
$arrGrilla = array();
$query = "SELECT  
app_areas_listado.idArea, 
app_areas_listado.Nombre, 
app_areas_listado.Orden, 
app_areas_listado.Codigo AS Tipo,
app_grilla.Nombre AS Codigo
FROM `app_areas_listado`
LEFT JOIN `app_grilla` ON app_grilla.Codigo = app_areas_listado.Codigo
WHERE idPagelist = {$_GET['view']}
ORDER BY Orden ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrilla,$row );
}
//Obtengo la ubicacion de la ultima grilla de la pagina
$query = "SELECT  Orden
FROM `app_areas_listado`
WHERE idPagelist = {$_GET['view']}
ORDER BY Orden DESC
LIMIT 1";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
?>
<div class="form-group" style="margin-top:15px;">
<a href="<?php echo $location; ?>&new_grilla=true" class="btn btn-default fright margin_width" >Crear Nueva Grilla</a>
</div>
<div class="clearfix"></div>

<div class="col-lg-8">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Modificacion de la Grilla</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
		<tr role="row">
			<th width="">Nombre</th>
			<th width="">Tipo</th>
			<th width="180">Acciones</th>
		</tr>
	</thead>
    <tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php $grill = 1;foreach ($arrGrilla as $grilla) { ?>
    	<tr class="odd">		
			<td><?php echo $grilla['Nombre']; ?></td>
			<td><?php echo $grilla['Codigo']; ?></td>		
			<td>
			<a href="<?php echo $location.'&viewgrilla='.$grilla['idArea'].'&tipo='.$grilla['Tipo']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a> 
			
			<?php if($grill!=1){?> 			
				<a href="<?php echo $location.'&up_grilla='.$grilla['idArea'].'&orden='.$grilla['Orden']; ?>" title="Subir un nivel" class="icon-up info-tooltip"></a>
			<?php } else {?>
				<a href="#" title="Subir un nivel" class="icon-up info-tooltip"></a>
			<?php } ?> 
			
			<?php if($grilla['Orden']!=$row_data['Orden']){?>     
				<a href="<?php echo $location.'&down_grilla='.$grilla['idArea'].'&orden='.$grilla['Orden']; ?>" title="Bajar un nivel" class="icon-down info-tooltip"></a>
			<?php } else {?>			
				<a href="#" title="Bajar un nivel" class="icon-down info-tooltip"></a>		
			<?php } ?>    
			
			<a href="<?php echo $location.'&edit_grilla='.$grilla['idArea']; ?>" title="Editar informacion" class="icon-editar info-tooltip"></a>
			<?php $ubicacion=$location.'&del_grilla='.$grilla['idArea'];?>			
			<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>
			</td>	
		</tr>
      <?php $grill++;  ?>
    <?php } ?>                    
	</tbody>
</table>  
</div>
</div>
        
<div class="col-lg-4">
	<div class="box">	
		<header>		
			<h5>Preview</h5>		
			<div class="toolbar"></div>	
		</header>
		<div class="body">
			<iframe class="frame_border" scrolling="auto" src="app_demo/preview_8.php?view=<?php echo $_GET['view'].'&app_conf='.$_GET['app_conf'] ?>" frameborder="0" height="480" width="320"></iframe>   
		</div>
	</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal_areas.php?app_conf=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 	
// Se trae un listado con todos los usuarios
$arrPage = array();
$query = "SELECT  idPagelist, Nombre
FROM `app_areas_pagelist`
WHERE app_conf = {$_GET['app_conf']}
ORDER BY idPagelist ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPage,$row );
}?>

<div class="form-group" style="margin-top:15px;">
<a href="<?php echo $location.'&new=true'; ?>" class="btn btn-default fright margin_width" >Crear Nueva Pantalla</a>
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
<div class="box">	
	<header>		
		<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Pantallas</h5>	
	</header>
        
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
		<tr role="row">
			<th>Nombre</th>
			<th width="120">ID</th>
			<th width="120">Acciones</th>
		</tr>
	</thead>
    <tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrPage as $paginas) { ?>
    	<tr class="odd">		
			<td><?php echo $paginas['Nombre']; ?></td>
			<td><?php echo $paginas['idPagelist']; ?></td>		
			<td>
	<a href="<?php echo $location.'&view='.$paginas['idPagelist']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>
	<a href="<?php echo $location.'&id='.$paginas['idPagelist']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a>
	<?php $ubicacion=$location.'&del='.$paginas['idPagelist'];?>			
	<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a>		
			</td>	
		</tr>
    <?php } ?>                    
	</tbody>
</table>   
</div>
</div>


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="apariencia_principal.php?pagina=1&view=<?php echo $_GET['app_conf'] ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php } ?>           		<!-- InstanceEndEditable -->   
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