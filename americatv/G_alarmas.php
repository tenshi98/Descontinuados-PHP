<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
session_start();
require_once('nombre_pag.php');
require_once('conexion.php');

if ($_SESSION['usuario']<>"") {
	
	$sql ="Select * from ejecutivos where id_ejecutiv='" . $_SESSION['usuario'] . "'";

}else{

	$sql ="SELECT * FROM ejecutivos WHERE login='" . $_POST["login"] . "' AND pass='" . $_POST["password"] . "'";

}

$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 

if ($numeroRegistros==0)  {

?>
		<script language="javascript">
			alert("Los datos ingresados son erroneos o su sesion expiro");
			window.location = "http://<?=$nombreurl?>";
		</SCRIPT>
<?
}else{
		while($perfil=mysql_fetch_array($res))
		{
		
		  $nombre=$perfil['nom_ejecutiv'];
		  $login=$perfil['login'];
		  $pass=$perfil['pass'];
		  $correo_ejecutivo=$perfil['mail_ejecutiv'];
		  $_SESSION['usuario']=$perfil['id_ejecutiv'];
		  $correo=$perfil['nom_ejecutiv'];
		  $activar_vm=$perfil['activar_vm'];
		  $cod_fono=$perfil['cod_fono'];
		  $fono_ejecutiv=$perfil['fono_ejecutiv'];
		  $foto=$perfil["foto"];
		  $sms1=$perfil["sms1"];
		  $sms2=$perfil["sms2"];
		  $sms3=$perfil["sms3"];


		  list($paso12,$anexo) = split('-',$perfil["numero_usuario"]);

				$sql2="select * from tipo_usuario where tipo='". $perfil['tipo_usuario'] ."'";
				$res2=mysql_query($sql2,$base); 
					while($perfil2=mysql_fetch_array($res2))
					{
						$descripcion=$perfil2["descripcion"];
						$anexo_ip=$perfil2["anexo_ip"];
						$click2call=$perfil2["click2call"];
						$correos=$perfil2["correos"];
						$existe=1;
					}

		}

}



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="./favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="estilo.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
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
</head >

<body>
<div id="nonFooter" width="100%">
 <?   
    require_once('inc/menu.incl');  
?>  
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="35%" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
              <td height="350" align="right" valign="bottom"><img src="images/logo.png" width="278" height="317" /></td>
            </tr>
        </table></td>
        <td width="65%" align="right" valign="top"><table width="693" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top"><table id="table28" border="0" cellpadding="0" cellspacing="0" width="600">
              <tbody>
                <tr>
                  <td height="200" colspan="3" align="center" valign="middle">
				  
				  <? if ($numeroRegistros<>0) { ?>   
 <!--contenido-->
    
    
    
    <?


	$sql="INSERT INTO alarmas (idusuario_ala, fecha_creacion, hora, minuto, lun, mar, mie, jue, vie, sab, dom, mensaje, activo) VALUES ('".$login."', NOW(), '".$_POST["hora"]."', '".$_POST["minutos"]."', '".$_POST["lun"]."', '".$_POST["mar"]."', '".$_POST["mie"]."', '".$_POST["jue"]."', '".$_POST["vie"]."', '".$_POST["sab"]."', '".$_POST["dom"]."', '".$_POST["mensaje"]."', '".$_POST["activo"]."')";
	$actualiza=mysql_query($sql,$base); 
		
?>
    

              <p><span class="google_fjalla_gde">Los datos fueron actualizados, la alarma fue creada.</span></p>
			  <input name="button3" type="submit" class="bot_sombra1" id="button3"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/administracion.php';"  value="Volver a la Administraci&oacute;n" />

    
    
    
    
    
    
    
    <!--contenido-->   
<?}else{?>

<br><br><br>
			<span class="celda_titulo_cat"> Su Sesión ha Expirado </span><br><br><br>

			<a href="http://<?=$nombreurl?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagen15','','../images/reingrese_up.png',1)">
		<img src="../../images/reingrese.png" name="Imagen15"  border="0"></a>
<?}?>        
</td>
                </tr>
                <br />
              </table></td>
            </tr>
          </tbody>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
  <blockquote>&nbsp;	</blockquote>

<!--Tabla de margen frente al footer -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="70">&nbsp;</td>
  </tr>
</table>

<!--Fin de la Tabla de margen frente al footer -->

</div> 

<!-- Footer, debe estar dentro del Div-->
<div id="Footer">
  <table  width="100%" border="0" cellpadding="0" cellspacing="0" class="pie2" valign="bottom">
    <tr>
      <td align="center" valign="middle" ><a href="#" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Image2','','images/logo_footer_up2.png',1)"><img src="images/logo_footer_up.png" name="Image2" width="300" height="64" border="0" id="Image2" /></a></td>
    </tr>
  </table>
  <table  width="100%" border="0" cellpadding="0" cellspacing="0" class="pie" valign="bottom">
    <tr>
      <td align="center" valign="middle" class="arial_bco_light_med">Avenida Kennedy 5735 • Edificio Hotel Marriot, Torre Poniente , Oficina 1107. Las Condes, Santiago • (56 2) 2454637 - 2454622</td>
    </tr>
  </table>
</div>
<!-- Fin del Footer-->

</body>
</html>
