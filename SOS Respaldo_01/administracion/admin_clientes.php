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
$original = "admin_clientes.php";
$location = $original;
//Verifico los permisos del usuario sobre la transaccion
require_once '../AA2D2CFFDJFDJX1/xrxs_trans/permisos.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para crear usuario
if ( !empty($_POST['submit']) )  { 
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];if(isset($_GET['search']) && $_GET['search'] != '')              { $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')                                                     { $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')                                 { $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')                                 { $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ $location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                                                         { $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != '')                                                     { $location .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')                                                 { $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')                                                 { $location .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')                                           { $location .= "&dispositivo=".$_GET['dispositivo'] ; }
$location.='&create=true';
//Llamamos a las partes del formulario
require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_1.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_listado.php';
}
//formulario para editar usuario
if ( !empty($_POST['submit_edit']) )  { 
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != '')                                                     { $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')                                                     { $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')                                 { $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')                                 { $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ $location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                                                         { $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != '')                                                     { $location .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')                                                 { $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')                                                 { $location .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')                                           { $location .= "&dispositivo=".$_GET['dispositivo'] ; }
$location.='&mod=true';
//Llamamos a las partes del formulario
require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_listado.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
//Se agregan ubicaciones
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != '')                                                     { $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')                                                     { $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')                                 { $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')                                 { $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ $location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                                                         { $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != '')                                                     { $location .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')                                                 { $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')                                                 { $location .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')                                           { $location .= "&dispositivo=".$_GET['dispositivo'] ; }
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
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.10.4.custom.css" />    
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
  $(document).ready(function() {
    $("#datepicker").datepicker({ dateFormat: "yy-mm-dd" }).val();$.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi??rcoles', 'Jueves', 'Viernes', 'S??bado'],
        dayNamesShort: ['Dom','Lun','Mar','Mi??','Juv','Vie','S??b'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S??'],
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
if (confirm("??Realmente deseas eliminar el registro?")) {
        //Env??a el formulario
        location=direccion;
    } else {
        //No env??a el formulario
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
<?php  if (isset($errors[12])) {echo $errors[12];}?>
<?php  if (isset($errors[13])) {echo $errors[13];}?>
<?php  if (isset($errors[14])) {echo $errors[14];}?>
<?php  if (isset($errors[15])) {echo $errors[15];}?>
<?php  if (isset($errors[16])) {echo $errors[16];}?>
<?php  if (isset($errors[17])) {echo $errors[17];}?>
<?php  if (isset($errors[18])) {echo $errors[18];}?>
<?php  if (isset($errors[19])) {echo $errors[19];}?>
<?php  if (isset($errors[20])) {echo $errors[20];}?>
<?php  if (isset($errors[21])) {echo $errors[21];}?>
<?php  if (isset($errors[22])) {echo $errors[22];}?>
<?php  if (isset($errors[23])) {echo $errors[23];}?>
<?php  if (isset($_GET['create'])) {?>
<div id="txf_03" class="alert_sucess">  Cliente Creado correctamente
<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">	<i class="fa fa-times"></i></a>
</div>
<?php }?>
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  Cliente Modificado correctamente
<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">	<i class="fa fa-times"></i></a>
</div>
<?php }?>
<?php  if (isset($_GET['delete'])) {?>
<div id="txf_03" class="alert_sucess">  Cliente borrado correctamente
<a class="closed_c" href="javascript:void(0);" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">	<i class="fa fa-times"></i></a>
</div>
<?php }?>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT   email, Nombre, Apellido_Paterno, Apellido_Materno, Sexo , Rut, fNacimiento, Direccion, Fono1, Fono2, idCiudad, idComuna, idTipoCliente
FROM `clientes_listado`
WHERE idCliente = {$_GET['id']}";
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
					<label for="text2" class="control-label col-lg-4">Apellido Paterno</label>			
					<div class="col-lg-8">				
						<input type="text" id="text2" placeholder="Apellido Paterno" class="form-control" value="<?php if(isset($Apellido_Paterno)) {echo $Apellido_Paterno;} else {echo $rowdata['Apellido_Paterno'];}?>"  name="Apellido_Paterno" required>			
					</div>		
				</div>
				
				<div class="form-group">			
					<label for="text2" class="control-label col-lg-4">Apellido Materno</label>			
					<div class="col-lg-8">				
						<input type="text" id="text2" placeholder="Apellido Materno" class="form-control" value="<?php if(isset($Apellido_Materno)) {echo $Apellido_Materno;} else {echo $rowdata['Apellido_Materno'];}?>"  name="Apellido_Materno" required>			
					</div>		
				</div>
				
				
				<div class="form-group">			
					<label for="text2" class="control-label col-lg-4">Sexo</label>			
					<div class="col-lg-8">
						<select name="Sexo" class="form-control"  required>
							<option value="" selected="selected">Seleccione Sexo</option>
							<option value="M" <?php if(isset($Sexo)&&$Sexo=='M'){echo 'selected="selected"';}elseif($rowdata['Sexo']=='M'){echo 'selected="selected"';}?>>Masculino</option>				
							<option value="F" <?php if(isset($Sexo)&&$Sexo=='F'){echo 'selected="selected"';}elseif($rowdata['Sexo']=='F'){echo 'selected="selected"';}?>>Femenino</option>        
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
					<label class="control-label col-lg-4">Fecha de Nacimiento</label>			
					<div class="col-lg-8">				
						<div class="input-group bootstrap-timepicker">					
							<input placeholder="Fecha de Nacimiento" class="form-control timepicker-default" type="text" name="fNacimiento" id="datepicker" value="<?php if(isset($fNacimiento)) {echo $fNacimiento;} else {echo $rowdata['fNacimiento'];}?>" required>					
							<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 				
						</div>			
					</div>		
				</div>
									 
				<div class="form-group">			
					<label for="text2" class="control-label col-lg-4">Region</label>			
					<div class="col-lg-8">
						<select name="idCiudad" class="form-control"  onChange="cambia_ciudad()">
							<option value="" selected="selected">Seleccione una Region</option>
							<?php foreach ($arrCiudad as $ciudad) { ?>
							<option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';} elseif($rowdata['idCiudad']==$ciudad['idCiudad']){ echo 'selected="selected"'; }?>><?php echo $ciudad['Nombre']; ?></option>
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
							<option value="<?php echo $comunas['idComuna']; ?>" <?php if(isset($idComuna)&&$idComuna==$comunas['idComuna']) {echo 'selected="selected"';} elseif($rowdata['idComuna']==$comunas['idComuna']){ echo 'selected="selected"'; }?>><?php echo $comunas['Nombre']; ?></option>
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
try {if (Componente != '') {	
id_comuna=eval("id_comuna_" + Componente)	
comuna=eval("comuna_" + Componente)	
num_int = id_comuna.length	
document.form1.idComuna.length = num_int	
for(i=0;i<num_int;i++){	   
document.form1.idComuna.options[i].value=id_comuna[i]	   
document.form1.idComuna.options[i].text=comuna[i]	
}	
}else{	document.form1.idComuna.length = 1	
document.form1.idComuna.options[0].value = ""    
document.form1.idComuna.options[0].text = "Seleccione una Comuna"}} catch (e) {
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


<?php //Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
// Se trae un listado con todos los usuarios
$arrTipoCliente = array();
$query = "SELECT idTipoCliente,Nombre
FROM `clientes_tipos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipoCliente,$row );
}?>

				<div class="form-group">
					<label for="text2" class="control-label col-lg-4">Sistema</label>
					<div class="col-lg-8">	
						<select name="idTipoCliente" class="form-control" required >		
							<option value="" selected="selected">Seleccione el Sistema Relacionado</option>		
							<?php foreach ($arrTipoCliente as $tipo) { ?>
							<option value="<?php echo $tipo['idTipoCliente']; ?>" <?php if(isset($idTipoCliente)&&$idTipoCliente==$tipo['idTipoCliente']) {echo 'selected="selected"';}elseif($rowdata['idTipoCliente']==$tipo['idTipoCliente']) {echo 'selected="selected"';} ?>><?php echo $tipo['Nombre']; ?></option>
							<?php } ?>             	
						</select>
					</div>
				</div>		
				<?php }?>            
				<div class="form-group">
				<input type="hidden" value="<?php echo $_GET['id']; ?>" name="idCliente">			
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit_edit"> 
				<?php //Se verifican las variables
				$location = $original; 
				$location .='?pagina='.$_GET['pagina'];
				if(isset($_GET['search']) && $_GET['search'] != '')                                                     { $location .= "&search=".$_GET['search'] ; 	}
				if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')                                                     { $location .= "&Nombre=".$_GET['Nombre'] ; }
				if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')                                 { $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
				if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')                                 { $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
				if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ $location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; }
				if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                                                         { $location .= "&Sexo=".$_GET['Sexo'] ; }
				if(isset($_GET['Estado']) && $_GET['Estado'] != '')                                                     { $location .= "&Estado=".$_GET['Estado'] ; }
				if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')                                                 { $location .= "&idCiudad=".$_GET['idCiudad'] ; }
				if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')                                                 { $location .= "&idComuna=".$_GET['idComuna'] ; }
				if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')                                           { $location .= "&dispositivo=".$_GET['dispositivo'] ; }
				?>			
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
					<label for="text2" class="control-label col-lg-4">Apellido Paterno</label>			
					<div class="col-lg-8">			
						<input type="text" id="text2" placeholder="Apellido Paterno" class="form-control"  name="Apellido_Paterno" <?php if(isset($Apellido_Paterno)) {echo 'value="'.$Apellido_Paterno.'"';}?> required >			
					</div>		
				</div>
							
				<div class="form-group">			
					<label for="text2" class="control-label col-lg-4">Apellido Materno</label>			
					<div class="col-lg-8">			
						<input type="text" id="text2" placeholder="Apellido Materno" class="form-control"  name="Apellido_Materno" <?php if(isset($Apellido_Materno)) {echo 'value="'.$Apellido_Materno.'"';}?> required >			
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
					<label class="control-label col-lg-4">Fecha de Nacimiento</label>			
					<div class="col-lg-8">				
						<div class="input-group bootstrap-timepicker">					
							<input placeholder="Fecha de Nacimiento" class="form-control timepicker-default" type="text" name="fNacimiento" id="datepicker" <?php if(isset($fNacimiento)) {echo 'value="'.$fNacimiento.'"';}?> required>					
							<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 				
						</div>			
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
try {if (Componente != '') {	
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
					<label for="text2" class="control-label col-lg-4">Nombre de Usuario</label>			
					<div class="col-lg-8">				
						<input type="text" id="text2" placeholder="Nombre de Usuario" class="form-control"  name="usuario" <?php if(isset($usuario)) {echo 'value="'.$usuario.'"';}?> required>			
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




<?php //Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){
// Se trae un listado con todos los usuarios
$arrTipoCliente = array();
$query = "SELECT idTipoCliente,Nombre
FROM `clientes_tipos`
ORDER BY Nombre ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrTipoCliente,$row );
}?>

<div class="form-group">
	<label for="text2" class="control-label col-lg-4">Sistema</label>
	<div class="col-lg-8">	
		<select name="idTipoCliente" class="form-control" required >		
			<option value="" selected="selected">Seleccione el Sistema Relacionado</option>		
			<?php foreach ($arrTipoCliente as $tipo) { ?>		
			<option value="<?php echo $tipo['idTipoCliente']; ?>" <?php if(isset($idTipoCliente)&&$idTipoCliente==$tipo['idTipoCliente']) {echo 'selected="selected"';} ?>><?php echo $tipo['Nombre']; ?></option>		
			<?php } ?>             	
		</select>
	</div>
</div>	
<?php }else{?>
<input type="hidden" name="idTipoCliente"   value="<?php echo $arrUsuario['idTipoCliente'] ?>">		
<?php }?>
            
            
            
           		<div class="form-group">
					<input type="hidden" value="1" name="Estado">
					<input type="hidden" value="<?php echo date("Y-m-d"); ?>" name="fcreacion">			
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="submit">
					<?php //Se verifican las variables
					$location = $original; 
					$location .='?pagina='.$_GET['pagina'];
					if(isset($_GET['search']) && $_GET['search'] != '')                                                     { $location .= "&search=".$_GET['search'] ; 	}
					if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')                                                     { $location .= "&Nombre=".$_GET['Nombre'] ; }
					if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')                                 { $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
					if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')                                 { $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
					if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ $location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; }
					if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                                                         { $location .= "&Sexo=".$_GET['Sexo'] ; }
					if(isset($_GET['Estado']) && $_GET['Estado'] != '')                                                     { $location .= "&Estado=".$_GET['Estado'] ; }
					if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')                                                 { $location .= "&idCiudad=".$_GET['idCiudad'] ; }
					if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')                                                 { $location .= "&idComuna=".$_GET['idComuna'] ; }
					if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')                                           { $location .= "&dispositivo=".$_GET['dispositivo'] ; }?>			
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
clientes_listado.usuario, 
clientes_listado.fcreacion, 
clientes_listado.email, 
clientes_listado.Nombre, 
clientes_listado.Apellido_Paterno, 
clientes_listado.Apellido_Materno, 
clientes_listado.Rut, 
clientes_listado.fNacimiento, 
clientes_listado.Direccion, 
clientes_listado.Fono1, 
clientes_listado.Fono2, 
mnt_ubicacion_ciudad.Nombre AS nombre_region,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
clientes_listado.Ultimo_acceso,
detalle_general.Nombre AS estado,
clientes_tipos.Nombre AS sistema
FROM `clientes_listado`
LEFT JOIN `detalle_general`           ON detalle_general.id_Detalle         = clientes_listado.Estado
LEFT JOIN `mnt_ubicacion_ciudad`      ON mnt_ubicacion_ciudad.idCiudad      = clientes_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`     ON mnt_ubicacion_comunas.idComuna     = clientes_listado.idComuna
LEFT JOIN `clientes_tipos`            ON clientes_tipos.idTipoCliente       = clientes_listado.idTipoCliente
WHERE clientes_listado.idCliente = {$_GET['view']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	
// Se trae un listado con todas las observaciones el cliente
$arrObservaciones = array();
$query = "SELECT 
usuarios_listado.Nombre AS nombre_usuario,
clientes_observaciones.Fecha,
clientes_observaciones.Observacion
FROM `clientes_observaciones`
LEFT JOIN `usuarios_listado`   ON usuarios_listado.idUsuario     = clientes_observaciones.idUsuario
WHERE clientes_observaciones.idCliente = {$_GET['view']}
ORDER BY clientes_observaciones.idObservacion ASC ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrObservaciones,$row );
}
?>

<div class="col-lg-8">
	<div class="box">	
		<header>		
			<h5>Ver Datos del Cliente</h5>		
			<div class="toolbar"></div>	
		</header>
        <div class="body">
            <h2 class="text-primary">Datos Basicos</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombre'].' '.$rowdata['Apellido_Paterno'].' '.$rowdata['Apellido_Materno']; ?></p>
            <p class="text-muted"><strong>Telefono 1 : </strong><?php echo $rowdata['Fono1']; ?></p>
            <p class="text-muted"><strong>Telefono 2 : </strong><?php echo $rowdata['Fono2']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['fNacimiento']); ?></p>
            <p class="text-muted"><strong>Region : </strong><?php echo $rowdata['nombre_region']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['nombre_comuna']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['Direccion']; ?></p>
            <p class="text-muted"><strong>Sistema Relacionado : </strong><?php echo $rowdata['sistema']; ?></p>
                        
            <h2 class="text-primary">Perfil del Cliente</h2>
            <p class="text-muted"><strong>Usuario : </strong><?php echo $rowdata['usuario']; ?></p>
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
			<div class="icons"><i class="fa fa-table"></i></div>
			<h5>Listado de Observaciones</h5>	
		</header>
        
        <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th>Autor</th>
				<th>Fecha</th>
				<th>Observacion</th>
			</tr>
		</thead>
		<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrObservaciones as $observaciones) { ?>
    	<tr class="odd">		
			<td class=" "><?php echo $observaciones['nombre_usuario']; ?></td>
            <td class=" "><?php echo $observaciones['Fecha']; ?></td>		
			<td class=" word_break"><?php echo $observaciones['Observacion']; ?></td>	
		</tr>
    <?php } ?>                    
	</tbody>
</table> 
</div>
</div>


<div class="clearfix"></div>
<div class="col-lg-12 fcenter" style="margin-bottom:30px">
<?php //Se verifican las variables
$location = $original; 
$location .='?pagina='.$_GET['pagina'];
if(isset($_GET['search']) && $_GET['search'] != '')                                                     { $location .= "&search=".$_GET['search'] ; 	}
if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')                                                     { $location .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')                                 { $location .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')                                 { $location .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ $location .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ; }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')                                                         { $location .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != '')                                                     { $location .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')                                                 { $location .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')                                                 { $location .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')                                           { $location .= "&dispositivo=".$_GET['dispositivo'] ; }
?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['fullsearch']) ) { 
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
// Se trae un listado de todos los estados
$arrEstados = array();
$query = "SELECT  id_Detalle, Nombre
FROM `detalle_general`
WHERE Tipo=1
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrEstados,$row );
}?>
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.10.4.custom.css" />    
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script>
$(function() {
       $("#datepicker1").datepicker({ dateFormat: "yy-mm-dd" }).val()   
	   $("#datepicker2").datepicker({ dateFormat: "yy-mm-dd" }).val()      
	   $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi??rcoles', 'Jueves', 'Viernes', 'S??bado'],
        dayNamesShort: ['Dom','Lun','Mar','Mi??','Juv','Vie','S??b'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S??'],
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
 <div class="col-lg-6 fcenter">
 <div class="box dark">	
 <header>		
 <div class="icons"><i class="fa fa-edit"></i></div>		
 <h5>Filtro para Busqueda Avanzada</h5>	
 </header>	<div id="div-1" class="body">	
 <form class="form-horizontal" action="<?php echo $location ?>" name="form1" >		
            
            <div class="form-group">			
				<label for="text2" class="control-label col-lg-4">Nombres</label>			
				<div class="col-lg-8">				
					<input type="text" id="text2" placeholder="Nombre de Usuario" class="form-control"  name="Nombre"  >			
				</div>		
			</div>
            
            <div class="form-group">			
				<label for="text2" class="control-label col-lg-4">Apellido Paterno</label>			
				<div class="col-lg-8">				
					<input type="text" id="text2" placeholder="Apellido Paterno" class="form-control"  name="Apellido_Paterno"  >			
				</div>		
			</div>
            
            <div class="form-group">			
				<label for="text2" class="control-label col-lg-4">Apellido Materno</label>			
				<div class="col-lg-8">				
					<input type="text" id="text2" placeholder="Apellido Materno" class="form-control"  name="Apellido_Materno"  >			
				</div>		
			</div>
            
			<div class="form-group">			
				<label class="control-label col-lg-4">Fecha Nacimiento - Inicio</label>			
				<div class="col-lg-8">				
					<div class="input-group bootstrap-timepicker">					
						<input placeholder="Rango Fechas inicio" class="form-control timepicker-default" type="text" name="rango_a" id="datepicker1" >					
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 				
					</div>			
				</div>		
			</div>
            
            <div class="form-group">			
				<label class="control-label col-lg-4">Fecha Nacimiento - Termino</label>			
				<div class="col-lg-8">				
					<div class="input-group bootstrap-timepicker">					
						<input placeholder="Rango Fechas termino" class="form-control timepicker-default" type="text" name="rango_b" id="datepicker2" >					
						<span class="input-group-addon add-on"><i class="fa fa-calendar"></i></span> 				
					</div>			
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
				<label for="text2" class="control-label col-lg-4">Estado Cliente</label>			
				<div class="col-lg-8">
                    <select name="Estado" class="form-control" >
						<option value="" selected="selected">Seleccione un Estado</option>
						<?php foreach ($arrEstados as $estado) { ?>
						<option value="<?php echo $estado['id_Detalle']; ?>" ><?php echo $estado['Nombre']; ?></option>
						<?php } ?>             
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
try {if (Componente != '') {	
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
document.form1.idComuna.options[0].text = "Seleccione una Comuna"}} catch (e) {
    alert("La Region seleccionada no posee comunas asignadas");
}document.form1.idComuna.options[0].selected = true
}
</script>
            
				<div class="form-group">
					<label for="text2" class="control-label col-lg-4">Dispositivo</label>
					<div class="col-lg-8">
						<select name="dispositivo" class="form-control" >
							<option value="" selected>Seleccione un dispositivo</option>
							<option value="android" >Android</option>
							<option value="iphone" >Iphone</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<input type="hidden"  value="<?php echo $_GET['pagina'] ?>" name="pagina">			
					<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Filtrar" name="filtrar">				
				</div>
			</form> 
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
}?>
<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Volver</a>
<div class="clearfix"></div>
</div>  
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
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
//Le agrego condiciones a la consulta
//Verifico el tipo de usuario que esta ingresando
if($arrUsuario['tipo']=='SuperAdmin'){$z="WHERE clientes_listado.idTipoCliente>=0";	
}else{$z="WHERE clientes_listado.idTipoCliente={$arrUsuario['idTipoCliente']}";	
}

//Bloque de filtros
$x = '';
//Verifico si la variable de busqueda existe
if (isset($_GET['search']) && $_GET['search'] != ''){$z .=" AND clientes_listado.Rut LIKE '%{$_GET['search']}%'";$x .= "&search=".$_GET['search'] ; 	}

if(isset($_GET['Nombre']) && $_GET['Nombre'] != '')  { $z .= " AND clientes_listado.Nombre LIKE '%{$_GET['Nombre']}%' " ;$x .= "&Nombre=".$_GET['Nombre'] ; }
if(isset($_GET['Apellido_Paterno']) && $_GET['Apellido_Paterno'] != '')  { $z .= " AND clientes_listado.Apellido_Paterno LIKE '%{$_GET['Apellido_Paterno']}%' " ;$x .= "&Apellido_Paterno=".$_GET['Apellido_Paterno'] ; }
if(isset($_GET['Apellido_Materno']) && $_GET['Apellido_Materno'] != '')  { $z .= " AND clientes_listado.Apellido_Materno LIKE '%{$_GET['Apellido_Materno']}%' " ;$x .= "&Apellido_Materno=".$_GET['Apellido_Materno'] ; }
if(isset($_GET['rango_a']) && $_GET['rango_a'] != ''&&isset($_GET['rango_b']) && $_GET['rango_b'] != ''){ $z .= " AND clientes_listado.fNacimiento BETWEEN '{$_GET['rango_a']}' AND '{$_GET['rango_b']}'" ;$x .= "&rango_a={$_GET['rango_a']}&rango_b={$_GET['rango_b']}" ;           }
if(isset($_GET['Sexo']) && $_GET['Sexo'] != '')  { $z .= " AND clientes_listado.Sexo = '".$_GET['Sexo']."'" ;$x .= "&Sexo=".$_GET['Sexo'] ; }
if(isset($_GET['Estado']) && $_GET['Estado'] != '')  { $z .= " AND clientes_listado.Estado = '".$_GET['Estado']."'" ;$x .= "&Estado=".$_GET['Estado'] ; }
if(isset($_GET['idCiudad']) && $_GET['idCiudad'] != '')  { $z .= " AND clientes_listado.idCiudad = '".$_GET['idCiudad']."'" ;$x .= "&idCiudad=".$_GET['idCiudad'] ; }
if(isset($_GET['idComuna']) && $_GET['idComuna'] != '')  { $z .= " AND clientes_listado.idComuna = '".$_GET['idComuna']."'" ;$x .= "&idComuna=".$_GET['idComuna'] ; }
if(isset($_GET['dispositivo']) && $_GET['dispositivo'] != '')  { $z .= " AND clientes_listado.dispositivo = '".$_GET['dispositivo']."'" ;$x .= "&dispositivo=".$_GET['dispositivo'] ; }

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
clientes_listado.Nombre,
clientes_listado.Apellido_Paterno,
clientes_listado.Apellido_Materno,
detalle_general.Nombre AS estado,
clientes_tipos.RazonSocial AS sistema
FROM `clientes_listado`
LEFT JOIN `detalle_general`   ON detalle_general.id_Detalle     = clientes_listado.Estado
LEFT JOIN `clientes_tipos`    ON clientes_tipos.idTipoCliente   = clientes_listado.idTipoCliente
".$z."
ORDER BY clientes_listado.Nombre ASC
LIMIT $comienzo, $cant_reg ";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrUsers,$row );
}
//Defino nuevas ubicaciones
$location .='?pagina='.$_GET['pagina'];
if (isset($_GET['search'])) { 
$location .='&search='.$_GET['search'];
}
$location .= $x;?>
<div class="form-group">
<form class="form-horizontal" action="<?php echo $location ?>"  name="form1">
<label class="control-label col-lg-4">Buscar Cliente</label>
    <div class="col-lg-5">	<div class="input-group bootstrap-timepicker">
        	<input type="hidden" name="pagina" value="<?php echo $_GET['pagina']; ?>" >		
			<input class="form-control timepicker-default" type="text" name="search" value="<?php if (isset($_GET['search'])) { echo $_GET['search'];}?>" placeholder="Rut">
            <button type="submit" class="t_search_button"><i class="fa fa-search"></i></button>
            <a href="<?php echo $location; ?>&fullsearch=true" class="t_search_button_full" ><i class="fa fa-search-plus"></i></a>
            <button class="t_search_button2" onclick="document.form1.search.value = '';"><i class="fa fa-trash-o"></i></button>
           </div>
    </div>
