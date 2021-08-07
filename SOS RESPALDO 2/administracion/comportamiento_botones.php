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
$original = "comportamiento_botones.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/comportamiento_botones.php';		
}
//formulario para editar boton
if ( !empty($_POST['submit_edit']) )  { 
	//Se consiguen las variables de busqueda y paginacion
	$location .='?pagina='.$_GET['pagina'];
	$location .='&view='.$_GET['view'];
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/app_areas_elementos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/app_areas_elementos_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/app_areas_elementos.php';
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
	<link href="assets/css/theme_color_<?php echo $arrUsuario['idTheme'] ?>.css" rel="stylesheet" type="text/css">
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
                <?php if (isset($arrUsuario['imgLogo'])&&$arrUsuario['imgLogo']!=''){?>
					<img src="img/<?php echo $arrUsuario['imgLogo']; ?>" alt="">
				<?php }else{?>
					<img src="img/logo_default.png" alt="">
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
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Boton Modificado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['filter']) ) {
// Se traen todos los datos del boton seleccionado
$query = "SELECT  Archivo, fun
FROM `app_tipo_boton`
WHERE idTipoBoton = {$_GET['tipo']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se traen todos los datos del boton seleccionado
$query = "SELECT  idTipoAlerta, cercanos, contactar, desplegar, login, idGrupo, idCat, idListado, pantalla, Fono
FROM `app_areas_elementos`
WHERE idElementos = {$_GET['id_class']}";
$resultado = mysql_query ($query, $dbConn);
$data = mysql_fetch_assoc ($resultado);
?>

<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Agregar comportamiento al boton</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
<?php
//se verifica el tipo de boton
switch ($rowdata['fun']) {
//***********************************************************************************************************************************************//
//En caso de que sea un boton de emergencia 
//***********************************************************************************************************************************************//
case 1:
// Se trae un listado con todos los usuarios
$arrTiposAlertas = array();
$query = "SELECT idTipoAlerta,Nombre
FROM `alertas_tipos`
WHERE idTipoBoton = {$_GET['tipo']}
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTiposAlertas,$row );
}?>
					
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Tipo de alerta</label>
	<div class="col-lg-8">
		<select name="idTipoAlerta" class="form-control" required>
            <option value="" selected>Seleccione el tipo de alerta</option>
            <?php foreach ($arrTiposAlertas as $alerta) { ?>
            <option value="<?php echo $alerta['idTipoAlerta']; ?>" <?php if(isset($idTipoAlerta)&&$idTipoAlerta==$alerta['idTipoAlerta']){echo 'selected="selected"';}elseif($data['idTipoAlerta']==$alerta['idTipoAlerta']){echo 'selected="selected"';} ?>><?php echo $alerta['Nombre']; ?></option>
            <?php } ?>
		</select>
	</div>
</div>
            
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Informar a cercanos</label>
	<div class="col-lg-8">
		<select name="cercanos" class="form-control" required>
            <option value="" selected>Seleccione si se alerta a gente cerca</option>
            <option value="1" <?php if($data['cercanos']==1){echo 'selected="selected"';}?>>Si</option>
            <option value="2" <?php if($data['cercanos']==2){echo 'selected="selected"';}?>>No</option>
		</select>
	</div>
</div>
            
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Informar a contactos</label>
	<div class="col-lg-8">
		<select name="contactar" class="form-control" required>
			<option value="" selected>Seleccione si se alerta a contactos</option>
			<option value="1" <?php if($data['contactar']==1){echo 'selected="selected"';}?>>Si</option>
			<option value="2" <?php if($data['contactar']==2){echo 'selected="selected"';}?>>No</option>
		</select>
	</div>
</div>
            
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Mostrar como emergencias</label>
	<div class="col-lg-8">
		<select name="desplegar" class="form-control" required>
			<option value="" selected>Seleccione para ver en ventana de emergencias</option>
			<option value="1" <?php if($data['desplegar']==1){echo 'selected="selected"';}?>>Si</option>
			<option value="2" <?php if($data['desplegar']==2){echo 'selected="selected"';}?>>No</option>
		</select>
	</div>
</div>
            
            	
<?php 
break;
//***********************************************************************************************************************************************//
//Abrir Todas Categorias Noticias
//***********************************************************************************************************************************************//
case 2:
// Se trae un listado con todos los usuarios
$arrGrupos = array();
$query = "SELECT  idNotGrupo, Nombre
FROM `noticias_grupos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrupos,$row );
}?>
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Grupo de Categorias</label>
	<div class="col-lg-8">
		<select name="idNotGrupo" class="form-control" required>
			<option value="" selected>Seleccione el grupo de la Categoria</option>
			<?php foreach ($arrGrupos as $grupos) { ?>
			<option value="<?php echo $grupos['idNotGrupo']; ?>" <?php if(isset($idNotGrupo)&&$idNotGrupo==$grupos['idNotGrupo']){echo 'selected="selected"';}elseif($data['idGrupo']==$grupos['idNotGrupo']){echo 'selected="selected"';} ?>><?php echo $grupos['Nombre']; ?></option>
			<?php } ?>
		</select>
	</div>
</div>
<input type="hidden"  name="idTipoAlerta" value="9999" >
<input type="hidden"  name="level_view" value="1" >

<?php        
break;
//***********************************************************************************************************************************************//
//Abrir Una Categoria Noticia
//***********************************************************************************************************************************************//
case 3:
// Se trae un listado con todos los usuarios
$arrGrupos = array();
$query = "SELECT  idNotGrupo, Nombre
FROM `noticias_grupos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrupos,$row );
}
// Se trae un listado con todas las comunas
 if ($data['idGrupo']!=0&&$data['idGrupo']!=''){
	$arrCategoria = array();
	$query = "SELECT idNotCat, Nombre
	FROM `noticias_categorias`
	WHERE idNotGrupo = ".$data['idGrupo']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrCategoria,$row );
	}
}
// Se trae un listado de todas las categoria de las noticias
$query = "SELECT idNotCat, idNotGrupo, Nombre
FROM `noticias_categorias` ";
$resultado = mysql_query ($query, $dbConn);
while ($Categoria[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Categoria);
array_multisort($Categoria, SORT_ASC);?>

<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Grupo</label>
		<div class="col-lg-8">
		<select name="idNotGrupo" class="form-control"  onChange="cambia_categoria()" required>
			<option value="" selected="selected">Seleccione un Grupo de Categorias</option>
			<?php foreach ($arrGrupos as $grupos) { ?>
			<option value="<?php echo $grupos['idNotGrupo']; ?>" <?php if(isset($idNotGrupo)&&$idNotGrupo==$grupos['idNotGrupo']) {echo 'selected="selected"';}elseif($data['idGrupo']==$grupos['idNotGrupo']){ echo 'selected="selected"'; } ?>><?php echo $grupos['Nombre']; ?></option>
			<?php } ?>             
		</select>
	</div>
</div>
			
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Categoria</label>
	<div class="col-lg-8">
		<select name="idNotCat" class="form-control" required>
			<option value="" selected="selected">Seleccione una Categoria</option>  
			<?php foreach ($arrCategoria as $categoria) { ?>
			<option value="<?php echo $categoria['idNotCat']; ?>" <?php if(isset($idNotCat)&&$idNotCat==$categoria['idComuna']) {echo 'selected="selected"';} elseif($data['idCat']==$categoria['idNotCat']){ echo 'selected="selected"'; }?>><?php echo $categoria['Nombre']; ?></option>
			<?php } ?>          
		</select>
	</div>
</div>
<input type="hidden"  name="idTipoAlerta" value="9999" >
<input type="hidden"  name="level_view" value="2" >

<script>
<?php
//se imprime la id de la tarea
filtrar($Categoria, 'idNotGrupo'); 
foreach($Categoria as $tipo=>$componentes){ 
echo'var id_categoria_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idNotCat'].'"';
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
	Componente = document.form1.idNotGrupo[document.form1.idNotGrupo.selectedIndex].value
	try {
	if (Componente != '') {
		id_categoria=eval("id_categoria_" + Componente)
		categoria=eval("categoria_" + Componente)
		num_int = id_categoria.length
		document.form1.idNotCat.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idNotCat.options[i].value=id_categoria[i]
		   document.form1.idNotCat.options[i].text=categoria[i]
		}	
	}else{
		document.form1.idNotCat.length = 1
		document.form1.idNotCat.options[0].value = ""
	    document.form1.idNotCat.options[0].text = "Seleccione una Categoria"
	}
	} catch (e) {
    alert("El Grupo seleccionado no posee categorias");
}
	document.form1.idNotCat.options[0].selected = true
}
</script>


