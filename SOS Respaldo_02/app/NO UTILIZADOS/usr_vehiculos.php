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
$location = "modusr_vehiculos.php";
$location .= $w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Formulario creacion
if ( !empty($_POST['submit_create']) )  { 
	//Agregamos direcciones
	$location.='&create=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_vehiculos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_vehiculos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_insert/clientes_vehiculos.php';
}
//Formulario edicion
if ( !empty($_POST['submit_edit']) )  { 
	//Agregamos direcciones
	$location.='&view='.$_GET['id'];
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_vehiculos.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_vehiculos_1.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_vehiculos.php';
}
//se borra un dato
if ( !empty($_GET['del']) )     {
	$location.='&deleted=true';
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_vehiculos.php';
}
//Formulario creacion
if ( !empty($_POST['submit_img']) )  { 	
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_vehiculos_img_1.php';
}
//Formulario creacion
if ( !empty($_GET['del_img']) )  { 	
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_vehiculos_img_2.php';
}
//se borra un dato
if ( !empty($_GET['upload_imagen']) )     {
	//Llamamos al formulario de borrado
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_vehiculos_img_3.php';
}
//Formulario creacion
if ( !empty($_POST['upload_imagen2']) )  { 	
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_trans/clientes_vehiculos_img_4.php';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/principal_2.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Vehiculos</title>
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
    <p class="long_txt"><b>Alerta!</b> Vehiculo Creado correctamente.</p>
</div>
<?php }?>      
<?php  if (isset($_GET['mod'])) {?>
<div class="alert alert-success alert-dismissable" id="txf_02">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_02&apos;).className = &apos;oculto&apos;">&times;</button>
    <p class="long_txt"><b>Alerta!</b> Vehiculo editado correctamente.</p>
