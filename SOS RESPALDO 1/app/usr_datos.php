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
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/esCliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_configuracion/web_carga_cliente.php';
require_once '../AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se llaman a los archivos de configuracion de la app                                          */
/**********************************************************************************************************************************/
require_once 'core/url.php';
require_once 'core/config_app.php';
require_once 'core/datos_empresa.php';
require_once 'core/update.php';
require_once 'core/gsm.php';
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "usr_datos.php".$w;
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
if ( !empty($_POST['submit']) )     {
	//Agregamos direcciones
	$location.='&mod=true';
	//Llamamos a las partes del formulario
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_common/clientes_listado.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_controller/clientes_listado_6.php';
	require_once '../AA2D2CFFDJFDJX1/xrxs_form_update/clientes_listado.php';	
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
<title>Mis datos</title>
<!-- InstanceEndEditable -->
<!-- InstanceBeginEditable name="head" -->



<!-- InstanceEndEditable -->
</head>

<body  class="<?php echo $config_app['background_color'] ?>" >
<!-- InstanceBeginEditable name="text" -->
<section class="<?php echo $config_app['noti_width'].' '.$config_app['noti_border'].' '.$config_app['noti_shadow'].' '.$config_app['noti_aling'].' '.$config_app['noti_color']?>">
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
if ( ! empty($_GET['mod_datos']) ) { 
//Se traen los datos del usuario
$query = "SELECT Nombre, Apellido_Paterno, Apellido_Materno, email,Rut, Sexo, fNacimiento,Direccion,Fono1,Fono2, idCiudad, idComuna
FROM `clientes_listado` 
WHERE idCliente = '".$arrCliente['idCliente']."'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc($resultado);
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
 if ($row_data['idCiudad']!=0&&$row_data['idCiudad']!=''){
	$arrComuna = array();
	$query = "SELECT idComuna,Nombre
	FROM `mnt_ubicacion_comunas`
	WHERE idCiudad = ".$row_data['idCiudad']." 
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
<table class="tb_map">
  <tr height="10%">
    <td colspan="2">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>" style="margin-top:10px;">Modificacion de datos</h1>
    </td>
  </tr>	
  <tr height="80%">
    <td colspan="2">   
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
  

      <div class="form <?php echo $config_app['form_color'] ?>">
      <form method="post" name="form1">
	  <h1>Modificar Datos</h1>
      <div class="input"><label id="icon"><i class="fa fa-user"></i></label> <input type="text" name="Nombre" placeholder="Nombres" value="<?php if(isset($Nombres)) {echo $Nombres;} else {echo $row_data['Nombre'];}?>" /></div>
      <div class="input"><label id="icon"><i class="fa fa-user"></i></label> <input type="text" name="Apellido_Paterno" placeholder="Apellido Paterno" value="<?php if(isset($Apellido_Paterno)) {echo $Apellido_Paterno;} else {echo $row_data['Apellido_Paterno'];}?>"/></div>
      <div class="input"><label id="icon"><i class="fa fa-user"></i></label> <input type="text" name="Apellido_Materno" placeholder="Apellido Materno" value="<?php if(isset($Apellido)) {echo $Apellido;} else {echo $row_data['Apellido_Materno'];}?>"/></div>  
      <div class="input"><label id="icon"><i class="fa fa-envelope"></i></label> <input type="email" name="email" placeholder="Direccion de correo" value="<?php if(isset($email)) {echo $email;} else {echo $row_data['email'];}?>"/></div>
      <div class="input"><label id="icon"><i class="fa fa-barcode"></i></label> <input type="text" name="Rut" placeholder="Rut" value="<?php if(isset($Rut)) {echo $Rut;} else {echo $row_data['Rut'];}?>"/></div>
      <div class="input"><label id="icon"><i class="fa fa-male"></i></label>      
        <select name="Sexo">
          <option value="" selected="selected">Seleccione un genero</option>
          <option value="M" <?php if(isset($Sexo)&&$Sexo=='M'){echo 'selected="selected"';}elseif($row_data['Sexo']=='M'){echo 'selected="selected"';}?>>Masculino</option>
		  <option value="F" <?php if(isset($Sexo)&&$Sexo=='F'){echo 'selected="selected"';}elseif($row_data['Sexo']=='F'){echo 'selected="selected"';}?>>Femenino</option>
        </select> 
      </div>
      <div class="input"><label id="icon"><i class="fa fa-calendar"></i></label> <input type="date"  name="fNacimiento" placeholder="Fecha de nacimiento" value="<?php if(isset($fNacimiento)) {echo $fNacimiento;} else {echo $row_data['fNacimiento'];}?>"/></div>
      <div class="input"><label id="icon"><i class="fa fa-phone"></i></label> <input type="text"  name="Fono1" placeholder="Fono1" value="<?php if(isset($Fono1)) {echo $Fono1;} else {echo $row_data['Fono1'];}?>"/></div>
      <div class="input"><label id="icon"><i class="fa fa-phone"></i></label> <input type="text"  name="Fono2" placeholder="Fono2" value="<?php if(isset($Fono2)) {echo $Fono2;} else {echo $row_data['Fono2'];}?>"/></div>
      
      <div class="input"><label id="icon"><i class="fa fa-list-alt"></i></label>      
        <select name="idCiudad" onChange="cambia_ciudad()">
          <option value="" selected="selected">Seleccione una Ciudad</option>
          <?php foreach ($arrCiudad as $ciudad) { ?>
    	  <option value="<?php echo $ciudad['idCiudad']; ?>" <?php if(isset($idCiudad)&&$idCiudad==$ciudad['idCiudad']) {echo 'selected="selected"';}elseif($row_data['idCiudad']==$ciudad['idCiudad']){echo 'selected="selected"';}?>><?php echo $ciudad['Nombre']; ?></option>
          <?php } ?>
        </select> 
      </div>
      <div class="input"><label id="icon"><i class="fa fa-list-alt"></i></label>      
        <select name="idComuna">
          <option value="" selected="selected">Seleccione una Comuna</option>
          <?php foreach ($arrComuna as $com) { ?>
          <option value="<?php echo $com['idComuna']; ?>" <?php if(isset($idComuna)&&$idComuna==$com['idComuna']) {echo 'selected="selected"';}elseif($row_data['idComuna']==$com['idComuna']){echo 'selected="selected"';}?>><?php echo $com['Nombre']; ?></option>
          <?php } ?>
        </select> 
      </div> 
      <div class="input"><label id="icon"><i class="fa fa-map-marker"></i></label> <input type="text" name="Direccion" placeholder="Direccion" value="<?php if(isset($Direccion)) {echo $Direccion;} else {echo $row_data['Direccion'];}?>"/></div>

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
 
	  <input type="hidden"   name="idCliente" value="<?php echo $arrCliente['idCliente'] ?>"   >
      <input type="submit"   value="Actualizar"  name="submit" >
      </form>
      </div>
 
    </td>
  </tr>
  
  <tr height="10%">
    <td>
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo $location; ?>" >Cancelar</a>
    </td>
  </tr>
</table>
<?php ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 } else  { 
//Se traen los datos del usuario
$query = "SELECT 
clientes_listado.Nombre, 
clientes_listado.Apellido_Paterno, 
clientes_listado.Apellido_Materno, 
clientes_listado.email, 
clientes_listado.Rut, 
clientes_listado.Sexo, 
clientes_listado.fNacimiento, 
clientes_listado.Direccion, 
clientes_listado.Fono1, 
clientes_listado.Fono2, 
mnt_ubicacion_ciudad.Nombre AS nombre_ciudad, 
mnt_ubicacion_comunas.Nombre AS nombre_comuna
FROM `clientes_listado` 
LEFT JOIN `mnt_ubicacion_ciudad`    ON mnt_ubicacion_ciudad.idCiudad    = clientes_listado.idCiudad
LEFT JOIN `mnt_ubicacion_comunas`   ON mnt_ubicacion_comunas.idComuna   = clientes_listado.idComuna
WHERE clientes_listado.idCliente = '".$arrCliente['idCliente']."'";
$resultado = mysql_query ($query, $dbConn);
$row_data = mysql_fetch_assoc($resultado);
?>
<table class="tb_map">
  <tr height="89%">
    <td colspan="2">
    
<?php  if (isset($_GET['mod'])) {?>
<div class="alert fcenter <?php echo $config_app['msg_success_color_body'].' '.$config_app['msg_success_color_text'].' '.$config_app['msg_success_width'].' '.$config_app['msg_success_border'] ?>">
<i class="fa fa-check"></i>
<p class="long_txt">Sus datos han sido modificados correctamente.</p>
</div>
<?php }?> 

 <div class="content_pading">
    <h1 class="<?php echo $config_app['title2_size'].' '.$config_app['title2_color'] ?>">Mis Datos Personales</h1>
    <br/>
    <h2 class="<?php echo $config_app['title3_size'].' '.$config_app['title3_color'] ?>">
	<strong>Nombre</strong> : <?php echo $row_data['Nombre'].' '.$row_data['Apellido_Paterno'].' '.$row_data['Apellido_Materno'] ?><br/>
    <strong>Email</strong> : <?php echo $row_data['email'] ?><br/>
    <strong>Rut</strong> : <?php echo $row_data['Rut'] ?><br/>
    <strong>Sexo</strong> : <?php if($row_data['Sexo']='M'){echo 'Hombre';}elseif($row_data['Sexo']='F'){echo 'Mujer';} ?><br/>
    <strong>Fecha Nacimiento</strong> : <?php echo $row_data['fNacimiento'] ?><br/>
    <strong>Ciudad</strong> : <?php echo $row_data['nombre_ciudad'] ?><br/>
    <strong>Comuna</strong> : <?php echo $row_data['nombre_comuna'] ?><br/>
    <strong>Direccion</strong> : <?php echo $row_data['Direccion'] ?><br/>
    <strong>Fono1</strong> : <?php echo $row_data['Fono1'] ?><br/>
    <strong>Fono2</strong> : <?php echo $row_data['Fono2'] ?><br/>   
    </h2>
  </div>      
    </td>
  </tr>
  
  <tr height="10%">
    <td width="50%">
    <a class="<?php echo $config_app['btn_cancelar_color_fondo'].' '.$config_app['btn_cancelar_ancho'].' '.$config_app['btn_cancelar_radio'].' '.$config_app['btn_cancelar_float'].' '.$config_app['btn_cancelar_color_texto'].' '.$config_app['btn_cancelar_sombra'] ?> btn_link" href="<?php echo 'principal.php'.$w; ?>" >Volver</a>
    </td>
    <td>
    <a class="<?php echo $config_app['btn_aceptar_color_fondo'].' '.$config_app['btn_aceptar_ancho'].' '.$config_app['btn_aceptar_radio'].' '.$config_app['btn_aceptar_float'].' '.$config_app['btn_aceptar_color_texto'].' '.$config_app['btn_aceptar_sombra'] ?> btn_link" href="<?php echo $location.'&mod_datos=true'; ?>" >Modificar</a>
    </td>
  </tr>
</table>
<?php } ?>
</section>
<!-- InstanceEndEditable --> 
</body>
<!-- InstanceEnd --></html>