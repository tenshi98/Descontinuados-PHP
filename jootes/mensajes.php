<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
require_once('./nombre_pag.php');
require_once('./conexion.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="./favicon.ico" type="image/x-icon">
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>


<script type="text/javascript">
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
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
</script>

</head >

<body>
<div id="nonFooter" width="100%">
  <table bgcolor="#999999" width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td align="center" valign="middle">
	
	<table width="990" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="58%" align="center" valign="middle" class="google_fjalla_bco"><table border="0" cellpadding="0" cellspacing="0" class="logo_flot">
          <tr>
            <td><img src="./images/logo.png" /></td>
          </tr>
        </table>
         </td>
      </tr>
    </table></td>
    </tr>
</table>

<table id="table3" border="0" cellpadding="0" cellspacing="0" width="100%" >
            <tr>
              <td height=75>&nbsp;</td>
              </tr>

          </table>
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0"  class="fondo_comenta_padd">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="50" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><table width="50%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" valign="middle" height=50>
						<table width="600" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td align="center" valign="middle" class="arial_cuerpo_14_bold">Gestor de Notificaciones<br />
                                <span class="arial_cuerpo_14_bold">Las notificaciones se enviarán a grupos inscritos en el sistema</span><br></td>
                            </tr>
                            <tr></tr>
                          </tbody>
                        </table>
						</td>
                      </tr>
                      <tr>
                        <td>
						<form method="POST" action="envia_mensajes.php">
                        <input type="hidden" name=tag value="sendmessage">
						
						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                          <tr>
                            <td width="50%" height="40" align="left" valign="middle"><span class="arial_cuerpo_14_bold"><b>Mensaje</b></span><br />                              
                            <span class="arial_cuerpo_9">Redacta aquí tu mensaje.</span></td>
                            <td width="50%">
							
							<input name="message" type="text" class="arial_light_cuadro" id="message" />
							
							</td>
                          </tr>
                        </table>
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td width="50%" height="40" align="left" valign="middle"><span class="arial_cuerpo_14_bold"><b>Grupo</b><br />
                                </span><span class="arial_cuerpo_9">Nombre del grupo al que enviarás el mensaje</span></td>
                              <td width="50%">
							  
<select  type="text" name="grupo" id="grupo" class="arial_light_cuadro"  >
							<option value="" SELECTED>Selecciona Grupo</option>
								<?
								$SQL_lee4="SELECT grupo FROM usuarios group by grupo ORDER BY grupo ASC";
								$res=mysql_query($SQL_lee4,$base); 
								while($fila=mysql_fetch_array($res)) {
									$grupo = $fila["grupo"];
								?>
								<option value="<?=$grupo?>"><?=$grupo?></option>
					
								<? }?>
								</select> 

							  
							  </td>
                            </tr>
                          </table>



                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td width="50%" height="40" align="left" valign="middle"><span class="arial_cuerpo_14_bold"><b>Usuario</b><br />
                                </span><span class="arial_cuerpo_9">Correo del usuario al que enviarás el mensaje</span></td>
                              <td width="50%">
							<select  type="text" name="username" id="username" class="arial_light_cuadro"  >
							<option value="" SELECTED>Selecciona Usuario</option>
								<?
								$SQL_lee4="SELECT username FROM usuarios ORDER BY username ASC";
								$res=mysql_query($SQL_lee4,$base); 
								while($fila=mysql_fetch_array($res)) {
									$username = $fila["username"];
								?>
								<option value="<?=$username?>"><?=$username?></option>
					
								<? }?>
								</select> 
							  
							  </td>
                            </tr>
                          </table>

<?
$sql2="SELECT * FROM mensajes ORDER BY id DESC LIMIT 0, 1"; 
$a=0;
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) { 
	$id_mensaje=$registro["id"];
	$id_valor=(int)$id_mensaje+1;
}?>

                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td height="40" align="left"><span class="arial_cuerpo_14_bold"><b>Id del Mensaje</b></span><br />
                                <span class="arial_cuerpo_9">Número de registro del mensaje enviado</span></td>
                              <td width="50%">
							  <input name="collapsekey" type="text" class="arial_light_cuadro" id="collapsekey" value=<?=$id_valor?>  readonly/>
							  
							  </td>
                            </tr>
                          </table>
						  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td height="40" align="left"><span class="arial_cuerpo_14_bold"><b>Link de Conexi&oacute;n</b></span><br />
                                <span class="arial_cuerpo_9">Enlace a una Web que conecta el mensaje (http://...)</span></td>
                              <td width="50%">
							  <input name="link" type="text" class="arial_light_cuadro" id="link" />
							  
							  </td>
                            </tr>
                          </table>

						  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td height="40" align="left"><span class="arial_cuerpo_14_bold"><b>Puntos</b></span><br />
                                <span class="arial_cuerpo_9">Puntos que entregar&aacute; el enlace</span></td>
                              <td width="50%">
							  <input name="puntos" type="text" class="arial_light_cuadro" id="puntos" value=0 />
							  
							  </td>
                            </tr>
                          </table>

                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td height="40" align="right"><br><br><input name="button5" type="submit" class="bot_red_ch" id="button5" value="Enviar Mensaje" /></td>
                              </tr>
                          </table>
                      <tr>
                        <td>&nbsp;</td>
                      </tr>
                    </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top"><table id="table3" border="0" cellpadding="0" cellspacing="0" width="100%">
          <tbody>
            <tr>
              <td>&nbsp;</td>
              </tr>
            </tbody>
          </table></td>
        </tr>
      </table></td>
  </tr>
</table>

<!--Tabla de margen frente al footer -->

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="70">&nbsp;</td>
  </tr>
</table>

<!--Fin de la Tabla de margen frente al footer -->

</div> 




</body>
</html>
