<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');
require("../PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<link rel="stylesheet" type="text/css" href="http://<?=$nombreurl?>/shadowbox/shadowbox.css">
<script type="text/javascript" src="http://<?=$nombreurl?>/shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    overlayOpacity: 0.8
});
</script>

</head>
<body class="body2">


<center>
 <table align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="26" height="26"><img src="http://<?=$nombreurl?>/images/a1.png" width="26" height="26" /></td>
    <td background="http://<?=$nombreurl?>/images/a2.png"></td>
    <td width="26" height="26"><img src="http://<?=$nombreurl?>/images/a3.png" width="26" height="26" /></td>
  </tr>
  <tr>
    <td background="http://<?=$nombreurl?>/images/b1.png"></td>
    <td align="center" valign="middle" bgcolor="#FFFFFF">
<!-- contenido -->

   <?



if ($_POST["enviador"]<>"" and $_POST['mensaje']<>"") {
$prefijo = substr(md5(uniqid(rand())),0,8);
$sql="update vc set codigo='".$prefijo."'";

$result = mysql_query($sql,$base);


$foto_base= "../images/invitacion_video.png";
$mail->AddEmbeddedImage($foto_base, 'foto_base','file/centro.png','base64','image/png');
$enviado=1;
$nombre=$_POST['nombre'];
$origen=$_POST['enviador'];
$asunto=$_POST['asunto'];
$mensaje=$_POST['mensaje'];
$receptor=$_POST['receptor'];
$videomail  = "http://".$nombreurl."/vc/?id=".$prefijo."&t=".$_POST['tiempo'];

$mail->From=$origen;
	$mail->FromName=$nombre;
	$mail->Sender=$origen;
	$mail->AddReplyTo($origen, "Responde a este mail");
	$mail->AddAddress($receptor);
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
$body .=  "<p><font color='#000000' face='Arial'>". $nombre.", Te esta haciendo una invitacion </font></p><font color='#000000' face='Arial'>". $mensaje."<br /></font></td></tr>";
$body .=  "<tr><td align='center' valign='middle' ><a href=". $videomail . "><img src='cid:foto_base' border=0></a><br><br><a href=". $videomail . ">Si no puedes ver la imagen, da Click Aqui.</a></td></tr></table>";
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

if ($enviado=1) {
?>
<center>
           <br><br><br><blockquote>
              <p><span class="georgia_bl_18_it_padd">El Mensaje fue enviado con &Eacute;xito.</span></p>
			   <p><span class="georgia_bl_18_it_padd">Puedes cerrar la ventana.</span></p>
            </blockquote><br><br><br>
</center>
<?}else{?>
<center>
           <br><br><br><blockquote>
              <p><span class="georgia_bl_18_it_padd">Necesitas ingresar a lo menos un tu correo y un mensaje.</span></p>
            </blockquote><br><br><br>
</center>
<?}?>


<!-- contenido -->
</td>
    <td background="http://<?=$nombreurl?>/images/b3.png"></td>
  </tr>
  <tr>
    <td width="26" height="26"><img src="http://<?=$nombreurl?>/images/c1.png" width="26" height="26" /></td>
    <td background="http://<?=$nombreurl?>/images/c2.png"></td>
    <td width="26" height="26"><img src="http://<?=$nombreurl?>/images/c3.png" width="26" height="26" /></td>
  </tr>
    <tr>
    <td width="26" height="26">&nbsp;</td>
    <td align=center><a href="#" onclick="window.parent.Shadowbox.close();" ><IMG alt="Cerrar Pagina" src="http://<?=$nombreurl?>/images/cerrar_ventana.png" border=0></a></td>
    <td width="26" height="26">&nbsp;</td>
  </tr>
</table>