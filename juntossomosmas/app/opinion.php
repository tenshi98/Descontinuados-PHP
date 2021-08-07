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
//require_once 'AR2D2CFFDJFDJX1/xrxs_funciones/functions.php';
require_once '../preguntas/AA2D2CFFDJFDJX1/xrxs_funciones/functions.php';
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
	$location.='?imei='.$_GET['imei'];


require_once('../nombre_pag.php');
require("../PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;

if ($_POST["correo"]<>"" or $_POST['comentarios']<>"") {
$enviado=1;
$nombre=$_POST['nombre'];
$origen=$_POST['correo'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['comentarios'];

$mail->From=$origen;
	$mail->FromName=$nombre;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($concopia);
	$mail->Subject = $asunto;
	$mail->IsHTML(true);
			$body = "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"";
			$body .= "\"http://www.w3.org/TR/html4/loose.dtd\">";
			$body .= "<html>";
			$body .= "<head>";
			$body .= "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">";
			$body .= "<title>Informativo</title>";
			$body .= "</head>";
			$body .= " ";
			$body .= "<body bgcolor=#ffffff>";
			$body .= "";
			$body .=  "<table width='575' border='0' cellspacing='0' cellpadding='0' id='table7' height='494'><tr><td height=98 class='arial_12_blue' align=center  >";
			$body .=  "<p><font color='#000000' face='Arial'>". $nombre."(".$origen."),  Escribio en ". $nombreurl."</font></p><font color='#000000' face='Arial'><strong>Asunto: ". $asunto."</strong><br /></font><br /><br /><font color='#000000' face='Arial'>Mensaje: ". $mensaje."<br /></font></td></tr></table>";
			$body .= "</body></html>";

			$mail->MsgHTML($body);
			if(!$mail->Send())
			{
				$mail->ClearAddresses();
			}
			else
			{

  			 $mail->ClearAddresses();
			}

}
	header( 'Location: '.$location );
	die;



}
/**********************************************************************************************************************************/
/*                                  Se verifica que el usuario exista dentro de la base de datos                                  */
/**********************************************************************************************************************************/


$sql ="SELECT id_ejecutiv,nom_ejecutiv,mail_ejecutiv FROM ejecutivos WHERE imei='".$_GET["imei"]."'";
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

	//echo $newlocation;
	
if ($numeroRegistros==0)  {
	//Redirijo a la solicitud de rut
	header( 'Location: '.$newlocation );
	die;	
}

if ($_GET["id"]<>'') {
		$sql2="update ejecutivos set gcmcode='".$_GET["id"]."'   WHERE imei='" . $_GET["imei"] . "'";
	$result = mysql_query($sql2,$dbConn);
}
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
<?php 

$query = "SELECT id from ejecutivo_seguidores where aceptado=1 and  (( creador_grupo=".$row_data["id_ejecutiv"]." and tipo='G')  or (id_sigo=".$row_data["id_ejecutiv"]." and tipo='P'))";
$resultado = mysql_query ($query, $dbConn);
$numeroRegistros_siguen=mysql_num_rows($resultado); 
$query = "SELECT id from ejecutivo_seguidores where mi_id=".$row_data["id_ejecutiv"]." and aceptado=1";
$resultado = mysql_query ($query, $dbConn);
$numeroRegistros_sigo=mysql_num_rows($resultado); 
$query = "SELECT * from ejecutivo_seguidores WHERE aceptado=0 and  (( creador_grupo=".$row_data["id_ejecutiv"]." and tipo='G')  or (id_sigo=".$row_data["id_ejecutiv"]." and tipo='P'))";
$resultado = mysql_query ($query, $dbConn);
$numeroRegistros_pendientes=mysql_num_rows($resultado); 
//Se trae un listado con las preguntas
 ?>
<div class="height100 widht100">
<div class="widht90 fcenter perfil">
    <div class="cuerpo_gris_12">
	<center><span class="tit_red">Envianos tu Opinion</span></center>
	<strong>Me Siguen: </strong><?=$numeroRegistros_siguen?>&nbsp;/&nbsp;<strong>Sigo: </strong><?=$numeroRegistros_sigo?>&nbsp;/&nbsp;<strong>Pendientes: </strong><?=$numeroRegistros_pendientes?><br><br>
   </div>
<table width="90%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" valign="top">
			<form method="post"  data-ajax="false"  > 
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="30%">Nombre</td>
                <td width="70%">
				<input name="nombre" type="text" placeholder="(*) Nombre y Apellido" class="cuadro_texto_ingreso_borde esquina_red"  id="nombre" value="<?=$row_data["nom_ejecutiv"]?>" /></td>
              </tr>
              <tr>
                <td>Correo</td>
                <td>
				<input name="correo" type="text" placeholder="(*) Correo Electr&oacute;nico" class="cuadro_texto_ingreso_borde esquina_red" id="correo" value="<?=$row_data["mail_ejecutiv"]?>"/></td>
              </tr>
              <tr>
                <td align="left" valign="middle">Asunto</td>
                <td align="left" valign="middle"><input name="asunto" type="text" placeholder="(*) Asunto del Mensaje" class="cuadro_texto_ingreso_borde esquina_red" id="asunto" /></td>
              </tr>
              <tr>
                <td align="left" valign="middle">Mensaje</td>
                <td align="left" valign="middle">
				<textarea name="comentarios" cols="80" rows="6" class="cuadro_texto_ingreso_borde_multi esquina_red" onkeydown="cuenta()" onkeyup="cuenta()" maxlength="255"></textarea>
				</td>
              </tr>
            </table>
			
			</td>
          </tr>
          <tr>
            <td height="50" align="left" valign="middle"><h3>* Todos los campos de informaci&oacute;n deben ser llenados</h3></td>
          </tr>
		            <tr>
            <td height="50" align="left" valign="middle"><input name="submit_resp" type="submit"  id="post_button" value="Enviar Mensaje" />
		</td>
          </tr>
        </table>
		</form>

<div class="clear"></div>

<div id="loaded_data"></div>


<div class="clear"></div>
<div class="border_btn"></div>

<!--a href="<?php echo $location.'?imei='.$_GET['imei'] ?>"><input id="post_button" type="button" value="Volver"/></a-->

</div>



</div>


</body>
</html>