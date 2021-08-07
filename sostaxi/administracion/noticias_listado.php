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
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "noticias_listado.php";
$location = $original;
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != ''){                       $location .= "&search=".$_GET['search'] ; 	}
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/permisos.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para crear
if ( !empty($_POST['submit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idTipoCliente,idNotGrupo,idNotCat,Titulo,Comentarios,Aprobar,Fecha,Texto';
	$form_trabajo= 'insert';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/noticias_listado.php';
}
//formulario para editar
if ( !empty($_POST['submit_edit']) )  { 
	//Llamamos al formulario
	$form_obligatorios = 'idNotListado,idTipoCliente,idNotGrupo,idNotCat,Titulo,Comentarios,Aprobar,Fecha,Texto';
	$form_trabajo= 'update';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/noticias_listado.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Llamamos al formulario
	$form_obligatorios = '';
	$form_trabajo= 'del';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form/noticias_listado.php';	
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
if (isset($_GET['created'])) {$error['usuario'] 	  = 'sucess/Noticia Creada correctamente';}
if (isset($_GET['edited']))  {$error['usuario'] 	  = 'sucess/Noticia Modificada correctamente';}
if (isset($_GET['deleted'])) {$error['usuario'] 	  = 'sucess/Noticia borrada correctamente';}
//Manejador de errores
if(isset($error)&&$error!=''){echo errors_list($error);};?>			
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
//Se verifica el tipo de usuario para mostrar los datos
if($arrUsuario['tipo']=='SuperAdmin'){
$zz="idTipoCliente>0";
}else{
$zz="idTipoCliente={$arrUsuario['idTipoCliente']}";	
}  
// Se traen todos los datos de mi usuario
$query = "SELECT idNotGrupo, idNotCat, Titulo, Fecha, Texto, Comentarios, Aprobar, idTipoCliente
FROM `noticias_listado`
WHERE idNotListado = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
?>
 
<div class="col-lg-10 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion de Noticia</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">  
		
			<?php 
			//Se verifican si existen los datos
			if(isset($idTipoCliente)) {  $x1  = $idTipoCliente;  }else{$x1  = $rowdata['idTipoCliente'];}
			if(isset($idNotGrupo)) {     $x2  = $idNotGrupo;     }else{$x2  = $rowdata['idNotGrupo'];}
			if(isset($idNotCat)) {       $x3  = $idNotCat;       }else{$x3  = $rowdata['idNotCat'];}
			if(isset($Titulo)) {         $x4  = $Titulo;         }else{$x4  = $rowdata['Titulo'];}
			if(isset($Comentarios)) {    $x5  = $Comentarios;    }else{$x5  = $rowdata['Comentarios'];}
			if(isset($Aprobar)) {        $x6  = $Aprobar;        }else{$x6  = $rowdata['Aprobar'];}
			if(isset($Fecha)) {          $x7  = $Fecha;          }else{$x7  = $rowdata['Fecha'];}
			if(isset($Texto)) {          $x8  = $Texto;          }else{$x8  = $rowdata['Texto'];}

			//se dibujan los inputs	
			if($arrUsuario['tipo']=='SuperAdmin'){
				echo form_select('Sistema','idTipoCliente', $x1, 2, 'idTipoCliente', 'Nombre', 'clientes_tipos', 0, $dbConn);
			}else{
				echo '<input type="hidden" name="idTipoCliente"   value="'.$arrUsuario['idTipoCliente'].' ">';
			}
			echo form_select_depend1('Grupo','idNotGrupo', $x2, 1, 'idNotGrupo', 'Nombre', 'noticias_grupos', $zz,
									'Categoria','idNotCat', $x3, 1, 'idNotCat', 'idNotGrupo', 'Nombre', 'noticias_categorias', $zz, 
									 $dbConn);
			
			echo form_input('text', 'Titulo', 'Titulo', $x4, 2);
			echo form_select('Comentarios','Comentarios', $x5, 2, 'idComentarios', 'Nombre', 'noticias_listado_opc_com', $zz, $dbConn);
			echo form_select('Publicacion comentarios','Aprobar', $x6, 2, 'idPublicacion', 'Nombre', 'noticias_listado_opc_pub', $zz, $dbConn);
			echo form_date('Fecha de Publicacion','Fecha', $x7, 1);
			echo form_ckeditor('Noticia','Texto', $x8, 2);
			?>

			<div class="form-group">
            	<input type="hidden" name="idNotListado" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
//Se verifica el tipo de usuario para mostrar los datos
if($arrUsuario['tipo']=='SuperAdmin'){
	$zz="idTipoCliente>0";
}else{
	$zz="idTipoCliente={$arrUsuario['idTipoCliente']}";		
} 
?>


 <div class="col-lg-10 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nueva Noticia</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
        	
			<?php 
			//Se verifican si existen los datos
			if(isset($idTipoCliente)) {  $x1  = $idTipoCliente;  }else{$x1  = '';}
			if(isset($idNotGrupo)) {     $x2  = $idNotGrupo;     }else{$x2  = '';}
			if(isset($idNotCat)) {       $x3  = $idNotCat;       }else{$x3  = '';}
			if(isset($Titulo)) {         $x4  = $Titulo;         }else{$x4  = '';}
			if(isset($Comentarios)) {    $x5  = $Comentarios;    }else{$x5  = '';}
			if(isset($Aprobar)) {        $x6  = $Aprobar;        }else{$x6  = '';}
			if(isset($Fecha)) {          $x7  = $Fecha;          }else{$x7  = '';}
			if(isset($Texto)) {          $x8  = $Texto;          }else{$x8  = '';}

			//se dibujan los inputs	
			if($arrUsuario['tipo']=='SuperAdmin'){
				echo form_select('Sistema','idTipoCliente', $x1, 2, 'idTipoCliente', 'Nombre', 'clientes_tipos', 0, $dbConn);
			}else{
				echo '<input type="hidden" name="idTipoCliente"   value="'.$arrUsuario['idTipoCliente'].' ">';
			}
			echo form_select_depend1('Grupo','idNotGrupo', $x2, 1, 'idNotGrupo', 'Nombre', 'noticias_grupos', $zz,
									'Categoria','idNotCat', $x3, 1, 'idNotCat', 'idNotGrupo', 'Nombre', 'noticias_categorias', $zz, 
									 $dbConn);
			
			echo form_input('text', 'Titulo', 'Titulo', $x4, 2);
			echo form_select('Comentarios','Comentarios', $x5, 2, 'idComentarios', 'Nombre', 'noticias_listado_opc_com', $zz, $dbConn);
			echo form_select('Publicacion comentarios','Aprobar', $x6, 2, 'idPublicacion', 'Nombre', 'noticias_listado_opc_pub', $zz, $dbConn);
			echo form_date('Fecha de Publicacion','Fecha', $x7, 1);
			echo form_ckeditor('Noticia','Texto', $x8, 2);
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
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
	$z="WHERE noticias_listado.idTipoCliente>=0";	
}else{
	$z="WHERE noticias_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z .=" AND noticias_listado.Titulo LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idNotListado FROM `noticias_listado` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	

// Se trae un listado con todos los usuarios
$arrNoticias = array();
$query = "SELECT 
noticias_listado.idNotListado,
noticias_listado.Titulo,
noticias_listado.Fecha,
noticias_grupos.Nombre AS nombre_grupo,
noticias_categorias.Nombre AS nombre_categoria,
clientes_tipos.RazonSocial AS sistema
FROM `noticias_listado`
INNER JOIN `noticias_grupos`       ON noticias_grupos.idNotGrupo       = noticias_listado.idNotGrupo
INNER JOIN `noticias_categorias`   ON noticias_categorias.idNotCat     = noticias_listado.idNotCat
LEFT JOIN `clientes_tipos`         ON clientes_tipos.idTipoCliente      = noticias_listado.idTipoCliente
".$z."
ORDER BY noticias_listado.idNotListado DESC 
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNoticias,$row );
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Noticia</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nueva Noticia</a><?php }?> 	
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Noticias</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Grupo</th>
        <th>Categoria</th>
        <th>Fecha</th>
        <th>Titulo</th>
        <th width="160">Sistema</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php foreach ($arrNoticias as $noticias) { ?>
  <tr class="odd"> 
   <td><?php echo $noticias['nombre_grupo']; ?></td>
   <td><?php echo $noticias['nombre_categoria']; ?></td>
   <td><?php echo $noticias['Fecha']; ?></td>
   <td><?php echo $noticias['Titulo']; ?></td>
   <td><?php echo $noticias['sistema']; ?></td>
   <td  class="options-width">
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$noticias['idNotListado']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?> 
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$noticias['idNotListado'];?>
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