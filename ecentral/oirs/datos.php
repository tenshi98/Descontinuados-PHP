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
$original = "datos.php";
$location = $original;
/**********************************************************************************************************************************/
/*                                     Se cargan los datos relacionados a la empresa                                              */
/**********************************************************************************************************************************/
require_once 'core/datos_empresa.php';
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//formulario para editar datos
if ( !empty($_POST['edit_datos']) )  {
	//Se agregan nuevas ubicaciones
	$location.='?mod=true'; 
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuarios_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuarios_listado_4.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/usuarios_listado.php';
}
//formulario para cambiar contraseña
if ( !empty($_POST['edit_clave']) )  { 
	//Se agregan nuevas ubicaciones
	$location.='?password=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/usuarios_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/usuarios_listado_3.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/usuarios_listado.php';
}
?>
<!doctype html>
<html class="no-js"><!-- InstanceBegin template="/Templates/administrador.dwt" codeOutsideHTMLIsLocked="false" -->
  <head>
    <meta charset="UTF-8">
    <!-- InstanceBeginEditable name="doctitle" -->
    <title>Mis Datos</title>
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
            <i class="fa fa-dashboard"></i> Mis Datos Personales
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
<?php  if (isset($_GET['mod'])) {?>
<div id="txf_03" class="alert_sucess">  
	Tus datos han sido modificados correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php  if (isset($_GET['password'])) {?>
<div id="txf_03" class="alert_sucess">  
	Tu clave ha sido modificada correctamente
	<a class="closed_c" href="javascript:void(0);" onClick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">
		<i class="fa fa-times"></i>
	</a>
</div>
<?php }?>
<?php ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if ( ! empty($_GET['clave']) ) { ?>
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificar Mi Contraseña</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Password Antigua</label>
				<div class="col-lg-8">
					<input type="password" id="text2" placeholder="Password Antigua" class="form-control" name="oldpassword" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nueva Password</label>
				<div class="col-lg-8">
					<input type="password" id="text2" placeholder="Nueva Password" class="form-control" name="password" required>
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Reingresar Nueva Password</label>
				<div class="col-lg-8">
					<input type="password" id="text2" placeholder="Reingresar Nueva Password" class="form-control" name="repassword" required>
				</div>
			</div>
                      
			<div class="form-group">
            	<input type="hidden" value="<?php echo $arrUsuario['idUsuario']; ?>" name="idUsuario">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Cambiar Password" name="edit_clave">
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } elseif ( ! empty($_GET['id']) ) { 
// Se traen todos los datos de mi usuario
$query = "SELECT usuario, tipo, email, Nombre, Rut, fNacimiento, Fono, Direccion_img,idCiudad, idComuna,idCalle, n_calle
FROM `usuarios_listado`
WHERE idUsuario = {$arrUsuario['idUsuario']}";
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
array_multisort($Calle, SORT_ASC);	?>
 
<div class="col-lg-6 fcenter">
	<div class="box dark">
		<header>
			<div class="icons"><i class="fa fa-edit"></i></div>
			<h5>Modificar Mis Datos</h5>
		</header>
		<div id="div-1" class="body">
		<form class="form-horizontal" method="post" name="form1">
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Nombre</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Nombre" class="form-control" value="<?php echo $rowdata['Nombre']; ?>" name="Nombre" required >
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Fono</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Fono" class="form-control" value="<?php echo $rowdata['Fono']; ?>" name="Fono">
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Email</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Email" class="form-control" value="<?php echo $rowdata['email']; ?>" name="email" required >
				</div>
			</div>
                      
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Rut</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="Rut" class="form-control" value="<?php echo $rowdata['Rut']; ?>" name="Rut">
				</div>
			</div>
            
            <div class="form-group">
                <label for="text2" class="control-label col-lg-4">Fecha de Nacimiento</label>
				<div class="col-lg-8">
                    <input type="text" class="form-control" name="fNacimiento" id="datepicker" readonly value="<?php echo $rowdata['fNacimiento']; ?>" placeholder="Fecha de Nacimiento" >
                </div>
            </div>
                                  
			<div class="form-group">
				<label for="text2" class="control-label col-lg-4">Region</label>
				<div class="col-lg-8">
                    <select name="idCiudad" class="form-control" onChange="cambia_ciudad()" required >
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
                    <select name="idComuna" class="form-control" onChange="cambia_comuna()" required >  
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
				<label for="text2" class="control-label col-lg-4">URL Imagen</label>
				<div class="col-lg-8">
					<input type="text" id="text2" placeholder="URL Imagen" class="form-control" value="<?php echo $rowdata['Direccion_img']; ?>" name="Direccion_img"  >
				</div>
			</div>
            
			<div class="form-group">
            	<input type="hidden" value="<?php echo $arrUsuario['idUsuario']; ?>" name="idUsuario">
				<input type="submit" id="text2"  class="btn btn-primary fright margin_width" value="Guardar Cambios" name="edit_datos">
				<a href="<?php echo $location; ?>" class="btn btn-danger fright margin_width" data-original-title="" title="">Cancelar y Volver</a>
			</div>
                      
			</form> 
                    
		</div>
	</div>
</div>
 
<?php /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
// Se traen todos los datos de mi usuario
$query = "SELECT 
usuarios_listado.usuario, 
usuarios_listado.tipo, 
usuarios_listado.email, 
usuarios_listado.Nombre, 
usuarios_listado.Rut, 
usuarios_listado.fNacimiento, 
usuarios_listado.Fono, 
mnt_ubicacion_ciudad.Nombre AS nombre_ciudad,
mnt_ubicacion_comunas.Nombre AS nombre_comuna,
mnt_ubicacion_calles.Nombre AS nombre_calle,
usuarios_listado.n_calle
FROM `usuarios_listado`
LEFT JOIN `mnt_ubicacion_ciudad`    ON mnt_ubicacion_ciudad.idCiudad    = usuarios_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`   ON mnt_ubicacion_comunas.idComuna   = usuarios_listado.idComuna
LEFT JOIN `mnt_ubicacion_calles`    ON mnt_ubicacion_calles.idCalle     = usuarios_listado.idCalle
WHERE idUsuario = {$arrUsuario['idUsuario']}";
$resultado = mysql_query ($query, $dbConn);
$rowdata = mysql_fetch_assoc ($resultado);	?>

<div class="col-lg-6 fcenter">
	<div class="box">
		<header>
			<h5>Mis datos</h5>
			<div class="toolbar"></div>
		</header>
        <div class="body">
            <h2 class="text-primary">Basicos</h2>
            <p class="text-muted"><strong>Nombre : </strong><?php echo $rowdata['Nombre']; ?></p>
            <p class="text-muted"><strong>Fono : </strong><?php echo $rowdata['Fono']; ?></p>
            <p class="text-muted"><strong>Email : </strong><?php echo $rowdata['email']; ?></p>
            <p class="text-muted"><strong>Rut : </strong><?php echo $rowdata['Rut']; ?></p>
            <p class="text-muted"><strong>Fecha de Nacimiento : </strong><?php echo Fecha_completa($rowdata['fNacimiento']); ?></p>
            <p class="text-muted"><strong>Region : </strong><?php echo $rowdata['nombre_ciudad']; ?></p>
            <p class="text-muted"><strong>Comuna : </strong><?php echo $rowdata['nombre_comuna']; ?></p>
            <p class="text-muted"><strong>Direccion : </strong><?php echo $rowdata['nombre_calle'].' '.$rowdata['n_calle']; ?></p>
                        
            <h2 class="text-primary">Perfil</h2>
            <p class="text-muted"><strong>Usuario : </strong><?php echo $rowdata['usuario']; ?></p>
            <p class="text-muted"><strong>Tipo de usuario : </strong><?php echo $rowdata['tipo']; ?></p>
        	
            <a href="<?php echo $location ?>?id=true" class="btn btn-primary" data-original-title="" title="">Editar Datos</a>
			<a href="<?php echo $location ?>?clave=true" class="btn btn-primary" data-original-title="" title="">Cambiar Password</a>
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