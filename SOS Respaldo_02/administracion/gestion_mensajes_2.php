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
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$original = "gestion_mensajes.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                               Ejecucion de los formularios                                                     */
/**********************************************************************************************************************************/
//formulario para filtrar
if ( !empty($_POST['filtrar']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/gestion_mensajes.php';		
}
//formulario para envio de mensaje
if ( !empty($_POST['mms']) )  {
	//llamo al documento necesario	
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/gestion_envio_mensajes.php';		
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
<?php  if (isset($_GET['send'])) {?>
<div id="txf_03" class="alert_sucess">  
	Se han enviado <?php echo $_GET['send'] ?> mensajes con exito
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['filter']) ) { 
//Se trae el listado con las Ciudad
$arrTipo = array();
$query = "SELECT id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo='8'
GROUP BY Nombre ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipo,$row );
}
mysql_free_result($resultado); ?>
 
 <div class="col-lg-9 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Enviar mensaje</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
        
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Tipos de mensaje</label>
                <div class="col-lg-8">
                <select name="Tipo" class="form-control" required>
                <option value="" selected>Seleccione un Tipo de mensaje</option>
                <?php foreach ( $arrTipo as $tipo ) { ?>
                <option value="<?php echo $tipo['id_Detalle']; ?>" <?php if(isset($Tipo)&&$Tipo==$tipo['id_Detalle']) {echo 'selected="selected"';}?>><?php echo $tipo['Nombre']; ?></option>
                
                <?php } ?>
                </select>
                </div>
            </div>
            
        	<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Titulo del mensaje</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Titulo" class="form-control"  name="Titulo" <?php if(isset($Titulo)) {echo 'value="'.$Titulo.'"';}?> required>
				</div>
			</div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Mensaje</label>
                <div class="col-lg-8 height360">
				<textarea id="ckeditor" class="ckeditor" name="Mensaje"><?php if(isset($Mensaje)) {echo $Mensaje;} ?></textarea>
                <script src="assets/lib/ckeditor/ckeditor.js"></script>
                <script>
                CKEDITOR.replace( 'ckeditor', {
					toolbar: [
						
						[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
						{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule' ] },	
						{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
						'/',
						{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
						{ name: 'styles', items: [ 'Styles', 'Format' ] }	
																											
						
					]
				});
                
                </script>
                </div>
            </div> 
            
  
            
			<div class="form-group">
                <?php //Se complementan los filtros
				if(isset($_GET['idCliente']) && $_GET['idCliente'] != '')     { echo '<input type="hidden"  name="idCliente"   value="'.$_GET['idCliente'].'">' ; }
				if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')               { echo '<input type="hidden"  name="Sexo"        value="'.$_GET['Sexo'].'">' ; }
				if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')       { echo '<input type="hidden"  name="idCiudad"    value="'.$_GET['idCiudad'].'">' ; }
				if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')       { echo '<input type="hidden"  name="idComuna"    value="'.$_GET['idComuna'].'">' ; }
				if(isset($_GET['Marca']) && $_GET['Marca'] != '')             { echo '<input type="hidden"  name="Marca"       value="'.$_GET['Marca'].'">' ; }
				if(isset($_GET['Modelo']) && $_GET['Modelo'] != '')           { echo '<input type="hidden"  name="Modelo"      value="'.$_GET['Modelo'].'">' ; }
				if(isset($_GET['Tipo_v']) && $_GET['Tipo_v'] != '')           { echo '<input type="hidden"  name="Tipo_v"      value="'.$_GET['Tipo_v'].'">' ; }
				if(isset($_GET['Color_1']) && $_GET['Color_1'] != '')         { echo '<input type="hidden"  name="Color_1"     value="'.$_GET['Color_1'].'">' ; }
				if(isset($_GET['Color_2']) && $_GET['Color_2'] != '')         { echo '<input type="hidden"  name="Color_2"     value="'.$_GET['Color_2'].'">' ; }
				if(isset($_GET['Fecha']) && $_GET['Fecha'] != '')             { echo '<input type="hidden"  name="Fecha"       value="'.$_GET['Fecha'].'">' ; }
				?>
 
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Enviar Mensaje" name="mms">

				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
// Se trae un listado de todas las ciudades
$arrCiudad = array();
$query = "SELECT  idCiudad, Nombre
FROM `mnt_ubicacion_ciudad`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrCiudad,$row );
} 
// Se trae un listado de todas las comunas
$query = "SELECT  idComuna, idCiudad, Nombre
FROM `mnt_ubicacion_comunas` ";
$resultado = mysql_query ($query, $dbConn);
while ($Comuna[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Comuna);
array_multisort($Comuna, SORT_ASC);
//Se trae el listado con la Marca
$arrMarca = array();
$query = "SELECT idMarca, Nombre
FROM `vehiculos_marcas`
ORDER BY Nombre";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrMarca,$row );
}
mysql_free_result($resultado);
//Se trae el listado con el modelo
$query = "SELECT  idModelo, idMarca, Nombre
FROM `vehiculos_modelos` ";
$resultado = mysql_query ($query, $dbConn);
while ($Modelo[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Modelo);
array_multisort($Modelo, SORT_ASC);
//Se trae el listado con el Tipo de transmision
$arrTransmision = array();
$query = "SELECT idTransmision, Nombre
FROM `vehiculos_transmision`
ORDER BY Nombre";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTransmision,$row );
}
mysql_free_result($resultado);
//Se trae el listado con el Color_1
$arrColor= array();
$query = "SELECT idColorV, Nombre
FROM `vehiculos_colores`
ORDER BY Nombre";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColor,$row );
}
mysql_free_result($resultado);
//Listado de clientes
$arrClientes = array();
$query = "SELECT idCliente,Nombre, Apellido_Paterno, Apellido_Materno
FROM `clientes_listado`
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrClientes,$row );
}
mysql_free_result($resultado);
?>