</div>
<?php }?>
<?php  if (isset($_GET['deleted'])) {?>
<div class="alert alert-success alert-dismissable" id="txf_03">
    <i class="fa fa-check"></i>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="document.getElementById(&apos;txf_03&apos;).className = &apos;oculto&apos;">&times;</button>
    <p class="long_txt"><b>Alerta!</b> Vehiculo eliminado correctamente.</p>
</div>
<?php }?>      
      
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if ( ! empty($_GET['id']) ) { 
//Se traen los datos del vehiculo seleccionado
$query ="SELECT PPU, Marca, Modelo, Tipo, ftransferencia AS ftrans, Color_1, Color_2, Fecha, N_Motor, N_Chasis,Obs
FROM `clientes_vehiculos`
WHERE idVehiculo='{$_GET['id']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);?>
<h2>Modificar Vehiculo</h2>

<form method="post">
    <label>Patente</label>
    <input type="text" name="PPU"             placeholder="Patente"              value="<?php if (isset($PPU)) { echo $PPU;}else{ echo $row_data['PPU'];}?>"  >
    <label>Marca</label>
    <input type="text" name="Marca"           placeholder="Marca"                value="<?php if (isset($Marca)) { echo $Marca;}else{ echo $row_data['Marca'];}?>" >                  
    <label>Modelo</label>
    <input type="text" name="Modelo"          placeholder="Modelo"               value="<?php if (isset($Modelo)) { echo $Modelo;}else{ echo $row_data['Modelo'];}?>"  >
    <label>Tipo</label>
    <input type="text" name="Tipo"            placeholder="Tipo"                 value="<?php if (isset($Tipo)) { echo $Tipo;}else{ echo $row_data['Tipo'];}?>"  >
    <label>Fecha Transferencia</label>
    <input type="text" name="ftransferencia"  placeholder="Fecha Transferencia"  value="<?php if (isset($ftransferencia)) { echo $ftransferencia;}else{ echo $row_data['ftrans'];}?>"  >
    <label>Color base</label>
    <input type="text" name="Color_1"         placeholder="Color base"           value="<?php if (isset($Color_1)) { echo $Color_1;}else{ echo $row_data['Color_1'];}?>"  >
    <label>Color complementario</label>
    <input type="text" name="Color_2"         placeholder="Color complementario" value="<?php if (isset($Color_2)) { echo $Color_2;}else{ echo $row_data['Color_2'];}?>"  >
    <label>Año Fabricacion</label>
    <input type="text" name="Fecha"           placeholder="Año Fabricacion"      value="<?php if (isset($Fecha)) { echo $Fecha;}else{ echo $row_data['Fecha'];}?>"  >
    <label>N Motor</label>
    <input type="text" name="N_Motor"         placeholder="N Motor"              value="<?php if (isset($N_Motor)) { echo $N_Motor;}else{ echo $row_data['N_Motor'];}?>"  >
    <label>N Chasis</label>
    <input type="text" name="N_Chasis"        placeholder="N Chasis"             value="<?php if (isset($N_Chasis)) { echo $N_Chasis;}else{ echo $row_data['N_Chasis'];}?>"  >
	<label>Observaciones</label>
    <textarea name="Obs"  placeholder="Observaciones"><?php if (isset($Obs)) { echo $Obs;}else{ echo $row_data['Obs'];}?></textarea>


    <input type="hidden" name="idVehiculo"       value="<?php echo $_GET['id'] ?>"  >   
    <input type="submit" name="submit_edit" value="Actualizar" class="btn btn_blue">
  </form>
  
  
  
<div class="btn_box">
	<a href="<?php echo $location.'&view='.$_GET['id']; ?>" class="btn btn_blue">Volver</a> 
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['delete']) ) { 
//Se traen los datos del vehiculo seleccionado
$query ="SELECT PPU, Marca, Modelo
FROM `clientes_vehiculos`
WHERE idVehiculo='{$_GET['delete']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado)?>
<h2>Confirmar Borrado</h2>
<p>Estas a punto de eliminar el vehiculo patente <?php echo $row_data['PPU'] ?>, Modelo <?php echo $row_data['Modelo'] ?>, Marca <?php echo $row_data['Marca'] ?> , estas seguro?</p>
<br /><br /><br /><br />
<a href="<?php echo $location.'&del='.$_GET['delete']; ?>" class="btn btn_red">Confirmar eliminacion</a>
<div class="btn_box">
	<a href="<?php echo $location.'&view='.$_GET['delete']; ?>" class="btn btn_blue">Volver</a>
</div>

<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['new']) ) { ?>
<h2>Nuevo Vehiculo</h2>

   <form method="post">
   	<label>Patente</label>
    <input type="text" name="PPU"             placeholder="Patente"              value="<?php if (isset($PPU)) { echo $PPU;}?>"  >
    <label>Marca</label>
    <input type="text" name="Marca"           placeholder="Marca"                value="<?php if (isset($Marca)) { echo $Marca;}?>" >                  
    <label>Modelo</label>
    <input type="text" name="Modelo"          placeholder="Modelo"               value="<?php if (isset($Modelo)) { echo $Modelo;}?>"  >
    <label>Tipo</label>
    <input type="text" name="Tipo"            placeholder="Tipo"                 value="<?php if (isset($Tipo)) { echo $Tipo;}?>"  >
    <label>Fecha Transferencia</label>
    <input type="text" name="ftransferencia"  placeholder="Fecha Transferencia"  value="<?php if (isset($ftransferencia)) { echo $ftransferencia;}?>"  >
    <label>Color base</label>
    <input type="text" name="Color_1"         placeholder="Color 1"              value="<?php if (isset($Color_1)) { echo $Color_1;}?>"  >
    <label>Color complementario</label>
    <input type="text" name="Color_2"         placeholder="Color 2"              value="<?php if (isset($Color_2)) { echo $Color_2;}?>"  >
    <label>Año Fabricacion</label>
    <input type="text" name="Fecha"           placeholder="Año"                  value="<?php if (isset($Fecha)) { echo $Fecha;}?>"  >
    <label>N Motor</label>
    <input type="text" name="N_Motor"         placeholder="N Motor"              value="<?php if (isset($N_Motor)) { echo $N_Motor;}?>"  >
    <label>N Chasis</label>
    <input type="text" name="N_Chasis"        placeholder="N Chasis"             value="<?php if (isset($N_Chasis)) { echo $N_Chasis;}?>"  >
	<label>Observaciones</label>
    <textarea name="Obs"  placeholder="Observaciones"><?php if (isset($Obs)) { echo $Obs;}?></textarea>

 	<input type="hidden" name="idCliente"       value="<?php echo $arrCliente['idCliente'] ?>"  > 
    <input type="submit" name="submit_create" value="Agregar Nuevo" class="btn btn_blue">
  </form>
  
<div class="btn_box">
	<a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['imagen']) ) { 
// Se trae el listado con todas las imagenes de los vehiculos
$arrImagenes = array();
$query ="SELECT idImagen, Nombre
FROM `clientes_vehiculos_img`
WHERE idVehiculo='{$_GET['imagen']}'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrImagenes,$row );
}
mysql_free_result($resultado);?>

