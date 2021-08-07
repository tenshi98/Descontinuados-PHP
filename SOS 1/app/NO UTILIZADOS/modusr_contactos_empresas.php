<?php session_start();
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/conexion.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/tipo_usuario2.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
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
$location = "modusr_contactos_empresas.php";
$location .= $w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Formulario creacion
if ( !empty($_POST['submit_create']) )  { 
	//Agregamos direcciones
	$location.='&create=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_contacto_empresas.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_contacto_empresas_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_contacto_empresas.php';
}
//Formulario edicion
if ( !empty($_POST['submit_edit']) )  { 
	//Agregamos direcciones
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_contacto_empresas.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_contacto_empresas_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_contacto_empresas.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	$location.='&deleted=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/clientes_contacto_empresas.php';
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Contacto Empresas</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->


<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<div class="text_content pd_top_5">

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

<?php  if (isset($_GET['create'])) {?>
<div class="alert alert-success alert-dismissable" id="txf_01">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_01&apos;).className = &apos;oculto&apos;">&times;</button>
    <p class="long_txt"><b>Alerta!</b> Empresa Creada correctamente.</p>
</div>
<?php }?>      
<?php  if (isset($_GET['mod'])) {?>
<div class="alert alert-success alert-dismissable" id="txf_02">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">&times;</button>
    <p class="long_txt"><b>Alerta!</b> Empresa  editada correctamente.</p>
</div>
<?php }?>
<?php  if (isset($_GET['deleted'])) {?>
<div class="alert alert-success alert-dismissable" id="txf_03">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
    <p class="long_txt"><b>Alerta!</b> Empresa  eliminada correctamente.</p>
</div>
<?php }?>      
      
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
//Se traen los datos del vehiculo seleccionado
$query ="SELECT Nombre, Fono, Email
FROM `clientes_contacto_empresas`
WHERE idEmpresa='{$_GET['id']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);?>

<h2>Modificar Empresa</h2>

<form method="post">
    <input type="text" name="Nombre"         placeholder="Nombre"              value="<?php if (isset($Nombre)) { echo $Nombre;}else{ echo $row_data['Nombre'];}?>"  >
    <input type="text" name="Fono"           placeholder="Fono"                value="<?php if (isset($Fono)) { echo $Fono;}else{ echo $row_data['Fono'];}?>" >                  
    <input type="text" name="Email"          placeholder="Email"               value="<?php if (isset($Email)) { echo $Email;}else{ echo $row_data['Email'];}?>"  >
    <input type="hidden" name="idEmpresa"       value="<?php echo $_GET['id'] ?>"  >   
    <input type="submit" name="submit_edit" value="Actualizar" class="btn btn_blue">
</form>
 
<div class="btn_box">
	<a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a> 
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['delete']) ) { 
//Se traen los datos del vehiculo seleccionado
$query ="SELECT Nombre, Fono
FROM `clientes_contacto_empresas`
WHERE idEmpresa='{$_GET['delete']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);?>

<h2>Confirmar Borrado</h2>
<p>Estas a punto de eliminar la empresa <?php echo $row_data['Nombre'] ?>, Fono <?php echo $row_data['Fono'] ?> , estas seguro?</p>
<br /><br /><br /><br />
<a href="<?php echo $location.'&del='.$_GET['delete']; ?>" class="btn btn_red">Confirmar eliminacion</a>
<div class="btn_box">
	<a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view']) ) { 
//Se traen los datos del vehiculo seleccionado
$query ="SELECT Nombre, Fono, Email
FROM `clientes_contacto_empresas`
WHERE idEmpresa='{$_GET['view']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);

?>

<h2>Datos de la Empresa </h2>
<table class="zebra">
<?php if ($row_data['Nombre']!=''){ ?>        <tr><td>Nombre</td></tr>                <tr><td><?php echo $row_data['Nombre'] ?></td></tr><?php }?>
<?php if ($row_data['Fono']!=''){ ?>          <tr><td>Fono</td></tr>                  <tr><td><?php echo $row_data['Fono'] ?></td></tr><?php }?>
<?php if ($row_data['Email']!=''){ ?>         <tr><td>Email</td></tr>                 <tr><td><?php echo $row_data['Email'] ?></td></tr><?php }?> 
</table>
<div class="btn_box">
    <a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['new']) ) { ?>
<h2>Nueva Empresa</h2>

   <form method="post">
    <input type="text" name="Nombre"         placeholder="Nombre"              value="<?php if (isset($Nombre)) { echo $Nombre;}?>"  >
    <input type="text" name="Fono"           placeholder="Fono"                value="<?php if (isset($Fono)) { echo $Fono;}?>" >                  
    <input type="text" name="Email"          placeholder="Email"               value="<?php if (isset($Email)) { echo $Email;}?>"  >
    
 	<input type="hidden" name="idCliente"       value="<?php echo $arrCliente['idCliente'] ?>"  > 
    <input type="submit" name="submit_create" value="Agregar Nuevo" class="btn btn_blue">
  </form>
  
<div class="btn_box">
	<a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
// Se trae el listado con todos los vehiculos
$arrAmistades = array();
$query ="SELECT idEmpresa, Nombre, Fono, Email
FROM `clientes_contacto_empresas`
WHERE idCliente='{$arrCliente['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrAmistades,$row );
}
$alertas = mysql_num_rows ($resultado);
mysql_free_result($resultado);	?>

<h2>Contacto Empresas</h2>

<a href="<?php echo $location; ?>&new=true" class="btn btn_blue">Agregar Nuevo</a>

<table class="contacto_tbl zebra">
<?php if($alertas!=''){?>
	<?php  foreach ($arrAmistades as $amistades) { ?>
      <tr>
        <td>
        <div class="fleft">
            <p class="contacto"><?php echo $amistades['Nombre'].' - '.$amistades['Fono'] ?><br/>
            <?php echo $amistades['Email'] ?></p>
        </div>
    
        <div class="fright">
            <a class="btn_list btn-app" href="<?php echo $location.'&view='.$amistades['idEmpresa']; ?>"><i class="fap fap-eye"></i> Ver </a>
            <a class="btn_list btn-app" href="<?php echo $location.'&id='.$amistades['idEmpresa']; ?>"><i class="fap fap-edit"></i> Edit </a>
            <a class="btn_list btn-app" href="<?php echo $location.'&delete='.$amistades['idEmpresa']; ?>"><i class="fap fap-trash-o"></i> Elim </a>
        </div>
        </td>
      </tr> 
     <?php }?>  
<?php } else { ?>   
		<tr><td>Aun no tienes ninguna empresa de interes agregada</td></tr>
<?php }?>
</table> 
      
 <div class="btn_box"> 
    <a href="principal_datos.php<?php echo $w; ?>" class="btn btn_blue">Volver</a>
 </div>
 <?php }?>
</div> 
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>