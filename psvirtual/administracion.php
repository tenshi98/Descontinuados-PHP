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
		  $fono_alarma=$perfil['fono_alarma'];

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
                  <td height="200" colspan="3" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="arial_tit_gris" id="table29">
                    <tbody>
                      <tr>
                        <td height="100" align="left" valign="middle">Configura los distintos números telefónicos, Password y los distintos datos personales.</td>
                        </tr>
                      </tbody>
                  </table>
                    <table id="table30" border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <td>
						  		<FORM  name="mainFrame" id="mainFrame" onSubmit="return aceptar(this);" action="G_gestores.php" method="post" target="_self">   
						  
						  <table border="0" cellpadding="0" cellspacing="0" >
                            <tr>
                              <td width="172" height="34" align="left" class="arial_light_med"><strong>** </strong>Nombre</td>
                              <td colspan="3" align="left" height="34" width="418"><input name="nombre" type="text" class="arial_light_cuadro" id="nombre"  value="<?=$nombre?>" size="37" /></td>
                              </tr>
                            <tr>
                              <td width="172" height="34" align="left" class="arial_light_med"><strong> </strong>Tu Login (no modificable)</td>
                              <td colspan="3" align="left" height="34" width="418"  class="arial_light_med"> <?=$login?></td>
                              </tr>
                            <tr>
                              <td width="172" height="34" align="left" class="arial_light_med">** Password</td>
                              <td colspan="3" align="left" height="34" width="418"><input name="password" type="password" class="arial_light_cuadro" id="password"  value="<?=$pass?>" size="37" /></td>
                              </tr>
                            <tr>
                              <td width="172" height="34" align="left" class="arial_light_med">** Reingresa Password</td>
                              <td colspan="3" align="left" height="34" width="418"><input name="password1" type="password" class="arial_light_cuadro" id="password1"  value="<?=$pass?>" size="37" /></td>
                            </tr>
                            <tr>
                              <td width="172" height="34" align="left" class="arial_light_med_red"><strong>** </strong>Telefono de Seguridad</td>
                              <td colspan="3" align="left" height="34" width="418"><input name="seguridad" type="text" class="arial_light_cuadro" id="seguridad" onkeypress="return validarNum(event)" value="<?=$fono_alarma?>" size="15" maxlength="12" /></td>
                            </tr>
                            <tr>
                              <td width="172" height="34" align="left" class="arial_light_med"><strong>** </strong>Tu Numero Celular</td>
                              <td colspan="3" align="left" height="34" width="418"><input name="fono" type="text" class="arial_light_cuadro" id="fono" onkeypress="return validarNum(event)" value="<?=$fono_ejecutiv?>" size="15" maxlength="12" /></td>
                            </tr>
                            <tr>
                              <td width="172" height="34" align="left" class="arial_light_med">** Celular Receptor de SMS</td>
                              <td colspan="3" align="left" height="34" width="418"><input name="sms1" type="text" class="arial_light_cuadro" id="sms1" onkeypress="return validarNum(event)" value="<?=$sms1?>" size="15" maxlength="12" /></td>
                              </tr>
                            <tr>
                              <td width="172" height="34" align="left" class="arial_light_med">** Celular Receptor de SMS</td>
                              <td colspan="3" align="left" height="34" width="418"><input name="sms2" type="text" class="arial_light_cuadro" id="sms2" onkeypress="return validarNum(event)" value="<?=$sms2?>" size="15" maxlength="12" /></td>
                              </tr>
                            <tr>
                              <td height="34" align="left" class="arial_light_med">** Celular Receptor de SMS</td>
                              <td colspan="3" align="left" height="34"><input name="sms3" type="text" class="arial_light_cuadro" id="sms3" onkeypress="return validarNum(event)" value="<?=$sms3?>" size="15" maxlength="12" /></td>
                            </tr>
                            <tr>
                              <td width="172" height="34" align="left" class="arial_light_med">&nbsp;</td>
                              <td colspan="3" align="left" height="34" width="418"><input name="button5" type="submit" class="rojo_sombra_ch" id="button5" value="Guardar Cambios" />
							  </form> 
							   <input name="button3" type="text" class="rojo_sombra_ch" id="button3" value="Descarga la Aplicación" onclick="javascript:window.open('pop_descarga.php','Telefonía','height=400px,width=480px,help=no,scrollbars=no,menubar=no,status=no,titlebar=no,toolbar=no');"  />
							  </td>
                              </tr>
                            </table>
							
							
							
							</td>
                          </tr>
                        </tbody>
                    </table></td>
                </tr>
                </tbody>
            </table></td>
          </tr>
        </table></td>
      </tr>
  </table></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top"><table id="table3" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td><table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="581" rowspan="4" align="center" valign="top"><table width="600" border="0" cellspacing="0" cellpadding="0">
                    <tbody>
                        <tr>
                          <td align="center" valign="middle" class="google_fjalla_gde">Reporte de tu Botón de Emergencia<br />
                            <span class="arial_light_med">5 &Uacute;ltimos resultados</span></td>
                        </tr>
                        <tr></tr>
                        </tbody>
                  </table>
                    <hr noshade="noshade" />
                    <table width="100%">
                      <tbody>
                        <tr class="arial_tit_gris">
                          <td width="7%" align="left" height="47">Sistema</td>
                          <td width="29%" align="left" height="47"><p>Mensaje del llamado</p></td>
                          <td width="15%" align="left" height="47">Fecha y Hora</td>
                          <td width="14%" align="left" height="47">Telefono</td>
                          <td width="15%" align="left" height="47">Activador</td>
                          <td width="13%" align="left" height="47">Localizacion</td>
                          <td width="7%" align="left"></td>
                        </tr>
