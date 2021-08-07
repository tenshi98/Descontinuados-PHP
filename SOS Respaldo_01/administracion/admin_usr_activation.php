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
$original = "admin_usr_activation.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Si el estado esta distinto de vacio
if ( !empty($_GET['estado']) ) {
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
$location.='#anclaje='.$_GET['anclaje'];
//Llamamos a las partes del formulario
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/usuario_estado.php';
}
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
$location .='&view_msg='.$_GET['view_msg'];
$location.='&create=true';
//Llamamos a las partes del formulario
require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuarios_observaciones.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuarios_observaciones_1.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/usuarios_observaciones.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit']) )  { 
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
$location .='&view_msg='.$_GET['view_msg'];
$location.='&mod=true';
//Llamamos a las partes del formulario
require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuarios_observaciones.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuarios_observaciones_1.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/usuarios_observaciones.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
//Se agregan ubicaciones
$location .='&view_msg='.$_GET['view_msg'];
$location.='&delete=true';
//Llamamos al formulario de borrado
require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/usuarios_observaciones.php';
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
    <link rel="stylesheet" href="assets/css/theme.css">
    <link rel="stylesheet" href="assets/lib/fullcalendar/fullcalendar.css">
    <!-- Estilo definido por mi -->
    <link href="assets/css/estilo.css" rel="stylesheet" type="text/css">
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
<script language="javascript">
function msg(direccion){
if (confirm("¿Realmente deseas eliminar el registro?")) {
        //Envía el formulario
        location=direccion;
    } else {
        //No envía el formulario
       return false;
    }	
}
</script>
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
<?php  if (isset($errors[1])) {echo $errors[1];}?>
<?php  if (isset($errors[2])) {echo $errors[2];}?>
<?php  if (isset($errors[3])) {echo $errors[3];}?>
<?php  if (isset($errors[4])) {echo $errors[4];}?>
<?php  if (isset($errors[5])) {echo $errors[5];}?>
<?php  if (isset($errors[6])) {echo $errors[6];}?>
<?php  if (isset($errors[7])) {echo $errors[7];}?>
<?php  if (isset($errors[8])) {echo $errors[8];}?>
<?php  if (isset($errors[9])) {echo $errors[9];}?>
<?php  if (isset($errors[10])) {echo $errors[10];}?>
<?php  if (isset($errors[11])) {echo $errors[11];}?>
<?php  if (isset($_GET['create'])) {?>
<div id="txf_03" class="alert_sucess">  Observacion Creada correctamente
<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">	<i class="fa fa-times"></i></a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  Observacion Modificada correctamente
<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">	<i class="fa fa-times"></i></a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  Observacion borrada correctamente
<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">	<i class="fa fa-times"></i></a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['id']) ) { 
//Obtengo los datos de una observacion
$query = "SELECT Observacion
FROM `usuarios_observaciones`
WHERE idObservacion = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado); 
 ?>

<div class="col-lg-6 fcenter">
	<div class="box dark">	
		<header>		
			<div class="icons"><i class="fa fa-edit"></i></div>		
			<h5>Editar Observacion</h5>	
		</header>	
		<div id="div-1" class="body">	
			<form class="form-horizontal" method="post" name="form1">

            
				<div class="form-group">
					<label for="text2" class="control-label col-lg-4">Observaciones</label>
					<div class="col-lg-8">
						<textarea name="Observacion" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 320px;" ><?php if(isset($Observacion)) {echo $Observacion;}else{echo $rowdata['Observacion'];}?></textarea>
					</div>
				</div>

				<div class="form-group">
					<input type="hidden" name="idObservacion" value="<?php echo $_GET['id'] ?>">			
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit">
					<?php			
					//Verifico si existe la variable de busqueda, pagina  y otras			
					$location = $original;			
					$location .='?pagina='.$_GET['pagina'];			
					if (isset($_GET['search'])) { 			
					$location .='&search='.$_GET['search'];			
					}			
					$location .='&view_msg='.$_GET['view_msg'];	?>			
					<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>		
				</div>
			</form> 
		</div>
	</div>
