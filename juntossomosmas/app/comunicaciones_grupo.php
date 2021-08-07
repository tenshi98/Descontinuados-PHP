<?php session_start();
//echo "lon  ".$_GET["longitud"]."  lat  ".$_GET["latitud"]."  imei     ".$_GET["imei"]."  gm     ".$_GET["id"]."  dispositivo     ".$_GET["dispositivo"];
/**********************************************************************************************************************************/
/*                                           Se define la variable de seguridad                                                   */
/**********************************************************************************************************************************/
define('XMBCXRXSKGC', 1);
/**********************************************************************************************************************************/
/*                                          Se llaman a los archivos necesarios                                                   */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_configuracion/config.php';
require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
/**********************************************************************************************************************************/
/*                                   Se filtran las entradas para evitar ataques                                                  */
/**********************************************************************************************************************************/
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/xss.php';
$_POST = filterXSS($_POST);
require_once 'AR2D2CFFDJFDJX1/xrxs_seguridad/input_filter.php';
$ifilter = new InputFilter();
$_POST = $ifilter->process($_POST);
/**********************************************************************************************************************************/
/*                                          Modulo de identificacion del documento                                                */
/**********************************************************************************************************************************/
//Cargamos la ubicacion 
$location = "comunicaciones.php";
$volver = "menuforo.php";
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Formulario creacion
if ( !empty($_POST['submit_resp']))  { 
	//Agregamos direcciones
	$command = "/usr/bin/wget -N -q http://jm.psvirtual.cl/app/envia_grupo.php?mensaje='".$_POST['message']."3xyzxyz3".$_POST['grupo']."3xyzxyz3".$_POST['yo']."' &";
	if ($_POST['message']!='' and $_POST['grupo']!=0){
		$fp = shell_exec($command);
	}
}
/**********************************************************************************************************************************/
/*                                  Se verifica que el usuario exista dentro de la base de datos                                  */
/**********************************************************************************************************************************/


$sql ="SELECT id_ejecutiv,sigo FROM ejecutivos WHERE imei='".$_GET["imei"]."'";

$res=mysql_query($sql,$dbConn); 
$numeroRegistros=mysql_num_rows($res); 
	//Agregamos direcciones
	$newlocation = 'pide_rut.php';
	$newlocation.='?imei='.$_GET['imei'];
	$newlocation.='&longitud='.$_GET['longitud'];
	$newlocation.='&latitud='.$_GET['latitud'];
	$newlocation.='&id='.$_GET['id'];
	$newlocation.='&dispositivo='.$_GET['dispositivo'];
$row_data = mysql_fetch_assoc ($res);	
$mi_id=$row_data["id_ejecutiv"];	

if ($numeroRegistros==0)  {
	//Redirijo a la solicitud de rut
	header( 'Location: '.$newlocation );
	die;	
}
$row = mysql_fetch_assoc ($res);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head>
	<meta charset="UTF-8">	
	<title>Mensajes</title> 
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
</head>
 
<body>
<!-- MENU DESPLEGABLE-->
<?require_once 'mmenu.php';?>
<!-- MENU DESPLEGABLE-->
<div class="height100 widht100">

<div class="widht80 fcenter perfil">
<div class="cuerpo_gris_12"><center><span class="tit_red">Crear Tema de Foro</span></center>
<? if ( !empty($_POST['submit_resp']) )  { ?>
<div class="section group">

    <p class="cuerpo_gris_12"><span class="tit_red">Env&iacute;o de Notificaciones</span><br />
        <br />
       <strong>Tu notificaci&oacute;n ha sido enviada.</strong><br />
        Tus grupo recibir&aacute; las notificaciones prontamente.<br />
       <br />
      <br />
      </p>
    
    </div>




<?}else{?>

<?php 
$query = "SELECT id from ejecutivo_seguidores where id_sigo=".$row_data["id_ejecutiv"]." and mi_id<>".$row_data["id_ejecutiv"];
$resultado = mysql_query ($query, $dbConn);
$numeroRegistros_siguen=mysql_num_rows($resultado); 

//Se trae un listado con las preguntas
 ?>
<form method="post"  data-ajax="false"  > 
<table class="table_msg">

      <tr>
        <td>
		<div class="section group">
		<strong>Selecciona el grupo de destino.</strong>
		<select name="grupo" id="grupo"  >
						<option value="0" SELECTED>Seleccionar</option> 
						<? $SQL_grupo=" SELECT nombre_grupo,id_grupo FROM grupo where creador=".$row_data["id_ejecutiv"];
							$glosa=mysql_query($SQL_grupo,$dbConn); 
							while($filaglosa=mysql_fetch_array($glosa)) {?>
								<option value="<?=$filaglosa["id_grupo"]?>" ><?=$filaglosa["nombre_grupo"]?></option>
							<?}?>

						</select><br><br><br>
		<strong>Ingresa Tema del Foro</strong> <span class="fecha_gris_12" align=left>(300 caract. Max.)</span>
			<input name="message" type="text" class="arial_light_cuadro" id="message" maxlength="300" placeholder="Ingresa Tema del Foro" /><br />
			<span class="fecha_gris_12" align=left>Una Notificacion sera enviada al grupo seleccionado.</span>
			
			</div></div>
        </td>
      </tr>
      <tr>
        <td>
		 <input name="yo" type="hidden" id="yo" value=<?=$row_data["id_ejecutiv"]?> />
         <br><br><br><input name="submit_resp" type="submit"  id="post_button" value="Enviar" />
   
        </td>
      </tr>
</table>  
</form>
<?}?>
 


                
   
</div> 


</div>



</body>
</html>