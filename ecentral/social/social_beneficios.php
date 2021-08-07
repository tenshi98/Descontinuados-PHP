<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                            Se define la variable del sistema                                                   */
/**********************************************************************************************************************************/
define('neomode', 2);
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
$original = "social_beneficios.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	$location .='&view='.$_GET['view'];
	$location.='&create=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_asistencia_beneficios.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_asistencia_beneficios_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_asistencia_beneficios.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	$location .='&view='.$_GET['view'];
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_asistencia_beneficios.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_asistencia_beneficios_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_asistencia_beneficios.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	$location .='&view='.$_GET['view'];
	$location.='&delete=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/clientes_asistencia_beneficios.php';
}

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Administracion de Beneficios Vecinos</title>
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
	<link href="assets/css/theme_color_<?php echo $rowempresa['idTheme'] ?>.css" rel="stylesheet" type="text/css">
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
            <i class="fa fa-dashboard"></i> Administrar Beneficios Vecinos
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
<div id="txf_03" class="alert_sucess">  
	Beneficio Creado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Beneficio Modificado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Beneficio borrado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT  id_sociallist, idAntecedente, Resultado, Valor
FROM `clientes_asistencia_beneficios`
WHERE idBeneficios = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
//se trae un listado con todas las categorias
$arrCategorias = array();
$query = "SELECT 
mnt_social_listado.id_sociallist,
mnt_social_categorias.Nombre AS Nombre_cat,
mnt_social_listado.Nombre
FROM `mnt_social_listado`
INNER JOIN `mnt_social_categorias`   ON mnt_social_categorias.id_socialcat         = mnt_social_listado.id_socialcat
WHERE mnt_social_listado.Tipo = '2'
ORDER BY Nombre_cat ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
mysql_free_result($resultado);
// Se trae un listado de todos los antecedentes
$arrAntecedentes = array();
$query = "SELECT  idAntecedente, Nombre
FROM `mnt_social_antecedentes`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrAntecedentes,$row );
} ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Beneficio</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        
        	<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Beneficio</label>
                <div class="col-lg-8">
                <select name="id_sociallist" class="form-control" required >
                <option value="" selected>Seleccione un Beneficio</option>
                <?php foreach ( $arrCategorias as $categorias ) { ?>
                <option value="<?php echo $categorias['id_sociallist']; ?>" <?php if(isset($id_sociallist)&& $id_sociallist==$categorias['id_sociallist']){ echo 'selected="selected"';}elseif($rowdata['id_sociallist']==$categorias['id_sociallist']){echo 'selected="selected"';}?>><?php echo $categorias['Nombre_cat'].'-'.$categorias['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Requisito</label>
                <div class="col-lg-8">
                <select name="idAntecedente" class="form-control" required >
                <option value="" selected>Seleccione un Requisito</option>
                <?php foreach ( $arrAntecedentes as $antecedentes ) { ?>
                <option value="<?php echo $antecedentes['idAntecedente']; ?>" <?php if(isset($idAntecedente)&& $idAntecedente==$antecedentes['idAntecedente']){ echo 'selected="selected"';}elseif($rowdata['idAntecedente']==$antecedentes['idAntecedente']){echo 'selected="selected"';}?>><?php echo $antecedentes['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Resultado Atencion</label>
				<div class="col-lg-8">
					<textarea name="Resultado" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 54px;"  required><?php if(isset($Resultado)){ echo $Resultado;}elseif(isset($rowdata['Resultado'])){echo $rowdata['Resultado'];}?></textarea>
				</div>
			</div>
            
            
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Valor Beneficio</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Valor Beneficio" class="form-control"  name="Valor" value="<?php if(isset($Valor)){ echo $Valor;}elseif(isset($rowdata['Valor'])){echo $rowdata['Valor'];}?>" required>
				</div>
			</div>
            
            
			<div class="form-group">
            	<input type="hidden" name="idBeneficios" value="<?php echo $_GET['id']; ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Modificar Beneficio" name="submit_edit">
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				$location .='?pagina='.$_GET['pagina'];
				$location .='&view='.$_GET['view'];
				?>
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
//se trae un listado con todas las categorias
$arrCategorias = array();
$query = "SELECT 
mnt_social_listado.id_sociallist,
mnt_social_categorias.Nombre AS Nombre_cat,
mnt_social_listado.Nombre
FROM `mnt_social_listado`
INNER JOIN `mnt_social_categorias`   ON mnt_social_categorias.id_socialcat         = mnt_social_listado.id_socialcat
WHERE mnt_social_listado.Tipo = '2'
ORDER BY Nombre_cat ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCategorias,$row );
}
mysql_free_result($resultado);
// Se trae un listado de todos los antecedentes
$arrAntecedentes = array();
$query = "SELECT  idAntecedente, Nombre
FROM `mnt_social_antecedentes`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrAntecedentes,$row );
} ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Beneficio</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        
        	<div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Beneficio</label>
                <div class="col-lg-8">
                <select name="id_sociallist" class="form-control" required >
                <option value="" selected>Seleccione un Beneficio</option>
                <?php foreach ( $arrCategorias as $categorias ) { ?>
                <option value="<?php echo $categorias['id_sociallist']; ?>" <?php if(isset($id_sociallist)&& $id_sociallist==$categorias['id_sociallist']){ echo 'selected="selected"';}?>><?php echo $categorias['Nombre_cat'].'-'.$categorias['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Requisito</label>
                <div class="col-lg-8">
                <select name="idAntecedente" class="form-control" required >
                <option value="" selected>Seleccione un Requisito</option>
                <?php foreach ( $arrAntecedentes as $antecedentes ) { ?>
                <option value="<?php echo $antecedentes['idAntecedente']; ?>" <?php if(isset($idAntecedente)&& $idAntecedente==$antecedentes['idAntecedente']){ echo 'selected="selected"';}?>><?php echo $antecedentes['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Resultado Atencion</label>
				<div class="col-lg-8">
					<textarea name="Resultado" id="autosize" class="form-control" style="overflow: auto; word-wrap: break-word; resize: horizontal; height: 54px;"  required><?php if(isset($Resultado)){ echo $Resultado;}?></textarea>
				</div>
			</div>
            
            
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Valor Beneficio</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Valor Beneficio" class="form-control"  name="Valor" <?php if(isset($Valor)) {echo 'value="'.$Valor.'"';}?> required>
				</div>
			</div>
            
            
            
            
            
           
			<div class="form-group">
            	<input type="hidden" name="idCliente" value="<?php echo $_GET['view']; ?>" >
                <?php date_default_timezone_set('UTC');?>
                <input type="hidden" name="fAtencion" value="<?php echo date("Y-m-d"); ?>" >
                <input type="hidden" name="idUsuario" value="<?php echo $arrUsuario['idUsuario']; ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Crear Beneficio" name="submit">
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				$location .='?pagina='.$_GET['pagina'];
				$location .='&view='.$_GET['view'];
				?>
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>



<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['view']) ) { 
// Se trae un listado con todos los beneficios obtenidos
$arrBeneficios = array();
$query = "SELECT 
clientes_asistencia_beneficios.idBeneficios,
clientes_asistencia_beneficios.fAtencion,
clientes_asistencia_beneficios.Resultado,
clientes_asistencia_beneficios.Valor,
clientes_asistencia_beneficios.Estado,
usuarios_listado.Nombre AS nombre_usuario,
mnt_social_listado.Nombre AS nombre_social_list,
mnt_social_categorias.Nombre AS nombre_social_cat
FROM `clientes_asistencia_beneficios`
LEFT JOIN `usuarios_listado`           ON usuarios_listado.idUsuario                = clientes_asistencia_beneficios.idUsuario
LEFT JOIN `mnt_social_listado`         ON mnt_social_listado.id_sociallist          = clientes_asistencia_beneficios.id_sociallist
LEFT JOIN `mnt_social_categorias`      ON mnt_social_categorias.id_socialcat        = mnt_social_listado.id_socialcat

WHERE clientes_asistencia_beneficios.idCliente = {$_GET['view']}
ORDER BY clientes_asistencia_beneficios.fAtencion ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrBeneficios,$row );
} ?>
<?php //ubicacion nueva
$location .='?pagina='.$_GET['pagina'];
$location .='&view='.$_GET['view'];
?>
<div class="form-group"><form class="form-horizontal" ></form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Otorgar Beneficio</a><?php }?>
</div>