</div>
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['new']) ) { ?>

<div class="col-lg-6 fcenter">
	<div class="box dark">	
		<header>		
			<div class="icons"><i class="fa fa-edit"></i></div>		
			<h5>Crear Nueva Observacion</h5>	
		</header>	
		<div id="div-1" class="body">	
			<form class="form-horizontal" method="post" name="form1">
   
				<div class="form-group">
					<label for="text2" class="control-label col-lg-4">Observaciones</label>
					<div class="col-lg-8">
						<textarea name="Observacion" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 320px;" ><?php if(isset($Observacion)) {echo $Observacion;}?></textarea>
					</div>
				</div>

				<div class="form-group">
					<input type="hidden" name="idUsuario_observado" value="<?php echo $_GET['view_msg'] ?>">
					<input type="hidden" name="idUsuario" value="<?php echo $arrUsuario['idUsuario'] ?>">
					<input type="hidden" name="Fecha" value="<?php echo fecha_actual() ?>">			
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
					<?php			
					//Verifico si existe la variable de busqueda, pagina  y otras			
					$location = $original;			
					$location .='?pagina='.$_GET['pagina'];			
					if (isset($_GET['search'])) { 			
					$location .='&search='.$_GET['search'];			
					}			
					$location .='&view_msg='.$_GET['view_msg'];	?>			
					<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>		
				</div>
			</form> 
		</div>
	</div>
</div>


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view']) ) { 
//Obtengo los datos de una observacion
$query = "SELECT 
usuario_observado.Nombre AS nombre_cliente,
usuario_evaluador.Nombre AS nombre_usuario,
usuarios_observaciones.Fecha,
usuarios_observaciones.Observacion
FROM `usuarios_observaciones`
LEFT JOIN `usuarios_listado` usuario_observado  ON usuario_observado.idUsuario     = usuarios_observaciones.idUsuario_observado
LEFT JOIN `usuarios_listado` usuario_evaluador  ON usuario_evaluador.idUsuario     = usuarios_observaciones.idUsuario
WHERE usuarios_observaciones.idObservacion = {$_GET['view']}
ORDER BY usuarios_observaciones.idObservacion ASC ";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
?>
<div class="col-lg-8">
	<div class="box">	
		<header>		
			<h5>Ver Datos de la Observacion</h5>		
			<div class="toolbar"></div>	
		</header>
        <div class="body">
            <h2 class="text-primary">Datos Basicos</h2>
            <p class="text-muted"><strong>Cliente : </strong><?php echo $rowdata['nombre_cliente']; ?></p>
            <p class="text-muted"><strong>Usuario : </strong><?php echo $rowdata['nombre_usuario']; ?></p>
            <p class="text-muted"><strong>Fecha : </strong><?php echo Fecha_completa_alt($rowdata['Fecha']); ?></p>
                      
            <h2 class="text-primary">Observacion</h2>
            <p class="text-muted word_break " ><strong>Observacion : </strong><?php echo $rowdata['Observacion']; ?></p>
            
        	
        </div>
	</div>
</div>
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<?php //Verifico si existe la variable de busqueda y pagina
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
$location .='&view_msg='.$_GET['view_msg'];
?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
 
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view_msg']) ) { 
// Se trae un listado con todas las observaciones el cliente
$arrObservaciones = array();
$query = "SELECT 
usuarios_observaciones.idObservacion,
usuario_observado.Nombre AS nombre_cliente,
usuario_evaluador.Nombre AS nombre_usuario,
usuarios_observaciones.Fecha,
usuarios_observaciones.Observacion
FROM `usuarios_observaciones`
LEFT JOIN `usuarios_listado` usuario_observado  ON usuario_observado.idUsuario     = usuarios_observaciones.idUsuario_observado
LEFT JOIN `usuarios_listado` usuario_evaluador  ON usuario_evaluador.idUsuario     = usuarios_observaciones.idUsuario
WHERE usuarios_observaciones.idUsuario_observado = {$_GET['view_msg']}
ORDER BY usuarios_observaciones.idObservacion ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrObservaciones,$row );
}
//Se agregan las ubicaciones
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
$location.='&view_msg='.$_GET['view_msg'];
?> 

<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1"></form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nueva Observacion</a><?php }?>
</div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">	
		<header>
			<div class="icons"><i class="fa fa-table"></i></div>
			<h5>Observaciones de <?php if(isset($arrObservaciones[0]['nombre_cliente'])&&$arrObservaciones[0]['nombre_cliente']!=''){echo $arrObservaciones[0]['nombre_cliente'];}; ?></h5>	
		</header>		
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
			<thead>
				<tr role="row">
					<th>Autor</th>
					<th>Fecha</th>
					<th>Observacion</th>
					<th width="120">Acciones</th>
				</tr>
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all">
			<?php foreach ($arrObservaciones as $observaciones) { ?>
				<tr class="odd">		
					<td class=" "><?php echo $observaciones['nombre_usuario']; ?></td>
					<td class=" "><?php echo $observaciones['Fecha']; ?></td>		
					<td class=" "><?php echo cortar($observaciones['Observacion'], 70); ?></td>		
					<td class=" ">

		<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$observaciones['idObservacion']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>   
		<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$observaciones['idObservacion']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
		<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$observaciones['idObservacion'];?>			
		<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?>		
					</td>	
				</tr>
			<?php } ?>                   
			</tbody>
		</table> 
	</div>
