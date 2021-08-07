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
$original = "admin_vecinos.php";
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
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_listado.php';
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
    <title>Administracion de Vecinos</title>
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
<script type="text/javascript" SRC="js/filterlist.js"></script>
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
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
            <i class="fa fa-dashboard"></i> Administrar Vecinos
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
<?php  if (isset($errors[12])) {echo $errors[12];}?>
<?php  if (isset($errors[13])) {echo $errors[13];}?>
<?php  if (isset($errors[14])) {echo $errors[14];}?>
<?php  if (isset($errors[15])) {echo $errors[15];}?>
<?php  if (isset($errors[16])) {echo $errors[16];}?>
<?php  if (isset($errors[17])) {echo $errors[17];}?>
<?php  if (isset($errors[18])) {echo $errors[18];}?>
<?php  if (isset($errors[19])) {echo $errors[19];}?>
<?php  if (isset($_GET['create'])) {?>
<div id="txf_03" class="alert_sucess">  
	Vecino Creado correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Vecino Modificado correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  
	Vecino borrado correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT   email, Nombres, ApellidoPat, ApellidoMat,Sexo , Rut, fNacimiento, Fono1, Fono2, idCiudad, idComuna,idCalle, n_calle, idVilla, Tipo_propiedad
FROM `clientes_listado`
WHERE idCliente = {$_GET['id']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todas las ciudades
$arrCiudad = array();
$query = "SELECT idCiudad,Nombre
FROM `mnt_ubicacion_ciudad`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
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
// Se trae un listado con todas las calles
if ($rowdata['idComuna']!=0&&$rowdata['idComuna']!=''){
	$arrCalle = array();
	$query = "SELECT idCalle,Nombre
	FROM `mnt_ubicacion_calles`
	WHERE idComuna = ".$rowdata['idComuna']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrCalle,$row );
	}
// Se trae un listado con todas las villas
	$arrVilla = array();
	$query = "SELECT idVilla,Nombre
	FROM `mnt_ubicacion_villa`
	WHERE idComuna = ".$rowdata['idComuna']." 
	ORDER BY Nombre ASC ";
	$resultado = mysql_query ($query, $dbConn);
	while ( $row = mysql_fetch_assoc ($resultado)) {
	array_push( $arrVilla,$row );
	}
}
// Se trae un listado con todas los tipos de propiedades
$arrPropiedad = array();
$query = "SELECT id_Detalle,Nombre
FROM `detalle_general`
WHERE Tipo = 7
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPropiedad,$row );
}
// Se trae un listado de todas las comunas
$query = "SELECT  idComuna, idCiudad, Nombre
FROM `mnt_ubicacion_comunas` ";
$resultado = mysql_query ($query, $dbConn);
while ($Comuna[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Comuna);
array_multisort($Comuna, SORT_ASC);
// Se trae un listado de todas las calles
$query = "SELECT  idComuna, idCalle, Nombre
FROM `mnt_ubicacion_calles` ";
$resultado = mysql_query ($query, $dbConn);
while ($Calle[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Calle);
array_multisort($Calle, SORT_ASC);
// Se trae un listado de todas las villas
$query = "SELECT  idComuna, idVilla, Nombre
FROM `mnt_ubicacion_villa` ";
$resultado = mysql_query ($query, $dbConn);
while ($Villa[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Villa);
array_multisort($Villa, SORT_ASC);?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificacion datos del Vecino</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombres</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombres" class="form-control" value="<?php if(isset($Nombres)) {echo $Nombres;} else {echo $rowdata['Nombres'];}?>"  name="Nombres" required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Apellido Paterno</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Apellido Paterno" class="form-control" value="<?php if(isset($ApellidoPat)) {echo $ApellidoPat;} else {echo $rowdata['ApellidoPat'];}?>"  name="ApellidoPat" required>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Apellido Materno</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Apellido Materno" class="form-control" value="<?php if(isset($ApellidoMat)) {echo $ApellidoMat;} else {echo $rowdata['ApellidoMat'];}?>"  name="ApellidoMat" required>
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
				<label for="text2" class="control-label col-lg-4">Telefono Casa</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Telefono Casa" class="form-control" value="<?php if(isset($Fono1)) {echo $Fono1;} else {echo $rowdata['Fono1'];}?>" name="Fono1">
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Telefono Celular</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Telefono Celular" class="form-control" value="<?php if(isset($Fono2)) {echo $Fono2;} else {echo $rowdata['Fono2'];}?>" name="Fono2">
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
                    <select name="idCiudad" class="form-control" onChange="cambia_ciudad()" required>
                    <option value="" selected="selected">Seleccione una region</option>
                    <?php foreach ($arrCiudad as $ciudad) { ?>
                    <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}elseif($ciudad['idCiudad']==$rowdata['idCiudad']){echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Comuna</label>
				<div class="col-lg-8">
                    <select name="idComuna" class="form-control" onChange="cambia_comuna(); cambia_villa();" required >  
                    <option value="" selected>---</option> 
                    <?php foreach ($arrComuna as $com) { ?>
                    <option value="<?php echo $com['idComuna']; ?>" <?php if(isset($idComuna)&&$idComuna==$com['idComuna']) {echo 'selected="selected"';}elseif($com['idComuna']==$rowdata['idComuna']){echo 'selected="selected"';}?>><?php echo $com['Nombre']; ?></option>
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
    alert("La region seleccionada no posee comunas asignadas");
}
	document.form1.idComuna.options[0].selected = true
}
</script>
			
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Filtro Villa</label>
				<div class="col-lg-8">
				<input type="text" id="text1" placeholder="Filtro" class="form-control filter" name="regexp" value="" onKeyUp="myfilter2.set(this.value)">               
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Villa</label>
				<div class="col-lg-8">
                    <select name="idVilla" class="form-control" >  
                    <option value="" selected>---</option> 
                    <?php foreach ($arrVilla as $villa) { ?>
                    <option value="<?php echo $villa['idVilla']; ?>" <?php if(isset($idVilla)&&$idVilla==$villa['idVilla']) {echo 'selected="selected"';}elseif($villa['idVilla']==$rowdata['idVilla']){echo 'selected="selected"';}?>><?php echo $villa['Nombre']; ?></option>
                    <?php } ?>      
                    </select>
				</div>
			</div>
 <script>
<?php
//se imprime la id de la tarea
filtrar($Villa, 'idComuna'); 
foreach($Villa as $tipo=>$componentes){ 
echo'var id_villa_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idVilla'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Villa as $tipo=>$componentes){ 
echo'var villa_'.$tipo.'=new Array("Seleccione una Villa"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_villa(){
var Componente3
Componente3 = document.form1.idComuna[document.form1.idComuna.selectedIndex].value
try {
    if (Componente3 != '') {	 
		id_villa=eval("id_villa_" + Componente3)
		villa=eval("villa_" + Componente3)
		num_int = id_villa.length
		document.form1.idVilla.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idVilla.options[i].value=id_villa[i]
		   document.form1.idVilla.options[i].text=villa[i]
		}			
	}else{
		document.form1.idVilla.length = 1
		document.form1.idVilla.options[0].value = ""
	    document.form1.idVilla.options[0].text = "Seleccione una Villa"
	}
} catch (e) {
    alert("La comuna seleccionada no posee villas asignadas");
}
	document.form1.idVilla.options[0].selected = true 
}
</script>
<script type="text/javascript">
	<!--
	var myfilter2 = new filterlist(document.form1.idVilla);
	//-->
</script>

            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Filtro Calle</label>
				<div class="col-lg-8">
				<input type="text" id="text1" placeholder="Filtro" class="form-control filter" name="regexp" value="" onKeyUp="myfilter.set(this.value)">
                
				</div>
			</div>
            
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Calle</label>
				<div class="col-lg-8">
                    <select name="idCalle" class="form-control" required >  
                    <option value="" selected>---</option> 
                    <?php foreach ($arrCalle as $calle) { ?>
                    <option value="<?php echo $calle['idCalle']; ?>" <?php if(isset($idCalle)&&$idCalle==$calle['idCalle']) {echo 'selected="selected"';}elseif($calle['idCalle']==$rowdata['idCalle']){echo 'selected="selected"';}?>><?php echo $calle['Nombre']; ?></option>
                    <?php } ?>        
                    </select>
				</div>
			</div>

<script>
<?php
//se imprime la id de la tarea
filtrar($Calle, 'idComuna'); 
foreach($Calle as $tipo=>$componentes){ 
echo'var id_calle_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idCalle'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Calle as $tipo=>$componentes){ 
echo'var calle_'.$tipo.'=new Array("Seleccione una Calle"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_comuna(){
var Componente2
Componente2 = document.form1.idComuna[document.form1.idComuna.selectedIndex].value
try {
    if (Componente2 != '') {	 
		id_calle=eval("id_calle_" + Componente2)
		calle=eval("calle_" + Componente2)
		num_int = id_calle.length
		document.form1.idCalle.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idCalle.options[i].value=id_calle[i]
		   document.form1.idCalle.options[i].text=calle[i]
		}			
	}else{
		document.form1.idCalle.length = 1
		document.form1.idCalle.options[0].value = ""
	    document.form1.idCalle.options[0].text = "Seleccione una Comuna"
	}
} catch (e) {
    alert("La comuna seleccionada no posee calles asignadas");
}
	document.form1.idCalle.options[0].selected = true 
}
</script>
<script type="text/javascript">
	<!--
	var myfilter = new filterlist(document.form1.idCalle);
	//-->
</script>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">N° de Calle</label>
				<div class="col-lg-8">
				<input type="text" id="text2" placeholder="N° de Calle" class="form-control" value="<?php echo $rowdata['n_calle']; ?>" name="n_calle" required >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Tipo Propiedad</label>
				<div class="col-lg-8">
                    <select name="Tipo_propiedad" class="form-control" >  
                    <option value="" selected>Seleccione un tipo de propiedad</option>  
                     <?php foreach ($arrPropiedad as $propiedad) { ?>
                    <option value="<?php echo $propiedad['id_Detalle']; ?>" <?php if(isset($Tipo_propiedad)&&$Tipo_propiedad==$propiedad['id_Detalle']) {echo 'selected="selected"';}elseif($propiedad['id_Detalle']==$rowdata['Tipo_propiedad']){echo 'selected="selected"';}?>><?php echo $propiedad['Nombre']; ?></option>
                    <?php } ?>      
                    </select>
				</div>
			</div>
            
			<div class="form-group">
            	<input type="hidden" value="<?php echo $_GET['id']; ?>" name="idCliente">
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
// Se trae un listado con todas las ciudades
$arrCiudad = array();
$query = "SELECT idCiudad,Nombre
FROM `mnt_ubicacion_ciudad`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrCiudad,$row );
} 
// Se trae un listado con los tipos de propiedad
$arrPropiedad = array();
$query = "SELECT id_Detalle,Nombre
FROM `detalle_general`
WHERE Tipo = 7
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrPropiedad,$row );
}
// Se trae un listado de todas las comunas
$query = "SELECT  idComuna, idCiudad, Nombre
FROM `mnt_ubicacion_comunas` ";
$resultado = mysql_query ($query, $dbConn);
while ($Comuna[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Comuna);
array_multisort($Comuna, SORT_ASC);
// Se trae un listado de todas las calles
$query = "SELECT  idComuna, idCalle, Nombre
FROM `mnt_ubicacion_calles` ";
$resultado = mysql_query ($query, $dbConn);
while ($Calle[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Calle);
array_multisort($Calle, SORT_ASC);
// Se trae un listado de todas las villas
$query = "SELECT  idComuna, idVilla, Nombre
FROM `mnt_ubicacion_villa` ";
$resultado = mysql_query ($query, $dbConn);
while ($Villa[] = mysql_fetch_assoc ($resultado)); 
mysql_free_result($resultado);
array_pop($Villa);
array_multisort($Villa, SORT_ASC);
?>


 <div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Crear Nuevo Vecino</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombres" class="form-control"  name="Nombres" <?php if(isset($Nombres)) {echo 'value="'.$Nombres.'"';}?> required >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Apellido Paterno</label>
				<div class="col-lg-8">
				<input type="text" id="text2" placeholder="Apellido Paterno" class="form-control"  name="ApellidoPat" <?php if(isset($ApellidoPat)) {echo 'value="'.$ApellidoPat.'"';}?> required >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Apellido Materno</label>
				<div class="col-lg-8">
				<input type="text" id="text2" placeholder="Apellido Materno" class="form-control"  name="ApellidoMat" <?php if(isset($ApellidoMat)) {echo 'value="'.$ApellidoMat.'"';}?> required >
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
				<label for="text2" class="control-label col-lg-4">Telefono Casa</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Telefono Casa" class="form-control"  name="Fono1" <?php if(isset($Fono1)) {echo 'value="'.$Fono1.'"';}?>>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Telefono Celular</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Telefono Celular" class="form-control"  name="Fono2" <?php if(isset($Fono2)) {echo 'value="'.$Fono2.'"';}?>>
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
                    <select name="idCiudad" class="form-control" onChange="cambia_ciudad()" required >
                    <option value="" selected="selected">Seleccione una region</option>
                    <?php foreach ($arrCiudad as $ciudad) { ?>
                    <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
                    <?php } ?>             
                    </select>
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Comuna</label>
				<div class="col-lg-8">
                    <select name="idComuna" class="form-control" onChange="cambia_comuna();cambia_comuna2(); " required >  
                    <option value="" selected>---</option>         
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
    alert("La region seleccionada no posee comunas asignadas");
}
	document.form1.idComuna.options[0].selected = true
}
</script>
			
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Filtro Villa</label>
				<div class="col-lg-8">
				<input type="text" id="text1" placeholder="Filtro" class="form-control filter" name="regexp" value="" onKeyUp="myfilter2.set(this.value)">               
				</div>
			</div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Villa</label>
				<div class="col-lg-8">
                    <select name="idVilla" class="form-control" >  
                    <option value="" selected>---</option>       
                    </select>
				</div>
			</div>