<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Beneficios</h5>
		</header>
                
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>F Atencion</th>
        <th>Folio</th>
        <th>Beneficio</th>
        <th>Observacion</th>
        <th>Valor beneficio</th>
        <th>Atendido por</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrBeneficios as $beneficio) { ?>
    	<tr class="odd">
			<td class=" "><?php echo $beneficio['fAtencion']; ?></td>
			<td class=" "><?php echo n_doc($beneficio['idBeneficios']); ?></td>
            <td class=" "><?php echo $beneficio['nombre_social_cat'].' '.$beneficio['nombre_social_list']; ?></td>
			<td class=" "><?php echo $beneficio['Resultado']; ?></td>
			<td class=" "><?php echo Valores_sd($beneficio['Valor']); ?></td>
            <td class=" "><?php echo $beneficio['nombre_usuario']; ?></td>
			<td class=" "> 
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$beneficio['idBeneficios']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$beneficio['idBeneficios'];?>
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
<?php //ubicacion nueva
$location = $original;
$location .='?pagina='.$_GET['pagina'];
?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
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
//Limitacion de la busqueda
$z="WHERE clientes_listado.Estado=1";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z.=" AND clientes_listado.Rut LIKE '%{$_GET['search']}%'";	
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
clientes_listado.Rut,
clientes_listado.Nombres,
clientes_listado.ApellidoPat,
clientes_listado.ApellidoMat
FROM `clientes_listado`
".$z."
ORDER BY clientes_listado.Nombres ASC
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
<label class="control-label col-lg-4">Buscar Vecino</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Rut">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
</div>
                      
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Vecinos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="209">Rut</th>
        <th>Nombre del Vecino</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td class=" sorting_1"><?php echo $usuarios['Rut']; ?></td>
			<td class=" "><?php echo $usuarios['Nombres'].' '.$usuarios['ApellidoPat'].' '.$usuarios['ApellidoMat']; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$usuarios['idCliente']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>   
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
                    
                    <?php if ($total_paginas>10){
						if(0>$num_pag-5){
							for ($i = 1; $i <= 10; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }
						}elseif($total_paginas<$num_pag+5){
							for ($i = $num_pag-5; $i <= $total_paginas; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }	
						}else{
							for ($i = $num_pag-4; $i <= $num_pag+5; $i++) { ?>
							<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
							<?php }	
						}		
					}else{
						for ($i = 1; $i <= $total_paginas; $i++) { ?>
                   		<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
                        <?php }
						}?>
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