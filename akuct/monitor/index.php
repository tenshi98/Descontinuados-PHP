<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="http://<?=$nombreurl?>/favicon.ico" type="image/x-icon">
<link href="http://<?=$nombreurl?>/estilo.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Fjalla+One|Arizonia&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link href="mapestilo.css" rel="stylesheet" type="text/css" />
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


</head>

<body onload="MM_preloadImages('../images/logo_footer_up2.png')">
<div id="nonFooter" >

 <table bgcolor="#999999" width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
    <td align="center" valign="middle"><table width="990" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="58%" align="right" valign="middle" class="google_fjalla_bco"><table border="0" cellpadding="0" cellspacing="0" class="logo_flot">
          <tr>
            <td><img src="../images/logo.png" height="200" /></td>
          </tr>
        </table>
          Monitoreo <?=$nombreurl?></td>
        <td width="42%" height="50" align="center" valign="middle">
		<input name="button" type="submit" class="bot_sombra_izq" id="button" value="" />
          <input name="button2" type="submit" class="bot_sombra_cent" id="button2" value="Volver"  onclick="javascript:window.location.href='http://<?=$nombreurl?>/admin';"/>
          <input name="button4" type="submit" class="bot_sombra_der" id="button4" value="" /></td>
      </tr>
    </table></td>
    </tr>
</table>
  <table width="990" border="0" align="center" cellpadding="0" cellspacing="0" class="tabla_top">
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="50" align="center" valign="middle"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tabla_bca_sombra">
              <tr>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td align="center"><table width="50%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" valign="middle"><table width="600" border="0" cellspacing="0" cellpadding="0">
                          <tbody>
                            <tr>
                              <td align="center" valign="middle" class="google_fjalla_gde">Men&uacute; de Opciones<br />
                                <span class="arial_light_med">&nbsp;</span></td>
                            </tr>
                            <tr></tr>
                          </tbody>
                        </table></td>
                      </tr>
                      <tr>
                        <td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                          <tr>
                            <td height="40" align="left" valign="middle"><span class="arial_tit_gris">Alarmas</span><br />
							<span class="arial_cuerpo_gris">Visualiza el reporte de las Alarmas activas</span></td>
                            <td width="19%"><form method="post" id="menu_form" action="alarmas.php">
							<input name="button4" type="submit" class="bot_sombra" id="button4" value="Ingresar" /></form></td>
                          </tr>
                        </table>
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <tr>
                              <td height="40" align="left" valign="middle"><span class="arial_tit_gris">Última Alarma</span><br />
                                <span class="arial_cuerpo_gris">Visualiza, el lugar de la activación de la &uacute;ltima Alarma emitida</span></td>
                              <td width="19%"><form method="post" id="menu_form" action="vigilancia.php">
							  <input name="button5" type="submit" class="bot_sombra" id="button5" value="Ingresar" /></form></td>
                            </tr>
                          </table>
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
						    <form method="post" id="menu_form" action="historico_fecha.php">
                            <tr>
                              <td width="50%" height="40" align="left"><span class="arial_tit_gris">Históricos por Fecha</span><br />
                                <span class="arial_cuerpo_gris">Vizualiza en el Mapa los eventos de una fecha determinada</span></td>
                              <td width="31%">
							    <span class="arial_gris_med">
									<select name="fecha" class="arial_light_combo" id="fecha">
									<option value="0" SELECTED>Selecciona la Fecha</option>
					<?
					$SQL_lee4="select LEFT( fecha_hora, 10 ) as fecha  from activaciones group by LEFT( fecha_hora, 10 )  order by LEFT( fecha_hora, 10 ) desc";
					$res=mysql_query($SQL_lee4,$base); 
					
					while($fila=mysql_fetch_array($res)) {
							$fecha = $fila["fecha"];
							?>
							
						<option value="<?=$fecha?>"><?=$fecha?></option>
						
					
					<? }?>
									</select>

                              </span></td>
                              <td width="19%"><input name="button6" type="submit" class="bot_sombra" id="button6" value="Ingresar" /></td>
                            </tr></form>
                          </table>
                          <table width="100%" border="0" cellpadding="0" cellspacing="0" class="celda_borde">
                            <form method="post" id="menu_form" action="historico_usuario.php">
							<input type="hidden" name="dedonde" value="menu">
						    <tr>
                              <td width="50%" height="40" align="left"><span class="arial_tit_gris">Históricos por Usuario</span><br />
                                <span class="arial_cuerpo_gris">Vizualiza en el Mapa sus Movimientos</span></td>
                              <td width="31%"><span class="arial_gris_med">
                                <select name="usuario" class="arial_light_combo" id="usuario">
								<option value="0" SELECTED>Selecciona el Usuario</option>
<?
$SQL_lee4="select id_usuario  from activaciones group by id_usuario  order by id_usuario desc";
$res=mysql_query($SQL_lee4,$base); 

while($fila=mysql_fetch_array($res)) {
		$id_usuario = $fila["id_usuario"];

		$sql3="SELECT * FROM ejecutivos where  id_ejecutiv=".$fila["id_usuario"]; 
		$gral3=mysql_query($sql3,$base);
		while($registro2=mysql_fetch_array($gral3)) 
		{ $ejecutivo=$registro2["nom_ejecutiv"];

		?>
	
	<option value="<?=$id_usuario?>"><?=$ejecutivo?></option>
	
<?		}}?>
</select>

                              </span></td>
                              <td width="19%"><input name="button7" type="submit" class="bot_sombra" id="button7" value="Ingresar" /></td>
                            </tr>
							</form>
                          </table></td>
                      </tr>
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
        <td align="center" valign="top">
		  <table id="table3" border="0" cellpadding="0" cellspacing="0" width="100%">
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

	


<!-- PIE  -->
<!--Tabla de margen frente al footer -->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td height="70">&nbsp;</td></tr>
</table>
<!--Fin de la Tabla de margen frente al footer -->

</div> 

<!-- Footer, debe estar dentro del Div-->
<div id="Footer">
<?  require_once('../inc/pie2.incl');  ?> 
</div>

<!-- Fin del Footer-->

</body>
</html>