<script>
<?php
//se imprime la id de la tarea
filtrar($Villa, 'idComuna'); 
foreach($Villa as $tipo=>$componentes){ 
echo'var id_villa_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idVilla'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Villa as $tipo=>$componentes){ 
echo'var villa_'.$tipo.'=new Array("Seleccione una Villa"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_comuna2(){
var Componente3
Componente3 = document.form1.idComuna[document.form1.idComuna.selectedIndex].value
try {
    if (Componente3 != '') {	 
		id_villa=eval("id_villa_" + Componente3)
		villa=eval("villa_" + Componente3)
		num_int = id_villa.length
		document.form1.idVilla.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idVilla.options[i].value=id_villa[i]
		   document.form1.idVilla.options[i].text=villa[i]
		}			
	}else{
		document.form1.idVilla.length = 1
		document.form1.idVilla.options[0].value = ""
	    document.form1.idVilla.options[0].text = "Seleccione una Villa"
	}
} catch (e) {
    alert("La comuna seleccionada no posee villas asignadas");
}
	document.form1.idVilla.options[0].selected = true 
}
</script>
<script type="text/javascript">
	<!--
	var myfilter2 = new filterlist(document.form1.idVilla);
	//-->
</script>			
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Filtro Calle</label>
				<div class="col-lg-8">
				<input type="text" id="text1" placeholder="Filtro" class="form-control filter" name="regexp" value="" onKeyUp="myfilter.set(this.value)">               
				</div>
			</div>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Calle</label>
				<div class="col-lg-8">
                    <select name="idCalle" class="form-control" required >  
                    <option value="" selected>---</option>        
                    </select>
				</div>
			</div>