<?php          
break;
//***********************************************************************************************************************************************//
//Abrir Una Noticia
//***********************************************************************************************************************************************//
case 4:
 // Se trae un listado con todos los usuarios
$arrGrupos = array();
$query = "SELECT  idNotGrupo, Nombre
FROM `noticias_grupos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrupos,$row );
}
// Se trae un listado con todas las comunas
 if ($data['idGrupo']!=0&&$data['idGrupo']!=''){
	$arrCategoria = array();
	$query = "SELECT idNotCat, Nombre
	FROM `noticias_categorias`
	WHERE idNotGrupo = ".$data['idGrupo']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrCategoria,$row );
	}
}
// Se trae un listado de todas las categoria de las noticias
$query = "SELECT idNotCat, idNotGrupo, Nombre
FROM `noticias_categorias` ";
$resultado = mysql_query ($query, $dbConn);
while ($Categoria[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Categoria);
array_multisort($Categoria, SORT_ASC);
// Se trae un listado con todas las comunas
 if ($data['idCat']!=0&&$data['idCat']!=''){
	$arrNoticias = array();
	$query = "SELECT idNotListado, Titulo
	FROM `noticias_listado`
	WHERE idNotCat = ".$data['idCat']." 
	ORDER BY Titulo ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrNoticias,$row );
	}
}
// Se trae un listado de todas las categoria de las noticias
$query = "SELECT idNotListado, idNotCat, Titulo
FROM `noticias_listado` 
ORDER BY Titulo ASC";
$resultado = mysql_query ($query, $dbConn);
while ($Noticias[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Noticias);
array_multisort($Noticias, SORT_ASC);

?>

<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Grupo</label>
	<div class="col-lg-8">
		<select name="idNotGrupo" class="form-control"  onChange="cambia_grupo()" required>
			<option value="" selected="selected">Seleccione un Grupo de Categorias</option>
			<?php foreach ($arrGrupos as $grupos) { ?>
			<option value="<?php echo $grupos['idNotGrupo']; ?>" <?php if(isset($idNotGrupo)&&$idNotGrupo==$grupos['idNotGrupo']) {echo 'selected="selected"';}elseif($data['idGrupo']==$grupos['idNotGrupo']){ echo 'selected="selected"'; } ?>><?php echo $grupos['Nombre']; ?></option>
			<?php } ?>             
		</select>
	</div>
</div>
			
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Categoria</label>
	<div class="col-lg-8">
		<select name="idNotCat" class="form-control" onChange="cambia_categoria()" required>
			<option value="" selected="selected">Seleccione una Categoria</option>  
			<?php foreach ($arrCategoria as $categoria) { ?>
			<option value="<?php echo $categoria['idNotCat']; ?>" <?php if(isset($idNotCat)&&$idNotCat==$categoria['idComuna']) {echo 'selected="selected"';} elseif($data['idCat']==$categoria['idNotCat']){ echo 'selected="selected"'; }?>><?php echo $categoria['Nombre']; ?></option>
			<?php } ?>          
		</select>
	</div>
</div>
<input type="hidden"  name="idTipoAlerta" value="9999" >
<input type="hidden"  name="level_view" value="3" >

<script>
<?php
//se imprime la id de la tarea
filtrar($Categoria, 'idNotGrupo'); 
foreach($Categoria as $tipo=>$componentes){ 
echo'var id_categoria_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idNotCat'].'"';
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
function cambia_grupo(){
	var Componente
	Componente = document.form1.idNotGrupo[document.form1.idNotGrupo.selectedIndex].value
	try {
	if (Componente != '') {
		id_categoria=eval("id_categoria_" + Componente)
		categoria=eval("categoria_" + Componente)
		num_int = id_categoria.length
		document.form1.idNotCat.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idNotCat.options[i].value=id_categoria[i]
		   document.form1.idNotCat.options[i].text=categoria[i]
		}	
	}else{
		document.form1.idNotCat.length = 1
		document.form1.idNotCat.options[0].value = ""
	    document.form1.idNotCat.options[0].text = "Seleccione una Categoria"
	}
	} catch (e) {
    alert("El Grupo seleccionado no posee categorias");
}
	document.form1.idNotCat.options[0].selected = true
}
</script>

<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Noticias</label>
	<div class="col-lg-8">
		<select name="idNotListado" class="form-control" required>
			<option value="" selected="selected">Seleccione una Noticia</option>  
			<?php foreach ($arrNoticias as $noticias) { ?>
			<option value="<?php echo $noticias['idNotListado']; ?>" <?php if(isset($idNotListado)&&$idNotListado==$noticias['idNotListado']) {echo 'selected="selected"';} elseif($data['idListado']==$noticias['idNotListado']){ echo 'selected="selected"'; }?>><?php echo $noticias['Titulo']; ?></option>
			<?php } ?>          
		</select>
	</div>
</div>
            

<script>
<?php
//se imprime la id de la tarea
filtrar($Noticias, 'idNotCat'); 
foreach($Noticias as $tipo=>$componentes){ 
echo'var id_noticia_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idNotListado'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Noticias as $tipo=>$componentes){ 
echo'var noticia_'.$tipo.'=new Array("Seleccione una Categoria"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Titulo'].'"';
 }
 echo')
';
}
 ?>
function cambia_categoria(){
	var Componente
	Componente = document.form1.idNotCat[document.form1.idNotCat.selectedIndex].value
	try {
	if (Componente != '') {
		id_noticia=eval("id_noticia_" + Componente)
		noticia=eval("noticia_" + Componente)
		num_int = id_noticia.length
		document.form1.idNotListado.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idNotListado.options[i].value=id_noticia[i]
		   document.form1.idNotListado.options[i].text=noticia[i]
		}	
	}else{
		document.form1.idNotListado.length = 1
		document.form1.idNotListado.options[0].value = ""
	    document.form1.idNotListado.options[0].text = "Seleccione una Noticia"
	}
	} catch (e) {
    alert("La categoria seleccionada no posee Noticias");
}
	document.form1.idNotListado.options[0].selected = true
}
</script>

<?php       
break;
//***********************************************************************************************************************************************//
//Abrir Todas Categorias Paginas
//***********************************************************************************************************************************************//
case 5:
// Se trae un listado con todos los usuarios
$arrGrupos = array();
$query = "SELECT  idPagGrupo, Nombre
FROM `paginas_grupos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrupos,$row );
}?>

