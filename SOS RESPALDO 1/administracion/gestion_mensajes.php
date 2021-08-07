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
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
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
$query = "SELECT Marca
FROM `clientes_vehiculos`
WHERE Marca!=''
GROUP BY Marca ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrMarca,$row );
}
mysql_free_result($resultado);
//Se trae el listado con el modelo
$arrModelo = array();
$query = "SELECT Modelo
FROM `clientes_vehiculos`
WHERE Modelo!=''
GROUP BY Modelo ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrModelo,$row );
}
mysql_free_result($resultado);
//Se trae el listado con el Tipo
$arrTipo = array();
$query = "SELECT Tipo
FROM `clientes_vehiculos`
WHERE Tipo!=''
GROUP BY Tipo ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipo,$row );
}
mysql_free_result($resultado);
//Se trae el listado con el Color_1
$arrColor_1 = array();
$query = "SELECT Color_1
FROM `clientes_vehiculos`
WHERE Color_1!=''
GROUP BY Color_1 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColor_1,$row );
}
mysql_free_result($resultado);
//Se trae el listado con el Color_1
$arrColor_2 = array();
$query = "SELECT Color_2
FROM `clientes_vehiculos`
WHERE Color_2!=''
GROUP BY Color_2 ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrColor_2,$row );
}
mysql_free_result($resultado);
//Se trae el listado con la Fecha de adquisicion
$arrFecha = array();
$query = "SELECT Fecha
FROM `clientes_vehiculos`
WHERE Fecha!=''
GROUP BY Fecha ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrFecha,$row );
}
mysql_free_result($resultado);
//Listado de usuarios
$arrUsers = array();
$query = "SELECT idCliente,Nombre
FROM `clientes_listado`
ORDER BY Nombre ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
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
                <?php foreach ( $arrUsers as $usuario ) { ?>
                <option value="<?php echo $usuario['idCliente']; ?>" ><?php echo $usuario['Nombre']; ?></option>
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
                <select name="Marca" class="form-control" >
                <option value="" selected>Seleccione una Marca</option>
                <?php foreach ( $arrMarca as $marca ) { ?>
                <option value="<?php echo $marca['Marca']; ?>" ><?php echo $marca['Marca']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Modelos</label>
                <div class="col-lg-8">
                <select name="Modelo" class="form-control" >
                <option value="" selected>Seleccione un Modelo</option>
                <?php foreach ( $arrModelo as $modelo ) { ?>
                <option value="<?php echo $modelo['Modelo']; ?>" ><?php echo $modelo['Modelo']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Tipos</label>
                <div class="col-lg-8">
                <select name="Tipo_v" class="form-control" >
                <option value="" selected>Seleccione un Tipo</option>
                <?php foreach ( $arrTipo as $tipo ) { ?>
                <option value="<?php echo $tipo['Tipo']; ?>" ><?php echo $tipo['Tipo']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Color base</label>
                <div class="col-lg-8">
                <select name="Color_1" class="form-control" >
                <option value="" selected>Seleccione un Color base</option>
                <?php foreach ( $arrColor_1 as $color1 ) { ?>
                <option value="<?php echo $color1['Color_1']; ?>" ><?php echo $color1['Color_1']; ?></option>
                <?php } ?>
                </select>
                </div>
            </div>
            <div class="form-group">
            	<label for="text2" class="control-label col-lg-4">Listado de Color complementario</label>
                <div class="col-lg-8">
                <select name="Color_2" class="form-control" >
                <option value="" selected>Seleccione un Color complementario</option>
                <?php foreach ( $arrColor_2 as $color2 ) { ?>
                <option value="<?php echo $color2['Color_2']; ?>" ><?php echo $color2['Color_2']; ?></option>
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