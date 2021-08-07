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
              <td height="350" align="right" valign="bottom"><img src="images/reloj_click.png" width="278" height="317" /></td>
            </tr>
        </table></td>
        <td width="65%" align="right" valign="top">
		<table width="693" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="top">
			<table id="table28" border="0" cellpadding="0" cellspacing="0" width="693">
              <tbody>
                <tr>
                  <td height="200" colspan="3" align="center" valign="middle">
				  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="arial_tit_gris" id="table29">
                    <tbody>
                      <tr>
                        <td height="100" align="left" valign="middle">Configura las alarmas de recordatorio, estas te enviar&aacute;n una notificaci&oacute;n a tu celular.</td>
                        </tr>
                      </tbody>
                  </table>
                    <table id="table30" border="0" cellpadding="0" cellspacing="0" width="100%">
                      <tbody>
                        <tr>
                          <td>
						  		<FORM  name="mainFrame" id="mainFrame" onSubmit="return aceptar(this);" action="G_alarmas.php" method="post" target="_self">   
				  <table width="100%" border="0" cellpadding="0" cellspacing="0" class="arial_tit_gris" id="table29">
					<tbody>
                      <tr>
                        <td height="25" align="left" valign="middle" class="arial_tit_gris">Configuraci&oacute;n</td>
                        </tr>
                      </tbody>
				 </table>
						  <table border="0" cellpadding="0" cellspacing="0" >
                            <tr>
							<td width="172" height="34" align="left" class="arial_light_med">Horario</td>
                              <td  align="left" height="34" width="418"   class="arial_light_med">
Hora <select name="hora">
<option selected value=""></option>
<option  value="01">01</option>
<option  value="02">02</option>
<option  value="03">03</option>
<option  value="04">04</option>
<option  value="05">05</option>
<option  value="06">06</option>
<option  value="07">07</option>
<option  value="08">08</option>
<option  value="09">09</option>
<option  value="10">10</option>
<option  value="11">11</option>
<option  value="12">12</option>
<option  value="13">13</option>
<option  value="14">14</option>
<option  value="15">15</option>
<option  value="16">16</option>
<option  value="17">17</option>
<option  value="18">18</option>
<option  value="19">19</option>
<option  value="20">20</option>
<option  value="21">21</option>
<option  value="22">22</option>
<option  value="23">23</option>
<option  value="24">24</option></select>--
Min <select name="minutos">
<option selected value="00">00</option>
<option  value="01">01</option>
<option  value="02">02</option>
<option  value="03">03</option>
<option  value="04">04</option>
<option  value="05">05</option>
<option  value="06">06</option>
<option  value="07">07</option>
<option  value="08">08</option>
<option  value="09">09</option>
<option  value="10">10</option>
<option  value="11">11</option>
<option  value="12">12</option>
<option  value="13">13</option>
<option  value="14">14</option>
<option  value="15">15</option>
<option  value="16">16</option>
<option  value="17">17</option>
<option  value="18">18</option>
<option  value="19">19</option>
<option  value="20">20</option>
<option  value="21">21</option>
<option  value="22">22</option>
<option  value="23">23</option>
<option  value="24">24</option>
<option  value="25">25</option>
<option  value="26">26</option>
<option  value="27">27</option>
<option  value="28">28</option>
<option  value="29">29</option>
<option  value="30">30</option>
<option  value="31">31</option>
<option  value="32">32</option>
<option  value="33">33</option>
<option  value="34">34</option>
<option  value="35">35</option>
<option  value="36">36</option>
<option  value="37">37</option>
<option  value="38">38</option>
<option  value="39">39</option>
<option  value="40">40</option>
<option  value="41">41</option>
<option  value="42">42</option>
<option  value="43">43</option>
<option  value="44">44</option>
<option  value="45">45</option>
<option  value="46">46</option>
<option  value="47">47</option>
<option  value="48">48</option>
<option  value="49">49</option>
<option  value="50">50</option>
<option  value="51">51</option>
<option  value="52">52</option>
<option  value="53">53</option>
<option  value="54">54</option>
<option  value="55">55</option>
<option  value="56">56</option>
<option  value="57">57</option>
<option  value="58">58</option>
<option  value="59">59</option>
</select>		
							  </td>
							  </tr>
							  <tr>
							  <td width="172" height="34" align="left" class="arial_light_med">Dia/s</td>
                              <td  align="left" height="34" width="418"  class="arial_light_med">
								<TABLE>
								<TR>
									<TD>Lun <input name="lun" type="checkbox" class="arial_light_cuadro" id="lun"  value="1" size="1" /></TD>
									<TD>Mar <input name="mar" type="checkbox" class="arial_light_cuadro" id="mar"  value="1" size="1" /></TD>
									<TD>Mie <input name="mie" type="checkbox" class="arial_light_cuadro" id="mie"  value="1" size="1" /></TD>
									<TD>Jue <input name="jue" type="checkbox" class="arial_light_cuadro" id="jue"  value="1" size="1" /></TD>
									<TD>Vie <input name="vie" type="checkbox" class="arial_light_cuadro" id="vie"  value="1" size="1" /></TD>
									<TD>Sab <input name="sab" type="checkbox" class="arial_light_cuadro" id="sab"  value="1" size="1" /></TD>
									<TD>Dom <input name="dom" type="checkbox" class="arial_light_cuadro" id="dom"  value="1" size="1" /></TD>
								</TR>
								</TABLE>
							  </td>
							  							  </tr>
							  <tr>
							  <td width="172" height="34" align="left" class="arial_light_med">Mensaje</td>
                              <td  align="left" height="34" width="418"   class="arial_light_med">
							  Mensaje <input name="mensaje" id="mensaje" type="text" class="arial_light_cuadro"  value="" size="50" />
							  </td>
							  							  </tr>
							  <tr>
							  <td width="172" height="34" align="left" class="arial_light_med">Activar</td>
                              <td  align="left" height="34" width="418"   class="arial_light_med">
							  <TABLE>
							  <TR>
							  	<TD>Act <input name="activo" type="radio" id="activo"  value="1" /></TD>
							  	<TD>Desac <input name="activo" type="radio"  id="activo"  value="0" checked/></TD>
							  </TR>
							  </TABLE>
							  </td>
                            </tr>
                          

                          
                            <tr>
                              <td width="172" height="34" align="left" class="arial_light_med">&nbsp;</td>
                              <td colspan="3" align="left" height="34" width="418"><input name="button5" type="submit" class="rojo_sombra_ch" id="button5" value="Guardar Cambios" />
							  </form> 
							  
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
                          <td align="center" valign="middle" class="google_fjalla_gde">Alarmas activas<br />
                            <span class="arial_light_med">5 &Uacute;ltimos resultados</span></td>
                        </tr>
                        <tr></tr>
                        </tbody>
                  </table>
                    <hr noshade="noshade" />
                    <table width="100%">
                      <tbody>
                        <tr class="arial_tit_gris">
                          <td width="17%" align="left" height="47">Creacion</td>
                          <td width="5%" align="left" height="47">Horario</td>
                          <td width="5%" align="left" height="47">Lun</td>
                          <td width="5%" align="left" height="47">Mar</td>
                          <td width="5%" align="left" height="47">Mie</td>
                          <td width="5%" align="left" height="47">Jue</td>
                          <td width="5%" align="left" height="47">Vie</td>
                          <td width="5%" align="left" height="47">Sab</td>
                          <td width="5%" align="left" height="47">Dom</td>
                          <td width="30%" align="left" height="47">Mensaje</td>
                          <td width="7%" align="left"></td>
                        </tr>