<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Grupo de Categorias</label>
	<div class="col-lg-8">
		<select name="idPagGrupo" class="form-control" required>
			<option value="" selected>Seleccione el grupo de la Categoria</option>
			<?php foreach ($arrGrupos as $grupos) { ?>
			<option value="<?php echo $grupos['idPagGrupo']; ?>" <?php if(isset($idPagGrupo)&&$idPagGrupo==$grupos['idPagGrupo']){echo 'selected="selected"';}elseif($data['idGrupo']==$grupos['idPagGrupo']){echo 'selected="selected"';} ?>><?php echo $grupos['Nombre']; ?></option>
			<?php } ?>
		</select>
	</div>
</div>
<input type="hidden"  name="idTipoAlerta" value="9999" >
<input type="hidden"  name="level_view" value="1" >
<?php        
break;
//Abrir Una Categoria Pagina
case 6:
//***********************************************************************************************************************************************//
// Se trae un listado con todos los usuarios
//***********************************************************************************************************************************************//
$arrGrupos = array();
$query = "SELECT  idPagGrupo, Nombre
FROM `paginas_grupos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrupos,$row );
}
// Se trae un listado con todas las comunas
 if ($data['idGrupo']!=0&&$data['idGrupo']!=''){
	$arrCategoria = array();
	$query = "SELECT idPagCat, Nombre
	FROM `paginas_categorias`
	WHERE idPagGrupo = ".$data['idGrupo']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrCategoria,$row );
	}
}
// Se trae un listado de todas las categoria de las noticias
$query = "SELECT idPagCat, idPagGrupo, Nombre
FROM `paginas_categorias` ";
$resultado = mysql_query ($query, $dbConn);
while ($Categoria[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Categoria);
array_multisort($Categoria, SORT_ASC);?>

<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Grupo</label>
	<div class="col-lg-8">
		<select name="idPagGrupo" class="form-control"  onChange="cambia_categoria()" required>
			<option value="" selected="selected">Seleccione un Grupo de Categorias</option>
			<?php foreach ($arrGrupos as $grupos) { ?>
			<option value="<?php echo $grupos['idPagGrupo']; ?>" <?php if(isset($idPagGrupo)&&$idPagGrupo==$grupos['idPagGrupo']) {echo 'selected="selected"';}elseif($data['idGrupo']==$grupos['idPagGrupo']){ echo 'selected="selected"'; } ?>><?php echo $grupos['Nombre']; ?></option>
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
			<option value="<?php echo $categoria['idPagCat']; ?>" <?php if(isset($idPagCat)&&$idPagCat==$categoria['idComuna']) {echo 'selected="selected"';} elseif($data['idCat']==$categoria['idPagCat']){ echo 'selected="selected"'; }?>><?php echo $categoria['Nombre']; ?></option>
			<?php } ?>          
		</select>
	</div>
</div>
<input type="hidden"  name="idTipoAlerta" value="9999" >
<input type="hidden"  name="level_view" value="2" >

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


<?php         
break;
//***********************************************************************************************************************************************//
//Abrir Una Pagina
//***********************************************************************************************************************************************//
case 7:
// Se trae un listado con todos los usuarios
$arrGrupos = array();
$query = "SELECT  idPagGrupo, Nombre
FROM `paginas_grupos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrupos,$row );
}
// Se trae un listado con todas las comunas
 if ($data['idGrupo']!=0&&$data['idGrupo']!=''){
	$arrCategoria = array();
	$query = "SELECT idPagCat, Nombre
	FROM `paginas_categorias`
	WHERE idPagGrupo = ".$data['idGrupo']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrCategoria,$row );
	}
}
// Se trae un listado de todas las categoria de las noticias
$query = "SELECT idPagCat, idPagGrupo, Nombre
FROM `paginas_categorias` ";
$resultado = mysql_query ($query, $dbConn);
while ($Categoria[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Categoria);
array_multisort($Categoria, SORT_ASC);
// Se trae un listado con todas las comunas
 if ($data['idCat']!=0&&$data['idCat']!=''){
	$arrNoticias = array();
	$query = "SELECT idPagListado, Titulo
	FROM `paginas_listado`
	WHERE idPagCat = ".$data['idCat']." 
	ORDER BY Titulo ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrNoticias,$row );
	}
}
// Se trae un listado de todas las categoria de las noticias
$query = "SELECT idPagListado, idPagCat, Titulo
FROM `paginas_listado` 
ORDER BY Titulo ASC";
$resultado = mysql_query ($query, $dbConn);
while ($Noticias[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Noticias);
array_multisort($Noticias, SORT_ASC);

?>

<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Grupo</label>
	<div class="col-lg-8">
		<select name="idPagGrupo" class="form-control"  onChange="cambia_grupo()" required>
			<option value="" selected="selected">Seleccione un Grupo de Categorias</option>
			<?php foreach ($arrGrupos as $grupos) { ?>
			<option value="<?php echo $grupos['idPagGrupo']; ?>" <?php if(isset($idPagGrupo)&&$idPagGrupo==$grupos['idPagGrupo']) {echo 'selected="selected"';}elseif($data['idGrupo']==$grupos['idPagGrupo']){ echo 'selected="selected"'; } ?>><?php echo $grupos['Nombre']; ?></option>
			<?php } ?>             
		</select>
	</div>
</div>
			
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Categoria</label>
	<div class="col-lg-8">
		<select name="idPagCat" class="form-control" onChange="cambia_categoria()" required>
			<option value="" selected="selected">Seleccione una Categoria</option>  
			<?php foreach ($arrCategoria as $categoria) { ?>
			<option value="<?php echo $categoria['idPagCat']; ?>" <?php if(isset($idPagCat)&&$idPagCat==$categoria['idComuna']) {echo 'selected="selected"';} elseif($data['idCat']==$categoria['idPagCat']){ echo 'selected="selected"'; }?>><?php echo $categoria['Nombre']; ?></option>
			<?php } ?>          
		</select>
	</div>
</div>
<input type="hidden"  name="idTipoAlerta" value="9999" >
<input type="hidden"  name="level_view" value="3" >

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
function cambia_grupo(){
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
	<label for="text2" class="control-label col-lg-4">Noticias</label>
	<div class="col-lg-8">
		<select name="idPagListado" class="form-control" required>
			<option value="" selected="selected">Seleccione una Noticia</option>  
			<?php foreach ($arrNoticias as $noticias) { ?>
			<option value="<?php echo $noticias['idPagListado']; ?>" <?php if(isset($idPagListado)&&$idPagListado==$noticias['idPagListado']) {echo 'selected="selected"';} elseif($data['idListado']==$noticias['idPagListado']){ echo 'selected="selected"'; }?>><?php echo $noticias['Titulo']; ?></option>
			<?php } ?>          
		</select>
	</div>
</div>

<script>
<?php
//se imprime la id de la tarea
filtrar($Noticias, 'idPagCat'); 
foreach($Noticias as $tipo=>$componentes){ 
echo'var id_noticia_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idPagListado'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Noticias as $tipo=>$componentes){ 
echo'var noticia_'.$tipo.'=new Array("Seleccione una Categoria"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Titulo'].'"';
 }
 echo')
';
}
 ?>
