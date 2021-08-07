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
$location = "modusr_contactos_amigos.php";
$location .= $w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Formulario creacion
if ( !empty($_POST['submit_create']) )  { 
	//Agregamos direcciones
	$location.='&create=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_contacto_amigos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_contacto_amigos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_contacto_amigos.php';
}
//Formulario edicion
if ( !empty($_POST['submit_edit']) )  { 
	//Agregamos direcciones
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_contacto_amigos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_contacto_amigos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_contacto_amigos.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	$location.='&deleted=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_del/clientes_contacto_amigos.php';
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
<title>Contactos Personales</title>
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
    <p class="long_txt"><b>Alerta!</b> Contacto personal Creado correctamente.</p>
</div>
<?php }?>      
<?php  if (isset($_GET['mod'])) {?>
<div class="alert alert-success alert-dismissable" id="txf_02">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">&times;</button>
    <p class="long_txt"><b>Alerta!</b> Contacto personal  editado correctamente.</p>
</div>
<?php }?>
<?php  if (isset($_GET['deleted'])) {?>
<div class="alert alert-success alert-dismissable" id="txf_03">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
    <p class="long_txt"><b>Alerta!</b> Contacto personal  eliminado correctamente.</p>
</div>
<?php }?>      
      
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
//Se traen los datos del vehiculo seleccionado
$query ="SELECT Nombre, Fono, Email, idGrupo
FROM `clientes_contacto_amigos`
WHERE idAmigo='{$_GET['id']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
// Se trae un listado de todos los grupos
$arrGrupo = array();
$query = "SELECT  idGrupo, Nombre
FROM `mnt_grupos`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrGrupo,$row );
}?>

<h2>Modificar Contacto</h2>

<form method="post">
    <label>Nombre Contacto</label>
    <input type="text" name="Nombre" placeholder="Nombre" value="<?php if (isset($Nombre)) { echo $Nombre;}else{ echo $row_data['Nombre'];}?>"  >
    
    <label>Telefono</label>
    <input type="text" name="Fono" placeholder="Fono" value="<?php if (isset($Fono)) { echo $Fono;}else{ echo $row_data['Fono'];}?>" > 
    
    <label>Grupo</label>
    <select name="idGrupo" >
    <option value="" selected="selected">Seleccione un grupo</option>
    <?php foreach ($arrGrupo as $grupo) { ?>
    <option value="<?php echo $grupo['idGrupo']; ?>" <?php if(isset($idGrupo)&&$idGrupo==$grupo['idGrupo']) {echo 'selected="selected"';}elseif($row_data['idGrupo']==$grupo['idGrupo']){echo 'selected="selected"';}?>><?php echo $grupo['Nombre']; ?></option>
    <?php } ?>             
    </select>
    
    <label>Ingrese un correo</label>                 
    <input type="text" name="Email" placeholder="Email" value="<?php if (isset($Email)) { echo $Email;}else{ echo $row_data['Email'];}?>"  >
    
    
    <input type="hidden" name="idAmigo"       value="<?php echo $_GET['id'] ?>"  >   
    <input type="submit" name="submit_edit" value="Actualizar" class="btn btn_blue">
</form>
 
<div class="btn_box">
	<a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a> 
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['delete']) ) { 
//Se traen los datos del vehiculo seleccionado
$query ="SELECT Nombre, Fono
FROM `clientes_contacto_amigos`
WHERE idAmigo='{$_GET['delete']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);?>

<h2>Confirmar Borrado</h2>
<p>Estas a punto de eliminar el contacto <?php echo $row_data['Nombre'] ?>, Fono <?php echo $row_data['Fono'] ?> , estas seguro?</p>
<br /><br /><br /><br />
<a href="<?php echo $location.'&del='.$_GET['delete']; ?>" class="btn btn_red">Confirmar eliminacion</a>
<div class="btn_box">
	<a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view']) ) { 
//Se traen los datos del vehiculo seleccionado
$query ="SELECT 
clientes_contacto_amigos.Nombre, 
clientes_contacto_amigos.Fono, 
clientes_contacto_amigos.Email,
mnt_grupos.Nombre AS nombre_grupo
FROM `clientes_contacto_amigos`
LEFT JOIN `mnt_grupos` ON mnt_grupos.idGrupo = clientes_contacto_amigos.idGrupo
WHERE clientes_contacto_amigos.idAmigo='{$_GET['view']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);

?>

<h2>Datos de Contacto </h2>
<table class="zebra">
<?php if ($row_data['Nombre']!=''){ ?>        <tr><td>Nombre</td></tr>                <tr><td><?php echo $row_data['Nombre'] ?></td></tr><?php }?>
<?php if ($row_data['Fono']!=''){ ?>          <tr><td>Fono</td></tr>                  <tr><td><?php echo $row_data['Fono'] ?></td></tr><?php }?>
<?php if ($row_data['nombre_grupo']!=''){ ?>  <tr><td>Grupo</td></tr>                 <tr><td><?php echo $row_data['nombre_grupo'] ?></td></tr><?php }?>
<?php if ($row_data['Email']!=''){ ?>         <tr><td>Email</td></tr>                 <tr><td><?php echo $row_data['Email'] ?></td></tr><?php }?> 
</table>
<div class="btn_box">
    <a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['new']) ) { 
// Se trae un listado de todos los grupos
$arrGrupo = array();
$query = "SELECT  idGrupo, Nombre
FROM `mnt_grupos`
ORDER BY Nombre ASC";
$resultado1 = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado1)) {
array_push( $arrGrupo,$row );
}

