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
$location = "gracias_cel_01.php";
/**********************************************************************************************************************************/
/*                                          Se llaman a las partes de los formularios                                             */
/**********************************************************************************************************************************/
//Formulario creacion
if ( !empty($_POST['submit_resp']) )  { 
	//Agregamos direcciones
$command = "/usr/bin/wget -N -q http://psvirtual.sosclick.cl/app/envia_generador.php?mensaje='".$_POST['message']."3xyzxyz3".$_POST['sigo']."' &";
echo $command;
$fp = shell_exec($command);
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

<div class="height100 widht100">

<div class="widht80 fcenter perfil">
<h1>Mensaje</h1> 
<? if ( !empty($_POST['submit_resp']) )  { ?>
<div class="section group">
    <div class="sello_agua">
    <p class="cuerpo_gris_12"><span class="tit_red">Envio de Notificaciones</span><br />
        <br />
       <strong>Tu notificacion ha sido enviada.</strong><br />
        Tus grupo recibira las notificaciones prontamente.<br />
       <br />
      <br />
      </p>
    
    </div>
</div>


<?}else{?>
<form method="post"  data-ajax="false"  > 
<table class="table_msg">

      <tr>
        <td>
		<div class="section group"><div class="sello_agua"><strong>Ingresa tu mensaje</strong> (300 caract. Max)<br />Este sera enviado a tus seguidores.</div></div>
			<input name="message" type="text" class="arial_light_cuadro" id="message" maxlength="300" />
			<input name="sigo" type="hidden" id="sigo" value=<?=$row["sigo"]?> />
        </td>
      </tr>
      <tr>
        <td>
         <input name="submit_resp" type="submit"  id="post_button" value="Enviar" />
   
        </td>
      </tr>
</table>  
</form>
<?}?>
 
</div> 

                
   
</div> 


</div>



</body>
</html>