function cambia_categoria(){
	var Componente
	Componente = document.form1.idPagCat[document.form1.idPagCat.selectedIndex].value
	try {
	if (Componente != '') {
		id_noticia=eval("id_noticia_" + Componente)
		noticia=eval("noticia_" + Componente)
		num_int = id_noticia.length
		document.form1.idPagListado.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idPagListado.options[i].value=id_noticia[i]
		   document.form1.idPagListado.options[i].text=noticia[i]
		}	
	}else{
		document.form1.idPagListado.length = 1
		document.form1.idPagListado.options[0].value = ""
	    document.form1.idPagListado.options[0].text = "Seleccione una Noticia"
	}
	} catch (e) {
    alert("La categoria seleccionada no posee Noticias");
}
	document.form1.idPagListado.options[0].selected = true
}
</script>

<?php        
break;
//***********************************************************************************************************************************************//
//No hace ninguna funcion, utilizado en notificaciones que no es mas que una redireccion
//***********************************************************************************************************************************************//
case 8:
// Se trae un listado con todos los usuarios
$arrTiposAlertas = array();
$query = "SELECT idTipoAlerta,Nombre
FROM `alertas_tipos`
WHERE idTipoBoton = {$_GET['tipo']}
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTiposAlertas,$row );
}?>
					
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Tipo de alerta</label>
	<div class="col-lg-8">
		<select name="idTipoAlerta" class="form-control" required>
			<option value="" selected>Seleccione el tipo de alerta</option>
			<?php foreach ($arrTiposAlertas as $alerta) { ?>
			<option value="<?php echo $alerta['idTipoAlerta']; ?>" <?php if(isset($idTipoAlerta)&&$idTipoAlerta==$alerta['idTipoAlerta']){echo 'selected="selected"';}elseif($data['idTipoAlerta']==$alerta['idTipoAlerta']){echo 'selected="selected"';} ?>><?php echo $alerta['Nombre']; ?></option>
			<?php } ?>
		</select>
	</div>