<h2>Editar Imagenes Vehiculo</h2>

<table class="gallery pd_bottom_5">
  <?php  foreach ($arrImagenes as $imagenes) { ?>
  <tr>
    <td width="60%"><img src='upload/<?php echo $imagenes['Nombre'] ?>' /></td>
    <td width="40%" ><a href="<?php echo $location.'&imagen='.$_GET['imagen'].'&del_img='.$imagenes['idImagen']; ?>" class="btn btn_red alineacion_v">Borrar</a></td>
  </tr>
  <?php }?>
</table>

<?php if ($dispositivo=="android"){ ?>
<script type="text/javascript">
	//llama al explorador de archivos
	function Buscarimagen(){	
		MainActivity.Buscarimagen();
	}
	//trae los datos subidos, no tiene boton ya que esta funcion es llamada desde el webview 
	function ver_img(){	
		var Result_form = MainActivity.Dataimagen();
		if (Result_form != ""){
			$('#form_data').html(Result_form);
		}	
		document.getElementById('oculto').style.display = 'block';
	}

</script> 
       
<div id='oculto' style='display:none;'>       
<form method="POST" enctype="multipart/form-data" >
<div id="form_data"></div>
<input name="submit_img" type="submit"  value="Subir Archivo" class="btn btn_blue"  />
</form>
</div> 

<a class="btn btn_blue" onclick="Buscarimagen();">Buscar Imagen</a>

<?php } elseif($dispositivo=="iphone"){?>
<form method="post" enctype="multipart/form-data"> 
  <input type="file" name="archivo" id="archivo" class="custom-file-input"/>
  <br/>
  <input type="submit" value="Subir Archivo" class="btn btn_blue" name="upload_imagen2" />
</form>
<?php }?>

<div class="btn_box">
	<a href="<?php echo $location.'&view='.$_GET['imagen']; ?>" class="btn btn_blue">Volver</a>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
}elseif ( ! empty($_GET['view']) ) { 
//Se traen los datos del vehiculo seleccionado
$query ="SELECT PPU, Marca, Modelo, Tipo, ftransferencia, Color_1, Color_2, Fecha, N_Motor, N_Chasis, Obs
FROM `clientes_vehiculos`
WHERE idVehiculo='{$_GET['view']}'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc ($resultado);
// Se trae el listado con todas las imagenes de los vehiculos
$arrImagenes = array();
$query ="SELECT  Nombre
FROM `clientes_vehiculos_img`
WHERE idVehiculo='{$_GET['view']}'";
$resultado = mysql_query ($query, $dbConn);

while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrImagenes,$row );
}
$n_filas = mysql_num_rows($resultado);
mysql_free_result($resultado);

?>