?>
<h2>Nuevo Contacto</h2>

   <form method="post">
   	<label>Nombre Contacto</label>
    <input type="text" name="Nombre"         placeholder="Nombre"              value="<?php if (isset($Nombre)) { echo $Nombre;}?>"  >
    
    <label>Telefono</label>
    <input type="text" name="Fono"           placeholder="Fono"                value="<?php if (isset($Fono)) { echo $Fono;}?>" > 
    
    <label>Grupo</label>
    <select name="idGrupo" >
    <option value="" selected="selected">Seleccione un grupo</option>
    <?php foreach ($arrGrupo as $grupo) { ?>
    <option value="<?php echo $grupo['idGrupo']; ?>" <?php if(isset($idGrupo)&&$idGrupo==$grupo['idGrupo']) {echo 'selected="selected"';}elseif($row_data['idGrupo']==$grupo['idGrupo']){echo 'selected="selected"';}?>><?php echo $grupo['Nombre']; ?></option>
    <?php } ?>             
    </select>
                     
    <label>Ingrese un correo</label>
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
$query ="SELECT 
clientes_contacto_amigos.idAmigo, 
clientes_contacto_amigos.Nombre, 
clientes_contacto_amigos.Fono, 
clientes_contacto_amigos.Email,
fono1.Fono1 AS fonox1,
fono2.Fono2 AS fonox2,
mnt_grupos.Nombre AS nombre_grupo
FROM `clientes_contacto_amigos`
LEFT JOIN  `clientes_listado` fono1   ON fono1.Fono1         = clientes_contacto_amigos.Fono
LEFT JOIN  `clientes_listado` fono2   ON fono2.Fono2         = clientes_contacto_amigos.Fono
LEFT JOIN  `mnt_grupos`               ON mnt_grupos.idGrupo  = clientes_contacto_amigos.idGrupo
WHERE clientes_contacto_amigos.idCliente='{$arrCliente['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
while ( $row_contactos[] = mysql_fetch_assoc ($resultado));
$alertas = mysql_num_rows ($resultado); 
mysql_free_result($resultado);
array_pop($row_contactos);?>

<h2>Contactos Personales</h2>

<!--<a href="<?php echo $location; ?>&new=true" class="btn btn_blue">Agregar Nuevo</a>-->

<table class="contacto_tbl zebra">
<?php 
if($alertas!=''){
	//llamamos a la función para filtrar los datos
	filtrar($row_contactos, 'nombre_grupo');
	//recorremos el array para imprimirlo con formato HTML
	foreach($row_contactos as $menu=>$sublistados) {
		echo '<tr><td>'.$menu.'</td></tr>';
				
		  // recorremos los sublistados
		  foreach($sublistados as $listado) {
			//variable para ver si el contacto existe dentro del sistema
        $n_var = 0;
        if(isset($listado['fonox1'])){$n_var +=1;}
        if(isset($listado['fonox2'])){$n_var +=1;}
         ?>
      <tr>
        <td>
        <div class="fleft">
            <p class="contacto"><?php echo $listado['Nombre'].' - '.$listado['Fono'] ?><?php if($n_var==0){ echo '<br/><span class="new"> - No Registrado -</span>';}?><br/>
            <?php echo $listado['Email'] ?></p>
        </div>
        <div class="fright">
            <a class="btn_list btn-app" href="<?php echo $location.'&view='.$listado['idAmigo']; ?>"><i class="fap fap-eye"></i> Ver </a>
            <a class="btn_list btn-app" href="<?php echo $location.'&id='.$listado['idAmigo']; ?>"><i class="fap fap-edit"></i> Edit </a>
            <a class="btn_list btn-app" href="<?php echo $location.'&delete='.$listado['idAmigo']; ?>"><i class="fap fap-trash-o"></i> Elim </a>
        </div>
        </td>
      </tr> 
     <?php }  
	}
}else {   
	echo '<tr><td>Aun no tienes Amigos de contacto, ve al menu compartir para comenzar a agregar nuevos contactos</td></tr>';  
 }?>



</table> 
      
 <div class="btn_box"> 
    <a href="principal_datos.php<?php echo $w; ?>" class="btn btn_blue">Volver</a>
 </div>
 <?php }?>
</div> 
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>