<?
$sql2="SELECT * FROM alarmas where idusuario_ala='".$login."' ORDER BY id DESC LIMIT 5"; 
$gral=mysql_query($sql2,$base);
while($registro=mysql_fetch_array($gral)) 
{ 
		$id=$registro["id"];
		$fecha_creacion=$registro["fecha_creacion"];
		$hora = $registro["hora"];
		$minuto=$registro["minuto"];  
		$lun=$registro["lun"];  
		$mar=$registro["mar"];  
		$mie=$registro["mie"];  
		$jue=$registro["jue"];  
		$vie=$registro["vie"];  
		$sab=$registro["sab"];  
		$dom=$registro["dom"]; 
		$mensaje=$registro["mensaje"]; 
?>



  <!-- tabla de resultados rel=shadowbox;width=700;height=500  --> 
 
 <tr>
                <td width="17%"  align="left" class="arial_light_med" height=15>
                <span class="arial_10_33"><?=$fecha_creacion?></span></td>
                <td width="5%"  align="left" class="arial_light_med"><?=$hora?>:<?=$minuto?></td>
                <td width="5%"  align="left" class="arial_light_med"><?=$lun?></td>                                   
                <td width="5%"  align="left" class="arial_light_med"><?=$mar?></td>
                <td width="5%"  align="left" class="arial_light_med"><?=$mie?></td>
                <td width="5%"  align="left" class="arial_light_med"><?=$jue?></td>
                <td width="5%"  align="left" class="arial_light_med"><?=$vie?></td>
                <td width="5%"  align="left" class="arial_light_med"><?=$sab?></td>
                <td width="5%"  align="left" class="arial_light_med"><?=$dom?></td>
				<td width="30%"  align="left" class="arial_light_med"><?=$mensaje?></td>
				<td width="10%"  align="left" class="arial_light_med">
				<a href="http://<?=$nombreurl?>/elimina_alarma.php?id=<?=$id?>" >
				<img src="http://<?=$nombreurl?>/images/desactiva_bot.png" width="45" height="45" border="0" /></a></td>   
				 
				
         
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