</form>
<?php if ($rowlevel['level']>=3){?><a href="<?php echo $location; ?>&new=true" class="btn btn-default fright margin_width" >Crear Nuevo Cliente</a><?php }?>
</div>
<div class="clearfix"></div>                     
                                 
<div class="col-lg-12">
	<div class="box">	
		<header>		
			<div class="icons"><i class="fa fa-table"></i></div><h5>Listado de Clientes</h5>	
		</header>
        
		<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped dataTable">
		<thead>
			<tr role="row">
				<th width="209">Rut</th>
				<th>Nombre del Cliente</th>
				<th width="160">Sistema</th>
				<th width="120">Estado</th>
				<th width="120">Acciones</th>
			</tr>
		</thead>
		<tbody role="alert" aria-live="polite" aria-relevant="all">
    <?php foreach ($arrUsers as $usuarios) { ?>
    	<tr class="odd">		
			<td class=" sorting_1"><?php echo $usuarios['Rut']; ?></td>		
			<td class=" "><?php echo $usuarios['Nombre'].' '.$usuarios['Apellido_Paterno'].' '.$usuarios['Apellido_Materno']; ?></td>		
			<td class=" "><?php echo $usuarios['sistema']; ?></td>
            <td class=" "><?php echo $usuarios['estado']; ?></td>		
			<td class=" ">
<?php if ($rowlevel['level']>=1){?><a href="<?php echo $location.'&view='.$usuarios['idCliente']; ?>" title="Ver Informacion" class="icon-ver info-tooltip"></a><?php }?>   
<?php if ($rowlevel['level']>=2){?><a href="<?php echo $location.'&id='.$usuarios['idCliente']; ?>" title="Editar Informacion" class="icon-editar info-tooltip"></a><?php }?>
<?php if ($rowlevel['level']>=4){?><?php $ubicacion=$location.'&del='.$usuarios['idCliente'];?>			
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
        <div class="contaux">
            <div class="dataTables_paginate paging_bootstrap">
                <ul class="pagination menucent">
                	<?php if(($num_pag - 1) > 0) { ?>
                    <li class="prev"><a href="<?php echo $location.($num_pag-1).$x ?>">??? Anterior</a></li>
                    <?php } else {?>
                    <li class="prev disabled"><a href="">??? Anterior</a></li>
                    <?php } ?>
                    
                    <?php if ($total_paginas>10){					if(0>$num_pag-5){						for ($i = 1; $i <= 10; $i++) { ?>						<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>						<?php }					}elseif($total_paginas<$num_pag+5){						for ($i = $num_pag-5; $i <= $total_paginas; $i++) { ?>						<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>						<?php }						}else{						for ($i = $num_pag-4; $i <= $num_pag+5; $i++) { ?>						<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>						<?php }						}						}else{					for ($i = 1; $i <= $total_paginas; $i++) { ?>
                   		<li <?php if ($i==$num_pag){ echo 'class="active"';}?>><a href="<?php echo $location.$i.$x ?>"><?php echo $i ?></a></li>
                        <?php }					}?>
                    <?php if(($num_pag + 1)<=$total_paginas) { ?>
                    <li class="next"><a href="<?php echo $location.($num_pag+1).$x ?>">Siguiente ??? </a></li>
                    <?php } else {?>
                    <li class="next disabled"><a href="">Siguiente ??? </a></li>
                    <?php } ?>
                </ul>
            </div> 
        </div>
    </div>
<?php }?>   
</div>
</div>

<?php } ?>           		<!-- InstanceEndEditable -->   
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