<?
$sql2="SELECT * FROM activaciones where id_usuario=".$_SESSION['usuario']." ORDER BY id_sms DESC LIMIT 5"; 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) 
{ 
		$id=$registro["id_sms"];
		$remitente = $registro["remitente"];
		$mensaje=$registro["mensaje"];    
		$fecha_hora=$registro["fecha_hora"]; 
		$origen=$registro["origen"]; 
		$lat=str_replace(",",".",$registro["lat"]);
		$lon=str_replace(",",".",$registro["lon"]); 
$sql ="Select * from ejecutivos where id_ejecutiv=" . $registro["id_usuario"];
$res=mysql_query($sql,$base); 
		while($fila=mysql_fetch_array($res))
		{
		  $nombre=$fila['nom_ejecutiv'];
		}
?>



  <!-- tabla de resultados rel=shadowbox;width=700;height=500  --> 
 
 <tr>
                <td width="7%"  align="left" class="arial_light_med" height=15>
                <span class="arial_10_33"><?=$remitente?></span></td>
                <td width="29%"  align="left" class="arial_light_med"><?=$mensaje?></td>
                <td width="15%"  align="left" class="arial_light_med"><?=$fecha_hora?></td>
                <td width="14%"  align="left" class="arial_light_med"><?=$origen?></td>                                   
                <td width="18%"  align="left" class="arial_light_med"><?=$nombre?></td>
				<td width="10%"  align="left" class="arial_light_med">
				<a href="http://<?=$nombreurl?>/alarmdetalle.php?lon=<?=$lon?>&lat=<?=$lat?>"  rel=shadowbox;width=900;height=600 >
				<img src="http://<?=$nombreurl?>/images/mytracks_icon.png" width="45" height="45" border="0" /></a></td>   
				 
				<td width="7%"  align="left" class="arial_10_33">

</td>
         
</tr>

    
   <!-- fin tabla resultados --> 
<?	
}//fin while ?>
                        <!--tr>
                          <td width="7%" height="15" align="left" class="arial_light_med">Sosclick</td>
                          <td width="29%" align="left" class="arial_light_med">Avda Kennedy 5735</td>
                          <td width="15%" align="left" class="arial_light_med">2013-03-18 09:08:07</td>
                          <td width="14%" align="left" class="arial_light_med">0976338786</td>
                          <td width="15%" align="left" class="arial_light_med">MIRIAM PALMA</td>
                          <td width="13%" align="left"><a href="http://maps.google.com/maps?q=loc:-33.45401,-70.59514" target="_blank"><img src="images/mytracks_icon.png" width="45" height="45" border="0" /></a></td>
                          <td width="7%" align="left"><form language="javascript" name="112" id="112" action="http://www.sosclick.cl/monitor/index.php" method="post" target="_self">
                            <input name="envia" type="submit" class="rojo_sombra_ch" value="Apagar" width="66" height="23" />
                          </form></td>
                        </tr-->

                      </tbody>
                    </table>
                    <br />
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
