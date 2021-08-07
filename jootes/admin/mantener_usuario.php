<?php

require_once('../nombre_pag.php');
require_once('../conexion.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>.:: <?=$pagina?> ::.</title>
<link rel="icon" href="../favicon.ico" type="image/x-icon">
<link href="../estilo.css" rel="stylesheet" type="text/css"/>

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
<link rel="stylesheet" type="text/css" href="../shadowbox/shadowbox.css">
<script type="text/javascript" src="../shadowbox/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
    // let's skip the automatic setup because we don't have any
    // properly configured link elements on the page
    overlayOpacity: 0.8
});
</script>


</head>

<body >


<table align="center" width="100%" border="0" cellspacing="0" cellpadding="0" class="tabla_degra">
  <tr>
    <td align="center"><table width="987" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="top" >       
          
          

<table width="900" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="150" align="center" valign="middle">
                                          
              
              <span class="arial_24_blue">ADMINISTRACIÓN</span><table height="" width="900" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center" valign="middle" class="arial_24_99">
            
                  <table height="" width="900" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="235" rowspan="4" align="left">
						<a href="http://<?=$nombreurl?>">
						<img src="http://<?=$nombreurl?>/images/logo.png"  border=0 /></a></td>
                      <td width="189" rowspan="4" align="center">
						<a href="http://<?=$nombreurl?>" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('dos','','http://<?=$nombreurl?>/images/home_bot_up.png',1)">
						<img src="http://<?=$nombreurl?>/images/home_bot.png" border=0 align="right" id=dos /></a></td>
                      <td width="87" rowspan="2" align="center" valign="bottom" class="arial_24_99">&nbsp;</td>
                      <td height="20" align="left" class="arial_24_99">
                      &nbsp;</td>
                      <td width="12" rowspan="2" class="arial_24_99">&nbsp;</td>
                      <td height="20" align="left" class="arial_24_99">
                      &nbsp;</td>
                    </tr>
                    <tr>
                      <td width="120" align="left" class="arial_12_bco">
                      &nbsp;</td>
                      <td width="147" align="left" class="arial_12_bold">
                        &nbsp;</td>
                    </tr>
                      <tr>
                        <td height="5" colspan="4" ></td>
                        </tr>
                      <tr>
                        <td colspan="2" align="right" valign=top class="arial_10_bco">
                        &nbsp;</td>
                        <td colspan="2" align="right" class="arial_12_bco">
                        &nbsp;</td>
                      </tr>
                      </table>

          </td>
                </tr>
                </table></td>
            </tr>
            </table>
          <table width="900" border="0" cellspacing="0" cellpadding="0">
            <tr>
    <td>
	<img src="../images/barra_sup_bco.png" width="900" height="10" /></td>
  </tr>
  <tr>
    <td align="center" valign="middle" background="../images/barra_body_bco.png"  class="arial_24_99">
    <table height="237" width="888" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="888" align="center" class="arial_24_neg">
        
        <!-- contenido -->
        
        
            
        