<script>
<?php
//se imprime la id de la tarea
filtrar($Calle, 'idComuna'); 
foreach($Calle as $tipo=>$componentes){ 
echo'var id_calle_'.$tipo.'=new Array(""';
foreach ($componentes as $idcomp) { 
echo',"'.$idcomp['idCalle'].'"';
 }
 echo')
';
}

//se imprime el nombre de la tarea
foreach($Calle as $tipo=>$componentes){ 
echo'var calle_'.$tipo.'=new Array("Seleccione una Calle"';
foreach ($componentes as $comp) { 
echo',"'.$comp['Nombre'].'"';
 }
 echo')
';
}
 ?>
function cambia_comuna(){
var Componente2
Componente2 = document.form1.idComuna[document.form1.idComuna.selectedIndex].value
try {
    if (Componente2 != '') {	 
		id_calle=eval("id_calle_" + Componente2)
		calle=eval("calle_" + Componente2)
		num_int = id_calle.length
		document.form1.idCalle.length = num_int
		for(i=0;i<num_int;i++){
		   document.form1.idCalle.options[i].value=id_calle[i]
		   document.form1.idCalle.options[i].text=calle[i]
		}			
	}else{
		document.form1.idCalle.length = 1
		document.form1.idCalle.options[0].value = ""
	    document.form1.idCalle.options[0].text = "Seleccione una Calle"
	}
} catch (e) {
    alert("La comuna seleccionada no posee calles asignadas");
}
	document.form1.idCalle.options[0].selected = true 
}
</script>
<script type="text/javascript">
	<!--
	var myfilter = new filterlist(document.form1.idCalle);
	//-->