<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Filtro para el envio de mensajes</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">

            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Clientes</label>
                <div class="col-lg-8">
                <select name="idCliente" class="form-control" >
                <option value="" selected>Seleccione un Cliente</option>
                <?php foreach ( $arrClientes as $clientes ) { ?>
                <option value="<?php echo $clientes['idCliente']; ?>" ><?php echo $clientes['Nombre'].' '.$clientes['Apellido_Paterno'].' '.$clientes['Apellido_Materno']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Sexo</label>
                <div class="col-lg-8">
                <select name="Sexo" class="form-control" >
                    <option value="" selected>Seleccione un Sexo</option>
                    <option value="M" >Masculino</option>
                    <option value="F" >Femenino</option>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Regiones</label>
                <div class="col-lg-8">
                <select name="idCiudad" class="form-control" onChange="cambia_ciudad()">
                <option value="" selected>Seleccione una Region</option>
                <?php foreach ( $arrCiudad as $ciudad ) { ?>
                <option value="<?php echo $ciudad['idCiudad']; ?>" ><?php echo $ciudad['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Comunas</label>
                <div class="col-lg-8">
                <select name="idComuna" class="form-control" >
                <option value="" selected>Seleccione una Comuna</option>
                </select>
                </div>
            </div>
            
<script>
<?php
//se imprime la id de la tarea
filtrar($Comuna, 'idCiudad'); 
foreach($Comuna as $tipo=>$componentes){ 
echo'var id_comuna_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idComuna'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Comuna as $tipo=>$componentes){ 
echo'var comuna_'.$tipo.'=new Array("Seleccione una Comuna"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_ciudad(){
	var Componente
	Componente = document.form1.idCiudad[document.form1.idCiudad.selectedIndex].value
	try {
	if (Componente != '') {
		id_comuna=eval("id_comuna_" + Componente)
		comuna=eval("comuna_" + Componente)
		num_int = id_comuna.length
		document.form1.idComuna.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idComuna.options[i].value=id_comuna[i]
		   document.form1.idComuna.options[i].text=comuna[i]
		}	
	}else{
		document.form1.idComuna.length = 1
		document.form1.idComuna.options[0].value = ""
	    document.form1.idComuna.options[0].text = "Seleccione una Comuna"
	}
	} catch (e) {
    alert("La Region seleccionada no posee comunas asignadas");
}
	document.form1.idComuna.options[0].selected = true
}
</script>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Marcas</label>
                <div class="col-lg-8">
                <select name="idMarca" class="form-control" onChange="cambia_marca()">
                <option value="" selected>Seleccione una Marca</option>
                <?php foreach ( $arrMarca as $marca ) { ?>
                <option value="<?php echo $marca['idMarca']; ?>" ><?php echo $marca['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Modelos</label>
                <div class="col-lg-8">
                <select name="idModelo" class="form-control" >
                <option value="" selected>Seleccione un Modelo</option>
                </select>
                </div>
            </div>
<script>
<?php
//se imprime la id de la tarea
filtrar($Modelo, 'idMarca'); 
foreach($Modelo as $tipo=>$componentes){ 
echo'var id_modelo_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idModelo'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Modelo as $tipo=>$componentes){ 
echo'var modelo_'.$tipo.'=new Array("Seleccione un Modelo"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_marca(){
	var Componente
	Componente = document.form1.idMarca[document.form1.idMarca.selectedIndex].value
	try {
	if (Componente != '') {
		id_modelo=eval("id_modelo_" + Componente)
		modelo=eval("modelo_" + Componente)
		num_int = id_modelo.length
		document.form1.idModelo.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idModelo.options[i].value=id_modelo[i]
		   document.form1.idModelo.options[i].text=modelo[i]
		}	
	}else{
		document.form1.idModelo.length = 1
		document.form1.idModelo.options[0].value = ""
	    document.form1.idModelo.options[0].text = "Seleccione un Modelo"
	}
	} catch (e) {
    alert("La Marca seleccionada no posee Modelos asignados");
}
	document.form1.idModelo.options[0].selected = true
}
</script>                      
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Transmisiones</label>
                <div class="col-lg-8">
                <select name="idTransmision" class="form-control" >
                <option value="" selected>Seleccione un Tipo de transmision</option>
                <?php foreach ( $arrTransmision as $transmision ) { ?>
                <option value="<?php echo $transmision['idTransmision']; ?>" ><?php echo $transmision['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Color base</label>
                <div class="col-lg-8">
                <select name="idColorV_1" class="form-control" >
                <option value="" selected>Seleccione un Color base</option>
                <?php foreach ( $arrColor as $color ) { ?>
                <option value="<?php echo $color['idColorV']; ?>" ><?php echo $color['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Color complementario</label>
                <div class="col-lg-8">
                <select name="idColorV_2" class="form-control" >
                <option value="" selected>Seleccione un Color complementario</option>
                <?php foreach ( $arrColor as $color ) { ?>
                <option value="<?php echo $color['idColorV']; ?>" ><?php echo $color['Nombre']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Año del vehiculo</label>
                <div class="col-lg-8">
                <select name="Fecha" class="form-control" >
                <option value="" selected>Seleccione un Año del vehiculo</option>
                <?php foreach ( $arrFecha as $fecha ) { ?>
                <option value="<?php echo $fecha['Fecha']; ?>" ><?php echo $fecha['Fecha']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            
            
			<div class="form-group">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="filtrar">
				
			</div>
                      
			</form> 
                    
		</div>
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