</div>

<?php 
break;
//***********************************************************************************************************************************************//
//Permite ir a otra pantalla
//***********************************************************************************************************************************************//
case 9:
//lista las paginas disponibles
$arrPantallas = array();
$query = "SELECT idPagelist,Nombre
FROM `app_areas_pagelist`
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPantallas,$row );
}?>
					
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Tipo de alerta</label>
	<div class="col-lg-8">
		<select name="pantalla" class="form-control" required>
			<option value="" selected>Seleccione el tipo de alerta</option>
			<?php foreach ($arrPantallas as $pantalla) { ?>
			<option value="<?php echo $pantalla['idPagelist']; ?>" <?php if(isset($pantalla)&&$pantalla==$pantalla['idPagelist']){echo 'selected="selected"';}elseif($data['pantalla']==$pantalla['idPagelist']){echo 'selected="selected"';} ?>><?php echo $pantalla['Nombre']; ?></option>
			<?php } ?>
		</select>
	</div>
</div>

<?php 
break;
//***********************************************************************************************************************************************//
//Se muestra el listado con todos los numeros telefonicos
//***********************************************************************************************************************************************//
case 11:
//lista las paginas disponibles
$arrFonos = array();
$query = "SELECT Nombre, Fono
FROM `mnt_fonos`
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrFonos,$row );
}?>
					
