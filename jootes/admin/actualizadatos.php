<?php

require_once('../nombre_pag.php');
require_once('conexion.php');

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

$tiempo = time (); 
$hora= date ( "H" , $tiempo ); 
$min= date ( "i" , $tiempo ); 
$seg= date ( "i" , $tiempo ); 
$hora=$hora.$min.$seg;

$Fecha=getdate(); 

$Anio=$Fecha["year"]; 
$Mes=$Fecha["mon"]; 
$Dia=$Fecha["mday"]; 
if ($Mes<9) {
	$mesdis="0".$Mes;
}else{
	$mesdis=$Mes;
}
if ($Dia<9) {
	$diadis="0".$Dia;
}else{
$diadis=$Dia;
}
$fecha=$Anio.$mesdis.$diadis." ".$hora;
$fecha_hasta=$_POST["ano_venc"].$_POST["mes_venc"].$_POST["dia_venc"];

$sql1="select * from tipo_usuario where tipo='". $_POST["check"] ."'";

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
}



//AQUI TENGO QUE PONER EL MONTO QUE SE ASIGNA
$sql_monto = "select * from users where extension='".$_POST["anexo"]."'";
$res03=mysql_query($sql_monto,$asterisk);
while($valor=mysql_fetch_array($res03))
{
	
$valor_final=(int)$valor["monto_user"]+(int)$monto_minutos;
$sql2 = "update users set monto_user='".$valor_final."' where extension='".$_POST["anexo"]."'";

$res04=mysql_query($sql2,$asterisk);
}
//$textosql="insert into registro_saldo ( extension,monto_user,date_insert,user_insert,estado) values ('".$_POST["anexo"]."', '".$valor_final."', '".$fecha."','".$nombreurl."', 'A')";
//$res04=mysql_query($textosql,$tarificador);

$sq2="update ejecutivos set pago='SI',desde_plan='" . $fecha . "',hasta_plan='" . $fecha_hasta . "' where id_ejecutiv='" . $_POST["usuario"] . "'";
$res04=mysql_query($sq2,$base);

$fecha_deposito=$_POST["ano"].$_POST["mes"].$_POST["dia"];
$textodepo="insert into pagos ( id_usuario,fecha_pago,monto,comprobante,sucursal,fecha_deposito) values ('".$_POST["usuario"]."', '".$fecha."', '".$precio."','".$_POST["comprobante"]."', '".$_POST["sucursal"]."', '".$fecha_deposito."')";
$res04=mysql_query($textodepo,$base);


$sql="Select * from directorios where usuario='" . $_POST["usuario"] . "'";
$res=mysql_query($sql,$base); 
$numeroRegistros=mysql_num_rows($res); 
if ($numeroRegistros==0){
	$sql="Select * from directorios where usuario=0 LIMIT 0 , 1";
	$res02=mysql_query($sql,$base);
	while($fila02=mysql_fetch_array($res02))
	{
		$posicion=$fila02["posicion"];
		$sql1="update directorios set usuario='".$_POST["usuario"]."' where posicion='".$posicion."'";
		$res=mysql_query($sql1,$base);

	}
}

$nombre="Atentamente , " . $nombreurl .".";
$strMensaje = "http://".$nombreurl;
$contactame = "<a href='http://".$nombreurl."/inter/botonc2c.php?id_eje=".$_GET["id"];
$contactame .= "'><img border='0' src='http://".$nombreurl."/images/botonweb.png' width='272' height='80'></a>";


require("../PHPMailer_v5.1/class.phpmailer.php"); 
$mail = new PHPMailer(); 
$mail->Host = "localhost";
$mail->SMTPAuth = true;
$strMensaje = "http://".$nombreurl;
$mail->From=$correopagina;
	$mail->FromName="Atentamente , " . $nombreurl .".";
	$mail->Sender=$correopagina;
	$mail->AddReplyTo($correopagina, "Responde a este mail");
	$mail->Subject = "Tu Compra ya esta activa en " . $nombreurl;
	$mail->IsHTML(true);
	$mail->AddAddress($_POST["correo"]);



$strBody = "<div align='center'>";
$strBody .= "<table border='0' width='90%' id='table1' height='279'><tr><td><b>Estimado ".$_POST["nombre"].":</b></td></tr>";
$strBody .= "<tr><td height='32'>Ya tienes acceso al centro de Comunicaciones de ". $nombreurl . ".</td></tr>";
$strBody .= "<tr><td height='32'><span style='font-size:12px;' >Tus datos para ingresar son: <br><br> Login :'" . $_POST["correo"] . "'<br> Password :'" . $_POST["password"] . "'</span><br><br></td></tr>";
$strBody .= "<tr><td height='32' align=center>Tienes los siguientes atributos</td></tr><tr><td height='32'>";
$strBody .= "<table><tr  >";
$strBody .= "<td valign='middle'  height='25' width='29%' style='text-align: left' >Descripción</td>";
$strBody .= "<td  width='69%' height='25' style='text-align: left'>".$descripcion."</td></tr>";
/*$strBody .= "<tr  ><td valign='middle'  height='25' width='29%' style='text-align: left' >correos</td>";
$strBody .= "<td  width='69%' height='25' style='text-align: left'>".$correos."</td></tr>";
$strBody .= "<tr  ><td valign='middle'  height='25' width='29%' style='text-align: left' >Buzon de Voz</td><td  width='69%' height='25' style='text-align: left'>";


if ($voice_mail==1) { 
	$strBody .= "Si";
}else{
	$strBody .= "No";
}

$strBody .= "</td></tr><tr  ><td valign='middle'  height='25' width='29%' style='text-align: left' >Telefono IP</td><td  width='69%' height='25' style='text-align: left'>";

if ($anexo_ip==1)  {  
	$strBody .= "Si";
}else{
	$strBody .= "No";
}

$strBody .= "</td></tr><tr  ><td valign='middle'  height='25' width='29%' style='text-align: left' >click2call</td><td  width='69%' height='25' style='text-align: left'>";

if ($click2call==1)  {  
	$strBody .= "Si";
}else{ 
	$strBody .= "No";
}

$strBody .= "</td></tr><tr  ><td valign='middle'  height='25' width='29%' style='text-align: left' >Monto en Telefonia</td><td  width='69%' height='25' style='text-align: left'>".$monto_minutos."</td></tr>";
*/
$strBody .= "</table></td></tr><tr>";
$strBody .= "<td height='32'><a href='".$strMensaje."' target=_blank> Ingresa desde Aquí y comienza a utilizar este servicio.</a></td></tr>";
$strBody .= "<tr><td>&nbsp;</td></tr>";
$strBody .= "<tr><td height='32' align=right>".$nombre."</td></tr>";
$strBody .= "</table></div></div>";


$mail->MsgHTML($strBody);
			if(!$mail->Send())
			{
				$mail->ClearAddresses();
			}
			else
			{
  			 $mail->ClearAddresses();
			}
?>

    <blockquote><p><span class="arial_24_blue">Los datos del usuario fueron Actualizados.</span></p><p>&nbsp;</p><p>&nbsp;</p></blockquote>
    <a href="index.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Imagen15','','../images/volver_up.png',1)">
	<img src="../images/volver.png" name="Imagen15"  border="0"></a>       
        

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
 <!--#include file="../pie.php"-->      
         <!-- Pie de pagina --></td>
  </tr>
</table>
<center>

</center>
</body>
</html>