</div>


 
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<?php //Verifico si existe la variable de busqueda y pagina
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div> 
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 }else{
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
//Variable con la ubicacion$z="WHERE usuarios_listado.tipo!='SuperAdmin'";
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){$z.=" AND usuarios_listado.idTipoCliente>=0";
}else{$z.=" AND usuarios_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){$z.=" AND usuarios_listado.Nombre LIKE '%{$_GET['search']}%' ";	
}$z.=" AND usuarios_listado.mode='".neomode."' ";	
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
detalle_general.Nombre AS estado,
clientes_tipos.RazonSocial AS sistema
FROM `usuarios_listado`
LEFT JOIN `detalle_general`   ON detalle_general.id_Detalle     = usuarios_listado.Estado
LEFT JOIN `clientes_tipos`    ON clientes_tipos.idTipoCliente   = usuarios_listado.idTipoCliente
".$z."
ORDER BY usuarios_listado.tipo ASC, usuarios_listado.usuario ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}?>
<?php 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Usuario</label>
    <div class="col-lg-5">	<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >		
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>	</div>
    </div>
</form>
</div>
                      
                                 
<div class="col-lg-12">
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div>
			<h5>Listado de Usuarios</h5>	
		</header>
			
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
			<thead>
				<tr role="row">
					<th>Usuario</th>
					<th>Nombre del usuario</th>
					<th width="160">Ultimo acceso</th>
					<th width="160">Tipo Usuario</th>	<th width="160">Sistema</th>
					<th width="120">Estado</th>
					<th width="130">Acciones</th>
					<th width="130">Observaciones</th>
				</tr>
			</thead>
			<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">		
			<td class=" "><a name="<?php echo $usuarios['idUsuario'] ?>"></a> <?php echo $usuarios['usuario']; ?></td>		
			<td class=" "><?php echo $usuarios['Nombre']; ?></td>
            <td class=" "><?php echo $usuarios['Ultimo_acceso']; ?></td>		
			<td class=" "><?php echo $usuarios['tipo']; ?></td>		
			<td class=" "><?php echo $usuarios['sistema']; ?></td>		
			<td class=" "><?php echo $usuarios['estado']; ?></td>		
			<td class=" ">		
			<?php //Verifico si existe la variable de busqueda y pagina
           	$w='&anclaje='.$usuarios['idUsuario'];			?>  
            <?php if ($rowlevel['level']>=2){?>    				
            <ul class="interruptor">   
               <?php if ( $usuarios['estado']=='Activo' ) {?>   
                <li class="primer_int"><a href="<?php echo $location.'&id='.$usuarios['idUsuario'].'&estado=2'.$w ; ?>">OFF</a></li>
                <li class="ultimo_int on"><a href="#">ON</a></li>
               <?php } else {?>
                <li class="primer_int on"><a href="#">OFF</a></li>
                <li class="ultimo_int"><a href="<?php echo $location.'&id='.$usuarios['idUsuario'].'&estado=1'.$w ; ?>">ON</a></li>
               <?php }?>    
            </ul>
            <?php }?>       
            </td>
            <td class=" ">  
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view_msg='.$usuarios['idUsuario']; ?>" title="Editar Observaciones" class="icon-msg info-tooltip"></a><?php }?>		
			</td>	
		</tr>
    <?php } ?>                    
	</tbody>
</table>
<?php 
//Verifico si hay mas de una pagina, sino coulto el paginador
if($total_paginas>1){
//Cargamos la ubicacion original
$location = $original;
$location .='?pagina=';
if (isset($_GET['search'])) { 
$x ='&search='.$_GET['search'];
} else {
$x='';	
}?>
    <div class="row">
        <div class="contaux">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination menucent">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">← Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">← Anterior</a></li>
                    <?php } ?>
                    
                    <?php if ($total_paginas>10){					if(0>$num_pag-5){						for ($i = 1; $i <= 10; $i++) { ?>						<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>						<?php }					}elseif($total_paginas<$num_pag+5){						for ($i = $num_pag-5; $i <= $total_paginas; $i++) { ?>						<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>						<?php }						}else{						for ($i = $num_pag-4; $i <= $num_pag+5; $i++) { ?>						<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>						<?php }						}						}else{					for ($i = 1; $i <= $total_paginas; $i++) { ?>
                   		<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
                        <?php }					}?>
                    <?php if(($num_pag + 1)<=$total_paginas) { ?>
                    <li class="next"><a href="<?php echo $location.($num_pag+1).$x ?>">Siguiente → </a></li>
                    <?php } else {?>
                    <li class="next disabled"><a href="">Siguiente → </a></li>
                    <?php } ?>
                </ul>
            </div> 
        </div>
    </div>
<?php }?>   
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