<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Telefonos Disponibles</label>
	<div class="col-lg-8">
		<select name="Fono" class="form-control" required>
			<option value="" selected>Seleccione un Numero Telefonico</option>
			<?php foreach ($arrFonos as $fono) { ?>
			<option value="<?php echo $fono['Fono']; ?>" <?php if(isset($fono)&&$fono==$fono['Fono']){echo 'selected="selected"';}elseif($data['Fono']==$fono['Fono']){echo 'selected="selected"';} ?>><?php echo $fono['Nombre'].' - '.$fono['Fono']; ?></option>
			<?php } ?>
		</select>
	</div>
</div>
<input type="hidden"  name="tipofuncion" value="11" >
<?php 
break;

//Cierre del case
}	
//***********************************************************************************************************************************************//
//Finalizan los condicionales
//***********************************************************************************************************************************************//						
?>	



				
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Login Necesario</label>
                <div class="col-lg-8">
                <select name="login" class="form-control" required>
                <option value="" selected>Seleccione si necesita login para ver el boton</option>
                <option value="1" <?php if($data['login']==1){echo 'selected="selected"';}?>>Si</option>
                <option value="2" <?php if($data['login']==2){echo 'selected="selected"';}?>>No</option>
                </select>
                </div>
            </div>        	 
            
			<div class="form-group">
            	<input type="hidden"  name="Archivo" value="<?php echo $rowdata['Archivo'] ?>" >
             	<input type="hidden"  name="idTipoBoton" value="<?php echo $_GET['tipo'] ?>" >
				<input type="hidden"  name="idElementos" value="<?php echo $_GET['id_class'] ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar" name="submit_edit">	
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				$location .='?pagina='.$_GET['pagina'];
				$location .='&view='.$_GET['view'];
				$location .='&id_class='.$_GET['id_class'];
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
} elseif ( ! empty($_GET['id_class']) ) { 
// Se traen todos los datos del boton seleccionado
$query = "SELECT  idTipoBoton
FROM `app_areas_elementos`
WHERE idElementos = {$_GET['id_class']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);
// Se trae un listado con todos los usuarios
$arrTipoBoton = array();
$query = "SELECT idTipoBoton, Nombre
FROM `app_tipo_boton`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipoBoton,$row );
}?>

