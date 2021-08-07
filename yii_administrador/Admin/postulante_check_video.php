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
$original = "postulante_check_video.php";
$location = $original;
//Se verifican los filtros activos
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != '')                     { $location .= "&search=".$_GET['search'] ; }
if(isset($_GET['PostNombres']) && $_GET['PostNombres'] != '')           { $location .= "&PostNombres=".$_GET['PostNombres'] ; }
if(isset($_GET['PostApellPapa']) && $_GET['PostApellPapa'] != '')       { $location .= "&PostApellPapa=".$_GET['PostApellPapa'] ; }
if(isset($_GET['PostApellMama']) && $_GET['PostApellMama'] != '')       { $location .= "&PostApellMama=".$_GET['PostApellMama'] ; }
if(isset($_GET['fnacini']) && $_GET['fnacini'] != '')                   { $location .= "&fnacini=".$_GET['fnacini'] ; }
if(isset($_GET['fnacterm']) && $_GET['fnacterm'] != '')                 { $location .= "&fnacterm=".$_GET['fnacterm'] ; }
if(isset($_GET['PostFonoFijo']) && $_GET['PostFonoFijo'] != '')         { $location .= "&PostFonoFijo=".$_GET['PostFonoFijo'] ; }
if(isset($_GET['PostFonoCel']) && $_GET['PostFonoCel'] != '')           { $location .= "&PostFonoCel=".$_GET['PostFonoCel'] ; }
if(isset($_GET['idDepartamento']) && $_GET['idDepartamento'] != '')     { $location .= "&idDepartamento=".$_GET['idDepartamento'] ; }
if(isset($_GET['idProvincia']) && $_GET['idProvincia'] != '')           { $location .= "&idProvincia=".$_GET['idProvincia'] ; }
if(isset($_GET['idDistrito']) && $_GET['idDistrito'] != '')             { $location .= "&idDistrito=".$_GET['idDistrito'] ; }
if(isset($_GET['PostDireccion']) && $_GET['PostDireccion'] != '')       { $location .= "&PostDireccion=".$_GET['PostDireccion'] ; }
if(isset($_GET['PostEmail']) && $_GET['PostEmail'] != '')               { $location .= "&PostEmail=".$_GET['PostEmail'] ; }
if(isset($_GET['PostProfesion1']) && $_GET['PostProfesion1'] != '')     { $location .= "&PostProfesion1=".$_GET['PostProfesion1'] ; }
if(isset($_GET['PostProfesion2']) && $_GET['PostProfesion2'] != '')     { $location .= "&PostProfesion2=".$_GET['PostProfesion2'] ; }
if(isset($_GET['PostProfesion3']) && $_GET['PostProfesion3'] != '')     { $location .= "&PostProfesion3=".$_GET['PostProfesion3'] ; }
if(isset($_GET['PostProduccion1']) && $_GET['PostProduccion1'] != '')   { $location .= "&PostProduccion1=".$_GET['PostProduccion1'] ; }
if(isset($_GET['PostProduccion2']) && $_GET['PostProduccion2'] != '')   { $location .= "&PostProduccion2=".$_GET['PostProduccion2'] ; }
if(isset($_GET['PostProduccion3']) && $_GET['PostProduccion3'] != '')   { $location .= "&PostProduccion3=".$_GET['PostProduccion3'] ; }
if(isset($_GET['rol']) && $_GET['rol'] != '')                           { $location .= "&rol=".$_GET['rol'] ; }