<h2>Datos de <?php echo $row_data['Marca'].'   '.$row_data['Modelo'] ?></h2>
<h3>Informacion</h3>
<table class="zebra">
<?php if ($row_data['PPU']!=''){ ?>            <tr><td>Patente</td></tr>                <tr><td><?php echo $row_data['PPU'] ?></td></tr><?php }?>
<?php if ($row_data['Marca']!=''){ ?>          <tr><td>Marca</td></tr>                  <tr><td><?php echo $row_data['Marca'] ?></td></tr><?php }?>
<?php if ($row_data['Modelo']!=''){ ?>         <tr><td>Modelo</td></tr>                 <tr><td><?php echo $row_data['Modelo'] ?></td></tr><?php }?>
<?php if ($row_data['Tipo']!=''){ ?>           <tr><td>Tipo</td></tr>                   <tr><td><?php echo $row_data['Tipo'] ?></td></tr><?php }?>
<?php if ($row_data['ftransferencia']!='0000-00-00'){ ?> <tr><td>Ultima Transferencia</td></tr>   <tr><td><?php echo Fecha_completa($row_data['ftransferencia']) ?></td></tr><?php }?>
<?php if ($row_data['Color_1']!=''){ ?>        <tr><td>Color 1</td></tr>                <tr><td><?php echo $row_data['Color_1'] ?></td></tr><?php }?>
<?php if ($row_data['Color_2']!=''){ ?>        <tr><td>Color 2</td></tr>                <tr><td><?php echo $row_data['Color_2'] ?></td></tr><?php }?>
<?php if ($row_data['Fecha']!=''){ ?>          <tr><td>Año</td></tr>                    <tr><td><?php echo $row_data['Fecha'] ?></td></tr><?php }?>
<?php if ($row_data['N_Motor']!=''){ ?>        <tr><td>Numero de Motor</td></tr>        <tr><td><?php echo $row_data['N_Motor'] ?></td></tr><?php }?>
<?php if ($row_data['N_Chasis']!=''){ ?>       <tr><td>Numero de Chasis</td></tr>       <tr><td><?php echo $row_data['N_Chasis'] ?></td></tr><?php }?>
<?php if ($row_data['Obs']!=''){ ?>            <tr><td>Observaciones</td></tr>          <tr><td><?php echo $row_data['Obs'] ?></td></tr><?php }?>  
</table>
<?php 
//No se ,uestran las imagenes si es que estas no existen
if ($n_filas!=0){ ?>
<h3>Fotografias</h3>
<table class="gallery">
  <tr height="50%">
   <?php  
   $i=0;
   foreach ($arrImagenes as $imagenes) { ?>
   <?php if($i==0){ echo '<tr height="50%">';}?>
    <td width="50%"><img src='upload/<?php echo $imagenes['Nombre'] ?>' /></td>
  <?php $i++; if($i==2){ echo '</tr>'; $i=0; }?>
  <?php }?>
  <?php if($i==1){ echo '<td width="50%"></td></tr>';}?> 
</table>
<?php }?>


<div class="btn_box">
    <a href="<?php echo $location.'&id='.$_GET['view']; ?>" class="btn btn_blue">Modificar Informacion</a>
    <a href="<?php if($n_filas<=5){echo $location.'&imagen='.$_GET['view'];}  ?>" class="btn btn_blue <?php if($n_filas>=6){ echo 'disable_link';}?>">Modificar Fotografias</a>
    <a href="<?php echo $location.'&delete='.$_GET['view']; ?>" class="btn btn_red">Eliminar Vehiculo</a>
    <a href="<?php echo $location; ?>" class="btn btn_blue">Volver</a>
</div>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
} else  {
// Se trae el listado con todos los vehiculos
$arrVehiculos = array();
$query ="SELECT 
clientes_vehiculos.idVehiculo, 
clientes_vehiculos.PPU, 
clientes_vehiculos.Marca, 
clientes_vehiculos.Modelo,
(SELECT Nombre FROM clientes_vehiculos_img WHERE idVehiculo = clientes_vehiculos.idVehiculo LIMIT 1 ) AS imagen
FROM `clientes_vehiculos`
WHERE idCliente='{$arrCliente['idCliente']}'";
$resultado = mysql_query ($query, $dbConn);
while ( $row = mysql_fetch_assoc ($resultado)) {
array_push( $arrVehiculos,$row );
}
mysql_free_result($resultado);	?>
<h2>Mis Vehiculos</h2>

 
<?php  foreach ($arrVehiculos as $vehiculos) { ?>
    <a class="list vehicle" href="<?php echo $location.'&view='.$vehiculos['idVehiculo']; ?>">
        <div class="img_vehiculo">
        	<?php if($vehiculos['imagen']==''){?>
            <img src="img/vehiculo.jpg"  />
            <?php }else{?>
            <img src="upload/<?php echo $vehiculos['imagen']; ?>"  />
            <?php }?>
        </div>
        <span><?php echo $vehiculos['Marca'].'   '.$vehiculos['Modelo'] ?></span>
        <br/>Patente : <?php echo $vehiculos['PPU']; ?>
    </a>
 <?php }?>       
 <div class="btn_box">
    <a href="<?php echo $location; ?>&new=true" class="btn btn_blue">Agregar Nuevo Vehiculo</a>
    <a href="principal_datos.php<?php echo $w; ?>" class="btn btn_blue">Volver</a>
 </div>
 <?php }?>
</div> 
      <!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>