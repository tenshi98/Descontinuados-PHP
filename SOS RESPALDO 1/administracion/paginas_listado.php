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
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "paginas_listado.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&create=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/paginas_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/paginas_listado_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/paginas_listado.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/paginas_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/paginas_listado_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/paginas_listado.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&delete=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/paginas_listado.php';
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
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.10.4.custom.css" />    
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
  $(document).ready(function() {
    $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val();
	$.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
  });
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
<?php  if (isset($_GET['create'])) {?>
<div id="txf_03" class="alert_sucess">  
	Pagina Creada correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Pagina Modificada correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Pagina borrada correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT  idPagGrupo, idPagCat, Titulo, Fecha, Texto
FROM `paginas_listado`
WHERE idPagListado = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
//se trae un listado con todos los grupos
$arrGrupos = array();
$query = "SELECT  idPagGrupo, Nombre
FROM `paginas_grupos`  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrupos,$row );
}
mysql_free_result($resultado);
// Se trae un listado con todas las comunas
 if ($rowdata['idPagGrupo']!=0&&$rowdata['idPagGrupo']!=''){
	$arrCategoria = array();
	$query = "SELECT idPagCat, Nombre
	FROM `paginas_categorias`
	WHERE idPagGrupo = ".$rowdata['idPagGrupo']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrCategoria,$row );
	}
} 
// Se trae un listado de todas las comunas
$query = "SELECT idPagCat, idPagGrupo, Nombre
FROM `paginas_categorias` ";
$resultado = mysql_query ($query, $dbConn);
while ($Categoria[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Categoria);
array_multisort($Categoria, SORT_ASC);
?>
 
<div class="col-lg-10 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion de Pagina</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">  
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Grupo</label>
				<div class="col-lg-8">
                    <select name="idPagGrupo" class="form-control"  onChange="cambia_categoria()" required>
                    <option value="" selected="selected">Seleccione un Grupo de Categorias</option>
                    <?php foreach ($arrGrupos as $grupos) { ?>
                    <option value="<?php echo $grupos['idPagGrupo']; ?>" <?php if(isset($idPagGrupo)&&$idPagGrupo==$grupos['idPagGrupo']) {echo 'selected="selected"';} elseif($rowdata['idPagGrupo']==$grupos['idPagGrupo']){ echo 'selected="selected"'; }?>><?php echo $grupos['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Categoria</label>
				<div class="col-lg-8">
                    <select name="idPagCat" class="form-control" required>
                    <option value="" selected="selected">Seleccione una Categoria</option>
                    <?php foreach ($arrCategoria as $categoria) { ?>
                    <option value="<?php echo $categoria['idPagCat']; ?>" <?php if(isset($idPagCat)&&$idPagCat==$categoria['idComuna']) {echo 'selected="selected"';} elseif($rowdata['idPagCat']==$categoria['idPagCat']){ echo 'selected="selected"'; }?>><?php echo $categoria['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
<script>
<?php
//se imprime la id de la tarea
filtrar($Categoria, 'idPagGrupo'); 
foreach($Categoria as $tipo=>$componentes){ 
echo'var id_categoria_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idPagCat'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Categoria as $tipo=>$componentes){ 
echo'var categoria_'.$tipo.'=new Array("Seleccione una Categoria"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_categoria(){
	var Componente
	Componente = document.form1.idPagGrupo[document.form1.idPagGrupo.selectedIndex].value
	try {
	if (Componente != '') {
		id_categoria=eval("id_categoria_" + Componente)
		categoria=eval("categoria_" + Componente)
		num_int = id_categoria.length
		document.form1.idPagCat.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idPagCat.options[i].value=id_categoria[i]
		   document.form1.idPagCat.options[i].text=categoria[i]
		}	
	}else{
		document.form1.idPagCat.length = 1
		document.form1.idPagCat.options[0].value = ""
	    document.form1.idPagCat.options[0].text = "Seleccione una Categoria"
	}
	} catch (e) {
    alert("El Grupo seleccionado no posee categorias");
}
	document.form1.idPagCat.options[0].selected = true
}
</script>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo</label>
				<div class="col-lg-8">
					<input type="text"  placeholder="Titulo" class="form-control" value="<?php if(isset($Titulo)) {echo $Titulo;} else {echo $rowdata['Titulo'];}?>" name="Titulo" required>
				</div>
			</div>
            
            <div class="form-group">
				<label class="control-label col-lg-4">Fecha de Publicacion</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="Fecha de Publicacion" class="form-control timepicker-default" type="text" name="Fecha" id="datepicker" value="<?php if(isset($Fecha)) {echo $Fecha;} else {echo $rowdata['Fecha'];}?>" required>
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
					</div>
				</div>
			</div>
            
            
            
            <div class="form-group">
                <div class="col-lg-12">
				<textarea id="ckeditor" class="ckeditor col-lg-12" name="Texto"><?php if(isset($Texto)) {echo $Texto;}else{echo $rowdata['Texto'];} ?></textarea>
                <script src="ckeditor/ckeditor.js"></script>
                <script>
                CKEDITOR.replace( 'ckeditor', {
					toolbar: [		
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
				{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule' ] },	
				{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },	
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
				{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] }	
					]
				});
                </script>
                </div>
            </div>
            
            
            

			<div class="form-group">
            	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="idPagListado">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				$location .='?pagina='.$_GET['pagina'];
				if (isset($_GET['search'])) { 
				$location .='&search='.$_GET['search'];
				}?>
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>


<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['new']) ) { 
//se trae un listado con todos los grupos
$arrGrupos = array();
$query = "SELECT  idPagGrupo, Nombre
FROM `paginas_grupos`  ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrupos,$row );
}
mysql_free_result($resultado); 
// Se trae un listado de todas las comunas
$query = "SELECT idPagCat, idPagGrupo, Nombre
FROM `paginas_categorias` ";
$resultado = mysql_query ($query, $dbConn);
while ($Categoria[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Categoria);
array_multisort($Categoria, SORT_ASC);
?>


 <div class="col-lg-10 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nueva Pagina</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
        	
           
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Grupo</label>
				<div class="col-lg-8">
                    <select name="idPagGrupo" class="form-control"  onChange="cambia_categoria()" required>
                    <option value="" selected="selected">Seleccione un Grupo de Categorias</option>
                    <?php foreach ($arrGrupos as $grupos) { ?>
                    <option value="<?php echo $grupos['idPagGrupo']; ?>" <?php if(isset($idPagGrupo)&&$idPagGrupo==$grupos['idPagGrupo']) {echo 'selected="selected"';} ?>><?php echo $grupos['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Categoria</label>
				<div class="col-lg-8">
                    <select name="idPagCat" class="form-control" required>
                    <option value="" selected="selected">Seleccione una Categoria</option>            
                    </select>
				</div>
			</div>
<script>
<?php
//se imprime la id de la tarea
filtrar($Categoria, 'idPagGrupo'); 
foreach($Categoria as $tipo=>$componentes){ 
echo'var id_categoria_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idPagCat'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Categoria as $tipo=>$componentes){ 
echo'var categoria_'.$tipo.'=new Array("Seleccione una Categoria"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_categoria(){
	var Componente
	Componente = document.form1.idPagGrupo[document.form1.idPagGrupo.selectedIndex].value
	try {
	if (Componente != '') {
		id_categoria=eval("id_categoria_" + Componente)
		categoria=eval("categoria_" + Componente)
		num_int = id_categoria.length
		document.form1.idPagCat.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idPagCat.options[i].value=id_categoria[i]
		   document.form1.idPagCat.options[i].text=categoria[i]
		}	
	}else{
		document.form1.idPagCat.length = 1
		document.form1.idPagCat.options[0].value = ""
	    document.form1.idPagCat.options[0].text = "Seleccione una Categoria"
	}
	} catch (e) {
    alert("El Grupo seleccionado no posee categorias");
}
	document.form1.idPagCat.options[0].selected = true
}
</script>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo</label>
				<div class="col-lg-8">
					<input type="text"  placeholder="Titulo" class="form-control" value="<?php if(isset($Titulo)) {echo $Titulo;} ?>" name="Titulo" required>
				</div>
			</div>
            
            <div class="form-group">
				<label class="control-label col-lg-4">Fecha de Publicacion</label>
				<div class="col-lg-8">
					<div class="input-group bootstrap-timepicker">
						<input placeholder="Fecha de Publicacion" class="form-control timepicker-default" type="text" name="Fecha" id="datepicker" value="<?php if(isset($Fecha)) {echo $Fecha;} else {echo fecha_actual();}?>" required>
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 
					</div>
				</div>
			</div>
            
            <div class="form-group">
                <div class="col-lg-12">
				<textarea id="ckeditor" class="ckeditor col-lg-12" name="Texto"><?php if(isset($Texto)) {echo $Texto;} ?></textarea>
                <script src="ckeditor/ckeditor.js"></script>
                <script>
                CKEDITOR.replace( 'ckeditor', {
					toolbar: [		
				[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
				{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule' ] },	
				{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },	
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
				{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] }		
					]
				});   
                </script>
                </div>
            </div>
            
            
 
			<div class="form-group">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				$location .='?pagina='.$_GET['pagina'];
				if (isset($_GET['search'])) { 
				$location .='&search='.$_GET['search'];
				}?>
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
	$z="WHERE paginas_listado.idPagListado!=0 ";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z .=" AND paginas_listado.Titulo LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idPagListado FROM `paginas_listado` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	

// Se trae un listado con todos los usuarios
$arrNoticias = array();
$query = "SELECT 
paginas_listado.idPagListado,
paginas_listado.Titulo,
paginas_listado.Fecha,
paginas_grupos.Nombre AS nombre_grupo,
paginas_categorias.Nombre AS nombre_categoria
FROM `paginas_listado`
INNER JOIN `paginas_grupos`       ON paginas_grupos.idPagGrupo       = paginas_listado.idPagGrupo
INNER JOIN `paginas_categorias`   ON paginas_categorias.idPagCat     = paginas_listado.idPagCat
".$z."
ORDER BY paginas_listado.idPagListado DESC 
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrNoticias,$row );
}?>
<?php 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
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
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nueva Pagina</a><?php }?> 	
</div>
<div class="clearfix"></div>                       
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Paginas</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Grupo</th>
        <th>Categoria</th>
        <th>Fecha</th>
        <th>Titulo</th>
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
   <td  class="options-width">
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$noticias['idPagListado']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?> 
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$noticias['idPagListado'];?>
	<a onclick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?> 	
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
        <div class="col-lg-6">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">← Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">← Anterior</a></li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
    				<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
					<?php } ?>
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