<? 
$sql="Select * from ejecutivos where id_ejecutiv='". $_GET["usuario"] ."'";
$res02=mysql_query($sql,$base);
while($fila02=mysql_fetch_array($res02))
{?>

<FORM language=javascript name="mainFrame" id="mainFrame" action="actualizadatos.php" method="post" target="_self">    
<input type=hidden name=usuario id=usuario value="<?=$_GET["usuario"]?>">
<input type=hidden name=correo id=correo value="<?=$fila02["login"]?>">
<input type=hidden name=password id=password value="<?=$fila02["pass"]?>">
<? 
list($nada,$anexo) = split('-',$fila02["numero_usuario"]);
?>

<input type=hidden name=anexo id=anexo value="<?=$anexo?>">
<input type=hidden name=tipo id=tipo value="<?=$fila02["tipo_usuario"]?>">


		<table width="89%" border="0" cellpadding="2" cellspacing="3" id="table15" align=center height="450" >

		<tr  class="arial_12_neg">
        <td valign="middle"  height="25" width="16%" style="text-align: left" ><b>
		**
		</b>Nombre</td>
        <td  width="79%" height="25" style="text-align: left" colspan="2">
		<input name="nombre"  type="text" class="formText" id="nombre" size="45"  value="<?=$fila02["nom_ejecutiv"]?>" readonly></td>
      		</tr>

		<tr  class="arial_12_neg">
        <td valign="middle"  height="25" width="16%" style="text-align: left" ><b>
		</b>Numero celular (09-08-07-06xxxxxxx)</td>
        <td  width="79%" height="25" style="text-align: left" colspan="2">
		<input name="celular"  type="text" class="formText" id="celular" size="45"  value="<?=$fila02["celu_ejecutiv"]?>" readonly></td>
      		</tr>
		<tr  class="arial_12_neg">
        <td valign="middle"  height="25" width="16%" style="text-align: left" ><b>
		**
		</b>Teléfono Fijo</td>
        <td  width="79%" height="25" style="text-align: left" colspan="2">
		
		<input name="fono"  type="text" class="cajaGris" id="fono" size="26"  value="<?=$fila02["cod_fono"]?>-<?=$fila02["fono_ejecutiv"]?>"  readonly></td>
      		</tr>
		<tr  class="arial_12_neg">
        <td valign="middle"  height="25" width="16%" style="text-align: left" ><b>
		</b>Dirección</td>
        <td  width="79%" height="25" style="text-align: left" colspan="2">
		<input name="direccion"  type="text" class="formText" id="direccion" size="45" value="<?=$fila02["dir_ejecutiv"]?>"  readonly></td>
      		</tr>
		<tr  class="arial_12_neg">
        <td valign="middle"  height="25" width="16%" style="text-align: left" ><b>
		</b>Ciudad</td>
        <td  width="79%" height="25" style="text-align: left" colspan="2">
		<input name="ciudad"  type="text" class="formText" id="ciudad" size="45"  value="<?=$fila02["ciudad_ejecutiv"]?>" readonly></td>
      		</tr>
			<tr  class="arial_12_neg">
        <td valign="middle"  height="25" width="95%" style="text-align: left" colspan="3" >
		&nbsp;</td>
      		</tr>
			<tr>
        <td valign="middle"  height="25" width="95%" style="text-align: left" colspan="3" >
		<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table18">
			<tr>
				<td>
				<p align="center"><span class=arial_12_red>Información Deposito</span></td>
			</tr>
		</table>
		</td>
      		</tr>
		<tr>
        <td valign="middle"  height="25" width="95%" style="text-align: left" colspan="3" >
		<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table19">
			<tr>
				<td width="132"><span class="arial_12_neg">Monto</span></td>
				<td>
		<input name="monto"  type="text" class="formText" id="monto" size="45"  ></td>
			</tr>
		</table>
		</td>
      		</tr>
		<tr>
        <td valign="middle"  height="25" width="95%" style="text-align: left" colspan="3" >
		<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table20">
			<tr >
				<td width="132"><span class="arial_12_neg">Comprobante</span></td>
				<td>
		<input name="comprobante"  type="text" class="formText" id="comprobante" size="45"  ></td>
			</tr>
		</table>
		</td>
      		</tr>
		<tr>
        <td valign="middle"  height="25" width="95%" style="text-align: left" colspan="3" >
		<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table21">
			<tr>
				<td width="132"><span class="arial_12_neg">Sucursal</span></td>
				<td>
		<input name="sucursal"  type="text" class="formText" id="sucursal" size="45"  ></td>
			</tr>
		</table>
		</td>
      		</tr>
			<tr  class="arial_12_neg">
        <td valign="middle"  height="25" width="95%" style="text-align: left" colspan="3" >
		<table border="0" width="100%" cellspacing="0" cellpadding="0" id="table17">
			<tr>
				<td width="132"><span class="arial_12_neg">Fecha Deposito</span></td>
				<td>
					<font size="2">día</font>&nbsp; 
					<select class="box_1" name="dia" id="dia" size="1">
<option value="01" SELECTED>01</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
      		      		      	
 			</select>
					<font size="2">mes</font>&nbsp; 
					<select class="box_1" name="mes" id="mes" size="1">
<option value="01" SELECTED>01</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
      		      		      	
 			</select>
					<font size="2">a&ntilde;o</font>&nbsp;
					<select class="box_1" name="ano" id="ano" size="1">
<option value="2012" SELECTED>2012</option>
<option value="2013" >2013</option>
<option value="2014" >2014</option>
<option value="2015" >2015</option>
<option value="2016" >2016</option>
<option value="2017" >2017</option>
   		      		      	
 			</select>&nbsp;
        </td>
			</tr>
		</table>
		</td>
      		</tr>
			<tr  class="arial_12_neg">
        <td valign="middle"  height="25" width="95%" style="text-align: left" colspan="3" >
		<!-- *Tu login o tu nombre de usuario será el nombre con el que se conocerá a tu grupo, recuerda que esta información es primordial en la inscripción de los integrantes de tu equipo. --></td>
      		</tr>
		<tr  class="arial_12_neg">
        <td valign="middle"  height="25" width="16%" style="text-align: left" >
		<span class=arial_12_red><b>**
		Vencimiento</b></span></td>

		<td  width="79%" height="25" class="celda_calip" colspan="2">
					<font size="2">día</font>&nbsp; 
					<select class="box_1" name="dia_venc" id="dia_venc" size="1">
<option value="01" SELECTED>01</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
      		      		      	
 			</select>
					<font size="2">mes</font>&nbsp; 
					<select class="box_1" name="mes_venc" id="mes_venc" size="1">
<option value="01" SELECTED>01</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
      		      		      	
 			</select>
					<font size="2">a&ntilde;o</font>&nbsp;
					<select class="box_1" name="ano_venc" id="ano_venc" size="1">
<option value="2012" SELECTED>2012</option>
<option value="2013" >2013</option>
<option value="2014" >2014</option>
<option value="2015" >2015</option>
<option value="2016" >2016</option>
<option value="2017" >2017</option>
   		      		      	
 			</select>&nbsp;
        </td>
      	</tr>
		<tr  class="arial_12_neg">
        <td valign="middle"  height="25" width="16%" style="text-align: left" >
		<span class=arial_12_red><b>**
		PLAN</b></span></td>

<? 
$sql1="select * from tipo_usuario where tipo='". $fila02["tipo_usuario"] ."'";
$res03=mysql_query($sql1,$base);
while($fila03=mysql_fetch_array($res03))
{
	
$descripcion=$fila03["descripcion"];
$correos=$fila03["correos"];
$voice_mail=$fila03["voice_mail"];
$anexo_ip=$fila03["anexo_ip"];
$video_conferencia=$fila03["video_conferencia"];
$click2call=$fila03["click2call"];
$monto_minutos=$fila03["monto_minutos"];
$precio=$fila03["precio"];

}?>       
		<td  width="9%" height="25" class="celda_calip">
		Seleccionar</td>
		<td  width="69%" height="25" style="text-align: left">
		<table border="1" width="96%" id="table16">
			<tr class="celda_calip">
        <td width="72" align="center" valign="middle" class="arial_10_bco">
		Minutos habilitados</td>
        <td width="72" align="center" valign="middle" class="arial_10_bco">Valor 
		Minutos<br />Fijo /Cel</td>
        <td width="168" align="center" valign="middle" class="arial_10_bco">
		Precio</td>
			</tr>
		</table>
		</td>
      	</tr>
<tr  class="arial_12_neg">
        <td height="75" align="center" valign="middle" class="arial_12_neg">
		Mensual</td>
        <td  width="9%" height="25" class="celda_calip" align="center"><span class=arial_12_red><INPUT name="check" type="radio" id="1"  value="A" checked></span></td>
        <td  width="69%" height="25" style="text-align: left">
		<table border="1" width="96%" id="table16">
			<tr>
        <td align="center" class="arial_10_33" width="72">
		30</td>
        <td align="center" class="arial_10_33" width="72">
		$18 / $74</td>
	
        <td align="center" class="arial_10_neg_bold" width="167">$7.990</td>
			</tr>
		</table></td>
      		</tr>
      	
		<tr  class="arial_12_neg">
        <td height="75" align="center" valign="middle" class="arial_12_neg">
		Trimestral</td>
        <td  width="9%" height="25" class="celda_calip" align="center"><span class=arial_12_red>
		<INPUT name="check" type="radio" id="3"  value="B" ></span></td>
        <td  width="69%" height="25" style="text-align: left">
		<table border="1" width="96%" id="table16">
			<tr>
        <td align="center" class="arial_10_33" width="72">
		90</td>
        <td align="center" class="arial_10_33" width="72">
		$18 / $74</td>
        <td align="center" class="arial_10_33" width="170"><span class="arial_10_neg_bold">$14.970</span></td>
			</tr>
		</table></td>
      		</tr>
		<tr  class="arial_12_neg">
        <td height="75" align="center" valign="middle" class="arial_12_neg">
		Semestral</td>
        <td  width="9%" height="25" class="celda_calip" align="center"><span class=arial_12_red>
        <INPUT name="check" type="radio" id="4"  value="C"	></span></td>
        <td  width="69%" height="25" style="text-align: left">
		<table border="1" width="96%" id="table16">
			<tr>
        <td align="center" class="arial_10_33" width="72">
		180</td>
        <td align="center" class="arial_10_33" width="72">
		$18 / $74</td>
        <td align="center" class="arial_10_33" width="292"><span class="arial_10_neg_bold">$27.660</span></td>
			</tr>
		</table></td>
      		</tr>
		<tr  class="arial_12_neg">
        <td height="75" align="center" valign="middle" class="arial_12_neg">
		Anual</td>
        <td  width="9%" height="25" class="celda_calip" align="center"><span class=arial_12_red>
        <INPUT name="check" type="radio" id="5"  value="D"	></span></td>
        <td  width="69%" height="25" style="text-align: left">
		<table border="1" width="96%" id="table16">
			<tr>
        <td align="center" class="arial_10_33" width="72">
		360</td>
        <td align="center" class="arial_10_33" width="72">
		$18 / $74</td>
        <td align="center" class="arial_10_33" width="167"><span class="arial_10_neg_bold">$49.660</span></td>
			</tr>
		</table></td>
      		</tr>

		<tr  class="arial_12_blue">
        <td valign="middle"  height="13" width="95%" style="text-align: left" colspan="3" >
		<p style="text-align: center">Solo podrás actualizar el PLAN</p>
		<p style="text-align: center">
		<input type="image" src="../images/grabar.png"/>
		<!--input type="submit" class="entra" name="entrar" value="Registrate"/--></td>
      		</tr>

		<tr  class="arial_12_neg">
        <td valign="middle"  height="40" width="95%" style="text-align: center" colspan="3" ><span class="arial_12_neg">
			Los datos con (**) son obligatorios.</td>
      		</tr>

			</table>
<?}?>
	</form>	    




        
        
          <!-- contenido -->      
        
        </td>
      </tr>
      </table></td>
  </tr>
  <tr>
    <td>
	<img src="../images/barra_inf_bco.png" width="900" height="10" /></td>
  </tr>
          </table>
</td>
      </tr>
    </table></td>
  </tr>
</table>
  <!-- Pie de pagina -->
 <!--#include file="../pie.asp"-->      
         <!-- Pie de pagina --></td>
  </tr>
</table>
<center>

</center>
</body>
</html>