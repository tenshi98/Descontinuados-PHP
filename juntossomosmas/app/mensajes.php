<?php session_start();
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
/*                                 realizo la validacion del equipo con el cual se ingresa                                        */
/**********************************************************************************************************************************/
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head>
	<meta charset="UTF-8">	
	<title>Mensajes</title> 
	<link href="css/estilo.css" rel="stylesheet" type="text/css" />
	<META http-equiv="Page-Enter" CONTENT="RevealTrans(Duration=4,Transition=7)"/>
</head>
 
<body>

<div class="height100 widht100">
<?php //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 //SE TRAEN TODOS LOS DATOS DE SOLO UN USUARIO	
$query = "SELECT ejecutivos.nom_ejecutiv AS nombre FROM `ejecutivos` WHERE ejecutivos.imei = '".$_GET["imei"]."'";
$resultado = mysql_query ($query, $dbConn);
$rowusr = mysql_fetch_assoc ($resultado); ?>


<div class="widht80 fcenter perfil">
<h1>Bienvenida</h1>
<table class="table_msg">
 
  <tr>
    <td ><b><?=$rowusr["nombre"]?></b>, te damos la bienvenida a <b>PSVIRTUAL</b> y te recordamos que para el uso de nuestro sistema, debes utilizar el menu de tu dispositivo, ah&iacute; encontrar&aacute;s los siguientes Item:</td>
  </tr>
    <tr>
    <td >&nbsp;</td>
  </tr>
    <tr>
    <td ><b>"Menu de Llamadas"</b>, esto te permite realizar alertas, las que ser&aacute;n notificadas a tu C&iacute;rculo de seguridad, este debe ser definido por ti en el &aacute;rea de <b>"Mis Contactos"</b>.</td>
  </tr>
      <tr>
    <td ><b>"&Uacute;ltima Alerta"</b>, este Item te permite revisar la &uacute;ltima alerta generada por un usuario.</td>
  </tr>
      <tr>
    <td ><b>"Ver Notificaciones"</b>, en esta &aacute;rea, se despliegan las ultimas notificaciones que env&iacute;a la empresa com el Municipio Asociado.</td>
  </tr>
      <tr>
    <td ><b>"Perfil"</b>, Puedes modificar tus datos personales.</td>
  </tr>
      <tr>
    <td ><b>"Mis Contactos"</b>, esta, es la secci&oacute;n m&aacute;s importante para tu seguridad, ah&iacute; podr&aacute;s definir, notificar e invitar a tus contactos personales para que reciban tus alertas, en este momento, como es tu primera vez en nuestro sistema, es necesario que definas tus contactos, para esto, en el menu de su SmartPhone, selecciona esta opci&oacute;n, escribe su n&uacute;mero de celular y si esta registrado, se enviar&aacute; una notificaci&oacute;n informando que esta dentro de tu c&iacute;rculo de seguridad, si a&uacute;n no esta registrado, se enviar&aacute; un SMS con la invitaci&oacute;n a instalar el sistema y pertenecer a tu c&iacute;rculo de seguridad.</td>
  </tr>

</table>  

   



</div> 

</div>



</body>
</html>