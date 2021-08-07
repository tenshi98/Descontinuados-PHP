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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario.php';
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
$original = "admin_clientes.php";
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
	if (isset($_GET['search'])) { 
	$location .='&search='.$_GET['search'];
	}
	$location.='&create=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_listado.php';
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
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_2.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_listado.php';
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
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/clientes_listado.php';
}

?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Administracion de Clientes</title>
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
$(function() {
       $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val()
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
            <i class="fa fa-dashboard"></i> Administrar Clientes
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
	Cliente Creado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Cliente Modificado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Cliente borrado correctamente
	<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT   *
FROM ejecutivos
WHERE id_ejecutiv = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado de todas las ciudades
$arrCiudad = array();
$query = "SELECT  idCiudad, Nombre
FROM `mnt_ubicacion_ciudad`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrCiudad,$row );
}
// Se trae un listado con todas las comunas
 if ($rowdata['idCiudad']!=0&&$rowdata['idCiudad']!=''){
	$arrComuna = array();
	$query = "SELECT idComuna,Nombre
	FROM `mnt_ubicacion_comunas`
	WHERE idCiudad = ".$rowdata['idCiudad']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrComuna,$row );
	}
} 
// Se trae un listado de todas las comunas
$query = "SELECT  idComuna, idCiudad, Nombre
FROM `mnt_ubicacion_comunas` ";
$resultado = mysql_query ($query, $dbConn);
while ($Comuna[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Comuna);
array_multisort($Comuna, SORT_ASC);

?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos del Clientes</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control" value="<?php if(isset($Nombre)) {echo $Nombre;} else {echo $rowdata['Nombre'];}?>"  name="Nombre" required>
				</div>
			</div>
            
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Sexo</label>
				<div class="col-lg-8">
                    <select name="Sexo" class="form-control"  required>
                    <option value="" selected="selected">Seleccione Sexo</option>
                    <option value="M" <?php if(isset($Sexo)&&$Sexo=='M'){echo 'selected="selected"';}else{if($rowdata['Sexo']=='M'){echo 'selected="selected"';}}?>>Masculino</option>
					<option value="F" <?php if(isset($Sexo)&&$Sexo=='F'){echo 'selected="selected"';}else{if($rowdata['Sexo']=='F'){echo 'selected="selected"';}}?>>Femenino</option>        
                    </select>
				</div>
			</div>
            
            
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Telefono 1</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Telefono 1" class="form-control" value="<?php if(isset($Fono1)) {echo $Fono1;} else {echo $rowdata['Fono1'];}?>" name="Fono1">
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Telefono 2</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Telefono 2" class="form-control" value="<?php if(isset($Fono2)) {echo $Fono2;} else {echo $rowdata['Fono2'];}?>" name="Fono2">
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Email</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Email" class="form-control" value="<?php if(isset($email)) {echo $email;} else {echo $rowdata['email'];}?>" name="email" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Rut</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Rut" class="form-control" value="<?php if(isset($Rut)) {echo $Rut;} else {echo $rowdata['Rut'];}?>" name="Rut" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Fecha de Nacimiento</label>
				<div class="col-lg-8">
					<input type="date" placeholder="Fecha de Nacimiento" class="form-control" id="datepicker"  value="<?php if(isset($fNacimiento)) {echo $fNacimiento;} else {echo $rowdata['fNacimiento'];}?>" name="fNacimiento" readonly >
				</div>
			</div>
                      
                      
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Region</label>
				<div class="col-lg-8">
                    <select name="idCiudad" class="form-control"  onChange="cambia_ciudad()">
                    <option value="" selected="selected">Seleccione una Region</option>
                    <?php foreach ($arrCiudad as $ciudad) { ?>
                    <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';} else {if($rowdata['idCiudad']==$ciudad['idCiudad']){ echo 'selected="selected"'; }}?>><?php echo $ciudad['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
			
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Comuna</label>
				<div class="col-lg-8">
                    <select name="idComuna" class="form-control" >
                    <option value="" selected="selected">Seleccione una comuna</option>
                    <?php foreach ($arrComuna as $comunas) { ?>
                    <option value="<?php echo $comunas['idComuna']; ?>" <?php if(isset($idComuna)&&$idComuna==$comunas['idComuna']) {echo 'selected="selected"';} else {if($rowdata['idComuna']==$comunas['idComuna']){ echo 'selected="selected"'; }}?>><?php echo $comunas['Nombre']; ?></option>
                    <?php } ?>             
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
				<label for="text2" class="control-label col-lg-4">Direccion</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Direccion" class="form-control" value="<?php if(isset($Direccion)) {echo $Direccion;} else {echo $rowdata['Direccion'];}?>" name="Direccion" required>
				</div>
			</div>
            
			<div class="form-group">
            	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="id_ejecutiv">
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

?>
 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Cliente</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control"  name="Nombre" <?php if(isset($Nombre)) {echo 'value="'.$Nombre.'"';}?> required >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Apellidos</label>
				<div class="col-lg-8">
				<input type="text" id="text2" placeholder="Apellidos" class="form-control"  name="Apellidos" <?php if(isset($Apellidos)) {echo 'value="'.$Apellidos.'"';}?> required >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Sexo</label>
				<div class="col-lg-8">
                    <select name="Sexo" class="form-control" required>
                    <option value="" selected="selected">Seleccione Sexo</option>
                    <option value="M" <?php if(isset($Sexo) && $Sexo == 'M'){ echo 'selected="selected"'; } ?>>Masculino</option>
					<option value="F" <?php if(isset($Sexo) && $Sexo == 'F'){ echo 'selected="selected"'; } ?>>Femenino</option>             
                    </select>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Telefono 1</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Telefono 1" class="form-control"  name="Fono1" <?php if(isset($Fono1)) {echo 'value="'.$Fono1.'"';}?>>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Telefono 2</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Telefono 2" class="form-control"  name="Fono2" <?php if(isset($Fono2)) {echo 'value="'.$Fono2.'"';}?>>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Email</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Email" class="form-control"  name="email" <?php if(isset($email)) {echo 'value="'.$email.'"';}?> required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Rut</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Rut" class="form-control"  name="Rut" <?php if(isset($Rut)) {echo 'value="'.$Rut.'"';}?> required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Fecha de Nacimiento</label>
				<div class="col-lg-8">
					<input type="text"  placeholder="Fecha de Nacimiento" class="form-control"  id="datepicker" name="fNacimiento" <?php if(isset($fNacimiento)) {echo 'value="'.$fNacimiento.'"';}?> readonly >
                    
				</div>
			</div>
                        
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Region</label>
				<div class="col-lg-8">
                    <select name="idCiudad" class="form-control"  onChange="cambia_ciudad()">
                    <option value="" selected="selected">Seleccione una Region</option>
                    <?php foreach ($arrCiudad as $ciudad) { ?>
                    <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';} ?>><?php echo $ciudad['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Comuna</label>
				<div class="col-lg-8">
                    <select name="idComuna" class="form-control" >
                    <option value="" selected="selected">Seleccione una comuna</option>           
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
				<label for="text2" class="control-label col-lg-4">Direccion</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Direccion" class="form-control"  name="Direccion" <?php if(isset($Direccion)) {echo 'value="'.$Direccion.'"';}?> required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Password</label>
				<div class="col-lg-8">
					<input type="password" id="text2" placeholder="Password" class="form-control"  name="password" <?php if(isset($password)) {echo 'value="'.$password.'"';}?> required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Repetir Password</label>
				<div class="col-lg-8">
					<input type="password" id="text2" placeholder="Repetir Password" class="form-control"  name="repassword" <?php if(isset($repassword)) {echo 'value="'.$repassword.'"';}?> required>
				</div>
			</div>
           
			<div class="form-group">
            	<input type="hidden" value="1" name="Estado">
                <input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="fcreacion">
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
 } elseif ( ! empty($_GET['view']) ) {
	 //ejecutivos.fNacimiento,  
 // Se traen todos los datos de mi usuario
$query = "SELECT  
ejecutivos.id_ejecutiv, 
ejecutivos.fecha_ingreso, 
ejecutivos.mail_ejecutiv, 
ejecutivos.nom_ejecutiv, 
ejecutivos.rut, 
ejecutivos.dir_ejecutiv, 
ejecutivos.fono_ejecutiv, 
ejecutivos.fono_alarma, 
ejecutivos.region,
ejecutivos.ciudad_ejecutiv,
ejecutivos.estado_usr
FROM ejecutivos
WHERE ejecutivos.id_ejecutiv = {$_GET['view']}";

$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>

<div class="col-lg-8">
	<div class="box">
		<header>
			<h5>Ver Datos del Cliente</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Datos Basicos</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['nom_ejecutiv']; ?></p>
            <p class="text-muted"><strong>Telefono 1 : </strong><?php echo $rowdata['fono_ejecutiv']; ?></p>
            <p class="text-muted"><strong>Telefono Alarma : </strong><?php echo $rowdata['fono_alarma']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['mail_ejecutiv']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['rut']; ?></p>
            <p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php //echo Fecha_completa($rowdata['fNacimiento']); ?></p>
            <p class="text-muted"><strong>Region : </strong><?php echo $rowdata['region']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['ciudad_ejecutiv']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['dir_ejecutiv']; ?></p>
                        
            <h2 class="text-primary">Perfil del Cliente</h2>
            <p class="text-muted"><strong>Usuario : </strong><?php echo $rowdata['rut']; ?></p>
            <p class="text-muted"><strong>Estado : </strong><?if ($rowdata['estado_usr']==1) { ?>Activo <?}else{?> Inactivo <?}?></p>
            <p class="text-muted"><strong>Fecha Creacion : </strong><?php echo $rowdata['fecha_ingreso']; ?></p>
            <p class="text-muted"><strong>Ultima Alarma : </strong><?
		$ultima_alarma="select fecha_hora from activaciones where id_usuario=".$rowdata['id_ejecutiv']." order by id_sms desc LIMIT 1";
		$resultado_ultima_alarma = mysql_query ($ultima_alarma, $dbConn);
		$row_ultima_alarma = mysql_fetch_assoc ($resultado_ultima_alarma);
		

	
	 echo $row_ultima_alarma["fecha_hora"]; ?></p>
        	<?php
			//Verifico si existe la variable de busqueda y pagina
			$location = $original; 
			$location .='?pagina='.$_GET['pagina'];
			if (isset($_GET['search'])) { 
			$location .='&search='.$_GET['search'];
			}?>
            <a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
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
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z="WHERE ejecutivos.nom_ejecutiv LIKE '%{$_GET['search']}%' and estado_usr='1'";	
} else {
	$z="WHERE estado_usr='1'";
}
//Realizo una consulta para saber el total de elementos existentes
$query = "SELECT id_ejecutiv FROM ejecutivos ".$z."";
$registros = mysql_query ($query, $dbConn);
$cuenta_registros = mysql_num_rows($registros);
//Realizo la operacion para saber la cantidad de paginas que hay
$total_paginas = ceil($cuenta_registros / $cant_reg);	
// Se trae un listado con todos los usuarios
$arrUsers = array();
$query = "SELECT 
ejecutivos.id_ejecutiv,
ejecutivos.rut,
ejecutivos.fecha_ingreso, 
ejecutivos.nom_ejecutiv,
ejecutivos.estado_usr
FROM ejecutivos
".$z."
ORDER BY ejecutivos.nom_ejecutiv ASC
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
<label class="control-label col-lg-4">Buscar Cliente</label>
    <div class="col-lg-5">
		<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Nombre">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Cliente</a><?php }?>
</div>
                      
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Clientes</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th width="209">Rut</th>
        <th width="472">Nombre del Cliente</th>
        <th width="160">Ultima Alarma</th>
        <th width="160">Fecha Creacion</th>
        <th width="120">Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td class=" sorting_1"><?php echo $usuarios['rut']; ?></td>
			<td class=" "><?php echo $usuarios['nom_ejecutiv']; ?></td>
            <td class=" ">
			<?
		$ultima_alarma="select fecha_hora from activaciones where id_usuario=".$usuarios['id_ejecutiv']." order by id_sms desc LIMIT 1";
		$resultado_ultima_alarma = mysql_query ($ultima_alarma, $dbConn);
		$row_ultima_alarma = mysql_fetch_assoc ($resultado_ultima_alarma);
		

	
	 echo $row_ultima_alarma["fecha_hora"]; ?></td>
			<td class=" "><?php echo $usuarios['fecha_ingreso']; ?></td>
			<td class=" "><?if ($usuarios['estado_usr']==1) { ?>Activo <?}else{?> Inactivo <?}?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$usuarios['id_ejecutiv']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>   

<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$usuarios['id_ejecutiv'];?>
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
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">? Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">? Anterior</a></li>
                    <?php } ?>
                    <?php for ($i = 1; $i <= $total_paginas; $i++) { ?>
    				<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
					<?php } ?>
                    <?php if(($num_pag + 1)<=$total_paginas) { ?>
                    <li class="next"><a href="<?php echo $location.($num_pag+1).$x ?>">Siguiente ? </a></li>
                    <?php } else {?>
                    <li class="next disabled"><a href="">Siguiente ? </a></li>
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