//Verifico los permisos del usuario sobre la transaccion
require_once '../XRXS_2D2CFFDJFDJX1/xrxs_funciones/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//se borra un dato
if ( !empty($_GET['modvideo']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'modvideo';
	require_once '../XRXS_2D2CFFDJFDJX1/xrxs_form/postulante_listado.php';	
}?>
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
if (isset($_GET['created'])) {$error['cliente'] 	  = 'sucess/Postulante creado correctamente';}
if (isset($_GET['edited']))  {$error['cliente'] 	  = 'sucess/Postulante editado correctamente';}
if (isset($_GET['deleted'])) {$error['cliente'] 	  = 'sucess/Postulante borrado correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['view']) ) { 
//Reviso los videos
$query = "SELECT vid_prof1, vid_prof2, vid_prof3, vid_aprob1, vid_aprob2, vid_aprob3
FROM `postulante`
WHERE id_usuario = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado); ?>


<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Aprobar Videos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Video</th>
        <th>Nombre del Archivo</th>
        <th width="130">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">

    	<tr class="odd">
        	<?php //estado del video
			switch ($rowdata['vid_aprob1']) {
				case 1: $estadovid='En espera de aprobacion'; break;
				case 2: $estadovid='Aceptado'; break;
				case 3: $estadovid='Rechazado'; break;
				default: $estadovid='sin estado';
			}?>
        	<td class=" ">Video 1 (<?php echo $estadovid;  ?>)</td>
			<td class=" "><?php echo $rowdata['vid_prof1']; ?></td>
			<td class=" ">
<?php if($rowdata['vid_aprob1']==1){?>            
<?php if ($rowlevel['level_editar']==1){?><a target="_blank" href="<?php echo $arrUsuario['web_talento'].'?view='.$_GET['view'].'&columna=vid_aprob1'; ?>" title="Visualizar" class="icon-ver info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level_editar']==1){?><a href="<?php echo $location.'&modvideo='.$_GET['view'].'&columna=vid_aprob1&estado=2'; ?>" title="Aprobar Video" class="icon-aprobar info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level_editar']==1){?><a href="<?php echo $location.'&modvideo='.$_GET['view'].'&columna=vid_aprob1&estado=3'; ?>" title="Rechazar Video" class="icon-cancelar info-tooltip"></a><?php } ?>
<?php } ?>
			</td>
		</tr>
        
        <tr class="odd">
        	<?php //estado del video
			switch ($rowdata['vid_aprob2']) {
				case 1: $estadovid='En espera de aprobacion'; break;
				case 2: $estadovid='Aceptado'; break;
				case 3: $estadovid='Rechazado'; break;
				default: $estadovid='sin estado';
			}?>
        	<td class=" ">Video 2 (<?php echo $estadovid;  ?>)</td>
			<td class=" "><?php echo $rowdata['vid_prof2']; ?></td>
			<td class=" ">
<?php if($rowdata['vid_aprob2']==1){?>         
<?php if ($rowlevel['level_editar']==1){?><a target="_blank" href="<?php echo $arrUsuario['web_talento'].'?view='.$_GET['view'].'&columna=vid_aprob2'; ?>" title="Visualizar" class="icon-ver info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level_editar']==1){?><a href="<?php echo $location.'&modvideo='.$_GET['view'].'&columna=vid_aprob2&estado=2'; ?>" title="Aprobar Video" class="icon-aprobar info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level_editar']==1){?><a href="<?php echo $location.'&modvideo='.$_GET['view'].'&columna=vid_aprob2&estado=3'; ?>" title="Rechazar Video" class="icon-cancelar info-tooltip"></a><?php } ?>
<?php } ?>
			</td>
		</tr>
        
       <tr class="odd">
        	<?php //estado del video
			switch ($rowdata['vid_aprob3']) {
				case 1: $estadovid='En espera de aprobacion'; break;
				case 2: $estadovid='Aceptado'; break;
				case 3: $estadovid='Rechazado'; break;
				default: $estadovid='sin estado';
			}?>
        	<td class=" ">Video 3 (<?php echo $estadovid;  ?>)</td>
			<td class=" "><?php echo $rowdata['vid_prof3']; ?></td>
			<td class=" ">
<?php if($rowdata['vid_aprob3']==1){?>           
<?php if ($rowlevel['level_editar']==1){?><a target="_blank" href="<?php echo $arrUsuario['web_talento'].'?view='.$_GET['view'].'&columna=vid_aprob3'; ?>" title="Visualizar" class="icon-ver info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level_editar']==1){?><a href="<?php echo $location.'&modvideo='.$_GET['view'].'&columna=vid_aprob3&estado=2'; ?>" title="Aprobar Video" class="icon-aprobar info-tooltip"></a><?php } ?>
<?php if ($rowlevel['level_editar']==1){?><a href="<?php echo $location.'&modvideo='.$_GET['view'].'&columna=vid_aprob3&estado=3'; ?>" title="Rechazar Video" class="icon-cancelar info-tooltip"></a><?php } ?>
<?php } ?>
			</td>
		</tr>
                  
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
			if(isset($PostNombres)) {         $x1  = $PostNombres;         }else{$x1  = '';}
            if(isset($PostApellPapa)) {       $x2  = $PostApellPapa;       }else{$x2  = '';}
            if(isset($PostApellMama)) {       $x3  = $PostApellMama;       }else{$x3  = '';}
			if(isset($fnacini)) {             $x4  = $fnacini;             }else{$x4  = '';}
            if(isset($fnacterm)) {            $x5  = $fnacterm;            }else{$x5  = '';}
            if(isset($PostFonoFijo)) {        $x6  = $PostFonoFijo;        }else{$x6  = '';}
            if(isset($PostFonoCel)) {         $x7  = $PostFonoCel;         }else{$x7  = '';}
			if(isset($idDepartamento)) {      $x8  = $idDepartamento;      }else{$x8  = '';}		
			if(isset($idProvincia)) {         $x9  = $idProvincia;         }else{$x9  = '';}
            if(isset($idDistrito)) {          $x10 = $idDistrito;          }else{$x10 = '';}
			if(isset($PostDireccion)) {      $x11 = $PostDireccion;        }else{$x11 = '';}
			if(isset($PostEmail)) {          $x12 = $PostEmail;            }else{$x12 = '';}
			if(isset($PostProfesion1)) {     $x13 = $PostProfesion1;       }else{$x13 = '';}
			if(isset($PostProfesion2)) {     $x14 = $PostProfesion2;       }else{$x14 = '';}
			if(isset($PostProfesion3)) {     $x15 = $PostProfesion3;       }else{$x15 = '';}
			if(isset($PostProduccion1)) {    $x16 = $PostProduccion1;      }else{$x16 = '';}
			if(isset($PostProduccion2)) {    $x17 = $PostProduccion2;      }else{$x17 = '';}
			if(isset($PostProduccion3)) {    $x18 = $PostProduccion3;      }else{$x18 = '';}
			if(isset($rol)) {                $x19 = $rol;                  }else{$x19 = '';}

            
			//se dibujan los inputs
			echo '<h3>Datos Basicos</h3>';
			echo form_input('text', 'Nombres', 'PostNombres', $x1, 1);
			echo form_input('text', 'Apellido Paterno', 'PostApellPapa', $x2, 1);
			echo form_input('text', 'Apellido Materno', 'PostApellMama', $x3, 1);
			echo form_date('F Nacimiento inicio','fnacini', $x4, 1);
			echo form_date('F Nacimiento termino','fnacterm', $x5, 1);
			echo form_input('text', 'Telefono Fijo', 'PostFonoFijo', $x6, 1);
			echo form_input('text', 'Telefono Movil', 'PostFonoCel', $x7, 1);
			echo form_select_depend2('Departamento','idDepartamento', $x8, 1, 'idDepartamento', 'Nombre', 'ubicacion_departamento', 0,
									 'Provincia','idProvincia', $x9, 1, 'idProvincia', 'idDepartamento', 'Nombre', 'ubicacion_provincia', 0, 
									 'Distrito','idDistrito', $x10, 1, 'idDistrito', 'idProvincia', 'Nombre', 'ubicacion_distrito', 0, 
									 $x8,$x9,$dbConn);						 
			echo form_input('text', 'Direccion', 'PostDireccion', $x11, 1);
			echo form_input('text', 'Email', 'PostEmail', $x12, 1);
			echo form_select('Talento 1','PostProfesion1', $x13, 1, 'ProfCod', 'ProfDesc', 'profesion', 0, $dbConn);
			echo form_select('Talento 2','PostProfesion2', $x14, 1, 'ProfCod', 'ProfDesc', 'profesion', 0, $dbConn);
			echo form_select('Talento 3','PostProfesion3', $x15, 1, 'ProfCod', 'ProfDesc', 'profesion', 0, $dbConn);
			echo form_select('Produccion 1','PostProduccion1', $x16, 1, 'idProd', 'ProdDesc', 'producciones', 0, $dbConn);
			echo form_select('Produccion 2','PostProduccion2', $x17, 1, 'idProd', 'ProdDesc', 'producciones', 0, $dbConn);
			echo form_select('Produccion 3','PostProduccion3', $x18, 1, 'idProd', 'ProdDesc', 'producciones', 0, $dbConn);
			echo form_select('Rol','rol', $x19, 1, 'idRol', 'Nombre', 'postulante_roles', 0, $dbConn);	 
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
//Variable con la ubicacion
	$z="WHERE postulante.id_usuario>0";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])&& $_GET['search'] != ''){
	$z.=" AND postulante.Nombre LIKE '%{$_GET['search']}%' ";	
}
//Filtro de busqueda avanzada
if(isset($_GET['PostNombres']) && $_GET['PostNombres'] != '')  { 
	$z .= " AND postulante.PostNombres LIKE '%{$_GET['PostNombres']}%' " ;
	$location .= "&PostNombres=".$_GET['PostNombres'] ; 
}
if(isset($_GET['PostApellPapa']) && $_GET['PostApellPapa'] != '')  { 
	$z .= " AND postulante.PostApellPapa LIKE '%{$_GET['PostApellPapa']}%' " ;
	$location .= "&PostApellPapa=".$_GET['PostApellPapa'] ; 
}
if(isset($_GET['PostApellMama']) && $_GET['PostApellMama'] != '')  { 
	$z .= " AND postulante.PostApellMama LIKE '%{$_GET['PostApellMama']}%' " ;
	$location .= "&PostApellMama=".$_GET['PostApellMama'] ; 
}
if(isset($_GET['fnacini']) && $_GET['fnacini'] != ''&&isset($_GET['fnacterm']) && $_GET['fnacterm'] != ''){ 
	$z .= " AND postulante.PostFecNac BETWEEN '{$_GET['fnacini']}' AND '{$_GET['fnacterm']}'" ;
	$location .= "&fnacini={$_GET['fnacini']}&fnacterm={$_GET['fnacterm']}" ; 
}
if(isset($_GET['PostFonoFijo']) && $_GET['PostFonoFijo'] != '')  { 
	$z .= " AND postulante.PostFonoFijo LIKE '%{$_GET['PostFonoFijo']}%' " ;
	$location .= "&PostFonoFijo=".$_GET['PostFonoFijo'] ; 
}
if(isset($_GET['PostFonoCel']) && $_GET['PostFonoCel'] != '')  { 
	$z .= " AND postulante.PostFonoCel LIKE '%{$_GET['PostFonoCel']}%' " ;
	$location .= "&PostFonoCel=".$_GET['PostFonoCel'] ; 
}
if(isset($_GET['idDepartamento']) && $_GET['idDepartamento'] != '')  { 
	$z .= " AND postulante.idDepartamento = '".$_GET['idDepartamento']."'" ;
	$location .= "&idDepartamento=".$_GET['idDepartamento'] ; 
}
if(isset($_GET['idProvincia']) && $_GET['idProvincia'] != '')  { 
	$z .= " AND postulante.idProvincia = '".$_GET['idProvincia']."'" ;
	$location .= "&idProvincia=".$_GET['idProvincia'] ; 
}
if(isset($_GET['idDistrito']) && $_GET['idDistrito'] != '')  { 
	$z .= " AND postulante.idDistrito = '".$_GET['idDistrito']."'" ;
	$location .= "&idDistrito=".$_GET['idDistrito'] ; 
}
if(isset($_GET['PostDireccion']) && $_GET['PostDireccion'] != '')  { 
	$z .= " AND postulante.PostDireccion LIKE '%{$_GET['PostDireccion']}%' " ;
	$location .= "&PostDireccion=".$_GET['PostDireccion'] ; 
}
if(isset($_GET['PostEmail']) && $_GET['PostEmail'] != '')  { 
	$z .= " AND postulante.PostEmail LIKE '%{$_GET['PostEmail']}%' " ;
	$location .= "&PostEmail=".$_GET['PostEmail'] ; 
}
if(isset($_GET['PostProfesion1']) && $_GET['PostProfesion1'] != '')  { 
	$z .= " AND postulante.PostProfesion1 = '".$_GET['PostProfesion1']."'" ;
	$location .= "&PostProfesion1=".$_GET['PostProfesion1'] ; 
}
if(isset($_GET['PostProfesion2']) && $_GET['PostProfesion2'] != '')  { 
	$z .= " AND postulante.PostProfesion2 = '".$_GET['PostProfesion2']."'" ;
	$location .= "&PostProfesion2=".$_GET['PostProfesion2'] ; 
}
if(isset($_GET['PostProfesion3']) && $_GET['PostProfesion3'] != '')  { 
	$z .= " AND postulante.PostProfesion3 = '".$_GET['PostProfesion3']."'" ;
	$location .= "&PostProfesion3=".$_GET['PostProfesion3'] ; 
}
if(isset($_GET['PostProduccion1']) && $_GET['PostProduccion1'] != '')  { 
	$z .= " AND postulante.PostProduccion1 = '".$_GET['PostProduccion1']."'" ;
	$location .= "&PostProduccion1=".$_GET['PostProduccion1'] ; 
}
if(isset($_GET['PostProduccion2']) && $_GET['PostProduccion2'] != '')  { 
	$z .= " AND postulante.PostProduccion2 = '".$_GET['PostProduccion2']."'" ;
	$location .= "&PostProduccion2=".$_GET['PostProduccion2'] ; 
}
if(isset($_GET['PostProduccion3']) && $_GET['PostProduccion3'] != '')  { 
	$z .= " AND postulante.PostProduccion3 = '".$_GET['PostProduccion3']."'" ;
	$location .= "&PostProduccion3=".$_GET['PostProduccion3'] ; 
}
if(isset($_GET['rol']) && $_GET['rol'] != '')  { 
	$z .= " AND postulante.rol = '".$_GET['rol']."'" ;
	$location .= "&rol=".$_GET['rol'] ; 
}
// Se trae un listado con todos los usuarios
$arrPostulante = array();
$query = "SELECT 
postulante.id_usuario, 
postulante.PostNombres, 
postulante.PostApellPapa, 
postulante.PostApellMama, 
postulante.vid_aprob1, 
postulante.vid_aprob2, 
postulante.vid_aprob3, 
postulante_roles.Nombre AS rol_pos
FROM `postulante`
LEFT JOIN `postulante_roles` ON postulante_roles.idRol = postulante.rol
".$z;
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPostulante,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Postulante</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
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
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Postulantes</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th width="120">Pendientes</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                    
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrPostulante as $postulante) { 
	$pendientes = 0;
	if($postulante['vid_aprob1']==1){$pendientes++;}
	if($postulante['vid_aprob2']==1){$pendientes++;}
	if($postulante['vid_aprob3']==1){$pendientes++;}
	if($pendientes>0){
	?>
    	<tr class="odd">
			<td><?php echo $postulante['PostNombres'].' '.$postulante['PostApellPapa'].' '.$postulante['PostApellMama']; ?></td>
            <td><?php echo $pendientes; ?></td>
			<td>
<?php if ($rowlevel['level_ver']==1){?><a href="<?php echo $location.'&view='.$postulante['id_usuario']; ?>" title="Visualizar" class="icon-ver info-tooltip"></a><?php } ?>
			</td>
		</tr>
    <?php } ?> 
    <?php } ?>                   
	</tbody>
</table>
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