<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Seleccionar el tipo de boton</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">

            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Tipo Boton</label>
                <div class="col-lg-8">
                <select name="tipo" class="form-control" >
                <option value="" selected>Seleccione un tipo de boton</option>
                <?php foreach ($arrTipoBoton as $tipo) { ?>
                <option value="<?php echo $tipo['idTipoBoton']; ?>" <?php if($rowdata['idTipoBoton']==$tipo['idTipoBoton']){echo 'selected="selected"';} ?>><?php echo $tipo['Nombre']; ?></option>
                 <?php } ?>
                </select>
                </div>
            </div>
            
			<div class="form-group">
            	<input type="hidden"  name="pagina" value="<?php echo $_GET['pagina'] ?>" >
                <input type="hidden"  name="view" value="<?php echo $_GET['view'] ?>" >
                <?php if(isset($_GET['search'])){?><input type="hidden"  name="search" value="<?php echo $_GET['search'] ?>" ><?php } ?>
                <input type="hidden"  name="id_class" value="<?php echo $_GET['id_class'] ?>" >
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Continuar" name="filtrar">	
                <?php
				//Verifico si existe la variable de busqueda y pagina 
				$location = $original;
				$location .='?pagina='.$_GET['pagina'];
				$location .='&view='.$_GET['view'];
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
} elseif ( ! empty($_GET['view']) ) { 
// Se trae un listado con todos los colores de los botones
$arrGrilla = array();
$query = "SELECT  
app_areas_elementos.Nombre AS nombre_elemento,
app_areas_elementos.idElementos,
app_areas_listado.Nombre AS nombre_grid,
alertas_tipos.Nombre AS tipo_alerta,
app_tipo_boton.Nombre AS tipo_boton

FROM `app_areas_elementos`
LEFT JOIN `app_areas_listado`     ON app_areas_listado.idArea          = app_areas_elementos.idArea
LEFT JOIN `alertas_tipos`         ON alertas_tipos.idTipoAlerta        = app_areas_elementos.idTipoAlerta
LEFT JOIN `app_tipo_boton`        ON app_tipo_boton.idTipoBoton        = app_areas_elementos.idTipoBoton

WHERE app_areas_elementos.idPagelist = {$_GET['view']} AND app_areas_elementos.Tipo_elemento = 'boton'
ORDER BY nombre_grid ASC, app_areas_elementos.Orden ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrGrilla,$row );
}
//agrego variables de ubicacion 
$location .='?pagina='.$_GET['pagina'];
$location .='&view='.$_GET['view'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Botones</h5>
		</header>       
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Nombre</th>
        <th>Tipo de Boton</th>
        <th>Funcion</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>                
	<tbody role="alert" aria-live="polite" aria-relevant="all">
<?php
filtrar($arrGrilla, 'nombre_grid');  
foreach($arrGrilla as $categoria=>$elementos){ 
echo '<tr class="odd" ><td colspan="5"  style="background-color:#DDD">'.$categoria.'</td></tr>';
  foreach ($elementos as $elemento) { ?>
  <tr class="odd"> 
   <td><?php echo $elemento['nombre_elemento']; ?></td>
   <td><?php echo $elemento['tipo_boton']; ?></td>
   <td><?php if($elemento['tipo_alerta']==''&&$elemento['tipo_boton']!=''){echo 'Llamada Archivo';}else{echo $elemento['tipo_alerta'];} ?></td>
   <td  class="options-width">
    <a href="<?php echo $location.'&id_class='.$elemento['idElementos']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a>	
   </td>   
 </tr> 
 <?php } 
}?>
              
	</tbody>
</table>   
</div>
</div>

<?php
//Verifico si existe la variable de busqueda y pagina 
$location = $original;
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<a href="<?php echo $location ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
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
//Creo la variable con la ubicacion
	$z="WHERE idPagelist!=0 ";
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z .=" AND Nombre LIKE '%{$_GET['search']}%' ";	
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT idPagelist FROM `app_areas_pagelist` ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrPage = array();
$query = "SELECT idPagelist,Nombre
FROM `app_areas_pagelist`
".$z."
ORDER BY Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPage,$row );
}?>
<?php 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Tipo boton</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
</div>
                               
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Paginas</h5>
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
			<td class=" "><?php echo $paginas['Nombre']; ?></td>
            <td class=" "><?php echo $paginas['idPagelist']; ?></td>
			<td class=" ">
<a href="<?php echo $location.'&view='.$paginas['idPagelist']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a>

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