</script>
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">N° de Calle</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="N° de Calle" class="form-control"  name="n_calle" required >
				</div>
			</div>
            
            <div class="form-group">
				<label for="text2" class="control-label col-lg-4">Tipo Propiedad</label>
				<div class="col-lg-8">
                    <select name="Tipo_propiedad" class="form-control" >  
                    <option value="" selected>Seleccione un tipo de propiedad</option>  
                     <?php foreach ($arrPropiedad as $propiedad) { ?>
                    <option value="<?php echo $propiedad['id_Detalle']; ?>" <?php if(isset($Tipo_propiedad)&&$Tipo_propiedad==$propiedad['id_Detalle']) {echo 'selected="selected"';}?>><?php echo $propiedad['Nombre']; ?></option>
                    <?php } ?>      
                    </select>
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
 // Se traen todos los datos de mi usuario
$query = "SELECT  
clientes_listado.fcreacion, 
clientes_listado.email, 
clientes_listado.Nombres, 
clientes_listado.ApellidoPat,
clientes_listado.ApellidoMat,
clientes_listado.Rut, 
clientes_listado.fNacimiento,  
clientes_listado.Sexo,
clientes_listado.Fono1, 
clientes_listado.Fono2, 
clientes_listado.Ultimo_acceso,
detalle_general.Nombre AS estado,
mnt_ubicacion_ciudad.Nombre AS nombre_ciudad,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
mnt_ubicacion_villa.Nombre AS nombre_villa,
mnt_ubicacion_calles.Nombre AS nombre_calle,
clientes_listado.n_calle,
prop.Nombre AS Tipo_propiedad
FROM `clientes_listado`
LEFT JOIN `detalle_general`         ON detalle_general.id_Detalle       = clientes_listado.Estado
LEFT JOIN `mnt_ubicacion_ciudad`    ON mnt_ubicacion_ciudad.idCiudad    = clientes_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`   ON mnt_ubicacion_comunas.idComuna   = clientes_listado.idComuna
LEFT JOIN `mnt_ubicacion_villa`     ON mnt_ubicacion_villa.idVilla      = clientes_listado.idVilla
LEFT JOIN `mnt_ubicacion_calles`    ON mnt_ubicacion_calles.idCalle     = clientes_listado.idCalle
LEFT JOIN `detalle_general`  prop   ON prop.id_Detalle                  = clientes_listado.Tipo_propiedad
WHERE clientes_listado.idCliente = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todos los usuarios
$arrSolicitud = array();
$query = "SELECT 
solicitud_listado.idSolicitud,
solicitud_listado.Fcreacion,
solicitud_listado.Nombres,
solicitud_listado.ApellidoPat,
solicitud_listado.ApellidoMat,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
mnt_oirs_tipomsje.Nombre AS tipo_mensaje,
mnt_oirs_departamentos.Nombre AS departamento,
detalle_general.Nombre AS estado,
solicitud_listado.id_Oirs
FROM `solicitud_listado`
LEFT JOIN `mnt_ubicacion_comunas`     ON mnt_ubicacion_comunas.idComuna     = solicitud_listado.idComuna
LEFT JOIN `mnt_oirs_tipomsje`         ON mnt_oirs_tipomsje.id_Tipomsje      = solicitud_listado.TipoMsje
LEFT JOIN `mnt_oirs_departamentos`    ON mnt_oirs_departamentos.idDepto     = solicitud_listado.Depto
LEFT JOIN `detalle_general`           ON detalle_general.id_Detalle         = solicitud_listado.Estado
WHERE solicitud_listado.idCliente = {$_GET['view']}
ORDER BY estado DESC , idSolicitud ASC";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrSolicitud,$row );
}
// Se trae un listado con todos las oirs
$arrOirs = array();
$query = "SELECT 
oirs_listado.id_Oirs,
oirs_listado.Fecha,
detalle_general.Nombre AS estado,
mnt_oirs_origen.descripcion AS origen,
mnt_oirs_destino.descripcion AS destino,
usuarios_listado.Nombre AS usuario
FROM `oirs_listado`
LEFT JOIN    `detalle_general`          ON detalle_general.id_Detalle         = oirs_listado.Estado
LEFT JOIN    `mnt_oirs_origen`          ON mnt_oirs_origen.id_origen_a        = oirs_listado.id_origen_a
LEFT JOIN    `mnt_oirs_destino`         ON mnt_oirs_destino.id_origen_b       = oirs_listado.id_origen_b
LEFT JOIN    `usuarios_listado`         ON usuarios_listado.idUsuario         = oirs_listado.idUsuario
LEFT JOIN    `mnt_oirs_departamentos`   ON mnt_oirs_departamentos.idDepto     = oirs_listado.idDepto
INNER JOIN   `solicitud_listado`        ON solicitud_listado.id_Oirs          = oirs_listado.id_Oirs
WHERE solicitud_listado.idCliente = {$_GET['view']}
ORDER BY estado ASC, oirs_listado.id_Oirs DESC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrOirs,$row );
}


?>

<div class="col-lg-6">
	<div class="box">
		<header>
			<h5>Ver Datos del Vecino</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Datos Basicos</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombres'].' '.$rowdata['ApellidoPat'].' '.$rowdata['ApellidoMat']; ?></p>
            <p class="text-muted"><strong>Telefono Casa : </strong><?php echo $rowdata['Fono1']; ?></p>
            <p class="text-muted"><strong>Telefono Celular : </strong><?php echo $rowdata['Fono2']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Sexo : </strong><?php if($rowdata['Sexo']=='M'){echo 'Hombre';}else{echo 'Mujer';} ?></p>
            <p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['fNacimiento']); ?></p>
            <p class="text-muted"><strong>Region : </strong><?php echo $rowdata['nombre_ciudad']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['nombre_comuna']; ?></p>
            <p class="text-muted"><strong>Villa : </strong><?php echo $rowdata['nombre_villa']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['nombre_calle'].' '.$rowdata['n_calle']; ?></p>
            <p class="text-muted"><strong>Tipo de Propiedad : </strong><?php echo $rowdata['Tipo_propiedad']; ?></p>
                        
            <h2 class="text-primary">Perfil del Vecino</h2>
            <p class="text-muted"><strong>Usuario : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Estado : </strong><?php echo $rowdata['estado']; ?></p>
            <p class="text-muted"><strong>Fecha Creacion : </strong><?php echo $rowdata['fcreacion']; ?></p>
            <p class="text-muted"><strong>Ultimo Acceso : </strong><?php echo $rowdata['Ultimo_acceso']; ?></p> 
        </div>
	</div>
</div>
<div class="clearfix"></div>

<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Solicitudes</h5>
		</header>
            
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
    	<th width="100">N° Solicitud</th>
        <th width="100">F Creacion</th>
        <th>Solicitante</th>
        <th>Comuna</th>
        <th>Tipo Mensaje</th>
        <th>Departamento</th>
        <th width="80">Estado</th>
        <th width="80">OIRS</th>
        <th width="100">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrSolicitud as $solicitud) { ?>
    	<tr class="odd">
			<td class=" "><?php echo n_doc($solicitud['idSolicitud']); ?></td>
            <td class=" "><?php echo $solicitud['Fcreacion']; ?></td>
            <td class=" "><?php echo $solicitud['Nombres'].' '.$solicitud['ApellidoPat'].' '.$solicitud['ApellidoMat']; ?></td>
            <td class=" "><?php echo $solicitud['nombre_comuna']; ?></td>
            <td class=" "><?php echo $solicitud['tipo_mensaje']; ?></td>
            <td class=" "><?php echo $solicitud['departamento']; ?></td>
            <td class=" "><?php echo $solicitud['estado']; ?></td>
            <td class=" "><?php if($solicitud['id_Oirs']>0){ echo n_doc($solicitud['id_Oirs']);} ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a target="_new" href="view_solicitudes.php<?php echo '?view='.$solicitud['idSolicitud']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>  
</div>
</div>


<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de OIRS</h5>
		</header>
        
              
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
    	<th width="60">N°</th>
        <th width="100">F Creacion</th>
        <th width="472">Nombre del creador</th>
        <th width="100">Estado</th>
        <th width="160">Origen</th>
        <th width="160">Destino</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrOirs as $oirs) { ?>
    	<tr class="odd">
			<td class=" "><?php echo n_doc($oirs['id_Oirs']); ?></td>
            <td class=" "><?php echo $oirs['Fecha']; ?></td>
			<td class=" "><?php echo $oirs['usuario']; ?></td>
            <td class=" "><?php echo $oirs['estado']; ?></td>
			<td class=" "><?php echo $oirs['origen']; ?></td>
			<td class=" "><?php echo $oirs['destino']; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a target="_new" href="view_oirs.php<?php echo '?view='.$oirs['id_Oirs']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php } ?>
                
			</td>
		</tr>
    <?php } ?>                    
	</tbody>
</table>  
</div>
</div>

<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">       
<?php
//Verifico si existe la variable de busqueda y pagina
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
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
$cant_reg = 200;
//resto de variables
if (!$num_pag){
	$comienzo = 0 ;
	$num_pag = 1 ;
} else {
	$comienzo = ( $num_pag - 1 ) * $cant_reg ;
}
//Verifico si la variable de busqueda existe
if (isset($_GET['search'])){
	$z="WHERE clientes_listado.Rut LIKE '%{$_GET['search']}%'";	
} else {
	$z="";
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
clientes_listado.fcreacion, 
clientes_listado.Nombres,
clientes_listado.ApellidoPat,
clientes_listado.ApellidoMat,
clientes_listado.Ultimo_acceso,
detalle_general.Nombre AS estado
FROM `clientes_listado`
LEFT JOIN `detalle_general`  ON detalle_general.id_Detalle   = clientes_listado.Estado
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
            <button class="t_search_button2" onClick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
		</div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Vecino</a><?php }?>
</div>
<div class="clearfix"></div>                        
                                 
<div class="col-lg-12">
	<div class="box">
		<header>
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Vecinos</h5>
		</header>
        
             
	<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
	<thead>
    <tr role="row">
        <th>Rut</th>
        <th>Nombre del Vecino</th>
        <th width="160">Ultimo acceso</th>
        <th width="160">Fecha Creacion</th>
        <th width="120">Estado</th>
        <th width="120">Acciones</th>
    </tr>
	</thead>
                      
	<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">
			<td class=" sorting_1"><?php echo $usuarios['Rut']; ?></td>
			<td class=" "><?php echo $usuarios['Nombres'].' '.$usuarios['ApellidoPat'].' '.$usuarios['ApellidoMat']; ?></td>
            <td class=" "><?php echo $usuarios['Ultimo_acceso']; ?></td>
			<td class=" "><?php echo $usuarios['fcreacion']; ?></td>
			<td class=" "><?php echo $usuarios['estado']; ?></td>
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$usuarios['idCliente']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>   
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$usuarios['idCliente']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$usuarios['idCliente'];?>
				<a onClick="msg('<?php echo $ubicacion ?>')" title="Borrar Informacion" class="icon-borrar info-tooltip"></a><?php }?>
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